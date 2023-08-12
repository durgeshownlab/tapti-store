<?php

include("_connection.php");
include("_session.php");


$address_id= $_POST['address_id'];
$user_id=$_SESSION['user_id'];

if($_POST['payment_mode']=='online')
{    
}
else if($_POST['payment_mode']=='pod')
{

    $sql="select cart.quantity as quantity, cart.total_price as total_price, products.product_id as product_id, products.product_price as price from cart join products on cart.product_id=products.product_id where cart.user_id={$_SESSION['user_id']} and cart.is_deleted=0 and products.is_deleted=0";
    $result=mysqli_query($con, $sql);
    if(mysqli_num_rows($result)>0)
    {
        $productDetails=array();
        $i=0; 
        while($row=mysqli_fetch_assoc($result))
        {
            $productDetails[$i]=[
                'product_id'        =>  $row['product_id'],
                'quantity'          =>  $row['quantity'],
                'price_single_unit' =>  $row['price'],
                'total_price'       =>  $row['total_price']
            ];
            $i++;
        }
    }

    $payment_method='pod';
    $payment_status='pending';
    $delivery_status='order placed';
    
    $status=true;
    for($i=0; $i<count($productDetails); $i++)
    {
        $custom_order_id = time().'' . bin2hex(random_bytes(4));

        // code for order  event start from the order placed

        date_default_timezone_set("Asia/kolkata");

         $order_event_data = [
            [
              'event_name' => 'order placed',
              'Date' => date('d-m-Y'),
              'Time' => date('H:i:s')
            ]
        ];
    
        $json_order_event_data = json_encode($order_event_data);

        $sql="INSERT INTO orders (order_id, user_id, product_id, address_id, quantity, price_single_unit, total_price, payment_method, payment_status, delivery_status, order_event) VALUES ('{$custom_order_id}', {$user_id}, {$productDetails[$i]['product_id']}, {$address_id}, {$productDetails[$i]['quantity']}, {$productDetails[$i]['price_single_unit']}, {$productDetails[$i]['total_price']}, '{$payment_method}', '{$payment_status}', '{$delivery_status}', '{$json_order_event_data}')";
    
        $result=mysqli_query($con, $sql);
        if($result)
        {
            $productDetails[$i]['order_id']=$custom_order_id;
            $status=true;
        }
        else
        {
            $status=false;
            echo 0;
            exit;
        }
    }

    if($status)
    {
        $response=[
            'status'    =>  1,
            'data'      =>  $productDetails
        ];
        echo json_encode($response);
    }
    else
    {
        $response=[
                'status'    =>  0
            ];
        echo json_encode($response);
    }
}


?>