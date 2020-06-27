<link rel="stylesheet" type="text/css" href="css/tcal.css" />
<script type="text/javascript" src="css/tcal.js"></script> 
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
<tr><td width="45%" height="20" align="center" class="title">
Danh sách thành viên VIP | <a href="?act=users_add"><font color="#ffffff">Thên User</font></a>
</td></tr>
<tr><td>
<?
	switch ($_GET['action'])
	{
		case 'del' :
			$id = $_GET['id'];
			$sql = "delete from user_shop where id='".$id."'";
			@$result = mysql_query($sql,$con);
			if ($result) echo "<p align=center class='err'>&#272;ã xóa thành công</p>";
			else echo "<p align=center class='err'>Không th&#7875; xóa d&#7919; li&#7879;u</p>";
			break;
	}
?>

<?
	if (isset($_POST['ButDel'])) {
		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			@$result = mysql_query("delete from user_shop where id='".$id."'",$con);
			if ($result) $cnt++;
		}
		echo "<p align=center class='err'>&#272;ã xóa ".$cnt." ph&#7847;n t&#7917;</p>";
	}
?>
<?
	$page = $_GET["page"];
	$MAXPAGE=50;
	$p=0;
	if ($page!='') $p=$page;
?>

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
	$pageindex=taotrang("select count(*) from user_shop where level_shop=0","./?act=users_vip"."&page=",$MAXPAGE,$page);
?>

<table cellspacing="0" cellpadding="0">
<tr>
<td class="smallfont">Trang : <? echo $pageindex; ?></td>
</tr>
</table>
<!-- add class="tcal" to your input field -->
<form action="" method="GET">
<input type="hidden" name="act" value="users_vip" />
<input type="hidden" name="search" value="search" />
<table cellspacing="4" cellpadding="4" width="100%">
<tr>
<td style="width:100px">
</td>
<td style="width:100px">
<div>Tên site</div>
</td>
<td class="smallfont">
<div><input style="width: 300px;" type="text" name="keywords" value="" placeholder="Nhập tên công ty.." /></div>
</td>
<td style="width:320px">
<div>Thời gian <input type="text" name="date" class="tcal" value="" /></div>
</td>
<td style="width:250px">
<div>đến <input type="text" name="date2" class="tcal" value="" /></div>
</td>
<td style="width:300px">
</td>
</tr>
<tr><td colspan="6" align="center">
<input type="submit" class="button" name="timkiem" value="Tìm kiếm" />
<input type="reset" class="button" value="Bỏ lọc" />
</td></tr>
</table>
</form>
</td></tr>
<tr><td>
<!-- begin danh sach -->
<form method="POST" action="<? echo $_SERVER[PHP_SELF]; ?>" name="frmList">
<input type="hidden" name="act" value="users_vip">
<input type=hidden name="page" value="<? echo $page; ?>">
<table border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#C9C9C9" width="100%" id="AutoNumber1">
<tr class="dash-sub-menu">
<td align="center" nowrap class="title"></td>
<td align="center" nowrap class="title"></td>
<td align="center" nowrap class="title"></td>
    <td align="center" nowrap class="title"><b>ID</b></td>
	<td align="center" nowrap class="title"><b>Logo</b></td>
	 <td align="center" nowrap class="title"><b>User </b></td>
	 <td align="center" width="200" nowrap class="title"><b>Họ tên</b></td>
     <td align="center" width="100" nowrap class="title"><b>Phone</b></td>
    <td align="center" nowrap class="title"><b>Tỉnh thành</b></td>
    <td align="center" nowrap class="title"><b>Lĩnh vực</b></td>
	<td align="center" nowrap class="title">Ngày đăng ký</td>
    <td align="center" nowrap class="title">Ngày hết hạn</td>
	<td align="center" nowrap class="title">Tiền</td>
  </tr>
