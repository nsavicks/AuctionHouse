<?php

	/**
	 * 
	 */
	class Dashboard extends CI_Controller{


		/**
		 * Description
		 * @return type
		 */
		public function __construct(){
			parent::__construct();
			$this->load->model("Auction");
		}


		/**
		 * Description
		 * @param type $page 
		 * @param type|array $content 
		 * @return type
		 */
		private function loadPageLayout($page, $content=[]){
            $header_content["controller"] = "Dashboard";
            $header_content["page_title"] = "Dashboard";
            $header_content["page_icon"] = "securityW";

            $this->load->view("header.php", $header_content);
            $this->load->view($page, $content);
            $this->load->view("footer.php");
        }

        /**
         * Description
         * @return type
         */
		public function index(){

			if ($this->session->has_userdata("user")){
				$user = $this->session->userdata("user");

				
				if ($user->user_rank < 1){
					redirect("InfoMessage/PageNotFound");
				}
				else{

					$content["pending"] = $this->Auction->getPendingAuctions();
					$content["all"] = $this->Auction->getAllAuctions();

					$this->loadPageLayout("pages/Dashboard.php", $content);

				} 
			}
			else{
				redirect("InfoMessage/PageNotFound");
			}

		}

	}


?>
