  <div class="wrapper9999">

<div class="d-box-s">
    <div class="d-box-s-title">
	
        <h3><i class="fa fa-archive"  ></i>&nbsp;&nbsp;Sản Phẩm Shop Đề Cử</h3>
    </div>
    <div class="d-box-s-content">
        <ul class="ul-pro4">
<?php 
$sql_pro_new=mysql_query("SELECT * FROM products where upxuhuong >= 0 order by upxuhuong DESC limit 10");
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
            <a id="xemsanpham" href="./<?php echo doidau(mb_strtolower($row_pro_new['name'],"UTF8"));?>-pro-<?php echo $row_pro_new['id'];?>.html" >
                <div class="img-pro4">
<?php if(file_exists($row_pro_new['image']))
                 {?>
                <?php if($size[0]>=$size[1])
                {?>
                 <img src="<? echo $row_pro_new['image'];?>"   />
                <?}else{?>
           <img src="<? echo $row_pro_new['image'];?>" />
                <?}?>
                <?}else{?>
                  <img src="<? echo $row_pro_new['image'];?>"  />
                <?}?>
                </div>
				
				
	<?php if($row_pro_new['price'] <='0')
                {?>
                <?}else{?>
							       <span style=" background-color: #fff; font-size: 13px; color: #e5101d; text-align: center; font-weight: 300; position: absolute; width: 52px; height: 22px; line-height: 20px; border-radius: 2px; border: 1px solid #e5101d; right: 5px; top: 5px; ">-<?php echo number_format($phantram,0);?>%</span>  
                <?}?>			
				
     
			
			
<?php if($row_pro_new['price_special']=='0')
{?>
<span class="s-pro4-price">
<?php if($row_pro_new['price_special']=='0'){?>Liên hệ<?}else{?><?php echo number_format($row_pro_new['price_special']);?>đ <?}?>
</span>
<?}else{?>
<span class="s-pro4-price" ><b style=" float: left; "><?php echo number_format($row_pro_new['price_special']);?>đ</b> 

 <?php if($row_pro_new['price'] <='0')
                {?>
                <?}else{?>
<b style="float: right;color: #464848;text-decoration: line-through;font-size: 12px;"><?php echo number_format($row_pro_new['price']);?>đ</b>
                <?}?>



</span>

<?}?>

  <span class="s-pro4-title" style="text-align: left; "><?php echo $row_pro_new['name'];?></span>
            </a>
        </li>
<?}?>
        </ul>                        
    </div>
</div>
</div>