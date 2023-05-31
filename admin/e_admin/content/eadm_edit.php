<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (empty(@$_SESSION["email"])) {
        session_destroy();
        echo "<script> window.location.href = '../../../login/login.php' </script>";
    }
}
require_once "../../audit_logs/audit_db.php";
require_once "../../../includes/db_ep-inc.php";

//schedule concerns - timekeeping
if (isset($_POST["u_schedule"])) {
    if (empty($_POST['ot']) && empty($_POST['shift']) && empty($_POST['time']) && empty($_POST['holidays'])){
        $_SESSION['status_e_adm'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
        echo "<script> window.location.href='eadm_admin.php' </script>";
    }
    if (!empty($_POST['ot'])) {
        $link = $_POST["ot"];
        $sql = "UPDATE e_admin SET link = '$link' WHERE id = 'ot'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";
        
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['shift'])) {
        $link = $_POST["shift"];
        $sql = "UPDATE e_admin SET link = '$link' WHERE id = 'shift'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";
        
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['time'])) {
        $link = $_POST["time"];
        $sql = "UPDATE e_admin SET link = '$link' WHERE id = 'time'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";
        
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['holidays'])) {
        $link = $_POST["holidays"];
        $sql = "UPDATE e_admin SET link = '$link' WHERE id = 'holidays'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";

        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }

    echo "<script> window.location.href='eadm_admin.php' </script>";
    // header("location: eadm_admin.php");
}

//statutory benefits - philhealth
if (isset($_POST["u_philhealth"])) {
    if (empty($_POST['contribution_ph']) && empty($_POST['maternity']) && empty($_POST['health']) && empty($_POST['concerns_ph'])){
        $_SESSION['status_e_adm'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
        echo "<script> window.location.href='eadm_admin.php' </script>";
    }
    if (!empty($_POST['contribution_ph'])) {
        $link = $_POST["contribution_ph"];
        $sql = "UPDATE e_admin SET link = '$link' WHERE id = 'contribution_ph'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";
        
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['maternity'])) {
        $link = $_POST["maternity"];
        $sql = "UPDATE e_admin SET link = '$link' WHERE id = 'maternity'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";
        
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['health'])) {
        $link = $_POST["health"];
        $sql = "UPDATE e_admin SET link = '$link' WHERE id = 'health'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";
        
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['concerns_ph'])) {
        $link = $_POST["concerns_ph"];
        $sql = "UPDATE e_admin SET link = '$link' WHERE id = 'concerns_ph'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";
        
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    echo "<script> window.location.href='eadm_admin.php' </script>";
    // header("location: eadm_admin.php");
}

//statutory benefits - sss
if (isset($_POST["u_sss"])) {
    if (empty($_POST['contribution_sss']) && empty($_POST['loan_sss']) && empty($_POST['concerns_sss'])){
        $_SESSION['status_e_adm'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
        echo "<script> window.location.href='eadm_admin.php' </script>";
    }
    if (!empty($_POST['contribution_sss'])) {
        $link = $_POST["contribution_sss"];
        $sql = "UPDATE e_admin SET link = '$link' WHERE id = 'contribution_sss'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";
        
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['loan_sss'])) {
        $link = $_POST["loan_sss"];
        $sql = "UPDATE e_admin SET link = '$link' WHERE id = 'loan_sss'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";
        
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['concerns_sss'])) {
        $link = $_POST["concerns_sss"];
        $sql = "UPDATE e_admin SET link = '$link' WHERE id = 'concerns_sss'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";
        
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    echo "<script> window.location.href='eadm_admin.php' </script>";
    // header("location: eadm_admin.php");
}

