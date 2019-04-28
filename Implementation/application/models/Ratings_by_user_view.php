<?php

    class Ratings_by_user_view extends CI_Model{

        public function __construct(){
            parent::__construct();
        }

        public function getAllUserRatings(){
            return $this->db->get("ratings_by_user_view")->result();
        }

        public function getUserRating($username){
            $this->db->from("ratings_by_user_view");
            $this->db->where("username", $username);

            $row = $this->db->get()->result();

            if (count($row) == 1 ){
                return $row[0]->rating;
            }
            else{
                return 0;
            }
        }

    }

?>