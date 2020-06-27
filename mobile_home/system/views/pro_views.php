<?php
$id=$_REQUEST['views'];
$name=$_REQUEST['name'];
?>
<?php 
$sql_1 = "select * from products where id='".$id."' ";
$result_1 = @mysql_query($sql_1,$con);
$row=mysql_fetch_assoc($result_1);
$sql_user=mysql_query("SELECT * FROM user_shop where user='".$row['user']."' ");
$row_user=mysql_fetch_assoc($sql_user);
$sql_city=mysql_query("SELECT * FROM city where id='".$row['city']."' ");
$row_city=mysql_fetch_assoc($sql_city);
$sqlup = "update products set view=view+1 where id=$id";
$resultup = mysql_query($sqlup,$con);
?>
<?php 
$sql_pro=mysql_query("SELECT * FROM products where id='".$id."' ");
$row=mysql_fetch_assoc($sql_pro);
$sql_city=@mysql_query("SELECT * FROM city where id='".$row['city']."' ");
$row_city=@mysql_fetch_assoc($sql_city);
$sql_cr1=mysql_query("SELECT * FROM currency where id='".$row['currency']."'");
$row_cr1=mysql_fetch_assoc($sql_cr1);
?>
<?php 
$sql_mul=@mysql_query("SELECT * FROM cat where id='".$row['cat']."' ");
$row_mul=mysql_fetch_assoc($sql_mul);
?>
<?php 
$sql_mul1=@mysql_query("SELECT * FROM cat where id='".$row_mul['parent']."' ");
$row_mul1=mysql_fetch_assoc($sql_mul1);
?>
<?php 
$sql_mul2=@mysql_query("SELECT * FROM cat where id='".$row_mul1['parent']."' ");
$row_mul2=mysql_fetch_assoc($sql_mul2);
?>
<?php 
$sql_mul3=@mysql_query("SELECT * FROM products where id='".$_REQUEST['views']."' ");
$row_mul3=mysql_fetch_assoc($sql_mul3);
?>
 <?php
$sql_con1=@mysql_query("SELECT * FROM comment where user='".$row['user']."' ");
$tong_con1=@mysql_num_rows($sql_con1);
$cnt1=0;
$tongcong1=0;
while($row_con1=mysql_fetch_assoc($sql_con1))
{
?>
<?
$tongcong1=$tongcong1+$row_con1['rate'];
$trungbinh1=$tongcong1/$tong_con1;
$cnt1=$cnt1+1;
}?>
 
<div id="detail_product_ss">	

<script type="text/javascript">
var vatgiaTitlePosition = '<ul id="header_navigate"><?php if($row_mul2['id']==''){?><?}else{?><li><a class="level_0" href="./<?php echo doidau(mb_strtolower($row_mul2['name'],"UTF8"));?>-ct-<?php echo $row_mul2['id'];?>.html"><span><?php echo $row_mul2['name'];?></span></a><ul><?php $sql_sub1=@mysql_query("SELECT id,name,parent FROM cat where parent='".$row_mul2['id']."' ");while($row_sub1=@mysql_fetch_array($sql_sub1)){?><li><a href="./<?php echo doidau(mb_strtolower($row_sub1['name'],"UTF8"));?>-ct-<?php echo $row_sub1['id'];?>.html"><?php echo $row_sub1['name'];?></a></li><?}?></ul></li><?}?><?php if($row_mul1['id']==''){?><?}else{?><li><a class="level_0" href="./<?php echo doidau(mb_strtolower($row_mul1['name'],"UTF8"));?>-ct-<?php echo $row_mul1['id'];?>.html"><span><?php echo $row_mul1['name'];?></span></a><ul><?php $sql_sub2=@mysql_query("SELECT id,name,parent FROM cat where parent='".$row_mul1['id']."' ");while($row_sub2=@mysql_fetch_array($sql_sub2)){?><li><a href="./<?php echo doidau(mb_strtolower($row_sub2['name'],"UTF8"));?>-ct-<?php echo $row_sub2['id'];?>.html"><?php echo $row_sub2['name'];?></a></li><?}?></ul></li><?}?><li><a class="level_0 level_0_last" href="./<?php echo doidau(mb_strtolower($row_mul['name'],"UTF8"));?>-ct-<?php echo $row_mul['id'];?>.html"><span><?php echo $row_mul['name'];?></span></a></li></ul>';
</script>

<div id="top5555" style=" height: 49px; "  >
	
	 
	
	
	
	
	    <div class="d-top" style="
		height: 49px;
  width: 100%;
    background: #ebf3fb;
    color: #666;
    position: relative;
    /* padding: 1px; */
    border-radius: 5px 5px 0 0;
 
    border-bottom: 1px solid #c9dff5;
">
    	   <img src="<? echo $row_user['logo'];?>" width="40" height="40" style="
    padding: 5px;
