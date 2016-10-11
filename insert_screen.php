<?php session_start();?>
<?php
include("db_connect.inc");
$a=$_REQUEST['region'];
$b=$_SESSION['id'];
$c=$_REQUEST['screen_name'];

mysql_query("insert into screen_master(region_id,company_id,screen_name) values('$a','$b','$c')",$con);
header("location:screen_form.php");
?>