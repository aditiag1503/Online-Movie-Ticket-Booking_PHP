<?php session_start(); ?>
<?php
include ("header.html");
?>
<head>
<style>
#nowshowing_content
{
		margin-top:100px;
		background-color:transparent;
		margin-left:8px;
		margin-right:8px;
		width:940px;
		height:350px;
		color:#FFF;
}
#upcoming_content
{
		margin-top:20px;
		background-color:transparent;
		margin-left:8px;
		margin-right:8px;
		width:940px;
		height:200px;
}


#block
{
	margin:10px;
	width:182px;
	height:260px;
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
	width:160px;
	height:200px;
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
#releasedate
{
	margin:10px;
	width:182px;
	height:15px;
	background-color: white;
	padding:10px;
	float:left;
	border-top-left-radius:10px;
	border-top-right-radius:10px;
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
</style>
</head>

<body>
<div id="mainContainer">



<div id="nowshowing_content">
<?php
      	include("db_connect.inc");
		$reg=$_SESSION['r_id'];
		$date=$_SESSION['date'];
		
		$rsimg=mysql_query("select distinct movie_name,movie_release_date,movie_image from movie_master where movie_type='current' and region_id='$reg'",$con);
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
  
 
</div>
<br><br><br>
<hr noshade>
    <div id="footer">
    <hr noshade>
    <center>Copyright2015 © Entertainment Pvt. Ltd. All Rights Reserved </center>
    </div>

</div>
</div>
</body>
</html>
