<?php
	
	class User extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		/**
		 * getting all users except one with username = $myUsername
		 * used for showing all users except one that is logged in
		 * for example when showing all users that admin can ban or delete (user can't ban himself)
		 */
		public function getAllUsersExcept($myUsername){
			$this->db->select("*");
			$this->db->from("users u, user_ranks r");
			$this->db->where("u.user_rank = r.rank_id");
			$this->db->where("u.username !=", $myUsername);

			return $this->db->get()->result();
		}

		/**
		 * getting list all data from users table
		 */
		public function getAllUsers(){
			$this->db->select("*");
			$this->db->from("users u, user_ranks r");
			$this->db->where("u.user_rank = r.rank_id");

			return $this->db->get()->result();
		}

		/**
		 * getting row from users table where username = $username
		 */
		public function getUserHavingUsername($username){
			$this->db->from("users");
			$this->db->where("username", $username);
			return $this->db->get()->result();
		}

		/**
		 * getting row from users table where email = $email
		 */
		public function getUserHavingEmail($email){
			$this->db->from("users");
			$this->db->where("email", $email);
			return $this->db->get()->result();
		}

		/**
		 * testing if login there exists row in table users where username = $username and password = $password
		 */
		public function isSuccessfulLogin($username, $password){
			$this->db->from("users");
			$this->db->where("username", $username);

			$row = $this->db->get()->result();

			if (count($row) == 1 && password_verify($password, $row[0]->password)){
				return true;
			}
			else{
				return false;
			}
		}

		/**
		 * banning user with username = $username, from admin = $admin and with ban_reason = $reason
		 */
		public function banUser($username, $admin, $reason){
			// adding data to user_bans table
			$data["banned_user"] = $username;
			$data["administrator"] = $admin;
			$data["ban_reason"] = $reason;
			$data["ban_time"] = date("Y-m-d H:i:s");
			$this->db->insert("user_bans", $data);

			// setting banned flag to 1 in users table
			$this->db->set("banned", 1);
			$this->db->set("user_rank",3);
			$this->db->where("username", $username);
			$this->db->update("users");

		}

		/**
		 * deleting user with username = $username from users table
		 */
		public function deleteUser($username){
			$this->db->where("username", $username);
			$this->db->delete("users");
		}

		/**
		 * creating new user
		 */
		public function createNewUser($data){
			$this->db->insert("users", $data);
		}

		/**
		 * adding admin privileges to user with username = $username
		 */
		public function addAdmin($username){
			$this->db->set("user_rank", 2);
			$this->db->where("username", $username);
			$this->db->update("users");
		}

		/**
		 * adding moderator privileges to user with username = $username
		 */
		public function addModerator($username){
			$this->db->set("user_rank", 1);
			$this->db->where("username", $username);
			$this->db->update("users");
		}

		/**
		 * clearing privileges to user with username = $username
		 */
		public function clearPrivileges($username){
			$this->db->set("user_rank", 0);
			$this->db->where("username", $username);
			$this->db->update("users");
		}

		public function changePassword($username, $newpassword){
			$this->db->set('password', $newpassword);
			$this->db->where('username', $username);
			$this->db->update('users');
		}

		public function numberOfActiveAuctions($username){
			$this->db->from("users u");
			$this->db->join("auctions a", "a.auction_owner = u.username");
			$this->db->where("a.auction_state", "Active");
			$this->db->where("u.username", $username);

			$query = $this->db->get();

			return $query->num_rows();
		}

	}
	
?>