<?php 

	
	class Register extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->model("User");
		}

		private function loadPageLayout($page, $content=[]){
            $header_content["controller"] = "Register";
            $header_content["page_title"] = "Register";
            $header_content["page_icon"] = "register";

            $this->load->view("header.php", $header_content);
            $this->load->view($page, $content);
            $this->load->view("footer.php");

        } 

		public function index(){
			
			$this->loadPageLayout("pages/Register");

		}

		public function Submit(){

			$data["first_name"] = $this->input->post("fname");
			$data["last_name"] = $this->input->post("lname");
			$data["date_of_birth"] = $this->input->post("birthdate");
			$data["gender"] = $this->input->post("gender");
			$data["state"] = $this->input->post("state");
			$data["telephone"] = $this->input->post("telephone");
			$data["email"] = $this->input->post("email");
			$data["username"] = $this->input->post("username");
			$data["password"] = password_hash($this->input->post("password"), PASSWORD_DEFAULT);
			$data["create_time"] = date("Y-m-d H:i:s");;

			$checkUsername = $this->User->getUserHavingUsername($data["username"]);
			$checkEmail = $this->User->getUserHavingEmail($data["email"]);

			// Check if username exist

			if (count($checkUsername) > 0){
				redirect("InfoMessage/RegistrationFailedBadUsername");
			}

			// Check if email exist

			if (count($checkEmail) > 0){
				redirect("InfoMessage/RegistrationFailedBadEmail");
			}

			// Check telephone format


			// Upload profile picture

			$path = "assets/MEDIA/users/" . $data["username"];

			if (!file_exists($path)){
				mkdir($path, 0777, true);
			}

			$config["upload_path"] = $path . "/";
			$config["allowed_types"] = 'gif|jpg|png';

            $this->upload->initialize($config);

            if (! $this->upload->do_upload("ppicture")){

            	redirect("InfoMessage/PictureUploadFailed");  	
            }

            $data["profile_picture"] = $this->upload->data("file_name");

            // Create user

			$this->User->createNewUser($data);

			redirect("InfoMessage/RegistrationSuccessful");

		}

	}


?>