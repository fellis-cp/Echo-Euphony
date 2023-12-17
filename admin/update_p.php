<?php
include 'admin_db.php';
session_start();
?>

<html>
<head>
    <title>Update Product</title>
    <link rel="shortcut icon" type="image/png" href="../img_logos/profile.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/update_product.css">
</head>
<body>
    <div class="testbox">
        <form action="fun_update_product.php" method='post' enctype="multipart/form-data">
            <div class="banner">
                <h1>Update Product</h1>
            </div>
            <?php
            $sql = "SELECT * FROM products";
            $rs = mysqli_query($con, $sql);
            ?>

            <div class="item">
                <p>Pilih product yang akan di update</p>
                <select name='id' class="form-control form-control-lg">
                    <?php while ($row = mysqli_fetch_assoc($rs)): ?>
                        <option value="<?= $row['id'] ?>"><?= $row["nama_produk"] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="item">
                <p>Update nama product</p>
                <div class="name-item">
                    <input type="text" name="nama_produk" placeholder="Nama baru" required />
                </div>
            </div>
            
            <div class="item">
                <p>Update harga product</p>
                <input type="text" name="harga_produk" placeholder="Harga product baru" required />
            </div>
      
            <div class="item">
                <p>Update deskripsi product</p>
                <textarea name='deskripsi_produk' placeholder="Deskripsi baru" rows="3" required></textarea>
            </div>

            <div>
                <p>Update gambar</p>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name='fileToUpload' required>
            </div>

            <div class="btn-block">
                <button type="submit" href="/">Update Product</button>
            </div>
        </form>
    </div>
</body>
</html>
