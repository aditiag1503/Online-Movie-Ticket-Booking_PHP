<?php session_start(); ?>
<?php
include("db_connect.inc");

$a=$_REQUEST['txt_user'];
$pwd=$_REQUEST['txt_password'];
$rs= mysql_query("select cid from company_master where c_userid= '$a' and c_password='$pwd'",$con);
$rrow=mysql_fetch_array($rs);
$_SESSION['id']=$rrow[0];
$rsadmin_log= mysql_query("select c_userid,c_password from company_master where c_userid= '$a' and c_password='$pwd'",$con);
  
   if(mysql_fetch_array($rsadmin_log))


	{
		//echo"hi";
		header("location:company_options.php");
		//echo "login succesful";
		
	}
	else
	{
		header("location:company_login.html");
		//echo "login fail";
	}

?>
