<?php 

	/**
	 *@author Nebojsa, Filip
	 * Controller for register.
	 */
	class Register extends CI_Controller{

		/**
		 * constructor for controller
		 */
		public function __construct(){
			parent::__construct();

			$this->load->model("User");
		}

		/**
		 * Loads a page layout.
		 *
		 * @param      string  $page     The page
		 * @param      array   $content  The content
		 */
		private function loadPageLayout($page, $content=[]){
            $header_content["controller"] = "Register";
            $header_content["page_title"] = "Register";
            $header_content["page_icon"] = "register";

            $this->load->view("header.php", $header_content);
            $this->load->view($page, $content);
            $this->load->view("footer.php");

        } 

        /**
         * index function, default function called for this contoller
         */
		public function index(){

			if ($this->session->has_userdata("user")){

				redirect("InfoMessage/PageNotFound");
			}
			else{

				$this->loadPageLayout("pages/Register");
			}
		}

		/**
		 * function which cheks and handles submit
		 */
		public function Submit(){

			if ($this->session->has_userdata("user")){
				
				redirect("InfoMessage/PageNotFound");
			}
			else{

				$data["first_name"] = $this->input->post("fname");
				$data["last_name"] = $this->input->post("lname");
				$data["date_of_birth"] = $this->input->post("birthdate");
				$data["gender"] = $this->input->post("gender");
				$data["state"] = $this->input->post("state");
				$data["telephone"] = $this->input->post("telephone");
				$data["email"] = $this->input->post("email");
				$data["username"] = $this->input->post("username");
				$data["password"] = password_hash($this->input->post("password"), PASSWORD_DEFAULT);
				$data["create_time"] = date("Y-m-d H:i:s");

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

				if (!empty($_FILES['ppicture']['name'])){

					$path = "UPLOAD/users/" . $data["username"];

					if (!file_exists($path)){
						mkdir($path, 0777, true);
					}

					$config["upload_path"] = $path . "/";
					$config["allowed_types"] = 'gif|jpg|png';
					$config['max_size'] = '10240';

		            $this->upload->initialize($config);

		            if (! $this->upload->do_upload("ppicture")){
		            	//echo $this->upload->display_errors(); 
		            	rmdir($path);
		            	redirect("InfoMessage/PictureUploadFailed");  	
		            }

		            $data["profile_picture"] = $this->upload->data("file_name");

				}

	         
	            // Create user

				$this->User->createNewUser($data);

				redirect("InfoMessage/RegistrationSuccessful");

			} // END OF ELSE

		}

	}


?>