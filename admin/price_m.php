<?
if (isset($_POST['butSaveLoai'])) {
	$from = $_POST['from'];
	$to = $_POST['to'];
	$parent = $_POST['parent'];
	$order = $_POST['txtSortOrder'];
	if($order=='') $order=0;
	else $order = $_POST['txtSortOrder'];		
	$name= trim($_POST['name']);
	if ($name=="")
	{
		echo "<p align=center class='err'>B&#7841;n ch&#432;a nh&#7853;p tên danh m&#7909;c</p>";
	}
	else
	{
		if (!empty($_POST['oldid'])) {
			$oldid = $_POST['oldid'];
			$sql = "update bds_price set name='".$name."', tu='".$from."',den='".$to."',cat_id='".$parent."', thutu='".$order."' where id='".$oldid."'";
		}
		else 
			$sql = "insert into bds_price (name, tu, den, cat_id, thutu) values ('".$name."','".$from."','".$to."','".$parent."','".$order."')";
		if (mysql_query($sql,$con)) {
			echo "<p align=center class='err'>&#272;ã c&#7853;p nh&#7853;t thành công</p><br>";
			echo "<script>window.location='index.php?act=price&cat=".$_REQUEST['cat']."&page=".$_REQUEST['page']."'</script>";
		}
		else echo "<p align=center class='err'>Không th&#7875; c&#7853;p nh&#7853;t</p>";
	}
} 
?>

<?
	if (isset($_GET['id'])) {
		$oldid=$_GET['id'];
		$sql = "select * from bds_price where id='".$oldid."'";
		if ($result = mysql_query($sql,$con)) {
			$row=mysql_fetch_array($result);
			$name=$row['name'];
			$from=$row['tu'];
			$to=$row['den'];
			$parent=$row['cat_id'];
			$order=$row['thutu'];
		}
	}
?>

<form method="POST" name="FormLoaiSP" action="index.php">
<input type=hidden name="act" value="price_m">
<input type=hidden name="oldid" value="<? echo $oldid; ?>">
<input type=hidden name="page" value="<? echo $_REQUEST['page']; ?>">
<input type=hidden name="cat" value="<? echo $_REQUEST['cat']; ?>">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" align="center" class="title" height="20">Thêm m&#7899;i / C&#7853;p nh&#7853;t : Tìm kiếm theo giá</td>
  </tr>
  <tr>
    <td width="45%">
    <table border="0" cellpadding="4" bordercolor="#111111" width="124%" id="AutoNumber2" cellspacing="0">
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Tên</td>
        <td width="1%" class="smallfont">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $name; ?>" TYPE="text" NAME="name" CLASS=textbox size="34"></td>
      </tr>
    <tr>
        <td width="15%" class="smallfont">
        <p align="right">Từ</td>
        <td width="1%" class="smallfont">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $from; ?>" TYPE="text" NAME="from" CLASS=textbox size="34"></td>
      </tr>
	  <tr>
        <td width="15%" class="smallfont">
        <p align="right">Đến</td>
        <td width="1%" class="smallfont">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $to; ?>" TYPE="text" NAME="to" CLASS=textbox size="34"></td>
      </tr>
<tr>
        <td width="15%" class="smallfont">
        <p align="right">Danh muc</td>
        <td width="1%" class="smallfont">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		 <select size="1" name="parent">
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
