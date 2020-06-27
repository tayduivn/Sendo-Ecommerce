

<?php
$uri=$_SERVER['REQUEST_URI'];
$url = explode("&", $uri);
$row=65;
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
else
{
    $by=$_REQUEST['by'];
}
if($_REQUEST['order']=='')
{
    $order="desc";
}
else
{
    $order=$_REQUEST['order'];
}
$city=$_REQUEST['city'];
if($_REQUEST['city']=='')
{
$where="";
}
else
{
$where="and city=".$city;
}
$namepro=$_REQUEST['namepro'];
if ($_REQUEST['tugia']!='')	$where.="  and price_special  >=".$_REQUEST['tugia'];
if ($_REQUEST['dengia']!='')	$where.="  and price_special  <=".$_REQUEST['dengia'];
$catallsub=GetCatAllID($cat);
if ($_REQUEST['p']!='') $p=$_REQUEST['p'];
$sql_pro = "select * from products where id > '1'  and status ='0'   $where and name like '%".$namepro."%'  order by ".$by." ".$order." limit ".$row*$col*$p.",".$row*$col;
$result = @mysql_query($sql_pro,$con);
$sql_pro1 = "select * from products where id > '1' and status ='0'   $where and name like '%".$namepro."%'  order by ".$by." ".$order." limit ".$row*$col*$p.",".$row*$col;
$result1 = @mysql_query($sql_pro1,$con);
$total=CountRecord("products","id > '1'  and status ='0'    $where");
$sql_cat=@mysql_query("SELECT name,id,parent FROM cat where id='".$cat."' ");
$row_cat=mysql_fetch_assoc($sql_cat);
$sql_cat1=@mysql_query("SELECT name,id,parent FROM cat where id='".$row_cat['parent']."' ");
$row_cat1=mysql_fetch_assoc($sql_cat1);
$sql_sub1=@mysql_query("SELECT id,name,parent FROM cat where parent='".$row_cat1['id']."' ");
$toal_sub1=mysql_num_rows($sql_sub1);
$sql_cat2=@mysql_query("SELECT name,id,parent FROM cat where id='".$row_cat1['parent']."' ");
$row_cat2=mysql_fetch_assoc($sql_cat2);
$sql_sub2=@mysql_query("SELECT id,name,parent FROM cat where parent='".$row_cat2['id']."' ");
$toal_sub2=mysql_num_rows($sql_sub2);
?>

<div class="space"></div>

<div style="
       text-transform: uppercase;
    white-space: nowrap;
    font-size: 18px;

    margin-right: 10px;
    color: #0b7510;
    /* line-height: 30px; */
    font-family: 'Roboto', Helvetica, Arial,sans-senif;
    font-weight: bold;float: left;"
>SẢN PHẨM MỚI NHẤT VỬA ĐƯỢC CẬP NHẬT TRÊN HỆ THỐNG SHOPCANTHO.VN
</div>
         <div style="
    line-height: 20px;
" >
<?$pages=count_page($total,($row*$col));?>
        </div>
            
        
		
<div id="">

<div id="content_center">
<div class="d-col-center">
        

        <div >
      
        </div>        
<div id="ctl00_MainContent_DivHeaderLever2"></div>

        <div class="d-product-list">
            <div class="d-product-list-top">
						        <div class="d-top-categories">
            <ul class="ul-top-categories">
			
			
			







<div >
<?php 
$sql_catsub=@mysql_query("SELECT * FROM cat where parent='".$row_cat['id']."' ");
$i=0;
while($row_catsub=@mysql_fetch_array($sql_catsub))
{
    if($i%10)
    {
        $div="<div style=\"background-image:url('./images/icon_news.png');background-repeat:no-repeat;background-position:0px 10px\">";
    }
    else

    ?>
<?php echo $div;?>
<li><h2><a href="./<?php echo doidau(mb_strtolower($row_catsub['name'],"UTF8"));?>-ct-<?php echo $row_catsub['id'];?>.html"><?php echo $row_catsub['name'];?></a></h2></li>
</div>
<?
$i++;
}?>
<!-- bắt đàu ten 2-->

<!-- ket thuc ten 2-->
</div>
<div>	
			
			
			

                

                
                	
            </ul>
        </div> 
		
		
                <!--div id="list_cat" style="clear: both;">
