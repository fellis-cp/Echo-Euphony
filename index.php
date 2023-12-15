<?php

?>

<?php
session_start();
if(!isset($_SESSION["u_id"])){
header("Location: home.php");
exit(); }
?>
<?php
include 'home.php';
?>