<?php
session_start();
if (session_status() === PHP_SESSION_NONE) {
    if (empty(@$_SESSION["email"])) {
        session_destroy();
        echo "<script> window.location.href = '../../login.php' </script>";
    }
}
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST["l-concern"])){
    $email = $_POST["email"];
    $body = $_POST["body"];
    $subject = $_POST["subject"];
}

require '../../../assets/PHPMailer/src/Exception.php';
require '../../../assets/PHPMailer/src/PHPMailer.php';
require '../../../assets/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'payretoemailnotification@gmail.com';
$mail->Password = 'dzmnxdloaebrroyc';
$mail->SMTPSecure = 'tls';
$mail->Port = '587';

//sender info
$mail->setFrom('payretoemailnotification@gmail.com','Employee Portal');
$mail->addAddress('psinternjyotoko.payreto@gmail.com'); //change to email of key person

//content
$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body ='Sent by '.$email.
             "<br><br>".$body;

$mail->send();

header("location: ../content/login_concerns.php?error=sent");
?>