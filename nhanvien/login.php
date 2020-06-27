<? if(!session_id()) session_start(); ?>
<? require("../system/model/config.php") ?>
<? require("../system/model/common_start.php") ?>
<?
if (isset($_POST['butSub'])) {
 
	$user = isset($_POST['txtUser']) && is_string($_POST['txtUser']) ? mysql_real_escape_string($_POST['txtUser']) : null;
    $passcheck = isset($_POST['txtPwd']) && is_string($_POST['txtPwd']) && is_string($_POST['txtPwd']) ? mysql_real_escape_string($_POST['txtPwd']) : null;
    $pass =   ( md5(md5(md5( md5(md5(md5( mysql_real_escape_string($passcheck))))))));
	$sql = "select * from user_nhanvien where user='".$user."' and pass='".$pass."' limit 1";
	$bang=mysql_query($sql);
	$xuat=mysql_fetch_array($bang);
	$level=$xuat['level_shop'];
		if($user!==$xuat['user'] or $pass!==$xuat['pass'])
	{
		$err="Tên đăng nhập hoặc mật khẩu không đúng";	
		}
elseif (mysql_num_rows(mysql_query($sql,$con))>0)
	{
		$quyen=$level;
		$log=$user;
		$_SESSION['nhanvien']=$user;
		$_SESSION['level']=$level;
		echo "<script>window.location='/nhanvien'</script>";

	}
else
	{
}
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Language" content="en-us" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Đăng nhập hệ thống </title>
    <link type="image/x-icon" href="images/favico.ico" rel="shortcut icon"/>
    <link rel="stylesheet" href="css/Login2.css" type="text/css" />

 

</head>
 
 <body>
   <form   method="post" name="FormLoaiSP" >
	<div class="container">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo"><span>Hello, wish you success</span></span></h1>
		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Quản Trị Hệ Thống</h2>
			</div>
			<center>										<font color="red" style="
    font-size: 14px;
"><b>
<?
if ($err!='')
{
	echo $err;
}
?></b></font></center>
			<label for="username">Tên tài khoản</label>
			
			<input name="txtUser" type="text" id="username">
			<br>
			<label for="password" style="margin-left: 28px;">Mật khẩu</label>
			
			<input name="txtPwd" type="password" id="password">
		
			<button id="login" type="submit" name="butSub">Đăng nhập</button>
			
		 
		
		</div>
	</div>
</body>
 
 
 
 
 
 </form>
 
 
 

 
 

 
<? require("../system/model/common_end.php") ?>