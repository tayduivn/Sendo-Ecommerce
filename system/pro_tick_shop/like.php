<?php
if(!session_id()) session_start();
	include('dbcon.php');
	
	if($_REQUEST['postId'])
	{
		
		mysql_query("insert into po_tick_shop (pro_id, user) values ('".$_REQUEST['postId']."','".$_SESSION['mem']."')");
	}
	echo $likes;
?>
