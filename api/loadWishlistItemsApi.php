<?php

include("_connection.php");
include("_session.php");

$output ='';

// $sql="select * from wishlists where user_id={$_SESSION['user_id']} and is_deleted=0";
$sql = "select * from wishlists where user_id={$_SESSION['user_id']} and is_deleted=0";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $sql_for_product = "select * from products where product_id={$row['product_id']} and is_deleted=0";
        $result_for_product = mysqli_query($con, $sql_for_product);
        if (mysqli_num_rows($result_for_product) > 0) {
            $row_for_product = mysqli_fetch_assoc($result_for_product);

            $output .= '
                <div class="col-6 col-md-4 col-xl-3">
                    <div class="grid_item">
                        <figure>
                            <a href="product-detail-1.html">
                                <img class="img-fluid lazy loaded" src="images/products/' . $row_for_product['product_image'] . '" data-src="images/products/' . $row_for_product['product_image'] . '" alt="" data-was-processed="true">
                            </a>
                        </figure>
                        <a href="product-detail-1.html">
                            <h3>' . ucwords($row_for_product['product_name']) . '</h3>
                        </a>
                        <div class="price_box">
                            <span class="new_price">&#8377;' . $row_for_product['product_price'] . '</span>
                            <!-- <span class="old_price">$60.00</span> -->
                        </div>
                        <ul>
                            <li><a href="#0" class="tooltip-1 add-wishlist-btn" data-toggle="tooltip" data-placement="left" title="" data-original-title="Remove from Wishlist" data-product-id="' . $row['product_id'] . '"><i class="ti-trash"></i><span>Add to favorites</span></a></li>							
                        </ul>
                    </div>
                    <!-- /grid_item -->
                </div>
                <!-- /col -->
                ';
        }
    }
}

echo $output;

?>
