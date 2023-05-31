<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (empty(@$_SESSION["email"])) {
        session_destroy();
        echo "<script> window.location.href = '../../../login.php' </script>";
    }
}
// require_once "../../audit_logs/audit_db.php";
require_once "../../../includes/functions-inc.php";
require_once "../../../includes/db_ep-inc.php";


// if (isset($_POST["u_e_referral"])) {
//     if (!empty($_POST['e_referral'])) {
//         $link = $_POST["e_referral"];
//         $sql = "UPDATE p_acquisition SET link = '$link' WHERE id = 'e_referral'";
//         mysqli_query($conn, $sql);

//         require_once "../../audit_logs/audit_db.php";

//         $_SESSION['status_p_acq'] = "Content Updated!";
//         $_SESSION['status_text'] = "You have successfully updated the content!";
//         $_SESSION['status_code'] = "success";
//     } else {
//         $_SESSION['status_p_acq'] = "! Error !";
//         $_SESSION['status_text'] = "No link uploaded!";
//         $_SESSION['status_code'] = "error";
//     }
//     echo "<script> window.location.href='patt_admin.php' </script>";
//     // header("location: ../../p_management/index.php");
// }


//internal recruitment
if (isset($_POST['u_recruitment'])) {
    if (!empty($_POST['recruitment'])) {
        $link = $_POST["recruitment"];
        $sql = "UPDATE p_acquisition SET link = '$link' WHERE id = 'recruitment'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";

        $_SESSION['status_p_acq'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    } else {
        $_SESSION['status_p_acq'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
    }
    echo "<script> window.location.href='patt_admin.php' </script>";
    // header("location: patt_admin.php");
}



//intern referral
if (isset($_POST['u_referral'])) {
    if (!empty($_POST['i_referral'])) {
        $link = $_POST["i_referral"];
        $sql = "UPDATE p_attraction SET link = '$link' WHERE id = 'intern_ref'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";

        $_SESSION['status_p_acq'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    } else {
        $_SESSION['status_p_acq'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
    }
    echo "<script> window.location.href='patt_admin.php' </script>";
    // header("location: patt_admin.php");
}

//intern schedule
if (isset($_POST['u_sched'])) {
    if (!empty($_POST['u_sched'])) {
        $link = $_POST["i_sched"];
        $sql = "UPDATE p_attraction SET link = '$link' WHERE id = 'intern_sched'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";

        $_SESSION['status_p_acq'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    } else {
        $_SESSION['status_p_acq'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
    }
    echo "<script> window.location.href='patt_admin.php' </script>";
    // header("location: patt_admin.php");
}

//intern renewal
if (isset($_POST['u_renew'])) {
    if (!empty($_POST['u_renew'])) {
        $link = $_POST["i_renew"];
        $sql = "UPDATE p_attraction SET link = '$link' WHERE id = 'intern_renewal'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";

        $_SESSION['status_p_acq'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    } else {
        $_SESSION['status_p_acq'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
    }
    echo "<script> window.location.href='patt_admin.php' </script>";
    // header("location: patt_admin.php");
}

//intern renewal
if (isset($_POST['u_allowance'])) {
    if (!empty($_POST['u_allowance'])) {
        $link = $_POST["i_allowance"];
        $sql = "UPDATE p_attraction SET link = '$link' WHERE id = 'intern_allowance'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";

        $_SESSION['status_p_acq'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    } else {
        $_SESSION['status_p_acq'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
    }
    echo "<script> window.location.href='patt_admin.php' </script>";
    // header("location: patt_admin.php");
}


