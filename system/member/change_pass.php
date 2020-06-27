<h3 style="
    color: #e5101d;
    font-size: 16px;
    font-weight: bold;
    height: 32px;
    line-height: 30px;
    border-bottom: 1px solid #ededed;
    text-transform: uppercase;
    margin-top: 0px;
">THAY ĐỔI MẬT KHẨU</h3>

<div id="member_right_content">
<?
$user=$_SESSION['mem'];
$sql_user_home=mysql_query("SELECT * FROM thanhvien where user='".$user."' ");
$row_user_home=mysql_fetch_array($sql_user_home);
if (isset($_POST['butSub'])) {
	$old =   ( md5(md5(md5( md5(md5(md5( addslashes($_POST['txtOld']))))))));	$new1 =   ( md5(md5(md5( md5(md5(md5( addslashes($_POST['txtNew']))))))));	$new2 =   ( md5(md5(md5( md5(md5(md5( addslashes($_POST['txtNew2']))))))));
	if ($new1!=$new2 || $new1=="" || $new2=='')
	{
		$err="<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Mật khẩu mới không trùng nhau hoặc không được bỏ trống')
    </SCRIPT>";
	}
	elseif($row_user_home['pass']!==$old)
	{
		$err="Không đúng mật khẩu";
	}
	elseif($old=='')
	{
		$err="Bạn chưa nhập mật khẩu cũ";
	}
	else
	{
	
	$sql = "update thanhvien set pass='".$new1."' where user='".$user."' and pass='".$old."' ";
		if (mysql_query($sql,$con)) 
			{
			$err="Thay đổi mật khẩu thành công";
		    }	

		else {
			$err =  "<p align=center class='err'>Không thể thay đổi mật khẩu</p>";
		    }
	}
}
?>
<form method="POST" name="FormLoaiSP" enctype="multipart/form-data" action="">
<input type=hidden name="oldid" value="<? echo $oldid; ?>">
<table border="0" cellpadding="4" cellspacing="0" style="border-collapse: collapse" bordercolor="#C0C0C0" width="100%" id="AutoNumber1">
  	<tr>
	<td align="center" style=" color:blue; font-weight:bold"><? echo $err;?></td>
	</tr>
  <tr>
    <td width="45%">
    <table style="font-size:12px" border="0" cellpadding="4" bordercolor="#111111" width="90%" id="AutoNumber2" cellspacing="0">
      <tr>
        <td width="33%" class="smallfont">
        <p align="right">M&#7853;t kh&#7849;u cũ</td>
        <td width="63%" class="smallfont">
		<INPUT TYPE="password" NAME="txtOld" CLASS=textbox size="34"></td>
      </tr>
      <tr>
        <td width="33%" class="smallfont">
        <p align="right">M&#7853;t kh&#7849;u m&#7899;i</td>
        <td width="63%" class="smallfont">
		<INPUT TYPE="password" NAME="txtNew" CLASS=textbox size="34"></td>
      </tr>
      <tr>
        <td width="33%" class="smallfont">
        <p align="right">Nh&#7853;p l&#7841;i m&#7853;t kh&#7849;u m&#7899;i</td>
        <td width="63%" class="smallfont">
		<INPUT TYPE="password" NAME="txtNew2" CLASS=textbox size="34"></td>
      </tr>
      <tr>
        <td width="96%" class="smallfont" colspan="2">
		<p align="center">
		<INPUT style="
    background: #e5101d;
    padding: 0 15px;
    border-radius: 2px;
    color: #fff;
    font-weight: bold;
    line-height: 32px;
    font-size: 13px;
" TYPE="submit" NAME="butSub" VALUE="Thay đổi" CLASS=button>&nbsp;</td>
      </tr>
    </table>
    </td>
  </tr>
  </table>
</form>


</div>
</div>