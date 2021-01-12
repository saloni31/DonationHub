<?php
include("../layouts/header.php");

require '../PHPMailer-5.2.27/PHPMailerAutoload.php';
require '../PHPMailer-5.2.27/class.smtp.php';
if (isset($_POST['add'])) {
    $sql = "select * from user where email='" . $_POST['inputEmail'] . "'and email_verified_status=1";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    $err = "";

    if ($_POST['firstName'] == "") {
        $err = "Required field";
    } else if (!preg_match("/^[a-z A-z]+$/", $_POST['firstName'])) {
        $err = "Only alphabets are allowed.";
    } else {
        $firstname = $_POST['firstName'];
    }

    filter_var($_POST['inputEmail'], FILTER_SANITIZE_EMAIL);
    if (empty($_POST['inputEmail'])) {
        $mailerr = "Required field.";
    } else if (!filter_var($_POST['inputEmail'], FILTER_VALIDATE_EMAIL)) {
        $mailerr = "Email must be in proper format.";
    } else if ($count > 0) {
        $mailerr = "Email Is Already Exist ";
    } else {
        $email = $_POST['inputEmail'];
    }

    if ($_POST['inputPassword'] == "") {
        $passerr = "Required field";
    } else if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $_POST['inputPassword'])) {
        $passerr = "Password Have 8 To 12 Characters and Must Contain At Least  One Capital Letters Small Letter and One Spacial Characters";
    } else {
        $password = md5($_POST['inputPassword']);
    }


    if ($_POST['confirmPassword'] == "") {
        $conpaaerr = "Required field";
    } else if (strcasecmp($_POST['inputPassword'], $_POST['confirmPassword'])) {
        $conpaaerr = "Confirm Password Must Same As Password.";
    } else {
        $conpaa = $_POST['confirmPassword'];
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


    if ($_POST['city'] == "0") {
        $cityerr = "Please Select City";
    } else {
        $city = $_POST['city'];
    }
    if ($_POST['area'] == "0") {
        $areaerr = "Please Select Area";
    } else {
        $area = $_POST['area'];
    }


    if (empty($err) && empty($mailerr) && empty($passerr) && empty($conpaaerr) && empty($Adderr) && empty($cityerr) && empty($areaerr)) {

        $sql1 = "insert into user (roleId,email,password) values (2,'$email','$password')";
        $result1 = mysqli_query($conn, $sql1);
        $id = mysqli_insert_id($conn);
        if ($result1) {
            $sql = "insert into volunteer(userId,fullname,contactno,address,city,area_name)values($id,'$firstname','$mobile','$address','$city','$area')";
            $result = mysqli_query($conn, $sql);
            $last_id= mysqli_insert_id($conn);
            if ($result) {

                $base_url = "http://localhost/DonationHub/Register/verified.php";


                $body = "please open link to verified ur email-" . $base_url . "?user_id=" . $id;
                $mail = new PHPMailer;

                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->Username = "donationhub2@gmail.com";
                $mail->Password = "donate123";
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                $mail->addAddress($email);


                $mail->isHTML(true);
                $mail->Body = $body;
                $mail->Subject = "Email Verification";
                $mail->setFrom("donationhub2@gmail.com", "Donation Hub");

                if (!$mail->send()) {
                    echo "error: " . $mail->ErrorInfo;
                } else {
                    echo "<script>window.location.href='login.php'</script>";
                }

            } else {
                echo "smthing went wrong...!";
            }
        }
    }

}

?>


<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Volunteer Registration</h1>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .page-header -->

