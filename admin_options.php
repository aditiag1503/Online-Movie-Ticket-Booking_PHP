<?php
include("admin_header.html");
?>
<head>
<title>admin_login</title>

<link href="mainformstyle.css" type="text/css" rel="stylesheet" />

</head>
<body>
<a href="index.php"><h3 id="home"><div id="homediv">logout</div></h3></a>
<div id="main">
<center><h1><u>ADMIN-OPERATIONS</u></h1><br><br><br>
<ul><font color="#FFFFFF" size="+2">
<li><a href="company_form.php">Create Company</a></li>
<li><a href="region_form.php">Create Region </a></li>

</font>

</ul>
</center>
</div>
<?php
include("db_connect.inc");
?>
</body>
</html>
