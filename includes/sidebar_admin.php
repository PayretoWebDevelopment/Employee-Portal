<?php
$version_num = "1.0.3"
?>

<!-- Sidebar -->
<div class="bg-white sidebar-payreto" id="sidebar-wrapper">
    <div class="sidebar-heading text-center pt-2 pb-4 primary-text fs-4 fw-bold text-uppercase">
        <div class="d-flex text-center w-auto pt-4 primary-text fs-4 fw-bold text-uppercase align-items-center justify-content-center">
            <a class="navbar-brand" href="/Employee-Portal/homepage/homepage.php"><img class="ms-3" width="130" height="35" src="/Employee-Portal/assets/img/Payreto_logo.png" alt=""></a>
        </div>
    </div>
    <div class="list-group list-group-flush navlist">
        <ul class="portal">
            <div class="sublist py-2">
                <h1>PEOPLE PROVISIONS</h1>
                <li class="d-flex flex-row align-items-center mb-4"><a href="/Employee-Portal/people_provisions/people_attraction/index.php" class="list-group-item bg-transparent middle"><i class="fas fa-people-arrows-left-right me-2 icon-gray" style="width:15px;"></i>PEOPLE ATTRACTION</a></li>
                <li class="d-flex flex-row align-items-center mb-4"><a href="/Employee-Portal/people_provisions/people_acquisition/index.php" class="list-group-item bg-transparent middle"><i class="fas fa-people-arrows-left-right me-2 icon-gray" style="width:15px;"></i>PEOPLE ACQUISITION</a></li>
            </div>
            <div class="sublist py-2">
                <h1>PEOPLE OPERATIONS</h1>
                <li class="d-flex flex-row align-items-center mb-4"><a href="/Employee-Portal/people_operations/people_experience/index.php" class="list-group-item bg-transparent middle"><i class="fas fa-user me-2 icon-gray" style="width:15px;"></i>PEOPLE EXPERIENCE</a></li>
                <li class="d-flex flex-row align-items-center mb-4"><a href="/Employee-Portal/people_operations/people_excellence/index.php" class="list-group-item bg-transparent middle"><i class="fas fa-user-gear me-2 icon-gray" style="width:15px;"></i>PEOPLE EXCELLENCE</a></li>
                <li class="d-flex flex-row align-items-center mb-4"><a href="/Employee-Portal/people_operations/people_development/index.php" class="list-group-item bg-transparent middle"><i class="fas fa-people-arrows-left-right me-2 icon-gray" style="width:15px;"></i>PEOPLE DEVELOPMENT</a></li>
            </div>
            <div class="sublist py-2">
                <h1>PEOPLE SERVICES</h1>
                <li class="d-flex flex-row align-items-center mb-4"><a href="/Employee-Portal/people_services/people_support/index.php" class="list-group-item bg-transparent middle"><i class="fas fa-people-line me-2 icon-gray" style="width:15px;"></i>PEOPLE SUPPORT</a></li>
            </div>
            <div class="sublist py-2">
                <h1>OTHERS</h1>
                <!-- <li class="d-flex flex-row align-items-center mb-4"><a href="/Employee-Portal/others/employee_admin/index.php" class="list-group-item bg-transparent middle"><i class="fas fa-users me-2 icon-gray" style="width:15px;"></i>EMPLOYEE ADMIN</a></li> -->
                <li class="d-flex flex-row align-items-center mb-4"><a href="/Employee-Portal/others/it_helpdesk/index.php" class="list-group-item bg-transparent middle"><i class="fas fa-computer me-2 icon-gray" style="width:15px;"></i>IT HELPDESK</a></li>
            </div>
        </ul>
    </div>
    <div class="dropdown px-3 portal-2">
        <a class="btn btn-secondary dropdown-toggle btn-admin" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            ADMIN
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li class="d-flex flex-row align-items-center mb-2 px-3<?php if ($admin_oa != 1) echo " " . "d-none";?>"><a href="/Employee-Portal/admin/audit_logs/audit_view.php" class="list-group-item bg-transparent"><i class="fa-solid fa-right-to-bracket me-2 icon-gray" style="width:15px;"></i>AUDIT LOGS</a></li>
            <li class="d-flex flex-row align-items-center mb-2 px-3<?php if ($admin_oa != 1) echo " " . "d-none"; ?>"><a href="/Employee-Portal/admin/homepage/content/homepage_admin.php" class="list-group-item bg-transparent"><i class="fas fa-computer me-2 icon-gray" style="width:15px;"></i>HOMEPAGE</a></li>

            <li class="d-flex flex-row align-items-center mb-2 px-3<?php if ($admin_oa != 1 && $admin != 1) echo " " . "d-none"; ?>"><a href="/Employee-Portal/admin/p_acquisition/content/pacq_admin.php" class="list-group-item bg-transparent"><i class="fas fa-people-arrows-left-right me-2 icon-gray" style="width:15px;"></i>PEOPLE ACQUISITION</a></li>
            <li class="d-flex flex-row align-items-center mb-2 px-3<?php if ($admin_oa != 1 && $admin != 2) echo " " . "d-none"; ?>"><a href="/Employee-Portal/admin/p_attraction/content/patt_admin.php" class="list-group-item bg-transparent"><i class="fas fa-user me-2 icon-gray" style="width:15px;"></i>PEOPLE ATTRACTION</a></li>

            <li class="d-flex flex-row align-items-center mb-2 px-3<?php if ($admin_oa != 1 && $admin != 3) echo " " . "d-none"; ?>"><a href="/Employee-Portal/admin/p_experience/content/pexp_admin.php" class="list-group-item bg-transparent"><i class="fas fa-user me-2 icon-gray" style="width:15px;"></i>PEOPLE EXPERIENCE</a></li>
            <li class="d-flex flex-row align-items-center mb-2 px-3<?php if ($admin_oa != 1 && $admin != 4) echo " " . "d-none"; ?>"><a href="/Employee-Portal/admin/p_excellence/content/pexcel_admin.php" class="list-group-item bg-transparent"><i class="fas fa-user me-2 icon-gray" style="width:15px;"></i>PEOPLE EXCELLENCE</a></li>
            <li class="d-flex flex-row align-items-center mb-2 px-3<?php if ($admin_oa != 1 && $admin != 5) echo " " . "d-none";?>"><a href="/Employee-Portal/admin/p_development/content/pdev_admin.php" class="list-group-item bg-transparent"><i class="fas fa-user-gear me-2 icon-gray" style="width:15px;"></i>PEOPLE DEVELOPMENT</a></li>
            
            <li class="d-flex flex-row align-items-center mb-2 px-3<?php if ($admin_oa != 1 && $admin != 6) echo " " . "d-none"; ?>"><a href="/Employee-Portal/admin/p_support/content/psup_admin.php" class="list-group-item bg-transparent"><i class="fas fa-people-line me-2 icon-gray" style="width:15px;"></i>PEOPLE SUPPORT</a></li>
            <li class="d-flex flex-row align-items-center mb-2 px-3<?php if ($admin_oa != 1 && $admin != 7) echo " " . "d-none"; ?>"><a href="/Employee-Portal/admin/e_admin/content/eadm_admin.php" class="list-group-item bg-transparent"><i class="fas fa-users me-2 icon-gray" style="width:15px;"></i>EMPLOYEE ADMIN</a></li>
            <li class="d-flex flex-row align-items-center mb-2 px-3<?php if ($admin_oa != 1 && $admin != 8) echo " " . "d-none"; ?>"><a href="/Employee-Portal/admin/it_helpdesk/content/ithelp_admin.php" class="list-group-item bg-transparent"><i class="fas fa-computer me-2 icon-gray" style="width:15px;"></i>IT HELPDESK</a></li>
        </ul>
    </div>
    <form class="log-out" method="POST">
        <input name="submit2" type="submit" id="submit2" value="Log Out">
        <?php
        if (isset($_POST["submit2"])) {
            session_destroy();
            unset($_SESSION["ID"]);
            unset($_SESSION["uname"]);
            unset($_SESSION["FN"]);
            unset($_SESSION["LN"]);
            unset($_SESSION["role"]);
            unset($_SESSION["location"]);
            unset($_SESSION["department"]);
            unset($_SESSION["email"]);
            unset($_SESSION["password"]);
            unset($_SESSION["img"]);
            unset($_COOKIE["emailcookie"]);
            unset($_COOKIE["passwcookie"]);
            // header("location: ../login.php");
            echo "<script> window.location.href='/Employee-Portal/login/login.php' </script>";
            exit();
        }
        ?>
    </form>
    <div class="version-control text-center">
        <a href="/Employee-Portal/version_control/version_content.php" style="text-decoration:none; color:black;">Payreto Employee Portal Version <?php echo $version_num; ?></a>
    </div>
</div>
<!-- /#sidebar-wrapper -->