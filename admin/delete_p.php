<?php

include 'admin_db.php';
session_start()

?>

<html>
    <head>

        <title> Delete Product </title>
        <link rel="shortcut icon" type="image/png" href="../img_logos/favicon.png">
       
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <link rel="stylesheet" type="text/css" href="../css/header.css">

       </head>

<body>


<div class="testbox">
      <form action='d_upload.php' method='post' enctype="multipart/form-data">
        <div class="banner">
          <h1>Delete Product</h1>
        </div>
    
        <?php
        $sql ="SELECT * FROM products";
        $rs = mysqli_query($con, $sql);
    ?>


        <div class="item">
 <p>Choose Product</p>
    <select name='id'>
        <?php
            while($row = mysqli_fetch_assoc($rs)){
        ?>
     <option value="<?=$row['id']?>"><?=$row["p_name"]?></option>

      <?php
        }
    ?>
    </select>
          
 </div>
  
    
        <div class="btn-block">
          <button type="submit" name='submit3'  href="/">Delete</button>
        </div>
      </form>
    </div>

    </div>


</body>

</html>

<!--css-->


<style>
   html, body {
      min-height: 100%;
      }
      body, div, form, select, textarea { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
      }
      h1 {
      position: absolute;
      font-family: 'Courier New';
font-weight:bold;
      margin: 0;
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
  font-size: 20px;
  font-family: 'Courier New';
  font-weight: bold;
}

      form {
      margin-top: -85px;    
      width: 100%;
      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 15px 0 rgb(255, 228, 196); 
      }
      .banner {
      position: relative;
      height: 450px;
      background-image: url("../img_logos/deleteimg.png");      background-size: cover;
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
    select {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
  
      select {
      width: 100%;
      padding: 7px 0;
      background: transparent;
      }
   
    
     .item select:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 6px 0 #333;
      color: #333;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }
  
  
  
      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      button {
      width: 150px;
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
      .name-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
     
    

</style>