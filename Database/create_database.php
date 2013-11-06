<?php

$username = "bpsc222";
$host = "mysql.cs.uky.edu";
$password = "u0712429";
$database = "bpsc222";

$con = mysqli_connect($host, $username, $password, $database);
if (mysqli_connect_errno($con)) {
  echo "error connecting to database";
}

$sql = "CREATE TABLE Customer(username CHAR(30), fname CHAR(30), lname 
	CHAR(30), street CHAR(30), city CHAR(30), state CHAR(30), zip CHAR(30), 
	email CHAR (30) UNIQUE, password CHAR(30), PRIMARY KEY (username))";
if (mysqli_query($con, $sql))
  echo "Table Customer created successfully <br>";
else
  echo "Error creating table: " . mysqli_error($con) . "<br>";


$sql = "CREATE TABLE Employee(eid INT NOT NULL, password CHAR(30), status 
	CHAR(30), PRIMARY KEY (eid))";
if (mysqli_query($con, $sql)) 
  echo "Table Employee created successfully <br>";
else 
  echo "Error creating table: " . mysqli_error($con) . "<br>";


$sql = "CREATE TABLE Inventory(itemNum INT NOT NULL, quantity INT NOT NULL, 
	price FLOAT NOT NULL, promotion FLOAT, PRIMARY KEY (itemNum))";
if (mysqli_query($con, $sql)) 
  echo "Table Inventory created successfully <br>";
else 
  echo "Error creating table: " . mysqli_error($con) . "<br>";

$sql = "CREATE TABLE Order(orderNum INT NOT NULL, date CHAR(30))";

mysql_close($con);
?>