//statutory benefits - pag-ibig
if (isset($_POST["u_pagibig"])) {
    if (empty($_POST['contribution_pi']) && empty($_POST['loan_pi']) && empty($_POST['mp2']) && empty($_POST['concerns_pi'])){
        $_SESSION['status_e_adm'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
        echo "<script> window.location.href='eadm_admin.php' </script>";
    }
    if (!empty($_POST['contribution_pi'])) {
        $link = $_POST["contribution_pi"];
        $sql = "UPDATE e_admin SET link = '$link' WHERE id = 'contribution_pi'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";
        
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['loan_pi'])) {
        $link = $_POST["loan_pi"];
        $sql = "UPDATE e_admin SET link = '$link' WHERE id = 'loan_pi'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";
        
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['mp2'])) {
        $link = $_POST["mp2"];
        $sql = "UPDATE e_admin SET link = '$link' WHERE id = 'mp2'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";
        
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['concerns_pi'])) {
        $link = $_POST["concerns_pi"];
        $sql = "UPDATE e_admin SET link = '$link' WHERE id = 'concerns_pi'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";
        
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    echo "<script> window.location.href='eadm_admin.php' </script>";
    // header("location: eadm_admin.php");
}

//employee benefits program - leave
if (isset($_POST["u_leave"])) {
    if (!empty($_POST['vacation'])) {
        $content = $_POST["vacation"];
        $content = htmlEntEncode($content);
        $sql = "UPDATE ebp_leave SET content = '$content' WHERE l_leave = 'vacation'";
        mysqli_query($conn, $sql);
        
        require_once "../../audit_logs/audit_db.php";
        
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['sick'])) {
        $content = $_POST["sick"];
        $content = htmlEntEncode($content);
        $sql = "UPDATE ebp_leave SET content = '$content' WHERE l_leave = 'sick'";
        mysqli_query($conn, $sql);
                
        require_once "../../audit_logs/audit_db.php";
        
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['emergency'])) {
        $content = $_POST["emergency"];
        $content = htmlEntEncode($content);
        $sql = "UPDATE ebp_leave SET content = '$content' WHERE l_leave = 'emergency'";
        mysqli_query($conn, $sql);
                
        require_once "../../audit_logs/audit_db.php";
        
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['anniversary'])) {
        $content = $_POST["anniversary"];
        $content = htmlEntEncode($content);
        $sql = "UPDATE ebp_leave SET content = '$content' WHERE l_leave = 'anniversary'";
        mysqli_query($conn, $sql);
                
        require_once "../../audit_logs/audit_db.php";
        
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
                
        require_once "../../audit_logs/audit_db.php";
        
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['maternity'])) {
        $content = $_POST["maternity"];
        $content = htmlEntEncode($content);
        $sql = "UPDATE ebp_leave SET content = '$content' WHERE l_leave = 'maternity'";
        mysqli_query($conn, $sql);
                
        require_once "../../audit_logs/audit_db.php";
        
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['paternity'])) {
        $content = $_POST["paternity"];
        $content = htmlEntEncode($content);
        $sql = "UPDATE ebp_leave SET content = '$content' WHERE l_leave = 'paternity'";
        mysqli_query($conn, $sql);
                
        require_once "../../audit_logs/audit_db.php";
        
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['battered'])) {
        $content = $_POST["battered"];
        $content = htmlEntEncode($content);
        $sql = "UPDATE ebp_leave SET content = '$content' WHERE l_leave = 'battered'";
        mysqli_query($conn, $sql);
                
        require_once "../../audit_logs/audit_db.php";
        
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['without_pay'])) {
        $content = $_POST["without_pay"];
        $content = htmlEntEncode($content);
        $sql = "UPDATE ebp_leave SET content = '$content' WHERE l_leave = 'without_pay'";
        mysqli_query($conn, $sql);
                
        require_once "../../audit_logs/audit_db.php";
        
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['solo'])) {
        $content = $_POST["solo"];
        $content = htmlEntEncode($content);
        $sql = "UPDATE ebp_leave SET content = '$content' WHERE l_leave = 'solo'";
        mysqli_query($conn, $sql);
                
        require_once "../../audit_logs/audit_db.php";
        
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['special_benefit'])) {
        $content = $_POST["special_benefit"];
        $content = htmlEntEncode($content);
        $sql = "UPDATE ebp_leave SET content = '$content' WHERE l_leave = 'special_benefit'";
        mysqli_query($conn, $sql);
                
        require_once "../../audit_logs/audit_db.php";
        
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['bereavement'])) {
        $content = $_POST["bereavement"];
        $content = htmlEntEncode($content);
        $sql = "UPDATE ebp_leave SET content = '$content' WHERE l_leave = 'bereavement'";
        mysqli_query($conn, $sql);
                
        require_once "../../audit_logs/audit_db.php";
        
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['client_holiday'])) {
        $content = $_POST["client_holiday"];
        $content = htmlEntEncode($content);
        $sql = "UPDATE ebp_leave SET content = '$content' WHERE l_leave = 'client_holiday'";
        mysqli_query($conn, $sql);
                
        require_once "../../audit_logs/audit_db.php";
        
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['service_incentive'])) {
        $content = $_POST["service_incentive"];
        $content = htmlEntEncode($content);
        $sql = "UPDATE ebp_leave SET content = '$content' WHERE l_leave = 'service_incentive'";
        mysqli_query($conn, $sql);
                
        require_once "../../audit_logs/audit_db.php";
        
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    echo "<script> window.location.href='eadm_admin.php' </script>";
    // header("location: eadm_admin.php");
}

