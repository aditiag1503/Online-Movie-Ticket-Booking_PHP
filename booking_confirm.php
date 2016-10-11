<?php session_start();?>

<?php

include ("header.html");
?>
<head>
<style>
#confirm
{
	background-color:#000;	
	margin-top:100px;
	margin-left:10px;
	width:935px;
	height:500px;
	color:#FFF;
}

#confirm table
{
	color:#FFF;	
}

#date
{
	background-color: #600;
	color:#FFF;
	margin-left:200px;
	margin-top:20px;
	height:40px;
	width:440px;
}
#date_blocks
{
	width:130px;
	margin-left:300px;
	margin-top:20px;
	padding:5px;
	border: white solid 3px;
	float:left;
}
</style>
</head>
<body>
<?php
include("db_connect.inc");

$qua=$_REQUEST['quant'];
$t=$_REQUEST['t'];
$as=$_REQUEST['as'];
$tq=$_REQUEST['tq'];
$mt=$_REQUEST['mt'];
$sid=$_REQUEST['sid'];
$st=$_REQUEST['st'];

$seat_no=$tq-$as+1;

$rst=mysql_query("select rate,ticket_type from ticket_type_master where tid='$t'");
$rt=mysql_fetch_array($rst);
$rate=$rt['rate'];
$ticket_type=$rt['ticket_type'];
$total=$rate*$qua;

$rsn=mysql_query("select screen_name from screen_master where sid='$sid'");
$rs=mysql_fetch_array($rsn);
$sname=$rs[0];
?>





<div id="confirm">
<center>
<h2> BOOKING CONFIRMATION	</h2>
</center>
<hr>
<table cellpadding="40px" cellspacing="40px">
<tr>
<th>BOOKING ID:</th>
<td>			
<?php
echo"BID00";
echo $seat_no;
?>
</td>
</tr>
<tr>
<th>MOVIE:</th>
<td><?php echo $mt;	?>	</td>
</tr>
<tr>
<th>SCREEN NAME:</th>
<td><?php echo $sname;	?>			</td>
</tr>
<tr>
<th>SHOW-TIMING:</th>
<td>	<?php echo $st;	?>			</td>
</tr>
<tr>
<th>SEAT NO ALLOTED:</th>
<td>
<?php
for($i=0;$i<$qua;$i++)
{	
	echo $ticket_type;
	echo $seat_no++;
	echo" ";
}
?>
</td>
</tr>
<tr>
<th>TOTAL AMOUNT:</th>
<td>
<?php
echo $total;
echo"/-";
?>

</td>
</tr>
<tr>
<th>BOOKING DATE:</th>
<td>
<?php


 include("db_connect.inc");
    $date=$_SESSION['date'];
	
 if($date==1)
 { 
  $di1day=new DateInterval('P1D');
  
 
    $dt=new DateTime('0 day');
	echo $dt->format('d-M-y D');

 }
else if($date==2)
 {

    $dt=new DateTime('+1 day');
	echo $dt->format('d-M-y D');

 }
 
 else if($date==3)
 {

    $dt=new DateTime('+2 day');
	echo $dt->format('d-M-y D');

 }


?>
</td>
</tr>
</table>
<hr>
<br>
<center><h2>Thankyou for booking with us!</h2></center>
</div>
</body>
</html>