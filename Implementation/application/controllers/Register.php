<?php 

	
	class Register extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->model("User");
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
			
			$this->loadPageLayout("pages/Register");

		}

		public function Submit(){

			$data["profile_picture"] = $this->input->post("ppicture");
			$data["first_name"] = $this->input->post("fname");
			$data["last_name"] = $this->input->post("lname");
			$data["date_of_birth"] = $this->input->post("birthdate");
			$data["gender"] = $this->input->post("gender");
			$data["state"] = $this->input->post("state");
			$data["telephone"] = $this->input->post("telephone");
			$data["email"] = $this->input->post("email");
			$data["username"] = $this->input->post("username");
			$data["password"] = $this->input->post("password");
			$data["create_time"] = date("Y-m-d H:i:s");;

			$checkUsername = $this->User->getUserHavingUsername($data["username"]);
			$checkEmail = $this->User->getUserHavingEmail($data["email"]);

			if (count($checkUsername) > 0){
				redirect("InfoMessage/RegistrationFailedBadUsername");
			}

			if (count($checkEmail) > 0){
				redirect("InfoMessage/RegistrationFailedBadEmail");
			}

			// telephon regex

			$this->User->createNewUser($data);

			redirect("InfoMessage/RegistrationSuccessful");

		}

	}


?>