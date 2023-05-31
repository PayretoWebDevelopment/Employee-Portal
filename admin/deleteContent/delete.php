<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (empty(@$_SESSION["email"])) {
        session_destroy();
        echo "<script> window.location.href = '../../login/login.php' </script>";
    }
}
    require_once "../audit_logs/audit_db2.php";

    $p_id = @$_GET['p_id'];
    $e_id = @$_GET['e_id'];
    $o_id = @$_GET['o_id'];
    $r_id = @$_GET['r_id'];
    $i_id = @$_GET['i_id'];

    //delete actions for different admin actions
    if(!empty($p_id)){ //delete for post events found in people management
        $sql = "DELETE FROM post_event WHERE p_id = $p_id";
        mysqli_query($conn, $sql);
        $_SESSION['status_p_man'] = "Survey Deleted!";
        $_SESSION['status_text'] = "You have successfully deleted a survey link!";
        $_SESSION['status_code'] = "success";
        echo "<script> window.location.href='../p_experience/content/pexp_admin.php' </script>";
        // header("location: ../../p_management/index.php");
    } else if(!empty($e_id)){ // delete for events and activities found in people management
        $sql = "DELETE FROM events_activities WHERE e_id = $e_id";
        mysqli_query($conn, $sql);
        $_SESSION['status_p_man'] = "Event Deleted!";
        $_SESSION['status_text'] = "You have successfully deleted an event!";
        $_SESSION['status_code'] = "success";
        echo "<script> window.location.href='../p_experience/content/pexp_admin.php' </script>";
        // header("location: ../../p_management/index.php");
    } else if(!empty($o_id)){ // delete for osh programs and activities found in people support
        $sql = "DELETE FROM osh_programs WHERE o_id = $o_id";
        mysqli_query($conn, $sql);
        $_SESSION['status_p_supp'] = "Event Deleted!";
        $_SESSION['status_text'] = "You have successfully deleted an event!";
        $_SESSION['status_code'] = "success";
        echo "<script> window.location.href='../p_support/content/psup_admin.php' </script>";
    } else if(!empty($r_id)){ // delete for list of open requisitions in people acquisition
        $sql = "DELETE FROM open_requisitions WHERE r_id = $r_id";
        mysqli_query($conn, $sql);
        $_SESSION['status_p_acq'] = "Position Deleted!";
        $_SESSION['status_code'] = "success";
        echo "<script> window.location.href='../p_acquisition/content/pacq_admin.php' </script>";
    }else if(!empty($i_id)){ // delete for list of intern positions found in people acquisition
        $sql = "DELETE FROM intern_positions WHERE i_id = $i_id";
        mysqli_query($conn, $sql);
        $_SESSION['status_p_acq'] = "Position Deleted!";
        $_SESSION['status_code'] = "success";
        echo "<script> window.location.href='../p_acquisition/content/pacq_admin.php' </script>";
        
    } else {
        echo "failed to delete event";
        // echo "<script> window.location.href='../../p_management/index.php' </script>";
        // header("location: ../../p_management/index.php");
    }
?>