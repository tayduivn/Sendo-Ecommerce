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
$path = "../edoc/files/";
$pathdb = "edoc/files";
if (isset($_POST['butSaveLoai'])) {
	$name=$_POST['txtName'];
	$desc=$_POST['txtShortDesc'];
	$status=($_POST['chkShow']!=''?1:0);
	$categories_id=$_POST['ddCat'];

	$err="";
	if ($name=="") $err .=  "Xin nh&#7853;p tên b&#7843;ng báo giá <br>";
	$err.=CheckUpload($_FILES["txtFile"],".doc;.xls;.zip;.rar;.pdf;.wma;.wmv;.mp3;.mp4;.asf;.avi;.mpg;.mpeg;.mid;.enc;.cpt;",100*1024*1024,$_POST['id']==''?1:0);
	
	if ($err=='')
	{
		if (!empty($_POST['id'])) {
			$oldid = $_POST['id'];
			$sql = "update doc_files set doc_files_name='".$name."',doc_files_description='".$desc."',doc_files_status='".$status."',doc_files_categoriesid='".$categories_id."' where doc_files_id='".$oldid."'";
		}else {
			$sql = "insert into doc_files (doc_files_name,doc_files_description,doc_files_status,doc_files_dateadded,doc_files_categoriesid) values ('".$name."','".$desc."','".$status."',SYSDATE(),'".$categories_id."')";
		}

		if (mysql_query($sql,$con)) {
			if(empty($_POST['id'])) $oldid = mysql_insert_id();
		
			$sqlUpdateField = "";

			$fn=$_FILES['txtFile']['name'];
						
			$extsmall=GetFileExtention($_FILES['txtFile']['name']);
			if (MakeUpload($_FILES['txtFile'],"$path/$fn"))
			{
				@chmod("$path/doc_file$oldid$extsmall", 0777);
				$sqlUpdateField = " doc_files_file='$pathdb/$fn' ";
			}

			if($sqlUpdateField!='')
			{
				$sqlUpdate = "update doc_files set $sqlUpdateField where doc_files_id='".$oldid."'";
				mysql_query($sqlUpdate,$con);
			}
		}	

		else {
			$err =  "Không th&#7875; c&#7853;p nh&#7853;t";
		}
  	}
  	
  	if ($err=='') echo '<script>window.location="index.php?act=edoc&page='.$_REQUEST['page'].'&code=1"</script>';
  	else echo "<p align=center class='err'>".$err."</p>";
}  	
?>

<?
	if (isset($_GET['id'])) {
		$oldid=$_GET['id'];
		$page = $_GET['page'];
		$sql = "select * from doc_files where doc_files_id='".$oldid."' limit 1";
		if ($result = mysql_query($sql,$con)) {
			$row=mysql_fetch_array($result);
			$name=$row['doc_files_name'];
			$desc=$row['doc_files_description'];
			$image=$row['doc_files_file'];
			$status=$row['doc_files_status'];
			$categories_id = $row['doc_files_categoriesid'];
		}
	}
?>

<form method="post" name="FormLoaiSP" enctype="multipart/form-data" action="index.php">
<input type="hidden" name="act" value="edoc_m">
<input type="hidden" name="page" value="<? echo $_REQUEST['page']; ?>">
<input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" class="title" align="center" height="20">Thêm m&#7899;i / C&#7853;p nh&#7853;t 
	: Th&#432; vi&#7879;n</td>
  </tr>
  <tr>
    <td width="45%">
    <table border="0" cellpadding="2" bordercolor="#111111" width="100%" id="AutoNumber2" cellspacing="0">
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Tên </td>
        <td width="1%" class="smallfont" align="center">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $name; ?>" TYPE="text" NAME="txtName" CLASS=textbox size="45"></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">File</td>
        <td width="1%" class="smallfont" align="center">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT TYPE="file" NAME="txtFile" CLASS=textbox size="34"></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont" align="right">
        Thu&#7897;c danh m&#7909;c</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<select size="1" name="ddCat">
		
<?
		$cats=GetListDoc(1);
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
        <td width="1%" class="smallfont" align="center">&nbsp;
        </td>
        <td width="83%" class="smallfont">
		<input type="checkbox" name="chkShow" value="ON" <? if ($status>0) echo 'checked' ?>></td>
      </tr>
       <tr>
        <td width="15%" class="smallfont">
		<p align="right">
		<INPUT TYPE="submit" NAME="butSaveLoai" VALUE="C&#7853;p Nh&#7853;t" CLASS=button>&nbsp;</td>
        <td width="1%" class="smallfont" align="center">&nbsp;
		</td>
        <td width="83%" class="smallfont"><p align="left">&nbsp;<INPUT TYPE="reset" CLASS=button value="Nh&#7853;p l&#7841;i"></td>
      </tr>
    </table>
    </td>
  </tr>
  </table>
</form>