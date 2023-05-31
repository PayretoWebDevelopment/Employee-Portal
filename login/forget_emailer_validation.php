<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST["forgotbtn"])){
    $email = $_POST["emailforget"];
    
    //key person email, change to another person if needed
    $admEmail = "psmichaelcastillo.payretointern@gmail.com" ;
}

$_SESSION["femail"] = $email;

require 'forget_pass_validation.php';
require '../assets/PHPMailer/src/Exception.php';
require '../assets/PHPMailer/src/PHPMailer.php';
require '../assets/PHPMailer/src/SMTP.php';


//PHPMailer code here
$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
//email of gmail used
$mail->Username = 'payreto.employeeportal@gmail.com';
//password that allows the code to send the email
//password for the email itself is in the maintenance manual
$mail->Password = 'xyozfrugkmvlipte';
$mail->SMTPSecure = 'tls';
$mail->Port = '587';

//sender info
$mail->setFrom('payreto.employeeportal@gmail.com','Employee Portal');
$mail->addAddress($admEmail); //change to email of key person

//content
$mail->isHTML(true);
$mail->Subject = "Forget Password - Payreto Employee Portal";
ob_start();
include 'email.php';
$mail->Body = ob_get_clean();
$mail->send();

// header("location: ../login.php?error=sent");
echo "<script> window.location.href='login.php?error=sent' </script>";
?>