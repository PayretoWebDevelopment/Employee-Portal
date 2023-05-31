<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (empty(@$_SESSION["email"])) {
        session_destroy();
        echo "<script> window.location.href = '../../../login/login.php' </script>";
    }
}
require_once "../../../includes/db_ep-inc.php";

/**
 * form list Add to Database
 */
if(isset($_POST['bday_submit'])){
    if(!empty($_POST['bday_name']) && !empty($_POST['bday_date']) && !empty($_FILES['bday_pic'])){
        $name = $_POST['bday_name'];
        $bdate = $_POST['bday_date'];

        $filename = $_FILES["bday_pic"]["name"];
        $tempname = $_FILES["bday_pic"]["tmp_name"];
        $folder = '../../homepage/assets/img/' . $filename;
        $tempfolder = '/Employee-Portal/admin/homepage/assets/img/' . $filename;
        move_uploaded_file($tempname, $folder);
        $query = "INSERT INTO bday (bday_name, bday_date, bday_date_cur, pic_path) VALUE ('$name','$bdate', CURDATE(), '$tempfolder')";
        echo $query;
        $result = mysqli_query($conn, $query);
        require_once "../../audit_logs/audit_db.php";
        Suc_Add();

    }
}

if(isset($_POST['an_add'])){
    if(!empty($_POST['an_title']) && !empty($_POST['an_desc'])){
             $an_title = addslashes($_POST['an_title']);
             $an_desc = addslashes($_POST['an_desc']);
            if(!empty($_FILES['an_pic'])){
                $filename = $_FILES["an_pic"]["name"];
                $tempname = $_FILES["an_pic"]["tmp_name"];
                $folder = '../../homepage/assets/img/' . $filename;
                $tempfolder = '/Employee-Portal/admin/homepage/assets/img/' . $filename;
                move_uploaded_file($tempname, $folder);
            }
            $query = "INSERT INTO hp_announcement (hp_title, hp_desc, hp_pic ) VALUE ('$an_title', '$an_desc', '$tempfolder')";
            $result = mysqli_query($conn, $query);
            require_once "../../audit_logs/audit_db.php";
            Suc_Add();
    }
}

if(isset($_POST['wc_add'])){
    if(!empty($_POST['wc_payreto_title']) && !empty($_FILES['wc_payreto_desc'])){
        $name = $_POST['wc_payreto_title'];
        $filename = $_FILES["wc_payreto_desc"]["name"];
        $tempname = $_FILES["wc_payreto_desc"]["tmp_name"];
        $folder = '../../homepage/assets/img/' . $filename;
        $tempfolder = '/Employee-Portal/admin/homepage/assets/img/' . $filename;
        move_uploaded_file($tempname, $folder);
        $query = "INSERT INTO hp_welcome (hp_wc_title, hp_w_pic) VALUE ('$name', '$tempfolder')";
        $result = mysqli_query($conn, $query);
        require_once "../../audit_logs/audit_db.php";
        Suc_Add();
    }
}


/**
 * Form Delete
 */

if(isset($_POST['bday_delete'])){
    $bdayid = $_POST['bday_del'];
    if(!empty($_POST['bday_del'])){
        $query = "DELETE FROM bday WHERE bday_id = $bdayid";
        $result = mysqli_query($conn, $query);
        require_once "../../audit_logs/audit_db.php";
        Suc_Del();
    }
}

if(isset($_POST['an_delete'])){
    $announceid = $_POST['an_del'];
    if(!empty($announceid)){
        $query = "DELETE FROM hp_announcement WHERE hp_id = $announceid";
        $result = mysqli_query($conn, $query);
        require_once "../../audit_logs/audit_db.php";
        Suc_Del();
    }
}

if(isset($_POST['wc_delete'])){
    $wcid = $_POST['wc_del'];
    if(!empty($wcid)){
        $query = "DELETE FROM hp_welcome WHERE hp_w_id = $wcid";
        $result = mysqli_query($conn, $query);
        require_once "../../audit_logs/audit_db.php";
        Suc_Del();
    }
}


/**
 * function list
 * 
 */
function get_an(){
    include "../../../includes/db_ep-inc.php";
    $query = "SELECT * FROM hp_announcement";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
//print_r($row);
    return $row;
}

function Suc_Add(){
    $_SESSION['status_p_acq'] = "Content Added!";
    $_SESSION['status_text'] = "You have successfully add the content!";
    $_SESSION['status_code'] = "success";
    echo "<script> window.location.href='homepage_admin.php' </script>";
}

function Suc_Del(){
    $_SESSION['status_p_acq'] = "Data Deleted!";
    $_SESSION['status_text'] = "You have successfully delete the data!";
    $_SESSION['status_code'] = "success";
    echo "<script> window.location.href='homepage_admin.php' </script>";
}


?>