<div style="float: left;">
<div style="float:left;width:6px;height:27px;background-image: url('images/bg_cat_left.png');"></div>
<div style="float:left;line-height:240%;padding-left:10px;padding-right:10px;height:27px;background-image: url('images/bg_cat_center.png');">
<a href="./<?php echo doidau(mb_strtolower($row_cat['name'],"UTF8"));?>-ct-<?php echo $row_cat['id'];?>.html">Mới cập nhật</a>
</div>
<div style="float:left;width:6px;height:27px;background-image: url('images/bg_cat_right.png');"></div>
</div>
<div style="float: left;">
<div style="float:left;width:6px;height:27px;background-image: url('images/bg_cat_left.png');"></div>
<div style="float:left;line-height:240%;padding-left:10px;padding-right:10px;height:27px;background-image: url('images/bg_cat_center.png');">
<a href="<?php echo $url[0];?>&by=price&order=asc">Giá rẻ nhất</a>
</div>
<div style="float:left;width:6px;height:27px;background-image: url('images/bg_cat_right.png');"></div>
</div>
<div style="float: left;">
<div style="float:left;width:6px;height:27px;background-image: url('images/bg_cat_left.png');"></div>
<div style="float:left;line-height:240%;padding-left:10px;padding-right:10px;height:27px;background-image: url('images/bg_cat_center.png');">
<a href="<?php echo $url[0];?>&by=price&order=desc">Giá cao nhất</a>
</div>
<div style="float:left;width:6px;height:27px;background-image: url('images/bg_cat_right.png');"></div>
</div>
<div style="float: right;padding-top:5px">
	<select style="width:160px;" onchange="window.open(this.options[this.selectedIndex].value,'_self');" class="Normal" id="dnn_ctr424_Links_cboLinks" name="ddCat">
<?
	$ms=GetListCity(0);
	echo "<option value=".$url[0].">[Tất cả khu vực]</option>";
	foreach ($ms as $m)
		if ($m[0]!=$_REQUEST['city'])
			echo "<option value=".$url[0]."&city=".$m[0].">".$m[1]."</option>";
		else
			echo "<option selected value=".$url[0]."&city=".$m[0].">".$m[1]."</option>";
?>
	</select>
</div>
</div>
<!--begin tk-->
<div class="d-product-list">
<div class="d-product-list-top">
                <div class="d-searchby">
                    <h3>Tìm kiếm theo</h3>
                    <div class="d-row"  >
					
                    <form action="" method="POST">
                    
                        <div class="d-item">
                             <span style="margin-left:10px;">Từ khóa tìm</span>
                            <input name="namepro" type="text" style="    /* width: 85px; */
    text-align: center;
    width: 166px;
    height: 30px;
    border: 1px solid #d4c9c9;" value="<?echo $_REQUEST['namepro']?>" placeholder="Nhập tên sản phẩm">
	                            <input class="btntimkiem" style="margin-left: 5px;
    padding: 4px 13px 5px 11px;" id="btnsearch" type="submit" value="Tìm kiếm">
                        </div>
						
                        <div class="d-item">
                            <span style="margin-left:10px;">Lọc sản phẩm</span>
                            <input name="tugia" type="text" style="    /* width: 85px; */
    text-align: center;
    width: 76px;
    height: 30px;
    border: 1px solid #d4c9c9;" placeholder="Từ giá" value="<?echo $_REQUEST['tugia']?>">
                            <span style="margin:0 3px;">-</span>
                            <input name="dengia" type="text" style="    /* width: 85px; */
    text-align: center;
    width: 76px;
    height: 30px;
    border: 1px solid #d4c9c9;" placeholder="Đến giá" value="<?echo $_REQUEST['dengia']?>">
                            <input class="btnlocgia" style="margin-left: 5px;
    padding: 4px 13px 5px 11px;" id="btnsearch" type="submit" value="Lọc giá">
	
                        </div>
						<div style="float:left;line-height:240%;padding-left:10px;padding-right:10px;height:30px;background: #f70b0b;">
<a style="
    color: white;
" href="spm.html">Mới cập nhật</a>
</div>
<div style="float:left;line-height:240%;padding-left:10px;padding-right:10px;height:30px;background: #3c8e36;">
<a style="
    color: white;
" href="spmgiare.html">Giá rẻ nhất</a>
</div>
<div style="float:left;line-height:240%;padding-left:10px;padding-right:10px;height:30px;background: #2d3392;">
<a style="
    color: white;
" href="spmgiacao.html">Giá cao nhất</a>
</div>

</div>
                    </form>
					<div style="float: right;padding-top:5px">
	<select style="width:120px;" onchange="window.open(this.options[this.selectedIndex].value,'_self');" class="Normal" id="dnn_ctr424_Links_cboLinks" name="ddCat">
