<table height="28" cellSpacing="0" cellPadding="0" width="100%" border="0">
      <tr align=center>
        <td class="title" width="100%" height="17">
        Hang SX: <b> <a href="./?act=hangsx_m&page=<? echo $_REQUEST['page']; ?>&cat=<? echo $_REQUEST['cat']; ?>"><font color="#FFFFFF">Nh&#7853;p 
		M&#7899;i</font></a><font color="#FFFFFF"> </font></b></td>
      </tr>
    </table>
<?

$MAXPAGE=20;

	switch ($_GET['action'])
	{
		case 'del' :
			$id = $_GET['id'];
				$sql = "delete from hangsx where id='".$id."'";
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
			@$result = mysql_query("delete from hangsx where id='".$id."'",$con);
			if ($result) $cnt++;
		}
		echo "<p align=center class='err'>&#272;ã xóa ".$cnt." ph&#7847;n t&#7917;</p>";
	}
?>
<?
	$page = $_GET["page"];
	$p=0;
	if ($page!='') $p=$page;
	$where="1=1";
	if ($_REQUEST['cat']!='') $where="cat=".$_REQUEST['cat'];
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
	$pageindex=taotrang("select count(*) from hangsx where $where","./?act=hangsx&cat=".$_REQUEST['cat']."&page=",$MAXPAGE,$page);
?>
<table cellspacing="0" cellpadding="0" width="100%">
<? if ($_REQUEST['code']==1) echo '<tr><td colspan=2 align="center" class="err">&#272;ã c&#7853;p nh&#7853;t thành công</td></tr>'; ?>
<tr>
<td class="smallfont">Trang : <? echo $pageindex; ?></td>
</tr>
</table>
<table cellspacing="0" cellpadding="0" width="100%">
<tr>
<td class="smallfont" style="padding-top:10px;padding-bottom:10px">
<input type="button" value="+ Thêm mới" class="button" onclick="window.location='./?act=hangsx_m&page=<? echo $_REQUEST['page']; ?>&cat=<? echo $_REQUEST['cat']; ?>'">
<input type="submit" value="Xóa Ch&#7885;n" name="ButDel" onclick="return confirm('B&#7841;n có ch&#7855;c ch&#7855;n mu&#7889;n xoá ?');" class="button">
</td>
<td height="30" align="right" class="smallfont">
	</td>
</tr>
</table>

<table border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#C9C9C9" width="100%" id="AutoNumber1">
  <tr>
    <td align=center nowrap class="title"><input type="checkbox" name="chkall" onclick="chkallClick(this);"></td>
    <td nowrap class="title">&nbsp;</td>
    <td nowrap class="title">&nbsp;</td>
    <td align="center" nowrap class="title"><b>Logo</b></td>
    <td align="center" nowrap class="title"><b>Name</b></td>
	<td align="center" nowrap class="title"><b>Danh muc</b></td>
    <td align="center" nowrap class="title"><b>Order</b></td>   
  </tr>
  
  <?
            	$sql="select * from hangsx where $where order by id limit ".($p*$MAXPAGE).",".$MAXPAGE;
            	$result=mysql_query($sql,$con);
            	$i=0;
            	while(($row=mysql_fetch_array($result)))
				{
					$i++;
					$parent=explode(",",$row['cat']);
					$sql_cat=mysql_query("SELECT * FROM cat where id='".$parent[$i]."'");
					$row_cat=mysql_fetch_assoc($sql_cat);
					if ($i%2) $color="#d5d5d5"; else $color="#e5e5e5";
  ?>
  
  <tr>
    <td width="20" align="center" bgcolor="<? echo $color; ?>" class="smallfont">
    <input type="checkbox" name="chk[]" value="<? echo $row['id']; ?>"></td>
    <td width="20" bgcolor="<? echo $color; ?>" class="smallfont">
    <a href="./?act=hangsx_m&cat=<? echo $_REQUEST['cat']; ?>&page=<? echo $_REQUEST['page']; ?>&id=<? echo $row['id']; ?>">
	S&#7917;a</a></td>
    <td width="20" bgcolor="<? echo $color; ?>" class="smallfont">
    <a href="./?act=hangsx&action=del&page=<? echo $_REQUEST['page']; ?>&id=<? echo $row['id']; ?>">
	Xoá</a></td>
    <td width="20" bgcolor="<? echo $color; ?>" align="left" width="55" align="left" class="smallfont"><img src="../<? echo $row['logo']; ?>" width="100">&nbsp;</td>
    <td bgcolor="<? echo $color; ?>" class="smallfont"><? echo $row['name']; ?>&nbsp;</td>
	<td bgcolor="<? echo $color; ?>" class="smallfont">
	<?php foreach($parent as $parent)
	{
	  $sql_cat=mysql_query("SELECT * FROM cat where id='".$parent."'");
	  $row_cat=mysql_fetch_assoc($sql_cat);
	  ?>
	<? echo $row_cat['name']; ?>,
	<?}?>
	</td>
    <td width="80" bgcolor="<? echo $color; ?>" class="smallfont"><? echo $row['thutu']; ?>&nbsp;</td>     
  </tr>
  <?
              	}
  ?>
</table>
<table cellspacing="0" cellpadding="0" width="100%">
<tr>
<td class="smallfont" style="padding-top:10px;padding-bottom:10px">
<input type="button" value="+ Thêm mới" class="button" onclick="window.location='./?act=hangsx_m&page=<? echo $_REQUEST['page']; ?>&cat=<? echo $_REQUEST['cat']; ?>'">
<input type="submit" value="Xóa Ch&#7885;n" name="ButDel" onclick="return confirm('B&#7841;n có ch&#7855;c ch&#7855;n mu&#7889;n xoá ?');" class="button">
</td>
<td height="30" align="right" class="smallfont">
	</td>
</tr>
</table>
<input type="hidden" name="act" value="price">
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