<?php

require_once "../includes/db_ep-inc.php";
require_once "../includes/functions-inc.php";

//error handling
if (emptyInputForget($email) !== false){
    // header("location: ../login.php?error=emptyinput");
    echo "<script> window.location.href='login.php?error=emptyinput' </script>";
    echo "pasok3";
    exit();
}else if (duplicateEmail($conn, $email) == false){
    // header("location: ../login.php?error=nouser");
    echo "<script> window.location.href='login.php?error=nouser' </script>";
    echo "pasok2";
    exit();
}

// header("location: ../login.php?error=nouser");
echo "<script> window.location.href='login.php?error=sent' </script>";

?>
