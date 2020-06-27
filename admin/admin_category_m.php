<?
$path = "../images/cat";
$pathdb = "images/cat";
if (isset($_POST['butSaveLoai'])) {
	$parent = $_POST['txtParent'];
	$order = $_POST['txtSortOrder'];
	$style = $_POST['style'];
	if($order=='') $order=0;
	else $order = $_POST['txtSortOrder'];
	$status=($_POST['chkShow']!=''?1:0);			
	$CategoryName= trim($_POST['txtName']);
        $link= trim($_POST['link']);

	$err="";
	 
	if ($err=='')
	{
		if (!empty($_POST['id'])) {
			$oldid = $_POST['id'];
			$sql = "update cat set name='".$CategoryName."', parent='".$parent."',link='".$link."', thutu='".$order."',style='".$style."', status=".$status." where id='".$oldid."'";
		}else {
			$sql = "insert into cat (name, parent,link, thutu,style, status) values ('".$CategoryName."','".$parent."','".$link."','".$order."','".$style."','".$status."')";
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
				$sqlUpdate = "update cat set $sqlUpdateField where id='".$oldid."'";
				mysql_query($sqlUpdate,$con);
			}
		}	
		else {
			$err =  "<p align=center class='err'>Không th&#7875; c&#7853;p nh&#7853;t</p>";
		}
  	}
  	if ($err=='') echo "<script>window.location='index.php?act=category&cat=".$_REQUEST['cat']."&page=".$_REQUEST['page']."'</script>";
  	else echo '<p align=center class="err" style="line-height: 150%">'.$err.'</p>';
} 
?>
<?
	if (isset($_GET['id'])) {
		$oldid=$_GET['id'];
		$sql = "select * from cat where id='".$oldid."'";
		if ($result = mysql_query($sql,$con)) {
			$row=mysql_fetch_array($result);
			$CategoryName=$row['name'];
			$image=$row['image'];
			$parent=$row['parent'];
                        $link=$row['link'];
			$order=$row['thutu'];
			$style=$row['style'];
			$status=$row['status'];
			$date=$row['date'];
		}
	}
?>

<form method="POST" name="FormLoaiSP" enctype="multipart/form-data" action="index.php">
<input type=hidden name="act" value="category_m">
<input type=hidden name="oldid" value="<? echo $oldid; ?>">
<input type=hidden name="page" value="<? echo $_REQUEST['page']; ?>">
<input type=hidden name="cat" value="<? echo $_REQUEST['cat']; ?>">
<input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" align="center" class="title" height="20">Thêm m&#7899;i / C&#7853;p nh&#7853;t : Danh m&#7909;c s&#7843;n ph&#7849;m</td>
  </tr>
  <tr>
    <td width="45%">
    <table border="0" cellpadding="4" bordercolor="#111111" width="124%" id="AutoNumber2" cellspacing="0">
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Tên danh m&#7909;c</td>
        <td width="1%" class="smallfont">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $CategoryName; ?>" TYPE="text" NAME="txtName" CLASS=textbox size="34"></td>
      </tr>
	  <tr>
        <td width="15%" class="smallfont">
        <p align="right">Icon</td>
        <td width="1%" class="smallfont">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $style; ?>" TYPE="text" NAME="style" CLASS=textbox size="34"></td>
      </tr>
      
	   
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Thu&#7897;c danh m&#7909;c</td>
        <td width="1%" class="smallfont">
        &nbsp;</td>
        <td width="83%" class="smallfont">
        <select size="1" name="txtParent">
<?
		echo "<option value='17'>[Danh m&#7909;c g&#7889;c]</option>";
		$cats=GetListCat(17);
		foreach ($cats as $cat)
		{
			if ($cat[0]==$parent)
				echo "<option value=".$cat[0]." selected>".$cat[1]."</option>";
			else
				echo "<option value=".$cat[0].">".$cat[1]."</option>";
		}
?>		
		</select>
		
</td>
      </tr>
      <tr>
        <td width="15%" class="smallfont" align="right">
        Không hi&#7875;n th&#7883;</td>
        <td width="1%" class="smallfont" align="right">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<input type="checkbox" name="chkShow" value="ON" <? if ($status>0) echo 'checked' ?>></td>
      </tr>
    
      <tr>
        <td width="15%" class="smallfont" align="right">
        Th&#7913; t&#7921; s&#7855;p x&#7871;p</td>
        <td width="1%" class="smallfont" align="right">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $order; ?>" TYPE="text" NAME="txtSortOrder" CLASS=textbox size="34"></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont">
		<p align="right">
		<INPUT TYPE="submit" NAME="butSaveLoai" VALUE="C&#7853;p nh&#7853;t" CLASS=button>&nbsp;</td>
        <td width="1%" class="smallfont">
		&nbsp;</td>
        <td width="83%" class="smallfont"><p align="left">&nbsp;<INPUT TYPE="reset" CLASS=button value="Nh&#7853;p l&#7841;i"></td>
      </tr>
    </table>
    </td>
  </tr>
  </table>
</form>
