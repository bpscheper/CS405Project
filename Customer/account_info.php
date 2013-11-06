<?php 

session_start();

if (isset($_SESSION['username'])) {

} else {
  echo "You are not logged in. Would you like to? <br>"
}

?>
