<?php
include ("../layouts/header.php");
$volunteer_id=$_SESSION['user']['id'];
?>

<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Hello</h1>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .page-header -->

<div class="welcome-wrap" align="center">
    <div class="container" align="center">
        <div class="row">
            <!-- dp -->
            <div class="col-md-5 w3l_dpdown5">
                <h3><b> Donation Process </b></h3>
            </div>
            <div class="aboutdown1">
                <img src="../images/Donation.jpg" class="aboutdown1" height="450" width="1725">
            </div>
            <div class="clearfix"></div>
            <!--//dp-->

        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .home-page-icon-boxes -->

<?php
include "../layouts/footer.php";
?>
