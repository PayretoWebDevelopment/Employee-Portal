<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (empty(@$_SESSION["email"])) {
        echo "<script> window.location.href = '../../login.php' </script>";
    }
}
$email = $_SESSION["email"];
include '../../../includes/db_ep-inc.php';
include '../../../includes/functions-inc.php';
getInfo($conn, $email);
$uname = $_SESSION['uname'];
$role = $_SESSION['role'];
$img = $_SESSION['img'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="../Employee-Portal/assets/img/payreto-logo-sm.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/dashboard_styles.css">
    <title>Payreto Employee Portal | IT Helpdesk</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <?php
        include "../../../includes/sidebar.php";
        ?>
        <div id="page-content-wrapper">
            <?php
            include "../../../includes/header.php";
            ?>
            <div class="w-100">
                <?php
                $sql = "SELECT link, id FROM it_helpdesk WHERE id = 'es_req'";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    $link = $row['link'];
                }
                $link = strtoupper($link);
                $str_arr = explode(",", $link);
                $str_count = count($str_arr);
                ?>
                <div class="w-100 py-5">
                    <div class="container">
                        <h1 class="card-heading my-5 text-uppercase text-center">Equipment/Software Request Form</h1>
                        <?php if (empty($link)) : ?>
                            <div class="container d-flex justify-content-center">
                                <img src="/Employee-Portal/assets/img/under_construction.gif">
                            </div>
                            <div class="container d-flex justify-content-center">
                                <p style="color: red;" class="card-heading">Under Construction... Come back soon! </p>
                            </div>
                        <?php else : ?>
                            <embed class="w-100" src="<?php echo $link ?>" type="application/pdf" height="900vh">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
</body>

</html>