<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (empty(@$_SESSION["email"])) {
        session_destroy();
        echo "<script> window.location.href = 'login.php' </script>";
    }
}
$email = @$_SESSION["email"];
include '../includes/db_ep-inc.php';
include '../includes/functions-inc.php';
include '../includes/plugins.php';
getInfo($conn, $email);
$uname = @$_SESSION['uname'];
$role = @$_SESSION['role'];
$img = @$_SESSION['img'];
$department = @$_SESSION['department'];
$FN = @$_SESSION['FN'];
$LN = @$_SESSION['LN'];
$location = @$_SESSION['location'];

$admin = @$_SESSION['admin'];
$admin_oa = @$_SESSION['admin_oa'];

if ($admin < 1) {
    echo "<script> window.location.href = 'account_settings.php' </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Local CSS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/Employee-Portal/assets/css/dashboard_styles.css">
    <link rel="stylesheet" href="/Employee-Portal/assets/css/account_styles.css">
    <link rel="stylesheet" href="/Employee-Portal/assets/css/menu_styles.css">
</head>
<title>Payreto Employee Portal | Account Settings</title>
<?php
if (isset($_SESSION['status_admin_sett'])) {
?>
    <script>
        Swal.fire({
            icon: "<?php echo $_SESSION['status_code']; ?>",
            title: "<?php echo $_SESSION['status_admin_sett']; ?>",
            text: "<?php echo $_SESSION['status_text']; ?>",
            confirmButtonColor: "#010538"
        })
    </script>
<?php
    unset($_SESSION['status_admin_sett']);
}
?>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include "../includes/sidebar_admin.php"; ?>
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="heading-payreto navbar navbar-expand-lg navbar-light py-3 px-4">
                <div class="d-flex align-items-center header-text">
                    <i class="fas fa-align-left tertiary-text fs-4 me-3" id="menu-toggle"></i>
                    <h4 class="m-0">ACCOUNT SETTINGS</h4>
                </div>
                <?php
                include "../includes/header.php";
                ?>
            </nav>
            <div class="w-100 py-5">
                <h1 class="card-heading my-5 text-uppercase text-center">UPDATE ACCOUNT DETAILS</h1>
                <div class="info-5 col-10 col-sm-12 my-5 d-flex flex-column justify-content-center align-items-center">
                    <h2 class="my-3">UPLOAD/CHANGE AVATAR</h2>
                    <img src="../assets/img/<?php echo $img ?>" alt="" width=300px height=300px object-fit=contain title="<?php echo $img ?>" id="uploaded_image" class="rounded-circle">

                    <?php //error message display
                        include "../account/account_error.php";
                    ?>

                    <form class="d-flex flex-column d-flex justify-content-center align-items-center" action="uaccdetails-inc.php" enctype="multipart/form-data" method="POST">
                        <div class="d-flex align-items-center justify-content-center my-3">
                            <span><i class="fa fa-camera px-3" style="color: #031166"></i></span>
                            <input class="form-control" type="file" name="img" id="img" accept=".jpg, .jpeg, .png">
                        </div>
                        <div class="uploadbtn">
                            <button type="submit" name="changepfpAdmin">Upload</button>
                        </div>
                    </form>
                </div>
                <div class="container-fluid my-5 mx-3 col-12">
                    <h1 class="my-3 settings-header">EMPLOYEE DETAILS</h1>
                    <div class="row d-flex justify-content-center">
                        <div class="info-1 mb-3 col-12 col-sm-6 d-flex flex-column">
                            <div class="mb-3">
                                <label for="fname">FIRST NAME</label>
                                <h2><?php echo $FN ?></h2>
                            </div>
                            <div class="mb-3">
                                <label for="role">ROLE</label>
                                <h2><?php echo $role; ?></h2>
                            </div>
                            <div class="mb-3">
                                <label for="email">EMAIL</label>
                                <h2><?php echo $email; ?></h2>
                            </div>
                        </div>
                        <div class="info-2 mb-3 col-12 col-sm-6 d-flex flex-column">
                            <div class="mb-3">
                                <label for="lname">LAST NAME</label>
                                <h2><?php echo $LN ?></h2>
                            </div>

                            <div class="lastname mb-3">
                                <label for="departnment">DEPARTMENT</label>
                                <h2><?php echo $department; ?></h2>
                            </div>
                            <div class="mb-3">
                                <label for="location">LOCATION</label>
                                <h2><?php echo $location; ?></h2>
                            </div>
                        </div>
                    </div>
                    <h1 class="my-3 settings-header">UPDATE ACCOUNT DETAILS</h1>

                    <form class="acct-form" action="uaccdetails-inc.php" method="POST">
                        <div class="info-5 row d-flex mt-5">
                            <h2 class="my-3 col-10 col-sm-12">CHANGE USERNAME</h2>
                            <div class="info-1 mb-3 col-11 col-sm-6 d-flex flex-column">
                                <div class="info-4 mb-3">
                                    <div class="username">
                                        <label for="uname">USERNAME</label><br>
                                        <input type="text" id="uname" name="uname">
                                    </div>
                                </div>
                            </div>
                            <div class="info-5 row d-flex mt-5 px-3">
                                <h2 class="my-3 col-11 col-sm-12">CHANGE PASSWORD</h2>
                                <div class="info-1 mb-3 col-12 col-sm-6 d-flex flex-column">
                                    <div class="info-4 mb-3">
                                        <div class="old-password">
                                            <label for="old-pass">OLD PASSWORD</label><br>
                                            <input type="password" id="opass" name="opass">
                                        </div>
                                    </div>
                                    <div class="info-4 mb-3">
                                        <div class="password">
                                            <label for="pass">NEW PASSWORD</label><br>
                                            <input type="password" id="PassEntryAd" name="pass">
                                            <span name="StrengthDispAd" id="StrengthDispAd" class="badge displayBadge w-2">Weak</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="info-1 mb-3 col-12 col-sm-6 d-flex flex-column">
                                    <div class="info-4 mb-3">
                                        <div class="password">
                                            <label for="c-pass">CONFIRM PASSWORD</label><br>
                                            <input type="password" id="cpass" name="cpass">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        //error messages for user information changes
                        if (isset($_GET["error"])) {
                            if ($_GET["error"] == "emptyinput") {
                                echo "<p class=\"error-msg\"> Fill in all fields! </p>";
                            } else if ($_GET["error"] == "passmismatch") {
                                echo "<p class=\"error-msg\"> Password does not match!";
                            } else if ($_GET["error"] == "samepass") {
                                echo "<p class=\"error-msg\"> New password must not be the same as old password!";
                            } else if ($_GET["error"] == "wrongpass") {
                                echo "<p class=\"error-msg\"> Old password is not the same as the current password";
                            } else if ($_GET["error"] == "weakpass") {
                                echo "<p class=\"error-msg\"> Password must contain at least one(1) number, uppercase, lowercase, and special character.";
                            } else if ($_GET["error"] == "changeuser") {
                                echo "<p class=\"error-msg\"> Username successfully changed!";
                            } else if ($_GET["error"] == "changepass") {
                                echo "<p class=\"error-msg\"> Password successfully changed!";
                            } else if ($_GET["error"] == "changeall") {
                                echo "<p class=\"error-msg\"> Password and Username successfully changed!";
                            } else if ($_GET["error"] == "statementfailed") {
                                echo "<p class=\"error-msg\"> Connection Failed </p>";
                            } else if ($_GET["error"] == "incorrectpass") {
                                echo "<p class=\"error-msg\"> Confirm password does not match</p>";
                            }
                        }
                        ?>
                        <div class="submitbtn">
                            <input type="submit" name="changepass">
                        </div>
                    </form>

                    <!-- ------------super admin side------------------ -->
                    <div <?php if ($admin_oa != 1) : ?> style="display: none" <?php endif; ?>>
                        <div>
                            <?php
                            include_once '../assets/modal/account_add.php';
                            ?>
                        </div>
                        <div>
                            <?php
                            include_once '../assets/modal/account_delete.php';
                            ?>
                        </div>
                        <div>
                            <?php
                            include_once '../assets/modal/account_edit.php';
                            ?>
                        </div>
                        <div>
                            <?php
                            include_once '../assets/modal/account_restore.php';
                            ?>
                        </div>
                        <h1 class="my-3 settings-header">SUPER ADMIN SETTINGS</h1>
                        <section class="container-fluid px-4 mt-5">
                            <div class="row">
                                <div class="card shadow mb-4">
                                    <div class="card-body table-responsive">
                                        <table id="super-admin" class="table table-striped">
                                            <thead>
                                                <tr class="justify-content-center">
                                                    <th>ID</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>User Type</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="text-break">
                                                    <?php
                                                    $i = 1;
                                                    $employees_db = find_employee_list();
                                                    foreach ($employees_db as $employee) :
                                                    ?>
                                                        <td class="fw-bold"><?php echo $employee['ID'] ?></td>
                                                        <td><?php echo $employee['uname'] ?></td>
                                                        <td><?php echo $employee['email'] ?></td>
                                                        <td style="display: none;"><?php echo $employee['FN'] ?></td>
                                                        <td style="display: none;"><?php echo $employee['LN'] ?></td>
                                                        <td style="display: none;"><?php echo $employee['role'] ?></td>
                                                        <td style="display: none;"><?php echo $employee['location'] ?></td>
                                                        <td style="display: none;"><?php echo $employee['department'] ?></td>
                                                        <td style="display: none;"><?php echo $employee['admin'] ?></td>
                                                        <td>
                                                            <?php
                                                            if ($employee['admin_oa'] == 1) {
                                                                echo "Super Admin";
                                                            } else {

                                                                switch ($employee['admin']){
                                                                    case 0: echo "Employee"; break;
                                                                    case 1: echo "People Attraction Admin"; break;
                                                                    case 2: echo "People Development Admin"; break;
                                                                    case 3: echo "People Acquisition Admin"; break;
                                                                    case 4: echo "People Support Admin"; break;
                                                                    case 5: echo "People Excellence Admin"; break;
                                                                    case 6: echo "IT Helpdesk Admin"; break;
                                                                    case 7: echo "Super Admin"; break;
                                                                    case 8: echo "People Experience Admin"; break;
                                                                }


                                                                /*
                                                                if ($employee['admin'] == 0) {
                                                                    echo "Employee";
                                                                }
                                                                if ($employee['admin'] == 1) {
                                                                    echo "P'Man Admin";
                                                                }
                                                                if ($employee['admin'] == 2) {
                                                                    echo "P'Dev Admin";
                                                                }
                                                                if ($employee['admin'] == 3) {
                                                                    echo "P'Acq Admin";
                                                                }
                                                                if ($employee['admin'] == 4) {
                                                                    echo "P'Sup Admin";
                                                                }
                                                                if ($employee['admin'] == 5) {
                                                                    echo "E'Adm Admin";
                                                                }
                                                                if ($employee['admin'] == 6) {
                                                                    echo "IT Helpdesk Admin";
                                                                }*/
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="d-flex">
                                                            <div class="d-flex justify-content-center">
                                                                <button class="btn btn-success btn-sm rounded mx-1 restoreUserButton" type="button" data-bs-toggle="modal" data-bs-target="#restoreUser" data-toggle="tooltip" data-placement="top" title="Restore"><i class="fas fa-undo"></i></button>
                                                                <button class="btn btn-danger btn-sm rounded mx-1 deleteUserButton" type="button" data-bs-toggle="modal" data-bs-target="#deleteUser" data-toggle="tooltip" data-placement="top" title="Delete" <?php if ($employee["admin_oa"] == 1) {
                                                                                                                                                                                                                                                                    echo "disabled";
                                                                                                                                                                                                                                                                } ?>><i class="fas fa-trash"></i></button>
                                                                <button class="btn btn-warning btn-sm rounded mx-1 editUserButton text-white" type="button" data-bs-toggle="modal" data-bs-target="#editUser" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pencil"></i></button>
                                                            </div>
                                                        </td>
                                                </tr>
                                            <?php $i++;
                                                    endforeach; ?>
                                            </tbody>
                                        </table>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <button class="d-inline-block btn btn-primary w-auto" data-bs-toggle="modal" data-bs-target="#staticBackdrop-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add"><i class="fa-solid fa-plus"></i> Add User</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <!-- Javascript codes -->
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };

        $(document).ready(function() {
            $('#example').DataTable();
        });

        //restoreUserPassword

        $(document).on("click", ".restoreUserButton", function() {
            $('#restoreUser').modal('show');

            $tr = $(this).closest('tr');

            var restoreUser = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(restoreUser);

            $('#email_restore').val(restoreUser[2]);
            $('#frmname1').val(restoreUser[1]);
        });

        //deleteUser

        $(document).on("click", ".deleteUserButton", function() {
            $('#deleteUser').modal('show');

            $tr = $(this).closest('tr');

            var deleteUser = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(deleteUser);

            $('#id_delete').val(deleteUser[0]);
            $('#frmname2').val(deleteUser[1]);
        });

        //editUser

        $(document).on("click", ".editUserButton", function() {
            $('#editUser').modal('show');

            $tr = $(this).closest('tr');

            var editUser = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(editUser);

            var edit_User = document.getElementById("uname2");
            edit_User.value = editUser[1];
            var edit_User = document.getElementById("email2");
            edit_User.value = editUser[2];
            var edit_User = document.getElementById("FN");
            edit_User.value = editUser[3];
            var edit_User = document.getElementById("LN");
            edit_User.value = editUser[4];
            var edit_User = document.getElementById("role");
            edit_User.value = editUser[5];
            var edit_User = document.getElementById("location");
            edit_User.value = editUser[6];
            var edit_User = document.getElementById("department");
            edit_User.value = editUser[7];
            var edit_User = document.getElementById("admin");
            edit_User.value = editUser[8];

            $('#id_edit').val(editUser[0]);
        });
    </script>

    <!-- VIEW PASSWORD -->
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });

        const togglePassword2 = document.querySelector('#togglePassword2');
        const password2 = document.querySelector('#password2');

        togglePassword2.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
            password2.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>

<script type="text/javascript" src="../assets/js/PassCheckerAdmin.js"></script>