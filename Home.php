<?php

$host = "mysql.cs.uky.edu";
$username = "bpsc222";
$database = "bpsc222";
$password = "u0712429";

$con = mysqli_connect($host, $username, $password, $database);

if (mysqli_connect_errno($con)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

session_start();

echo '<html><body>';
echo '<div style="float:left"><a href="Home.php"><img src="Logo.jpg" 
	alt="Nile.com"></a></div>';
if (isset($_SESSION["username"])) {
  echo '<div style="float:right">Hello, <a href="Customer/account_info.php">';
  $name = $_SESSION["fname"];
  echo $name . '.</a></div><br>';
  echo '<div style="float:right"><a href="Login/Log_Out.php">Log out</a></div>';
} else {
  echo '<div style="float:right">Hello, <a href="Login/customer_login.php">';
  echo 'Sign In</a></div><br>';
  echo '<div style="float:right"><a href="Login/customer_register.php">
	Register Now</a></div>';
}
echo '<div style="position: absolute; bottom: 0; right: 0;"><a 
	href="Login/employee_login.php">Employee Sign In</a></div>';
echo '</body></html>';

echo '<div>';
echo '</div>';

mysql_close($con);
?>
