<?php
session_start();
@$femail = $_SESSION["femail"];
include '../includes/plugins.php';

ob_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Local CSS -->
    <link rel="stylesheet" href="/Employee-Portal/assets/css/dashboard_styles.css">
    <link rel="stylesheet" href="/Employee-Portal/assets/css/login_styles.css">
    <link rel="stylesheet" href="/Employee-Portal/assets/css/menu_styles.css">
</head>
<title>Payreto Employee Portal | Login</title>

<body>
    <div class="container">
        <div class="d-flex flex-column justify-content-center align-items-center shadow shadow-lg p-3 mb-5 bg-body">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 d-flex justify-content-center align-items-center m-auto">
                    <form class="container-form" action="login_validation.php" method="POST">
                        <?php
                        //auto fill when cookie is present                
                        // $un = "";
                        // $pw = "";
                        // if (isset($_COOKIE['emailcookie'])) {
                        //     $un = $_COOKIE['emailcookie'];
                        // } else {
                        //     $un = "";
                        // }
                        // if (isset($_COOKIE['passwcookie'])) {
                        //     $pw = $_COOKIE['passwcookie'];
                        // } else {
                        //     $pw = "";
                        // }
                        ?>
                        <div class="logo mt-5 mt-md-5 mb-4"><a href="/Employee-Portal/login/login.php"><img style="width: 40%;" src="/Employee-Portal/assets/img/Payreto_logo.png" alt=""></a></div>
                        <div class="d-flex flex-column justify-content-center">
                            <div class="email mb-5">
                                <label for="email">EMAIL / USERNAME</label><br>
                                <input class="w-75" type="text" id="email" name="email" value="<?php //echo $un; ?>">
                            </div>

                            <div class="password mb-5">
                                <label for="pass">PASSWORD</label><br>
                                <input class="w-75" type="password" id="pass" name="pass" value="<?php //echo $pw; ?>">
                                <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                            </div>
                            <!-- <div class="remember">
                                <input type="checkbox" value="IsRememberMe" id="rememberMe" name="rememberMe">
                                <label for="rememberMe">Remember me</label>
                            </div> -->
                            <div class="loginbtn w-50">
                                <input type="submit" name="loginbtn" value="Log In">
                            </div>
                            <?php
                            //error messages
                            if (isset($_GET["error"])) {

                                if ($_GET["error"] == "emptyinput") {
                                    echo "<p class=\"error-msg w-100 w-sm-75 text-wrap\">Error! All input fields are required!</p>";
                                } else if ($_GET["error"] == "wronglogin") {
                                    echo "<p class=\"error-msg w-100 w-sm-75 text-wrap\";>Error! Incorrect email or password!</p>";
                                } else if ($_GET["error"] == "wronglogin2") {
                                    echo "<p class=\"error-msg w-100 w-sm-75 text-wrap\">Error! Account does not exist.</p>";
                                } else if ($_GET["error"] == "sent") {
                                    echo "<p class=\"success-msg w-100 w-sm-75 text-wrap\">A super admin has been informed! Please be patient.</p>";
                                } else if ($_GET["error"] == "nouser") {
                                    echo "<p class=\"error-msg w-100 w-sm-75 text-wrap\";>Error! user not found!</p>";
                                }
                                unset($_SESSION["femail"]);
                            }
                            ?>
                            <div class="signbtn mt-5 d-none">
                                <p>Forgot your login details? Ask the system super admin for help!</p>
                            </div>
                            <div class="signbtn mt-5 ">
                                <p>Forgot your login details? <a class="gray pointer" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Get Help Signing In</a></p>
                            </div>
                        </div>


                    </form>
                </div>
                <div class="col-6">
                    <div class="d-flex justify-content-center align-items-center m-0 d-none d-md-none d-lg-block">
                        <img class="img-fluid ms-5 ms-sm-2" style="object-fit: cover;" src="/Employee-Portal/assets/img/login_image.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <?php include 'forgot_pass_modal.php'; ?>
    </div>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#pass');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>

<?php
ob_end_flush();
?>