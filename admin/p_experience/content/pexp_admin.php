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
    if (@$admin != 4 && !empty(@$admin)) {
        session_destroy();
        echo "<script> window.location.href = '/Employee-Portal/login/login.php' </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <link rel="stylesheet" href="../../assets/css/dashboard_styles.css">
    <link rel="stylesheet" href="../../assets/css/p_management_styles.css"> -->
    <link rel="stylesheet" href="/Employee-Portal/admin/p_experience/assets/css/dashboard_styles.css">
    <link rel="stylesheet" href="/Employee-Portal/admin/p_experience/assets/css/p_management_styles.css">
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
$grab_account1 = @$link[7];
$grab_account2 = @$link[8];
$grab_account3 = @$link[9];
$handbook = @$link[10];
$reimbursement = @$link[11];
$incident = @$link[12];
$nomination = @$link[13];
$performance = @$link[14];
$policy = @$link[15];
$rewards = @$link[16];
$sodexo_account1 = @$link[17];
$sodexo_account2 = @$link[18];
$sodexo_account3 = @$link[19];
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
                    <h4 class="m-0">PEOPLE EXPERIENCE</h4>
                </div>
                <?php include "../../../includes/header.php"; ?>
            </nav>
            <div class="w-100">
                <div class="container">
                    <h1 class="card-heading my-5 text-uppercase text-center">ADMIN ACCESS</h1>
                    <h2 class="card-heading my-5 text-center">Employee Engagement</h2>
                    <!-- Payreto Store Card -->
                    <div class="card py-3 px-5">
                        <h2 class="card-heading mt-2 mb-3">Payreto Store</h1>
                            <form class="acct-form" action="pexp_edit.php" method="post" enctype="multipart/form-data">
                                <div class="info-1">
                                    <div class="g-forms my-3">
                                        <label class="mb-3" for="redemption">Redemption Form</label><br>
                                        <input type="text" id="redemption" name="redemption" placeholder="<?php if (!empty($rewards)) {
                                                                                                                echo $rewards;
                                                                                                            } else {
                                                                                                                echo 'Link';
                                                                                                            } ?>">
                                    </div>
                                    <div class="g-forms my-3">
                                        <label class="mb-3" for="nomination">Employee Nomination Form</label><br>
                                        <input type="text" id="nomination" name="nomination" placeholder="<?php if (!empty($nomination)) {
                                                                                                                echo $nomination;
                                                                                                            } else {
                                                                                                                echo 'Link';
                                                                                                            } ?>">
                                    </div>
                                </div>
                                <div class="submitbtn">
                                    <input type="hidden" id="frmname" name="frmname" value="Edited Payreto Store">
                                    <input type="submit" value="Update" name="u_store">
                                </div>
                            </form>
                    </div>
                    <div class="card my-3 py-3 px-5">
                        <!-- Foodpanda Account Card -->
                        <h2 class="card-heading mt-2 mb-3">Foodpanda Account</h1>
                            <form class="acct-form" action="pexp_edit.php" method="post" enctype="multipart/form-data">
                                <div class="info-1">
                                    <div class="g-forms my-3">
                                        <label class="mb-3" for="acctactivation">Account Activation Guide</label><br>
                                        <input type="hidden" id="identifier" name="identifier" value="foodpanda1">
                                        <input class="form-control" type="file" name="acctactivation" id="acctactivation" accept=".jpg, .jpeg, .png, .pdf">
                                    </div>
                                    <div class="g-forms my-3">
                                        <label class="mb-3" for="concern">Contact Person</label><br>
                                        <input type="text" id="concern" name="contact" placeholder="<?php if (!empty($foodpanda2)) {
                                                                                                        echo $foodpanda2;
                                                                                                    } else {
                                                                                                        echo 'Link';
                                                                                                    } ?>">
                                    </div>
                                    <div class="g-forms my-3">
                                        <label class="mb-3" for="food-purchase">Contact Person Email</label><br>
                                        <input type="text" id="food-purchase" name="contact-email" placeholder="<?php if (!empty($foodpanda3)) {
                                                                                                                    echo $foodpanda3;
                                                                                                                } else {
                                                                                                                    echo 'Link';
                                                                                                                } ?>">

                                    </div>
                                </div>
                                <div class="submitbtn">
                                    <input type="hidden" id="frmname" name="frmname" value="Edited Foodpanda Account">
                                    <input type="submit" value="Update" name="u_panda">
                                </div>
                            </form>
                    </div>
                    <!-- Grab -->
                    <div class="card my-3 py-3 px-5">
                    
                        <h2 class="card-heading mt-2 mb-3">Grab Account</h1>
                            <form class="acct-form" action="pexp_edit.php" method="post" enctype="multipart/form-data">
                                <div class="info-1">
                                    <div class="g-forms my-3">
                                        <label class="mb-3" for="acctactivation">Account Activation Guide</label><br>
                                        <input type="hidden" id="identifier" name="identifier" value="grab_account1">
                                        <input class="form-control" type="file" name="grabactivation" id="grabactivation" accept=".jpg, .jpeg, .png, .pdf">
                                    </div>
                                    <div class="g-forms my-3">
                                        <label class="mb-3" for="concern">Contact Person</label><br>
                                        <input type="text" id="concern" name="grab_contact" placeholder="<?php if (!empty($grab_account2)) {
                                                                                                        echo $grab_account2;
                                                                                                    } else {
                                                                                                        echo 'Link';
                                                                                                    } ?>">
                                    </div>
                                    <div class="g-forms my-3">
                                        <label class="mb-3" for="food-purchase">Contact Person Email</label><br>
                                        <input type="text" id="food-purchase" name="grab_contact-email" placeholder="<?php if (!empty($grab_account3)) {
                                                                                                                    echo $grab_account3;
                                                                                                                } else {
                                                                                                                    echo 'Link';
                                                                                                                } ?>">

                                    </div>
                                </div>
                                <div class="submitbtn">
                                    <input type="hidden" id="frmname" name="frmname" value="Edited Grab Account">
                                    <input type="submit" value="Update" name="u_grab">
                                </div>
                            </form>
                    </div>
                    <!-- Grab End -->
                    <!-- Sodexo -->
                    <div class="card my-3 py-3 px-5">
                    
                        <h2 class="card-heading mt-2 mb-3">Sodexo Account</h1>
                            <form class="acct-form" action="pexp_edit.php" method="post" enctype="multipart/form-data">
                                <div class="info-1">
                                    <div class="g-forms my-3">
                                        <label class="mb-3" for="acctactivation">Account Activation Guide</label><br>
                                        <input type="hidden" id="identifier" name="identifier" value="sodexo_account1">
                                        <input class="form-control" type="file" name="sodexoactivation" id="sodexoactivation" accept=".jpg, .jpeg, .png, .pdf">
                                    </div>
                                    <div class="g-forms my-3">
                                        <label class="mb-3" for="concern">Contact Person</label><br>
                                        <input type="text" id="concern" name="sodexo_contact" placeholder="<?php if (!empty($sodexo_account2)) {
                                                                                                        echo $sodexo_account2;
                                                                                                    } else {
                                                                                                        echo 'Link';
                                                                                                    } ?>">
                                    </div>
                                    <div class="g-forms my-3">
                                        <label class="mb-3" for="food-purchase">Contact Person Email</label><br>
                                        <input type="text" id="food-purchase" name="sodexo_contact-email" placeholder="<?php if (!empty($sodexo_account3)) {
                                                                                                                    echo $sodexo_account3;
                                                                                                                } else {
                                                                                                                    echo 'Link';
                                                                                                                } ?>">

                                    </div>
                                </div>
                                <div class="submitbtn">
                                    <input type="hidden" id="frmname" name="frmname" value="Edited Grab Account">
                                    <input type="submit" value="Update" name="u_sodexo">
                                </div>
                            </form>
                    </div>
                    <!-- Sodexo End -->
                    <div class="card my-3 py-3 px-5" id="UpcomingEvent">
                        <!-- List of Activities and Events Card -->
                        <h2 class="card-heading mt-2 mb-3">List of Activities and Events</h1>
                            <form class="acct-form" action="pexp_edit.php" name="postevent" method="post" enctype="multipart/form-data">
                                <div class="info-1">
                                    <?php
                                    $sql = "SELECT * FROM events_activities";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                    $array = (array) $row;

                                    $i = 1;
                                    foreach ($row as $key => $value) :
                                    ?>
                                        <div class="g-forms my-3">
                                            <div class="col-12">
                                                <input type="hidden" name="<?php echo "e_id" . $i ?>" value="<?php echo $value["e_id"]; ?>">
                                                <input class="my-1" type="text" id="<?php echo "e_name" . $i ?>" name="<?php echo "e_name" . $i ?>" value="<?php echo html_entity_decode($value["e_name"]); ?>" placeholder="Event Name">
                                                <a type="button" href="<?php echo "../../deleteContent/delete.php?e_id=" . $value['e_id'] . "&delname=Deleted Event: " . $value["e_name"]; ?>" class="btn btn-danger mx-1 rounded-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="fa-solid fa-trash"></i></a>
                                            </div>

                                            <input class="my-1" type="text" id="<?php echo "e_team" . $i ?>" name="<?php echo "e_team" . $i ?>" value="<?php echo html_entity_decode($value["e_team"]); ?>" placeholder="Team Name">
                                            <input class="my-1" type="date" id="<?php echo "e_date" . $i ?>" name="<?php echo "e_date" . $i ?>" value="<?php echo $value["e_date"] ?>" placeholder="Event Start">
                                            <textarea class="my-1" name="<?php echo "e_content" . $i ?>" id="<?php echo "e_content" . $i ?>" placeholder="<?php echo "e_content" . $i ?>"><?php echo html_entity_decode($value["e_content"]); ?></textarea>
                                            <label class="mb-2 mt-2" for="e_img">Poster Image Here:</label><br>
                                            <input class="form-control" type="file" title="Poster here" name="<?php echo "e_img" . $i ?>" id="<?php echo "e_img" . $i ?>" accept=".jpg, .jpeg, .png">
                                        </div>
                                    <?php $i++;
                                    endforeach; ?>
                                </div>
                                <div>
                                    <input type='hidden' id="e_field1" name="e_field1"></input>
                                    <input type='hidden' id="e_field2" name="e_field2"></input>
                                    <input type='hidden' id="e_field3" name="e_field3"></input>
                                    <input type='hidden' id="e_field4" name="e_field4"></input>
                                    <input type='hidden' id="e_img5" name="e_img5"></input>
                                </div>
                                <div id="contain2">
                                    <input type="hidden" id="e_field" name="e_field" value="4">
                                    <a style='cursor:pointer' id="addrowE" onclick="addFieldsE()"><i class="fa-solid fa-plus text-dark fs-5"></i> </a>
                                </div>
                                <div class="submitbtn">
                                    <input type="hidden" id="frmname" name="frmname" value="Edited Activities and Events">
                                    <input type="submit" value="Update" name="u_events">
                                </div>
                            </form>
                    </div>
                    <div class="card my-3 py-3 px-5">
                        <!-- Post-Event Surveys Card -->
                        <h2 class="card-heading mt-2 mb-3">Post-Event Surveys</h1>
                            <form class="acct-form" action="pexp_edit.php" method="post" enctype="multipart/form-data">
                                <div class="info-1">
                                    <?php
                                    $sql = "SELECT * FROM post_event";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                    $array = (array) $row;

                                    $j = 1;
                                    foreach ($row as $key => $value) : ?>
                                        <div class="g-forms my-3">
                                            <div class="col-12">
                                                <input type="hidden" name="<?php echo "p_id" . $j ?>" value="<?php echo $value["p_id"]; ?>">
                                                <input class="my-1" type="text" id="<?php echo 'p_name' . $j ?>" name="<?php echo 'p_name' . $j ?>" value="<?php echo html_entity_decode($value["p_name"]); ?>" placeholder="Ezvent Name">
                                                <a type="button" href="<?php echo "../../deleteContent/delete.php?p_id=" . $value['p_id'] . "&delname=Deleted Event: " . $value["p_name"]; ?>" class="btn btn-danger mx-1 rounded-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="fa-solid fa-trash"></i></a>

                                            </div>
                                            <input class="my-1" type="text" id="<?php echo 'p_link' . $j ?>" name="<?php echo 'p_link' . $j ?>" value="<?php echo $value["p_link"] ?>" placeholder="Event Link">
                                        </div>
                                    <?php $j++;
                                    endforeach ?>
                                </div>
                                <div>
                                    <input type='hidden' id="p_field1" name="p_field1"></input>
                                    <input type='hidden' id="p_field2" name="p_field2"></input>
                                </div>
                                <div id="contain1">
                                    <input type="hidden" id="p_field" name="p_field" value="2">
                                    <a style='cursor:pointer' id="addrowP" onclick="addFieldsP()"><i class="fa-solid fa-plus text-dark fs-5"></i> </a>
                                </div>
                                <div class="submitbtn">
                                    <input type="hidden" id="frmname" name="frmname" value="Edited Post-Event Surveys">
                                    <input type="submit" value="Update" name="u_survey">
                                </div>
                            </form>
                    </div>
                    <h2 class="card-heading my-5 text-center">Employee Relations</h2>
                    <!-- Company Policies and Procedures Card -->
                    <div class="card my-3 py-3 px-5">
                        <h2 class="card-heading mt-2 mb-3">Company Policies and Procedures</h1>
                            <form class="acct-form" action="pexp_edit.php" method="post" enctype="multipart/form-data">
                                <div class="g-forms my-3">
                                    <input type="hidden" id="identifier" name="identifier" value="policy">
                                    <input class="form-control" type="file" name="policy" id="policy" accept=".pdf">
                                </div>
                                <div class="uploadbtn">
                                    <input type="hidden" id="frmname" name="frmname" value="Edited Company Policies and Procedures">
                                    <button type="submit" name="u_policy">Upload</button>
                                </div>
                            </form>
                    </div>
                    <!-- Employee Handbook Card -->
                    <div class="card my-3 py-3 px-5">
                        <h2 class="card-heading mt-2 mb-3">Employee Handbook</h1>
                            <form class="acct-form" action="pexp_edit.php" method="post" enctype="multipart/form-data">
                                <div class="g-forms my-3">
                                    <input type="hidden" id="identifier" name="identifier" value="handbook">
                                    <input class="form-control" type="file" name="handbook" id="handbook" accept=".pdf">
                                </div>
                                <div class="uploadbtn">
                                    <input type="hidden" id="frmname" name="frmname" value="Edited Employee Handbook">
                                    <button type="submit" name="u_handbook">Upload</button>
                                </div>
                            </form>
                    </div>
                    <!-- Employee Code of Conduct Card -->
                    <div class="card my-3 py-3 px-5">
                        <h2 class="card-heading mt-2 mb-3">Employee Code of Conduct</h1>
                            <form class="acct-form" action="pexp_edit.php" method="post" enctype="multipart/form-data">
                                <div class="g-forms my-3">
                                    <input type="hidden" id="identifier" name="identifier" value="conduct">
                                    <input class="form-control" type="file" name="conduct" id="conduct" accept=".jpg, .jpeg, .png, .pdf">
                                </div>
                                <div class="uploadbtn">
                                    <input type="hidden" id="frmname" name="frmname" value="Edited Code of Conduct">
                                    <button type="submit" name="u_conduct">Upload</button>
                                </div>
                            </form>
                    </div>
                    <!-- Performance Management Card -->
                    <div class="card my-3 py-3 px-5">
                        <h2 class="card-heading mt-2 mb-3">Performance Management</h1>
                            <form class="acct-form" action="pexp_edit.php" method="post" enctype="multipart/form-data">
                                <div class="g-forms my-3">
                                    <input type="hidden" id="identifier" name="identifier" value="performance">
                                    <input class="form-control" type="file" name="performance" id="performance" accept=".jpg, .jpeg, .png, .pdf">
                                </div>
                                <div class="uploadbtn">
                                    <input type="hidden" id="frmname" name="frmname" value="Edited Performance Management" />
                                    <button type="submit" name="u_performance">Upload</button>
                                </div>
                            </form>
                    </div>
                    <!-- Employee Concerns Card -->
                    <div class="card my-3 py-3 px-5">
                        <h2 class="card-heading mt-2 mb-3">Employee Concerns</h1>
                            <form class="acct-form" action="pexp_edit.php" method="post">
                                <div class="g-forms my-3">
                                    <input type="text" id="concern" name="concern" placeholder="<?php if (!empty($concerns)) {
                                                                                                    echo $concerns;
                                                                                                } else {
                                                                                                    echo 'Link';
                                                                                                } ?>">
                                </div>
                                <div class="submitbtn">
                                    <input type="hidden" id="frmname" name="frmname" value="Edited Employee Concerns" />
                                    <input type="submit" value="Update" name="u_concern">
                                </div>
                            </form>
                    </div>
                    <!-- Incident Report Form Card -->
                    <div class="card my-3 py-3 px-5">
                        <h2 class="card-heading mt-2 mb-3">Incident Report Form</h1>
                            <form class="acct-form" action="pexp_edit.php" method="post" enctype="multipart/form-data">
                                <div class="g-forms my-3">
                                    <input type="hidden" id="identifier" name="identifier" value="incident">
                                    <input class="form-control" type="file" name="incident" id="incident" accept=".jpg, .jpeg, .png">
                                </div>
                                <div class="uploadbtn">
                                    <input type="hidden" id="frmname" name="frmname" value="Edited Incident Report Form" />
                                    <button type="submit" name="u_incident">Upload</button>
                                </div>
                            </form>
                    </div>
                    <!-- Request for Certificate of Employment Cardwsw   -->
                    <div class="card my-3 py-3 px-5">
                        <h2 class="card-heading mt-2 mb-3">Request for Certificate of Employment</h1>
                            <form class="acct-form" action="pexp_edit.php" method="post">
                                <div class="g-forms my-3">
                                    <input type="text" id="certificate" name="certificate" placeholder="<?php if (!empty($certificate)) {
                                                                                                            echo $certificate;
                                                                                                        } else {
                                                                                                            echo 'Link';
                                                                                                        } ?>">
                                </div>
                                <div class="submitbtn">
                                    <input type="hidden" id="frmname" name="frmname" value="Edited Request for Certificate of Employment" />
                                    <input type="submit" value="Update" name="u_certificate">
                                </div>
                            </form>
                    </div>
                    <!-- Incident Report Form Card -->
                    <div class="card my-3 py-3 px-5">
                        <h2 class="card-heading mt-2 mb-3">Payreto Points <?php echo date("m-d-Y",strtotime('12/14/2022')) ?></h1>
                            <form class="acct-form" action="pexp_edit.php" method="post" enctype="multipart/form-data">
                                <div class="g-forms my-3">
                                    <input type="hidden" id="identifier" name="identifier" value="payreto_points">
                                    <input class="form-control" type="file" name="payreto_p" id="payreto_p" accept=".csv">
                                </div>
                                <div class="uploadbtn">
                                    <input type="hidden" id="frmname" name="frmname" value="Updated Payreto Points" />
                                    <button type="submit" name="payreto_points">Upload</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
</body>

</html>