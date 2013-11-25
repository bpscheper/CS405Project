<?php

echo '<html>';
echo '<a href="../home.php"><img src="../Logo.jpg" alt="Nile.com"></a>';
echo '<table width="450" border="0" align="center" bgcolor="#CCCCCC"><tr>';
echo '<form name="form1" method="post" action="verify_new_employee.php"><td>';
echo '<table width="100%" border="0" cellpadding="3" cellspacing="1"
        bgcolor="#FFFFFF"><tr>';
echo '<td colspan="3"><strong>Add New Employee </strong></td></tr><tr><td
        width="78">Name </td><td width="6">:</td><td width="294"><input
        name="name" type="text" id="name" placeholder="Name"></td>';
echo '<tr><td>EID </td><td>:</td><td><input name="eid" type="text" id="eid"
        placeholder="EID"></td></tr>';
echo '<tr><td>Status </td><td>:</td><td><input name="status" type="radio" 
	value="Manager">Manager<br><input name="status" type="radio" 
	value="Employee">Employee</td></tr>';
echo '<tr><td>Password </td><td>:</td><td><input name="password" 
	type="password" id="password" placeholder="Password"></td></tr>';
echo '<tr><td>&nbsp;</td><td>&nbsp;</td><td><input type="submit" name="Submit"
        value="Add Employee"></td></tr></table></td></form></tr>';
echo '<tr><form name="back" method="get" action="employee_screen.php"><td>';
echo '<input type="submit" name="submit" value="Go Back"></td></tr>';
echo '</table>';
echo '</html>';


?>
