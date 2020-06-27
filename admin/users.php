<link type="text/css" href="css/jquery.datepick.css" rel="stylesheet">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="css/jquery.datepick.js"></script>
<script type="text/javascript">
$(function() {
	$('#popupDatepicker').datepick();
	$('#inlineDatepicker').datepick({onSelect: showDate});
	$('#popupDatepicker1').datepick();
	$('#inlineDatepicker').datepick({onSelect: showDate});
});

function showDate(date) {
	alert('The date chosen is ' + date);
}
</script>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
<tr><td width="45%" height="20" align="center" class="title">
Danh sách SHOP | <a href="?act=users_add"><font color="#ffffff">Thên User</font></a>
</td></tr>
<tr><td>
<?
	switch ($_GET['action'])
	{
		case 'del' :
			$id = $_GET['id'];
		    $sql1="select * from user_shop where id=$id limit 1";
        	$pro=mysql_fetch_assoc(mysql_query($sql1,$con));

			$sql2="select * from products where user='".$pro['user']."' ";
        	$pro2=mysql_fetch_assoc(mysql_query($sql2,$con));

			$sql3="select * from slider_show where user='".$pro['user']."' ";
        	$pro3=mysql_fetch_assoc(mysql_query($sql3,$con));

			$sql4="select * from ads_mem where user='".$pro['user']."' ";
        	$pro4=mysql_fetch_assoc(mysql_query($sql4,$con));

			$sql5="select * from cat_mem where user='".$pro['user']."' ";
        	$pro5=mysql_fetch_assoc(mysql_query($sql5,$con));

			$sql = "delete from user_shop where id='".$id."'";
			@$result = mysql_query($sql,$con);
			if ($result) 
				{
					if (file_exists("../".$pro['logo'])) unlink("../".$pro['logo']);
					if (file_exists("../".$pro['banner'])) unlink("../".$pro['banner']);
					if (file_exists("../".$pro['background'])) unlink("../".$pro['background']);

					mysql_query("delete from products where user='".$pro['user']."'",$con);
					mysql_query("delete from slider_show where user='".$pro['user']."'",$con);
					mysql_query("delete from ads_mem where user='".$pro['user']."'",$con);
					mysql_query("delete from cat_mem where user='".$pro['user']."'",$con);
					mysql_query("delete from orders where orders_user='".$pro['user']."'",$con);
					mysql_query("delete from orderdetail where user='".$pro['user']."'",$con);
					mysql_query("delete from contact where user='".$pro['user']."'",$con);
					mysql_query("delete from support_mem where user='".$pro['user']."'",$con);

					if (file_exists("../".$pro2['image'])) unlink("../".$pro2['image']);
					if (file_exists("../".$pro2['image_large'])) unlink("../".$pro2['image_large']);

					if (file_exists("../".$pro3['image'])) unlink("../".$pro3['image']);

					if (file_exists("../".$pro4['image'])) unlink("../".$pro4['image']);
					echo "<p align=center class='err'>&#272;ã xóa thành công </p>".$pro['user'];
				}
					else echo "<p align=center class='err'>Không th&#7875; xóa d&#7919; li&#7879;u</p>";
			break;
	}
?>

<?
	if (isset($_POST['ButDel'])) {
		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			$sql="select * from user_shop where id=$id limit 1";
        	$pro=mysql_fetch_assoc(mysql_query($sql,$con));

			$sql3="select * from slider_show where user='".$pro['user']."' ";
        	$pro3=mysql_fetch_assoc(mysql_query($sql3,$con));
			$sql4="select * from ads_mem where user='".$pro['user']."' ";
        	$pro4=mysql_fetch_assoc(mysql_query($sql4,$con));
			@$result = mysql_query("delete from user_shop where id='".$id."'",$con);
			if ($result)
			{
				$cnt++;
				    if (file_exists("../".$pro['logo'])) unlink("../".$pro['logo']);
					if (file_exists("../".$pro['banner'])) unlink("../".$pro['banner']);
					if (file_exists("../".$pro['background'])) unlink("../".$pro['background']);

					if (file_exists("../".$pro3['image'])) unlink("../".$pro3['image']);
					if (file_exists("../".$pro4['image'])) unlink("../".$pro4['image']);
					mysql_query("delete from products where user='".$pro['user']."'",$con);
					mysql_query("delete from slider_show where user='".$pro['user']."'",$con);
					mysql_query("delete from ads_mem where user='".$pro['user']."'",$con);
					mysql_query("delete from cat_mem where user='".$pro['user']."'",$con);
					mysql_query("delete from orders where orders_user='".$pro['user']."'",$con);
					mysql_query("delete from orderdetail where user='".$pro['user']."'",$con);
					mysql_query("delete from contact where user='".$pro['user']."'",$con);
			}
		}
		echo "<p align=center class='err'>&#272;ã xóa ".$cnt." ph&#7847;n t&#7917;</p>";
	}
