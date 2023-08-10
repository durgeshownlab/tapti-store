<?php

include("header.php");


$product_id = $_GET['pid'];

// for getting the product information
$sql = "SELECT * FROM products where product_id = {$product_id} and is_deleted=0";
$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result)==1)
{
	$product=mysqli_fetch_assoc($result);
}
else
{
	exit;
}

// for getting the sub category information 
$sql = "SELECT * FROM sub_category where sub_category_id = {$product['sub_category_id']} and is_deleted=0";
$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result)==1)
{
	$sub_category=mysqli_fetch_assoc($result);
}
else
{
	exit;
}

// for getting the category information 
$sql = "SELECT * FROM category where id = {$sub_category['category_id']} and is_deleted=0";
$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result)==1)
{
	$category=mysqli_fetch_assoc($result);
}
else
{
	exit;
}




?>


<main>

	<div class="top_banner">
		<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
			<div class="container">
				<div class="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#"><?= $category['name'] ?></a></li>
						<li><a href="#"><?= $sub_category['name'] ?></a></li>
						<li><?= $product['product_name'] ?></li>
					</ul>
				</div>
				<h1>Product Details</h1>
			</div>
		</div>
		<img src="img/slides/bg-6.jpg" class="img-fluid" alt="">
	</div>
	<!-- /top_banner -->

	<div class="container margin_30">
		<div class="row">
			<div class="col-md-6">
				<div class="all">
					<div class="slider">
						<div class="owl-carousel owl-theme main owl-loaded owl-drag">

							<div class="owl-stage-outer">
								<div class="owl-stage"
									style="transform: translate3d(-2320px, 0px, 0px); transition: all 0.25s ease 0s; width: 3480px;">
									<div class="owl-item" style="width: 580px;">
										<div style="background-image: url(images/products/<?=$product['product_image'];  ?>);" class="item-box">
										</div>
									</div>
<?php 
	// for getting the images from the product images table 
$sql = "SELECT * FROM product_images where product_id = {$product_id} and is_deleted=0";
$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result)>0)
{
	while($image=mysqli_fetch_assoc($result))
	{
		echo '
			<div class="owl-item" style="width: 580px;">
				<div style="background-image: url(images/products/'.$image['image_path'].');" class="item-box">
				</div>
			</div>
		';
	}
}


?>

									<!-- <div class="owl-item" style="width: 580px;">
										<div style="background-image: url(img/products/shoes/2.jpg);" class="item-box">
										</div>
									</div> -->
									
								</div>
							</div>
							<div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span
										aria-label="Previous">‹</span></button><button type="button" role="presentation"
									class="owl-next"><span aria-label="Next">›</span></button></div>
							<div class="owl-dots"><button role="button" class="owl-dot"><span></span></button><button
									role="button" class="owl-dot"><span></span></button><button role="button"
									class="owl-dot"><span></span></button><button role="button"
									class="owl-dot"><span></span></button><button role="button"
									class="owl-dot active"><span></span></button><button role="button"
									class="owl-dot"><span></span></button></div>
						</div>
						<div class="left"><i class="ti-angle-left"></i></div>
						<div class="right"><i class="ti-angle-right"></i></div>
					</div>
					<div class="slider-two">
						<div class="owl-carousel owl-theme thumbs owl-loaded">

							<div class="owl-stage-outer">
								<div class="owl-stage"
									style="transform: translate3d(-119px, 0px, 0px); transition: all 0.25s ease 0s; width: 714px;">

									<div class="owl-item" style="width: 104px; margin-right: 15px;">
										<div style="background-image: url(images/products/<?=$product['product_image'];  ?>);" class="item">
										</div>
									</div>
<?php 
	// for getting the images from the product images table 
$sql = "SELECT * FROM product_images where product_id = {$product_id} and is_deleted=0";
$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result)>0)
{
	while($image=mysqli_fetch_assoc($result))
	{
		echo '
		<div class="owl-item active" style="width: 104px; margin-right: 15px;">
			<div style="background-image: url(images/products/'.$image['image_path'].');" class="item">
			</div>
		</div>
		';
	}
}


?>									
								</div>
							</div>
							<div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span
										aria-label="Previous">‹</span></button><button type="button" role="presentation"
									class="owl-next disabled"><span aria-label="Next">›</span></button></div>
							<div class="owl-dots"><button role="button" class="owl-dot"><span></span></button><button
									role="button" class="owl-dot active"><span></span></button></div>
						</div>
						<div class="left-t"></div>	
						<div class="right-t"></div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#"><?= $category['name'] ?></a></li>
						<li><a href="#"><?= $sub_category['name'] ?></a></li>
						<li><?= $product['product_name'] ?></li>
					</ul>
				</div>
				<!-- /page_header -->
				<div class="prod_info">
					<h1><?= $product['product_name'] ?></h1>
					<!-- <span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
							class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i><em>4
							reviews</em></span> -->
					<p><?= $product['product_desc'] ?></p>
					<div class="prod_options">
						<div class="product-quantity-container">
							<div class="quantity-dec-btn ">-</div>

							<input type="number" value="1" id="quantity-value" name="quantity-value">

							<div class="quantity-inc-btn">+</div>
							
						</div>
					</div>
					<div class="row">
						<div class="col-lg-5 col-md-6">
							<div class="price_main"><span class="new_price">&#8377; <?= number_format($product['product_price']) ?></span></div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="btn_add_to_cart"><a href="checkout.php?pid=<?= $_GET['pid'] ?>" class="btn_1 buy-now-btn" data-product-id="<?= $_GET['pid'] ?>">Buy Now</a></div>
						</div>
					</div>
				</div>
				<!-- /prod_info -->
				<div class="product_actions">
					<ul>
						<li>
							<a href="#" class="add-wishlist-btn" data-product-id="<?= $product_id; ?>"><i class="fa-solid fa-heart"
							

							<?php

								if(isset($_SESSION['user_id']))
								{
									$sql1="select * from wishlists where user_id={$_SESSION['user_id']} and product_id={$product_id} and is_deleted=0";
									$result1=mysqli_query($con, $sql1);

									if(mysqli_num_rows($result1)>0)
									{
										echo 'style="color: red;"';
									}
									else
									{
										echo 'style="color: #fff; text-shadow: 0 0 1px rgb(0, 0, 0);"';
									}
								}
								else
								{
									echo 'style="color: #fff; text-shadow: 0 0 3px rgb(0, 0, 0);"';
								}

							?>

							></i><span>Add to Wishlist</span></a>
						</li>
						<li>
							<a href="#" class="add-cart-btn" data-product-id="<?= $product_id; ?>"><i class="ti-shopping-cart"></i><span>Add to Cart</span></a>
						</li>
					</ul>
				</div>
				<!-- /product_actions -->

				<div class="col-md-12 mt-5">
					<h3>Specifications</h3>
					<div class="table-responsive">
						<table class="table table-sm table-striped">
							<tbody>



							<?php

								$sql1="select * from specifications where product_id={$product_id} and is_deleted=0";
								$result1=mysqli_query($con, $sql1);

								if(mysqli_num_rows($result1)>0)
								{
									while($specification=mysqli_fetch_assoc($result1))
									{
										echo '	
											<tr>
												<td><strong>'.$specification['name'].'</strong></td>
												<td>'.$specification['value'].'</td>
											</tr>';
									}
								}

							?>


							</tbody>
						</table>
					</div>
					<!-- /table-responsive -->
				</div>


			</div>
		</div>
		<!-- /row -->
	</div>






</main>
<!-- /main -->

<?php include("footer.php"); ?>