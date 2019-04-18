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

	}


?>