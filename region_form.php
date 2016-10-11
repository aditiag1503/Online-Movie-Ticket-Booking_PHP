<?php
include("admin_header.html");
?>
<head>
<link href="companytitlestyle.css" type="text/css" rel="stylesheet" />
<link href="mainformstyle.css" type="text/css" rel="stylesheet" />
</head>
<body>
<a href="admin_options.php"><h3 id="home"><div id="homediv">HOME</div></h3></a>
<div id = "main">
<center> <h2> REGION FORM </h2></center><br><br>
<table align="center" cellspacing=20>
 <form action="insert_region.php">
	<tr>
    <td>ENTER NEW REGION </td>
	<td><input type="text" name="txt_region" ></td>
	</tr>
   <tr>
     <td></td>
    <td><input type="submit" value="Insert"></td>
    </tr>

	<tr>
    <td>
    REGIONS EXIST </td>
    <td>
    <?php
	include("db_connect.inc");
	 
	$rslist=mysql_query("select rname from region_master order by rname",$con);
	
     echo "<select>";
	while($rrow=mysql_fetch_array($rslist))
	{
	echo"<option>".$rrow['rname']."</option>";
	}
	echo "</select>";
   ?>
   </td>
   </tr>

 </form>
</table>
</div>
</body>
</html>