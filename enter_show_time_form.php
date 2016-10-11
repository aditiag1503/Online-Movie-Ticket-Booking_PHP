
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
<center> <h2> ENTER SHOW TIME </h2></center><br>
<table align="center" cellspacing=20>
 <form action="insert_show_time.php" method="get">
	<tr>
    <td>ENTER START SHOW TIME </td>
	<td><input type="text" name="txt_start_time" ></td>
	</tr>
    <tr>
    <td>ENTER END SHOW TIME </td>
	<td><input type="text" name="txt_end_time" ></td>
	</tr>
	<tr><td>EXISTING SHOW-TIMES</td>
    
    <td>
    
     <?php
	include("db_connect.inc");
	$sc=$_REQUEST['screen'];	 
	$rslist=mysql_query("select start_show_time from show_time_master where screen_id='$sc' order by start_show_time",$con);
    echo "<select>";
	while( $rrow=mysql_fetch_array($rslist) )
	{
	echo "<option>".$rrow['start_show_time']."</option>";
	}
	echo "</select>";
   echo "<input type='hidden' value='$sc' name='sc'>";
   ?>
   
    </td>
    </tr>
    
    <tr><td></td>
    <td><input type="submit" ></td>
    </tr>
    
 </form>
</table>
</div>
</body>
</html>