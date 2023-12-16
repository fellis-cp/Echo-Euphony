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

// Check if image file is an actual image or fake image
if (isset($_POST["submit1"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
$allowedFormats = ["jpg", "png", "jpeg", "gif"];
if (!in_array($imageFileType, $allowedFormats)) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    // Try to upload file
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        // File upload succeeded, proceed with database insertion
        $sql = "INSERT INTO products (p_name, p_desc, p_value, p_image) VALUES ('$PNAME','$PDESC','$PVALUE', '$target_file')";

        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Product has been created')</script>";
            header('location: admin_home.php');
            exit();
        } else {
            // Remove uploaded file if database insertion fails
            unlink($target_file);
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
            echo "<script>alert('Product cannot be created')</script>";
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
