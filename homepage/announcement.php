<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (empty(@$_SESSION["email"])) {
        @session_destroy();
        echo "<script> window.location.href = 'login.php' </script>";
    }
}
$email = @$_SESSION["email"];
include '../includes/db_ep-inc.php';
include '../includes/functions-inc.php';
include '../includes/plugins.php';
include 'homepage_func.php';
getInfo($conn, $email);
$uname = @$_SESSION['uname'];
$role = @$_SESSION['role'];
$img = @$_SESSION['img'];
$department = @$_SESSION['department'];
$FN = @$_SESSION['FN'];
$LN = @$_SESSION['LN'];
$location = @$_SESSION['location'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/Employee-Portal/assets/css/dashboard_styles.css">
    <link rel="stylesheet" href="/Employee-Portal/assets/css/home_styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <title>Payreto Employee Portal | Dashboard</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include "../includes/sidebar.php"; ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="heading-payreto navbar navbar-expand-lg navbar-light py-3 px-3">
                <div class="d-flex align-items-center header-text">
                    <i class="fas fa-align-left tertiary-text fs-4 me-3" id="menu-toggle"></i>
                    <a class="back-icon me-3" href="/Employee-Portal/homepage/homepage.php"><i class="back-icon fa-solid fa-angle-left"></i></a>
                    <h4 class="m-0">ANNOUNCEMENTS </h4>
                </div>
                <?php
                include "../includes/header.php";
                ?>
            </nav>
            <div class="w-100 py-5">
                <div class="d-flex flex-column align-items-center">
                    <?php $announce = get_announcement();
                    foreach ($announce as $rows => $value1) : 
                        $date = date_create($announce[$i]['announce_date']);?>
                        <div class="card-3 p-3 w-50 m-2">
                            <h3 class="fs-2 card-heading my-2"><?php echo $value1['hp_title']; ?></h3>
                            <p class="fs-6">Date Posted: <?php echo date_format($date, "m/d/Y"); ?> </p>
                            <button class="btn btn-blue mt-5 w-25 align-items-right" data-bs-toggle="modal" data-bs-target="#announce-<?php echo $value1['hp_id']; ?>">Read More</button>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
</body>
<?php
include 'anModal.php'; ?>

</html>