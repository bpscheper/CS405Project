<?php

session_start();
$quantity_flag = "false";
$promotion_flag = "false";

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
  if (!empty($result)) {
    while ($row = mysqli_fetch_array($result)) {
      $item = $row['itemNum'];
      $string = $item . 'quantity';
      if ($_POST["$string"] != "") {
        $quantity_flag = "true";
        $item_quantity = $_POST["$string"];
      }
      if ($_SESSION["employee"] == "Manager") {
        $string = $item . 'promotion';
	if ($_POST["$string"] != "") {
	  $promotion_flag = "true";
          $item_promotion = $_POST["$string"];
	} else {
	  $item_promotion = 0;
	}
      }
      if (($item_quantity < 0) or ($item_promotion < 0)) {
        echo "invalid input data";
      } else {
	$sql = "UPDATE Inventory ";
	if (($quantity_flag == "true") and ($promotion_flag == "true")) {
	  $sql .= "SET quantity = " . $item_quantity . ", promotion = " . 
		$item_promotion . " ";
	} else if ($promotion_flag == "true") {
	  $sql .= "SET promotion = " . $item_promotion . " ";
	} else if ($quantity_flag == "true") {
	  $sql .= "SET quantity = " . $item_quantity . " ";
	}
	$sql .= "WHERE itemNum = " . $item;
	echo $sql . '<br>';
	if (mysqli_query($con, $sql)) {
 	  echo "Updated item " . $item . '<br>';
	} else { 
	  echo "Cannot successfully update item " . $item . '<br>';
	}   
      }
    }
  }
}

?>