//employee benefits program - health and maintenance organizations (hmo)
if (isset($_POST["u_hmo"])) {
    if (!empty($_POST['concerns'])) {
        $content = $_POST["concerns"];
        $content = htmlEntEncode($content);
        $sql = "UPDATE health_maintenance SET content = '$content' WHERE hmo_id = 'concerns'";
        mysqli_query($conn, $sql);
                
        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['principal'])) {
        $content = $_POST["principal"];
        $content = htmlEntEncode($content);
        $sql = "UPDATE health_maintenance SET content = '$content' WHERE hmo_id = 'principal'";
        mysqli_query($conn, $sql);
                
        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['coverage'])) {
        $content = $_POST["coverage"];
        $content = htmlEntEncode($content);
        $sql = "UPDATE health_maintenance SET content = '$content' WHERE hmo_id = 'coverage'";
        mysqli_query($conn, $sql);
                
        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['enrollment'])) {
        $content = $_POST["enrollment"];
        $content = htmlEntEncode($content);
        $sql = "UPDATE health_maintenance SET content = '$content' WHERE hmo_id = 'enrollment'";
        mysqli_query($conn, $sql);
                
        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['cancellation'])) {
        $content = $_POST["cancellation"];
        $content = htmlEntEncode($content);
        $sql = "UPDATE health_maintenance SET content = '$content' WHERE hmo_id = 'cancellation'";
        mysqli_query($conn, $sql);
                
        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['hospitals'])) {
        $content = $_POST["hospitals"];
        $content = htmlEntEncode($content);
        $sql = "UPDATE health_maintenance SET content = '$content' WHERE hmo_id = 'hospitals'";
        mysqli_query($conn, $sql);
                
        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['mclinics'])) {
        $content = $_POST["mclinics"];
        $content = htmlEntEncode($content);
        $sql = "UPDATE health_maintenance SET content = '$content' WHERE hmo_id = 'mclinics'";
        mysqli_query($conn, $sql);
                
        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['dclinics'])) {
        $content = $_POST["dclinics"];
        $content = htmlEntEncode($content);
        $sql = "UPDATE health_maintenance SET content = '$content' WHERE hmo_id = 'dclinics'";
        mysqli_query($conn, $sql);
                
        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['optical'])) {
        $content = $_POST["optical"];
        $content = htmlEntEncode($content);
        $sql = "UPDATE health_maintenance SET content = '$content' WHERE hmo_id = 'optical'";
        mysqli_query($conn, $sql);
                
        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['dental'])) {
        $content = $_POST["dental"];
        $content = htmlEntEncode($content);
        $sql = "UPDATE health_maintenance SET content = '$content' WHERE hmo_id = 'dental'";
        mysqli_query($conn, $sql);
                
        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['insurance'])) {
        $content = $_POST["insurance"];
        $content = htmlEntEncode($content);
        $sql = "UPDATE health_maintenance SET content = '$content' WHERE hmo_id = 'insurance'";
        mysqli_query($conn, $sql);
                
        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['medicalre'])) {
        $content = $_POST["medicalre"];
        $content = htmlEntEncode($content);
        $sql = "UPDATE health_maintenance SET content = '$content' WHERE hmo_id = 'medicalre'";
        mysqli_query($conn, $sql);
                
        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['medicinere'])) {
        $content = $_POST["medicinere"];
        $content = htmlEntEncode($content);
        $sql = "UPDATE health_maintenance SET content = '$content' WHERE hmo_id = 'medicinere'";
        mysqli_query($conn, $sql);
                
        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['physical'])) {
        $content = $_POST["physical"];
        $content = htmlEntEncode($content);
        $sql = "UPDATE health_maintenance SET content = '$content' WHERE hmo_id = 'physical'";
        mysqli_query($conn, $sql);
                
        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    echo "<script> window.location.href='eadm_admin.php' </script>";
    // header("location: eadm_admin.php");
}

