<?php
mysql_connect("localhost","root","S@2V5Ey@MjzW@1");
mysql_select_db("shopct16_data");?>
<?php
	
	if($_REQUEST['id'])
	{
		$anh = explode("_", $_REQUEST['id']);
		$sql=mysql_query("SELECT * FROM products where id='".$anh[0]."' ");
		$row=mysql_fetch_assoc($sql);
		$anh_del = explode(",", $row['img9']);
		if (file_exists($anh_del[$anh[1]])) unlink($anh_del[$anh[1]]);
	}
	echo $likes;
?>
<?php echo $row['img9'];?>
<br>id:<?php echo $anh[0];?>
<br>id anh:<?php echo $anh[1];?>
<br>anh:<?php echo $anh_del[$anh[1]];?>