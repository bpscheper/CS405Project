<?php

session_start();

$username = "bpsc222";
$host = "mysql.cs.uky.edu";
$password = "u0712429";
$database = "bpsc222";

#establish connection to database
$con = mysqli_connect($host, $username, $password, $database);
if (mysqli_connect_errno($con)) {
  echo "error connecting to database";
} else {

  $eid = $_POST['eid'];
  $e_password = $_POST['password'];

  $sql = "SELECT * FROM Employee E WHERE E.eid = '" . $eid . "' AND E.password 
	= '" . $e_password . "'";
  $result = mysqli_query($con, $sql);
  if (!empty($result)) {
    while($row = mysqli_fetch_array($result)) {
      $_SESSION["employee"] = $row['status'];
      $_SESSION["name"] = $row['name'];
      echo '<html><body><a href="../Employee/employee_screen.php">Manage Store
	</a></body></html>';
  }
  echo $sql;
}
$mysql_close($con);

?>
