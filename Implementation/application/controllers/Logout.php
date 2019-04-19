<?php
	
	class Logout extends CI_Controller{

		public function __construct(){
			parent::__construct();
		}

		public function index(){

			if ($this->session->has_userdata("user")){

				$this->session->unset_userdata("user");
				redirect("InfoMessage/LogoutSuccessful");
			}
			else{
				redirect("InfoMessage/PageNotFound");
			}
			
		}

	}

?>