<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (empty(@$_SESSION["email"])) {
        session_destroy();
        echo "<script> window.location.href = '/Employee-Portal/login/login.php' </script>";
    }
    $email = @$_SESSION["email"];
    include_once '../../includes/db_ep-inc.php';
    include_once '../../includes/functions-inc.php';
    include_once '../../includes/plugins.php';
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
    if (@$admin != 4 && !empty(@$admin)) {
        session_destroy();
        echo "<script> window.location.href = '/Employee-Portal/login/login.php' </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Local CSS -->
    <link rel="stylesheet" href="/Employee-Portal/assets/css/dashboard_styles.css">
    <link rel="stylesheet" href="/Employee-Portal/assets/css/menu_styles.css">
</head>
<title>Payreto Employee Portal | People Management</title>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include "../../includes/sidebar.php"; ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="heading-payreto navbar navbar-expand-lg navbar-light py-3 px-4">
                <div class="d-flex align-items-center header-text">
                    <i class="fas fa-align-left tertiary-text fs-4 me-3" id="menu-toggle"></i>
                    <h4 class="m-0">PEOPLE MANAGEMENT</h4>
                </div>
                <?php
                include "../../includes/header.php";
                ?>
            </nav>
            <div class="w-100 py-5">
                <div class="container d-flex flex-column justify-content-center">
                    <h1 class="card-heading my-5 text-uppercase text-center">HISTORY</h1>
                    <div class="container">
                        <?php

                        $sql = "SELECT * FROM audit_logs";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        $array = (array) $row;
                        ?>

                        <table class="display" id="audit_logs">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>DATE AND TIME</th>
                                    <th>USERNAME</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //table for audit logs
                                $i = 0;
                                foreach ($row as $key => $value) {
                                    echo "<tr>";
                                    echo "<td>" . $key += 1, "</td>";
                                    echo "<td>" . $value["dtime"] . "</td>";
                                    echo "<td>" . filter_var($value["uname"] , FILTER_SANITIZE_SPECIAL_CHARS) . "</td>";
                                    echo "<td>" . filter_var($value["form"] , FILTER_SANITIZE_SPECIAL_CHARS) . "</td>";
                                    echo "</tr>";
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>
</body>
<script>
                            $(document).ready(function() {
                                $('#audit_logs').DataTable();
                            });
                        </script>

</html>