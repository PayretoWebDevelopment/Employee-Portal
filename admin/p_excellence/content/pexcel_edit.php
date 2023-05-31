<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (empty(@$_SESSION["email"])) {
        session_destroy();
        echo "<script> window.location.href = '../../../login/login.php' </script>";
    }
}
// require_once "../../audit_logs/audit_db.php";
require_once "../../../includes/functions-inc.php";
require_once "../../../includes/db_ep-inc.php";



//payreto store
if (isset($_POST["company_pol"])) {
    // if (empty($_POST['redemption']) && empty($_POST['nomination']) && empty($_POST['store-purchase'])){
    //     //add stuff here
    //     $_SESSION['status_p_man'] = "! Error !";
    //     $_SESSION['status_text'] = "No link uploaded!";
    //     $_SESSION['status_code'] = "error";
    //     echo "<script> window.location.href='pexcel_admin.php' </script>";
    // }
    if ($_FILES['p_excel_file']['name'] != "") {
        $filename = $_FILES["p_excel_file"]["name"];
        $tempname = $_FILES["p_excel_file"]["tmp_name"];
        $folder = '../../../people_operations/people_excellence/assets/files/' . $filename;
        $folder_db = '/Employee-Portal/people_operations/people_excellence/assets/files/' . $filename;

        $id = $_POST["p_excel_section"];
        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_pxcl($folder_db, $id);
            mysqli_query($conn, $query);
            $_SESSION['status_p_man'] = "Content Updated!";
            $_SESSION['status_text'] = "You have successfully updated the content!";
            $_SESSION['status_code'] = "success";
        }
        require_once "../../audit_logs/audit_db.php";
    } else {
        $_SESSION['status_p_man'] = "! Error !";
        $_SESSION['status_text'] = "No file selected!";
        $_SESSION['status_code'] = "error";
    }
    echo "<script> window.location.href='pexcel_admin.php' </script>";
    // header("location: pexcel_admin.php");
}


//foodpanda account
if (isset($_POST["memoranda"])) {
    if ($_FILES['p_excel_memo_file']['name'] != "") {
        $filename = $_FILES["p_excel_memo_file"]["name"];
        $tempname = $_FILES["p_excel_memo_file"]["tmp_name"];
        $folder = '../../../people_operations/people_excellence/assets/files/' . $filename;
        $folder_db = '/Employee-Portal/people_operations/people_excellence/assets/files/' . $filename;

        $id = $_POST["p_excel_memo"];
        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_pxcl($folder_db, $id);
            mysqli_query($conn, $query);
            $_SESSION['status_p_man'] = "Content Updated!";
            $_SESSION['status_text'] = "You have successfully updated the content!";
            $_SESSION['status_code'] = "success";
        }
        require_once "../../audit_logs/audit_db.php";
    } else {
        $_SESSION['status_p_man'] = "! Error !";
        $_SESSION['status_text'] = "No file selected!";
        $_SESSION['status_code'] = "error";
    }
    echo "<script> window.location.href='pexcel_admin.php' </script>";
    // header("location: pexcel_admin.php");
}



//employee handbook
if (isset($_POST["u_handbook"])) {
    if ($_FILES['handbook']['name'] != "") {
        $filename = $_FILES["handbook"]["name"];
        $tempname = $_FILES["handbook"]["tmp_name"];
        $folder = '../../../people_operations/people_excellence/assets/files/' . $filename;
        $folder_db = '/Employee-Portal/people_operations/people_excellence/assets/files/' . $filename;

        $id = $_POST["identifier"];

        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_pxcl($folder_db, $id);
            mysqli_query($conn, $query);
            $_SESSION['status_p_man'] = "Content Updated!";
            $_SESSION['status_text'] = "You have successfully updated the content!";
            $_SESSION['status_code'] = "success";
        }

        require_once "../../audit_logs/audit_db.php";
    } else {
        $_SESSION['status_p_man'] = "! Error !";
        $_SESSION['status_text'] = "No file selected!";
        $_SESSION['status_code'] = "error";
    }

    echo "<script> window.location.href='pexcel_admin.php' </script>";
}


//incident report form
if (isset($_POST["u_incident"])) {
    if ($_FILES['incident']['name'] != "") {
        $filename = $_FILES["incident"]["name"];
        $tempname = $_FILES["incident"]["tmp_name"];
        $folder = '../../../people_operations/people_excellence/assets/files/' . $filename;
        $folder_db = '/Employee-Portal/people_operations/people_excellence/assets/files/' . $filename;

        $id = $_POST["identifier"];
        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_pxcl($folder_db, $id);
            mysqli_query($conn, $query);
            $_SESSION['status_p_man'] = "Content Updated!";
            $_SESSION['status_text'] = "You have successfully updated the content!";
            $_SESSION['status_code'] = "success";
        }
        require_once "../../audit_logs/audit_db.php";
    } else {
        $_SESSION['status_p_man'] = "! Error !";
        $_SESSION['status_text'] = "No file selected!";
        $_SESSION['status_code'] = "error";
    }
    echo "<script> window.location.href='pexcel_admin.php' </script>";
}


//request for certificate of employment
if (isset($_POST["coaching_log"])) {
    if ($_FILES['coaching']['name'] != "") {
        $filename = $_FILES["coaching"]["name"];
        $tempname = $_FILES["coaching"]["tmp_name"];
        $folder = '../../../people_operations/people_excellence/assets/files/' . $filename;
        $folder_db = '/Employee-Portal/people_operations/people_excellence/assets/files/' . $filename;

        $id = $_POST["identifier"];
        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_pxcl($folder_db, $id);
            mysqli_query($conn, $query);
            $_SESSION['status_p_man'] = "Content Updated!";
            $_SESSION['status_text'] = "You have successfully updated the content!";
            $_SESSION['status_code'] = "success";
        }
        require_once "../../audit_logs/audit_db.php";
    } else {
        $_SESSION['status_p_man'] = "! Error !";
        $_SESSION['status_text'] = "No file selected!";
        $_SESSION['status_code'] = "error";
    }
    echo "<script> window.location.href='pexcel_admin.php' </script>";
}