//employee benefits program - retirement program
if (isset($_POST["u_retirement"])) {
    if (!empty($_POST['retirement'])) {
        $link = $_POST["retirement"];

        $sql = "UPDATE e_admin SET `link` = '$link' WHERE `id` = 'retirement'";
        mysqli_query($conn, $sql);

                
        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
        
    } else if ($_FILES['retirementF']['name'] != "") {
        $filename = $_FILES["retirementF"]["name"];
        $tempname = $_FILES["retirementF"]["tmp_name"];
        $folder = '../../../employee_admin/assets/files/' . $filename;
        $folder_db = '/Employee-Portal/others/employee_admin/assets/files/' . $filename;

        $id = $_POST["identifier"];
                
        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";

        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_eadm($folder_db, $id);
            mysqli_query($conn, $query);
        }
    } else {
        $_SESSION['status_e_adm'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
    }
    echo "<script> window.location.href='eadm_admin.php' </script>";
    // header("location: eadm_admin.php");
}

//employee benefits program - payroll adjustment inquiry
if (isset($_POST["u_adjustment"])) {
    if (!empty($_POST['adjustment'])) {
        $link = $_POST["adjustment"];
        $sql = "UPDATE e_admin SET link = '$link' WHERE id = 'adjustment'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";

    } else if ($_FILES['adjustmentF']['name'] != "") {
        $filename = $_FILES["adjustmentF"]["name"];
        $tempname = $_FILES["adjustmentF"]["tmp_name"];
        $folder = '../../../employee_admin/assets/files/' . $filename;
        $folder_db = '/Employee-Portal/others/employee_admin/assets/files/' . $filename;

        $id = $_POST["identifier"];

        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";

        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_eadm($folder_db, $id);
            mysqli_query($conn, $query);
        }
    } else {
        $_SESSION['status_e_adm'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
    }
    echo "<script> window.location.href='eadm_admin.php' </script>";
    // header("location: eadm_admin.php");
}

//employee benefits program - payroll dispute inquiry
if (isset($_POST["u_dispute"])) {
    if (!empty($_POST['dispute'])) {
        $link = $_POST["dispute"];
        $sql = "UPDATE e_admin SET link = '$link' WHERE id = 'dispute'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";

    } else if ($_FILES['disputeF']['name'] != "") {
        $filename = $_FILES["disputeF"]["name"];
        $tempname = $_FILES["disputeF"]["tmp_name"];
        $folder = '../../../employee_admin/assets/files/' . $filename;
        $folder_db = '/Employee-Portal/others/employee_admin/assets/files/' . $filename;

        $id = $_POST["identifier"];

        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";

        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_eadm($folder_db, $id);
            mysqli_query($conn, $query);
        }
    } else {
        $_SESSION['status_e_adm'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
    }
    echo "<script> window.location.href='eadm_admin.php' </script>";
    // header("location: eadm_admin.php");
}

