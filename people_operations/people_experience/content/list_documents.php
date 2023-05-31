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
    <link rel="stylesheet" href="/Employee-Portal/people_operations/people_experience/assets/css/p_management_styles.css">
</head>
<title>Payreto Employee Portal | People Excellence</title>
<?php
$sql = "SELECT link, id FROM p_excellence WHERE id = 'incident_form'";
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
                    <a class="back-icon me-3" href="/Employee-Portal/people_operations/people_experience/index.php"><i class="back-icon fa-solid fa-angle-left"></i></a>
                    <h4 class="m-0">EMPLOYEE ONBOARDING</h4>
                </div>
                <?php
                include "../../../includes/header.php";
                ?>
            </nav>
            <div class="w-100">
                <div class="container">
                    <h1 class="card-heading my-5 text-uppercase text-center">LIST OF PRE-EMPLOYMENT REQUIREMENTS</h1>
                    <div class="container-fluid">
                        <main>
                            <ol class="gradient-list">
                                <li>2X2 Colored Picture (white background)</li>
                                <li>Birth Certificate (PSA copy)</li>
                                <li>Marriage Certificate (if applicable)</li>
                                <li>SSS No. (SSS digitized ID or SSS E-1 Form)</li>
                                <li>Pag-IBIG No. (Pag-IBIG digitized ID or Any Pag-IBIG form showing the member’s MID No.)</li>
                                <li>TIN No. (TIN Card or Tax Update Form)</li>
                                <li>PhilHealth No. (PhilHealth Card or MDR Form)</li>
                                <li>Pre-employment Medical Examination-with `Fit to Work` remarks
                                    <p>
                                        <i>
                                            o Urinalysis<br>
                                            o CBC<br>
                                            o Physical Examination<br>
                                            o X-Ray<br>
                                            o Fecalysis<br>
                                        </i>
                                    </p>
                                </li>
                                <li>2 Valid IDs</li>
                                <li>In case of foreigner, please present your I-card/ACR</li>
                                <li>Government Forms:
                                    <p>
                                        <i>
                                            o HDMF Registration/Update/Transfer (HDMF - PFF093)<br>
                                            o PhilHealth Registration/Update (PHIC - PMRF)<br>
                                        </i>
                                    </p>
                                </li>
                                <li>Company Forms:
                                    <p>
                                        <i>
                                            o Company ID form (via Payreto Employee Info and ID Details Google Form)<br>
                                            o Employee Data Sheet<br>
                                            o Authorization for References and Background Check<br>
                                        </i>
                                    </p>
                                </li>
                                <li>Valid NBI Clearance</li>
                                <li>Diploma/Transcript of Records from school</li>
                                <li>Company Clearance from previous employer (for no previous employment N/A)</li>
                                <li>Certificate of Employment from previous employer (for no previous employment N/A)</li>
                                <li>BIR Form 2316 from previous employer (for no previous employment N/A)</li>
                                <li>BIR form 1902 (New employee with no existing TIN / For first-time job only)</li>
                            </ol>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
</body>

</html>