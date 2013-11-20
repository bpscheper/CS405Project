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
  echo '<html><body><table align="center" border="1">';
  echo '<tr><th> Item Number </th><th> Item Name </th><th> Quantity </th><th>
	Price </th><th> Promotion </th><th> New Quantity </th>';
  if ($_SESSION["employee"] == "manager") {
    echo '<th> New Promotion </th>';
  }
  echo '</tr>';
  if (!empty($result)) {
    while($row = mysqli_fetch_array($result)) {
      echo '<tr><td align="center">' . $row['itemNum'] . '</td><td 
	align="center">' . $row['itemName'] . '</td><td align="center">' . 
	$row['quantity'] . '</td><td align="center">' . $row['price'] . '</td>
	<td align="center">' . $row['promotion'] . '</td><td><input type=
	"text" name="' . $row['itemNum'] . '" placeholder="0">';
      echo '</td></tr>';
    }
  }
  echo '</table>';
}

$mysqli_close($con);

?>
