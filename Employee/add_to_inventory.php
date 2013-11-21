<?php

session_start();

echo '<a href="../home.php"><img src="../Logo.jpg" alt="Nile.com"></a>';

$name = "bpsc222";
$database = "bpsc222";
$host = "mysql.cs.uky.edu";
$password = "u0712429";

$con = mysqli_connect($host, $name, $password, $database);
if (mysqli_connect($con)) {
  echo "Trouble connecting to database";
} else {
  $itemNum = $_POST['itemNum'];
  $itemName = $_POST['name'];
  $description = $_POST['description'];
  $quantity = $_POST['quantity'];
  $price = $_POST['price'];
  if ($_SESSION["employee"] == "Manager") {
    $promotion = $_POST['promotion'];
  } else {
    $promotion = 0;
  }

  $sql = "INSERT INTO Inventory values (" . $itemNum . ", '" . $itemName . "',
	'" . $description . "', " . $quantity . ", " . $price . ", " . 
	$promotion . ")";
  if (mysqli_query($con, $sql)) {
    echo '<html><body><p>Item successfully added into system</p>';
    echo '<p><a href="add_item.php">Add another item?</a></p>';
    echo '<p><a href="employee_screen.php">Go back to Employee Options</a></p>
        </body></html>';
  } else {
    echo mysqli_error($con);
  }
}

mysqli_close($con);

?>
