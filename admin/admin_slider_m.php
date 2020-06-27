<?
$path = "../images/slider";
$pathdb = "images/slider";
if (isset($_POST['butSaveLoai'])) {
	$name=$_POST['txtName'];
	$address=$_POST['txtAddress'];
	$sortorder=(int)$_POST['txtSortorder'];
	$mieuta=$_POST['mieuta'];

	$err="";
	if ($name=="") $err .=  "Xin nh&#7853;p tên<br>";
	$err.=CheckUpload($_FILES["txtImage"],".jpg;.gif;.bmp;.png;.swf",500*1024,$_POST['id']==''?1:0);
	
	if ($err=='')
	{
		if (!empty($_POST['id'])) {
			$oldid = $_POST['id'];
			$sql = "update slider_show_home set name='".$name."',link='".$address."',mieuta='".$mieuta."', thutu='".$sortorder."' where id='".$oldid."'";
		}else {
			$sql = "insert into slider_show_home (name, link, mieuta, thutu) values ('".$name."','".$address."','".$mieuta."','".$sortorder."')";
		}
		if (mysql_query($sql,$con)) {
			if(empty($_POST['id'])) $oldid = mysql_insert_id();

			$sqlUpdateField = "";
			
			$extsmall=GetFileExtention($_FILES['txtImage']['name']);
			if (MakeUpload($_FILES['txtImage'],"$path/slider_home_s$oldid$extsmall"))
			{
				@chmod("$path/slider_home_s$oldid$extsmall", 0777);
				$sqlUpdateField = " image='$pathdb/slider_home_s$oldid$extsmall' ";
			}
			if($sqlUpdateField)
			{
				$sqlUpdate = "update slider_show_home set $sqlUpdateField where id='".$oldid."'";
				mysql_query($sqlUpdate,$con);
			}
		}	
		else {
			$err =  "<p align=center class='err'>Không th&#7875; c&#7853;p nh&#7853;t</p>";
		}
  	}
  	if ($err=='') echo '<script>window.location="index.php?act=slider&page='.$_REQUEST['page'].'&code=1"</script>';
  	else echo '<p align=center class="err" style="line-height: 150%">'.$err.'</p>';
} 
?>

<?
	if (isset($_GET['id'])) {
		$oldid=$_GET['id'];
		$page = $_GET['page'];
		$sql = "select * from slider_show_home where id='".$oldid."' limit 1";
		if ($result = mysql_query($sql,$con)) {
			$row=mysql_fetch_array($result);
			$name=$row['name'];
			$address=$row['link'];
			$image=$row['image'];
			$sortorder=$row['thutu'];
			$mieuta = $row['mieuta'];
		}
	}
?>

<form method="post" name="FormLoaiSP" enctype="multipart/form-data" action="index.php">
<input type="hidden" name="act" value="slider_m">
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

<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" class="title" align="center" height="20">Thêm m&#7899;i / C&#7853;p nh&#7853;t 
	: Slider</td>
  </tr>
  <tr>
    <td width="45%">
    <table border="0" cellpadding="2" bordercolor="#111111" width="100%" id="AutoNumber2" cellspacing="0">
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Tên slider</td>
        <td width="1%" class="smallfont" align="center">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $name; ?>" TYPE="text" NAME="txtName" CLASS=textbox size="34"></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">&#272;&#7883;a ch&#7881; website</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $address; ?>" TYPE="text" NAME="txtAddress" CLASS=textbox size="34"></td>
      </tr>
	  <tr>
        <td width="15%" class="smallfont">
        <p align="right">Hình Slider</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT TYPE="file" NAME="txtImage" CLASS=textbox size="34"></td>
      </tr>
	        <tr>
        <td width="15%" class="smallfont" align="right">
        Miêu tả</td>
        <td width="1%" class="smallfont" align="center">
        </td>
        <td width="83%" class="smallfont">
       <textarea name="mieuta" value="<?php $mieuta;?>" style="width:400px;height:100px"><?php echo $mieuta;?></textarea>
		</td>
      </tr>
      <tr>
        <td width="15%" class="smallfont" align="right">
        Th&#7913; t&#7921; s&#7855;p x&#7871;p</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $sortorder; ?>" TYPE="text" NAME="txtSortorder" CLASS=textbox size="8"> 
		</td>
      </tr>

      <tr>
        <td width="15%" class="smallfont">
		<p align="right">
		<INPUT TYPE="submit" NAME="butSaveLoai" VALUE="C&#7853;p nh&#7853;t" CLASS=button>&nbsp;</td>
        <td width="1%" class="smallfont" align="center">
		&nbsp;</td>
        <td width="83%" class="smallfont"><p align="left">&nbsp;<INPUT TYPE="reset" CLASS=button value="Nh&#7853;p l&#7841;i"></td>
      </tr>
    </table>
    </td>
  </tr>
  </table>
</form>