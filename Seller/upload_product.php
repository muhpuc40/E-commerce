<?php
    ob_start();
    session_start();
    include '../conn.php';
        //authentication
    if(!isset($_SESSION['user'])){
        header('Location: ../logout.php');
    }
    //Authorization
   if($_SESSION['user'] != 'seller'){
      header('Location: ../unauthorized.php');
    }
    $seller_id = $_SESSION['user_id'];
    
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
          <h3>Upload New Product</h3>   
            <div class="col-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <form class="form-sample" method="post" enctype="multipart/form-data">
                        <!-- <p class="card-description"> Admin will review </p> -->
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Name</label>
                              <div class="col-sm-9">
                              <input type="text" class="form-control"  name="name" id="name"  required >
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Category</label>
                              <div class="col-sm-9">
                                <select class="form-control" type="text" name="category" id="category" required>
                                  <option value="">Select</option>
                                  <option value="Man">Man</option>
                                  <option value="Women">Women</option>
                                  <option value="Kids">Kids</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Stock</label>
                              <div class="col-sm-9">
                              <input type="number" name="stock" id="stock" class="form-control" required>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row" >
                              <label class="col-sm-3 col-form-label">Price</label>
                              <div class="col-sm-9">
                              <input type="number" name="price" id="price" class="form-control" required>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Color</label>
                              <div class="col-sm-9">   
                                <button type="button" class="btn btn-success" onclick="color()">+</button>
                                <table class="table-responsive" id="color">
                                    <tbody>
                                        <tr>
                                            <td><input type="text" class="form-control"  name="color[]"></td>
                                        </tr>
                                    </tbody>
                                </table>
                             
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Size</label>
                              <div class="col-sm-9">   
                                <button type="button" class="btn btn-success" onclick="size()">+</button>
                                <table class="table-responsive" id="size">
                                    <tbody>
                                        <tr>
                                            <td><input type="text" class="form-control"  name="size[]"></td>
                                        </tr>
                                    </tbody>
                                </table>
                             
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea type="text" class="form-control" id="description" name="description" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                        <label for="usr">Image:</label>
                        <input type="file" class="form-control" id="image" name="image[]" multiple >
                        </div>
                        <div id="image_preview"></div>

                        <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="submitBtn">Save</button>
                      </div>
                      </form>

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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
    <script>
        $("#image").change(function(event) {
            $('#image_preview').html("");
            var total_file = document.getElementById("image").files.length;

            for (var i = 0; i < total_file; i++) {
                var img = $("<img>").attr({
                    src: URL.createObjectURL(event.target.files[i]),
                    width: "20%", 
                    height: "20%" 
                });

                $('#image_preview').append(img);
            }
        });
    </script>
            <script>
                function color(){
                    //alert("clicked");
                    var table = document.getElementById("color");
                    console.log(table);
                    var row = table.insertRow(-1);

                    var cell0 = row.insertCell(0);
                    var cell1 = row.insertCell(1);

                    
                    cell0.innerHTML = '<input type="text" class="form-control"  name="color[]">';
                    cell1.innerHTML = '<button class="btn btn-danger" onclick="removeRow(this)"> X </button>';
                }
                function removeRow( button ){
                    var row = button.parentNode.parentNode;
                    row.parentNode.removeChild(row);
                }
            </script>
                        <script>
                function size(){
                    //alert("clicked");
                    var table = document.getElementById("size");
                    console.log(table);
                    var row = table.insertRow(-1);

                    var cell8 = row.insertCell(0);
                    var cell9 = row.insertCell(1);

                    
                    cell8.innerHTML = '<input type="text" class="form-control"  name="size[]">';
                    cell9.innerHTML = '<button class="btn btn-danger" onclick="removeRow(this)"> X </button>';
                }
                function removeRow( button ){
                    var row = button.parentNode.parentNode;
                    row.parentNode.removeChild(row);
                }
            </script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>

<?php
    if(isset($_POST['submitBtn'])){
        $name = $_POST['name'];
        $category = $_POST['category'];
        $stock = $_POST['stock'];
        $price = $_POST['price'];
        $description=$_POST['description'];

        $query = "INSERT INTO product (Sid,name,category,stock, price, description,status) VALUES ($seller_id,'" . $name . "','" . $category . "', '$stock', '$price', '".$description."',0)";
        if(mysqli_query($conn, $query)){
            echo '<br><span style="color:red;">Successfully inserted name,cat,stock,price </span>';
            //$query2 = "SELECT * FROM product";
            $query2 = "SELECT id FROM product ORDER BY id DESC LIMIT 1";
            $result = mysqli_query($conn,$query2);
            //$pid=0;
            while ($row =mysqli_fetch_assoc($result)){
                $pid=  $row['id'];
            }
            $i=0;
            foreach($_FILES['image']['tmp_name'] as $key => $value){
                
                $i=$i+1;
                $image = $_FILES['image']['name'][$key];
                $splitted_name = explode(".",$image);
                $name = $splitted_name[0];
                $ext = $splitted_name[sizeof($splitted_name)-1];
                $new_name = md5(date('Y-m-d H:i:s') );
                $final_name = $new_name.$i.".".$ext;

                
                $query = "INSERT INTO images (pid, name) VALUES ($pid, '" . $final_name . "')";
                if(mysqli_query($conn, $query)){
                    echo '<br><span style="color:green;">Picture Successfully inserted </span>';
                    if(move_uploaded_file($_FILES["image"]["tmp_name"][$key], "assets/$final_name")){
                        echo '<br><span style="color:green;"> Successfully transfered </span>';
                    }
                }
            }
        }

        if (!empty($_POST['size'])) {
          foreach ($_POST['size'] as $value) {
            $color = "INSERT INTO size(pid,name)
                        VALUES (' $pid' ,'" . $value . "')";
            mysqli_query($conn, $color);
          }
        }

        if (!empty($_POST['color'])) {
          foreach ($_POST['color'] as $value) {
            $size = "INSERT INTO color(pid,name)
                        VALUES (' $pid' ,'" . $value . "')";
            mysqli_query($conn, $size);
          }
        }

      }
    ob_end_flush();
?>