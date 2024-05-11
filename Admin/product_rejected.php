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
    $qry="SELECT * FROM product where status = 2";
    $r=mysqli_query($conn,$qry);
    
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
            <div class="content-wrapper"> <h2>All Approved Product</h2>  
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <!-- <th>Select</th> -->
                            <th> Id</th>
                            <th> Name</th>
                            <th>Details</th>
                            <th> Category</th>
                            <th> Color </th>
                            <th> Size </th>
                            <th> Image </th>
                            <th> Status </th>
                          </tr>
                        </thead>
                        <tbody>
<?php
while ($row = mysqli_fetch_array($r)) {
    $pd = $row['id'];
?>
    <tr>
        <!-- <td>
            <div class="form-check form-check-muted m-0">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                </label>
            </div>
        </td> -->
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['description'] ?></td>
        <td><?php echo $row['category'] ?></td>
        <td>
            <?php    
            $qry1 = "SELECT name FROM size where pid = $pd";
            $r_size = mysqli_query($conn, $qry1);
            // Fetching all size names related to the product
            $sizes = array();
            while ($size_row = mysqli_fetch_array($r_size)) {
                $sizes[] = $size_row['name'];
            }
            // Displaying all size names separated by commas
            echo implode(",<br><br> ", $sizes);
            ?>
        </td>
        <td>
        <?php    
            $qry2 = "SELECT name FROM color where pid = $pd";
            $r_color = mysqli_query($conn, $qry2);
            // Fetching all size names related to the product
            $color = array();
            while ($color_row = mysqli_fetch_array($r_color)) {
                $color[] = $color_row['name'];
            }
            // Displaying all size names separated by commas
            echo implode(",<br><br> ", $color);
            ?>
        </td>
        <td>
                      <?php 
                                    $x = "SELECT name FROM images WHERE pid = $pd";
                                    $y = mysqli_query($conn, $x);
                      while ($images = mysqli_fetch_array($y)) {
                        ?> 
          <div class="slider" >

                          <img src="../Seller/assets/<?php echo $images['name']; ?>" style="width: 50%; height: auto;">
                        <?php 
                          }
                        ?>
          <div>

        </td>
        <td>
        <button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter<?php echo $row['id'] ?>">Delete</button>
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
                            to Delete <?php echo $row['name']; ?>
                            </div>
                            
                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>      
                              <a class="btn btn-danger" href="product_action.php?action=delete&id=<?php echo $row['id'] ?>">Yes</a>
                            </div>
                            
                          </div>
                        </div>
                      </div>
        </td>
    </tr>
<?php } ?>
</tbody>

                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->

          <!-- partial -->
        </div>
        <!-- main-panel ends -->          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © minhaj.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Visit <a href="https://github.com/muhpuc40" target="_blank">https://github.com/muhpuc40</a></span>
            </div>
          </footer>
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
    <script>
  $(document).ready(function(){
    $('.slider').slick({
      slidesToShow: 1, // Number of slides to show at a time
      slidesToScroll: 1, // Number of slides to scroll
      autoplay: true, // Autoplay the slider
      autoplaySpeed: 2000, // Autoplay speed in milliseconds
     // infinite: true, // Loop the slider
      dots: true, // Show navigation dots
      arrows: true // Show navigation arrows
    });
  });
</script>

  </body>
</html>

<?php ob_end_flush(); ?>