<?
	$ms=GetListCity(0);
	echo "<option value=".$url[0].">Tỉnh/Thành</option>";
	foreach ($ms as $m)
		if ($m[0]!=$_REQUEST['city'])
			echo "<option value=spmcity.html&city=".$m[0].">".$m[1]."</option>";
		else
			echo "<option selected value=spmcity.html&city=".$m[0].">".$m[1]."</option>";
?>
	</select>
                    </div>          
                </div>
            </div>
</div>
<!--end tk-->
</div>
</div>

<?php
for($i=1;$i<=$row&&$row_pro=@mysql_fetch_array($result);$i++)
{
    $sql_user=@mysql_query("SELECT * FROM user_shop where user='".$row_pro['user']."' ");
    $row_user=@mysql_fetch_assoc($sql_user);
    $sql_city=@mysql_query("SELECT id,name FROM city where id='".$row_pro['city']."' ");
    $row_city=@mysql_fetch_assoc($sql_city);
    if($i%2)
    {
        $color="#EAEAEA";
    }
    else
    {
        $color="#FFFFFF";
    }
?>
<div class="row_pro_cat">

<?php if($row_pro['nguoimua']<'10')

{?><?}else{?>
<div style="position: absolute;color:#FFFFFF;margin-left:-5px;font-size:12px;width:80px;height:25px;text-align:center;line-height:20px;background-image: url('images/giamgia.png');"><i class="fa fa-check-square-o" style="color: #fffff;"></i> Bán chạy</div>
<?}?>

<?php
$goc=$row_pro['price']; 
$km=$row_pro['price_special'];
$phantram=(($goc-$km)/$goc)*100;
if(($goc-$km)==$goc)
{?><?}else{?>

<?php if($row_pro['price']<='0')

{?><?}else{?>
<div style="position: absolute;margin-left: 165px;background-color: #fff;font-size: 13px;color: #e5101d;text-align: center;font-weight: 300;width: 52px;height: 22px;line-height: 20px;border-radius: 2px;border: 1px solid #e5101d;margin-top: 4px;">-<?php echo number_format($phantram,1);?>%</div>

<?}?>

<?}?>
 
 

<div style="padding-top:0px">

<a onmouseover='showtip("<div><table><tr><td style=\"padding-left:20px;padding-top:10px;height:10px\"><? echo $row_pro['name'];?><br>Giá bán: <? if ($row_pro['price']<=0) echo 'Liên hệ'; else echo number_format($row_pro['price']); ?></td></tr><tr><td valign=\"top\"><img src=\"<? echo str_replace("_thumbnail","",$row_pro['image']);?>\" width=\"350px\" border=\"0px\"></td></td></tr></table></div>");' onmouseout="hidetip();" id="xemsanpham"  href="./<?php echo doidau(mb_strtolower($row_pro['name'],"UTF8"));?>-pro-<?php echo $row_pro['id'];?>.html">
<img  src="<?php echo $row_pro['image'];?>" width="223" height="223">

</a>
</div>

<div style="padding-top:5px">
 <div style="    padding-top: 5px;
    color: #ff3200;
    font-size: 11px;
    font-weight: bold;
    padding: 10px 13px;
    padding-top: 8px;
    color: #F00;
    font-weight: bold;
    font-size: 18px;"><?php echo number_format($row_pro['price_special'],0);?><span style="
    vertical-align: super;
        font-size: 11px;
">đ</span>


<?php if($row_pro['price'] <='0')
                {?>
                <?}else{?>
				
<span style="padding-top: 6px;text-decoration: line-through;
    /* color: #ff3200; */
    /* font-size: 11px; */
    /* font-weight: bold; */
    /* padding: 4px 42px; */
    /* padding-top: 8px; */
    color: #4c4444;
    /* font-weight: bold; */
    font-size: 12px;
    /* padding-bottom: 15px; */
    float: right;"><?php echo number_format($row_pro['price'],0);?><span style="
    vertical-align: super;
        font-size: 11px;
">đ</span>
</span>
                <?}?>




</div>

<a style="padding: 0 13px;font-size: 13px;color: #666;
    display: block;
    overflow: hidden;
    line-height: 16px;
    height: 16px;
    padding: 0 5px;
    font-weight: normal;
    font-size: 13px;
    text-overflow: ellipsis;
    white-space: nowrap;
" href="./<?php echo doidau(mb_strtolower($row_pro['name'],"UTF8"));?>-pro-<?php echo $row_pro['id'];?>.html">
<?php echo dwebvn($row_pro['name'],10);?>




</a>

	<?php if($row_pro['nguoimua']>'0')
                {?>
				<span data-tooltip-text="Đã có <?php echo $row_pro['nguoimua'];?> lượt mua" class="tooltip1" style="float: left;
    margin-top: 11px; 
    margin-left: 6px;
    font-size: 12px;
    
        color: #666;">
	<b><i class="fa fa-fw fa-tags"></i><?php echo $row_pro['nguoimua'];?></b>
	</span>
                <?}else{?>
               

                <?}?>
	<span data-tooltip-text="Đã có <?php echo $row_pro['view'];?> lượt xem" class="tooltip2" style="float: left;
    margin-top: 11px;
    margin-left: 10px;
    font-size: 12px;
    
        color: #666;">
	<b><i class="fa fa-fw fa-eye"></i><?php echo $row_pro['view'];?></b>
	</span>
	
	
		<?php if($row_user['hotrovanchuyen_tu'] <='0' )
                {?>
						
                <?}else{?>
				<?php if($row_pro['price_special'] > $row_user['hotrovanchuyen_tu'] )
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
	
                <?}else{?>
				<span data-tooltip-text="Tặng ngay <?php echo str_replace(",",",",number_format($row_pro['price_special']*$row_user['diemlua']/100,0));?> điểm Lửa " class="tooltip3" style="    float: right;
    margin-top: 11px;
    margin-right: 5px;
    font-size: 12px;
    
    color: #666;;">
	<span style="color: red;font-size: 13px;" class="glyphicon glyphicon-fire"></span>
	</span>
				<?}?>
	
</div>

<?php if($row_pro['price_special']=='0')
                {?>
				<!--div style="padding-top:5px;color:#ff3200;font-size:11px;font-weight:bold">Giá: <?php if($row_pro['price']=='0'){?>Liên hệ<?}else{?><?php echo number_format($row_pro['price'],0);?> Đ <?}?></div-->
                <?}else{?>
               
				<!--div style="padding-top:5px;color:#333333;font-size:11px;font-weight:bold">Giá cũ: <s><?php echo number_format($row_pro['price'],0);?> VNĐ</s></div-->
                <?}?>
<div class="row_pro_cat_store">

<div style="    float: left;
    width: 213px;
    padding: 5px;
    background: #f4f4f4;
    margin-top: 14px;">
	<?php if($row_user['level_shop']=='0'){?>
<span >
<a data-tooltip-text="Shop Lửa Đỏ -  Bán hàng uy tín" class="tooltip4" href="/<?php echo $row_user['user'];?>" target="_blank">
<img src="/images/shopluado-icon.png"  >
</a>

</span>

<?}else{?><?}?><a href="http://<?php echo $domain_config;?>/<?php echo $row_user['user'];?>" style="
    color: #125207;
    font-weight: bold;
" target="_blank">

</a>
<?php if($row_user['level_shop']=='3'){?>
<span >
<a href="http://<?php echo $domain_config;?>/<?php echo $row_user['user'];?>" target="_blank">
<span style=" height: 25px; " class="glyphicon glyphicon-calendar"></span>

</a>

</span>

<?}else{?><?}?><a href="http://<?php echo $domain_config;?>/<?php echo $row_user['user'];?>" style="
    color: #125207;
    font-weight: bold;
" target="_blank">
<?php echo dwebvn($row_user['company'],5);?>
</a>
<br>

</div>


</div>
</div>



<?}?>

