<?php include '../conn.php'; 
session_start();
if(isset($_SESSION['user'])){
   if($_SESSION['user']=='admin'){
	   header('Location: dashboard.php');
   }
   else if($_SESSION['user']=='seller'){
	   header('Location: ../Seller/dashboard.php');
   }
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
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Login</h3>
                <form method="post">
                  <div class="form-group">
                    <label>Username or email *</label>
                    <input name="email" type="email" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input  name="password" type="password" class="form-control p_input">
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div>
                    <a href="#" class="forgot-pass">Forgot password</a>
                  </div>
                  <div class="text-center">
                    <button name="loginBtn" type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-facebook mr-2 col">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div>
                  <p class="sign-up">Don't have an Account?<a href="../register.php"> Sign Up</a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
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
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>

<?php 
    if(isset($_POST['loginBtn']))
	{
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "select * from admin_login where email='".$email."' 
        and password='".$password."'";
        $result = mysqli_query($conn, $query);
		    $admin = mysqli_fetch_array($result);

		    $query = "select * from seller_login where email='".$email."' 
        and password='".$password."'and status = 1";
        $result = mysqli_query($conn, $query);
		    $seller = mysqli_fetch_array($result);

        if($admin){
              // save user data into session
        $_SESSION['user'] = 'admin';
        $_SESSION['user_email'] = $admin['email'];
        $_SESSION['user_id']=$admin['id'];
                  header('Location: dashboard.php'); 
        exit();
              }
        else if($seller){
        // save user data into session
        $_SESSION['user'] = 'seller';
        $_SESSION['user_email'] = $seller['email'];
        $_SESSION['user_id']=$seller['id'];
        header('Location: ../Seller/dashboard.php'); 
        exit();
      }
        else {?>
          <div> Wrong  !!! </div><?php
            }
	}  
?>

	