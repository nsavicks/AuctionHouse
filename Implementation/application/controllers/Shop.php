<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Shop
 *
 * @author Aleksandar
 */

/**
 * Controller for shop.
 */
class Shop extends CI_Controller{

        /**
         * constructor for this controller
         */
        public function __construct(){
            parent::__construct();
            $this->load->model("Auction");
            $this->load->model("AuctionCategories");
        }
        
        /**
         * Loads a page layout.
         *
         * @param      string  $page     The page
         * @param      array   $content  The content
         */
         private function loadPageLayout($page,$content=[]){
   
            $header_content["controller"] = "Shop";
            $header_content["page_title"] = "Shop";
            $header_content["page_icon"] = "cart";
           
            $this->load->view("header.php", $header_content);
            $this->load->view($page,$content);
            $this->load->view("footer.php");
        }

        /**
         * index function, default function called for this contoller
         */
        public function index(){
            $category=$this->input->get("category");
            $content["categories"] = $this->AuctionCategories->getAllCategories();
            if($category==NULL){
               $content["AllAuctions"]=$this->Auction->getActiveAuctions();
            }else{
                  $content["AllAuctions"]=$this->Auction->getAuctionByCategoryName($category);
           
            
            }
            $content["selected"]=$category;
             $this->loadPageLayout("pages/Shop.php",$content);
        }
}
