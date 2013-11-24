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
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];

if ($password1 != $password2){
  echo 'Passwords do not match! <br>';
  echo '<html><body><a href="update_account.php">Try Updating Again</a>';
  echo '</body></html>';
} else if (strlen($password1) < 8) {
  echo 'Password must be 8 characters long! <br>';
  echo '<html><body><a href="update_account.php">Try Updating Again</a>';
  echo '</body></html>';
} else {
  $sql = "UPDATE Customer SET fname=$fname, lname=$lname, street=$street, 
	  city=$city, state=$state, zip=$zip, email=$email, password=$password1
	  WHERE username=$username");
  echo $sql;
  if (mysqli_query($con, $sql)) {
    $_SESSION['username'] = $username;
    $_SESSION['fname'] = $fname;
    echo "<p>Thank you for updating! </p><br>";
    echo '<html><body><a href="../account_info.php">Account Info</a>';
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


