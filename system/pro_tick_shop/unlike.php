<?php
	include('dbcon.php');
	
	if($_REQUEST['postId'])
	{
		
		mysql_query("delete from po_tick_shop where pro_id= ".$_REQUEST['postId']);
	}
	echo $likes;
?>
