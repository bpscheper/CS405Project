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

  $sql = "SELECT * FROM Inventory";
  $result = mysqli_query($con, $sql);
  echo '<html><body><form name="ship" method="post" action="ship.php">
	<table align="center" border="1">';
  echo '<tr><th> Order Number </th><th> Date </th><th> Status </th><th>
        Ship </th></tr>';
  if (!empty($result)) {
    while($row = mysqli_fetch_array($result)) {
      echo '<tr><td align="center">' . $row['orderNum'] . '</td><td
        align="center">' . $row['Date'] . '</td><td align="center">' .
        $row['status'] . '</td><td align="center">';
      if ($orw['status'] == "pending")
        echo '<input type="radio" name="' . $row['orderNum'] . '" value="yes">
	  Yes<br><input type="radio name="' . $row['orderNum'] . '" value="no">
	  <br>';
      echo '</td></tr>';
    }
  }
  echo '<tr><td><form name="go_back" action="employee_screen.php"><input type="submit" value="Go Back"></form></td></tr>';
  echo '</table>';


}

?>
