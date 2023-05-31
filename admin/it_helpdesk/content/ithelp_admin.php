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
    include_once '../../../includes/plugins.php';
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
    if (@$admin != 6 && !empty(@$admin)) {
        session_destroy();
        echo "<script> window.location.href = '/Employee-Portal/login/login.php' </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../../assets/css/dashboard_styles.css">
    <link rel="stylesheet" href="../assets/css/it_helpdesk_styles.css">
</head>
<title>Payreto Employee Portal | IT Helpdesk</title>

<body>
    <div class="d-flex" id="wrapper">
        <?php
        if (isset($_SESSION['status_it_help'])) {
        ?>
            <script>
                Swal.fire({
                    icon: "<?php echo $_SESSION['status_code']; ?>",
                    title: "<?php echo $_SESSION['status_it_help']; ?>",
                    text: "<?php echo $_SESSION['status_text']; ?>",
                    confirmButtonColor: "#010538"
                })
            </script>
        <?php
            unset($_SESSION['status_it_help']);
        }
        ?>
        <?php include "../../../includes/sidebar_admin.php"; ?>
        <div id="page-content-wrapper">
            <nav class="heading-payreto navbar navbar-expand-lg navbar-light py-3 px-3">
                <div class="d-flex align-items-center header-text">
                    <i class="fas fa-align-left tertiary-text fs-4 me-3" id="menu-toggle"></i>
                    <h4 class="m-0">IT HELPDESK</h4>
                </div>
                <?php include "../../../includes/header.php"; ?>
            </nav>
            <div class="w-100">
                <div class="w-100 py-5">
                    <div class="container">
                        <h1 class="card-heading my-5 text-uppercase text-center">ADMIN ACCESS</h1>
                        <!-- Technology Request Form Card -->
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Technology Request Form</h1>
                                <form class="acct-form" action="ithd_edit.php" method="post" enctype="multipart/form-data">
                                    <div class="g-forms my-3">
                                        <input type="hidden" id="identifier" name="identifier" value="technology">
                                        <input class="form-control" type="file" name="technology" id="technology" accept=".jpg, .jpeg, .png, .pdf">
                                    </div>
                                    <div class="uploadbtn">
                                        <input type="hidden" id="frmname" name="frmname" value="Edited Technology Request Form" />
                                        <button type="submit" name="u_technology">Upload</button>
                                    </div>
                                </form>
                        </div>
                        <!-- BYOD Request Form Card -->
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">BYOD Request Form</h1>
                                <form class="acct-form" action="ithd_edit.php" method="post" enctype="multipart/form-data">
                                    <div class="g-forms my-3">
                                        <input type="hidden" id="identifier" name="identifier" value="byod">
                                        <input class="form-control" type="file" name="byod" id="byod" accept=".jpg, .jpeg, .png, .pdf, .xlsx">
                                    </div>
                                    <div class="uploadbtn">
                                        <input type="hidden" id="frmname" name="frmname" value="Edited BYOD Request Form" />
                                        <button type="submit" name="u_byod">Upload</button>
                                    </div>
                                </form>
                        </div>
                        <!-- IT Security Awareness Card -->
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">IT Security Awareness</h1>
                                <form class="acct-form" action="ithd_edit.php" method="post" enctype="multipart/form-data">
                                    <div class="g-forms my-3">
                                        <input type="hidden" id="identifier" name="identifier" value="awareness">
                                        <input class="form-control" type="file" name="awareness" id="awareness" accept=".jpg, .jpeg, .png, .pdf">
                                    </div>
                                    <div class="uploadbtn">
                                        <input type="hidden" id="frmname" name="frmname" value="Edited IT Security Awareness" />
                                        <button type="submit" name="u_awareness">Upload</button>
                                    </div>
                                </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /#page-content-wrapper -->
</body>

</html>