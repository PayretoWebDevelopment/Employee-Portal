<?php
$version_num = "1.0.3"
?>

<!-- Sidebar -->
<div class="bg-white sidebar-payreto" id="sidebar-wrapper">
    <div class="sidebar-heading text-center pt-2 pb-4 primary-text fs-4 fw-bold text-uppercase">
        <div class="d-flex text-center w-auto pt-4 primary-text fs-4 fw-bold text-uppercase align-items-center justify-content-center">
            <a class="navbar-brand" href="/Employee-Portal/homepage/homepage.php"><img width="130" height="35" src="/Employee-Portal/assets/img/Payreto_logo.png" alt=""></a>
        </div>
    </div>

    <div class="list-group list-group-flush navlist">
        <ul class="portal">
            <div class="sublist py-2">
                <h1>PEOPLE PROVISIONS</h1>
                <li class="d-flex flex-row align-items-center mb-4"><a href="/Employee-Portal/people_provisions/people_attraction/index.php" class="list-group-item bg-transparent middle"><i class="fas fa-people-arrows-left-right me-2 icon-gray" style="width:15px;"></i>ATTRACTION</a></li>
                <li class="d-flex flex-row align-items-center mb-4"><a href="/Employee-Portal/people_provisions/people_acquisition/index.php" class="list-group-item bg-transparent middle"><i class="fas fa-people-arrows-left-right me-2 icon-gray" style="width:15px;"></i>ACQUISITION</a></li>
            </div>
            <div class="sublist  py-2">
                <h1>PEOPLE OPERATIONS</h1>
                <li class="d-flex flex-row align-items-center mb-4"><a href="/Employee-Portal/people_operations/people_experience/index.php" class="list-group-item bg-transparent middle"><i class="fas fa-user me-2 icon-gray" style="width:15px;"></i>EXPERIENCE</a></li>
                <li class="d-flex flex-row align-items-center mb-4"><a href="/Employee-Portal/people_operations/people_excellence/index.php" class="list-group-item bg-transparent middle"><i class="fas fa-user-gear me-2 icon-gray" style="width:15px;"></i>EXCELLENCE</a></li>
                <li class="d-flex flex-row align-items-center mb-4"><a href="/Employee-Portal/people_operations/people_development/index.php" class="list-group-item bg-transparent middle"><i class="fas fa-people-arrows-left-right me-2 icon-gray" style="width:15px;"></i>DEVELOPMENT</a></li>
            </div>
            <div class="sublist py-2">
                <h1>PEOPLE SERVICES</h1>
                <li class="d-flex flex-row align-items-center mb-4"><a href="/Employee-Portal/people_services/people_support/index.php" class="list-group-item bg-transparent middle"><i class="fas fa-people-line me-2 icon-gray" style="width:15px;"></i>SUPPORT</a></li>
            </div>
            <div class="sublist py-2">
                <h1>OTHERS</h1>
                <!-- <li class="d-flex flex-row align-items-center mb-4"><a href="/Employee-Portal/others/employee_admin/index.php" class="list-group-item bg-transparent middle"><i class="fas fa-users me-2 icon-gray" style="width:15px;"></i>EMPLOYEE ADMIN</a></li> -->
                <li class="d-flex flex-row align-items-center mb-4"><a href="/Employee-Portal/others/it_helpdesk/index.php" class="list-group-item bg-transparent middle"><i class="fas fa-computer me-2 icon-gray" style="width:15px;"></i>IT HELPDESK</a></li>
            </div>
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
            echo "<script> window.location.href='/Employee-Portal/login/login.php' </script>";
            exit();
        }
        ?>
    </form>
    <div class="version-control text-center">
        <a href="/Employee-Portal/version_control/version_content.php" style="text-decoration:none; color:black;">Payreto Employee Portal Version <?php echo $version_num; ?></a>
    </div>
</div>
<script>
    // JavaScript code to handle selection
    const navItems = document.querySelectorAll('.navlist li a');

    // Check if a selected item is stored in local storage
    const selected = localStorage.getItem('selectedItem');

    // Set the initial selection based on the stored value
    if (selected) {
      navItems.forEach(item => {
        if (item.href === selected) {
          item.classList.add('selected');
        }
      });
    }

    // Add click event listener to each menu item
    navItems.forEach(item => {
      item.addEventListener('click', function() {
        // Remove the 'selected' class from all items
        navItems.forEach(item => item.classList.remove('selected'));
        // Add the 'selected' class to the clicked item
        this.classList.add('selected');
        // Store the selected item in local storage
        localStorage.setItem('selectedItem', this.href);
      });
    });
  </script>
<!-- /#sidebar-wrapper -->