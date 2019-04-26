<?php

    class Auction extends CI_Model{

        public function __construct(){
            parent::__construct();
        }

        public function getAllAuctions(){
            return $this->db->get("auctions_info_view")->result();
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

            $this->db->select("*");
            $this->db->from("auctions_info_view a");
            $this->db->order_by("a.bids_count DESC");

            if ($limit != null){
                return $this->db->limit($limit)->get()->result();
            }
            else{
                
                return $this->db->get()->result();
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

    }

?>