<?php if($_REQUEST['search']=='')
	{?>
<? $sql=mysql_query("SELECT * FROM user_shop where level_shop=0 order by id desc");
$i=0;
			$tien=0;
			$chietkhau=0;
while($row=mysql_fetch_array($sql))
{
	        $tien=$tien+$row['tien'];
			$chietkhau=$chietkhau+$row['chietkhau'];
			$i++;
			if ($i%2) $color="#d5d5d5"; else $color="#e5e5e5";
			$catinfo=GetCatInfo($row['cat_mem']);
			$cityinfo=GetCityInfo($row['city']);
	$i++;
	if ($i%2) $color="#d5d5d5"; else $color="#e5e5e5";
?>
<tr bgcolor="<? echo $color;?>">
<td width="20" align="center" class="smallfont"><input type="checkbox" name="chk[]" value="<? echo $row['Id']; ?>"></td>
<td width="20" bgcolor="<? echo $color; ?>" class="smallfont">
   <a href="./?act=users_add&cat=<? echo $_REQUEST['cat']; ?>&page=<? echo $_REQUEST['page']; ?>&id=<? echo $row['id']; ?>">
	S&#7917;a</a>
</td>
 <td width="20" bgcolor="<? echo $color; ?>" class="smallfont">
    <a href="./?act=users_vip&action=del&page=<? echo $_REQUEST['page']; ?>&id=<? echo $row['id']; ?>">
	Xoá</a></td>
    <td align="center" class="smallfont"><? echo $row['id']; ?>&nbsp;</td>
	<td width="69" ><a title="<? echo $row['name']; ?>"><img src="../<? echo $row['logo']; ?>" width="69px" height="37px" /></a></td>
	<td align="center" class="smallfont"><a href="http://<? echo $row['user']; ?>.<? echo $domain_config; ?>" target="_blank"><? echo $row['user']; ?>&nbsp;</td>
	<td class="td_sanpham">
	<? echo $row['fullname']; ?>
	</td>
    <td class="td_sanpham">
	<? echo $row['phone']; ?>
	</td>
    <td  class="td_sanpham"><?if($row['city']=='0'){?>Toàn quốc<?}else{?><? echo $cityinfo['name']; ?><?}?>&nbsp;</td>
    <td align="center" class="smallfont"><? echo $catinfo['name']; ?>&nbsp;</td>
	<td align="center"  class="smallfont">
    <? echo date("d-m-Y",$row['re_time']); ?></td>
    <td align="center"  class="smallfont">
    <? echo date("d-m-Y",$row['end_time']); ?></td>
	<td align="center"  class="quickaction">
	<font color="red"><b><? echo number_format($row['tien'],0); ?> VNĐ</b></font>
    </td>
  </tr>
<?}?>
</table>
<!-- end danh sach -->

</td></tr>
</table>
<input type="submit" value="Xóa Ch&#7885;n" name="ButDel" onclick="return confirm('B&#7841;n có ch&#7855;c ch&#7855;n mu&#7889;n xoá ?');" class="button" style="padding: 0">
<input type="hidden" name="act" value="users_vip">
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
	if ($_REQUEST['id']!='')	$where.=" and id=".$_REQUEST['id'];
	if ($_REQUEST['cat_id']!='')	$where.=" and cat_mem=".$_REQUEST['cat_id'];
	if ($_REQUEST['level']!='')	$where.=" and level_shop=".$_REQUEST['level'];
	if ($_REQUEST['date']!='')	$where.=" and re_time>=".strtotime(str_replace("/","-",$_REQUEST['date']));
	if ($_REQUEST['date2']!='') $where.=" and re_time<=".strtotime(str_replace("/","-",$_REQUEST['date2']));
	
	$MAXPAGE=11;
	$p=0;
	if ($_REQUEST['p']!='') $p=$_REQUEST['p'];
	
	$result = mysql_query("select count(*) from user_shop where $where",$con);
	$total=mysql_fetch_row($result);

	$sql="select * from user_shop where $where and level_shop=0 limit ".$p*$MAXPAGE.",".$MAXPAGE;
	$result = mysql_query($sql,$con);
	$tien=0;
	$chietkhau=0;
	while (($row=mysql_fetch_assoc($result)))
	{
		$tien=$tien+$row['tien'];
		$chietkhau=$chietkhau+$row['chietkhau'];
		?>
<tr bgcolor="<? echo $color;?>">
<td width="20" align="center" class="smallfont"><input type="checkbox" name="chk[]" value="<? echo $row['Id']; ?>"></td>
<td width="20" bgcolor="<? echo $color; ?>" class="smallfont">
    <a href="./?act=users_add&cat=<? echo $_REQUEST['cat']; ?>&page=<? echo $_REQUEST['page']; ?>&id=<? echo $row['id']; ?>">
	S&#7917;a</a></td>
 <td width="20" bgcolor="<? echo $color; ?>" class="smallfont">
    <a href="./?act=users_vip&action=del&page=<? echo $_REQUEST['page']; ?>&id=<? echo $row['id']; ?>">
	Xoá</a></td>
<td><? echo $row['id'];?></td>
<td><? echo $row['user'];?></td>
<td><? echo $row['pass'];?></td>
<td><? echo $row['thutu'];?></td>
<td><? if($row['level_shop']==0) echo "<font color=red>Shop Vip</font>";
else echo "<font color=blue>Shop miễn phí</font>";
?></td>
</tr>
  <?}
	settype($total[0],int);
?>
<?php echo strtotime(str_replace("/","-",$_REQUEST['date']));?>-<?php echo $_REQUEST['date'];?>
<tr>
  <td colspan="10" align="center"  class="smallfont">
   <div style="float:right;padding-right:16px"> <font color="red"><b><? echo number_format($tien,0);?> VNĐ</b></font></div>
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