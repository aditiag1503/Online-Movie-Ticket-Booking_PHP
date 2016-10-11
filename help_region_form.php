<?php session_start();?>
<?php
include("admin_header.html");
?>
<head>
<link href="companytitlestyle.css" type="text/css" rel="stylesheet" />
<link href="mainformstyle.css" type="text/css" rel="stylesheet" />
</head>
<body>

<div id = "main">
<center> <h2> REGION FORM </h2></center><br><br>
<table align="center" cellspacing=20>
 <form action="insert_region.php">
	<tr>
    <td>ENTER NEW REGION </td>
	<td><input type="text" name="txt_region" ></td>
	</tr>
	<tr><td></td>
    <td><input type="submit" value="Insert"></td>
    </tr>
 </form>
 <form action="delete_region.php">

	<tr>
    <td>LIST OF CURRENT REGIONS <br>(to be deleted,optional) </td>
	<td><select name="region" >
		<?php
		 include("db_connect.inc");
		 $a=$_SESSION['aid'];
		 $rsregion=mysql_query("select region from $a",$con);
			while($row=mysql_fetch_array($rsregion))
		{
			$rn=$row["region"];
			echo "<option value='$rn'>";
			echo "$rn";
			echo"</option>";
		}
        ?>
	</td>
	</tr>
    <tr><td></td>
	<td><input type="submit" value="Delete"></td>
    </tr>
    </form>
    </table>
</div>
</body>
</html>