">

                    <?php if($row_user['level_shop']=='0')
{?>
<img src="/images/shopluado.png"  style="  height: 55px; position: absolute; left: 268px; top: -3px;" title="Chứng nhận Shop uy tín bảo vệ người mua hàng">
<?}else{?>

<?}?>
 

<b style="
 
    font-size: 12px;
    color: #666;
    position: relative;
    line-height: 24px;
    display: inline-block;
    vertical-align: top;
 
"><a style="
    color: #0066cc;
    font-weight: bold;
    display: inline-block;
    font-size: 13px;
    margin-left: 0px;
" target="_blank" href="/<?php echo $row_user['user'];?>"><?php echo $row_user['company'];?></a>
 
 
</b>

<br>
<li style="

font-size: 12px;
    color: #666;
    position: relative;
    line-height: 24px;
    display: inline-block;
    vertical-align: top;
    margin-top: -27px;
    margin-left: 53px;


"><b>Điểm:</b> <b style="
    color: green;
    font-weight: bold;
   
    font-size: 13px;
    margin-left: 0px;
" target="_blank" href="/<?php echo $row_user['user'];?>"><?echo $tongcong1;?></b>
 


<?php if($tongcong1>='1' & $tongcong1<'20')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="fa fa-fw fa-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($tongcong1>='20' & $tongcong1<'30')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="fa fa-fw fa-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>



<?php if($tongcong1>='30' & $tongcong1<'40')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="fa fa-fw fa-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($tongcong1>='40' & $tongcong1<'60')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="fa fa-fw fa-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($tongcong1>='60' & $tongcong1<'80')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="fa fa-fw fa-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;

<?}
else{?><?}?>

<?php if($tongcong1>='80' & $tongcong1<'200')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="fa fa-fw fa-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($tongcong1>='200' & $tongcong1<'500')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="fa fa-fw fa-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($tongcong1>='500' & $tongcong1<'1000')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="fa fa-fw fa-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($tongcong1>='1000' & $tongcong1<'2000')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($tongcong1>='2000' & $tongcong1<'5000')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($tongcong1>='5000' & $tongcong1<'10000')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($tongcong1>='10000' & $tongcong1<'30000')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($tongcong1>='30000' & $tongcong1<'100000')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($tongcong1>='100000' & $tongcong1<'500000')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($tongcong1>='500000' & $tongcong1<'1200000')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($tongcong1>='1200000' & $tongcong1<'6000000')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;
<?}
else{?><?}?>


<?php if($tongcong1>='6000000' )
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="fa fa-fw fa-fire" style="color: red;font-size: 19px;"></i>&nbsp;
<?}
else{?><?}?>

 
 
 
<b><?echo round($trungbinh1*20,2);?>% </b>
 
 

</li>





           
			
<!--begin search-->

<!--end search-->
        </div>
    
    </div>


<div id="raovat_bredcrum" class="noborder">
<ul id="header_navigate"><?php if($row_mul2['id']==''){?><?}else{?><li><a class="level_0" href="./<?php echo doidau(mb_strtolower($row_mul2['name'],"UTF8"));?>-ct-<?php echo $row_mul2['id'];?>.html"><span><?php echo $row_mul2['name'];?></span></a><ul><?php $sql_sub1=@mysql_query("SELECT id,name,parent FROM cat where parent='".$row_mul2['id']."' ");while($row_sub1=@mysql_fetch_array($sql_sub1)){?><li><a href="./<?php echo doidau(mb_strtolower($row_sub1['name'],"UTF8"));?>-ct-<?php echo $row_sub1['id'];?>.html"><?php echo $row_sub1['name'];?></a></li><?}?></ul></li><?}?><?php if($row_mul1['id']==''){?><?}else{?><li><a class="level_0" href="./<?php echo doidau(mb_strtolower($row_mul1['name'],"UTF8"));?>-ct-<?php echo $row_mul1['id'];?>.html"><span><?php echo $row_mul1['name'];?></span></a><ul><?php $sql_sub2=@mysql_query("SELECT id,name,parent FROM cat where parent='".$row_mul1['id']."' ");while($row_sub2=@mysql_fetch_array($sql_sub2)){?><li><a href="./<?php echo doidau(mb_strtolower($row_sub2['name'],"UTF8"));?>-ct-<?php echo $row_sub2['id'];?>.html"><?php echo $row_sub2['name'];?></a></li><?}?></ul></li><?}?><li><a class="level_0 level_0_last" href="./<?php echo doidau(mb_strtolower($row_mul['name'],"UTF8"));?>-ct-<?php echo $row_mul['id'];?>.html"><span><?php echo $row_mul['name'];?></span></a></li></ul>
</div>
    <script>
		$('#raovat_bredcrum').html(vatgiaTitlePosition);
	</script>

	<div class="productListPictures">	<ul class="list_image_small">
						<li>
					<a class="list_img_box"   data-ptsp-kpi-action-name="So sánh giá" data-ptsp-kpi-action-label="Ảnh sản phẩm">
						<img class="load_img" id="sl_small_0" alt="<?php echo $row['name'];?>" title="<?php echo $row['name'];?>" src="<?echo str_replace("_thumbnail","",$row['image']);?>">
					</a>
				</li>
                 
				</ul>
