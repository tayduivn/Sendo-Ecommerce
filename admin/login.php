<? if(!session_id()) session_start(); ?>
<? require("../system/model/config.php") ?>
<? require("../system/model/common_start.php") ?>
<?
if (isset($_POST['butSub'])) {
 
    $user = isset($_POST['txtUser']) && is_string($_POST['txtUser']) ? mysql_real_escape_string($_POST['txtUser']) : null;
    $pass = isset($_POST['txtPwd']) && is_string($_POST['txtPwd']) && is_string($_POST['txtPwd']) ? mysql_real_escape_string($_POST['txtPwd']) : null;
	$passa =   ( md5(md5(md5( md5(md5(md5( mysql_real_escape_string($pass))))))));
	$sql = "select * from user_nhanvien where user='".$user."' and pass='".$passa."' and level='1'  limit 1";
	
	if (mysql_num_rows(mysql_query($sql,$con))>0) {
		  $log=$user;
  // session_register("user");
  $_SESSION['user']=$user;
  echo "<script>window.location='index.php'</script>";

	}
	else
	{
		$err="Username / Password không &#273;úng";	
	}
} 
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK href="style.css" rel="stylesheet" type="text/css">
<title>Đăng Nhập</title>
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">

<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table1">
	<tr>
		<td valign="top">
<!-- Start Content -->							


<body>

<form method="post" name="FormLoaiSP">
<div align="center">
&nbsp;<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table border="1" style="border-collapse: collapse" width="161" id="table20" cellpadding="0" height="100%" bordercolor="#006AAA">
  <tr>
    <td width="100%" class="title" height="25">
    <p align="center" class="title">Admin</td>
  </tr>
  <tr>
    <td width="100%" align="center">
    <table border="0" cellpadding="4" bordercolor="#111111" width="267" id="AutoNumber2" cellspacing="0">
<?
if ($err!='')
{
	echo '<tr><td colspan="2" align="center" width="100%" height="25" class="err">'.$err.'</td></tr>';
}
?>
      <tr>
        <td width="32%" class="smallfont">
        Username</td>
        <td width="57%" class="smallfont">
		<font face="Script">
		<input type="text" name="txtUser" size="20"  ></font></td>
      </tr>
      <tr>
        <td width="32%" class="smallfont">
        Password</td>
        <td width="57%" class="smallfont">
		<font face="Script">
		<input type="password" name="txtPwd" size="20"></font></td>
      </tr>
      <tr>
        <td width="94%" class="smallfont" colspan="2">
		<p align="center">&nbsp;<font face="Script"><INPUT TYPE="submit" name="butSub" value="Login"></font></td>
      </tr>
    </table>
    </td>
  </tr>
  </table>
</div>
</form>


<!-- End Content -->		
		</td>
		<td width="0%" valign="top">
<!-- Start Right -->							
<? include("admin_panel_right.php"); ?>							
<!-- End Right -->		
		</td>
	</tr>
	</table>

</body>

</html>
<? require("../system/model/common_end.php") ?>