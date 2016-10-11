<?php session_start(); ?>

<?php
include("admin_header.html");
?>
<head>
<title>company-options</title>

<link href="mainformstyle.css" type="text/css" rel="stylesheet" />

</head>
<body>
<a href="index.php"><h3 id="home"><div id="homediv">logout</div></h3></a>
<h2 style="color:#FFF">welcome
<?php
include("db_connect.inc");
$b=$_SESSION['id'];
$rs=mysql_query("select c_name from company_master where cid='$b' ",$con);
$row=mysql_fetch_array($rs);
echo $row[0];
?>
</h2>
<div id="main">
<center><h1><u>ADMIN-OPERATIONS</u></h1><br><br><br>
<ul><font color="#FFFFFF" size="+2">
<li><a href="screen_form.php">Create Screens</a></li>
<li><a href="region_ticket_type_form.php">Create Ticket-type </a></li>
<li><a href="change_password_form.php">Change Password </a></li>
<li><a href="show_timing_form.php">Create Show-Times </a></li>
<li><a href="movies_form.php">Create Movie </a></li>

</font>

</ul>
</center>
</div>

</body>
</html>
