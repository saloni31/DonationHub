<?php
include "../layouts/header.php";
if (empty($_SESSION['user']['id'])) {
    echo "<script>window.location.href='../Register/login.php'</script>";
} else {


    $volunteer_id = $_SESSION['user']['id'];
    $sql2 = "select * from volunteer where volunteer_id=" . $volunteer_id;
    $res2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($res2);
    $userId = $row2['userId'];
    if ($row2) {
        $vol_name = $row2['fullName'];

        $sql = "select * from user where userId=" . $row2['userId'];
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($res);
        $vol_email = $row['email'];
        $vol_contact_nos = $row2['contactno'];
        $vol_address = $row2['address'];
        $vol_city = $row2['city'];
        $vol_area = $row2['area_name'];


    }
}
if (isset($_POST['add'])) {
    $err = "";
    if ($_POST['firstName'] == "") {
        $err = "Required field";
    } else if (!preg_match("/^[a-zA-z ]+$/", $_POST['firstName'])) {
        $err = "only alphabets are allowed.";
    } else {
        $firstname = $_POST['firstName'];
    }

    filter_var($_POST['inputEmail'], FILTER_SANITIZE_EMAIL);
    if (empty($_POST['inputEmail'])) {
        $mailerr = "Required field.";
    } else if (!filter_var($_POST['inputEmail'], FILTER_VALIDATE_EMAIL)) {
        $mailerr = "Email must be in proper format.";
    } else {
        $email = $_POST['inputEmail'];
    }


    if ($_POST['inputcontactno'] == "") {
        $mobileerr = "Required field";
    } else if (!preg_match('/^[0-9]{10}$/', $_POST['inputcontactno'])) {
        $mobileerr = ".Only 10 Digits Are Allowed ";
    } else {
        $mobile = $_POST['inputcontactno'];
    }

    if ($_POST['inputAddress'] == "") {
        $Adderr = "Required field";
    } else {
        $address = $_POST['inputAddress'];
    }

    $city = $_POST['city'];
    $area = $_POST['area'];
    if (isset($firstname) && isset($address) && isset($mobile) && isset($email) && isset($city) && isset($area)) {
        $sql1 = "update volunteer set fullName='$firstname',contactno='$mobile',address='$address',city='$city',area_name='$area' where volunteer_id=" . $volunteer_id;
        $res1 = mysqli_query($conn, $sql1);
        $sql3 = "update user set email='$email' where userId=" . $userId;
        $res3 = mysqli_query($conn, $sql3);
        if ($res1) {
            echo "<script> window.location.href='manage_profile.php'</script>";
        } else
            echo "problem";
    }
}
?>

<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Manage Profile</h1>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .page-header -->

<div class="welcome-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 order-1 order-lg-2">
                <img src="../images/D Photos/cloth donation/1cb335b637ded38f37354895fd9c624a.jpeg">
            </div><!-- .col -->

            <div class="col-12 col-lg-6 order-2 order-lg-1">
                <div class="card-header">Manage Your Account</div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="manage_profile.php">
                        <div class="form-group">

                            <div class="form-label-group">
                                <label for="firstName">Full name :- </label>
                                <input type="text" name="firstName" class="form-control"
                                       placeholder="First name" value="<?php if (isset($firstname)) {
                                    echo $firstname;
                                } elseif (isset($vol_name)) {
                                    echo $vol_name;
                                } ?>">
                            </div>
                            <span class="error text-danger"><?php if (isset($err)) echo "*" . $err; ?></span>

                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="inputEmail">Email address :- </label>
                                <input type="text" name="inputEmail" class="form-control" placeholder="Email address"
                                       value="<?php if (isset($email)) {
                                           echo $email;
                                       } elseif (isset($vol_email)) {
                                           echo $vol_email;
                                       } ?>">
                            </div>
                            <span class="error text-danger"><?php if (isset($mailerr)) {
                                    echo "*" . $mailerr;
                                } ?></span>
                        </div>

                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="inputcontactno">Contact no :- </label>
                                <input type="text" name="inputcontactno" class="form-control"
                                       placeholder="Contact no" value="<?php if (isset($mobile)) {
                                    echo $mobile;
                                } elseif (isset($vol_contact_nos)) {
                                    echo $vol_contact_nos;
                                } ?>">
                            </div>
                            <span class="error text-danger"><?php if (isset($mobileerr)) echo "*" . $mobileerr; ?></span>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="inputAddress">Address :- </label>
                                <textarea rows="5" name="inputAddress" class="form-control"
                                          placeholder="Address"><?php if (isset($address)) {
                                        echo $address;
                                    } elseif (isset($vol_address)) {
                                        echo $vol_address;
                                    } ?></textarea>
                            </div>
                            <span class="error text-danger"><?php if (isset($Adderr)) echo "*" . $Adderr; ?></span>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <label for="city">City</label>
                                        <select name="city" class="custom-select form-control" id="city">
                                            <option value="no">SELECT CITY</option>
                                            <?php
                                            $sql1 = "select * from city";
                                            $res1 = mysqli_query($conn, $sql1);
                                            while ($row1 = mysqli_fetch_array($res1)) {
                                                if ($row1['c_id'] == $vol_city) {
                                                    ?>
                                                    <option name="<?php echo $row1['c_name'] ?>"
                                                            value="<?php echo $row1['c_id'] ?>" selected="selected">
                                                        <?php echo $row1['c_name'] ?></option>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <option name="<?php echo $row1['c_name'] ?>"
                                                            value="<?php echo $row1['c_id'] ?>">
                                                        <?php echo $row1['c_name'] ?></option>

                                                    <?php
                                                }
                                            }

                                            ?>

                                        </select>
                                    </div>

                                </div>

                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <label for="area">Area</label><br>
                                    <select name="area" class="custom-select form-control" id="area">
                                        <option>SELECT AREA</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>


                <div class="form-group">
                    <input type="submit" name="add" class="btn btn-danger border-0 btn-block" value="UPDATE"
                           align="absbottom">
                </div>


                </form>
            </div>
        </div>
    </div><!-- .col -->


</div><!-- .row -->
</div><!-- .container -->

<?php
include "../layouts/footer.php";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {

        $("#city").change(function () {
            var c_id = $("#city").val();
            var pos = $.post("data.php", {c_id: c_id});
            $("#area").empty();
            pos.done(function (data) {
                $("#area").append(data);
            });

        });
    })
</script>
<script>
    $(document).ready(function () {

        var city_id = "<?php echo $vol_city ?>";
        // alert(city_id);
        var area_id = "<?php echo $vol_area?>";
        var vol_id = "<?php  echo $volunteer_id?>";
        // alert(vol_id);
        // alert(area_id);

        var pos = $.post("data.php", {city_id: city_id, vol_id: vol_id, area_id: area_id});
        $("#area").empty();
        pos.done(function (data) {
            $("#area").append(data);
        });


    })
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#datetimepicker1').datetimepicker({
            timepicker: false,
            format: "Y-m-d"
        });

    });
</script>
