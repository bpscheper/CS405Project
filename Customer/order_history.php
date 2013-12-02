<?php

session_start();

echo '<a href="../Home.php"><img src="../Logo.jpg" alt="Nile.com"></a>';

$username = "bpsc222";
$host = "mysql.cs.uky.edu";
$password = "u0712429";
$database = "bpsc222";

// establish connection to database
$con = mysqli_connect($host, $username, $password, $database);
if (mysqli_connect_errno($con)) {
  echo "error connecting to database";
} else {

$orderNum = $_Post['orderNum'];
$now = getdate();
$date = date('Y-m-d H:i:s', mktime(0, 0, 0, $now['mon'], $now['mday'], $now['year']));
$sql = "UPDATE Inventory SET quantity = quantity-1 WHERE Inventory.itemNum = Contains.itemNum";


echo '<html><body><table align="center" border="1">';
echo '<tr><th> Order Number </th><th> Item </th><th> Price </th><th> Date </th></tr>';

$user = $_SESSION["username"];
$sql = "SELECT * FROM Places WHERE username = '" . $user  . "'";
$result = mysqli_query($con, $sql);
if (!empty($result)) {
  while($row = mysqli_fetch_array($result)) {
    $order = $row['orderNum'];
    $sql = "SELECT * FROM Orders WHERE orderNum = " . $order;
    $result4 = mysqli_query($con, $sql);
    if (!empty($result4)) {
      while($row4 = mysqli_fetch_array($result4)) {
        $date = $row4['date'];
      }
    }	
    $sql = "SELECT * FROM Contained WHERE orderNum = " . $order;
    $result2 = mysqli_query($con, $sql);
    if (!empty($result)) {
      while ($row2 = mysqli_fetch_array($result2)) {
	$item = $row2['itemNum'];
	$sql = "SELECT * FROM Inventory WHERE itemNum = " . $item;
	$result3 = mysqli_query($con, $sql);
	if (!empty($result)) {
	  while($row3 = mysqli_fetch_array($result3)) {
	    $price = $row3['price'];
	  }
	} else 
	  $price = 0;
	$amount = $row2['amount'];
	echo '<tr><td align="center">' . $order . '</td><td align="center">' . $item . '
		</td><td align="center"> $' . $amount . '</td><td align="center">' . $date . 
		'</td></tr>';
      }
    }
  }
}

echo '<form><table align="center">';
echo '<tr><tr align="center"><input type="submit" value="Return"
        formaction="customer_screen.php"></input></td></tr>';

}


$mysqli_close($con);
?>
