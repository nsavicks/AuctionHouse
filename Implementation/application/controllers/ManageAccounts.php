<?php

	
	class ManageAccounts extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model("User");
		}

		private function loadPageLayout($page, $content=[]){
            $header_content["controller"] = "ManageAccounts";
            $header_content["page_title"] = "Manage Accounts";
            $header_content["page_icon"] = "gear";

            $this->load->view("header.php", $header_content);
            $this->load->view($page, $content);
            $this->load->view("footer.php");
        }

        public function index(){

        	if ($this->session->has_userdata("user")){
				$user = $this->session->userdata("user");

				if ($user->user_rank < 2){
					redirect("InfoMessage/PageNotFound");
				}
				else{

					$content["users"] = $this->User->getAllUsers();

        			$this->loadPageLayout("pages/ManageAccounts",$content);

				}
			}
			else{
				redirect("InfoMessage/PageNotFound");
			}

        }

	}

?>