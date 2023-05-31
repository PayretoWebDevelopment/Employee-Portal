<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (empty(@$_SESSION["email"])) {
        session_destroy();
        echo "<script> window.location.href = '../../login.php' </script>";
    }
    $email = $_SESSION["email"];
    include '../../includes/db_ep-inc.php';
    include '../../includes/functions-inc.php';
    getInfo($conn, $email);
    $uname = $_SESSION['uname'];
    $role = $_SESSION['role'];
    $img = $_SESSION['img'];
    $admin = $_SESSION['admin'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="../../assets/img/payreto-logo-sm.png" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/dashboard_styles.css">
    <link rel="stylesheet" href="assets/css/audit_logs_styles.css">
    <title>Payreto Employee Portal | People Support</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include "../../includes/sidebar_admin.php"; ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="heading-payreto navbar navbar-expand-lg navbar-light py-3 px-4">
                <div class="d-flex align-items-center header-text">
                    <i class="fas fa-align-left tertiary-text fs-4 me-3" id="menu-toggle"></i>
                    <h4 class="m-0">ACCOUNT SETTINGS</h4>
                </div>
                <?php
                include "../includes/header.php";
                ?>
            </nav>
            <nav class="heading-payreto navbar navbar-expand-lg navbar-light py-3 px-4">
                <div class="d-flex align-items-center header-text">
                    <i class="fas fa-align-left tertiary-text fs-4 me-3" id="menu-toggle"></i>
                    <a class="back-icon me-3" href="../people_support/index.php"><i class="back-icon fa-solid fa-angle-left"></i></a>
                    <h4 class="m-0">AUDIT LOGS</h4>
                </div>
                <div class="text-white">
                    <button class="navbar-toggler border-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars text-white" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="d-flex flex-row align-items-center profile-settings primary-text text-white mt-2 pt-2 mt-md-2 pt-md-2 pt-sm-0 mt-sm-0" href="../../account_settings.php">
                                <div class="profile-img">
                                    <img class="m-2 rounded-circle" width="45" height="45" src="../../assets/img/<?php echo $img ?>" alt="">
                                </div>
                                <div class="profile-info d-flex flex-column align-items-left m-0 p-0">
                                    <p class="profile-name m-0 p-0"><?php echo @$uname ?></p>
                                    <p class="profile-pos m-0 p-0"><?php echo @$role ?></p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="w-100">
                <?php include "content/audit.php" ?>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>