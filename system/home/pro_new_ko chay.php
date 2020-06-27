<div class="d-box-s">
    <div class="d-box-s-title">
	
        <h3><i class="fa fa-archive"  ></i>&nbsp;&nbsp;Sản phẩm shop đề cử</h3>
    </div>
    <div class="d-box-s-content">
        <ul class="ul-pro4">
<?php 
$sql_pro_new=mysql_query("SELECT products.id as id,products.image as image, products.name as name, products.price as price, products.price_special as price_special,user_shop.level_shop as level_shop FROM products,user_shop where user_shop.user=products.user and user_shop.level_shop=0 order by products.updecu DESC limit 20");
$i=0;
while($row_pro_new=mysql_fetch_array($sql_pro_new))
{
$goc=$row_pro_new['price']; 
$km=$row_pro_new['price_special'];
$size = getimagesize($row_pro_new['image']);
$phantram=(($goc-$km)/$goc)*100;
if($i=='1')
{
    $class="first";
}
else
{
    $class="";
}
    ?> 
        <li class="<?php echo $class;?>">
            <a href="./<?php echo doidau(mb_strtolower($row_pro_new['name'],"UTF8"));?>-pro-<?php echo $row_pro_new['id'];?>.html" title="<?php echo $row_pro_new['name'];?>">
                <div class="img-pro4">
<?php if(file_exists($row_pro_new['image']))
                 {?>
                <?php if($size[0]>=$size[1])
                {?>
                <img src="<? echo $row_pro_new['image'];?>" width="120"/>
                <?}else{?>
                <img src="<? echo $row_pro_new['image'];?>" height="120"/>
                <?}?>
                <?}else{?>
                <img class="thumb" width="120" height="120" src="images/no_logo.jpg" />
                <?}?>
                </div>
                <span class="s-pro4-title"><?php echo $row_pro_new['name'];?></span>
<?php if($row_pro_new['price_special']=='0')
{?>
<span class="s-pro4-price">
<?php if($row_pro_new['price']=='0'){?>Liên hệ<?}else{?><?php echo number_format($row_pro_new['price']);?> VND <?}?>
</span>
<?}else{?>
<span class="s-pro4-price"><?php echo number_format($row_pro_new['price_special']);?> VND</span>
<span class="s-pro4-price linethrough"><?php echo number_format($row_pro_new['price']);?> VND</span>
<?}?>

            </a>
        </li>
<?}?>
        </ul>                        
    </div>
</div>