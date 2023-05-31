<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (empty(@$_SESSION["email"])) {
        session_destroy();
        echo "<script> window.location.href = '../../../login/login.php' </script>";
    }
}

require_once "../../../includes/functions-inc.php";
require_once "../../../includes/db_ep-inc.php";
// require_once "../../audit_logs/audit_db.php";

//requests
if (isset($_POST["u_requests"])) {
    if ($_FILES['supply']['name'] != "") {
        $filename = $_FILES["supply"]["name"];
        $tempname = $_FILES["supply"]["tmp_name"];
        $folder = '../../../people_support/assets/files/' . $filename;
        $folder_db = '/Employee-Portal/people_services/people_support/assets/files/' . $filename;

        $id = $_POST["identifier"];
        
        require_once "../../audit_logs/audit_db.php";

        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_psup($folder_db, $id);
            mysqli_query($conn, $query);
            $_SESSION['status_p_supp'] = "Content Updated!";
            $_SESSION['status_text'] = "You have successfully updated the content!";
            $_SESSION['status_code'] = "success";
            echo "<script> window.location.href='psup_admin.php' </script>";
        }
    }
    if (!empty($_POST['food'])) {
        $link = $_POST["food"];
        require_once "../../audit_logs/audit_db.php";
        $sql = "UPDATE p_support SET link = '$link' WHERE id = 'food'";
        mysqli_query($conn, $sql);
    }
    if (!empty($_POST['delivery'])) {
        $link = $_POST["delivery"];
        require_once "../../audit_logs/audit_db.php";
        $sql = "UPDATE p_support SET link = '$link' WHERE id = 'delivery'";
        mysqli_query($conn, $sql);
    }
    if (!empty($_POST['transpo'])) {
        $link = $_POST["transpo"];
        require_once "../../audit_logs/audit_db.php";
        $sql = "UPDATE p_support SET link = '$link' WHERE id = 'transpo'";
        mysqli_query($conn, $sql);
    }
    if (!empty($_POST['repair'])) {
        $link = $_POST["repair"];
        require_once "../../audit_logs/audit_db.php";
        $sql = "UPDATE p_support SET link = '$link' WHERE id = 'repair'";
        mysqli_query($conn, $sql);
    }
    if (!empty($_POST['load'])) {
        $link = $_POST["load"];
        require_once "../../audit_logs/audit_db.php";
        $sql = "UPDATE p_support SET link = '$link' WHERE id = 'load'";
        mysqli_query($conn, $sql);
    }
    
    $_SESSION['status_p_supp'] = "Content Updated!";
    $_SESSION['status_text'] = "You have successfully updated the content!";
    $_SESSION['status_code'] = "success";
    echo "<script> window.location.href='psup_admin.php' </script>";
    // header("location: psup_admin.php");
}

//reimbursement
if (isset($_POST["u_reimbursement"])) {
    if (!empty($_POST['reimbursement'])) {
        $link = $_POST["reimbursement"];
        require_once "../../audit_logs/audit_db.php";
        $sql = "UPDATE p_support SET link = '$link' WHERE id = 'reimbursement';";
        mysqli_query($conn, $sql);
    }
    if (!empty($_FILES['reimbursementF']['name'])) {
        $filename = $_FILES["reimbursementF"]["name"];
        $tempname = $_FILES["reimbursementF"]["tmp_name"];
        $folder = '../../../people_services/people_support/assets/files/' . $filename;
        $folder_db = '/Employee-Portal/people_services/people_support/assets/files/' . $filename;

        $id = $_POST["n_reimbursement"];
        require_once "../../audit_logs/audit_db.php";

        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_psup($folder_db, $id);
            mysqli_query($conn, $query);
            $_SESSION['status_p_man'] = "Content Updated!";
            $_SESSION['status_text'] = "You have successfully updated the content!";
            $_SESSION['status_code'] = "success";
        }
    }
    $_SESSION['status_p_supp'] = "Content Updated!";
    $_SESSION['status_text'] = "You have successfully updated the content!";
    $_SESSION['status_code'] = "success";
    echo "<script> window.location.href='psup_admin.php' </script>";
    // header("location: psup_admin.php");
}

