<?php
//audit logging for most actions performed by the admin (content editing)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (empty(@$_SESSION["email"])) {
        session_destroy();
        echo "<script> window.location.href = '/Employee-Portal/login.php' </script>";
    }
}
    require_once "../../../includes/db_ep-inc.php";
    require_once "../../../includes/functions-inc.php";

    $email = $_SESSION["email"];
    getinfo($conn, $email);

    $uname = $_SESSION["uname"];
    $admin = $_SESSION["admin"];

    if(!empty($_POST["frmname"])){
        $form = $_POST["frmname"];
    } else if (!empty($_GET["delname"])){
        @$form = $_GET["delname"];
    }


    date_default_timezone_set("Hongkong");
    $dtime = date("m/d/Y")." ".date("H:i:s");

    $sql = "INSERT INTO audit_logs (dtime, uname, form) VALUES ('$dtime', '$uname', '$form')";
    $conn->query($sql);
?>