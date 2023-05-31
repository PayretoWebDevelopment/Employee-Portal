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
    include '../../../includes/plugins.php';
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
    <link rel="stylesheet" href="../../../assets/css/dashboard_styles.css">
    <link rel="stylesheet" href="../assets/css/p_support_styles.css">
</head>
<title>Payreto Employee Portal | People Support</title>

<?php
//gets all content from their respective DB and adds them to an array for display purposes
$sql = "SELECT * FROM p_support";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);

$i = 0;
$link = array();
foreach ($result as $key => $value) {
    $link[$i] = $value["link"];
    $i++;
}

$bcp = @$link[0];
$bcp_i = @$link[1];
$bcp_t = @$link[2];
$call = @$link[3];
$committee = @$link[4];
$delivery = @$link[5];
$escape = @$link[6];
$food = @$link[7];
$health = @$link[8];
$incident = @$link[9];
$load = @$link[10];
$medicine = @$link[11];
$nurse = @$link[12];
$osh = @$link[13];
$parking = @$link[14];
$parking2 = @$link[15];
$reimbursement = @$link[16];
$repair = @$link[17];
$room = @$link[18];
$supply = @$link[19];
$transpo = @$link[20];
$workplace = @$link[21];
?>

<body>
    <div class="d-flex" id="wrapper">
        <?php
        if (isset($_SESSION['status_p_supp'])) {
        ?>
            <script>
                Swal.fire({
                    icon: "<?php echo $_SESSION['status_code']; ?>",
                    title: "<?php echo $_SESSION['status_p_supp']; ?>",
                    text: "<?php echo $_SESSION['status_text']; ?>",
                    confirmButtonColor: "#010538"
                })
            </script>
        <?php
            unset($_SESSION['status_p_supp']);
        }
        ?>
        <?php include "../../../includes/sidebar_admin.php"; ?>
        <div id="page-content-wrapper">
            <nav class="heading-payreto navbar navbar-expand-lg navbar-light py-3 px-3">
                <div class="d-flex align-items-center header-text">
                    <i class="fas fa-align-left tertiary-text fs-4 me-3" id="menu-toggle"></i>
                    <h4 class="m-0">PEOPLE SUPPORT</h4>
                </div>
                <?php include "../../../includes/header.php"; ?>
            </nav>
            <div class="w-100">
                <div class="w-100 py-5">
                    <div class="container">
                        <h1 class="card-heading my-5 text-uppercase text-center">ADMIN ACCESS</h1>
                        <h2 class="card-heading my-5 text-center">Employee Support</h2>
                        <div class="card py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Requests</h1>
                                <form class="acct-form" action="psup_edit.php" method="post" enctype="multipart/form-data">
                                    <div class="info-1">
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="supply">Office Supply Request</label><br>
                                            <input class="form-control" type="file" name="supply" id="supply" accept=".pdf">
                                            <input type="hidden" id="identifier" name="identifier" value="supply">
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="food">Food Request</label><br>
                                            <input type="text" id="food" name="food" placeholder="<?php if (!empty($food)) {
                                                                                                        echo $food;
                                                                                                    } else {
                                                                                                        echo 'Link';
                                                                                                    } ?>">
                                        </div>
                                        <!-- <div class="g-forms my-3">
                                            <label class="mb-3" for="parking">Parking Slot Request Form</label><br>
                                            <input type="text" id="parking" name="parking" placeholder="<?php if (!empty($parking)) {
                                                                                                            echo $parking;
                                                                                                        } else {
                                                                                                            echo 'Link';
                                                                                                        } ?>">
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="parking">Parking Slot Request Contact Person Email</label><br>
                                            <input type="text" id="parking2" name="parking2" placeholder="<?php if (!empty($parking2)) {
                                                                                                                echo $parking2;
                                                                                                            } else {
                                                                                                                echo 'Link';
                                                                                                            } ?>">
                                        </div> -->
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="repair">Office Repair Request</label><br>
                                            <input type="text" id="repair" name="repair" placeholder="<?php if (!empty($repair)) {
                                                                                                            echo $repair;
                                                                                                        } else {
                                                                                                            echo 'Link';
                                                                                                        } ?>">
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="delivery">Delivery Request</label><br>
                                            <input type="text" id="delivery" name="delivery" placeholder="<?php if (!empty($delivery)) {
                                                                                                        echo $delivery;
                                                                                                    } else {
                                                                                                        echo 'Link';
                                                                                                    } ?>">
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="transpo">Transportation Request</label><br>
                                            <input type="text" id="transpo" name="transpo" placeholder="<?php if (!empty($transpo)) {
                                                                                                        echo $transpo;
                                                                                                    } else {
                                                                                                        echo 'Link';
                                                                                                    } ?>">
                                        </div>
                                        <div class="g-forms my-3">
                                            <label class="mb-3" for="load">Load Request</label><br>
                                            <input type="text" id="load" name="load" placeholder="<?php if (!empty($load)) {
                                                                                                        echo $load;
                                                                                                    } else {
                                                                                                        echo 'Link';
                                                                                                    } ?>">
                                        </div>
                                    </div>
                                    <div class="submitbtn">
                                        <input type="hidden" id="frmname" name="frmname" value="Edited Requests" />
                                        <input type="submit" value="Update" name="u_requests">
                                    </div>
                                </form>
                        </div>
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Expense Reimbursement Form</h1>
                                <form class="acct-form" action="psup_edit.php" method="post" enctype="multipart/form-data">
                                    <div class="g-forms my-3">
                                        <input type="hidden" id="n_reimbursement" name="n_reimbursement" value="reimbursement">
                                        <input class="form-control" type="file" name="reimbursementF" id="reimbursementF" accept=".jpg, .jpeg, .png">
                                    </div>
                                    <div class="g-forms my-3">
                                        <input type="text" id="reimbursement" name="reimbursement" placeholder="<?php if (!empty($reimbursement)) {
                                                                                                                    echo $reimbursement;
                                                                                                                } else {
                                                                                                                    echo 'Link';
                                                                                                                } ?>">
                                    </div>

                                    <script>
                                        //disable input if the other is filled
                                        $("#reimbursement").on('keyup blur', function() {
                                            if ($.trim($("#reimbursement").val())) {
                                                $('#reimbursementF').attr("disabled", "disabled");
                                            } else {
                                                $('#reimbursementF').removeAttr('disabled');
                                            }
                                        });

                                        $("#reimbursementF").on("change", function() {
                                            if ($.trim($("#reimbursementF").val())) {
                                                $('#reimbursement').attr("disabled", "disabled");
                                            } else {
                                                $('#reimbursement').removeAttr('disabled');
                                            }
                                        });
                                    </script>

                                    <div class="uploadbtn">
                                        <input type="hidden" id="frmname" name="frmname" value="Edited Expense Reimbursement Form" />
                                        <button type="submit" name="u_reimbursement">Upload</button>
                                    </div>
                                </form>
                        </div>
                        <h2 class="card-heading my-5 text-center">Business Continuity Plan</h2>
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">BCP Employee Information</h1>
                                <form class="acct-form" action="psup_edit.php" method="post" enctype="multipart/form-data">
                                    <div class="g-forms my-3">
                                        <input type="text" id="bcp_i" name="bcp_i" placeholder="<?php if (!empty($bcp_i)) {
                                                                                                    echo $bcp_i;
                                                                                                } else {
                                                                                                    echo 'Link';
                                                                                                } ?>">
                                    </div>
                                    <div class="submitbtn">
                                        <input type="hidden" id="frmname" name="frmname" value="Edited Business Continuity Plan" />
                                        <input type="submit" value="Update" name="u_bcp_i">
                                    </div>
                                </form>
                        </div>
                        <h2 class="card-heading my-5 text-center">Occupational Safety and Health</h2>
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Health Declaration</h1>
                                <form class="acct-form" action="psup_edit.php" method="post" enctype="multipart/form-data" enctype="multipart/form-data">
                                    <div class="g-forms my-3">
                                        <input type="hidden" id="identifier" name="identifier" value="health">
                                        <input class="form-control" type="file" name="healthF" id="healthF" accept=".jpg, .jpeg, .png">
                                    </div>
                                    <div class="g-forms my-3">
                                        <input type="text" id="health2" name="health2" placeholder="<?php if (!empty($health)) {
                                                                                                        echo $health;
                                                                                                    } else {
                                                                                                        echo 'Link';
                                                                                                    } ?>">
                                    </div>

                                    <script>
                                        //disable input if the other is filled
                                        $("#health2").on('keyup blur', function() {
                                            if ($.trim($("#health2").val())) {
                                                $('#healthF').attr("disabled", "disabled");
                                            } else {
                                                $('#healthF').removeAttr('disabled');
                                            }
                                        });

                                        $("#healthF").on("change", function() {
                                            if ($.trim($("#healthF").val())) {
                                                $('#health2').attr("disabled", "disabled");
                                            } else {
                                                $('#health2').removeAttr('disabled');
                                            }
                                        });
                                    </script>

                                    <div class="submitbtn">
                                        <input type="hidden" id="frmname" name="frmname" value="Edited Occupational Safety and Health">
                                        <input type="submit" value="Update" name="u_health">
                                    </div>
                                </form>
                        </div>
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">List of OSH Programs and Activities</h1>
                                <form class="acct-form" action="psup_edit.php" method="post" enctype="multipart/form-data">
                                    <div class="info-1">
                                        <?php
                                        $sql = "SELECT * FROM osh_programs";
                                        $result = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                        // var_dump($row);

                                        $i = 1;
                                        foreach ($row as $key => $value) : ?>
                                            <div class="g-forms my-3">
                                                <div class="col-12">
                                                    <input type="hidden" name="<?php echo "o_id" . $i ?>" value="<?php echo $value["o_id"]; ?>">
                                                    <input class="my-1" type="text" id="<?php echo "o_name" . $i ?>" name="<?php echo "o_name" . $i ?>" value="<?php echo html_entity_decode($value["o_name"]); ?>" placeholder="Event Name">
                                                    <a type="button" href="<?php echo "../../deleteContent/delete.php?o_id=" . $value['o_id'] . "&delname=Deleted Event: " . $value["o_name"]; ?>" class="btn btn-danger mx-1 rounded-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="fa-solid fa-trash"></i></a>
                                                </div>

                                                <input class="my-1" type="date" id="<?php echo "o_date" . $i ?>" name="<?php echo "o_date" . $i ?>" value="<?php echo $value["o_date"] ?>" placeholder="Event Start">
                                                <textarea class="my-1" name="<?php echo "o_desc" . $i ?>" id="<?php echo "o_desc" . $i ?>" placeholder="<?php echo "o_desc" . $i ?>"><?php echo html_entity_decode($value["o_desc"]); ?></textarea>
                                                <label class="mb-2 mt-2" for="o_img">Poster Image Here:</label><br>
                                                <input class="form-control" type="file" title="Poster here" name="<?php echo "o_img" . $i ?>" id="<?php echo "o_img" . $i ?>" accept=".jpg, .jpeg, .png">
                                            </div>
                                        <?php $i++;
                                        endforeach ?>
                                    </div>
                                    <div>
                                        <input type='hidden' id="o_field1" name="o_field1"></input>
                                        <input type='hidden' id="o_field2" name="o_field2"></input>
                                        <input type='hidden' id="o_field3" name="o_field3"></input>
                                        <input type='hidden' id="o_field4" name="o_field4"></input>
                                        <input type='hidden' id="o_img5" name="o_img5"></input>
                                    </div>
                                    <div id="contain3">
                                        <input type="hidden" id="o_field" name="o_field" value="4">
                                        <a style='cursor:pointer' id="addrowO" onclick="addFieldsO()"><i class="fa-solid fa-plus text-dark fs-5"></i> </a>
                                    </div>
                                    <div class="submitbtn">
                                        <input type="hidden" id="frmname" name="frmname" value="Edited List of OSH Programs and Activites">
                                        <input type="submit" value="Update" name="u_osh">
                                    </div>
                                </form>
                        </div>
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Incident/Accident Report Form</h1>
                                <form class="acct-form" action="psup_edit.php" method="post" enctype="multipart/form-data">
                                    <div class="g-forms my-3">
                                        <input type="hidden" id="identifier" name="identifier" value="incident">
                                        <input class="form-control" type="file" name="incidentF" id="incidentF" accept=".jpg, .jpeg, .png">
                                    </div>
                                    <div class="g-forms my-3">
                                        <input type="text" id="incident" name="incident" placeholder="<?php if (!empty($incident)) {
                                                                                                            echo $incident;
                                                                                                        } else {
                                                                                                            echo 'Link';
                                                                                                        } ?>">
                                    </div>

                                    <script>
                                        //disable input if the other is filled
                                        $("#incident").on('keyup blur', function() {
                                            if ($.trim($("#incident").val())) {
                                                $('#incidentF').attr("disabled", "disabled");
                                            } else {
                                                $('#incidentF').removeAttr('disabled');
                                            }
                                        });

                                        $("#incidentF").on("change", function() {
                                            if ($.trim($("#incidentF").val())) {
                                                $('#incident').attr("disabled", "disabled");
                                            } else {
                                                $('#incident').removeAttr('disabled');
                                            }
                                        });
                                    </script>

                                    <div class="submitbtn">
                                        <input type="hidden" id="frmname" name="frmname" value="Edited Incident/Accident Report" />
                                        <input type="submit" value="Update" name="u_incident">
                                    </div>
                                </form>
                        </div>
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Workplace Condition Report Form</h1>
                                <form class="acct-form" action="psup_edit.php" method="post" enctype="multipart/form-data">
                                    <div class="g-forms my-3">
                                        <input type="hidden" id="identifier" name="identifier" value="workplace">
                                        <input class="form-control" type="file" name="workplaceF" id="workplaceF" accept=".pdf">
                                    </div>
                                    <div class="g-forms my-3">
                                        <input type="text" id="workplace" name="workplace" placeholder="<?php if (!empty($workplace)) {
                                                                                                            echo $workplace;
                                                                                                        } else {
                                                                                                            echo 'Link';
                                                                                                        } ?>">
                                    </div>

                                    <script>
                                        //disable input if the other is filled
                                        $("#workplace").on('keyup blur', function() {
                                            if ($.trim($("#workplace").val())) {
                                                $('#workplaceF').attr("disabled", "disabled");
                                            } else {
                                                $('#workplaceF').removeAttr('disabled');
                                            }
                                        });

                                        $("#workplaceF").on("change", function() {
                                            if ($.trim($("#workplaceF").val())) {
                                                $('#workplace').attr("disabled", "disabled");
                                            } else {
                                                $('#workplace').removeAttr('disabled');
                                            }
                                        });
                                    </script>


                                    <div class="submitbtn">
                                        <input type="hidden" id="frmname" name="frmname" value="Edited Workplace Condition Report Form" />
                                        <input type="submit" value="Update" name="u_workplace">
                                    </div>
                                </form>
                        </div>
                        <h2 class="card-heading my-5 text-center">Health Services</h2>
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">On-Site Medicine Request</h1>
                                <form class="acct-form" action="psup_edit.php" method="post" enctype="multipart/form-data">
                                    <div class="g-forms my-3">
                                        <input type="hidden" id="identifier" name="identifier" value="medicine">
                                        <input class="form-control" type="file" name="medicineF" id="medicineF" accept=".pdf">
                                    </div>
                                    <div class="g-forms my-3">
                                        <input type="text" id="medicine" name="medicine" placeholder="<?php if (!empty($medicine)) {
                                                                                                            echo $medicine;
                                                                                                        } else {
                                                                                                            echo 'Link';
                                                                                                        } ?>">
                                    </div>

                                    <script>
                                        //disable input if the other is filled
                                        $("#medicine").on('keyup blur', function() {
                                            if ($.trim($("#medicine").val())) {
                                                $('#medicineF').attr("disabled", "disabled");
                                            } else {
                                                $('#medicineF').removeAttr('disabled');
                                            }
                                        });

                                        $("#medicineF").on("change", function() {
                                            if ($.trim($("#medicineF").val())) {
                                                $('#medicine').attr("disabled", "disabled");
                                            } else {
                                                $('#medicine').removeAttr('disabled');
                                            }
                                        });
                                    </script>

                                    <div class="submitbtn">
                                        <input type="hidden" id="frmname" name="frmname" value="Edited On-Site Medicine Request" />
                                        <input type="submit" value="Update" name="u_medicine">
                                    </div>
                                </form>
                        </div>
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Company Nurse Assistance Request</h1>
                                <form class="acct-form" action="psup_edit.php" method="post" enctype="multipart/form-data">
                                    <div class="g-forms my-3">
                                        <input type="hidden" id="identifier" name="identifier" value="nurse">
                                        <input class="form-control" type="file" name="nurseF" id="nurseF" accept=".pdf">
                                    </div>
                                    <div class="g-forms my-3">
                                        <input type="text" id="nurse" name="nurse" placeholder="<?php if (!empty($nurse)) {
                                                                                                    echo $nurse;
                                                                                                } else {
                                                                                                    echo 'Link';
                                                                                                } ?>">
                                    </div>

                                    <script>
                                        //disable input if the other is filled
                                        $("#nurse").on('keyup blur', function() {
                                            if ($.trim($("#nurse").val())) {
                                                $('#nurseF').attr("disabled", "disabled");
                                            } else {
                                                $('#nurseF').removeAttr('disabled');
                                            }
                                        });

                                        $("#nurseF").on("change", function() {
                                            if ($.trim($("#nurseF").val())) {
                                                $('#nurse').attr("disabled", "disabled");
                                            } else {
                                                $('#nurse').removeAttr('disabled');
                                            }
                                        });
                                    </script>

                                    <div class="submitbtn">
                                        <input type="hidden" id="frmname" name="frmname" value="Company Nurse Assistance Request" />
                                        <input type="submit" value="Update" name="u_nurse">
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