<?php
    ob_start();
    session_start();
    include '../conn.php';
    $encryption = $_REQUEST['Pid'];
	$ciphering = "AES-128-CTR";
	$iv_length = openssl_cipher_iv_length($ciphering);
	$options = 0;
	$decryption_iv = '2104010202211000';
	$decryption_key = "MinhajSianaPola";
	$id=openssl_decrypt ($encryption, $ciphering, $decryption_key, $options, $decryption_iv);
	?>
	


<!doctype html>
<html lang="en">
  <head>
  	<title>Fashion</title>

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

  <body id="product">
  	
  <?php include 'navbar.php'; ?>
    
<nav aria-label="breadcrumb" class="w-100 float-left">
  <ol class="breadcrumb parallax justify-content-center" data-source-url="img/banner/parallax.jpg" style="background-image: url(&quot;img/banner/parallax.jpg&quot;); background-position: 50% 0.809717%;">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Shop</li>
  </ol>
</nav>
	<div class="product-deatils-section float-left w-100">
	<?php
              $details = "SELECT * FROM product WHERE status = 1 and id = $id";
              $r = mysqli_query($conn, $details);
              while ($row = mysqli_fetch_array($r)) {
              $pd = $row['id'];
              $x = "SELECT name FROM images WHERE pid = $pd";
              $y = mysqli_query($conn, $x);
            ?>
		<div class="container">
			<div class="row">
				<div class="left-columm col-lg-5 col-md-5">
				<div class="slider" id="">
                        <?php
                          while ($images = mysqli_fetch_array($y)) {
                        ?> 
                          <img src="../Seller/assets/<?php echo $images['name']; ?>" height="301" width="385">
                        <?php 
                          }
                        ?>
                      </div>
				</div>
				<div class="right-columm col-lg-7 col-md-7">
					<div class="product-information">
					<h4 class="product-title text-capitalize float-left w-100"><a class="float-left w-100"><h2><?php echo $row['name']; ?></h2></a></h4>
					<div class="description"> <?php echo $row['description']; ?> </div>


																<div class="price float-left w-100 d-flex">
												<div class="regular-price"><?php echo 'Tk ',$row['price']; ?></div>

											</div>
											<div class="product-variants float-left w-100">
						<div class="col-md-3 col-sm-6 col-xs-12 size-options d-flex align-items-center">
											<h5>Size:</h5>

											<?php
											$Size = "SELECT name FROM size WHERE Pid = $pd";
											$r = mysqli_query($conn, $Size);
											?>
								<select  class="form-control" name="select">
									<option value="">Select</option>
									<?php while ($row = $r->fetch_assoc()) { 
										$sid = $row['id'];
									?>
									<option value="<?php echo $sid; ?>"><?php echo $row['name']; ?></option>
									<?php } ?>
								</select>
						</div>
						<div class="color-option d-flex align-items-center">
								<h5>color :</h5>
								<ul class="color-categories">
									<li type="radio" class="checkbox">
										<a class="tt-pink" title="Pink"></a>
									</li>
									<li>
										<a class="tt-blue" title="Blue"></a>
									</li>
									<li>
										<a class="tt-yellow" title="Yellow"></a>
									</li>
								</ul>
							</div>
					</div>
											<div class="btn-cart d-flex align-items-center float-left w-100"> 
						<h5>qty:</h5>
						<input value="1" type="number">
						<button type="button" class="btn btn-primary btn-cart m-0" data-target="#cart-pop" data-toggle="modal"><i class="material-icons">shopping_cart</i> Add To Cart</button>
					</div>
					<div class="tt-links d-flex align-items-center float-left w-100 mb-15">
										<a class="link btn-compare"><i class="material-icons">equalizer</i><span>Compare</span></a>
					<a href="wishlist.html" class="link btn-wishlist"><i class="material-icons">favorite</i><span>wishlist</span></a>
					</div>
					<div class="social-sharing float-left w-100">
						<ul class="d-flex">
							<li class="facebook">
							<a href="#" target="_blank" class="facebook_link">
								<svg class="svg-icon" viewBox="0 0 20 20" width="30px" height="30px">
									<path fill="#666" d="M11.344,5.71c0-0.73,0.074-1.122,1.199-1.122h1.502V1.871h-2.404c-2.886,0-3.903,1.36-3.903,3.646v1.765h-1.8V10h1.8v8.128h3.601V10h2.403l0.32-2.718h-2.724L11.344,5.71z"></path>
								</svg>
							</a>
							</li>
							
							<li class="twitter">
							<a href="#" target="_blank" class="twitter_link">
							<svg class="svg-icon" viewBox="0 0 20 20" width="30px" height="30px">
							<path fill="#666" d="M18.258,3.266c-0.693,0.405-1.46,0.698-2.277,0.857c-0.653-0.686-1.586-1.115-2.618-1.115c-1.98,0-3.586,1.581-3.586,3.53c0,0.276,0.031,0.545,0.092,0.805C6.888,7.195,4.245,5.79,2.476,3.654C2.167,4.176,1.99,4.781,1.99,5.429c0,1.224,0.633,2.305,1.596,2.938C2.999,8.349,2.445,8.19,1.961,7.925C1.96,7.94,1.96,7.954,1.96,7.97c0,1.71,1.237,3.138,2.877,3.462c-0.301,0.08-0.617,0.123-0.945,0.123c-0.23,0-0.456-0.021-0.674-0.062c0.456,1.402,1.781,2.422,3.35,2.451c-1.228,0.947-2.773,1.512-4.454,1.512c-0.291,0-0.575-0.016-0.855-0.049c1.588,1,3.473,1.586,5.498,1.586c6.598,0,10.205-5.379,10.205-10.045c0-0.153-0.003-0.305-0.01-0.456c0.7-0.499,1.308-1.12,1.789-1.827c-0.644,0.28-1.334,0.469-2.06,0.555C17.422,4.782,17.99,4.091,18.258,3.266"></path>
						</svg>
						</a>
							</li>
							
							<li class="google">
							<a href="#" target="_blank" class="google_link">
							<svg class="svg-icon" viewBox="0 0 20 20" width="30px" height="30px">
							<path fill="#666" d="M8.937,10.603c-0.383-0.284-0.741-0.706-0.754-0.837c0-0.223,0-0.326,0.526-0.758c0.684-0.56,1.062-1.297,1.062-2.076c0-0.672-0.188-1.273-0.512-1.71h0.286l1.58-1.196h-4.28c-1.717,0-3.222,1.348-3.222,2.885c0,1.587,1.162,2.794,2.726,2.858c-0.024,0.113-0.037,0.225-0.037,0.334c0,0.229,0.052,0.448,0.157,0.659c-1.938,0.013-3.569,1.309-3.569,2.84c0,1.375,1.571,2.373,3.735,2.373c2.338,0,3.599-1.463,3.599-2.84C10.233,11.99,9.882,11.303,8.937,10.603 M5.443,6.864C5.371,6.291,5.491,5.761,5.766,5.444c0.167-0.192,0.383-0.293,0.623-0.293l0,0h0.028c0.717,0.022,1.405,0.871,1.532,1.89c0.073,0.583-0.052,1.127-0.333,1.451c-0.167,0.192-0.378,0.293-0.64,0.292h0C6.273,8.765,5.571,7.883,5.443,6.864 M6.628,14.786c-1.066,0-1.902-0.687-1.902-1.562c0-0.803,0.978-1.508,2.093-1.508l0,0l0,0h0.029c0.241,0.003,0.474,0.04,0.695,0.109l0.221,0.158c0.567,0.405,0.866,0.634,0.956,1.003c0.022,0.097,0.033,0.194,0.033,0.291C8.752,14.278,8.038,14.786,6.628,14.786 M14.85,4.765h-1.493v2.242h-2.249v1.495h2.249v2.233h1.493V8.502h2.252V7.007H14.85V4.765z"></path>
						</svg>
						</a>
							</li>
							
							<li class="pinterest">
							<a href="#" target="_blank" class="pinterest_link">
							<svg class="svg-icon" viewBox="0 0 20 20" width="30px" height="30px">
							<path fill="#666" d="M9.797,2.214C9.466,2.256,9.134,2.297,8.802,2.338C8.178,2.493,7.498,2.64,6.993,2.935C5.646,3.723,4.712,4.643,4.087,6.139C3.985,6.381,3.982,6.615,3.909,6.884c-0.48,1.744,0.37,3.548,1.402,4.173c0.198,0.119,0.649,0.332,0.815,0.049c0.092-0.156,0.071-0.364,0.128-0.546c0.037-0.12,0.154-0.347,0.127-0.496c-0.046-0.255-0.319-0.416-0.434-0.62C5.715,9.027,5.703,8.658,5.59,8.101c0.009-0.075,0.017-0.149,0.026-0.224C5.65,7.254,5.755,6.805,5.948,6.362c0.564-1.301,1.47-2.025,2.931-2.458c0.327-0.097,1.25-0.252,1.734-0.149c0.289,0.05,0.577,0.099,0.866,0.149c1.048,0.33,1.811,0.938,2.218,1.888c0.256,0.591,0.33,1.725,0.154,2.483c-0.085,0.36-0.072,0.667-0.179,0.993c-0.397,1.206-0.979,2.323-2.295,2.633c-0.868,0.205-1.519-0.324-1.733-0.869c-0.06-0.151-0.161-0.418-0.101-0.671c0.229-0.978,0.56-1.854,0.815-2.831c0.243-0.931-0.218-1.665-0.943-1.837C8.513,5.478,7.816,6.312,7.579,6.858C7.39,7.292,7.276,8.093,7.426,8.672c0.047,0.183,0.269,0.674,0.23,0.844c-0.174,0.755-0.372,1.568-0.587,2.31c-0.223,0.771-0.344,1.562-0.56,2.311c-0.1,0.342-0.096,0.709-0.179,1.066v0.521c-0.075,0.33-0.019,0.916,0.051,1.242c0.045,0.209-0.027,0.467,0.076,0.621c0.002,0.111,0.017,0.135,0.052,0.199c0.319-0.01,0.758-0.848,0.917-1.094c0.304-0.467,0.584-0.967,0.816-1.514c0.208-0.494,0.241-1.039,0.408-1.566c0.12-0.379,0.292-0.824,0.331-1.24h0.025c0.066,0.229,0.306,0.395,0.485,0.52c0.56,0.4,1.525,0.77,2.573,0.523c1.188-0.281,2.133-0.838,2.755-1.664c0.457-0.609,0.804-1.313,1.07-2.112c0.131-0.392,0.158-0.826,0.256-1.241c0.241-1.043-0.082-2.298-0.384-2.981C14.847,3.35,12.902,2.17,9.797,2.214"></path>
							</svg>
						</a>
							</li>
							
						
						</ul>
					</div>
					</div>

				</div>
			</div>
		</div> <?php } ?>
	</div>
	<div class="product-tab-area float-left w-100">
	<div class="container">
					<div class="tabs">
					<ul class="nav nav-tabs justify-content-start">
						<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#product-tab1" id="tab1"><div class="tab-title">Description</div></a></li>
						<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#product-tab2" id="tab2"><div class="tab-title">Reviews (2)</div></a></li>
					</ul>
				</div>
					<div class="tab-content float-left w-100">
					  <div class="tab-pane active" id="product-tab1" role="tabpanel" aria-labelledby="tab1">
						  <div class="description">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis viverra purus, non viverra nulla. Sed vehicula libero eu lectus eleifend volutpat. Sed et placerat arcu. Proin mi leo, interdum eu tortor at, euismod gravida velit. Fusce non enim lectus. Duis euismod, lorem vitae pharetra rhoncus, ligula risus elementum nunc, at interdum eros nunc eget augue. Donec dapibus nec diam ut tempor. Duis malesuada neque turpis, ut congue ipsum euismod eget. Sed egestas ipsum enim, sed semper magna auctor non. Praesent risus nunc, ultricies vel velit nec, fringilla venenatis sem. Nunc condimentum, elit sed posuere accumsan, mauris nisl ornare metus, nec hendrerit quam velit ut nibh. Vivamus sodales neque vel sodales porta. Mauris hendrerit felis in mi auctor posuere. Mauris a consequat sapien, eget condimentum risus. Curabitur iaculis lorem non pretium varius. In hac habitasse platea dictumst.
						  </div>
					  </div>
					  <div class="tab-pane" id="product-tab2" role="tabpanel" aria-labelledby="tab2">
					  	<div class="reviews-tab  float-left w-100">
							<div class="ttreview-tab float-left w-100 p-30">
							  <h2>Customer Reviews</h2>
							  <div class="rating float-left w-100">
													<div class="product-ratings d-inline-block align-middle">
														<span class="fa fa-stack"><i class="material-icons">star</i></span>
													   <span class="fa fa-stack"><i class="material-icons">star</i></span>
													   <span class="fa fa-stack"><i class="material-icons">star</i></span>
													   <span class="fa fa-stack"><i class="material-icons off">star</i></span>
													   <span class="fa fa-stack"><i class="material-icons off">star</i></span>
													</div>
													</div>
							  <div class="review-title float-left w-100"><span class="user">admin</span> <span class="date">– February 14, 2019</span></div>
							  <div class="review-desc  float-left w-100">Aliquam at ipsum tellus. Donec arcu est, posuere quis orci vel, commodo cursus augue. </div>
							</div>
							  <form action="#" class="rating-form float-left w-100">
                                    <h5>Add your rating</h5>
                                   <div class="rating">
													<div class='rating-stars text-left'>
    <ul id='stars'>
      <li class='star' title='Poor' data-value='1'>
   <i class="material-icons">star</i>
      </li>
      <li class='star' title='Fair' data-value='2'>
   <i class="material-icons">star</i>
      </li>
      <li class='star' title='Good' data-value='3'>
   <i class="material-icons">star</i>
      </li>
      <li class='star' title='Excellent' data-value='4'>
   <i class="material-icons">star</i>
      </li>
      <li class='star' title='WOW!!!' data-value='5'>
   <i class="material-icons">star</i>
      </li>
    </ul>
  </div>
   <div class='success-box'>
    <div class='clearfix'></div>
    <div class='text-message text-success'></div>
    <div class='clearfix'></div>
  </div>
													</div>
													<div class="row d-block">
													
													<div class="col-sm-6 float-left form-group">
									 <label>Name <span class="required">*</span></label>
                                    <input type="text" placeholder="" required="">
									</div>
									<div class="col-sm-6 float-left form-group">
									 <label>Email <span class="required">*</span></label>
                                    <input type="email" placeholder="" id="r-email" required>
									</div>
									<div class="col-sm-12 float-left form-group">
									 <label for="r-textarea">Your Review</label>
                                    <textarea name="review" id="r-textarea" cols="30" rows="10" class="w-100"></textarea>
									</div>
									</div>
                                   <input type="submit" class="btn btn-primary submit" value="Submit Review">
                                </form>
							</div>
							
					</div>
	</div>
	</div>
	</div>
	<div id="product-accessories" class="product-accessories my-40 w-100 float-left">
			<div class="container">
					<div class="row">
							<div class="tt-title d-inline-block float-none w-100 text-center">You might also like</div>
							<div class="product-accessories-content products grid owl-carousel">
							<div class="product-layouts">
								<div class="product-thumb">
									<div class="image zoom">
										<a href="product-details.html">
											<img src="img/products/01.jpg" alt="01"/>
											<img src="img/products/02.jpg" alt="02" class="second_image img-responsive"/>										</a>									</div>
									<div class="thumb-description">
										<div class="caption">
											<h4 class="product-title text-capitalize"><a href="product-details.html">aliquam quaerat voluptatem</a></h4>
										</div>
										<div class="rating">
											<div class="product-ratings d-inline-block align-middle">
												<span class="fa fa-stack"><i class="material-icons">star</i></span>
											   <span class="fa fa-stack"><i class="material-icons">star</i></span>
											   <span class="fa fa-stack"><i class="material-icons">star</i></span>
											   <span class="fa fa-stack"><i class="material-icons off">star</i></span>
											   <span class="fa fa-stack"><i class="material-icons off">star</i></span>
											   </div>
										   </div>
										<div class="price">
											<div class="regular-price">$100.00</div>
											<div class="old-price">$150.00</div>
										</div>
										<div class="button-wrapper">	
										<div class="button-group text-center">
												<button type="button" class="btn btn-primary btn-cart" data-target="#cart-pop" data-toggle="modal"><i class="material-icons">shopping_cart</i><span>Add to cart</span></button>
												<a href="wishlist.html" class="btn btn-primary btn-wishlist"><i class="material-icons">favorite</i><span>wishlist</span></a>
												<button type="button" class="btn btn-primary btn-compare"><i class="material-icons">equalizer</i><span>Compare</span></button>
												<button type="button" class="btn btn-primary btn-quickview"  data-toggle="modal" data-target="#product_view"><i class="material-icons">visibility</i><span>Quick View</span></button>
											</div>									
											</div>
									</div>
								</div>
							</div>
							<div class="product-layouts">
								<div class="product-thumb">
									<div class="image zoom">
										<a href="product-details.html">
											<img src="img/products/02.jpg" alt="02"/>	
											<img src="img/products/03.jpg" alt="03" class="second_image img-responsive"/>									</a>									</div>
									<div class="thumb-description">
										<div class="caption">
											<h4 class="product-title text-capitalize"><a href="product-details.html">aspetur autodit autfugit</a></h4>
										</div>
										<div class="rating">
									<div class="product-ratings d-inline-block align-middle">
												<span class="fa fa-stack"><i class="material-icons">star</i></span>
											   <span class="fa fa-stack"><i class="material-icons">star</i></span>
											   <span class="fa fa-stack"><i class="material-icons">star</i></span>
											   <span class="fa fa-stack"><i class="material-icons off">star</i></span>
											   <span class="fa fa-stack"><i class="material-icons off">star</i></span>
											   </div>
										   </div>
										<div class="price">
											<div class="regular-price">$100.00</div>
											<div class="old-price">$150.00</div>
										</div>
										<div class="button-wrapper">	
										<div class="button-group text-center">
												<button type="button" class="btn btn-primary btn-cart" data-target="#cart-pop" data-toggle="modal"><i class="material-icons">shopping_cart</i><span>Add to cart</span></button>
												<a href="wishlist.html" class="btn btn-primary btn-wishlist"><i class="material-icons">favorite</i><span>wishlist</span></a>
												<button type="button" class="btn btn-primary btn-compare"><i class="material-icons">equalizer</i><span>Compare</span></button>
												<button type="button" class="btn btn-primary btn-quickview"  data-toggle="modal" data-target="#product_view"><i class="material-icons">visibility</i><span>Quick View</span></button>
											</div>			
																</div>
									</div>
								</div>
							</div>
							<div class="product-layouts">
								<div class="product-thumb">
									<div class="image zoom">
										<a href="product-details.html">
											<img src="img/products/03.jpg" alt="03"/>
											<img src="img/products/04.jpg" alt="04" class="second_image img-responsive"/>
																				</a>						
																							</div>
									<div class="thumb-description">
										<div class="caption">
											<h4 class="product-title text-capitalize"><a href="product-details.html">magni dolores eosquies</a></h4>
										</div>
										<div class="rating">
											<div class="product-ratings d-inline-block align-middle">
												<span class="fa fa-stack"><i class="material-icons">star</i></span>
											   <span class="fa fa-stack"><i class="material-icons">star</i></span>
											   <span class="fa fa-stack"><i class="material-icons">star</i></span>
											   <span class="fa fa-stack"><i class="material-icons off">star</i></span>
											   <span class="fa fa-stack"><i class="material-icons off">star</i></span>
											   </div>
										   </div>
										<div class="price">
											<div class="regular-price">$100.00</div>
											<div class="old-price">$150.00</div>
										</div>
										<div class="button-wrapper">	
										<div class="button-group text-center">
												<button type="button" class="btn btn-primary btn-cart" data-target="#cart-pop" data-toggle="modal"><i class="material-icons">shopping_cart</i><span>Add to cart</span></button>
												<a href="wishlist.html" class="btn btn-primary btn-wishlist"><i class="material-icons">favorite</i><span>wishlist</span></a>
												<button type="button" class="btn btn-primary btn-compare"><i class="material-icons">equalizer</i><span>Compare</span></button>
												<button type="button" class="btn btn-primary btn-quickview"  data-toggle="modal" data-target="#product_view"><i class="material-icons">visibility</i><span>Quick View</span></button>
											</div>									
										</div>
									</div>
								</div>
							</div>
							<div class="product-layouts">
								<div class="product-thumb">
									<div class="image zoom">
										<a href="product-details.html">
											<img src="img/products/04.jpg" alt="04"/>
											<img src="img/products/05.jpg" alt="05" class="second_image img-responsive"/>										</a>									</div>
									<div class="thumb-description">
										<div class="caption">
											<h4 class="product-title text-capitalize"><a href="product-details.html">voluptas nulla pariatur</a></h4>
										</div>
										<div class="rating">
											<div class="product-ratings d-inline-block align-middle">
												<span class="fa fa-stack"><i class="material-icons">star</i></span>
											   <span class="fa fa-stack"><i class="material-icons">star</i></span>
											   <span class="fa fa-stack"><i class="material-icons">star</i></span>
											   <span class="fa fa-stack"><i class="material-icons off">star</i></span>
											   <span class="fa fa-stack"><i class="material-icons off">star</i></span>
											   </div>								</div>
										<div class="price">
											<div class="regular-price">$100.00</div>
											<div class="old-price">$150.00</div>
										</div>
										<div class="button-wrapper">										
										<div class="button-group text-center">
												<button type="button" class="btn btn-primary btn-cart" data-target="#cart-pop" data-toggle="modal"><i class="material-icons">shopping_cart</i><span>Add to cart</span></button>
												<a href="wishlist.html" class="btn btn-primary btn-wishlist"><i class="material-icons">favorite</i><span>wishlist</span></a>
												<button type="button" class="btn btn-primary btn-compare"><i class="material-icons">equalizer</i><span>Compare</span></button>
												<button type="button" class="btn btn-primary btn-quickview"  data-toggle="modal" data-target="#product_view"><i class="material-icons">visibility</i><span>Quick View</span></button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="product-layouts">
								<div class="product-thumb">
									<div class="image zoom">
										<a href="product-details.html">
											<img src="img/products/05.jpg" alt="05"/>
											<img src="img/products/06.jpg" alt="06" class="second_image img-responsive"/>										</a>									</div>
									<div class="thumb-description">
										<div class="caption">
											<h4 class="product-title text-capitalize"><a href="product-details.html">aliquam quat voluptatem</a></h4>
										</div>
										<div class="rating">
											<div class="product-ratings d-inline-block align-middle">
												<span class="fa fa-stack"><i class="material-icons">star</i></span>
											   <span class="fa fa-stack"><i class="material-icons">star</i></span>
											   <span class="fa fa-stack"><i class="material-icons">star</i></span>
											   <span class="fa fa-stack"><i class="material-icons off">star</i></span>
											   <span class="fa fa-stack"><i class="material-icons off">star</i></span>
											   </div>
										   </div>
										<div class="price">
											<div class="regular-price">$100.00</div>
											<div class="old-price">$150.00</div>
										</div>
										<div class="button-wrapper">										
										<div class="button-group text-center">
												<button type="button" class="btn btn-primary btn-cart" data-target="#cart-pop" data-toggle="modal"><i class="material-icons">shopping_cart</i><span>Add to cart</span></button>
												<a href="wishlist.html" class="btn btn-primary btn-wishlist"><i class="material-icons">favorite</i><span>wishlist</span></a>
												<button type="button" class="btn btn-primary btn-compare"><i class="material-icons">equalizer</i><span>Compare</span></button>
												<button type="button" class="btn btn-primary btn-quickview"  data-toggle="modal" data-target="#product_view"><i class="material-icons">visibility</i><span>Quick View</span></button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="product-layouts">
								<div class="product-thumb">
									<div class="image zoom">
										<a href="product-details.html">
											<img src="img/products/06.jpg" alt="06"/>
												<img src="img/products/07.jpg" alt="07" class="second_image img-responsive"/>												</a>									</div>
									<div class="thumb-description">
										<div class="caption">
											<h4 class="product-title text-capitalize"><a href="product-details.html">voluptas sit aspernatur</a></h4>
										</div>
										<div class="rating">
											<div class="product-ratings d-inline-block align-middle">
												<span class="fa fa-stack"><i class="material-icons">star</i></span>
											   <span class="fa fa-stack"><i class="material-icons">star</i></span>
											   <span class="fa fa-stack"><i class="material-icons">star</i></span>
											   <span class="fa fa-stack"><i class="material-icons off">star</i></span>
											   <span class="fa fa-stack"><i class="material-icons off">star</i></span>
											   </div>
										   </div>
										<div class="price">
											<div class="regular-price">$100.00</div>
											<div class="old-price">$150.00</div>
										</div>
										<div class="button-wrapper">								
										<div class="button-group text-center">
												<button type="button" class="btn btn-primary btn-cart" data-target="#cart-pop" data-toggle="modal"><i class="material-icons">shopping_cart</i><span>Add to cart</span></button>
												<a href="wishlist.html" class="btn btn-primary btn-wishlist"><i class="material-icons">favorite</i><span>wishlist</span></a>
												<button type="button" class="btn btn-primary btn-compare"><i class="material-icons">equalizer</i><span>Compare</span></button>
												<button type="button" class="btn btn-primary btn-quickview"  data-toggle="modal" data-target="#product_view"><i class="material-icons">visibility</i><span>Quick View</span></button>
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
	<div class="block-newsletter"> 
				<div class="parallax" data-source-url="img/banner/parallax.jpg" style="background-image:url(img/banner/parallax.jpg); background-position:50% 65.8718%;">
				<div class="container">
					<div class="tt-newsletter col-sm-7">
							<h2 class="text-uppercase">Subscribe to our Newsletter</h2>
					</div>
					<div class="block-content col-sm-5">
					<form method="post" action="contact-us.html">
						<div class="input-group">
							<input type="email" name="email" value="" placeholder="Email address.." required="" class="form-control">
							<span class="input-group-btn">
			 <button class="btn btn-theme text-uppercase btn-primary" type="submit">Subscribe</button>
			 </span>
						</div>
					</form>
		</div>
				</div>
				</div>
			</div>
