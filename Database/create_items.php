<?php

$name = "bpsc222";
$database = "bpsc222";
$host = "mysql.cs.uky.edu";
$password = "u0712429";

$con = mysqli_connect($host, $name, $password, $database);
if (mysqli_connect($con)) {
  echo "Trouble connecting to database";
}

$sql = "INSERT INTO Inventory values (345, 'Board Game', 'This game is fun for kids', 6, 34.99, 0.00)";
if (mysqli_query($con, $sql)) {
  echo "Item 345 successfully added <br>";
} else 
  echo mysqli_error($con) . '<br>';

$sql = "INSERT INTO Inventory values (6849, 'X-Box', 'Technology', 43, 444.99, 0.00)";
if (mysqli_query($con, $sql)) {
  echo "Item 6849 successfully added <br>";
} else
  echo mysqli_error($con) . '<br>';



mysql_close($con);

?>
