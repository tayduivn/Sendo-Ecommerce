<table height="28" cellSpacing="0" cellPadding="0" width="100%" border="0">
      <tr align=center>
        <td class="title" width="100%" height="17">
        Danh m&#7909;c hình : <b> <a href="./?act=album_category_m"><font color="#FFFFFF">Nh&#7853;p 
		M&#7899;i</font></a><font color="#FFFFFF"> |</font></b></td>
      </tr>
    </table>
<?
	switch ($_GET['action'])
	{
		case 'del' :
			$id = $_GET['id'];
			$result = mysql_query("select album_images_categoriesid from album_images where album_images_categoriesid='".$id."'",$con);
			if (mysql_num_rows($result)<=0) {
				$sql = "delete from album_categories where album_categories_id='".$id."'";
				@$result = mysql_query($sql,$con);
				if ($result) echo "<p align=center class='err'>&#272;ã xóa thành công</p>";
				else echo "<p align=center class='err'>Không th&#7875; xóa d&#7919; li&#7879;u</font></p>";
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
			@$result = mysql_query("delete from album_categories where album_categories_id='".$id."'",$con);
			if ($result) $cnt++;
		}
		echo "<p align=center class='err'>&#272;ã xóa ".$cnt." ph&#7847;n t&#7917;</p>";
	}
?>
<?
	$page = $_GET["page"];
	$MAXPAGE=10;
	$p=0;
	if ($page!='') $p=$page;
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
	$pageindex=taotrang("select count(*) from album_categories","./?act=album_category"."&page=",$MAXPAGE,$page);
?>

<? if ($_REQUEST['code']==1) echo "<p align=center class='err'>&#272;ã c&#7853;p nh&#7853;t thành công</p>"; ?>

<table cellspacing="0" cellpadding="0">
<tr>
<td class="smallfont">Trang : <? echo $pageindex; ?></td>
</tr>
</table>

<table border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#C9C9C9" width="100%" id="AutoNumber1">
  <tr>
    <td align=center nowrap class="title"><input type="checkbox" name="chkall" onclick="chkallClick(this);"></td>
    <td nowrap class="title">&nbsp;</td>
    <td nowrap class="title">&nbsp;</td>
    <td align="center" nowrap class="title"><b>Mã</b></td>
    <td align="center" nowrap class="title"><b>Tên</b></td>
    <td align="center" nowrap class="title"><b>Thu&#7897;c danh m&#7909;c</b></td>
    <td align="center" nowrap class="title"><b>Không hi&#7875;n th&#7883;</b></td>
    <td align="center" nowrap class="title"><b>Ngày</b></td>
  </tr>
  
  <?
            	$sql="select *,DATE_FORMAT(date_added,'%d/%m/%Y %h:%m') as dateformat from album_categories order by album_categories_id limit ".($p*$MAXPAGE).",".$MAXPAGE;
            	$result=mysql_query($sql,$con);
            	$i=0;
            	while(($row=mysql_fetch_array($result)))
				{
					$i++;
					if ($i%2) $color="#d5d5d5"; else $color="#e5e5e5";
					$parentname="";
					if ($row['album_categories_parentid']>0)
					{
						$sqlcat="select * from album_categories where album_categories_id='".$row['album_categories_parentid']."' limit 1";
						$rowsub=mysql_fetch_array(mysql_query($sql,$con));
						$parentname=$rowsub['album_categories_name'];
					}
					else
						$parentname="Th&#432; m&#7909;c g&#7889;c";
  ?>
  
  <tr>
    <td width="20" align="center" bgcolor="<? echo $color; ?>" class="smallfont">
    <input type="checkbox" name="chk[]" value="<? echo $row['album_categories_id']; ?>"></td>
    <td width="20" bgcolor="<? echo $color; ?>" class="smallfont">
    <a href="./?act=album_category_m&page=<? echo $_REQUEST['page']; ?>&id=<? echo $row['album_categories_id']; ?>">Edit</a></td>
    <td width="20" bgcolor="<? echo $color; ?>" class="smallfont">
    <a onclick="return confirm('B&#7841;n có ch&#7855;c ch&#7855;n mu&#7889;n xoá ?');" href="./?act=album_category&page=<? echo $_REQUEST['page']; ?>&action=del&id=<? echo $row['album_categories_id']; ?>">Delete</a></td>
    <td width="20" bgcolor="<? echo $color; ?>" align="left" width="55" align="left" class="smallfont"><? echo $row['album_categories_id']; ?>&nbsp;</td>
    <td bgcolor="<? echo $color; ?>" class="smallfont"><? echo $row['album_categories_name']; ?>&nbsp;</td>
    <td bgcolor="<? echo $color; ?>" class="smallfont"><? echo $parentname; ?>&nbsp;</td>
    <td width="80" bgcolor="<? echo $color; ?>" class="smallfont"><? echo $row['album_categories_status']; ?>&nbsp;</td>
    <td width="100" bgcolor="<? echo $color; ?>" class="smallfont"><? echo $row['dateformat']; ?>&nbsp;</td>
  </tr>
  <?
              	}
  ?>
</table>
<input type="submit" value="Xóa Ch&#7885;n" name="ButDel" onclick="return confirm('B&#7841;n có ch&#7855;c ch&#7855;n mu&#7889;n xoá ?');" class="button" style="padding: 0">
<input type="hidden" name="act" value="album_category">
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