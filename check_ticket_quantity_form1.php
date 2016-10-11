<html>
<head>
<script>
function error()
{
alert("sorry the requested no of seats are not available");	
}
</script>
</head>
</html>

<?php session_start(); ?>
<?php

include("db_connect.inc");
$q=$_REQUEST['quantity'];
$tid=$_REQUEST['tickettype'];
$mov_tit= $_REQUEST['title'];
$st=$_REQUEST['showtime'];
$comp=$_REQUEST['cn'];
$i=$_REQUEST['img1'];
$date=$_SESSION['date']; 

$rs=mysql_query("select cid from company_master where c_name='$comp'",$con);
$row=mysql_fetch_array($rs);
$cid=$row[0];
$rsquant=mysql_query("select show_time_master.screen_id,stid from movie_master,show_time_master where movie_name='$mov_tit' and start_show_time='$st' and movie_master.company_id='$cid' and show_time_master.screen_id=movie_master.screen_id",$con);
$rowq=mysql_fetch_array($rsquant);
$sid=$rowq['screen_id'];
$st_id=$rowq['stid'];
//mysql_query("insert into reservation_master(screen_id,company_id,show_time_id,ticket_type_id,movie_name,seat_quantity) values('$sid','$cid','$st_id','$tid','$mov_tit','$q')",$con);

$rsq=mysql_query("select quantity from ticket_type_master where tid='$tid'",$con);
$rowq1=mysql_fetch_array($rsq);
$a=$rowq1['quantity'];           //total by default seats


$rssum=mysql_query("select sum(seat_quantity) from reservation_master where screen_id='$sid' and show_time_id='$st_id' and ticket_type_id='$tid' and movie_name='$mov_tit' and movie_date='$date'",$con);
$rowq2=mysql_fetch_array($rssum);
$b=$rowq2[0];


$available_seats=$a-($b+$q);

if($available_seats<0)
{
	//$available_seats=$available_seats+$q;
	//mysql_query("delete from reservation_master where seat_quantity='$q'",$con);
	header("location:user_booking.php?img=$mov_tit&s=$st&cname=$comp&t=$mov_tit&as=$available_seats");	
	  echo "<script>";
	  error(); 
	  echo"</script>";
}
else
{
	$z=$available_seats+$q;
	header("location:booking_confirm.php?quant=$q&t=$tid&as=$z&tq=$a&mt=$mov_tit&sid=$sid&st=$st");
	mysql_query("insert into reservation_master(screen_id,company_id,show_time_id,ticket_type_id,movie_name,seat_quantity,movie_date) values('$sid','$cid','$st_id','$tid','$mov_tit','$q','$date')",$con);

}
?>