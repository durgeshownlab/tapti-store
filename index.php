<?php include("header.php"); ?>

<main>
	<div id="carousel-home">
		<div class="owl-carousel owl-theme">
			<div class="owl-slide cover" style="background-image: url(img/slides/bg-3.jpg);">
				<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.6)">
					<div class="container">
						<div class="row justify-content-center justify-content-md-start">
							<div class="col-lg-6 static">
								<div class="slide-text white">
									<h2 class="owl-slide-animated owl-slide-title">Welcome to<br>Glory Houz</h2>
									<p class="owl-slide-animated owl-slide-subtitle">
										India's Leading Manufacturer of Ready Made Garments
									</p>
									<div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="about.php" role="button">About Us</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/owl-slide-->
			<div class="owl-slide cover" style="background-image: url(img/slides/bg-2.jpg);">
				<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
					<div class="container">
						<div class="row justify-content-center justify-content-md-end">
							<div class="col-lg-6 static">
								<div class="slide-text text-right white">
									<h2 class="owl-slide-animated owl-slide-title">manufacturer of <br>boys t-shirts</h2>
									<p class="owl-slide-animated owl-slide-subtitle">
										We are dealing in all type of ready-made garments such as Track Pant, Shorts, Kids T–Shirts..
									</p>
									<div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="contact.php" role="button">Contact Now</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/owl-slide-->
		</div>
	</div>
	<div id="icon_drag_mobile"></div>
	<!--/carousel-->

	<ul id="banners_grid" class="clearfix">

		<?php

		$sql = "select * from category where is_deleted=0 order by rand() limit 3";
		$result = mysqli_query($con, $sql);

		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result))
			{
				echo '
					<li>
						<a href="product.php?cat_id='.$row['id'].'" class="img_container">
							<img src="images/category/'.$row['image'].'" alt="" class="lazy">
							<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
								<h3>'.ucwords($row['name']).'</h3>
								<div><span class="btn_1">Shop Now</span></div>
							</div>
						</a>
					</li>
				';
			}
		}

		?>

		
	</ul>
	<!--/banners_grid -->

	<div class="container margin_60_35">
		<div class="main_title">

		<?php 

			$sql="select * from category where is_deleted=0 order by rand() limit 1";
			$result=mysqli_query($con, $sql);

			if(mysqli_num_rows($result)>0)
			{
				$row=mysqli_fetch_assoc($result);
				$cat1_id=$row['id'];
				$cat1_name=$row['name'];
			}


		?>

			<h2><?= $cat1_name ?></h2>
			<span>Products</span>
			<!-- <p>Cum doctus civibus efficiantur in imperdiet deterruisset</p> -->
		</div>
		<div class="row small-gutters">




			<?php

			//$cat_id = $_GET['cat_id'];
			// $sql1 = ("SELECT * FROM `products` WHERE sub_category_id IN (1,36,46,48) and is_deleted=0  LIMIT 9");

			$sql1="select products.product_id as product_id, products.product_name as product_name, products.product_price as product_price, products.product_image as product_image from products join sub_category on products.sub_category_id=sub_category.sub_category_id JOIN category on sub_category.category_id=category.id where category.id={$cat1_id} and sub_category.is_deleted=0 and category.is_deleted=0 and products.is_deleted=0";

			$run1 = mysqli_query($con, $sql1);

			while ($data = mysqli_fetch_assoc($run1)) {

				$product_name = $data['product_name'];
				$product_img = $data['product_image'];
				$product_price = $data['product_price'];

				$id = $data['product_id'];

			?>

				<div class="col-6 col-md-3 col-xl-3">
					<div class="grid_item">
						<figure>
							<a href="details.php?pid=<?= $id; ?>">
								<img class="img-fluid lazy" src="images/products/<?= $product_img; ?>" alt="<?= $product_name; ?>">
								<img class="img-fluid lazy" src="images/products/<?= $product_img; ?>" alt="<?= $product_name; ?>">
							</a>
						</figure>
						<a href="details.php?pid=<?= $id; ?>">
							<h3><?= ucwords($product_name); ?></h3>
							<div class="price_box">
								<span class="new_price">&#8377;<?= number_format($product_price); ?></span>
								<!-- <span class="old_price">$60.00</span> -->
							</div>
						</a>
						<ul>
							<li>
								<a href="#0" class="tooltip-1 add-wishlist-btn" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to Wishlist" data-product-id="<?= $id; ?>" <?php

																																																		if (isset($_SESSION['user_id'])) {
																																																			$sql1 = "select * from wishlists where user_id={$_SESSION['user_id']} and product_id={$id} and is_deleted=0";
																																																			$result1 = mysqli_query($con, $sql1);

																																																			if (mysqli_num_rows($result1) > 0) {
																																																				echo 'style="color: red;"';
																																																			} else {
																																																				echo 'style="color: #fff; text-shadow: 0 0 3px rgb(0, 0, 0);"';
																																																			}
																																																		} else {
																																																			echo 'style="color: #fff; text-shadow: 0 0 3px rgb(0, 0, 0);"';
																																																		}

																																																		?>>
									<i class="fa-solid fa-heart"></i>
									<span>Add to favorites</span>
								</a>
							</li>

							<li>
								<a href="#0" class="tooltip-1 add-cart-btn" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to Cart" data-product-id="<?= $id; ?>">
									<i class="ti-shopping-cart"></i>
									<span>Add to cart</span>
								</a>
							</li>
						</ul>
					</div>
					<!-- /grid_item -->
				</div>
				<!-- /col -->
			<?php } ?>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->

	<div class="featured lazy" style="background-image: url(img/slides/bg-4.jpg);">
		<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
			<div class="container margin_60">
				<div class="row justify-content-center justify-content-md-start">
					<div class="col-lg-6 wow" data-wow-offset="150">
						<h3>Glory Houz</h3>
						<p>Ready-made Garments Supplier/ Manufacture from Tamil-Nadu</p>
						<div class="feat_text_block">
							<a class="btn_1" href="contact.php" role="button">Contact Now</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /featured -->

	<div class="container margin_60_35">
		<div class="main_title">

		<?php 

			$sql="select * from category where  id!={$cat1_id} and is_deleted=0 order by rand() limit 1";
			$result=mysqli_query($con, $sql);

			if(mysqli_num_rows($result)>0)
			{
				$row=mysqli_fetch_assoc($result);
				$cat2_id=$row['id'];
				$cat2_name=$row['name'];
			}


		?>

			<h2><?= $cat2_name ?></h2>
			<span>Products</span>
			<!--			<p>Cum doctus civibus efficiantur in imperdiet deterruisset</p> -->
		</div>
		<div class="owl-carousel owl-theme products_carousel">

			<?php



			//$cat_id = $_GET['cat_id'];
			// $sql1 = ("SELECT * FROM `products` WHERE  sub_category_id IN (2,4,5,10,11)  LIMIT 9");
			$sql1 = "select products.product_id as product_id, products.product_name as product_name, products.product_price as product_price, products.product_image as product_image from products join sub_category on products.sub_category_id=sub_category.sub_category_id JOIN category on sub_category.category_id=category.id where category.id={$cat2_id} and sub_category.is_deleted=0 and category.is_deleted=0 and products.is_deleted=0";
			$run1 = mysqli_query($con, $sql1);

			while ($data = mysqli_fetch_assoc($run1)) {

				$product_name = $data['product_name'];
				$product_img = $data['product_image'];

				$id = $data['product_id'];
			?>
				<div class="item">
					<div class="grid_item">
						<figure>
							<a href="details.php?pid=<?= $id; ?>">
								<img class="owl-lazy" src="images/products/<?= $product_img; ?>" alt="<?= $product_name; ?>">
							</a>
						</figure>
						<a href="details.php?pid=<?= $id; ?>">
							<h3><?= $product_name; ?></h3>
							<div class="price_box">
								<span class="new_price">&#8377;<?= number_format($data['product_price']); ?></span>
								<!-- <span class="old_price">$60.00</span> -->
							</div>
						</a>
					</div>
					<!-- /grid_item -->
				</div>



			<?php } ?>
		</div>
		<!-- /products_carousel -->
	</div>
	<!-- /container -->



</main>
<!-- /main -->

<?php include("footer.php"); ?>