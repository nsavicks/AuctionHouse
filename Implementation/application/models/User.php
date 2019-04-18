<?php
	
	class User extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		public function getAllUsers(){
			return $this->db->get("users")->result();
		}

		public function getUserHavingUsername($username){
			$this->db->from("users");
			$this->db->where("username", $username);
			return $this->db->get()->result();
		}

		public function getUserHavingEmail($email){
			$this->db->from("users");
			$this->db->where("email", $email);
			return $this->db->get()->result();
		}

		public function isSuccessfulLogin($username, $password){
			$this->db->from("users");
			$this->db->where("username", $username);
			$this->db->where("password", $password);
			if (count($this->db->get()->result()) > 0){
				return true;
			}
			else{
				return false;
			}
		}

		public function createNewUser($data){
			$this->db->insert("users", $data);
		}

	}
	
?>