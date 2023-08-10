<?php 

include("header.php"); 

if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin' && isset($_SESSION['email']))
{
    // header("Location: admin/main/index.php");
    echo "<script>window.location.href = 'admin/main/index.php';  </script>";
}
else if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='customer' && isset($_SESSION['email']) )
{
    // header("Location: /tapti-store/");
    echo "<script>window.location.href = 'index.php';  </script>";

}

?>
<main class="bg_gray">
		
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li>Login</li>
				</ul>
		</div>
	</div>
	<!-- /page_header -->
			<div class="row justify-content-center">
			<div class="col-xl-4 col-lg-4 col-md-8 py-3" style="background-color: #fff; border-radius: 5px;">
				<div class="box_account">
					<h3 class="client text-center">Log in</h3>
					<div class="form_container">
						<div class="row no-gutters">
							
						</div>
						<div class="form-group">
							<input type="email" class="form-control" name="user-email" id="user-email" placeholder="Email">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="user-password" id="user-password" value="" placeholder="Password">
						</div>
						<div class="clearfix add_bottom_15">
                            <div class="float-left">
                                <a id="forgot" href="javascript:void(0);">Forgot Password?</a>
                            </div>
                            <div class="float-right">
                                <span>Don't have an Account? </span><a id="signup" href="signup.php"> Sign up</a>
                            </div>
						</div>

						<div class="text-center">
                            <input type="submit" value="Log In" class="btn_1 full-width" id="login-btn">
                        </div>

						<div class="p-3" id="forgot_pw">
							<div class="form-group">
								<input type="email" class="form-control" name="email_forgot" id="email_forgot" placeholder="Type your email">
							</div>
							<p>A password reset link sent to you mail.</p>
							<div class="text-center"><input type="submit" value="Reset Password" class="btn_1" ></div>
						</div>
					</div>
					<!-- /form_container -->
				</div>
				<!-- /box_account -->
				
				<!-- /row -->
			</div>
			
		</div>
		<!-- /row -->
		</div>
		<!-- /container -->
	</main>

    <?php include("footer.php"); ?>