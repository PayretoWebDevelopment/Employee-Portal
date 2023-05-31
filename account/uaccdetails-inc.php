<?php
session_start();
if (isset($_POST["changepass"])) {
    //$uname = $_POST["uname"];
    //$opass = $_POST["opass"];
    //$pass = $_POST["pass"];
    //$cpass = $_POST["cpass"];
    //$email = $_SESSION["email"];

    $uname = filter_input(INPUT_POST, 'uname', FILTER_SANITIZE_SPECIAL_CHARS);
    $opass = filter_input(INPUT_POST, 'opass', FILTER_SANITIZE_SPECIAL_CHARS);
    $pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_SPECIAL_CHARS);
    $cpass = filter_input(INPUT_POST, 'cpass', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_SESSION["email"], FILTER_SANITIZE_EMAIL);

    require_once '../includes/db_ep-inc.php';
    require_once '../includes/functions-inc.php';

    $admin = @$_SESSION['admin'];
    $admin_oa = @$_SESSION['admin_oa'];

    $result = emptyInputPassAll($conn, $email, $uname, $opass, $pass, $cpass);

    // for passing of error messages
    if ($result == 0) {
        if ($admin != 0 || $admin_oa != 0) {
            echo "<script> window.location.href = 'account_settings_admin.php?error=emptyinput' </script>";
        }else{
            echo "<script> window.location.href='account_settings.php?error=emptyinput' </script>";
        }
    }
    if ($result == 1) { //update pass
        changepass1($conn, $email, $pass);
        $_SESSION['status_user_sett'] = "Account Updated!";
        $_SESSION['status_text'] = "You have successfully updated your password!";
        $_SESSION['status_code'] = "success";
        if ($admin != 0 || $admin_oa != 0) {
            echo "<script> window.location.href = 'account_settings_admin.php?error=Logout' </script>";
        }else{
            echo "<script> window.location.href='account_settings.php?error=Logout' </script>";
        }
    } else if ($result == 2) { //update user
        changepass2($conn, $email, $uname);
    } else if ($result == 3) { // result = 3 update all
        changepass3($conn, $email, $uname, $pass);
        $_SESSION['status_user_sett'] = "Account Updated!";
        $_SESSION['status_text'] = "You have successfully updated your username/password!";
        $_SESSION['status_code'] = "success";
        if ($admin != 0 || $admin_oa != 0) {
            echo "<script> window.location.href = 'account_settings_admin.php?error=Logout' </script>";
        }else{
            echo "<script> window.location.href='account_settings.php?error=Logout' </script>";
        }
    } else if ($result == 4) {
        if ($admin != 0 || $admin_oa != 0) {
            echo "<script> window.location.href = 'account_settings_admin.php?error=incorrectpass' </script>";
        }else{
            echo "<script> window.location.href='account_settings.php?error=incorrectpass' </script>";
        }
    }

    // if (weakpass($pass) !== false) {
    //     // header("location: account_settings.php?error=weakpass");
    //     echo "<script> window.location.href='account_settings.php?error=weakpass' </script>";
    //     exit();
    // }
    if (passmatch($pass, $cpass) !== false) {
        echo "<script> window.location.href='account_settings.php?error=passmismatch' </script>";
        exit();
    }
    if (samepass($opass, $pass) !== false) {
        echo "<script> window.location.href='account_settings.php?error=samepass' </script>";
        exit();
    }
    if (wrongopass($opass) !== false) {
        echo "<script> window.location.href='account_settings.php?error=wrongpass' </script>";
        exit();
    }

    //end

    //changing of PFP
} else if (isset($_POST["changepfp"])) {
    $uname = $_SESSION["uname"];
    $email = $_SESSION["email"];

    require_once 'db_ep-inc.php';
    require_once 'functions-inc.php';

    $fname = $_FILES["img"]["name"];
    $fsize = $_FILES["img"]["size"];
    $ftmp = $_FILES["img"]["tmp_name"];
    $folder = '../assets/img/' . $fname;
    $validExt = ['jpg', 'jpeg', 'png'];
    $fext = explode('.', $fname);
    $fext = strtolower(end($fext));

    if (!in_array($fext, $validExt)) {
        // header("location: account_settings.php?error=wrongtype");
        echo "<script> window.location.href='account_settings.php?error=wrongtype' </script>";
        exit();
    } elseif ($fsize > 1200000) {
        // header("location: account_settings.php?error=toolarge");
        echo "<script> window.location.href='account_settings.php?error=toolarge' </script>";
        exit();
    } else {
        if (move_uploaded_file($ftmp, $folder)) {
            $sql = "UPDATE empportcredentials SET img = '$fname' WHERE email = '$email'";
            mysqli_query($conn, $sql);
            // header("location: account_settings.php?error=changepfp");
            echo "<script> window.location.href='account_settings.php?error=changepfp' </script>";
            exit();
        } else {
            // header("location: account_settings.php?error=resizeErr");
            echo "<script> window.location.href='account_settings.php?error=resizeErr' </script>";
            exit();
        }
    }

    if ($fext != "png") {
        $new_img = resize_imagejpg($folder);
        // header("location: account_settings.php?error=changepfp");
        echo "<script> window.location.href='account_settings.php?error=changepfp' </script>";
        exit();
    }
} else if (isset($_POST["changepfpAdmin"])) {
    $uname = $_SESSION["uname"];
    $email = $_SESSION["email"];

    require_once '../includes/db_ep-inc.php';
    require_once '../includes/functions-inc.php';

    $fname = $_FILES["img"]["name"];
    $fsize = $_FILES["img"]["size"];
    $ftmp = $_FILES["img"]["tmp_name"];
    $folder = '../assets/img/' . $fname;
    $validExt = ['jpg', 'jpeg', 'png'];
    $fext = explode('.', $fname);
    $fext = strtolower(end($fext));

    if (!in_array($fext, $validExt)) {
        // header("location: account_settings.php?error=wrongtype");
        echo "<script> window.location.href='account_settings_admin.php?error=wrongtype' </script>";
        exit();
    } elseif ($fsize > 1200000) { //higher than 1.2mb
        // header("location: account_settings.php?error=toolarge");
        echo "<script> window.location.href='account_settings_admin.php?error=toolarge' </script>";
        exit();
    } else {
        if (move_uploaded_file($ftmp, $folder)) {
            $sql = "UPDATE empportcredentials SET img = '$fname' WHERE email = '$email'";
            mysqli_query($conn, $sql);
            // header("location: account_settings.php?error=changepfp");
            echo "<script> window.location.href='account_settings_admin.php?error=changepfp' </script>";
            exit();
        } else {
            // header("location: account_settings.php?error=resizeErr");
            echo "<script> window.location.href='account_settings_admin.php?error=resizeErr' </script>";
            exit();
        }
    }

    if ($fext != "png") {
        $new_img = resize_imagejpg($folder);
        // header("location: account_settings.php?error=changepfp");
        echo "<script> window.location.href='account_settings_admin.php?error=changepfp' </script>";
        exit();
    }
}
//end


else {
    echo "<script> window.location.href='account_settings.php' </script>";
    exit();
}
