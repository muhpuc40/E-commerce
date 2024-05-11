<?php
    ob_start();
    session_start();
    include '../conn.php';
    $id = $_REQUEST['Pid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>SAILOR - Fashion</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <?php include 'navbar.php' ; ?>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Right Side Cart Area ##### -->
    <?php include 'Side_Cart.php' ; ?>
    <!-- ##### Right Side Cart End ##### -->

    <!-- ##### Single Product Details Area Start ##### -->
    <?php
              $details = "SELECT * FROM product WHERE status = 1 and id = $id";
              $r = mysqli_query($conn, $details);
              while ($row = mysqli_fetch_array($r)) {
              $pd = $row['id'];
              $x = "SELECT name FROM images WHERE pid = $pd";
              $y = mysqli_query($conn, $x);
            ?>
    <section class="single_product_details_area d-flex align-items"> <!-- align-items-center -->
        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix">
            <div class="product_thumbnail_slides owl-carousel">
            <?php
                while ($images = mysqli_fetch_array($y)) {
            ?> 
                <img src="../Seller/assets/<?php echo $images['name']; ?>">
            <?php 
                }
            ?>
            </div>
        </div>

        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">
            
            <span> <?php echo $row['category']; ?></span>
            <a href="#">
                <h2><?php echo $row['name']; ?></h2>
            </a>
            <p class="product-price"><span class="old-price">$550</span> <?php echo $row['price']; ?> </p>
            <p class="product-desc"><?php echo $row['description']; ?></p>

            <!-- Form -->
            <form class="cart-form clearfix" method="post">
                <!-- Select Box -->
                <div class="select-box d-flex mt-50 mb-30">
                <?php
                    $Size = "SELECT name FROM size WHERE Pid = $pd";
                    $r = mysqli_query($conn, $Size);
                    ?>
                    <select name="select" id="productSize" class="mr-5" class="form-control">
                        <option value="">Select Size</option>
                        <?php while ($row = $r->fetch_assoc()) { 
                            $sid = $row['id'];
                        ?>
                        <option value="<?php echo $sid; ?>">Size : <?php echo $row['name']; ?></option>
                        <?php } ?>
                    </select>
                    <?php
                    $Color = "SELECT name FROM color WHERE Pid = $pd";
                    $r = mysqli_query($conn, $Color);
                    ?>
                    <select name="select" class="form-control" id="productColor">
                        <option value="">Select Color</option>
                        <?php while ($row = $r->fetch_assoc()) { 
                            $cid = $row['id'];
                        ?>
                        <option value="<?php echo $cid; ?>"><?php echo $row['name']; ?></option>
                        <?php } ?>
                
                    </select>
                </div>
                <!-- Cart & Favourite Box -->
                <div class="cart-fav-box d-flex align-items-center">
                    <!-- Cart -->
                    <button type="submit" name="addtocart" value="5" class="btn essence-btn">Add to cart</button>
                    <!-- Favourite -->
                    <div class="product-favourite ml-4">
                        <a href="#" class="favme fa fa-heart"></a>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <?php } ?>

    <section class="new_arrivals_area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>You May Like that</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
        <div class="row">
    <div class="col-12">
        <div class="popular-products-slides owl-carousel">
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
                ?>
                <!-- Single Product -->
                <div class="single-product-wrapper">
                    <!-- Product Image -->
                    <div class="product-img">
                        <img src="../Seller/assets/<?php echo $image1; ?>" alt="">
                        <!-- Hover Thumb -->
                        <img class="hover-img" src="../Seller/assets/<?php echo $image2; ?>" alt="">
                        <!-- Favourite -->
                        <div class="product-favourite">
                            <a href="" class="favme fa fa-heart"></a>
                        </div>
                    </div>
                    <!-- Product Description -->
                    <div class="product-description ">
                        <span><?php echo $row['category']; ?></span>
                        <a href="single-product-details.php?Pid=<?php echo $row['id'] ?>">
                            <h6><?php echo $row['name']; ?></h6>
                        </a>
                        <p class="product-price"><?php echo $row['price']; ?></p>
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <!-- Add to Cart -->
                            <div class="add-to-cart-btn">
                                <a href="#" class="btn essence-btn">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

        </div>
    </section>
    <!-- ##### Single Product Details Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row">
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area d-flex mb-30">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="#"><img src="img/core-img/logo2.png" alt=""></a>
                        </div>
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <ul>
                                <li><a href="shop.html">Shop</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area mb-30">
                        <ul class="footer_widget_menu">
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Payment Options</a></li>
                            <li><a href="#">Shipping and Delivery</a></li>
                            <li><a href="#">Guides</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms of Use</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row align-items-end">
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area">
                        <div class="footer_heading mb-30">
                            <h6>Subscribe</h6>
                        </div>
                        <div class="subscribtion_form">
                            <form action="#" method="post">
                                <input type="email" name="mail" class="mail" placeholder="Your email here">
                                <button type="submit" class="submit"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area">
                        <div class="footer_social_area">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>

<div class="row mt-5">
                <div class="col-md-12 text-center">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>, distributed by <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>

        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Classy Nav js -->
    <script src="js/classy-nav.min.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>


</body>

</html>


<?php ob_end_flush(); ?>