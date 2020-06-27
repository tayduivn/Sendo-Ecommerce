<?
$path = "../album/pictures";
$pathdb = "../album/pictures";

if (isset($_POST['butSaveLoai'])) {
	$name=$_POST['txtName'];
	$desc=$_POST['txtShortDesc'];
	$status=($_POST['chkShow']!=''?1:0);
	$categories_id=$_POST['ddCat'];

	$imagelarge=$_FILES['txtImageLarge'];	
	$imageSmall=$_FILES['txtImage'];
			
	$err="";
	if ($name=="") $err .=  "Xin nh&#7853;p tên hình <br>";
	$err.=CheckUpload($_FILES["txtImage"],".jpg;.gif;.bmp",500*1024,$_POST['id']==''?1:0);
	$err.=CheckUpload($_FILES["txtImageLarge"],".jpg;.gif;.bmp",500*1024,0);

	if ($err=='')
	{
	if (!empty($_POST['id'])) {
			$oldid = $_POST['id'];
			$sql = "update album_images set album_images_name='".$name."',album_images_description='".$desc."',album_images_status='".$status."',album_images_categoriesid='".$categories_id."' where album_images_id='".$oldid."'";
		}else {
			$sql = "insert into album_images (album_images_name,album_images_description,album_images_status,album_images_dateadded,album_images_categoriesid) values ('".$name."','".$desc."','".$status."',SYSDATE(),'".$categories_id."')";
		}
		if (mysql_query($sql,$con)) {
			if(empty($_POST['id'])) $oldid = mysql_insert_id();
		
			$sqlUpdateField = "";
			
			$extsmall=GetFileExtention($_FILES['txtImage']['name']);
			if (MakeUpload($_FILES['txtImage'],"$path/album_s$oldid$extsmall"))
			{
				@chmod("$path/album_s$oldid$extsmall", 0777);
				$sqlUpdateField = " album_images_img='$pathdb/album_s$oldid$extsmall' ";
			}

			$extlarge=GetFileExtention($_FILES['txtImageLarge']['name']);
			if (MakeUpload($_FILES['txtImageLarge'],"$path/album_l$oldid$extlarge"))
			{
				@chmod("$path/album_l$oldid$extlarge", 0777);
				if($sqlUpdateField != "") $sqlUpdateField .= ",";
				$sqlUpdateField .= " album_images_imglarge='$pathdb/album_l$oldid$extlarge' ";
			}
			if($sqlUpdateField!='')
			{
				$sqlUpdate = "update album_images set $sqlUpdateField where album_images_id='".$oldid."'";
				mysql_query($sqlUpdate,$con);
			}
		}	

		else {
			$err =  "Không th&#7875; c&#7853;p nh&#7853;t";
		}
  	}

if ($err=='') echo '<script>window.location="index.php?act=album_image&page='.$_REQUEST['page'].'&code=1"</script>';
  	else echo "<p align=center class='err'>".$err."</p>";
} else {
?>

<?
	if (isset($_GET['id'])) {
		$oldid=$_GET['id'];
		$page = $_GET['page'];
		$sql = "select * from album_images where album_images_id='".$oldid."' limit 1";
		if ($result = mysql_query($sql,$con)) {
			$row=mysql_fetch_array($result);
			$name=$row['album_images_name'];
			$desc=$row['album_images_description'];
			$image=$row['album_images_img'];
			$imagelarge=$row['album_images_imglarge'];
			$status=$row['album_images_status'];
			$categories_id = $row['album_images_categoriesid'];
		}
	}
}

?>

<form method="post" name="FormLoaiSP" enctype="multipart/form-data" action="index.php">
<input type="hidden" name="act" value="album_image_m">
<input type="hidden" name="page" value="<? echo $_REQUEST['page']; ?>">
<input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>">
<? 
if ($image!='')
{
?>
<table cellspacing="0" cellpadding="0" width="100%">
<tr>
	<td align="center">
	<img border="0" src="<? echo $image; ?>">
	</td>
</tr>
</table>
<?
}
?>

<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" class="title" align="center" height="20">Thêm m&#7899;i / C&#7853;p nh&#7853;t 
	: Hình &#7843;nh</td>
  </tr>
  <tr>
    <td width="45%">
    <table border="0" cellpadding="2" bordercolor="#111111" width="124%" id="AutoNumber2" cellspacing="0">
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Tên hình</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $name; ?>" TYPE="text" NAME="txtName" CLASS=textbox size="34"></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Hình &#7843;nh (kích th&#432;&#7899;c nh&#7887;)</td>
        <td width="1%" class="smallfont" align="center">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT TYPE="file" NAME="txtImage" CLASS=textbox size="34"></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Hình &#7843;nh (kích th&#432;&#7899;c l&#7899;n)</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT TYPE="file" NAME="txtImageLarge" CLASS=textbox size="34"></td>
      </tr>
            <tr>
        <td width="15%" class="smallfont" align="right">
        Thu&#7897;c danh m&#7909;c</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<select size="1" name="ddCat">
<?
		//echo "<option value='0'>[Danh m&#7909;c g&#7889;c]</option>";
		$cats=GetListProduct();
		foreach ($cats as $cat)
		{
			if ($cat[0]==$categories_id)
				echo "<option value=".$cat[0]." selected>".$cat[1]."</option>";
			else
				echo "<option value=".$cat[0].">".$cat[1]."</option>";
		}
?>		
		</select></td>
      </tr>

      <tr>
        <td width="15%" class="smallfont" align="right">
        Không cho hi&#7879;n</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<input type="checkbox" name="chkShow" value="ON" <? if ($status>0) echo 'checked' ?>></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont">
		<p align="right">
		<INPUT TYPE="submit" NAME="butSaveLoai" VALUE="C&#7853;p nh&#7853;t" CLASS=button align=right>&nbsp;</td>
        <td width="1%" class="smallfont" align="center">
		&nbsp;</td>
        <td width="83%" class="smallfont"><p align="left">&nbsp;<INPUT TYPE="reset" CLASS=button value="Nh&#7853;p l&#7841;i"></td>
      </tr>
    </table>
    </td>
  </tr>
  </table>
</form>