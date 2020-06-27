<?php
include 'resize.php';

// Define a destination
$targetFolder = 'uploads'; // Relative to the root


if (!empty($_FILES)) {
	date_default_timezone_set('UTC');
	$tmp=getdate();
	$tempFile = $_FILES['file']['tmp_name'];
	$targetPath = dirname(__FILE__) . '/' . $targetFolder;
	$imgFile = rtrim($targetPath,'/') .'/'.'img'.'/'. $tmp[0].$_FILES['file']['name'];
	$thumbFile = rtrim($targetPath,'/') .'/'.'thumb'.'/'.$tmp[0]. $_FILES['file']['name'];
	
	
	// Validate the file type
	$fileTypes = array('jpg','JPG','jpeg','JPEG','gif','GIF','png','PNG'); // File extensions
	$fileParts = pathinfo($_FILES['file']['name']);
	
	if (in_array($fileParts['extension'],$fileTypes)) {
		$image = new SimpleImage();
		$image->load($tempFile);
		$image->resizeToWidth(400);
		$image->save($imgFile);
		$image->load($tempFile);
		 $image->resizeToWidth(150);
		 $image->save($thumbFile);
		//move_uploaded_file($tempFile,$imgFile);
		//move_uploaded_file($tempFile,$thumbFile);
		
//		$rs=array()
		echo json_encode(array('rs'=>1,'thumb'=>$targetFolder.'/thumb/'.$tmp[0].$_FILES['file']['name'],'img'=>$tmp[0].$_FILES['file']['name']));
	} else {
		echo json_encode(array('rs'=>0,'msg'=>'Invalid file type.'));
	}
}
?>