<?php
    ob_start();
    include '../conn.php';
    session_start();
    //authentication
    if(!isset($_SESSION['user'])){
        header('Location: ../logout.php');
    }
    //Authorization
   if($_SESSION['user'] != 'seller'){
      header('Location: ../unauthorized.php');
    }
    $seller_id = $_SESSION['user_id'];
    $qry="SELECT * FROM product where Sid =  $seller_id";
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
    <!-- End Plugin css for this page -->
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
          <h3>Product Status</h3>    
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                    <table class="table">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Category</th>
                              <th>Price</th>
                              <th>Stock</th>
                              <th>Size</th>
                              <th>Color</th>
                              <th>Description</th>
                              <th>Status</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                          while ($row = mysqli_fetch_array($r)) {
                              $pd = $row['id'];
                          ?>
                              <tr>
                                  <td><?php echo $row['id'] ?></td>
                                  <td><?php echo $row['name'] ?></td>
                                  <td><?php echo $row['category'] ?></td>
                                  <td><?php echo $row['price'] ?></td>
                                  <td><?php echo $row['stock'] ?></td>
                                  <td>
                                      <?php
                                      $qry1 = "SELECT name FROM size where pid = $pd";
                                      $r_size = mysqli_query($conn, $qry1);
                                      $sizes = array();
                                      while ($size_row = mysqli_fetch_array($r_size)) {
                                          $sizes[] = $size_row['name'];
                                      }
                                      echo implode(", ", $sizes);
                                      ?>
                                  </td>
                                  <td>
                                      <?php
                                      $qry2 = "SELECT name FROM color where pid = $pd";
                                      $r_color = mysqli_query($conn, $qry2);
                                      $color = array();
                                      while ($color_row = mysqli_fetch_array($r_color)) {
                                          $color[] = $color_row['name'];
                                      }
                                      echo implode(", ", $color);
                                      ?>
                                  </td>
                                  <td>
                                      <?php
                                      $description = $row['description'];
                                      $max_length = 5; // Maximum length of description before truncation
                                      if (strlen($description) > $max_length) {
                                          // Truncate the description
                                          $short_description = substr($description, 0, $max_length) . '...';
                                          echo '<span class="short-description">' . $short_description . '</span>';
                                          // Hidden span for full description
                                          echo '<span class="full-description" style="display: none;">' . $description . '</span>';
                                          // Show "Read more / Read less" button
                                          echo '<a href="#" onclick="toggleDescription(this)"> Read more</a>';
                                      } else {
                                          // If description is shorter than max length, display it as is
                                          echo $description;
                                      }
                                      ?>
                                  </td>
                                  <td>
                                      <?php
                                      $status = $row['status'];
                                      if ($status == 0) {
                                          echo '<div class="badge badge-outline-warning">Pending...</div>';
                                      } elseif ($status == 1) {
                                          echo '<div class="badge badge-outline-success">Approved</div>';
                                      } elseif ($status == 2) {
                                          echo '<div class="badge badge-outline-danger">Rejected</div>';
                                      } else {
                                          echo '<div class="badge badge-outline-secondary">Unknown</div>';
                                      }
                                      ?>
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
    <script>
    function toggleDescription(btn) {
        var shortDescription = btn.parentNode.querySelector('.short-description');
        var fullDescription = btn.parentNode.querySelector('.full-description');

        if (shortDescription.style.display === "none") {
            shortDescription.style.display = "inline";
            fullDescription.style.display = "none";
            btn.innerHTML = " Read more";
        } else {
            shortDescription.style.display = "none";
            fullDescription.style.display = "inline";
            btn.innerHTML = " Read less";
        }
    }
    </script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>

<?php ob_end_flush();
?>