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
    if (@$admin != 2 && !empty(@$admin)) {
        session_destroy();
        echo "<script> window.location.href = '/Employee-Portal/login/login.php' </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../../assets/css/dashboard_styles.css">
    <link rel="stylesheet" href="../assets/css/p_development_styles.css">
</head>
<title>Payreto Employee Portal | IT Helpdesk</title>

<?php
//gets all content from their respective DB and adds them to an array for display purposes
$sql = "SELECT * FROM p_development";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);

$i = 0;
$link = array();
foreach ($result as $key => $value) {
    $link[$i] = $value["link"];
    $i++;
}

$account = @$link[0];
$ad = @$link[1];
$course = @$link[2];
$external = @$link[3];
$instructional = @$link[4];
$internal = @$link[5];
$multimedia = @$link[6];
$playbook = @$link[7];
?>

<body>
    <div class="d-flex" id="wrapper">
        <?php
        if (isset($_SESSION['status_p_dev'])) {
        ?>
            <script>
                Swal.fire({
                    icon: "<?php echo $_SESSION['status_code']; ?>",
                    title: "<?php echo $_SESSION['status_p_dev']; ?>",
                    text: "<?php echo $_SESSION['status_text']; ?>",
                    confirmButtonColor: "#010538"
                })
            </script>
        <?php
            unset($_SESSION['status_p_dev']);
        }
        ?>
        <?php include "../../../includes/sidebar_admin.php"; ?>
        <div id="page-content-wrapper">
            <nav class="heading-payreto navbar navbar-expand-lg navbar-light py-3 px-3">
                <div class="d-flex align-items-center header-text">
                    <i class="fas fa-align-left tertiary-text fs-4 me-3" id="menu-toggle"></i>
                    <h4 class="m-0">PEOPLE DEVELOPMENT</h4>
                </div>
                <?php include "../../../includes/header.php"; ?>
            </nav>
            <div class="w-100">
                <div class="w-100 py-5">
                    <div class="container">
                        <h1 class="card-heading my-5 text-uppercase text-center">ADMIN ACCESS</h1>
                        <h2 class="card-heading my-5 text-center">Employee Development</h2>
                        <!-- Instructional Design Card -->
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Instructional Design</h1>
                                <form class="acct-form" action="pdev_edit.php" method="post">
                                    <div class="g-forms my-3">
                                        <input type="text" id="instructional" name="instructional" placeholder="<?php if (!empty($instructional)) {
                                                                                                                    echo $instructional;
                                                                                                                } else {
                                                                                                                    echo 'Link';
                                                                                                                } ?>">
                                    </div>
                                    <div class="submitbtn">
                                        <input type="hidden" id="frmname" name="frmname" value="Edited instructional Design" />
                                        <input type="submit" value="Update" name="u_instructional">
                                    </div>
                                </form>
                        </div>
                        <!-- Internal Training Request Card -->
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Internal Training Request</h1>
                                <form class="acct-form" action="pdev_edit.php" method="post">
                                    <div class="g-forms my-3">
                                        <input type="text" id="internal" name="internal" placeholder="<?php if (!empty($internal)) {
                                                                                                            echo $internal;
                                                                                                        } else {
                                                                                                            echo 'Link';
                                                                                                        } ?>">
                                    </div>
                                    <div class="submitbtn">
                                        <input type="hidden" id="frmname" name="frmname" value="Edited Internal Training Request" />
                                        <input type="submit" value="Update" name="u_internal">
                                    </div>
                                </form>
                        </div>
                        <h2 class="card-heading my-5 text-center">LMS Support</h2>
                    
                        <h2 class="card-heading my-5 text-center">Multimedia and Communications Support</h2>
                        <!-- Multimedia Request Card -->
                        <div class="card my-3 py-3 px-5">
                            <h2 class="card-heading mt-2 mb-3">Multimedia Request</h1>
                                <form class="acct-form" action="pdev_edit.php" method="post">
                                    <div class="g-forms my-3">
                                        <input type="text" id="multimedia" name="multimedia" placeholder="<?php if (!empty($multimedia)) {
                                                                                                                echo $multimedia;
                                                                                                            } else {
                                                                                                                echo 'Link';
                                                                                                            } ?>">
                                    </div>
                                    <div class="submitbtn">
                                        <input type="hidden" id="frmname" name="frmname" value="Edited Multimedia and Communications Support" />
                                        <input type="submit" value="Update" name="u_multimedia">
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