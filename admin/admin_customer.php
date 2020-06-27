<table height="28" cellSpacing="0" cellPadding="0" width="100%" border="0">
      <tr align=center>
        <td class="title" width="100%">Customers : &nbsp;&nbsp
	</td>
      </tr>
    </table>
<?
	switch ($_GET['action'])
	{
		case 'del' :
			$id = $_GET['id'];
			$sql = "delete from customers where customers_id='".$id."'";
			$result = mysql_query($sql,$con);
			echo mysql_error();
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
			@$result = mysql_query("delete from customers where customers_id='".$id."'",$con);
			if ($result) $cnt++;
		}
		echo "<p align=center class='err'>&#272;ã xóa ".$cnt." ph&#7847;n t&#7917;</p>";
	}
?>

<form action="index.php" method="POST" name="frmList">
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
		if ($i+1<>$itemcurrent) $ret .= "<a href=\"".$link.($i+1)."\" class=\"lslink\">".($i+1)."</a> ";
		else $ret .= ($i+1)." ";
	}
	return $ret;
}
	$pageindex=taotrang("select count(*) from customers","./?act=customer"."&page=",20,$page);
?>

<table border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#C9C9C9" width="100%" id="AutoNumber1">
  <tr>
  <td class="smallfont" colspan="11">Trang : <? echo $pageindex; ?></td>
  </tr>
</table>
  
<table border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#C9C9C9" width="100%" id="AutoNumber1">
  <tr>
    <td width="1%" align=center nowrap class="title"><input type="checkbox" name="chkall" onclick="chkallClick(this);"></td>
    <td width="1%" colspan="2" nowrap class="title">&nbsp;</td>
    <td width="4%" align="center" nowrap class="title"><b>ID</b></td>
    <td width="10%" align="center" nowrap class="title"><b>Name</b></td>
    <td width="20%" align="center" nowrap class="title"><b>Sex</b></td>
    <td width="10%" align="center" nowrap class="title"><b>Company</b></td>
    <td width="10%" align="center" nowrap class="title"><b>Address</b></td>
    <td width="20%" align="center" nowrap class="title"><b>City</b></td>
    <td width="20%" align="center" nowrap class="title"><b>State</b></td>
    <td width="20%" align="center" nowrap class="title"><b>Country</b></td>
    <td width="20%" align="center" nowrap class="title"><b>Phone</b></td>
    <td width="20%" align="center" nowrap class="title"><b>Email</b></td>
    <td width="20%" align="center" nowrap class="title"><b>Fax</b></td>    
    <td width="20%" align="center" nowrap class="title"><b>Website</b></td>    
    <td width="20%" align="center" nowrap class="title"><b>Username</b></td>        
    <td width="20%" align="center" nowrap class="title"><b>Password</b></td>    
    <td width="20%" align="center" nowrap class="title"><b>Date</b></td>    
  </tr>
  
  <?php
			$page = $_GET["page"];
        	$sql="select * from customers order by customers_date_added desc";
        	$result=mysql_query($sql,$con);
        	$i=0;
        	@mysql_data_seek($result,($page-1)*20);
           	while(($row=mysql_fetch_array($result)) && $i<20)
			{
			$i++;
			if ($i%2) $color="#d5d5d5"; else $color="#e5e5e5";
  ?>
  
  <tr>
    <td bgcolor="<? echo $color; ?>" width="1%" class="smallfont">
    <p align="center"><input type="checkbox" name="chk[]" value="<? echo $row['customers_id']; ?>"></td>
    <td bgcolor="<? echo $color; ?>" width="1%" class="smallfont">
    <p align="center">
    <!--<a href="./?act=product_m&id=<? echo $row['products_id']; ?>&page=<? echo $page?>">Edit</a></td>-->
    <td bgcolor="<? echo $color; ?>" width="4%" class="smallfont">
    <p align="center">
    <a onclick="return confirm('B&#7841;n có ch&#7855;c ch&#7855;n mu&#7889;n xoá ?');" href="./?act=customer&action=del&id=<? echo $row['customers_id']; ?>">Delete</a></td>
    <td bgcolor="<? echo $color; ?>" width="10%" align="left" width="55" align="left" class="smallfont"><? echo $row['customers_id']; ?>&nbsp;</td>
    <td bgcolor="<? echo $color; ?>" width="20%" class="smallfont"><? echo $row['customers_name']; ?>&nbsp;</td>
    <td bgcolor="<? echo $color; ?>" width="10%" class="smallfont"><? echo $row['customers_sex']; ?>&nbsp;</td>
    <td bgcolor="<? echo $color; ?>" width="10%" class="smallfont"><? echo $row['customers_company']; ?>&nbsp;</td>
    <td bgcolor="<? echo $color; ?>" width="10%" class="smallfont"><? echo $row['customers_address']; ?>&nbsp;</td>
    <td bgcolor="<? echo $color; ?>" width="20%" class="smallfont"><? echo $row['customers_city']; ?>&nbsp;</td>
    <td bgcolor="<? echo $color; ?>" width="20%" class="smallfont"><? echo $row['customers_state']; ?>&nbsp;</td>
    <td bgcolor="<? echo $color; ?>" width="20%" class="smallfont"><? echo $row['customers_country']; ?>&nbsp;</td>
    <td bgcolor="<? echo $color; ?>" width="20%" class="smallfont"><? echo $row['customers_phone']; ?>&nbsp;</td>
    <td bgcolor="<? echo $color; ?>" width="20%" class="smallfont"><? echo $row['customers_email']; ?>&nbsp;</td>
    <td bgcolor="<? echo $color; ?>" width="20%" class="smallfont"><? echo $row['customers_fax']; ?>&nbsp;</td>
    <td bgcolor="<? echo $color; ?>" width="20%" class="smallfont"><? echo $row['customers_website']; ?>&nbsp;</td>
    <td bgcolor="<? echo $color; ?>" width="20%" class="smallfont"><? echo $row['customers_username']; ?>&nbsp;</td>
    <td bgcolor="<? echo $color; ?>" width="20%" class="smallfont"><? echo $row['customers_password']; ?>&nbsp;</td>
    <td bgcolor="<? echo $color; ?>" width="20%" class="smallfont"><? echo $row['customers_date_added']; ?>&nbsp;</td>    
  </tr>
  <?
              	}
  ?>
</table>
<input type="submit" value="Xóa Ch&#7885;n" name="ButDel" onclick="return confirm('B&#7841;n có ch&#7855;c ch&#7855;n mu&#7889;n xoá ?');" class="button">
<input type="hidden" name="act" value="customer">
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