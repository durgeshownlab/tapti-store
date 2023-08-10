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
$sql1=("SELECT * FROM `products` where sub_category_id = '$cat_id'");
$run1=mysqli_query($con,$sql1);

while($data=mysqli_fetch_assoc($run1)) {

          $product_name = $data['name'];
          $product_img = $data['product_img'];

           $id = $data['id'];

?>
					<div class="col-6 col-md-4 col-xl-3">
						<div class="grid_item">
							<figure>
								<a href="details.php?pid=<?=$id;?>">
									<img class="img-fluid lazy" src="<?=$product_img;?>" alt="<?=$product_name;?>">
								</a>
							</figure>
							<a href="details.php?pid=<?=$id;?>">
								<h3><?=$product_name;?></h3>
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