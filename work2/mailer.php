<?php

require("phpmailer/PHPMailer.php");
require("phpmailer/Exception.php");
require("phpmailer/SMTP.php");

$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$mail->IsHTML(true);
$mail->Username = "ntgolda@gmail.com";
$mail->Password = "xxxxx";
$mail->SetFrom("ntgolda@gmail.com");
$mail->Subject = "Test";
$mail->Body = "hello";
$mail->AddAddress("nt08golda@gmail.com");
if(!$mail->Send()) {
	echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message has been sent";
}
