

<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
session_start() ; 
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con, 'website1');
$querry = "select * from products order by id desc";
$result = mysqli_query($con,$querry);
$row= mysqli_num_rows($result);
mysqli_close($con);
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
            <a href="./create_p.php" class="btn btn-primary"><i class="fas fa-plus-circle"></i>Tambahkan Product</a>
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


<form class="form-inline">
  <table class="table" style='margin-top:0px;'>
    <?php
    global $result;
    while ($rows = mysqli_fetch_assoc($result)) :
    ?>
      <tr>
        <td><img style='width:600px; height:300px' src="../admin/<?php echo $rows['gambar_produk']; ?>" alt="Product Image"></td>
        <td>
          <div class="media-body">
            <h5 class="mt-0"><?php echo $rows['nama_produk']; ?></h5>
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
