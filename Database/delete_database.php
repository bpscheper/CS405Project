<?php

$username = "bpsc222";
$host = "mysql.cs.uky.edu";
$password = "u0712429";
$database = "bpsc222";

$con = mysqli_connect($host, $username, $password, $database);
if (mysqli_connect_errno($con)) {
  echo "error connecting to database";
}

$sql = "DROP TABLE Customer";
if (mysqli_query($con, $sql)) 
  echo "Table deleted successfully<br>";

$sql = "DROP TABLE Employee";
if (mysqli_query($con, $sql))
  echo "Table deleted successfully<br>";

mysql_close($con);
?>
