<?php

session_start();

echo '<a href="../Home.php"><img src="../Logo.jpg" alt="Nile.com"></a>';

$username = "bpsc222";
$host = "mysql.cs.uky.edu";
$password = "u0712429";
$database = "bpsc222";

$today = date("m/d/y");
$split = explode("/", $today);
$month = $split[0];
$day = $split[1];
$year = $split[2];

$l_day = $day - 7;
if ($l_day <= 0) {
  $l_month = $month - 1;
  if ($l_month == 0) {
    $l_month = 12;
    $l_year = $year - 1;
  } else 
    $l_year = $year;
  $l_day = 31 + $day - 7;
}
$last_week = (1000 * $l_year) + (100 * $l_month) + $l_day;
$l_month = $month-1;
if ($l_month == 0) {
  $l_month = 12;
  $l_year = $year -1;
} else
  $l_year = $year;
$last_month = (1000 * $year) + (100 * $l_month) + $day;
$last_year = (1000 * ($year-1)) + (100 * $month) + $day;

#establish connection to database
$con = mysqli_connect($host, $username, $password, $database);
if (mysqli_connect_errno($con)) {
  echo "error connecting to database";
} else {

  echo '<p align="center">Last Week</p>';
  echo '<table border="1" align="center">';
  echo '<tr><th> Order Number </th><th> Date </th><th> Amount </th></tr>';
  $sql = "SELECT * FROM Orders";
  $result = mysqli_query($con, $sql);
  if (!empty($result)) {
    while($row = mysqli_fetch_array($result)) {
      $order = $row['orderNum'];
      $date = $row['date'];
      $new_date = calculate_time($date);
      if ($new_date >= $last_week) {
	$week_total = 0.0;
        echo '<tr><td align="center">' . $order . '</td><td align="center">' .
		$date . '</td>';
        $sql = "SELECT * FROM Contained WHERE orderNum = " . $order;
        $result_new = mysqli_query($con, $sql);
	if (!empty($result_new)) {
	  $order_total = 0.0;
	  while ($row_new = mysqli_fetch_array($result_new)) {
	    $amount = $row_new['amount'];
	    $order_total += $amount;
	  }
	  echo '<td align="center"> $' . $order_total . '</td></tr>';
	}
      }
    }
  }
  echo '</table><br><br>';

  echo '<p align="center">Last Month</p>';
  echo '<table border="1" align="center">';
  echo '<tr><th> Order Number </th><th> Date </th><th> Amount </th></tr>';
  $sql = "SELECT * FROM Orders";
  $result = mysqli_query($con, $sql);
  if (!empty($result)) {
    while($row2 = mysqli_fetch_array($result)) {
      $order = $row2['orderNum'];
      $date = $row2['date'];
      $new_date = calculate_time($date);
      if ($new_date >= $last_month) {
        $month_total = 0.0;
        echo '<tr><td align="center">' . $order . '</td><td align="center">' .
                $date . '</td>';
        $sql = "SELECT * FROM Contained WHERE orderNum = " . $order;
	$result_new2 = mysqli_query($con, $sql);
        if (!empty($result_new2)) {
	  $order_total = 0.0;
          while ($row_new2 = mysqli_fetch_array($result_new2)) {
            $amount = $row_new2['amount'];
	    $order_total += $amount;
	  }
          echo '<td align="center"> $' . $order_total . '</td></tr>';
        } 
      }
    }
  }
  echo '</table><br><br>';


  echo '<p align="center">Last Year</p>';
  echo '<table border="1" align="center">';
  echo '<tr><th> Order Number </th><th> Date </th><th> Amount </th></tr>';
  $sql = "SELECT * FROM Orders";
  $result = mysqli_query($con, $sql);
  if (!empty($result)) {
    while($row3 = mysqli_fetch_array($result)) {
      $order = $row3['orderNum'];
      $date = $row3['date'];
      $new_date = calculate_time($date);
      if ($new_date >= $last_year) {
        $year_total = 0.0;
        echo '<tr><td align="center">' . $order . '</td><td align="center">' .
                $date . '</td>';
	$sql = "SELECT * FROM Contained WHERE orderNum = " . $order;
        $result_new3 = mysqli_query($con, $sql);
        if (!empty($result_new3)) {
	  $order_total = 0.0;
          while ($row_new3 = mysqli_fetch_array($result_new3)) {
            $amount = $row_new3['amount'];
	    $order_total += $amount;
          }
          echo '<td align="center"> $' . $order_total . '</td></tr>';
        }
      }
    }
  }
  echo '</table>';

}

echo '<form name="go_back" method="get" action="employee_screen.php"><input type="submit" value="Employee Screen"></form>';



mysql_close($con);


function calculate_time($string) {

  $time = explode("/", $string);
  return ((1000 * $time[2]) + (100 * $time[0]) + $time[1]);

}

?>
