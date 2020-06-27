<div id="pro_noidung">
<div id="pro_banchay_title">
<center style="
    font-size: 16px;
    color: #ff0000;"><i class="fa fa-fw fa-star-half-empty"></i><i class="fa fa-fw fa-star-half-empty"></i><i class="fa fa-fw fa-star-half-empty"></i><b style="
    font-size: 23px;
    color: #ff0000;">SẢN PHẨM NỔI BẬT</b><i class="fa fa-fw fa-star-half-empty"></i><i class="fa fa-fw fa-star-half-empty"></i><i class="fa fa-fw fa-star-half-empty"></i></center>
</div>

<div id="pro_banchay content">
<? 
$hang=8;
$cot=8;
$sql2=mysql_query("SELECT * FROM products where user='".$user."' and id >=1 order by uptop asc limit 12");?>
<? for($i=1;$i<=$cot;$i++)
 {?>
<div id="pro_banchay_content_bang">

<?
	for($j=1;$j<=$hang&&$row2=mysql_fetch_array($sql2);$j++)
	{?>

	<div id="pro_banchay_content_bang_pro">
	<li>
	<a id="xemnhanhsp" onmouseover='showtip("<div><table><tr><td style=\"padding-left:20px;padding-top:10px;height:10px\"><? echo $row2['name'];?><br>Giá bán: <? if ($row2['price']<=0) echo 'Liên hệ'; else echo number_format($row2['price']).' VNĐ'; ?></td></tr><tr><td valign=\"top\"><img src=\"<? echo $row2['image'];?>\" width=\"350px\" border=\"0px\"></td></td></tr></table></div>");' onmouseout="hidetip();" href="./<? echo str_replace($marTViet,$marKoDau,$row2['name']); ?>-pro-<?php echo $row2['id'];?>.html">
	<img src="<? echo $row2['image'];?>" width="150" height="150">
	</a>
	</li>
	
	<span style="float: left;
    /* margin-top: 5px; */
    margin-left: 15px;
    font-size: 12px;
    font-weight: bold;
    color: red;">
	<? if ($row2['price']<=0) echo 'Liên hệ'; else echo number_format($row2['price']).' đ'; ?>
	</span>


	<li class="pro_banchay_content_bang_pro_name">
	<a id="xemnhanhsp" href="./<? echo str_replace($marTViet,$marKoDau,$row2['name']); ?>-pro-<?php echo $row2['id'];?>.html"> <? echo dwebvn($row2['name'],8);?></a>
	</li>
	  
	
	  <span style="float: left;
    margin-top: 11px; 
    margin-left: 15px;
    font-size: 12px;
    font-weight: bold;
    color: #848181;">
	<i class="fa fa-tags"></i> <? echo $row2['nguoimua'];?> mua
	</span>
	 
	  <span style="float: right;
    margin-top: 11px; 
    margin-right: 15px;
    font-size: 12px;
    font-weight: bold;
    color: #848181;">
	<i class="fa fa-fw fa-eye"></i><? echo $row2['view'];?> xem
	</span>
      	
	</span>
	
	
	</div>



<?}?>
</div>
<div class="space"></div>
<?}?>





</div>

</div>