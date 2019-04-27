<?php

	class AuctionCategories extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		public function getAllCategories(){
			return $this->db->get("auction_categories")->result();
		}

		public function getCategoryId($name){
			$this->db->from("auction_categories");
			$this->db->where("category_name", $name);

			return $this->db->get()->result()[0]->category_id;
		}

	}

?>