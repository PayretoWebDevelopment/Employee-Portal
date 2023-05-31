<?php

    session_start();
    $email = $_SESSION["email"];

    require_once "../includes/db_ep-inc.php";

    //gets the user's admin privileges for checking
    $sql = "SELECT `admin` FROM empportcredentials WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    while ($r = mysqli_fetch_assoc($result)){
        $admin = $r["admin"];
    }

    // header("location: ../account_settings.php");
    if($_SESSION["admin"] == 0){
        echo "<script> window.location.href='account_settings.php' </script>";
    } else {
        echo "<script> window.location.href='account_settings_admin.php' </script>";
    }

?>