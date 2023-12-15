<?php
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'website1');

$querry = "select * from u_products order by id desc";
$result = mysqli_query($con, $querry);

$row = mysqli_num_rows($result);
mysqli_close($con);
?>

<html>
<head>
    <title>Home</title>
    <link rel="shortcut icon" type="image/png" href="../img_logos/profile.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='../css/u_products.css'>
</head>

<body>
    <?php
    include 'u_header.php';
    ?>
    <table class="table" style='margin-top:0px;'>
        <?php
        while ($rows = mysqli_fetch_assoc($result)) :
        ?>
            <tr>
                <td><img style='width:700px; height:400px' src="../admin/<?php echo $rows['p_image']; ?>" alt="Generic placeholder image"></td>
                <td>
                    <h5 class="mt-0"><?php echo $rows['p_name'] . '<br>' . $rows['p_desc'] . '<br>' . 'Rs. ' . $rows['p_value'] . '<br>'; ?></h5>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>


