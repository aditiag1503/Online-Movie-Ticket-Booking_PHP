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
<center> <h2> TICKET-TYPE FORM </h2></center><br>
<table align="center" cellspacing=20>
 <form action="screen_ticket_type.php">
 
	<tr>
    <td>SELECT REGION</td>
    <td><select name="region" >
		<?php
		 include("db_connect.inc");
		
		 $rsregion=mysql_query("select * from region_master",$con);
		 
			while($row=mysql_fetch_array($rsregion))
		{
			$rn=$row["rname"];
			$rid=$row["rid"];
			echo "<option value='$rid'>";
			echo "$rn";
			echo"</option>";
		}
		
        echo"</select>";
		
		
		?>
        
        </td>
    </tr>
	<tr>
    <tr><td></td>
    <td><input type="submit" ></td>
    </tr>
 </form>
</table>
</div>
</body>
</html>