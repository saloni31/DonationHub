<?php
require "../database/config.php";

if(isset($_POST['resetPassword'])){
    $newPassword=$_POST['newPassword'];
    $confirmPassword=$_POST['confirmPassword'];

    if(!preg_match("/^(?=.[a-z])(?=.[A-Z])(?=.\d)(?=.[@$!%?&])[A-Za-z\d@$!%?&]{8,20}$/",$_POST['newPassword'])){
        $err="Your password must be 8-20 characters long, at least contain one Upper letter,one numbers and one special characters.";
    }
    if(strcasecmp($newPassword,$confirmPassword)){
        $perr=" Your password should match with your new password.";
    }
    else{
        $sql="update user set password='".md5($newPassword)."' where userId=".$_POST['id'];
        if(mysqli_query($conn,$sql)){
            echo "<script>window.location.href='login.php'</script>";
        }

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
    <div class="row justify-content-center mt-5">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5 ">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block">
                            <img src="../images/D Photos/Food donation/images.png" height="400" width="500">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center mb-2">
                                    <h1 class="h4 text-gray-900 mb-2 font-weight-bold">Reset Password</h1>
                                </div>
                                <hr>
                                <form class="user needs-validation" novalidate action="reset_password.php" method="post">
                                    <!--                  <form class="user needs-validation" novalidate onsubmit="resetPassword(this); return false;">-->
                                    <input type="hidden" name="id" value="<?php echo $_GET['user_id'] ?>">
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password"
                                               placeholder="Enter new password..." aria-describedby="passwordHelpBlock"
                                               name="newPassword"
                                               required>
                                        <small id="passwordHelpBlock"
                                               class="invalid-feedback text-danger text-capitalize">
                                            <?php if(isset($err)) echo $err ?>
                                        </small>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                               id="password_confirmation"
                                               placeholder="Confirm password..." name="confirmPassword" required >
                                        <small class="invalid-feedback text-danger text-capitalize">
                                            <?php if(isset($err)) echo $perr ?>
                                        </small>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block font-weight-bold"
                                            id="resetPasswordBtn" name="resetPassword">Reset Password
                                    </button>

                                </form>
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