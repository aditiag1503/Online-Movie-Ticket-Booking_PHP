<?php session_start();?>
<?php
include("db_connect.inc");
$a=$_SESSION['aid'];
$regname=$_REQUEST['region'];
mysql_query("delete from $a where region='$regname'");
header("location: region_form.php");
?>