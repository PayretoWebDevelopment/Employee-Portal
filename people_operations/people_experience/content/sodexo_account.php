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
    <link rel="stylesheet" href="/Employee-Portal/people_operations/people_experience/assets/css/guides_styles.css">
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
                    <h4 class="m-0">REWARDS AND RECOGNITION</h4>
                </div>
                <?php
                include "../../../includes/header.php";
                ?>
            </nav>
            <div class="w-100 h-100 container-sd">
                <?php
                $sql = "SELECT * FROM p_management WHERE id IN('sodexo_account1','sodexo_account2','sodexo_account3')";
                $result = mysqli_query($conn, $sql);

                $i = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $link[$i] = $row['link'];
                    $i++;
                }
                $link = array_map('strtoupper', $link);
                ?>
                <div class="h-100 blur-bg">
                    <div class="container-fluid d-flex flex-column justify-content-center align-items-center">
                        <div class="container my-5 note shadow d-flex flex-column justify-content-center align-items-center ">
                            <img class="img-fluid sodexo w-25 my-5 p-0" src="../assets/img/sodexo-logo.png" alt="">
                            <h1 class="card-heading my-5 text-uppercase text-center">SODEXO ACCOUNT ACTIVATION GUIDE</h1>
                            <!-- <img class="img-fluid" src="<?php echo $link[0] ?>" alt=""> -->
                            <img class="img-fluid w-50" src="../assets/img/Sodexo_Account_Linking_Guide.jpg" alt="">
                            <img class="img-fluid w-50 py-3" src="../assets/img/Sodexo_Account_Linking_Steps.png" alt="">
                            <p class="py-3 px-5 my-4 text-center w-75">NOTE: ANY CONCERNS AND REQUESTS FOR FOOD ALLOWANCE,
                                <br> KINDLY CONTACT <?php echo $link[1] ?>.
                                <br><br> EMAIL AT <?php echo $link[2] ?>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /#page-content-wrapper -->
</body>

</html>