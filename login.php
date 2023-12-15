<html>
    <head>

        <title> Log In </title>
        <link rel="shortcut icon" type="image/png" href="img_logos/profile.png">
       
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="./css/login.css">
       </head>

<body>
	
<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['email'])){
		
		$email = stripslashes($_REQUEST['email']); // removes backslashes
		$email = mysqli_real_escape_string($con,$email); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
        //$query = "SELECT * FROM `users` WHERE email='$email' and password='".md5($password)."'";
        $query = "SELECT * FROM `users` WHERE email='$email' and password='$password'";

        $result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        
        if($rows==1){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['u_email'] = $row['email'];
            $_SESSION['u_id'] = $row['id'];
            $_SESSION['u_fname'] = $row['f_name'];
            $_SESSION['u_lname'] = $row['l_name'];
            //die();
			header("Location: afterlogin/u_home.php"); // Redirect user to index.php
            }else{
                echo "<script>alert('Email / Password yang anda masukan invalid')</script>";
            ?>
               
               <?php
               
            }
    }
    else{
?>


<div class="header">
<img src="img_logos/profile.png" style='width:45px ;height: 45px;'>
<div class="header-right">
  <a href="home.php">Home</a>
    <a class="active" href="login.php">LogIn</a>
    <a href="registration.php">SignUp</a>
  </div>
</div>



<div class='login_div'>

    <header class='login_header'>
         <center><h1 class='h1_title'> Log In </h1></center>
         
    </header>
   

<form action="" method="post" class='form1'>

<div class='form1_group'> 
    <input type="text" name='email' placeholder="Email Id" class='f_input' required>
    </div>


<div class='form1_group'>
<input type="password" name='password' placeholder="Password" class='f_input' required >
</div>

<div >
<a href=""><button class="login_btn" type="">Login</button></a>
</div>
</div>
</form>
</div>



</body>




<?php
	}
	?>
		
</html>