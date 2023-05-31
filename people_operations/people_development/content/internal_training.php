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
$sql = "SELECT link, id FROM p_development WHERE id = 'internal'";
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
                <div class="container d-flex flex-column justify-content-center">
                    <h1 class="card-heading my-5 text-uppercase text-center">INTERNAL TRAINING REQUEST</h1>
                    <?php if (empty($link)) : ?>
                        <div class="container d-flex justify-content-center">
                            <img src="/Employee-Portal/assets/img/under_construction.gif">
                        </div>
                        <div class="container d-flex justify-content-center">
                            <p style="color: red;" class="card-heading">Under Construction... Come back soon! </p>
                        </div>
                    <?php else : ?>
                        <div class="justify-content d-flex justify-content-center">
                            <a class="card-link mb-3 btn btn-primary" style="background-color:#031166;" href="<?php echo $link ?>" target="_blank" value="">DIRECT LINK HERE</a>
                        </div>
                        <iframe class="w-100" src="<?php echo $link ?>" height="1000px" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
                    <?php endif; ?>
                </div>
            </div>
            <!-- /#page-content-wrapper -->
</body>
<script>
    Swal.fire({
    title: "Redirecting",
    html: '<b></b> seconds. Click cancel to stay on this page',
    timer: 5000,
    timerProgressBar: true,
    allowOutsideClick: false,
    showCancelButton: true,
    cancelButtonText: 'Cancel',
    showConfirmButton: false,
    didOpen: () => {
    const b = Swal.getHtmlContainer().querySelector('b')
    timerInterval = setInterval(() => {
        b.textContent = (Swal.getTimerLeft() / 1000)
        .toFixed(0)
    }, 100)
    },
}).then((result) => {
    if (result.dismiss === Swal.DismissReason.timer) {
        window.location.href = '<?php echo $link; ?>';
    }
});
</script>
</html>