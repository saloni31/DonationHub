<?php
include("../layouts/header.php");
//$donor_id = $_SESSION['donor']['id'];
if (isset($_POST['add']))
{
    $sql="select * from request where email='".$_POST['email']."'";
    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    $err="";
    $quantity="";
    if($_POST['name']=="")
    {
        $err="Required field";
    }
    else if(!preg_match("/^[a-z A-z]+$/",$_POST['name']))
    {
        $err="only alphabets are allowed.";
    }
    else
    {
        $firstname = $_POST['name'];
    }

    filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    if(empty($_POST['email']))
    {
        $mailerr="Required field.";
    }
    else if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
    {
        $mailerr="Email must be in proper format.";
    }
    else if($count>0)
    {
        $mailerr="Email Is Already Exist ";
    }
    else
    {
        $email=$_POST['email'];
    }


     if($_POST['cno']=="")
     {
         $mobileerr="Required field";
     }
     else if(!preg_match('/^[0-9]{10}$/',$_POST['cno']))
     {
         $mobileerr=".Only 10 Digits Are Allowed ";
     }
     else
     {
         $mobile = $_POST['cno'];
     }

    if($_POST['address']=="")
    {
        $Adderr="Required field";
    }
    else
    {
        $address = $_POST['address'];
    }

    if($_POST['city']=="0")
    {
        $cityerr="Please Select City";
    }
    else
    {
        $city = $_POST['city'];
    }
    if($_POST['area']=="0")
    {
        $areaerr="Please Select Area";
    }
    else
    {
        $area = $_POST['area'];
    }

    if($_POST['type']=="0")
    {
        $typeerr="Please Select Type";
    }
    else
    {
        $type = $_POST['type'];
    }
    if($_POST['sub_cat']=="0")
    {
        $suberr="Please Select sub type";
    }
    else
    {
        $sub_type = $_POST['sub_cat'];
    }


    $quantity=$_POST['quantity'];



if(empty($err) && empty($mailerr) && empty($mobileerr) && empty($Adderr)  && empty($cityerr) &&empty($areaerr) && empty($typeerr) && empty($suberr))
{
    $sql = "insert into request(name,email,contact,city,area,address,type,sub_type,quantity)values('$firstname','$email','$mobile','$city','$area','$address','$type','$sub_type','$quantity')";
        $result = mysqli_query($conn, $sql);
        $last_id=mysqli_insert_id($conn);
        if ($result)
        {

            echo "<script>window.location.href='index.php'</script>";
        }
        else
         {
            echo "smthing went wrong...!";
        }
}

}

?>

<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Helping Request</h1>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .page-header -->

