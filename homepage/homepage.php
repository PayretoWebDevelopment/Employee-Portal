<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (empty(@$_SESSION["email"])) {
        @session_destroy();
        echo "<script> window.location.href = 'login.php' </script>";
    }
}
$email = @$_SESSION["email"];
include '../includes/db_ep-inc.php';
include '../includes/functions-inc.php';
include '../includes/plugins.php';
include 'homepage_func.php';
getInfo($conn, $email);
$uname = @$_SESSION['uname'];
$role = @$_SESSION['role'];
$img = @$_SESSION['img'];
$department = @$_SESSION['department'];
$FN = @$_SESSION['FN'];
$LN = @$_SESSION['LN'];
$location = @$_SESSION['location'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/Employee-Portal/assets/css/dashboard_styles.css">
    <link rel="stylesheet" href="/Employee-Portal/assets/css/home_styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <title>Payreto Employee Portal | Dashboard</title>
</head>
<?php

$sql = "SELECT * FROM events_activities";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include "../includes/sidebar.php"; ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="heading-payreto navbar navbar-expand-lg navbar-light py-3 px-3">
                <div class="d-flex align-items-center header-text">
                    <i class="fas fa-align-left tertiary-text fs-4 me-3" id="menu-toggle"></i>
                    <h4 class="m-0">HOME</h4>
                </div>
                <?php
                include "../includes/header.php";
                ?>
            </nav>
            <div class="w-100 py-5">
                <div class="d-flex flex-md-row flex-column-reverse mx-4 gap-3">
                    <div class="col-12 col-md-8 col-sm-8">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <h1 class="card-heading my-3">Hello, Juan!</h1>
                            <div class="d-flex flex-rowalign-items-center justify-content-center">
                                <a href="https://www.facebook.com/payretoph" class="mx-2 fs-4"><i class="fa-brands fa-facebook"></i></a>
                                <!-- <a href="https://www.instagram.com/payretoph/" class="mx-2 fs-4"><i class="fa-brands fa-github-square"></i></a> -->
                                <a href="https://www.payreto.com" class="mx-2 fs-4"><i class="fa-solid fa-globe"></i></a>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <h2 class="fs-2 card-heading my-3">Upcoming Events</h2>
                            <a href="../people_operations/people_experience/content/activities_events.php" class="m-0 p-0 see-all">See all ></a>
                        </div>
                        <?php foreach (array_slice($row, 0, 2) as $rows => $value) : ?>
                            <div>
                                <a class="card bg-red rounded-1 my-3 py-4 px-4 text-start text-white d-flex flex-row justify-content-between" href="#EventsModal-<?php echo $value['e_id']; ?>" data-bs-toggle="modal" data-bs-dimiss="modal">
                                    <h4 class="m-0"><?php echo html_entity_decode($value['e_name']); ?></h4>
                                    <h5 class="fs-6 date m-0"><?php echo html_entity_decode($value['e_date']) ?></h5>

                                </a>
                            </div>
                        <?php endforeach; ?>
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <h2 class="fs-2 card-heading my-3">Announcements</h2>
                            <a href="announcement.php" class="m-0 p-0 see-all">See all ></a>
                        </div>
                        <div class="row">
                            <?php
                            @$announce = get_announcement();
                            for ($i = 0; $i < 4; $i++) :
                                if (@$announce[$i]['hp_desc'] == "") {
                                    continue;
                                } else {
                                    $date = date_create($announce[$i]['announce_date']);
                            ?>
                                    <div class="col-12 col-md-6">
                                        <div class="card-3 rounded-1 p-3 h-100 mt-3">
                                            <h3 class="fs-2 card-heading my-2"><?php echo $announce[$i]['hp_title']; ?></h3>
                                            <p class="fs-6">Date Posted: <?php echo date_format($date, "m/d/Y"); ?> </p>
                                            <textarea cols="50" rows="30" class="card-text fs-6 text-justify mb-5 fw-normal my-3" disabled><?php echo $announce[$i]['hp_desc']; ?></textarea>
                                            <!-- <button class="btn btn-blue w-25" data-bs-toggle="modal" data-bs-target="#announce-<?php echo $announce[$i]['hp_id'] ?>">Read More</button> -->
                                        </div>

                                    </div>
                            <?php }
                            endfor; ?>

                        </div>
                        <h2 class="fs-2 card-heading my-5">Welcome to Payreto</h2>
                        <div class="d-flex flex-row align-items-center justify-content-center">
                            <div class="card-2 rounded-1 my-3 py-4 px-4 d-flex flex-row justify-content-center w-100 gap-5">
                                <?php
                                $welcome = get_wc();
                                for ($i = 0; $i < count($welcome); $i++) :
                                ?>
                                    <div class="card">
                                        <img src="<?php echo $welcome[$i]; ?>" class="my-2 w-100 align-items-center justify-content-center" style="object-fit: cover;">
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-sm-4">
                        <div class="wrapper my-4">
                            <header>
                                <p class="current-date m-0"></p>
                                <div class="icons">
                                    <span id="prev" class="material-symbols-rounded">chevron_left</span>
                                    <span id="next" class="material-symbols-rounded">chevron_right</span>
                                </div>
                            </header>
                            <div id="MyClockDisplay" class="clock fs-6 " onload="showTime()"></div>
                            <div class="calendar">
                                <ul class="weeks p-0 mb-0">
                                    <li>Sun</li>
                                    <li>Mon</li>
                                    <li>Tue</li>
                                    <li>Wed</li>
                                    <li>Thu</li>
                                    <li>Fri</li>
                                    <li>Sat</li>
                                </ul>
                                <ul class="days p-0"></ul>
                            </div>
                        </div>
                        <h2 class="fs-2 card-heading my-2">Birthdays</h2>
                        <div class="d-flex flex-row align-items-center justify-content-center">
                            <div class="card-2 bg-teal rounded-1 my-3 py-4 px-4 d-flex flex-column justify-content-center w-100" style="line-height: 20px;">
                                <?php
                                $listofbday = get_bday();
                                //echo count($listofbday);
                                for ($i = 0; $i < count($listofbday); $i++) :

                                ?>
                                    <img src="<?php echo $listofbday[$i]; ?>" class="my-2" style="object-fit: cover;">
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
  
    <!-- /#page-content-wrapper -->
    </div>

    <div>
        <?php //include '../assets/modal/activitiesModal.php'; 
        include 'eventsModal.php';
        include 'anModal.php';
        ?>
    </div>
    </script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };
    </script>
    <!-- CALENDAR SCRIPT -->
    <script>
        const daysTag = document.querySelector(".days"),
            currentDate = document.querySelector(".current-date"),
            prevNextIcon = document.querySelectorAll(".icons span");
        // getting new date, current year and month
        let date = new Date(),
            currYear = date.getFullYear(),
            currMonth = date.getMonth();
        // storing full name of all months in array
        const months = ["January", "February", "March", "April", "May", "June", "July",
            "August", "September", "October", "November", "December"
        ];
        const renderCalendar = () => {
            let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(), // getting first day of month
                lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), // getting last date of month
                lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(), // getting last day of month
                lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); // getting last date of previous month
            let liTag = "";
            for (let i = firstDayofMonth; i > 0; i--) { // creating li of previous month last days
                liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
            }
            for (let i = 1; i <= lastDateofMonth; i++) { // creating li of all days of current month
                // adding active class to li if the current day, month, and year matched
                let isToday = i === date.getDate() && currMonth === new Date().getMonth() &&
                    currYear === new Date().getFullYear() ? "active" : "";
                liTag += `<li class="${isToday}">${i}</li>`;
            }
            for (let i = lastDayofMonth; i < 6; i++) { // creating li of next month first days
                liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`
            }
            currentDate.innerText = `Today is ${months[currMonth]} ${date.getDate()}, ${currYear}`; // passing current mon and yr as currentDate text
            daysTag.innerHTML = liTag;
        }
        renderCalendar();
        prevNextIcon.forEach(icon => { // getting prev and next icons
            icon.addEventListener("click", () => { // adding click event on both icons
                // if clicked icon is previous icon then decrement current month by 1 else increment it by 1
                currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;
                if (currMonth < 0 || currMonth > 11) { // if current month is less than 0 or greater than 11
                    // creating a new date of current year & month and pass it as date value
                    date = new Date(currYear, currMonth);
                    currYear = date.getFullYear(); // updating current year with new date year
                    currMonth = date.getMonth(); // updating current month with new date month
                } else {
                    date = new Date(); // pass the current date as date value
                }
                renderCalendar(); // calling renderCalendar function
            });
        });
    </script>

    <!-- Homepage Clock -->
    <script>
        function showTime() {
            var date = new Date();
            var h = date.getHours(); // 0 - 23
            var m = date.getMinutes(); // 0 - 59
            var s = date.getSeconds(); // 0 - 59
            var session = "AM";

            if (h == 0) {
                h = 12;
            }

            if (h > 12) {
                h = h - 12;
                session = "PM";
            }

            h = (h < 10) ? "0" + h : h;
            m = (m < 10) ? "0" + m : m;
            s = (s < 10) ? "0" + s : s;

            var time = h + ":" + m + ":" + s + " " + session;
            document.getElementById("MyClockDisplay").innerText = time;
            document.getElementById("MyClockDisplay").textContent = time;

            setTimeout(showTime, 1000);

        }

        showTime();
    </script>
</body>

</html>