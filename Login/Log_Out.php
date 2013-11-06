<?php

session_start();
session_unset();

echo '<html><body><form name="logout" method="get" action"../Home.php"';
echo '<p>Thank you for shopping with us!</p><br>';
echo '<a href="../Home.php">Go to Home Screen</a>';
echo '</form></body></html>';

?>
