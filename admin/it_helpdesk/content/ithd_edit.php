<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (empty(@$_SESSION["email"])) {
        session_destroy();
        echo "<script> window.location.href = '../../../login/login.php' </script>";
    }
}
require_once "../../audit_logs/audit_db.php";
// require_once "../../../includes/functions-inc.php";
// require_once "../../../includes/db_ep-inc.php";

//file upload for technology form
if (isset($_POST["u_technology"])) {
    if ($_FILES['technology']['name'] != "") {
        $filename = $_FILES["technology"]["name"];
        $tempname = $_FILES["technology"]["tmp_name"];
        $folder = '../../../it_helpdesk/assets/files/' . $filename;
        $folder_db = '/Employee-Portal/others/it_helpdesk/assets/files/' . $filename;

        $id = $_POST["identifier"];

        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_ithelp($folder_db, $id);
            mysqli_query($conn, $query);
            $_SESSION['status_it_help'] = "Content Updated!";
            $_SESSION['status_text'] = "You have successfully updated the content!";
            $_SESSION['status_code'] = "success";
            echo "<script> window.location.href='ithelp_admin.php' </script>";
        }
    } else {
        $_SESSION['status_it_help'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
        echo "<script> window.location.href='ithelp_admin.php' </script>";
    }
}

//file upload for byod form
if (isset($_POST["u_byod"])) {
    if ($_FILES['byod']['name'] != "") {
        $filename = $_FILES["byod"]["name"];
        $tempname = $_FILES["byod"]["tmp_name"];
        $folder = '../../../it_helpdesk/assets/files/' . $filename;
        $folder_db = '/Employee-Portal/others/it_helpdesk/assets/files/' . $filename;

        $id = $_POST["identifier"];

        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_ithelp($folder_db, $id);
            mysqli_query($conn, $query);
            $_SESSION['status_it_help'] = "Content Updated!";
            $_SESSION['status_text'] = "You have successfully updated the content!";
            $_SESSION['status_code'] = "success";
            echo "<script> window.location.href='ithelp_admin.php' </script>";
        }
    } else {
        $_SESSION['status_it_help'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
        echo "<script> window.location.href='ithelp_admin.php' </script>";
    }
}

//file upload for it security awareness ppt
if (isset($_POST["u_awareness"])) {
    if ($_FILES['awareness']['name'] != "") {
        $filename = $_FILES["awareness"]["name"];
        $tempname = $_FILES["awareness"]["tmp_name"];
        $folder = '../../../it_helpdesk/assets/files/' . $filename;
        $folder_db = '/Employee-Portal/others/it_helpdesk/assets/files/' . $filename;

        $id = $_POST["identifier"];

        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_ithelp($folder_db, $id);
            mysqli_query($conn, $query);
            $_SESSION['status_it_help'] = "Content Updated!";
            $_SESSION['status_text'] = "You have successfully updated the content!";
            $_SESSION['status_code'] = "success";
            echo "<script> window.location.href='ithelp_admin.php' </script>";
        }
    } else {
        $_SESSION['status_it_help'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
        echo "<script> window.location.href='ithelp_admin.php' </script>";
    }
}
