
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
#date_blocks
{
	width:130px;
	margin-left:2px;
	margin-top:1px;
	padding:5px;
	border: white solid 3px;
	float:left;
}
#movie_details_block
{
	background-color: black;
	color:black;
	 margin-top:20px;
	padding-top:15px;
	padding-bottom:15px;
	margin-left:10px;
	margin-right:10px;
	height:330px;
		
}

#movie_image
{
	width:200px;
	height:330px;
	float:left; 	
	margin-left:10px;
}		

#movie_details 
{
	margin-left: 80px;	
	width:600px;
	height:330px;
	float:left;
	background-color:white;
	
	
}

#movie_details table
{
	font-size:20px;
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
		background-color: #00C;
	color:black;
	
	padding-top:15px;
	padding-bottom:15px;
	margin-left:10px;
	margin-right:10px;
	height:50px;
	border:#FFF solid 3px;
	
}
#price_details
{
	background-color:#000;
	
}
#price_details table
{
	color:#FFF;
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
<h4 style=" color:#FFF">MOVIE:  </h4>
</td>
<td style="color:#FFF; font-weight:900; padding-left:60px">
<?php
 include("db_connect.inc");
$a=$_REQUEST['t'];
echo $a;
echo"<input type='hidden' name='title' value='$a'>";
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
<div id="movie_details_block">
        <div id="movie_image">
           <?php
		   include("db_connect.inc");
		   $m=$_REQUEST['img'];
		   $rsimg=mysql_query("select distinct movie_image from movie_master where movie_name='$m'",$con);
		   $img=mysql_fetch_array($rsimg);
		  
		   echo"<img src='$img[0]' height='320px' width='230px' alt='$img[0]'>"; 
		   ?> 
        </div>
        <div id="movie_details">
         <?php
		   include("db_connect.inc");
		
			$date=$_SESSION['date'];  
		    $st=$_REQUEST['s'];
		
		   $comp=$_REQUEST['cname'];
		  
		   echo"<form action='check_ticket_quantity_form1.php'>";
		echo"<input type='hidden' value='$st' name='showtime'>";
		echo"<input type='hidden' value='$comp' name='cn'>";
		echo"<input type='hidden' value='$a' name='title'>";
		 echo"<input type='hidden' value='$m' name='img1'>";
		    echo"<table cellpadding='25px' cellspacing='25px'>";
		   echo"<tr>";echo"<td>";
		   echo"CATEGORY:   ";echo"</td>";
		 echo"<td>";  
		 echo"<select name='tickettype'>";
		$rs=mysql_query("select cid from company_master where c_name='$comp'");
	   $r=mysql_fetch_array($rs);
	   $b=$r['cid'];
	   
	  $rsticket= mysql_query("select tid,ticket_type from ticket_type_master,show_time_master where start_show_time='$st' and show_time_master.screen_id=ticket_type_master.screen_id and ticket_type_master.com_id='$b' ",$con);
		 
		while($row=mysql_fetch_array($rsticket))
		{
			$t_id=$row["tid"];
			$tn=$row["ticket_type"];
			echo "<option value='$t_id'>";
			echo "$tn";
			echo"</option>";
		}
	     echo"</td>";
		  echo"</tr>";
		  
		   echo"</table>";
		   ?>
				   		   
       
        <table cellpadding="10px" cellspacing="10px">
         <div id="price_details">
        <tr>
        <td>
        PRICE DETAILS:
        </td>
        <?php
		  include("db_connect.inc");
		  $rsprice=mysql_query("select ticket_type,rate,quantity from ticket_type_master,show_time_master where start_show_time='$st' and show_time_master.screen_id=ticket_type_master.screen_id",$con);	
			
			while($row=mysql_fetch_array($rsprice))
		{
			$t_id=$row["ticket_type"];
			$rate=$row["rate"];
			$quantity=$row["quantity"];
			echo"<td>";
			echo $t_id;
			echo":";
			
			
			
			echo "rate=";
			echo $rate;
			
			  echo"  ";
			  echo "quantity=";
			echo $quantity;
			 echo"</td>";
		}
			
		?>
        
        </tr>
        <tr></tr><tr></tr><tr></tr>
       
        </div>
       <tr><td>
        QUANTITY-</td><td>
        <input type="text" name="quantity" size="20px"></td>
        </tr>
        <tr>
        <td></td><td>
        <input type="submit" value="PROCEED" size="20px"></td>
        
        </tr>
        </table>
        </form>
        
       
       

</div>
</div>
</body>
</html>