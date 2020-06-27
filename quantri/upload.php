<?
if(!session_id()) session_start();
?>
	<?
	$path = "../thanhvien/".$_SESSION['log']."/products/";
	$ok1=array("",);
	$fieldname = $_REQUEST['fieldname'];
    $uploaddir = $path;
    $uploadfile = $uploaddir .time(). basename($_FILES[$fieldname]['name']);
	$size = getimagesize($_FILES[$fieldname]['tmp_name']);
    if ( $_FILES[$fieldname]["size"] > 1024*1850 ) {
    echo "images/alert_upload.jpg";
    }
	elseif($size[1]<=150)
	{
		echo "images/alert_upload_px.jpg";
	}
	else
	{
    if (move_uploaded_file($_FILES[$fieldname]['tmp_name'], $uploadfile)) {
    echo $path.time().basename($_FILES[$fieldname]['name']); // "success"
    } else {
    // WARNING! DO NOT USE "FALSE" STRING AS A RESPONSE!
    // Otherwise onSubmit event will not be fired
    echo "error";
    }
	}
	?>