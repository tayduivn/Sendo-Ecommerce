<?
if (isset($_POST['butSaveLoai'])) {
	$name = $_POST['txtName'];
    $pass =   ( md5(md5(md5( md5(md5(md5( addslashes($_POST['txtPass']))))))));
	$thutu = $_POST['thutu'];
	$thutu_cat = $_POST['thutu_cat'];
    $level = $_POST['txtLevel'];
	$parent = $_POST['txtParent'];	
	$level = $_POST['level'];
	
	$sql99="select user from user_nhanvien  ";
        	$pro22=mysql_fetch_array(mysql_query($sql99));


		if (!empty($_POST['oldid'])) {
			$oldid = $_POST['oldid'];
			$sql = "update user_nhanvien set user='".$name."', pass='".$pass."', level='".$level."' where id='".$oldid."'";
			 }
		else
			{
				     if(mysql_num_rows(mysql_query("SELECT user FROM user_nhanvien WHERE user='$name'"))>0)
	{
		echo "<p align=center class='err'>Tài khoản đã tồn tại</p>";
	}
	else
	{
			$sql = "insert into user_nhanvien (user,pass,level) values ('".$name."','".$pass."','".$level."')";
			
	} 		
			
		    }
		if (mysql_query($sql,$con)) 
			{
			echo "<p align=center class='err'>&#272;ã c&#7853;p nh&#7853;t thành công</p><br>";
			echo "<script>window.location='index.php?act=admin&page=".$_REQUEST['page']."'</script>";
		    }
		else echo "<p align=center class='err'>Không th&#7875; c&#7853;p nh&#7853;t</p>";

}
?>

<?
	if (isset($_GET['id'])) {
		$oldid=$_GET['id'];
		$sql = "select * from user_nhanvien where id='".$oldid."'";
		if ($result = mysql_query($sql,$con)) {
			$row=mysql_fetch_array($result);
			$name=$row['user'];
			$pass=$row['pass'];
			$level=$row['level'];
		}
	}
?>

<form method="post" name="FormLoaiSP" action="index.php">
<input type=hidden name="act" value="admin_add">
<input type=hidden name="oldid" value="<? echo $oldid; ?>">
<input type=hidden name="page" value="<? echo $_REQUEST['page']; ?>">

<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" align="center" class="title" height="20">Thêm m&#7899;i / C&#7853;p nh&#7853;t : Quản trị viên</td>
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
		<INPUT   TYPE="text" NAME="txtPass" CLASS=textbox size="34"></td>
      </tr>
	  
	  <tr>
        <td width="15%" class="smallfont">
        <p align="right">Chức vụ</td>
        <td width="1%" class="smallfont">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<select name="level" value="<? echo $level; ?>" >
		 <?php if($level=="1")
{?>
		<option value="1" selected> Admin tối cao</option>
		<option value="0"> Nhân viên quản lý đơn hàng</option>
<?}?>

		 <?php if($level=="0")
{?>
		<option value="1"> Admin tối cao</option>
		<option value="0" selected> Nhân viên quản lý đơn hàng</option>
<?}?>

		 <?php if($level=="")
{?>
		<option value="1"> Admin tối cao</option>
		<option value="0" > Nhân viên quản lý đơn hàng</option>
<?}?>
		
		
		</select>
		
 
		
		
      </tr>
      <tr>
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