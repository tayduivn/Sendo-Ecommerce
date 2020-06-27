
        

<?
$MAXPAGE=15;


	switch ($_GET['action'])
	{
		case 'del' :
			$id = $_GET['id'];
			$sql = "delete from products where id='".$id."' and user='".$_SESSION['log']."'";
			@$result = mysql_query($sql,$con);
			if ($result) echo "";
			else echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không thể xóa')
    ;
    </SCRIPT>";
			break;
	}
?>

<?php
	if (isset($_POST['ButDel'])) {
		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			$sql_pro=@mysql_query("SELECT * FROM products where id='".$id."'  ");
			$pro=@mysql_fetch_array($sql_pro);
			$link="../";
			if ($pro)
			{
				@$result = @mysql_query("delete from products where id='".$id."' and user='".$_SESSION['log']."' ");
				if ($result) {
					$cnt++;
					if (file_exists($link.$pro['image'])) unlink($link.$pro['image']);
					if (file_exists($link.$pro['image_large'])) unlink($link.$pro['image_large']);

				}
			}
		}
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Xóa thành công ".$cnt."  sản phẩm')
    ;
    </SCRIPT>";
	}
	?>
<?
	if (isset($_POST['newstop'])) {
		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			
			$sql_news=mysql_query("SELECT * FROM products where id='".$id."' ");
			$news=mysql_fetch_assoc($sql_news);

			if ($news)
			{
				@$result = mysql_query("update products set top=1 where id='".$id."' ",$con);
				if ($result) {
					$cnt++;

				}
			}
		}
		echo "<p align=center class='err'>Đã thêm ".$cnt." vào tin top</p>";
	}
?>

<?
	$page = $_GET["page"];
	$p=0;
	if ($page!='') $p=$page;
	$where="1=1";
	if ($_REQUEST['cat']!='') $where="id=".$_REQUEST['cat'];
?>









<input type=hidden name="page" value="<? echo $_REQUEST['page']; ?>">


	  <section class="content-header" style="margin-bottom: 10px;">
      <h1>
        Quản lý đơn hàng
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a >Quản lý đơn hàng</a></li>
      </ol>
    </section>
<section class="content">
<div class="box box-info">
            
			 
			 