?>
<?
	if (isset($_POST['pay'])) {
		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			$sql="select * from user_shop where id=$id limit 1";
        	$pro=mysql_fetch_assoc(mysql_query($sql,$con));
			@$result = mysql_query("update user_shop set active=1,hoahong_time='".strtotime(str_replace("/","-",date("d/m/Y")))."' where id='".$id."' and active=0 and level_shop=0",$con);
			if ($result)
			{
				$cnt++;
			}
		}
		echo "<p align=center class='err'>Đã thanh toán hoa hồng với ".$cnt." thành viên</p>";
	}
?>
<?
	$page = $_GET["page"];
	$MAXPAGE=50;
	$p=0;
	if ($page!='') $p=$page;
?>
<input type=hidden name="page" value="<? echo $page; ?>">
<?
function taotrang($sql,$link,$nitem,$itemcurrent)
{	global $con;
	$ret="";
	$result = mysql_query($sql, $con) or die('Error' . mysql_error());
	$value = mysql_fetch_array($result);
	$plus = (($value['cnt'] % $nitem)>0);
	for ($i=0;$i<($value[0] / $nitem) + plus;$i++)
	{
		if ($i<>$itemcurrent) $ret .= "<a href=\"".$link.$i."\" class=\"lslink\">".($i+1)."</a> ";
		else $ret .= ($i+1)." ";
	}
	return $ret;
}
	$pageindex=taotrang("select count(*) from user_shop","./?act=users"."&page=",$MAXPAGE,$page);
?>

<table cellspacing="0" cellpadding="0">
<tr>
<td>Trang : <? echo $pageindex; ?></td>
</tr>
</table>
<table cellspacing="0" cellpadding="0">
<tr>
 
<td>
<!-- begin tim kiem-->
<form name="form_select" method="GET" action="./">
<input type="hidden" name="act" value="users" />
<input type="hidden" name="search" value="search" />
<table id="timkiem_home" border="0" id="table21" cellspacing="0" cellpadding="0">
					<tr>
					<td>
Tên Shop: <input value="<? echo ($_REQUEST['keywords']) ?>" name="keywords"  type="text" id="input_timkiem" value="">
</td>
						 
  <td style="padding-left:10px;padding-right:10px;">
						<select name="level" style=" height: 22px; ">
						<option value="">-- Chọn tất cả --</option>
						<?php if($_REQUEST['level']=='0')
                        {?>
						<option value="0" selected>Shop Lửa Đỏ</option>
						<option value="3">Shop bình thường</option>
						<?}elseif($_REQUEST['level']=='3'){?>
						<option value="0">Shop Lửa Đỏ</option>
						<option value="3" selected>Shop bình thường</option>
						<?}else{?>
						<option value="0">Shop Lửa Đỏ</option>
						<option value="3">Shop bình thường</option>
						<?}?>
						</select>
  </td>
  
<td colspan="5" style=" text-align:center">
<a href="/admin/?act=users"><input type="button" class="button" value="Bỏ lọc" /></a>
<input type="submit" class="button" name="timkiem" value="Tìm kiếm" />
</td>
 </tr></table>
 <table>
 
</tr>

</tr>
</table>
</form>
<!-- end tim kiem -->
</td>
</tr>
</table>


<tr><td>
<!-- begin danh sach -->
<form method="POST" action="" name="frmList">
<table border="1" cellpadding="2" style="border-collapse: collapse;font-size:12px" bordercolor="#C9C9C9" width="100%" id="AutoNumber1">
<tr class="title">
<td align=center nowrap class="title"><input type="checkbox" name="chkall" onclick="chkallClick(this);"></td>
<td><center>Chức năng</td>
<td>ID</td>
<td>User</td>
<td>Thông tin</td>
<td>Ngân sách</td>
 

