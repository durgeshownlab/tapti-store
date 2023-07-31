  <!-- footer -->
        <div class="footer ">
            <div class="copyright">
                <p>Copyright &copy; <a href="#">taptistore.com</a> 2018</p>
            </div>
        </div>
        <!-- #/ footer -->
    </div>
    <!-- Common JS -->
    <script src="../assets/plugins/common/common.min.js"></script>
    <!-- Custom script -->
    <script src="js/custom.min.js"></script>
    <!-- Chartjs chart -->
    <script src="../assets/plugins/chartjs/Chart.bundle.js"></script>
    <!-- Toaster js -->
    <script src="../assets/plugins/toastr/js/toastr.min.js"></script>
    <script src="../assets/plugins/toastr/js/toastr.init.js"></script>
    <!-- Custom dashboard script -->
    <script src="js/dashboard-1.js"></script>
  </body>
    <!-- jquery cdn link  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
            console.log('jquery runing...');
            
// ------------------------------------------------------------------------------
// ----------------------- on click event coding area ---------------------------
// ------------------------------------------------------------------------------
            // code for view product tab 
            $(document).on('click', '#view-product-tab', function(e){
                e.preventDefault();
                $("#search-bar").attr('data-search-for', 'product');
                console.log('view products tab clicked');
                loadProducts();
            });

            //code for view product in pop up
            $(document).on('click', '.view-product-btn', function(e){
                e.preventDefault();
                let product_id=$(this).data('product-id');
                console.log('View product: ', product_id);
                
                $.ajax({
                    url: 'api/viewProductDetailsApi.php',
                    type: 'POST',
                    data: {product_id: product_id},
                    success: function(data){
                        $('.modal-dialog').html(data);
                    }
                });
            });

            // code for user click on delete button 
            $(document).on('click', '.delete-product-btn', function(e){
                e.preventDefault();
                let product_id=$(this).data('product-id');
                console.log('View product: ', product_id);
                if(confirm('You realy want to delete the product'))
                {
                    $.ajax({
                        url: 'api/deleteProductApi.php',
                        type: 'POST',
                        data: {product_id: product_id},
                        success: function(data){
                            if(data==0)
                            {
                                console.log('couldn\'t delete the product ');
                                toastr.success("Couldn't Delete The Product ", "Error", {
                                    positionClass: "toast-bottom-center",
                                    timeOut: 5e3,
                                    closeButton: !0,
                                    debug: !1,
                                    newestOnTop: !0,
                                    progressBar: !0,
                                    preventDuplicates: !0,
                                    onclick: null,
                                    showDuration: "300",
                                    hideDuration: "1000",
                                    extendedTimeOut: "1000",
                                    showEasing: "swing",
                                    hideEasing: "linear",
                                    showMethod: "fadeIn",
                                    hideMethod: "fadeOut",
                                    tapToDismiss: !1
                                });
                            }
                            else if(data==1)
                            {
                                console.log('product deleted successfully');
                                loadProducts();
                                toastr.success("Product Deleted Sucessfully", "Success", {
                                    positionClass: "toast-bottom-center",
                                    timeOut: 5e3,
                                    closeButton: !0,
                                    debug: !1,
                                    newestOnTop: !0,
                                    progressBar: !0,
                                    preventDuplicates: !0,
                                    onclick: null,
                                    showDuration: "300",
                                    hideDuration: "1000",
                                    extendedTimeOut: "1000",
                                    showEasing: "swing",
                                    hideEasing: "linear",
                                    showMethod: "fadeIn",
                                    hideMethod: "fadeOut",
                                    tapToDismiss: !1
                                });
                            }
                            else
                            {
                                console.log(data);
                            }
                        }
                    });
                }
            });

            //code for add product form in pop up
            $(document).on('click', '#add-product-tab', function(e){
                e.preventDefault();
                console.log('add product tab clicked');
                
                $.ajax({
                    url: 'api/addProductFormApi.php',
                    type: 'POST',
                    data: {},
                    success: function(data){
                        $('.modal-dialog').html(data);
                    }
                });
            });


            // code for when click on add specificaton field button it wwill add one specification field with name and value
            $(document).on("click", ".add-specification-field-btn", function(e){
                e.preventDefault();
                let number_of_specification=Number($("#number-of-specification").val());
                console.log("specification added ", number_of_specification);

                number_of_specification +=1;

                let specificationField=`
                    <div class="row">
                        <div class="col form-group">
                            <input type="text" class="form-control input-flat" placeholder="Name" name="product-specification-name-${number_of_specification}" id="product-specification-name-${number_of_specification}">
                        </div>
                        <div class="col form-group">
                            <input type="text" class="form-control input-flat" placeholder="value" name="product-specification-value-${number_of_specification}" id="product-specification-value-${number_of_specification}">
                        </div>
                    </div>
                `;

                $("#number-of-specification").val(number_of_specification);
                $(".specification-container").append(specificationField);
            });

            // code for on change on category dropdown and it will add sub-category in add product form
            $(document).on("change", "#product-category", function(e){
                let category_id=$("#product-category").val();
                console.log("change  detected", category_id);
                if(category_id=='')
                {
                    $('#product-sub-category').html(`
                        <option value="">Select Sub Category</option>
                    `);
                }
                else
                {
                    $.ajax({
                        url: "api/loadSubCategoryApi.php",
                        type: "POST",
                        data: {category_id: category_id},
                        success: function(data){
                            $('#product-sub-category').html(data);
                        }
                    });
                }
            });



            // when click on add product  btn
            $(document).on("click", "#add-product-submit-btn", function(e){
                e.preventDefault();
                console.log("add clicked");
                let product_name=$("#product-name").val();
                let product_price=$("#product-price").val();
                let product_category=$("#product-category").val();
                let product_sub_category=$("#product-sub-category").val();
                let product_main_image=$("#product-main-image")[0].files[0];
                let product_other_image=$("#product-other-image")[0].files;
                let product_desc=$("#product-desc").val();
                let number_of_specification=$("#number-of-specification").val();
                
                if(product_name=='')
                {
                    warningMsg("Please Enter Product Name");
                }
                else if(product_price=='')
                {
                    warningMsg("Please Enter Price");
                }
                else if(!isValidNumber(product_price))
                {
                    warningMsg("Please Enter Valid Price");
                }
                else if(product_category=='')
                {
                    warningMsg("Please Select Category");
                }
                else if(product_sub_category=='')
                {
                    warningMsg("Please Select Sub Category");
                }
                else if(!product_main_image)
                {
                    warningMsg("Please Select Main Image");
                }
                else if(!validateFile(product_main_image))
                {
                    warningMsg("Please Select Valid Main Image");
                }
                else if(product_other_image.length<1)
                {
                    warningMsg("Please Select Other Product Image");
                }
                else if(!validateMultipleFile(product_other_image))
                {
                    warningMsg("Please Select Valid Other Product Image");
                }
                else if(product_desc=='')
                {
                    warningMsg("Please Enter Product Description");
                }
                else
                {
                    // $('#myform')[0]
                    console.log(product_name, product_price, product_category, product_sub_category, product_main_image, product_other_image, product_desc);

                    for (let i = 1; i <= number_of_specification; i++) {
                        console.log($(`#product-specification-name-${i}`).val(), $(`#product-specification-value-${i}`).val());
                    }
                    
                    let formData = new FormData();
                    formData.append("product_name", product_name);
                    formData.append("product_price", product_price);
                    formData.append("product_category", product_category);
                    formData.append("product_sub_category", product_sub_category);
                    formData.append("product_main_image", product_main_image);
                    
                    for (let i = 0; i < product_other_image.length; i++) {
                        formData.append("product_other_image[]", product_other_image[i]);
                    }
                    formData.append("product_desc", product_desc);
                    formData.append("number_of_specification", number_of_specification);
                    
                    for (let i = 1; i <= number_of_specification; i++) {
                        formData.append(`product_specification_name_${i}`, $(`#product-specification-name-${i}`).val());
                        formData.append(`product_specification_value_${i}`, $(`#product-specification-value-${i}`).val());
                    }

                    $.ajax({
                        url: "api/addProductApi.php",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(data){
                            if(data==0)
                            {
                                $('.modal-dialog').html(`
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Failed</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <h2 class="text-center text-danger">Failed to Add Product Please Try Again</h2>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    `);
                                    console.log('Failed to Add product');
                                }
                                else if(data==1)
                                {
                                    loadProducts();
                                    $('.modal-dialog').html(`
                                    <div class="modal-content">
                                    <div class="modal-header">
                                            <h5 class="modal-title">Successfull</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <h2 class="text-center text-success">Product Added Successfully</h2>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                `);
                                console.log('product added');
                            }
                            else
                            {
                                console.log(data);
                            }
                        }
                    });
                }

            });


