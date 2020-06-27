<?php
$_SESSION['Line'] = $Line;
$_SESSION['log'] = $log;
$line=$_SESSION['line'];
?>

<?
for($i=1;$i<=$line;$i++)
	{
error_reporting(0);
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
$path = "../thanhvien/".$_SESSION['log']."/products/"; //set your folder path
$filename = $_FILES['photoimg'.$i]['tmp_name']; //get the temporary uploaded image name
$valid_formats = array("jpg", "png", "gif", "bmp", "jpeg","GIF","JPG","PNG"); //add the formats you want to upload
	
		$name = $_FILES['photoimg'.$i]['name']; //get the name of the image
		$size = $_FILES['photoimg'.$i]['size']; //get the size of the image
		if(strlen($name)) //check if the file is selected or cancelled after pressing the browse button. 
		{
			list($txt, $ext) = explode(".", $name); //extract the name and extension of the image
			if(in_array($ext,$valid_formats)) //if the file is valid go on.
			{
			if($size < 298888) // check if the file size is more than 2 mb
			{
			$actual_image_name =  str_replace(" ", "_", $txt)."_".time().".".$ext; //actual image name going to store in your folder
			$tmp = $_FILES['photoimg'.$i]['tmp_name']; 
			if(move_uploaded_file($tmp, $path.$actual_image_name)) //check the path if it is fine
				{
					move_uploaded_file($tmp, $path.$actual_image_name); //move the file to the folder
					//display the image after successfully upload
					echo "<img src='../thanhvien/".$_SESSION['log']."/products/".$actual_image_name."'  class='preview$i'> <input type='hidden' name='actual_image_name$i' id='actual_image_name$i' value='thanhvien/".$_SESSION['log']."/products/$actual_image_name' />";
				}
			else
				{
				echo "failed".$_SESSION['log'];
				}
			}
			else
			{
				echo "Kích thước ảnh nhỏ hơn 200kb";					
			}
			}
			else
			{
				echo "Chỉ upload file(.jpg .gif .png .bmp)..";	
			}
		}		
	}
	}
?>
