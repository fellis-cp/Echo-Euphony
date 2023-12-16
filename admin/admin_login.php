<?php
include "admin_header.php";
?>

<html>
<head>
    <title>Admin Log In</title>
    <link rel="shortcut icon" type="image/png" href="../img_logos/profile.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/admin_login.css">
</head>

<body>
    <?php
    require('admin_db.php');
    
    if (isset($_POST['email'])) {
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        
        $query = "SELECT * FROM `admin_panel` WHERE email='$email' and password='$password'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $rows = mysqli_num_rows($result);
        
        if ($rows == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['a_email'] = $row['email'];
            $_SESSION['a_id'] = $row['id'];
            $_SESSION['a_fname'] = $row['f_name'];
            $_SESSION['a_lname'] = $row['l_name'];
            
            header("Location: admin_home.php");
            exit(); // Stop further execution
        } else {
            echo "<script>alert('Username / Password salah');</script>";
        }
    }
    ?>

    <div class='login_div'>
        <header class='login_header'>
            <center><h1 class='h1_title'>Admin Log In</h1></center>
        </header>

        <form action="admin_login.php" method="post" class='form1'>
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
