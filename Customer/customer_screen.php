<?php
// Customer Screen after logging in
session_start();

// Create table of Customer Options
echo '<html><body>';
echo '<a href="../Home.php"><img src="../Logo.jpg" alt="Nile.com"></a>';
echo '<form><table align="center">';
// Account Info option to see and update information
echo '<tr><td align="center"><input type="submit" value="Account Info"
	formaction="account_info.php"></input></td></tr>';
// Shop option to view and add items to cart
echo '<tr><td align="center"><input type="submit" value="Shop"
	formaction="shop.php"></input></td></tr>';
// Shopping cart option to view items in the cart, total price and purchase
echo '<tr><td align="center"><input type="submit" value="Cart"
	formaction="cart.php"></input></td></tr>';
// Order History option to view information of past orders
echo '<tr><td align="center"><input type="submit" value="Order History"
	formaction="order_history.php"></input></td></tr>';
echo '<tr><td align="center"><input type="submit" value="Log Out"
        formaction="../Login/Log_Out.php"></input></td></tr>';
echo '<tr><td align="center"><input type="submit" value="Home"
        formaction="../Home.php"></input></td></tr>';
echo '</table></form>';
echo '</body></html>';

?>