<!----------------------------------->
<!-- begin tim kiem-->
<form name="form_select" method="GET" action="./">
<input type="hidden" name="act" value="order" />
<input type="hidden" name="search"  value="search" />
 
	<div class="box-body">
               <div class="row">
                <div class="col-lg-6">
                  <div class="input-group">
                        <span class="input-group-addon">
                         <i class="fa fa-barcode"></i>
                        </span>
                    <input type="text" class="form-control" name="keywords" value="<? echo $_REQUEST['keywords'];?>" placeholder="Mã đơn hàng,Tên,SĐT người mua hàng">
                  </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                  <div class="input-group">
                        <span class="input-group-addon">
                             <i class="fa fa-tag"></i>
                        </span>
                  <select class="form-control" name="active_shop">
	<?php if($_REQUEST['active_shop']=='0' )
{?>
				    <option value=""></option>
                    <option value="0" selected>Đơn hàng mới</option>
                    <option  value="6" >Hết hàng</option>
                    <option  value="10" >Đang lấy hàng</option>
                    <option  value="1" >Đang giao hàng</option>
                    <option  value="2" >Đã giao hàng(Chưa đánh giá)</option>
					<option  value="3" >Khách không nhận </option>
					<option  value="4" >Chuyển hoàn về cho Shop</option>
					<option  value="5" >Đã hủy</option>
					<option  value="20" >Hoàn thành(Đã đánh giá)</option>
<?}
else{?>
<?}?>			  
	<?php if($_REQUEST['active_shop']=='6' )
{?>
				    <option value=""></option>
                    <option value="0">Đơn hàng mới</option>
                    <option  value="6" selected>Hết hàng</option>
                    <option  value="10" >Đang lấy hàng</option>
                    <option  value="1" >Đang giao hàng</option>
                    <option  value="2" >Đã giao hàng(Chưa đánh giá)</option>
					<option  value="3" >Khách không nhận</option>
					<option  value="4" >Chuyển hoàn về cho Shop</option>
					<option  value="5" >Đã hủy</option>
					<option  value="20" >Hoàn thành(Đã đánh giá)</option>
<?}
else{?>
<?}?>
	<?php if($_REQUEST['active_shop']=='10' )
{?>
				    <option value=""></option>
                    <option value="0">Đơn hàng mới</option>
                    <option  value="6">Hết hàng</option>
                    <option  value="10" selected>Đang lấy hàng</option>
                    <option  value="1" >Đang giao hàng</option>
                    <option  value="2" >Đã giao hàng(Chưa đánh giá)</option>
					<option  value="3" >Khách không nhận</option>
					<option  value="4" >Chuyển hoàn về cho Shop</option>
					<option  value="5" >Đã hủy</option>
					<option  value="20" >Hoàn thành(Đã đánh giá)</option>
<?}
else{?>
<?}?>
	<?php if($_REQUEST['active_shop']=='1' )
{?>
				    <option value=""></option>
                    <option value="0">Đơn hàng mới</option>
                    <option  value="6">Hết hàng</option>
                    <option  value="10">Đang lấy hàng</option>
                    <option  value="1" selected>Đang giao hàng</option>
                    <option  value="2" >Đã giao hàng(Chưa đánh giá)</option>
					<option  value="3" >Khách không nhận</option>
					<option  value="4" >Chuyển hoàn về cho Shop</option>
					<option  value="5" >Đã hủy</option>
					<option  value="20" >Hoàn thành(Đã đánh giá)</option>
<?}
else{?>
<?}?>
	<?php if($_REQUEST['active_shop']=='2' )
{?>
				    <option value=""></option>
                    <option value="0">Đơn hàng mới</option>
                    <option  value="6">Hết hàng</option>
                    <option  value="10">Đang lấy hàng</option>
                    <option  value="1">Đang giao hàng</option>
                    <option  value="2" selected>Đã giao hàng(Chưa đánh giá)</option>
					<option  value="3" >Khách không nhận</option>
					<option  value="4" >Chuyển hoàn về cho Shop</option>
					<option  value="5" >Đã hủy</option>
					<option  value="20" >Hoàn thành(Đã đánh giá)</option>
<?}
else{?>
<?}?>
	<?php if($_REQUEST['active_shop']=='3' )
{?>
				    <option value=""></option>
                    <option value="0">Đơn hàng mới</option>
                    <option  value="6">Hết hàng</option>
                    <option  value="10">Đang lấy hàng</option>
                    <option  value="1">Đang giao hàng</option>
                    <option  value="2">Đã giao hàng(Chưa đánh giá)</option>
					<option  value="3" selected>Khách không nhận</option>
					<option  value="4" >Chuyển hoàn về cho Shop</option>
					<option  value="5" >Đã hủy</option>
					<option  value="20" >Hoàn thành(Đã đánh giá)</option>
<?}
else{?>
<?}?>
	<?php if($_REQUEST['active_shop']=='4' )
{?>
				    <option value=""></option>
                    <option value="0">Đơn hàng mới</option>
                    <option  value="6">Hết hàng</option>
                    <option  value="10">Đang lấy hàng</option>
                    <option  value="1">Đang giao hàng</option>
                    <option  value="2">Đã giao hàng(Chưa đánh giá)</option>
					<option  value="3">Khách không nhận</option>
					<option  value="4" selected>Chuyển hoàn về cho Shop</option>
					<option  value="5" >Đã hủy</option>
					<option  value="20" >Hoàn thành(Đã đánh giá)</option>
<?}
else{?>
<?}?>
	<?php if($_REQUEST['active_shop']=='5' )
{?>
				    <option value=""></option>
                    <option value="0">Đơn hàng mới</option>
                    <option  value="6">Hết hàng</option>
                    <option  value="10">Đang lấy hàng</option>
                    <option  value="1">Đang giao hàng</option>
                    <option  value="2">Đã giao hàng(Chưa đánh giá)</option>
					<option  value="3">Khách không nhận</option>
					<option  value="4">Chuyển hoàn về cho Shop</option>
					<option  value="5" selected>Đã hủy</option>
					<option  value="20" >Hoàn thành(Đã đánh giá)</option>
<?}
else{?>
<?}?>
	<?php if($_REQUEST['active_shop']=='20' )
{?>
				    <option value=""></option>
                    <option value="0">Đơn hàng mới</option>
                    <option  value="6">Hết hàng</option>
                    <option  value="10">Đang lấy hàng</option>
                    <option  value="1">Đang giao hàng</option>
                    <option  value="2">Đã giao hàng(Chưa đánh giá)</option>
					<option  value="3">Khách không nhận</option>
					<option  value="4">Chuyển hoàn về cho Shop</option>
					<option  value="5">Đã hủy</option>
					<option  value="20" selected>Hoàn thành(Đã đánh giá)</option>
<?}
else{?>
<?}?>  

		<?php if($_REQUEST['active_shop']=='' )
{?>
                     <option value=""></option>
                    <option value="0">Đơn hàng mới</option>
                    <option  value="6">Hết hàng</option>
                    <option  value="10">Đang lấy hàng</option>
                    <option  value="1">Đang giao hàng</option>
                    <option  value="2">Đã giao hàng(Chưa đánh giá)</option>
					<option  value="3">Khách không nhận</option>
					<option  value="4">Chuyển hoàn về cho Shop</option>
					<option  value="5">Đã hủy</option>
					<option  value="20">Hoàn thành(Đã đánh giá)</option>
<?}
else{?>
<?}?>  			  
                   

                  </select>
                  </div>
                  <!-- /input-group -->
                </div>
				
				
				
				 
				
				<div class="col-lg-6">
                  <div class="input-group" style=" margin-top: 11px; ">
                        <span class="input-group-addon">
                          <i class="fa fa-fw fa-cart-plus"></i>
                        </span>
						<select class="form-control" name="kichhoat">
                   <option value=""></option>
                    <option value="0">Chưa đặt hàng còn trong giỏ hàng</option>
 
                  
					</select> 
                  </div>
                  <!-- /input-group -->
                </div>
				
				
				
				
			<div class="col-lg-6">
                  <div   style=" margin-top: 11px; ">
                        <button type="submit"   name="timkiem"  class="btn btn-block btn-danger">&nbsp;<i class="fa fa-fw fa-search"></i> TÌM KIẾM &nbsp;</button>
	</div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
              </div>
              <!-- /.row -->

              
              
              <!-- /input-group -->
             
            <!-- /.box-body -->
          </div>	 </div>				 



 
 
 
 
 
 
 
 
 
 
