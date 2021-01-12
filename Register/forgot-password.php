<?php
require "../database/config.php";
require '../PHPMailer-5.2.27/PHPMailerAutoload.php';
require '../PHPMailer-5.2.27/class.smtp.php';

if(isset($_POST['forgotPassWord'])){
   $sql="select * from user where email='".$_POST['email']."' and email_verified_status=1";
   $res=mysqli_query($conn,$sql);
   $row=mysqli_fetch_array($res);
   if($res){

       $base_url = "http://localhost/DonationHub/Register/reset_password.php";
       $body = "please open link to Reset ur password-" . $base_url . "?user_id=" . $row['userId'];

       $mail = new PHPMailer;

       $mail->isSMTP();
       $mail->Host = "smtp.gmail.com";
       $mail->SMTPAuth = true;
       $mail->Username = "donationhub2@gmail.com";
       $mail->Password = "donate123";
       $mail->SMTPSecure = 'tls';
       $mail->Port = 587;
       $mail->addAddress($row['email']);

       $mail->isHTML(true);
       $mail->Body = $body;
       $mail->Subject = "Verification";
       $mail->setFrom("donationhub2@gmail.com", "Donation Hub");
       if (!$mail->send()) {
           echo "error: " . $mail->ErrorInfo;
       }
   }
   else{
       $err="Credentials do not match with existing";
   }
}
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Custom fonts for this template-->
    <link href="../public/admin/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../public/admin/css/sb-admin-2.css" rel="stylesheet">
    <link href="../public/admin/css/style.css" rel="stylesheet">
    <script type="text/javascript" src="../public/admin/js/validation.js"></script>
    <script type="text/javascript" src="../public/admin/js/fetchData.js"></script>
    <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
    <script src="../public/admin/jquery/jquery.min.js"></script>
    <!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>-->
</head>

<body class="bg-gradient-primary">
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block">
                            <img src="../images/D Photos/Food donation/images.png" height="500" width="500">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                    <p class="mb-4">We get it, stuff happens. Just enter your email address below and
                                        we'll send you a link to reset your password!</p>
                                </div>
                                <form class="user needs-validation" novalidate action="forgot-password.php" method="post">
                                    <!--                            <form  id="facultyRegistrationForm"  >-->
                                    <div class="form-group">

                                        <input type="email" class="form-control form-control-user" id="email"
                                               placeholder="Email Address" required onkeyup="clearText('emailError')"
                                               onkeydown="clearText('emailSuccessMessage')" name="email">
                                        <small class="invalid-feedback text-capitalize"><?php if(isset($err)) echo $err ?>
                                        </small>

                                        <span class="text-danger text-capitalize font-weight-bold"
                                              id="emailError"></span>
                                        <span class="text-success text-capitalize font-weight-bold"
                                              id="emailSuccessMessage"></span>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block font-weight-bold"
                                            id="forgotPassWord" name="forgotPassWord">Forgot Password
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="donor_register.php">Create an Account!</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="login.php">Already have an account? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<script src="../public/admin/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../public/admin/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../public/admin/js/sb-admin-2.min.js"></script>

</body>

</html>
