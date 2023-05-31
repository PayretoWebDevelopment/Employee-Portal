<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (empty(@$_SESSION["email"])) {
        session_destroy();
        echo "<script> window.location.href = 'login.php' </script>";
    }
}
$email = @$_SESSION["email"];
include '../includes/db_ep-inc.php';
include '../includes/functions-inc.php';
include '../includes/plugins.php';
getInfo($conn, $email);
$uname = @$_SESSION['uname'];
$role = @$_SESSION['role'];
$img = @$_SESSION['img'];
$department = @$_SESSION['department'];
$FN = @$_SESSION['FN'];
$LN = @$_SESSION['LN'];
$location = @$_SESSION['location'];

$admin = @$_SESSION['admin'];
$admin_oa = @$_SESSION['admin_oa'];

if ($admin != 0 || $admin_oa != 0) {
    echo "<script> window.location.href = 'account_settings_admin.php' </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Local CSS -->
    <link rel="stylesheet" href="/Employee-Portal/assets/css/dashboard_styles.css">
    <link rel="stylesheet" href="/Employee-Portal/assets/css/account_styles.css">
    <link rel="stylesheet" href="/Employee-Portal/assets/css/menu_styles.css">
</head>
<title>Payreto Employee Portal | Account Settings</title>


<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include "../includes/sidebar.php"; ?>
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="heading-payreto navbar navbar-expand-lg navbar-light py-3 px-4">
                <div class="d-flex align-items-center header-text">
                    <i class="fas fa-align-left tertiary-text fs-4 me-3" id="menu-toggle"></i>
                    <h4 class="m-0">ACCOUNT SETTINGS</h4>
                </div>
                <?php
                include "../includes/header.php";
                ?>
            </nav>
            <div class="w-100 py-5">
            <h1 class="card-heading my-5 text-uppercase text-center">UPDATE ACCOUNT DETAILS</h1>
                <div class="info-5 col-10 col-sm-12 my-5 d-flex flex-column justify-content-center align-items-center">
                    <h2 class="my-3">UPLOAD/CHANGE AVATAR</h2>
                    <img src="../assets/img/<?php echo $img ?>" alt="" width=300px height=300px object-fit=contain title="<?php echo $img ?>" id="uploaded_image" class="rounded-circle">
                    
                    <?php //error message display
                        include "../account/account_error.php";
                    ?>

                    <form class="d-flex flex-column d-flex justify-content-center align-items-center" action="uaccdetails-inc.php" enctype="multipart/form-data" method="POST">
                        <div class="d-flex align-items-center justify-content-center my-3">
                            <span><i class="fa fa-camera px-3" style="color: #031166"></i></span>
                            <input class="form-control" type="file" name="img" id="img" accept=".jpg, .jpeg, .png">
                        </div>
                        <div class="uploadbtn">
                            <button type="submit" name="changepfp">Upload</button>
                        </div>
                    </form>
                </div>
                <div class="container-fluid my-5 mx-3 col-12">
                    <h1 class="my-3 settings-header">EMPLOYEE DETAILS</h1>
                    <div class="row d-flex justify-content-center">
                        <div class="info-1 mb-3 col-12 col-sm-6 d-flex flex-column">
                            <div class="mb-3">
                                <label for="fname">FIRST NAME</label>
                                <h2><?php echo $FN ?></h2>
                            </div>
                            <div class="mb-3">
                                <label for="role">ROLE</label>
                                <h2><?php echo $role; ?></h2>
                            </div>
                            <div class="mb-3">
                                <label for="email">EMAIL</label>
                                <h2><?php echo $email; ?></h2>
                            </div>
                        </div>
                        <div class="info-2 mb-3 col-12 col-sm-6 d-flex flex-column">
                            <div class="mb-3">
                                <label for="lname">LAST NAME</label>
                                <h2><?php echo $LN ?></h2>
                            </div>

                            <div class="lastname mb-3">
                                <label for="departnment">DEPARTMENT</label>
                                <h2><?php echo $department; ?></h2>
                            </div>
                            <div class="mb-3">
                                <label for="location">LOCATION</label>
                                <h2><?php echo $location; ?></h2>
                            </div>
                        </div>
                    </div>

                    <form class="acct-form" action="uaccdetails-inc.php" method="POST">
                        <div class="info-5 row d-flex mt-5">
                            <h2 class="my-3 col-10 col-sm-12">CHANGE USERNAME</h2>
                            <div class="info-1 mb-3 col-11 col-sm-6 d-flex flex-column">
                                <div class="info-4 mb-3">
                                    <div class="username">
                                        <label for="uname">USERNAME</label><br>
                                        <input type="text" id="uname" name="uname">
                                    </div>
                                </div>
                            </div>
                            <div class="info-5 row d-flex mt-5 px-3">
                                <h2 class="my-3 col-11 col-sm-12">CHANGE PASSWORD</h2>
                                <div class="info-1 mb-3 col-12 col-sm-6 d-flex flex-column">
                                    <div class="info-4 mb-3">
                                        <div class="old-password">
                                            <label for="old-pass">OLD PASSWORD</label><br>
                                            <input type="password" id="opass" name="opass">
                                        </div>
                                    </div>
                                    <div class="info-4 mb-3">
                                        <div class="password">
                                            <label for="pass">NEW PASSWORD</label><br>
                                            <input type="password" id="PassEntry" name="pass">
                                            <span name="StrengthDisp" id="StrengthDisp" class="badge displayBadge w-2">Weak</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="info-1 mb-3 col-12 col-sm-6 d-flex flex-column">
                                    <div class="info-4 mb-3">
                                        <div class="password">
                                            <label for="c-pass">CONFIRM PASSWORD</label><br>
                                            <input type="password" id="cpass" name="cpass">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        //error message for user information chagnes
                        if (isset($_GET["error"])) {
                            if ($_GET["error"] == "emptyinput") {
                                echo "<p class=\"error-msg\"> Fill in all fields! </p>";
                            } else if ($_GET["error"] == "passmismatch") {
                                echo "<p class=\"error-msg\"> Password does not match!";
                            } else if ($_GET["error"] == "samepass") {
                                echo "<p class=\"error-msg\"> New password must not be the same as old password!";
                            } else if ($_GET["error"] == "wrongpass") {
                                echo "<p class=\"error-msg\"> Old password is not the same as the current password";
                            } else if ($_GET["error"] == "weakpass") {
                                echo "<p class=\"error-msg\"> Password must contain at least one(1) number, uppercase, lowercase, and special character.";
                            } else if ($_GET["error"] == "changeuser") {
                                echo "<p class=\"error-msg\"> Username successfully changed!";
                            } else if ($_GET["error"] == "changepass") {
                                echo "<p class=\"error-msg\"> Password successfully changed!";
                            } else if ($_GET["error"] == "changeall") {
                                echo "<p class=\"error-msg\"> Password and Username successfully changed!";
                            } else if ($_GET["error"] == "statementfailed") {
                                echo "<p class=\"error-msg\"> Connection Failed </p>";
                            } else if ($_GET["error"] == "incorrectpass") {
                                echo "<p class=\"error-msg\"> Confirm password does not match</p>";
                            }
                        }
                        ?>
                        <div class="submitbtn">
                            <input type="submit" name="changepass">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };

        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>

<script type="text/javascript" src="../assets/js/PassChecker.js"></script>