<?php
    class Login extends CI_Controller{
        public function __construct(){
            parent::__construct();

            $this->load->model("User");
        }

        private function loadPageLayout($page, $content = []){
            $header_content["controller"] = "Login";
            $header_content["page_title"] = "Welcome to Auction house ™!";
            $header_content["page_icon"] = "star";

            $this->load->view("header.php", $header_content);
            $this->load->view($page, $content);
            $this->load->view("footer.php");
        }

        public function index(){
            $this->loadPageLayout("pages/Login");
        }

        public function Submit(){
            $username = $this->input->post("username");
            $password = $this->input->post("password");

            if (isSuccessfulLogin($username, $password)){
                $row = getUserHavingUsername($username);
                $this->session->set_userdata($row);
                redirect("InfoMessage/LoginSucceeded");
            }
            else{
                redirect("InfoMessage/LoginFailed");
            }
        }

    }
?>