<?php
mysql_connect("localhost","shopct16_data","S@2V5Ey@MjzW@1");
mysql_select_db("shopct16_data");?>
<?php
	
	if($_REQUEST['id'])
	{
		
		mysql_query("delete from po_tick where pro_id= ".$_REQUEST['id']);
	}
	echo $likes;
?>