<div class="welcome-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 order-1 order-lg-2">
                <!--                <img src="images/D Photos/Blood Donation/wallpaper.jpg.jpg"><br>-->
                <img src="../images/D Photos/cloth donation/1cb335b637ded38f37354895fd9c624a.jpeg" height="750">
            </div><!-- .col -->

            <div class="col-12 col-lg-6 order-2 order-lg-1">
                <div class="card-header">Register an Account</div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">

                            <div class="form-label-group ">
                                <label for="firstName">First name</label>
                                <input type="text" name="firstName" class="form-control"
                                       placeholder="Full name" value="<?php if(isset($firstname)) echo $firstname ?>">
                            </div>
                            <span class="error text-danger"><?php if(isset($err)) echo "*".$err; ?></span>

                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="inputEmail">Email address</label>
                                <input type="text" name="inputEmail" class="form-control" placeholder="Email address"
                                       value="<?php if(isset($email)) echo $email ?>">
                            </div>
                            <span class="error text-danger"><?php if(isset($mailerr)) echo "*".$mailerr; ?></span>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <label for="inputPassword">Password</label>
                                        <input type="password" name="inputPassword" class="form-control"
                                               placeholder="Password" id="Password" value="<?php if(isset($password)) echo $password ?>">
                                        <!--                                        <span  class="fa fa-fw fa-eye field-icon toggle-password" id="Show_Password"></span>-->
                                    </div>
                                    <span class="error text-danger"><?php if(isset($passerr)) echo "*".$passerr; ?></span>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <label for="confirmPassword">Confirm password</label>
                                        <input type="password" name="confirmPassword" class="form-control"
                                               placeholder="Confirm password" id="con_pass" value="<?php if(isset($conpaa)) echo $conpaa ?>">
                                        <!--                                        <span  class="fa fa-fw fa-eye field-icon toggle-password" id="Show_Password1"></span>-->
                                    </div>
                                    <span class="error text-danger"><?php if(isset($conpaaerr)) echo "*".$conpaaerr; ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="inputcontactno">Contact no</label>
                                <input type="text" name="inputcontactno" class="form-control"
                                       placeholder="Contact no" value="<?php if(isset($mobile)) echo $mobile ?>">
                            </div>
                            <span class="error text-danger"><?php if (isset($mobileerr)) echo "*" . $mobileerr; ?></span>
                        </
                        <div class="form-group">
                            <div class="form-label-group">
                                <label for="inputAddress">Address</label>
                                <textarea rows="5" name="inputAddress" class="form-control"
                                          placeholder="Address"><?php if(isset($address)) echo $address?></textarea>
                            </div>
                            <span class="error text-danger"><?php if (isset($Adderr)) echo "*" . $Adderr; ?></span>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <label for="city">City</label>
                                        <select name="city" class="custom-select form-control" id="city">
                                            <option value="0">SELECT CITY</option>
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
                                    <span class="error text-danger"><?php if (isset($cityerr)) echo $cityerr; ?></span>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <label for="area">Area</label><br>
                                        <select name="area" class="custom-select form-control" id="area">
                                            <option value="0">SELECT AREA</option>
                                        </select>
                                    </div>
                                    <span class="error text-danger"><?php if (isset($areaerr)) echo $areaerr; ?></span>
                                </div>
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
<!--</div>-->

<?php
include("../layouts/footer.php");
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
<script type="text/javascript">
    $(document).ready(function () {
        $('#datetimepicker1').datetimepicker({
            timepicker: false,
            format: "Y-m-d"
        });

    });
</script>
<!--<script type="text/javascript">-->
<!--    $(document).ready(function () {-->
<!--        $("#Show_Password").click(function () {-->
<!--            var Type=$('#Password').attr('type');-->
<!---->
<!--            if(Type==="password")-->
<!--            {-->
<!--                $('#Password').attr('type',"text");-->
<!---->
<!--            }-->
<!--            else {-->
<!--                $('#Password').attr('type', "password");-->
<!---->
<!--            }-->
<!---->
<!--        });-->
<!--        $("#Show_Password1").click(function () {-->
<!---->
<!--            var Type1=$('#con_pass').attr('type');-->
<!--            if(Type1==="password")-->
<!--            {-->
<!---->
<!--                $('#con_pass').attr('type',"text");-->
<!--            }-->
<!--            else {-->
<!---->
<!--                $('#con_pass').attr('type', "password");-->
<!--            }-->
<!---->
<!--        })-->
<!---->
<!--    });-->
<!--</script>-->

