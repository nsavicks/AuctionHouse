<?php 

	
	class InfoMessage extends CI_Controller{

		public function __construct(){
			parent::__construct();
		}

		private function loadPageLayout($page, $content=[]){
            $header_content["controller"] = "InfoMessage";
            $header_content["page_title"] = "Info Message";
            $header_content["page_icon"] = "new";

            $this->load->view("header.php", $header_content);
            $this->load->view($page, $content);
            $this->load->view("footer.php");
        }

		public function index(){
			
			redirect("InfoMessage/PageNotFound");

		}

		public function PageNotFound(){

			$content["icon"] = "warning";
			$content["message"] = "Error 404: Page not found!";
			$content["buttonText"] = "Go to Home";
			$content["buttonLink"] = base_url();

			$this->loadPageLayout("pages/InfoMessage", $content);

		}

		public function RegistrationFailedBadUsername(){
			$content["icon"] = "warning";
			$content["message"] = "Registration failed: User with given username already exist!";
			$content["buttonText"] = "Go back";
			$content["buttonLink"] = base_url() . "Register";

			$this->loadPageLayout("pages/InfoMessage", $content);
		}

		public function RegistrationFailedBadEmail(){
			$content["icon"] = "warning";
			$content["message"] = "Registration failed: User with given email already exist!";
			$content["buttonText"] = "Go back";
			$content["buttonLink"] = base_url() . "Register";

			$this->loadPageLayout("pages/InfoMessage", $content);
		}

		public function PictureUploadFailed(){
			$content["icon"] = "warning";
			$content["message"] = "Error: File upload failed!";
			$content["buttonText"] = "Go back";
			$content["buttonLink"] = base_url() . "Register";

			$this->loadPageLayout("pages/InfoMessage", $content);
		}

		public function RegistrationSuccessful(){
			$content["icon"] = "check";
			$content["message"] = "Registration successful: You can now login with your account!";
			$content["buttonText"] = "Log in";
			$content["buttonLink"] = base_url() . "Login";

			$this->loadPageLayout("pages/InfoMessage", $content);
		}

		public function LoginSuccessful(){
			$content["icon"] = "check";
			$content["message"] = "Login successful!";
			$content["buttonText"] = "My profile";
			$content["buttonLink"] = base_url() . "UserProfile?username=" . $this->session->userdata("user")->username;

			$this->loadPageLayout("pages/InfoMessage", $content);
		}
		public function LoginFailed(){
			$content["icon"] = "warning";
			$content["message"] = "Login failed: check your username or password and try again.";
			$content["buttonText"] = "Back";
			$content["buttonLink"] = base_url() . "Login";

			$this->loadPageLayout("pages/InfoMessage", $content);
		}

		public function ChangePasswordSuccessfull(){
			$content["icon"] = "check";
			$content["message"] = "Password successfully changed!";
			$content["buttonText"] = "My profile";
			$content["buttonLink"] = base_url() . "UserProfile?username=" . $this->session->userdata("user")->username;

			$this->loadPageLayout("pages/InfoMessage", $content);
		}

		public function SamePassword(){
			$content["icon"] = "warning";
			$content["message"] = "Old and new passwords are same: please type in new password and try again.";
			$content["buttonText"] = "Back";
			$content["buttonLink"] = base_url() . "ChangePassword";

			$this->loadPageLayout("pages/InfoMessage", $content);
		}

		public function WrongRepeatPassword(){
			$content["icon"] = "warning";
			$content["message"] = "New passwords are not same: please type in correct passwords and try again.";
			$content["buttonText"] = "Back";
			$content["buttonLink"] = base_url() . "ChangePassword";

			$this->loadPageLayout("pages/InfoMessage", $content);
		}

		public function WrongPassword(){
			$content["icon"] = "warning";
			$content["message"] = "Not valid password: please type in correct password and try again.";
			$content["buttonText"] = "Back";
			$content["buttonLink"] = base_url() . "ChangePassword";

			$this->loadPageLayout("pages/InfoMessage", $content);
		}

		public function LogoutSuccessful(){
			$content["icon"] = "check";
			$content["message"] = "Success: You have successfully logged out!";
			$content["buttonText"] = "Go to Home";
			$content["buttonLink"] = base_url();

			$this->loadPageLayout("pages/InfoMessage", $content);
		}

		public function AuctionNotFound(){
			$content["icon"] = "warning";
			$content["message"] = "Error: The auction you have been looking for has not been found!";
			$content["buttonText"] = "Go to Home";
			$content["buttonLink"] = base_url();

			$this->loadPageLayout("pages/InfoMessage", $content);
		}

		public function AuctionAddedSuccess(){
			$content["icon"] = "check";
			$content["message"] = "Success: You have successfully create an auction!";
			$content["buttonText"] = "Go to Home";
			$content["buttonLink"] = base_url();

			$this->loadPageLayout("pages/InfoMessage", $content);
		}

		public function AuctionApproveSuccess(){
			$content["icon"] = "check";
			$content["message"] = "Success: You have successfully approved auction!";
			$content["buttonText"] = "Go back";
			$content["buttonLink"] = base_url() . 'Dashboard';

			$this->loadPageLayout("pages/InfoMessage", $content);
		}

		public function AuctionApproveFailed(){
			$content["icon"] = "warning";
			$content["message"] = "Error: There was a problem approving auction";
			$content["buttonText"] = "Go back";
			$content["buttonLink"] = base_url() . 'Dashboard';

			$this->loadPageLayout("pages/InfoMessage", $content);
		}

		public function AuctionDenySuccess(){
			$content["icon"] = "check";
			$content["message"] = "Success: You have successfully denied auction!";
			$content["buttonText"] = "Go back";
			$content["buttonLink"] = base_url() . 'Dashboard';

			$this->loadPageLayout("pages/InfoMessage", $content);
		}

		public function AuctionDenyFailed(){
			$content["icon"] = "warning";
			$content["message"] = "Error: There was a problem denying auction";
			$content["buttonText"] = "Go back";
			$content["buttonLink"] = base_url() . 'Dashboard';

			$this->loadPageLayout("pages/InfoMessage", $content);
		}

		public function AuctionDeleteSuccess(){
			$content["icon"] = "check";
			$content["message"] = "Success: You have successfully deleted auction!";
			$content["buttonText"] = "Go back";
			$content["buttonLink"] = base_url() . 'Dashboard';

			$this->loadPageLayout("pages/InfoMessage", $content);
		}

		public function LoginNeeded(){
			$content["icon"] = "warning";
			$content["message"] = "Error: You are not logged in";
			$content["buttonText"] = "Go to login page";
			$content["buttonLink"] = base_url() . "Login";

			$this->loadPageLayout("pages/infoMessage", $content);
		}

		/**
		 * function for showing message info page
		 * in this function you can specify all the parameters you need
		 */
		public function BasicInfoMessage($mode, $message, $buttonMessage, $buttonLink){
			$content["icon"] = $mode;
			$content["message"] = $message;
			$content["buttonText"] = $buttonMessage;
			$content["buttonLink"] = base_url() . $buttonLink;

			$this->loadPageLayout("pages/infoMessage", $content);
		}

		/**
		 * function for showing message info page
		 * parameters:
		 * 		mode - specifying for which mode you are calling this function
		 * 		buttonLinkPage - where will click on button that appears on this screen take you to
		 * 		btnText - text that will be shown on button that appears on this screen
		 * 
		 * If you want to add new case (new mode) then you just need to add new case in switch
		 */
		public function BasicInfoMessageCase ($mode, $buttonLinkPage = "", $btnText = "home"){
			$buttonText = urldecode($btnText);
			switch ($mode){
				case "NotAdmin":
					$content["icon"] = "warning";
					$content["message"] = "Error: You are not admin";
					$content["buttonText"] = "Go to " . $buttonText;
					$content["buttonLink"] = base_url() . $buttonLinkPage;
					break;

				case "NotLoggedIn":
					$content["icon"] = "warning";
					$content["message"] = "Error: You are not logged in";
					$content["buttonText"] = "Go to " . $buttonText;
					$content["buttonLink"] = base_url() . $buttonLinkPage;
					break;

				case "AddAdministratorSuccess":	
					$content["icon"] = "check";
					$content["message"] = "Successfully promoted to admin";
					$content["buttonText"] = "Go to " . $buttonText;
					$content["buttonLink"] = base_url() . $buttonLinkPage;
					break;

				case "AddModeratorSuccess":	
					$content["icon"] = "check";
					$content["message"] = "Successfully promoted to moderator";
					$content["buttonText"] = "Go to " . $buttonText;
					$content["buttonLink"] = base_url() . $buttonLinkPage;
					break;
				
				case "ClearPrivilegesSuccess":	
					$content["icon"] = "check";
					$content["message"] = "Successfully cleared privileges";
					$content["buttonText"] = "Go to " . $buttonText;
					$content["buttonLink"] = base_url() . $buttonLinkPage;
					break;

				case "BanUserSuccess":
					$content["icon"] = "check";
					$content["message"] = "Successfully banned user";
					$content["buttonText"] = "Go to " . $buttonText;
					$content["buttonLink"] = base_url() . $buttonLinkPage;
					break;

				case "DeleteUserSuccess":
					$content["icon"] = "check";
					$content["message"] = "Sucessfully deleted user";
					$content["buttonText"] = "Go to " . $buttonText;
					$content["buttonLink"] = base_url() . $buttonLinkPage;
					break;

				case "UserIsAdmin":
					$content["icon"] = "warning";
					$content["message"] = "User is administrator";
					$content["buttonText"] = "Go to " . $buttonText;
					$content["buttonLink"] = base_url() . $buttonLinkPage;
					break;

				case "UserIsModerator":
					$content["icon"] = "warning";
					$content["message"] = "User is moderator";
					$content["buttonText"] = "Go to " . $buttonText;
					$content["buttonLink"] = base_url() . $buttonLinkPage;
					break;

				case "UserIsBanned":
					$content["icon"] = "warning";
					$content["message"] = "User is banned";
					$content["buttonText"] = "Go to " . $buttonText;
					$content["buttonLink"] = base_url() . $buttonLinkPage;
					break;

				case "UserHasActiveAuctions":
					$content["icon"] = "warning";
					$content["message"] = "User has active auctions";
					$content["buttonText"] = "Go to " . $buttonText;
					$content["buttonLink"] = base_url() . $buttonLinkPage;
					break;	
			}

			$this->loadPageLayout("pages/infoMessage", $content);

		}

	}


?>