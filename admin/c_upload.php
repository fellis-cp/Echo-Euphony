<?php
session_start();
include 'admin_db.php';

$target_dir = "store/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$PNAME = $_POST['pname'];
$PDESC = $_POST['pdesc'];
$PVALUE = $_POST['pvalue'];

// cek file 
if (isset($_POST["submit1"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check buffer file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "File terlalu besar harap.";
    $uploadOk = 0;
}

// format apa yang dipakai
$allowedFormats = ["jpg", "png", "jpeg", "gif"];
if (!in_array($imageFileType, $allowedFormats)) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "maaf, file anda tidak bisa di upload.";
} else {
    // insert ke db
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        // File upload succeeded, proceed with database insertion
        $sql = "INSERT INTO products (nama_produk, deskripsi_produk, harga_produk, gambar_produk) VALUES ('$PNAME','$PDESC','$PVALUE', '$target_file')";

        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Produk sudah pernah di upload')</script>";
            header('location: admin_home.php');
            exit();
        } else {
            // hapus file jika insertion gagal
            unlink($target_file);
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
            echo "<script>alert('Product tidak bisa dibuat')</script>";
        }
    } else {
        echo "Maaf ada kendala saat mengupload file kamu";
    }
}
?>
