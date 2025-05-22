<?php
    ob_start();
    session_start();
    include '../conn.php';
?>

<!doctype html>
<html lang="en">
  <head>
  	 <title>Victoria</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="E-commerce Devloped by Minhaj">
    <meta name="author" content="Minhaj Uddin Hassan">
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

  <body class="index layout1">

     <?php include 'navbar.php'; ?>
  <main>
      <!-- Main jumbotron for a primary marketing message or call to action -->
	<div class="slider-wrapper my-40 my-sm-25 float-left w-100">

		<div class="ttloading-bg"></div>
	  	<div class="slider slider-for owl-carousel">
			<div>
				<a href="#">
					<img src="img/slider/2.jpg" alt="" height="800" width="1600"/>
				</a>
				<div class="slider-content-wrap center effect_top">
				  <div class="slider-title mb-20 text-capitalize float-left w-100">our specials</div>
				  <div class="slider-subtitle mb-50 text-capitalize float-left w-100">fashion trend</div>
				  <div class="slider-button text-uppercase float-left w-100"><a href=" #">Shop Now</a></div>
				</div>
			</div>
			<div>
				<a href="#">
					<img src="img/slider/3.jpg" alt="" height="800" width="1600"/>
				</a>
				<div class="slider-content-wrap center effect_bottom">
				  <div class="slider-title mb-20 text-capitalize float-left w-100">EXPLORE OUR</div>
				  <div class="slider-subtitle mb-50 text-capitalize float-left w-100">fashion style</div>
				  <div class="slider-button text-uppercase float-left w-100"><a href=" #">Shop Now</a></div>
				</div>
			</div>
	  	</div>

	</div>
      
	<div class="main-content">
		<div id="main"> 
			<div id="hometab" class="home-tab my-40 my-sm-25 bottom-to-top hb-animate-element">
			<div class="container">
			<div class="row">
				<div class="tt-title d-inline-block float-none w-100 text-center">Trending Products</div>
				<div class="tabs">
					<ul class="nav nav-tabs justify-content-center">
						<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#ttfeatured-main" id="featured-tab"><div class="tab-title">Featured</div></a></li>
						<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#ttbestseller-main" id="bestseller-tab"><div class="tab-title">Bestseller</div></a></li>
					</ul>
				</div>
				<div class="tab-content float-left w-100">
						<div class="tab-pane active float-left w-100" id="ttfeatured-main" role="tabpanel" aria-labelledby="featured-tab">
							<section id="ttfeatured" class="ttfeatured-products">
								<div class="ttfeatured-content products grid owl-carousel" id="slider">
									<?php
									$details = "SELECT p.*, GROUP_CONCAT(i.name) as images 
									FROM product p 
									LEFT JOIN images i ON p.id = i.pid 
									WHERE p.status = 1 
									GROUP BY p.id";
									$r = mysqli_query($conn, $details);
									while ($row = mysqli_fetch_array($r)) {
									$images = explode(',', $row['images']); // Split images into an array
									$image1 = isset($images[0]) ? $images[0] : ''; // First image
									$image2 = isset($images[1]) ? $images[1] : ''; // Second image
									$simple_string = $row['id'];
									$ciphering = "AES-128-CTR";
									$iv_length = openssl_cipher_iv_length($ciphering);
									$options = 0;
									$encryption_iv = '2104010202211000';
									$encryption_key = "MinhajSianaPola";
									$encryption = openssl_encrypt($simple_string, $ciphering,
												$encryption_key, $options, $encryption_iv);
									?>
									<div class="product-layouts">
										<div class="product-thumb">
											<div class="image zoom">
											<a href="product-details.php?Pid=<?php echo $encryption ?>">
													<img  src="../Seller/assets/<?php echo $image1; ?>" alt="01" height="501" width="385"/>
													<img src="../Seller/assets/<?php echo $image2; ?>" alt="02" class="second_image img-responsive" height="501" width="385"/>			
												</a>	
											</div>
											<div class="thumb-description">
												<div class="caption">
													<h4 class="product-title text-capitalize"><a href="product-details.php?Pid=<?php echo $encryption ?>"><?php echo $row['name']; ?></a></h4>
												</div>
												<div class="price">
													<div class="regular-price"><?php echo 'Tk ',$row['price']; ?></div>
												</div>
												<div class="button-wrapper">	
												<div class="button-group text-center">
												<button type="button" class="btn btn-primary btn-cart" data-target="#cart-pop" data-toggle="modal"><i class="material-icons">shopping_cart</i><span>Add to cart</span></button>
														<a href="wishlist.html" class="btn btn-primary btn-wishlist"><i class="material-icons">favorite</i><span>wishlist</span></a>
														<button type="button" class="btn btn-primary btn-compare"><i class="material-icons">equalizer</i><span>Compare</span></button>
														<button type="button" class="btn btn-primary btn-quickview"  data-toggle="modal" data-target="#product_view<?php echo $row['id']; ?>">
														
														


														
														
														
														
														
														
														
														<i class="material-icons">visibility</i></button>
												</div>									
											</div>
											</div>
										</div>
									</div>
									<?php } ?>
								</div> 
							</section>
						</div>


						<div class="tab-pane float-left w-100" id="ttbestseller-main" role="tabpanel" aria-labelledby="bestseller-tab">
				  <section id="ttbestseller" class="ttbestseller-products">
					<div class="ttbestseller-content products grid owl-carousel" id="slider2">
					<?php
									$details = "SELECT p.*, GROUP_CONCAT(i.name) as images 
									FROM product p 
									LEFT JOIN images i ON p.id = i.pid 
									WHERE p.status = 1 
									GROUP BY p.id";
									$r = mysqli_query($conn, $details);
									while ($row = mysqli_fetch_array($r)) {
									$images = explode(',', $row['images']); // Split images into an array
									$image2 = isset($images[0]) ? $images[0] : ''; // First image
									$image1 = isset($images[1]) ? $images[1] : ''; // Second image

									?>

									<div class="product-layouts">
										<div class="product-thumb">
											<div class="image zoom">
												<a>
													<img  src="../Seller/assets/<?php echo $image1; ?>" alt="01" height="501" width="385"/>
													<img src="../Seller/assets/<?php echo $image2; ?>" alt="02" class="second_image img-responsive" height="501" width="385"/>			
												</a>	
											</div>
											<div class="thumb-description">
												<div class="caption">
													<h4 class="product-title text-capitalize"><a href="product-details.php?Pid=<?php echo $encryption ?>"><?php echo $row['name']; ?></a></h4>
												</div>
												<div class="price">
													<div class="regular-price"><?php echo 'Tk ',$row['price']; ?></div>
												</div>
												<div class="button-wrapper">	
												<div class="button-group text-center">
												<button type="button" class="btn btn-primary btn-cart" onclick="cart()" id="card"><i class="material-icons">shopping_cart</i><span>Add to cart</span></button>
														<a href="wishlist.html" class="btn btn-primary btn-wishlist"><i class="material-icons">favorite</i><span>wishlist</span></a>
														<button type="button" class="btn btn-primary btn-compare"><i class="material-icons">equalizer</i><span>Compare</span></button>
														<button type="button" class="btn btn-primary btn-quickview"  data-toggle="modal" data-target="#product_view<?php echo $simple_string ?>"><i class="material-icons">visibility</i><span>Quick View</span></button>
												</div>									
											</div>
											</div>
										</div>
									</div>
									<?php } ?>
					</div>
				</section>
				  </div>

				
				</div>
			</div>
			
			</div> 
			</div>
			<div id="ttspecial" class="ttspecial my-40 bottom-to-top hb-animate-element category-col-5">
			<div class="container">
					<div class="row">
							<div class="tt-title d-inline-block float-none w-100 text-center">Special Shirt Collection</div>
							<div class="ttspecial-content products grid owl-carousel" id="slider3">
							<?php
									$details = "SELECT p.*, GROUP_CONCAT(i.name) as images 
									FROM product p 
									LEFT JOIN images i ON p.id = i.pid 
									WHERE p.status = 1 and p.name like '%shirt' 
									GROUP BY p.id";
									$r = mysqli_query($conn, $details);
									while ($row = mysqli_fetch_array($r)) {
									$images = explode(',', $row['images']); // Split images into an array
									$image2 = isset($images[0]) ? $images[0] : ''; // First image
									$image1 = isset($images[1]) ? $images[1] : ''; // Second image

									?>

									<div class="product-layouts">
										<div class="product-thumb">
											<div class="image zoom">
												<a>
													<img  src="../Seller/assets/<?php echo $image1; ?>" alt="01" height="501" width="385"/>
													<img src="../Seller/assets/<?php echo $image2; ?>" alt="02" class="second_image img-responsive" height="501" width="385"/>			
												</a>	
											</div>
											<div class="thumb-description">
												<div class="caption">
													<h4 class="product-title text-capitalize"><a href="product-details.php?Pid=<?php echo $encryption ?>"><?php echo $row['name']; ?></a></h4>
												</div>
												<div class="price">
													<div class="regular-price"><?php echo 'Tk ',$row['price']; ?></div>
												</div>
												<div class="button-wrapper">	
												<div class="button-group text-center">
												<button type="button" class="btn btn-primary btn-cart" onclick="cart()" id="card"><i class="material-icons">shopping_cart</i><span>Add to cart</span></button>
														<a href="wishlist.html" class="btn btn-primary btn-wishlist"><i class="material-icons">favorite</i><span>wishlist</span></a>
														<button type="button" class="btn btn-primary btn-compare"><i class="material-icons">equalizer</i><span>Compare</span></button>
														<button type="button" class="btn btn-primary btn-quickview"  data-toggle="modal" data-target="#product_view<?php echo $simple_string ?>"><i class="material-icons">visibility</i><span>Quick View</span></button>
												</div>									
											</div>
											</div>
										</div>
									</div>
									<?php } ?>
							</div>
					</div>
			</div>
			</div>



			



			
			</div> 
			</div>
			
    </main>









	
    <!-- Footer -->
 <?php include 'footer.php'; ?>
  <!-- Footer -->
  <div class="alert text-center cookiealert" role="alert">
    <b>Do you like cookies?</b> We use cookies to ensure you get the best experience on our website. <a href="https://demo.templatetrip.com/Html/HTML001_victoria/" rel="noreferrer">learn more</a>

    <button type="button" class="btn btn-primary btn-sm acceptcookies" aria-label="Close">
        I agree
    </button>
