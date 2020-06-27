<?
$row=3;
$col=5;
$MAXPAGE=5;
$name=$_GET['name'];
$cat=0;
if ($_REQUEST['cat']!='') $cat=killInjection($_REQUEST['cat']);
$catallsub=GetCategoryAllID($cat);
$p=0;
if ($_REQUEST['p']!='') $p=$_REQUEST['p'];
$sql = "select * from products where cat_mem in (".$catallsub."0) and user='".$user."' order by thutu desc limit ".$row*$col*$p.",".$row*$col;
$result = @mysql_query($sql,$con);
$total=CountRecord("products","cat_mem in (".$catallsub."-1)");
?>
<div id="pro_noidung">

<div id="pro_banchay_title">
<? $sql_cat=mysql_query("SELECT * FROM cat_mem where id='".$cat."'");
$row_cat=mysql_fetch_assoc($sql_cat);?>
<? echo $row_cat['name'];?>
</div>

<div id="pro_banchay content">
<? for($i=1;$i<=$col;$i++)
 {?>
<div id="pro_banchay_content_bang">

<?
	for($j=1;$j<=$row&&$row2=mysql_fetch_array($result);$j++)
	{?>
	<?if($domain=='')
		{?>
	<div id="pro_banchay_content_bang_pro">
	<li>
	<a href="./<? echo $user;?>/products/<? echo $row2['id']; ?>/<? echo $row2['cat_mem']; ?>/<? echo str_replace($marTViet,$marKoDau,$row2['name']); ?>.html">
	<img src="<? echo $row2['image'];?>" width="155" height="105">
	</a>
	</li>
	<li class="pro_banchay_content_bang_pro_name">
	<? echo $row2['name'];?>
	</li>
	<li class="gia">
	<? echo dwebvn($row2['short'],10);?>
	</li>
	<li class="pro_banchay_mua">
	<span style="float:left;margin-top:5px;margin-left:3px;font-size:11px; font-weight:bold; color:#FFFFFF">
	<? if ($row2['price']<=0) echo 'Liên hệ'; else echo number_format($row2['price']).' VNĐ'; ?>
	</span>
	<span style="float:right;margin-top:5px; margin-right:10px;">
	<a href="./<? echo $user;?>/mua-hang/<? echo $row2['id'];?>.html"><font color="#FFFFFF">MUA</font></a>
	</span>
	</li>
	</div>
	<?}else{?>
	<div id="pro_banchay_content_bang_pro">
	<li>
	<a href="./products/<? echo $row2['id']; ?>/<? echo $row2['cat_mem']; ?>/<? echo str_replace($marTViet,$marKoDau,$row2['name']); ?>.html">
	<img src="<? echo $row2['image'];?>" width="155" height="105">
	</a>
	</li>
	<li class="pro_banchay_content_bang_pro_name">
	<? echo $row2['name'];?>
	</li>
	<li class="gia">
	<? echo dwebvn($row2['short'],10);?>
	</li>
	<li class="pro_banchay_mua">
	<span style="float:left;margin-top:5px;margin-left:3px;font-size:11px; font-weight:bold; color:#FFFFFF">
	<? if ($row2['price']<=0) echo 'Liên hệ'; else echo number_format($row2['price']).' VNĐ'; ?>
	</span>
	<span style="float:right;margin-top:5px; margin-right:10px;">
	<a href="./mua-hang/<? echo $row2['id'];?>.html"><font color="#FFFFFF">MUA</font></a>
	</span>
	</li>
	</div>
	<?}?>

<?}?>
</div>
<div class="space"></div>
<?}?>
</div>
</div>


<? if ($total>0) { ?>
<hr color="#E9E9E9" style="clear:both" width="100%" SIZE=1 align="center">
<div class="page">
<?if($domain=='')
		{?>
<TABLE bgcolor="#FFFFFF" cellSpacing=10 cellPadding=0 width="100%" border=0 id="table35" style="line-height: 120%; text-align: justify" align="center">
<?
$pages=count_page($total,($row*$col));
echo '<tr><td class="smallfont" align="left" >
'.$total.'</b> Sản phẩm</td>';
echo '<td class="smallfont" align="right">';
$param="";
if ($p>1) echo '<a class="buton_timkiem" title="&#272;&#7847;u tiên" href="./category-'.$_REQUEST['cat'].'/trang-0.html">&lt;</a> ';
if ($p>0) echo '<a class="buton_timkiem" title="V&#7873; tr&#432;&#7899;c" href="./category-'.$_REQUEST['cat'].'/trang-'.($p-1).'.html">&lt;&lt;</a> ';
$from=($p-5>0?$p-1:0);
$to=($p+5<$pages?$p+5:$pages);
for ($i=$from;$i<$to;$i++)
{
	if ($i!=$p) echo '<a href="./'.$user.'/category-'.$_REQUEST['cat'].'/trang-'.$i.'.html">'.($i+1).'</a> ';
	else echo '<a class="active1">'.($i+1).'</a> ';
}
if ($p<$i-1) echo '<a class="buton_timkiem" title="Ti&#7871;p theo" href="./category-'.$_REQUEST['cat'].'/trang-'.($p+1).'.html">&gt;&gt;</a> ';
if ($p<$pages-1) echo '<a class="buton_timkiem" title="Cu&#7889;i cùng" href="./category-'.$_REQUEST['cat'].'/trang-'.($pages-1).'.html">&gt;</a>'; 
echo '</td></tr></table>';
?>
<?}else{?>



<TABLE bgcolor="#FFFFFF" cellSpacing=10 cellPadding=0 width="100%" border=0 id="table35" style="line-height: 120%; text-align: justify" align="center">
<?
$pages=count_page($total,($row*$col));
echo '<tr><td class="smallfont" align="left" >
'.$total.'</b> Sản phẩm</td>';
echo '<td class="smallfont" align="right">';
$param="";
if ($p>1) echo '<a class="buton_timkiem" title="&#272;&#7847;u tiên" href="./category-'.$_REQUEST['cat'].'/trang-0.html">&lt;</a> ';
if ($p>0) echo '<a class="buton_timkiem" title="V&#7873; tr&#432;&#7899;c" href="./category-'.$_REQUEST['cat'].'/trang-'.($p-1).'.html">&lt;&lt;</a> ';
$from=($p-5>0?$p-1:0);
$to=($p+5<$pages?$p+5:$pages);
for ($i=$from;$i<$to;$i++)
{
	if ($i!=$p) echo '<a href="./category-'.$_REQUEST['cat'].'/trang-'.$i.'.html">'.($i+1).'</a> ';
	else echo '<a class="active1">'.($i+1).'</a> ';
}
if ($p<$i-1) echo '<a class="buton_timkiem" title="Ti&#7871;p theo" href="./category-'.$_REQUEST['cat'].'/trang-'.($p+1).'.html">&gt;&gt;</a> ';
if ($p<$pages-1) echo '<a class="buton_timkiem" title="Cu&#7889;i cùng" href="./category-'.$_REQUEST['cat'].'/trang-'.($pages-1).'.html">&gt;</a>'; 
echo '</td></tr></table>';
?>
<?}?>

</div>
<?
}
?>