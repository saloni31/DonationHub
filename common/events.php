<?php
include("../layouts/header.php");
?>
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Events</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header -->

    <div class="portfolio-wrap">
        <div class="container">
            <div class="row portfolio-container">
                <?php
                        $sql="select * from events";
                        $ex=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_assoc($ex))
                        {
                            $image=substr($row['pic'],3);
                           // echo $image;
                        ?>
                <div class="col-12 col-md-6 col-lg-4 portfolio-item">

                    <div class="portfolio-cont">

<!--                        <img src="--><?php //echo $row['photo'] ?><!--" height="150">-->
                        <h3 class="entry-title"><b><?php echo $row['event_name'] ?></b></h3>
                         <h3 class="entry-title"><?php echo $row['description'] ?></h3>
                        <h3 class="entry-title"><?php echo $row['event_date']." - ". $row['end_date'] ?></h3>
                        <h3 class="entry-title">Place - <?php echo $row['event_place'] ?></h3>
                       <!-- <h4>2018 Causes</h4> -->
                    </div>

                </div>
<?php }?>


                </div>


        </div>
    </div>

<?php
include("../layouts/footer.php");
?>