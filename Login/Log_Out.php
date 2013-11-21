<?php

session_start();

echo '<a href="../home.php"><img src="../Logo.jpg" alt="Nile.com"></a>';

echo '<html><body><form name="logout" method="get" action"../Home.php"';
if (isset($_SESSION["employee"])) {
  echo '<p>You have successfully logged out!</p><br>';
}
else {
  echo '<p>Thank you for shopping with us!</p><br>';
}
echo '<a href="../Home.php">Go to Home Screen</a>';
echo '</form></body></html>';

session_unset();

?>
