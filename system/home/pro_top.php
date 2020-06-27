<div id="ctl00_MainContent_specialproduct" class="d-box-l-special_sale">          
<!--div class="d-box-l-special-title_sale">
    <h3>Sản phẩm khuyến mại</h3>
</div-->
<div class="d-box-l-special-content_sale" style="float: left;
    width: 750px;
    height: 328px;
    border: 1px solid #ddd;" >
    <div class="d-jcarousel3"    >
                        
        <div class="d-jcarousel-content" id="jcarousel3" data-jcarousel3="true" data-jcarouselautoscroll3="true" style="
    position: relative;
    overflow: hidden;
    width: 751px;
    height: 328px;
">
            <ul class="ul-pro_sale" style="left: 0px; top: 0px;" >

<?php 
$sql_pro_top=mysql_query("SELECT * FROM products where noibat=1  ORDER BY RAND()   limit 5");
while($row_pro_top=mysql_fetch_array($sql_pro_top))

{
$goc=$row_pro_top['price']; 
$km=$row_pro_top['price_special'];
$size = getimagesize($row_pro_top['image']);
$phantram=(($goc-$km)/$goc)*100;

	    $sql_user=@mysql_query("SELECT * FROM user_shop where user='".$row_pro_top['user']."' ");
    $row_user=@mysql_fetch_assoc($sql_user);
    ?> 
                <li class="border-right" style="
    height: 327px;
" >
                    <a   id="xemsanpham" href="./<?php echo doidau(mb_strtolower($row_pro_top['name'],"UTF8"));?>-pro-<?php echo $row_pro_top['id'];?>.html">
                        <div class="img-pro">
<?php if(file_exists($row_pro_top['image']))
                 {?>
                <?php if($size[0]>=$size[1])
                {?>
                <img src="<? echo $row_pro_top['image'];?>" style="
    width: 160px;
    height: 160px;
"/>
                <?}else{?>
                <img src="<? echo $row_pro_top['image'];?>" style="
    width: 160px;
    height: 160px;
"/>
                <?}?>
                <?}else{?>
				
               <img src="<? echo str_replace("_thumbnail","",$row_pro_top['image']);?>" style="width: 160px;height: 160px;padding-top: 13px; " border="0px">
                <?}?>
                        </div>
<?php
if(($goc-$km)==$goc)
{?><?}else{?>
 
	<?php if($row_pro_top['price'] <='0')
                {?>
                <?}else{?>
							       <span style=" background-color: #fff; font-size: 13px; color: #e5101d; text-align: center; font-weight: 300; position: absolute; width: 52px; height: 22px; line-height: 20px; border-radius: 2px; border: 1px solid #e5101d; right: 5px; top: 5px; ">-<?php echo number_format($phantram,0);?>%</span>  
                <?}?>			
				


<?}?>
                        <h3 class="h3-pro-title"><?php echo $row_pro_top['name'];?></h3>
 
 
 
<span class="s-pro-price"><?php echo number_format($row_pro_top['price_special']);?><span style="
    vertical-align: super;
        font-size: 11px;
">đ</span>




<?php if($row_pro_top['price'] <='0')
                {?>
                <?}else{?>
<span class="s-pro-price linethrough" style="
    float: right; font-size: 11px;font-weight: bold;
"><?php echo number_format($row_pro_top['price']);?><span style="
    vertical-align: super;
        font-size: 11px;
">đ</span></span>
                <?}?>



</span>

<span data-tooltip-text="Đã có <?php echo ($row_pro_top['nguoimua']);?> lượt mua" class="tooltip1" style="float: left;
    margin-top: 11px; 
    
    font-size: 9px;
    
        color: #666;">
	<b><i class="fa fa-fw fa-tags"></i><?php echo ($row_pro_top['nguoimua']);?></b>
	</span>
	&nbsp;
<span data-tooltip-text="Đã có <?php echo ($row_pro_top['view']);?> lượt xem" class="tooltip2" style="float: left;
    margin-top: 11px;
  margin-left: 6px;
    font-size: 9px;
    
        color: #666;">
	<b><i class="fa fa-fw fa-eye"></i><?php echo ($row_pro_top['view']);?></b>
	</span>

	
	<?php if($row_user['hotrovanchuyen_tu'] <= '0' )
                {?>
						
                <?}else{?>
				<?php if($row_pro_top['price_special'] > $row_user['hotrovanchuyen_tu'] )
                {?>
<span data-tooltip-text="Miễn phí vận chuyển" class="tooltip2" style="    float: right;
    margin-top: 11px;
    margin-right: 5px;
    font-size: 12px;
     
    color: #666;;">
	<i class="fa fa-fw fa-truck" style=" color: #4CAF50; font-size: 16px; "></i>
	</span>	
                <?}else{?>
				<?}?>
	

                <?}?>
	
<?php if($row_user['diemlua']=="" )
                {?>
<span style="    float: right;
    margin-top: 11px;
    margin-right: 5px;
    font-size: 12px;
    
    color: #666;;">
	<i class="fa fa-fw fa-check-circle" style=" color: blue; "></i>
	</span>	
                <?}else{?>
<span data-tooltip-text="Tặng ngay <?php echo str_replace(",",",",number_format($row_pro_top['price_special']*$row_user['diemlua']/100,0));?> điểm Lửa " class="tooltip3" style="    float: right;
    margin-top: 11px;
    margin-right: 5px;
    font-size: 12px;
    
    color: #666;;">
	<span style="color: red;font-size: 13px;" class="glyphicon glyphicon-fire"></span>
	</span>	
				<?}?>	

	
	

	
 
	
 

                    </a>
<div style="   float: left;
    width: 175px;
    padding: 6px;
    background: #f4f4f4;
    margin-top: 9px;">
	<span>
	
	<?php if($row_user['level_shop']=="0" )
                {?>
	<b data-tooltip-text="Shop Lửa Đỏ - Bán hàng uy tín" class="tooltip4"   target="_blank">
<img src="/images/shopluado-icon.png">
</b>
                <?}else{?>
				<span style=" height: 25px; " class="glyphicon glyphicon-calendar"></span>
				<?}?>	





</span>

<b style="
    color: #125207;
    font-weight: bold;
" target="_blank">

</b>
<b  style="
    color: #125207;
    font-weight: bold;
" target="_blank">
<?php echo dwebvn($row_user['company'],3);?></b>
<br>

</div>					
					
                </li>
				
<?}?>
                </ul>   
        </div>
    </div>
</div>
</div>