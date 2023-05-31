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
<?php
$sql = "SELECT link, id FROM p_development WHERE id = 'playbook'";
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
                    <a class="back-icon me-3" href="/Employee-Portal/people_operations/people_development/index.php"><i class="back-icon fa-solid fa-angle-left"></i></a>
                    <h4 class="m-0">EMPLOYEE DEVELOPMENT</h4>
                </div>
                <?php
                include "../../../includes/header.php";
                ?>
            </nav>
            <div class="w-100 py-5">
                <div class="container">
                    <h1 class="card-heading my-5 text-uppercase text-center">L&D PLAYBOOK</h1>
                    <div class="row my-4">
                        <div class="col-12 col-md-3 d-flex justify-content-center">
                            <img class="img-fluid m-3" src="../assets/img/cst.svg" alt="">
                        </div>
                        <div class="col-12 col-md-9 d-flex flex-column justify-content-center">
                            <h2 class="text-start my-5 my-sm-0">CST: CORE SKILLS TRAINING</h2>
                            <p class="text-justify">Facilitating the fundamentals of a Payreto employee; Core Payments Training and soft skills training before endorsing new hires to the BeSpoke Operations.

                            </p>
                            <div class="col-12 col-md-3 align-items-left">
                                <button type="button" class="btn btn-payreto-darkblue-900" data-bs-toggle="modal" data-bs-target="#exampleModal_1">
                                    Learn More
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-12 col-md-9 d-flex flex-column justify-content-end">
                            <h2 class="text-end my-5 my-sm-0">GET: GRASSROOTS EXCELLENCE TRAINING</h2>
                            <p class="text-end">
                                Facilitating targeted soft skills training that will strengthen employees' grassroots excellence in their respective roles which will be requested by their direct report.
                            </p>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-payreto-darkblue-900" data-bs-toggle="modal" data-bs-target="#exampleModal_2">
                                    Learn More
                                </button>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 d-flex justify-content-center">
                            <img class="img-fluid m-3" src="../assets/img/get.svg" alt="">
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col-12 col-md-3 d-flex justify-content-center">
                            <img class="img-fluid m-3" src="../assets/img/must.svg" alt="">
                        </div>
                        <div class="col-12 col-md-9 d-flex flex-column justify-content-center">
                            <h2 class="text-start my-5 my-sm-0">MUST: MOVING UP SKILLS TRAINING</h2>
                            <p class="text-justify">
                                Facilitating up-skilling, leadership and targeted soft skills courses that will help employees move up to their desired career path; equipped, ready and certified to take on the new role.
                            </p>
                            <div class="col-12 col-md-3 align-items-left">
                                <button type="button" class="btn btn-payreto-darkblue-900" data-bs-toggle="modal" data-bs-target="#exampleModal_3">
                                    Learn More
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php include '../../../assets/modal/playbookModal.php'; ?>
                </div>

            </div>
            <!-- /#page-content-wrapper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
            <script>
                var myModal = document.getElementById('myModal')
                var myInput = document.getElementById('myInput')

                myModal.addEventListener('shown.bs.modal', function() {
                    myInput.focus()
                })
            </script>
</body>

</html>