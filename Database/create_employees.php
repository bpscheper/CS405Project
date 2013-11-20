<?php

$name = "bpsc222";
$database = "bpsc222";
$host = "mysql.cs.uky.edu";
$password = "u0712429";

$con = mysqli_connect($host, $name, $password, $database);
if (mysqli_connect($con)) {
  echo "Trouble connecting to database";
}

$sql = "INSERT INTO Employee values ('00001', 'CS405Project', 'Manager', 
	'Brian Scheper')";
if (mysqli_query($con, $sql)) {
} else 
  echo mysqli_error($con) . '<br>';

$sql = "INSERT INTO Employee values ('00002', 'CS405Project', 'Manager', 
	'Jeremy Drury')";
if (mysqli_query($con, $sql)) {
} else
  echo mysqli_error($con) . '<br>';


$sql = "INSERT INTO Employee values ('00003', 'CS405Project', 'Manager', 
	'Jinze Liu')";
if (mysqli_query($con, $sql)) {
} else
  echo mysqli_error($con) . '<br>';




mysql_close($con);

?>
