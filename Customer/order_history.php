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

$orderNum = $_Post['orderNum'];
$date = '25 November';

$sql = "INSERT INTO Places values ('" . $username . "', '" . $orderNum . "')";
$sql = "INSERT INTO Orders values ('" . $orderNum . "', '" . $date . "')";

    $result = mysqli_query($con, $sql);
    echo '<html><body><table align="center" border="1">';
    echo '<tr><th> Order Number </th><th> Date </th></tr>';
    if (!empty($result)) {
      while($row = mysqli_fetch_array($result)) {
        echo '<tr><td align="center">' . $row['orderNum'] . '</td><td
              align="center">' . $row['date'] . ' %</td></tr>';
      }
    }
    echo '</table>';

  echo '<form><table align="center">';
  echo '<tr><tr align="center"><input type="submit" value="Return"
	formaction="customer_screen.php"></input></td></tr>';
  echo '</table></form>';
  echo '</body></html>';
}
$mysqli_close($con);
?>
