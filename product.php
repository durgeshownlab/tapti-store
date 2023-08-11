<?php include("header.php");


$cat_id = $_GET['cat_id'];
$sql1="SELECT * FROM `category` where id = '$cat_id' and is_deleted=0";
$run1=mysqli_query($con,$sql1);

while($data=mysqli_fetch_assoc($run1)) {

	$cat_name = $data['name'];
}



?>

		<main>
			<div class="top_banner">
				<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
					<div class="container">
						<div class="breadcrumbs">
							<ul>
								<li><a href="index.php">Home</a></li>
							<!--	<li><a href="product.php">Products</a></li>  -->
								<li><?=$cat_name;?></li>
							</ul>
						</div>
						<h1>All Products</h1>
					</div>
				</div>
				<img src="img/slides/bg-6.jpg" class="img-fluid" alt="">
			</div>
			<!-- /top_banner -->

			<div class="container margin_30">

				<div class="main_title">
					<h2><?=$cat_name;?></h2>
					<span>Products</span>
			<!--		<p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>  -->
				</div>
				<div class="row small-gutters">
				<?php


$cat_id = $_GET['cat_id'];

$sql1="select products.product_id as product_id, products.product_name as product_name, products.product_price as product_price, products.product_image as product_image from products join sub_category on products.sub_category_id=sub_category.sub_category_id JOIN category on sub_category.category_id=category.id where category.id={$cat_id} and sub_category.is_deleted=0 and category.is_deleted=0 and products.is_deleted=0";

$run1=mysqli_query($con,$sql1);

while($data=mysqli_fetch_assoc($run1)) {

		$product_name = $data['product_name'];
		$product_img = $data['product_image'];
        $id = $data['product_id'];

?>
					<div class="col-6 col-md-4 col-xl-3">
						<div class="grid_item">
							<figure>
								<a href="details.php?pid=<?=$id;?>">
									<img class="img-fluid lazy" src="images/products/<?=$product_img;?>" alt="<?=$product_name;?>">
								</a>
							</figure>
							<a href="details.php?pid=<?=$id;?>">
								<h3><?=$product_name;?></h3>
								<div class="price_box">
									<span class="new_price">&#8377;<?= number_format($data['product_price']); ?></span>
									<!-- <span class="old_price">$60.00</span> -->
								</div>
							</a>
						</div>
						<!-- /grid_item -->
					</div>
					<!-- /col -->



					<?php } ?>

				</div>
				<!-- /row -->

			</div>
			<!-- /container -->
		</main>
		<!-- /main -->

		<?php include("footer.php");?>