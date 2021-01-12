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

<div class="home-page-welcome mb-5">
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


<?php
include "../layouts/footer.php";
?>
