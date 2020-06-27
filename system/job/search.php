<div style="color: red;font-size: 14px;">
Kết quả tìm kiếm tuyển dụng
</div>
<div style="width: 100%;height:35px;;background-image:url('images/title_adv.png');font-size:14px;font-weight:bold;color:#FFFFFF">
<div style="float:left;width:36px;height:35px;">
</div>
<div style="float:left;width:410px;padding-top:8px">
Nội dung tuyển dụng
</div>
<div style="float:left;width:125px;padding-top:8px">
Danh mục
</div>
<div style="float:left;width:70px;padding-top:8px">
Tỉnh
</div>
<div style="float:left;width:80px;padding-top:8px">
Ngày đăng
</div>
</div>
<?
$uri=$_SERVER['REQUEST_URI'];
$url = explode("&", $uri);
	$where="1=1";
	$keywords=killInjection(trim($_REQUEST['keywords']));
	if ($keywords!='')
	{
		$where.=" and (name like '%".$keywords."%' or content like '%".$keywords."%'";
		if ($_REQUEST['search_in_description']=='') 
			$where.=" or content like '%".$keywords."%' "; 
		$where.=") ";
	}
	if ($_REQUEST['id']!='')	$where.=" and id=".$_REQUEST['id'];
	if ($_REQUEST['city']!='')	$where.=" and city=".$_REQUEST['city'];
	if ($_REQUEST['cat']!='')	$where.=" and adv_cat=".$_REQUEST['cat'];
	if ($_REQUEST['nhucau']!='') $where.=" and nhucau=".$_REQUEST['nhucau'];
	
	$MAXPAGE=20;
	$p=0;
	if ($_REQUEST['p']!='') $p=$_REQUEST['p'];
	
	$result = mysql_query("select count(*) from job where $where",$con);
	$total=mysql_fetch_row($result);

	$sql="select * from job where $where order by vip DESC limit ".$p*$MAXPAGE.",".$MAXPAGE;
	$result = mysql_query($sql,$con);
    $i=1;
	while (($row=mysql_fetch_assoc($result)))
	{
    $sql_cat_adv_vip=@mysql_query("SELECT name FROM job_cat where id='".$row['job_cat']."' ");
    $row_cat_adv_vip=@mysql_fetch_assoc($sql_cat_adv_vip);
    $sql_city_vip=@mysql_query("SELECT id,name FROM city where id='".$row['city']."' ");
    $row_city_vip=@mysql_fetch_assoc($sql_city_vip);
    if($i%2)
    {
        $color="#EAEAEA";
    }
    else
    {
        $color="#FFFFFF";
    }
    if($row['vip']=='1')
    {
        $bg="images/vip-icon.png";
    }
    else
    {
        $bg="images/icon_content_adv.png";
    }
    $i++;
		?>
<div style="width: 100%;height:35px;padding-top:5px;background-color:<?php echo $color;?>">
<div style="float:left;width:36px;height:35px;background-image: url('<?php echo $bg;?>');">
</div>
<div style="float:left;width:410px;padding-top:8px">
<a href="./tuyen-dung/<?php echo doidau(mb_strtolower($row['name'],"UTF8"));?>-vn-<?php echo $row['id'];?>.html"><?php echo dwebvn($row['name'],15);?></a>
</div>
<div style="float:left;width:125px;padding-top:8px">
<?php echo $row_cat_adv_vip['name'];?>
</div>
<div style="float:left;width:70px;padding-top:8px">
<?php if($row['city']=='0'){?>Toàn quốc<?}else{?><?php echo $row_city_vip['name'];?><?}?>
</div>
<div style="float:left;width:80px;padding-top:8px">
<?php echo $row['date'];?>
</div>
</div>
	<?}
	settype($total[0],int);
?>
<TABLE cellSpacing=10 cellPadding=0 width="100%" border=0 id="table35" style="line-height: 120%; text-align: justify">
<?
$pages=count_page($total[0],$MAXPAGE);
echo '<tr><td colspan="2" align="center"><hr class="fieldkey" width="100%" SIZE=1></td></tr>';
echo '<tr><td class="smallfont" align="left">Trình bày <b>'.($p+1).'</b> &#273;&#7871;n <b>'.(int)($total[0]/$MAXPAGE+1).'</b> (trong <b>'.$total[0].'</b> tin)</td>';
echo '<td class="smallfont" align="right">K&#7871;t qu&#7843;: ';
//$param="act=search&keywords=$keywords&search_in_description=".$_REQUEST['search_in_description']."&categories_id=".$_REQUEST['categories_id']."&manufacturers_id=".$_REQUEST['manufacturers_id']."&pfrom=".$_REQUEST['pfrom']."&pto=".$_REQUEST['pto']."&dfrom=".$_REQUEST['dfrom']."&dto=".$REQUEST['dto'];
if ($p>1) echo '<a class="buton_timkiem" title="&#272;&#7847;u tiên" href="'.$uri.'&p=0">[&lt;]</a> ';
if ($p>0) echo '<a class="buton_timkiem" title="V&#7873; tr&#432;&#7899;c" href="'.$uri.'&p='.($p-1).'">[&lt;&lt;]</a> ';
$from=($p-10>0?$p-10:0);
$to=($p+10<$pages?$p+10:$pages);
for ($i=$from;$i<$to;$i++)
{
	//if ($i!=$p) echo '<a href="./?index=search&'.$param.'&p='.$i.'">'.($i+1).' </a>';
	if ($i!=$p) echo '<a class="buton_timkiem" href="'.$uri.'&p='.$i.'">'.($i+1).' </a>';
	else echo '<b>'.($i+1).'</b> ';
}
if ($p<$i-1) echo '<a class="buton_timkiem" title="Ti&#7871;p theo" href="'.$uri.'&p='.($p+1).'">[&gt;&gt;]</a> ';
if ($p<$pages-1) echo '<a class="buton_timkiem" title="Cu&#7889;i cùng" href="'.$uri.'&p='.($pages-1).'">[&gt;]</a> '; 
echo '</td></tr></table>';
?>
<script>
	function changepage(num)
	{	
		document.all.trang.value=num;
		search1.submit();
	}
</script>