</form>
<!-- end tim kiem -->
<!----------------------------------->			 
			 
            


                  


      <div class="row">
        <div class="col-md-6" style="width:100%;" >
          <div class="box" style="
    border-top: 3px solid #d40000;
">
            <div class="box-header with-border">
			<div>
			
              <span style="
    font-size: 13px;
"><i class="fa fa-cubes"></i>Tổng đơn hàng: <b><? echo mysql_num_rows(mysql_query("SELECT * FROM orders where orders_user='".$_SESSION['log']."' "));?></b>  </span>
&nbsp;&nbsp; 
              <span style="
    font-size: 13px;
">  Chưa duyệt: <b><? echo mysql_num_rows(mysql_query("SELECT * FROM orders where orders_user='".$_SESSION['log']."'  and active_shop='0' "));?></b>  </span>
&nbsp;&nbsp;
              <span style="
    font-size: 13px;
">  Đang lấy hàng:  <b><? echo mysql_num_rows(mysql_query("SELECT * FROM orders where orders_user='".$_SESSION['log']."'  and active_shop='10' "));?></b> </span>
&nbsp;&nbsp;
 <span style="
    font-size: 13px;
">  Đang giao: <b><? echo mysql_num_rows(mysql_query("SELECT * FROM orders where orders_user='".$_SESSION['log']."'  and active_shop='1' "));?></b>    </span>
&nbsp;&nbsp;
               <span style="
    font-size: 13px;
"> Đã giao: <b><? echo mysql_num_rows(mysql_query("SELECT * FROM orders where orders_user='".$_SESSION['log']."'  and active_shop='2' "));?></b>    </span>
&nbsp;&nbsp;
               <span style="
    font-size: 13px;
">  Khách không nhận: <b><? echo mysql_num_rows(mysql_query("SELECT * FROM orders where orders_user='".$_SESSION['log']."'  and active_shop='3' "));?></b>      </span>
&nbsp;&nbsp;
               <span style="
    font-size: 13px;
">  Chuyển hoàn:  <b><? echo mysql_num_rows(mysql_query("SELECT * FROM orders where orders_user='".$_SESSION['log']."'  and active_shop='4' "));?></b>      </span>
&nbsp;&nbsp;
               <span style="
    font-size: 13px;
">  Đã hủy:  <b><? echo mysql_num_rows(mysql_query("SELECT * FROM orders where orders_user='".$_SESSION['log']."'  and active_shop='5' "));?></b>    </span>
&nbsp;&nbsp;
               <span style="
    font-size: 13px;
">  Hết hàng:  <b><? echo mysql_num_rows(mysql_query("SELECT * FROM orders where orders_user='".$_SESSION['log']."'  and active_shop='6' "));?></b>     </span>
&nbsp;&nbsp;
               <span style="
    font-size: 13px;
"> Hoàn thành: <b><? echo mysql_num_rows(mysql_query("SELECT * FROM orders where orders_user='".$_SESSION['log']."'  and active_shop='20' "));?></b>     </span>
&nbsp;&nbsp;
			  </div>
			  <!--div style="float:right; ">
		


	<button type="submit" value="Xóa" title="Xóa sản phẩm"  name="ButDel"   style="
    style=;
    float: right;
    color: #ffffff;
    font-size: 15px;
    font-weight: 600;
    text-transform: uppercase;
    text-decoration: none;
    line-height: 26px;
    margin-left: 20px;
    background: #dd4b39;
    border-radius: 4px;
    border: 1px solid #dd4b39;
    "><i class="glyphicon glyphicon-trash"></i> Xóa</button>
	
