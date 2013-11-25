<?php 

session_start();
echo '<a href="../Home.php"><img src="../Logo.jpg" alt="Nile.com"></a>';
$username = "bpsc222";
$host = "mysql.cs.uky.edu";
$password = "u0712429";
$database = "bpsc222";

// establish connection to database
$con = mysqli_connect($host, $username, $password, $database);
if (mysqli_connect_errno($con)) {
  echo "error connecting to database";
} else {


  if (isset($_SESSION['username'])) {

    // Display Customer Information
    $sql = "SELECT * FROM Customer WHERE Customer.username == $username";
    $result = mysqli_query($con, $sql);
    echo '<html><body><table align="center" border="1">';
    echo '<tr><th> First Name </th><th> Last Name </th><th> Street </th><th>
  	  City </th><th> State </th><th> Zip </th><th> Email </th><th> 
	  Password </th></tr>';
    if (!empty($result)) {
      while($row = mysqli_fetch_array($result)) {
        echo '<tr><td align="center">' . $row['fname'] . '</td><td
          align="center">' . $row['lname'] . '</td><td align="center">' .
          $row['street'] . '</td><td align="center">' . $row['city'] . '</td>
          <td align="center">' . $row['state'] . '</td><td align="center">' 
	  . $row['zip'] . '</td><td align="center">' . $row['email'] . 
	  '</td><td align="center">' . $row['password1'] . ' %</td></tr>';
      }
    }
    echo '</table>';

    // Update and Back buttons
    echo '<form><table align="center">';
    echo '<tr><td align="center"><input type="submit" value="Update"
	  formaction="update_account.php"></input></td></tr>';
    echo '<tr><td align="center"><input type="submit" value="Back"
	  formaction="customer_screen.php"></input></td></tr>';
    echo '</table></form>';
    echo '</body></html>';

  } else {
    echo "You are not logged in. Would you like to? <br>";
  }
}

$mysqli_close($con);

?>
