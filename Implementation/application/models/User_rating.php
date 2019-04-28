<?php
	
	class User_rating extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		public function getAllUserRatings(){
			return $this->db->get("user_ratings")->result();
		}

		public function getUserRataingPair($rated, $rating){
			$this->db->from("user_ratings");
			$this->db->where("rated_user", $rated);
			$this->db->where("rating_user", $rating);
			return $this->db->get()->result();
		}

		public function checkForPair($rated, $rating){
			$this->db->from("user_ratings");
			$this->db->where("rated_user", $rated);
			$this->db->where("rating_user", $rating);
			$row = $this->db->get()->result();

			if (count($row) == 1)
				return true;
			else 
				return false;

		}

		public function createNewUserRating($data){
			$this->db->insert("user_ratings", $data);
		}

	}
	
?>