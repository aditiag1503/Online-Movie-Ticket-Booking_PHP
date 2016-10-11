
<?php
include ("header.html");
?>
<head>
<style>

#booking
{
	background-color: #600;
	color:#FFF;
	text-align:center;
    margin-top:50px;
	padding-top:15px;
	padding-bottom:15px;
	margin-left:10px;
	margin-right:10px;
	
	
	border:#906 thick 7px;
	
}

#nowshowing_content
{
		margin-top:20px;
		background-color:transparent;
		margin-left:8px;
		margin-right:8px;
		width:940px;
		height:320px;
		color:#FFF;
}
#upcoming_content
{
		margin-top:40px;
		background-color:transparent;
		margin-left:8px;
		margin-right:8px;
		width:940px;
		height:320px;
		color:white;
}


#block
{
	margin:10px;
	width:170px;
	height:250px;
	background-color:black;
	padding:10px;
	float:left;
	border:#FFF thick 5px;
	border-radius:10px;
	box-shadow:#F00;
}
#block:hover
{
	opacity:.90;
}
#block1
{
	margin:10px;
	width:170px;
	height:250px;
	background-color:black;
	padding:10px;
	float:left;
	border:#FFF thick 5px;
	border-radius:10px;
	box-shadow:#F00;
}
#block1:hover
{
	opacity:.90;
}

#arrow
{
	padding-top:90px;
	
	size:180px;
	font-size:36px;
	
}
#arrow a
{
	color:#F00;
	size:180px;
	text-decoration:none;
	font-weight:1800;
}
#arrow a:hover
{
color:#000;	
}

#block img
{
	width: 97%; 
	padding: 0.5%;
	height:84%;
	margin: 0 auto;	
}

#footer
{
	margin-top:360px;
	background-color:transparent;
}
#date_blocks
{
	color:#FFF;
	
}
</style>
</head>

<body>

<div id="mainContainer">

        
<div id="booking">
<h2>Instant ticket booking</h2>
<hr width="942px" >
<br>
<form action="check_user_movie_details.php?m=region" method="post">


<center><table cellspacing="5px" cellpadding="5px"><tr><td style="color:#FFF">
<input type="radio" name="mo" value="m" >Movie</td>

<td style="color:#FFF"><input type="radio" name="mo" value="c">Cinema</td>
</tr>
<tr>
</tr><tr></tr>
<tr>
<td>
<h4 style="color:#FFF">SELECT REGION</h4>
</td>
<td>

	 
	<select name="region">
		<?php
		 include("db_connect.inc");
		 $rsregion= mysql_query("select * from region_master ",$con);
		 
			while($row=mysql_fetch_array($rsregion))
		{
			$r_id=$row["rid"];
			$rn=$row["rname"];
			echo "<option value='$r_id'>";
			echo "$rn";
			echo"</option>";
		}
	
        
   ?>
</td>
<td><h4 style="color:#FFF">SELECT DATE</h4></td>
<td>

<?php
 include("db_connect.inc");
 
   $di1day=new DateInterval('P1D');
 echo"<div id='date_blocks'>";
    $dt=new DateTime('0 day');
	 echo"<input type='radio' name='ckdate' value='1' >";
	echo $dt->format('d-M-y D');
 echo "</div>";

 echo"<div id='date_blocks'>";
    $dt=new DateTime('+1 day');
	 echo"<input type='radio' name='ckdate' value='2' >";
	echo $dt->format('d-M-y D');
 echo "</div>";

 echo"<div id='date_blocks'>";
    $dt=new DateTime('+2 day');
	echo"<input type='radio' name='ckdate' value='3' >";
	echo $dt->format('d-M-y D');
 echo "</div>"; 
 ?>
</td>
</tr>

<tr></tr><tr></tr>
<tr><td></td><td><input type="submit">  </td>
</tr>

</table></center>
</form>

</div>
<p style=" font-weight:700; margin-top:20px; margin-left:15px; font-size:20px">NOW SHOWING</p>
<hr noshade>
<div id="nowshowing_content">
<?php
      	include("db_connect.inc");
		
		$rsimg=mysql_query("select distinct movie_name,movie_release_date,movie_image from movie_master where movie_type='current'",$con);
	   while( $rrow=mysql_fetch_array($rsimg))
		{
			$a=$rrow['movie_image'];
			$b=$rrow['movie_release_date'];
			$c=$rrow['movie_name'];
		   echo"<div id='block'>";
		   echo"<a href='user_movie_cinema_details.php?m=$c'>";    
		   echo"<img src='$a'>";
		   echo"</a>";
		   echo"<center>";
		   echo $c; echo"<br>";
		   echo"Release date: $b";
		   echo"</center>";
		   echo"</div>";
	   
	  // echo"<div id='releasedate'>";
		   
   		//echo"Release date:$b";
    	//echo"</div>";

		}
		?>


<!--    <div style="background-color:transparent">
    	<p id="arrow">
        <a href=""> > </a>
    	</p>
    </div>-->
</div><br><br>


<p style="font-weight:700; margin-top:20px; margin-left:15px ;font-size:20px; margin-top:250px"><b>UPCOMING<b></p>
<hr noshade>
<div id="upcoming_content">
 <?php
      	include("db_connect.inc");

		$rsimg=mysql_query("select distinct movie_name,movie_release_date,movie_image from movie_master where movie_type='upcoming'",$con);
	   while( $rrow=mysql_fetch_array($rsimg))
		{
			$a=$rrow['movie_image'];
			$b=$rrow['movie_release_date'];
			$c=$rrow['movie_name'];
		   echo"<div id='block'>";
		   echo"<a href='user_movie_cinema_details.php?m=$c'>";    
		   echo"<img src='$a'>";
		   echo"</a>";
		   echo"<center>";
		   echo $c; echo"<br>";
		   echo"Release date: $b";
		   echo"</center>";
		   echo"</div>";
	   
	  // echo"<div id='releasedate'>";
		   
   		//echo"Release date:$b";
    	//echo"</div>";

		}
		?>


    <div id="arrow">
    <p><a href="">></a></p>
	
</div>

    <div id="footer">
    <hr noshade>
    <center>Copyright2015 © Entertainment Pvt. Ltd. All Rights Reserved </center>
    </div>
</div>
</body>
</html>
