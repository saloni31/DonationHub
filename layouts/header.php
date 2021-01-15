<?php
include("../database/config.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Donation Hub</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../public/user/css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="../public/user/css/font-awesome.min.css">

    <!-- ElegantFonts CSS -->
    <link rel="stylesheet" href="../public/user/css/elegant-fonts.css">

    <!-- themify-icons CSS -->
    <link rel="stylesheet" href="../public/user/css/themify-icons.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="../public/user/css/swiper.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css"/>

    <!-- Styles -->
    <link rel="stylesheet" href="../public/user/css/style.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>


    <style>
        .field-icon {
            float: right;
            margin-left: -27px;
            margin-top: -27px;
            margin-right: 5px;

            position: relative;
            z-index: 2;
        }


    </style>
</head>
<body class="single-page about-page">
<header class="site-header">
    <div class="top-header-bar">
        <div class="container">
            <div class="row flex-wrap justify-content-center justify-content-lg-between align-items-lg-center">
                <div class="col-12 col-lg-8 d-none d-md-flex flex-wrap justify-content-center justify-content-lg-start mb-3 mb-lg-0">
                    <div class="header-bar-email">
                        MAIL: <a href="#">info@donationhub.com</a>
                    </div><!-- .header-bar-email -->

                    <div class="header-bar-text">
                        <p>PHONE: <span>+91-0987654321</span></p>
                    </div><!-- .header-bar-text -->
                </div><!-- .col -->

                <div class="col-12 col-lg-4 d-flex flex-wrap justify-content-center justify-content-lg-end align-items-center">
                    <div class="donate-btn">
                        <?php
                        if (isset($_SESSION['user']['role'])) {
                            if ($_SESSION['user']['role'] == 3) {
                                ?>
                                <a href="../Donor/home.php">Donate Now</a>
                            <?php } ?>

                            <?php
                            if ($_SESSION['user']['role'] == 2) {
                                ?>
                                <a href="../Volunteer/notification.php">Notifications</a>
                            <?php }
                        } ?>

                        <?php
                        if (!empty($_SESSION['user'])) {
                            ?>

                            <a id="logout">Sign out</a>

                            <?php
                        } else {
                            ?>
                            <a href="../Register/login.php">Sign in</a>
                        <?php } ?>
                    </div><!-- .donate-btn -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .top-header-bar -->

    <div class="nav-bar">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                    <div class="site-branding d-flex align-items-center">
                        <a class="d-block" href="../common/index.php" rel="home"><img class="d-block"
                                                                                      src="../images/donation_hub_black_edit.png"
                                                                                      alt="logo"></a>
                    </div><!-- .site-branding -->

                    <nav class="site-navigation d-flex justify-content-end align-items-center">
                        <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                            <?php
                            if (isset($_SESSION['user']['role']))
                            {

                                if ($_SESSION['user']['role'] == 2) {
                                    ?>
                                    <li class="current-menu-item"><a href="../Volunteer/dashboard.php">Home</a></li>
                                    <li><a href="../Volunteer/manage_profile.php">Manage Profile</a></li>
                                    <li><a href="../Volunteer/acceptList.php">Accept</a></li>
                                    <li><a href="../Volunteer/requestList.php">Donation Request</a></li>
                                    <li><a href="../Volunteer/user_request.php">Helping Request</a></li>

                                    <?php
                                    $sql = "select * from volunteer where volunteer_id=" . $_SESSION['user']['id'];
                                    $res = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_array($res);
                                    if ($row['is_handler'] == 1) {
                                        ?>
                                        <li><a href="../Volunteer/handler.php">Event Handler</a></li>
                                        <?php
                                    }
                                } elseif ($_SESSION['user']['role'] == 3) {
                                    ?>
                                    <li class="current-menu-item"><a href="../Donor/home.php">Home</a></li>
                                    <li><a href="../Donor/manage_profile.php">Manage profile</a></li>
                                    <li><a href="../common/calender.php">Events</a></li>
                                    <?php
                                }
                                }
                            else {
                            ?>
                            <li class="current-menu-item"><a href="../common/index.php">Home</a></li>
                            <li><a href="../common/about.php">About us</a></li>
                            <li><a href="../common/gallery.php">Gallery</a></li>
                            <li><a href="../common/calender.php">Events</a></li>
                            <!--                            <li><a href="../common/contact.php">Contact</a></li>-->
                        </ul>
                        <?php } ?>
                    </nav><!-- .site-navigation -->

                    <div class="hamburger-menu d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div><!-- .hamburger-menu -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .nav-bar -->
</header><!-- .site-header -->
<script>
    $(document).ready(function () {
        $("#logout").click(function () {
            var data_user = "@session['user']['role']";
            var pos = $.post("subData.php", {data_user: data_user});
            pos.done(function (data) {
                if (data === 'DONE') {
                    window.location.href = "../Register/login.php";
                }
            })
        })
    })
</script>