//employee information system - update of employee records
if (isset($_POST["u_u_records"])) {
    if (!empty($_POST['u_records'])) {
        $link = $_POST["u_records"];
        $sql = "UPDATE e_admin SET link = '$link' WHERE id = 'u_records'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";

    } else if ($_FILES['u_recordsF']['name'] != "") {
        $filename = $_FILES["u_recordsF"]["name"];
        $tempname = $_FILES["u_recordsF"]["tmp_name"];
        $folder = '../../../employee_admin/assets/files/' . $filename;
        $folder_db = '/Employee-Portal/others/employee_admin/assets/files/' . $filename;
        
        $id = $_POST["identifier"];

        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";

        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_eadm($folder_db, $id);
            mysqli_query($conn, $query);
        }
    } else {
        $_SESSION['status_e_adm'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
    }
    echo "<script> window.location.href='eadm_admin.php' </script>";
    // header("location: eadm_admin.php");
}

//employee information system - request of employee records
if (isset($_POST["u_r_records"])) {
    if (!empty($_POST['r_records'])) {
        $link = $_POST["r_records"];
        $sql = "UPDATE e_admin SET link = '$link' WHERE id = 'r_records'";
        mysqli_query($conn, $sql);
        $type=0;

        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";

    } else if ($_FILES['r_recordsF']['name'] != "") {
        $filename = $_FILES["r_recordsF"]["name"];
        $tempname = $_FILES["r_recordsF"]["tmp_name"];
        $folder = '../../../employee_admin/assets/files/' . $filename;
        $folder_db = '/Employee-Portal/others/employee_admin/assets/files/' . $filename;

        $id = $_POST["identifier"];

        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";

        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_eadm($folder_db, $id);
            mysqli_query($conn, $query);
        }
    } else {
        $_SESSION['status_e_adm'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
    }
    echo "<script> window.location.href='eadm_admin.php' </script>";
    // header("location: eadm_admin.php");
}

//procurement - request for supply purchase
if (isset($_POST["u_s_purchase"])) {
    if (!empty($_POST['s_purchase'])) {
        $link = $_POST["s_purchase"];
        $sql = "UPDATE e_admin SET link = '$link' WHERE id = 's_purchase'";
        mysqli_query($conn, $sql);
        $type=0;

        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";

    } else if ($_FILES['s_purchaseF']['name'] != "") {
        $filename = $_FILES["s_purchaseF"]["name"];
        $tempname = $_FILES["s_purchaseF"]["tmp_name"];
        $folder = '../../../employee_admin/assets/files/' . $filename;
        $folder_db = '/Employee-Portal/others/employee_admin/assets/files/' . $filename;

        $id = $_POST["identifier"];

        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";

        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_eadm($folder_db, $id);
            mysqli_query($conn, $query);
        }
    } else {
        $_SESSION['status_e_adm'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
    }
    echo "<script> window.location.href='eadm_admin.php' </script>";
    // header("location: eadm_admin.php");
}

//procurement - request for office equipment purchase
if (isset($_POST["u_e_purchase"])) {
    if (!empty($_POST['e_purchase'])) {
        $link = $_POST["e_purchase"];
        $sql = "UPDATE e_admin SET link = '$link' WHERE id = 'e_purchase'";
        mysqli_query($conn, $sql);
        $type=0;

        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";

    } else if ($_FILES['e_purchaseF']['name'] != "") {
        $filename = $_FILES["e_purchaseF"]["name"];
        $tempname = $_FILES["e_purchaseF"]["tmp_name"];
        $folder = '../../../others/employee_admin//assets/files/' . $filename;
        $folder_db = '/Employee-Portal/others/employee_admin/assets/files/' . $filename;

        $id = $_POST["identifier"];

        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_e_adm'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";

        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_eadm($folder_db, $id);
            mysqli_query($conn, $query);
        }
    } else {
        $_SESSION['status_e_adm'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
    }
    echo "<script> window.location.href='eadm_admin.php' </script>";
    // header("location: eadm_admin.php");
}
