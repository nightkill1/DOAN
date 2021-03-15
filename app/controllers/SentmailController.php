<?php

namespace app\controllers;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use app\core\Controller;
use \App;

class SentmailController extends Controller {
    function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $low = $_POST["low"];
        $high = $_POST["high"];
        $now = $_POST["now"];
        $name = $_POST["name"];
        $message = $_POST["message"];
        $mail = new PHPMailer(true);
        // echo $low ." low";
        // echo "Low:". $low . " High:" . $high . " now :" . $now;
        try {
            $mail->CharSet = 'UTF-8';
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                    //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = "hoanganhhai123123@gmail.com";                     //SMTP username
            $mail->Password   = 'hoanganha123';                               //SMTP password
            $mail->SMTPSecure = 'tls';        //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                          //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            
            //Recipients
            $mail->setFrom('hoang.nm.060899@gmail.com', 'Mailer');
            $mail->addAddress('hoanganhhai123123@gmail.com', 'Hoang');     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');
        
            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        
            //Content
            $body = " '$message'" . "<br/>" . $name . " ở mức cao: " . $high . "<br/>" . $name . " ở mức thấp: " . $low . "<br/>" . $name . " hiện tại: " . $now ;
            
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'CẢNH BÁO HỆ THỐNG GIÁM SÁT CÁC THÔNG SỐ CHẤT LƯỢNG NƯỚC TRONG BỂ CÁ ';
            $mail->Body    = $body ;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            echo $body;
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
?>