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
    <link rel="stylesheet" href="/Employee-Portal/people_provisions/people_acquisition/assets/css/p_acquisition_styles.css">
</head>
<title>Payreto Employee Portal | People Acquisition</title>
<?php
$sql = "SELECT link, id FROM p_management WHERE id = 'list_prereq'";
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
                    <a class="back-icon me-3" href="/Employee-Portal/people_provisions/people_acquisition/index.php"><i class="back-icon fa-solid fa-angle-left"></i></a>
                    <h4 class="m-0">EMPLOYEE ONBOARDING</h4>
                </div>
                <?php
                include "../../../includes/header.php";
                ?>
            </nav>
            <div class="w-100 py-5">
                <div class="container">
                    <h1 class="card-heading my-5 text-uppercase text-center">LIST OF PRE-EMPLOYMENT REQUIREMENTS</h1>
                    <div class="container-fluid">
                        <main>
                            <ol class="gradient-list">
                                <li>FULL NAME
                                    <p><i>Last Name, First Name Middle Name</i></p>
                                </li>
                                <li>PERMANENT ADDRESS</li>
                                <li>PRESENT ADDRESS
                                    <p><i>with Lalamove Pin Site | Equipment Deliver</i></p>
                                </li>
                                <li>CONTACT NUMBER</li>
                                <li>BIRTH DATE</li>
                                <li>STATUS</li>
                                <li>
                                    EMERGENCY CONTACT PERSON <br>
                                    <p>
                                        ✓ Name and Relationship <br>
                                        ✓ Contact Number <br>
                                        ✓ Address <br>
                                    </p>
                                </li>
                                <li>SSS NUMBER</li>
                                <li>PHILHEALTH NUMBER</li>
                                <li>PAG-IBIG NUMBER</li>
                                <li>TIN</li>
                            </ol>
                        </main>
                        <p class="text-justify">For the security of the equipment, please make sure to secure a copy of the Barangay Clearance with the barangay official's number in the document. Attached is the list of requirements and forms for your accomplishment. Please read the provisions in the Payreto Pre-employment Requirements Checklist thoroughly. </p>
                        <p class="text-justify">Should you have inquiries, please feel free to contact me with my number indicated on the email signature.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /#page-content-wrapper -->
</body>

</html>