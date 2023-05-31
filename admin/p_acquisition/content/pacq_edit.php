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


if (isset($_POST["u_e_referral"])) {
    if (!empty($_POST['e_referral'])) {
        $link = $_POST["e_referral"];
        $sql = "UPDATE p_acquisition SET link = '$link' WHERE id = 'e_referral'";
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
    echo "<script> window.location.href='pacq_admin.php' </script>";
    // header("location: ../../p_management/index.php");
}

//list of open requisitions
if (isset($_POST['u_requisitions'])) {
    $sql = "SELECT * FROM open_requisitions";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $len = count($row);

    for ($i = 1; $i < $len; $i++) {
        if (!empty($_POST['r_pos' . $i] && $_POST['r_num' . $i])) {
            $r_pos = $_POST["r_pos" . $i];
            $r_num = $_POST["r_num" . $i];
            $r_id = $_POST["r_id" . $i];

            $r_pos = htmlEntEncode($r_pos);

            require_once "../../audit_logs/audit_db.php";

            $sql = "UPDATE open_requisitions SET r_pos = '$r_pos', r_num = '$r_num' WHERE r_id = '$r_id'";
            mysqli_query($conn, $sql);
            $_SESSION['status_p_acq'] = "Position Updated!";
            $_SESSION['status_text'] = "You have successfully updated the position details!";
            $_SESSION['status_code'] = "success";
        }
    }

    if (!empty($_POST['r_field1'] && $_POST['r_field2'])) {
        $r_pos = $_POST['r_field1'];
        $r_num = $_POST['r_field2'];

        $r_pos = htmlEntEncode($r_pos);

        require_once "../../audit_logs/audit_db.php";

        $sql = "INSERT INTO open_requisitions (r_id, r_pos, r_num) VALUES (default, '$r_pos', '$r_num')";
        mysqli_query($conn, $sql);
        $_SESSION['status_p_acq'] = "Position Added!";
        $_SESSION['status_text'] = "You have successfully added a position.";
        $_SESSION['status_code'] = "success";
    }
   
    echo "<script> window.location.href='pacq_admin.php' </script>";

    // header("location: ../../p_management/index.php");
}

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
    echo "<script> window.location.href='pacq_admin.php' </script>";
    // header("location: pacq_admin.php");
}

//list of intern positions
if (isset($_POST['u_positions'])) {
    $sql = "SELECT * FROM intern_positions";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $len = count($row);

    for ($i = 1; $i < $len; $i++) {
        if (!empty($_POST['i_pos' . $i] && $_POST['i_num' . $i])) {
            $i_pos = $_POST["i_pos" . $i];
            $i_num = $_POST["i_num" . $i];
            $i_id = $_POST["i_id" . $i];

            $i_pos = htmlEntEncode($i_pos);

            require_once "../../audit_logs/audit_db.php";

            $sql = "UPDATE intern_positions SET i_pos = '$i_pos', i_num = '$i_num' WHERE i_id = '$i_id'";
            mysqli_query($conn, $sql);
            $_SESSION['status_p_acq'] = "Position Updated!";
            $_SESSION['status_text'] = "You have successfully updated the position details!";
            $_SESSION['status_code'] = "success";
        }
    }

    if (!empty($_POST['i_field1'] && $_POST['i_field2'])) {
        $i_pos = $_POST['i_field1'];
        $i_num = $_POST['i_field2'];

        $i_pos = htmlEntEncode($i_pos);

        require_once "../../audit_logs/audit_db.php";

        $sql = "INSERT INTO intern_positions (i_id, i_pos, i_num) VALUES (default, '$i_pos', '$i_num')";
        mysqli_query($conn, $sql);
        $_SESSION['status_p_acq'] = "Position Added!";
        $_SESSION['status_text'] = "You have successfully added a position.";
        $_SESSION['status_code'] = "success";
    }
    echo "<script> window.location.href='pacq_admin.php' </script>";
    // header("location: ../../p_management/index.php");
}

//intern referral
if (isset($_POST['u_referral'])) {
    if (!empty($_POST['i_referral'])) {
        $link = $_POST["i_referral"];
        $sql = "UPDATE p_acquisition SET link = '$link' WHERE id = 'i_referral'";
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
    echo "<script> window.location.href='pacq_admin.php' </script>";
    // header("location: pacq_admin.php");
}

//employee onboarding
if (isset($_POST['u_preemp'])) {
    if (empty($_POST['requirement']) && empty($_POST['concerns'])){
        $_SESSION['status_p_man'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
        echo "<script> window.location.href='pacq_admin.php' </script>";
    }
    if (!empty($_POST['requirement'])) {
        $link = $_POST["requirement"];
        $sql = "UPDATE p_acquisition SET link = '$link' WHERE id = 'requirement'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";

        $_SESSION['status_p_acq'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['concerns'])) {
        $link = $_POST["concerns"];
        $sql = "UPDATE p_acquisition SET link = '$link' WHERE id = 'concerns'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";

        $_SESSION['status_p_acq'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    echo "<script> window.location.href='pacq_admin.php' </script>";
    // header("location: pacq_admin.php");
}

//payreto id
if (isset($_POST['u_id'])) {
    if (empty($_POST['i_submission']) && empty($_POST['update_id']) && empty($_POST['request_id'])){
        $_SESSION['status_p_man'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
        echo "<script> window.location.href='pacq_admin.php' </script>";
    }
    if (!empty($_POST['i_submission'])) {
        $link = $_POST["i_submission"];
        $sql = "UPDATE p_acquisition SET link = '$link' WHERE id = 'i_submission'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";

        $_SESSION['status_p_acq'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['update_id'])) {
        $link = $_POST["update_id"];
        $sql = "UPDATE p_acquisition SET link = '$link' WHERE id = 'update_id'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";

        $_SESSION['status_p_acq'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['request_id'])) {
        $link = $_POST["request_id"];
        $sql = "UPDATE p_acquisition SET link = '$link' WHERE id = 'request_id'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";

        $_SESSION['status_p_acq'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    echo "<script> window.location.href='pacq_admin.php' </script>";
    // header("location: pacq_admin.php");
}
