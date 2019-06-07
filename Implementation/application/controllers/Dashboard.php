<?php

	/**
	 *@author Filip
	 * Controller class for Dashboard page
	 */
	class Dashboard extends CI_Controller{


		/**
		 * Default constructor for Dashboard controller
		 * @return
		 */
		public function __construct(){
			parent::__construct();
			$this->load->model("Auction");
		}


		/**
		 * Helper function for loading page layout
		 * @param string $page 
		 * @param object|array $content 
		 * @return
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
         * Dashboard index page loader
         * @return
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

		/**
		 * Approve auction call function
		 * @param int $id 
		 * @return
		 */
		public function ApproveAuction($id){

			if ($this->session->has_userdata("user")){
				$user = $this->session->userdata("user");
				
				if ($user->user_rank < 1){
					redirect("InfoMessage/PageNotFound");
				}
				else{

					$auction = $this->Auction->getAuctionById($id);

					if (count($auction) == 1){

						if ($auction[0]->auction_state == "Pending confirmation"){

							$start = date("Y-m-d H:i:s");
							$end = date("Y-m-d H:i:s", strtotime($start . ' + ' . $auction[0]->duration . ' days'));	

							$this->db->set("auction_state", "Active");
							$this->db->set("start_time", $start);
							$this->db->set("end_time", $end);
							$this->db->where("auction_id", $id);
							$this->db->update("auctions");

							redirect("InfoMessage/AuctionApproveSuccess");

						}
						else{
							redirect("InfoMessage/AuctionApproveFailed");
						}

					}
					else{
						redirect("InfoMessage/AuctionNotFound");
					}

				} 
			}
			else{
				redirect("InfoMessage/PageNotFound");
			}

		}

		/**
		 * Deny auction call function
		 * @param int $id 
		 * @return
		 */
		public function DenyAuction($id){

			if ($this->session->has_userdata("user")){
				$user = $this->session->userdata("user");
				
				if ($user->user_rank < 1){
					redirect("InfoMessage/PageNotFound");
				}
				else{

					$auction = $this->Auction->getAuctionById($id);

					if (count($auction) == 1){

						if ($auction[0]->auction_state == "Pending confirmation"){

							$this->db->set("auction_state", "Denied");
							$this->db->where("auction_id", $id);
							$this->db->update("auctions");

							redirect("InfoMessage/AuctionDenySuccess");

						}
						else{
							redirect("InfoMessage/AuctionDenyFailed");
						}

					}
					else{
						redirect("InfoMessage/AuctionNotFound");
					}

				} 
			}
			else{
				redirect("InfoMessage/PageNotFound");
			}

		}

		/**
		 * Delete auction call function
		 * @param int $id 
		 * @return
		 */
		public function DeleteAuction($id){

			if ($this->session->has_userdata("user")){
				$user = $this->session->userdata("user");
				
				if ($user->user_rank < 1){
					redirect("InfoMessage/PageNotFound");
				}
				else{

					$auction = $this->Auction->getAuctionById($id);

					if (count($auction) == 1){

						$this->db->where("auction_id",$id);
						$this->db->delete("auctions");

						redirect("InfoMessage/AuctionDeleteSuccess");
					}
					else{
						redirect("InfoMessage/AuctionNotFound");
					}

				} 
			}
			else{
				redirect("InfoMessage/PageNotFound");
			}

		}

	}


?>
