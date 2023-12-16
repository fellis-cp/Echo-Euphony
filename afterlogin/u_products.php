<?php
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'website1');

$query = "SELECT * FROM u_products ORDER BY id DESC";
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
                        <img style='width: 400px; height: 350px;' src="../admin/<?php echo $rows['p_image']; ?>" alt="Product Image">
                    </td>
                    <td style="vertical-align: top;">
                        <div class="media-body">
                        <div class="media-body" style="text-align: left;">
                            <h5><?php echo $rows['p_name']; ?></h5>
                            <pre><?php echo $rows['p_desc']; ?></pre>
                            <p>Price: Rp. <?php echo $rows['p_value']; ?></p>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </form>
</body>
</html>
