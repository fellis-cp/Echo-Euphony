<?php
session_start();
include "admin_db.php";

$target_dir = "store/";
$filename = basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . $filename;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$id = $_POST['id'];
$PNAME = $_POST['pname'];
$PDESC = $_POST['pdesc'];
$PVALUE = $_POST['pvalue'];

function generateUniqueFileName($dir, $name, $ext) {
    $counter = 1;
    $name = pathinfo($name, PATHINFO_FILENAME);
    while (file_exists($dir . $name . '_' . $counter . '.' . $ext)) {
        $counter++;
    }
    return $name . '_' . $counter . '.' . $ext;
}

// Check if a file is selected for upload
if ($_FILES["fileToUpload"]["size"] > 0) {
    // Check if file is an image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        exit(); // Add proper error handling or redirect here
    }

    // Check file size and allowed formats
    $maxFileSize = 3000000; // Adjust size limit as needed
    $allowedFormats = ["jpg", "png", "jpeg", "gif"];
    if ($_FILES["fileToUpload"]["size"] > $maxFileSize || !in_array($imageFileType, $allowedFormats)) {
        echo "Sorry, the file exceeds the size limit or has an unsupported format.";
        exit(); // Add proper error handling or redirect here
    }

    // Rename the file if it already exists
    if (file_exists($target_file)) {
        $filename = generateUniqueFileName($target_dir, $filename, $imageFileType);
        $target_file = $target_dir . $filename;
    }

    // Attempt to upload the file
    if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Sorry, there was an error uploading your file.";
        exit(); // Add proper error handling or redirect here
    }
}

// Update the database
$sql = "UPDATE products SET p_name=?, p_desc=?, p_value=?, p_image=? WHERE id=?";
$stmt = mysqli_prepare($con, $sql);
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ssisi", $PNAME, $PDESC, $PVALUE, $target_file, $id);
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Product $PNAME has been updated')</script>";
        header('location: admin_home.php');
        exit();
    } else {
        echo "<script>alert('Product $PNAME has not been updated')</script>";
        exit(); // Add proper error handling or redirect here
    }
} else {
    echo "Database error.";
    exit(); // Add proper error handling or redirect here
}
?>
