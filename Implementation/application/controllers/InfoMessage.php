<?php 

	
	class InfoMessage extends CI_Controller{

		public function __construct(){
			parent::__construct();
		}

		private function loadPageLayout($page, $content=[]){
            $header_content["controller"] = "Register";
            $header_content["page_title"] = "Welcome to Auction house ™!";
            $header_content["page_icon"] = "star";

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
			$content["message"] = "Registration failed: Profile picture upload failed!";
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


	}


?>