<?php session_start();?>
<?php
include("db_connect.inc");
$regname=$_REQUEST['txt_region']; 
$rslist=mysql_query("select rname from region_master where rname='$regname' ",$con);
$rrow=mysql_fetch_array($rslist);
if(mysql_num_rows($rslist)==0)
{
mysql_query("insert into region_master(rname) values('$regname')",$con);
}
else
{
	echo "region already exists";
}

header("location: region_form.php");
?>
