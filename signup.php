<?php include("header.php"); ?>

<main class="bg_gray">

    <div class="container margin_30">
        <div class="page_header">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="/tapti-store">Home</a></li>
                    <li>Signup</li>
                </ul>
            </div>
        </div>
        <!-- /page_header -->
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-8 py-3" style="background-color: #fff; border-radius: 5px;">
                <div class="box_account">
                    <h3 class="new_client text-center">Create an Account</h3>
                    <div class="form_container">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Full Name">
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Mobile" name="mobile" id="mobile" minlength="10" maxlength="10">
                        </div>

                        <div class="row no-gutters ">
                            <label class="container_radio" style="display: inline-block; margin-right: 15px;">Male
                                <input type="radio" name="gender" value="male">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container_radio" style="display: inline-block; margin-right: 15px;">Female
                                <input type="radio" name="gender" value="female">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container_radio" style="display: inline-block;">Others
                                <input type="radio" name="gender" value="others">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="company box">
                            <!-- /row -->
                            <div class="row no-gutters">
                                <div class="col-6 pr-1">
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                                    </div>
                                </div>
                                <div class="col-6 pl-1">
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Confirm Password" name="confirm-password" id="confirm-password">
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                        </div>
                        <div class="clearfix add_bottom_15">
                            <div class="float-right">
                                <span>Already have an Account? </span><a id="login" href="login.php"> Log in</a>
                            </div>
						</div>
                        <div class="text-center">
                            <input type="submit" value="Sign up" class="btn_1 full-width" id="signup-btn">
                        </div>
                    </div>
                    <!-- /form_container -->
                </div>
                <!-- /box_account -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>

<?php include("footer.php"); ?>