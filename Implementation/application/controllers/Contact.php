<?php

/**
 *@author Aleksandar
 * Contoller for contact.
 */
class Contact extends CI_Controller{

        /**
         * constructo for controller
         */
        public function __construct(){
            parent::__construct();
        }
        
        /**
         * Loads a page layout.
         *
         * @param      string  $page   The page
         */
        private function loadPageLayout($page){
            $header_content["controller"] = "Contact";
            $header_content["page_title"] = "Contact";
            $header_content["page_icon"] = "phone";

            $this->load->view("header.php", $header_content);
            $this->load->view($page);
            $this->load->view("footer.php");
        }

        /**
         * index function, default function called for this contoller
         */
        public function index(){
          
            $this->loadPageLayout("pages/Contact.php");
        }

        /**
         * Sends a mail and returns success/error message
         */
        public function SendMail() {

            $fname = $this->input->post("fname");  
            $lname = $this->input->post("lname");
            $email = $this->input->post("email");
            $subject = $this->input->post("subject");
            $message = $this->input->post("message");

            $content = "First name: " . $fname . "\r\n";
            $content .= "Last name: " . $lname . "\r\n";
            $content .= "E-mail: " . $email . "\r\n";
            $content .= "Message: " . $message . "\r\n";


            if (mail("auctionhousepsi@gmail.com",$subject, $content)){
                redirect("InfoMessage/EmailSentSuccess");
            }
            else{
                redirect("InfoMessage/EmailSentFailed");
            }

       
        }
}
