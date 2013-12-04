<?php

session_start();
$success = True;

echo '<a href="../Home.php"><img src="../Logo.jpg" alt="Nile.com"></a>';

$name = "bpsc222";
$database = "bpsc222";
$host = "mysql.cs.uky.edu";
$password = "u0712429";

$con = mysqli_connect($host, $name, $password, $database);
if (mysqli_connect($con)) {
  echo "Trouble connecting to database";
} else {

  $cart = $_SESSION["cart"];

  $sql = "SELECT * FROM Orders";
  $max = 0;
  $result = mysqli_query($con, $sql);
  if (!empty($result)) {
    while ($row = mysqli_fetch_array($result)) {
      if ($row['orderNum'] > $max) 
        $max = $row['orderNum'];
    }
  }
  $orderNum = $max + 1;

  $today = date("m/d/y");
  $sql = "INSERT INTO Orders VALUES (" . $orderNum . ", '" . $today  . "', 'Pending')";
  if (mysqli_query($con, $sql)) {
  }

  $sql = "INSERT INTO Places VALUES ('" . $_SESSION['username']  . "', " . 
	$orderNum . ")";
  if (mysqli_query($con, $sql)) {
  }

  $keys = array_keys($cart);
  for ($i = 0; $i < count($keys); $i++) {
    $itemNumber = $keys[$i];
    $sql = "SELECT * FROM Inventory WHERE itemNum = $itemNumber";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
      $quantity = $row['quantity'];
    }

    $numItems = $cart[$itemNumber][1];
    $amount = $numItems * $cart[$itemNumber][0];
    $sql = "UPDATE Inventory SET quantity = $quantity - $numItems WHERE 
	itemNum = $itemNumber";
    if (mysqli_query($con, $sql)) {
    }

    $sql = "INSERT INTO Contained VALUES (" . $orderNum . ", " . $itemNumber . ", " . $amount . ")";
    if (mysqli_query($con, $sql)) {
    } else 
      $success = False;
  }
  if ($success) {
    echo 'Your order has been placed! <br>';
    echo '<form><tr><td align="center"><input type="submit" value="Back"
        formaction="customer_screen.php"></td></tr></form>';

  }
}

unset($_SESSION["cart"]);
mysql_close($con);

?>
