<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
require('db.php');

if (isset($_REQUEST['email'])) {
    $u_fname = mysqli_real_escape_string($con, $_REQUEST['fname']);
    $u_lname = mysqli_real_escape_string($con, $_REQUEST['lname']);
    $u_email = mysqli_real_escape_string($con, $_REQUEST['email']);
    $u_password = mysqli_real_escape_string($con, $_REQUEST['password']);

    $trn_date = date("Y-m-d H:i:s");
    $query = "INSERT INTO `users` (f_name, l_name, email, password) VALUES ('$u_fname', '$u_lname', '$u_email', '$u_password')";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Selamat $u_fname, akunmu telah dibuat')</script>";
        include 'home.php';
        exit(); 
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="shortcut icon" type="image/png" href="asset/profile.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/registration.css">
</head>
<body>

<div class="header">
    <img src="asset/profile.png" style='width:45px; height:45px;'>
    <div class="header-right">
        <a href="home.php">Home</a>
        <a href="login.php">LogIn</a>
        <a class="active" href="registration.php">SignUp</a>
    </div>
</div>

<div class='register_div'>
    <header class='register_header'>
        <center><h1 class='h1_title'>Sign Up</h1></center>
    </header>

    <form class='form1' action='' method='post'>
        <div class='form1_group'>
            <input type="text" name='fname' placeholder="Masukkan Nama Awal" class='f_input' required>
        </div>
        <div class='form1_group'> 
            <input type="text" name='lname' placeholder="Masukkan Nama Akhir" class='f_input' required>
        </div>
        <div class='form1_group'> 
            <input type="email" name='email' placeholder="Masukkan Email" class='f_input' required>
        </div>
        <div class='form1_group'>
            <input type="password" name='password' placeholder="Password" class='f_input' required>
        </div>
        <div>
            <button class="register_btn" type="submit">Daftar</button>
        </div>
    </form>
</div>

</body>
</html>
