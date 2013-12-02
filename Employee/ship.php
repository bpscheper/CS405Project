<?php

session_start();

echo '<a href="../Home.php"><img src="../Logo.jpg" alt="Nile.com"></a>';

$username = "bpsc222";
$host = "mysql.cs.uky.edu";
$password = "u0712429";
$database = "bpsc222";

#establish connection to database
$con = mysqli_connect($host, $username, $password, $database);
if (mysqli_connect_errno($con)) {
  echo "error connecting to database";
} else {
  $sql = "SELECT * FROM Orders";
  $result = mysqli_query($con, $sql);
  while ($row = mysqli_fetch_array($result)) {
    $order = $row['orderNum'];
    $answer = $_POST[$order];
    if ($answer == "yes") {
      $sql = "UPDATE Orders SET status = 'Shipped' WHERE orderNum = " . $order;
      if (mysqli_query($con, $sql)) {
      } else 
	echo mysqli_errno($con);
    } else {
    }
  }
}

echo '<form><tr><td align="center"><input type="submit" value="Employee Screen"
        formaction="employee_screen.php"></td></tr></form>';

mysql_close($con);
?>
