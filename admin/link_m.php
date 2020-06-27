<script language="Javascript1.2"><!-- // load htmlarea
_editor_url = "htmlarea/";                     // URL to htmlarea files
var win_ie_ver = parseFloat(navigator.appVersion.split("MSIE")[1]);
if (navigator.userAgent.indexOf('Mac')        >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Windows CE') >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Opera')      >= 0) { win_ie_ver = 0; }
if (win_ie_ver >= 5.5) {
  document.write('<scr' + 'ipt src="' +_editor_url+ 'editor.js"');
  document.write(' language="Javascript1.2"></scr' + 'ipt>');  
} else { document.write('<scr'+'ipt>function editor_generate() { return false; }</scr'+'ipt>'); }
// --></script>

<?
$path = "../images/link";
$pathdb = "images/link";
if (isset($_POST['butSaveLoai'])) {
	$name=$_POST['txtName'];
	$address=$_POST['txtAddress'];
	$sortorder=(int)$_POST['txtSortorder'];
	$date=date("d-m-Y");

	$err="";
	if ($name=="") $err .=  "Xin nh&#7853;p tên<br>";
	$err.=CheckUpload($_FILES["txtImage"],".jpg;.gif;.bmp",500*1024,$_POST['id']==''?1:0);
	
	if ($err=='')
	{
		if (!empty($_POST['id'])) {
			$oldid = $_POST['id'];
			$sql = "update link set name='".$name."',link='".$address."', thutu='".$sortorder."' where id='".$oldid."'";
		}else {
			$sql = "insert into link (name, link, date, thutu) values ('".$name."','".$address."','".$date."','".$sortorder."')";
		}
		if (mysql_query($sql,$con)) {
			if(empty($_POST['id'])) $oldid = mysql_insert_id();

			$sqlUpdateField = "";
			
			$extsmall=GetFileExtention($_FILES['txtImage']['name']);
			if (MakeUpload($_FILES['txtImage'],"$path/link_face_s$oldid$extsmall"))
			{
				@chmod("$path/link_face_s$oldid$extsmall", 0777);
				$sqlUpdateField = " image='$pathdb/link_face_s$oldid$extsmall' ";
			}
			if($sqlUpdateField)
			{
				$sqlUpdate = "update link set $sqlUpdateField where id='".$oldid."'";
				mysql_query($sqlUpdate,$con);
			}
		}	
		else {
			$err =  "<p align=center class='err'>Không th&#7875; c&#7853;p nh&#7853;t</p>";
		}
  	}
  	if ($err=='') echo '<script>window.location="index.php?act=link&page='.$_REQUEST['page'].'&code=1"</script>';
  	else echo '<p align=center class="err" style="line-height: 150%">'.$err.'</p>';
} 
?>

<?
	if (isset($_GET['id'])) {
		$oldid=$_GET['id'];
		$page = $_GET['page'];
		$sql = "select * from link where id='".$oldid."' limit 1";
		if ($result = mysql_query($sql,$con)) {
			$row=mysql_fetch_array($result);
			$name=$row['name'];
			$address=$row['link'];
			$image=$row['image'];
			//$imagelarge=$row['link_websites_imglarge'];
			$sortorder=$row['thutu'];
		}
	}
?>

<form method="post" name="FormLoaiSP" enctype="multipart/form-data" action="index.php">
<input type="hidden" name="act" value="link_m">
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
	: Liên k&#7871; mạng xã hội</td>
  </tr>
  <tr>
    <td width="45%">
    <table border="0" cellpadding="2" bordercolor="#111111" width="100%" id="AutoNumber2" cellspacing="0">
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Tên liên kết</td>
        <td width="1%" class="smallfont" align="center">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $name; ?>" TYPE="text" NAME="txtName" CLASS=textbox size="34"></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Địa chỉ liên kết</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $address; ?>" TYPE="text" NAME="txtAddress" CLASS=textbox size="34"></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Hình (logo)</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT TYPE="file" NAME="txtImage" CLASS=textbox size="34"></td>
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