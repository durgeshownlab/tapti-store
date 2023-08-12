<footer class="revealed">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<img class="w-50" src="img/brands/logo.png" alt="responsive-image">
				<p>Glory Houz is a manufacturer of ready-made garments for men. We have all garments, including polo t-shirts, sleeveless tees, joggers, shorts, sportswear, home wear, inners, etc. We are the manufacturer and supplier of men’s garments and always make quality products. <a href="about.php">Read More</a></p>
			</div>

			<div class="col-lg-3 col-md-6">
				<h3 data-target="#collapse_1">Quick Links</h3>
				<div class="collapse dont-collapse-sm links" id="collapse_1">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="contact.php">Contact</a></li>

					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<h3 data-target="#collapse_3">Contacts</h3>
				<div class="collapse dont-collapse-sm contacts" id="collapse_3">
					<ul>
						<li><i class="ti-user"></i>Mr.K.MEZHI SELVAN</li>
						<li><i class="ti-home"></i>1/3, GROUND FLOOR, VADAKKU THOTTAM, MANGALAM
							MAIN ROAD, PARAPALAYAM
						</li>
						<li><i class="ti-headphone-alt"></i>+91-9994923717</li>
						<li><i class="ti-email"></i><a href="#0">ml1@gloryhouse.info</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /row-->
		<hr>
		<div class="row add_bottom_50">
			<div class="col-12 text-center">
				<h5>All Rights Reserved By Tapti Store Developed & Managed By <span style="color:#ec4353;"><a href="https://www.growbusinessforsure.com/
				">GrowbusinessforSURE</a></span></h5>
			</div>
		</div>
	</div>
</footer>
<!--/footer-->
</div>
<!-- page -->
<div id="toTop"></div><!-- Back to top button -->


<!-- COMMON SCRIPTS -->
<script src="js/common_scripts.min.js"></script>
<script src="js/main.js"></script>

<!-- SPECIFIC SCRIPTS -->
<script src="js/carousel-home.min.js"></script>
<script src="js/carousel_with_thumbs.js"></script>
<script src="js/sticky_sidebar.min.js"></script>
<script src="js/specific_listing.js"></script>

