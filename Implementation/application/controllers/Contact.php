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
//use assets\lib\PHPMailer\PHPMailer\PHPMailer; 
//use assets\lib\PHPMailer\PHPMailer\Exception;

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;

class Contact extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model("Auction");
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
           // $content["newest"] = $this->Auction->getNewestAuctions(4);
           // $content["featured"] = $this->Auction->getFeaturedAuctions(4);
          
            $this->loadPageLayout("pages/Contact.php");
        }
        public function SendMail() {
          $fname = $this->input->post("fname");  
          $lname = $this->input->post("lname");
          $email = $this->input->post("email");
          $message = $this->input->post("message");
    
                
         // PHPMailer classes into the global namespace
        // Base files 
        
        require 'assets/lib/PHPMailer/vendor/autoload.php';
        //require asset_url().'lib/PHPMailer/src/PHPMailer.php';
        //require asset_url().'lib/PHPMailer/src/SMTP.php';
        // create object of PHPMailer class with boolean parameter which sets/unsets exception.
        $mail = new PHPMailer(true);                              
        try { 
            $mail->isSMTP(); // using SMTP protocol                                     
            $mail->Host = 'smtp.gmail.com'; // SMTP host as gmail 
            $mail->SMTPDebug=4;// in production this should be forbiden
            $mail->SMTPAuth = true;  // enable smtp authentication                             
            $mail->Username = 'aleksandarpantic98@gmail.com';  // sender gmail host              
            $mail->Password = 'sifra mejla'; // sender gmail host password                          
            $mail->SMTPSecure = 'ssl';  // for encrypted connection                           
            $mail->Port = 465;   // port for SMTP     
            $mail->SMTPKeepAlive = true;  
             $mail->Mailer = "smtp"; 
           /* $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_p'
                    . 'eer_name' => false,
                    'allow_self_signed' => true
                    )
                );*/
            $mail->setFrom('aleksandarpantic98@gmail.com', "Sender"); // sender's email and name
            $mail->addAddress('aleksandarpantic98@gmail.com', "Receiver");  // receiver's email and name

            $mail->Subject = 'Test subject';
            $mail->Body    = 'Test body';

            $mail->send(); echo 'Message has been sent';
              redirect("InfoMessage/SendingMailSuccessful");
        } catch (Exception $e) { 
           echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
        }
}
