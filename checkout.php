<?php include('header.php'); ?>

<main class="bg_gray">
    <div class="container margin_30">
        <div class="page_header">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li>Checkout</li>
                </ul>
            </div>
            <h1>Checkout</h1>

        </div>
        <!-- /page_header -->
        <div class="row">
            <input type="hidden" name="product-id" id="product-id" value="<?=$_GET['pid']?>">
            <div class="col-lg-6 col-md-6">
                <div class="step middle payments">
                    <h3>1. User Info and Billing address</h3>
                    <ul>


                        <?php
                        // for getting the images from the product images table 
                        $sql = "SELECT * FROM address where user_id = {$_SESSION['user_id']} and is_deleted=0";
                        $result = mysqli_query($con, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '
        <li>
            <label class="container_radio">
                <div class="d-flex justify-content-between">
                    <p>
                        ' . $row['name'] . '
                    </p>
                    <p>
                        ' . $row['mobile'] . '
                    </p>
                    <p';

                                if ($row['address_type'] == 'home') {
                                    echo ' style="background: #ec4353; padding: 2px 10px; border-radius: 3px; color: #fff;"';
                                } else {
                                    echo ' style="background: #333333; padding: 2px 10px; border-radius: 3px; color: #fff;"';
                                }

                                echo '
            >
                        ' . $row['address_type'] . '
                    </p>
                </div>

                <div class="d-flex justify-content-start">
                    <p>
                        ' . $row['address'] . ', &nbsp;
                    </p>
                    <p>
                        ' . $row['state'] . ', &nbsp;
                    </p>
                    <p>
                        ' . $row['pin_code'] . '
                    </p>
                </div>

                <input type="radio" name="address-id" value="'.$row['address_id'].'">
                <span class="checkmark"></span>
            </label>
        </li>
        ';
                            }
                        }


                        ?>


                    </ul>

                    <button class="btn_1" id="add-new-address-btn">Add New Address</button>
                    <div class="address-form-container py-2">



                    </div>

                </div>
                <!-- /step -->
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="step last">
                    <h3>2. Order Summary</h3>
                    <div class="box_general summary">
                        <ul>

                            <?php

                            $sql1 = "select * from cart where user_id={$_SESSION['user_id']} and product_id={$_GET['pid']} and is_deleted=0";
                            $result1 = mysqli_query($con, $sql1);

                            if (mysqli_num_rows($result1) > 0) {
                                while ($row = mysqli_fetch_assoc($result1)) {

                                    $sql = "select * from products where product_id={$_GET['pid']} and is_deleted=0";
                                    $result = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($result1) > 0) {
                                        $row_for_product=mysqli_fetch_assoc($result);
                                    }
                                    echo '	
                            <li class="clearfix">
                                <em>'.$row['quantity'].'x ' . ucwords($row_for_product['product_name']) . '</em> 
                                <span>&#8377;' . number_format($row_for_product['product_price']) . '</span>
                            </li>
                        </ul>
                        <ul>
                            <li class="clearfix">
                                <em><strong>Subtotal</strong></em> 
                                <span>&#8377;' . number_format($row['total_price']) . '</span>
                            </li>

                            <li class="clearfix">
                                <em><strong>Shipping</strong></em> 
                                <span>&#8377;0</span>
                            </li>

                        </ul>
                        <div class="total clearfix">TOTAL <span>&#8377;' . number_format($row['total_price']) . '</span></div>
';
                                }
                            }

                            ?>


                            <div class="">
                                <h6 style="color: green;">Please Fill the Captcha</h6>
                                <div class="captcha-container d-flex justify-content-end py-2">
                                    <div class="col-2 form-group d-flex align-items-center text-center captcha" style="width: auto; background-color: green; font-size: 1.5rem; color: #fff; letter-spacing: 1px;">
                                    </div>
                                    <div class="col-3 form-group pr-1">
                                        <input type="text" class="form-control" placeholder="Captcha" name="customer-captcha" id="customer-captcha">
                                    </div>
                                </div>
                            </div>

                            <a href="confirm.html" class="btn_1 full-width" id="place-order-btn">Confirm and Order</a>
                    </div>
                    <!-- /box_general -->
                </div>
                <!-- /step -->
            </div>
        </div>
        <!-- /row -->
    </div>
</main>

<?php include('footer.php'); ?>