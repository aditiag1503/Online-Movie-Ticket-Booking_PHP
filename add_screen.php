<?php session_start();?>
<?php
include("db_connect.inc");
 $a=$_SESSION['aid'];
	 $b=$_REQUEST['cmb_region'];
     $d=$_REQUEST['screen_cnt'];
	 
	$count=mysql_query("select screen_no from $a where id=$b",$con);
	echo $count;
	$row=mysql_fetch_array($count);
	$c=$row['screen_no'];
	echo $c;
	$c=$c+$d;
	mysql_query("update $a set screen_no=$c where id=$b",$con);
	header("location:screen_count.php");
	
	
?>