
<?php
include("db_connect.inc");

$a=$_REQUEST['txt_user'];
$pwd=$_REQUEST['txt_password'];
$rsadmin_log= mysql_query("select id,password from admin_master where id= '$a' and password='$pwd'");



if(mysql_fetch_array($rsadmin_log))

	
	{
		
		header("location:admin_options.php");
	//	echo "login succesful";
		
	}
	else
	{
		header("location:admin_login.php");
		//echo "login fail";
	}

?>
