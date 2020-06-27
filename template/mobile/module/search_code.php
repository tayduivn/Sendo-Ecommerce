<?
if (isset($_REQUEST['act']))
{
?><br>
<TABLE bgcolor="#FFFFFF" cellSpacing=0 cellPadding=0 width="100%" border=0 id="table35" style="line-height: 120%; text-align: justify;width: 1115px;">
 
</table>
<TABLE bgcolor="#FFFFFF" cellSpacing=0 cellPadding=10 width="100%" border=0 id="table35" style="line-height: 120%; text-align: justify;">
<?
	$where="1=1";
	$keywords=killInjection($_REQUEST['keywords']);
	if ($keywords!='')
	{
		$where.=" and (short like '%".$keywords."%' or content like '%".$keywords."%'";
		if ($_REQUEST['search_in_description']=='') 
			$where.=" or name like '%".$keywords."%' or code like '%".$keywords."%'"; 
		$where.=") ";
	}
	if ($_REQUEST['cat_id']!='')	$where.=" and cat_mem=".$_REQUEST['cat_id'];
	if ($_REQUEST['manufacturers_id']!='')	$where.=" and providers_id=".$_REQUEST['manufacturers_id'];
	if ($_REQUEST['tu']!='')	$where.=" and price_special>=".$_REQUEST['tu'];
	if ($_REQUEST['den']!='') $where.=" and price_special<=".$_REQUEST['den'];
	if ($_REQUEST['dfrom']!='')	$where.=" and products_date_added>=".$_REQUEST['dfrom'];
	if ($_REQUEST['dto']!='') $where.=" and products_date_added<=".$_REQUEST['dto'];
	
	$MAXPAGE=30;
	$p=0;
	if ($_REQUEST['p']!='') $p=$_REQUEST['p'];
	
	$result = mysql_query("select count(*) from products where $where and user='".$user."' ",$con);
	$total=mysql_fetch_row($result);

	$sql="select * from products where $where  and user='".$user."' limit ".$p*$MAXPAGE.",".$MAXPAGE;
	$result = mysql_query($sql,$con);
	while (($row=mysql_fetch_assoc($result)))
	{?>
	<?if($domain=='')
		{?>
		<tr style="
    border: 1px solid #e7e7e7;
">
		<td align="center" >
		<a id="xemnhanhsp" href="./<? echo str_replace($marTViet,$marKoDau,$row['name']); ?>-pro-<?php echo $row['id'];?>.html"> <IMG width="100" height="100" src="<?echo $row['image'];?>">
		</td></a>
		<td align="left"><a id="xemnhanhsp" href="./<? echo str_replace($marTViet,$marKoDau,$row['name']); ?>-pro-<?php echo $row['id'];?>.html"><b><font color="#000000"> &nbsp;<?echo $row['name'];?></font></b><br></a></td>
		<td  width="110"  ><font color="red"style="font-weight: bold;padding: 10px;"><?echo number_format($row['price_special']);?> đ</font></td>
		<td align="center"> 
		<a style="
    
    background-color: #F44336;
    cursor: pointer !important;
    color: #FFF;
  
    line-height: 16px;
    font-weight: bold;
    font-size: 100%;
    text-decoration: none;
    text-align: center;
    white-space: nowrap;
    font-size: 125%;
    padding: 12px 22px;
 
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
"   id="xemnhanhsp" href="./<? echo str_replace($marTViet,$marKoDau,$row['name']); ?>-pro-<?php echo $row['id'];?>.html"><i class="fa fa-check"></i>XEM NGAY</a>
		</td>
		</tr>
	<?}else{?>
        <tr>
		<td align="center"><IMG width="110" src="<?echo $row['image'];?>"></td><td align="left"><a href="./products/<?echo $row['id'];?>/<?echo $row['cat_mem'];?>/<?echo str_replace($marTViet,$marKoDau,$row['name']);?>.html"><b><font color="#000000"><?echo $row['name'];?></font></b><br></a></td><td align="center" width="110" ><font color="#000000"><?echo number_format($row['price']);?></font></td><td align="center"><a id="xemnhanhsp" href="./mua-hang/<?echo $row['id'];?>.html"><img src="template/base/images/muahang.jpg"></a></td>
		</tr>
	<?}?>
	<?}
	settype($total[0],int);
?>
</table>
<?
	$s="home=search&act=search&keywords=$keywords&search_in_description=".$_REQUEST['search_in_description']."&categories_id=".$_REQUEST['categories_id']."&manufacturers_id=".$_REQUEST['manufacturers_id']."&pfrom=".$_REQUEST['pfrom']."&pto=".$_REQUEST['pto']."&dfrom=".$_REQUEST['dfrom']."&dto=".$REQUEST['dto'];
?>
<div class="page">
<TABLE bgcolor="#FFFFFF" cellSpacing=10 cellPadding=0 width="100%" border=0 id="table35" style="line-height: 120%; text-align: justify">

<?if($domain=='')
	{?>
<?
$pages=count_page($total[0],$MAXPAGE);
echo '<tr><td colspan="2" align="center"><hr class="fieldkey" width="100%" SIZE=1></td></tr>';
echo '<tr><td class="smallfont" align="left">Tìm thấy <b>('.$total[0].')</b> s&#7843;n ph&#7849;m</td>';
echo '<td class="smallfont" align="right">';

if ($p>1) echo '<a title="&#272;&#7847;u tiên" href="./'.$user.'/trang/0.html">[&lt;]</a> ';
if ($p>0) echo '<a title="V&#7873; tr&#432;&#7899;c" href="./'.$user.'/trang/'.($p-1).'.html">[&lt;&lt;]</a> ';
$from=($p-7>0?$p-7:0);
$to=($p+7<$pages?$p+7:$pages);
for ($i=$from;$i<$to;$i++)
{
	//if ($i!=$p) echo '<a href="./?menu=search&'.$param.'&p='.$i.'">'.($i+1).' </a>';
	if ($i!=$p) echo '<a href="./'.$user.'/trang/'.$i.'.html">'.($i+1).'</a> ';
	else echo '<a class="active1">'.($i+1).'</a> ';
}
if ($p<$i-1) echo '<a title="Ti&#7871;p theo" href="./'.$user.'/trang/'.($p+1).'.html">[&gt;&gt;]</a> ';
if ($p<$pages-1) echo '<a title="Cu&#7889;i cùng" href="./'.$user.'/trang/'.($pages-1).'.html">[&gt;]</a> '; 
echo '</td></tr></table>';
?>


<?}else{?>

<?
$pages=count_page($total[0],$MAXPAGE);
echo '<tr><td colspan="2" align="center"><hr class="fieldkey" width="100%" SIZE=1></td></tr>';
echo '<tr><td class="smallfont" align="left">Tìm thấy <b>('.$total[0].')</b> s&#7843;n ph&#7849;m)</td>';
echo '<td class="smallfont" align="right">';

if ($p>1) echo '<a title="&#272;&#7847;u tiên" href="./trang/0.html">[&lt;]</a> ';
if ($p>0) echo '<a title="V&#7873; tr&#432;&#7899;c" href="./trang/'.($p-1).'.html">[&lt;&lt;]</a> ';
$from=($p-10>0?$p-10:0);
$to=($p+10<$pages?$p+10:$pages);
for ($i=$from;$i<$to;$i++)
{
	//if ($i!=$p) echo '<a href="./?menu=search&'.$param.'&p='.$i.'">'.($i+1).' </a>';
	if ($i!=$p) echo '<a href="./trang/'.$i.'.html">'.($i+1).'</a> ';
	else echo '<a class="active1">'.($i+1).'</a> ';
}
if ($p<$i-1) echo '<a title="Ti&#7871;p theo" href="./trang/'.($p+1).'.html">[&gt;&gt;]</a> ';
if ($p<$pages-1) echo '<a title="Cu&#7889;i cùng" href="./trang/'.($pages-1).'.html">[&gt;]</a> '; 
echo '</td></tr></table>';
?>
<?}?>
</div>



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

<input type="hidden" name="home" value="search">

</FORM>
	</TD></TR>
</TABLE>
<?
}
?>