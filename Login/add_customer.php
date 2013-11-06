<?php

session_start();

$name = "bpsc222";
$database = "bpsc222";
$host = "mysql.cs.uky.edu";
$password = "u0712429";

$con = mysqli_connect($host, $name, $password, $database);
if (mysqli_connect($con)) {
  echo "Trouble connecting to database";
}

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$street = $_POST['street'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$username = $_POST['username'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];

if ($password1 != $password2){
  echo 'Passwords do not match! <br>';
  echo '<html><body><a href="customer_register.php">Try Registering Again</a>';
  echo '</body></html>';
} else if (strlen($password1) < 8) {
  echo 'Password must be 8 characters long! <br>';
  echo '<html><body><a href="customer_register.php">Try Registering Again</a>';
  echo '</body></html>';
} else {
  $sql = "INSERT INTO Customer values ('" . $username . "', '" . $fname . "', 
	'" . $lname . "', '" . $street . "', '" . $city . "', '" . $state . "', 
	'" . $zip . "', '" . $email . "', '" . $password1 . "')";
  echo $sql;
  if (mysqli_query($con, $sql)) {
    $_SESSION['username'] = $username;
    $_SESSION['fname'] = $fname;
    echo "<p>Thank you for registering! </p><br>";
    echo '<html><body><a href="../Home.php">Start Shopping</a>';
    echo '</body></html>';
  } else {
    echo "Cannot add to database";
  } 
  $sql = "SELECT * FROM Customer";
  $result = mysqli_query($con, $sql);
  while ($row = mysqli_fetch_array($result)) {
    #echo $row['username'];
  }
}

mysql_close($con);

?>
