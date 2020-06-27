<?php
	$targetFolder = 'uploads/'; 
	if(!isset($_POST['id'])||!isset($_POST['url']))return;
	if($_POST['id']=='-1')
	{
		unlink($targetFolder.'img/'.$_POST['url']);
		unlink($targetFolder.'thumb/'.$_POST['url']);
		echo 1;
	}
	else
	{
		unlink($targetFolder.'img/'.$_POST['url']);
		unlink($targetFolder.'thumb/'.$_POST['url']);
		echo 1;
		// xu ly xoa csdl
	}

?>