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
    <link rel="stylesheet" href="/Employee-Portal/admin/p_excellence/assets/css/dashboard_styles.css">
    <link rel="stylesheet" href="/Employee-Portal/admin/p_excellence/assets/css/p_management_styles.css">
</head>
<title>Payreto Employee Portal | People Management</title>

<?php
//gets all content from their respective DB and adds them to an array for display purposes
$sql = "SELECT * FROM p_management";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);

$i = 0;
$link = array();
foreach ($result as $key => $value) {
    $link[$i] = $value["link"];
    $i++;
}

$certificate = @$link[0];
$concerns = @$link[1];
$conduct = @$link[2];
$eventform = @$link[3];
$foodpanda1 = @$link[4];
$foodpanda2 = @$link[5];
$foodpanda3 = @$link[6];
$handbook = @$link[7];
$reimbursement = @$link[8];
$incident = @$link[9];
$nomination = @$link[10];
$performance = @$link[11];
$policy = @$link[12];
$rewards = @$link[13];
?>

<body>
    <div class="d-flex" id="wrapper">
        <?php
        if (isset($_SESSION['status_p_man'])) {
        ?>
        <script>
        Swal.fire({
            icon: "<?php echo $_SESSION['status_code']; ?>",
            title: "<?php echo $_SESSION['status_p_man']; ?>",
            text: "<?php echo $_SESSION['status_text']; ?>",
            confirmButtonColor: "#010538"
        })
        </script>
        <?php
            unset($_SESSION['status_p_man']);
        }
        ?>
        <?php include "../../../includes/sidebar_admin.php"; ?>
        <div id="page-content-wrapper">
            <nav class="heading-payreto navbar navbar-expand-lg navbar-light py-3 px-3">
                <div class="d-flex align-items-center header-text">
                    <i class="fas fa-align-left tertiary-text fs-4 me-3" id="menu-toggle"></i>
                    <h4 class="m-0">PEOPLE EXCELLENCE</h4>
                </div>
                <?php include "../../../includes/header.php"; ?>
            </nav>
            <div class="w-100">
                <div class="w-100 py-5">
                    <div class="container">
                        <h1 class="card-heading my-5 text-uppercase text-center">ADMIN ACCESS</h1>
                        <h2 class="card-heading my-5 text-center">Employee Engagement</h2>
                        <!-- Payreto Store Card -->
                        <div class="card py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Company Policies and Procedures</h1>


                                <form class="acct-form" action="pexcel_edit.php" method="post"
                                    enctype="multipart/form-data">
                                    <select class="my-3 form-select" name="p_excel_section" id="com_pol">
                                        <option value="" selected>-- Choose Section --</option>
                                        <option value="attendance_p">Attendance Policy</option>
                                        <option value="employee_ref">Employee Referral Program Guideline</option>
                                        <option value="leave_p">Leave Policy</option>
                                        <option value="employee_onboard">Employee Onboarding Policy and Guideline
                                        </option>
                                        <option value="parking_p">Parking Policy</option>
                                        <option value="promotion">Promotion and Transfer</option>
                                        <option value="rehire">Rehire Policy</option>
                                        <option value="harrassment_p">Sexual Harrassment Policies and Procedure</option>
                                        <option value="talent_acq">Talent Acquisition Policy and Procedure</option>
                                    </select>
                                    <input class="mb-3 form-control" type="file" name="p_excel_file" placeholder="test"
                                        id="test" accept=".jpg, .jpeg, .png, .pdf">
                                    <input type="text" name="form-control" id="compol" placeholder="File Already exist"
                                        style="display:none;">

                                    <div class="submitbtn">
                                        <input type="hidden" id="frmname" name="frmname"
                                            value="Added Content on Company Policies and Procedures">
                                        <input type="submit" value="Update" name="company_pol">
                                    </div>
                                </form>
                        </div>
                        <div class="card my-3 py-3 px-5">
                            <!-- Foodpanda Account Card -->
                            <h2 class="card-heading mt-2 mb-3">Memoranda</h1>
                                <form action="pexcel_edit.php" method="post" enctype="multipart/form-data">
                                    <select class="my-3 form-select" name="p_excel_memo" id="memo_select">
                                        <option value="" selected>-- Choose Section --</option>
                                        <option value="lockers">Use of Designated Lockers and No Bag Policy</option>
                                        <option value="issuance_guide">Company ID Issuance and Wearing Guidelines
                                        </option>
                                    </select>
                                    <input class="form-control" type="file" name="p_excel_memo_file" id="memo_int"
                                        accept=".jpg, .jpeg, .png, .pdf" style="display:none;">

                                    <div class="submitbtn">
                                        <input type="hidden" id="frmname" name="frmname"
                                            value="Added Content on Memoranda">
                                        <input type="submit" value="Update" name="memoranda">
                                    </div>
                                </form>
                        </div>



                        <!-- Employee Handbook Card -->
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Employee Handbook</h1>
                                <form class="acct-form" action="pexcel_edit.php" method="post"
                                    enctype="multipart/form-data">
                                    <div class="g-forms my-3">
                                        <input type="hidden" id="identifier" name="identifier" value="handbook">
                                        <input class="form-control" type="file" name="handbook" id="handbook"
                                            accept=".pdf">
                                    </div>
                                    <div class="uploadbtn">
                                        <input type="hidden" id="frmname" name="frmname"
                                            value="Edited Employee Handbook">
                                        <button type="submit" name="u_handbook">Upload</button>
                                    </div>
                                </form>
                        </div>

                        <!-- Incident Report Form Card -->
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Incident Report Form</h1>
                                <form class="acct-form" action="pexcel_edit.php" method="post"
                                    enctype="multipart/form-data">
                                    <div class="g-forms my-3">
                                        <input type="hidden" id="identifier" name="identifier" value="incident_form">
                                        <input class="form-control" type="file" name="incident" id="incident"
                                            accept=".jpg, .jpeg, .png, .pdf">
                                    </div>
                                    <div class="uploadbtn">
                                        <input type="hidden" id="frmname" name="frmname"
                                            value="Edited Incident Report Form" />
                                        <button type="submit" name="u_incident">Upload</button>
                                    </div>
                                </form>
                        </div>
                        <!-- Coaching Log Form   -->
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Coaching Log Form</h1>
                                <form class="acct-form" action="pexcel_edit.php" method="post"
                                    enctype="multipart/form-data">
                                    <div class="g-forms my-3">
                                        <input type="hidden" id="identifier" name="identifier" value="coaching_log">
                                        <input class="form-control" type="file" name="coaching" id="coaching"
                                            accept=".jpg, .jpeg, .png, .pdf">
                                    </div>
                                    <div class="submitbtn">
                                        <input type="hidden" id="frmname" name="frmname"
                                            value="Added Coaching Log Form Content" />
                                        <input type="submit" value="Update" name="coaching_log">
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
<script>
$(document).ready(function() {
    $('#com_pol').change(function() {
        var selectedOption = $(this).val();
        // console.log(selectedOption);
        $.ajax({
            url: 'fetch-data.php',
            type: 'POST',
            data: {
                option: selectedOption
            },
            success: function(data) {
                if (data != '') {
                    $('#compol').show();
                    Swal.fire({
                        title: 'File already uploaded. Want to continue?',
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: 'Save',
                        denyButtonText: `Don't save`,
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            Swal.fire('Choose File to upload');
                        } else if (result.isDenied) {
                            location.reload();
                        }
                    })
                } else {
                    $('#compol').hide();
                    console.log('test1');
                }
            }
        });
    });
    $('#memo_select').change(function() {
        var selectedOption = $(this).val();
        // console.log(selectedOption);
        $.ajax({
            url: 'fetch-data.php',
            type: 'POST',
            data: {
                option: selectedOption
            },
            success: function(data) {
                if (data != '') {
                    $('#memo_int').show();
                    Swal.fire({
                        title: 'File already uploaded. Want to continue?',
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: 'Save',
                        denyButtonText: `Don't save`,
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            Swal.fire('Choose File to upload');
                        } else if (result.isDenied) {
                            location.reload();
                        }
                    })
                } else {
                    $('#memo_int').hide();
                    console.log('test1');
                }
            }
        });
    });
});
</script>

</html>