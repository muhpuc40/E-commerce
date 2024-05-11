<?php 
    include '../conn.php';
?>
<?php
    $id = $_REQUEST['Did'];
    $s = "update product set status=3 where id=$id";
    if(mysqli_query($conn, $s)){
        header('Location: seller_list.php');
    }

?>