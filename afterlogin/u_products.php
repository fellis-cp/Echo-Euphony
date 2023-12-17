<?php
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'website1');

$query = "SELECT * FROM products ORDER BY id DESC";
$result = mysqli_query($con, $query);
mysqli_close($con);
?>

<html>
<head>
    <title>Home</title>
    <link rel="shortcut icon" type="image/png" href="../asset/profile.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/u_products.css">
</head>

<body style="background-color: #c4d7e5">
    <?php include 'u_header.php'; ?>

    <form class="form-inline">
        <table class="table" >
            <?php while ($rows = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td style="width: 200px;">
                        <img style='width: 600px; height: 300px;' src="../admin/<?php echo $rows['gambar_produk']; ?>" alt="Product Image">
                    </td>
                    <td style="vertical-align: top;">
                        <div class="media-body">
                        <div class="media-body" style="text-align: left;">
                            <h5><?php echo $rows['nama_produk']; ?></h5>
                            <pre><?php echo $rows['deskripsi_produk']; ?></pre>
                            <p>Harga: Rp. <?php echo $rows['harga_produk']; ?></p>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </form>
</body>
</html>
