<?php

    /**
     *@author Filip, Nebojsa
     * Contoller for login.
     */
    class Login extends CI_Controller{
        /**
         * constructor for this controller
         */
        public function __construct(){
            parent::__construct();

            $this->load->model("User");
        }

        /**
         * Loads a page layout.
         *
         * @param      string  $page     The page
         * @param      array   $content  The content
         */
        private function loadPageLayout($page, $content = []){
            $header_content["controller"] = "Login";
            $header_content["page_title"] = "Log in";
            $header_content["page_icon"] = "key";

            $this->load->view("header.php", $header_content);
            $this->load->view($page, $content);
            $this->load->view("footer.php");
        }

        /**
         * index function, default function called for this contoller
         */
        public function index(){

            if ($this->session->has_userdata("user")){

                redirect("InfoMessage/PageNotFound");
            }
            else{

                $this->loadPageLayout("pages/Login");
            }
        }

        /**
         * function which cheks and handles submit
         */
        public function Submit(){

            if ($this->session->has_userdata("user")){
                
                redirect("InfoMessage/PageNotFound");
            }
            else{

                $username = $this->input->post("username");
                $password = $this->input->post("password");

                if ($this->User->isSuccessfulLogin($username, $password)){
                    $user = $this->User->getUserHavingUsername($username)[0];
                    $this->session->set_userdata("user", $user);
                    redirect("InfoMessage/LoginSuccessful");
                }
                else{
                    redirect("InfoMessage/LoginFailed");
                }
            }     
        }

    }
?>