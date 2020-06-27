<?php
$uri=$_SERVER['REQUEST_URI'];
$url = explode("&", $uri);
$row=20;
$col=1;
$MAXPAGE=5;
$p=0;
$name=$_GET['name'];
$cat=0;
if ($_REQUEST['cat']!='') $cat=killInjection($_REQUEST['cat']);
if($_REQUEST['by']=='')
{
    $by="id";
}
elseif ($_REQUEST['by'] == 'price')
{
    
	$by = "products.price*currency.conver";
}
else
{
	$by = $_REQUEST['by'];
}
if($_REQUEST['order']=='')
{
    $order="desc";
}
else
{
    $order=$_REQUEST['order'];
}
$price=$_REQUEST['price'];
$sql_pri=mysql_query("SELECT * FROM bds_price where id='".$price."'");
$row_pri=mysql_fetch_assoc($sql_pri);
$namepro=$_REQUEST['namepro'];
$city=$_REQUEST['city'];
if ($_REQUEST['city']!='') $where.=" and city=".$_REQUEST['city'];
if ($_REQUEST['tugia']!='')	$where.="  and products.price*currency.conver  >=".$_REQUEST['tugia'];
if ($_REQUEST['dengia']!='')	$where.="  and products.price*currency.conver  <=".$_REQUEST['dengia'];

$catallsub=GetCatAllID($cat);
if ($_REQUEST['p']!='') $p=$_REQUEST['p'];
$sql_pro = "select products.*, products.price*currency.conver as price_lak from products  left join currency on products.currency =  currency.id  where cat in (".$catallsub."0) and products.name like '%".$namepro."%' $where order by ".$by." ".$order." limit ".$row*$col*$p.",".$row*$col;
//echo $sql_pro ;
$result = @mysql_query($sql_pro,$con);
$total=CountRecord("products","cat in (".$catallsub."0) and name like '%".$namepro."%' $where");
$sql_cat=@mysql_query("SELECT name,id FROM cat where id='".$cat."' ");
$row_cat=mysql_fetch_assoc($sql_cat);
?>
<?php 
$sql_mul=@mysql_query("SELECT * FROM cat where id='".$cat."' ");
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
<script type="text/javascript">
var module			= "product";
var catParentId	= <?php echo $row_cat['id'];?>;
var catHasChild	= 1;
var user_logged	= 0;
var con_root_path	= "/home/";
var con_ajax_path	= "/ajax/";
var fs_imagepath	= "http://static.vatgia.com/cjs/mobile20150203/v1/images/";
var fs_redirect	= "LzQzMy9tb2JpbGUuaHRtbA==";
</script>
<script type="text/javascript">var vatgiaTitlePosition	= vatgiaTitlePosition || '';</script>
<script type="text/javascript">
var vatgiaTitlePosition = '<ul id="header_navigate"><?php if($row_mul2['id']==''){?><?}else{?><li><a class="level_0" href="./<?php echo doidau(mb_strtolower($row_mul2['name'],"UTF8"));?>-ct-<?php echo $row_mul2['id'];?>.html"><span><?php echo $row_mul2['name'];?></span></a><ul><?php $sql_sub1=@mysql_query("SELECT id,name,parent FROM cat where parent='".$row_mul2['id']."' ");while($row_sub1=@mysql_fetch_array($sql_sub1)){?><li><a href="./<?php echo doidau(mb_strtolower($row_sub1['name'],"UTF8"));?>-ct-<?php echo $row_sub1['id'];?>.html"><?php echo $row_sub1['name'];?></a></li><?}?></ul></li><?}?><?php if($row_mul1['id']==''){?><?}else{?><li><a class="level_0" href="./<?php echo doidau(mb_strtolower($row_mul1['name'],"UTF8"));?>-ct-<?php echo $row_mul1['id'];?>.html"><span><?php echo $row_mul1['name'];?></span></a><ul><?php $sql_sub2=@mysql_query("SELECT id,name,parent FROM cat where parent='".$row_mul1['id']."' ");while($row_sub2=@mysql_fetch_array($sql_sub2)){?><li><a href="./<?php echo doidau(mb_strtolower($row_sub2['name'],"UTF8"));?>-ct-<?php echo $row_sub2['id'];?>.html"><?php echo $row_sub2['name'];?></a></li><?}?></ul></li><?}?><li><a class="level_0 level_0_last" href="./<?php echo doidau(mb_strtolower($row_mul['name'],"UTF8"));?>-ct-<?php echo $row_mul['id'];?>.html"><span><?php echo $row_mul['name'];?></span></a></li></ul>';
</script>
<div id="raovat_bredcrum" class="noborder">
<ul id="header_navigate"><?php if($row_mul2['id']==''){?><?}else{?><li><a class="level_0" href="./<?php echo doidau(mb_strtolower($row_mul2['name'],"UTF8"));?>-ct-<?php echo $row_mul2['id'];?>.html"><span><?php echo $row_mul2['name'];?></span></a><ul><?php $sql_sub1=@mysql_query("SELECT id,name,parent FROM cat where parent='".$row_mul2['id']."' ");while($row_sub1=@mysql_fetch_array($sql_sub1)){?><li><a href="./<?php echo doidau(mb_strtolower($row_sub1['name'],"UTF8"));?>-ct-<?php echo $row_sub1['id'];?>.html"><?php echo $row_sub1['name'];?></a></li><?}?></ul></li><?}?><?php if($row_mul1['id']==''){?><?}else{?><li><a class="level_0" href="./<?php echo doidau(mb_strtolower($row_mul1['name'],"UTF8"));?>-ct-<?php echo $row_mul1['id'];?>.html"><span><?php echo $row_mul1['name'];?></span></a><ul><?php $sql_sub2=@mysql_query("SELECT id,name,parent FROM cat where parent='".$row_mul1['id']."' ");while($row_sub2=@mysql_fetch_array($sql_sub2)){?><li><a href="./<?php echo doidau(mb_strtolower($row_sub2['name'],"UTF8"));?>-ct-<?php echo $row_sub2['id'];?>.html"><?php echo $row_sub2['name'];?></a></li><?}?></ul></li><?}?><li><a class="level_0 level_0_last" href="./<?php echo doidau(mb_strtolower($row_mul['name'],"UTF8"));?>-ct-<?php echo $row_mul['id'];?>.html"><span><?php echo $row_mul['name'];?></span></a></li></ul>
</div>
<script type="text/javascript">
					$('#raovat_bredcrum').html(vatgiaTitlePosition);
