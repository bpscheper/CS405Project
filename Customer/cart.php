<?php

session_start();

echo '<a href="../Home.php"><img src="../Logo.jpg" alt="Nile.com"></a>';

$name = "bpsc222";
$database = "bpsc222";
$host = "mysql.cs.uky.edu";
$password = "u0712429";

$con = mysqli_connect($host, $name, $password, $database);
if (mysqli_connect($con)) {
  echo "Trouble connecting to database";
}

if ($_SERVER['HTTP_REFERER'] != "https://sweb.uky.edu/~bpsc222/CS405/CS405Project/Home.php") {
  $sql = "SELECT * FROM Inventory";
  $result = mysqli_query($con, $sql);
  if (!mysql_num_rows($result)) {
    while ($row = mysqli_fetch_array($result)) {
      $num = $row['itemNum'];
      $price = $row['price'];
      $amount = $_POST[$num];
      if ($amount < 0) {
      } else if ($amount == "") {
      } else if ($amount > $row['quantity']) {
	echo 'Not enough inventory. Please shop later for that item. <br>';
      } else {
        if (!isset($_SESSION["cart"])) {
          $cart = array($num => array($price, $amount));
          $_SESSION["cart"] = $cart;
	  #print '<pre>';
	  #print_r ($cart);
	  #print '</pre>';
        } else {
	  $cart = $_SESSION["cart"];
          if (array_key_exists($num, $cart)) {
	    $old_amount = $cart[$num][1];
	    $cart[$num] = array($price, $old_amount + $amount);
	    $_SESSION["cart"] = $cart;
          } else {
	    $cart[$num] = array($price, $amount);
            $_SESSION["cart"] = $cart;
          }
        }
      }
    }
  }
}

echo '<html><body><table align="center" border="1">';
echo '<tr><th> Item Number </th><th> Item Price </th><th> Quantity </th></tr>';

$cart = $_SESSION['cart'];
$keys = array_keys($cart);
#print '<pre>';
#print_r ($cart);
#print '</pre>';

for ($i = 0; $i < count($keys); $i++) {
  $itemNumber = $keys[$i];
  echo '<tr><td align="center">' . $itemNumber . '</td><td align="center">' . 
	$cart[$itemNumber][0] . '</td><td align="center">' . $cart[$itemNumber]
	[1] . '</td></tr>';
}
echo '</table>';

echo '<form><table align="center">';
echo '<tr><td align="center"><input type="submit" value="Shop"
        formaction="shop.php"></input></td></tr>';
echo '<tr><td align="center"><input type="submit" value="Purchase"
        formaction="purchase.php"></input></td></tr>';
echo '<tr><td align="center"><input type="submit" value="Back"
	formaction="customer_screen.php"></input></td></tr>';
echo '</table></form>';
echo '</body></html>';

$mysqli_close($con);
?>
