
<?php 
	session_start();
	include('config/config.php'); 

	if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin' && isset($_SESSION['email']))
	{
		header("Location: admin/main/index.php");
		// echo "<script>window.location.href = 'admin/main/index.php';  </script>";
	}
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Ansonika">
	<title>Tapti Store</title>

	<!-- Favicons-->
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

	<!-- GOOGLE WEB FONT -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

	<!-- BASE CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap.custom.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

	<!-- SPECIFIC CSS -->
	<link href="css/home_1.css" rel="stylesheet">

	<!-- YOUR CUSTOM CSS -->
	<link href="css/home_1.css" rel="stylesheet">
	<link href="css/product_page.css" rel="stylesheet">
	<link href="css/about.css" rel="stylesheet">
	<link href="css/contact.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	<link href="css/listing.css" rel="stylesheet">
	<link href="css/cart.css" rel="stylesheet">
	<link href="css/checkout.css" rel="stylesheet">
	<link href="css/orderEvent.css" rel="stylesheet">

	<!-- font awesome cdn link -->
    <script src="https://kit.fontawesome.com/ca7271c9b6.js" crossorigin="anonymous"></script>

</head>

<body>
	<div id="page">

		<header class="version_1">
			<div class="layer"></div><!-- Mobile menu overlay mask -->
			<div class="main_header">
				<div class="container">
					<div class="row small-gutters">
						<div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
							<div id="logo">
								<a href="index.php"><img src="img/brands/logo.png" alt="" width="150" height="50"></a>
							</div>
						</div>
						<nav class="col-xl-6 col-lg-7">
							<a class="open_close" href="javascript:void(0);">
								<div class="hamburger hamburger--spin">
									<div class="hamburger-box">
										<div class="hamburger-inner"></div>
									</div>
								</div>
							</a>
							<!-- Mobile menu button -->
							<div class="main-menu">
								<div id="header_menu">
									<a href="index.php"><img src="img/brands/logo.png" alt="" width="120" height="35"></a>
									<a href="index.php" class="open_close" id="close_in"><i class="ti-close"></i></a>
								</div>
								<ul class="menu">
									<li>
										<a href="index.php" class="show-submenu active">Home</a>
									</li>
									<li>
										<a href="about.php" class="show-submenu-mega">About Us</a>
										<!-- /menu-wrapper -->
									</li>
									
									<li class="megamenu submenu">
										<a href="javascript:void(0);" class="show-submenu-mega">Category</a>
										<div class="menu-wrapper">
											<div class="row small-gutters">
												<div class="col-lg-4">
													<h3></h3>
													<ul>
														<?php $sql = mysqli_query($con, "select * from category WHERE  id IN (1,3,6,7,8,9) and is_deleted=0");
														while ($row = mysqli_fetch_assoc($sql)) {
															$name = $row['name'];
															$cat_id = $row['id'];
														?>
															<li><a href="product.php?cat_id=<?= $cat_id; ?>"><?= $name; ?></a></li>



														<?php } ?>
													</ul>
												</div>
												<div class="col-lg-4">
													<h3></h3>
													<ul>
														<?php $sql = mysqli_query($con, "select * from category WHERE  id IN (2,4,5,10,11)");
														while ($row = mysqli_fetch_assoc($sql)) {

															//$cat_id = $row['id'];
															$name = $row['name'];
															$cat_id = $row['id'];

															//$rows[] = $row;
														?>
															<li><a href="product.php?cat_id=<?= $cat_id; ?>"><?= $name; ?></a></li>
														<?php } ?>
													</ul>
												</div>

												<div class="col-lg-4 d-xl-block d-lg-block d-md-none d-sm-none d-none">
													<div class="banner_menu">
														<a href="#0">
															<img src="homewear-long-808-B.JPG" width="400" height="550" alt="" class="header-img lazy">
														</a>
													</div>
												</div>
											</div>
											<!-- /row -->
										</div>
										<!-- /menu-wrapper -->
									</li>

									<li>
										<a href="contact.php">Contact</a>
									</li>




								</ul>
							</div>
							<!--/main-menu -->
						</nav>

						<!-- icon menu  -->
						<div class="col-xl-3 col-lg-2 col-md-3 d-flex align-items-center">
							<ul class="top_tools">
									
								<?php 
								if(isset($_SESSION['user_id'])) 
								{

									echo '
									
									<li>
										<div class="dropdown dropdown-access">
											<a href="#" class="access_link" data-toggle="dropdown"><span>Account</span></a>
											<div class="dropdown-menu">
												<ul>
													<li>
														<a href="myOrders.php"><i class="ti-package"></i>My Orders</a>
													</li>
													<li>
														<a href="account.php"><i class="ti-user"></i>My Profile</a>
													</li>
													<li>
														<a href="logout.php"><i class="ti-help-alt"></i>Logout</a>
													</li>
												</ul>
											</div>
										</div>
										<!-- /dropdown-access-->
									</li>
									

									<li>
										<a href="cart.php" class="">
											<i class="ti-shopping-cart"></i>
											<span>cart</span>
											<strong class="cart-count"></strong>
										</a>
									</li>
									<li>
										<a href="wishlists.php" class="wishlist"><span>Wishlist</span></a>
									</li>';
								}
								else
								{
									echo '<a href="login.php" class="btn_1">Log In</a>';
								}
								?>
								
							</ul>
						</div>


					</div>
					<!-- /row -->
				</div>
			</div>
			<!-- /main_header -->
		</header>
		<!-- /header ---->