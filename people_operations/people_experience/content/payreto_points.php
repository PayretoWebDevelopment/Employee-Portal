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
<title>Payreto Employee Portal | People Experience</title>

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
                    <h4 class="m-0">REWARDS AND RECOGINITION</h4>
                </div>
                <?php
                include "../../../includes/header.php";
                ?>
            </nav>
            <div class="w-100">
                <div class="container">
                    
                    <h1 class="card-heading my-5 text-uppercase text-center">PAYRETO POINTS TRACKER</h1>
                    <table class="display" id="payreto_tracker">
                            <thead>
                                <tr>
                                    <th>PAYRETO POINTS</th>
                                    <th>AWARD</th>
                                    <th>DATE OF REDEMPTION</th>
                                    <th>REDEMPTION STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //table for audit logs
                                $i = 0;
                                
                                $findPoints = findPayretoPoints($_SESSION['email']);
                                // print_r($checking);
                    
                                
                                foreach ($findPoints as $key) {
                                    echo "<tr>";
                                    echo "<td>" . $key['points_p'], "</td>";
                                    if(empty($key['award'])){
                                        echo "<td>" . "Not Applicable" . "</td>";
                                    }else{
                                        echo "<td>" . $key["award"] . "</td>";
                                    }
                                    echo "<td>" . $key["date_redeem"] . "</td>";
                                    if($key['redeem'] == 0){
                                        echo "<td> No </td>";
                                    }else if($key['redeem'] == 1){
                                        echo "<td> Yes </td>";
                                    }else if($key['redeem'] == 2){
                                        echo "<td> With Balance </td>";
                                    }else if($key['redeem'] == 3){
                                        echo "<td> Invalid </td>";
                                    }
                                    echo "</tr>";
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                        <script>
                            $(document).ready(function() {
                                $('#payreto_tracker').DataTable();
                            });
                        </script>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
</body>

</html>