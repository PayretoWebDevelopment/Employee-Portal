<?php
if (isset($_POST["loginbtn"])) {

    $email = $_POST["email"];
    $pass = $_POST["pass"];

    if(!empty($_POST["rememberMe"])){ // true if checked
        $email = $_POST['email'];
        $passw = password_hash($_POST['pass'], PASSWORD_BCRYPT);
        //make cookies
        ob_start();
        setcookie("emailcookie", $email, time()+(86400 * 30), "/"); //cookie lifespan = 30 days
        setcookie("passwcookie", $passw, time()+(86400 * 30), "/");
        ob_end_flush();

        if(!isset($_COOKIE["emailcookie"]) && !isset($_COOKIE["passwcookie"])){
            echo "cookies not set";
        }else{
            echo "cookies set!";
        }
    }

    session_start();
    $_SESSION["email"] = $email;

    require_once "../includes/db_ep-inc.php";
    require_once "../includes/functions-inc.php";

    //checks if inputs are empty
    if (emptyInput($email, $pass) !== false) {
        echo "<script> window.location.href='login.php?error=emptyinput' </script>";
        exit;
    }

    login($conn, $email, $pass);
} else { // correct log in
    echo "<script> window.location.href='../homepage/homepage.php' </script>";
}

?>