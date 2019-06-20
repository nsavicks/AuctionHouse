<?php
	
	/**
	 *@author Aleksandar
	 * Class for user rank.
	 */
	class User_rank extends CI_Model{
        /**
         * Constructor for this Model
         */
		public function __construct(){
			parent::__construct();
		}
        /**
         * Gets all user ranks.
         *
         * @return     array  All user ranks.
         */
		public function getAllUserRanks(){
			return $this->db->get("user_ranks")->result();
		}
        /**
         * Gets the users rank with specified id.
         *
         * @param      int  $id     The identifier
         *
         * @return     int  The user rank having identifier.
         */
		public function getUserRankHavingId($id){
			$this->db->from("user_ranks");
			$this->db->where("rank_id", $id);
			return $this->db->get()->result();
		}
        /**
         * Creates a new user rank.
         *
         * @param      Collection  $data   The data
         */
		public function createNewUserRank($data){
			$this->db->insert("users", $data);
		}

	}
	
?>