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
    <link rel="stylesheet" href="/Employee-Portal/others/employee_admin/assets/css/e_admin_styles.css">
    <link rel="stylesheet" href="/Employee-Portal/others/employee_admin/assets/css/leave_styles.css">
</head>
<title>Payreto Employee Portal | Employee Admin</title>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include "../../../includes/sidebar.php"; ?>
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="heading-payreto navbar navbar-expand-lg navbar-light py-3 px-4">
                <div class="d-flex align-items-center header-text">
                    <i class="fas fa-align-left tertiary-text fs-4 me-3" id="menu-toggle"></i>
                    <a class="back-icon me-3" href="/Employee-Portal/others/employee_admin/index.php"><i class="back-icon fa-solid fa-angle-left"></i></a>
                    <h4 class="m-0">EMPLOYEE BENEFITS PROGRAM</h4>
                </div>
                <?php
                include "../../../includes/header.php";
                ?>
            </nav>
            <div class="w-100 py-5">
                <div class="container">
                    <h1 class="card-heading my-5 text-uppercase text-center">LEAVE</h1>
                    <section class="wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card card-has-bg click-col" style="background-image:url('https://images.unsplash.com/photo-1502301197179-65228ab57f78?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=685&q=80');">
                                        <img class="card-img d-none" src="https://images.unsplash.com/photo-1502301197179-65228ab57f78?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=685&q=80" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
                                        <div class="card-img-overlay d-flex flex-column" data-bs-toggle="modal" data-bs-target="#m_vacation">
                                            <div class="card-body d-flex flex-column justify-content-center">
                                                <h4 class="card-title mt-0">VACATION LEAVE</h4>
                                                <!-- Button trigger modal -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card card-has-bg click-col" style="background-image:url('https://images.unsplash.com/photo-1564019472231-4586c552dc27?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80');">
                                        <img class="card-img d-none" src="https://images.unsplash.com/photo-1564019472231-4586c552dc27?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
                                        <div class="card-img-overlay d-flex flex-column" data-bs-toggle="modal" data-bs-target="#m_sick">
                                            <div class="card-body d-flex flex-column justify-content-center">
                                                <h4 class="card-title mt-0">SICK LEAVE</h4>
                                                <!-- Button trigger modal -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card card-has-bg click-col" style="background-image:url('https://images.unsplash.com/photo-1632833239869-a37e3a5806d2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=689&q=80');">
                                        <img class="card-img d-none" src="https://images.unsplash.com/photo-1632833239869-a37e3a5806d2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=689&q=80" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
                                        <div class="card-img-overlay d-flex flex-column" data-bs-toggle="modal" data-bs-target="#m_emergency">
                                            <div class="card-body d-flex flex-column justify-content-center">
                                                <h4 class="card-title mt-0">EMERGENCY LEAVE</h4>
                                                <!-- Button trigger modal -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card card-has-bg click-col" style="background-image:url('https://images.unsplash.com/photo-1564346793829-64d18c73a416?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=729&q=80');">
                                        <img class="card-img d-none" src="https://images.unsplash.com/photo-1564346793829-64d18c73a416?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=729&q=80" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
                                        <div class="card-img-overlay d-flex flex-column" data-bs-toggle="modal" data-bs-target="#m_anniversary">
                                            <div class="card-body d-flex flex-column justify-content-center">
                                                <h4 class="card-title mt-0">ANNIVERSARY LEAVE</h4>
                                                <!-- Button trigger modal -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card card-has-bg click-col" style="background-image:url('https://images.unsplash.com/photo-1625238955965-2d1c8196e8b2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=627&q=80');">
                                        <img class="card-img d-none" src="https://images.unsplash.com/photo-1625238955965-2d1c8196e8b2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=627&q=80" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
                                        <div class="card-img-overlay d-flex flex-column" data-bs-toggle="modal" data-bs-target="#m_maternity">
                                            <div class="card-body d-flex flex-column justify-content-center">
                                                <h4 class="card-title mt-0">MATERNITY LEAVE</h4>
                                                <!-- Button trigger modal -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card card-has-bg click-col" style="background-image:url('https://images.unsplash.com/photo-1542948843-bf19f4f535cf?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80');">
                                        <img class="card-img d-none" src="https://images.unsplash.com/photo-1542948843-bf19f4f535cf?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
                                        <div class="card-img-overlay d-flex flex-column" data-bs-toggle="modal" data-bs-target="#m_paternity">
                                            <div class="card-body d-flex flex-column justify-content-center">
                                                <h4 class="card-title mt-0">PATERNITY LEAVE</h4>
                                                <!-- Button trigger modal -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card card-has-bg click-col" style="background-image:url('https://images.unsplash.com/photo-1437915160026-6c59da36ede2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80');">
                                        <img class="card-img d-none" src="https://images.unsplash.com/photo-1437915160026-6c59da36ede2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
                                        <div class="card-img-overlay d-flex flex-column" data-bs-toggle="modal" data-bs-target="#m_battered">
                                            <div class="card-body d-flex flex-column justify-content-center">
                                                <h4 class="card-title mt-0">BATTERED WOMAN LEAVE</h4>
                                                <!-- Button trigger modal -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card card-has-bg click-col" style="background-image:url('https://images.unsplash.com/photo-1578670812003-60745e2c2ea9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=688&q=80');">
                                        <img class="card-img d-none" src="https://images.unsplash.com/photo-1578670812003-60745e2c2ea9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=688&q=80" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
                                        <div class="card-img-overlay d-flex flex-column" data-bs-toggle="modal" data-bs-target="#m_withoutpay">
                                            <div class="card-body d-flex flex-column justify-content-center">
                                                <h4 class="card-title mt-0">LEAVE WITHOUT PAY</h4>
                                                <!-- Button trigger modal -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card card-has-bg click-col" style="background-image:url('https://images.unsplash.com/photo-1475609471617-0ef53b59cff5?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=688&q=80');">
                                        <img class="card-img d-none" src="https://images.unsplash.com/photo-1542948843-bf19f4f535cf?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
                                        <div class="card-img-overlay d-flex flex-column" data-bs-toggle="modal" data-bs-target="#m_solo">
                                            <div class="card-body d-flex flex-column justify-content-center">
                                                <h4 class="card-title mt-0">SOLO PARENT LEAVE</h4>
                                                <!-- Button trigger modal -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card card-has-bg click-col" style="background-image:url('https://images.unsplash.com/photo-1484800089236-7ae8f5dffc8e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80');">
                                        <img class="card-img d-none" src="https://images.unsplash.com/photo-1484800089236-7ae8f5dffc8e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
                                        <div class="card-img-overlay d-flex flex-column" data-bs-toggle="modal" data-bs-target="#m_benefit">
                                            <div class="card-body d-flex flex-column justify-content-center">
                                                <h4 class="card-title mt-0">SPECIAL BENEFIT FOR WOMEN</h4>
                                                <!-- Button trigger modal -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card card-has-bg click-col" style="background-image:url('https://images.unsplash.com/photo-1576701617175-5fa0ce5769dc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80');">
                                        <img class="card-img d-none" src="https://images.unsplash.com/photo-1576701617175-5fa0ce5769dc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
                                        <div class="card-img-overlay d-flex flex-column" data-bs-toggle="modal" data-bs-target="#m_bereavement">
                                            <div class="card-body d-flex flex-column justify-content-center">
                                                <h4 class="card-title mt-0">BEREAVEMENT LEAVE</h4>
                                                <!-- Button trigger modal -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card card-has-bg click-col" style="background-image:url('https://images.unsplash.com/photo-1575658816234-a43f8953de5e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=693&q=80');">
                                        <img class="card-img d-none" src="https://images.unsplash.com/photo-1575658816234-a43f8953de5e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=693&q=80" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
                                        <div class="card-img-overlay d-flex flex-column" data-bs-toggle="modal" data-bs-target="#m_client">
                                            <div class="card-body d-flex flex-column justify-content-center">
                                                <h4 class="card-title mt-0">CLIENT HOLIDAY LEAVE</h4>
                                                <!-- Button trigger modal -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card card-has-bg click-col" style="background-image:url('https://images.unsplash.com/photo-1573497620494-a2f1330f0cbb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80');">
                                        <img class="card-img d-none" src="https://images.unsplash.com/photo-1573497620494-a2f1330f0cbb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
                                        <div class="card-img-overlay d-flex flex-column" data-bs-toggle="modal" data-bs-target="#m_service">
                                            <div class="card-body d-flex flex-column justify-content-center">
                                                <h4 class="card-title mt-0">SERVICE INCENTIVE LEAVE</h4>
                                                <!-- Button trigger modal -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $sql = "SELECT * FROM ebp_leave";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        // var_dump($result);
                        ?>
                        <div> <?php include '../assets/modal/leave/m_vacation.php'; ?></div>
                        <div> <?php include '../assets/modal/leave/m_emergency.php'; ?></div>
                        <div> <?php include '../assets/modal/leave/m_anniversary.php'; ?></div>
                        <div> <?php include '../assets/modal/leave/m_maternity.php'; ?></div>
                        <div> <?php include '../assets/modal/leave/m_paternity.php'; ?></div>
                        <div> <?php include '../assets/modal/leave/m_benefit.php'; ?></div>
                        <div> <?php include '../assets/modal/leave/m_battered.php'; ?></div>
                        <div> <?php include '../assets/modal/leave/m_withoutpay.php'; ?></div>
                        <div> <?php include '../assets/modal/leave/m_bereavement.php'; ?></div>
                        <div> <?php include '../assets/modal/leave/m_client.php'; ?></div>
                        <div> <?php include '../assets/modal/leave/m_solo.php'; ?></div>
                        <div> <?php include '../assets/modal/leave/m_service.php'; ?></div>
                        <div> <?php include '../assets/modal/leave/m_sick.php'; ?></div>
                    </section>

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /#page-content-wrapper -->
</body>

</html>