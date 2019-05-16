<?php

    class SingleAuction extends CI_Controller{

        public function __construct(){
            parent::__construct();

            $this->load->model('Auction');
            $this->load->model('UserBids');

            $id = $this->input->get("id");
            $auction = $this->Auction->getAuctionById($id)[0];

            if($auction == null){
                redirect("InfoMessage/PageNotFound");
            }

            $logged_user = $this->session->userdata("user");

            if($logged_user == null || $logged_user->user_rank == 0){
                if($auction->auction_state == 'Denied' || $auction->auction_state == 'Pending confirmation')
                    redirect("InfoMessage/PageNotFound");

            }

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
            $bid = $this->Auction->getMaxBid($id);

            $content["auction"] = $auction;
            $content["bid"] = $bid;
            $this->loadPageLayout("pages/SingleAuction.php", $content);

        }

        public function Bid(){
            $old_value = $this->input->post("old_bid_value");
            $new_bid = $this->input->post("bid");

            if($old_value == null)
                redirect("InfoMessage/PageNotFound");

            $id = $this->input->get("id");
            $auction = $this->Auction->getAuctionById($id)[0];
            $bid = $this->Auction->getMaxBid($id);

            if($bid->bid_value != $old_value){
                redirect(base_url() .'InfoMessage/AuctionChanged?id=' . $auction->auction_id);
            }

            $bid_time = date("Y-m-d H:i:s");
            $logged_user = $this->session->userdata("user")->username;

            $this->UserBids->createBid($auction->auction_id, $logged_user, $bid_time, $new_bid);
            
            redirect(base_url() .'InfoMessage/BidSuccessful?id=' . $auction->auction_id);
            //redirect(base_url() . 'SingleAuction?id=' . $auction->auction_id);

            //$content["auction"] = $auction;
            //$content["bid"] = $bid;
            //$this->loadPageLayout("pages/SingleAuction.php", $content);

        }

        

    }

?>