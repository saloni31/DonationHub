<?php
include("../layouts/header.php");
//print_r($_SESSION);
if (isset($_POST['login'])) {


    if(empty($_POST['email']))
    {
        $emailerr="Required Field";
    }
    else
    {
        $user = $_POST['email'];
    }

    if(empty($_POST['password']))
    {

        $passerr="Required Field";
    }
    else
    {
        $pass = md5($_POST['password']);
    }


    if(empty($emailerr) && empty($passerr)) {
        $sql="select * from user where email='$user' and password='$pass' and email_verified_status=1";
        $res=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($res);
        $roleId=$row['roleId'];
        $userId=$row['userId'];

        if($roleId == 1)
        {
            $sql1 = "select * from admin where userId=$userId";

            $res1=mysqli_query($conn,$sql1);
            $row1=mysqli_fetch_array($res1);
            if($row1['id']){
                $_SESSION['user']['u_id']=$userId;
                $_SESSION['user']['id']=$row1['id'];
                $_SESSION['user']['role']=$roleId;
                echo "<script>window.location.href='../admin/index.php'</script>";
            }

        }
        elseif ($roleId == 2){
            $sql1 = "select * from volunteer where userId=$userId and admin_accept=1";

            $res1=mysqli_query($conn,$sql1);
            if($row1=mysqli_fetch_array($res1)){
            $_SESSION['user']['id']=$row1['volunteer_id'];
            $_SESSION['user']['role']=$roleId;
            $_SESSION['user']['area']=$row1['area_name'];
            echo "<script>window.location.href='../Volunteer/dashboard.php'</script>";
            }
        }
        elseif ($roleId == 3){
            $sql1 = "select * from donor where userId=$userId and admin_accept=1";

            $res1=mysqli_query($conn,$sql1);
            if($row1=mysqli_fetch_array($res1)){
            $_SESSION['user']['id']=$row1['donor_id'];
            $_SESSION['user']['role']=$roleId;
            $_SESSION['user']['area']=$row1['area_name'];
            echo "<script>window.location.href='../Donor/home.php'</script>";
            }
        }
    }
}

mysqli_close($conn);
?>

    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Login</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header -->

    <div class="welcome-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 order-1 order-lg-2">
                    <img src="../images/D Photos/Food donation/images.png">
                </div><!-- .col -->

                <div class="col-12 col-lg-6 order-2 order-lg-1">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form action="login.php" method="post" onsubmit="">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label for="inputEmail">Email address</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email address"
                                           value="<?php if (isset($user)) echo $user ?>">
                                </div>
                                <span class="error text-danger"><?php if (isset($emailerr)) echo "*" . $emailerr; ?></span>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label for="inputPassword">Password</label>

                                    <input type="password" name="password" id="Password" class="form-control"
                                           placeholder="Password" value="<?php if (isset($pass)) echo $pass ?>">
<!--                                    <span class="fa fa-fw fa-eye field-icon toggle-password" id="Show_Password"></span>-->


                                </div>
                                <span class="error text-danger">
<!--                                    --><?php //if (isset($Msg)) {
//                                        echo "*" . $Msg;
//                                    } elseif (isset($passerr)) {
//                                        echo "*" . $passerr;
//                                    } ?>
                                </span>
                            </div>

                                <input type="submit" name="login" class="btn gradient-bg btn-block" value="Sign in">
                        </form>
                    </div>
                    <div class="text-center">
                        <a class="d-block small mt-3" href="donor_register.php" style="text-decoration: none;">Register
                            an Account</a>
                        <a class="d-block small" href="forgot-password.php" style="text-decoration: none;">Forgot
                            Password?</a>
                    </div>

                </div><!-- .col -->

            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .home-page-icon-boxes -->


    <!--   <script type="text/javascript">-->
    <!--        $(document).ready(function () {-->
    <!--            var err = "-->l̥<?php ////echo $err;?>
    <!--            if (err !== "") {-->
    <!--                alert(err);-->
    <!--            }-->
    <!--        });-->
    <!--    </script>-->

    <!--    <script type="text/javascript">-->
    <!--        $(document).ready(function () {-->
    <!--            $("#Show_Password").click(function () {-->
    <!--                var Type = $('#Password').attr('type');-->
    <!--                // var Type1=$('#con_pass').attr('type');-->
    <!--                if (Type === "password") {-->
    <!--                    $('#Password').attr('type', "text");-->
    <!--                    //$('#con_pass').attr('type',"text");-->
    <!--                } else {-->
    <!--                    $('#Password').attr('type', "password");-->
    <!--                    // $('#con_pass').attr('type', "password");-->
    <!--                }-->
    <!---->
    <!--            })-->
    <!---->
    <!--        });-->
    <!--    </script>-->

<?php
include("../layouts/footer.php");
?>