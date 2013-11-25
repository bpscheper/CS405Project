<?php

$name = "bpsc222";
$database = "bpsc222";
$host = "mysql.cs.uky.edu";
$password = "u0712429";

$con = mysqli_connect($host, $name, $password, $database);
if (mysqli_connect($con)) {
  echo "Trouble connecting to database";
}

$sql = "INSERT INTO Customer values ('bscheper', 'Brian', 'Scheper', '', 
	'Lexington', 'Kentucky', '40503', 'bpsc222@g.uky.edu', 'CS405Project')";
if (mysqli_query($con, $sql)) {
} else 
  echo mysqli_error($con) . '<br>';

$sql = "INSERT INTO Customer values ('jdrury', 'Jeremy', 'Drury', '', 
	'Lexington', 'Kentucky', '40503', 'drury.jeremy@yahoo.com', 
	'CS405Project')";
if (mysqli_query($con, $sql)) {
} else
  echo mysqli_error($con) . '<br>';

$sql = "INSERT INTO Customer values ('jliu', 'Jinze', 'Liu', '', 'Lexington', 
	'Kentucky', '40503', 'liuj@cs.uky.edu', 'CS405Project')";
if (mysqli_query($con, $sql)) {
} else
  echo mysqli_error($con) . '<br>';




mysql_close($con);

?>
