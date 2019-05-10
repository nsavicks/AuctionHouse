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
class Shop extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model("Auction");
        }
        
         private function loadPageLayout($page){
            $header_content["controller"] = "Shop";
            $header_content["page_title"] = "Shop";
            $header_content["page_icon"] = "cart";

            $this->load->view("header.php", $header_content);
            $this->load->view($page);
            $this->load->view("footer.php");
        }

        public function index(){
           // $content["newest"] = $this->Auction->getNewestAuctions(4);
           // $content["featured"] = $this->Auction->getFeaturedAuctions(4);
          
            $this->loadPageLayout("pages/Shop.php");
        }
}
