<?php

$host = "mysql.cs.uky.edu";
$username = "bpsc222";
$database = "bpsc222";
$password = "u0712429";

$con = mysqli_connect($host, $username, $password, $database);

if (mysqli_connect_errno($con)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

session_start();

echo '<html><body><form name="home_form" method="post">';
echo '<div style="float:left"><a href="Home.php"><img src="Logo.jpg" 
	alt="Nile.com"></a></div>';
if (isset($_SESSION["username"])) {
  echo '<div style="position: absolute; top: 120; left: 10"><a href=
	"Customer/account_info.php"> Manage Account </a></div>';
  echo '<div style="position: absolute; top: 145; left: 10"><a href=
        "Customer/shop.php"> Start Shopping </a></div>';
  echo '<div style="position: absolute; top: 170; left: 10"><a href=
        "Customer/order_history.php"> View Purchase History </a></div>';
  echo '<div style="position: absolute; top: 195; left: 10"><a href=
        "Customer/cart.php"> View Shopping Cart </a></div>';
  echo '<div style="position: absolute; top: 220; left: 10"><a href=
        "Customer/recommended.php"> Recommended for Me </a></div>';
  echo '<div style="float:right">Hello, <a href="Customer/account_info.php">';
  $name = $_SESSION["fname"];
  echo $name . '</a></div><br>';
  echo '<div style="float:right"><a href="Login/Log_Out.php">Log out</a></div>';
} else {
  echo '<div style="float:right">Hello, <a href="Login/customer_login.php">';
  echo 'Sign In</a></div><br>';
  echo '<div style="float:right"><a href="Login/customer_register.php">
	Register Now</a></div>';
  if (isset($_SESSION["employee"])) {
    echo '<div style="position: absolute; bottom: 0; right: 0;"><a
        href="Employee/employee_screen.php">Employee Screen</a></div>';      
  }
  else {
    echo '<div style="position: absolute; bottom: 0; right: 0;"><a 
	href="Login/employee_login.php">Employee Sign In</a></div>';
  }
}
echo '<br><div style="float:left"> Search the Store </a><input type="text" 
	name="search" size="80"><input type="submit" name="Search" 
	formaction="search.php"></div>';
$sql = "SELECT * FROM Inventory WHERE itemDescription LIKE '%" .
        $search_string . "%' UNION SELECT * FROM Inventory";
$result = mysqli_query($con, $sql);
if (!mysqli_num_rows($result)) {
  echo "Sorry. No items match your search";
} else {
  echo '<br><br>';
  echo '<div style="float:center"><br><br><table align="center" border="1">
        <tr><th> Item Number </th><th> Item Name </th><th> Description </th>
        <th> Quantity </th><th>Price </th><th> Promotion </th><th> New Price
        </th>';
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
    echo '</form>';
  }

  echo '</table></div>';
}

echo '<div style="position: absolute; bottom: 20; right: 0;"><img 
	src="Pictures/ad1.jpg" alt="ad"></div>';
echo '<div style="position: absolute; bottom: 0; left: 0;"><img
        src="Pictures/ad2.jpg" alt="ad" height="400" width"200">';
echo '</div>';
echo '</form></body></html>';

mysql_close($con);
?>
