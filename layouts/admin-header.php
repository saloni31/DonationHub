<?php
include "../database/config.php";
session_start();
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HOME</title>

    <!-- Custom styles for this template-->
    <link href="../public/admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../public/admin/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="../public/admin/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../public/admin/css/style.css" rel="stylesheet">

    <link href="../public/admin/css/datatables.css" rel="stylesheet">
    <script type="text/javascript" src="../public/admin/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="../public/admin/js/fetchData.js"></script>
    <script type="text/javascript" src="../public/admin/js/validation.js"></script>
    <script type="text/javascript" src="../public/admin/js/datatables.js"></script>
    <script type="text/javascript" src="../public/admin/js/fetchData.js"></script>
    <style>
        .center
        {
            margin-top: 20%;
        }
        @media(max-width: 500px) {
            .center {
                margin-top: 100%;
            }
        }

    </style>
</head>
<!-- start of Page Wrapper -->
<body id="page-top">
<div id="wrapper">
    <!-- Sidebar -->

    <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../admin/index.php">

            <span class="bg-white mt-lg-5 ml-4 mb-4"><img src="../images/donation_hub_black_edit.png" height="50" width="200"
                 class="mt-4"></span>
            <div class="sidebar-brand-text mx-3"></div>
        </a>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">


        <li class="nav-item">
            <a class="nav-link" href="../admin/index.php">
                <i class="fas  fa-home" ></i>
                <span >Home</span></a>
        </li>
                <li class="nav-item">
                    <a class="nav-link" href="../admin/admins.php">
                        <i class="fas  fa-user-graduate" ></i>
                        <span >Admins</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../admin/donors.php">
                        <i class="fas  fa-users"></i>
                        <span >Donors</span></a>
                </li>

        <li class="nav-item">
            <a class="nav-link" href="../admin/volunteers.php">
                <i class="fas  fa-users"></i>
                <span >Volunteer</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="../admin/requests.php">
                <i class="fas  fa-users"></i>
                <span >Requests</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="../admin/events.php">
                <i class="fas  fa-calendar"></i>
                <span >Events</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="../admin/gallery.php">
                <i class="fas  fa-file-image"></i>
                <span >Gallery</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-file-pdf"></i>
                <span>Report</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="../admin/event_report.php">Event Report</a>
                    <a class="collapse-item" href="../admin/donation_report.php">Donation Report</a>
                </div>
            </div>
        </li>



        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-dark  bg-light topbar mb-4 static-top shadow">


                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn bg-dark btn-dark d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars "></i>
                </button>

                
                <ul class="navbar-nav ml-auto">


                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php
                                $query="select * from admin where id=".  $_SESSION['user']['id'];
                                $res=mysqli_query($conn,$query);
                                $result=mysqli_fetch_array($res);

                            ?>
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small text-capitalize" id="userName"><?php echo $result['fullname'] ?></span>

                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">

                            <a class="dropdown-item" href="../admin/change_password.php">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Change Password
                            </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->


            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary text-white" id="logout">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function () {
                    $("#logout").click(function () {
                        var data_user="@session['user']['role']";
                        var pos=$.post("../Volunteer/subData.php",{data_user:data_user});
                        pos.done(function (data) {
                            if(data==='DONE'){
                                window.location.href="../Register/login.php";
                            }
                        })
                    })
                })
            </script>

            <script src="../public/admin/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
            <script src="../public/admin/datatables/dataTables.bootstrap4.min.js" type="text/javascript"></script>
            <script src="../public/admin/fontawesome-free/js/fontawesome.min.js" type="text/javascript"></script>
<!--            <script src="/static/jquery/jquery.min.js"></script>-->
            <script src="../public/admin/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>

            <!-- Core plugin JavaScript-->
            <script src="../public/admin/jquery-easing/jquery.easing.min.js" type="text/javascript"></script>

            <!-- Custom scripts for all pages-->
            <script src="../public/admin/js/sb-admin-2.min.js" type="text/javascript"></script>

            <script src="../public/admin/js/demo/datatables-demo.js" type="text/javascript"></script>

            <script src="../public/admin/js/daterangepicker.js"></script>
            <!-- datepicker -->
            <script src="../public/admin/js/jquery.datetimepicker.js"></script>
            <script src="../public/admin/js/bootstrap-datepicker.min.js"></script>




                                                                                                                                                                                                                                                                                                                                                  