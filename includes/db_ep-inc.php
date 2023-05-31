<?php
//connection of the system to the DB
$servername = "127.0.0.1";
$dbuname = "root";
$dbpassword = "";
$dbname = "employeeportaldb";

$conn = mysqli_connect($servername, $dbuname, $dbpassword, $dbname);

if(!$conn){
    die("Connection Failed: :" . mysqli_connect_error());
}
?>