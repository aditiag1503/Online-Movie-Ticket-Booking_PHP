<?php session_start(); ?>
<?php
include("admin_header.html");
?>
<head>
<link href="companytitlestyle.css" type="text/css" rel="stylesheet" />
<link href="mainformstyle.css" type="text/css" rel="stylesheet" />
</head>
<body>
<a href="company_options.php"><h3 id="home"><div id="homediv">HOME</div></h3></a>
<div id = "main">
<center> <h2> CHANGE PASSWORD FORM </h2></center><br><br>
<table align="center" cellspacing=20>
 <form action="update_new_password.php">
	<tr>
    <td>CURRENT PASSWORD </td>
    <td>
    <?php
	include("db_connect.inc");
	$a=$_SESSION['id'];
	$rs=mysql_query("select c_password from company_master where cid='$a'");
	$row=mysql_fetch_array($rs);
	$b=$row[0];
	echo"<input type='text' value='$b' >";
	?>
	</td>
	</tr>
	<tr>
    <td>
    ENTER NEW PASSWORD </td>
    <td>
    <input type='text' name='txt_new_pwd' >
   </td>
   </tr>
   <tr>
     <td></td>
    <td><input type="submit" value="Update"></td>
    </tr>
 </form>
</table>
</div>
</body>
</html>