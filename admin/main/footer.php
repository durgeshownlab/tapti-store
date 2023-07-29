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
    <!-- Custom dashboard script -->
    <script src="js/dashboard-1.js"></script>
  </body>
    <!-- jquery cdn link  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
            console.log('jquery runing...');
            
// ------------------------------------------------------------------------------
// ----------------------- onclick coding area ----------------------------------
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
                    url: 'api/getProductDetailsApi.php',
                    type: 'POST',
                    data: {product_id: product_id},
                    success: function(data){
                        $('.modal-dialog').html(data);
                    }
                });
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
        });
    
    </script>

</body>

</html>