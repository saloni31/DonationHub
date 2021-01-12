<?php
include("../layouts/header.php");
?>
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Gallery</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header -->

    <div class="portfolio-wrap">
        <div class="container">
            <div class="row portfolio-container">
                <?php
                        $sql="select * from gallery";
                        $ex=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_assoc($ex))
                        {
                        ?>
                <div class="col-12 col-md-6 col-lg-4 portfolio-item">
                     
                    <div class="portfolio-cont">

                        <img src="<?php echo $row['photo'] ?>" height="150" >
                        <?php
                        $sql="select * from events where event_id=".$row['event_id'];
                        $res=mysqli_query($conn,$sql);
                        $row1=mysqli_fetch_array($res);
                        ?>
                        <h3 class="entry-title"><b><?php echo $row1['event_name'] ?></b></h3>
                         <h3 class="entry-title"><?php echo $row['description'] ?> </h3>
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