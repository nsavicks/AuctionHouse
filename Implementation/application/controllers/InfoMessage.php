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
			$content["buttonLink"] = base_url() . "Profile?username=" . $this->session->userdata("user")->username;

			$this->loadPageLayout("pages/InfoMessage", $content);
		}
		public function LoginFailed(){
			$content["icon"] = "warning";
			$content["message"] = "Login failed: check your username or password and try again.";
			$content["buttonText"] = "Back";
			$content["buttonLink"] = base_url() . "Login";

			$this->loadPageLayout("pages/InfoMessage", $content);
		}

		public function LogoutSuccessful(){
			$content["icon"] = "check";
			$content["message"] = "Success: You have successfully logged out!";
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

	}


?>