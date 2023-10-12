<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../email/PHPMailer/src/Exception.php';
require '../email/PHPMailer/src/PHPMailer.php';
require '../email/PHPMailer/src/SMTP.php';

class Mailer
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
    }

    public function sendMail()
    {
        try {
            //Server settings
            $this->mail->isSMTP(); //Send using SMTP
            $this->mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
            $this->mail->SMTPAuth = true; //Enable SMTP authentication
            $this->mail->Username = 'thuongnapc04755@fpt.edu.vn'; // SMTP username
            $this->mail->Password = 'tkfefzyocgmqfbfv'; // SMTP password
            $this->mail->SMTPSecure = 'ssl'; // Enable TLS encryption
            $this->mail->Port = 465; // TCP port to connect to

            //Recipients
            $this->mail->setFrom('uxdev2023@gmail.com', 'Mailer');
            $this->mail->addAddress('uxdev2023@gmail.com', 'Joe User'); // Add a recipient
            $this->mail->addAddress('uxdev2023@gmail.com'); // Name is optional
            $this->mail->addReplyTo('uxdev2023@gmail.com', 'Information');

            //Attachments
            // $this->mail->addAttachment('/var/tmp/file.tar.gz'); //Add attachments
            // $this->mail->addAttachment('/tmp/image.jpg', 'new.jpg'); //Optional name

            //Content
            $this->mail->isHTML(true); //Set email format to HTML
            $this->mail->Subject = 'Here is the subject';
            $this->mail->Body = 'This is the HTML message body <b>in bold!</b>';
            $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $this->mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }

    public function sendForgotPasswordEmail($recipientEmail, $resetLink)
    {
        try {
            // Server settings
            $this->mail->isSMTP(); // Send using SMTP
            // ... (cấu hình SMTP server, auth, TLS, port)

            // Recipients
            $this->mail->setFrom('uxdev2023@gmail.com', 'My Website');
            $this->mail->addAddress($recipientEmail); // Add a recipient

            // Content
            $this->mail->isHTML(true); // Set email format to HTML
            $this->mail->Subject = 'Password Reset Request';
            $this->mail->Body = 'Click the link below to reset your password: <br><br>' . $resetLink;
            $this->mail->AltBody = 'Copy and paste the link below into your web browser to reset your password:\n\n' . $resetLink;

            $this->mail->send();
            echo 'Password reset email has been sent';
        } catch (Exception $e) {
            echo "Unable to send password reset email. Error: {$this->mail->ErrorInfo}";
        }
    }
}

$mailer = new Mailer();
$mailer->sendMail();
