<?php   

    include("_session_start.php");
    include("_dbconnect.php");

    $sql="update products set is_deleted=1 where product_id={$_POST['product_id']}";
    $result=mysqli_query($conn, $sql);

    if($result)
    {
        echo 1;
    }
    else
    {
        echo 0;
    }

?>