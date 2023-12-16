<?php
session_start();
include 'admin_header.php';
include 'admin_db.php';

$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'website1');
$querry = "select * from products order by id desc";
$result = mysqli_query($con, $querry);
$row = mysqli_num_rows($result);
mysqli_close($con);

?>
<?php
// search input field name
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'website1');
if (isset($_POST['filter'])) {
    $ser = $_POST['se'];
    $q = "select * from products where concat(p_name, p_desc) like '%$ser%'";
    $result = filtert($q);
}
// Search Button name
function filtert($q)
{

    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'website1');
    $result = mysqli_query($con, $q);
    return $result;
}

?>

<html>

<head>

    <title> Home </title>
    <link rel="shortcut icon" type="image/png" href="../img_logos/favicon.png">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>

    <form class="form-inline" action="admin_home.php" method="post" enctype="multipart/form-data">
        <h5 style='text-align:center'>Hello <?php echo $_SESSION['a_fname']; ?> </h5>
        <input style='width:100%; text-align:center' class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name='se'>
        <button style='width:50%; text-align:center' class="btn btn-outline-success my-2 my-sm-0" name="filter" type="submit">Search</button>
    </form>
    <br>

    <center>

        <form class="form-inline">
            <table class="table" style='margin-top:0px;'>
                <?php
                global $result;
                while ($rows = mysqli_fetch_assoc($result)) :
                ?>
                    <tr>
                        <td>
                            <div class="media">
                                <img style='width:200px; height:200px' src="../admin/<?php echo $rows['p_image']; ?>" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h5 class="mt-0"><?php echo $rows['p_name'] . '<br>' . $rows['p_desc'] . '<br>' . 'Rs. ' . $rows['p_value'] . '<br>'; ?></h5>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </form>
</body>

</html>
<style>
    form {
        width: 100%;

        padding: 10px;
        border-radius: 6px;
        background: #fff;
        box-shadow: 0 0 15px 0 rgb(0, 0, 0);
    }

    h5 {
        padding-top: 10px;
        color: black;
        font-size: 20px;
        font-family: 'comic';
        font-weight: bold;
    }

    p {
        text-align: center;

        color: black;
        font-size: 20px;
        font-family: 'Courier New';
        font-weight: bold;
    }
</style>
