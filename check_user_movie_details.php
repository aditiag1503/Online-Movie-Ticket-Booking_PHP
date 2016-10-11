<?php session_start();?>
<?php
include("db_connect.inc");

$a=$_REQUEST['mo'];
$_SESSION['r_id']=$_REQUEST['region'];
$_SESSION['date']=$_REQUEST['ckdate'];

if($a=='m')
	{
		header("location:user_movie_details.php");

	}
	else
	{
		header("location:user_cinema_details1.php");
		
	}

?>
