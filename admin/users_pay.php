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
Lịch sử thanh toán hoa hồng
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
<td>Tìm kiếm: </td>
<td>
<!-- begin tim kiem-->
<form name="form_select" method="GET" action="./">
<input type="hidden" name="act" value="users_pay" />
<input type="hidden" name="search" value="search" />
<table id="timkiem_home" border="0" id="table21" cellspacing="0" cellpadding="0">
					<tr>
					<td>
Ten site: <input name="keywords" type="text" id="input_timkiem" value="">
</td>
 <td width="300">
 Thành viên giới thiệu: 
<select name="nhom">
<?php
$queryd = "SELECT id,reg_user,user, COUNT(user) FROM user_shop GROUP BY reg_user";  
$resultd = mysql_query($queryd) or die(mysql_error());
while($rowd = mysql_fetch_array($resultd)){
	?>
	<?php if($rowd['reg_user']=='')
	{?>
	<option value="" selected>-- Chọn tất cả --</option>
	<?}else{?>
	<?php if($rowd['reg_user']==$_REQUEST['nhom'])
		{?>
	<option value="<? echo $rowd['reg_user'];?>" selected><? echo $rowd['reg_user'];?></option>
	<?}else{?>
	<option value="<? echo $rowd['reg_user'];?>"><? echo $rowd['reg_user'];?></option>
	<?}?>
	<?}?>
<?}
?>
</select>
 </td>
 </tr></table>
 <table>
 <tr>
<td style="width:270px">
<div>Thời gian 
<input type="text" name="date" id="popupDatepicker" value="<?php echo $_REQUEST['date'];?>">
</div>
</td>
<td style="width:250px">
<div>đến 
<input type="text" name="date2" id="popupDatepicker1" value="<?php echo $_REQUEST['date2'];?>">
</div>
</td>
</tr>
</tr>
<td colspan="5" style="padding-top:10px;text-align:center">
<input type="reset" class="button" value="Bỏ lọc" />
<input type="submit" class="button" name="timkiem" value="Tìm kiếm" />
</td>
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
<td nowrap class="title">&nbsp;</td>
<td nowrap class="title">&nbsp;</td>
<td nowrap class="title">&nbsp;</td>
<td>ID</td>
<td>User</td>
<td>Người giới thiệu</td>
<td>Ngày đăng ký</td>
<td>Ngày kích hoạt Vip </td>
<td><a href="<?php echo $_SERVER['REQUEST_URI'];?>&by=end_time&order=desc">Ngày hết hạn </td>
<td>Ngày T.Toán</td>
<td>Status</td>
<td>Level</td>
<td>Tiền nộp</td>
<td>Hoa hồng</td>
<td>Tổng Hoa hồng</td>
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
$sql=mysql_query("SELECT * FROM user_shop where active=1 order by ".$by." ".$order." limit ".($p*$MAXPAGE).",".$MAXPAGE);
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
	$sql_ck=mysql_query("SELECT * FROM user_shop where reg_user='".$row['user']."'");
	while($row_ck=mysql_fetch_array($sql_ck))
	{
		$chietkhau1=$chietkhau1+$row_ck['chietkhau'];
	}
?>

<tr bgcolor="<? echo $color;?>" class="table_a">
<td width="20" align="center"><input type="checkbox" name="chk[]" value="<? echo $row['id']; ?>"></td>
<td width="20">
<INPUT type="button" value="Xem" onClick="window.open('./user_profile.php?id=<? echo $row['id']; ?>','mywindow','width=860,height=400')"> </td>
<td width="20">
    <a href="./?act=users_add&cat=<? echo $_REQUEST['cat']; ?>&page=<? echo $_REQUEST['page']; ?>&id=<? echo $row['id']; ?>">
	S&#7917;a</a></td>
 <td width="20">
    <a href="./?act=users&action=del&page=<? echo $_REQUEST['page']; ?>&id=<? echo $row['id']; ?>">
	Xoá</a></td>
<td><? echo $row['id'];?></td>
<td><a href="../<? echo $row['user']; ?>" target="_blank"><? echo $row['user']; ?></a></td>
<td>
<a onmouseover='showtip("<div><table style=\"padding:10px;background-color:black;color:white\"><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Full name: </td><td style=\"width:400px\"><? echo $row_reg['fullname'];?></td></tr><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Email: </td><td><? echo $row_reg['email'];?></td></tr><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Mobile: </td><td><? echo $row_reg['phone'];?></td></tr><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Company: </td><td><? echo $row_reg['company'];?></td></tr><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Address: </td><td><? echo $row_reg['address'];?></td></tr></table></div>");' onmouseout="hidetip();" href="../<? echo $row['reg_user']; ?>" target="_blank">
<font color="blue"><? echo $row['reg_user']; ?></b></font>
</a>
</td>
<td><? echo date("d/m/Y",$row['re_time']);?></td>
<td><? echo date("d/m/Y",$row['pay_time']);?></td>
<td><? echo date("d/m/Y",$row['end_time']);?></td>
<td style="color:red"><? echo date("d/m/Y",$row['hoahong_time']);?></td>
<td>
<?php if($row['active']=='0')
	{?>
	<font color="red"><b>No</b></font>
	<?}else{?>
	<font color="blue"><b>Yes</b></font>
	<?}?>
