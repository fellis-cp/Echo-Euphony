<?php
include 'admin_db.php';
session_start()

?>

<html>
    <head>
          

        <title> Add Product </title>
        <link rel="shortcut icon" type="image/png" href="../img_logos/favicon.png">
       
        <meta name="viewport" content="width=device-width, initial-scale=1">

            <link rel="stylesheet" type="text/css" href="../css/header.css">

    
       </head>

<body>


    <div class="testbox">

      <form action="c_upload.php" method='post' enctype="multipart/form-data" >
        <div class="banner">
          <h1>Add Product</h1>
        </div>
        <div class="item">
          <p>Product Name</p>
          <div class="name-item">
            <input type="text" name="pname" placeholder="Product Name" required/>
            
          </div>
        </div>
        <div class="item">
          <p>Product Value</p>
          <input type="text" name="pvalue" placeholder="Product Value" required/>
        </div>
      
  <div class="item">
          <p>Product Description</p>
          <textarea  name='pdesc' placeholder="Product Description"  rows="3" required></textarea>
        </div>

  <div>
   
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name='fileToUpload' required>
  </div>

        <div class="btn-block" >
          <button type="submit1" href="/">Add Product</button>
        </div>
      </form>
</body>
</html>








<!--css-->

<style>
html, body {
  
  min-height: 100%;
  }
  body, div, form, input, select, textarea, p { 
  padding: 0;
  margin: 0;
  outline: none;
  font-family: Roboto, Arial, sans-serif;
  font-size: 14px;
  color: block;
  line-height: 22px;
  }
  h1 {
  position: absolute;
  margin: 0;
  font-family: 'Courier New';
  font-weight: bold;
  font-size: 40px;
  color: #fff;
  z-index: 2;
  }
  h1:hover{
    -webkit-mask-image: linear-gradient(-75deg, rgba(0,0,0,.6) 30%, #000 50%, rgba(0,0,0,.6) 70%);
    -webkit-mask-size: 200%;
    animation: shine 2s infinite;
}

@-webkit-keyframes shine {
    from {
      -webkit-mask-position: 150%;
    }
    
    to {
      -webkit-mask-position: -50%;
    }
  }


  .testbox {
  display: flex;
  justify-content: center;
  align-items: center;
  height: inherit;
  padding: 20px;
  }

p{
  text-align:center;
  font-size: 15px;
  font-family: 'Courier New';
  font-weight: bold;
}


  form {
    margin-top: 150px;
  width: 100%;
  padding: 20px;
  border-radius: 6px;
  background: #fff;
  box-shadow: 0 0 15px 0 rgb(255, 228, 196); 
  }
  .banner {
  position: relative;
  height: 450px;
  background-image: url("../img_logos/product4.jpg");
  background-size: cover;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  
  }
  .banner::after {
  content: "";
  background-color: rgba(0, 0, 0, 0.8); 
  position: absolute;
  width: 100%;
  height: 100%;
  }


  input, textarea{
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
  }
  input {
  width: calc(100% - 10px);
  padding: 5px;
  }
  
  textarea {
  width: calc(100% - 12px);
  padding: 5px;
  }
  .item:hover p, .item:hover i, input:hover::placeholder {
  color: #333;
  }
  .item input:hover, .item textarea:hover {
  border: 1px solid transparent;
  box-shadow: 0 0 6px 0 #333;
  color: #333;
  }
  .item {
  position: relative;
  margin: 10px 0;
  }
  
  .item i {
  right: 1%;
  top: 30px;
  z-index: 1;
  }
  
  
  .btn-block {
  margin-top: 10px;
  text-align: center;
  }
  button {
  width: 250px;
  padding: 10px;
  border: none;
  border-radius: 5px; 
  background: #444;
  font-size: 16px;
  color: #fff;
  cursor: pointer;
  }
  button:hover {
  background: #666;
  }
  @media (min-width: 568px) {
  .name-item{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  }
  .name-item input {
  width: calc(100% - 20px);
  }
  
  }
</style>



<?php
//insert
// $PNAME = $_POST['pname'];
// $PDESC = $_POST['pdesc'];
// $PVALUE = $_POST['pvalue'];

// if (isset($_POST['submit1'])) {
// //$datee = $_POST['date'];

// $sql =  "INSERT INTO products (p_name, p_desc, p_value) VALUES('$PNAME','$PDESC','$PVALUE')";


// if(mysqli_query($con , $sql) ){

//   echo "<script>alert('Product has been created')</script>";

// }else{

//   echo "<script>alert('Product Cannot be created')</script>";

// }
//   header('location: admin_home.php');

// }

?>
