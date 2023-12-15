<?php
session_start();
include "admin_db.php";
//include 'update_p.php';
$target_dir = "store/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1; //true
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Let me tell you what i will do when user does not upload image 
$storeErrorImage = './error.png';


// To fetch

$id = $_POST['id'];

//$PNAME = $_POST['pname'];
$PNAME = $_POST['pname'];
$PDESC = $_POST['pdesc'];
$PVALUE = $_POST['pvalue'];
#$target_file = $_POST['fileToUpload']; 


$sqltolink = "SELECT p_image from products where id=$id ";
$res = mysqli_query($con, $sqltolink);
$rows = mysqli_fetch_assoc($res);
$oldfile = $rows['p_image'];

echo $sqltolink . "<br>";
echo $rows['p_image'] . "<br>";
echo $id;
echo "<br>";
echo "<br>";




if(isset($_POST["submit2"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// if($uploadOk ==0){
// $target_file = $storeErrorImage;
// $uploadOk =1;
    
//}
echo $target_file;
echo '<br>';

// Check if file already exists
// if (file_exists($target_file)) {

//     echo '<br>';
//     echo "<ul> Sorry,<b> $oldfile </b> image file already exists. <br>";


//   $uploadOk = 0;
// }

//Check if same file exists
if ($target_file != $oldfile){

    echo '<br>';
    echo '<ul>'. '<b>'.'$target_file != $oldfile' .'<b>';
    echo '<br>';
 $uploadOk = 1;
}
else{
    echo '<br>';
    echo '<ul>' . '<b>' .'$target_file == $newfile' .'<b>';
    unlink($rows['p_image']);
    $uploadOk = 1;

}




// Check file size
if ($_FILES["fileToUpload"]["size"] > 3000000) {
  echo "Sorry, your file is too large.<br>";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed. <br>";
  $uploadOk = 0;
}




// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
   echo "<br>"; 
  echo "<ul> Sorry, your file <b>$target_file</b> was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    echo '<br>';
    echo 'Target file : '. $target_file;
    $sql= "UPDATE products SET p_name='$PNAME', p_desc = '$PDESC', p_value = '$PVALUE', p_image = '$target_file' WHERE id = $id";

    

    if(mysqli_query($con,$sql)){
        echo "<script>alert('Product $PNAME has been updated')</script>";
    }else{
        echo "<script>alert('Product $PNAME has not updated ')</script>";    
    }
    header('location: admin_home.php');


} else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>