<button type="submit" value="UP" title="UP sản phẩm"  name="upsanpham"   style="
    float: right;
    color: #ffffff;
    font-size: 15px;
    font-weight: 600;
    text-transform: uppercase;
    text-decoration: none;
    line-height: 26px;
    margin-left: 20px;
    background: #228fca;
    border-radius: 4px;
    border: 1px solid #35b8fe;
    "><i class="fa fa-arrow-circle-up"></i> UP</button>
	
	<a href="./add_products" title="Thêm mới"  name="themmoi"   style="
    float: right;
    color: #ffffff;
    font-size: 15px;
    font-weight: 600;
    text-transform: uppercase;
    text-decoration: none;
    line-height: 26px;
    margin-left: 20px;
    background: #56820f;
    border-radius: 4px;
    border: 1px solid #35b8fe;
    ">&nbsp;<i class="fa fa-fw fa-plus-circle"></i> Thêm mới &nbsp;</a>
	



</div-->	
            </div>
			

<?
function taotrang($sql,$link,$nitem,$itemcurrent)
{	global $con;
	$ret="";
	$result = mysql_query($sql, $con) or die('Error' . mysql_error());
	$value = mysql_fetch_array($result);
	$plus = (($value['cnt'] % $nitem)>0);
	for ($i=0;$i<($value[0] / $nitem) + plus;$i++)
	{
		if ($i<>$itemcurrent) $ret .= "<a  href=\"".$link.$i."\"  class=\"lslink\"  style='    padding-left: 8px;
    border: 1px solid #d0cbcb;
    background: #d42525;
    padding-right: 8px;
    color: #fff;
    /* padding: 4px; */
    padding-top: 4px;
    padding-bottom: 5px;    '  
	>".($i+1)."</a> ";
		else $ret .= "<a  href=\"".$link.$i."\"  class=\"lslink\"  style='    padding-left: 8px;
    border: 1px solid #d0cbcb;
    background: #177b3f;
    padding-right: 8px;
    color: #fff;
    /* padding: 4px; */
    padding-top: 4px;
    padding-bottom: 5px;    '  
	>".($i+1)."</a> ";
	}
	return $ret;
}
	$pageindex=taotrang("select count(*) from products where user='".$_SESSION['log']."' and $where","./?act=".$_REQUEST['act']."&cat=".$_REQUEST['cat']."&sortby=".$_REQUEST['sortby']."&direction=".$_REQUEST['direction']."&page=",$MAXPAGE,$page);
?>

<table cellspacing="0" cellpadding="0" width="100%">
<? if ($_REQUEST['code']==1) echo '<tr><td colspan=2 align="center" class="err">&#272;ã c&#7853;p nh&#7853;t thành công</td></tr>'; ?>

</table>

<?
function GetLinkSort($order)
{
	$direction="";
	if ($_REQUEST['direction']==''||$_REQUEST['direction']!='0')
		$direction="0";
	else
		$direction="1";
	
	return "./?act=".$_REQUEST['act']."&cat=".$_REQUEST['cat']."&page=".$_REQUEST['page']."&sortby=".$order."&direction=".$direction;
}
?>

 <div class="box-body no-padding">

 <tr>
<td class="smallfont"><div style="
    padding: 12px;
"> 
Trang: <? echo $pageindex; ?>

</div>
</td>

