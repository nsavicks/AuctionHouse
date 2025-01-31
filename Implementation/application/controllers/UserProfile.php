<?php
    
    /**
     *@author Mihailo
     * Controller for user profile.
     */
    class UserProfile extends CI_Controller{

        /**
         * constructor for this controller
         */
        public function __construct(){
            parent::__construct();

            $this->load->model("User");
            $this->load->model("User_rank");
            $this->load->model("User_rating");
            $this->load->model("Ratings_by_user_view");

        }

        /**
         * Loads a page layout.
         *
         * @param      string  $page     The page
         * @param      array   $content  The content
         */
        private function loadPageLayout($page, $content=[]){
            $header_content["controller"] = "UserProfile";
            $header_content["page_title"] = "User Profile";
            //ovde treba da se postavi ono lice
            $header_content["page_icon"] = "person";

            $this->load->view("header.php", $header_content);
            $this->load->view($page, $content);
            $this->load->view("footer.php");
        }

        /**
         * index function, default function called for this contoller
         */
        public function index(){
            
            if (! $this->session->has_userdata("user")){

                redirect("InfoMessage/PageNotFound");
            }
            else{
                //dohvatim username iz urla
                $username = $this->input->get("username");

                $user_info = $this->User->getUserHavingUsername($username);

                if($user_info == null){
                    redirect("InfoMessage/PageNotFound");
                }

                $content["user_info"] = $user_info;

                $user_rank_id = $content["user_info"][0]->user_rank;
                $content["user_rank_id"] = $this->User_rank->getUserRankHavingId($user_rank_id);

                $content["user_rating"] = $this->Ratings_by_user_view->getUserRating($username);

                //provera za rate
                $content["allow_rate"] = true;
               
                $logged_user = $this->session->userdata("user")->username;
                if($logged_user == $username || $this->User_rating->checkForPair($username, $logged_user))
                    $content["allow_rate"] = false;

                $content["allow_change_password"] = false;
                if($logged_user == $username){
                    $content["allow_change_password"] = true;
                }

                $this->loadPageLayout("pages/UserProfile.php", $content);
            }

        }

        /**
         * function that checks and handles rate
         *
         * @param      string  $rated_user  The rated user
         */
        public function Rate($rated_user){
            if (! $this->session->has_userdata("user")){

                redirect("InfoMessage/PageNotFound");
            }
            
            //$rated_user = $this->input->get("username");
            $rating_user = $this->session->userdata("user")->username;

            $data["rating_time"] = date("Y-m-d H:i:s");
            $data["rating"] = $this->input->post("user-rate");
            $data["rated_user"] = $rated_user;
            $data["rating_user"] = $rating_user;

            $this->User_rating->createNewUserRating($data);

            redirect("UserProfile?username=". $rated_user);

        }

    }

?>