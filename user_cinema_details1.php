<?php session_start(); ?>
<?php
include ("header.html");
?>
<head>
<style>

#show_movie
{
	background-color: #600;
	
   
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

#movie_details
{
	background-color: #600;
	color:#FFF;
	 margin-top:20px;
	padding-top:15px;
	padding-bottom:15px;
	margin-left:10px;
	margin-right:10px;
	background-image:url(../Downloads/img5.jpg);
	background-repeat: repeat-y;
	
}
#nowshowing_content
{
		margin-top:100px;
		background-color:transparent;
		margin-left:8px;
		margin-right:8px;
		width:940px;
		height:350px;
}
#block
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

<div id="nowshowing_content">
<?php
      	include("db_connect.inc");
		$reg=$_SESSION['r_id'];
		$rscomp=mysql_query("select distinct c_name from screen_master,company_master where cid=company_id and region_id='$reg'",$con);
	   while( $rrow=mysql_fetch_array($rscomp))
		{
		   $a=$rrow['c_name'];
			
		   echo"<a href='user_cinema_movie_details.php?cinema=$a'>";  
		   echo"<div id='block'>";  
		   echo $a; 
		   echo"</a>";
		   echo"<center>";
		   echo"<br>";
		  // echo"Release date: $b";
		   echo"</center>";
		   echo"</div>";
	   
	  // echo"<div id='releasedate'>";
		   
   		//echo"Release date:$b";
    	//echo"</div>";

		}
		?>
  
 
</div>
</div>
</body>
</html>