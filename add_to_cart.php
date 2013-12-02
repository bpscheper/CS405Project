<?php

session_start();

$host = "mysql.cs.uky.edu";
$username = "bpsc222";
$database = "bpsc222";
$password = "u0712429";

$con = mysqli_connect($host, $username, $password, $database);

if (mysqli_connect_errno($con)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

echo '<html><body><form name="home_form" method="post">';
echo '<div style="float:left"><a href="Home.php"><img src="Logo.jpg" alt="Nile.com"></a></div>';
echo '<br><div style="float:left"> Search the Store </a><input type="text"
        name="search" size="80"><input type="submit" name="Search"
        formaction="search.php"></div>';
if (!isset($_SESSION["username"])) {
  echo 'Error! You cannot view this page! <br>';
  echo '<form "goback" method="get" action="../Home.php">';
  echo '<input type="submit" name="goback" value="Home" formaction="Home.php"></form>';
} else {
  echo '<div style="position: absolute; top: 120; left: 10"><a href=
        "Customer/account_info.php"> Manage Account </a></div>';
  echo '<div style="position: absolute; top: 145; left: 10"><a href=
        "Customer/order_history.php"> View Purchase History </a></div>';
  echo '<div style="position: absolute; top: 170; left: 10"><a href=
        "Customer/cart.php"> View Shopping Cart </a></div>';
  echo '<div style="position: absolute; top: 195; left: 10"><a href=
        "Customer/recommended.php"> Recommended for Me </a></div>';

  $sql = "SELECT * FROM Inventory";
  $result = mysqli_query($con, $sql);
  if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_array($result)) {
      $item_string = $row['itemNum'] . 'cart';
      $amount = $_POST["$item_string"];
      echo $amount;
      if ($amount < 0) {
	echo 'Invalid Number';
      } else {
	if ($amount > $row['quantity']) {
	  echo 'There is not enough inventory! Please come back later to check.';
	} else {
	  $sql = "INSERT ";
	}
      }
    }
  }
}


mysql_close($con);

?>
