<?
if (isset($_POST['butSaveLoai'])) {
	$donvi = trim($_POST['txtName']);
	$parent = $_POST['txtParent'];

	if ($donvi=="")
	{
		echo "<p align=center class='err'>B&#7841;n ch&#432;a nh&#7853;p t�n &#273;&#417;n v&#7883;</p>";
	}
	else
	{
		if (!empty($_POST['oldid'])) {
			$oldid = $_POST['oldid'];
			$sql = "update donvi set dv_name='".$donvi."',parent_id='".$parent."' where dv_id='".$oldid."'";
		}
		else 
			$sql = "insert into donvi (dv_name,parent_id) values ('".$donvi."','".$parent."')";
		if (mysql_query($sql,$con)) {
			echo "<p align=center class='err'>&#272;� c&#7853;p nh&#7853;t th�nh c�ng</p><br>";
			echo "<script>window.location='index.php?act=donvi_id&page=".$_REQUEST['page']."'</script>";
		}
		else echo "<p align=center class='err'>Kh�ng th&#7875; c&#7853;p nh&#7853;t</p>";
	}
} 
?>

<?
	if (isset($_GET['id'])) {
		$oldid=$_GET['id'];
		$sql = "select * from donvi where dv_id='".$oldid."'";
		if ($result = mysql_query($sql,$con)) {
			$row=mysql_fetch_array($result);
			$donvi=$row['dv_name'];
			$parent=$row['parent_id'];
		}
	}
?>

<form method="POST" name="FormLoaiSP" action="index.php">
<input type=hidden name="act" value="donvi_id_m">
<input type=hidden name="oldid" value="<? echo $oldid; ?>">
<input type=hidden name="page" value="<? echo $_REQUEST['page']; ?>">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" align="center" class="title" height="20">Th�m m&#7899;i / C&#7853;p nh&#7853;t : 
	&#272;&#417;n v&#7883;</td>
  </tr>
  <tr>
    <td width="45%">
    <table border="0" cellpadding="4" bordercolor="#111111" width="100%" id="AutoNumber2" cellspacing="0">
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">&#272;&#417;n v&#7883;</td>
        <td width="1%" class="smallfont">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $donvi; ?>" TYPE="text" NAME="txtName" CLASS=textbox size="34"></td>
      </tr>
            <tr>
        <td width="15%" class="smallfont">
        <p align="right">Thu&#7897;c danh m&#7909;c</td>
        <td width="1%" class="smallfont">
        &nbsp;</td>
        <td width="83%" class="smallfont">
        <select size="1" name="txtParent">
	<?
		//echo "<option value='0'>[Danh m&#7909;c g&#7889;c]</option>";
		$cats=GetListDonvi("","=");
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
