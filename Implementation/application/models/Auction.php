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
                return $this->db->order_by("create_time","DESC")->limit($limit)->get("auctions")->result();
            }
            else{
                return $this->db->order_by("create_time","DESC")->get("auctions")->result();
            }
        }

        public function getFeaturedAuctions($limit = null){

            $this->db->select("*, MAX(b.bid_value) as 'highest_bid'");
            $this->db->from("auctions a");
            $this->db->from("bids b");
            $this->db->where("a.auction_id = b.auction_id");
            $this->db->where("a.auction_state = 'Active'");
            $this->db->group_by("a.auction_id");
            $this->db->order_by("COUNT(*)","DESC");

            if ($limit != null){
                return $this->db->limit($limit)->get()->result();
            }
            else{
                
                return $this->db->get()->result();
            }
        }

    }

?>