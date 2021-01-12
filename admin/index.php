<?php
include ('../layouts/admin-header.php');

$res=mysqli_query($conn,"select * from donor where admin_accept=0");
$donorsReq=mysqli_num_rows($res);

$res1=mysqli_query($conn,"select * from volunteer where admin_accept=0");
$volunteerReq=mysqli_num_rows($res1);

$res2=mysqli_query($conn,"select * from donor where admin_accept=1");
$donors=mysqli_num_rows($res2);

$res3=mysqli_query($conn,"select * from volunteer where admin_accept=1");
$volunteer=mysqli_num_rows($res3);

$res4=mysqli_query($conn,"select * from request where vol_accept=1");
$accept=mysqli_num_rows($res4);

$res5=mysqli_query($conn,"select * from request where vol_accept=0");
$pending=mysqli_num_rows($res5);
?>


<!-- Begin Page Content -->

<div class="container-fluid ">

    <div class="row mb-3">
        <div class="col-sm-10"></div>
        <div class="col-sm-2">
<!--            <a href="" class="btn btn-bg btn-primary" data-toggle="modal" data-target="#uploadStudentList"><span-->
<!--                        class="fa fa-upload mr-1"></span>Upload Student List</a>-->

        </div>

    </div>
    <div class="row mt-2">
        <div class="col-sm-5 mt-1">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-7">
                            <a href="approve-donors.php"><h5 class="text-primary"><b>Number of Donor Request: <?php if(isset($donorsReq)) echo $donorsReq ?></b></h5></a>
                            <h5><small id="studentRequest"></small></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-5 mt-1">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-7">
                            <a href="approve-volunteers.php"><h5 class="text-primary"><b>Number of Volunteer Request: <?php if(isset($volunteerReq)) echo $volunteerReq ?></b></h5>
                            </a>
                            <h5><small id="facultyRequest"></small></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row mt-2">
        <div class="col-sm-5 mt-1">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-7">
                            <a href="donors.php"><h5 class="text-primary"><b>Number of Donors: <?php if(isset($donors)) echo $donors ?></b></h5></a>
                            <h5><small id="studentRequest"></small></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-5 mt-1">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-7">
                            <a href="volunteers.php"><h5 class="text-primary"><b>Number of Volunteer: <?php if(isset($volunteer)) echo $volunteer ?></b></h5>
                            </a>
                            <h5><small id="facultyRequest"></small></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row mt-2">
        <div class="col-sm-5 mt-1">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-7">
                            <a href="accepted.php"><h5 class="text-primary"><b>Number of Accepted Helping Requests: <?php if(isset($accept)) echo $accept ?></b></h5></a>
                            <h5><small id="studentRequest"></small></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-5 mt-1">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-7">
                            <a href="pending.php"><h5 class="text-primary"><b>Number of pending Helping Requests: <?php if(isset($pending)) echo $pending ?></b></h5></a>
                            <h5><small id="studentRequest"></small></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php include ('../layouts/admin-footer.php') ?>