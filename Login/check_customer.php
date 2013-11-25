<?php

session_start();

$host = "mysql.cs.uky.edu";
$user = "bpsc222";
$password = "u0712429";
$database = "bpsc222";

$con = mysqli_connect($host, $user, $password, $database);
if (mysqli_connect_errno($con)) 
  echo "Trouble connecting to database";
else {

  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM Customer C WHERE C.username = '" . $username . "' AND 
	C.password = '" . $password . "'";
  echo $sql;
  $result = mysqli_query($con, $sql);
  if (!empty($result)) {
    $_SESSION['username'] = $username;
    while($row = mysqli_fetch_array($result)) {
      echo "Hello";
      $_SESSION["fname"] = $row['fname'];
      echo $_SESSION['fname'];
      echo '<html><body><p>Welcome back, ' . $row['fname'] . '</p>';
      echo '<a href="../Home.php">Start Shopping</a>';
      echo '</body></html>';
    }
  }
  echo '<form "goback" method="get" action="../Home.php">';
  echo '<input type="submit" name="goback" value="Home"></form>';
}

mysql_close($con);

?>
