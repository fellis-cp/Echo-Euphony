

<html>
    <head>
        <link rel="shortcut icon" type="image/png" href="../img_logos/profile.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/header.css">
    </head>
<body>
<!-- Navigation Menu-->
  <div class="header">
    <img src="../img_logos/profile.png" style='width:45px ;height: 45px;'>
    
      <div class="header-right">
        <a  class=""  href="../home.php">Home</a>
        <?php
        if(isset($_SESSION['a_id'])){
        ?>
            
            <a  href="./create_p.php">Add Products</a>
            <a  href="./update_p.php">Update Products</a>
            <a  href="./delete_p.php">Delete Products</a>
            <a href='admin_home.php' ><?php echo $_SESSION['a_fname']; ?> </a> 
            <a  href="./admin_manage.php">Users Details</a>
            <a  href="admin_logout.php">Logout</a>
        
        <?php
        }
        else{
        ?>

            <a  href="admin_login.php">LogIn</a>
        <?php
        }
        ?>
     </div>
  </div>
</body>
</html>

