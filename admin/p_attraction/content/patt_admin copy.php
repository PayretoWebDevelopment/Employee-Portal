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
    if (@$admin != 3 && !empty(@$admin)) {
        session_destroy();
        echo "<script> window.location.href = '/Employee-Portal/login/login.php' </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../../assets/css/dashboard_styles.css">
    <link rel="stylesheet" href="../assets/css/p_acquisition_styles.css">
</head>
<title>Payreto Employee Portal | People Attraction Admin</title>

<?php
//gets all content from their respective DB and adds them to an array for display purposes
$sql = "SELECT * FROM p_acquisition";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);

$i = 0;
$link = array();
foreach ($result as $key => $value) {
    $link[$i] = $value["link"];
    $i++;
}

$concerns = @$link[0];
$e_referral = @$link[1];
$i_referral = @$link[2];
$i_submission = @$link[3];
$recruitment = @$link[4];
$request_id = @$link[5];
$requirement = @$link[6];
$update_id = @$link[7];

?>

<body>
    <div class="d-flex" id="wrapper">
        <?php
        if (isset($_SESSION['status_p_acq'])) {
        ?>
            <script>
                Swal.fire({
                    icon: "<?php echo $_SESSION['status_code']; ?>",
                    title: "<?php echo $_SESSION['status_p_acq']; ?>",
                    text: "<?php echo $_SESSION['status_text']; ?>",
                    confirmButtonColor: "#010538"
                })
            </script>
        <?php
            unset($_SESSION['status_p_acq']);
        }
        ?>
        <?php include "../../../includes/sidebar_admin.php"; ?>
        <div id="page-content-wrapper">
            <nav class="heading-payreto navbar navbar-expand-lg navbar-light py-3 px-3">
                <div class="d-flex align-items-center header-text">
                    <i class="fas fa-align-left tertiary-text fs-4 me-3" id="menu-toggle"></i>
                    <h4 class="m-0">PEOPLE ATTRACTION</h4>
                </div>
                <?php include "../../../includes/header.php"; ?>
            </nav>
            <div class="w-100">
                <div class="w-100 py-5">
                    <div class="container">
                        <h1 class="card-heading my-5 text-uppercase text-center">ADMIN ACCESS</h1>
                        <!-- Employee Recruitment Card -->
                        <h2 class="card-heading my-5 text-center">Employee Recruitment</h2>
                        <div class="card my-3 py-3 px-5">
                            <form class="acct-form" action="patt_edit.php" method="post">
                                <h2 class="card-heading mt-2 mb-3">Employee Referral Form</h2>
                                <div class="g-forms my-3">
                                    <input type="text" id="e_referral" name="e_referral" placeholder="<?php if (!empty($e_referral)) {
                                                                                                            echo $e_referral;
                                                                                                        } else {
                                                                                                            echo 'Link';
                                                                                                        } ?>">
                                </div>
                                <div class="submitbtn">
                                    <input type="hidden" id="frmname" name="frmname" value="Edited Employee Referral Form" />
                                    <input type="submit" value="Update" name="u_e_referral">
                                </div>
                            </form>
                        </div>
                        <!-- List of Open Requisitions Card -->
                        <div class="card my-3 py-3 px-5">
                            <form class="acct-form" action="patt_edit.php" method="post">
                                <h2 class="card-heading mt-2 mb-3">List of Open Requisitions</h2>
                                <!--  -->
                                <div class="info-1">
                                    <?php
                                    $sql = "SELECT * FROM open_requisitions";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                    $array = (array) $row;

                                    $j = 1;
                                    foreach ($row as $key => $value) : ?>
                                        <div class="g-forms my-3">
                                            <div class="col-12">
                                                <input type="hidden" name="<?php echo "r_id" . $j ?>" value="<?php echo $value["r_id"]; ?>">
                                                <input class="my-1" type="text" id="<?php echo 'r_pos' . $j ?>" name="<?php echo 'r_pos' . $j ?>" value="<?php echo html_entity_decode($value["r_pos"]); ?>" placeholder="Position">
                                                <a type="button" href="<?php echo "../../deleteContent/delete.php?r_id=" . $value['r_id'] . "&delname=Deleted Position: " . $value["r_pos"]; ?>" class="btn btn-danger mx-1 rounded-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="fa-solid fa-trash"></i></a>
                                            </div>
                                            <input class="my-1" type="number" id="<?php echo 'r_num' . $j ?>" name="<?php echo 'r_num' . $j ?>" value="<?php echo $value["r_num"] ?>" placeholder="Number" maxlength="2">
                                        </div>
                                    <?php $j++;
                                    endforeach ?>
                                </div>
                                <div>
                                    <input type='hidden' id="r_field1" name="r_field1"></input>
                                    <input type='hidden' id="r_field2" name="r_field2"></input>
                                </div>
                                <div id="contain4">
                                    <input type="hidden" id="r_field" name="r_field" value="2">
                                    <a style='cursor:pointer' id="addrowR" onclick="addFieldsR()"><i class="fa-solid fa-plus text-dark fs-5"></i> </a>
                                </div>
                                <div class="submitbtn">
                                    <input type="hidden" id="frmname" name="frmname" value="Edited List of Open Requisitions">
                                    <input type="submit" value="Update" id="click-update" name="u_requisitions">
                                </div>
                            </form>
                        </div>
                        <!-- Internal Recruitment Application Form Card -->
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Internal Recruitment Application Form</h2>
                            <form class="acct-form" action="patt_edit.php" method="post">
                                <div class="g-forms my-3">
                                    <input type="text" id="recruitment" name="recruitment" placeholder="<?php if (!empty($recruitment)) {
                                                                                                            echo $recruitment;
                                                                                                        } else {
                                                                                                            echo 'Link';
                                                                                                        } ?>">
                                </div>

                                <div class="submitbtn">
                                    <input type="hidden" id="frmname" name="frmname" value="Edited Internal Recruitment Form" />
                                    <input type="submit" value="Update" name="u_recruitment">
                                </div>
                            </form>
                        </div>
                        <!-- Intern and Trainee Recruitment Card -->
                        <h2 class="card-heading my-5 text-center">Intern and Trainee Recruitment</h2>
                        <div class="card my-3 py-3 px-5">
                            <form class="acct-form" action="patt_edit.php" method="post">
                                <h2 class="card-heading mt-2 mb-3">List of Intern Positions</h2>
                                <!--  -->
                                <div class="info-1">
                                    <?php
                                    $sql = "SELECT * FROM intern_positions";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                    $array = (array) $row;

                                    $j = 1;
                                    foreach ($row as $key => $value) : ?>
                                        <div class="g-forms my-3">
                                            <div class="col-12">
                                                <input type="hidden" name="<?php echo "i_id" . $j ?>" value="<?php echo $value["i_id"]; ?>">
                                                <input class="my-1" type="text" id="<?php echo 'i_pos' . $j ?>" name="<?php echo 'i_pos' . $j ?>" value="<?php echo html_entity_decode($value["i_pos"]); ?>" placeholder="Position">
                                                <a type="button" id="click-delete" href="<?php echo "../../deleteContent/delete.php?i_id=" . $value['i_id'] . "&delname=Deleted Position: " . $value["i_pos"]; ?>" class="btn btn-danger mx-1 rounded-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="fa-solid fa-trash"></i></a>
                                            </div>
                                            <input class="my-1" type="number" id="<?php echo 'i_num' . $j ?>" name="<?php echo 'i_num' . $j ?>" value="<?php echo $value["i_num"] ?>" placeholder="Number" maxlength="2">
                                        </div>
                                    <?php $j++;
                                    endforeach ?>
                                </div>
                                <div>
                                    <input type='hidden' id="i_field1" name="i_field1"></input>
                                    <input type='hidden' id="i_field2" name="i_field2"></input>
                                </div>
                                <div id="contain5">
                                    <input type="hidden" id="i_field" name="i_field" value="2">
                                    <a style='cursor:pointer' id="addrowI" onclick="addFieldsI()"><i class="fa-solid fa-plus text-dark fs-5"></i> </a>
                                </div>
                                <div class="submitbtn">
                                    <input type="hidden" id="frmname" name="frmname" value="Edited List of Intern Positions">
                                    <input type="submit" value="Update" id="click-update" name="u_positions">
                                </div>
                            </form>
                        </div>
                        <!-- Intern Referral Form Card -->
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Intern Referral Form</h1>
                                <form class="acct-form" action="patt_edit.php" method="post">
                                    <div class="g-forms my-3">
                                        <input type="text" id="i_referral" name="i_referral" placeholder="<?php if (!empty($i_referral)) {
                                                                                                                echo $i_referral;
                                                                                                            } else {
                                                                                                                echo 'Link';
                                                                                                            } ?>">
                                    </div>

                                    <div class="submitbtn">
                                        <input type="hidden" id="frmname" name="frmname" value="Edited Intern Referral Form" />
                                        <input type="submit" value="Update" name="u_referral">
                                    </div>
                                </form>
                        </div>
                        <h2 class="card-heading my-5 text-center">Employee Onboarding</h2>
                        <!-- Pre-Employment Requirement List Card -->
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Pre-Employment Requirement List</h2>
                            <form class="acct-form" action="patt_edit.php" method="post">
                                <div class="info-1">
                                    <div class="g-forms my-3">
                                        <label class="mb-3" for="requirement">Submission of Pending Pre-Employment Requirements</label><br>
                                        <input type="text" id="requirement" name="requirement" placeholder="<?php if (!empty($requirement)) {
                                                                                                                echo $requirement;
                                                                                                            } else {
                                                                                                                echo 'Link';
                                                                                                            } ?>">
                                    </div>
                                    <div class="g-forms my-3">
                                        <label class="mb-3" for="concerns">Concerns</label><br>
                                        <input type="text" id="concerns" name="concerns" placeholder="<?php if (!empty($concerns)) {
                                                                                                            echo $concerns;
                                                                                                        } else {
                                                                                                            echo 'Link';
                                                                                                        } ?>">
                                    </div>
                                </div>

                                <div class="submitbtn">
                                    <input type="hidden" id="frmname" name="frmname" value="Edited Pre-Employment Requirement" />
                                    <input type="submit" value="Update" name="u_preemp">
                                </div>
                            </form>
                        </div>
                        <!-- Payreto ID Card -->
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Payreto ID</h2>
                            <form class="acct-form" action="patt_edit.php" method="post">
                                <div class="info-1">
                                    <div class="g-forms my-3">
                                        <label class="mb-3" for="i_submission">Initial Submission</label><br>
                                        <input type="text" id="i_submission" name="i_submission" placeholder="<?php if (!empty($i_submission)) {
                                                                                                                    echo $i_submission;
                                                                                                                } else {
                                                                                                                    echo 'Link';
                                                                                                                } ?>">
                                    </div>
                                    <div class="g-forms my-3">
                                        <label class="mb-3" for="update_id">Update of ID Replacement</label><br>
                                        <input type="text" id="update_id" name="update_id" placeholder="<?php if (!empty($update_id)) {
                                                                                                            echo $update_id;
                                                                                                        } else {
                                                                                                            echo 'Link';
                                                                                                        } ?>">
                                    </div>
                                    <div class="g-forms my-3">
                                        <label class="mb-3" for="request_id">Request for ID Replacement</label><br>
                                        <input type="text" id="request_id" name="request_id" placeholder="<?php if (!empty($request_id)) {
                                                                                                                echo $request_id;
                                                                                                            } else {
                                                                                                                echo 'Link';
                                                                                                            } ?>">
                                    </div>
                                </div>

                                <div class="submitbtn">
                                    <input type="hidden" id="frmname" name="frmname" value="Edited Payreto ID" />
                                    <input type="submit" value="Update" name="u_id">
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