<?php

echo '<html>';
echo '<a href="../home.php"><img src="../Logo.jpg" alt="Nile.com"></a>';
echo '<table width="450" border="0" align="center" bgcolor="#CCCCCC"><tr>';
echo '<form name="form1" method="post" action="add_customer.php"><td>';
echo '<table width="100%" border="0" cellpadding="3" cellspacing="1" 
	bgcolor="#FFFFFF"><tr>';
echo '<td colspan="3"><strong>Customer Register </strong></td></tr><tr><td 
	width="78">First Name </td><td width="6">:</td><td width="294"><input 
	name="fname" type="text" id="fname" placeholder="First Name"></td>
	</tr><tr><td>Last Name </td><td>:</td><td><input name="lname" 
	type="text" id="lname" placeholder="Last Name"></td></tr>';
echo '<tr><td>Email </td><td>:</td><td><input name="email" type="text" id="email" 
	placeholder="Email"></td></tr>';
echo '<tr><td>Street Address </td><td>:</td><td><input name="street" type="text" id="street"
        placeholder="Street"></td></tr>';
echo '<tr><td>City </td><td>:</td><td><input name="city" type="text" id="city"
        placeholder="City"></td></tr>';
echo '<tr><td>State </td><td>:</td><td><input name="state" type="text" id="state"
        placeholder="State"></td></tr>';
echo '<tr><td>Zip Code </td><td>:</td><td><input name="zip" type="text" id="zip"
        placeholder="Zip Code"></td></tr>';
echo '<tr><td>Username </td><td>:</td><td><input name="username" type="text" id="username"
        placeholder="Username"></td></tr>';
echo '<tr><td>Password </td><td>:</td><td><input name="password1" type="password" id="passqord1"
        placeholder="Password"></td></tr>';
echo '<tr><td>Retype Password </td><td>:</td><td><input name="password" type="password" 
	id="password2" placeholder="Password"></td></tr>';
echo '<tr><td>&nbsp;</td><td>&nbsp;</td><td><input type="submit" name="Submit" 
	value="Register"></td></tr></table></td></form></tr></table>';
echo '</html>';

?>
