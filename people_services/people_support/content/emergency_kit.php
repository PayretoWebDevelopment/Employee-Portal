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
    <link rel="stylesheet" href="/Employee-Portal/people_services/people_support/assets/css/p_support_styles.css">
</head>
<title>Payreto Employee Portal | People Support</title>

<?php
$sql = "SELECT link, id FROM p_support WHERE id = 'emergency_k'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $link = $row['link'];
}
?>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include "../../../includes/sidebar.php"; ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="heading-payreto navbar navbar-expand-lg navbar-light py-3 px-4">
                <div class="d-flex align-items-center header-text">
                    <i class="fas fa-align-left tertiary-text fs-4 me-3" id="menu-toggle"></i>
                    <a class="back-icon me-3" href="/Employee-Portal/people_services/people_support/index.php"><i class="back-icon fa-solid fa-angle-left"></i></a>
                    <h4 class="m-0">BUSINESS CONTINUITY PLAN</h4>
                </div>
                <?php
                include "../../../includes/header.php";
                ?>
            </nav>
            <div class="w-100 py-5">
                <div class="container">
                    <h1 class="card-heading my-5 text-uppercase text-center">Emergency Kit Contents</h1>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th style="width: 500px; text-align:center">ITEM</th>
                                <th>#</th>
                                <th style="width: 500px; text-align:center">ITEM</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" style="text-align:center">1</th>
                                <td>LED Flashlight</td>
                                <th scope="row" style="text-align:center">2</th>
                                <td>AAA Batteries</td>
                            </tr>
                            <tr>
                                <th scope="row" style="text-align:center">1</th>
                                <td>Glowstick</td>
                                <th scope="row" style="text-align:center">1</th>
                                <td>Whistle</td>
                            </tr>
                            <tr>
                                <th scope="row" style="text-align:center"></th>
                                <td>Sterilized Plastic Strips (Band-aids)</td>
                                <th scope="row" style="text-align:center"></th>
                                <td>Clean Cotton Swabs</td>
                            </tr>
                            <tr>
                                <th scope="row" style="text-align:center"></th>
                                <td>Face Masks</td>
                                <th scope="row" style="text-align:center"></th>
                                <td>Clean Latex Gloves*</td>
                            </tr>
                            <tr>
                                <th scope="row" style="text-align:center"></th>
                                <td>Zip-lock Bags</td>
                                <th scope="row" style="text-align:center"></th>
                                <td>Garbage Bags</td>
                            </tr>
                            <tr>
                                <th scope="row" style="text-align:center"></th>
                                <td>Safety Pins</td>
                                <th scope="row" style="text-align:center"></th>
                                <td>Elastic Bandage</td>
                            </tr>
                            <tr>
                                <th scope="row" style="text-align:center"></th>
                                <td>Multi-purpose Clean Cloth</td>
                                <th scope="row" style="text-align:center">1</th>
                                <td>Povidone-Iodine (antiseptic)</td>
                            </tr>
                            <tr>
                                <th scope="row" style="text-align:center">1</th>
                                <td>Alcohol</td>
                                <th scope="row" style="text-align:center">1</th>
                                <td>Scissors</td>
                            </tr>
                            <tr>
                                <th scope="row" style="text-align:center">1</th>
                                <td>Tweezers</td>
                                <th scope="row" style="text-align:center">1</th>
                                <td>Tape</td>
                            </tr>
                            <tr>
                                <th scope="row" style="text-align:center">2</th>
                                <td>Sterile Gauze</td>
                                <th scope="row" style="text-align:center"></th>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="container d-flex flex-column justify-content-center">
                        <h2 class="my-5 text-center">USES FOR EMERGENCY KITS</h2>
                        <p class="text-wrap">
                            • Wound care <br>
                            • Surface disinfection<br>
                            • Immobilization of injured body parts<br>
                            • Stop and/or control of bleeding from a wound<br>
                            • Calling of attention through noise or light<br>
                            • Breathing support and prevetion of breathing small particulates such as dust, etc.<br>
                            • Disposal of contaminated materials<br>
                            • Etc.<br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="/Employee-Portal/people_services/people_support/assets/js/events_script.js"></script>
    <!-- /#page-content-wrapper -->
</body>

</html>