<footer class="page-footer font-small footer-default">
    <div class="container text-center text-md-left">
      <div class="row">
        <div class="col-md-2 footer-cms footer-column">
			<div class="ttcmsfooter">
              <div class="footer-logo"><img src="img/logos/footer-logo.png" alt="footer-logo"></div>
              <div class="footer-desc">At vero eos et accusamus et iusto odio dignissimos ducimus, duis faucibus enim vitae</div>
			  </div>
		</div>
        <div class="col-md-2 footer-column">
		<div class="title">
          <a href="#company" class="font-weight-normal text-capitalize mb-10" data-toggle="collapse" aria-expanded="false">company</a>		  </div>
          <ul id="company" class="list-unstyled collapse">
            <li>
              <a href="#">search</a>            </li>
            <li>
              <a href="#">New Products</a>            </li>
            <li>
              <a href="category.html">Best Collection</a>            </li>
            <li>
              <a href="wishlist.html">wishlist</a>            </li>
          </ul>
        </div>
        <div class="col-md-2 footer-column">
			<div class="title">
          <a href="#products" class="font-weight-normal text-capitalize mb-10" data-toggle="collapse" aria-expanded="false">products</a>		  </div>
          <ul id="products" class="list-unstyled collapse">
            <li>
              <a href="blog-details.html">blog</a>            </li>
            <li>
              <a href="about-us.html">about us</a>            </li>
            <li>
              <a href="contact-us.html">contact us</a>            </li>
            <li>
              <a href="my-account.html">my account</a>            </li>
          </ul>

        </div>
		<div class="col-md-2 footer-column">
					<div class="title">
          <a href="#account" class="font-weight-normal text-capitalize mb-10" data-toggle="collapse" aria-expanded="false">your account</a>		  </div>
  <ul id="account" class="list-unstyled collapse">
	<li>
	  <a href="blog-details.html">personal info</a>            </li>
	<li>
	  <a href="#">orders</a>            </li>
	<li>
	  <a href="contact-us.html">addresses</a>            </li>
	<li>
	  <a href="my-account.html">my wishlists</a>            </li>
  </ul>

