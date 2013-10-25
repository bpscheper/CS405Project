<?php

echo '<html>';
echo '<table width="400" border="0" align="center" bgcolor="#CCCCCC"><tr>';
echo '<form name="form1" method="post" action="add_customer.php"><td>';
echo '<table width="100%" border="0" cellpadding="3" cellspacing="1"
        bgcolor="#FFFFFF"><tr>';
echo '<td colspan="3"><strong>Customer Register </strong></td></tr><tr><td
        width="78">First Name </td><td width="6">:</td><td width="294"><input
        name="fname" type="text" id="fname" placeholder="First Name"></td>
        </tr><tr><td>Last Name </td><td>:</td><td><input name="lname"
        type="text" id="lname" placeholder="Last Name"></td></tr>';
echo '<tr><td>&nbsp;</td><td>&nbsp;</td><td><input type="submit" name="Submit"
        value="Register"></td></tr></table></td></form></tr></table>';
echo '</html>'

?>

