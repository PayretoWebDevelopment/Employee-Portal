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
$sql = "SELECT link, id FROM p_support WHERE id = 'bcp_t'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $link = $row['link'];
}
$link = strtoupper($link);
$str_arr = explode(",", $link);
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
                <div class="container d-flex flex-column align-items-center justify-content-center">
                    <h1 class="card-heading my-5 text-uppercase text-center">BCP Teams Organization Chart</h1>
                    <img class="w-100" src="<?php echo $str_arr[0] ?>">
                    <br>
                    <h1 class="card-heading my-5 text-uppercase text-center">Emergency Management Team</h1>
                    <img class="w-100 my-5" src="<?php echo $str_arr[1] ?>">
                    <br>
                    <h1 class="card-heading my-5 text-uppercase text-center">Communications Team</h1>
                    <img class="w-75 my-5" src="<?php echo $str_arr[2] ?>">
                    <br>
                    <h1 class="card-heading my-5 text-uppercase text-center">Emergency Response Team</h1>
                    <img class="w-75 my-5" src="<?php echo $str_arr[3] ?>">
                    <br>
                    <h1 class="card-heading my-5 text-uppercase text-center">Human Resources Recovery Team</h1>
                    <img class="w-100 my-5" src="<?php echo $str_arr[4] ?>">
                    <br>
                    <h1 class="card-heading my-5 text-uppercase text-center">Administration Recovery Team</h1>
                    <img class="w-75 my-5" src="<?php echo $str_arr[5] ?>">
                    <br>
                    <h1 class="card-heading my-5 text-uppercase text-center">IT Disaster Recovery Team</h1>
                    <img class="w-100 my-5" src="<?php echo $str_arr[6] ?>">
                </div>
            </div>
        </div>
    </div>
</body>

</html>