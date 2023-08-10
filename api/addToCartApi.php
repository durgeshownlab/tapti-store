<?php
    include("_connection.php");
    include("_session.php");
    

    if(!isset($_SESSION['user_id']))
    {
        echo 2;
        exit;
    }
    else
    {
        $product_id=(int)$_POST['product_id'];
        $user_id=(int)$_SESSION['user_id'];
        if(isset($_POST['product_count']))
        {
            $product_count=(int)$_POST['product_count'];
        }


        $sql="select * from cart where user_id={$user_id} and product_id={$product_id} and is_deleted=0";

        $result=mysqli_query($con, $sql);

        if(mysqli_num_rows($result)>0)
        {
            $sql2="select * from products where product_id={$product_id} and is_deleted=0";
            $result2=mysqli_query($con, $sql2);
            if(mysqli_num_rows($result2)>0)
            {
                $row2=mysqli_fetch_assoc($result2);
                $product_price=$row2['product_price'];

                $total_price=$product_price*$product_count;

                $sql="update cart set quantity={$product_count}, total_price={$total_price} where user_id={$user_id} and product_id={$product_id} and is_deleted=0";
                $result=mysqli_query($con, $sql);
                if($result)
                {
                    echo 3;
                }
                else
                {
                    echo 4;
                }
            }

        }
        else
        {
            $sql2="select * from products where product_id={$product_id} and is_deleted=0";
            $result2=mysqli_query($con, $sql2);
            if(mysqli_num_rows($result2)>0)
            {
                $row2=mysqli_fetch_assoc($result2);
                $product_price=$row2['product_price'];

                $total_price=$product_price*$product_count;

                $sql="insert into cart (user_id, product_id, quantity, total_price) values ({$user_id}, {$product_id}, {$product_count}, {$total_price})";
                $result=mysqli_query($con, $sql);
            
                if($result)
                {
                    echo 1;
                }
                else
                {
                    echo 0;
                }
            }
            
        }
    
    }



?>