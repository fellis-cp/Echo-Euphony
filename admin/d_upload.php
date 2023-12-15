<?php
session_start();
include 'admin_db.php';
$target_dir = "store/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//include 'd_upload.php';

$id = $_POST['id'];


if (!isset($_GET['id'])) {
    echo $id;
    
    $sqlforunlink = "SELECT p_image from products where id=$id";
    $res = mysqli_query($con,$sqlforunlink);
    $rows= mysqli_fetch_assoc($res);
    //die;
    
    $sql = "DELETE FROM products WHERE id=$id";
    unlink($rows['p_image']);

    echo $sql;
    if(mysqli_query($con,$sql)){
        echo "<script>alert('Product has been Deleted')</script>";
    }else{
        echo "<script>alert('Product is not Deleted')</script>";    
    }

    
    header('location: admin_home.php');
}else{
    echo 'nope';
}
?>