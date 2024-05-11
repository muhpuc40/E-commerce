<!doctype html>
<html lang="en">

<head>
  	<title>Fashion Template for Bootstrap</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,900" rel="stylesheet"> 
	
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
	<!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/owl-carousel.css" rel="stylesheet">
	 <link href="css/lightbox.css" rel="stylesheet">
    <!-- Custom styles for this template -->
  </head>

<body>

 <?php include 'navbar.php'; ?> 
    <nav aria-label="breadcrumb" class="w-100 float-left">
        <ol class="breadcrumb parallax justify-content-center" data-source-url="img/banner/parallax.jpg" style="background-image: url(&quot;img/banner/parallax.jpg&quot;); background-position: 50% 0.809717%;">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">my-account</li>
        </ol>
    </nav>
    <div class="main-content w-100 float-left blog-list">
        <div class="container">
            <div class="row">
                
                <div class="products-grid col-xl-9 col-lg-8 order-lg-2">
                    <div class="row">
                        <div class="col-lg-12 order-lg-last account-content">
                            <h4>Edit Account Information</h4>
                            <form action="#" class="myacoount-form">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group required-field">
                                                    <label for="acc-name">First Name <span class="required">*</span></label>
                                                    <input type="text" class="form-control" id="acc-name" name="acc-name" required="">
                                                </div>
                                                <!-- End .form-group -->
                                            </div>
                                            <!-- End .col-md-4 -->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="acc-mname">Middle Name <span class="required">*</span></label>
                                                    <input type="text" class="form-control" id="acc-mname" name="acc-mname">
                                                </div>
                                                <!-- End .form-group -->
                                            </div>
                                            <!-- End .col-md-4 -->

                                            <div class="col-md-4">
                                                <div class="form-group required-field">
                                                    <label for="acc-lastname">Last Name <span class="required">*</span></label>
                                                    <input type="text" class="form-control" id="acc-lastname" name="acc-lastname" required="">
                                                </div>
                                                <!-- End .form-group -->
                                            </div>
                                            <!-- End .col-md-4 -->
                                        </div>
                                        <!-- End .row -->
                                    </div>
                                    <!-- End .col-sm-11 -->
                                </div>
                                <!-- End .row -->

                                <div class="form-group required-field">
                                    <label for="acc-email">Email</label>
                                    <input type="email" class="form-control" id="acc-email" name="acc-email" required="">
                                </div>
                                <!-- End .form-group -->

                                <div class="form-group required-field">
                                    <label for="account-password">Password</label>
                                    <input type="password" class="form-control" id="account-password" name="account-password" required="">
                                </div>
                                <!-- End .form-group -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="change-password-checkbox" value="1">
                                    <label class="custom-control-label" for="change-password-checkbox">Change Password</label>
                                </div>
                                <!-- End .custom-checkbox -->

                                <div id="account-change-password" class="">
                                    <h4>Change Password</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group required-field">
                                                <label for="account-pass2">Password</label>
                                                <input type="password" class="form-control" id="account-pass2" name="account-pass2">
                                            </div>
                                            <!-- End .form-group -->
                                        </div>
                                        <!-- End .col-md-6 -->

                                        <div class="col-md-6">
                                            <div class="form-group required-field">
                                                <label for="account-pass3">Confirm Password</label>
                                                <input type="password" class="form-control" id="account-pass3" name="account-pass3">
                                            </div>
                                            <!-- End .form-group -->
                                        </div>
                                        <!-- End .col-md-6 -->
                                    </div>
                                    <!-- End .row -->
                                </div>
                                <!-- End #account-chage-pass -->

                                <div class="required text-right">* Required Field</div>
                                <div class="form-footer d-flex justify-content-between align-items-center">
                                    <a href="#"><i class="material-icons">navigate_before</i>Back</a>

                                    <div class="form-footer-right">
                                        <button type="submit" class="btn btn-primary btn-primary">Save</button>
                                    </div>
                                </div>
                                <!-- End .form-footer -->
                            </form>
                        </div>
                    </div>
                </div>
				<div class="sidebar col-xl-3 col-lg-3 order-lg-1">
					<div class="sidebar-product left-sidebar w-100 float-left">
					<div class="title">
					<a data-toggle="collapse" href="#sidebar-product" aria-expanded="false" aria-controls="sidebar-product" class="d-lg-none block-toggler">sale products</a>
					</div>
					<div id="sidebar-product" class="collapse w-100 float-left">
					<div class="sidebar-block sale products">
					<h3 class="widget-title">sale products</h3>
							<div class="product-layouts">
			<div class="product-thumb">
				<div class="image col-sm-4 float-left">
					<a href="#">
						<img src="img/products/01.jpg" alt="01"/>										</a>									</div>
				<div class="thumb-description col-sm-8 text-left float-left">
					<div class="caption">
						<h4 class="product-title text-capitalize"><a href="product-details.html">aliquam quaerat voluptatem</a></h4>
					</div>
					<div class="price">
						<div class="regular-price">$100.00</div>
						<div class="old-price">$150.00</div>
					</div>
				</div>
			</div>
		</div>
							<div class="product-layouts">
								<div class="product-thumb">
									<div class="image col-sm-4 float-left">
										<a href="#">
											<img src="img/products/02.jpg" alt="01"/>										</a>									</div>
									<div class="thumb-description col-sm-8 text-left float-left">
										<div class="caption">
											<h4 class="product-title text-capitalize"><a href="product-details.html">aspetur autodit autfugit</a></h4>
										</div>
										<div class="price">
											<div class="regular-price">$100.00</div>
											<div class="old-price">$150.00</div>
										</div>
									</div>
								</div>
							</div>
							<div class="product-layouts">
								<div class="product-thumb">
									<div class="image col-sm-4 float-left">
										<a href="#">
											<img src="img/products/03.jpg" alt="03"/>										</a>									</div>
									<div class="thumb-description col-sm-8 text-left float-left">
										<div class="caption">
											<h4 class="product-title text-capitalize"><a href="product-details.html">magni dolores eosquies</a></h4>
										</div>
										<div class="price">
											<div class="regular-price">$100.00</div>
											<div class="old-price">$150.00</div>
										</div>
									</div>
								</div>
							</div>
					</div>
					</div>
					</div>
				</div>
            </div>
        </div>
    </div>

    <!-- Footer -->
 <?php include 'footer.php'; ?>
    <!-- Footer -->

    <!-- Register modal -->
    <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-medium text-left">Sign up</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-4">
                        <input type="text" id="RegisterForm-name" class="form-control validate" placeholder="Your name">
                    </div>
                    <div class="md-form mb-4">
                        <input type="email" id="RegisterForm-email" class="form-control validate" placeholder="Your email">
                    </div>
                    <div class="md-form mb-4">
                        <input type="password" id="RegisterForm-pass" class="form-control validate" placeholder="Your password">
                    </div>
                    <div class="checkbox-link d-flex justify-content-between">
                        <div class="left-col">
                            <input id="remember-me" type="checkbox">
                            <label for="remember_me">Remember Me</label>
                        </div>
                        <div class="right-col"><a href="#">Forget Password?</a></div>
                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-primary">Sign up</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Login modal -->
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-medium text-left">Sign in</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-4">
                        <input type="text" id="LoginForm-name" class="form-control validate" placeholder="Your name">
                    </div>
                    <div class="md-form mb-4">
                        <input type="password" id="LoginForm-pass" class="form-control validate" placeholder="Your password">
                    </div>
                    <div class="checkbox-link d-flex justify-content-between">
                        <div class="left-col">
                            <input type="checkbox" id="remember_me">
                            <label for="remember_me">Remember Me</label>
                        </div>
                        <div class="right-col"><a href="#">Forget Password?</a></div>
                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-primary">Sign in</button>
                </div>
            </div>
        </div>
    </div>

    <!-- product_view modal -->
    <div class="modal fade product_view" id="product_view" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			 <h4 class="modal-title w-100w-100w-100 font-weight-bold d-none">Quick view</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  <span aria-hidden="true">×</span>
	</button>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-6 left-columm">
						<div class="product-large-image tab-content">
						<div class="tab-pane active" id="product-1" role="tabpanel" aria-labelledby="product-tab-1">
							<div class="single-img img-full">
								<a href="img/products/01.jpg"><img src="img/products/01.jpg" class="img-fluid" alt=""></a>
							</div>
						</div>
						<div class="tab-pane" id="product-2" role="tabpanel" aria-labelledby="product-tab-2">
							<div class="single-img">
								<a href="img/products/02.jpg"><img src="img/products/02.jpg" class="img-fluid" alt=""></a>
							</div>
						</div>
						<div class="tab-pane" id="product-3" role="tabpanel" aria-labelledby="product-tab-3">
							<div class="single-img">
								<a href="img/products/03.jpg"><img src="img/products/03.jpg" class="img-fluid" alt=""></a>
							</div>
						</div>
						<div class="tab-pane" id="product-4" role="tabpanel" aria-labelledby="product-tab-4">
							<div class="single-img">
								<a href="img/products/04.jpg"><img src="img/products/04.jpg" class="img-fluid" alt=""></a>
							</div>
						</div>
						<div class="tab-pane" id="product-5" role="tabpanel" aria-labelledby="product-tab-5">
							<div class="single-img">
								<a href="img/products/05.jpg"><img src="img/products/05.jpg" class="img-fluid" alt=""></a>
							</div>
						</div>
				</div>
				<div class="small-image-list float-left w-100"> 
                                <div class="nav-add small-image-slider-single-product-tabstyle-3 owl-carousel" role="tablist">
                                    <div class="single-small-image img-full">
                                        <a data-toggle="tab" id="product-tab-1" href="#product-1" class="img active"><img src="img/products/01.jpg" class="img-fluid" alt=""></a>
                                    </div>
                                    <div class="single-small-image img-full">
                                        <a data-toggle="tab" id="product-tab-2" href="#product-2" class="img"><img src="img/products/02.jpg" class="img-fluid" alt=""></a>
                                    </div>
                                    <div class="single-small-image img-full">
                                        <a data-toggle="tab" id="product-tab-3" href="#product-3" class="img"><img src="img/products/03.jpg" class="img-fluid" alt=""></a>
                                    </div>
                                    <div class="single-small-image img-full">
                                        <a data-toggle="tab" id="product-tab-4" href="#product-4" class="img"><img src="img/products/04.jpg" class="img-fluid" alt=""></a>
                                    </div>
                                    <div class="single-small-image img-full">
                                        <a data-toggle="tab" id="product-tab-5" href="#product-5" class="img"><img src="img/products/05.jpg" class="img-fluid" alt=""></a>
                                    </div>
                                </div>
                            </div>
				</div>
				<div class="col-md-6 product_content">
					<h4 class="product-title text-capitalize">aliquam quaerat voluptatem</h4>
					<div class="rating">
					<div class="product-ratings d-inline-block align-middle">
																				<span class="fa fa-stack"><i class="material-icons">star</i></span>
									   <span class="fa fa-stack"><i class="material-icons">star</i></span>
									   <span class="fa fa-stack"><i class="material-icons">star</i></span>
									   <span class="fa fa-stack"><i class="material-icons off">star</i></span>
									   <span class="fa fa-stack"><i class="material-icons off">star</i></span>			</div>							</div>
					<span class="description float-left w-100">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>
					<h3 class="price float-left w-100"><span class="regular-price align-middle">$75.00</span><span class="old-price align-middle">$60.00</span></h3>
					
					<div class="product-variants float-left w-100">
						<div class="col-md-4 col-sm-6 col-xs-12 size-options d-flex align-items-center">
											<h5>Size:</h5>

								<select class="form-control" name="select">
											<option value="" selected="">Size</option>
											<option value="black">Medium</option>
											<option value="white">Large</option>
											<option value="gold">Small</option>
											<option value="rose gold">Extra large</option>
								</select>
						</div>
						<div class="color-option d-flex align-items-center">
                                        <h5>color :</h5>
                                        <ul class="color-categories">
                                            <li class="active">
                                                <a class="tt-pink" href="#" title="Pink"></a>
                                            </li>
                                            <li>
                                                <a class="tt-blue" href="#" title="Blue"></a>
                                            </li>
                                            <li>
                                                <a class="tt-yellow" href="#" title="Yellow"></a>
                                            </li>
                                        </ul>
                                    </div>
					</div>
					<div class="btn-cart d-flex align-items-center float-left w-100">
						<h5>qty:</h5>
						<input value="1" type="number">
						<button type="button" class="btn btn-primary"><i class="material-icons">shopping_cart</i> Add To Cart</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

    <!-- cart-pop modal -->
    <div class="modal fade" id="cart-pop" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header alert-success">
			 <h4 class="modal-title w-100w-100w-100">Product successfully added to your shopping cart</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  <span aria-hidden="true">×</span>
	</button>
		</div>
		<div class="modal-body">
			<div class="row">
			<div class="col-md-6 divide-right">
			<div class="row">
				<div class="col-md-5 col-xs-4 product-img float-left">
					<img src="img/products/01.jpg" class="img-responsive" alt="01">
				</div>
				<div class="col-md-7 col-xs-8 product-desc float-left">
					<h4 class="product-title text-capitalize">aliquam quaerat voluptatem</h4>
					<div class="rating">
					<div class="product-ratings">
					<span class="fa fa-stack"><i class="material-icons">star</i></span>
				   <span class="fa fa-stack"><i class="material-icons">star</i></span>
				   <span class="fa fa-stack"><i class="material-icons">star</i></span>
				   <span class="fa fa-stack"><i class="material-icons off">star</i></span>
				   <span class="fa fa-stack"><i class="material-icons off">star</i></span></div></div>
					<h3 class="price float-left w-100"><span class="regular-price align-middle">$75.00</span><span class="old-price align-middle">$60.00</span></h3>
				</div>
			</div>
			</div>
				<div class="col-md-6 divide-left">
					<p class="cart-products-count">There are 2 items in your cart.</p>
					<p class="total-products float-left w-100">
						<strong>Total products:</strong> $150.00
					</p>
					<p class="shipping float-left w-100">
						<strong>Total shipping:</strong> free
					</p>
					<p class="total-price float-left w-100">
						<strong>Total:</strong> $150.00(tax incl.)
					</p>
					<div class="cart-content-btn float-left w-100">
					<form action="#">
                      <input class="btn pull-right mt_10 btn-primary" value="Continue shopping" type="submit">
                    </form>
					<form action="checkout_page.html">
                      <input class="btn pull-right mt_10 btn-primary" value="Proceed to checkout" type="submit">
                    </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/custom.js"></script>
		<script src="js/parallax.js"></script>
		<script src="js/lightbox-2.6.min.js"></script>
		<script src="js/ResizeSensor.min.js"></script>
		<script src="js/theia-sticky-sidebar.min.js"></script>
		<script src="js/inview.js"></script>
		<script src="js/cookiealert.js"></script>
		<script src="js/jquery.countdown.min.js"></script>
		<script src="js/masonry.pkgd.min.js"></script>
		<script src="js/imagesloaded.pkgd.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
	<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ac1aabb4b401e45400e4197/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->	
		
		</body>
</html>