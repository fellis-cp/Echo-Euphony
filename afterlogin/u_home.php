<?php
include "u_header.php" ; 

if (!isset($_SESSION['u_fname'])) {
    header("Location: home.php"); // Redirect to the home page if session isn't set
    exit();
}
?>

<html>
    <head>

        <title> Home </title>
        <link rel="shortcut icon" type="image/png" href="../img_logos/profile.png">
        <link rel="stylesheet" type="text/css" href="../css/u_home.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>

<body>

  <form>

  <div class="header">
  <h1>Selamat Datang <?php echo $_SESSION['u_fname']; ?></h1>
  <p>Untuk melihat produk kami silahkan menuju ke bagian Products</p>
</div>

  <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="../img_logos/mobile2.jpg" alt="First slide">
    </div>
  </div>
</div>



</form>



</body>
</html>

<style>
form {
  width: 100%;
  padding: 20px;
  border-radius: 6px;
  background: #fff;
  box-shadow: 0 0 15px 0 rgb(0,0,0); 
  }

  body {
  font-family: comic;
  margin: 0;
}

/* Header/Logo Title */
.header {
  border-radius: 6px;
  box-shadow: 0 0 15px 0 rgb(0,0,0); 
  font-family: comic;

  padding: 60px;
  text-align: center;
  background: #1abc9c;
  color: white;
  font-size: 30px;
}

/* Page Content */
.content {padding:20px;}
</style>