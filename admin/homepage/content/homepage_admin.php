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
    include 'homepage_edit.php';
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
    <link rel="stylesheet" href="../assets/css/hp_styles.css">
</head>
<title>Payreto Employee Portal | Homepage</title>

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
                    <h4 class="m-0">HOMEPAGE</h4>
                </div>
                <?php include "../../../includes/header.php"; ?>
            </nav>
            <div class="w-100">
                <div class="w-100 py-5">
                    <div class="container">
                        <h1 class="card-heading my-5 text-uppercase text-center">ADMIN ACCESS</h1>
                        <!-- Upcoming Event -->
                        <h2 class="card-heading my-5 text-center">Homepage</h2>
                        <div class="card my-3 py-3 px-5">

                            <h2 class="card-heading mt-2 mb-3">Upcoming Event</h2>
                            <a href="/Employee-Portal/admin/p_management/content/pman_admin.php/#UpcomingEvent">
                                <button class="btn uploadbtn">Add New Event</button>
                            </a>
                        </div>
                        <!-- Bday Celebrant -->
                        <div class="card my-3 py-3 px-5">

                            <h2 class="card-heading mt-2 mb-3">Upcoming Birthday</h2>
                            <!--  -->
                            <div class="info-1">
                                <?php
                                $sql = "SELECT * FROM bday";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                $array = (array) $row;

                                $j = 1;
                                ?>
                                <form class="acct-form" action="homepage_edit.php" method="post">
                                    <div class="g-forms my-3">
                                        <div class="col-12">
                                            <select class="form-select" name="bday_del" id="" required>
                                                <option value="" selected>-- Select to Delete --</option>
                                                <?php foreach ($row as $bday_list) : ?>
                                                    <option value="<?php echo $bday_list['bday_id']; ?>">
                                                        <?php echo $bday_list['bday_name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <input type="hidden" id="frmname" name="frmname" value="Delete Birthday Celebrant">
                                            <button class="btn btn-danger" type="submit" name="bday_delete">Delete</button>
                                        </div>

                                    </div>
                                </form>
                                <form action="homepage_edit.php" method="POST" enctype="multipart/form-data">
                                    <div class="g-forms">
                                        <!-- <div class="col-12"> -->
                                            <label for="bday_name" class="form-label">Enter Birthday Celebrant Name</label>
                                            <input type="text" name="bday_name" class="form-control" placeholder="Enter Name" required>
                                            <div class="my-4">
                                                <label for="bday_date" class="form-label">Enter Birthdate</label>
                                                <input type="date" name="bday_date" class="form-control" id="" required>
                                            </div>
                                            <div class="my-4">
                                                <label for="bday_pic" class="form-label">Upload Image</label>
                                                <input type="file" name="bday_pic" accept=".jpg, .jpeg, .png, .pdf" class="form-control" required>
                                            </div>
                                            <div class="my-4">
                                                <input type="hidden" id="frmname" name="frmname" value="Add Birthday Celebrant">
                                                <button class="btn uploadbtn" type="submit" name="bday_submit">Add Celebrant</button>
                                            </div>
                                        <!-- </div> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <!-- Welcome Announcement -->
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Add Announcement</h2>
                            <div class="info-1">
                                <form action="homepage_edit.php" method="post">
                                    <div class="g-forms">
                                        <div class="col-12">
                                            <select class="form-select" name="an_del" id="" required>
                                                <option value="" selected>-- Select to Delete --</option>
                                                <?php
                                                $getan = get_an();
                                                foreach ($getan as $row) : ?>
                                                    <option value="<?php echo $row['hp_id']; ?>"><?php echo $row['hp_title']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <input type="hidden" id="frmname" name="frmname" value="Delete Announcement">
                                            <button class="btn btn-danger" name="an_delete" type="submit">Delete</button>
                                            </select>
                                        </div>
                                    </div>
                                </form>

                                <div class="col-12">
                                    <form class="acct-form" action="homepage_edit.php" method="post" enctype="multipart/form-data">
                                        <div class="g-forms my-3">
                                            <div class="my-4">
                                                <label for="an_title" class="form-label">Enter Announcement Title</label>
                                                <input type="text" name="an_title" placeholder="Enter Title" class="form-control" required>
                                            </div>
                                            <div class="my-4">
                                                <label for="an_desc" class="form-label">Enter Announcement Details</label>
                                                <textarea name="an_desc" id="" cols="30" rows="10" class="form-control" placeholder="Enter Details" required></textarea>
                                            </div>
                                            <div class="my-4">
                                                <label for="an_pic" class="form-label">Upload Image</label>
                                                <input type="file" name="an_pic" class="form-control" accept=".jpg, .jpeg, .png, .pdf">
                                                <input type="hidden" id="frmname" name="frmname" value="Add Announcement">
                                            </div>
                                            <div class="my-4">
                                                <button class="btn uploadbtn" type="submit" name="an_add">Add Announcement</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Intern and Trainee Recruitment Card -->
                        <!-- <h2 class="card-heading my-5 text-center">Add Welcome to Payreto</h2> -->
                    </div>
                    <div class="card my-3 py-3 px-5">
                        <h2 class="card-heading mt-2 mb-3">Add Welcome to Payreto</h2>
                        <div class="info-1">
                            <?php
                            $sql = "SELECT * FROM hp_welcome";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            $array = (array) $row;

                            $j = 1;
                            ?>
                            <div class="g-forms my-3">
                                <div class="col-12">
                                    <form class="acct-form" action="homepage_edit.php" method="post">
                                        <select class="form-select" name="wc_del" id="" required>
                                            <option selected value="">-- Select to Delete --</option>
                                            <?php foreach ($row as $wc) : ?>
                                                <option value="<?php echo $wc['hp_w_id']; ?>">
                                                    <?php echo $wc['hp_wc_title']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <input type="hidden" id="frmname" name="frmname" value="Delete Welcome to Payreto Image">
                                        <button class="btn btn-danger" type="submit" name="wc_delete">Delete</button>
                                    </form>
                                </div>
                                <div class="col-12">
                                    <form class="acct-form" action="homepage_edit.php" method="post" enctype="multipart/form-data">
                                        <div class="my-4">
                                            <label for="wc_payreto_title" class="form-label">Enter Welcome to Payreto Title</label>
                                            <input type="text" name="wc_payreto_title" class="form-control" required>
                                        </div>
                                        <div class="my-4">
                                            <label for="wc_payreto_desc" class="form-label">Upload Image</label>
                                            <input type="file" name="wc_payreto_desc" class="form-control" accept=".jpg, .jpeg, .png, .pdf" required>
                                            <input type="hidden" id="frmname" name="frmname" value="Add Welcome to Payreto">
                                        </div>
                                        <div class="my-4">
                                            <button class="btn uploadbtn" type="submit" name="wc_add">Add Welcome to Payreto</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
</body>

</html>