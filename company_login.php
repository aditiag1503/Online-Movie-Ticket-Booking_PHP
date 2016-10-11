
<?php
include("admin_header.html");
?>
<head>
<title>company_login</title>

<link href="mainformstyle.css" type="text/css" rel="stylesheet" />

</head>

<body>

<div id = "main">
<center> <h2> COMPANY LOGIN</h2></center>
<table align="center" cellspacing=40>
<form action="company_check_login.php" method="post">
<tr><td>Company Id </td>
<td><input type="text" name="txt_user" ></td>
</tr>
<tr><td>Company Password </td>
<td><input type="password" name="txt_password"></td>
</tr>
<tr><td></td>
<td><input type="submit" value="Login"></td>
</tr>
</form>
</table>
</div>

</body>
</html>