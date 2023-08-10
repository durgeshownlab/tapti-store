<?php include("header.php"); ?>



<main class="bg_gray">
    <div class="container margin_30">
        <div class="page_header">
            <h1 class="text-center">My Cart</h1>
        </div>
        <!-- /page_header -->
        <table class="table table-striped cart-list">
            <thead>
                <tr>
                    <th>
                        Product
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

                    </th>
                </tr>
            </thead>
            <tbody>

<?php 

$sql = "SELECT * FROM cart where user_id = {$_SESSION['user_id']} and is_deleted=0";
$result = mysqli_query($con, $sql);

$total_price=0;

if(mysqli_num_rows($result)>0)
{
	while($cart=mysqli_fetch_assoc($result))
    {

        $total_price += $cart['total_price'];

        $sql = "SELECT * FROM products where product_id = {$cart['product_id']} and is_deleted=0";
        $result_for_product = mysqli_query($con, $sql);

        if(mysqli_num_rows($result_for_product)==1)
        {
            $product=mysqli_fetch_assoc($result_for_product);
            echo '
            <tr>
                <td>
                    <div class="thumb_cart">
                        <img src="images/products/'.$product['product_image'].'" data-src="images/products/'.$product['product_image'].'" class="lazy loaded" alt="Image" data-was-processed="true" style="width: 50px; height: auto;">
                    </div>
                    <span class="item_cart">'.$product['product_name'].'</span>
                </td>
                <td>
                    <strong>&#8377; '.number_format($product['product_price']).'</strong>
                </td>
                <td>
                <div class="product-quantity-container">
                        <div class="cart-quantity-dec-btn " data-product-id="'.$product['product_id'].'">-</div>

                        <input type="number" value="'.$cart['quantity'].'" id="quantity-value" name="quantity-value">

                        <div class="cart-quantity-inc-btn" data-product-id="'.$product['product_id'].'">+</div>
                        
                    </div>
                </td>
                <td>
                    <strong>&#8377; '.number_format($cart['total_price']).'</strong>
                </td>
                <td class="options">
                    <a href="#" class="delete-cart-item-btn" data-product-id="'.$product['product_id'].'"><i class="ti-trash" style="color: red;"></i></a>
                </td>
            </tr>
            ';
        }
        else
        {
            exit;
        }
        
    }
}
else
{
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

    <div class="box_cart">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <ul>
                        <li>
                            <span>Subtotal</span>&#8377; <?= number_format($total_price);?>
                        </li>
                        <li>
                            <span>Shipping</span> &#8377; 0.00
                        </li>
                        <li>
                            <span>Total</span>&#8377; <?= number_format($total_price);?>
                        </li>
                    </ul>
                    <a href="cart-2.html" class="btn_1 full-width cart">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /box_cart -->

</main>
<!--/main-->


<?php include("footer.php"); ?>