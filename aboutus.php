
<?php
session_start();
include('db.php');
$querry = "select * from aboutus";
$result = mysqli_query($con,$querry);

$row= mysqli_num_rows($result);
mysqli_close($con);


?>


<!DOCTYPE html>
<html>
<head>
  <title>About Us</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/png" href="img_logos/favicon.png">

<link rel="stylesheet" href="css/aboutus.css">
<link rel="stylesheet" href="css/header.css">
</head>

<style>
</style>



<body>

<div class="header">
<img src="img_logos/favicon.png" style='width:45px ;height: 45px;'>

  <div class="header-right">
  <a href="home.php">Home</a>
    <a href="login.php">LogIn</a>
    <a href="registration.php">SignUp</a>
   <a class="active" href="aboutus.php">Contact</a>
   </div>
</div>

<div class="row">
  <div class="column">
    <div class="card">
      <div class="container">
  
      </div>
    </div>
  </div>

  <div class="column">
  <center>
    <div class="card">
      <img src="img_logos/user.png" alt="Bhavin" style="width:30%">
      <div class="container">
        <h2 style='color:white; font-size:30px' >Bhavin Patil</h2>
        <p class="title">Developer and Handler</p>
        <p style='color:white; font-size:15px'>I am a Security Researcher. I love building attractive websites.</p>
        <p style='color:green; font-size:14px'>bhavin@example.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
    </center>
  </div>

  <div class="column">
    <div class="card">
      <div class="container">
      
      </div>
    </div>
  </div>
</div>


<?php
		global $result;
		while ($rows=mysqli_fetch_assoc($result)):?>
		<center><div style='color:white; font-family:monospace;'>
				
				<p class='p_shine'><?php echo $rows['text'];?></p>
    </div></center>
		

<?php endwhile;?>







</body>

<?php

include 'footer/footer.php'
?>

</html>
