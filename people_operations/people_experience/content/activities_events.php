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
    <link rel="stylesheet" href="/Employee-Portal/people_operations/people_experience/assets/css/p_management_styles.css">
    <link rel="stylesheet" href="/Employee-Portal/people_operations/people_experience/assets/css/events_styles.css">
</head>
<title>Payreto Employee Portal | People Experience</title>
<?php

$sql = "SELECT * FROM events_activities";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
                    <a class="back-icon me-3" href="/Employee-Portal/people_operations/people_experience/index.php"><i class="back-icon fa-solid fa-angle-left"></i></a>
                    <h4 class="m-0">EMPLOYEE ENGAGEMENT</h4>
                </div>
                <?php
                include "../../../includes/header.php";
                ?>
            </nav>
            <div class="w-100 py-5">
                <div class="container">
                    <h1 class="card-heading my-5 text-uppercase text-center">LIST OF ACTIVITIES AND EVENTS</h1>
                    <table id="example2" class="table">
                        <tbody>
                            <?php
                            foreach ($row as $key => $value) :
                                $id = $value['e_id'];
                                $img = $value['e_img'];
                            ?>
                                <tr class="row">
                                    <td style="display:none"></td>
                                    <td style="display:none"><?php echo $value['e_id']; ?></td>
                                    <td style="display:none"><?php echo html_entity_decode($value['e_name']); ?></td>
                                    <td style="display:none"><?php echo html_entity_decode($value['e_content']); ?></td>
                                    <td class="container-fluid d-flex flex-row col-12">
                                        <div class="w-100">
                                            <a class="staticBackdrop" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                <div class="card card-has-bg click-col" style="background-image:<?php if (!empty($img)) {
                                                                                                                    echo "url('$img')";
                                                                                                                } else {
                                                                                                                    echo "url('https://source.unsplash.com/600x900/?tech,street')";
                                                                                                                } ?>; background-size:cover; background-repeat:no-repeat;">
                                                    <div class="card-img-overlay d-flex flex-column">
                                                        <div class="card-body">
                                                            <h3 class="card-meta mb-2"><?php echo html_entity_decode($value["e_team"]) ?></h3>
                                                            <h4 class="card-title mt-0 "><?php echo html_entity_decode($value["e_name"]) ?></h4>
                                                            <h5><i class="far fa-clock"></i><?php echo " " . $value["e_date"] ?></h5>
                                                            <!-- Button trigger modal -->
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="media">
                                                                <div class="media-body">
                                                                    <h6 class="my-0  d-block"><?php echo html_entity_decode($value["e_poster"]) ?></h6>
                                                                    <h3><?php echo $value["e_posted"] ?></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <?php include_once '../../../assets/modal/activitiesModal.php' ?>
                                    </td>
                                <?php endforeach; ?>
                                </tr>
                        </tbody>
                    </table>
                </div>


                <script>
                    $(document).ready(function() {
                        $('#example2').DataTable();
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