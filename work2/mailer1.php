<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'phpmailer\PHPMailer.php';
require_once 'phpmailer\Exception.php';
require_once 'phpmailer\SMTP.php';


$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'ssl://smtp.rambler.ru';
$mail-> Port = 465;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->SMTPAuth = true;
$mail->Username = 'testmailer08@rambler.ru';
$mail->Password = 'Passwordformailer08';
$mail->setFrom('testmailer08@rambler.ru', 'Instant Remember');
$mail->AddAddress("testaddress08@rambler.ru");
$mail->Subject = 'subject';
$mail->Body = 'body';

if (!$mail-> send()) {
    echo 'Mailer Error: '. $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}
