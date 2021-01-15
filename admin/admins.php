<?php
include('../layouts/admin-header.php');

if (isset($_POST['add'])) {
    $sql = "select * from user where email='" . $_POST['email'] . "'";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);

    $name=$_POST['fname'];
    $pass = md5($_POST['pass']);
    $cno = $_POST['cno'];

    if ($count > 0) {
        $mailerr = "Email Is Already Exist ";
    }
    else{
        $email = $_POST['email'];
    }

     if (strcasecmp($_POST['pass'], $_POST['cpass'])) {
        $conpaaerr = "Confirm Password Must Same As Password.";
    } else {
        $cpass = $_POST['cpass'];
    }




    if (empty($mailerr) && empty($conpaaerr)) {

        $sql="insert into user (roleId,email,password,email_verified_status) values (1,'$email','$pass',1)";
        $res1=mysqli_query($conn,$sql);
        $id=mysqli_insert_id($conn);
        $q = "insert into admin(userId,fullname,contactno) values ($id,'$name','$cno')";
        $result = mysqli_query($conn, $q);
        if ($result) {
            echo "<script>window.location.href='admins.php'</script>";
        } else {
            echo "ooopss..Something went Wrong !!";
        }

    }
}
?>


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-sm-10"></div>
            <div class="col-sm-2">
                <a href="#" class="btn btn-bg btn-primary" data-toggle="modal" data-target="#admin"><span
                            class="fa fa-plus mr-1"></span>Add Admin</a>
            </div>

        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-sm-9">
                        <h3 class="m-0 font-weight-bold text-primary">Admin</h3>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="pull-right" id="search" placeholder="search......">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile no</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody id="myTable">
                        <?php
                        $run=mysqli_query($conn,"select * from admin");
                        $i=1;
                        while($row=mysqli_fetch_assoc($run)) {
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row['fullname'];?></td>
                                <?php
                                $sql="select * from user where userId=".$row['userId'];
                                $res=mysqli_query($conn,$sql);
                                $row1=mysqli_fetch_array($res);
                                ?>
                                <td><?php echo $row1['email'];?></td>
                                <td><?php echo $row['contactno'];?></td>
                                <td>
                                    <a href="data.php?id=<?php echo $row['userId'] ?>"><span class="fa fa-trash fa-lg ml-2 text-primary"></span></a>
                                </td>

                            </tr>
                            <?php $i++; } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Add Batch Modal-->
    <div class="modal fade" id="admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Add New Admin</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="user needs-validation" action="admins.php" method="post" id="add-admin" name="add-admin"  enctype="multipart/form-data" novalidate>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control form-rounded" id="name" name="fname"
                                   placeholder="Enter Full Name..." pattern="[a-zA-Z ]+" required>
                            <small class="invalid-feedback text-capitalize"> Please enter your full name with characters
                                only.
                            </small>
                        </div>

                        <div class="form-group mt-3">
                            <input type="text" class="form-control form-rounded" name="cno" id="mobile"
                                   placeholder="Enter Mobile Number..." pattern="[0-9]{10}" required>
                            <small class="invalid-feedback text-capitalize"> Please enter your 10 digits mobile number.</small>
                        </div>

                        <div class="form-group mt-3">
                            <input type="email" class="form-control form-rounded" name="email" id="email" placeholder="Email Address"
                                   onkeyup="clearText('successMsg')" required>
                            <small class="invalid-feedback text-capitalize"><?php if(isset($mailerr)) echo $mailerr; ?>Please enter your email address in correct
                                format.
                            </small>
                        </div>

                        <div class="form-group mt-3">
                            <input type="password" class="form-control form-rounded" id="password"
                                   placeholder="Password" aria-describedby="passwordHelpBlock"
                                   pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$"
                                   name="pass"
                                   required >
                            <small id="passwordHelpBlock" class="invalid-feedback text-danger text-capitalize">
                                Your password must be 8-20 characters long, at least contain one Upper letter,one numbers and one special characters.
                            </small>
                        </div>

                        <div class="form-group mt-3">
                                <input type="password" class="form-control form-rounded" id="confirmPassword"
                                       placeholder="Confirm Password" name="cpass" required>
                                <small class="invalid-feedback text-capitalize"> Confirm password must match with your entered password.</small>
                        </div>


                    </form>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-primary" form="add-admin" value="Add" name="add">
                </div>


            </div>

        </div>
    </div>


    <script>
        function batch() {
            $("#admin").submit();
        }
    </script>

<?php
include('../layouts/admin-footer.php')
?>

<script>
    $(document).ready(function(){
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
</script>