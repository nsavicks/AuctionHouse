<?php

    class Home extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model("Auction");
        }

        private function loadPageLayout($page, $content=[]){
            $header_content["controller"] = "Home";
            $header_content["page_title"] = "Welcome to Auction house ™!";
            $header_content["page_icon"] = "star";

            $this->load->view("header.php", $header_content);
            $this->load->view($page, $content);
            $this->load->view("footer.php");
        }

        public function index(){
            $content["newest"] = $this->Auction->getNewestAuctions(4);
            $content["featured"] = $this->Auction->getFeaturedAuctions(4);
            $this->loadPageLayout("pages/Home.php", $content);
        }

    }

?>