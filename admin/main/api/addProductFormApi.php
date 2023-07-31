<?php 
include("_session_start.php");
include("_dbconnect.php");

$output ='';

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
                    <input type="text" class="form-control input-flat" placeholder="Product Name" name="product-name" id="product-name" required>
                </div>
                <div class="col form-group">
                    <label class="form-label">Price</label>
                    <input type="number" class="form-control input-flat" placeholder="Price" name="product-price" id="product-price" required>
                </div>
            </div>

            <div class="row">
                <div class="col form-group">
                    <label class="form-label">Category</label>
                    <select class="form-control input-flat" name="product-category" id="product-category" required>
                        <option value="">Select Category</option>';

$sql = "select * from category where is_deleted=0";
$result=mysqli_query($conn, $sql);

if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_assoc($result))
    {
        $output .='<option value="'.$row['id'].'">'.ucwords($row['name']).'</option>';
    }
}

$output .='
                    </select>
                </div>
                <div class="col form-group">
                    <label class="form-label">Sub Category</label>
                    <select class="form-control input-flat" name="product-sub-category" id="product-sub-category" required>
                        <option value="">Select Sub Category</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col form-group">
                    <label class="form-label">Main Image</label>
                    <input type="file" class="form-control input-flat" name="product-main-image" id="product-main-image" required>
                </div>
                <div class="col form-group">
                    <label class="form-label">Other Images</label>
                    <input type="file" class="form-control input-flat" name="product-other-image[]" id="product-other-image" multiple>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Description</label>
                <textarea class="form-control h-150px" rows="6" style="height: 55px;" name="product-desc" id="product-desc" required></textarea>
            </div>
            
            <hr/>
            <div class="row">
                <div class="col form-group">
                    <label class="form-label">Add Specification</label><br/>
                    <input type="hidden" id="number-of-specification" name="number-of-specification" value="0">
                    <button class="btn btn-success btn-sm add-specification-field-btn"> Add </button>
                </div>
            </div>

            <div class="specification-container">

            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="add-product-submit-btn">Add Product</button>
        </div>
    </div>';

echo $output;
?>