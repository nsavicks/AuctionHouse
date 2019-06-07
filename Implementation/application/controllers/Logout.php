<?php
	/**
	 *@author Filip
	 * Controller for logout.
	 */
	class Logout extends CI_Controller{

		/**
		 * constructor for controller
		 */
		public function __construct(){
			parent::__construct();
		}

		/**
		 * index function, default function called for this contoller
		 */
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