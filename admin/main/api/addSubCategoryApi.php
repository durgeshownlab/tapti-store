<?php

include("_session_start.php");
include("_dbconnect.php");

$category_id=$_POST['category_id'];
$sub_category_name=$_POST['sub_category_name'];


// inserting value in table

$sql="insert into sub_category (name, category_id) values ('{$sub_category_name}', {$category_id})";

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