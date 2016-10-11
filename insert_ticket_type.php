<?php session_start();?>
<?php
include("db_connect.inc");
$a=$_REQUEST['txt_screen'];
$b=$_SESSION['id'];
$c=$_REQUEST['txt_ticket'];
$d=$_REQUEST['txt_rate'];
$e=$_REQUEST['txt_quantity'];
$f=$_SESSION['r_id'];

mysql_query("insert into ticket_type_master(com_id,screen_id,region_id,ticket_type,rate,quantity) values('$b','$a','$f','$c','$d','$e')",$con);
header("location:ticket_type_form.php?screen=$a");
?>