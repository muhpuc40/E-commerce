<?php
  ob_start();
  include 'conn.php'; 
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="Admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="Admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="Admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="Admin/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3"> SignUp</h3>
                <form method="post">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" id="email" required onkeyup="checkEmail()">
                    <span class="text-danger" id="email-danger-span"></span>
                    <span class="text-success" id="email-success-span"></span>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" id="password" onkeyup="displaypwd()">
                    <span class="text-danger" id="pwd-danger-span"></span>
                    <span class="text-primary" id="pwd-medium-span"></span>
                    <span class="text-success" id="pwd-success-span"></span>
                  </div>
                  <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="cnf_password" class="form-control" id="cnf_pwd" onkeyup="checkPasswordMatch()">
                    <span class="text-success" id="cnf-pwd-match"></span>
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                   
                      <label class="form-check-label">
                      <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
                    
                  </div>
                  
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn"  name="submitBtn" id="button">Create</button>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-facebook col mr-2">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div>
                  
                  
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
    <script src="Admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="Admin/assets/js/off-canvas.js"></script>
    <script src="Admin/assets/js/hoverable-collapse.js"></script>
    <script src="Admin/assets/js/misc.js"></script>
    <script src="Admin/assets/js/settings.js"></script>
    <script src="Admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <script>
      //js
      var button = document.getElementById("button");
        button.disabled = true;
        function checkEmail(){           
          var email = document.getElementById("email").value;
          valids = ["gmail.com", "yahoo.com", "outlook.com"]
          if(email.indexOf('@') != -1 ){
            var domain = email.split('@')[1];
            for(let i=0; i<valids.length; i++){
              if(domain == valids[i]){
                document.getElementById("email-success-span").innerHTML = "valid email";
                document.getElementById("email-danger-span").innerHTML = "";
                button.disabled = true;
                break;
              
              }
              else{
                document.getElementById("email-success-span").innerHTML = "";
                document.getElementById("email-danger-span").innerHTML = "invalid email";
                button.disabled = true;
              }
            }              
          }
          else{
            document.getElementById("email-success-span").innerHTML = "";
              document.getElementById("email-danger-span").innerHTML = "";
              button.disabled = true;
          }
        }
        function displaypwd(){
          var pwd = document.getElementById("password").value;
        // alert(email.value);
        if(pwd.length<4){
          document.getElementById("pwd-danger-span").innerHTML = "Password not secure. Must 8 character long";
          document.getElementById("pwd-success-span").innerHTML = "";
          document.getElementById("pwd-medium-span").innerHTML = "";
          button.disabled = true;
        }
        else if(pwd.length<8){
          document.getElementById("pwd-medium-span").innerHTML = "Password medium secure. Give 8 character for better";
          document.getElementById("pwd-success-span").innerHTML = "";
          document.getElementById("pwd-danger-span").innerHTML = "";
          button.disabled = true;
        }
        else{
          document.getElementById("pwd-success-span").innerHTML = "Your password is secure";
          document.getElementById("pwd-danger-span").innerHTML = "";
          document.getElementById("pwd-medium-span").innerHTML = "";
          button.disabled = true;
        }
        }
      

      function checkPasswordMatch() {
        var pwd = document.getElementById("password").value;
        var cnfPwd = document.getElementById("cnf_pwd").value;

        if (pwd === cnfPwd && pwd !== "") {
          document.getElementById("cnf-pwd-match").innerHTML = "Password Matched";
          button.disabled = false;
        } else {
          document.getElementById("cnf-pwd-match").innerHTML = "";
          button.disabled = true;
        }
      }
    </script>
  </body>
</html>

<?php 
    if(isset($_POST['submitBtn'])){

        $email = $_POST["email"];
        $password = $_POST["password"];
            $str = "INSERT INTO seller_login(email,password,status)
            VALUES 
            ('".$email."','".$password."', 0)";
            if(mysqli_query($conn, $str)){
                echo 'Success !!!';
                header('Location: index.php');
            }
        }

    

?>