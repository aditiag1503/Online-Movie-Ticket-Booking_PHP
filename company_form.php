<?php session_start(); ?>
<?php
include("admin_header.html");
?>
<head>
<link href="mainformstyle.css" type="text/css" rel="stylesheet" />
</head>
<body>
<a href="admin_options.php"><h3 id="home"><div id="homediv">HOME</div></h3></a>
<div id = "main">
<center> <h2> COMPANY FORM </h2></center><br><br>
<table align="center" cellspacing=20>
 <form action="insert_company.php">
	<tr>
    <td>ENTER COMPANY NAME </td>
	<td><input type="text" name="txt_company" ></td>
	</tr>
	<tr><td>ENTER USERNAME </td>
	<td><input type="text" name="txt_user" ></td>
	</tr>
    <tr><td>ENTER PASSWORD </td>
	<td><input type="text" name="txt_pwd" ></td>
	</tr>
    <tr><td></td>
    <td><input type="submit" value="Insert"></td>
    </tr>
 </form>
</table>
</div>
</body>
</html>