</script>
<div class="category_top_sub">
		<div class="suggest_wrap max_height">
			<div class="suggest_content">
 
					<span class="sub_slide">
						<a href="<?php echo doidau(mb_strtolower($row_cat['name'],"UTF8"));?>-ct-<?php echo $row_cat['id'];?>.html" data-ptsp-kpi-action-name="Trang danh mục" data-ptsp-kpi-action-label="Danh mục gợi ý"><?php echo $row_cat['name'];?></a>
				  	</span>
<?php 
$sql_catsub=@mysql_query("SELECT * FROM cat where parent='".$row_cat['id']."' ");
while($row_catsub=@mysql_fetch_array($sql_catsub))
{
    ?>
					<span class="sub_slide">
						<a href="./<?php echo doidau(mb_strtolower($row_catsub['name'],"UTF8"));?>-ct-<?php echo $row_catsub['id'];?>.html" data-ptsp-kpi-action-name="Trang danh mục" data-ptsp-kpi-action-label="Danh mục gợi ý"><?php echo $row_catsub['name'];?></a>
				  	</span>
<?}?>
							</div>
		</div>	
</div>
    <div style="clear: both;"></div>
<div id="start_hot_tab"></div>
 
 
 
<div id="category_product_bound">
	<div id="category_product_list" class="category_product_list">
<?php
while($row_pro=@mysql_fetch_array($result))
{
    $sql_user=@mysql_query("SELECT * FROM user_shop where user='".$row_pro['user']."' ");
    $row_user=@mysql_fetch_assoc($sql_user);
    $sql_city=@mysql_query("SELECT id,name FROM city where id='".$row_pro['city']."' ");
    $row_city=@mysql_fetch_assoc($sql_city);
    $sql_cr=mysql_query("SELECT * FROM currency where id='".$row_pro['currency']."'");
	$row_cr=mysql_fetch_assoc($sql_cr);
    ?>
<div class="block list_item">
	<a href="./<?php echo doidau(mb_strtolower($row_pro['name'],"UTF8"));?>-pro-<?php echo $row_pro['id'];?>.html">
		<div class="picture">
			<img class="load_img" src="<? echo $row_pro['image'];?>" alt="<? echo $row_pro['name'];?>">
		</div>
		<div class="info">
		
			<div class="title"><span class="price" style="color: black;font-size: 12px;"><? echo $row_pro['name'];?></span></div>
			<div class="price_show">
<?php if($row_pro['price_special']=='0')
                {?>
                <?php if($row_pro['price_special']=='0'){?><div class="new_price"><span class="price">Liên hệ</span></div><?}else{?><div class="new_price"><span class="price"><?php echo number_format($row_pro['price_special'],0);?> đ</span></div><?}?>
                <?}else{?>
                <div class="new_price"><span class="price"><?php echo number_format($row_pro['price_special'],0);?><span style="vertical-align: super;font-size: 11px;">đ</span> 
				
				
				<?php if($row_pro['price'] <='0')
                {?>
                <?}else{?>
 				<span style=" color: #858c8c; font-size: 10px; text-decoration: line-through; "><?php echo number_format($row_pro['price'],0);?>
				<span style="vertical-align: super; font-size: 80%;">đ</span></span>
                <?}?>
				
				
				</span></div>
 
<?}?>	   
                  				
							</div>
						<div class="hit_cphc">
						<span class="update">Lượt xem: <? echo $row_pro['view'];?></span>
						<br>
						<span class="update">Người mua: <? echo $row_pro['nguoimua'];?></span>
						<br>
<?php if($row_user['diemlua']=="")
{?>
 <?}else{?>
 	<span class="update" style=" color: red; ">Tặng ngay: <?php echo str_replace(",",",",number_format($row_pro['price_special']*$row_user['diemlua']/100,0));?> điểm Lửa</span>
	<br>											
<?}?>

<?php if($row_user['hotrovanchuyen_tu'] <='0' )
                {?>
						
                <?}else{?>
				<?php if($row_pro['price_special'] > $row_user['hotrovanchuyen_tu'] )
                {?>
	 	<span class="update" style=" color: blue; ">	<i class="fa fa-fw fa-truck" style=" color: #4CAF50; font-size: 16px; "></i>Miễn phí vận chuyển</span>
		<br>
                <?}else{?>
		 
				<?}?>
	

                <?}?>
					

						<span style=" font-weight: bold; ">Shop bán: <b style=" color: #137116; font-weight: bold; ">
						
							<?php if($row_user['level_shop']=='0' )
                {?>
 						<i class="fa fa-fw fa-fire" style="color: red;font-size: 12px;"></i>
                <?}else{?>
		 
				<?}?>

						
						<? echo $row_user['company'];?></b></span>						
						</div>
				
		</div>
	</a>
</div>
<?}?>
	</div>