// ------------------------------------------------------------------------------
// ----------------------- function coding area --------------------------------- 
// ------------------------------------------------------------------------------
            // function for loading the Product 
            function loadProducts()
            {
                $.ajax({
                    url: 'api/loadProductsApi.php',
                    type: 'POST',
                    data: {},
                    success: function(data){
                        $('.fluid-container').html(data);
                    }
                });
            }

            // function for validating the file wheather it is valid file or not 
            function validateFile(file) {
                // Check file type (for example, allow only images)
                var allowedTypes = ["image/jpeg", "image/png", "image/gif", "image/webp", "image/bmp", "image/tiff", "image/jpg"];
                if (!allowedTypes.includes(file.type)) {
                    return false;
                }
                // Check file size (for example, limit it to 2MB)
                var maxSizeMB = 5;
                var maxSizeBytes = maxSizeMB * 1024 * 1024;
                if (file.size > maxSizeBytes) {
                    return false;
                }
                // Additional checks can be added here as needed.
                return true;
            }

            // function for validating the file wheather it is valid file or not 
            function validateMultipleFile(files) {
                // Check file type (for example, allow only images)
                var allowedTypes = ["image/jpeg", "image/png", "image/gif", "image/webp", "image/bmp", "image/tiff", "image/jpg"];

                for (let i = 0; i < files.length; i++) {
                    
                    if (!allowedTypes.includes(files[i].type)) {
                        return false;
                    }
                    // Check file size (for example, limit it to 5MB)
                    var maxSizeMB = 5;
                    var maxSizeBytes = maxSizeMB * 1024 * 1024;
                    if (files[i].size > maxSizeBytes) {
                        return false;
                    }
                    
                }
                return true;
            }
    
            // function for validate the name 
            function validateName(name) {
                // Regular expression to check if the name contains any numbers
                const regex = /\d/;
                if (regex.test(name)) {
                    // Name contains a number, so it is not valid
                    return false;
                }
                // Name does not contain any numbers, so it is valid
                return true;
            }
    
            //finction to validate the num,ber
            function isValidNumber(str) {
                // Regular expression to match a number (integer or decimal)
                // var numberPattern = /@[-+]?\d+(\.\d+)?$/;
                var numberPattern = /^[1-9]\d*$/;
                return numberPattern.test(str);
            }

            // code for sucess toast 
            function successMsg(msg)
            {
                toastr.success(msg, "Success", {
                    positionClass: "toast-top-center",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                });
            }

            // code for error toast 
            function errorMsg(msg)
            {
                toastr.error(msg, "Error", {
                    positionClass: "toast-top-center",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                });
            }

            // code for warning toast 
            function warningMsg(msg)
            {
                toastr.warning(msg, "Warning", {
                    positionClass: "toast-top-center",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                });
            }
        });

    
    </script>

</body>

</html>