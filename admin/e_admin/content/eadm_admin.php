<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (empty(@$_SESSION["email"])) {
        session_destroy();
        echo "<script> window.location.href = '/Employee-Portal/login/login.php' </script>";
    }
    $email = @$_SESSION["email"];
    include_once '../../../includes/db_ep-inc.php';
    include_once '../../../includes/functions-inc.php';
    include_once '../../../includes/plugins.php';
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
    if (@$admin != 5 && !empty(@$admin)) {
        session_destroy();
        echo "<script> window.location.href = '/Employee-Portal/login/login.php' </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../../assets/css/dashboard_styles.css">
    <link rel="stylesheet" href="../assets/css/e_admin_styles.css">
</head>
<title>Payreto Employee Portal | EMPLOYEE ADMIN</title>

<?php
//gets all content from their respective DB and adds them to an array for display purposes
//leave ------------------------------------------------------------
$sql = "SELECT * FROM ebp_leave";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);

$i = 0;
$link = array();
foreach ($row as $key => $value) {
    $link[$i] = $value["content"];
    $i++;
}

$anniversary = @$link[0];
$battered = @$link[1];
$bereavement = @$link[2];
$client_hol = @$link[3];
$emergency = @$link[4];
$maternity = @$link[5];
$paternity = @$link[6];
$service_in = @$link[7];
$sick = @$link[8];
$solo = @$link[9];
$special_be = @$link[10];
$vacation = @$link[11];
$without_pay = @$link[12];

//hmo ------------------------------------------------------------
$sql = "SELECT * FROM health_maintenance";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);

$i = 0;
$link = array();
foreach ($row as $key => $value) {
    $link2[$i] = $value["content"];
    $i++;
}

$cancellation = @$link2[0];
$concerns = @$link2[1];
$coverage = @$link2[2];
$dclinics = @$link2[3];
$dental = @$link2[4];
$enrollment = @$link2[5];
$hospitals = @$link2[6];
$insurance = @$link2[7];
$mclinics = @$link2[8];
$medicalre = @$link2[9];
$medicinere = @$link2[10];
$optical = @$link2[11];
$physical = @$link2[12];
$principal = @$link2[13];

//e_admin ------------------------------------------------------------
$sql = "SELECT * FROM e_admin";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);

$i = 0;
$link = array();
foreach ($row as $key => $value) {
    $link3[$i] = $value["link"];
    $i++;
}

$adjustment = @$link3[0];
$concerns_ph = @$link3[1];
$concerns_pi = @$link3[2];
$concerns_sss = @$link3[3];
$contribution_ph = @$link3[4];
$contribution_pi = @$link3[5];
$contribution_sss = @$link3[6];
$dispute = @$link3[7];
$e_purchase = @$link3[8];
$health = @$link3[9];
$hmo = @$link3[10];
$holidays = @$link3[11];
$loan_pi = @$link3[12];
$loan_sss = @$link3[13];
$maternity2 = @$link3[14];
$mp2 = @$link3[15];
$ot = @$link3[16];
$retirement = @$link3[17];
$r_records = @$link3[18];
$shift = @$link3[19];
$s_purchase = @$link3[20];
$time = @$link3[21];
$u_records = @$link3[22];
?>

