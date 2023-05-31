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
    <link rel="stylesheet" href="/Employee-Portal/others/it_helpdesk/assets/css/it_helpdesk_styles.css">
</head>
<title>Payreto Employee Portal | IT Helpdesk</title>

<?php
$sql = "SELECT link, id FROM it_helpdesk WHERE id = 'byod'";
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
                    <a class="back-icon me-3" href="/Employee-Portal/others/it_helpdesk/index.php"><i class="back-icon fa-solid fa-angle-left"></i></a>
                    <h4 class="m-0">IT HELPDESK</h4>
                </div>
                <?php
                include "../../../includes/header.php";
                ?>
            </nav>
            <div class="w-100 py-5">
                <div class="container">
                    <h1 class="card-heading my-5 text-uppercase text-center">BYOD Request Form</h1>
                    <?php if (empty($link)) : ?>
                        <div class="container d-flex justify-content-center">
                            <img src="..//Employee-Portal/assets/img/under_construction.gif">
                        </div>
                        <div class="container d-flex justify-content-center">
                            <p style="color: red;" class="card-heading">Under Construction... Come back soon! </p>
                        </div>
                    <?php else : ?>
                        <div class="container d-flex flex-column justify-content-center">
                            <p class="text-wrap my-5">
                                <b>Purpose</b><br>
                                Authorized employees and third parties may wish to use their own devices for work purposes. Examples of this are receiving and making work phone calls and text messages on their personal mobile phones, tablet and computers to access, read and respond to work emails, or working in a home-office. If the BYOD form is approved the personal device will be given access to operate within the Payreto Network.
                        </div>
                        <embed class="w-100" src="<?php echo $link ?>" type="application/pdf" height="900vh">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
</body>

</html>