<?php 
    include '../conn.php';
?>
<?php
    $id = $_REQUEST['Cid'];
    $s = "update seller_login set status=1 where id=$id";
    if(mysqli_query($conn, $s)){
        header('Location: seller_pending.php');
    }

?>