</div>
        <div class="col-md-2 footer-column">
		<div class="title">
          <a href="#information" class="font-weight-normal text-capitalize mb-10" data-toggle="collapse" aria-expanded="false">store information</a>		  </div>
          <ul id="information" class="list-unstyled collapse">
            <li class="contact-detail links">
              <span class="address">
			  		<span class="icon"><i class="material-icons">location_on</i></span>
					<span class="data"> 4030, Central Bazzar, opp. Varachha Police Station, Varachha Main Road, Surat, Gujarat 395006, India</span>			  </span>            </li>
            <li class="links">
               <span class="contact">
			  		<span class="icon"><i class="material-icons">phone</i></span>
					<span class="data"><a href="tel:(99)55669999">+ (99) 55-669-999</a></span>			  </span>            </li>
            <li class="links">
               <span class="email">
			  		<span class="icon"><i class="material-icons">email</i></span>
					<span class="data"><a href="mailto:demo.store@gmail.com">demo.store@gmail.com</a></span> </span>             </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Copyright -->
	<div class="footer-bottom-wrap">
		<div class="container">
		<div class="row">
		<div class="footer-copyright text-center py-3">
              © 2019 - Boostrap theme by store™
		</div>
		</div>
    </div>
	</div>
         <a href="#" id="goToTop" title="Back to top" class="btn-primary"><i class="material-icons arrow-up">keyboard_arrow_up</i></a> 


  </footer>
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
					<div class="product-ratings d-inline-block align-middle">
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
                      <input class="btn pull-right mt_10 btn-secondary" value="Proceed to checkout" type="submit">
                    </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<div class="compare-wrapper float-left w-100">
	<div class="compare-inner d-flex align-items-center p-20">
		<span class="close"><i class='material-icons'>
  close
