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

$sql = "CREATE TABLE Customer(username CHAR(30), fname CHAR(30), lname 
	CHAR(30), street CHAR(30), city CHAR(30), state CHAR(30), zip CHAR(30), 
	email CHAR (30) UNIQUE, password CHAR(30), PRIMARY KEY (username))";
if (mysqli_query($con, $sql))
  echo "Table Customer created successfully <br>";
else
  echo "Error creating table: " . mysqli_error($con) . "<br>";


$sql = "CREATE TABLE Employee(eid CHAR(9) NOT NULL, password CHAR(30), status 
	CHAR(30), name CHAR(30), PRIMARY KEY (eid))";
if (mysqli_query($con, $sql)) 
  echo "Table Employee created successfully <br>";
else 
  echo "Error creating table: " . mysqli_error($con) . "<br>";


$sql = "CREATE TABLE Inventory(itemNum INT NOT NULL, itemName CHAR(30), 
	itemDescription CHAR(255), quantity INT NOT NULL, price FLOAT NOT 
	NULL, promotion FLOAT, PRIMARY KEY (itemNum))";
if (mysqli_query($con, $sql)) 
  echo "Table Inventory created successfully <br>";
else 
  echo "Error creating table: " . mysqli_error($con) . "<br>";

$sql = "CREATE TABLE Orders(orderNum INT, date CHAR(30), PRIMARY 
	KEY(orderNum))";
if (mysqli_query($con, $sql))
  echo "Table Orders created successfully <br>";
else
  echo "Error creating table: " . mysqli_error($con) . "<br>";


$sql = "CREATE TABLE Places(username CHAR(30) NOT NULL, orderNum INT NOT NULL, 
	FOREIGN KEY(username) REFERENCES Customer(username), FOREIGN KEY
	(orderNum) REFERENCES Orders(orderNum))";
if (mysqli_query($con, $sql))
  echo "Table Places created successfully <br>";
else
  echo "Error creating table: " . mysqli_error($con) . "<br>";


$sql = "CREATE TABLE Contained(orderNum INT, itemNum INT NOT NULL, 
	amount INT NOT NULL)"; 
if (mysqli_query($con, $sql))
  echo "Table Contains created successfully <br>";
else
  echo "Error creating table: " . mysqli_error($con) . "<br>";


mysql_close($con);
?>
