<?php
	/**
	 * Class for user rating.
	 */
	class User_rating extends CI_Model{
        /**
         * Constructor of this Model
         */
		public function __construct(){
			parent::__construct();
		}
        /**
         * Gets all user ratings.
         *
         * @return     array  All user ratings.
         */
		public function getAllUserRatings(){
			return $this->db->get("user_ratings")->result();
		}
        /**
         * Gets the user rataing pair.
         *
         * @param      User  $rated   The rated
         * @param      User  $rating  The rating
         *
         * @return     Collection  The user rataing pair.
         */
		public function getUserRataingPair($rated, $rating){
			$this->db->from("user_ratings");
			$this->db->where("rated_user", $rated);
			$this->db->where("rating_user", $rating);
			return $this->db->get()->result();
		}
        /**
         * Checks if there is pair of rated and rating user
         *
         * @param      User   $rated   The rated
         * @param      User   $rating  The rating
         *
         * @return     boolean 
         */
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
        /**
         * Creates a new user rating.
         *
         * @param      Collection  $data   The data
         */
		public function createNewUserRating($data){
			$this->db->insert("user_ratings", $data);
		}

	}
	
?>