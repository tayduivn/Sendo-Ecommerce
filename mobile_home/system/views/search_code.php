<?php
$uri=$_SERVER['REQUEST_URI'];
$url = explode("&", $uri);
?>
<?php if($_REQUEST['type']=='1')
{?>
<?
	$where="1=1";
	$keywords=killInjection(trim($_REQUEST['keywords']));
	if ($keywords!='')
	{
		$where.=" and (name like '%".$keywords."%' or name like '%".$keywords."%' or code like '%".$keywords."%' or user like '%".$keywords."%' or tukhoaseo like '%".$keywords."%' or tieudeseo like '%".$keywords."%'  or motaseo like '%".$keywords."%' or price_special like '%".$keywords."%'  or date like '%".$keywords."%' or company like '%".$keywords."%' or phone like '%".$keywords."%' or address like '%".$keywords."%'";
		$where.=") ";
	}
	if ($_REQUEST['id']!='')	$where.=" and id=".$_REQUEST['id'];
	if ($_REQUEST['pfrom']!='')	$where.=" and products_price>=".$_REQUEST['pfrom'];
	if ($_REQUEST['pto']!='') $where.=" and products_price<=".$_REQUEST['pto'];
	if ($_REQUEST['dfrom']!='')	$where.=" and products_date_added>=".$_REQUEST['dfrom'];
	if ($_REQUEST['dto']!='') $where.=" and products_date_added<=".$_REQUEST['dto'];
	
	$MAXPAGE=16;
	$p=0;
	if ($_REQUEST['p']!='') $p=$_REQUEST['p'];
	
	$result = mysql_query("select count(*) from products where $where ");
	$total=mysql_fetch_row($result);

	$sql="select * from products where $where order by id DESC limit ".$p*$MAXPAGE.",".$MAXPAGE;
	$result = mysql_query($sql,$con);
	
?>
<div class="category_product_listing">
	<div class="title">Kết quả phù hợp với từ khóa "<b><?php echo $keywords;?></b>" <b style="color:#FF0000"><?php echo $total[0];?> </b>Sản phẩm</div>
	<div class="content">
		<div class="productList">
			<table id="category_product_exclusive" cellpadding="0" cellspacing="0" width="100%">
				<tbody>
<?php
for($i=0;$i<8;$i++)
{
        $sql_city=mysql_query("SELECT * FROM city where id='".$row['city']."' ");
        $row_city=mysql_fetch_assoc($sql_city);
   
		$sql_cr=mysql_query("SELECT * FROM currency where id='".$row['currency']."'");
        $row_cr=mysql_fetch_assoc($sql_cr);
?>
                <tr>
<?php

for($j=0;$j<2&&$row=mysql_fetch_array($result);$j++)
{?>
			<div class="block list_item">
	<a href="./<?php echo doidau(mb_strtolower($row['name'],"UTF8"));?>-pro-<?php echo $row['id'];?>.html">
		<div class="picture">
			<img class="load_img" src="<? echo $row['image'];?>" alt="<? echo $row['name'];?>">
		</div>
		<div class="info">
		
			<div class="title"><span class="price" style="color: black;font-size: 12px;"><? echo $row['name'];?></span></div>
			<div class="price_show">
<?php
 $sql_user=@mysql_query("SELECT * FROM user_shop where user='".$row['user']."' ");
    $row_user=@mysql_fetch_assoc($sql_user);

 if($row['price_special']=='0')
                {?>
                <?php if($row['price_special']=='0'){?><div class="new_price"><span class="price">Liên hệ</span></div><?}else{?><div class="new_price"><span class="price"><?php echo number_format($row['price_special'],0);?> đ</span></div><?}?>
                <?}else{?>
                <div class="new_price"><span class="price"><?php echo number_format($row['price_special'],0);?><span style="vertical-align: super;font-size: 11px;">đ</span> 
				
				
				
				<?php if($row['price'] <='0')
                {?>
                <?}else{?>
 				<span style=" color: #858c8c; font-size: 10px; text-decoration: line-through; "><?php echo number_format($row['price'],0);?>
				<span style="vertical-align: super; font-size: 80%;">đ</span></span>
                <?}?>
				
				
				</span></div>
 
<?}?>	   
                  				
							</div>
						<div class="hit_cphc">
						<span class="update">Lượt xem: <? echo $row['view'];?></span>
						<br>
						<span class="update">Người mua: <? echo $row['nguoimua'];?></span>
						<br>
<?php if($row_user['diemlua']=="")
{?>
 <?}else{?>
 	<span class="update" style=" color: red; ">Tặng ngay: <?php echo str_replace(",",",",number_format($row['price_special']*$row_user['diemlua']/100,0));?> điểm Lửa</span>
	<br>											
<?}?>

<?php if($row_user['hotrovanchuyen_tu'] <='0' )
                {?>
						
                <?}else{?>
				<?php if($row['price_special'] > $row_user['hotrovanchuyen_tu'] )
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
				</tr>
<?}?>
			</tbody></table>		
<div class="page_div">
<table class="tablePaginationBar">
<tbody>
<tr>
<?
$pages=count_page($total[0],$MAXPAGE);
$param="";
echo '<td width="50">';
$param="";
if ($p>1) echo '<a class="paging_button" data-ptsp-kpi-action-name="Trang danh mục" data-ptsp-kpi-action-label="Chuyển trang" href="'.$uri.'&p=0">««</a></td> ';
if ($p>0) echo '<td width="50"><a class="paging_button" data-ptsp-kpi-action-name="Trang danh mục" data-ptsp-kpi-action-label="Chuyển trang" title="Back" href="'.$uri.'&p='.($p-1).'">«</a></td> ';
$from=($p-4>0?$p-1:0);
$to=($p+4<$pages?$p+4:$pages);
for ($i=$from;$i<$to;$i++)
{
	if ($i!=$p) echo '<td><a class="paging_button " data-ptsp-kpi-action-name="Trang danh mục" data-ptsp-kpi-action-label="Chuyển trang" href="'.$uri.'&p='.$i.'">'.($i+1).'</a></td> ';
	else echo '<td><a class="paging_button active" data-ptsp-kpi-action-name="Trang danh mục" data-ptsp-kpi-action-label="Chuyển trang">'.($i+1).'</a></td> ';
}
if ($p<$i-1) echo '<td width="50"><a class="paging_button" data-ptsp-kpi-action-name="Trang danh mục" data-ptsp-kpi-action-label="Chuyển trang" title="Next" href="'.$uri.'&p='.($p+1).'">»</a></td> ';
if ($p<$pages-1) echo '<td width="50"><a class="paging_button" data-ptsp-kpi-action-name="Trang danh mục" data-ptsp-kpi-action-label="Chuyển trang" title="Last" href="'.$uri.'&p='.($pages-1).'">»»</a></td>'; 
echo '</td>';
?>
</tr>
</tbody>
</table>
</div>		
		</div>
	</div>
</div>
<?}elseif($_REQUEST['type']=='2')
{?>
<?
	$where="1=1";
	$keywords=killInjection(trim($_REQUEST['keywords']));
	if ($keywords!='')
	{
		$where.=" and (name like '%".$keywords."%' or content like '%".$keywords."%'";
		if ($_REQUEST['search_in_description']=='') 
			$where.=" or content like '%".$keywords."%' "; 
		$where.=") ";
	}
	if ($_REQUEST['city']!='')	$where.=" and city=".$_REQUEST['city'];
	if ($_REQUEST['manufacturers_id']!='')	$where.=" and providers_id=".$_REQUEST['manufacturers_id'];
	if ($_REQUEST['pfrom']!='')	$where.=" and products_price>=".$_REQUEST['pfrom'];
	if ($_REQUEST['pto']!='') $where.=" and products_price<=".$_REQUEST['pto'];
	if ($_REQUEST['dfrom']!='')	$where.=" and products_date_added>=".$_REQUEST['dfrom'];
	if ($_REQUEST['dto']!='') $where.=" and products_date_added<=".$_REQUEST['dto'];
	
	$MAXPAGE=15;
	$p=0;
	if ($_REQUEST['p']!='') $p=$_REQUEST['p'];
	
	$result = mysql_query("select count(*) from avd where $where order by id DESC",$con);
	$total=mysql_fetch_row($result);

	$sql="select * from avd where $where limit ".$p*$MAXPAGE.",".$MAXPAGE;
	$result = mysql_query($sql,$con);
 ?>
<div class="title">Kết quả phù hợp với từ khóa "<b><?php echo $keywords;?></b>" <b style="color:#FF0000"><?php echo $total[0];?> </b>rao vặt</div>
<div class="raovat_listing_bound">
    <input type="hidden" id="type_page" value="type">
    <input type="hidden" id="deny_id_top" value="11522418,11496525,11575510">
    <input type="hidden" id="deny_id_all" value="11522418,11496525,11575510">
<div class="raovat_listing">
<?php
for($j=1;$j<=$MAXPAGE&&$row=@mysql_fetch_array($result);$j++)
{
    $sql_cat_adv=@mysql_query("SELECT name FROM adv_cat where id='".$row['adv_cat']."' ");
    $row_cat_adv=@mysql_fetch_assoc($sql_cat_adv);
    $sql_city=@mysql_query("SELECT id,name FROM city where id='".$row['city']."' ");
    $row_city=@mysql_fetch_assoc($sql_city);
    $sql_cr=mysql_query("SELECT * FROM currency where id='".$row['currency']."'");
    $row_cr=mysql_fetch_assoc($sql_cr);
    if($j%2)
    {
        $color="#EAEAEA";
    }
    else
    {
        $color="#FFFFFF";
    }
    if($j<=$row_config_home['adv_job_vip'])
    {
        $vip="<i class=\"vcon-vip\"></i>";
    }
    else
    {
        $vip="";
    }
?>
 
<?}?>
</div>
</div>
 
 
 
 
<?}else{?>
<?}?>