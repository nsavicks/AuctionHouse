<?php

    class Auction extends CI_Model{

        public function __construct(){
            parent::__construct();
        }

        public function getAllAuctions(){
            return $this->db->get("auctions")->result();
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

        public function createNewAuction($data){

            $this->db->insert("auctions",$data);
        }

        public function getUsersLastAuctionId($user){
            $this->db->from("auctions");

            $where = "auction_owner = '" . $user . "' AND auction_id = (SELECT MAX(b.auction_id) FROM auctions b where b.auction_owner = '" . $user . "')"; 
            $this->db->where($where);
            return $this->db->get()->result()[0]->auction_id;
        }

    }

?>