</i></span>
		<div class="col-sm-3 float-left d-flex align-items-center flex-column">
		<h2>compare products</h2>
		<div class="compare-btn">show all</div>
		</div>
		<div class="col-sm-9 d-flex float-left align-items-center">
			<div class="compare-close-btn"></div>
			<div class="compare-products d-flex col-sm-5">
			<div class="row">
				<div class="single-item col-sm-4">
					<div class="remove"></div>
					<div class="image"><img src="img/products/01.jpg" class="img-fluid" alt=""></div>
				</div>
				<div class="single-item col-sm-4">
					<div class="remove"></div>
					<div class="image"><img src="img/products/02.jpg" class="img-fluid" alt=""></div>
				</div>
				<div class="single-item col-sm-4">
					<div class="remove"></div>
					<div class="image"><img src="img/products/03.jpg" class="img-fluid" alt=""></div>
				</div>
			</div>
			</div>
			<div class="buttons col-sm-2">
				<div class="clear-btn btn btn-primary float-left w-100 mb-15">clear</div>
				<div class="compare-btn btn btn-primary float-left w-100">compare</div>
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
	<script src="js/parallax.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/ResizeSensor.min.js"></script>
	<script src="js/theia-sticky-sidebar.min.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/jquery.countdown.min.js"></script>
	<script src="js/masonry.pkgd.min.js"></script>
	<script src="js/imagesloaded.pkgd.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
      $(document).ready(function(){
        $('.slider').slick({
          autoplay: true,
          autoplaySpeed: 3000, // Adjust as per your requirement
          //dots: true, // If you want to show dots navigation
          // Add other settings/options as needed
        });
      });
    </script>

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