</div>
<? if ($total>0) { ?>
<div class="hoidap_paging">
	<table>
		<tbody><tr>
<?
$pages=count_page($total,($row*$col));
echo '<td width="50">';
$param="";
if ($p>1) echo '<a class="paging_button" data-ptsp-kpi-action-name="Trang danh mục" data-ptsp-kpi-action-label="Chuyển trang" href="'.$url[0].'&p=0">««</a></td> ';
if ($p>0) echo '<td width="50"><a class="paging_button" data-ptsp-kpi-action-name="Trang danh mục" data-ptsp-kpi-action-label="Chuyển trang" title="Back" href="'.$url[0].'&p='.($p-1).'">«</a></td> ';
$from=($p-4>0?$p-1:0);
$to=($p+4<$pages?$p+4:$pages);
for ($i=$from;$i<$to;$i++)
{
	if ($i!=$p) echo '<td><a class="paging_button " data-ptsp-kpi-action-name="Trang danh mục" data-ptsp-kpi-action-label="Chuyển trang" href="'.$url[0].'&p='.$i.'">'.($i+1).'</a></td> ';
	else echo '<td><a class="paging_button active" data-ptsp-kpi-action-name="Trang danh mục" data-ptsp-kpi-action-label="Chuyển trang">'.($i+1).'</a></td> ';
}
if ($p<$i-1) echo '<td width="50"><a class="paging_button" data-ptsp-kpi-action-name="Trang danh mục" data-ptsp-kpi-action-label="Chuyển trang" title="Next" href="'.$url[0].'&p='.($p+1).'">»</a></td> ';
if ($p<$pages-1) echo '<td width="50"><a class="paging_button" data-ptsp-kpi-action-name="Trang danh mục" data-ptsp-kpi-action-label="Chuyển trang" title="Last" href="'.$url[0].'&p='.($pages-1).'">»»</a></td>'; 
echo '</td>';
?>
		</tr>
	</tbody>
    </table>
</div>
<?}?>
<div style="text-align: center; padding-top: 10px;"></div>
<div class="category_top_sub">
		<div class="suggest_wrap max_height">
			<div class="suggest_content">
 
					<span class="sub_slide">
						<a href="<?php echo doidau(mb_strtolower($row_cat['name'],"UTF8"));?>-ct-<?php echo $row_cat['id'];?>.html" data-ptsp-kpi-action-name="Trang danh mục" data-ptsp-kpi-action-label="Danh mục gợi ý"><?php echo $row_cat['name'];?></a>
				  	</span>
<?php 
$sql_catsub=@mysql_query("SELECT * FROM cat where parent='".$row_cat['id']."' ");
while($row_catsub=@mysql_fetch_array($sql_catsub))
{
    ?>
					<span class="sub_slide">
						<a href="./<?php echo doidau(mb_strtolower($row_catsub['name'],"UTF8"));?>-ct-<?php echo $row_catsub['id'];?>.html" data-ptsp-kpi-action-name="Trang danh mục" data-ptsp-kpi-action-label="Danh mục gợi ý"><?php echo $row_catsub['name'];?></a>
				  	</span>
<?}?>
							</div>
		</div>	
</div>