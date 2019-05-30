<?php

    class Auction extends CI_Model{

        public function __construct(){
            parent::__construct();

            $this->checkAndFinishAll();

        }

        public function getMaxBid($auction_id){
            $this->db->where('auction_id', $auction_id);
            return $this->db->get('max_bids_view')->row();
        }

        public function getAllAuctions(){
            
            $this->db->from("auctions_info_view");
            $this->db->order_by("auction_id DESC");

            return $this->db->get()->result();
        }

        public function getNewestAuctions($limit = null){
            if ($limit != null){
                return $this->db->order_by("create_time","DESC")->limit($limit)->where("auction_state","Active")->get("auctions_info_view")->result();
            }
            else{
                return $this->db->order_by("create_time","DESC")->where("auction_state","Active")->get("auctions_info_view")->result();
            }
        }

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
            public function getActiveAuctions(){
            $this->db->select("*");
            $this->db->from("auctions_info_view");
            $this->db->where("auction_state", "Active");
            $this->db->order_by("end_time");

            return $this->db->get()->result();

        }
        public function getPendingAuctions(){
            $this->db->select("*");
            $this->db->from("auctions");
            $this->db->where("auction_state", "Pending confirmation");
            $this->db->order_by("create_time DESC");

            return $this->db->get()->result();

        }   
         public function getAuctionByCategoryName($category){
            $this->db->select("*");
            $this->db->from("auction_categories a");
            $this->db->join("auctions_info_view b","b.category=a.category_id");
            $this->db->where("a.category_name",$category);
             $this->db->where("auction_state", "Active");
             $this->db->order_by("end_time");
            return $this->db->get()->result();
            
            
        }
         public function getAuctionByCategoryId($category){
            $this->db->select("*");
            $this->db->from("auctions a");
            $this->db->where("a.category",$category);

            return $this->db->get()->result();
        }
        public function getAuctionById($id){
            $this->db->select("*");
            $this->db->from("auctions a");
            $this->db->where("a.auction_id",$id);

            return $this->db->get()->result();
        }

        public function createNewAuction($data){

            $this->db->insert("auctions",$data);
        }

        public function getUsersLastAuctionId($user){
            $this->db->from("auctions");

            $where = "auction_owner = '" . $user . "' AND auction_id = (SELECT MAX(b.auction_id) FROM auctions b where b.auction_owner = '" . $user . "')"; 
            $this->db->where($where);

            return $this->db->get()->result()[0]->auction_id;
        }

        public function deleteAuction($id){
            $this->db->where("auction_id",$id);
            $this->db->delete("auctions");
        }

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