<?php
    /**
     *@author Mihailo
     * Controller for changing password.
     */
    class ChangePassword extends CI_Controller{
        /**
         *  constructor for contoller
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
            $header_content["controller"] = "ChangePassword";
            $header_content["page_title"] = "Change Password";
            $header_content["page_icon"] = "key";

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

                $this->loadPageLayout("pages/ChangePassword");
            }
        }

        /**
         * function that handles and checks confirmation 
         */
        public function Confirm(){

            if (! $this->session->has_userdata("user")){
                
                redirect("InfoMessage/PageNotFound");
            }
            else{
                $oldpassword = $this->input->post("oldpassword");
                $newpassword = $this->input->post("newpassword");
                $repeatpassword = $this->input->post("repeatpassword");

                $logged_user = $this->session->userdata("user")->username;

                if (! $this->User->isSuccessfulLogin($logged_user, $oldpassword)){
                    redirect("InfoMessage/WrongPassword");
                }
                
                if($oldpassword == $newpassword){
                    redirect("InfoMessage/SamePassword");
                }

                if($repeatpassword != $newpassword){
                    redirect("InfoMessage/WrongRepeatPassword");
                }

                $this->User->ChangePassword($logged_user, password_hash($newpassword, PASSWORD_DEFAULT));
                redirect("InfoMessage/ChangePasswordSuccessfull");
            }     
        }

    }
?>