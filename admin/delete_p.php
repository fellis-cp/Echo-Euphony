<?php
include 'admin_db.php';
session_start();
?>

<html>
<head>
    <title>Delete Product</title>
    <link rel="shortcut icon" type="image/png" href="../img_logos/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/delete_product.css">
</head>

<body>
    <div class="testbox">
        <form action='fun_delete_product.php' method='post' enctype="multipart/form-data">
            <div class="banner">
                <h1>Delete Product</h1>
            </div>

            <?php
            $sql = "SELECT * FROM products";
            $rs = mysqli_query($con, $sql);
            ?>

            <div class="item">
                <p>Pilih product yang akan dihapus</p>
                <select name='id'>
                    <?php while ($row = mysqli_fetch_assoc($rs)): ?>
                        <option value="<?= $row['id'] ?>"><?= $row["nama_produk"] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="btn-block">
                <button type="submit" name='submit3'>Delete</button>
            </div>
        </form>
    </div>
</body>
</html>
