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
$uname = $_SESSION['uname'];
$role = $_SESSION['role'];
$img = $_SESSION['img'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Local CSS -->
    <link rel="stylesheet" href="/Employee-Portal/assets/css/dashboard_styles.css">
    <link rel="stylesheet" href="/Employee-Portal/people_operations/people_development/assets/css/p_development_styles.css">
</head>
<title>Payreto Employee Portal | People Development</title>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include "../../../includes/sidebar.php"; ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="heading-payreto navbar navbar-expand-lg navbar-light py-3 px-4">
                <div class="d-flex align-items-center header-text">
                    <i class="fas fa-align-left tertiary-text fs-4 me-3" id="menu-toggle"></i>
                    <a class="back-icon me-3" href="/Employee-Portal/people_operations/people_development/index.php"><i class="back-icon fa-solid fa-angle-left"></i></a>
                    <h4 class="m-0">LMS SUPPORT</h4>
                </div>
                <?php
                include "../../../includes/header.php";
                ?>
            </nav>
            <div class="w-100 py-5">
                <div class="container d-flex flex-column justify-content-center">
                    <h1 class="card-heading my-5 text-uppercase text-center">LOG-IN CONCERNS</h1>
                    <form class="container-form container-fluid" action="emailer.php" method="POST">
                        <p>Get in touch with the People Development Team by emailing them your concern below.</p>
                        <div class="subject mb-5">
                            <label for="subject">SUBJECT</label><br>
                            <input class="w-100" type="text" id="subject" name="subject" value="<?php echo @$un; ?>">
                        </div>
                        <div class="body mb-5">
                            <label for="body">BODY</label><br>
                            <textarea class="form-control w-100" id="body" name="body" rows="9" style="resize: none;" N></textarea>
                        </div>
                        <div class="email mb-5">
                            <label for="email">EMAIL</label><br>
                            <input class="w-100" type="text" id="email" name="email" value="<?php echo @$un; ?>">
                        </div>
                        <div class="submitbtn w-50">
                            <input type="submit" name="l-concern" value="Submit">
                        </div>
                        <?php
                        if (isset($_GET["error"])) {
                            if ($_GET["error"] == "sent") {
                                echo "<p class=\"error-msg w-100 w-sm-75 text-wrap\">Concern sent! Kindly wait for a person to assist you.</p>";
                            }
                        }
                        ?>
                    </form>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

            <!-- /#page-content-wrapper -->
</body>

</html>