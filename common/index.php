<?php
include "../layouts/index-header.php";
?>

<div class="home-page-icon-boxes">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 mt-4 mt-lg-0">
                <div class="icon-box active">
                    <figure class="d-flex justify-content-center">
                        <img src="../images/hands-gray.png" alt="">
                        <img src="../images/hands-white.png" alt="">
                    </figure>

                    <header class="entry-header">
                        <a href="../Register/volunteer_register.php" style="text-decoration: none;"><h3 class="entry-title">
                                Volunteer</h3></a>
                    </header>


                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 mt-4 mt-lg-0">
                <div class="icon-box">
                    <figure class="d-flex justify-content-center">
                        <img src="../images/donation-gray.png" alt="">
                        <img src="../images/donation-white.png" alt="">
                    </figure>

                    <header class="entry-header">
                        <a href="../Register/donor_register.php" style="text-decoration: none;"><h3 class="entry-title">
                                Donor</h3></a>
                    </header>


                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 mt-4 mt-lg-0">
                <div class="icon-box">
                    <figure class="d-flex justify-content-center">
                        <img src="../images/charity-gray.png" alt="">
                        <img src="../images/charity-white.png" alt="">
                    </figure>

                    <header class="entry-header">
                        <a href="request.php" style="text-decoration:none;"><h3 class="entry-title">Request</h3></a>
                    </header>


                </div>
            </div>
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .home-page-icon-boxes -->

<div class="home-page-welcome">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 order-2 order-lg-1">
                <div class="welcome-content">
                    <header class="entry-header">
                        <h2 class="entry-title">Wellcome to our Donation Hub</h2>
                    </header><!-- .entry-header -->

                    <div class="entry-content mt-5">
                        <p style="text-align: justify;">To give away money is an easy matter and in any man's power. But
                            to decide to whom to give it, and how large and when, and for what purpose and how, is
                            neither in every man's power nor an easy matter.Giving is not just about making a donation.
                            It is about making a difference.</p>
                    </div><!-- .entry-content -->

                    <div class="entry-footer mt-5">
                        <a href="about.php" class="btn gradient-bg mr-2">Read More</a>
                    </div><!-- .entry-footer -->
                </div><!-- .welcome-content -->
            </div><!-- .col -->

            <div class="col-12 col-lg-6 mt-4 order-1 order-lg-2">
                <img src="../images/welcome.jpeg" alt="welcome">
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .home-page-icon-boxes -->

<div class="home-page-events">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="upcoming-events">
                    <div class="section-heading">
                        <h2 class="entry-title">Upcoming Events</h2>
                    </div><!-- .section-heading -->


                    <!--                            --><?php
                    //   					 include("config.php");
                    //      				  $run=mysqli_query($conn,"select * from upcoming_event limit 0,3");
                    //       				 while($row=mysqli_fetch_assoc($run))
                    //        {
                    //
                    //        ?>
                    <div class="event-wrap d-flex flex-wrap justify-content-between">
                        <figure class="m-0">
                            <!-- <img src="admin/image/event/1553839455_ad2.jpeg" alt=""> -->
                            <img src="">

                        </figure>
                        <div class="event-content-wrap">
                            <header class="entry-header d-flex flex-wrap align-items-center">
                                <h4 class="entry-title w-100 m-0"></h4>

                                <div class="posted-date">
                                    <!--                                    --><?php //echo date('d-m-Y h:i:s a',strtotime($row['event_date'])); ?>
                                </div><!-- .posted-date -->
                            </header>
                            <div class="cats-links">
                                <!--                                    --><?php //echo $row['event_place'];?>
                            </div><!-- .cats-links -->
                            <!-- .entry-header -->

                            <div class="entry-content">
                                <p class="m-0"></p>
                            </div><!-- .entry-content -->


                        </div><!-- .event-content-wrap -->
                    </div><!-- .event-wrap -->
                    <?php //}?>
                </div><!-- .upcoming-events -->
            </div><!-- .col -->

            <div class="col-12 col-lg-6">
                <div class="upcoming-events">
                    <div class="section-heading">
                        <h2 class="entry-title">Upcoming Events</h2>
                    </div><!-- .section-heading -->


                    <!--                            --><?php
                    //                     include("config.php");
                    //                      $run=mysqli_query($conn,"select * from upcoming_event limit 3,5");
                    //                     while($row=mysqli_fetch_assoc($run))
                    //        {
                    //        ?>
                    <div class="event-wrap d-flex flex-wrap justify-content-between">
                        <figure class="m-0">
                            <img src="">
                            <!-- <?php echo "../../" . $row['pic']; ?> -->
                        </figure>
                        <div class="event-content-wrap">
                            <header class="entry-header d-flex flex-wrap align-items-center">
                                <h4 class="entry-title w-100 m-0"></h4>

                                <div class="posted-date">
                                    <!--                                        --><?php //echo $row['event_date'];?>
                                </div><!-- .posted-date -->


                            </header><!-- .entry-header -->

                            <div class="cats-links">

                            </div><!-- .cats-links -->
                            <div class="entry-content">
                                <p class="m-0"></p>
                            </div><!-- .entry-content -->


                        </div><!-- .event-content-wrap -->
                    </div><!-- .event-wrap -->
                    <?php //}?>
                </div><!-- .upcoming-events -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .home-page-events -->

<?php
include "../layouts/footer.php";
?>
