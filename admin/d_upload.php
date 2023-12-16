<?php
session_start();
include 'admin_db.php';

if(isset($_POST['submit3'])){
    $id = $_POST['id'];
    
    // fetch image file
    $sql = "SELECT p_image FROM products WHERE id = $id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $imageToDelete = $row['p_image'];

    // Delete dari db
    $deleteQuery = "DELETE FROM products WHERE id = $id";
    if(mysqli_query($con, $deleteQuery)){
        // Delete the image file only if it's not being used by other products
        $checkImageQuery = "SELECT COUNT(*) AS total FROM products WHERE p_image = '$imageToDelete'";
        $checkResult = mysqli_query($con, $checkImageQuery);
        $row = mysqli_fetch_assoc($checkResult);
        $totalCount = $row['total'];
        
        // jika img tidak di gunakan di produk lain hapus
        if($totalCount == 0){
            unlink($imageToDelete);
        }
        echo "<script>alert('Product berhasil di delete')</script>";
        header('location: admin_home.php');
        exit();
    } else {
        echo "<script>alert('Gagal menghapus product')</script>";
    }
}
?>