</td>
<td><? if($row['level_shop']==0) echo "<font color=red>Vip</font>";
elseif($row['level_shop']==3) echo "<font color=blue>Free</font>";
elseif($row['level_shop']==1) echo "<font color=blue>Unactive</font>";
else echo "<font color=blue>Member</font>";
?></td>
<td><? echo number_format($row['tien'],0);?></td>
<td><? echo number_format($row['chietkhau'],0);?></td>
<td><? echo number_format($chietkhau1,0);?></td>
</tr>
<?}?>
<tr>
  <td colspan="13" align="center"  style="font-weight:bold;color:blue">
  Tổng số
 </td>
 <td>
 <div style="float:right;padding-right:16px"> <font color="red"><b><? echo number_format($tien,0);?> VNĐ</b></font></div>
 </td>
 <td>
 <div style="float:right;padding-right:16px"> <font color="red"><b><? echo number_format($chietkhau,0);?> VNĐ</b></font></div>
 </td>
   <td>
 <div style="float:right;padding-right:16px"> <font color="red"><b><? echo number_format($chietkhau,0);?> VNĐ</b></font></div>
 </td>
   </tr>
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
	if ($_REQUEST['status']!='')	$where.=" and active=".$_REQUEST['status'];
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
	$sql="select * from user_shop where $where $nhom and active=1 limit ".$p*$MAXPAGE.",".$MAXPAGE;
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
	{
		$chietkhau1=$chietkhau1+$row_ck['chietkhau'];
	}
		?>
<tr bgcolor="<? echo $color;?>" class="table_a">
<td width="20" align="center"><input type="checkbox" name="chk[]" value="<? echo $row['id']; ?>"></td>
<td width="20">
<INPUT type="button" value="Xem" onClick="window.open('./user_profile.php?id=<? echo $row['id']; ?>','mywindow','width=860,height=400')"> </td>
<td width="20">
    <a href="./?act=users_add&cat=<? echo $_REQUEST['cat']; ?>&page=<? echo $_REQUEST['page']; ?>&id=<? echo $row['id']; ?>">
	S&#7917;a</a></td>
 <td width="20">
    <a href="./?act=users&action=del&page=<? echo $_REQUEST['page']; ?>&id=<? echo $row['id']; ?>">
	Xoá</a></td>
<td><? echo $row['id'];?></td>
<td><a href="../<? echo $row['user']; ?>" target="_blank"><? echo $row['user']; ?></a></td>
<td>
<a onmouseover='showtip("<div><table style=\"padding:10px;background-color:black;color:white\"><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Full name: </td><td style=\"width:400px\"><? echo $row_reg['fullname'];?></td></tr><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Email: </td><td><? echo $row_reg['email'];?></td></tr><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Mobile: </td><td><? echo $row_reg['phone'];?></td></tr><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Company: </td><td><? echo $row_reg['company'];?></td></tr><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Address: </td><td><? echo $row_reg['address'];?></td></tr></table></div>");' onmouseout="hidetip();" href="../<? echo $row['reg_user']; ?>" target="_blank">
<font color="blue"><? echo $row['reg_user']; ?></b></font>
</a>
</td>
<td><? echo date("d/m/Y",$row['re_time']);?></td>
<td><? echo date("d/m/Y",$row['pay_time']);?></td>
<td><? echo date("d/m/Y",$row['end_time']);?></td>
<td style="color:red"><? echo date("d/m/Y",$row['hoahong_time']);?></td>
<td>
<?php if($row['active']=='0')
	{?>
	<font color="red"><b>No</b></font>
	<?}else{?>
	<font color="blue"><b>Yes</b></font>
	<?}?>
</td>
<td><? if($row['level_shop']==0) echo "<font color=red>Vip</font>";
elseif($row['level_shop']==3) echo "<font color=blue>Free</font>";
elseif($row['level_shop']==1) echo "<font color=blue>Unactive</font>";
else echo "<font color=blue>Member</font>";
?></td>
<td><? echo number_format($row['tien'],0);?></td>
<td><? echo number_format($row['chietkhau'],0);?></td>
<td><? echo number_format($chietkhau1,0);?></td>
</tr>
  <?}
	settype($total[0],int);
?>
<tr>
  <td colspan="13" align="center"  style="font-weight:bold;color:blue">
  Tổng số
 </td>
 <td>
 <div style="float:right;padding-right:16px"> <font color="red"><b><? echo number_format($tien,0);?> VNĐ</b></font></div>
 </td>
 <td>
 <div style="float:right;padding-right:16px"> <font color="red"><b><? echo number_format($chietkhau,0);?> VNĐ</b></font></div>
 </td>
   <td>
 <div style="float:right;padding-right:16px"> <font color="red"><b><? echo number_format($chietkhau,0);?> VNĐ</b></font></div>
 </td>
   </tr>
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
<input type="submit" value="Thanh toán hoa hồng" name="pay" onclick="return confirm('Bạn có đồng ý thanh toán hoa hồng không?');" class="button">
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