<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (empty(@$_SESSION["email"])) {
        session_destroy();
        echo "<script> window.location.href = '../../../login/login.php' </script>";
    }
}
// require_once "../../audit_logs/audit_db.php";
require_once "../../../includes/db_ep-inc.php";



//instructional design
if (isset($_POST["u_instructional"])) {
    if (!empty($_POST['instructional'])) {
        $link = $_POST["instructional"];
        $sql = "UPDATE p_development SET link = '$link' WHERE id = 'instructional'";
        mysqli_query($conn, $sql);
        $_SESSION['status_p_dev'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
        require_once "../../audit_logs/audit_db.php";
    } else {
        $_SESSION['status_p_dev'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
    }
    echo "<script> window.location.href='pdev_admin.php' </script>";
    // header("location: pdev_admin.php");
}

//internal training request
if (isset($_POST["u_internal"])) {
    if (!empty($_POST['internal'])) {
        $link = $_POST["internal"];
        $sql = "UPDATE p_development SET link = '$link' WHERE id = 'internal'";
        mysqli_query($conn, $sql);
        $_SESSION['status_p_dev'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
        require_once "../../audit_logs/audit_db.php";
    } else {
        $_SESSION['status_p_dev'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
    }
    echo "<script> window.location.href='pdev_admin.php' </script>";
    // header("location: pdev_admin.php");
}

//external training request
if (isset($_POST["u_external"])) {
    if (!empty($_POST['external'])) {
        $link = $_POST["external"];
        $sql = "UPDATE p_development SET link = '$link' WHERE id = 'external'";
        mysqli_query($conn, $sql);
        $_SESSION['status_p_dev'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
        require_once "../../audit_logs/audit_db.php";
    } else {
        $_SESSION['status_p_dev'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
    }
    echo "<script> window.location.href='pdev_admin.php' </script>";
    // header("location: pdev_admin.php");
}

//ldplaybook
if (isset($_POST["u_ldplaybook"])) {
    if (!empty($_POST['ldplaybook'])) {
        $link = $_POST["ldplaybook"];
        $sql = "UPDATE p_development SET link = '$link' WHERE id = 'playbook'";
        mysqli_query($conn, $sql);
        $_SESSION['status_p_dev'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
        require_once "../../audit_logs/audit_db.php";
    } else {
        $_SESSION['status_p_dev'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
    }
    echo "<script> window.location.href='pdev_admin.php' </script>";
    // header("location: pdev_admin.php");
}

//account management
if (isset($_POST["u_account"])) {
    if (!empty($_POST['account'])) {
        $link = $_POST["account"];
        $sql = "UPDATE p_development SET link = '$link' WHERE id = 'account'";
        mysqli_query($conn, $sql);
        $_SESSION['status_p_dev'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
        require_once "../../audit_logs/audit_db.php";
    } else {
        $_SESSION['status_p_dev'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
    }
    echo "<script> window.location.href='pdev_admin.php' </script>";
    // header("location: pdev_admin.php");
}

//multimedia request
if (isset($_POST["u_multimedia"])) {
    if (!empty($_POST['multimedia'])) {
        $link = $_POST["multimedia"];
        $sql = "UPDATE p_development SET link = '$link' WHERE id = 'multimedia'";
        mysqli_query($conn, $sql);
        $_SESSION['status_p_dev'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
        require_once "../../audit_logs/audit_db.php";
    } else {
        $_SESSION['status_p_dev'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
    }
    echo "<script> window.location.href='pdev_admin.php' </script>";
    // header("location: pdev_admin.php");
}
