<?php
mysql_connect("localhost","shopct16_data","");
mysql_select_db("gianhang");?>
<?php
	
	if($_REQUEST['id'])
	{
		
		mysql_query("delete from po_tick_shop where pro_id= ".$_REQUEST['id']);
	}
	echo $likes;
?>
