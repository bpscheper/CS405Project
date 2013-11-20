<?php

echo '<a href="../home.php"><img src="../Logo.jpg" alt="Nile.com"></a>';

$name = "bpsc222";
$database = "bpsc222";
$host = "mysql.cs.uky.edu";
$password = "u0712429";

$con = mysqli_connect($host, $name, $password, $database);
if (mysqli_connect($con)) {
  echo "Trouble connecting to database";
} else {

  $e_name = $_POST['name'];
  $eid = $_POST['eid'];
  $status = $_POST['status'];
  $e_password = $_POST['password'];

  $sql = "INSERT INTO Employee values ('" . $eid . "', '" . $e_password . "', 
	'" . $status . "', '" . $e_name . "')";
  if (mysqli_query($con, $sql)) {
    echo '<html><body><p>Employee successfully added into system</p>';
    echo '<p><a href="employee_screen.php">Go back to Employee Options</a></p>
	</body></html>';
  } else {
    echo mysqli_error($con);
  }
}

mysqli_close($con);

?>
