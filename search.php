<?php

session_start();

echo '<div style="float:left"><a href="Home.php"><img src="Logo.jpg"
        alt="Nile.com"></a></div>';

$host = "mysql.cs.uky.edu";
$username = "bpsc222";
$database = "bpsc222";
$password = "u0712429";

$con = mysqli_connect($host, $username, $password, $database);

if (mysqli_connect_errno($con)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_SESSION["username"])) {
  echo '<div style="position: absolute; top: 120; left: 10"><a href=
        "Customer/account_info.php"> Manage Account </a></div>';
  echo '<div style="position: absolute; top: 145; left: 10"><a href=
        "Customer/order_history.php"> View Purchase History </a></div>';
  echo '<div style="position: absolute; top: 170; left: 10"><a href=
        "Customer/cart.php"> View Shopping Cart </a></div>';
  echo '<div style="position: absolute; top: 195; left: 10"><a href=
        "Customer/recommended.php"> Recommended for Me </a></div>';
  echo '<div style="float:right">Hello, <a href="Customer/account_info.php">';
  $name = $_SESSION["fname"];
  echo $name . '.</a><br>';
  echo '<a href="Login/Log_Out.php">Log out</a></div>';
} else {
  echo '<div style="float:right">Hello, <a href="Login/customer_login.php">';
  echo 'Sign In</a></div><br>';
  echo '<div style="float:right"><a href="Login/customer_register.php">
	Register Now</a></div>';
}

echo '<br><form name="search" method="post"><div style="float:center"> Search 
	the Store </a><input type="text" name="search" size="80"><input type=
	"submit" name="Submit" formaction="search.php"></div></form><br>';

$search_string = $_POST['search'];
$sql = "SELECT * FROM Inventory WHERE itemDescription LIKE '%" . 
	$search_string . "%' UNION SELECT * FROM Inventory WHERE itemName 
	LIKE '%" . $search_string . "%'";
$result = mysqli_query($con, $sql);
if (!mysqli_num_rows($result)) {
  echo "Sorry. No items match your search";
} else {
  echo '<div style="float:center"><br><br><table align="center" border="1">
	<tr><th> Item Number </th><th> Item Name </th><th> Description </th>
	<th> Quantity </th><th>Price </th><th> Promotion </th><th> New Price 
	</th><th></th><th></th></tr>';
  while ($row = mysqli_fetch_array($result)) {
    echo '<tr><td align="center">' . $row['itemNum'] . '</td><td align="center"
	>' . $row['itemName'] . '</td><td align="center">' . $row[
	'itemDescription'] . '</td><td align="center">' . $row['quantity'] . 
	'</td><td align="center"> $' . $row['price'] . '</td>';
    if ($row['promotion'] == "")
      $promotion = 0;
    else
      $promotion = $row['promotion'];
    echo '<td align="center">' . $promotion . ' %</td><td align="center">';
    $new_price = round($row['price'] - ($row['price']*$promotion) / 100.00, 2);
    if ($new_price != $row['price']) 
      echo '<font color="red">$' . $new_price . '</font></td>';
    else 
      echo '$' . $new_price . '</td>';
    echo '<td><form name="buy" method="post" formaction="buy.php"><input 
	type="submit" name="' . $row['itemNum'] . 'buy" value="Buy Now"></form>
	</td>';
    echo '<td><form name="cart" method="post" formaction="add_to_cart.php">
	<input type="submit" name="' . $row['itemNum'] . 'cart" value=
	"Add To Cart"></form></td></tr>';

  }

  echo '</table></div>';
}

echo '<div style="position: absolute; bottom: 0; right: 0;"><img
        src="Pictures/ad1.jpg" alt="ad"></div>';
echo '<div style="position: absolute; bottom: 0; left: 0;"><img
        src="Pictures/ad2.jpg" alt="ad" height="400" width"200">';


mysql_close($con);

?>
