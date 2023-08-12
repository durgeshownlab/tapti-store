<?php include("header.php"); ?>



<main class="bg_gray">
    <div class="container margin_30">
        <div class="page_header">
            <h1 class="text-center">My Orders</h1>
        </div>
        <!-- /page_header -->
        <table class="table table-striped cart-list">
            <thead>
                <tr>
                    <th>
                        Product
                    </th>
                    <th>
                        Order Id
                    </th>
                    <th>
                        Price
                    </th>
                    <th>
                        Quantity
                    </th>
                    <th>
                        Subtotal
                    </th>
                    <th>
                        Status
                    </th>
                    <th>

                    </th>
                </tr>
            </thead>
            <tbody>

                <?php

                $sql = "SELECT * FROM orders where user_id = {$_SESSION['user_id']} and is_deleted=0 order by order_date desc";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($order = mysqli_fetch_assoc($result)) {

                        $sql = "SELECT * FROM products where product_id = {$order['product_id']} and is_deleted=0";
                        $result_for_product = mysqli_query($con, $sql);

                        if (mysqli_num_rows($result_for_product) == 1) {
                            $product = mysqli_fetch_assoc($result_for_product);
                            echo '
                            <tr>
                                <td>
                                    <div class="thumb_cart">
                                        <img src="images/products/' . $product['product_image'] . '" data-src="images/products/' . $product['product_image'] . '" class="lazy loaded" alt="Image" data-was-processed="true" style="width: 50px; height: auto;">
                                    </div>
                                    <span class="item_cart"><a href="details.php?pid='.$product['product_id'].'">' . ucwords($product['product_name']) . '</a></span>
                                </td>
                                <td>
                                    <strong>' . $order['order_id'] . '</strong>
                                </td>
                                <td>
                                    <strong>&#8377; ' . number_format($order['price_single_unit']) . '</strong>
                                </td>
                                <td>
                                    <div class="product-quantity-container">
                                        <strong>' . $order['quantity'] . '</strong>
                                    </div>
                                </td>
                                <td>
                                    <strong>&#8377; ' . number_format($order['total_price']) . '</strong>
                                </td>
                                <td>
                                    <span style="';

                                if($order['order_status']=='canceled')
                                {
                                    echo "color: red;";
                                }
                                else if($order['order_status']=='pending')
                                {
                                    echo "color: #ffa000;";
                                }
                                else if($order['order_status']=='delivered')
                                {
                                    echo "color: green;";
                                }
                                echo '                    
                                    "> ' . $order['order_status'] . '</span>
                                </td>
                                <td class="options">
                                    <a href="orderDetails.php?Oid='.$order['order_id'].'" class="view-order-btn" data-product-id="' . $product['product_id'] . '"><i class="ti-eye" style="color: red;"></i></a>
                                </td>
                            </tr>
                            ';
                        } 
                        else {
                            // exit;
                        }
                    }
                } 
                else {
                    exit;
                }

                ?>



            </tbody>
        </table>

        <div class="row add_top_30 flex-sm-row-reverse cart_actions">

        </div>
        <!-- /cart_actions -->

    </div>
    <!-- /container -->


    <div class="pop-up-container">
        
    </div>



</main>
<!--/main-->


<?php include("footer.php"); ?>