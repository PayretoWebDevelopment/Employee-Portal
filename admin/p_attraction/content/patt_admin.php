<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (empty(@$_SESSION["email"])) {
        session_destroy();
        echo "<script> window.location.href = '/Employee-Portal/login/login.php' </script>";
    }
    $email = @$_SESSION["email"];
    include_once '../../../includes/db_ep-inc.php';
    include_once '../../../includes/functions-inc.php';
    include '../../../includes/plugins.php';
    getInfo($conn, $email);
    $uname = @$_SESSION['uname'];
    $role = @$_SESSION['role'];
    $img = @$_SESSION['img'];
    $department = @$_SESSION['department'];
    $FN = @$_SESSION['FN'];
    $LN = @$_SESSION['LN'];
    $location = @$_SESSION['location'];
    $admin = @$_SESSION["admin"];
    $admin_oa = @$_SESSION["admin_oa"];
}
if (@$admin_oa != 1) {
    if (@$admin != 3 && !empty(@$admin)) {
        session_destroy();
        echo "<script> window.location.href = '/Employee-Portal/login/login.php' </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../../assets/css/dashboard_styles.css">
    <link rel="stylesheet" href="../assets/css/p_acquisition_styles.css">
</head>
<title>Payreto Employee Portal | People Attraction Admin</title>

<?php
//gets all content from their respective DB and adds them to an array for display purposes
$sql = "SELECT * FROM p_attraction";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);

$i = 0;
$link = array();
foreach ($result as $key => $value) {
    $link[$i] = $value["link"];
    $i++;
}

$i_allowance = @$link[0];
$i_referral = @$link[1];
$i_renew = @$link[2];
$i_sched = @$link[3];
// $recruitment = @$link[4];
// $request_id = @$link[5];
// $requirement = @$link[6];
// $update_id = @$link[7];

?>

<body>
    <div class="d-flex" id="wrapper">
        <?php
        if (isset($_SESSION['status_p_acq'])) {
        ?>
            <script>
                Swal.fire({
                    icon: "<?php echo $_SESSION['status_code']; ?>",
                    title: "<?php echo $_SESSION['status_p_acq']; ?>",
                    text: "<?php echo $_SESSION['status_text']; ?>",
                    confirmButtonColor: "#010538"
                })
            </script>
        <?php
            unset($_SESSION['status_p_acq']);
        }
        ?>
        <?php include "../../../includes/sidebar_admin.php"; ?>
        <div id="page-content-wrapper">
            <nav class="heading-payreto navbar navbar-expand-lg navbar-light py-3 px-3">
                <div class="d-flex align-items-center header-text">
                    <i class="fas fa-align-left tertiary-text fs-4 me-3" id="menu-toggle"></i>
                    <h4 class="m-0">PEOPLE ATTRACTION</h4>
                </div>
                <?php include "../../../includes/header.php"; ?>
            </nav>
            <div class="w-100">
                <div class="w-100 py-5">
                    <div class="container">
                        <h1 class="card-heading my-5 text-uppercase text-center">ADMIN ACCESS</h1>

                        <!-- Intern Referral Form Card -->
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Intern Referral Form</h1>
                                <form class="acct-form" action="patt_edit.php" method="post">
                                    <div class="g-forms my-3">
                                        <input type="text" id="i_referral" name="i_referral" placeholder="<?php if (!empty($i_referral)) {
                                                                                                                echo $i_referral;
                                                                                                            } else {
                                                                                                                echo 'Link';
                                                                                                            } ?>">
                                    </div>

                                    <div class="submitbtn">
                                        <input type="hidden" id="frmname" name="frmname" value="Edited Intern Referral Form" />
                                        <input type="submit" value="Update" name="u_referral">
                                    </div>
                                </form>
                        </div>
                        <!-- Intern Schedule Link -->
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Internship Schedule</h1>
                                <form class="acct-form" action="patt_edit.php" method="post">
                                    <div class="g-forms my-3">
                                        <input type="text" id="i_sched" name="i_sched" placeholder="<?php if (!empty($i_sched)) {
                                                                                                        echo $i_sched;
                                                                                                    } else {
                                                                                                        echo 'Link';
                                                                                                    } ?>">
                                    </div>

                                    <div class="submitbtn">
                                        <input type="hidden" id="frmname" name="frmname" value="Edited Intern Schedule Link" />
                                        <input type="submit" value="Update" name="u_sched">
                                    </div>
                                </form>
                        </div>

                        <!-- End of forms -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
</body>

</html>