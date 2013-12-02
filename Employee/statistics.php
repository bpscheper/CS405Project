<?php

session_start();

echo '<a href="../Home.php"><img src="../Logo.jpg" alt="Nile.com"></a>';

$username = "bpsc222";
$host = "mysql.cs.uky.edu";
$password = "u0712429";
$database = "bpsc222";

$today = date("m/d/y");

#establish connection to database
$con = mysqli_connect($host, $username, $password, $database);
if (mysqli_connect_errno($con)) {
  echo "error connecting to database";
} else {

  $sql = "SELECT * FROM Orders";
  $result = mysqli_query($con, $sql);
  if (!empty($result)) {
    while($row = mysqli_fetch_array($result)) {
      $date = $row['date'];
      $now = explode("/", $today);
      $day = $now[1]-7;
      $month = $now[0];
      $year = $now[2];
      if ($day < 0) {
	$day = 31 + $now[1] - 7;
        $month = $month - 1;
        if ($month == 0) {
          $month = 12;
	  $year = $year - 1;
        }
      }
      $last_week = $month . "/" . $day . "/" . $year;
      echo $last_week;
    }
  }

  $sql = "SELECT * FROM Orders";
  $result = mysqli_query($con, $sql);
  if (!empty($result)) {
    while($row2 = mysqli_fetch_array($result)) {
      $date = $row2['date'];
      $now = explode("/", $today);
      $month = $now[0]-1;
      $year = $now[2];
      if ($month == 0) {
        $month = 12;
        $year = $now[2]-1;
      }
      $last_month = $month . "/" . $now[1] . "/" . $year;
      echo $last_month;
    }
  }

  $sql = "SELECT * FROM Orders";
  $result = mysqli_query($con, $sql);
  if (!empty($result)) {
    while($row3 = mysqli_fetch_array($result)) {
      $date = $row3['date'];
      $now = explode("/", $today);
      $year = $now[2]-1;
      $last_year = $now[0] . "/" . $now[1] . "/" . $year;
      if ($date > $last_year) {
        echo "Yes";
      }
    }
  }

}

mysql_close($con);

?>