<body>
    <div class="d-flex" id="wrapper">
        <?php
        if (isset($_SESSION['status_e_adm'])) {
        ?>
            <script>
                Swal.fire({
                    icon: "<?php echo $_SESSION['status_code']; ?>",
                    title: "<?php echo $_SESSION['status_e_adm']; ?>",
                    text: "<?php echo $_SESSION['status_text']; ?>",
                    confirmButtonColor: "#010538"
                })
            </script>
        <?php
            unset($_SESSION['status_e_adm']);
        }
        ?>
        <?php include "../../../includes/sidebar_admin.php"; ?>
        <div id="page-content-wrapper">
            <nav class="heading-payreto navbar navbar-expand-lg navbar-light py-3 px-3">
                <div class="d-flex align-items-center header-text">
                    <i class="fas fa-align-left tertiary-text fs-4 me-3" id="menu-toggle"></i>
                    <h4 class="m-0">EMPLOYEE ADMIN</h4>
                </div>
                <?php include "../../../includes/header.php"; ?>
            </nav>
            <div class="w-100">
                <div class="w-100 py-5">
                    <div class="container">
                        <h1 class="card-heading my-5 text-uppercase text-center">ADMIN ACCESS</h1>
                        <h2 class="card-heading my-5 text-center">Timekeeping</h2>
                        <!-- Schedule Concerns Card -->
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Schedule Concerns</h1>
                                <form class="acct-form" action="eadm_edit.php" method="post">
                                    <div class="info-1">
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="ot">OT Concerns</label><br>
                                            <input type="text" id="ot" name="ot" placeholder="<?php if (!empty($ot)) {
                                                                                                    echo html_entity_decode($ot);
                                                                                                } else {
                                                                                                    echo 'Link';
                                                                                                } ?>">
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="shift">Shift Schedule Concerns</label><br>
                                            <input type="text" id="shift" name="shift" placeholder="<?php if (!empty($shift)) {
                                                                                                        echo html_entity_decode($shift);
                                                                                                    } else {
                                                                                                        echo 'Link';
                                                                                                    } ?>">
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="time">Time Log Concerns</label><br>
                                            <input type="text" id="time" name="time" placeholder="<?php if (!empty($time)) {
                                                                                                        echo html_entity_decode($time);
                                                                                                    } else {
                                                                                                        echo 'Link';
                                                                                                    } ?>">
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="holidays">Holidays</label><br>
                                            <input type="text" id="holidays" name="holidays" placeholder="<?php if (!empty($holidays)) {
                                                                                                                echo html_entity_decode($holidays);
                                                                                                            } else {
                                                                                                                echo 'Link';
                                                                                                            } ?>">
                                        </div>
                                    </div>
                                    <div class="submitbtn">
                                        <input type="hidden" id="frmname" name="frmname" value="Editted Schedule Concerns" />
                                        <input type="submit" value="Update" name="u_schedule">
                                    </div>
                                </form>
                        </div>
                        <!-- Statutory Benefits Card -->
                        <h2 class="card-heading my-5 text-center">Statutory Benefits</h2>
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Philhealth</h1>
                                <form class="acct-form" action="eadm_edit.php" method="post">
                                    <div class="info-1">
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="contribution_ph">Contribution</label><br>
                                            <input type="text" id="contribution_ph" name="contribution_ph" placeholder="<?php if (!empty($contribution_ph)) {
                                                                                                                            echo html_entity_decode($contribution_ph);
                                                                                                                        } else {
                                                                                                                            echo 'Link';
                                                                                                                        } ?>">
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="maternity">Maternity Benefits</label><br>
                                            <input type="text" id="maternity" name="maternity" placeholder="<?php if (!empty($maternity2)) {
                                                                                                                echo html_entity_decode($maternity2);
                                                                                                            } else {
                                                                                                                echo 'Link';
                                                                                                            } ?>">
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="health">Health Benefits</label><br>
                                            <input type="text" id="health" name="health" placeholder="<?php if (!empty($health)) {
                                                                                                            echo html_entity_decode($health);
                                                                                                        } else {
                                                                                                            echo 'Link';
                                                                                                        } ?>">
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="concerns_ph">Concerns</label><br>
                                            <input type="text" id="concerns_ph" name="concerns_ph" placeholder="<?php if (!empty($concerns_ph)) {
                                                                                                                    echo html_entity_decode($concerns_ph);
                                                                                                                } else {
                                                                                                                    echo 'Link';
                                                                                                                } ?>">
                                        </div>
                                    </div>
                                    <div class="submitbtn">
                                        <input type="hidden" id="frmname" name="frmname" value="Editted Statutory Benefits - PhilHealth" />
                                        <input type="submit" value="Update" name="u_philhealth">
                                    </div>
                                </form>
                        </div>
                        <!-- SSS Card -->
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">SSS</h1>
                                <form class="acct-form" action="eadm_edit.php" method="post">
                                    <div class="info-1">
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="contribution_sss">Contributions</label><br>
                                            <input type="text" id="contribution_sss" name="contribution_sss" placeholder="<?php if (!empty($contribution_sss)) {
                                                                                                                                echo html_entity_decode($contribution_sss);
                                                                                                                            } else {
                                                                                                                                echo 'Link';
                                                                                                                            } ?>">
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="loan_sss">Loans</label><br>
                                            <input type="text" id="loan_sss" name="loan_sss" placeholder="<?php if (!empty($loan_sss)) {
                                                                                                                echo html_entity_decode($loan_sss);
                                                                                                            } else {
                                                                                                                echo 'Link';
                                                                                                            } ?>">
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="concerns_sss">Concerns</label><br>
                                            <input type="text" id="concerns_sss" name="concerns_sss" placeholder="<?php if (!empty($concerns_sss)) {
                                                                                                                        echo html_entity_decode($concerns_sss);
                                                                                                                    } else {
                                                                                                                        echo 'Link';
                                                                                                                    } ?>">
                                        </div>
                                    </div>
                                    <div class="submitbtn">
                                        <input type="hidden" id="frmname" name="frmname" value="Edited Statutory Benefits - SSS" />
                                        <input type="submit" value="Update" name="u_sss">
                                    </div>
                                </form>
                        </div>
                        <!-- PAG-IBIG Card -->
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">PAG-IBIG</h1>
                                <form class="acct-form" action="eadm_edit.php" method="post">
                                    <div class="info-1">
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="contribution_pi">Contributions</label><br>
                                            <input type="text" id="contribution_pi" name="contribution_pi" placeholder="<?php if (!empty($contribution_pi)) {
                                                                                                                            echo html_entity_decode($contribution_pi);
                                                                                                                        } else {
                                                                                                                            echo 'Link';
                                                                                                                        } ?>">
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="loan_pi">Loans</label><br>
                                            <input type="text" id="loan_pi" name="loan_pi" placeholder="<?php if (!empty($loan_pi)) {
                                                                                                            echo html_entity_decode($loan_pi);
                                                                                                        } else {
                                                                                                            echo 'Link';
                                                                                                        } ?>">
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="mp2">MP2 Savings</label><br>
                                            <input type="text" id="mp2" name="mp2" placeholder="<?php if (!empty($mp2)) {
                                                                                                    echo html_entity_decode($mp2);
                                                                                                } else {
                                                                                                    echo 'Link';
                                                                                                } ?>">
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="concerns_pi">Concerns</label><br>
                                            <input type="text" id="concerns_pi" name="concerns_pi" placeholder="<?php if (!empty($concerns_pi)) {
                                                                                                                    echo html_entity_decode($concerns_pi);
                                                                                                                } else {
                                                                                                                    echo 'Link';
                                                                                                                } ?>">
                                        </div>
                                    </div>
                                    <div class="submitbtn">
                                        <input type="hidden" id="frmname" name="frmname" value="Edited Statutory Benefits - PAG-IBIG" />
                                        <input type="submit" value="Update" name="u_pagibig">
                                    </div>
                                </form>
                        </div>
                        <!-- Leave Card -->
                        <h2 class="card-heading my-5 text-center">Employee Benefits Program</h2>
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Leave</h1>
                                <form class="acct-form" action="eadm_edit.php" method="post">
                                    <div class="info-1">
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="vacation">Vacation Leave</label><br>
                                            <textarea class="my-1" name="vacation" id="editor" placeholder="Content"><?php if (!empty($vacation)) {
                                                                                                                            echo html_entity_decode($vacation);
                                                                                                                        } else {
                                                                                                                            echo 'Content';
                                                                                                                        } ?></textarea>
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="sick">Sick Leave</label><br>
                                            <textarea class="my-1" name="sick" id="sick" value="" placeholder="Content"><?php if (!empty($sick)) {
                                                                                                                            echo html_entity_decode($sick);
                                                                                                                        } else {
                                                                                                                            echo 'Content';
                                                                                                                        } ?></textarea>
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="emergency">Emergency Leave</label><br>
                                            <textarea class="my-1" name="emergency" id="emergency" value="" placeholder="Content"><?php if (!empty($emergency)) {
                                                                                                                                        echo html_entity_decode($emergency);
                                                                                                                                    } else {
                                                                                                                                        echo 'Content';
                                                                                                                                    } ?></textarea>
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="anniversary">Anniversary Leave</label><br>
                                            <textarea class="my-1" name="anniversary" id="anniversary" value="" placeholder="Content"><?php if (!empty($anniversary)) {
                                                                                                                                            echo html_entity_decode($anniversary);
                                                                                                                                        } else {
                                                                                                                                            echo 'Content';
                                                                                                                                        } ?></textarea>
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="maternity">Maternity Leave</label><br>
                                            <textarea class="my-1" name="maternity" id="maternity" value="" placeholder="Content"><?php if (!empty($maternity)) {
                                                                                                                                        echo html_entity_decode($maternity);
                                                                                                                                    } else {
                                                                                                                                        echo 'Content';
                                                                                                                                    } ?></textarea>
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="paternity">Paternity Leave</label><br>
                                            <textarea class="my-1" name="paternity" id="paternity" value="" placeholder="Content"><?php if (!empty($paternity)) {
                                                                                                                                        echo html_entity_decode($paternity);
                                                                                                                                    } else {
                                                                                                                                        echo 'Content';
                                                                                                                                    } ?></textarea>
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="battered">Battered Woman Leave</label><br>
                                            <textarea class="my-1" name="battered" id="battered" value="" placeholder="Content"><?php if (!empty($battered)) {
                                                                                                                                    echo html_entity_decode($battered);
                                                                                                                                } else {
                                                                                                                                    echo 'Content';
                                                                                                                                } ?></textarea>
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="without_pay">Leave Without Pay</label><br>
                                            <textarea class="my-1" name="without_pay" id="without_pay" value="" placeholder="Content"><?php if (!empty($without_pay)) {
                                                                                                                                            echo html_entity_decode($without_pay);
                                                                                                                                        } else {
                                                                                                                                            echo 'Content';
                                                                                                                                        } ?></textarea>
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="solo">Solo Parent Leave</label><br>
                                            <textarea class="my-1" name="solo" id="solo" value="" placeholder="Content"><?php if (!empty($solo)) {
                                                                                                                            echo html_entity_decode($solo);
                                                                                                                        } else {
                                                                                                                            echo 'Content';
                                                                                                                        } ?></textarea>
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="special_benefit">Special Benefit for Women</label><br>
                                            <textarea class="my-1" name="special_benefit" id="special_benefit" value="" placeholder="Content"><?php if (!empty($special_be)) {
                                                                                                                                                    echo html_entity_decode($special_be);
                                                                                                                                                } else {
                                                                                                                                                    echo 'Content';
                                                                                                                                                } ?></textarea>
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="bereavement">Bereavement Leave</label><br>
                                            <textarea class="my-1" name="bereavement" id="bereavement" value="" placeholder="Content"><?php if (!empty($bereavement)) {
                                                                                                                                            echo html_entity_decode($bereavement);
                                                                                                                                        } else {
                                                                                                                                            echo 'Content';
                                                                                                                                        } ?></textarea>
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="client_holiday">Client Holiday Leave</label><br>
                                            <textarea class="my-1" name="client_holiday" id="client_holiday" value="" placeholder="Content"><?php if (!empty($client_hol)) {
                                                                                                                                                echo html_entity_decode($client_hol);
                                                                                                                                            } else {
                                                                                                                                                echo 'Content';
                                                                                                                                            } ?></textarea>
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="service_incentive">Service Incentive Leave</label><br>
                                            <textarea class="my-1" name="service_incentive" id="service_incentive" value="" placeholder="Content"><?php if (!empty($service_in)) {
                                                                                                                                                        echo html_entity_decode($service_in);
                                                                                                                                                    } else {
                                                                                                                                                        echo 'Content';
                                                                                                                                                    } ?></textarea>
                                        </div>
                                    </div>

                                    <div class="submitbtn">
                                        <input type="hidden" id="frmname" name="frmname" value="Edited Leave" />
                                        <input type="submit" value="Update" name="u_leave">
                                    </div>
                                </form>
                        </div>
                        <!-- HMO Card -->
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Health and Maintenance Organizations (HMO)</h1>
                                <form class="acct-form" action="eadm_edit.php" method="post">
                                    <div class="info-1">
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="concerns">HMO Concerns</label><br>
                                            <textarea type="text" id="concerns" name="concerns" placeholder="Content"><?php if (!empty($concerns)) {
                                                                                                                            echo html_entity_decode($concerns);
                                                                                                                        } else {
                                                                                                                            echo 'Content';
                                                                                                                        } ?></textarea>
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="principal">Principal Coverage</label><br>
                                            <textarea type="text" id="principal" name="principal" placeholder="Content"><?php if (!empty($principal)) {
                                                                                                                            echo html_entity_decode($principal);
                                                                                                                        } else {
                                                                                                                            echo 'Content';
                                                                                                                        } ?></textarea>
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="coverage">Dependent Coverage</label><br>
                                            <textarea type="text" id="coverage" name="coverage" placeholder="Content"><?php if (!empty($coverage)) {
                                                                                                                            echo html_entity_decode($coverage);
                                                                                                                        } else {
                                                                                                                            echo 'Content';
                                                                                                                        } ?></textarea>
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="enrollment">Dependent Enrollment</label><br>
                                            <textarea type="text" id="enrollment" name="enrollment" placeholder="Content"><?php if (!empty($enrollment)) {
                                                                                                                                echo html_entity_decode($enrollment);
                                                                                                                            } else {
                                                                                                                                echo 'Content';
                                                                                                                            } ?></textarea>
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="cancellation">Dependent Cancellation</label><br>
                                            <textarea type="text" id="cancellation" name="cancellation" placeholder="Content"><?php if (!empty($cancellation)) {
                                                                                                                                    echo html_entity_decode($cancellation);
                                                                                                                                } else {
                                                                                                                                    echo 'Content';
                                                                                                                                } ?></textarea>
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="hospitals">Accredited Hospitals</label><br>
                                            <textarea type="text" id="hospitals" name="hospitals" placeholder="Content"><?php if (!empty($hospitals)) {
                                                                                                                            echo html_entity_decode($hospitals);
                                                                                                                        } else {
                                                                                                                            echo 'Content';
                                                                                                                        } ?></textarea>
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="mclinics">Accredited Medical Clinics</label><br>
                                            <textarea type="text" id="mclinics" name="mclinics" placeholder="Content"><?php if (!empty($mclinics)) {
                                                                                                                            echo html_entity_decode($mclinics);
                                                                                                                        } else {
                                                                                                                            echo 'Content';
                                                                                                                        } ?></textarea>
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="dclinics">Accredited Dental Clinics</label><br>
                                            <textarea type="text" id="dclinics" name="dclinics" placeholder="Content"><?php if (!empty($dclinics)) {
                                                                                                                            echo html_entity_decode($dclinics);
                                                                                                                        } else {
                                                                                                                            echo 'Content';
                                                                                                                        } ?></textarea>
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="optical">Optical Benefits</label><br>
                                            <textarea type="text" id="optical" name="optical" placeholder="Content"><?php if (!empty($optical)) {
                                                                                                                        echo html_entity_decode($optical);
                                                                                                                    } else {
                                                                                                                        echo 'Content';
                                                                                                                    } ?></textarea>
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="dental">Dental Benefits</label><br>
                                            <textarea type="text" id="dental" name="dental" placeholder="Content"><?php if (!empty($dental)) {
                                                                                                                        echo html_entity_decode($dental);
                                                                                                                    } else {
                                                                                                                        echo 'Content';
                                                                                                                    } ?></textarea>
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="insurance">Life Insurance</label><br>
                                            <textarea type="text" id="insurance" name="insurance" placeholder="Content"><?php if (!empty($insurance)) {
                                                                                                                            echo html_entity_decode($insurance);
                                                                                                                        } else {
                                                                                                                            echo 'Content';
                                                                                                                        } ?></textarea>
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="medicalre">Medical Reimbursement</label><br>
                                            <textarea type="text" id="medicalre" name="medicalre" placeholder="Content"><?php if (!empty($medicalre)) {
                                                                                                                            echo html_entity_decode($medicalre);
                                                                                                                        } else {
                                                                                                                            echo 'Content';
                                                                                                                        } ?></textarea>
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="medicinere">Medicine Reimbursement</label><br>
                                            <textarea type="text" id="medicinere" name="medicinere" placeholder="Content"><?php if (!empty($medicinere)) {
                                                                                                                                echo html_entity_decode($medicinere);
                                                                                                                            } else {
                                                                                                                                echo 'Content';
                                                                                                                            } ?></textarea>
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="physical">Annual Physical Exam</label><br>
                                            <textarea type="text" id="physical" name="physical" placeholder="Content"><?php if (!empty($physical)) {
                                                                                                                            echo html_entity_decode($physical);
                                                                                                                        } else {
                                                                                                                            echo 'Content';
                                                                                                                        } ?></textarea>
                                        </div>

                                        <div class="submitbtn">
                                            <input type="hidden" id="frmname" name="frmname" value="Edited HMO" />
                                            <input type="submit" value="Update" name="u_hmo">
                                        </div>
                                    </div>
                                </form>
                        </div>
                        <!-- Employee Retirement Program Card -->
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Employee Retirement Program</h1>
                                <form class="acct-form" action="eadm_edit.php" method="post" enctype="multipart/form-data">
                                    <div class="g-forms my-3">
                                        <input type="hidden" id="identifier" name="identifier" value="retirement">
                                        <input class="form-control" type="file" name="retirementF" id="retirementF" accept=".jpg, .jpeg, .png, .pdf">
                                    </div>
                                    <div class="g-forms my-3">
                                        <input type="text" id="retirement" name="retirement" placeholder="<?php if (!empty($retirement)) {
                                                                                                                echo html_entity_decode($retirement);
                                                                                                            } else {
                                                                                                                echo 'Link';
                                                                                                            } ?>">
                                    </div>

                                    <script>
                                        //disable input if the other is filled
                                        $("#retirement").on('keyup blur', function() {
                                            if ($.trim($("#retirement").val())) {
                                                $('#retirementF').attr("disabled", "disabled");
                                            } else {
                                                $('#retirementF').removeAttr('disabled');
                                            }
                                        });

                                        $("#retirementF").on("change", function() {
                                            if ($.trim($("#retirementF").val())) {
                                                $('#retirement').attr("disabled", "disabled");
                                            } else {
                                                $('#retirement').removeAttr('disabled');
                                            }
                                        });
                                    </script>

                                    <div class="submitbtn">
                                        <input type="hidden" id="frmname" name="frmname" value="Edited Employee Retirement Program" />
                                        <input type="submit" value="Update" name="u_retirement">
                                    </div>
                                </form>
                        </div>
                        <h2 class="card-heading my-5 text-center">Payroll</h2>
                        <!-- Payroll Card -->
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Payroll Adjustment Form</h1>
                                <form class="acct-form" action="eadm_edit.php" method="post" enctype="multipart/form-data">
                                    <div class="g-forms my-3">
                                        <input type="hidden" id="identifier" name="identifier" value="adjustment">
                                        <input class="form-control" type="file" name="adjustmentF" id="adjustmentF" accept=".jpg, .jpeg, .png, .pdf">
                                    </div>
                                    <div class="g-forms my-3">
                                        <input type="text" id="adjustment" name="adjustment" placeholder="<?php if (!empty($adjustment)) {
                                                                                                                echo html_entity_decode($adjustment);
                                                                                                            } else {
                                                                                                                echo 'Link';
                                                                                                            } ?>">
                                    </div>

                                    <script>
                                        //disable input if the other is filled
                                        $("#adjustment").on('keyup blur', function() {
                                            if ($.trim($("#adjustment").val())) {
                                                $('#adjustmentF').attr("disabled", "disabled");
                                            } else {
                                                $('#adjustmentF').removeAttr('disabled');
                                            }
                                        });

                                        $("#adjustmentF").on("change", function() {
                                            if ($.trim($("#adjustmentF").val())) {
                                                $('#adjustment').attr("disabled", "disabled");
                                            } else {
                                                $('#adjustment').removeAttr('disabled');
                                            }
                                        });
                                    </script>

                                    <div class="submitbtn">
                                        <input type="hidden" id="frmname" name="frmname" value="Edited Payroll Adjustment Form" />
                                        <input type="submit" value="Update" name="u_adjustment">
                                    </div>
                                </form>
                        </div>
                        <!-- Payroll Dispute Inquiry Card -->
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Payroll Dispute Inquiry</h1>
                                <form class="acct-form" action="eadm_edit.php" method="post" enctype="multipart/form-data">
                                    <div class="g-forms my-3">
                                        <input type="hidden" id="identifier" name="identifier" value="dispute">
                                        <input class="form-control" type="file" name="disputeF" id="disputeF" accept=".jpg, .jpeg, .png, .pdf">
                                    </div>
                                    <div class="g-forms my-3">
                                        <input type="text" id="dispute" name="dispute" placeholder="<?php if (!empty($dispute)) {
                                                                                                        echo html_entity_decode($dispute);
                                                                                                    } else {
                                                                                                        echo 'Link';
                                                                                                    } ?>">
                                    </div>

                                    <script>
                                        //disable input if the other is filled
                                        $("#dispute").on('keyup blur', function() {
                                            if ($.trim($("#dispute").val())) {
                                                $('#disputeF').attr("disabled", "disabled");
                                            } else {
                                                $('#disputeF').removeAttr('disabled');
                                            }
                                        });

                                        $("#disputeF").on("change", function() {
                                            if ($.trim($("#disputeF").val())) {
                                                $('#dispute').attr("disabled", "disabled");
                                            } else {
                                                $('#dispute').removeAttr('disabled');
                                            }
                                        });
                                    </script>

                                    <div class="submitbtn">
                                        <input type="hidden" id="frmname" name="frmname" value="Edited Payroll Dispute Inquiry" />
                                        <input type="submit" value="Update" name="u_dispute">
                                    </div>
                                </form>
                        </div>
                        <h2 class="card-heading my-5 text-center">Employee Information System</h2>
                        <!-- Update of Employee Records Card -->
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Update of Employee Records</h1>
                                <form class="acct-form" action="eadm_edit.php" method="post" enctype="multipart/form-data">
                                    <div class="g-forms my-3">
                                        <input type="hidden" id="identifier" name="identifier" value="u_records">
                                        <input class="form-control" type="file" name="u_recordsF" id="u_recordsF" accept=".jpg, .jpeg, .png, .pdf">
                                    </div>
                                    <div class="g-forms my-3">
                                        <input type="text" id="u_records" name="u_records" placeholder="<?php if (!empty($u_records)) {
                                                                                                            echo html_entity_decode($u_records);
                                                                                                        } else {
                                                                                                            echo 'Link';
                                                                                                        } ?>">
                                    </div>

                                    <script>
                                        //disable input if the other is filled
                                        $("#u_records").on('keyup blur', function() {
                                            if ($.trim($("#u_records").val())) {
                                                $('#u_recordsF').attr("disabled", "disabled");
                                            } else {
                                                $('#u_recordsF').removeAttr('disabled');
                                            }
                                        });

                                        $("#u_recordsF").on("change", function() {
                                            if ($.trim($("#u_recordsF").val())) {
                                                $('#u_records').attr("disabled", "disabled");
                                            } else {
                                                $('#u_records').removeAttr('disabled');
                                            }
                                        });
                                    </script>

                                    <div class="submitbtn">
                                        <input type="hidden" id="frmname" name="frmname" value="Edited Update of Employee Records" />
                                        <input type="submit" value="Update" name="u_u_records">
                                    </div>
                                </form>
                        </div>
                        <!-- Request of Employee Records Card -->
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Request of Employee Records</h1>
                                <form class="acct-form" action="eadm_edit.php" method="post" enctype="multipart/form-data">
                                    <div class="g-forms my-3">
                                        <input type="hidden" id="identifier" name="identifier" value="r_records">
                                        <input class="form-control" type="file" name="r_recordsF" id="r_recordsF" accept=".jpg, .jpeg, .png, .pdf">
                                    </div>
                                    <div class="g-forms my-3">
                                        <input type="text" id="r_records" name="r_records" placeholder="<?php if (!empty($r_records)) {
                                                                                                            echo $r_records;
                                                                                                        } else {
                                                                                                            echo 'Link';
                                                                                                        } ?>">
                                    </div>

                                    <script>
                                        //disable input if the other is filled
                                        $("#r_records").on('keyup blur', function() {
                                            if ($.trim($("#r_records").val())) {
                                                $('#r_recordsF').attr("disabled", "disabled");
                                            } else {
                                                $('#r_recordsF').removeAttr('disabled');
                                            }
                                        });

                                        $("#r_recordsF").on("change", function() {
                                            if ($.trim($("#r_recordsF").val())) {
                                                $('#r_records').attr("disabled", "disabled");
                                            } else {
                                                $('#r_records').removeAttr('disabled');
                                            }
                                        });
                                    </script>

                                    <div class="submitbtn">
                                        <input type="hidden" id="frmname" name="frmname" value="Edited Request of Employee Records" />
                                        <input type="submit" value="Update" name="u_r_records">
                                    </div>
                                </form>
                        </div>
                        <h2 class="card-heading my-5 text-center">Procurement</h2>
                        <!-- Request for Supply Purchase Card -->
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Request for Supply Purchase</h1>
                                <form class="acct-form" action="eadm_edit.php" method="post" enctype="multipart/form-data">
                                    <div class="g-forms my-3">
                                        <input type="hidden" id="identifier" name="identifier" value="s_purchase">
                                        <input class="form-control" type="file" name="s_purchaseF" id="s_purchaseF" accept=".jpg, .jpeg, .png, .pdf">
                                    </div>
                                    <div class="g-forms my-3">
                                        <input type="text" id="s_purchase" name="s_purchase" placeholder="<?php if (!empty($s_purchase)) {
                                                                                                                echo html_entity_decode($s_purchase);
                                                                                                            } else {
                                                                                                                echo 'Link';
                                                                                                            } ?>">
                                    </div>

                                    <script>
                                        //disable input if the other is filled
                                        $("#s_purchase").on('keyup blur', function() {
                                            if ($.trim($("#s_purchase").val())) {
                                                $('#s_purchaseF').attr("disabled", "disabled");
                                            } else {
                                                $('#s_purchaseF').removeAttr('disabled');
                                            }
                                        });

                                        $("#s_purchaseF").on("change", function() {
                                            if ($.trim($("#s_purchaseF").val())) {
                                                $('#s_purchase').attr("disabled", "disabled");
                                            } else {
                                                $('#s_purchase').removeAttr('disabled');
                                            }
                                        });
                                    </script>

                                    <div class="submitbtn">
                                        <input type="hidden" id="frmname" name="frmname" value="Edited Request for Supply Purchase" />
                                        <input type="submit" value="Update" name="u_s_purchase">
                                    </div>
                                </form>
                        </div>
                        <!-- Request for Office Equipment Purchase Card -->
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Request for Office Equipment Purchase</h1>
                                <form class="acct-form" action="eadm_edit.php" method="post" enctype="multipart/form-data">
                                    <div class="g-forms my-3">
                                        <input type="hidden" id="identifier" name="identifier" value="e_purchase">
                                        <input class="form-control" type="file" name="e_purchaseF" id="e_purchaseF" accept=".jpg, .jpeg, .png, .pdf">
                                    </div>
                                    <div class="g-forms my-3">
                                        <input type="text" id="e_purchase" name="e_purchase" placeholder="<?php if (!empty($e_purchase)) {
                                                                                                                echo html_entity_decode($e_purchase);
                                                                                                            } else {
                                                                                                                echo 'Link';
                                                                                                            } ?>">
                                    </div>

                                    <script>
                                        //disable input if the other is filled
                                        $("#e_purchase").on('keyup blur', function() {
                                            if ($.trim($("#e_purchase").val())) {
                                                $('#e_purchaseF').attr("disabled", "disabled");
                                            } else {
                                                $('#e_purchaseF').removeAttr('disabled');
                                            }
                                        });

                                        $("#e_purchaseF").on("change", function() {
                                            if ($.trim($("#e_purchaseF").val())) {
                                                $('#e_purchase').attr("disabled", "disabled");
                                            } else {
                                                $('#e_purchase').removeAttr('disabled');
                                            }
                                        });
                                    </script>

                                    <div class="submitbtn">
                                        <input type="hidden" id="frmname" name="frmname" value="Edited Request for Office Equipment Purchase" />
                                        <input type="submit" value="Update" name="u_e_purchase">
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
</body>

</html>