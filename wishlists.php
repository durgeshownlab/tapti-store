<?php include("header.php"); ?>



<main class="bg_gray">
    <div class="margin_60_35 add_bottom_30">
        <div class="main_title">
            <h2>Wishlists</h2>

        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-12">
                <div class="box_about">
                <div class="container margin_30">
			<div class="row small-gutters wishlist-items-container">

                <?php  
                    // $sql="select * from wishlists where user_id={$_SESSION['user_id']} and is_deleted=0";
                    $sql="select * from wishlists where user_id={$_SESSION['user_id']} and is_deleted=0";
                    $result=mysqli_query($con, $sql);
                    if(mysqli_num_rows($result)>0)
                    {
                        while($row=mysqli_fetch_assoc($result))
                        {
                            $sql_for_product="select * from products where product_id={$row['product_id']} and is_deleted=0";
                            $result_for_product=mysqli_query($con, $sql_for_product);
                            if(mysqli_num_rows($result_for_product)>0)
                            {
                                $row_for_product=mysqli_fetch_assoc($result_for_product);

                                echo '
                                <div class="col-6 col-md-4 col-xl-3">
                                    <div class="grid_item">
                                        <figure>
                                            <a href="details.php?pid='.$row_for_product['product_id'].'">
                                                <img class="img-fluid lazy loaded" src="images/products/'.$row_for_product['product_image'].'" data-src="images/products/'.$row_for_product['product_image'].'" alt="" data-was-processed="true">
                                            </a>
                                        </figure>
                                        <a href="details.php?pid='.$row_for_product['product_id'].'">
                                            <h3>'.ucwords($row_for_product['product_name']).'</h3>
                                            <div class="price_box">
                                                <span class="new_price">&#8377;'.number_format($row_for_product['product_price']).'</span>
                                                <!-- <span class="old_price">$60.00</span> -->
                                            </div>
                                        </a>
                                        <ul>
                                            <li><a href="#0" class="tooltip-1 add-wishlist-btn" data-toggle="tooltip" data-placement="left" title="" data-original-title="Remove from Wishlist" data-product-id="'.$row['product_id'].'"><i class="ti-trash"></i><span>Add to favorites</span></a></li>							
                                        </ul>
                                    </div>
                                    <!-- /grid_item -->
                                </div>
                                <!-- /col -->
                                ';
                            }
                            
                        }
                    }
                ?>

			</div>
			<!-- /row -->
				
			<div class="pagination__wrapper">
				<ul class="pagination">
					<li><a href="#0" class="prev" title="previous page">❮</a></li>
					<li>
						<a href="#0" class="active">1</a>
					</li>
					<li>
						<a href="#0">2</a>
					</li>
					<li>
						<a href="#0">3</a>
					</li>
					<li>
						<a href="#0">4</a>
					</li>
					<li><a href="#0" class="next" title="next page">❯</a></li>
				</ul>
			</div>
				
		</div>

                </div>
            </div>

        </div>
        <!-- /row -->

</main>
<!--/main-->


<?php include("footer.php"); ?>