<?php 
$sql=mysql_query("SELECT id,name,image,style,link FROM cat where status=0 and parent=17  order by thutu");
$i=0;
while($row=mysql_fetch_array($sql))
{ $i++;
if($i%2)
{
    $class="blue";
}
else
{
    $class="";
}

    ?>
<div>
<?php 
$sql_ads=@mysql_query("SELECT * FROM ads where cat_id='".$row['id']."' order by thutu");
while($row_ads=@mysql_fetch_assoc($sql_ads))
	
{?>

<a  href="<?php echo $row_ads['link'];?>" target="_blank">
<img src="<?php echo $row_ads['image'];?>" style="height: 150px;margin-top: 7px; width: 942.2px;"/></a>

<?}?>
</div>
<div class="d-box-l">
    <div class="d-box-l-title <?php echo $class;?>">
        <h3 class="<?php echo $row['style'];?>">
<a style="
    color: #fff;
	font-size: 12px;
" href="./<?php echo doidau(mb_strtolower($row['name'],"UTF8"));?>-ct-<?php echo $row['id'];?>.html"><?php echo $row['name'];?></a>
        </h3>
<ul class="ul-title-menu">
<?php 
$sql_cat1=@mysql_query("SELECT * FROM cat where status = 0 and parent='".$row['id']."'  ");
while($row_cat1=@mysql_fetch_array($sql_cat1))
{?>
	<li><a href="./<?php echo doidau(mb_strtolower($row_cat1['name'],"UTF8"));?>-ct-<?php echo $row_cat1['id'];?>.html"><?php echo $row_cat1['name'];?></a></li>
<?}?>
<li class="last"><a href="./<?php echo doidau(mb_strtolower($row['name'],"UTF8"));?>-ct-<?php echo $row['id'];?>.html">Xem tất cả</a></li>
</ul>
    </div>
    <div class="d-box-l-content">
        <div class="d-box-l-content-left">
            <a  href="./<?php echo doidau(mb_strtolower($row['name'],"UTF8"));?>-ct-<?php echo $row['id'];?>.html"  ><img width="200" src="<?php echo $row['image'];?>"></a>
        </div>
        <div class="d-box-l-content-right max-height-240">
            <ul class="ul-pro1">
<?php 
$cat=$row['id'];
$catallsub=GetCatAllID($cat);
$sql_pro=mysql_query("SELECT products.id as id,products.image as image, products.name as name, products.price_special as price_special,products.nguoimua as nguoimua,products.view as view,products.user as user FROM products,user_shop where user_shop.user=products.user  and cat in (".$catallsub."0) and status = 0  ORDER BY RAND()   limit 6");    //order by products.uptop DESC limit
$tong=mysql_num_rows($sql_pro);

$tb=ceil($tong/6);
while($row_pro=mysql_fetch_array($sql_pro))
{
    $size = getimagesize($row_pro['image']);

?>
<?	    $sql_user=@mysql_query("SELECT * FROM user_shop where user='".$row_pro['user']."' ");
    $row_user=@mysql_fetch_assoc($sql_user);?>
                <li>
                    <a onmouseover='showtip("<div><table><tr><td style=\"padding-left:20px;padding-top:10px;height:10px\"><? echo $row_pro['name'];?><br>Giá bán: <? if ($row_pro['price']<=0) echo 'Liên hệ'; else echo number_format($row_pro['price']); ?></td></tr><tr><td valign=\"top\"><img src=\"<? echo str_replace("_thumbnail","",$row_pro['image']);?>\" width=\"350px\" border=\"0px\"></td></td></tr></table></div>");' onmouseout="hidetip();" id="xemsanpham"  href="./<?php echo doidau(mb_strtolower($row_pro['name'],"UTF8"));?>-pro-<?php echo $row_pro['id'];?>.html">
                        <div class="img-pro1">
                <?php if(file_exists($row_pro['image']))
                 {?>
                <?php if($size[0]>=$size[1])
                {?>
                <img src="<? echo $row_pro['image'];?>" width="100"/>
                <?}else{?>
                <img src="<? echo $row_pro['image'];?>" height="100"/>
                <?}?>
                <?}else{?>
                <img src="<? echo str_replace("_thumbnail","",$row_pro['image']);?>"  >
                <?}?>
                        </div>
                        <span class="s-pro1-title" style="
    height: 35px;
"><?php echo dwebvn($row_pro['name'],6);?></span>
 
                
				<span class="s-pro1-price"><?php echo number_format($row_pro['price_special'],0);?><span style="
    vertical-align: super;
        font-size: 11px;
">đ</span> </span>

<span data-tooltip-text="Đã có <?php echo ($row_pro['nguoimua']);?> lượt mua" class="tooltip1" style="float: left;

        margin-top: 4px; 
    font-size: 9px;
    
        color: #666;">
	<b><i class="fa fa-fw fa-tags"></i><?php echo ($row_pro['nguoimua']);?></b>
	</span>

 &nbsp;
<span data-tooltip-text="Đã có <?php echo ($row_pro['view']);?> lượt xem" class="tooltip2" style="float: left;
         margin-top: 4px; 
  margin-left: 6px;
    font-size: 9px;
    
        color: #666;">
	<b><i class="fa fa-fw fa-eye"></i><?php echo ($row_pro['view']);?></b>
	</span>
	
	
	<?php if($row_user['hotrovanchuyen_tu'] <= '0' )
                {?>
						
                <?}else{?>
				<?php if($row_pro['price_special'] > $row_user['hotrovanchuyen_tu'] )
                {?>
<span data-tooltip-text="Miễn phí vận chuyển" class="tooltip2" style="    float: right;
          margin-top: 4px; 
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
	
                <?}else{?>
<span data-tooltip-text="Tặng ngay <?php echo str_replace(",",",",number_format($row_pro['price_special']*$row_user['diemlua']/100,0));?> điểm Lửa " class="tooltip3" style="    float: right;
           margin-top: 4px; 
    margin-right: 5px;
    font-size: 12px;
    
    color: #666;;">
	<span style="color: red;font-size: 13px;" class="glyphicon glyphicon-fire"></span>
	</span>	
				<?}?>		
	
 



 
                    </a>
					
					
					
					<div style="float: left;
    padding: 6px;
    margin-left: 109px;    height: 22px;
    overflow: hidden;
">
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
<?}?>