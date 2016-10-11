<?php session_start(); ?>

<?php
include("db_connect.inc");
$c=$_SESSION['id'];
$a=$_REQUEST['movie_type'];
$b=$_REQUEST['txt_movie_title'];
$d=$_REQUEST['sc'];
$e=$_REQUEST['showtime_chkbox'];
$f1=$_FILES['txt_img'];
$f1n=$f1['name'];
$f=$_REQUEST['txt_realease'];
$r=$_SESSION['r_id'];

move_uploaded_file($f1['tmp_name'],".\\collection\\".$f1['name']) ;
foreach($e as $i)
{
mysql_query("insert into movie_master(screen_id,company_id,region_id,movie_name,show_time_id,movie_type,movie_image,movie_release_date) values ('$d','$c','$r','$b','$i','$a','$f1n','$f')",$con);
}


header("location:enter_movie_form.php?screen=$d");
?>