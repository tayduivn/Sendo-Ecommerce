<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
<tr><td width="45%" height="20" align="center" class="title">
Danh sách Shop chờ kích hoạt | <a href="?act=users_add"><font color="#ffffff">Thên User</font></a>
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


<form method="POST" action="<? echo $_SERVER[PHP_SELF]; ?>" name="frmList">
<input type="hidden" name="act" value="users_active">
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
	$pageindex=taotrang("select count(*) from user_shop where level_shop=1","./?act=users_active"."&page=",$MAXPAGE,$page);
?>

<table cellspacing="0" cellpadding="0">
<tr>
<td class="smallfont">Trang : <? echo $pageindex; ?></td>
</tr>
</table>
</td></tr>



<tr><td>
<!-- begin danh sach -->
<form method="POST" action="<? echo $_SERVER[PHP_SELF]; ?>" name="frmList">
<table border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#C9C9C9" width="100%" id="AutoNumber1">
<tr class="title">
<td align=center nowrap class="title"><input type="checkbox" name="chkall" onclick="chkallClick(this);"></td>
<td nowrap class="title">&nbsp;</td>
<td nowrap class="title">&nbsp;</td>
<td>ID</td>
<td>T&#234;n &#273;&#259;ng nh&#7853;p</td>
<td>M&#7853;t kh&#7849;u</td>
<td>Thứ tự</td>
<td>Quy&#7873;n h&#7841;n</td>
</tr>
<? $sql=mysql_query("SELECT * FROM user_shop where level_shop=1 order by id desc");
$i=0;
while($row=mysql_fetch_array($sql))
{
	$i++;
	if ($i%2) $color="#d5d5d5"; else $color="#e5e5e5";
?>

<tr bgcolor="<? echo $color;?>">
<td width="20" align="center" class="smallfont"><input type="checkbox" name="chk[]" value="<? echo $row['Id']; ?>"></td>
<td width="20" bgcolor="<? echo $color; ?>" class="smallfont">
    <a href="./?act=users_add&cat=<? echo $_REQUEST['cat']; ?>&page=<? echo $_REQUEST['page']; ?>&id=<? echo $row['id']; ?>">
	S&#7917;a</a></td>
 <td width="20" bgcolor="<? echo $color; ?>" class="smallfont">
    <a href="./?act=users_active&action=del&page=<? echo $_REQUEST['page']; ?>&id=<? echo $row['id']; ?>">
	Xoá</a></td>
<td><? echo $row['id'];?></td>
<td><? echo $row['user'];?></td>
<td><? echo $row['pass'];?></td>
<td><? echo $row['thutu'];?></td>
<td><? if($row['level_shop']==0) echo "<font color=red>Shop Vip</font>";
else echo "<font color=blue>Shop chờ kích hoạt</font>";
?></td>

</tr>
<?}?>
</table>
<!-- end danh sach -->



</td></tr>
</table>
<input type="submit" value="Xóa Ch&#7885;n" name="ButDel" onclick="return confirm('B&#7841;n có ch&#7855;c ch&#7855;n mu&#7889;n xoá ?');" class="button" style="padding: 0">
<input type="hidden" name="act" value="users_active">
</form>
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