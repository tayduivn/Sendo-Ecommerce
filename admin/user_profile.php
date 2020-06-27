<?php
mysql_connect("localhost","root","");
mysql_select_db("");
mysql_query("SET NAMES 'latin1'");

$id=$_REQUEST['id'];
$sql=mysql_query("SELECT * FROM user_shop where id='".$id."'");
$row=mysql_fetch_assoc($sql);
		$caaaa1=mysql_query("SELECT * FROM city where id='".$row['city']."' ");
	$cat_mem1=mysql_fetch_assoc($caaaa1);
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
<table><tr>
 
</tr></table>
<div>
<div class="left">
<div style="background-color:#8CA6EE;padding:10px">
 Thông tin Shop
</div>
<form method="POST" action="">
<div style="">
<table>
<tr>
<td align="right"><p>ID: </td>
<td><input type="text"  name="id" value="<?php echo $row['id'];?>"> </p></td>
</tr><tr>
<td align="right"><p>Tên đăng nhập: </td>
<td><input type="text"  name="user" value="<?php echo $row['user'];?>"> (Phân biệt chữ HOA)</p></td>
</tr>
 
<tr>
<td align="right"><p>Loại Shop: </td>
<td>




<input type="text"  style="width: 29px;" name="level_shop" value="<?php echo $row['level_shop'];?>"> (3 Shop Thường)-(0 Shop LỬA ĐỎ)


</p></td>
</tr>
 
<tr>
<td align="right"><p>Email: </td>
<td><input type="text" name="email"  value="<?php echo $row['email'];?>"></p></td>
</tr>
<tr>
<td align="right"><p>Số điện thoại: </td>
<td><input type="text" name="phone" value="<?php echo $row['phone'];?>"></p></td>
</tr>
<tr>
<td align="right"><p>Địa chỉ : </td>
<td><input type="text" name="address" value="<?php echo $row['address'];?>"></p></td>
</tr>
</table>
</div>
</div>



<div style="float:right">
<div style="background-color:#8CA6EE;padding:10px">
Thông tin SHOP
</div>
<div style="">
<?php
if(isset($_POST['Save']))
{
	$user=$_POST['user'];
	$pass =   ( md5(md5(md5( md5(md5(md5( addslashes($_POST['pass']))))))));
    $level_shop=$_POST['level_shop'];
 

	$email= $_POST['email'];
	$phone= $_POST['phone'];
	$address= $_POST['address'];	
	$company= $_POST['company'];	
	$city= $_POST['city'];	
	$visit= $_POST['visit'];	
	$tien=str_replace(",","",$_POST['tien']);
	$active= $_POST['active'];	
	$re_time= $_POST['re_time'];	
 
	
	
	
	
 
 
	
 
 
		$sql="update user_shop set user='".$user."',pass='".$pass."',level_shop='".$level_shop."',email='".$email."',phone='".$phone."',address='".$address."',company='".$company."',city='".$city."',visit='".$visit."',tien='".$tien."',active='".$active."',re_time='".$re_time."' where id='".$id."'";
		if(mysql_query($sql))
		{
			$err="<script>window.location='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."'</script>";
		}
		else
		{
			$err="Không thể cập nhật";
		}
 

}


?>

<table>
<tr>
<td align="right"></td>
<td><?php echo $err;?></td>
</tr>
<tr>
<tr>
<td align="right"><p>Tên Shop: </td>
<td><input type="text" name="company"  value="<?php echo $row['company'];?>"></p></td>
</tr>
<tr>
<tr>
<td align="right"><p>Tỉnh thành: </td>
<td>  <select name="city"  style="width:173px">
 <option value="<? echo $row['city'];?>" >Hiện tại: <? echo $cat_mem1['name'];?> </option>
  <? $sql1=mysql_query("SELECT * FROM city");
  while($row1=mysql_fetch_array($sql1))
  {?>
                         
                           <option value="<? echo $row1['id'];?>" ><? echo $row1['name'];?> </option>
<?}?>
						   </select></p></td>
</tr>
<tr>
<td align="right"><p>Lượt xem trang : </td>
<td><input type="text" name="visit" value="<? echo $row['visit']; ?>"></p></td>
</tr>
<tr>
<td align="right"><p>Ngân sách: </td>
<td><input type="text" name="tien" value="<? echo $row['tien']; ?>"></p>0 Active,1 Khóa</td>
</tr>
<tr>
<td align="right"><p>Trạng thái:  </td>
<td><input type="text" name="active" value="<? echo $row['active']; ?>"></p></td>
</tr>
<tr>
<td align="right"><p>Ngày đăng ký: </td>
<td><input type="text" name="re_time" value="<? echo $row['re_time']; ?>"></p> </td>
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