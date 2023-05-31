<?php
//audit logging mainly used for super admin actions (adding, editing, restoring, and deleting users)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (empty(@$_SESSION["email"])) {
        session_destroy();
        echo "<script> window.location.href = '../../login/login.php' </script>";
    }
}
    // this is for the super admin user editing privileges
    @require_once "../../includes/db_ep-inc.php";
    @require_once "../../includes/functions-inc.php";

    $email = $_SESSION["email"];
    getinfo($conn, $email);

    $uname = $_SESSION["uname"];
    $admin = $_SESSION["admin"];

    if(!empty($_POST["frmname"])){
        @$form = $_POST["frmname"];
        if(!empty($_POST["frmnameE"])){
            @$form2 = $_POST["frmnameE"];
            @$form = @$form2.@$form;
        }
        if(!empty($_POST["email"])){
            @$email = $_POST["email"];
            @$form = @$form.@$email;
        }
        if(!empty($_POST["email2"])){
            @$email2 = $_POST["email2"];
            @$form = @$form.@$email2;
        }
    } else if (!empty($_GET["delname"])){
        @$form = $_GET["delname"];
    }

    date_default_timezone_set("Hongkong");
    $dtime = date("m/d/Y")." ".date("H:i:s");

    $sql = "INSERT INTO audit_logs (dtime, uname, form) VALUES ('$dtime', '$uname', '$form')";
    $conn->query($sql);
?>