<?php
include("_session_start.php");
include("_dbconnect.php");

if(!isset($_POST['product_name']) || empty($_POST['product_name']))
{
    echo 0;
    exit;
}
if(!isset($_POST['product_price']) || empty($_POST['product_price']) || !is_numeric($_POST['product_price']) || $_POST['product_price']<0)
{
    echo 0;
    exit;
}
else if(!isset($_POST['product_category']) || empty($_POST['product_category']))
{
    echo 0;
    exit;
}
else if(!isset($_POST['product_sub_category']) || empty($_POST['product_sub_category']))
{
    echo 0;
    exit;
}
else if(!isset($_POST['product_desc']) || empty($_POST['product_desc']))
{
    echo 0;
    exit;
}


//file handling 
$product_main_image = $_FILES['product_main_image'];

$file_name = $product_main_image['name'];
$file_tmp_name = $product_main_image['tmp_name'];
$file_error = $product_main_image['error'];

if ($file_error === UPLOAD_ERR_OK) 
{
    // Validate file type and size
    $allowed_extensions = array(
        'jpg',
        'jpeg',
        'png',
        'gif',
        'bmp',
        'tiff',
        'tif',
        'webp',
        'svg',
        'ico',
        'psd',
        'eps',
        'ai'
    );
    $max_file_size = 5 * 1024 * 1024; // 5MB

    $file_info = pathinfo($file_name);
    $file_extension = strtolower($file_info['extension']);

    if (!in_array($file_extension, $allowed_extensions)) {
        echo 'Invalid file format';
        exit;
    }

    if ($product_main_image['size'] > $max_file_size) {
        echo 'File size exceeds the maximum limit of 5MB.';
        exit;
    }

    // Generate a unique filename
    $new_file_name = uniqid('', true) . '.' . $file_extension;

    // Specify the directory to which the file should be moved
    $upload_directory = '../../../images/products/';

    // Move the file to the upload directory
    $destination = $upload_directory . $new_file_name;
    if (move_uploaded_file($file_tmp_name, $destination)) 
    {
        
    } 
    else 
    {
        echo 'Failed to move the uploaded file.';
        exit;
    }
} 
else 
{
    echo 'File upload failed';
    exit;
}


$sql="insert into products (product_name, product_image, product_price, product_desc, sub_category_id) values ('{$_POST['product_name']}', '{$new_file_name}', {$_POST['product_price']}, '{$_POST['product_desc']}', {$_POST['product_sub_category']})";

$result=mysqli_query($conn, $sql);


if($result)
{
    $product_id=mysqli_insert_id($conn);
    $status=true;
    for($i=1; $i<=$_POST['number_of_specification']; $i++)
    {
        // $sql1="insert into product_specifications_value_table (product_id, specification_id, value) values ({$product_id} ,{$_POST['product-specification-'.$i]}, '{$_POST['product-specification-value-'.$i]}')";

        $sql1 = "INSERT INTO specifications (product_id, name, value) VALUES ({$product_id} ,'{$_POST['product_specification_name_'.$i]}', '{$_POST['product_specification_value_'.$i]}');";

        $result1=mysqli_query($conn, $sql1);
        if(!$result1)
        {
            $status=false;
            break;
        }
    }

    if($status)
    {
        $upload_status=true;
        if (isset($_FILES["product_other_image"]) && is_array($_FILES["product_other_image"])) {
    
            // Loop through the uploaded files
            for($i = 0; $i < count($_FILES["product_other_image"]["name"]); $i++) {

                $file_name = $_FILES["product_other_image"]["name"][$i];
                $file_tmp_name = $_FILES["product_other_image"]["tmp_name"][$i];
                $file_size = $_FILES["product_other_image"]["size"][$i];
                $file_error = $_FILES["product_other_image"]["error"][$i];
    
                if ($file_error === UPLOAD_ERR_OK) 
                {
                    // Validate file type and size
                    $allowed_extensions = array(
                        'jpg',
                        'jpeg',
                        'png',
                        'gif',
                        'bmp',
                        'tiff',
                        'tif',
                        'webp',
                        'svg',
                        'ico',
                        'psd',
                        'eps',
                        'ai'
                    );
                    $max_file_size = 5 * 1024 * 1024; // 5MB

                    $file_info = pathinfo($file_name);
                    $file_extension = strtolower($file_info['extension']);

                    if (!in_array($file_extension, $allowed_extensions)) {
                        echo 'Invalid file format';
                        exit;
                    }

                    if ($file_size > $max_file_size) {
                        echo 'File size exceeds the maximum limit of 5MB.';
                        exit;
                    }

                    // Generate a unique filename
                    $new_file_name = uniqid('', true) . '.' . $file_extension;

                    // Specify the directory to which the file should be moved
                    $upload_directory = '../../../images/products/';

                    // Move the file to the upload directory
                    $destination = $upload_directory . $new_file_name;
                    if (move_uploaded_file($file_tmp_name, $destination)) 
                    {
                        $sql="insert into product_images (product_id, image_path) values ({$product_id}, '{$new_file_name}')";

                        $result=mysqli_query($conn, $sql);

                        if(!$result)
                        {
                            $upload_status=false;
                            break;
                        }
                    } 
                    else 
                    {
                        echo 'Failed to move the uploaded file.';
                        exit;
                    }
                } 
                else 
                {
                    echo 'File upload failed';
                    exit;
                }
            }
        }

        if($upload_status)
        {
            echo 1;
            exit;
        }
        else
        {
            echo 0;
            exit;
        }

        echo 1;
    }
    else
    {
        echo 0;
    }
}
else
{
    if (file_exists($destination)) {
        if (unlink($destination)) {
            // File deletion successful
            // echo 'File deleted successfully.';
        } else {
            // File deletion failed
            // echo 'Failed to delete the file.';
        }
    } else {
        // File does not exist
        // echo 'File not found.';
    }
    echo 0;
}

?>