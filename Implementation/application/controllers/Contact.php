<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contact
 *
 * @author Aleksandar
 */

class Contact extends CI_Controller{

        public function __construct(){
            parent::__construct();
        }
        
         private function loadPageLayout($page){
            $header_content["controller"] = "Contact";
            $header_content["page_title"] = "Contact";
            $header_content["page_icon"] = "phone";

            $this->load->view("header.php", $header_content);
            $this->load->view($page);
            $this->load->view("footer.php");
        }

        public function index(){
          
            $this->loadPageLayout("pages/Contact.php");
        }

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