</tr>
              <table class="table table-hover">
			  
  <tr >
   
 
 
    <td align="center" nowrap class="title" width="50%"><b>Thông tin</b></td>

	<td align="center" nowrap class="title" width="12%"><b>Màu Sắc,Size</b></td>
		   <td align="center" nowrap class="title" width="19%" ><b>Tổng tiền</b></td>

    <td align="center" nowrap class="title" ><b>Tình trạng</b></td>
    <td align="center" nowrap class="title" width="10%"><b>Người mua</b></td>

	
  </tr>

  <?
 
  	$where="1=1";
	$keywords=killInjection($_REQUEST['keywords']);
	if ($keywords!='')
	{
		$where.=" and (orders_phone like '%".$keywords."%' or orders_name like '%".$keywords."%'";
		if ($_REQUEST['search_in_description']=='') 
			$where.="or orders_id like '%".$keywords."%' or orders_name like '%".$keywords."%'  "; 
		$where.=") ";
	}


	if ($_REQUEST['active_shop']!='')	$where.=" and active_shop=".$_REQUEST['active_shop'];
    if ($_REQUEST['kichhoat']!='')	$where.=" and kichhoat=".$_REQUEST['kichhoat'];
	

	 

 
           	$sql="select * from orders where $where and orders_user='".$_SESSION['log']."' order by  orders_id desc limit ".($p*$MAXPAGE).",".$MAXPAGE;
        	$result=mysql_query($sql,$con);
        	$i=0;
           	while(($row=mysql_fetch_array($result)))
			{
			$i++;
			if ($i%2) $color="#d5d5d5"; else $color="#e5e5e5";
			$catinfo=GetNewsCategoryInfo($row['cat_id']);
			$tinhtrang=$row['tinhtrang'];
			$sql_cat=mysql_query("SELECT * FROM cat where id='".$row['cat']."' ");
$row_cat=mysql_fetch_assoc($sql_cat);
$cat_mem=$row_cat['name'];
			$sql_cat_sub2=mysql_query("SELECT * FROM cat where id='".$row_cat['parent']."' ");
$row_cat_sub2=mysql_fetch_assoc($sql_cat_sub2);
$cat_mem_sub2=$row_cat_sub2['name'];
			$sql_cat_sub1=mysql_query("SELECT * FROM cat where id='".$row_cat_sub2['parent']."' ");
$row_cat_sub1=mysql_fetch_assoc($sql_cat_sub1);
$cat_mem_sub1=$row_cat_sub1['name'];	

		$detai_check=mysql_query("SELECT * FROM orderdetail where ordersdetail_ordersid='".$row['orders_id']."' ");
$detai_check_detai=mysql_fetch_assoc($detai_check);

		$products=mysql_query("SELECT * FROM products where id='".$detai_check_detai['ordersdetail_product_id']."' ");
$products_check=mysql_fetch_assoc($products);

		$products=mysql_query("SELECT * FROM provinces where id='".$row['tinhthanh']."' ");
$products_check_tinhthanh=mysql_fetch_assoc($products);

  ?>
  
  <tr class="table_a" onmouseout="this.className='table_a'" onmouseover="this.className='table_a1'" >
 
 
 
    <td  class="smallfont">
	<b  href="./edit/<? echo $row['id']; ?>/<? echo $row['cat']; ?>" ><i style=" color: red; " class="fa fa-fw fa fa-fw fa-warning"></i>Mã đơn hàng: <span style=" color: red;"> <? echo $row['orders_id']; ?></span>
</b>
 <b style="font-size: 12px;float: right;">Số lượng: <? echo $detai_check_detai['ordersdetail_quantity']; ?> </b>
  <b style="font-size: 13px;float: right;margin-right: 92px;">Đơn giá: <b style=" color: red; "><? echo number_format($detai_check_detai['ordersdetail_price'],0); ?>đ </b></b>
<br>
<a id="xemnhanhsp" href="/<?php echo doidau(mb_strtolower($products_check['name'],"UTF8"));?>-pro-<?php echo $products_check['id'];?>.html" >
<image src="<? echo $products_check['image']; ?>"  width="32px" height="32px">
<span  >  <? echo $products_check['name']; ?> - <? echo $products_check['code']; ?> </span>

</a>
<br>
<span style="  "> 
<i style="font-size: 11px;font-weight: bold;">Ngày mua:  <? echo $row['orders_date']; ?> </i> 

</span>
<?php if($row['ghichu']=='' )
{?>
<?}
else{?>
<br>
<span style=" color: blue; "> 
<b style="font-size: 12px;">Chi chú:  </b> 
<? echo $row['ghichu']; ?>
</span>
<?}?>  
</td>


	<td  >
<b style="
    font-size: 12px;
">Màu sắc: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> 
<?php if($row['mausac']=='' )
{?>
Ngẫu nhiên
<?}
else{?>
<span style="background-color: #<? echo $row['mausac']; ?>; outline: 1px solid #ccc;"  ><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>

<br>
<?php if($row['kichthuoc']=='' )
{?>
<?}
else{?>
<b style="
    font-size: 12px;
">Kích thước:   &nbsp;&nbsp;</b> 

<span style="/* outline: 1px solid #ccc; */width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;/* display: block; *//* float: left; */cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;"  ><? echo $row['kichthuoc']; ?></span>

<?}?>
<br>

	
	</td>
	<td>
<?
$tongien = $detai_check_detai['ordersdetail_price'] * $detai_check_detai['ordersdetail_quantity'];
$tiendiemlua = $row['diemlua'];
$thanhtoanshop = $tongien - $tiendiemlua;
?>

 <span style=" font-size: 13px; ">Tổng tiền: <b> <? echo number_format($tongien,0); ?>đ</b>  </span>
<?php if($row['diemlua'] > '0' )
{?>
 <br>
  <span style=" font-size: 13px; "> Tiền Điểm Lửa: <b style=" color: red; "> <? echo number_format($tiendiemlua); ?>đ</b>  </span>
<?}
else{?>

<?}?>
 <br>
 <span style=" font-size: 13px; "> Thanh toán Shop: <b style=" color: #048e0a; "> <? echo number_format($thanhtoanshop,0); ?>đ</b>  </span> 
	</td>

   
	    <td  class="td_sanpham">

		<?if($row['active_shop']=='0'){?>
		<?
		// Đang còn hàng..click hết hàng
if (isset($_POST['conhang'])) {
	date_default_timezone_set("Asia/Ho_Chi_Minh");
$dateposted1 = date("d-m-Y H:i:s");
$conhangnha = $_POST['conhangnha'];
$user_mem1= $row['user_mem'];
$user_shop= $_SESSION['log'];
$products_check_name= $products_check['name'];






$sql = "update orders set active='1',active_shop='10' where orders_id='".$conhangnha."' and orders_user='".$_SESSION['log']."' ";
 
		if (mysql_query($sql)  ) 


if($row['orders_id']== $conhangnha){	
	
 $sql_conhang_2 = "INSERT INTO thongbao (thongbao, date, user) VALUES ('Nhà bán hàng đã xác nhận sản phẩm <b>$products_check_name</b> còn hàng, ngay bây giờ chúng tôi sẽ tiến hành giao hàng cho quý khách trong thời gian nhanh nhất.Xin cảm ơn quý khách' ,'$dateposted1','$user_mem1')";
 $sql_conhang_4 = "INSERT INTO thongbao_shop (thongbao, date, user) VALUES ('Bạn đã xác nhận sản phẩm <b>$products_check_name</b> còn hàng.Ngay bây giờ bạn hãy chuẩn bị đầy đủ sản phẩm để nhân viên giao hàng đến nhận hàng' ,'$dateposted1','$user_shop')";
 if (mysql_query($sql_conhang_2) && mysql_query($sql_conhang_4) ) {
			
			
				echo "<SCRIPT LANGUAGE='JavaScript'>
   window.alert('Xác nhận còn hàng thành công hãy chuẩn bị đầy đủ hàng hóa để nhân viên giao hàng đến nhận')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";
		}	
		else {
				echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Thao tác không thành công')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";
		}
					}else{
					}	
		
	
  	


}
		?>
		<? echo $err;?>
		<form method="POST">
		<input type="hidden" name="conhangnha" value="<? echo $row['orders_id'];?>">
	<button type="submit" name="conhang" class="btn btn-block btn-danger btn-lg" style="border-color: red;padding: 0px 0px;font-size: 15px;margin-top: 15px;background: red;color: #fff;border-radius: 3px;">Còn hàng</button>
	</form>
	
	
	<?}else{?>
	<?}?>
	
	<?if($row['active_shop']=='0'){?>
		<?
		// Đang còn hàng..click hết hàng
if (isset($_POST['hethang'])) {
$hethangnha = $_POST['hethangnha'];
$dateposted2 = date("d-m-Y H:i:s");
$user_mem2= $row['user_mem'];
$user_shop2= $_SESSION['log'];
$products_check_name2= $products_check['name'];
$products_check_id= $products_check['id'];

$detai_check121=mysql_query("SELECT * FROM orderdetail where ordersdetail_ordersid='".$_POST['hethangnha']."' ");
$detai_check_detai212=mysql_fetch_assoc($detai_check121);
	
	$sql = "update orders set active='6',active_shop='6' where orders_id='".$hethangnha."' and orders_user='".$_SESSION['log']."' ";
    $sql_off_sp = "update products set tinhtrang='0'  where id='".$products_check_id."' and user='".$_SESSION['log']."' ";
		if (mysql_query($sql) && mysql_query($sql_off_sp) ) 
  	
	if($row['orders_id']== $hethangnha){	
	
 $sql_hethang_2 = "INSERT INTO thongbao (thongbao, date, user) VALUES ('Nhà bán hàng đã xác nhận sản phẩm <b>$products_check_name2</b> hết hàng, vì vậy chúng tôi không thể giao hàng cho quý khách, quý khách có thể mua sản phẩm khách tại trang chủ.Xin cảm ơn quý khách' ,'$dateposted2','$user_mem2')";
 $sql_hethang_4 = "INSERT INTO thongbao_shop (thongbao, date, user) VALUES ('Bạn đã xác nhận sản phẩm <b>$products_check_name2</b> hết hàng.' ,'$dateposted2','$user_shop2')";
 if (mysql_query($sql_hethang_2) && mysql_query($sql_hethang_4) ) {
			
			
				echo "<SCRIPT LANGUAGE='JavaScript'>
   window.alert('Xác nhận sản phẩm hết hàng thành công')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";
		}	
		else {
				echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Thao tác không thành công')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";
		}
		

					}else{
					}	

	
	if($detai_check_detai212['trudiemlua'] > '0'){	
$usermmm = $detai_check_detai212['user_mem'];
$diemluatru = number_format($detai_check_detai212['trudiemlua']);
	
$sql1 = "update thanhvien set diemlua_mem = diemlua_mem +'".$detai_check_detai212['trudiemlua']."' where user='".$detai_check_detai212['user_mem']."' ";	
$sql_hethang_21 = "INSERT INTO thongbao (thongbao, date, user) VALUES ('Hoàn lại <b>$diemluatru</b> Điểm Lửa khách hàng đã thanh toán ' ,'$dateposted2','$usermmm')";
 
 if (mysql_query($sql1)  && mysql_query($sql_hethang_21)   ) {
			
			
				echo "<SCRIPT LANGUAGE='JavaScript'>
   window.alert('Xác nhận sản phẩm hết hàng thành công')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";
		}	
		else {
				echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Thao tác không thành công')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";
		}
		
		
		}else{
		}

}
		?>
		<? echo $err;?>
		<form method="POST">
		<input type="hidden" name="hethangnha" value="<? echo $row['orders_id'];?>">
	<button type="submit" name="hethang" class="btn btn-block btn-danger btn-lg" style="border-color: #6f6a6a; padding: 0px 0px; font-size: 15px; margin-top: 15px; background: #6f6a6a; color: #fff; border-radius: 3px;">Hết hàng</button>
	</form>
	
	
	<?}else{?>
	<?}?>
	
	<?if($row['active_shop']=='10'){?>
		
	<button type="button"  class="btn btn-block btn-danger btn-lg" style="border-color: #6f6a6a; padding: 2px 4px; font-size: 15px; margin-top: 15px; background: #0e04a8; color: #fff; border-radius: 3px;">Đang lấy hàng</button>
	<?}else{?>
	<?}?>
	
	<?if($row['active_shop']=='1'){?>
		
	<button type="button"  class="btn btn-block btn-danger btn-lg" style="border-color: #fd8101; padding: 2px 4px; font-size: 15px; margin-top: 15px; background: #fd8101; color: #fff; border-radius: 3px;">Đang giao hàng</button>
	<?}else{?>
	<?}?>
	
	<?
		$products_iii=mysql_query("SELECT * FROM khieunai where id_donhang='".$row['orders_id']."' ");
$products_iii_1=mysql_fetch_assoc($products_iii);	
	?>
	<?if($products_iii_1['id_donhang']==""){?>
		<?if($row['active_shop']=='2'){?>
		
	<button type="button"  class="btn btn-block btn-danger btn-lg" style="border-color: #358c08; padding: 2px 4px; font-size: 15px; margin-top: 15px; background: #358c08; color: #fff; border-radius: 3px;">Đã giao hàng</button>

<?
		// Đang còn hàng..click hết hàng
if (isset($_POST['yeucaudanhgia'])) {
$yeucaudanhgia_id = $_POST['yeucaudanhgia_id'];
$dateposted2_yc = date("d-m-Y H:i:s");
$user_mem2= $row['user_mem'];
$user_mem2_ten= $row['orders_name'];
$user_shop2= $_SESSION['log'];
$products_check_name2= $products_check['name'];
 
	
 $sql = "update orders set danhgia='1'  where orders_id='".$yeucaudanhgia_id."' and orders_user='".$_SESSION['log']."' ";
		if (mysql_query($sql)   ) 
  	
	if($row['orders_id']== $yeucaudanhgia_id){	
	
 $sql_hethang_2 = "INSERT INTO thongbao (thongbao, date, user) VALUES ('Nhà bán hàng gửi yêu cầu đánh giá về sản phẩm <b>$products_check_name2</b> mà bạn đã nhận.' ,'$dateposted2_yc','$user_mem2')";
 $sql_hethang_4 = "INSERT INTO thongbao_shop (thongbao, date, user) VALUES ('Bạn đã gửi yêu cầu đánh giá cho sản phẩm <b>$products_check_name2</b> đến khách hàng <b>$user_mem2_ten</b>.' ,'$dateposted2_yc','$user_shop2')";
 if (mysql_query($sql_hethang_2) && mysql_query($sql_hethang_4) ) {
			
			
				echo "<SCRIPT LANGUAGE='JavaScript'>
   window.alert('Gửi yêu cầu đánh giá thành công')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";
		}	
		else {
				echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Thao tác không thành công')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";
		}
					}else{
					}	


}
		?>
		<? echo $err;?>	
			<?if($row['danhgia']=='0'){?>
		
	<form method="POST">
<input type="hidden" name="yeucaudanhgia_id" value="<? echo $row['orders_id'];?>">
	<button type="submit"  name="yeucaudanhgia" class="btn btn-block btn-danger btn-lg" style="border-color: #358c08; padding: 2px 4px; font-size: 15px; margin-top: 15px; background: #358c08; color: #fff; border-radius: 3px;">Yêu cầu đánh giá</button>
	</form>
	
	<?}else{?>
	<?}?>
	
	<?}else{?>
	<?}?>

	<?}else{?>
	<a href="/index1.php?home=khieunaishop&p=<?php echo $row['orders_id'];?>" id="xemnhanhsp"   class="btn btn-block btn-danger btn-lg" style="border-color: #F44336;padding: 2px 4px;font-size: 15px;margin-top: 15px;background: #08748c;color: #fff;border-radius: 3px;">Bị khiếu nại</a>
	<?}?>
	
			<?if($row['active_shop']=='3'){?>
		
	<button type="button"  class="btn btn-block btn-danger btn-lg" style="border-color: #d020a2; padding: 2px 4px; font-size: 15px; margin-top: 15px; background: #d020a2; color: #fff; border-radius: 3px;">Khách không nhận</button>
		<?
		// Đang còn hàng..click hết hàng
if (isset($_POST['chuyenhoan'])) {
$chuyenhoannha = $_POST['chuyenhoannha'];
 

	{
	$sql = "update orders set active='4',active_shop='4' where orders_id='".$chuyenhoannha."' and orders_user='".$_SESSION['log']."' ";
		if (mysql_query($sql)) {
			
			
			$err=" <SCRIPT LANGUAGE='JavaScript'>
 
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";
		}	
		else {
			$err =  "<SCRIPT LANGUAGE='JavaScript'>
 window.alert('Thao tác không thành công')
    window.location.href='donhang';
    </SCRIPT>";
		}
  	}


}
		?>
		<form method="POST"> 
		<input type="hidden" name="chuyenhoannha" value="<? echo $row['orders_id'];?>">
		<button type="submit" name="chuyenhoan"  class="btn btn-block btn-danger btn-lg" style="border-color: #dd4b39; padding: 2px 4px; font-size: 15px; margin-top: 15px; background: #1e282c; color: #ffffff; border-radius: 3px;">Chuyển hoàn</button>
	</form>
	
	
	
	<?}else{?>
	<?}?>
	
		<?if($row['active_shop']=='4'){?>
		
	<button type="button"  class="btn btn-block btn-danger btn-lg" style="border-color: #9e3030; padding: 2px 4px; font-size: 15px; margin-top: 15px; background: #9e3030; color: #fff; border-radius: 3px;">Chuyển hoàn</button>
	<?}else{?>
	<?}?>
	
	<?if($row['active_shop']=='5'){?>
		
	<button type="button"  class="btn btn-block btn-danger btn-lg" style="border-color: #999999; padding: 2px 4px; font-size: 15px; margin-top: 15px; background: #999999; color: #fff; border-radius: 3px;">Đã hủy</button>
	<?}else{?>
	<?}?>
	
		<?if($row['active_shop']=='6'){?>
		
	<button type="button"  class="btn btn-block btn-danger btn-lg" style="border-color: #F44336; padding: 2px 4px; font-size: 15px; margin-top: 15px; background: #F44336; color: #fff; border-radius: 3px;">Hết hàng</button>
	<?}else{?>
	<?}?>
	
	<?if($row['active_shop']=='20'){?>
		
	<button type="button"  class="btn btn-block btn-danger btn-lg" style="border-color: #36f470; padding: 2px 4px; font-size: 15px; margin-top: 15px; background: #2c6708; color: #fff; border-radius: 3px;">Hoàn thành</button>
	<?}else{?>
	<?}?>
	
	<?if($row['active_shop']=='100'){?>
		
	<button type="button"  class="btn btn-block btn-danger btn-lg" style="/* border-color: #36f470; */padding: 2px 4px;font-size: 15px;margin-top: 15px;background: #000000;color: #fff;border-radius: 3px;">Giỏ hàng</button>
	<?}else{?>
	<?}?>
	</td>
	
    <td style=" font-size: 11px; font-weight: bold;text-align: center; "  > <? echo $row['orders_name']; ?>
	<br>
	 <? echo $row['orders_phone']; ?>	
	 <br>
	 <? echo $products_check_tinhthanh['FirstName']; ?>
	 	 <br>
	(<? echo number_format($products_check_tinhthanh['phivanchuyen'],0); ?>đ) 
	</td>
   
  </tr>
  <?
              	}
  ?>
  </div>

</table>

<div style="
    padding: 12px;
    border-top: 1px solid #dfdfdf;
">
Trang :  <? echo $pageindex; ?>

</div>

</form>
<script language="JavaScript">
function chkallClick(o) {
  	var form = document.frmList;
	for (var i = 0; i < form.elements.length; i++) {
		if (form.elements[i].type == "checkbox" && form.elements[i].name!="chkall") {
			form.elements[i].checked = document.frmList.chkall.checked;
		}
	}
}
</script>
</div></div></div>
</section>
</body>

