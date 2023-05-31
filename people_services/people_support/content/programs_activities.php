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
    <link rel="stylesheet" href="/Employee-Portal/people_services/people_support/assets/css/events_styles.css">
</head>
<title>Payreto Employee Portal | People Support</title>

<?php

$sql = "SELECT * FROM osh_programs";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
$array = (array) $row;
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
                    <h1 class="card-heading my-5 text-uppercase text-center">LIST OF OSH PROGRAMS AND ACTIVITIES</h1>
                    <table id="example" class="table">
                        <tbody>
                            <?php
                            foreach ($row as $key => $value) :
                                $id = $value['o_id'];
                                $img = $value['o_img'];
                            ?>
                                <tr class="row">
                                    <td style="display:none"></td>
                                    <td style="display:none"><?php echo $value['o_id']; ?></td>
                                    <td style="display:none"><?php echo html_entity_decode($value['o_name']); ?></td>
                                    <td style="display:none"><?php echo html_entity_decode($value['o_desc']); ?></td>
                                    <td class="container-fluid d-flex flex-row col-12">
                                        <div class="w-100">
                                            <a class="staticBackdrop" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                <div class="card card-has-bg click-col" style="background-image:<?php if (!empty($img)) {
                                                                                                                    echo "url('$img')";
                                                                                                                } else {
                                                                                                                    echo "url('https://source.unsplash.com/600x900/?tech,street')";
                                                                                                                } ?>; background-size:contain; background-repeat:repeat;">
                                                    <img class="card-img d-none" src="https://source.unsplash.com/600x900/?tech,street" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
                                                    <div class="card-img-overlay d-flex flex-column">
                                                        <div class="card-body">
                                                            <h4 class="card-title mt-0 "><?php echo html_entity_decode($value["o_name"]) ?></h4>
                                                            <h5><i class="far fa-clock"></i><?php echo " " . $value["o_date"] ?></h5>
                                                            <!-- Button trigger modal -->
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="media">
                                                                <div class="media-body">
                                                                    <h6 class="my-0  d-block"><?php echo html_entity_decode($value["o_poster"]) ?></h6>
                                                                    <h3><?php echo $value["o_posted"] ?></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <?php include_once '../assets/modal/oshModal.php' ?>
                                    </td>
                                <?php endforeach; ?>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            <script>
                $(document).ready(function() {
                    $('#example').DataTable();
                });

                $(document).on("click", ".staticBackdrop", function() {
                    $('#staticBackdrop').modal('show');

                    $tr = $(this).closest('tr');

                    var eventData = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();

                    console.log(eventData);

                    var event_name = document.getElementById("event_name");
                    event_name.textContent = eventData[2];
                    var event_name = document.getElementById("event_content");
                    event_name.textContent = eventData[3];
                });
            </script>
            <script>
                $.fn.dataTable.ext.errMode = 'none';
            </script>
        </div>
    </div>
    </div>
</body>

</html>