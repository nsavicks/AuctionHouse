<?php
    /**
     * Ratings by user visualization of the data that model contains.
     */
    class Ratings_by_user_view extends CI_Model{
        /**
         * Constructor for this Model
         */
        public function __construct(){
            parent::__construct();
        }
        /**
         * Gets all user ratings.
         *
         * @return     array  All user ratings.
         */
        public function getAllUserRatings(){
            return $this->db->get("ratings_by_user_view")->result();
        }
        /**
         * Gets the user rating.
         *
         * @param      string   $username  The username
         *
         * @return     integer  The user rating.
         */
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