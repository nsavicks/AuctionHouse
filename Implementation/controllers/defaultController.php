<?php

    class DefaultController{
        
        public function __construct(){}

        public function default(){
            
            require_once 'models/Auction.php';

            $all_auctions = Auction::getAllAuctions();
            $featured_auctions = Auction::getAllAuctions();

            require_once 'views/pages/view_index.php';
        }

    }

?>