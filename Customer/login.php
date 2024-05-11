<?php
    ob_start();
    session_start();
    include '../conn.php';
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
    <link rel="stylesheet" href="css/login.css">
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
    <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="img/bg-img/breadcumb.jpg" alt="">
        <div class="text">
          <span class="text-1">Every new friend is a <br> new adventure</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
      <div class="back">
        <!--<img class="backImg" src="images/backImg.jpg" alt="">-->
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
          <form method="post" action="#">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input name="email" type="email" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input name="password" type="password" placeholder="Enter your password" required>
              </div>
              <div class="text"><a href="#">Forgot password?</a></div>
              <div class="button input-box">
                <input  name="loginBtn" type="submit" value="Sumbit">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label></div>
            </div>
        </form>
      </div>
        <div class="signup-form">
          <div class="title">Signup</div>
        <form method="post" action="#">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input name="name" type="text" placeholder="Enter your name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input name="email" type="email" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input name="password" type="password" placeholder="Enter your password" required>
              </div>
              <div class="button input-box">
                <input  name="createBtn" type="submit" value="Sumbit">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
      </form>
    </div>
    </div>
    </div>
  </div>
    <!-- ##### Single Product Details Area End ##### -->

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
<?php 
    if(isset($_POST['loginBtn']))
	{
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "select * from customer_login where email='".$email."' 
        and password='".$password."'";
        $result = mysqli_query($conn, $query);
		    $customer = mysqli_fetch_array($result);


        if($customer){
              // save user data into session
        $_SESSION['user'] = 'customer';
        $_SESSION['user_email'] = $customer['email'];
        $_SESSION['user_id']=$customer['id'];
                  header('Location: index.php'); 
        exit();
              }
        else {?>
          <div> Wrong  !!! </div><?php
            }
	}  
?>

<?php 
    if(isset($_POST['createBtn'])){

      $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
            $str = "INSERT INTO customer_login(name,email,password)
            VALUES 
            ('".$name."','".$email."','".$password."')";
            if(mysqli_query($conn, $str)){
                echo 'Success !!!';
                header("Location: ".$_SERVER['PHP_SELF']);
                exit();
            }
        }

    

?>

<?php ob_end_flush(); ?>