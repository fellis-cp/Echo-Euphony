
<?php
session_start();
if(!isset($_SESSION["a_id"])){
header("Location: admin_home.php");
exit(); }
?>