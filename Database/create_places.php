<?php

$username = "bpsc222";
$host = "mysql.cs.uky.edu";
$password = "u0712429";
$database = "bpsc222";

#establish connection to database
$con = mysqli_connect($host, $username, $password, $database);
if (mysqli_connect_errno($con)) {
  echo "error connecting to database";
}

$sql = "INSERT INTO Places values ('bscheper', 34566)";
if (mysqli_query($con, $sql)) {
  echo "Order 34566 successfully added <br>";
} else
  echo mysqli_error($con) . '<br>';


mysql_close($con);

?>
