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

//get order number
$itemNum = $_POST['itemNum'];
$amount = $_POST['price'];

$total = 0.00;

$sql = "INSERT INTO Contains values ('" . $orderNum . "', '" . 
	$itemNum . "', '" . $amount . "')";

$result = mysqli_query($con, $sql);
echo '<html><body><table align="center" border="1">';
echo '<tr><th> Item Number </th><th> Item Price </th></tr>';
if (!empty($result)) {
  while ($row = mysqli_fetch_array($result)) {
    echo '<tr><td align="center">' . $row['itemNum'] . '</td><td
	 align="center">' . $row['price'] . ' %</td></tr>';
    $total = $total + $amount;
  }
  echo '<tr><td align="center">' . "Total" . '</td><td align="center">' 
	. $total . ' %</td></tr>';
}
echo '</table>'

echo '<form><table align="center">';
echo '<tr><td align="center"><input type="submit" value="Shop"
	formaction="shop.php></input></td></tr>';
echo '<tr><td align="center"><input type="submit" value="Purchase"
	formaction="order_history.php></input></td></tr>';
echo '</table></form>';
echo '</body></html>';

$mysqli_close($con)
?>
