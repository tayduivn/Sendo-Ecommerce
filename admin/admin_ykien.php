
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<table height="28" cellSpacing="0" cellPadding="0" width="100%" border="0">
      <tr align=center>
        <td class="title" width="100%">&Yacute; ki&#7871;n: 
	</td>
      </tr>
    </table>
<?
	switch ($_GET['action'])
	{
		case 'del' :
			$id = $_GET['id'];
			$sql="select * from ykien_khac where ykien_id=$id limit 1";
        	$pro=mysql_fetch_assoc(mysql_query($sql,$con));
			if ($pro)
			{
				$sql = "delete from ykien_khac where ykien_id='".$id."'";
				$result = mysql_query($sql,$con);
				if ($result) 
				{
					//if (file_exists("../".$pro['link_websites_img'])) unlink("../".$pro['link_websites_img']);
					//if (file_exists("../".$pro['link_websites_imglarge'])) unlink("../".$pro['link_websites_imglarge']);
					echo "<p align=center class='err'>&#272;ã xóa thành công</p>";
				}
					else echo "<p align=center class='err'>Kh&ocirc;ng th&#7875; x&oacute;a d&#7919; li&#7879;u </p>";
			}
			break;
	}
?>

<?
	if (isset($_POST['ButDel'])) {
		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			$sql="select * from ykien_khac where ykien_id=$id limit 1";
        	$pro=mysql_fetch_assoc(mysql_query($sql,$con));
			if ($pro)
			{
				@$result = mysql_query("delete from ykien_khac where ykien_id='".$id."'",$con);
				if ($result) {
					$cnt++;
					//if (file_exists("../".$pro['link_websites_img'])) unlink("../".$pro['link_websites_img']);
					//if (file_exists("../".$pro['link_websites_imglarge'])) unlink("../".$pro['link_websites_imglarge']);
				}
			}
		}
		echo "<p align=center class='err'>&#272;&atilde; x&oacute;a ".$cnt." ph&#7847;n t&#7917;</p>";
	}
?>

<?
	$page = $_GET["page"];
	$MAXPAGE=10;
	$p=0;
	if ($page!='') $p=$page;
		$where="1=1";
	//if ($_REQUEST['cat']!='') $where="link_websites_categoriesid=".$_REQUEST['cat'];

?>
<form method="POST" name="frmList" action="index.php">
<input type="hidden" name="act" value="link_website">
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
	$pageindex=taotrang("select count(*) from ykien_khac where $where","./?act=ykien"."&page=",$MAXPAGE,$page);
?>

<table cellspacing="0" cellpadding="0" width="100%">
<? if ($_REQUEST['code']==1) echo '<tr><td align="center" class="err">&#272;&atilde; c&#7853;p nh&#7853;t th&agrave;nh c&ocirc;ng </td></tr>'; ?>
<tr>
<td class="smallfont">Trang : <? echo $pageindex; ?></td>
<td height="30" align="right" class="smallfont">
	</td>

</tr>
</table>

<table border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#C9C9C9" width="100%" id="AutoNumber1">
  <tr>
    <td align=center nowrap class="title" width="48"><input type="checkbox" name="chkall" onclick="chkallClick(this);"></td>
    <td nowrap class="title" width="47">&nbsp;</td>
    <td align="center" nowrap class="title" width="63"><b>M&atilde;</b></td>
    <td align="center" nowrap class="title"><b>N&#7897;i dung</b></td>
    <td align="center" nowrap class="title" width="120"><b>Ng&agrave;y</b></td>
  </tr>
  
  <?php
           	$sql="select * from ykien_khac where $where order by ykien_date desc limit ".($p*$MAXPAGE).",".$MAXPAGE;
        	$result=mysql_query($sql,$con);
        	$i=0;
           	while(($row=mysql_fetch_array($result)))
			{
			$i++;
			if ($i%2) $color="#d5d5d5"; else $color="#e5e5e5";
  ?>
  
  <tr>
    <td align="center" bgcolor="<? echo $color; ?>" class="smallfont" width="48">
    <input type="checkbox" name="chk[]" value="<? echo $row['ykien_id']; ?>"></td>
    <td align="center" bgcolor="<? echo $color; ?>" class="smallfont" width="47">
    <a onclick="return confirm('B&#7841;n c&oacute; ch&#7855;c ch&#7855;n mu&#7889;n xo&aacute;  ?');" href="./?act=ykien&page=<? echo $_REQUEST['page']; ?>&action=del&id=<? echo $row['ykien_id']; ?>">
	X&oacute;a</a></td>
    <td bgcolor="<? echo $color; ?>" align="left" align="left" class="smallfont" width="63"><? echo $row['ykien_id']; ?>&nbsp;</td>
    <td bgcolor="<? echo $color; ?>" class="smallfont"><? echo $row['ykien_name']; ?>&nbsp;</td>
    <td bgcolor="<? echo $color; ?>" class="smallfont" width="120"><? echo $row['ykien_date']; ?>&nbsp;</td>
  </tr>
  <?
              	}
  ?>
</table>
<input type="submit" value="X&oacute;a Ch&#7885;n" name="ButDel" onclick="return confirm('B&#7841;n c&oacute; ch&#7855;c ch&#7855;n mu&#7889;n xo&aacute; ?');" class="button">
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