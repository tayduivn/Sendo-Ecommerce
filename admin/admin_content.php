<?php
    include("../ckeditor/ckeditor.php");
?>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="../ckeditor/ckfinder/ckfinder.js"></script>
<?
$path="../upload";
$pathdb="upload";

if (isset($_POST['butSaveLoai'])) {
	$id=$_POST['ddContent'];
	$desc=$_POST['txtDesc'];
	$link=$_POST['txtDescen'];
	$imageSmall=$_FILES['txtImage'];
			
	$err="";
	$err.=CheckUpload($_FILES["txtImage"],".jpg;.gif;.swf;.bmp;.avi;.wma;.dat;.mp3;.wmv",3000*1024,0);
		
	if ($err=="") 
	{
		if (mysql_query("update info set content='".$desc."',link='".$link."' where id='".$id."'",$con)) {
			if ($_POST['chkClear']=='')
			{
				$sqlUpdateField = "";
				$extsmall=GetFileExtention($_FILES['txtImage']['name']);
					if (MakeUpload($_FILES['txtImage'],"$path/content_s$id$extsmall"))
					{
						@chmod("$path/content_s$id$extsmall", 0777);
						$sqlUpdateField = " image='$pathdb/content_s$id$extsmall' ";
					}

			}
			else 
				{
				$pro=GetContentInfo($id);
				if (file_exists("../".$pro['image'])) unlink("../".$pro['image']);
				$sqlUpdateField = " image='' ";
				}
			if($sqlUpdateField)
			{
				$sqlUpdate = "update info set $sqlUpdateField where id='".$id."'";
				mysql_query($sqlUpdate,$con);
			}
		}	
		else {
			$err =  "<p align=center class='err'>Không th&#7875; c&#7853;p nh&#7853;t</p>";
		}
		if ($err=='') echo "<p align=center class='err'>&#272;ã c&#7853;p nh&#7853;t thành công</p>";
	  	//if ($err=='') echo '<script>window.location="index.php?act=content&id='.$_REQUEST['id'].'&code=1"</script>';
	 }
	if ($err!="") echo "<p align=center class='err'>".$err."</p>"; 
}
$id=1;
if ($_REQUEST['id']!='') $id=$_REQUEST['id'];
$cont=GetContentInfo($id);
$desc=$cont['content'];
$link=$cont['link'];
?>


<form method="post" name="FormLoaiSP" enctype="multipart/form-data" action="index.php?">
<input type="hidden" name="act" value="content">
<input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" class="title" align="center">C&#7853;p nh&#7853;t: N&#7897;i dung</td>
  </tr>
  <tr>
    <td width="45%">
    <table border="0" cellpadding="2" bordercolor="#111111" width="100%" id="AutoNumber2" cellspacing="0">
<tr>
        <td width="99%" class="smallfont" colspan="4" align="center">
<? if ($cont['image']!='') { ?>
		<img border="0" src="../<? echo $cont['image']; ?>">
<? } ?>
        </td>
      </tr>
            <tr>
        <td width="15%" class="smallfont">
        <p align="right">Ch&#7885;n n&#7897;i dung</td>
        <td width="1%" class="smallfont" align="center">
        <font color="#FF0000">*</font></td>
        <td width="4%" class="smallfont">
		<select size="1" name="ddContent">
<?
$list=GetListContent();
$id=$_REQUEST['id'];
foreach ($list as $c)
{
	if ($id=="") $id=$c[0];
	if ($c[0]!==$_REQUEST['id'])
		echo '<option value="'.$c[0].'">'.$c[1].'</option>';
	else
		echo '<option selected value="'.$c[0].'">'.$c[1].'</option>';
}
?>
		</select></td>
        <td width="79%" class="smallfont">
		<input type="button" value="Chuy&#7875;n" name="B1" class="button" onclick="javascript:window.location='./?act=content&id='+ddContent.value"></td>
      </tr>
       <tr>
        <td width="15%" class="smallfont" align="right">
        Hình &#7843;nh</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont" colspan="2">
		<INPUT TYPE="file" NAME="txtImage" CLASS=textbox size="34"><input type="checkbox" name="chkClear" value="ON">Xóa 
		b&#7887; hình</td>
      </tr>

<?if($_REQUEST['id']==8){?>
      <tr>
        <td width="15%" class="smallfont" align="right">
        Ng&#432;&#7901;i nh&#7853;n</td>
        <td width="1%" class="smallfont" align="center">&nbsp;
        </td>
        <td width="83%" class="smallfont" colspan="2">
		<textarea rows="2" name="txtDescen" cols="60"><? echo $link; ?></textarea>
</td></tr>
<?} else {?>
      <tr>
        <td width="15%" class="smallfont" align="right">
        Link</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont" colspan="2">
       
	        <input type="text" name="txtDescen" value="<? echo $link; ?>" style="width:500px">

		</td>
      </tr>
      <?}?>


<?if($_REQUEST['id']==8){?>
      <tr>
        <td width="15%" class="smallfont" align="right">
        Ng&#432;&#7901;i nh&#7853;n</td>
        <td width="1%" class="smallfont" align="center">&nbsp;
        </td>
        <td width="83%" class="smallfont" colspan="2">
		<textarea rows="2" name="txtDesc" cols="60"><? echo $desc; ?></textarea>
</td></tr>
<?} else {?>
      <tr>
        <td width="15%" class="smallfont" align="right">
        N&#7897;i dung</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont" colspan="2">
 <p>
    <textarea name="txtDesc" cols="60" rows="20"><? echo $desc; ?></textarea>
</p>
<?php
$CKEditor = new CKEditor();
$CKEditor->basePath = '../ckeditor/';
$CKEditor->replace("txtDesc");
?>        
		</td>
      </tr>
      <?}?>







      <tr>
        <td width="15%" class="smallfont" colspan="2">
		<p align="right">
		<INPUT TYPE="submit" NAME="butSaveLoai" VALUE="C&#7853;p nh&#7853;t" CLASS=button onclick="submitForm()">&nbsp;</td>
        <td width="84%" class="smallfont" align="center" colspan="2">
		<p align="left">&nbsp;<INPUT TYPE="reset" CLASS=button value="Nh&#7853;p l&#7841;i"></td>
      </tr>
    </table>
    </td>
  </tr>
  </table>
</form>