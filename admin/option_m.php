<?
if (isset($_POST['butSaveLoai'])) {
	$name = $_POST['txtName'];
	$doituong = $_POST['doituong'];
	$parent=$_POST['parent'];
	$option = $_POST['option'];
	$thutu = $_POST['thutu'];
	if ($name=="")
	{
		echo "<p align=center class='err'>B&#7841;n ch&#432;a nh&#7853;p tên</p>";
	}
	else
	{
		if (!empty($_POST['oldid'])) {
			$oldid = $_POST['oldid'];
			$sql = "update option_home set name='".$name."', doituong='".$doituong."', cat_id='".$parent."',option_home='".$option."',thutu='".$thutu."' where id='".$oldid."'";
			 }
		else
			{
			$sql = "insert into option_home (name,doituong,cat_id,option_home,thutu) values ('".$name."','".$doituong."','".$parent."','".$option."','".$thutu."')";
		    }
		if (mysql_query($sql,$con)) 
			{
			echo "<p align=center class='err'>&#272;ã c&#7853;p nh&#7853;t thành công</p><br>";
			echo "<script>window.location='index.php?act=option&page=".$_REQUEST['page']."'</script>";
		    }
		else echo "<p align=center class='err'>Không th&#7875; c&#7853;p nh&#7853;t</p>";
} 
}
?>

<?
	if (isset($_GET['id'])) {
		$oldid=$_GET['id'];
		$sql = "select * from option_home where id='".$oldid."'";
		if ($result = mysql_query($sql,$con)) {
			$row=mysql_fetch_array($result);
			$name=$row['name'];
			$doituong=$row['doituong'];
			$option=$row['option_home'];
			$parent=$row['cat_id'];
		}
	}
?>

<form method="post" name="FormLoaiSP" action="index.php">
<input type=hidden name="act" value="option_m">
<input type=hidden name="oldid" value="<? echo $oldid; ?>">
<input type=hidden name="page" value="<? echo $_REQUEST['page']; ?>">

<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" align="center" class="title" height="20">Thêm m&#7899;i / C&#7853;p nh&#7853;t : Option</td>
  </tr>
  <tr>
    <td width="45%">
    <table border="0" cellpadding="4" bordercolor="#111111" width="124%" id="AutoNumber2" cellspacing="0">
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Tên Option</td>
        <td width="1%" class="smallfont">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $name; ?>" TYPE="text" NAME="txtName" CLASS=textbox size="34"></td>
      </tr>
	  <tr>
        <td width="15%" class="smallfont">
        <p align="right">Thông số sau</td>
        <td width="1%" class="smallfont">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $doituong; ?>" TYPE="text" NAME="doituong" CLASS=textbox size="34"></td>
      </tr>
<tr>
        <td width="15%" class="smallfont" align="right">
        Thuộc tỉnh thành</td>
        <td width="1%" class="smallfont" align="center">&nbsp;
        </td>        
        <td width="83%" class="smallfont">
				<select size="1" name="parent" >
<?
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
        <td width="15%" class="smallfont">
        <p align="right">Option</td>
        <td width="1%" class="smallfont">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<select name="option">
		<?if($row['option_home']=='0'){?>
		<option value="0" selected>INPUT</option>
		<option value="1">CHECKBOX</option>
		<?}else{?>
		<option value="1" selected>CHECKBOX</option>
		<option value="0">INPUT</option>
		<?}?>

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