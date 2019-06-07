<?php

	/**
	 * Class for ajax api.
	 */
	class AjaxAPI extends CI_Controller{

		public function __construct(){

			parent::__construct();

			$this->load->model("User");
			$this->load->model("Auction");

		}

		public function getAllAuctions(){

			$auctions = $this->Auction->getAllAuctions();

			echo json_encode($auctions);

		}

		public function getPendingAuctions(){

			$auctions = $this->Auction->getPendingAuctions();

			echo json_encode($auctions);

		}

		public function getAllUsers(){

			$users = $this->User->getAllUsers();

			echo json_encode($users);

		}

	}

?>