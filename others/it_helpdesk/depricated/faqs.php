<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (empty(@$_SESSION["email"])) {
        echo "<script> window.location.href = '../../login.php' </script>";
    }
}
$email = $_SESSION["email"];
include '../includes/db_ep-inc.php';
include '../includes/functions-inc.php';
getInfo($conn, $email);
$uname = $_SESSION['uname'];
$role = $_SESSION['role'];
$img = $_SESSION['img'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="../assets/img/payreto-logo-sm.png" type = "image/x-icon">   
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/dashboard_styles.css">
    <link rel="stylesheet" href="assets/css/it_helpdesk_styles.css">
    <title>Payreto Employee Portal | IT Helpdesk</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white sidebar-payreto" id="sidebar-wrapper">
            <div class="sidebar-heading text-center pt-2 pb-4 primary-text fs-4 fw-bold text-uppercase">
                <div class="d-flex text-center w-auto pt-4 primary-text fs-4 fw-bold text-uppercase align-items-center justify-content-center">
                    <a class="navbar-brand" href="../homepage.php"><img class="ms-3" width="130" height="35" src="../assets/img/Payreto_logo.png" alt=""></a>
                </div>
            </div>
            <div class="list-group list-group-flush navlist">
                <ul class="portal">
                    <h1>PORTAL</h1>
                    <li class="d-flex flex-row align-items-center mb-4"><a href="../people_management/index.php" class="list-group-item bg-transparent middle"><i class="fas fa-user me-2 icon-gray" style="width:15px;"></i>PEOPLE MANAGEMENT</a></li>
                    <li class="d-flex flex-row align-items-center mb-4"><a href="../people_development/index.php" class="list-group-item bg-transparent middle"><i class="fas fa-user-gear me-2 icon-gray" style="width:15px;"></i>PEOPLE DEVELOPMENT</a></li>
                    <li class="d-flex flex-row align-items-center mb-4"><a href="../people_acquisition/index.php" class="list-group-item bg-transparent middle"><i class="fas fa-people-arrows-left-right me-2 icon-gray" style="width:15px;"></i>PEOPLE ACQUISITION</a></li>
                    <li class="d-flex flex-row align-items-center mb-4"><a href="../people_support/index.php" class="list-group-item bg-transparent middle"><i class="fas fa-people-line me-2 icon-gray" style="width:15px;"></i>PEOPLE SUPPORT</a></li>
                    <li class="d-flex flex-row align-items-center mb-4"><a href="../employee_admin/index.php" class="list-group-item bg-transparent middle"><i class="fas fa-users me-2 icon-gray" style="width:15px;"></i>EMPLOYEE ADMIN</a></li>
                    <li class="d-flex flex-row align-items-center mb-4"><a href="../it_helpdesk/index.php" class="list-group-item bg-transparent middle"><i class="fas fa-computer me-2 icon-gray" style="width:15px;"></i>IT HELPDESK</a></li>
                </ul>
            </div>
            <form class="log-out" action="login.php" method="POST">
                <input name="submit2" type="submit" id="submit2" value="Log Out">
                <?php
                if (isset($_POST["submit2"])) {
                    session_destroy();
                    unset($_SESSION["ID"]);
                    unset($_SESSION["uname"]);
                    unset($_SESSION["FN"]);
                    unset($_SESSION["LN"]);
                    unset($_SESSION["role"]);
                    unset($_SESSION["location"]);
                    unset($_SESSION["department"]);
                    unset($_SESSION["email"]);
                    unset($_SESSION["password"]);
                    unset($_SESSION["img"]);
                    echo "<script> window.location.href='../login.php' </script>";
                    // header("location: ../login.php");
                    exit();
                }
                ?>
            </form>
            <div class="version-control text-center">
                <a href="../version_control/version_control.php" style="text-decoration:none; color:black;"><?php readfile("../version_control/version_number.php")?></a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="heading-payreto navbar navbar-expand-lg navbar-light py-3 px-3">
                <div class="d-flex align-items-center header-text">
                    <i class="fas fa-align-left tertiary-text fs-4 me-3" id="menu-toggle"></i>
                    <a class="back-icon me-3" href="../it_helpdesk/index.php"><i class="back-icon fa-solid fa-angle-left"></i></a>
                    <h4 class="m-0">IT HELPDESK</h4>
                </div>
                <div class="text-white">
                    <button class="navbar-toggler border-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars text-white" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="d-flex flex-row align-items-center profile-settings primary-text text-white mt-2 pt-2 mt-md-2 pt-md-2 pt-sm-0 mt-sm-0" href="/Employee-Portal/account/account_settings_validation.php">
                                <div class="profile-img">
                                    <img class="m-2 rounded-circle" width="45" height="45" src="../assets/img/<?php echo $img ?>" alt="">
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
                <?php include "../it_helpdesk/content/faqs.php" ?>
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