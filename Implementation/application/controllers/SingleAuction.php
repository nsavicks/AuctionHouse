<?php
    /**
     * this is controller for showing single auction
     */
    class SingleAuction extends CI_Controller{

        // auction that is getted in constructor
        private $auction = null;
            
        public function __construct(){

            parent::__construct();

            $this->load->model('Auction');
            $this->load->model('UserBids');

            // getting auction with corresponding id
            $id = $this->input->get("id");
            $this->auction = $this->Auction->getAuctionById($id)[0];

            if($this->auction == null){
                redirect("InfoMessage/PageNotFound");
            }

            $logged_user = $this->session->userdata("user");

            // user doesn't have access to this auction
            if($logged_user == null || $logged_user->user_rank == 0){
                if($this->auction->auction_state == 'Denied' || $this->auction->auction_state == 'Pending confirmation')
                    redirect("InfoMessage/PageNotFound");

            }
        }

        /**
         * loading page layout, same as in every other controller
         */
        private function loadPageLayout($page, $content=[]){
            $header_content["controller"] = "SingleAuction";
            $header_content["page_title"] = "Auction Item";
            $header_content["page_icon"] = "money";

            $this->load->view("header.php", $header_content);
            $this->load->view($page, $content);
            $this->load->view("footer.php");
        }

        /**
         * default index page
         */
        public function index(){
            $bid = $this->Auction->getMaxBid($this->auction->auction_id);

            $content["auction"] = $this->auction;
            $content["bid"] = $bid;
            $this->loadPageLayout("pages/SingleAuction.php", $content);

        }

        /**
         * Controller for auction bidding
         * if someone bidded in the meantime this function will deny new bid and notify user that someone has bidded in the meantime
         */
        public function Bid(){

            if ($this->auction->auction_state != 'Active'){
                redirect(base_url() . 'InfoMessage/AuctionNotActive');
            }
            else {
                $old_value = $this->input->post("old_bid_value");
                $new_bid = $this->input->post("bid");

                if($old_value == null)
                    redirect("InfoMessage/PageNotFound");

                $bid = $this->Auction->getMaxBid($this->auction->auction_id);

                if($bid != null && $bid->bid_value != $old_value){
                    redirect(base_url() .'InfoMessage/AuctionChanged?id=' . $this->auction->auction_id);
                }

                $bid_time = date("Y-m-d H:i:s");
                $logged_user = $this->session->userdata("user")->username;

                $this->UserBids->createBid($this->auction->auction_id, $logged_user, $bid_time, $new_bid);
                
                redirect(base_url() .'InfoMessage/BidSuccessful?id=' . $this->auction->auction_id);
            }
        }
 

    }

?>