//business continuity plan (bcp) employee information 
if (isset($_POST["u_bcp_i"])) {
    if (!empty($_POST['bcp_i'])) {
        $link = $_POST["bcp_i"];
        require_once "../../audit_logs/audit_db.php";
        $sql = "UPDATE p_support SET link = '$link' WHERE id = 'bcp_i'";
        mysqli_query($conn, $sql);
    }
    $_SESSION['status_p_supp'] = "Content Updated!";
    $_SESSION['status_text'] = "You have successfully updated the content!";
    $_SESSION['status_code'] = "success";
    echo "<script> window.location.href='psup_admin.php' </script>";
    // header("location: psup_admin.php");
}

//occupational safety and health 
if (isset($_POST["u_health"])) {
    if (!empty($_POST['health2'])) {
        $link = $_POST["health2"];
        require_once "../../audit_logs/audit_db.php";
        $sql = "UPDATE p_support SET link = '$link' WHERE id = 'health'";
        mysqli_query($conn, $sql);
    }
    if (!empty($_FILES['healthF']['name'])) {
        $filename = $_FILES["healthF"]["name"];
        $tempname = $_FILES["healthF"]["tmp_name"];
        $folder = '../../../people_support/assets/files/' . $filename;
        $folder_db = '/Employee-Portal/people_services/people_support/assets/files/' . $filename;

        $id = $_POST["identifier"];

        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_psup($folder_db, $id);
            //$sql = "UPDATE `p_support` SET `link` = '$folder' WHERE `id` = 'health';";
            mysqli_query($conn, $query);
            $_SESSION['status_p_man'] = "Content Updated!";
            $_SESSION['status_text'] = "You have successfully updated the content!";
            $_SESSION['status_code'] = "success";
            echo "<script> window.location.href='psup_admin.php' </script>";
        }
    }
    $_SESSION['status_p_supp'] = "Content Updated!";
    $_SESSION['status_text'] = "You have successfully updated the content!";
    $_SESSION['status_code'] = "success";
    echo "<script> window.location.href='psup_admin.php' </script>";
    // header("location: psup_admin.php");
}

