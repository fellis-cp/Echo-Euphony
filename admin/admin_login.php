<?php
include "admin_header.php"
?>


<html>
    <head>

        <title>Admin Log In </title>
        <link rel="shortcut icon" type="image/png" href="../img_logos/profile.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/admin_login.css">
    </head>

<body>

    <?php
        require('admin_db.php');
        
        // If form submitted, insert values into the database.
        if (isset($_POST['email'])){
          $email = stripslashes($_REQUEST['email']); // removes backslashes
          $email = mysqli_real_escape_string($con,$email); //escapes special characters in a string
          $password = stripslashes($_REQUEST['password']);
          $password = mysqli_real_escape_string($con,$password);
            
          //Checking is user existing in the database or not
          //$query = "SELECT * FROM `users` WHERE email='$email' and password='".md5($password)."'";
          $query = "SELECT * FROM `admin_panel` WHERE email='$email' and password='$password'";
          $result = mysqli_query($con,$query) or die(mysql_error());
          $rows = mysqli_num_rows($result);
          if($rows==1){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['a_email'] = $row['email'];
            $_SESSION['a_id'] = $row['id'];
            $_SESSION['a_fname'] = $row['f_name'];
            $_SESSION['a_lname'] = $row['l_name'];
            //die();
            header("Location: admin_home.php"); // Redirect user to index.php
            }else{
                ?>
                <script>alert('Wrong Credentials');</script>
            <?php
           
            }
            ?>
      <?php 
             
        }else{
    ?>


       


<div class='login_div'>

    <header class='login_header'>
         <center><h1 class='h1_title'>Admin Log In </h1></center>
         
    </header>
   

<form action="" method="post" class='form1'>

<div class='form1_group'> 
    <input type="text" name='email' placeholder="Email Id" class='f_input' required>
    </div>


<div class='form1_group'>
<input type="password" name='password' placeholder="Password" class='f_input' required >
</div>

<div >
<a href=""><button class="login_btn" type="">Login</button>
</a>
</div>
</div>
</form>
</div>



</body>




<?php
	}
	?>
		
</html>