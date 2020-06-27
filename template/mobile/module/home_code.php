<?php
$sql_cathome=mysql_query("SELECT id,name FROM cat_mem where user='".$user."' and status=1 ");
while($row_cathome=mysql_fetch_array($sql_cathome))
{
?>
<div id="pro_noidung">
<div id="pro_banchay_title">
<? echo $row_cathome['name'];?>
</div>
<?
$row=3;
$col=3;
$cat=$row_cathome['id'];
$catallsub=GetCategoryAllID($cat);
$sql = "select * from products where cat_mem in (".$catallsub."0) and user='".$user."' order by thutu desc limit ".$row*$col*$p.",".$row*$col;
$result = @mysql_query($sql,$con);
?>

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
<div class="space_home_pro">
</div>
<?}?>