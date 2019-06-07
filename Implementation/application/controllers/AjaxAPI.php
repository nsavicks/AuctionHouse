<?php
	/**
	 *	@author Nebojsa
	 * Class for ajax api.
	 */
	class AjaxAPI extends CI_Controller{
		/**
		 * constructor for controller
		 */
		public function __construct(){
			parent::__construct();
			$this->load->model("User");
			$this->load->model("Auction");
		}
		/**
		 * Gets all auctions.
		 */
		public function getAllAuctions(){
			$auctions = $this->Auction->getAllAuctions();
			echo json_encode($auctions);
		}
		/**
		 * Gets the pending auctions.
		 */
		public function getPendingAuctions(){
			$auctions = $this->Auction->getPendingAuctions();
			echo json_encode($auctions);
		}
		/**
		 * Gets all users.
		 */
		public function getAllUsers(){
			$users = $this->User->getAllUsers();
			echo json_encode($users);
		}
	}
?>