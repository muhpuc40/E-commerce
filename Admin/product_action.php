<?php 
  /*  include '../conn.php';
?>
<?php
    $id = $_REQUEST['Cid'];
    $s = "update product set status=1 where id=$id";
    if(mysqli_query($conn, $s)){
        header('Location: product_pending.php');
    }
*/


include '../conn.php';
?>
<?php
$action = $_GET['action'];
$id = $_GET['id'];

switch ($action) {
    case 'approve':
        $sql  = "update product set status=1 where id=$id";
        break;
    case 'reject':
        $sql = "update product set status=2 where id=$id";
        break;
    case 'delete':
        $str1 = "DELETE FROM color WHERE color.pid = $id";
        $str2 = "DELETE FROM size WHERE size.pid = $id";
        $str3 = "DELETE FROM product WHERE product.id = $id";
        break;
    default:
        // Handle unsupported actions
        break;
}

if (isset($sql)) {
    if(mysqli_query($conn, $sql)){
        header('Location: product_pending.php');
    } else {
        // Handle error
        echo "Error: " . mysqli_error($conn);
    }
}
if (isset($str1 , $str2, $str3)) {
    if(mysqli_query($conn, $str1) && mysqli_query($conn, $str2) && mysqli_query($conn, $str3)){
        header('Location: product_rejected.php');
    } else {
        // Handle error
        echo "Error: " . mysqli_error($conn);
    }
}
?>
