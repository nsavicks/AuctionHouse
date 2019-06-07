<?php
	/**
	 *@author Nebojsa
	 * Class for auction categories.
	 */
	class AuctionCategories extends CI_Model{
		/**
		 * constructor for this Model
		 */
		public function __construct(){
			parent::__construct();
		}
		/**
		 * Gets all categories.
		 *
		 * @return     array  All categories.
		 */
		public function getAllCategories(){
			return $this->db->get("auction_categories")->result();
		}
		/**
		 * Gets the category identifier.
		 *
		 * @param      string  $name   The name
		 *
		 * @return     int  The category identifier.
		 */
		public function getCategoryId($name){
			$this->db->from("auction_categories");
			$this->db->where("category_name", $name);

			return $this->db->get()->result()[0]->category_id;
		}

	}

?>