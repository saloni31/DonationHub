<?php
include('../layouts/admin-header.php')
?>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row mt-3">
                        <div class="col-lg-6 d-none d-lg-block">
                            <img src="../images/D Photos/Food donation/images.png" height="550" width="500">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                </div>
                                <form class="user needs-validation" name="loginForm" id="loginForm" action="login.php" method="post" novalidate>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user" id="email" aria-describedby="emailHelp" placeholder="Email Address..." required>
                                        <small class="invalid-feedback text-capitalize">Please enter appropriate email address.</small>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password" required onkeyup="clearText('loginError')">
                                        <small class="invalid-feedback text-capitalize">Please enter correct password.</small>
                                    </div>
                                    <div class="form-group">
                                        <span class="text-capitalize text-danger font-weight-bold" id="loginError"></span>
                                    </div>
                                    <button type="submit" name="login" id="login"  class="btn btn-primary btn-user btn-block">Login</button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="">Forgot Password?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<?php include('../layouts/admin-footer.php') ?>