</div>
  
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
		<input id="remember-me" type="checkbox"><label for="remember_me">Remember Me</label>
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
		<input type="checkbox" id="remember_me"><label for="remember_me">Remember Me</label>
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
<div class="modal fade product_view" id="product_view<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
								<a href="img/products/01.jpg"><img src="img/products/01.jpg" class="img-fluid" alt="" width="368" height="478"></a>
							</div>
						</div>
				</div>

				</div>
				<div class="col-md-6 product_content">
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
                                                <a class="tt-pink" href="#" title="Pink"></a>                                            </li>
                                            <li>
                                                <a class="tt-blue" href="#" title="Blue"></a>                                            </li>
                                            <li>
                                                <a class="tt-yellow" href="#" title="Yellow"></a>                                            </li>
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
	</div>
</div>
</div>


<div class="compare-wrapper float-left w-100">
	<div class="compare-inner d-flex align-items-center p-20">
		<span class="close"><i class='material-icons'>
  close
</i></span>
		<div class="col-xs-12 col-sm-2 col-md-3 float-left d-flex align-items-center flex-column compare-left">
		<h2>compare products</h2>
		<div class="compare-btn">show all</div>
		</div>
		<div class="col-xs-12 col-sm-10 col-md-9 d-flex float-left align-items-center compare-right">
			<div class="compare-close-btn"></div>
			<div class="compare-products d-flex col-sm-7 col-lg-5">
			<div class="row">
				<div class="single-item col-sm-4 col-xs-4">
					<div class="remove"></div>
					<div class="image"><img src="img/products/01.jpg" class="img-fluid" alt=""></div>
				</div>
				<div class="single-item col-sm-4 col-xs-4">
					<div class="remove"></div>
					<div class="image"><img src="img/products/02.jpg" class="img-fluid" alt=""></div>
				</div>
				<div class="single-item col-sm-4 col-xs-4">
					<div class="remove"></div>
					<div class="image"><img src="img/products/03.jpg" class="img-fluid" alt=""></div>
				</div>
			</div>
			</div>
			<div class="buttons col-sm-5 col-lg-2">
				<a href="compare.html" class="compare-btn btn btn-secondary float-left w-100 mb-15">compare</a>
				<div class="clear-btn btn btn-primary float-left w-100">clear</div>
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
		<script src="js/jquery.lazy.min.js"></script>
		<script>
		$('#slider').owlCarousel({
    loop: true,
	autoplay: false,   
    margin: 10,
    nav: false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})


		$('#slider2').owlCarousel({
    loop: true,
	autoplay: true,   
    margin: 10,
    nav: false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})

$('#slider3').owlCarousel({
    loop: true,
	autoplay: true,   
    margin: 10,
    nav: false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})

		</script>
		    <script>
                function carut(){
                    alert("Product Added");

                }


        $('#card').toast({
    heading: 'Positioning',
    text: 'Use the predefined ones, or specify a custom position object.',
    position: 'top-right',
    stack: false
})
    </script>

		</body>
</html>
<?php ob_end_flush();
?>