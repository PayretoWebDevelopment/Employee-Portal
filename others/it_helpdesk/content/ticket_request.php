<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (empty(@$_SESSION["email"])) {
        echo "<script> window.location.href = '../../login.php' </script>";
    }
}
$email = $_SESSION["email"];
include '../../../includes/db_ep-inc.php';
include '../../../includes/functions-inc.php';
include '../../../includes/plugins.php';
getInfo($conn, $email);
$uname = filter_var($_SESSION['uname'], FILTER_SANITIZE_SPECIAL_CHARS);
$role = $_SESSION['role'];
$img = $_SESSION['img'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Local CSS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/Employee-Portal/assets/css/dashboard_styles.css">
    <link rel="stylesheet" href="/Employee-Portal/others/it_helpdesk/assets/css/it_helpdesk_styles.css">
    <link rel="stylesheet" href="/Employee-Portal/others/it_helpdesk/assets/css/ticket_styles.css">
</head>
<title>Payreto Employee Portal | IT Helpdesk</title>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include "../../../includes/sidebar.php"; ?>
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="heading-payreto navbar navbar-expand-lg navbar-light py-3 px-4">
                <div class="d-flex align-items-center header-text">
                    <i class="fas fa-align-left tertiary-text fs-4 me-3" id="menu-toggle"></i>
                    <a class="back-icon me-3" href="/Employee-Portal/others/it_helpdesk/index.php"><i class="back-icon fa-solid fa-angle-left"></i></a>
                    <h4 class="m-0">IT HELPDESK</h4>
                </div>
                <?php
                include "../../../includes/header.php";
                ?>
            </nav>
            <div class="w-100 py-5">
                <div class="container">
                    <h1 class="card-heading my-5 text-uppercase text-center">Ticket Request Email Template</h1>
                    <div class="container-fluid">
                        <main>
                            <h1 class="mb-5 fw-bold text-center fs-3">How To: Create a Ticket Request via Email</h1>
                            <ol class="gradient-list">
                                <li>Login to your company provided email.</li>
                                <li>
                                    <!-- 
                                    Create or compose new email with the below template: <br><br>
                                    <table class="template-table" id="table-to-copied">
                                        <tbody>
                                            <tr>
                                                <td>Type of Issue:</td>
                                                <td>ㅤㅤㅤㅤㅤㅤ</td>
                                            </tr>
                                            <tr>
                                                <td>Description of the Issue:</td>
                                                <td>ㅤㅤㅤㅤㅤㅤ</td>
                                            </tr>
                                            <tr>
                                                <td>Who is affected by the issue: </td>
                                                <td>ㅤㅤㅤㅤㅤㅤ</td>
                                            </tr>
                                            <tr>
                                                <td>Urgency: (High, Medium, Low)</td>
                                                <td>ㅤㅤㅤㅤㅤㅤ</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <button class="btn btn-outline-dark btn-sm" id="btn-copy-table">Copy</button>
                                     -->

                                    Fill out this form and click submit:  
                                    <?php
                                        //error message
                                        if (isset($_GET["error"])) {

                                            $error_color = "red";

                                            switch($_GET["error"]){
                                                case "sent": $error_color = "green"; $error_string = "Email successfully sent!"; break;
                                                default: $error_string = "An error occured while sending the email."; break;
                                            }

                                            echo "<p align='center' class='error-msg' style='color:" . $error_color . ";'>" . $error_string . "</p>";
                                        }
                                    ?>
                                    <form class="d-flex flex-column d-flex justify-content-center align-items-center" action="./send_ticket_request.php" method="post"> 
                                        <div class="mb-3 col-6">
                                            <label for="issue_type" class="col-form-label text-payreto-darkblue-900 fw-bold">Type of Issue:</label>
                                            <input type="text" required class="form-control" name="issue_type">
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label for="issue_desc" class="col-form-label text-payreto-darkblue-900 fw-bold">Description of the Issue:</label>
                                            <input type="text" required class="form-control" name="issue_desc">
                                        </div> 
                                        <div class="mb-3 col-6">
                                            <label for="issue_affected" class="col-form-label text-payreto-darkblue-900 fw-bold">Who is affected by the issue:</label>
                                            <input type="text" required class="form-control" name="issue_affected">
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label for="issue_urgency" class="col-form-label text-payreto-darkblue-900 fw-bold">Urgency of the Issue:</label>
                                            <select class="form-select" name="issue_urgency" required>
                                                <option selected>-- Select Urgency --</option>
                                                <option value="0">Low</option>
                                                <option value="1">Medium</option>
                                                <option value="2">High</option>
                                            </select>
                                        </div>
                                        <div>
                                            <input type="submit" value="Submit" name="submit">
                                        </div>
                                    </form>
                                </li>
                            </ol>

                        </main>
                        <main>
                            <h1 class="mt-5 fw-bold text-center fs-3">Incident</h1>
                            <p class="mb-5 text-center"><i>Break-fix issues where there is an unplanned interruption or degradation of IT service. Something that is expected to be working, breaks down or experiences degradation.</i></p>
                            <ol class="gradient-list">
                                <li>
                                    SAMPLE: <br><br>
                                    <p>
                                        ✓ Type of Issue: Laptop Camera Issue<br>
                                        ✓ Description of the Issue: Unable to detect / camera is not working while on Google Meet <br>
                                        ✓ Who is affected by the issue: Juan Dela Cruz <br>
                                        ✓ Urgency: <i>(High, Medium, Low)</i> <br>
                                    </p>
                                </li>
                                <li>Send to it.support@payreto.com</li>
                            </ol>
                        </main>
                        <main>
                            <h1 class="mt-5 fw-bold text-center fs-3">Service Request</h1>
                            <p class="mb-5 text-center">
                                <i>
                                    a. Hardware - equipment request, upgrade or replacement, etc. <br>
                                    b. Software - Installation, License requests, Updates, etc. <br>
                                    c. Access - Network or Wireless Access, Shared Drive, Email Access, etc. <br>
                                </i>
                            </p>
                            <ol class="gradient-list">
                                <li>
                                    SAMPLE: <br><br>
                                    <p>
                                        ✓ Type of Issue: Viber Installation<br>
                                        ✓ Description of the Issue: Requesting to Install Viber on my company laptop for Client Use / Requirement <br>
                                        ✓ Who is affected by the issue: Juan Dela Cruz <br>
                                        ✓ Urgency: <i>(High, Medium, Low)</i><br><br>
                                        <b><i>*Attach prior approval from Manager or Department Head*</i></b>
                                    </p>
                                </li>
                                <li>Send to it.support@payreto.com</li>
                            </ol>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- /#page-content-wrapper -->


</body>

</html>