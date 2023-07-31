<?php

// include("../../_session_start.php");
// include("../../_dbconnect.php");

// if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'customer') {
//     header("Location: ../../");
// }

// if (!isset($_SESSION['user_type'])) {
//     header("Location: ../../");
// }

?>

<?php include("header.php"); ?>

<!-- sidebar -->
<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Main</li>
            <li><a href="index.php"><i class=" mdi mdi-view-dashboard"></i> <span class="nav-text">Dashboard</span></a>
            </li>

            <li class="nav-label">Controls</li>
            
            <li>
                <a href="#" id="orders-tab"><i class="mdi mdi-cart"></i> <span class="nav-text">Orders</span></a>
            </li>
            
            <li>
                <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-product-hunt"></i> <span class="nav-text">Products</span> <span class="badge badge-danger nav-badge"></span></a>
                <ul aria-expanded="false">
                    <li>
                        <a href="#" id="view-product-tab">View</a>
                    </li>
                    <li>
                        <a href="#" id="add-product-tab" data-toggle="modal" data-target="#ModalCenter">Add Product</a>
                    </li>
                    
                </ul>
            </li>

            <li>
                <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-folder-open"></i> <span class="nav-text">Category</span> <span class="badge badge-danger nav-badge"></span></a>
                <ul aria-expanded="false">
                    <li>
                        <a href="#" id="view-service-tab">View</a>
                    </li>
                    <li>
                        <a href="#" id="add-service-tab" data-toggle="modal" data-target="#ModalCenter">Add Category</a>
                        
                    </li>
                    
                </ul>
            </li>

            <li>
                <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-folder-tree"></i> <span class="nav-text">Sub Category</span> <span class="badge badge-danger nav-badge"></span></a>
                <ul aria-expanded="false">
                    <li>
                        <a href="#" id="view-service-tab">View</a>
                    </li>
                    <li>
                        <a href="#" id="add-service-tab" data-toggle="modal" data-target="#ModalCenter">Add Sub Category</a>
                    </li>
                    
                </ul>
            </li>

        </ul>
    </div>
    <!-- #/ nk nav scroll -->
</div>
<!-- #/ sidebar -->
<!-- content body -->
<div class="content-body">
    <div class="fluid-container px-2 py-2">
        <div class="row page-titles">
            
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Orders <span class="pull-right"><i class="ion-android-cart f-s-30 text-primary"></i></span></h4>
                        <h6 class="m-t-20 f-s-14 orders-count"></h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4>NewsLetter <span class="pull-right"><i class="ion-email-unread f-s-30 text-success"></i></span></h4>
                        <h6 class="m-t-20 f-s-14 newsletter-count"></h6>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Service <span class="pull-right"><i class="mdi mdi-chart-bar f-s-30 text-danger"></i></span>
                        </h4>
                        <h6 class="m-t-20 f-s-14 service-count"></h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Message</h4>
                        
                        <?php 
                            // $sql="select * from contact_us order by time_stamp desc limit 3";
                            // $result=mysqli_query($conn, $sql);

                            // if(mysqli_num_rows($result)>0)
                            // {
                            //     while($row=mysqli_fetch_assoc($result))
                            //     {
                            //         echo '
                            //             <div class="media border-bottom-1 p-t-15 p-b-15">
                            //                 <div class="media-body">
                            //                     <h5>'.ucwords($row['name']).'</h5>
                            //                     <p class="m-b-0">
                            //                         '.ucwords(substr($row['message'], 0, 50)).'
                            //                     </p>
                            //                 </div>
                            //                 <span class="text-muted f-s-12">
                            //                     '.date("F j, Y", strtotime($row['time_stamp'])).'
                            //                 </span>
                            //             </div>
                            //         ';
                            //     }
                            // }
                            
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
    <!-- #/ container -->
</div>
<!-- #/ content body -->


<?php include("footer.php"); ?>