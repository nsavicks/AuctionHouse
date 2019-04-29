<?php

    class Auction extends CI_Model{

        public function __construct(){
            parent::__construct();
        }

        public function getAllAuctions(){
            
            $this->db->from("auctions_info_view");
            $this->db->order_by("auction_id DESC");

            return $this->db->get()->result();
        }

        public function getNewestAuctions($limit = null){
            if ($limit != null){
                return $this->db->order_by("create_time","DESC")->limit($limit)->where("auction_state","Active")->get("auctions")->result();
            }
            else{
                return $this->db->order_by("create_time","DESC")->where("auction_state","Active")->get("auctions")->result();
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

        public function getPendingAuctions(){
            $this->db->select("*");
            $this->db->from("auctions");
            $this->db->where("auction_state", "Pending confirmation");
            $this->db->order_by("create_time DESC");

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

    }

?>