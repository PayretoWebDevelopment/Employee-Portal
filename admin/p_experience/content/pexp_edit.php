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
if (isset($_POST["u_store"])) {
    // if (empty($_POST['redemption']) && empty($_POST['nomination']) && empty($_POST['store-purchase'])){
    //     //add stuff here
    //     $_SESSION['status_p_man'] = "! Error !";
    //     $_SESSION['status_text'] = "No link uploaded!";
    //     $_SESSION['status_code'] = "error";
    //     echo "<script> window.location.href='pexp_admin.php' </script>";
    // }
    if (!empty($_POST['redemption'])) {
        $link = $_POST["redemption"];
        $sql = "UPDATE p_management SET link = '$link' WHERE id = 'rewards'";
        mysqli_query($conn, $sql);
        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_p_man'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['nomination'])) {
        $link = $_POST["nomination"];
        $sql = "UPDATE p_management SET link = '$link' WHERE id = 'nomination'";
        mysqli_query($conn, $sql);
        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_p_man'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['store-purchase'])) {
        $link = $_POST["store-purchase"];
        $sql = "UPDATE p_management SET link = '$link' WHERE id = 'imbursement'";
        mysqli_query($conn, $sql);
        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_p_man'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    echo "<script> window.location.href='pexp_admin.php' </script>";
    // header("location: pexp_admin.php");
}


//foodpanda account
if (isset($_POST["u_panda"])) {
    if (empty($_FILES['acctactivation']['name']) && empty($_POST['contact']) && empty($_POST['contact-email'])){
        $_SESSION['status_p_man'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
        echo "<script> window.location.href='pexp_admin.php' </script>";
    }
    if ($_FILES['acctactivation']['name'] != "") {
        $filename = $_FILES["acctactivation"]["name"];
        $tempname = $_FILES["acctactivation"]["tmp_name"];
        $folder = '../../../people_operations/people_experience/assets/img/' . $filename;
        $folder_db = '/Employee-Portal/people_operations/people_experience/assets/img/' . $filename;

        $id = $_POST["identifier"];

        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_pman($folder_db, $id);
            mysqli_query($conn, $query);
        }
        
        require_once "../../audit_logs/audit_db.php";

        $_SESSION['status_p_man'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }

    if (!empty($_POST['contact'])) {
        $link = $_POST["contact"];
        $sql = "UPDATE p_management SET link = '$link' WHERE id = 'foodpanda2'";
        mysqli_query($conn, $sql);
        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_p_man'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['contact-email'])) {
        $link = $_POST["contact-email"];
        $sql = "UPDATE p_management SET link = '$link' WHERE id = 'foodpanda3'";
        mysqli_query($conn, $sql);
        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_p_man'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }

    echo "<script> window.location.href='pexp_admin.php' </script>";
    // header("location: pexp_admin.php");
}

// Grab Account


if (isset($_POST["u_grab"])) {
    if (empty($_FILES['grabactivation']['name']) && empty($_POST['grab_contact']) && empty($_POST['grab_contact-email'])){
        $_SESSION['status_p_man'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
        echo "<script> window.location.href='pexp_admin.php' </script>";
    }
    if ($_FILES['grabactivation']['name'] != "") {
        $filename = $_FILES["grabactivation"]["name"];
        $tempname = $_FILES["grabactivation"]["tmp_name"];
        $folder = '../../../people_operations/people_experience/assets/img/' . $filename;
        $folder_db = '/Employee-Portal/people_operations/people_experience/assets/img/' . $filename;

        $id = $_POST["identifier"];

        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_pman($folder_db, $id);
            mysqli_query($conn, $query);
        }
        
        require_once "../../audit_logs/audit_db.php";

        $_SESSION['status_p_man'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }

    if (!empty($_POST['grab_contact'])) {
        $link = $_POST["grab_contact"];
        $sql = "UPDATE p_management SET link = '$link' WHERE id = 'grab_account2'";
        mysqli_query($conn, $sql);
        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_p_man'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['grab_contact-email'])) {
        $link = $_POST["grab_contact-email"];
        $sql = "UPDATE p_management SET link = '$link' WHERE id = 'grab_account3'";
        mysqli_query($conn, $sql);
        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_p_man'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }

    echo "<script> window.location.href='pexp_admin.php' </script>";
    // header("location: pexp_admin.php");
}

//Sodexo Account
if (isset($_POST["u_sodexo"])) {
    if (empty($_FILES['sodexoactivation']['name']) && empty($_POST['sodexo_contact']) && empty($_POST['sodexo_contact-email'])){
        $_SESSION['status_p_man'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
        echo "<script> window.location.href='pexp_admin.php' </script>";
    }
    if ($_FILES['sodexoactivation']['name'] != "") {
        $filename = $_FILES["sodexoactivation"]["name"];
        $tempname = $_FILES["sodexoactivation"]["tmp_name"];
        $folder = '../../../people_operations/people_experience/assets/img/' . $filename;
        $folder_db = '/Employee-Portal/people_operations/people_experience/assets/img/' . $filename;

        $id = $_POST["identifier"];

        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_pman($folder_db, $id);
            mysqli_query($conn, $query);
        }
        
        require_once "../../audit_logs/audit_db.php";

        $_SESSION['status_p_man'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }

    if (!empty($_POST['sodexo_contact'])) {
        $link = $_POST["sodexo_contact"];
        $sql = "UPDATE p_management SET link = '$link' WHERE id = 'sodexo_account2'";
        mysqli_query($conn, $sql);
        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_p_man'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }
    if (!empty($_POST['sodexo_contact-email'])) {
        $link = $_POST["sodexo_contact-email"];
        $sql = "UPDATE p_management SET link = '$link' WHERE id = 'sodexo_account3'";
        mysqli_query($conn, $sql);
        require_once "../../audit_logs/audit_db.php";
        $_SESSION['status_p_man'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    }

    echo "<script> window.location.href='pexp_admin.php' </script>";
    // header("location: pexp_admin.php");
}

//list of activities and events
if (isset($_POST['u_events'])) {
    $sql = "SELECT * FROM events_activities";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $len = count($row);

    for ($i = 1; $i <= $len; $i++) {
        if (!empty($_POST['e_name' . $i] && $_POST['e_team' . $i] && $_POST['e_date' . $i] && $_POST['e_content' . $i])) {
            $e_id = $_POST["e_id" . $i];
            $e_name = $_POST["e_name" . $i];
            $e_team = $_POST["e_team" . $i];
            $e_date = $_POST["e_date" . $i];
            $e_content = $_POST["e_content" . $i];

            $e_name = htmlEntEncode($e_name);
            $e_team = htmlEntEncode($e_team);
            $e_content = htmlEntEncode($e_content);

            require_once "../../audit_logs/audit_db.php";

            if ($_FILES['e_img'.$i]['name'] != "") {
                $filename = $_FILES["e_img".$i]["name"];
                $tempname = $_FILES["e_img".$i]["tmp_name"];
                $folder = '../../../people_operations/people_experience/assets/files/' . $filename;
                $folder_db = '/Employee-Portal/people_operations/people_experience/assets/files/' . $filename;

                if (move_uploaded_file($tempname, $folder)) {
                    $sql = "UPDATE events_activities SET `e_name` = '$e_name', `e_team` = '$e_team', `e_date` = '$e_date', `e_content` = '$e_content', `e_img`='$folder_db' WHERE `e_id` = '$e_id'";
                    mysqli_query($conn, $sql);
                }
            } else {
                $sql = "UPDATE events_activities SET `e_name` = '$e_name', `e_team` = '$e_team', `e_date` = '$e_date', `e_content` = '$e_content' WHERE `e_id` = '$e_id'";
                mysqli_query($conn, $sql);
            }
                
                $_SESSION['status_p_man'] = "Event Updated!";
                $_SESSION['status_text'] = "You have successfully updated an event!!";
                $_SESSION['status_code'] = "success";
        }
    }

    if (!empty($_POST['e_field1'] && $_POST['e_field2'] && $_POST['e_field3'] && $_POST['e_field4'])) {
        $e_name = $_POST["e_field1"];
        $e_team = $_POST["e_field2"];
        $e_date = $_POST["e_field3"];
        $e_content = $_POST["e_field4"];

        $e_name = htmlEntEncode($e_name);
        $e_team = htmlEntEncode($e_team);
        $e_content = htmlEntEncode($e_content);

        require_once "../../audit_logs/audit_db.php";

        $e_poster = @$_SESSION['uname'];
        date_default_timezone_set("Hongkong");
        $e_posted = date("m/d/Y");

        if ($_FILES['e_img5']['name'] != "") {
            $filename = $_FILES["e_img5"]["name"];
            $tempname = $_FILES["e_img5"]["tmp_name"];
            $folder = '../../../people_operations/people_experience/assets/files/' . $filename;
            $folder_db = '/Employee-Portal/people_operations/people_experience/assets/files/' . $filename;
    
            if (move_uploaded_file($tempname, $folder)) {
                $sql = "INSERT INTO events_activities (e_id, e_name, e_team, e_date, e_content, e_poster, e_posted, e_img) VALUES (default, '$e_name', '$e_team', '$e_date', '$e_content', '$e_poster', '$e_posted', '$folder_db')";
                mysqli_query($conn, $sql);
            }
        } else {
            $sql = "INSERT INTO events_activities (e_id, e_name, e_team, e_date, e_content, e_poster, e_posted) VALUES (default, '$e_name', '$e_team', '$e_date', '$e_content', '$e_poster', '$e_posted')";
            mysqli_query($conn, $sql);
        }

        $_SESSION['status_p_man'] = "Event Added!!!";
        $_SESSION['status_text'] = "You have successfully added an event!!";
        $_SESSION['status_code'] = "success";
    }
    // } else {
    //     $_SESSION['status_p_man'] = "No Event Added/Updated.";
    //     $_SESSION['status_text'] = "No Event changed or added / all fields must be filled.";
    //     $_SESSION['status_code'] = "error";
    // }

    echo "<script> window.location.href='pexp_admin.php' </script>";
    // header("location: pexp_admin.php");
};

//post-event surveys
if (isset($_POST['u_survey'])) {
    $sql = "SELECT * FROM post_event";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $len = count($row);

    for ($i = 1; $i < $len; $i++) {
        if (!empty($_POST['p_name' . $i] && $_POST['p_link' . $i])) {
            $p_name = $_POST["p_name" . $i];
            $p_link = $_POST["p_link" . $i];
            $p_id = $_POST["p_id" . $i];

            $p_name = htmlEntEncode($p_name);

            require_once "../../audit_logs/audit_db.php";

            $sql = "UPDATE post_event SET p_name = '$p_name', p_link = '$p_link' WHERE p_id = '$p_id'";
            mysqli_query($conn, $sql);

            $_SESSION['status_p_man'] = "Survey Updated!";
            $_SESSION['status_text'] = "You have successfully updated a survey link!";
            $_SESSION['status_code'] = "success";
        }
    }

    if (!empty($_POST['p_field1'] && $_POST['p_field2'])) {
        $p_name = $_POST['p_field1'];
        $p_link = $_POST['p_field2'];

        $p_name = htmlEntEncode($p_name);

        require_once "../../audit_logs/audit_db.php";

        $sql = "INSERT INTO post_event (p_id, p_name, p_link) VALUES (default, '$p_name', '$p_link')";
        mysqli_query($conn, $sql);

        $_SESSION['status_p_man'] = "Survey Added!";
        $_SESSION['status_text'] = "You have successfully added a survey link!";
        $_SESSION['status_code'] = "success";
    }
    echo "<script> window.location.href='pexp_admin.php' </script>";
    // header("location: pexp_admin.php");
}

//file upload for company policies and procedures
if (isset($_POST["u_policy"])) {
    if ($_FILES['policy']['name'] != "") {
        $filename = $_FILES["policy"]["name"];
        $tempname = $_FILES["policy"]["tmp_name"];
        $folder = '../../../people_operations/people_experience/assets/files/' . $filename;
        $folder_db = '/Employee-Portal/people_operations/people_experience/assets/files/' . $filename;

        $id = $_POST["identifier"];

        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_pman($folder_db, $id);
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
    echo "<script> window.location.href='pexp_admin.php' </script>";
}


//employee handbook
if (isset($_POST["u_handbook"])) {
    if ($_FILES['handbook']['name'] != "") {
        $filename = $_FILES["handbook"]["name"];
        $tempname = $_FILES["handbook"]["tmp_name"];
        $folder = '../../../people_operations/people_experience/assets/files/' . $filename;
        $folder_db = '/Employee-Portal/people_operations/people_experience/assets/files/' . $filename;

        $id = $_POST["identifier"];

        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_pman($folder_db, $id);
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

    echo "<script> window.location.href='pexp_admin.php' </script>";
}


//employee code of conduct
if (isset($_POST["u_conduct"])) {
    if ($_FILES['conduct']['name'] != "") {
        $filename = $_FILES["conduct"]["name"];
        $tempname = $_FILES["conduct"]["tmp_name"];
        $folder = '../../../people_operations/people_experience/assets/files/' . $filename;
        $folder_db = '/Employee-Portal/people_operations/people_experience/assets/files/' . $filename;

        $id = $_POST["identifier"];

        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_pman($folder_db, $id);
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
    echo "<script> window.location.href='pexp_admin.php' </script>";
}


//performance management
if (isset($_POST["u_performance"])) {
    if ($_FILES['performance']['name'] != "") {
        $filename = $_FILES["performance"]["name"];
        $tempname = $_FILES["performance"]["tmp_name"];
        $folder = '../../../people_operations/people_experience/assets/files/' . $filename;
        $folder_db = '/Employee-Portal/people_operations/people_experience/assets/files/' . $filename;

        $id = $_POST["identifier"];

        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_pman($folder_db, $id);
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
    echo "<script> window.location.href='pexp_admin.php' </script>";
}


//employee concerns
if (isset($_POST["u_concern"])) {
    if (!empty($_POST['concern'])) {
        $link = $_POST["concern"];
        $sql = "UPDATE p_management SET link = '$link' WHERE id = 'concerns'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";

        $_SESSION['status_p_man'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    } else {
        $_SESSION['status_p_man'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
    }
    echo "<script> window.location.href='pexp_admin.php' </script>";
    // header("location: pexp_admin.php");
}


//incident report form
if (isset($_POST["u_incident"])) {
    if ($_FILES['incident']['name'] != "") {
        $filename = $_FILES["incident"]["name"];
        $tempname = $_FILES["incident"]["tmp_name"];
        $folder = '../../../people_operations/people_experience/assets/files/' . $filename;
        $folder_db = '/Employee-Portal/people_operations/people_experience/assets/files/' . $filename;

        $id = $_POST["identifier"];
        if (move_uploaded_file($tempname, $folder)) {
            $query = add_load_file_pman($folder_db, $id);
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
    echo "<script> window.location.href='pexp_admin.php' </script>";
}


//request for certificate of employment
if (isset($_POST["u_certificate"])) {
    if (!empty($_POST['certificate'])) {
        $link = $_POST["certificate"];
        $sql = "UPDATE p_management SET link = '$link' WHERE id = 'certificate'";
        mysqli_query($conn, $sql);

        require_once "../../audit_logs/audit_db.php";

        $_SESSION['status_p_man'] = "Content Updated!";
        $_SESSION['status_text'] = "You have successfully updated the content!";
        $_SESSION['status_code'] = "success";
    } else {
        $_SESSION['status_p_man'] = "! Error !";
        $_SESSION['status_text'] = "No link uploaded!";
        $_SESSION['status_code'] = "error";
    }
    echo "<script> window.location.href='pexp_admin.php' </script>";
    // header("location: pexp_admin.php");
}
require 'vendor/autoload.php'; // Include the PhpSpreadsheet autoloader

use PhpOffice\PhpSpreadsheet\IOFactory;
if(isset($_POST['payreto_points'])){
    include "../../../includes/db_ep-inc.php";
    if(isset($_FILES['payreto_p'])){
       
        $csvfile = $_FILES["payreto_p"]["tmp_name"];
        $spreadsheet = IOFactory::load($csvfile);

// Get the worksheet with the sheet name "Voucher"
$worksheet = $spreadsheet->getActiveSheet();

// Check if the worksheet was found
if ($worksheet) {
    // Get the header row as an array
    $headerRow = $worksheet->toArray()[0];

    // Find the column indexes
    // $col1_index = array_search("Employee Name", $headerRow);
    // $col2_index = array_search("Award", $headerRow);
    // $col3_index = array_search("Month/Quarter", $headerRow);
    // $col4_index = array_search("SUM of Points", $headerRow);
    // $col5_index = array_search("Redeem", $headerRow);
    // $col6_index = array_search("Date of Redemption", $headerRow);
    // $col7_index = array_search("Mode of Redemption", $headerRow);
    // $col8_index = array_search("Remarks", $headerRow);
    $col1_index = 0;
        $col2_index = 1;
        $col3_index = 2;
        $col4_index = 3;
        $col5_index = 4;
        $col6_index = 5;
        $col7_index = 6;
        $col8_index = 7;

    // Get the highest row number with data
    $highestRow = $worksheet->getHighestRow();

    // Loop through each row in the worksheet
    for ($row = 2; $row <= $highestRow; $row++) {
        // Get the values of the "Employee Name" and "Voucher Code" columns
        // sanitize($worksheet->getCellByColumnAndRow($col1_index + 1, $row)->getValue());
        $employeeName = sanitize($worksheet->getCellByColumnAndRow($col1_index + 1, $row)->getValue());
        $award = $worksheet->getCellByColumnAndRow($col2_index + 1, $row)->getValue();
        $month = $worksheet->getCellByColumnAndRow($col3_index + 1, $row)->getValue();
        $points = (int)$worksheet->getCellByColumnAndRow($col4_index + 1, $row)->getValue();
        $redeem = $worksheet->getCellByColumnAndRow($col5_index + 1, $row)->getValue();
        $dateRedemption = $worksheet->getCellByColumnAndRow($col6_index + 1, $row)->getValue();
        $modeRedemption = $worksheet->getCellByColumnAndRow($col7_index + 1, $row)->getValue();
        $remarks = $worksheet->getCellByColumnAndRow($col8_index + 1, $row)->getValue();
        if(empty($redeem) || $redeem == 'No' ){
            $redeem = 0;
        }else if($redeem == 'Yes'){
            $redeem = 1;
        }else if($redeem == "With Balance"){
            $redeem = 3;
        }else if($redeem == "Invalid"){
            $redeem = 4;
        }

        
                
        
        // Do something with the retrieved data, e.g., display it
        if(!empty($employeeName)){
            // $employeeName = mysqli_real_escape_string($conn, $employeeName);
            $sql = "INSERT INTO payreto_points (name_p, points_p, award_p, redeem, date_redeem, mode_redeem, remarks)
                    VALUES ('$employeeName', '$points', '$award', '$redeem', '$dateRedemption', '$modeRedemption', '$remarks' )";
            $result = mysqli_query($conn, $sql);
            // echo "Employee Name: " . $employeeName . "<br>";
            // echo "Award: " . $award . "<br>";
            // echo "Month: " . $month . "<br>";
            // echo "Points: " . $points . "<br>";
            // echo "Redeem: " . $redeem . "<br>";
            // echo "Date: " . $dateRedemption . "<br>";
            // echo "Mode: " . $modeRedemption . "<br>";
            // echo "Remarks: " . $remarks . "<br>";

            if($result){
                $_SESSION['status_p_man'] = "Content Updated!";
                $_SESSION['status_text'] = "You have successfully updated the content!";
                $_SESSION['status_code'] = "success";
            }else {
                $_SESSION['status_p_man'] = "! Error !";
                $_SESSION['status_text'] = "No file selected!";
                $_SESSION['status_code'] = "error";
            }

        }
        echo "<script> window.location.href='pexp_admin.php' </script>";
    }
} else {
    echo "Sheet 'Voucher' not found in Excel file.";
}
        // $input = fopen($csvfile, "r");
        // $header = fgetcsv($input);
        
        //     $col1_index = array_search("Employee Name", $header);
        //     $col2_index = array_search("SUM of Points", $header);
        //     $col3_index = array_search("Voucher Code", $header);
        //     $col4_index = array_search("Redeem", $header);
        //     $col5_index = array_search("Date of Redemption", $header);
        //     $col6_index = array_search("Mode of Redemption", $header);
        //     $col7_index = array_search("Remarks", $header);

        //     while ($row = fgetcsv($input)) {
               
        //         if(in_array('Voucher', $row)){
        //             echo $row[0];
        //         // Get the values of the columns you want to insert
        //         @$col1 = sanitize($row[$col1_index]);
        //         $col2 = $row[$col2_index];
        //         $col3 = $row[$col3_index];
        //         $col4 = $row[$col4_index];
        //         $col5 = $row[$col5_index];
        //         $col6 = $row[$col6_index];
        //         $col7 = $row[$col7_index];
        //         if(!empty($row[$col2_index])){
        //             $col2 = $row[$col2_index];
        //         }
        //         else{
        //             $col2 = 0;
        //         }
        //         if($row[$col4_index] == "Yes"){
        //             $col4 = 1;
        //         }
        //         else
        //             $col4 = 0;

        //         if(!empty($row[$col5_index])){
        //             $col5 = date("Y-m-d",strtotime($row[$col5_index]));
        //         }
        //         else
        //             $col5 = NULL;
        
        //         // Insert the data into the database
        //         $sql = "TRUNCATE TABLE payreto_points";
        //         $result = mysqli_query($conn, $sql);
        //         $sql = "INSERT INTO payreto_points (name_p, points_p, Voucher, redeem, date_redeem, mode_redeem, remarks)
        //                 VALUES ('$col1', $col2, '$col3', '$col4', '$col5', '$col6', '$col7')";
        //         $result = mysqli_query($conn, $sql);
        //         }
        //     }

        
    }
}
