<?php

session_start();

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

  $eid = $_POST['eid'];
  $e_password = $_POST['password'];

  $sql = "SELECT * FROM Employee E WHERE E.eid = '" . $eid . "' AND E.password 
	= '" . $e_password . "'";
  
  $result = mysqli_query($con, $sql);
  if (mysql_num_rows($result)) {
    while($row = mysqli_fetch_array($result)) {
      $_SESSION["employee"] = $row['status'];
      $_SESSION["name"] = $row['name'];
      echo '<html><body><p><a href="../Employee/employee_screen.php">Manage 
	Store </a></p></body></html>';
    }
  } else {
    echo '<br>Error logging in. Try Again. <br>';
    echo '<html><body><p><a href="employee_login.php"> Log In </a>
	</p></body></html>';
  }
}
$mysql_close($con);

?>
