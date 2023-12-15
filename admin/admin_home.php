

<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
session_start() ; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Home</title>
    <link rel="shortcut icon" type="image/png" href="../img_logos/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/admin_home.css">
    
    
</head>
<body>

<div class="container text-center">
    <h5> Selamat datang Admin </h5>

    <div class="button-container">
        <div class="btn-group" role="group" aria-label="Admin Actions">
            <a href="./create_p.php" class="btn btn-primary"><i class="fas fa-plus-circle"></i>Add Product</a>
            <a href="./update_p.php" class="btn btn-success"><i class="fas fa-pencil-alt"></i>Update Product</a>
            <a href="./delete_p.php" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Delete Product</a>
            <a href="./admin_logout.php" class="btn btn-secondary"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </div>
    </div>
</div>

<!-- Script Bootstrap and Font Awesome -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
</body>
</html>
