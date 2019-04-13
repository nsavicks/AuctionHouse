<?php

    class Auction{

        private $auction_id;
        private $auction_name;
        private $auction_description;
        private $auction_owner;
        private $category;
        private $start_time;
        private $end_time;
        private $duration;
        private $starting_price;
        private $item_condition;
        private $auction_pictures;
        private $create_time;
        private $auction_state;

        public function __construct($auction_id, $auction_name, $auction_description, $auction_owner, $category, $start_time, $end_time, $duration, $starting_price, $item_condition, $auction_pictures, $create_time, $auction_state){
            $this->auction_id = $auction_id;
            $this->auction_name = $auction_name;
            $this->auction_description = $auction_description;
            $this->auction_owner = $auction_owner;
            $this->category = $category;
            $this->start_time = $start_time;
            $this->end_time = $end_time;
            $this->duration = $duration;
            $this->starting_price = $starting_price;
            $this->item_condition = $item_condition;
            $this->auction_pictures = $auction_pictures;
            $this->create_time = $create_time;
            $this->auction_state = $auction_state;
        }

        public function __get($attribute){
            return $this->$attribute;
        }

        public static function getAllAuctions(){

            $db = dbConf::getInstance();

            $sql = "SELECT * FROM auctions";
            $result = $db->query($sql);

            $result_array = [];

            foreach($result->fetchAll() as $row){
                $result_array[] = new Auction(
                    $row['auction_id'],
                    $row['auction_name'],
                    $row['auction_description'],
                    $row['auction_owner'],
                    $row['category'],
                    $row['start_time'],
                    $row['end_time'],
                    $row['duration'],
                    $row['starting_price'],
                    $row['item_condition'],
                    $row['auction_pictures'],
                    $row['create_time'],
                    $row['auction_state'],
                );
            }

            return $result_array;
        }

    }

?>