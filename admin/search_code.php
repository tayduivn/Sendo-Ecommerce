<!-- begin tim kiem-->
<form name="form_select" method="GET" action="./">
<table id="timkiem_home" border="0" id="table21" cellspacing="0" cellpadding="0">
					<tr>
						<td style="padding-left:4px;">
						<select name="cat_id">
						<option value="" selected>Chọn danh mục</option>
						<? $timkiem=mysql_query("SELECT * FROM cat order by thutu desc");
						while($row_timkiem=mysql_fetch_array($timkiem))
						{?>
						<option value="<? echo $row_timkiem['id'];?>"><? echo $row_timkiem['name'];?></option>
						<?}?>
						</select>
  </td>
  <td style="padding-left:4px;">
						<select name="level">
						<option value="">-- Chọn tất cả --</option>
						<option value="0">Shop Vip</option>
						<option value="3">Shop miễn phí</option>
						<option value="1">Shop chờ kích hoạt</option>
						<option value="2">Thành viên mua bán</option>
						</select>
  </td>
<td style="padding-left:0px">
<input name="keywords" type="text" id="input_timkiem" value="">
</td>
<td>
<input type="hidden" name="act" value="search">
<input type="hidden" name="index" value="search">
<input id="button_search" type="submit" name="search" value="Tìm">
</td>
</tr>
</table>
</form>
<!-- end tim kiem -->
<?
if (isset($_REQUEST['act']))
{
?><br>
<TABLE cellSpacing=0 cellPadding=0 width="100%" id="table35" style="line-height: 100%; font-size:11px; text-align: justify; border:1px solid #C0C0C0; border-bottom:0px">
<tr><td>
<table>
<tr bgcolor="#ADB3AE" height="40">
<td align="left" class="title" width="115" style="padding-left:5px"><font color="#FFFFFF"><b>Logo</b></font></td>
<td align="left" class="title" width="210"><font color="#FFFFFF"><b>Tên công ty/USER</b></font></td>
<td align="left" class="title" width="210">
	<font color="#FFFFFF"><b>&nbsp;&nbsp; Địa chỉ</b></font></td>
	<td align="left" width="142" class="title">
	<font color="#FFFFFF"><b>Liên hệ</b></font></td>
	<td align="left" class="title" width="127">
	<font color="#FFFFFF"><b>Cấp độ</b></font></td>
	<td align="left" class="title" width="55">
	<font color="#FFFFFF"><b>TT Top</b></font></td>
	<td align="left" class="title" width="55">
	<font color="#FFFFFF"><b>TT CAT</b></font></td>
	<td align="left" class="title" width="95">
	Chức năng
	</td>
	</tr>
</table>
	</td>
	</tr>
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
	if ($_REQUEST['manufacturers_id']!='')	$where.=" and providers_id=".$_REQUEST['manufacturers_id'];
	if ($_REQUEST['pfrom']!='')	$where.=" and products_price>=".$_REQUEST['pfrom'];
	if ($_REQUEST['pto']!='') $where.=" and products_price<=".$_REQUEST['pto'];
	if ($_REQUEST['dfrom']!='')	$where.=" and products_date_added>=".$_REQUEST['dfrom'];
	if ($_REQUEST['dto']!='') $where.=" and products_date_added<=".$_REQUEST['dto'];
	
	$MAXPAGE=11;
	$p=0;
	if ($_REQUEST['p']!='') $p=$_REQUEST['p'];
	
	$result = mysql_query("select count(*) from user_shop where $where",$con);
	$total=mysql_fetch_row($result);

	$sql="select * from user_shop where $where limit ".$p*$MAXPAGE.",".$MAXPAGE;
	$result = mysql_query($sql,$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		?>
		<tr><td colspan="6" style="padding-top:5px; padding-bottom:0px">
		<TABLE cellSpacing=0 cellPadding=0 width="100%" id="table35" style="line-height: 120%;font-size:11px; text-align: justify; border-bottom:1px solid #C0C0C0; padding:5px;">
		<tr>
		<td align="left" valign="top" width="120" style="border-right:1px solid #C0C0C0">
		<a href="../<? echo $row['user'];?>" target="_blank"><IMG width="110" src="../<? echo $row['logo'];?>"></a></td>
		<td align="left" valign="top" width="210" style="border-right:1px solid #C0C0C0;padding:5px"><a href="../<? echo $row['user'];?>" target="_blank"><font color="#3C3E3C"><? echo $row['company'];?></font><br><font color="red"><b><? echo $row['user'];?></b></font></a></td>
		<td align="left" valign="top" width="210" style="border-right:1px solid #C0C0C0;padding:5px"><? echo $row['address'];?></td>
		<td align="left" valign="top" width="140" style="border-right:1px solid #C0C0C0;padding:5px"><? echo $row['phone'];?></td>
		<td align="center" width="120" style="border-right:1px solid #C0C0C0;padding:5px">
		<? if($row['level_shop']=='0'){?>
		<img src="../upload/uytin.jpg">
		<?} else{?>
		Miễn phí
		<?}?>
			</td>
			<td align="left" valign="top" width="50" style="border-right:1px solid #C0C0C0;padding:5px"><? echo $row['thutu'];?></td>
			<td align="left" valign="top" width="50" style="border-right:1px solid #C0C0C0;padding:5px"><? echo $row['thutu_cat'];?></td>
			<td align="center" width="100">
    <a href="./?act=users_add&cat=<? echo $_REQUEST['cat']; ?>&page=<? echo $_REQUEST['page']; ?>&id=<? echo $row['id']; ?>">
	S&#7917;a</a> | 
    <a href="./?act=users&action=del&page=<? echo $_REQUEST['page']; ?>&id=<? echo $row['id']; ?>">
	Xoá</a>
			</td>
		</tr>
		</table>
		</td></tr>
	<?}
	settype($total[0],int);
?>
</table>
<?
	$s="index=search&act=search&keywords=$keywords&search_in_description=".$_REQUEST['search_in_description']."&cat_id=".$_REQUEST['cat_id']."&manufacturers_id=".$_REQUEST['manufacturers_id']."&pfrom=".$_REQUEST['pfrom']."&pto=".$_REQUEST['pto']."&dfrom=".$_REQUEST['dfrom']."&dto=".$REQUEST['dto'];
?>

<form id="search1" name="search1" style="word-spacing: 0; margin: 0" method="GET" action="index.php?<? echo $s; ?>">
<input type="hidden" name="act" value="<? echo $_REQUEST['act']; ?>">
<input type="hidden" name="cat_id" value="<? echo $_REQUEST['cat_id']; ?>">
<input type="hidden" name="act" value="<? echo $_REQUEST['act']; ?>">
<input type="hidden" name="keywords" value="<? echo $_REQUEST['keywords']; ?>">
<input type="hidden" name="search_in_description" value="<? echo $_REQUEST['search_in_description']; ?>">
<input type="hidden" name="manufacturers_id" value="<? echo $_REQUEST['manufacturers_id']; ?>">
<input type="hidden" name="pfrom" value="<? echo $_REQUEST['pfrom']; ?>">
<input type="hidden" name="pto" value="<? echo $_REQUEST['pto']; ?>">
<input type="hidden" name="dfrom" value="<? echo $_REQUEST['dfrom']; ?>">
<input type="hidden" name="dto" value="<? echo $_REQUEST['dto']; ?>">
<input type="hidden" id="trang" name="p" value="1">
<TABLE cellSpacing=10 cellPadding=0 width="100%" border=0 id="table35" style="line-height: 100%; text-align: justify">
<?
$pages=count_page($total[0],$MAXPAGE);
echo '<tr><td colspan="2" align="center"><hr class="fieldkey" width="100%" SIZE=1></td></tr>';
echo '<tr><td class="smallfont" align="left">Trình bày <b>'.($p+1).'</b> &#273;&#7871;n <b>'.(int)($total[0]/$MAXPAGE+1).'</b> (trong <b>'.$total[0].'</b> công ty)</td>';
echo '<td class="smallfont" align="right">K&#7871;t qu&#7843;: ';
//$param="act=search&keywords=$keywords&search_in_description=".$_REQUEST['search_in_description']."&categories_id=".$_REQUEST['categories_id']."&manufacturers_id=".$_REQUEST['manufacturers_id']."&pfrom=".$_REQUEST['pfrom']."&pto=".$_REQUEST['pto']."&dfrom=".$_REQUEST['dfrom']."&dto=".$REQUEST['dto'];
if ($p>1) echo '<a class="buton_timkiem" title="&#272;&#7847;u tiên" href="./?index=search&act&p=0">[&lt;]</a> ';
if ($p>0) echo '<a class="buton_timkiem" title="V&#7873; tr&#432;&#7899;c" href="./?index=search&act&p='.($p-1).'">[&lt;&lt;]</a> ';
$from=($p-10>0?$p-10:0);
$to=($p+10<$pages?$p+10:$pages);
for ($i=$from;$i<$to;$i++)
{
	//if ($i!=$p) echo '<a href="./?index=search&'.$param.'&p='.$i.'">'.($i+1).' </a>';
	if ($i!=$p) echo '<a class="buton_timkiem" href="./?act=search&index&p='.$i.'">'.($i+1).' </a>';
	else echo '<b>'.($i+1).'</b> ';
}
if ($p<$i-1) echo '<a class="buton_timkiem" title="Ti&#7871;p theo" href="./?act=search&index&p='.($p+1).'">[&gt;&gt;]</a> ';
if ($p<$pages-1) echo '<a class="buton_timkiem" title="Cu&#7889;i cùng" href="./?act=search&index&p='.($pages-1).'">[&gt;]</a> '; 
echo '</td></tr></table>';
?>
</form>

<script>
	function changepage(num)
	{	
		document.all.trang.value=num;
		search1.submit();
	}
</script>

<?
}
else
{
?>            
<TABLE border="0" cellpadding="10" cellspacing="1" width="100%" id="table1">
<TR><TD class="DialogBox">
<FORM name="searchform" action="./" method="GET">
<table cellSpacing="0" cellPadding="2" width="100%" border="0" id="table2">
	<tr>
		<td width="35%" align="right"><font face="Tahoma"><span style="font-size: 8.5pt">T&#7915; khóa:</span></font></td>
		<td class="fieldValue" width="55%">
		<span style="font-size: 8.5pt"><font size="1" face="Tahoma">
		<input name="keywords" size="255" style="width: 200; height:22"></font></span></td>
	</tr>
	<tr>
		<td width="35%" align="right">&nbsp;</td>
		<td class="fieldValue" width="55%">
		<span style="font-size: 8.5pt"><font face="Tahoma">
		<input type="checkbox" value="1" name="search_in_description"> Ch&#7881; tìm 
		trong ph&#7847;n mô t&#7843; s&#7843;n ph&#7849;m</font></span></td>
	</tr>
	<tr>
		<td width="35%" align="right">&nbsp;</td>
		<td class="fieldValue" width="55%">
                                    <font face="Verdana" size="1">
                					<span style="font-size: 8.5pt">
									<font face="Tahoma">
                <input type=submit value="Tìm ki&#7871;m" class=buttonorange onmouseover="this.className='buttonblue'" onmouseout="this.className='buttonorange'"></font></span></font></td>
	</tr>
	<tr>
		<td width="35%" align="right">&nbsp;</td>
		<td class="fieldValue" width="55%">&nbsp;</td>
	</tr>
	<tr>
		<td width="35%" align="right"><font face="Tahoma"><span style="font-size: 8.5pt">Trong danh m&#7909;c:</span></font></td>
		<td class="fieldValue" width="55%">
		<span style="font-size: 8.5pt"><font face="Tahoma">
		<select name="categories_id" size="1" style="width: 200">
		<option selected value="">[Toàn b&#7897; danh m&#7909;c]</option>
<? 
	$cats=GetListCategory(17);
	foreach ($cats as $cat)
	{
		echo '<option value="'.$cat[0].'">'.$cat[1].'</option>';
	}
?>		
		</select></font></span></td>
	</tr>
	<tr>
		<td width="35%" align="right"><font face="Tahoma"><span style="font-size: 8.5pt">Giá (&gt;=):</span></font></td>
		<td class="fieldValue" width="55%"><span style="font-size: 8.5pt">
		<font face="Tahoma"><input name="pfrom"></font></span></td>
	</tr>
	<tr>
		<td width="35%" align="right"><font face="Tahoma"><span style="font-size: 8.5pt">Giá (&lt;=):</span></font></td>
		<td class="fieldValue" width="55%"><span style="font-size: 8.5pt">
		<font face="Tahoma"><input name="pto"></font></span></td>
	</tr>
	<tr>
		<td width="35%" align="right"><font face="Tahoma"><span style="font-size: 8.5pt">Ngày (&gt;=):</span></font></td>
		<td class="fieldValue" width="55%">
		<span style="font-size: 8.5pt"><font face="Tahoma">
		<input name="dfrom"> (tháng/ngày/n&#259;m)</font></span></td>
	</tr>
	<tr>
		<td width="35%" align="right"><font face="Tahoma"><span style="font-size: 8.5pt">Ngày (&lt;=):</span></font></td>
		<td class="fieldValue" width="55%">
		<span style="font-size: 8.5pt"><font face="Tahoma">
		<input name="dto"> (tháng/ngày/n&#259;m)</font></span></td>
	</tr>
</table>

<input type="hidden" name="act" value="search">

<input type="hidden" name="index" value="search">

</FORM>
	</TD></TR>
</TABLE>
<?
}
?>