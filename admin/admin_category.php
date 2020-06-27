<table height="28" cellSpacing="0" cellPadding="0" width="100%" border="0">

      <tr align=center>
        <td class="title" width="100%" height="17">
        Danh mục sản phẩm: <b> <a href="./?act=category_m&page=<? echo $_REQUEST['page']; ?>&cat=<? echo $_REQUEST['cat']; ?>"><font color="#FFFFFF">Nhập mới</font></a><font color="#FFFFFF"> </font></b></td>
      </tr>
    </table>
<?

$MAXPAGE=20;

	switch ($_GET['action'])
	{
		case 'del' :
			$id = $_GET['id'];
			$result = mysql_query("select cat from products where cat='".$id."'",$con);
			if (mysql_num_rows($result)<=0) {
				$sql = "delete from cat where id='".$id."'";
				@$result = mysql_query($sql,$con);
				if ($result) echo "<p align=center class='err'>&#272;ã xóa thành công</p>";
				else echo "<p align=center class='err'>Không th&#7875; xóa d&#7919; li&#7879;u</p>";
			} else {
				echo "<p align=center class='err'>&#272;ang có s&#7843;n ph&#7849;m s&#7917; d&#7909;ng. nên b&#7841;n không th&#7875; xóa</p>";	
			}
			
			break;
	}
?>

<?
	if (isset($_POST['ButDel'])) {
		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			@$result = mysql_query("delete from cat where id='".$id."'",$con);
			if ($result) $cnt++;
		}
		echo "<p align=center class='err'>&#272;ã xóa ".$cnt." ph&#7847;n t&#7917;</p>";
	}
?>
<?
	if (isset($_POST['active'])) {
		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			@$result = mysql_query("update cat set status=0 where id='".$id."'",$con);
			if ($result) $cnt++;
		}
		echo "<p align=center class='err'>Đã hiển thị ".$cnt." ph&#7847;n t&#7917;</p>";
	}
?>
<?
	if (isset($_POST['un_active'])) {
		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			@$result = mysql_query("update cat set status=1 where id='".$id."'",$con);
			if ($result) $cnt++;
		}
		echo "<p align=center class='err'>Đã hủy hiển thị ".$cnt." ph&#7847;n t&#7917;</p>";
	}
?>
<?
	$page = $_GET["page"];
	$p=0;
	if ($page!='') $p=$page;
	$where="1=1";
	if ($_REQUEST['cat']!='') $where="parent=".$_REQUEST['cat'];
?>
<form method="POST" action="<? echo $_SERVER[PHP_SELF]; ?>" name="frmList">
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
	$pageindex=taotrang("select count(*) from cat where $where","./?act=category&cat=".$_REQUEST['cat']."&page=",$MAXPAGE,$page);
?>

<table cellspacing="0" cellpadding="0" width="100%">
<tr>
<td class="smallfont" style="padding-top:10px;padding-bottom:10px">
<input type="button" value="+ Thêm mới" class="button" onclick="window.location='./?act=category_m&page=<? echo $_REQUEST['page']; ?>&cat=<? echo $_REQUEST['cat']; ?>'">
<input type="submit" value="Xóa Ch&#7885;n" name="ButDel" onclick="return confirm('B&#7841;n có ch&#7855;c ch&#7855;n mu&#7889;n xoá ?');" class="button">
<input type="submit" value="Hiển thị" name="active" class="button">
<input type="submit" value="Hủy hiển thị" name="un_active" class="button">
</td>
<td height="30" align="right" class="smallfont">
	</td>
</tr>
</table>

<table border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#C9C9C9" width="100%" id="AutoNumber1">
  <tr>
   <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <td align=center nowrap class="title"><input type="checkbox" name="chkall" onclick="chkallClick(this);"></td>
    <td nowrap class="title">&nbsp;</td>
    <td nowrap class="title">&nbsp;</td>
    <td align="center" nowrap class="title"><b>Thứ tự</b></td>
    <td align="center" nowrap class="title"><b>Tên danh m&#7909;c</b></td>
    <td align="center" nowrap class="title"><b>Hình</b></td>
    <td align="center" nowrap class="title"><b>Thu&#7897;c danh m&#7909;c</b></td>
    <td align="center" nowrap class="title"><b>Không hi&#7875;n th&#7883;</b></td>
  </tr>
  <?
	$ms=GetListCat_admin(17);
	$i=0;
	foreach ($ms as $m)
	{
		$i++;
		if ($i%2) $color="#d5d5d5"; else $color="#e5e5e5";
		?>
	<tr bgcolor="<? echo $color;?>" class="table_a">
    <td width="20" align="center" class="smallfont">
    <input type="checkbox" name="chk[]" value="<? echo $m[0]; ?>"></td>
    <td width="20" class="smallfont">
    <a href="./?act=category_m&cat=<? echo $_REQUEST['cat']; ?>&page=<? echo $_REQUEST['page']; ?>&id=<? echo $m[0]; ?>">
	S&#7917;a</a></td>
    <td width="20" class="smallfont">
    <a href="./?act=category&action=del&page=<? echo $_REQUEST['page']; ?>&id=<? echo $m[0]; ?>">
	Xoá</a></td>
    <td width="20" align="center" width="55" align="left" class="smallfont"><? echo $m[4]; ?></td>
    <td class="smallfont"><?php if($m[5]=='17'){?><font color="red"><b><? echo $m[1]; ?></b></font><?}else{?><? echo $m[1]; ?><?}?></td>
    <td class="smallfont"><? echo $m[2]; ?>&nbsp;</td>
    <td width="80" class="smallfont"><? echo $m[5]; ?>&nbsp;</td>
    <td width="80" class="smallfont"><? if($m[3]=='0') echo "Hiển thị"; else echo "Không hiển thị"; ?>&nbsp;</td>     
  </tr>
	<?}
?>
</table>
<table cellspacing="0" cellpadding="0" width="100%">
<tr>
<td class="smallfont" style="padding-top:10px;padding-bottom:10px">
<input type="button" value="+ Thêm mới" class="button" onclick="window.location='./?act=category_m&page=<? echo $_REQUEST['page']; ?>&cat=<? echo $_REQUEST['cat']; ?>'">
<input type="submit" value="Xóa Ch&#7885;n" name="ButDel" onclick="return confirm('B&#7841;n có ch&#7855;c ch&#7855;n mu&#7889;n xoá ?');" class="button">
<input type="submit" value="Hiển thị" name="active" class="button">
<input type="submit" value="Hủy hiển thị" name="un_active" class="button">
</td>
<td height="30" align="right" class="smallfont">
	</td>
</tr>
</table>
<input type="hidden" name="act" value="category">
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