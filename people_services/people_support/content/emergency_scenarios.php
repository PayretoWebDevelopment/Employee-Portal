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
$sql = "SELECT link, id FROM p_support WHERE id = 'emergency_s'";
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
                    <h4 class="m-0">BUSINESS CONTINUITY PLAN</h4>
                </div>
                <?php
                include "../../../includes/header.php";
                ?>
            </nav>
            <div class="w-100 py-5">
                <div class="container d-flex flex-column justify-content-center">
                    <h1 class="card-heading my-5 text-uppercase text-center">Emergency Scenarios</h1>
                    <h2 class="my-5 text-center">Storm</h2>
                    <img class="w-100" src="/Employee-Portal/people_services/people_support/assets/img/EmergencyScenario_Tsunami.svg">
                    <h2 class="my-5 text-center">Earthquake</h2>

                    <!-- Migs Drop -->
                    <div class="container py-3">
                        <div class="row">
                            <div class="col-md-6">
                                <img class="w-75" src="/Employee-Portal/people_services/people_support/assets/img/Drop_ENG_Blue_Orange.png">
                            </div>
                            <div class="col d-flex align-items-center">
                                <div>
                                    <p><strong>DROP</strong> where you are, onto your gands and knees. This position protects you from being knocked down and also allows you to stay low and crawl to shelter if nearby.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Migs Cover -->
                    <div class="container py-3">
                        <div class="row">
                            <div class="col-md-6">
                                <img class="w-75" src="/Employee-Portal/people_services/people_support/assets/img/Cover_ENG_Blue_Orange.png">
                            </div>
                            <div class="col d-flex align-items-center">
                                <div class="d-flex flex-column">
                                    <div>
                                        <p><strong>COVER</strong> your head and neck with one arm hand:</p>
                                    </div>
                                    <ul>
                                        <li>If a sturdy table or desk is nearby, crawl underneath it for shelter</li>
                                        <li>If no shelter is nearby, crawl next to an interior wall (away from windows)</li>
                                        <li>Stay on your knees; bend over to protect vital organs</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Migs Hold ON -->
                    <div class="container py-3">
                        <div class="row">
                            <div class="col-md-6">
                                <img class="w-75" src="/Employee-Portal/people_services/people_support/assets/img/HoldOn_ENG_Blue_Orange.png">
                            </div>
                            <div class="col d-flex align-items-center">
                                <div class="d-flex flex-column">
                                    <div>
                                        <p><strong>HOLD ON</strong> until shaking stops</p>
                                    </div>
                                    <ul>
                                        <li>Under shelter: hold on to it with one hand; be ready to move with your shelter if it shifts</li>
                                        <li>No shelter: hold on to your head and neck with both arms and hands.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p>
                    <p class="fw-bold"> Indoors:</p>
                    Drop, Cover, and Hold On. Avoid exterior walls, windows, hanging objects, mirrors, tall furniture, large appliances, and kitchen cabinets with heavy objects or glass. However, do not try to move more than 5-7 feet before getting on the ground. Do not go outside during shaking! The area near the exterior walls of a building is the most dangerous place to be. Windows, facades amd architectural details are often the first parts of the building to break away. If seated and unable to drop to the floor: bend forwad, cover your head with your arms and Hold On to your neck with both hands.
                    <br><br>
                    <p class="fw-bold"> Outdoors:</p>
                    Move to a clear area if you can safely do so; avoid power lines, trees, signs, buildings, wehicles, and other hazards. then Drop, Cover, and Hold On. This protects from any objects that may be thrown from the side, even if nothing is directly above you.
                    </p>
                </div>
                <h2 class="my-5 text-center">Fire</h2>
                <!-- Migs FIRE -->
                <div class="container py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <img class="w-75" src="/Employee-Portal/people_services/people_support/assets/img/Fire_Extinguisher.png">
                        </div>
                        <div class="col d-flex flex-column">
                            <div class="d-flex flex-column">
                                <div>
                                    <strong><strong class="fs-1">P</strong>ull the pin</strong>
                                </div>
                                <p class="text-wrap"> Every fire extinguisher has a pin inserted into the handle that prevents the fire extinguisher from being discharged by accident. Grab the ring and pull the pin our from the side of the handle. <br> &nbsp; • &nbsp; Now that the extinguisher is read to discharge, hold the device so the nozzle is pointed away from you.</p>
                            </div>
                            <!-- s -->
                            <div class="d-flex flex-column">
                                <div>
                                    <strong><strong class="fs-1">A</strong>im the hose at the base of the fire.</strong>
                                </div>
                                <p class="text-wrap"> Hold thelower handle lever (the carrying handle) with one hand and grab the hose or nozzle with the other hand. Point the hose directly at the base of the fire, because you have to put out the fuel that's burning. Do not aim the hose at the flames. <br> &nbsp; • &nbsp; With carbon diozide extinguishers, keep your hands away from the plastic discharge horn, which gets extremely cold.</p>
                            </div>
                            <!-- e -->
                            <div class="d-flex flex-column">
                                <div>
                                    <strong><strong class="fs-1">S</strong>queeze the lever</strong>
                                </div>
                                <p class="text-wrap"> To release the extinguishing agent, squeeze the two levers together with one hand while you aim the hose at the base of the fire with the other. Apply slow and even pressure when you squeeze the levers. <br> &nbsp; • &nbsp; To stop discharging the extinguisher, release the levers.</p>
                            </div>
                            <!-- e -->
                            <div class="d-flex flex-column">
                                <div>
                                    <strong><strong class="fs-1">S</strong>weep the hose from side-to-side</strong>
                                </div>
                                <p class="text-wrap"> To extinguish all the fuel, slowly sweep the hose back and forth over the base of the fire as you discharge the extinguisher. Move closer to the fire as the flames die down. <br> &nbsp; • &nbsp; Continue discharging until the fire goes out.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /#page-content-wrapper -->
            </div>
        </div>
    </div>
</body>

</html>