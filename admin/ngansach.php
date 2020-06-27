<?php
mysql_connect("localhost","root","");
mysql_select_db("gianhang");
mysql_query("SET NAMES 'latin1'");

$id=$_REQUEST['id'];
$sql=mysql_query("SELECT * FROM user_shop where id='".$id."'");
$row=mysql_fetch_assoc($sql);

?>
<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<style>
.left
{
float:left
}
.left input
{
width:250px;
}
</style>

<div>




<div style="float:right">
<div style="background-color:#8CA6EE;padding:10px">
Thông tin tài khoản
</div>
<div style="">
<?php
if(isset($_POST['Save']))
{


	$user=$_POST['user'];

	$tien= $_POST['tien'];
	$noidung = $_POST['noidung'];
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	$date = date("d-m-Y H:i:s");

	

	{
		$sql="update user_shop set tien = '".$tien."' + tien,tongnapvao = '".$tien."' + tongnapvao where id='".$id."'";
		if(mysql_query($sql))
		{
			$sql="insert into lichsugiaodich (user,noidung,date) values ('".$user."','".$noidung."','".$date."')";
		if(mysql_query($sql))
			$err="Cập nhật thành công";
		}
		else
		{
			$err="Không thể cập nhật";
		}
	}

}
?>

<form method="POST" action="">
<table>
<tr>
<td align="right"></td>
<td><?php echo $err;?></td>
</tr>
<tr>
<input size="111" type=text name="noidung" value="Tài khoản <b><?php echo $row['user'];?></b> vừa được thêm tiền vào ngân sách số tiền <b>123</b> thông qua chuyển khoản ngân hàng  ">

<tr>
<td align="right"><p>TK: </td>
<td><input type="text"   disabled value="<?php echo $row['user'];?>"></p></td>
</tr>


<input type=hidden name="user"   value="<?php echo $row['user'];?>">

<tr>
<td align="right"><p>Hiện có: </td>
<td><input type="text"  disabled value="<?php echo $row['tien'];?>"></p></td>
</tr>
<tr>
<tr>
<td align="right"><p>Thêm tiền: </td>
<td><input type="text" name="tien"></p></td>
</tr>





<td></p></td>
<tr>
<td></p></td>
<td><input type="submit" name="Save" value="Cập nhật"></p></td>
</tr>
</table>
</form>
</div>
</div>
</div>
</body>
</html>