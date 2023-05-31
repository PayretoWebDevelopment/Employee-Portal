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

if(isset($_POST['submit'])){
    $email = filter_var($_SESSION["email"], FILTER_SANITIZE_EMAIL);
    $type = filter_input(INPUT_POST, "issue_type", FILTER_SANITIZE_SPECIAL_CHARS);
    $desc = filter_input(INPUT_POST, "issue_desc", FILTER_SANITIZE_SPECIAL_CHARS);
    $affected = filter_input(INPUT_POST, "issue_affected", FILTER_SANITIZE_SPECIAL_CHARS);
    $urgency = filter_input(INPUT_POST, "issue_urgency", FILTER_SANITIZE_SPECIAL_CHARS);
    $uname = filter_var($_SESSION['uname'], FILTER_SANITIZE_SPECIAL_CHARS);
    $subject = "Ticket request from " . $uname;
}

$input_error = empty($type) || empty($desc) || empty($affected) || empty($urgency) || ($urgency == "-- Select Urgency --");
if($input_error){

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
$mail->addAddress('it.support@payreto.com'); //change to email of key person (also for testing)

//content
$mail->Subject = $subject;
$mail->Body = "
<html>
    <head>
        <!-- Local CSS -->
        <link rel='stylesheet' href='/Employee-Portal/assets/css/dashboard_styles.css'>
        <link rel='stylesheet' href='/Employee-Portal/others/it_helpdesk/assets/css/it_helpdesk_styles.css'>
        <link rel='stylesheet' href='/Employee-Portal/others/it_helpdesk/assets/css/ticket_styles.css'>
    </head>
    <body>
        <div>A new ticket request has been submitted by " . $uname . ".</div>
        <div>
        <p>The details of the ticket are as follows:</p>
        <table id='m_-1155358111256745278table-to-copied' style='border-collapse: collapse; border-width: 2px; border-color: #000000;' border='1'>
            <tbody>
                <tr>
                    <td style='border-width: 2px; border-color: rgb(0, 0, 0);'><strong>Type of Issue</strong></td>
                    <td style='border-width: 2px; border-color: rgb(0, 0, 0); text-align: center;'> " . $type . " </td>
                </tr>
                <tr>
                    <td style='border-width: 2px; border-color: rgb(0, 0, 0);'><strong>Description of the Issue</strong></td>
                    <td style='border-width: 2px; border-color: rgb(0, 0, 0); text-align: center;'> " . $desc . " </td>
                </tr>
                <tr>
                    <td style='border-width: 2px; border-color: rgb(0, 0, 0);'><strong>Who is affected by the issue</strong></td>
                    <td style='border-width: 2px; border-color: rgb(0, 0, 0); text-align: center;'> " . $affected . " </td>
                </tr>
                <tr>
                    <td style='border-width: 2px; border-color: rgb(0, 0, 0);'><strong>Urgency</strong></td>
                    <td style='border-width: 2px; border-color: rgb(0, 0, 0); text-align: center;'> " . $urgency .  " </td>
                </tr>
            </tbody>
        </table>
        </div>
    </body>
</html>";

$mail->IsHTML(true);

$mail->send();

header("location:./ticket_request.php?error=sent");
?>