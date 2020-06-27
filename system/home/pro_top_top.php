<div id="ctl00_MainContent_specialproduct" class="d-box-l-special_sale">          
<!--div class="d-box-l-special-title_sale">
    <h3>Sản phẩm khuyến mại</h3>
</div-->
<div class="d-box-l-special-content_sale">
    <div class="d-jcarousel3">
                        
        <div class="d-jcarousel-content" id="jcarousel3" data-jcarousel3="true" data-jcarouselautoscroll3="true">
            <ul class="ul-pro_sale" style="left: 0px; top: 0px;">

<?php 
$sql_pro_top=mysql_query("SELECT * FROM products where sale=1  ORDER BY RAND()   limit 4");
while($row_pro_top=mysql_fetch_array($sql_pro_top))
{
$goc=$row_pro_top['price']; 
$km=$row_pro_top['price_special'];
$size = getimagesize($row_pro_top['image']);
$phantram=(($goc-$km)/$goc)*100;
    ?> 
                <li class="border-right">
                    <a onmouseover='showtip("<div><table><tr><td style=\"padding-left:20px;padding-top:10px;height:10px\"><? echo $row_pro_top['name'];?><br>Giá bán: <? if ($row_pro_top['price']<=0) echo 'Liên hệ'; else echo number_format($row_pro_top['price']); ?></td></tr><tr><td valign=\"top\"><img src=\"<? echo str_replace("_thumbnail","",$row_pro_top['image']);?>\" width=\"350px\" border=\"0px\"></td></td></tr></table></div>");' onmouseout="hidetip();" id="xemsanpham" href="./<?php echo doidau(mb_strtolower($row_pro_top['name'],"UTF8"));?>-pro-<?php echo $row_pro_top['id'];?>.html">
                        <div class="img-pro">
<?php if(file_exists($row_pro_top['image']))
                 {?>
                <?php if($size[0]>=$size[1])
                {?>
                <img src="<? echo $row_pro_top['image'];?>" width="160"/>
                <?}else{?>
                <img src="<? echo $row_pro_top['image'];?>" height="160"/>
                <?}?>
                <?}else{?>
				
               <img src="<? echo str_replace("_thumbnail","",$row_pro_top['image']);?>" width="350px" border="0px">
                <?}?>
                        </div>
<?php
if(($goc-$km)==$goc)
{?><?}else{?>
<span class="s-pro-icon">-<?php echo number_format($phantram,0);?>%</span>
<?}?>
                        <h3 class="h3-pro-title"><?php echo $row_pro_top['name'];?></h3>
<?php if($row_pro_top['price_special']=='0')
{?>
<span class="s-pro-price">
<?php if($row_pro_top['price']=='0'){?>Liên hệ<?}else{?><?php echo number_format($row_pro_top['price']);?>đ <?}?>
</span>
<?}else{?>
<span class="s-pro-price"><?php echo number_format($row_pro_top['price_special']);?>đ</span>
<span class="s-pro-price linethrough"><?php echo number_format($row_pro_top['price']);?>đ</span>
<?}?>

                    </a>
                </li>
<?}?>
                </ul>   
        </div>
    </div>
</div>
</div>