<script>
	$(document).ready(function(){

		// code for first call on the page 
		console.log('logg okk.....');
		cartItemCount();
		let rand=generateRandomNumber();
		$('.captcha').html(rand);
		$('.captcha').attr('data-captcha', rand);

// 88888888888888888888888888888888888888888888888888888888888888888888888
// event handeling area 
// 88888888888888888888888888888888888888888888888888888888888888888888888

		
		// code for when click on trash icon in wishlist page
		$(document).on("click", ".add-wishlist-btn", async function(e) {
			e.preventDefault();
			let product_id = $(this).data("product-id");
			console.log(product_id);
			await $.ajax({
				url: "api/addWishlistApi.php",
				type: "POST",
				data: {
					product_id: product_id
				},
				success: function(data) {
					if (data == 0) {
						console.log(product_id, "could not added to the wishlist");
					} else if (data == 1) {
						console.log(product_id, "added to the wishlist");
						location.reload();
					} else if (data == 2) {
						console.log("please log in");
						window.location.href = "login.php";
					} else if (data == 3) {
						console.log(product_id, "removed from the wishlist");
						// loadWishlistItems();
						location.reload();
					} else if (data == 4) {
						console.log(product_id, "could not removed from the wishlist");
					} else {
						console.log(data);
					}
				}
			});
		});

		// code for when click on login btn
		$(document).on("click", "#login-btn", function(e) {
			e.preventDefault();

			let email = $("#user-email").val();
			let password = $("#user-password").val();

			if(email=='')
			{
				alert('Please Enter Email');
			}
			else if(!validateEmail(email))
			{
				alert('Please Enter Valid Email');
			}
			else if(password=='')
			{
				alert('Please Enter Password');
			}
			else
			{
				console.log(email, password);
				$.ajax({
					url: "api/loginApi.php",
					type: "POST",
					data: {
						email: email,
						password: password
					},
					success: function(data) {
						if (data == 0) {
							alert("User doesn't Exist");
						} 
						else if(data==1)
						{
							window.open('admin/main/index.php', '_self');
						}
						else if(data==2)
						{
							window.open('/tapti-store', '_self');
						}
						else {
							console.log(data);
						}
					}
				});
			}

		});

		// code for when click on signup btn
		$(document).on("click", "#signup-btn", function(e) {
			e.preventDefault();

			let name = $("#name").val();
			let email = $("#email").val();
			let mobile = $("#mobile").val();
			// let gender = $("#gender").val();
			var gender = $('input[name="gender"]:checked').val();
			let password = $("#password").val();
			let confirm_password = $("#confirm-password").val();

			if(name=='')
			{
				alert('Please Enter Name');
			}
			else if(!validateName(name))
			{
				alert('Please Enter Valid Name');
			}
			else if(email=='')
			{
				alert('Please Enter Email');
			}
			else if(!validateEmail(email))
			{
				alert('Please Enter Valid Email');
			}
			else if(mobile=='')
			{
				alert('Please Enter Mobile');
			}
			else if(!validateMobileNumber(mobile))
			{
				alert('Please Enter Valid Mobile');
			}
			else if(!gender)
			{
				alert('Please Enter Gender');
			}
			else if(password=='')
			{
				alert('Please Enter Password');
			}
			else if(confirm_password=='')
			{
				alert('Please Enter Confirm Password');
			}
			else if(password!=confirm_password)
			{
				alert('Password and Confirm Password Must be Same');
			}
			else
			{
				console.log(name, email, mobile, gender, password, confirm_password);
				$.ajax({
					url: "api/signupApi.php",
					type: "POST",
					data: {
						name: name,
						email: email,
						mobile: mobile,
						gender: gender,
						password: password,
						confirm_password: confirm_password
					},
					success: function(data) {
						if (data == 0)
						{
							alert("User doesn't Exist");
						} 
						else if(data==1)
						{
							window.open('/tapti-store', '_self');
						}
						else if(data==2)
						{
							alert("User Already Exist, Please Login");
						}
						else
						{
							console.log(data);
						}
					}
				});
			}

		});

		// code for when click on cart icon in menubar 
		
		// code for when click on delete-cart-item-btn

		$(document).on("click", ".delete-cart-item-btn", function(e) {
			e.preventDefault();
			let product_id = $(this).data("product-id");
			console.log(product_id);
			$.ajax({
				url: "api/deleteCartItemApi.php",
				type: "POST",
				data: {
					product_id: product_id
				},
				success: function(data) {
					if (data == 0) {
						console.log(product_id, "item couldn't be deleted from the cart");
					} 
					else if (data == 1) {
						console.log(product_id, "item deleted from the cart");
						location.reload();
					} 
					 else {
						console.log(data);
					}
				}
			});
		});

		// code for when click on add-cart-btn
		$(document).on("click", ".add-cart-btn", async function(e){
			e.preventDefault();
			let product_id=$(this).data("product-id");
			let product_count=1;
			
			// console.log(product_id, "added to the cart and price is ", product_count);
			await $.ajax({
				url: "api/addToCartApi.php",
				type: "POST",
				data: {product_id: product_id, product_count: product_count},
				success: function(data) {
					if (data == 0) {
						console.log(product_id, "could not added to the cart");
					} else if (data == 1) {
						status = true;
						console.log(product_id, "added to the cart");
						location.reload();
					} else if (data == 2) {
						console.log("please log in");
						window.location.href = "login.php";
					} else if (data == 3) {
						console.log(product_id, "updated to the cart");
						location.reload();
					} else if (data == 4) {
						console.log(product_id, "could not updated to the cart");
					} else {
						console.log(data);
					}
				}
			});
		});

		// code for when click on increase product-quantity in cart
		$(document).on("click", ".cart-quantity-inc-btn", function(e) {
			e.preventDefault();
			let product_id=$(this).data("product-id");
			console.log(product_id, "increse cart clicked");
			
			$.ajax({
				url: "api/increaseQuantityInCartApi.php",
				type: "POST",
				data: {product_id: product_id},
				success: function(data) {
					if(data==1)
					{
						location.reload();
						console.log(product_id, "quantity increased in the cart");
					}
					else
					{
						location.reload();
						console.log(product_id, "quantity could not be updated to the cart");
						console.log(data);
					}
					location.reload();
					// cartItemCount();
				}
			});

		});

		// code for when click on decrease product-quantity in cart
		$(document).on("click", ".cart-quantity-dec-btn", function(e) {
			e.preventDefault();
			let product_id=$(this).data("product-id");
			console.log(product_id, "decrease cart clicked");
			
			$.ajax({
				url: "api/decreaseQuantityInCartApi.php",
				type: "POST",
				data: {product_id: product_id},
				success: function(data) {
					if(data==1)
					{
						location.reload();
						console.log(product_id, "quantity decreased in the cart");
					}
					else
					{
						location.reload();
						console.log(product_id, "quantity could not be updated to the cart");
						console.log(data);
					}
					location.reload();
					// cartItemCount();
				}
			});
		});

		// code for when click on decrease product-quantity in cart
		$(document).on("click", ".quantity-dec-btn", function(e) {
			e.preventDefault();
			console.log("decrease qunaitity clicked");
			
			let quantity=$("#quantity-value").val();
			if(quantity!='')
			{
				quantity=parseInt(quantity);
			}
			if(quantity=='' || quantity==1 || quantity<1 )
			{
				$("#quantity-value").val(1);
			}
			else
			{
				quantity -= 1;
				$("#quantity-value").val(quantity);
			}
			console.log("value changed to ",quantity);
		});

		// code for when click on increase product-quantity in cart
		$(document).on("click", ".quantity-inc-btn", function(e) {
			e.preventDefault();
			console.log("increase qunaitity clicked");
			
			let quantity=$("#quantity-value").val();
			if(quantity!='')
			{
				quantity=parseInt(quantity);
			}
			if(quantity=='' || quantity<1)
			{
				$("#quantity-value").val(1);
			}
			else
			{
				quantity += 1;
				$("#quantity-value").val(quantity);
			}
			console.log("value changed to ",quantity);
		});

		// code for when on change on quantity
		$(document).on("change", "#quantity-value", function(e) {
			e.preventDefault();
			console.log("qunaitity changed manually");
			
			let quantity=$("#quantity-value").val();
			if(quantity!='')
			{
				quantity=parseInt(quantity);
			}
			if(quantity=='' || quantity<1)
			{
				$("#quantity-value").val(1);
			}
			console.log("value changed to ",quantity);
		});

		// code for when on add address from
		$(document).on("click", "#add-new-address-btn", function(e) {
			e.preventDefault();

			$("#add-new-address-btn").hide();
			
			$('.address-form-container').html(`
			
						<div class="tab-pane fade active show" id="tab_1" role="tabpanel" aria-labelledby="tab_1">
                            <h5>Add New Address</h5>
                            <div class="row no-gutters">
                                <div class="col-6 form-group pr-1">
                                    <input type="text" class="form-control" placeholder="Name" name="customer-name" id="customer-name">
                                </div>
                                <div class="col-6 form-group pl-1">
                                    <input type="text" class="form-control" placeholder="Mobile"  name="customer-mobile-number" id="customer-mobile-number" maxlength="10" minlength="10">
                                </div>
                            </div>
                            <div class="row no-gutters">
                                <div class="col-6 form-group pr-1">
                                    <input type="text" class="form-control" placeholder="Pin Code"  name="customer-pincode" id="customer-pincode">
                                </div>
                                <div class="col-6 form-group pl-1">
                                    <input type="text" class="form-control" placeholder="Locality"  name="customer-locality" id="customer-locality">
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Full Address"  name="customer-full-address" id="customer-full-address">
                            </div>
                            <div class="row no-gutters">
                                <div class="col-6 form-group pr-1">
                                    <input type="text" class="form-control" placeholder="City/District" name="customer-city" id="customer-city">
                                </div>
                                <div class="col-6 form-group pl-1">
                                        <select class=" form-select wide add_bottom_15" name="customer-state" id="customer-state">
                                            <option value="">Select State</option>
                                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                            <option value="Assam">Assam</option>
                                            <option value="Bihar">Bihar</option>
                                            <option value="Chandigarh">Chandigarh</option>
                                            <option value="Chhattisgarh">Chhattisgarh</option>
                                            <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                            <option value="Daman and Diu">Daman and Diu</option>
                                            <option value="Delhi">Delhi</option>
                                            <option value="Goa">Goa</option>
                                            <option value="Gujarat">Gujarat</option>
                                            <option value="Haryana">Haryana</option>
                                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                                            <option value="Jharkhand">Jharkhand</option>
                                            <option value="Karnataka">Karnataka</option>
                                            <option value="Kerala">Kerala</option>
                                            <option value="Lakshadweep">Lakshadweep</option>
                                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                                            <option value="Maharashtra">Maharashtra</option>
                                            <option value="Manipur">Manipur</option>
                                            <option value="Meghalaya">Meghalaya</option>
                                            <option value="Mizoram">Mizoram</option>
                                            <option value="Nagaland">Nagaland</option>
                                            <option value="Odisha">Odisha</option>
                                            <option value="Puducherry">Puducherry</option>
                                            <option value="Punjab">Punjab</option>
                                            <option value="Rajasthan">Rajasthan</option>
                                            <option value="Sikkim">Sikkim</option>
                                            <option value="Tamil Nadu">Tamil Nadu</option>
                                            <option value="Telangana">Telangana</option>
                                            <option value="Tripura">Tripura</option>
                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                            <option value="Uttarakhand">Uttarakhand</option>
                                            <option value="West Bengal">West Bengal</option>
                                        </select>
                                </div>
                            </div>

                            <div class="row no-gutters">
                                <div class="col-md-6 form-group">
                                    <div class="custom-select-form">
                                        <select class="wide add_bottom_15" name="customer-address-type" id="customer-address-type">
                                            <option value="">Adress Type</option>
                                            <option value="home">Home</option>
                                            <option value="office">Office</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row no-gutters ">
                                <div class="col-md-12 d-flex justify-content-end">
                                    <div class="mx-2">
                                        <button class="btn_1 outline" id="cancel-address-form-btn">Cancel</button>
                                    </div>
                                    <div class="">
                                        <button class="btn_1" id="submit-address-form-btn">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
			`);

			console.log("form shown");
		});


		$(document).on("click", "#submit-address-form-btn", function(e){
			e.preventDefault();
			console.log("address form submit  btn clicked");
			let customer_name=$("#customer-name").val();
			let customer_mobile_number=$("#customer-mobile-number").val();
			let customer_pincode=$("#customer-pincode").val();
			let customer_locality=$("#customer-locality").val();
			let customer_full_address=$("#customer-full-address").val();
			let customer_city=$("#customer-city").val();
			let customer_state=$("#customer-state").val();
			let customer_address_type=$("#customer-address-type").val();

			if(customer_name=='')
			{
				alert("Please enter name");
			}
			else if(!validateName(customer_name))
			{
				alert("Name should not contain number");
			}
			else if(customer_mobile_number=='')
			{
				alert("Please enter mobile number");
			}
			else if(!validateMobileNumber(customer_mobile_number))
			{
				alert("Please enter a valid mobile number");
			}
			else if(customer_pincode=='')
			{
				alert("Please enter pin code");
			}
			else if(!isValidPinCode(customer_pincode))
			{
				alert("Please enter a valid pin code");
			}
			else if(customer_locality=='')
			{
				alert("Please enter locality");
			}
			else if(customer_full_address=='')
			{
				alert("Please enter address");
			}
			else if(customer_city=='')
			{
				alert("Please enter city");
			}
			else if(customer_state=='')
			{
				alert("Please select state");
			}
			else if(customer_address_type=='')
			{
				alert("Please select Address type");
			}
			else
			{

				let formData=new FormData();

				formData.append('customer-name', customer_name);
				formData.append('customer-mobile-number', customer_mobile_number);
				formData.append('customer-pincode', customer_pincode);
				formData.append('customer-locality', customer_locality);
				formData.append('customer-full-address', customer_full_address);
				formData.append('customer-city', customer_city);
				formData.append('customer-state', customer_state);
				formData.append('customer-address-type', customer_address_type);
				$.ajax({
					url: "api/addAddressApi.php",
					type: "POST",
					data: formData,
					contentType: false,
					processData: false,
					success: function(data){
						if(data==1)
						{

							console.log("inserted");
							
							location.reload();

						}
						else if(data==0)
						{
							alert("could not insert");
						}
						else
						{
							console.log(data);
						}
					}
				});
				console.log(customer_name, customer_mobile_number, customer_pincode, customer_locality, customer_full_address, customer_city, customer_state);
			}
		});

		// code for when on cancel address form
		$(document).on("click", "#cancel-address-form-btn", function(e) {
			e.preventDefault();

			$('#add-new-address-btn').show();
			
			$('.address-form-container').html('');

			console.log("form removed");
		});


		// code for when on cancel address form
		$(document).on("click", ".buy-now-btn", function(e) {
			e.preventDefault();

			let product_id=$(this).data("product-id");
			let product_count=$('#quantity-value').val();

			$.ajax({
				url: "api/addToCartApi.php",
				type: "POST",
				data: {product_id: product_id, product_count: product_count},
				success: function(data) {
					if (data == 0) {
						console.log(product_id, "could not added to the cart");
					} else if (data == 1) {
						status = true;
						console.log(product_id, "added to the cart");
						window.location.href = $('.buy-now-btn').attr('href');
					} else if (data == 2) {
						console.log("please log in");
						window.location.href = "login.php";
					} else if (data == 3) {
						console.log(product_id, "updated to the cart");
						window.location.href = $('.buy-now-btn').attr('href');
					} else if (data == 4) {
						console.log(product_id, "could not updated to the cart");
					} else {
						console.log(data);
					}
				}
			});

		});


		//000000000000000000000000000000000000000000000000000000000000000000000000
		//  code for pay on delivery
		//000000000000000000000000000000000000000000000000000000000000000000000000
		$(document).on("click", "#place-order-btn", function(e){
			e.preventDefault();
			console.log("pay on delivery");
			let address_id=$('input[name="address-id"]:checked').val();
			let product_id=$('input[name="product-id"]').val();

			
			let backend_captcha=$('.captcha').attr('data-captcha');
			let user_captcha=parseInt($('#customer-captcha').val());
			
			console.log(backend_captcha, user_captcha);
			if($('input[name="address-id"]:checked').length === 0)
			{
				alert("Please Select Address");
			}
			else if(backend_captcha=='' || user_captcha=='')
			{
				alert("Please Enter Captcha Code");
			}
			else if(backend_captcha!=user_captcha)
			{
				alert("Please Enter Valid Captcha Code");
			}
			
			else if(backend_captcha==user_captcha)
			{
				console.log('Order completed');
				$.ajax({
					url: "api/storeOrderDetailsApi.php",
					type: "POST",
					data: {product_id: product_id, address_id: address_id, payment_mode: 'pod'},
					success: function(data)
					{
						data=JSON.parse(data)
						console.log(data);

						if(data.status===1)
						{
							console.log("Successfully ordered");
							window.open(`${$('#place-order-btn').attr('href')}?oid=${data.order_id}`, '_self');
						}
						else if(data.status===0)
						{
							console.log("Failed to order");
							// window.location.href = $('#place-order-btn').attr('href');
						}
						else
						{
							console.log(data);
						}
					}
				});
				console.log(product_id, address_id);
			}

		});

		//000000000000000000000000000000000000000000000000000000000000000000000000
		//  code for pay on delivery on whole cart
		//000000000000000000000000000000000000000000000000000000000000000000000000
		$(document).on("click", "#place-cart-order-btn", function(e){
			e.preventDefault();
			console.log("cart pay on delivery");
			let address_id=$('input[name="address-id"]:checked').val();
			let product_id=$('input[name="product-id"]').val();

			
			let backend_captcha=$('.captcha').attr('data-captcha');
			let user_captcha=parseInt($('#customer-captcha').val());
			
			console.log(backend_captcha, user_captcha);
			if($('input[name="address-id"]:checked').length === 0)
			{
				alert("Please Select Address");
			}
			else if(backend_captcha=='' || user_captcha=='')
			{
				alert("Please Enter Captcha Code");
			}
			else if(backend_captcha!=user_captcha)
			{
				alert("Please Enter Valid Captcha Code");
			}
			else if(backend_captcha==user_captcha)
			{
				console.log('Order completed');
				$.ajax({
					url: "api/storeCartOrderDetailsApi.php",
					type: "POST",
					data: {address_id: address_id, payment_mode: 'pod'},
					success: function(data)
					{
						data=JSON.parse(data)
						console.log(data);

						if(data.status===1)
						{
							console.log("Successfully ordered");
							window.open(`${$('#place-cart-order-btn').attr('href')}`, '_self');
						}
						else if(data.status===0)
						{
							console.log("Failed to order");
							// window.location.href = $('#place-order-btn').attr('href');
						}
						else
						{
							console.log(data);
						}
					}
				});
				console.log(address_id);
			}

		});


		// code for when on cancel address form
		$(document).on("click", ".cancel-order-btn", function(e) {
			e.preventDefault();

			let order_id=$(this).data("order-id");
			if(confirm('Do You Realy want to cancel the order'))
			{
				$.ajax({
					url: "api/cancelOrderApi.php",
					type: "POST",
					data: {order_id: order_id},
					success: function(data) {
						if (data == 0) {
							console.log(order_id, "could't cancel the order");
						} 
						else if (data == 1) {
							console.log(order_id, "order canceled ");
							location.reload();
						} 
						else {
							console.log(data);
						}
					}
				});
			}

		});




		//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
		// function coding area  
		//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
		function loadWishlistItems()
		{
			$.ajax({
				url: "api/loadWishlistItemsApi.php",
				type: "POST",
				data: {},
				success: function(data) {
					$('.wishlist-items-container').html(data);
				}
			});
		}

		// function for validating email
		function validateEmail(email) {
			let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
			return emailRegex.test(email);
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
			var numberPattern = /@[-+]?\d+(\.\d+)?$/;
			return numberPattern.test(str);
		}

		// Helper function to validate pincode format
		function isValidPinCode(pincode) {
			var pincodeRegex = /^\d{6}$/;
			return pincodeRegex.test(pincode);
		}

		// function for validate the mobile number 
        function validateMobileNumber(mobileNumber) {
            // Regular expression for mobile number validation
            const regex = /^[0-9]{10}$/;

            if (regex.test(mobileNumber)) {
                // Mobile number is valid
                return true;
            }

            // Mobile number is not valid
            return false;
        }

		// function for loading cart count
		function cartItemCount() {
			$.ajax({
				url: "api/cartItemCountApi.php",
				type: "POST",
				data: {},
				success: function(data) {
					$(".cart-count").html(data);
				}
			});
		}

		//code for generating random number
		function generateRandomNumber()
		{
			var min = 1000;
			var max = 9999;
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}
	});
</script>

</body>

</html>