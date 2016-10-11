<?php
	include("db_connect.inc");
	$a=$_REQUEST['txt_new_pwd'];
	mysql_query("update company_master set c_password='$a'",$con);
	header("location:change_password_form.php");
	?>