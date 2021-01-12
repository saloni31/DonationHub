<?php
include('../layouts/admin-header.php');

if(isset($_POST['changPassword'])){
    $oldPassword=md5($_POST['oldPassword']);
    $newPassword=md5($_POST['newPassword']);
    $confirmPassword=$_POST['confirmPassword'];

    $sql="select * from user where userId=".$_SESSION['user']['u_id']." and password='".$oldPassword."'";
    $res=mysqli_query($conn,$sql);
    if($row=mysqli_fetch_array($res)){
        $res1=mysqli_query($conn,"update user set password='".$newPassword ."' where userId=".$row['userId']);
        if($res1){
            session_destroy();
            echo "<script>window.location.href='../Register/login.php'</script>";
        }
    }
}

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card ml-xl-5 mr-xl-5 mt-2 mb-2">
        <div class="card-header">
            <h3 class="m-0 font-weight-bold text-primary text-center">Change Password</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">

                    <form class="user needs-validation" action="change_password.php" method="post">
                        <div class="form-group  row justify-content-center">
                            <div class="col-sm-6">
                                <input type="password" name="oldPassword" class="form-control form-control-user " id="oldPassword"  placeholder="Enter old Password..." required onkeyup="clearText('errPass')">
                                <small class="invalid-feedback text-capitalize">Please enter old password.</small>
                                <span class="text-danger text-capitalize" id="errPass"></span>
                            </div>

                        </div>
                        <div class="form-group  row justify-content-center">
                            <div class="col-sm-6">
                                <!--                                <input type="password" class="form-control " id="newPassword"  placeholder="Enter new Password..." required>-->
                                <!--                                <small class="invalid-feedback text-capitalize">Please enter new password.</small>-->
                                <input type="password" name="newPassword" class="form-control form-control-user" id="newPassword"
                                       placeholder="Password" aria-describedby="passwordHelpBlock"
                                       pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$"
                                       required >
                                <small id="passwordHelpBlock" class="invalid-feedback text-danger text-capitalize">
                                    Your password must be 8-20 characters long, at least contain one Upper letter,one numbers and one special characters.
                                </small>
                            </div>

                        </div>
                        <div class="form-group  row justify-content-center">
                            <div class="col-sm-6">
                                <!--                                <input type="password" class="form-control " id="confirmPassword"  placeholder="confirm Password..." required>-->
                                <!--                                <small class="invalid-feedback text-capitalize">Please enter confirm password.</small>-->
                                <input type="password" class="form-control form-control-user" id="confirmPassword"
                                       placeholder="Confirm Password" name="confirmPassword" required>
                                <small class="invalid-feedback text-capitalize"> Confirm password must match with your entered password.</small>
                                <span class="text-success text-capitalize font-weight-bold" id="msgPass"></span>
                            </div>

                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="col-sm-6">
                                <input type="submit" class="btn btn-primary btn-user btn-block font-weight-bold"  id="changPassword" name="changPassword" value="Change Password"/>
                            </div>
                        </div>




                    </form>
                </div>

            </div>
        </div>
    </div>


</div>



<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php
include('../layouts/admin-footer.php')
?>
