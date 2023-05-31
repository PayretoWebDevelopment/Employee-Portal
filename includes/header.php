<div class="text-white">
    <button class="navbar-toggler border-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white" aria-hidden="true"></i>
    </button>
</div>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
            <a class="d-flex flex-row align-items-center profile-settings primary-text text-white mt-2 pt-2 mt-md-2 pt-md-2 pt-sm-0 mt-sm-0" href="/Employee-Portal/account/account_settings_validation.php">
                <div class="profile-img">
                    <img class="m-2 rounded-circle" width="45" height="45" src="/Employee-Portal/assets/img/<?php echo $img ?>" alt="">
                </div>
                <div class="profile-info d-flex flex-column align-items-left m-0 p-0">
                    <p class="profile-name m-0 p-0"><?php echo @$uname ?></p>
                    <p class="profile-pos m-0 p-0"><?php echo @$role ?></p>
                </div>
            </a>
        </li>
    </ul>
</div>
<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function() {
        el.classList.toggle("toggled");
    };
</script>
