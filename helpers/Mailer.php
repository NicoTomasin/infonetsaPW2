<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'third-party/PHPMailer/Exception.php';
require 'third-party/PHPMailer/PHPMailer.php';
require 'third-party/PHPMailer/SMTP.php';

class Mailer
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);                    //Enable verbose debug output
        $this->mail->isSMTP();
        $this->mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );//Send using SMTP
        $this->mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'nsngt47@gmail.com';                     //SMTP username
        $this->mail->Password = 'scazgzxxfapifflw';                               //SMTP password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;           //Enable implicit TLS encryption
        $this->mail->Port = 587;
    }

    public function enviar($destino, $cuerpo)
    {

        try {
            //Recipients
            $this->mail->setFrom('infonetsa955@gmail.com');
            $this->mail->addAddress($destino);

            //Content
            $this->mail->isHTML(true);                                  //Set email format to HTML
            $this->mail->Subject = 'Hola!';
            $this->mail->Body = $cuerpo;
            $this->mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }
}