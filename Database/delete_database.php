<?php

$username = "bpsc222";
$host = "mysql.cs.uky.edu";
$password = "u0712429";
$database = "bpsc222";

$con = mysqli_connect($host, $username, $password, $database);
if (mysqli_connect_errno($con)) {
  echo "error connecting to database";
}

$sql = "SET foreign_key_checks = 0";
if (mysqli_query($con, $sql)) {
}


$sql = "DROP TABLE Orders";
if (mysqli_query($con, $sql))
  echo "Table deleted successfully<br>";
else 
  echo mysqli_errno($con);

mysql_close($con);
?>
