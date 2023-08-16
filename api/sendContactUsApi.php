<?php

    include("_connection.php");
    include("_session.php");

    $name=$_POST['name'];
    $email=$_POST['email'];
    $msg=$_POST['msg'];
    
    if(empty($name))
    {
        echo("Please Enter Your Name");
        exit;
    }
    else if(empty($email))
    {
        echo "Please Enter your Email";
        exit;
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo "Please Enter Valid Email";
        exit;
    }
    else if(empty($msg))
    {
        echo "Please Enter Message";
        exit;
    }
    else
    {
        $sql="INSERT INTO contact_us (name, email, message) VALUES ('{$name}', '{$email}', '{$msg}')";

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

?>