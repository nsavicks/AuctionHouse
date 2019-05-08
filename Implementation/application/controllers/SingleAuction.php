<?php

    class SingleAuction extends CI_Controller{

        public function __construct(){
            parent::__construct();

            $this->load->model('Auction');

        }

        private function loadPageLayout($page, $content=[]){
            $header_content["controller"] = "SingleAuction";
            $header_content["page_title"] = "Auction Item";
            //ovde treba da se postavi ono lice
            $header_content["page_icon"] = "money";

            $this->load->view("header.php", $header_content);
            $this->load->view($page, $content);
            $this->load->view("footer.php");
        }

        public function index(){
            $id = $this->input->get("id");
            
            $auction = $this->Auction->getAuctionById($id)[0];

            if($auction == null){
                redirect("InfoMessage/PageNotFound");
            }

            $content["auction"] = $auction;
            $this->loadPageLayout("pages/SingleAuction.php", $content);

        }

        

    }

?>