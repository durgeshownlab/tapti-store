<?php

include("_session_start.php");
include("_dbconnect.php");

$category_id=$_POST['category_id'];
$sub_category_id=$_POST['sub_category_id'];
$sub_category_name=$_POST['sub_category_name'];

// updating value in table if file is selected

$sql="update sub_category set name='{$sub_category_name}', category_id={$category_id} where sub_category_id={$sub_category_id} and is_deleted=0";

$result=mysqli_query($conn, $sql);

if($result)
{
    echo 1;
}
else
{
    echo 0;
}




// echo ($product_name." ".$product_price." ".$product_category." ".$file['name']." ".$destination);

?>