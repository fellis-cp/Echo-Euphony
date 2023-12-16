<?php
session_start();
include 'admin_db.php';

if(isset($_POST['submit3'])){
    $id = $_POST['id'];
    
    // Fetch the image file associated with the product ID
    $sql = "SELECT p_image FROM products WHERE id = $id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $imageToDelete = $row['p_image'];

    // Delete the product
    $deleteQuery = "DELETE FROM products WHERE id = $id";
    if(mysqli_query($con, $deleteQuery)){
        // Delete the image file only if it's not being used by other products
        $checkImageQuery = "SELECT COUNT(*) AS total FROM products WHERE p_image = '$imageToDelete'";
        $checkResult = mysqli_query($con, $checkImageQuery);
        $row = mysqli_fetch_assoc($checkResult);
        $totalCount = $row['total'];
        
        // If the image is not used by any other product, delete it from the server
        if($totalCount == 0){
            unlink($imageToDelete);
        }
        echo "<script>alert('Product deleted successfully')</script>";
        header('location: admin_home.php');
        exit();
    } else {
        echo "<script>alert('Failed to delete product')</script>";
    }
}
?>