//list of osh programs and avtivities
if (isset($_POST['u_osh'])) {
    $sql = "SELECT * FROM osh_programs";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $len = count($row);

    for ($i = 1; $i <= $len; $i++) {
        if (!empty($_POST['o_name' . $i] && $_POST['o_date' . $i] && $_POST['o_desc' . $i])) {
            $o_id = $_POST["o_id" . $i];
            $o_name = $_POST["o_name" . $i];
            $o_date = $_POST["o_date" . $i];
            $o_desc = $_POST["o_desc" . $i];

            $o_name = htmlEntEncode($o_name);
            $o_desc = htmlEntEncode($o_desc);

            require_once "../../audit_logs/audit_db.php";

            if ($_FILES['o_img'.$i]['name'] != "") {
                $filename = $_FILES["o_img".$i]["name"];
                $tempname = $_FILES["o_img".$i]["tmp_name"];
                $folder = '../../../people_support/assets/files/' . $filename;
                $folder_db = '/Employee-Portal/people_services/people_support/assets/files/' . $filename;

                if (move_uploaded_file($tempname, $folder)) {
                    $sql = "UPDATE osh_programs SET o_name = '$o_name', o_date = '$o_date', o_desc = '$o_desc', o_img = '$folder_db' WHERE o_id = '$o_id'";
                    mysqli_query($conn, $sql);
                }
            } else {
                $sql = "UPDATE osh_programs SET o_name = '$o_name', o_date = '$o_date', o_desc = '$o_desc' WHERE o_id = '$o_id'";
                mysqli_query($conn, $sql);
            }
                
                $_SESSION['status_p_man'] = "Event Updated!";
                $_SESSION['status_text'] = "You have successfully updated an event!";
                $_SESSION['status_code'] = "success";
        }
    }

    if (!empty($_POST['o_field1'] && $_POST['o_field2'] && $_POST['o_field3'])) {
        $o_name = $_POST["o_field1"];
        $o_date = $_POST["o_field2"];
        $o_desc = $_POST["o_field3"];

        $o_name = htmlEntEncode($o_name);
        $o_date = htmlEntEncode($o_date);
        $o_desc = htmlEntEncode($o_desc);

        $o_poster = @$_SESSION['uname'];
        date_default_timezone_set("Hongkong");
        $o_posted = date("m/d/Y");

        require_once "../../audit_logs/audit_db.php";

        if ($_FILES['o_img5']['name'] != "") {
            $filename = $_FILES["o_img5"]["name"];
            $tempname = $_FILES["o_img5"]["tmp_name"];
            $folder = '../../../people_support/assets/files/' . $filename;
            $folder_db = '/Employee-Portal/people_services/people_support/assets/files/' . $filename;

            if (move_uploaded_file($tempname, $folder)) {
                $sql = "INSERT INTO osh_programs (o_id, o_name, o_date, o_desc, o_poster, o_posted, o_img) VALUES (default, '$o_name', '$o_date', '$o_desc', '$o_poster', '$o_posted', '$folder_db')";
                mysqli_query($conn, $sql);
            }
        } else {
            $sql = "INSERT INTO osh_programs (o_id, o_name, o_date, o_desc, o_poster, o_posted) VALUES (default, '$o_name', '$o_date', '$o_desc', '$o_poster', '$o_posted')";
            mysqli_query($conn, $sql);
        }

        $_SESSION['status_p_supp'] = "Event Added!";
        $_SESSION['status_text'] = "You have successfully added an event!";
        $_SESSION['status_code'] = "success";
    }

    echo "<script> window.location.href='psup_admin.php' </script>";
    // header("location: ../../p_management/index.php");
};

//incident/accident report
if (isset($_POST["u_incident"])) {
    if (!empty($_POST['incident'])) {
        $link = $_POST["incident"];
        require_once "../../audit_logs/audit_db.php";
        $sql = "UPDATE p_support SET link = '$link' WHERE id = 'incident'";
        mysqli_query($conn, $sql);
    }

    if (!empty($_FILES['incidentF']['name'])) {
        $filename = $_FILES["incidentF"]["name"];
        $tempname = $_FILES["incidentF"]["tmp_name"];
        $folder = '../../../people_support/assets/files/' . $filename;
        $folder_db = '/Employee-Portal/people_services/people_support/assets/files/' . $filename;

        $id = $_POST["identifier"];

        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_psup($folder_db, $id);
            mysqli_query($conn, $query);
            $_SESSION['status_p_man'] = "Content Updated!";
            $_SESSION['status_text'] = "You have successfully updated the content!";
            $_SESSION['status_code'] = "success";
            echo "<script> window.location.href='psup_admin.php' </script>";
        }
    }
    $_SESSION['status_p_supp'] = "Content Updated!";
    $_SESSION['status_text'] = "You have successfully updated the content!";
    $_SESSION['status_code'] = "success";
    echo "<script> window.location.href='psup_admin.php' </script>";
    // header("location: psup_admin.php");
}

