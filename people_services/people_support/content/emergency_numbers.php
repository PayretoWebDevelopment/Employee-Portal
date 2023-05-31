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
$sql = "SELECT link, id FROM p_support WHERE id = 'emergency_n'";
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
                    <h1 class="card-heading my-5 text-uppercase text-center">Emergency Numbers</h1>
                    <div class="container">
                        <table class="display" id="emergency_n">
                            <thead>
                                <tr>
                                    <th>AGENCY</th>
                                    <th>HOTLINE</th>
                                    <th>TRUNK & DIRECT LINE</th>
                                    <th>REGION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Emergency 911 National Office</td>
                                    <td>911</td>
                                    <td>(02) 925-9111<br>
                                        (02) 928-7281 [telefax]<br>
                                        +63966-5000-299 [Globe]<br>
                                        +63932-318-0440 [Smart]</td>
                                    <td>NCR<br>
                                        NCR<br><br><br><br></td>
                                </tr>
                                <tr>
                                    <td>Bureau of Fire Protection</td>
                                    <td> </td>
                                    <td>(02) 426-0219<br>
                                        (02) 426-3812<br>
                                        (02)426-0246
                                    <td>NCR<br>
                                        NCR<br>
                                        NCR</td>
                                </tr>
                                <tr>
                                    <td>Philippine National Police</td>
                                    <td> </td>
                                    <td>(2) 722-0650
                                        +63917-847-5757</td>
                                    <td>NCR<br>
                                        NCR</td>
                                </tr>
                                <tr>
                                    <td>Marikina Station Tactical Operations Center</td>
                                    <td>161</td>
                                    <td>(02)646-1631<br>
                                        (02)646-1633</td>
                                    <td>NCR<br>
                                        NCR</td>
                                </tr>
                                <tr>
                                    <td>Red Cross<br><br>
                                        Staff<br>
                                        Manager<br>
                                        Radio Room</td>
                                    <td>143<br><br>
                                        134<br>
                                        132<br>
                                        133</td>
                                    <td>(02) 527-0000<br>
                                        (02) 527-8385<br>
                                        (02) 527-8386<br>
                                        (02) 527-8387<br>
                                        (02) 527-8388<br>
                                        (02) 527-8389<br>
                                        (02) 527-8390<br>
                                        (02) 527-8391<br>
                                        (02) 527-8392<br>
                                        (02) 527-8393<br>
                                        (02) 527-8394<br>
                                        (02) 527-8395<br>
                                        (02) 527-0864 [telefax]</td>
                                    <td>NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR</td>
                                </tr>
                                <tr>
                                    <td>Philippine Institute of Volcanology and Sieimology</td>
                                    <td> </td>
                                    <td>(02) 426-1468<br>
                                        (02) 426-1469<br>
                                        (02) 426-1470<br>
                                        (02) 426-1471<br>
                                        (02) 426-1472<br>
                                        (02) 426-1473<br>
                                        (02) 426-1474<br>
                                        (02) 426-1475<br>
                                        (02) 426-1476<br>
                                        (02) 426-1477<br>
                                        (02) 426-1478<br>
                                        (02) 426-1479<br><br>

                                        Local 124/125</td>
                                    <td>NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br><br><br></td>
                                </tr>
                                <tr>
                                    <td>Philippine Coast Guard</td>
                                    <td> </td>
                                    <td>(02) 527-8481<br>
                                        (02) 527-8482<br>
                                        (02) 527-8483<br>
                                        (02) 527-8484<br>
                                        (02) 527-8485<br>
                                        (02) 527-8486<br>
                                        (02) 527-8487<br>
                                        (02) 527-8488<br>
                                        (02) 527-8489<br>
                                        (02) 527-3877<br>
                                        0917-724-3682 [Globe]<br>
                                        0918-967-4697 [Smart]<br></td>
                                    <td>NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br><br><br></td>
                                </tr>
                                <tr>
                                    <td>PAGASA<br><br>
                                        Public Info Unit<br><br>
                                        Weather Forecasting Section<br><br>
                                        Aeronautical Meteorology Service Section</td>
                                    <td> </td>
                                    <td><br><br>
                                        (02) 4342696
                                        <br><br>
                                        (02) 9264258<br>
                                        (02) 9271541
                                        <br><br>

                                        (02) 8323023
                                    </td>
                                    <td><br><br>
                                        NCR<br><br>

                                        NCR<br>
                                        NCR
                                        <br><br>

                                        NCR
                                    </td>
                                </tr>
                                <tr>
                                    <td>Office of Civil Defense</td>
                                    <td> </td>
                                    <td>(02) 421-1918<br>
                                        (02) 913-2786<br>
                                        (072) 607-6528<br>
                                        (072) 700-4747<br>
                                        (078) 304-1630<br>
                                        (078) 304-1631<br>
                                        (045) 455-1526<br>
                                        (045) 455-0033<br>
                                        (049) 531-7266<br>
                                        (049) 834-4344<br>
                                        (049)531-7279<br>
                                        (043) 723-4248<br>
                                        (043) 702-9361<br>
                                        (052) 742-1176<br>
                                        +63917-574-7880 [Globe]<br>
                                        +63928-505-3861 [Smart]<br>
                                        (033) 336-9353<br>
                                        (033) 337-6671<br>
                                        (033) 509-7319<br>
                                        (032) 416-5025<br>
                                        (032) 253-6162<br>
                                        (032) 253-8730<br>
                                        +63917-947-5666 [Globe]<br>
                                        +63949-471-0009 [Smart]<br>
                                        (074) 304-2256<br>
                                        (074) 619-0986<br>
                                        (074) 444-5298<br>
                                        (074) 619-0986</td>
                                    <td>NCR<br>
                                        NCR<br>
                                        R I<br>
                                        R I<br>
                                        R II<br>
                                        R II<br>
                                        R III<br>
                                        R III<br>
                                        R IV-A<br>
                                        R IV-A<br>
                                        R IV-A<br>
                                        R IV-B<br>
                                        R IV-B<br>
                                        R V<br>
                                        R V<br>
                                        R V<br>
                                        R VI<br>
                                        R VI<br>
                                        R VI<br>
                                        R VII<br>
                                        R VII<br>
                                        R VII<br>
                                        R VII<br>
                                        R VII<br>
                                        CAR<br>
                                        CAR<br>
                                        CAR<br>
                                        CAR</td>
                                </tr>
                                <tr>
                                    <td>Metro Manila Development Authority</td>
                                    <td> </td>
                                    <td>(02) 882-0925 (Flood Control)<br>
                                        (02) 882-4150-77<br>
                                        Loc. 337: rescue<br>
                                        Loc. 255 (Metrobase)<br>
                                        Loc. 319 (Road Safety)<br>
                                        Loc. 374 (Public Safety)<br>
                                        Loc. 320 (Road Emergency)</td>
                                    <td>NCR<br>
                                        NCR<br><br><br><br><br><br></td>
                                </tr>
                                <tr>
                                    <td>Manila Traffic Hotline</td>
                                    <td></td>
                                    <td>(02)527-3087<br>
                                        (02)527-3088<br>
                                        (02)527-3065</td>
                                    <td>NCR<br>
                                        NCR<br>
                                        NCR</td>
                                </tr>
                                <tr>
                                    <td>Las Piñas Traffic Hotline</td>
                                    <td></td>
                                    <td>(02)874-5756<br>
                                        (02) 874-3927<br>
                                        (02)874-5754</td>
                                    <td>NCR<br>
                                        NCR<br>
                                        NCR</td>
                                </tr>
                                <tr>
                                    <td>Pasig Traffic</td>
                                    <td></td>
                                    <td>(02)641-1907<br>
                                        (02)643-0000<br>
                                        (02)643-1111</td>
                                    <td>NCR<br>
                                        NCR<br>
                                        NCR</td>
                                </tr>
                                <tr>
                                    <td>Mandaluyong Traffic Hotline</td>
                                    <td></td>
                                    <td>(02)534-2993<br>
                                        (02)533-2225<br>
                                        (02)588-2200<br>
                                        (02)588-2299</td>
                                    <td>NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR</td>
                                </tr>
                                <tr>
                                    <td>Maritime Industry Authority</td>
                                    <td></td>
                                    <td>(02) 524-9126<br>
                                        +63917-SUMBONG (7862664)</td>
                                    <td>NCR<br><br><br></td>
                                </tr>
                                <tr>
                                    <td>Manila International Airport Authority</td>
                                    <td></td>
                                    <td>+63917-839-6242<br><br>
                                        Terminals 1,2, and 4:<br>
                                        (02) 877-1109 Local 2444<br><br>
                                        Terminal 3:<br>
                                        (02) 877-7888 Local 8046</td>
                                    <td><br><br>NCR<br><br><br>
                                        NCR<br><br></td>
                                </tr>
                                <tr>
                                    <td>Mactan-Cebu International Airport Authority</td>
                                    <td></td>
                                    <td>(032) 340-2486 local 1560</td>
                                    <td>R VII</td>
                                </tr>
                                <tr>
                                    <td>Land Transportation Office</td>
                                    <td>Text LTOHELP to 2600 (All networks)</td>
                                    <td>(02) 922-9061<br>
                                        (02) 922-9062<br>
                                        (02) 922-9063<br>
                                        (02) 922-9064<br>
                                        (02) 922-9065<br>
                                        (02) 922-9066</td>
                                    <td>NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR</td>
                                </tr>
                                <tr>
                                    <td>Land Transportation Franchising and Regulatory Board</td>
                                    <td>1342</td>
                                    <td>+63917-550-1342<br>
                                        +63998-550-1342</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Department of Transportation</td>
                                    <td>7890</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Office for Transportation Security</td>
                                    <td></td>
                                    <td>(02) 853-5249<br>
                                        +63915-315-5377</td>
                                    <td>NCR<br><br></td>
                                </tr>
                                <tr>
                                    <td>Department of Social Welfare and Development</td>
                                    <td></td>
                                    <td>+630918-912-2813<br>
                                        (02) 931-81-01<br>
                                        (02) 856-3665<br>
                                        (02) 852-8081</td>
                                    <td>NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR</td>
                                </tr>
                                <tr>
                                    <td>Department of Public Works and Highways</td>
                                    <td>135-02</td>
                                    <td>(02) 304-3000<br>
                                        (02) 304-3713<br>
                                        (02) 304-3904</td>
                                    <td>NCR<br>
                                        NCR<br>
                                        NCR</td>
                                </tr>
                                <tr>
                                    <td>Clark International Airport Corporation</td>
                                    <td></td>
                                    <td>(045) 499-1468</td>
                                    <td>R III</td>
                                </tr>
                                <tr>
                                    <td>Civil Aviation Authority of the Philippines</td>
                                    <td></td>
                                    <td>(02) 879-9112<br>
                                        (02) 879-9110</td>
                                    <td>NCR<br>
                                        NCR</td>
                                </tr>
                                <tr>
                                    <td>Civil Aeronautics Board</td>
                                    <td></td>
                                    <td>(02) 542-5234</td>
                                    <td>NCR</td>
                                </tr>
                                <tr>
                                    <td>North Luzon Expressway</td>
                                    <td></td>
                                    <td>(02) 3-500<br>
                                        (02) 580-8900</td>
                                    <td>NCR<br>
                                        NCR</td>
                                </tr>
                                <tr>
                                    <td>South Luzon Expressway</td>
                                    <td></td>
                                    <td>(02) 824-2282<br>
                                        (02) 7763909<br>
                                        (02) 584-4389<br>
                                        (049) 508-7539<br>
                                        (049) 502-8956<br>
                                        +63917-687-75390<br><br>
                                        Customer Assistance<br>
                                        (02) 888-8787<br>
                                        +63915-625-6231 [Globe]<br>
                                        +63939-500-6910 [Smart]<br>
                                        +63923-597-6105 [Sun]</td>
                                    <td>NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        R IV-A<br>
                                        R IV-A<br><br><br><br>
                                        NCR<br><br><br><br></td>
                                </tr>
                                <tr>
                                    <td>Subic-Clark-Tarlac Expressway</td>
                                    <td></td>
                                    <td>(02) 362-2246<br>
                                        (02) 362-9997<br>
                                        0920-96-SCTEX [72839]</td>
                                    <td>NCR<br>
                                        NCR<br><br></td>
                                </tr>
                                <tr>
                                    <td>CAVITEX</td>
                                    <td></td>
                                    <td>(02) 825- 4004<br>
                                        +63942-822-8489</td>
                                    <td>NCR<br><br></td>
                                </tr>
                                <tr>
                                    <td>Skyway System</td>
                                    <td></td>
                                    <td>(02) 824-2282<br>
                                        (02) 776-7777<br><br>
                                        +63917-539-8762 [Globe]<br>
                                        +63999-886-0893 [Smart]<br>
                                        +63932-854-6980 [Sun]</td>
                                    <td>NCR<br>
                                        NCR<br><br><br><br><br></td>
                                </tr>
                                <tr>
                                    <td>Southern TagaloG Arterial Road</td>
                                    <td></td>
                                    <td>(043) 756- 7870<br>
                                        (043) 757-2277</td>
                                    <td>R IV-B<br>
                                        R IV-B</td>
                                </tr>
                                <tr>
                                    <td>Philippine National Railways</td>
                                    <td></td>
                                    <td>(02) 319-0044</td>
                                    <td>NCR</td>
                                </tr>
                                <tr>
                                    <td>Light Rail Transit Authority</td>
                                    <td></td>
                                    <td>(2) 853-0041 to 60<br>
                                        (2) 647-3479 to 91</td>
                                    <td>PASAY<br>
                                        SANTOLAN</td>
                                </tr>
                                <tr>
                                    <td>Metro Rail Transit (DOTr-MRT3)</td>
                                    <td></td>
                                    <td>(02) 920-6683<br>
                                        (02) 924-0054<br>
                                        (02) 929-5347</td>
                                    <td>NCR<br>
                                        NCR<br>
                                        NCR</td>
                                </tr>
                                <tr>
                                    <td>National Disaster Risk Reduction Management Council</td>
                                    <td></td>
                                    <td>(02) 911-5061<br>
                                        (02) 911-5062<br>
                                        (02) 911-5063<br>
                                        (02) 911-5064<br>
                                        (02) 911-5065<br>
                                        (02) 911-1406<br>
                                        (02) 911-1873<br>
                                        (02) 912-2665<br>
                                        (02) 912-5668</td>
                                    <td>NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR<br>
                                        NCR</td>
                                </tr>
                            </tbody>
                        </table>
                        <script>
                            $(document).ready(function() {
                                $('#emergency_n').DataTable();
                            });
                        </script>
                    </div>
                    <!-- /#page-content-wrapper -->
                </div>
            </div>
        </div>
</body>

</html>