<?php session_start(); ?>

<?php
include("db_connect.inc");
$d=$_SESSION['id'];
$a=$_REQUEST['sc'];
$b=$_REQUEST['txt_start_time'];
$c=$_REQUEST['txt_end_time'];
$f=$_SESSION['r_id'];
mysql_query("insert into show_time_master(screen_id,company_id,region_id,start_show_time,end_show_time) values ('$a','$d','$f','$b','$c')",$con);

header("location:enter_show_time_form.php?screen=$a");
?>