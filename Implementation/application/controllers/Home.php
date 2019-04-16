<?php

    class Home extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model("Auction");
        }

        private function loadPageLayout($page, $content=[]){
            $this->load->view("header.php",["controller"=>"Home"]);
            $this->load->view($page, $content);
            $this->load->view("footer.php");
        }

        public function index(){
            $newest = $this->Auction->getNewestAuctions(4);
            $featured = $this->Auction->getFeaturedAuctions(4);
            $this->loadPageLayout("pages/Home.php", ["newest" => $newest, "featured" => $featured]);
        }

    }

?>