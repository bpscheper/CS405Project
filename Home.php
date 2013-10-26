<?php

$host = "mysql.cs.uky.edu";
$username = "bpsc222";
$database = "bpsc222";
$password = "u0712429";

$con = mysqli_connect($host, $username, $password, $database);

if (mysqli_connect_errno($con)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

echo '<html><body>';
echo '<a href="Home.php"><img src="Logo.jpg" alt="Nile.com"></a>';
echo '</body></html>';
?>
