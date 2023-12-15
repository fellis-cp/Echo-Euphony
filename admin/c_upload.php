<?php
session_start();
include 'admin_db.php';

$target_dir = "store/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$PNAME = $_POST['pname'];
$PDESC = $_POST['pdesc'];
$PVALUE = $_POST['pvalue'];


// Check if image file is a actual image or fake image
if(isset($_POST["submit1"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}


// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}



// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    // Insert query
    $sql =  "INSERT INTO products (p_name, p_desc, p_value, p_image) VALUES('$PNAME','$PDESC','$PVALUE', '$target_file')";

     if(mysqli_query($con , $sql) ){

           echo "<script>alert('Product has been created')</script>";
        
         }else{
        
           echo "<script>alert('Product Cannot be created')</script>";
        
        }

        header('location: admin_home.php');

} else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>