//workplace condition report form
if (isset($_POST["u_workplace"])) {

    if (!empty($_POST['workplace'])) {
        $link = $_POST["workplace"];
        require_once "../../audit_logs/audit_db.php";
        $sql = "UPDATE p_support SET link = '$link' WHERE id = 'workplace'";
        mysqli_query($conn, $sql);
    }

    if (!empty($_FILES['workplaceF']['name'])) {
        $filename = $_FILES["workplaceF"]["name"];
        $tempname = $_FILES["workplaceF"]["tmp_name"];
        $folder = '../../../people_support/assets/files/' . $filename;
        $folder_db = '/Employee-Portal/people_services/people_support/assets/files/' . $filename;

        require_once "../../audit_logs/audit_db.php";

        if (move_uploaded_file($tempname, $folder)) {
            $id = $_POST['identifier'];
            $query = add_load_file_psup($folder_db, $id);
            mysqli_query($conn, $query);
            $_SESSION['status_p_man'] = "Content Updated!";
            $_SESSION['status_text'] = "You have successfully updated the content!";
            $_SESSION['status_code'] = "success";
            echo "<script> window.location.href='psup_admin.php' </script>";
        }
    }
    $_SESSION['status_p_supp'] = "Content Updated!";
    $_SESSION['status_text'] = "You have successfully updated the content!";
    $_SESSION['status_code'] = "success";
    echo "<script> window.location.href='psup_admin.php' </script>";
    // header("location: psup_admin.php");
}

//on-site medicine request
if (isset($_POST["u_medicine"])) {
    if (!empty($_POST['medicine'])) {
        $link = $_POST["medicine"];
        require_once "../../audit_logs/audit_db.php";
        $sql = "UPDATE p_support SET link = '$link' WHERE id = 'medicine'";
        mysqli_query($conn, $sql);
    }
    if (!empty($_FILES['medicineF']['name'])) {
        $filename = $_FILES["medicineF"]["name"];
        $tempname = $_FILES["medicineF"]["tmp_name"];
        $folder = '../../../people_support/assets/files/' . $filename;
        $folder_db = '/Employee-Portal/people_services/people_support/assets/files/' . $filename;

        require_once "../../audit_logs/audit_db.php";

        if (move_uploaded_file($tempname, $folder)) {
            $id = $_POST['identifier'];
            $query = add_load_file_psup($folder_db, $id);
            mysqli_query($conn, $query);
            $_SESSION['status_p_man'] = "Content Updated!";
            $_SESSION['status_text'] = "You have successfully updated the content!";
            $_SESSION['status_code'] = "success";
            echo "<script> window.location.href='psup_admin.php' </script>";
        }
    }
    $_SESSION['status_p_supp'] = "Content Updated!";
    $_SESSION['status_text'] = "You have successfully updated the content!";
    $_SESSION['status_code'] = "success";
    echo "<script> window.location.href='psup_admin.php' </script>";
    // header("location: psup_admin.php");
}

//company nurse assistance request
if (isset($_POST["u_nurse"])) {
    if (!empty($_POST['nurse'])) {
        $link = $_POST["nurse"];
        require_once "../../audit_logs/audit_db.php";
        $sql = "UPDATE p_support SET link = '$link' WHERE id = 'nurse'";
        mysqli_query($conn, $sql);
    }

    if (!empty($_FILES['nurseF']['name'])) {
        $filename = $_FILES["nurseF"]["name"];
        $tempname = $_FILES["nurseF"]["tmp_name"];
        $folder = '../../../people_support/assets/files/' . $filename;
        $folder_db = '/Employee-Portal/people_services/people_support/assets/files/' . $filename;

        require_once "../../audit_logs/audit_db.php";

        if (move_uploaded_file($tempname, $folder)) {
            $id = $_POST['identifier'];
            $query = add_load_file_psup($folder_db, $id);
            mysqli_query($conn, $query);
            $_SESSION['status_p_man'] = "Content Updated!";
            $_SESSION['status_text'] = "You have successfully updated the content!";
            $_SESSION['status_code'] = "success";
            echo "<script> window.location.href='psup_admin.php' </script>";
        }
    }

    $_SESSION['status_p_supp'] = "Content Updated!";
    $_SESSION['status_text'] = "You have successfully updated the content!";
    $_SESSION['status_code'] = "success";
    echo "<script> window.location.href='psup_admin.php' </script>";
    // header("location: psup_admin.php");
}
