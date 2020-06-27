<?
if (isset($_POST['butSaveLoai'])) {
	$active = $_POST['active'];
	$chietkhau = $_POST['chietkhau'];
	$tien = $_POST['tien'];
	$name = $_POST['txtName'];
	$pass = $_POST['txtPass'];
	$thutu = $_POST['thutu'];
	$thutu_cat = $_POST['thutu_cat'];
    $level = $_POST['txtLevel'];
	$parent = $_POST['txtParent'];
	$noidung = $_POST['noidung'];
	$date=date("d/m/Y");
	$date1=date("d/m/Y", strtotime( '+365 days' ));

	if ($name=="")
	{
		echo "<p align=center class='err'>B&#7841;n ch&#432;a nh&#7853;p tên user</p>";
	}
	else
	{
		if (!empty($_POST['oldid'])) {
			$oldid = $_POST['oldid'];
	
			$sql = "update user_shop set user='".$name."',active='".$active."',tien='".$tien."'+tien, pass='".$pass."', thutu='".$thutu."', thutu_cat='".$thutu_cat."', level_shop='".$level."', cat_mem='".$parent."', pay_time='".$date."', end_time='".$date1."'  where id='".$oldid."'";
					
			 }
			 
		else
			{
			$sql = "";
		    }
		if (mysql_query($sql,$con)) 
			{
			echo "<p align=center class='err'>&#272;ã c&#7853;p nh&#7853;t thành công</p><br>";
			echo "<script>window.location='index.php?act=users&page=".$_REQUEST['page']."'</script>";
		    }
		else echo "<p align=center class='err'>Không th&#7875; c&#7853;p nh&#7853;t</p>";
} 
}
?>

<?
	if (isset($_GET['id'])) {
		$oldid=$_GET['id'];
		$sql = "select * from user_shop where id='".$oldid."'";
		if ($result = mysql_query($sql,$con)) {
			$row=mysql_fetch_array($result);
			$name=$row['user'];
			$thutu=$row['thutu'];
			$pass=$row['pass'];
            $level=$row['level'];
			$parent=$row['cat_mem'];
		}
	}
?>

<form method="post" name="FormLoaiSP" action="index.php">
<input type=hidden name="act" value="users_add">
<input type=hidden name="oldid" value="<? echo $oldid; ?>">

<input type=hidden name="page" value="<? echo $_REQUEST['page']; ?>">

<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" align="center" class="title" height="20">Thêm m&#7899;i / C&#7853;p nh&#7853;t : USERS</td>
  </tr>
  <tr>
    <td width="45%">
    <table border="0" cellpadding="4" bordercolor="#111111" width="124%" id="AutoNumber2" cellspacing="0">
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Tên &#273;&#259;ng nh&#7853;p</td>
        <td width="1%" class="smallfont">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $name; ?>" TYPE="text" NAME="txtName" CLASS=textbox size="34"></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">M&#7853;t kh&#7849;u</td>
        <td width="1%" class="smallfont">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $pass; ?>" TYPE="text" NAME="txtPass" CLASS=textbox size="34"></td>
      </tr>
      <tr>

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
        <td width="15%" class="smallfont">
        <p align="right">Thứ tự Shop vip Top</td>
        <td width="1%" class="smallfont">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $thutu; ?>" TYPE="text" NAME="thutu" CLASS=textbox size="34"></td>
      </tr>
<tr>
        <td width="15%" class="smallfont">
        <p align="right">Thứ tự shop vip theo danh mục</td>
        <td width="1%" class="smallfont">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $row['thutu_cat']; ?>" TYPE="text" NAME="thutu_cat" CLASS=textbox size="34"></td>
      </tr>

      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Loại shop</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
		
        <td width="63%" class="smallfont">
		<select name="txtLevel"  >
	<?if($row['level_shop']=='0')
	{?>
   <option value='0' selected>Shop Vip</option>
   <option value='3'>Shop Free</option>
   <?}else{?>
   <option value='0'>Shop Vip</option>
   <option value='3' selected>Shop Free</option>
   <?}?>
	</select>
		
		
		
		
		
		

		</td>
		
      </tr>
	  	  <tr>
        <td width="15%" class="smallfont">
        <p align="right">Trạng thái hoa hồng</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
		
        <td width="83%" class="smallfont">
			<select name="active"  >
	<?if($row['active']=='0')
	{?>
   <option value='0' selected>Off</option>
   <option value='1'>On</option>
   <?}else{?>
   <option value='0'>Off</option>
   <option value='1' selected>On</option>
   <?}?>
	</select>
		
		
		

		</td>
		
      </tr>
	  
	  <!--tr>
        <td width="15%" class="smallfont">
        <p align="right">Thêm ngân sách</td>
        <td width="1%" class="smallfont">
        <font color="#FF0000"></font></td>
        <td width="83%" class="smallfont">
		<INPUT  TYPE="text" NAME="tien" CLASS=textbox size="24">	Đang có: <?php echo $row['tien'];?>	VNĐ		  </td>
		
      </tr-->
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