</tr>
<?php if($_REQUEST['search']=='')
	{?>
<? 
if($_REQUEST['by']=='')
{
    $by="id";
}
else
{
    $by=$_REQUEST['by'];
}
if($_REQUEST['order']=='')
{
    $order="desc";
}
else
{
    $order=$_REQUEST['order'];
}
$sql=mysql_query("SELECT * FROM user_shop order by ".$by." ".$order." limit ".($p*$MAXPAGE).",".$MAXPAGE);
$i=0;
while($row=mysql_fetch_array($sql))
{
	$i++;
	if ($i%2) $color="#d5d5d5"; else $color="#e5e5e5";
	$chietkhau=$chietkhau+$row['chietkhau'];
	$chietkhau1=0;
	$tien=$tien+$row['tien'];
	$sql_reg=mysql_query("SELECT * FROM user_shop where reg_user='".$row['reg_user']."' ");
	$row_reg=mysql_fetch_assoc($sql_reg);
	$sql_reg1=mysql_query("SELECT * FROM user_shop where user='".$row['user']."' ");
	$row_reg1=mysql_fetch_assoc($sql_reg1);
		$sql_city=mysql_query("SELECT * FROM city where id='".$row['city']."' ");
$row_city=mysql_fetch_assoc($sql_city);
	$sql_ck=mysql_query("SELECT * FROM user_shop where reg_user='".$row['user']."'");
	while($row_ck=mysql_fetch_array($sql_ck))
	{
		$chietkhau1=$chietkhau1+$row_ck['chietkhau'];
	}
?>

<tr bgcolor="<? echo $color;?>" class="table_a">
<td width="20" align="center"><input type="checkbox" name="chk[]" value="<? echo $row['id']; ?>"></td>
<td width="20">
<center><INPUT type="button"  value="Sửa" onClick="window.open('./user_profile.php?id=<? echo $row['id']; ?>','mywindow','width=860,height=400')"> </td>
 
 

<td><? echo $row['id'];?></td>
<td><a href="../<? echo $row['user']; ?>" target="_blank"><? echo $row['user']; ?></a></td>
<td>
<a onmouseover='showtip("<div><table style=\"padding:10px;background-color:black;color:white\"><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">ID Shop: </td><td style=\"width:400px\"><? echo $row_reg1['id'];?></td></tr><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Tên Shop: </td><td style=\"width:400px\"><? echo $row_reg1['company'];?></td></tr><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Loại Shop: </td><td style=\"width:400px\"><?php if($row_reg1['level_shop'] == '0'){?><b style=\"color:red\">Shop Lửa Đỏ </b><?}else{?>Shop Thường<?}?></td></tr><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Tỉnh/TP: </td><td style=\"width:400px\"><? echo $row_city['name'];?></td></tr><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Tình trạng: </td><td style=\"width:400px\"><?php if($row_reg1['active'] == '0'){?><b style=\"color:blue\">Kích hoạt </b><?}else{?>Bị Khóa<?}?></td></tr><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Email: </td><td><? echo $row_reg1['email'];?></td></tr><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Điện thoại: </td><td><? echo $row_reg1['phone'];?></td></tr><tr><td style=\"padding-right:10px;width:110px;height:20px;text-align:right\">Ngày đăng ký: </td><td><? echo $row_reg1['re_time'];?></td></tr><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Địa chỉ: </td><td><? echo $row['address'];?></td></tr></table></div>");' onmouseout="hidetip();" href="../<? echo $row['user']; ?>" target="_blank">
<font color="blue">Xem Shop</b></font>
</a>
</td>
 
 
<td><? echo number_format($row['tien'],0);?></td>
 
</tr>
<?}?>
 
</table>
<!-- end danh sach -->



</td></tr>
</table>
<input type="submit" value="Xóa Ch&#7885;n" name="ButDel" onclick="return confirm('B&#7841;n có ch&#7855;c ch&#7855;n mu&#7889;n xoá ?');" class="button">
</form>
<?}else{?>
<?
	$where="1=1";
	$keywords=killInjection($_REQUEST['keywords']);
	if ($keywords!='')
	{
		$where.=" and (mieuta like '%".$keywords."%' or title like '%".$keywords."%'";
		if ($_REQUEST['search_in_description']=='') 
			$where.="or user like '%".$keywords."%' or company like '%".$keywords."%' or address like '%".$keywords."%' "; 
		$where.=") ";
	}
	if ($_REQUEST['cat_id']!='')	$where.=" and cat_mem=".$_REQUEST['cat_id'];
	if ($_REQUEST['level']!='')	$where.=" and level_shop=".$_REQUEST['level'];
	if ($_REQUEST['active']!='')	$where.=" and active=".$_REQUEST['active'];
	if ($_REQUEST['date']!='')	$where.=" and re_time>=".strtotime(str_replace("/","-",$_REQUEST['date']));
	if ($_REQUEST['date2']!='') $where.=" and re_time<=".strtotime(str_replace("/","-",$_REQUEST['date2']));
	
	$MAXPAGE=50;
	$p=0;
	if ($_REQUEST['p']!='') $p=$_REQUEST['p'];
	if ($_REQUEST['nhom']=='')
	{	
		$nhom="";
	}
	else
	{
		$nhom="and reg_user='".$_REQUEST['nhom']."'";
	}
	$sql="select * from user_shop where $where $nhom limit ".$p*$MAXPAGE.",".$MAXPAGE;
	$result = mysql_query($sql,$con);
	$tien=0;
	$chietkhau=0;
	$i=0;
	while (($row=mysql_fetch_assoc($result)))
	{
	$i++;
	if ($i%2) $color="#d5d5d5"; else $color="#e5e5e5";
	$tien=$tien+$row['tien'];
	$chietkhau=$chietkhau+$row['chietkhau'];
	$chietkhau1=0;
	$sql_reg=mysql_query("SELECT * FROM user_shop where reg_user='".$row['reg_user']."' ");
	$row_reg=mysql_fetch_assoc($sql_reg);
	$sql_ck=mysql_query("SELECT * FROM user_shop where reg_user='".$row['user']."'");
	while($row_ck=mysql_fetch_array($sql_ck))
			$sql_reg=mysql_query("SELECT * FROM user_shop where reg_user='".$row['reg_user']."' ");
	$row_reg=mysql_fetch_assoc($sql_reg);
	$sql_reg1=mysql_query("SELECT * FROM user_shop where user='".$row['user']."' ");
	$row_reg1=mysql_fetch_assoc($sql_reg1);
		$sql_city=mysql_query("SELECT * FROM city where id='".$row['city']."' ");
$row_city=mysql_fetch_assoc($sql_city);
	{
		$chietkhau1=$chietkhau1+$row_ck['chietkhau'];
	}
		?>
<tr bgcolor="<? echo $color;?>" class="table_a">
<td width="20" align="center"><input type="checkbox" name="chk[]" value="<? echo $row['id']; ?>"></td>
<td width="20">
<center><INPUT type="button" value="Sửa" onClick="window.open('./user_profile.php?id=<? echo $row['id']; ?>','mywindow','width=860,height=400')"> </td>
 
 

	
<td><? echo $row['id'];?></td>
<td><a href="../<? echo $row['user']; ?>" target="_blank"><? echo $row['user']; ?></a></td>
<td>
<a onmouseover='showtip("<div><table style=\"padding:10px;background-color:black;color:white\"><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">ID Shop: </td><td style=\"width:400px\"><? echo $row_reg1['id'];?></td></tr><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Tên Shop: </td><td style=\"width:400px\"><? echo $row_reg1['company'];?></td></tr><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Loại Shop: </td><td style=\"width:400px\"><?php if($row_reg1['level_shop'] == '0'){?><b style=\"color:red\">Shop Lửa Đỏ </b><?}else{?>Shop Thường<?}?></td></tr><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Tỉnh/TP: </td><td style=\"width:400px\"><? echo $row_city['name'];?></td></tr><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Tình trạng: </td><td style=\"width:400px\"><?php if($row_reg1['active'] == '0'){?><b style=\"color:blue\">Kích hoạt </b><?}else{?>Bị Khóa<?}?></td></tr><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Email: </td><td><? echo $row_reg1['email'];?></td></tr><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Điện thoại: </td><td><? echo $row_reg1['phone'];?></td></tr><tr><td style=\"padding-right:10px;width:110px;height:20px;text-align:right\">Ngày đăng ký: </td><td><? echo $row_reg1['re_time'];?></td></tr><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Địa chỉ: </td><td><? echo $row['address'];?></td></tr></table></div>");' onmouseout="hidetip();" href="../<? echo $row['user']; ?>" target="_blank">
<font color="blue">Xem Shop</b></font>
</a>
</td>
 
 
<td><? echo number_format($row['tien'],0);?></td>
 
</tr>
  <?}
	settype($total[0],int);
?>
 
</table>
<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table1">
<tr><td colspan="2" height="7"></td></tr>
	<tr>
		<td>
</td>



		<td align="right">
       </td>


	</tr>
</table>
<input type="submit" value="Xóa Ch&#7885;n" name="ButDel" onclick="return confirm('B&#7841;n có ch&#7855;c ch&#7855;n mu&#7889;n xoá ?');" class="button">
 
</form>
<?}?>
<script language="JavaScript">
function chkallClick(o) {
  	var form = document.frmList;
	for (var i = 0; i < form.elements.length; i++) {
		if (form.elements[i].type == "checkbox" && form.elements[i].name!="chkall") {
			form.elements[i].checked = document.frmList.chkall.checked;
		}
	}
}
</script>