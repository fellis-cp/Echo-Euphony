<?php

//connection file to fetch backend and frontend
$con = mysqli_connect("localhost","root","","website1");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_errno();
  }
?>