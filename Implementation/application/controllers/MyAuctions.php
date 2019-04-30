<?php
	
	class MyAuctions extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model("Auction");
			$this->load->model("UserBids");
		}

		private function loadPageLayout($page, $content=[]){
            $header_content["controller"] = "MyAuctions";
            $header_content["page_title"] = "My Bids / My Auctions";
            $header_content["page_icon"] = "list";

            $this->load->view("header.php", $header_content);
            $this->load->view($page, $content);
            $this->load->view("footer.php");

        }

		public function index(){

			if ($this->session->has_userdata("user")){
				$user = $this->session->userdata("user");

				$content["bids"] = $this->UserBids->getAllUserBids($user->username);
				$content["owned"] = $this->Auction->getAuctionsCreatedByUser($user->username);

				$this->loadPageLayout("pages/MyAuctions", $content);
			}
			else{
				redirect("InfoMessage/PageNotFound");
			}

		}

	}

?>