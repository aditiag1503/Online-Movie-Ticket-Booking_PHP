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
 <form action="insert_ticket_type.php">
 
	<tr>
    <td>ENTER TICKET TYPE </td>
	<td><input type="text" name="txt_ticket" ></td>
	</tr>
	<tr><td>ENTER RATE</td>
    <td><input type="text" name="txt_rate"></td>
    </tr>
    <tr>
    <td>ENTER QUANTITY</td>
    <td><input type="text" name="txt_quantity"></td>
    </tr>
    <tr><td></td>
    <td><input type="submit" ></td>
    </tr>
    <?php
 $screen1=$_REQUEST['screen'];

    echo"<input type='hidden' name='txt_screen' value='$screen1'>";
	 ?>
 </form>
</table>
</div>
</body>
</html>