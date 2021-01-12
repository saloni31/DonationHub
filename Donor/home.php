<?php
include "../layouts/header.php";
if (empty($_SESSION['user']['id'])) {
    echo "<script>window.location.href='../Register/login.php'</script>";
}
$donor_id = $_SESSION['user']['id'];
$sql = "select * from services";
$res = mysqli_query($conn, $sql);
if (isset($_POST['submit'])) {
    $type = $_POST['type'];
    $sub_type = $_POST['sub_cat'];
    $quantity = $_POST['quantity'];
    $city=$_POST['city'];
    $area=$_POST['area'];

    $sql2 = "insert into donation(donor_id,donate_type,sub_categories,quantity,area,city) values ($donor_id,'$type','$sub_type','$quantity','$area','$city')";
    $res3 = mysqli_query($conn, $sql2);
    if ($res3) {
        echo "<script>window.location.href=index.php'</script>";
    } else {
        echo "fail";
    }

}

?>
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Donor Home</h1>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .page-header -->





<div class="welcome-wrap" align="center">
    <div class="container" align="center">
        <div class="row">
            <div class="col-12 col-lg-6 order-1 order-lg-2">
                <img src="../images/D Photos/Blood Donation/14671367_1300439109989487_3162973573434259667_n.png" alt="welcome">
            </div><!-- .col -->

            <div class="col-12 col-lg-6 order-1 order-lg-2">
                <div class="card-header">Request a Donation</div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" id="myform">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <label for="Type">Donation_type</label>
                                        <select name="type" class="custom-select form-control" id="Type">
                                            <option>SELECT DONATION TYPE</option>
                                            <?php
                                            while ($row = mysqli_fetch_array($res)) {
                                                ?>
                                                <option name="<?php echo $row['service_name'] ?>"
                                                        value="<?php echo $row['service_name'] ?>" >
                                                    <?php echo $row['service_name'] ?></option>
                                                <?php
                                            }

                                            ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <label for="sub_cat">Sub catagory</label><br>
                                    <select name="sub_cat" class="custom-select form-control" id="sub_cat">
                                        <option>SELECT DONATION SUB-TYPE</option>
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <label for="city">City</label>
                                        <select name="city" class="custom-select form-control" id="city">
                                            <option>SELECT CITY</option>
                                            <?php
                                            $sql1="select * from city";
                                            $res1=mysqli_query($conn,$sql1);
                                            while ($row1 = mysqli_fetch_array($res1)) {
                                                ?>
                                                <option name="<?php echo $row1['c_name'] ?>"
                                                        value="<?php echo $row1['c_id'] ?>" >
                                                    <?php echo $row1['c_name'] ?></option>
                                                <?php
                                            }

                                            ?>

                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <label for="area">Area</label><br>
                                    <select name="area" class="custom-select form-control" id="area">
                                        <option>SELECT AREA</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">


                            <div class="form-label-group" >
                                <label for="quantity">Quantity</label>
                                <input type="text" name="quantity" class="form-control" placeholder="quantity"
                                       id="demo" required="required" disabled>
                                <!--                               <span class="error">--><?php ////if(isset($err)) echo $err ?><!-- </span>-->
                            </div>

                        </div>
                        <div id="demo">

                        </div>
                        <div class="form-group">
                            <button  name="submit"
                                     class="btn gradient-bg btn-block" >Donate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .home-page-icon-boxes -->

<?php
include "../layouts/footer.php";
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {

        $("#Type").change(function () {

            var sub_cat = $("#Type").val();
            //var sub_cat_name = $("#Type").val();
            // var name = $("#Type").attr("name");
            // alert(sub_cat);
            var donor_id="<?php echo $_SESSION['donor']['id'] ?>";


            var pos = $.post("../Volunteer/data.php", {sub_cat: sub_cat,donor_id:donor_id});
            $("#sub_cat").empty();
            pos.done(function (data) {
                $("#sub_cat").append(data);
            });
            if(sub_cat==="Cloth"  )
            {
                $('#demo').attr('disabled', false);
            }
            else
            {
                $('#demo').attr('disabled', true);
            }
        });

    });
</script>
<script>
    $(document).ready(function () {
        $("#city").change(function () {
            var c_id=$("#city").val();
            var pos=$.post("../Volunteer/data.php",{c_id:c_id});
            $("#area").empty();
            pos.done(function (data) {
                $("#area").append(data);
            });

        });
    })
</script>



