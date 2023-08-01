<?php 
include("_session_start.php");
include("_dbconnect.php");

$output ='';

$sql="select products.product_name as name, products.product_image as image, products.product_price as price, products.product_desc as description, category.id as category_id, category.name as category, sub_category.sub_category_id as sub_category_id, sub_category.name as sub_category from products join sub_category on sub_category.sub_category_id=products.sub_category_id join category on sub_category.category_id=category.id where products.product_id={$_POST['product_id']} and products.is_deleted=0";

$result=mysqli_query($conn, $sql);

if(mysqli_num_rows($result)==1)
{
    $row=mysqli_fetch_assoc($result);
}

$output .= '
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add Product</h5>
            <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
        </div>
        <div class="modal-body">

            <div class="row">
                <div class="col form-group">
                    <label class="form-label">Product Name</label>
                    <input type="text" class="form-control input-flat" placeholder="Product Name" name="product-name" id="product-name" value="'.$row['name'].'" required>
                </div>
                <div class="col form-group">
                    <label class="form-label">Price</label>
                    <input type="number" class="form-control input-flat" placeholder="Price" name="product-price" id="product-price" value="'.$row['price'].'" required>
                </div>
            </div>

            <div class="row">
                <div class="col form-group">
                    <label class="form-label">Category</label>
                    <select class="form-control input-flat" name="product-category" id="product-category" required>
                        <option value="'.$row['category_id'].'">'.$row['category'].'</option>';

$sql_for_category = "select * from category where  id != {$row['category_id']} and is_deleted=0";
$result_for_category=mysqli_query($conn, $sql_for_category);

if(mysqli_num_rows($result_for_category)>0)
{
    while($row_for_category=mysqli_fetch_assoc($result_for_category))
    {
        $output .='<option value="'.$row_for_category['id'].'">'.ucwords($row_for_category['name']).'</option>';
    }
}

$output .='
                    </select>
                </div>
                <div class="col form-group">
                    <label class="form-label">Sub Category</label>
                    <select class="form-control input-flat" name="product-sub-category" id="product-sub-category" required>
                        <option value="'.$row['sub_category_id'].'">'.$row['sub_category'].'</option>';


$sql_for_sub_category = "select * from sub_category where  sub_category_id != {$row['sub_category_id']} and category_id={$row['category_id']} and is_deleted=0";
$result_for_sub_category=mysqli_query($conn, $sql_for_sub_category);

if(mysqli_num_rows($result_for_sub_category)>0)
{
    while($row_for_sub_category=mysqli_fetch_assoc($result_for_sub_category))
    {
        $output .='<option value="'.$row_for_sub_category['sub_category_id'].'">'.ucwords($row_for_sub_category['name']).'</option>';
    }
}

$output .='
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col form-group col-md-6">
                    <label class="form-label">Main Image</label>
                    <input type="hidden" value="'.$row['image'].'" name="existing-product-image-path" id="existing-product-image-path">
                    <input type="file" class="form-control input-flat" name="product-main-image" id="product-main-image" required>
                    <img src="../../images/'.$row['image'].'" class="img-fluid rounded pt-2" alt="" style="width: 100px; height: auto; max-height: 200px; max-width: 200px;">
                </div>
                <div class="col form-group col-md-6">
                    <label class="form-label">Other Images</label>
                    <input type="file" class="form-control input-flat" name="product-other-image[]" id="product-other-image" multiple>
                    <div class="d-flex align-items-start other-images-container " style="overflow-x: auto">';

                    $sql_image = "select * from product_images where product_id={$_POST['product_id']} and is_deleted=0";
                    $result_image=mysqli_query($conn, $sql_image);

                    if(mysqli_num_rows($result_image)>0)
                    {
                        while($row_image=mysqli_fetch_assoc($result_image))
                        {
                            $output .='
                                <div class="position-relative">
                                    <img src="../../images/'.$row_image['image_path'].'" class="img-fluid rounded p-2" alt="" style="width: auto; height: 100px; max-height: 200px; max-width: 200px;">
                                    <span class="bg-danger p-1 rounded position-absolute image-delete-btn" style="z-index: 9; top: 10px; right: 10%; cursor:pointer;" data-image-id="'.$row_image['image_id'].'" data-product-id="'.$_POST['product_id'].'">
                                        <i class="fa fa-trash"></i>
                                    </span>
                                </div>';
                        }
                    }
        
        $output .='
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Description</label>
                <textarea class="form-control h-150px" rows="6" style="height: 55px;" name="product-desc" id="product-desc" required>'.$row['description'].'</textarea>
            </div>';
        
            $sql_specifications= "select * from specifications where product_id={$_POST['product_id']} and is_deleted=0";
            $result_specifications=mysqli_query($conn, $sql_specifications);

           

        $output .='
            <hr/>
            <div class="row">
                <div class="col form-group">
                    <label class="form-label">Specification</label><br/>
                    <input type="hidden" id="number-of-specification" name="number-of-specification" value="'.mysqli_num_rows($result_specifications).'">
                </div>
            </div>

            <div class="specification-container">';

            if(mysqli_num_rows($result_specifications)>0)
            {
                $i=1;
                while($row_specifications=mysqli_fetch_assoc($result_specifications))
                {
                    $output .='
                       <div class="row">
                            <div class="col form-group">
                                <input type="hidden" value="'.$row_specifications['specification_id'].'" name="product-specification-id-'.$i.'" id="product-specification-id-'.$i.'">

                                <input type="text" class="form-control input-flat" placeholder="Name" name="product-specification-name-'.$i.'" id="product-specification-name-'.$i.'" value="'.$row_specifications['name'].'">
                            </div>
                            <div class="col form-group">
                                <input type="text" class="form-control input-flat" placeholder="value" name="product-specification-value-'.$i.'" id="product-specification-value-'.$i.'" value="'.$row_specifications['value'].'">
                            </div>
                        </div>';
                    $i++;
                }
            }
        

        $output .='                
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="update-product-submit-btn" data-product-id="'.$_POST['product_id'].'">Save Changes</button>
        </div>
    </div>';

echo $output;
?>