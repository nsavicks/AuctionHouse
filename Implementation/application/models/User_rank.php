<?php
	
	class User_rank extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		public function getAllUserRanks(){
			return $this->db->get("user_ranks")->result();
		}

		public function getUserRankHavingId($id){
			$this->db->from("user_ranks");
			$this->db->where("rank_id", $id);
			return $this->db->get()->result();
		}

		public function createNewUserRank($data){
			$this->db->insert("users", $data);
		}

	}
	
?>