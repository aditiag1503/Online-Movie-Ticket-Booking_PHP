<?php session_start();?>
<?php
include("db_connect.inc");

$a=$_REQUEST['txt_user'];
$pwd=$_REQUEST['txt_password'];
echo "$a";
echo "$pwd";
$rsadmin_log= mysql_query("select id,password from admin_master where id= '$a' and password='$pwd'");


$row=mysql_fetch_array($rsadmin_log);

	/*echo $row[0];
	echo $row[1];*/
	if($row[0]==$a && $row[1]==$pwd)
	{
		echo"hi";
		header("location:admin_options.php");
		echo "login succesful";
		
	}
	else
	{
		header("location:admin_login.php");
		echo "login fail";
	}

?>
