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
    <link rel="stylesheet" href="/Employee-Portal/people_services/people_support/assets/css/p_support_styles.css">
</head>
<title>Payreto Employee Portal | People Support</title>

<?php
$sql = "SELECT link, id FROM p_support WHERE id = 'committee'";
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
                    <a class="back-icon me-3" href="/Employee-Portal/people_services/people_support/index.php"><i class="back-icon fa-solid fa-angle-left"></i></a>
                    <h4 class="m-0">OCCUPATIONAL SAFETY AND HEALTH</h4>
                </div>
                <?php
                include "../../../includes/header.php";
                ?>
            </nav>
            <div class="w-100 py-5">
                <div class="container">
                    <h1 class="card-heading my-5 text-uppercase text-center">OSH COMMITTEE</h1>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th style="width: 500px; text-align:center">Previous Type & Composition of HSC</th>
                                <th style="width: 500px; text-align:center">New Type & Composition of HSC</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" style="text-align:center">Type</th>
                                <td>Type D<br>
                                    with less than one hundred (100) workers</td>
                                <td>Type C<br>
                                    with one hundred (100) to two hundred (200) workers</td>
                            </tr>
                            <tr>
                                <th scope="row" style="text-align:center">Chariman</th>
                                <td>One Manager: Carl Michael Zaragoza (Safety Officer 1)</td>
                                <td>One Manager: <span style="color:#429dfc">Mhikko Ilagan (Safety Officer 2) - replacement of Carl Zaragoza</span></td>
                            </tr>
                            <tr>
                                <th scope="row" style="text-align:center">Members</th>
                                <td>One Foreman: Joyce Guillermo (Safety Officer 1)<br>
                                    Three Workers:<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;• Mark Patag (Office Admin Associate)<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;• Lea May Santos (Elected Employee Representative)<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;• Frank Ferrer (Appointed Fire Marshal)<br>
                                    The Nurse/First Aider: Erdel Diaz (First Aider)
                                </td>
                                <td>One Foreman: <span style="color:#429dfc">Earl Clint Estioco (Office Admin Estioco) - replacement of Joyce Guillermo</span><br>
                                    Three Workers:<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;• Mark Patag (HR Business Partner)<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;• Lea May Santos (Elected Employee Representative)<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;• Frank Ferrer (Appointed Fire Marshal)<br>
                                    The Nurse/First Aider: <span style="color:#429dfc">To hire a part time nurse and incompliance to Rule 1960.02 (2)(b) of the Occupational Safety and Health Standards.</span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" style="text-align:center">Secretary</th>
                                <td>Safety Officer: Mhikko Ilagan (Safety Officer: 2)</td>
                                <td>Safety Officer: <span style="color:#429dfc">JR Arayata (For Training) - replacement of Mhikko Ilagan</span></td>
                            </tr>
                            <tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="assets/js/events_script.js"></script>
    <!-- /#page-content-wrapper -->
</body>

</html>