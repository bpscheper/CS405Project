<?php

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$street = $_POST['street'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$username = $_POST['username'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];

if ($password1 != $password2) {
    echo 'Passwords do not match! <br>';
    echo '<html><body><a href="customer_register.php">Try Registering Again</a>';
    echo '</body></html>';
}


?>
