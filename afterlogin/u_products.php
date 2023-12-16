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

<form class="form-inline">
  <table class="table" style='margin-top: 0px;'>
    <?php
    global $result;
    while ($rows = mysqli_fetch_assoc($result)) :
    ?>
      <tr>
        <td style="width: 200px;">
          <img style='width: 400px; height: 350px;' src="../admin/<?php echo $rows['p_image']; ?>" alt="Product Image">
        </td>
        <td style="vertical-align: top;">
          <div class="media-body" style="text-align: left;">
            <h5 class="mt-0"><?php echo $rows['p_name']; ?></h5>
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


