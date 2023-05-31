<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$account = "michaeljamescastillo@gmail.com";

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'payreto.employeeportal@gmail.com';
$mail->Password = 'xyozfrugkmvlipte';
$mail->SMTPSecure = 'tls';
$mail->Port = '587';

//sender info
$mail->setFrom('payreto.employeeportal@gmail.com','Employee Portal');
$mail->addAddress($account);

//content
$mail->isHTML(true);
$mail->Subject = 'LMS Support by '.$account;
$mail->Body ='test content test content test content test content test content test content test content test content test content';

$mail->send();
?>