<?php
if(file_exists($row['image_large']))
{
    $img="1,";
}else
{
    $img="";
}
if(file_exists($row['img2']))
{
    $img1="1,";
}else
{
    $img1="";
}
if(file_exists($row['img3']))
{
    $img2="1";
}else
{
    $img2="";
}
if(file_exists($row['img4']))
{
    $img3="1";
}else
{
    $img3="";
}
if(file_exists($row['img5']))
{
    $img4="1";
}else
{
    $img4="";
}
if(file_exists($row['img6']))
{
    $img5="1";
}else
{
    $img5="";
}
if(file_exists($row['img7']))
{
    $img6="1";
}else
{
    $img6="";
}
if(file_exists($row['img8']))
{
    $img7="1";
}else
{
    $img7="";
}
$count=array($img,$img1,$img2,$img3,$img4,$img5,$img6,$img7);
$length  = count( array_keys( $count,"" ));
?>
 
</div>
<h4 class="company_product_name"><?php echo $row['name'];?></h4>






<div>
<?php
$sql_con=@mysql_query("SELECT * FROM comment where id='".$id."' ");
$tong_con=@mysql_num_rows($sql_con);
$cnt=0;
$tongcong=0;
while($row_con=mysql_fetch_assoc($sql_con))
{
?>
<?
$tongcong=$tongcong+$row_con['rate'];
$trungbinh=$tongcong/$tong_con;
$cnt=$cnt+1;
}?>
&nbsp;&nbsp;
<?php if($tongcong=='' )
{?>
<?}
else{?>
<?php if($trungbinh>='1' & $trungbinh<'1.5')
{?>
<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($trungbinh>='1.5' & $trungbinh<'2')
{?>
<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star-half-empty" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>



<?php if($trungbinh>='2' & $trungbinh<'2.5')
{?>
<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($trungbinh>='2.5' & $trungbinh<'3')
{?>
<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star-half-empty" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>


<?php if($trungbinh>='3' & $trungbinh<'3.5')
{?>
<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($trungbinh>='3.5' & $trungbinh<'4')
{?>
<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star-half-empty" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>


<?php if($trungbinh>='4' & $trungbinh<'4.5')
{?>
<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($trungbinh>='4.5' & $trungbinh<'5')
{?>
<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star-half-empty" style="color: red;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($trungbinh>='5' )
{?>
<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>
<b><?echo round($trungbinh*20,2);?>%</b><b style="
    font-size: 11px;
    color: #f32c6b;
"></b> <b>
</b>&nbsp;<?}?>



<p data-tooltip-text="Đã có <?php echo $row['nguoimua'];?> lượt mua" class="tooltip3">
<i class="fa  fa-tag"  >
</i>
<?php echo $row['nguoimua'];?>&nbsp;
</p>
<p data-tooltip-text="Đã có <?php echo $row['view'];?> lượt xem" class="tooltip3">
<i class="fa  fa-fw fa-eye"  >
</i>
<?php echo $row['view'];?>
</p>

</div>



<?if($row_user['diemlua']==''){?>
<?}else{?>
 

                          
                      &nbsp;&nbsp;    <b> Tặng ngay</b> <i style=" color: red; " class="fa fa-fw fa-fire"></i> + <?php echo str_replace(",",",",number_format($row['price_special']*$row_user['diemlua']/100,0));?> điểm <b style=" color: red; ">Lửa  </b>
 </div>
<?}?> 
















 




<div class="com_price">
			
			<span class="price">
<?php if($row['price_special']=='0')
                {?>
                <?php if($row['price_special']=='0'){?><div class="new_price"><span class="price">Giá bán: Liên hệ</span></div><?}else{?><div class="new_price">Giá bán: <span class="price"><?php echo number_format($row['price_special'],0);?> VNĐ</span></div><?}?>
                <?}else{?>
                <div class="new_price"><span class="price">Giá: <?php echo number_format($row['price_special'],0);?><span style="vertical-align: super; font-size: 80%;">đ</span></span>  
					
			  <?php if($row['price'] <='0')
                {?>
                <?}else{?>
				<span style=" color: #858c8c; font-size: 10px; text-decoration: line-through; "><?php echo number_format($row['price'],0);?><span style="vertical-align: super; font-size: 80%;">đ</span></span>
				
				 <?}?>
				
				</div>
             
<?}?>	 
            </span>
<?if($row['code']==''){?>
<?}else{?>
<b>Mã SP:</b> <? echo $row['code'];?><br>
<?}?> 
			
<?if($row_city['name']==''){?>
<b>Kho hàng:</b> Nội Ô TP.Cần Thơ<br>
<?}else{?>
<b>Kho hàng:</b> <? echo $row['name'];?><br>
<?}?> 

<?if($row['baohanh']==''){?>
<?}else{?>
<b>Bảo hành:</b> <? echo $row['baohanh'];?><br>
<?}?>







<!---------------------------------------------------------------------uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu-------------------->
<?php
	$ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
?>
<?

	$sql = "select * from thanhvien where user='".$_SESSION['mem']."'";	
	$result = mysql_query($sql,$con);	
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	$date = date("d-m-Y H:i:s");
	$cust=mysql_fetch_assoc($result);

$sql2=mysql_query("SELECT * FROM provinces where id='".$_POST['phivanchuyen']."'");
$row2=mysql_fetch_assoc($sql2);
$phi = $row2['phivanchuyen'];
	
if (isset($_POST['clickmua'])) {
	$name = $_POST['name'];
	$mausac = $_POST['mausac'];
	$kichthuoc = $_POST['kichthuoc'];
	$update_soluong = $_POST['update_soluong'];
	$phivanchuyen1 = $_POST['phivanchuyen'];
	$congdiemlua = $row['price_special'] * $update_soluong * $row_user['diemlua']/100;







	{
	$sql = "insert into orders (ip,orders_customer_id,orders_name,orders_phone,orders_email,orders_address,orders_user,orders_date,mausac,kichthuoc,user_mem,diemlua,tinhthanh,active_shop) values ('".$ip."','".$cust['id']."','".$cust['fullname']."','".$cust['phone']."','".$cust['email']."','".$cust['address']."' ,'".$row_user['user']."','".$date."' ,'".$mausac."','".$kichthuoc."' ,'".$_SESSION['mem']."','".$congdiemlua."','0' ,'100'  )";
		if (mysql_query($sql,$con)) {

	
			{
				$newid=mysql_insert_id();
				$sqlUpdate = "insert into orderdetail (ordersdetail_product_id,ordersdetail_quantity,ordersdetail_price,ordersdetail_ordersid,user,user_mem,phivanchuyen) values (".$row["id"].",".$update_soluong.",'".$row['price_special']."',".$newid.",'".$row_user['user']."','".$_SESSION['mem']."' ,'0')";
				mysql_query($sqlUpdate,$con);
				$_SESSION['tim_id']=$newid;
			}
			$err=" <SCRIPT LANGUAGE='JavaScript'>
    window.location.href='/?home=quanlydonhang_mua';
    </SCRIPT>";
		}	
		
		else {
			$err =  "<p align=center class='err'><SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không thành công vui lòng liên hệ trợ giúp')
    </SCRIPT></p>";
		}
  	}


}
?>

<FORM  method="POST" name="cartform1" onsubmit="return check1()"   >	



<? echo $err;?>
<!--------------------------------uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu----------------------------->






<?php if($row['mausac_nau']=='' &  $row['mausac_vang']=='' &  $row['mausac_trang']==''&  $row['mausac_den']==''&  $row['mausac_hong']==''&  $row['mausac_xanhla']==''&  $row['mausac_xanhnuocbien']==''&  $row['mausac_xanhngoc']==''&  $row['mausac_xanhden']==''&  $row['mausac_xam']==''&  $row['mausac_tim']==''&  $row['mausac_do']==''&  $row['mausac_cam']==''&  $row['mausac_kem']==''&  $row['mausac_xanhduong']==''&  $row['mausac_soc']==''&  $row['mausac_xanhladam']==''&  $row['mausac_hoatiet']==''&  $row['mausac_bac']==''&  $row['mausac_hongphan']=='')
{?>
<?}else{?>
<b>Màu sắc:</b> <span class="s-text" itemprop="brand">

  <label   title="Ngẫu nhiên"> 
 <input   type="radio"  name="mausac" value=""  >
                    </label>



 <?php if($row['mausac_nau']=='' )
{?>
<?}
else{?>
 <label style="background: #804000;padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu nâu"> 
 <input style="padding-right: 3px;width: 17px;margin-left: -5px;color: #00f5f5;" type="radio"  name="mausac" value="804000" >
                    </label>
<?}?>
<?php if($row['mausac_vang']=='' )
{?>
<?}
else{?>
 <label style="background: #ffff00;padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu vàng">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="ffff00" >
                    </label>
<?}?>
<?php if($row['mausac_trang']=='' )
{?>
<?}
else{?>
 <label style="background: #ffffff;padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu trắng">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="ffffff" >
                    </label>
<?}?>
<?php if($row['mausac_den']=='' )
{?>
<?}
else{?>
 <label style="background: #000000;padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu đen">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="000000" >
                    </label>
<?}?>
<?php if($row['mausac_hong']=='' )
{?>
<?}
else{?>
 <label style="background: #ff00ff;padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu hồng">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="ff00ff" >
                    </label>
<?}?>
<?php if($row['mausac_xanhla']=='' )
{?>
<?}
else{?>
 <label style="background: #00ff00;padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu xanh lá">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="00ff00" >
                    </label>
<?}?>
<?php if($row['mausac_xanhnuocbien']=='' )
{?>
<?}
else{?>
 <label style="background: #0080ff;padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu xanh nước biển">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="0080ff" >
                    </label>
<?}?>
<?php if($row['mausac_xanhngoc']=='' )
{?>
<?}
else{?>
 <label style="background: #00ffff;padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu xanh ngọc">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="00ffff" >
                    </label>
<?}?>
<?php if($row['mausac_xanhden']=='' )
{?>
<?}
else{?>

 <label style="background: #112c4e;padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu xanh đen">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="112c4e" >
                    </label>
<?}?>
<?php if($row['mausac_xam']=='' )
{?>
<?}
else{?>

 <label style="background: #999999;padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu xám">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="999999" >
                    </label>
<?}?>
<?php if($row['mausac_tim']=='' )
{?>
<?}
else{?>
 <label style="background: #800080;padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu tím">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="800080" >
                    </label>
<?}?>
<?php if($row['mausac_do']=='' )
{?>
<?}
else{?>
 <label style="background: #ff0000;padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu đỏ">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="ff0000" >
                    </label>
<?}?>
<?php if($row['mausac_cam']=='' )
{?>
<?}
else{?>
 <label style="background: #ff8040;padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu cam">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="ff8040" >
                    </label>
<?}?>
<?php if($row['mausac_kem']=='' )
{?>
<?}
else{?>
 <label style="background: #fef1ce;padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu kem">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="fef1ce" >
                    </label>
<?}?>

<?php if($row['mausac_xanhduong']=='' )
{?>
<?}
else{?>
 <label style="background: #0522c5;padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu xanh dương">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="0522c5" >
                    </label>
<?}?>
<?php if($row['mausac_soc']=='' )
{?>
<?}
else{?>
 <label style="background: url(/images/mul-color.gif) center center no-repeat;padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu sọc">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="mul-color.gif" >
                    </label>
<?}?>
<?php if($row['mausac_xanhladam']=='' )
{?>
<?}
else{?>
 <label style="background: #007000;padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu xanh lá đậm">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="007000" >
                    </label>
<?}?>
<?php if($row['mausac_hoatiet']=='' )
{?>
<?}
else{?>
 <label style="background: url(/images/floral.jpg) center center no-repeat;padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu họa tiết">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="floral.jpg" >
                    </label>
<?}?>
<?php if($row['mausac_bac']=='' )
{?>
<?}
else{?>
 <label style="background: #cccccc;padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu bạc">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="cccccc" >
                    </label>
<?}?>
<?php if($row['mausac_hongphan']=='' )
{?>
<?}
else{?>
 <label style="background: #ffc0cb;padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu hồng phấn">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="ffc0cb" >
                    </label>
<?}?>
<br>
</span>
<?}?>



<?php if($row['kichthuoc_freesize']=='' & $row['kichthuoc_1']=='' & $row['kichthuoc_2']=='' & $row['kichthuoc_3']=='' & $row['kichthuoc_4']=='' & $row['kichthuoc_5']=='' & $row['kichthuoc_6']=='' & $row['kichthuoc_7']=='' & $row['kichthuoc_8']=='' & $row['kichthuoc_9']=='' & $row['kichthuoc_10']=='' & $row['kichthuoc_11']=='' & $row['kichthuoc_12']=='' & $row['kichthuoc_S']=='' & $row['kichthuoc_M']=='' & $row['kichthuoc_L']=='' & $row['kichthuoc_XL']=='' & $row['kichthuoc_XXL']=='' & $row['kichthuoc_XS']=='' & $row['kichthuoc_XXS']=='' & $row['kichthuoc_2XL']=='' & $row['kichthuoc_3XL']=='' & $row['kichthuoc_4XL']=='' & $row['kichthuoc_5XL']=='' & $row['kichthuoc_6XL']=='' & $row['kichthuoc_25']=='' & $row['kichthuoc_26']=='' & $row['kichthuoc_27']=='' & $row['kichthuoc_28']=='' & $row['kichthuoc_29']=='' & $row['kichthuoc_30']=='' & $row['kichthuoc_31']=='' & $row['kichthuoc_32']=='' & $row['kichthuoc_33']=='' & $row['kichthuoc_34']=='' & $row['kichthuoc_35']=='' & $row['kichthuoc_36']=='' & $row['kichthuoc_37']=='' & $row['kichthuoc_38']=='' & $row['kichthuoc_39']=='' & $row['kichthuoc_40']=='' & $row['kichthuoc_41']=='' & $row['kichthuoc_42']=='' & $row['kichthuoc_43']=='' & $row['kichthuoc_44']=='' & $row['kichthuoc_45']=='' & $row['kichthuoc_46']=='' & $row['kichthuoc_47']=='')
{?>
<?}else{?>
<b>Kích thước:</b> 
 <span class="s-text">
<?php if($row['kichthuoc_freesize']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="FreeSize" >
<span style="color: #000;padding-right: 5px;">Free Size</span>
                    </label>
					
<?}?>
<?php if($row['kichthuoc_1']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="1" >
<span style="color: #000;padding-right: 5px;">1</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_2']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="2" >
<span style="color: #000;padding-right: 5px;">2</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_3']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="3" >
<span style="color: #000;padding-right: 5px;">3</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_4']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="4" >
<span style="color: #000;padding-right: 5px;">4</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_5']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="5" >
<span style="color: #000;padding-right: 5px;">5</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_6']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="6" >
<span style="color: #000;padding-right: 5px;">6</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_7']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="7" >
<span style="color: #000;padding-right: 5px;">7</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_8']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="8" >
<span style="color: #000;padding-right: 5px;">8</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_9']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="9" >
<span style="color: #000;padding-right: 5px;">9</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_10']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="10" >
<span style="color: #000;padding-right: 5px;">10</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_11']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="11" >
<span style="color: #000;padding-right: 5px;">11</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_12']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="12" >
<span style="color: #000;padding-right: 5px;">12</span>
                    </label>
<?}?>
				<?php if($row['kichthuoc_S']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="S" >
<span style="color: #000;padding-right: 5px;">S</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_M']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="M" >
<span style="color: #000;padding-right: 5px;">M</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_L']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="L" >
<span style="color: #000;padding-right: 5px;">L</span>
                    </label>
<?}?>		
<?php if($row['kichthuoc_XL']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="XL" >
<span style="color: #000;padding-right: 5px;">XL</span>
                    </label>
<?}?>	
<?php if($row['kichthuoc_XXL']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="XXL" >
<span style="color: #000;padding-right: 5px;">XXL</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_XS']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="XS" >
<span style="color: #000;padding-right: 5px;">XS</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_XXS']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="XXS" >
<span style="color: #000;padding-right: 5px;">XXS</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_2XL']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="2XL" >
<span style="color: #000;padding-right: 5px;">2XL</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_3XL']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="3XL" >
<span style="color: #000;padding-right: 5px;">3XL</span>
                    </label>
<?}?><?php if($row['kichthuoc_4XL']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="4XL" >
<span style="color: #000;padding-right: 5px;">4XL</span>
                    </label>
<?}?><?php if($row['kichthuoc_5XL']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="5XL" >
<span style="color: #000;padding-right: 5px;">5XL</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_6XL']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="6XL" >
<span style="color: #000;padding-right: 5px;">6XL</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_25']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="25" >
<span style="color: #000;padding-right: 5px;">25</span>
                    </label>
<?}?><?php if($row['kichthuoc_26']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="26" >
<span style="color: #000;padding-right: 5px;">26</span>
                    </label>
<?}?><?php if($row['kichthuoc_27']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="27" >
<span style="color: #000;padding-right: 5px;">27</span>
                    </label>
<?}?><?php if($row['kichthuoc_28']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="28" >
<span style="color: #000;padding-right: 5px;">28</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_29']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="29" >
<span style="color: #000;padding-right: 5px;">29</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_30']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="30" >
<span style="color: #000;padding-right: 5px;">30</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_31']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="31" >
<span style="color: #000;padding-right: 5px;">31</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_32']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="32" >
<span style="color: #000;padding-right: 5px;">32</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_33']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="33" >
<span style="color: #000;padding-right: 5px;">33</span>
                    </label>
<?}?><?php if($row['kichthuoc_34']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="34" >
<span style="color: #000;padding-right: 5px;">34</span>
                    </label>
<?}?><?php if($row['kichthuoc_35']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="35" >
<span style="color: #000;padding-right: 5px;">35</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_36']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="36" >
<span style="color: #000;padding-right: 5px;">36</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_37']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="37" >
<span style="color: #000;padding-right: 5px;">37</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_38']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="38" >
<span style="color: #000;padding-right: 5px;">38</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_39']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="39" >
<span style="color: #000;padding-right: 5px;">39</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_40']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="40" >
<span style="color: #000;padding-right: 5px;">40</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_41']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="41" >
<span style="color: #000;padding-right: 5px;">41</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_42']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="42" >
<span style="color: #000;padding-right: 5px;">42</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_43']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="43" >
<span style="color: #000;padding-right: 5px;">43</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_44']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="44" >
<span style="color: #000;padding-right: 5px;">44</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_45']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="45" >
<span style="color: #000;padding-right: 5px;">45</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_46']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="46" >
<span style="color: #000;padding-right: 5px;">46</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_47']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 9px; padding-top: 4px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="47" >
<span style="color: #000;padding-right: 5px;">47</span>
                    </label>
<?}?>
<br>
</span> 
<?}?>

 	<b>Số lượng:</b> <select style="border: 1px solid #ddd;    " name="update_soluong">    
	
                                                             <option value="1" title="Chọn số lượng 1">1</option>															 
                                                             <option value="2" title="Chọn số lượng 2">2</option>	
                                                             <option value="3" title="Chọn số lượng 3">3</option>															 
                                                             <option value="4" title="Chọn số lượng 4">4</option>
                                                             <option value="5" title="Chọn số lượng 5">5</option>															 
                                                             <option value="6" title="Chọn số lượng 6">6</option>
                                                             <option value="7" title="Chọn số lượng 7">7</option>															 
                                                             <option value="8" title="Chọn số lượng 8">8</option>
                                                             <option value="9" title="Chọn số lượng 9">9</option>															 
                                                             <option value="10" title="Chọn số lượng 10">10</option>
                                                             <option value="11" title="Chọn số lượng 11">11</option>															 
                                                             <option value="12" title="Chọn số lượng 12">12</option>	
                                                             <option value="13" title="Chọn số lượng 13">13</option>															 
                                                             <option value="14" title="Chọn số lượng 14">14</option>	
                                                             <option value="15" title="Chọn số lượng 15">15</option>															 
                                                             <option value="16" title="Chọn số lượng 16">16</option>
                                                             <option value="17" title="Chọn số lượng 17">17</option>															 
                                                             <option value="18" title="Chọn số lượng 18">18</option>
                                                             <option value="19" title="Chọn số lượng 19">19</option>															 
                                                             <option value="20" title="Chọn số lượng 20">20</option>															 
</select>
<?php if($row_user['hotrovanchuyen_tu'] <='0' )
{?>
<?}else{?>
<br>
 	<b><i class="fa fa-fw fa-truck"></i> Shop <b style="color: red;">MIỄN PHÍ VẬN CHUYỂN</b> cho đơn hàng từ <b style="color: #10ab16;"><?php echo str_replace(",",",",number_format($row_user['hotrovanchuyen_tu'],0));?>đ</b> trở lên</b> 
	<?}?> 
</div>





<div class="fb-like" data-href="<?php echo "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>" data-send="true" data-width="450" data-show-faces="true"></div>
<div id="company_action" class="company_button company_fixed">

			<div class="product_estore_item_control">
		
					<div class="product_estore_item_control_button">
		
	<?php if($_SESSION['mem']=="" )
{?>	

 <?if($_REQUEST['mem']==''){?>

<a style="margin-top: 4px;padding: 1px 0;display: inline-block;height: 38px;"  onclick="document.getElementById('myModal9').style.display='block'" class="btn_estore_cart orange verified" data-ptsp-kpi-action-name="Chi tiết sản phẩm" data-ptsp-kpi-action-label="Mua hàng">
				<i class="vcon-white_cart"></i> MUA NGAY </a>
	 <?}else{?>				
  <?php if($row['tinhtrang']=='1' && $row['status']=='0' )
{?>
 <button style="margin-top: 4px;padding: 1px 0;display: inline-block;height: 38px;"  name="clickmua" type="submit" class="btn_estore_cart orange verified" data-ptsp-kpi-action-name="Chi tiết sản phẩm" data-ptsp-kpi-action-label="Mua hàng">
				<i class="vcon-white_cart"></i> MUA NGAY </button>
 
 <?}
else{?>
<a style="margin-top: 4px;padding: 1px 0;display: inline-block;height: 38px;background: #F44336 !important;"    class="btn_estore_cart orange verified" data-ptsp-kpi-action-name="Chi tiết sản phẩm" data-ptsp-kpi-action-label="Mua hàng">
				<i class="vcon-white_cart"></i> HẾT HÀNG </a>
 <?}?> 
	 <?}?> 			
				
				
 <?}else{?>	
 
 <?php if($row['tinhtrang']=='1' && $row['status']=='0' )
{?>
 <button style="margin-top: 4px;padding: 1px 0;display: inline-block;height: 38px;"  name="clickmua" type="submit" class="btn_estore_cart orange verified" data-ptsp-kpi-action-name="Chi tiết sản phẩm" data-ptsp-kpi-action-label="Mua hàng">
				<i class="vcon-white_cart"></i> MUA NGAY </button>
 
 <?}
else{?>
<a style="margin-top: 4px;padding: 1px 0;display: inline-block;height: 38px;background: #F44336 !important;"    class="btn_estore_cart orange verified" data-ptsp-kpi-action-name="Chi tiết sản phẩm" data-ptsp-kpi-action-label="Mua hàng">
				<i class="vcon-white_cart"></i> HẾT HÀNG </a>
 <?}?> 
 
 <?}?> 
 
 
 
		
 

		
	
 
		


		
				
				
			</div>
			</div>
	</div>
	
<div id="myModal9" class="modal">
 
 

 
        <div class="wrapper" id="wrapper-content">
            <div id="step1" class="stepReg">
                 
                    
             <div class="stepReg-title">
                    
                    <h1>Đăng nhập</h1>
              <a class="close1" onclick="document.getElementById('myModal9').style.display='none'" >X</a>
                                
                </div>      
             
                                
              
                <div class="stepReg-form">
	 
                    <table class="tableSimple" cellpadding="1" cellspacing="0">
                        <tbody> 
                                              
																 
						 	
						 
 																		 
                         
                         
                             
                      
                        
                         
                        <tr>
                            <td class="td-register-button" colspan="2">
                                <input   onclick="document.getElementById('myModal').style.display='block'"     value="Đăng nhập để mua hàng"/ style="
    background: #d22121;
	font-size: 16px;
">							 
 

                            </td>
							
                        </tr>
						
						
						 <tr>
                            <td class="td-register-button" colspan="2">
							
	<?php if($row['mausac_nau']=='' &  $row['mausac_vang']=='' &  $row['mausac_trang']==''&  $row['mausac_den']==''&  $row['mausac_hong']==''&  $row['mausac_xanhla']==''&  $row['mausac_xanhnuocbien']==''&  $row['mausac_xanhngoc']==''&  $row['mausac_xanhden']==''&  $row['mausac_xam']==''&  $row['mausac_tim']==''&  $row['mausac_do']==''&  $row['mausac_cam']==''&  $row['mausac_kem']==''&  $row['mausac_xanhduong']==''&  $row['mausac_soc']==''&  $row['mausac_xanhladam']==''&  $row['mausac_hoatiet']==''&  $row['mausac_bac']==''&  $row['mausac_hongphan']=='')
{?>
  <button type="submit" name="clickmua"   style="font-size: 16px !important;background: #2194d2;color: #ffffff;display: block;font-size: 1.8em;font-weight: normal;padding: 8px 0 8px 0;text-decoration: none;text-align: center;border: 0;width: 100%;"/>Mua hàng không cần đăng nhập</a>	
<?}
else{?>	
    <a  href="index1.php?home=products&<?php echo doidau(mb_strtolower($row['name'],"UTF8"));?>&views=<?php echo $row['id'];?>&mem=1"    style="font-size: 16px;"/>Mua hàng không cần đăng nhập</a>							 			 
<?}?> 						
							

 
 

                            </td>
							
                        </tr>
                    </tbody></table>
			 
			 </div>
            </div>
        </div>
 
</div>	


	 
	</FORM>
	 
	<style>
 

/* The Close Button */
.close1 {
    float: right;
    font-size: 28px;
    font-weight: bold;
    margin-top: -29px;
}

.close1:hover,
.close1:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

 
</style>
	
	<script language="javascript" type="text/javascript">
function check1()
{








for(i=0;i<document.cartform1.mausac.length;i++)
if(document.cartform1.mausac[i].checked==true)
{
check="yes"
}
if(check=="yes")
{
return true;
}
else
{
alert("Vui lòng chọn màu sắc sản phẩm");
return false;
}






return true;
}
</script>	
 <div id="product_tab_swipe" class="tab_swipe">
   <ul>
   	<li class="active" data-page="1" onclick="changeTabPageProduct(1);" data-ptsp-kpi-action-name="<?php echo $home['thongtinsanpham'];?>" data-ptsp-kpi-action-label="Tab <?php echo $home['thongtinsanpham'];?>/<?php echo $home['thongtinsanpham'];?>">
   		<a>Thông tin sản phẩm</a>
   	</li>
   	   
   </ul>
</div>
<div class="product_detail_bound">
   <div class="product_detail_swipe" data-min-height="250" style="-webkit-transition: 0.3s; transition: 0.3s; -webkit-transform: translateX(0px); transform: translateX(0px);">
      <div class="product_page_swipe"   >
			<div class="product_page_inner">
<div class="product_page_description">
<?php echo $row['content'];?>
</div>
			</div>
		</div>
 
		 
		 
   </div>
</div>
 
 <div >
   <?include("system/comment/view.php");?>
		<?include("system/comment/view1.php");?>
 </div>
</div>



















