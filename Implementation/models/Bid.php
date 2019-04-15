<?php

    class Bid{

        private $bid_id;
        private $auction_id;
        private $username;
        private $bid_time;
        private $bid_value;

        public function __construct($bid_id, $auction_id, $username, $bid_time, $bid_value)
        {
            $this->bid_id = $bid_id;
            $this->auction_id = $auction_id;
            $this->username = $username;
            $this->bid_time = $bid_time;
            $this->bid_value = $bid_value;
        }

        public function __get($attribute){
            return $this->$attribute;
        }

        public static function getAllBids(){

            $db = dbConf::getInstance();

            $sql = "SELECT * FROM bids";
            $result = $db->query($sql);

            $resultArray = [];

            foreach($result->fetchAll() as $row){
                $resultArray[] = new Bid(
                    $row['bid_id'],
                    $row['auction_id'],
                    $row['username'],
                    $row['bid_time'],
                    $row['bid_value']
                );
            }

            return $resultArray;
        }

    }

?>