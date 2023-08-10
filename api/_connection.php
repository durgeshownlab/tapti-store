<?php
$con=mysqli_connect("localhost","root","","tapti_store");
if(mysqli_connect_errno())
{
    echo "Failled to connect" . $mysqli_connect_error();
    exit();
}

?>