
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

#booking_details
{
	background-color: black;
	color:black;
	 margin-top:40px;
	padding-top:15px;
	padding-bottom:15px;
	margin-left:10px;
	margin-right:10px;
	height:310px;
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
$a=$_REQUEST['movie_name'];
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
  $i=0;
  
  $di1day=new DateInterval('P1D');
  echo"<a href=''>";
 echo"<div id='date_blocks'>";
    $dt=new DateTime('0 day');
	echo $dt->format('d-M-y D');
 echo "</div>";
 echo"</a>";
 echo"<a href=''>";
 echo"<div id='date_blocks'>";
    $dt=new DateTime('+1 day');
	echo $dt->format('d-M-y D');
 echo "</div>";
echo"</a>";
echo"<a href=''>";
 echo"<div id='date_blocks'>";
    $dt=new DateTime('+2 day');
	echo $dt->format('d-M-y D');
 echo "</div>";
 echo"</a>";
  
 ?>
</div>
</td>
</tr>
</table>
<div id="movie_details_block">
        <div id="movie_image">
           <?php
		   include("db_connect.inc");
		   $mo=$_REQUEST['movie_name'];
		   $rsimg=mysql_query("select movie_image from movie_master where movie_name='$mo'",$con);
		   $img=mysql_fetch_array($rsimg);
		   echo"<img src='$img[0]'  height='320px' width='230px'>"; 
		  // echo"<input type='hidden' value='$mo' name='image'>";
		   ?> 
        </div>
        <div id="movie_details">
         <?php
		   include("db_connect.inc");
		   echo"<table cellpadding='25px' cellspacing='25px'>";
		   echo"<tr>";echo"<td>";
		   echo"TITLE:   ";echo"</td>";
		   echo"<td>";
		   echo $mo;echo"</td>";
		   echo"</tr>";
		  echo"<tr>";echo"<td>";
		   echo"DURATION:   ";echo"</td>";
		   echo"<td>";
		   echo "";echo"</td>";
		   echo"</tr>";
		   echo"<tr>";echo"<td>";
		   echo"STARCAST:   ";echo"</td>";
		   echo"<td>";
		   echo "";echo"</td>";
		   echo"</tr>";
		   echo"<tr>";echo"<td>";
		   echo"STORYLINE:   ";echo"</td>";
		   echo"<td>";
		   echo "";
		   echo"</td>";
		   echo"</tr>";
		   echo"</font>";
		   echo"</table>";
		   		   
        ?>
        </div>
        </div>
         <div id="booking_details">
         <?php
		   include("db_connect.inc");
		  
		    $st=$_REQUEST['s'];
		
		   $comp=$_REQUEST['cname'];
		  
		   echo"<form action='check_ticket_quantity_form.php'>";
		echo"<input type='hidden' value='$st' name='showtime'>";
		echo"<input type='hidden' value='$comp' name='cn'>";
		echo"<input type='hidden' value='$a' name='title'>";
		    echo"<table cellpadding='25px' cellspacing='25px'>";
		   echo"<tr>";echo"<td>";
		   echo"CATEGORY:   ";echo"</td>";
		 echo"<td>";  
		 echo"<select name='tickettype'>";
		
	  $rsticket= mysql_query("select tid,ticket_type from ticket_type_master,show_time_master where start_show_time='$st' and show_time_master.screen_id=ticket_type_master.screen_id and ticket_type_master.company_id='$comp' ",$con);
		 
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
				   		   
        <div id="price_details">
        <table cellpadding="20px" cellspacing="20px">
        <tr>
        <td>
        PRICE DETAILS:
        </td>
        <?php
		  include("db_connect.inc");
		  $rsprice=mysql_query("select ticket_type,rate,quantity from ticket_type_master,show_time_master where start_show_time='$st' and show_time_master.screen_id=ticket_type_master.screen_id and ticket_type_master.company_id='$comp'",$con);	
			
			while($row=mysql_fetch_array($rsprice))
		{
			$t_id=$row["ticket_type"];
			$rate=$row["rate"];
			$quantity=$row["quantity"];
			echo"<td>";
			echo $t_id;
			echo":";
			echo"</td>";
			
			echo"<td>";
			echo $rate;
			 echo"</td>";
			  echo"<td>";
			echo $quantity;
			 echo"</td>";
		}
			
		?>
        
        </tr>
        
        </table>
        </div>
       
        QUANTITY-
        <input type="text" name="quantity">
        <br>
        <input type="submit" value="PROCEED" size="20px">
        
        </form>
        
       
       

</div>
</div>
</body>
</html>