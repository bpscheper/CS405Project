<?php

session_start();
$quantity_flag = "false";
$promotion_flag = "false";

echo '<a href="../Home.php"><img src="../Logo.jpg" alt="Nile.com"></a>';

$username = "bpsc222";
$host = "mysql.cs.uky.edu";
$password = "u0712429";
$database = "bpsc222";

$good = "true";

#establish connection to database
$con = mysqli_connect($host, $username, $password, $database);
if (mysqli_connect_errno($con)) {
  echo "error connecting to database";
} else {

  $sql = "SELECT * FROM Inventory";
  $result = mysqli_query($con, $sql);
  if (!empty($result)) {
    while ($row = mysqli_fetch_array($result)) {
      $quantity_flag = "false";
      $promotion_flag = "false";
      $update = False;
      $item = $row['itemNum'];
      $string = $item . 'quantity';
      if ($_POST["$string"] != "") {
        $quantity_flag = "true";
        $item_quantity = $_POST["$string"];
	$update = True;
      } else {
	$quantity_flag = "false";
        $item_quantity = $row['quantity'];
      }
      if ($_SESSION["employee"] == "Manager") {
        $string = $item . 'promotion';
	if ($_POST["$string"] != "") {
	  $promotion_flag = "true";
          $item_promotion = $_POST["$string"];
	  $update = True;
	} else {
	  $promotion_flag = "false";
	  $item_promotion = $row['promotion'];
	}
      }
      if (($item_quantity < 0) or ($item_promotion < 0) or ($item_promotion > 100)) {
        echo "invalid input data";
	$good = "false";
      } else if ($good == "true") {
	$sql = "";
	if (($quantity_flag == "true") and ($promotion_flag == "true")) {
	  $sql .= "UPDATE Inventory SET quantity = " . $item_quantity . 
		", promotion = " . $item_promotion . " ";
	} else if ($promotion_flag == "true") {
	  $sql .= " UPDATE Inventory SET promotion = " . $item_promotion . " ";
	} else if ($quantity_flag == "true") {
	  $sql .= "UPDATE Inventory SET quantity = " . $item_quantity . " ";
	}
	if ($update) {
	  $sql .= "WHERE itemNum = " . $item;
	  if (mysqli_query($con, $sql)) {
	    echo 'Item ' . $item . ' successfully updated <br>';
	  } else {
	    echo "Cannot successfully update item " . $item . '<br>';
	  }
	}
      }
    }
  }
}

echo '<table align="center">';
echo '<tr><td><form name="go_back" action="employee_screen.php"><input type="submit" value="Employee Screen"></form></td></tr>';
echo '<tr><td><form name="go_back" action="update_inventory.php"><input type="submit" value="Continue Updating"></form></td></tr>';
echo '</table>';

mysql_close($con);
?>
