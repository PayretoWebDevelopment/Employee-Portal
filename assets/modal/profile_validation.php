<?php
session_start();
require_once '../../admin/audit_logs/audit_db2.php';
include_once "../../includes/db_ep-inc.php";
include_once "../../includes/functions-inc.php";

if (isset($_POST['addUserButton'])) {
    $username = htmlentities($_POST['uname'], ENT_QUOTES, 'UTF-8');
    $FN = htmlentities($_POST['FN'], ENT_QUOTES, 'UTF-8');
    $LN = htmlentities($_POST['LN'], ENT_QUOTES, 'UTF-8');
    $role = htmlentities($_POST['role'], ENT_QUOTES, 'UTF-8');
    $location = htmlentities($_POST['location'], ENT_QUOTES, 'UTF-8');
    $department = htmlentities($_POST['department'], ENT_QUOTES, 'UTF-8');
    $email = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');
    $password = passSaltHash(sanitize($_POST['password']));
    $admin = sanitize($_POST['admin']);
    if($admin == 7){
        $admin_oa = 1;
    } else {
        $admin_oa = 0;
    }

    if(checkUserDuplicate($conn, $username) != true){
        $_SESSION['status_admin_sett'] = "User not added.";
        $_SESSION['status_text'] = "Username already taken!";
        $_SESSION['status_code'] = "error";
        echo "<script> window.location.href='/Employee-Portal/account/account_settings_validation.php' </script>";
    }
    if(checkEmailDuplicate($conn, $email) != true){
        $_SESSION['status_admin_sett'] = "User not added.";
        $_SESSION['status_text'] = "Email already in use!";
        $_SESSION['status_code'] = "error";
        echo "<script> window.location.href='/Employee-Portal/account/account_settings_validation.php' </script>";
    }

    $img = "avatar_default.png";

    // if(!preg_match("/^[a-zA-Z0-9]{3,}$/", $username)){
    $query = insert_employee($username, $FN, $LN, $role, $location, $department, $email, $password, $admin, $admin_oa, $img);
    $result = mysqli_query($conn, $query);
    $_SESSION['status_admin_sett'] = "User Added!";
    $_SESSION['status_text'] = "You have successfully added a user!";
    $_SESSION['status_code'] = "success";
    // }

    echo "<script> window.location.href='/Employee-Portal/account/account_settings_validation.php' </script>";
}

if (isset($_POST['deleteUserButton'])) {
    $ID = sanitize($_POST['ID']);

    $query = delete_employee($ID);
    $result = mysqli_query($conn, $query);
    $_SESSION['status_admin_sett'] = "User Deleted!";
    $_SESSION['status_text'] = "You have successfully deleted a user!";
    $_SESSION['status_code'] = "success";

    echo "<script> window.location.href='/Employee-Portal/account/account_settings_validation.php' </script>";
}

if (isset($_POST['restoreUserButton'])) {
    $email = sanitize($_POST['email']);
    $default_pass = passSaltHash('Payreto@123456');

    $query = update_password($email, $default_pass);
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['status_profile'] = "Success!";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_text'] = "Account's password has been set to default!";

        echo "<script> window.location.href='/Employee-Portal/account/account_settings_validation.php' </script>";
    }
}

if (isset($_POST['editUserButton'])) {
    $id = $_POST["id"];
    $username = sanitize($_POST['uname2']);
    $FN = sanitize($_POST['FN']);
    $LN = sanitize($_POST['LN']);
    $role = sanitize($_POST['role']);
    $location = sanitize($_POST['location']);
    $department = sanitize($_POST['department']);
    $email = sanitize($_POST['email2']);
    $admin = sanitize($_POST['admin']);
    if($admin == 7){
        $admin_oa = 1;
    } else {
        $admin_oa = 0;
    }

    $query = update_user($id, $username, $FN, $LN, $role, $location, $department, $email, $admin, $admin_oa);
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['status_admin_sett'] = "Success!";
        $_SESSION['status_text'] = "You have made changes to the user's profile!";
        $_SESSION['status_code'] = "success";

        echo "<script> window.location.href='/Employee-Portal/account/account_settings_validation.php' </script>";
    }
}
