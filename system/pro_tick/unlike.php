<?php
	include('dbcon.php');
	
	if($_REQUEST['postId'])
	{
		
		mysql_query("delete from po_tick where  user='".$_SESSION['mem']."' and  pro_id= ".$_REQUEST['postId'] );
	}
	echo $likes;
?>
