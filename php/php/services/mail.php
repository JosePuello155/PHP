<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

class mail{

    public $email;
    public $subject;
    public $message;
    public $body;

    public function __construct($email, $subject, $message, $body)  //Constructor method to initialize the variables
  {
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
        $this->body = $body;
    }

public function send(){
    try {
        //Server settings
        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 2525;
        $phpmailer->Username = 'def0c944f0aab8';
        $phpmailer->Password = '74206c86b4010f';
    
        //Recipients
        $phpmailer->setFrom($this->email, 'Mailer');
        $phpmailer->addAddress('joe@example.net', 'Joe User');     //Add a recipient
        $phpmailer->addAddress('ellen@example.com');               //Name is optional
        $phpmailer->addReplyTo('info@example.com', 'Information');
        $phpmailer->addCC('cc@example.com');
        $phpmailer->addBCC('bcc@example.com');
    
        //Attachments
        $phpmailer->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        $phpmailer->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $phpmailer->isHTML(true);                                  //Set email format to HTML
        $phpmailer->Subject = $this->subject;
        $phpmailer->Body    = $this->message;
        $phpmailer->AltBody = $this->body;
    
        $phpmailer->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
    }

    }

}
