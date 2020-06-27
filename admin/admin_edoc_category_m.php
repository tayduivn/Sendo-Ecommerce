<?
if (isset($_POST['butSaveLoai'])) {
	$name=$_POST['txtName'];
	$status=($_POST['chkShow']!=''?1:0);
	$parent=$_POST['txtParent'];
			
	$name = trim($_POST['txtName']);
	if ($name=="")
	{
		echo "<p align=center class='err'>B&#7841;n ch&#432;a nh&#7853;p tên danh m&#7909;c</p>";
	}
	else
	{
		if (!empty($_POST['oldid'])) {
			$oldid = $_POST['oldid'];
			$sql = "update doc_categories set doc_categories_name='".$name."', doc_categories_status='".$status."', doc_categories_parentid='".$parent."' where doc_categories_id='".$oldid."'";
		}
		else 
			$sql = "insert into doc_categories (doc_categories_name,doc_categories_parentid,doc_categories_status,date_added) values ('".$name."',".$parent.",".$status.",SYSDATE())";
		if (mysql_query($sql,$con)) {
			echo "<p align=center class='err'>&#272;ã c&#7853;p nh&#7853;t thành công</p><br>";
			echo "<script>window.location='index.php?act=edoc_category&page=".$_REQUEST['page']."&code=1'</script>";
		}
		else echo "<p align=center class='err'>Không th&#7875; c&#7853;p nh&#7853;t</p>";
	}
} 
?>

<?
	if (isset($_GET['id'])) {
		$oldid=$_GET['id'];
		$sql = "select * from doc_categories where doc_categories_id='".$oldid."'";
		if ($result = mysql_query($sql,$con)) {
			$row=mysql_fetch_array($result);
			$name=$row['doc_categories_name'];
			$status=$row['doc_categories_status'];
			$parent=$row['doc_categories_parentid'];
		}
	}
?>

<form method="POST" action="index.php?">
<input type=hidden name="act" value="edoc_category_m">
<input type=hidden name="oldid" value="<? echo $oldid; ?>">
<input type=hidden name="page" value="<? echo $_REQUEST['page']; ?>">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" height="20" class="title" align="center">Thêm m&#7899;i / C&#7853;p nh&#7853;t 
	: Danh th&#432; vi&#7879;n</td>
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
		<INPUT value="<? echo $name; ?>" TYPE="text" NAME="txtName" CLASS=textbox size="34"></td>
      </tr>
     <tr>
        <td width="15%" class="smallfont" align="right">
		Không cho hi&#7875;n th&#7883;</td>
        <td width="1%" class="smallfont">
		&nbsp;</td>
        <td width="83%" class="smallfont">
		<input type="checkbox" name="chkShow" value="ON" <? if ($status>0) echo 'checked' ?>></td>
      </tr>
	 <tr>
        <td width="15%" class="smallfont">
        <p align="right">Thu&#7897;c danh m&#7909;c</td>
        <td width="1%" class="smallfont">
        &nbsp;</td>
        <td width="83%" class="smallfont">
        <select size="1" name="txtParent">
<?
		echo "<option value='1'>[Danh m&#7909;c g&#7889;c]</option>";
		//$cats=GetListDoc(1);
		//foreach ($cats as $cat)
		//{
		//	if ($cat[0]==$parent)
		//		echo "<option value=".$cat[0]." selected>".$cat[1]."</option>";
		//	else
	//			echo "<option value=".$cat[0].">".$cat[1]."</option>";
	//	}
?>		
		</select>
		
</td>
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
