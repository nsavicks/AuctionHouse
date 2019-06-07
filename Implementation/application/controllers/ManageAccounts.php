<?php

	/**
	 *@author Filip
	 * Controller class for ManageAccounts page
	 */
	class ManageAccounts extends CI_Controller{

		/**
		 * Default constructor for ManageAccounts controller
		 * @return
		 */
		public function __construct(){
			parent::__construct();
			$this->load->model("User");
		}

		/**
		 * Helper function for loading page layout
		 * @param string $page 
		 * @param object|array $content 
		 * @return
		 */
		private function loadPageLayout($page, $content=[]){
            $header_content["controller"] = "ManageAccounts";
            $header_content["page_title"] = "Manage Accounts";
            $header_content["page_icon"] = "gear";

            $this->load->view("header.php", $header_content);
            $this->load->view($page, $content);
            $this->load->view("footer.php");
        }

        /**
         * ManageAccounts index page loader
         * @return
         */
        public function index(){

        	if ($this->session->has_userdata("user")){
				// logged in

				$user = $this->session->userdata("user");
				if ($user->user_rank < 2){
					// not admin
				
					redirect("InfoMessage/BasicInfoMessageCase/NotAdmin");
				}
				else{
					// admin
				
					// showing all users except one that is logged in
					$content["users"] = $this->User->getAllUsersExcept($user->username);
        			$this->loadPageLayout("pages/ManageAccounts", $content);

				}
			}
			else{
				// not logged in
				
				redirect("InfoMessage/BasicInfoMessageCase/NotLoggedIn/Login/log in");
			}

		}
		
		/**
		 * Adds an administrator.
		 *
		 * @param      string  $username  The username
		 */
		public function AddAdministrator($username){
			if ($this->session->has_userdata("user")){
				// logged in
				
				$user = $this->session->userdata("user");
				if ($user->user_rank < 2){
					// not admin
				
					redirect("InfoMessage/BasicInfoMessageCase/NotAdmin");
				}
				else {
					// admin	
					
					$targetUser = $this->User->getUserHavingUsername($username);
					if ($targetUser[0]->user_rank == 2){
						// already admin
				
						redirect("InfoMessage/BasicInfoMessageCase/UserIsAdmin/ManageAccounts/manage accounts");
					}
					else{
						// setting admin privileges
				
						if ($targetUser[0]->banned == 1){
							redirect("InfoMessage/CantPromote");
						}
						else{
							$this->User->addAdmin($username);
							redirect("InfoMessage/BasicInfoMessageCase/AddAdministratorSuccess/ManageAccounts/manage accounts");
						}
					}
				}

			}
			else {
				//not logged in
				
				redirect("InfoMessage/BasicInfoMessageCase/NotLoggedIn/Login/log in");
			}
		}

		public function AddModerator($username){
			if ($this->session->has_userdata("user")){
				// logged in

				$user = $this->session->userdata("user");
				if ($user->user_rank < 2){
					// not admin
				
					redirect("InfoMessage/BasicInfoMessageCase/NotAdmin");
				}
				else {
					// admin

					$targetUser = $this->User->getUserHavingUsername($username);
					if ($targetUser[0]->user_rank == 2){
						// already admin
				
						redirect("InfoMessage/BasicInfoMessageCase/UserIsAdmin/ManageAccounts/manage accounts");
					}
					if ($targetUser[0]->user_rank == 1){
						// already moderator
				
						redirect("InfoMessage/BasicInfoMessageCase/UserIsModerator/ManageAccounts/manage accounts");
					}
					else{
						if ($targetUser[0]->banned == 1){
							redirect("InfoMessage/CantPromote");
						}
						else{
							$this->User->addModerator($username);
							redirect("InfoMessage/BasicInfoMessageCase/AddModeratorSuccess/ManageAccounts/manage accounts");
						}
					}
				}

			}
			else {
				// user is not logged in
				
				redirect("InfoMessage/BasicInfoMessageCase/NotLoggedIn");
			}
		}

		public function ClearPrivileges($username){
			if ($this->session->has_userdata("user")){
				// logged in
				
				$user = $this->session->userdata("user");
				if ($user->user_rank < 2){
					// not admin
				
					redirect("InfoMessage/BasicInfoMessageCase/NotAdmin");
				}
				else {
					// admin

					$targetUser = $this->User->getUserHavingUsername($username);
				
					if ($targetUser[0]->banned == 1){
							redirect("InfoMessage/CantPromote");
						}
						else{
							$this->User->clearPrivileges($username);
							redirect("InfoMessage/BasicInfoMessageCase/ClearPrivilegesSuccess/ManageAccounts/manage accounts");
						}
				}
			}
			else {
				// not logged in
				
				redirect("InfoMessage/BasicInfoMessageCase/NotLoggedIn/Login/log in");
			}
		}

		public function BanUser($username, $reason = ""){
			if ($this->session->has_userdata("user")){
				// logged in

				$user = $this->session->userdata("user");
				if ($user->user_rank < 2){
					// not admin
					
					redirect("InfoMessage/BasicInfoMessageCase/NotAdmin");
				}
				else {
					// admin

					$toBan = $this->User->getUserHavingUsername($username);

					if ($toBan[0]->banned == 1){
						redirect("InfoMessage/UserAlreadyBanned");
					}
					else{
						// OK

						if ($user->username == $username){
							redirect("InfoMessage/CantBanYourself");
						}
						else{
							$this->User->banUser($username, $user->username, $reason);
							redirect("InfoMessage/BasicInfoMessageCase/BanUserSuccess/ManageAccounts/manage accounts");
						}
						
					}
						
				}
			}
			else {
				// not logged in
				
				redirect("InfoMessage/BasicInfoMessageCase/NotLoggedIn/Login/log in");
			}
		}

		public function DeleteUser($username){

			redirect('InfoMessage/PageNotFound');

			if ($this->session->has_userdata("user")){
				// logged in

				$user = $this->session->userdata("user");
				if ($user->user_rank < 2){
					// not admin
					
					redirect("InfoMessage/BasicInfoMessageCase/NotAdmin");
				}
				else {
					// admin
					if ($this->User->numberOfActiveAuctions($username) > 0){
						redirect("InfoMessage/BasicInfoMessageCase/UserHasActiveAuctions/ManageAccounts/manage accounts");
					}
					$this->User->deleteUser($username);
					redirect("InfoMessage/BasicInfoMessageCase/DeleteUserSuccess/ManageAccounts/manage accounts");
				}
			}
			else {
				// not logged in
				
				redirect("InfoMessage/BasicInfoMessageCase/NotLoggedIn/Login/log in");
			}
		}

	}

?>