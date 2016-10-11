
<?php
include("admin_header.html");
?>
<head>
<link href="companytitlestyle.css" type="text/css" rel="stylesheet" />

</head>
<body>
<a href="company_options.php"><h3 id="home"><div id="homediv">HOME</div></h3></a>
<div style="width:600;
height:400;	
margin-top:50;
margin-left:440;
border:black dotted 1px;
border-radius:10px;
background-color:white">
<center> <h2> ENTER MOVIE DETAILS </h2></center><br>
<table align="center" cellspacing=20>
 <form action="insert_movies.php" method="post" enctype="multipart/form-data">
	<tr>
    <td>CHOOSE MOVIE TYPE </td>
	<td><input type="radio" name="movie_type" value="current"  >
    CURRENT
    
    <input type="radio" name="movie_type" value="upcoming"  >
    UPCOMING
    </td>
	</tr>
	<tr><td>ENTER MOVIE TITLE</td>
    
    
    <td><input type="text" name="txt_movie_title">
    </td>
    </tr>
    <tr>
    <td>
    CHOOSE MOVIE IMAGE
    </td>
    <td>
    <input type="file" value="select image" name="txt_img">
    </td>
    </tr>
    <tr>
    <td>
    SELECT THE TIME SHOWS
    </td>
    <td>
    
    
     <?php
	include("db_connect.inc");
	$sc=$_REQUEST['screen'];	 
	$rslist=mysql_query("select stid,start_show_time from show_time_master where screen_id='$sc' order by start_show_time",$con);
   
	while( $rrow=mysql_fetch_array($rslist) )
	{
	$show_time_id=$rrow["stid"];
	
	echo"<input type='checkbox' value='$show_time_id' name='showtime_chkbox[]'>";
	
	echo $rrow['start_show_time'];
	echo"                                                                  ";
	}
	echo "</select>";
   echo"<input type='hidden' value='$sc' name='sc'>";
   
   ?>
   
    </td>
    </tr>
    <tr><td>ENTER MOVIE RELEASE DATE</td>
    <td><input type="text" name="txt_realease">
   </td>
    <tr><td></td>
    <td><input type="submit" ></td>
    </tr>
   
 </form>
</table>
</div>
</body>
</html>