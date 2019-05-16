<?php
	
	class UserBids extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		public function getAllUserBids($username){
			$this->db->select("b.*, auction_name, end_time, auction_state");
			$this->db->from("bids b");
			$this->db->where("username",$username);
			$this->db->join("auctions a", "a.auction_id = b.auction_id");
			$this->db->order_by("bid_time DESC");

			return $this->db->get()->result();
		}

		public function createBid($auction_id, $username, $bid_time, $bid_value){
			$data = array(
				'auction_id' => $auction_id,
				'username' => $username,
				'bid_time' => $bid_time,
				'bid_value' => $bid_value  
			);

			$this->db->insert('bids', $data); 
		}

	}

?>