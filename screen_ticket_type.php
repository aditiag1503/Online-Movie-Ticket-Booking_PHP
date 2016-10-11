<?php session_start();?>
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
<center> <h2> MOVIE FORM</h2></center><br>
<table align="center" cellspacing=20>
 <form action="ticket_type_form.php">
 <tr>
 <td>SELECT SCREEN</td>
	<td><select name="screen" >
		<?php
		 include("db_connect.inc");
		 $reg=$_REQUEST['region'];
		$_SESSION['r_id']=$_REQUEST['region'];
		$a=$_SESSION['id'];
		 $rsregion= mysql_query("select sid,screen_name from screen_master where region_id='$reg' and company_id='$a'",$con);
		 
			while($row=mysql_fetch_array($rsregion))
		{
			$sid=$row["sid"];
			$sn=$row["screen_name"];
			echo "<option value='$sid'>";
			echo "$sn";
			echo"</option>";
		}
	//echo"<input type='hidden' value='screen'>";
        ?>
        </select>
	</td>
	</tr>
    <tr><td></td>
    <td><input type="submit" value="Proceed"></td>
    </tr>
</form>
</table>
</div>
</body>
</html>