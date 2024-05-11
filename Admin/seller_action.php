<?php
include '../conn.php';
?>
<?php
$action = $_GET['action'];
$id = $_GET['id'];

switch ($action) {
    case 'approve':
        $sql = "UPDATE seller_login SET status = 1 WHERE id = $id";
        break;
    case 'suspend':
        $sql = "UPDATE seller_login SET status = 2 WHERE id = $id";
        break;
    case 'delete':
        $sql = "DELETE FROM seller_login WHERE id = $id";
        break;
    default:
        // Handle unsupported actions
        break;
}

if (isset($sql)) {
    if(mysqli_query($conn, $sql)){
        header('Location: seller_list.php');
    } else {
        // Handle error
        echo "Error: " . mysqli_error($conn);
    }
}
?>