<div class="welcome-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 order-1 order-lg-2">
                <!--                <img src="images/D Photos/Blood Donation/wallpaper.jpg.jpg"><br>-->
                <img src="../images/D%20Photos/cloth%20donation/1cb335b637ded38f37354895fd9c624a.jpeg">
            </div><!-- .col -->

            <div class="col-12 col-lg-6 order-2 order-lg-1">
                <div class="card-header">Request For Donation</div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">

                            <div class="form-label-group">
                                <label for="firstName">Full Name</label>
                                <input type="text" name="name" class="form-control"
                                       placeholder="Full name" value="">
                            </div>
                            <span class="error text-danger"></span>

                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="inputEmail">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email address"
                                       value="">
                            </div>
                            <span class="error text-danger"></span>
                        </div>

                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="inputcontactno">Contact No</label>
                                <input type="text" name="cno" class="form-control"
                                       placeholder="Contact no" value="">
                            </div>
                            <span class="error text-danger"></span>
                        </div>

                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="inputAddress">Address</label>
                                <textarea rows="5" name="address" class="form-control"
                                          placeholder="Address"></textarea>
                            </div>
                            <span class="error text-danger"></span>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <label for="city">City</label>
                                        <select name="city" class="custom-select form-control" id="city">
                                            <option value="0">---SELECT CITY---</option>
                                            <?php
                                            $sql1 = "select * from city";
                                            $res1 = mysqli_query($conn, $sql1);
                                            while ($row1 = mysqli_fetch_array($res1)) {
                                                ?>
                                                <option name="<?php echo $row1['c_name'] ?>"
                                                        value="<?php echo $row1['c_id'] ?>">
                                                    <?php echo $row1['c_name'] ?></option>
                                                <?php
                                            }

                                            ?>

                                        </select>
                                    </div>
                                    <span class="error text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <label for="pincode">Area</label>
                                        <select name="area" class="custom-select form-control" id="area">
                                            <option value="0">---SELECT AREA---</option>
                                        </select>
                                    </div>
                                    <span class="error text-danger"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <label for="Type">Donation_type</label>
                                        <select name="type" class="custom-select form-control" id="Type">
                                            <option value="0">--SELECT DONATION TYPE--</option>
                                            <?php
                                            $sql = "select * from services";
                                            $res = mysqli_query($conn, $sql);

                                            while ($row = mysqli_fetch_array($res)) {
                                                ?>
                                                <option name="<?php echo $row['service_name'] ?>"
                                                        value="<?php echo $row['service_name'] ?>">
                                                    <?php echo $row['service_name'] ?></option>
                                                <?php
                                            }

                                            ?>

                                        </select>
                                    </div>
                                    <span class="error text-danger"><?php if (isset($typeerr)) echo $typeerr; ?></span>
                                </div>
                                <div class="col-md-6">

                                    <label for="sub_cat">Sub catagory</label><br>
                                    <select name="sub_cat" class="custom-select form-control" id="sub_cat">
                                        <option value="0">SELECT DONATION SUB-TYPE</option>
                                    </select>
                                    <span class="error text-danger"></span>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="quantity">Quantity</label>
                                <input type="text" name="quantity" class="form-control" placeholder="quantity"
                                       id="demo" disabled>

                            </div>

                        </div>


                        <div class="form-group">
                            <input type="submit" name="add" class="btn gradient-bg btn-block" value="Register"
                                   align="absbottom">
                        </div>

                    </form>
                </div>
            </div>
        </div><!-- .col -->


    </div><!-- .row -->
</div><!-- .container -->
<!-- .home-page-icon-boxes -->

<?php
include("../layouts/footer.php");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {

        $("#Type").change(function () {

            var sub_cat_1 = $("#Type").val();
            //var sub_cat_name = $("#Type").val();
            // var name = $("#Type").attr("name");



            var pos = $.post("../Volunteer/data.php", {sub_cat_1: sub_cat_1});
            $("#sub_cat").empty();
            pos.done(function (data) {
                $("#sub_cat").append(data);
            });
            if (sub_cat_1 === "Cloth") {
                $('#demo').attr('disabled', false);
            } else {
                $('#demo').attr('disabled', true);
            }
        });

    });
</script>
<script>
    $(document).ready(function () {
        $("#city").change(function () {
            var c_id = $("#city").val();
            var pos = $.post("../Volunteer/data.php", {c_id: c_id});
            $("#area").empty();
            pos.done(function (data) {
                $("#area").append(data);
            });

        });
    })
</script>
<!--<script type="text/javascript">-->
<!--    $(document).ready(function () {-->
<!--        $('#datetimepicker').datetimepicker(-->
<!--            {-->
<!--                format: 'Y-m-d',-->
<!--                timepicker: false-->
<!--            });-->
<!---->
<!--    });-->
<!--</script>-->
<!--<script>-->
<!--    $(document).ready(function () {-->
<!--        $("#logout").click(function () {-->
<!--            var data_volunteer = "volunteer";-->
<!--            var pos = $.post("subData.php", {data_volunteer: data_volunteer});-->
<!--            pos.done(function (data) {-->
<!--                if (data === 'DONE') {-->
<!--                    window.location.href = "login.php";-->
<!--                }-->
<!--            })-->
<!--        })-->
<!--    })-->
<!--</script>-->

