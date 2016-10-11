
<?php session_start();?>

<?php

include ("header.html");
?>
<head>
<style>

#show_movie
{
	background-color: #600;
	border: #999 solid 3px;
    
	margin-left:10px;
	margin-top:20px;
	height:30px;
	width:440px;
	margin-left:10px;
	padding-top:10px;
 	
}
#movie_title
{
	color:#FFF;
	margin-left:5px;
	font-size:26px;
	
}
#date
{
	background-color: #600;
	color:#FFF;
	margin-left:50px;
	margin-top:20px;
	height:40px;
	width:440px;
}
#date a
{
	text-decoration:none;
	color:#FFF;	
}
#date_blocks
{
	width:130px;
	margin-left:2px;
	margin-top:1px;
	padding:5px;
	border: white solid 3px;
	float:left;
}

#cinema_details_block
{
	background-color: black;
	color:black;
	 margin-top:40px;
	padding-top:15px;
	padding-bottom:15px;
	margin-left:10px;
	margin-right:10px;
	height:330px;
	border:#FFF solid 3px;
		
}

#cinema_details
{
		background-color: #FFF;
	color:black;
	
	padding-top:15px;
	padding-bottom:15px;
	margin-left:10px;
	margin-right:10px;
	height:50px;
	border:#FFF solid 3px;
}

</style>
</head>

<body>


<div id="mainContainer">
<table cellpadding="30px" >
<tr>
<td>
<div id="show_movie">
<div id="movie_title">

<table >
<tr>
<td>
<h4 style=" color:#FFF">CINEMA :  </h4>
</td>
<td style="color:#FFF; font-weight:900; padding-left:60px">
<?php
include("db_connect.inc");
$a=$_REQUEST['cinema'];
echo $a;
		  // echo"<input type='hidden' value='$a' name='title'>";
?>
</td>
</tr>
</table>

</div>
</div>
</td>
<td>
<div id="date">
 <?php
 include("db_connect.inc");
 $date=$_SESSION['date'];
  if($date==1)
 { 
  $di1day=new DateInterval('P1D');
  
 echo"<div id='date_blocks'>";
    $dt=new DateTime('0 day');
	echo $dt->format('d-M-y D');
 echo "</div>";
 }
else if($date==2)
 {
 echo"<div id='date_blocks'>";
    $dt=new DateTime('+1 day');
	echo $dt->format('d-M-y D');
 echo "</div>";
 }
 
 else if($date==3)
 {
 echo"<div id='date_blocks'>";
    $dt=new DateTime('+2 day');
	echo $dt->format('d-M-y D');
 echo "</div>";
 }
  
 ?>
</div>
</td>
</tr>
</table>

       
        <div id="cinema_details_block">
       <?php
	   include("db_connect.inc");
	   echo"<div id='cinema_details'>";
	   $reg=$_SESSION['r_id'];
	  
	   $rs=mysql_query("select cid from company_master where c_name='$a'");
	   $r=mysql_fetch_array($rs);
	   $b=$r['cid'];
	   $rsmovie= mysql_query("select distinct movie_name,start_show_time from show_time_master,movie_master where movie_master.region_id='$reg' and movie_master.company_id='$b' and stid=show_time_id",$con);
	   
	   echo"<table cellspacing='20px' cellpadding='30px'>";
	    echo"<tr>";
	   while($rrow=mysql_fetch_array($rsmovie))
	   {
		  $c=1;
	  if($c)
	   {
		  echo"<td>";
		  $mn=$rrow['movie_name'];
		echo $rrow['movie_name'];
		  
		$c=0;
		echo"</td>";
	   }
	   echo"<td>";
	   $z=$rrow['start_show_time'];
	   echo"<a href='user_booking.php?s=$z&t=$mn&cname=$a&img=$mn'>" ;
	   
	   echo $rrow['start_show_time'];
	   
	   echo"</a>";
	   echo"</td>";
	    	
	   }
	   echo"</tr>";
	   echo"</table>";
       echo"</div>"	   ;
	   ?>
       
       </div>

</div>

</body>
</html>