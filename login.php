<?php
require('db.php');
session_start();

if (isset($_POST['email'])) {
    $email = mysqli_real_escape_string($con, stripslashes($_POST['email']));
    $password = mysqli_real_escape_string($con, stripslashes($_POST['password']));

    $query = "SELECT * FROM `users` WHERE email='$email' AND password='$password'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $rows = mysqli_num_rows($result);

    if ($rows == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['u_email'] = $row['email'];
        $_SESSION['u_id'] = $row['id'];
        $_SESSION['u_fname'] = $row['f_name'];
        $_SESSION['u_lname'] = $row['l_name'];
        header("Location: afterlogin/u_home.php");
        exit();
    } else {
        echo "<script>alert('Email / Password yang anda masukan invalid')</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Log In</title>
    <link rel="shortcut icon" type="image/png" href="asset/profile.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/login.css">
</head>
<body>

<div class="header">
    <img src="asset/profile.png" style='width:45px; height:45px;'>
    <div class="header-right">
        <a href="home.php">Home</a>
        <a class="active" href="login.php">LogIn</a>
        <a href="registration.php">SignUp</a>
    </div>
</div>

<div class='login_div'>
    <header class='login_header'>
        <center><h1 class='h1_title'>Log In</h1></center>
    </header>
    <form action="" method="post" class='form1'>
        <div class='form1_group'> 
            <input type="text" name='email' placeholder="Email Id" class='f_input' required>
        </div>
        <div class='form1_group'>
            <input type="password" name='password' placeholder="Password" class='f_input' required>
        </div>
        <div>
            <button class="login_btn" type="submit">Login</button>
        </div>
    </form>
</div>

</body>
</html>
