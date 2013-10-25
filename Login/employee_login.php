<?php

echo '<html>';
echo '<table width="300" border="0" align="center" bgcolor="#CCCCCC"><tr>';
echo '<form name="form1" method="post" action="check_employee.php"><td>';
echo '<table width="100%" border="0" cellpadding="3" cellspacing="1"
        bgcolor="#FFFFFF"><tr>';
echo '<td colspan="3"><strong>Member Login </strong></td></tr><tr><td
        width="78">EID</td><td width="6">:</td><td width="294"><input
        name="eid" type="text" id="eid" placeholder="EID"></td>
        </tr><tr><td>Password</td><td>:</td><td><input name="password"
        type="text" id="password" placeholder="password"></td></tr>';
echo '<tr><td>&nbsp;</td><td>&nbsp;</td><td><input type="submit" name="Submit"
        value="Login"></td></tr></table></td></form></tr></table>';
echo '</html>'

?>

