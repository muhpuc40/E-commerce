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
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css">
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
            <div class="content-wrapper"> <h2>New Seller</h2>
                <div class="col-lg-22 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-dark" id="dataTable">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php 
                                    $qry="SELECT * FROM seller_login where status=1";
                                    $r=mysqli_query($conn,$qry);
                                    while($row=mysqli_fetch_array($r)){ ?>
                                            <tr>
                                            <td> <?php echo $row['id']?> </td>
                                            <td> <?php echo $row['email']?> </td>
                                            <td> <?php echo $row['password']?> </td>
                                            <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal1<?php echo $row['id']?>">Suspend</button>
                                          


  <!-- The Modal -->
  <div class="modal fade" id="myModal1<?php echo $row['id']?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Are you Confirm ?</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         to Suspend <?php echo $row['email']; ?>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>      
          <a class="btn btn-warning" href="seller_action.php?action=suspend&id=<?php echo $row['id'] ?>">Yes</a>
        </div>
        
      </div>
    </div>
  </div>



                                            </td>
                                            <td>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $row['id']?>">Delete</button>







  <!-- The Modal -->
  <div class="modal fade" id="myModal<?php echo $row['id']?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Are you Confirm ?</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         to Delete <?php echo $row['email']; ?>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>      
          <a class="btn btn-danger" href="seller_action.php?action=delete&id=<?php echo $row['id'] ?>">Yes</a>
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
            <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Minhaj 2024</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Visit <a href="https://github.com/muhpuc40" target="_blank">https://github.com/muhpuc40</a> </span>
            </div>
          </footer>
        </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          
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
    <script  src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script  src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script> new DataTable('#dataTable'); </script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>

<?php ob_end_flush();
?>