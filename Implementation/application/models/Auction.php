<?php

    /**
     * Class for auction.
     */
    class Auction extends CI_Model{
        /**
         * Constructor for Auction class
         */
        public function __construct(){
            parent::__construct();

            $this->checkAndFinishAll();

        }
        /**
         * Gets the maximum bid.
         *
         * @param      int  $auction_id  The auction identifier
         *
         * @return     int  The maximum bid.
         */
        public function getMaxBid($auction_id){
            $this->db->where('auction_id', $auction_id);
            return $this->db->get('max_bids_view')->row();
        }
        /**
         * Gets all auctions.
         *
         * @return     array  All auctions.
         */
        public function getAllAuctions(){
            
            $this->db->from("auctions_info_view");
            $this->db->order_by("auction_id DESC");

            return $this->db->get()->result();
        }
        /**
         * Gets the newest auctions.
         *
         * @param      int  $limit  The limit
         *
         * @return     Auction  The newest auctions.
         */
        public function getNewestAuctions($limit = null){
            if ($limit != null){
                return $this->db->order_by("create_time","DESC")->limit($limit)->where("auction_state","Active")->get("auctions_info_view")->result();
            }
            else{
                return $this->db->order_by("create_time","DESC")->where("auction_state","Active")->get("auctions_info_view")->result();
            }
        }
/**
 * Gets the featured auctions.
 *
 * @param      int  $limit  The limit
 *
 * @return     Auction The featured auctions.
 */
        public function getFeaturedAuctions($limit = null){

            $this->db->select("*");
            $this->db->from("auctions_info_view a");
            $this->db->order_by("a.bids_count DESC");

            if ($limit != null){
                return $this->db->limit($limit)->where("auction_state","Active")->get()->result();
            }
            else{
                
                return $this->db->where("auction_state","Active")->get()->result();
            }
        }
        /**
         * Gets the active auctions.
         *
         * @return     Auction  The active auctions.
         */
            public function getActiveAuctions(){
            $this->db->select("*");
            $this->db->from("auctions_info_view");
            $this->db->where("auction_state", "Active");
            $this->db->order_by("end_time");

            return $this->db->get()->result();

        }
        /**
         * Gets the pending auctions.
         *
         * @return     Auction  The pending auctions.
         */
        public function getPendingAuctions(){
            $this->db->select("*");
            $this->db->from("auctions");
            $this->db->where("auction_state", "Pending confirmation");
            $this->db->order_by("create_time DESC");

            return $this->db->get()->result();

        }   
        /**
         * Gets the auction by category name.
         *
         * @param      string  $category  The category
         *
         * @return     Auction  The auction by category name.
         */
         public function getAuctionByCategoryName($category){
            $this->db->select("*");
            $this->db->from("auction_categories a");
            $this->db->join("auctions_info_view b","b.category=a.category_id");
            $this->db->where("a.category_name",$category);
             $this->db->where("auction_state", "Active");
             $this->db->order_by("end_time");
            return $this->db->get()->result();
            
            
        }
        /**
         * Gets the auction by category identifier.
         *
         * @param      int  $category  The categoryId
         *
         * @return     Auction  The auction by category identifier.
         */
         public function getAuctionByCategoryId($category){
            $this->db->select("*");
            $this->db->from("auctions a");
            $this->db->where("a.category",$category);

            return $this->db->get()->result();
        }
        /**
         * Gets the auction by identifier.
         *
         * @param      int  $id     The identifier
         *
         * @return     Auction  The auction by identifier.
         */
        public function getAuctionById($id){
            $this->db->select("*");
            $this->db->from("auctions a");
            $this->db->where("a.auction_id",$id);

            return $this->db->get()->result();
        }
        /**
         * Creates a new auction.
         *
         * @param      Collection  $data   The data
         */
        public function createNewAuction($data){

            $this->db->insert("auctions",$data);
        }
        /**
         * Gets the users last auction identifier.
         *
         * @param      string  $user   The user
         *
         * @return     int  The users last auction identifier.
         */
        public function getUsersLastAuctionId($user){
            $this->db->from("auctions");

            $where = "auction_owner = '" . $user . "' AND auction_id = (SELECT MAX(b.auction_id) FROM auctions b where b.auction_owner = '" . $user . "')"; 
            $this->db->where($where);

            return $this->db->get()->result()[0]->auction_id;
        }
        /**
         * Deletes Auction
         *
         * @param      int  $id     The identifier
         */
        public function deleteAuction($id){
            $this->db->where("auction_id",$id);
            $this->db->delete("auctions");
        }
        /**
         * Gets the auctions created by user.
         *
         * @param      string  $username  The username
         *
         * @return     array  The auctions created by user.
         */
        public function getAuctionsCreatedByUser($username){
            $this->db->from("auctions_info_view");
            $this->db->where("auction_owner", $username);
            $this->db->order_by("auction_id DESC");

            return $this->db->get()->result();
        }

        /**
         * this is function that will be called every time when constructor of this model is being executed
         */
        private function checkAndFinishAll(){
            $this->db->from("auctions");
            $auctions = $this->db->get()->result();
            
            foreach ($auctions as $auction){
                $this->checkAndFinishSingle($auction);
            }


        }

        /**
         * this is function for checking if a single auction that is passed as parameter is finished
         * this checks only for auctions that are in active state
         */
        public function checkAndFinishSingle($auction){
            if ($auction->auction_state == 'Active'){
                $cur_time = date("Y-m-d H:i:s");
                if(strtotime($auction->end_time) < strtotime($cur_time)){        
                    $this->finishAuction($auction->auction_id);
                }
            }

        }

        /**
         * setting auction state to "Finished"
         */
        public function finishAuction($id){
            $this->db->set('auction_state', 'Finished');
            $this->db->where('auction_id', $id);
            $this->db->update('auctions');
        }

    }

?>