<?php session_start();?>
<?php
include("admin_header.html");
?>
<head>

<link href="mainformstyle.css" type="text/css" rel="stylesheet" />
</head>
<body>

<div id = "main">
<center> <h2> SCREENS FORM </h2></center><br /><br />
<table align="center" cellspacing=20>
 <form action="add_screen.php" method="get">
	<tr>
    	<td>SELECT REGION </td>
		<td><select name="cmb_region">
			<?php
             include("db_connect.inc");
             $a=$_SESSION['aid'];
             $rsregion=mysql_query("select * from $a",$con);
                while($row=mysql_fetch_array($rsregion))
            {
				$id=$row[0];
                $rn=$row['region'];
                $count=$row['screen_no'];
                echo "<option value=$id>";
                echo $rn;
                echo"</option>";
            }
            
        echo"</td>";
	echo"</tr>";
	echo"<tr>";echo"<td>"; echo"NO OF SCREENS PRESENT";echo"</td>";
	
	echo"<td>";echo"<input type='text' value=$count>";
	?>
    </td>
    </tr>
    <tr>
    <td>CHOOSE NO OF SCREENS TO BE ADDED </td>
    <td><select name="screen_cnt" > 
    <option value="1">1
    <option value="2">2
    <option value="3">3
    <option value="4">4
    <option value="5">5
    </td>
    </tr>
    <tr>
    <td><input type='submit' value='Add screen'/></td>
 </form>
 <form action="delete_screen.php">

	<td><input type="submit" value="Delete"></td>
    </tr>
    </form>
    </table>
</div>
</body>
</html>