<? if ($total>0) { ?>
<div >
<hr color="#E9E9E9" width="100%" SIZE=1 align="center">
</div>
<div class="pagination" align="center">
<TABLE bgcolor="#FFFFFF" cellSpacing=10 cellPadding=0 width="100%" border=0 id="table35" style="line-height: 120%; text-align: justify" align="center">
<?

$param="";
if ($p>1) echo '<a class="buton_timkiem" title="&#272;&#7847;u tiên" href="'.$url[0].'&p=0">Đầu tiên</a>  ';
if ($p>0) echo '<a class="buton_timkiem" title="&#272;&#7847;u tiên" href="'.$url[0].'&p='.($p-1).'">Trang trước</a>';
$from=($p-8>0?$p-1:0);
$to=($p+8<$pages?$p+8:$pages);
for ($i=$from;$i<$to;$i++)
{
	if ($i!=$p) echo '<a href="'.$url[0].'&p='.$i.'">'.($i+1).'</a> ';
	else echo '<a class="active1">'.($i+1).'</a> ';
}
if ($p<$i-1) echo '<a class="buton_timkiem" title="Ti&#7871;p theo" href="'.$url[0].'&p='.($p+1).'">Trang tiếp</a>';
if ($p<$pages-1) echo '<a class="buton_timkiem" title="Cu&#7889;i cùng" href="'.$url[0].'&p='.($pages-1).'">Cuối cùng</a>'; 
echo '</td></tr></table>';
?>

</div>
<?
}
?>
</div>
</div>