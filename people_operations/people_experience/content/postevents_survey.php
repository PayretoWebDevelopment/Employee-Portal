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
                    <h4 class="m-0">EMPLOYEE ENGAGEMENT</h4>
                </div>
                <?php
                include "../../../includes/header.php";
                ?>
            </nav>
            <div class="w-100">
                <?php
                $sql = "SELECT * FROM post_event";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                $array = (array) $row;

                $p_id = $_GET['p_id'];

                foreach ($array as $key => $value) {
                    if ($value['p_id'] == $p_id) {
                        $name = html_entity_decode($value['p_name']);
                        $link = $value['p_link'];
                    }
                }
                ?>

                <div class="container">
                    <h1 class="card-heading my-5 text-uppercase text-center"><?php echo $name ?></h1>
                    <div class="justify-content d-flex justify-content-center">
                        <a class="card-link mb-3 btn btn-primary" style="background-color:#031166;" href="<?php echo $link ?>" target="_blank" value="">DIRECT LINK HERE</a>
                    </div>
                    <iframe class="w-100" src="<?php echo $link ?>" height="1000px" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
</body>

</html>