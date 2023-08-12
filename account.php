<?php include("header.php"); 

if(!isset($_SESSION['user_id']))
{
    echo "<script>window.location.href = 'index.php';  </script>";
}
?>


<?php

$sql = "select * from users where user_id={$_SESSION['user_id']} and is_deleted=0";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0)
{
    $row=mysqli_fetch_assoc($result);
}


// $sql_for_address="select * from address where user_id={$_SESSION['user_id']}";
// $result_for_address = mysqli_query($con, $sql_for_address);
// if(mysqli_num_rows($result_for_address)>0)
// {
//     $row_for_address=mysqli_fetch_assoc($result_for_address);
// }

?>


<main class="bg_gray">
    <div class="container">

        <div class="row d-flex justify-content-center p-2">
            <div class="col">
                <div class="card mb-3" style="max-width: 540px; position: sticky; top: 10px;">
                    <div class="row g-0">
                        <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <img src="img/user.jpg" class="img-fluid rounded-start" alt="user.jpg">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h6 class="card-title"><?= ucwords($row['name']) ?></h6>
                            <p class="card-text"><?= strtolower($row['email']) ?></p>
                            <p class="card-text"><?= strtolower($row['mobile']) ?></p>
                            <p class="card-text"><?= strtoupper($row['gender']) ?></p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                    <div class="card mb-1">
                        <dib class="card-body">
                            <h5>Your Address</h5>
                        </dib>
                    </div>

<?php

$sql_for_address="select * from address where user_id={$_SESSION['user_id']}";
$result_for_address = mysqli_query($con, $sql_for_address);
if(mysqli_num_rows($result_for_address)>0)
{
    while($address=mysqli_fetch_assoc($result_for_address))
    {
        echo '
        <div class="card my-1">
            <div class="card-header d-flex justify-content-between">
                <span>'.ucwords($address['name']).'</span>
                <span class="badge';

                if($address['address_type']=='office')
                {
                    echo ' badge-primary';
                }
                else
                {
                    echo ' badge-success';
                }
                
        echo ' d-flex justify-content-between align-items-center">'.$address['address_type'].'</span>
            </div>
            <div class="card-body">
                <p class="card-title">
                    <b>'.$address['address'].'</b>
                </p>
                <p class="card-text">
                    <span><b>Locality: </b>'.$address['locality'].'</span><br>
                    <span><b>City: </b>'.$address['city'].'</span><br>
                    <span><b>State: </b>'.$address['state'].'</span><br>
                    <span><b>Pin Code: </b>'.$address['pin_code'].'</span><br>
                </p>
                <p class="card-text">
                    <span><b>Mobile: </b>'.$address['mobile'].'</span><br>
                </p>
            </div>
        </div>
        ';
    }
}

?>

            </div>
        </div>

        

    </div>
</main>
<!--/main-->


<?php include("footer.php"); ?>