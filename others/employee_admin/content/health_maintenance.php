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

<?php
$sql = "SELECT link, id FROM e_admin WHERE id = 'hmo'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    @$link = $row['link'];
    @$type = $row['type'];
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
                    <a class="back-icon me-3" href="/Employee-Portal/others/employee_admin/index.php"><i class="back-icon fa-solid fa-angle-left"></i></a>
                    <h4 class="m-0">EMPLOYEE BENEFITS PROGRAM</h4>
                </div>
                <?php
                include "../../../includes/header.php";
                ?>
            </nav>
            <div class="w-100 py-5">
                <div class="container">
                    <h1 class="card-heading my-5 text-uppercase text-center">HEALTH MAINTENANCE ORGANIZATIONS (HMO)</h1>
                    <section class="wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card card-has-bg click-col" style="background-image:url('https://images.unsplash.com/photo-1587614382231-d1590f0039e7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80');">
                                        <img class="card-img d-none" src="https://images.unsplash.com/photo-1587614382231-d1590f0039e7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
                                        <div class="card-img-overlay d-flex flex-column" data-bs-toggle="modal" data-bs-target="#m_concerns">
                                            <div class="card-body d-flex flex-column justify-content-center">
                                                <h4 class="card-title mt-0">HMO CONCERNS</h4>
                                                <!-- Button trigger modal -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card card-has-bg click-col" style="background-image:url('https://images.unsplash.com/photo-1506126613408-eca07ce68773?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=799&q=80');">
                                        <img class="card-img d-none" src="https://images.unsplash.com/photo-1506126613408-eca07ce68773?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=799&q=80" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
                                        <div class="card-img-overlay d-flex flex-column" data-bs-toggle="modal" data-bs-target="#m_principal">
                                            <div class="card-body d-flex flex-column justify-content-center">
                                                <h4 class="card-title mt-0">PRINCIPAL COVERAGE</h4>
                                                <!-- Button trigger modal -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card card-has-bg click-col" style="background-image:url('https://images.unsplash.com/photo-1627072354994-1a05b90fe0aa?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80');">
                                        <img class="card-img d-none" src="https://images.unsplash.com/photo-1627072354994-1a05b90fe0aa?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
                                        <div class="card-img-overlay d-flex flex-column" data-bs-toggle="modal" data-bs-target="#m_coverage">
                                            <div class="card-body d-flex flex-column justify-content-center">
                                                <h4 class="card-title mt-0">DEPENDENT COVERAGE</h4>
                                                <!-- Button trigger modal -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card card-has-bg click-col" style="background-image:url('https://images.unsplash.com/photo-1517971071642-34a2d3ecc9cd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=688&q=80');">
                                        <img class="card-img d-none" src="https://images.unsplash.com/photo-1517971071642-34a2d3ecc9cd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=688&q=80" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
                                        <div class="card-img-overlay d-flex flex-column" data-bs-toggle="modal" data-bs-target="#m_enrollment">
                                            <div class="card-body d-flex flex-column justify-content-center">
                                                <h4 class="card-title mt-0">DEPENDENT ENROLLMENT</h4>
                                                <!-- Button trigger modal -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card card-has-bg click-col" style="background-image:url('https://images.unsplash.com/photo-1507208773393-40d9fc670acf?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80');">
                                        <img class="card-img d-none" src="https://images.unsplash.com/photo-1507208773393-40d9fc670acf?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
                                        <div class="card-img-overlay d-flex flex-column" data-bs-toggle="modal" data-bs-target="#m_cancellation">
                                            <div class="card-body d-flex flex-column justify-content-center">
                                                <h4 class="card-title mt-0">DEPENDENT CANCELLATION</h4>
                                                <!-- Button trigger modal -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card card-has-bg click-col" style="background-image:url('https://images.unsplash.com/photo-1597807037496-c56a1d8bc29a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80');">
                                        <img class="card-img d-none" src="https://images.unsplash.com/photo-1597807037496-c56a1d8bc29a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
                                        <div class="card-img-overlay d-flex flex-column" data-bs-toggle="modal" data-bs-target="#m_hospitals">
                                            <div class="card-body d-flex flex-column justify-content-center">
                                                <h4 class="card-title mt-0">ACCREDITED HOSPITALS</h4>
                                                <!-- Button trigger modal -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card card-has-bg click-col" style="background-image:url('https://images.unsplash.com/photo-1631248207065-771ae9ac32f0?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80');">
                                        <img class="card-img d-none" src="https://images.unsplash.com/photo-1631248207065-771ae9ac32f0?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
                                        <div class="card-img-overlay d-flex flex-column" data-bs-toggle="modal" data-bs-target="#m_mclinics">
                                            <div class="card-body d-flex flex-column justify-content-center">
                                                <h4 class="card-title mt-0">ACCREDITED MEDICAL CLINICS</h4>
                                                <!-- Button trigger modal -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card card-has-bg click-col" style="background-image:url('https://images.unsplash.com/photo-1588776814546-daab30f310ce?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80');">
                                        <img class="card-img d-none" src="https://images.unsplash.com/photo-1588776814546-daab30f310ce?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
                                        <div class="card-img-overlay d-flex flex-column" data-bs-toggle="modal" data-bs-target="#m_dclinics">
                                            <div class="card-body d-flex flex-column justify-content-center">
                                                <h4 class="card-title mt-0">ACCREDITED DENTAL CLINICS</h4>
                                                <!-- Button trigger modal -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card card-has-bg click-col" style="background-image:url('https://images.unsplash.com/photo-1576210117723-cd06449a467d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80');">
                                        <img class="card-img d-none" src="https://images.unsplash.com/photo-1576210117723-cd06449a467d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
                                        <div class="card-img-overlay d-flex flex-column" data-bs-toggle="modal" data-bs-target="#m_optical">
                                            <div class="card-body d-flex flex-column justify-content-center">
                                                <h4 class="card-title mt-0">OPTICAL BENEFITS</h4>
                                                <!-- Button trigger modal -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card card-has-bg click-col" style="background-image:url('https://images.unsplash.com/photo-1495573020741-8a2f372bbec3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=735&q=80');">
                                        <img class="card-img d-none" src="https://images.unsplash.com/photo-1495573020741-8a2f372bbec3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=735&q=80" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
                                        <div class="card-img-overlay d-flex flex-column" data-bs-toggle="modal" data-bs-target="#m_dental">
                                            <div class="card-body d-flex flex-column justify-content-center">
                                                <h4 class="card-title mt-0">DENTAL BENEFITS</h4>
                                                <!-- Button trigger modal -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card card-has-bg click-col" style="background-image:url('https://images.unsplash.com/photo-1600880292089-90a7e086ee0c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80');">
                                        <img class="card-img d-none" src="https://images.unsplash.com/photo-1600880292089-90a7e086ee0c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
                                        <div class="card-img-overlay d-flex flex-column" data-bs-toggle="modal" data-bs-target="#m_insurance">
                                            <div class="card-body d-flex flex-column justify-content-center">
                                                <h4 class="card-title mt-0">LIFE INSURANCE</h4>
                                                <!-- Button trigger modal -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card card-has-bg click-col" style="background-image:url('https://images.unsplash.com/photo-1562240020-ce31ccb0fa7d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80');">
                                        <img class="card-img d-none" src="https://images.unsplash.com/photo-1562240020-ce31ccb0fa7d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
                                        <div class="card-img-overlay d-flex flex-column" data-bs-toggle="modal" data-bs-target="#m_medicalre">
                                            <div class="card-body d-flex flex-column justify-content-center">
                                                <h4 class="card-title mt-0">MEDICAL REIMBURSEMENT</h4>
                                                <!-- Button trigger modal -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card card-has-bg click-col" style="background-image:url('https://images.unsplash.com/photo-1512069772995-ec65ed45afd6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=737&q=80');">
                                        <img class="card-img d-none" src="https://images.unsplash.com/photo-1512069772995-ec65ed45afd6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=737&q=80" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
                                        <div class="card-img-overlay d-flex flex-column" data-bs-toggle="modal" data-bs-target="#m_medicinere">
                                            <div class="card-body d-flex flex-column justify-content-center">
                                                <h4 class="card-title mt-0">MEDICINE REIMBURSEMENT</h4>
                                                <!-- Button trigger modal -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card card-has-bg click-col" style="background-image:url('https://images.unsplash.com/photo-1584467735871-8e85353a8413?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80');">
                                        <img class="card-img d-none" src="https://images.unsplash.com/photo-1584467735871-8e85353a8413?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
                                        <div class="card-img-overlay d-flex flex-column" data-bs-toggle="modal" data-bs-target="#m_physical">
                                            <div class="card-body d-flex flex-column justify-content-center">
                                                <h4 class="card-title mt-0">ANNUAL PHYSICAL EXAM</h4>
                                                <!-- Button trigger modal -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $sql = "SELECT * FROM health_maintenance";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        ?>
                        <div> <?php include '../assets/modal/hmo/m_concerns.php'; ?></div>
                        <div> <?php include '../assets/modal/hmo/m_principal.php'; ?></div>
                        <div> <?php include '../assets/modal/hmo/m_coverage.php'; ?></div>
                        <div> <?php include '../assets/modal/hmo/m_enrollment.php'; ?></div>
                        <div> <?php include '../assets/modal/hmo/m_cancellation.php'; ?></div>
                        <div> <?php include '../assets/modal/hmo/m_hospitals.php'; ?></div>
                        <div> <?php include '../assets/modal/hmo/m_mclinics.php'; ?></div>
                        <div> <?php include '../assets/modal/hmo/m_dclinics.php'; ?></div>
                        <div> <?php include '../assets/modal/hmo/m_optical.php'; ?></div>
                        <div> <?php include '../assets/modal/hmo/m_dental.php'; ?></div>
                        <div> <?php include '../assets/modal/hmo/m_insurance.php'; ?></div>
                        <div> <?php include '../assets/modal/hmo/m_medicalre.php'; ?></div>
                        <div> <?php include '../assets/modal/hmo/m_medicinere.php'; ?></div>
                        <div> <?php include '../assets/modal/hmo/m_physical.php'; ?></div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /#page-content-wrapper -->
</body>

</html>