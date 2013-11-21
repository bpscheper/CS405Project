<?php

session_start();

echo '<html>';
echo '<a href="../home.php"><img src="../Logo.jpg" alt="Nile.com"></a>';
echo '<table width="450" border="0" align="center" bgcolor="#CCCCCC"><tr>';
echo '<form name="form1" method="post" action="add_to_inventory.php"><td>';
echo '<table width="100%" border="0" cellpadding="3" cellspacing="1"
        bgcolor="#FFFFFF"><tr>';
echo '<td colspan="3"><strong>Adding A New Item </strong></td></tr><tr><td
        width="78">Item Number </td><td width="6">:</td><td width="294"><input
        name="itemNum" type="text" id="itemNum" placeholder="Item Number"></td>
        </tr><tr><td>Item Name </td><td>:</td><td><input name="name"
        type="text" id="name" placeholder="Item Name"></td></tr>';
echo '<tr><td>Description </td><td>:</td><td><input name="description" 
	type="text" id="description" placeholder="Description"></td></tr>';
echo '<tr><td>Quantity </td><td>:</td><td><input name="quantity" type="text" 
	id="quantity" placeholder="Quantity"></td></tr>';
echo '<tr><td>Price </td><td>:</td><td><input name="price" type="text" 
	id="price" placeholder="Price"></td></tr>';
if ($_SESSION["employee"] == "Manager") {
  echo '<tr><td>Promotion </td><td>:</td><td><input name="promotion" 
	type="text" id="promotion" placeholder="Promotion"></td></tr>';
}
echo '<tr><td>&nbsp;</td><td>&nbsp;</td><td><input type="submit" name="Submit"
        value="Add Item"></td></tr></table></td></form></tr></table>';
echo '</html>';


?>
