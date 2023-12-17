<?php
include 'admin_db.php';
session_start();
?>

<html>
<head>
    <title>Tambahkan Product</title>
    <link rel="shortcut icon" type="image/png" href="../img_logos/profile.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/create_products.css">
</head>

<body>
    <div class="testbox">
        <form action="fun_create_product.php" method='post' enctype="multipart/form-data">
            <div class="banner">
                <h1>Tambahkan Product</h1>
            </div>
            <div class="item">
                <p>Nama Product</p>
                <div class="name-item">
                    <input type="text" name="pname" placeholder="Nama Product" required/>
                </div>
            </div>
            <div class="item">
                <p>Harga Product</p>
                <input type="text" name="pvalue" placeholder="Masukan tanpa Rp." required/>
            </div>
            <div class="item">
                <p>Deskripsi Product</p>
                <textarea  name='pdesc' placeholder="Deskripsi" rows="3" required></textarea>
            </div>
            <div>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name='fileToUpload' required>
            </div>
            <div class="btn-block">
                <button type="submit" href="/">Tambahkan Product</button>
            </div>
        </form>
    </div>
</body>
</html>
