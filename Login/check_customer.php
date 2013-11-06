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
    echo $username;
    $_SESSION['username'] = $username;
    while($row = mysqli_fetch_array($result)) {
      $_SESSION['fname'] = $row['fname'];
      echo "<p>Welcome back, " . $row['fname'] . "</p>";
      echo '<html><body><a href="../Home.php">Start Shopping</a>';
      echo '</body></html>';
    }
  }
}

mysql_close($con);

?>
