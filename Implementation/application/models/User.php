<?php
	
	class User extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		public function getAllUsers(){
			return $this->db->get("users")->result();
		}

	}
	
?>