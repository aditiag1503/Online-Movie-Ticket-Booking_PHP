<?php
include("db_connect.inc");
$a=$_REQUEST['txt_company'];
$b=$_REQUEST['txt_user'];
$c=$_REQUEST['txt_pwd'];
mysql_query("insert into company_master(c_name,c_userid,c_password) values ('$a','$b','$c')",$con);
header("location:company_form.php");
?>