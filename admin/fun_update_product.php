<?php
session_start();
include "admin_db.php";

$target_dir = "store/";
$filename = basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . $filename;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$id = $_POST['id'];
$PNAME = $_POST['nama_produk'];
$PDESC = $_POST['deskripsi_produk'];
$PVALUE = $_POST['harga_produk'];

function generateUniqueFileName($dir, $name, $ext) {
    $counter = 1;
    $name = pathinfo($name, PATHINFO_FILENAME);
    while (file_exists($dir . $name . '_' . $counter . '.' . $ext)) {
        $counter++;
    }
    return $name . '_' . $counter . '.' . $ext;
}

// check awal
if ($_FILES["fileToUpload"]["size"] > 0) {
    // apakah file img?
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        exit(); 
    }

    //check file size buffer
    $maxFileSize = 30000000; // 
    $allowedFormats = ["jpg", "png", "jpeg", "gif"];
    if ($_FILES["fileToUpload"]["size"] > $maxFileSize || !in_array($imageFileType, $allowedFormats)) {
        echo "file mu terlalu besar.";
        exit(); 
    }

    // rename file juga sudah ada
    if (file_exists($target_file)) {
        $filename = generateUniqueFileName($target_dir, $filename, $imageFileType);
        $target_file = $target_dir . $filename;
    }

    // ulangi insert data
    if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "maaf terjadi kesalahan .";
        exit(); 
    }
}

// update
$sql = "UPDATE products SET nama_produk=?, deskripsi_produk=?, harga_produk=?, gambar_produk=? WHERE id=?";
$stmt = mysqli_prepare($con, $sql);
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ssisi", $PNAME, $PDESC, $PVALUE, $target_file, $id);
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Product $PNAME berhasil di update')</script>";
        header('location: admin_home.php');
        exit();
    } else {
        echo "<script>alert('Product $PNAME gagal di update')</script>";
        exit(); 
    }
} else {
    echo "Database error.";
    exit();
}
?>
