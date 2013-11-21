<?php

session_start();

echo '<html><body>';
echo '<a href="../Home.php"><img src="../Logo.jpg" alt="Nile.com"></a>';
echo '<form><table align="center">';
echo '<tr><td align="center"><input type="submit" value="View Inventory" 
	formaction="view_inventory.php"></input></td></tr>';
echo '<tr><td align="center"><input type="submit" value="Add New Employee" 
	formaction="add_new_employee.php"></input></td></tr>';
echo '<tr><td align="center"><input type="submit" value="Update Inventory" 
	formaction="update_inventory.php"></input></td></tr>';
echo '<tr><td align="center"><input type="submit" value="Ship Orders" 
	formaction="ship_orders.php"></input></td></tr>';
echo '<tr><td align="center"><input type="submit" value="Add New Item" 
	formaction="add_item.php"></input></td></tr>';
echo '<tr><td align="center"><input type="submit" value="Log Out" 
	formaction="../Login/Log_Out.php"></input></td></tr>';
echo '</table></form>';
echo '</body></html>';

?>
