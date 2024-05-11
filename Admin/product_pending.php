<?php
    ob_start();
    session_start();
    include '../conn.php';
    //authentication
    if(!isset($_SESSION['user'])){
        header('Location: ../logout.php');
    }
    //Authorization
   if($_SESSION['user'] != 'admin'){
      header('Location: ../unauthorized.php');
    }


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->

    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_sidebar.html -->
      <?php include 'sidebar.php'; ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->
        <?php  include 'navbar.php'; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <h3>Pending Product Details</h3>
            <?php
              $details = "SELECT * FROM product WHERE status = 0";
              $r = mysqli_query($conn, $details);
              while ($row = mysqli_fetch_array($r)) {
              $pd = $row['id'];
              $sd = $row['Sid'];
              $x = "SELECT name FROM images WHERE pid = $pd";
              $y = mysqli_query($conn, $x);
            ?>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="row">
                    <div class="col-md-1 col-sm-2 my-auto">
                    </div>
                    <div class="col-md-4 col-sm-2 my-auto">
                      <?php
                        echo "Seller ID : " . $row['Sid'] . "<br>";
                        echo "Product ID : " . $row['id'] . "<br>";               
                        echo "Category : " . $row['category'] . "<br>";
                        echo "Stock : " . $row['stock'] . "<br>";
                        echo "Price : " . $row['price'] . "<br>";
                       
                      ?>
                      
                      <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter<?php echo $row['id'] ?>">Accept</button>
                                            <!-- The Modal -->
                      <div class="modal fade" id="exampleModalCenter<?php echo $row['id'] ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                          
                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Are you Confirm ?</h4>
                              <button type="button" class="close" data-dismiss="modal">×</button>
                            </div>
                            
                            <!-- Modal body -->
                            <div class="modal-body">
                            to Accept <?php echo $row['name']; ?>
                            </div>
                            
                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>      
                              <a class="btn btn-success" href="product_action.php?action=approve&id=<?php echo $row['id'] ?>">Yes</a>
                            </div>
                            
                          </div>
                        </div>
                      </div>

                      <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter1<?php echo $row['id'] ?>">Reject</button>
                      <!-- The Modal -->
                      <div class="modal fade" id="exampleModalCenter1<?php echo $row['id'] ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                          
                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Are you Confirm ?</h4>
                              <button type="button" class="close" data-dismiss="modal">×</button>
                            </div>
                            
                            <!-- Modal body -->
                            <div class="modal-body">
                            to Reject <?php echo $row['name']; ?>
                            </div>
                            
                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>      
                              <a class="btn btn-danger" href="product_action.php?action=reject&id=<?php echo $row['id'] ?>">Yes</a>
                            </div>
                            
                          </div>
                        </div>
                      </div> 
                      
                    </div>
                    <div class="col-md-4 col-sm-2 my-auto">
                    <?php
                                $qry3 = "SELECT email FROM seller_login where id = $sd";
                                $r_seller = mysqli_query($conn, $qry3);
                                $seller_row = mysqli_fetch_array($r_seller);
                                echo 'Seller Email : '. $seller_row['email'] . '<br>';
                               
                                echo "Product Name : " . $row['name'] . "<br>";
                                $qry2 = "SELECT name FROM color where pid = $pd";
                                $r_color = mysqli_query($conn, $qry2);
                                // Fetching all size names related to the product
                                $color = array();
                                while ($color_row = mysqli_fetch_array($r_color)) {
                                    $color[] = $color_row['name'];
                                }
                                // Displaying all size names separated by commas
                                echo 'Color : ';
                                echo implode(", ", $color);
                                echo'<br>';
                                $qry1 = "SELECT name FROM size where pid = $pd";
                                $r_size = mysqli_query($conn, $qry1);
                                // Fetching all size names related to the product
                                $sizes = array();
                                while ($size_row = mysqli_fetch_array($r_size)) {
                                    $sizes[] = $size_row['name'];
                                }
                                // Displaying all size names separated by commas
                                echo 'Size : ';
                                echo implode(", ", $sizes);
                                echo "<br>Description : " . $row['description'] . "<br>";
                      ?>
                    </div>
                    <div class="col-md-1 col-sm-2 my-auto">
                    </div>
                    <div class="col-md-2">
                      <div class="slider" id="">
                        <?php
                          while ($images = mysqli_fetch_array($y)) {
                        ?> 
                          <img src="../Seller/assets/<?php echo $images['name']; ?>" style="width: 50%; height: auto;">
                        <?php 
                          }
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php 
            }
            ?>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Minhaj 2024</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Visit <a href="https://github.com/muhpuc40" target="_blank">https://github.com/muhpuc40</a> </span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
      $(document).ready(function(){
        $('.slider').slick({
          autoplay: true,
          autoplaySpeed: 2000, // Adjust as per your requirement
          //dots: true, // If you want to show dots navigation
          // Add other settings/options as needed
        });
      });
    </script>
  </body>
</html>
<?php ob_end_flush(); ?>