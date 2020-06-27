<style type="text/css">

 

.tooltip9999 {
	display: inline;
	position: relative;
}
.tooltip9999:hover:after {
	background-color: #000000; 
	background-color: rgba(0, 0, 0, 0.85);
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	border-radius: 8px;
	bottom: 26px;
	color: #FFFFFF;
	content: attr(data-tooltip-text);
	left: 20%;
	padding: 5px 10px;
	position: absolute;
	width: 130px;
	z-index: 1000;
}
.tooltip9999:hover:before {
	border: solid;
	border-color: rgba(0, 0, 0, 0.85) transparent;
	border-width: 8px 8px 0 8px;
	bottom: 18px;
	content: "";
	left: 50%;
	position: absolute;
	z-index: 1001;
}
</style>
        

<?
$MAXPAGE=100;


	switch ($_GET['action'])
	{
		case 'del' :
			$id = $_GET['id'];
			$sql = "delete from products where id='".$id."'  ";
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
				@$result = @mysql_query("delete from products where id='".$id."'  ");
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
                  <div class="input-group" style=" margin-top: 11px; ">
                        <span class="input-group-addon">
                          <i class="fa fa-fw fa-cart-plus"></i>
                        </span>
						<select class="form-control" name="chuyentien">
                   <option value=""></option>
 		<?php if($_REQUEST['chuyentien']=='' )
{?>
                    <option value="0">Chưa chuyển tiền</option>
					 <option value="9999">Đã chuyển tiền</option>
<?}
else{?>
<?}?>  			  

	 		<?php if($_REQUEST['chuyentien']=='0' )
{?>
                    <option value="0" selected>Chưa chuyển tiền</option>
					 <option value="9999">Đã chuyển tiền</option>
<?}
else{?>
<?}?> 				
	 		<?php if($_REQUEST['chuyentien']=='9999' )
{?>
                    <option value="0" >Chưa chuyển tiền</option>
					 <option value="9999" selected>Đã chuyển tiền</option>
<?}
else{?>
<?}?> 	
                  
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
"><i class="fa fa-cubes"></i>Tổng: <b><? echo mysql_num_rows(mysql_query("SELECT * FROM orders    "));?></b>  </span>
&nbsp;&nbsp; 
              <span style="
    font-size: 13px;
">  Chưa duyệt: <b><? echo mysql_num_rows(mysql_query("SELECT * FROM orders where   active_shop='0' "));?></b>  </span>
&nbsp;&nbsp;
              <span style="
    font-size: 13px;
">  Đang lấy hàng:  <b><? echo mysql_num_rows(mysql_query("SELECT * FROM orders where   active_shop='10' "));?></b> </span>
&nbsp;&nbsp;
 <span style="
    font-size: 13px;
">  Đang giao: <b><? echo mysql_num_rows(mysql_query("SELECT * FROM orders where   active_shop='1' "));?></b>    </span>
&nbsp;&nbsp;
               <span style="
    font-size: 13px;
"> Đã giao: <b><? echo mysql_num_rows(mysql_query("SELECT * FROM orders where   active_shop='2' "));?></b>    </span>
&nbsp;&nbsp;
               <span style="
    font-size: 13px;
">  Khách không nhận: <b><? echo mysql_num_rows(mysql_query("SELECT * FROM orders where   active_shop='3' "));?></b>      </span>
&nbsp;&nbsp;
               <span style="
    font-size: 13px;
">  Chuyển hoàn:  <b><? echo mysql_num_rows(mysql_query("SELECT * FROM orders where   active_shop='4' "));?></b>      </span>
&nbsp;&nbsp;
               <span style="
    font-size: 13px;
">  Đã hủy:  <b><? echo mysql_num_rows(mysql_query("SELECT * FROM orders where   active_shop='5' "));?></b>    </span>
&nbsp;&nbsp;
               <span style="
    font-size: 13px;
">  Hết hàng:  <b><? echo mysql_num_rows(mysql_query("SELECT * FROM orders where   active_shop='6' "));?></b>     </span>
&nbsp;&nbsp;
               <span style="
    font-size: 13px;
"> Hoàn thành: <b><? echo mysql_num_rows(mysql_query("SELECT * FROM orders where  active_shop='20' "));?></b>     </span>
&nbsp;&nbsp;

               <span style="
    font-size: 13px;
"> Giỏ hàng : <b><? echo mysql_num_rows(mysql_query("SELECT * FROM orders where  active_shop='100' "));?></b>     </span>
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
	$pageindex=taotrang("select count(*) from products where    $where","./?act=".$_REQUEST['act']."&cat=".$_REQUEST['cat']."&sortby=".$_REQUEST['sortby']."&direction=".$_REQUEST['direction']."&page=",$MAXPAGE,$page);
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
	    <td align="center" nowrap class="title" width="10%"><b>Check</b></td>

	
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
     if ($_REQUEST['chuyentien']!='')	$where.=" and chuyentien=".$_REQUEST['chuyentien'];
	

	 

 
           	$sql="select * from orders where     $where   order by  orders_id desc limit ".($p*$MAXPAGE).",".$MAXPAGE;
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
 <span style=" font-size: 13px; "> TT Shop: <b style=" color: #048e0a; "> <? echo number_format($thanhtoanshop,0); ?>đ</b>  </span> 
 <br>
 <span style=" font-size: 13px; "> Thu khách: <b style=" color: #9C27B0; "> <? echo number_format($tongien + $products_check_tinhthanh['phivanchuyen'],0); ?>đ</b>  </span> 
	</td>

   
	    <td  class="td_sanpham">

		<?if($row['active_shop']=='0'){?>
	 
	 
 
	<button  class="btn btn-block btn-danger btn-lg" style="border-color: red;padding: 0px 0px;font-size: 15px;margin-top: 15px;background: red;color: #fff;border-radius: 3px;">Chờ duyệt</button>
	 
	
	
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

 
		 
			<?if($row['danhgia']=='0'){?>
		
	 
<input type="hidden" name="yeucaudanhgia_id" value="<? echo $row['orders_id'];?>">
	<button type="submit"   class="btn btn-block btn-danger btn-lg" style="border-color: #358c08; padding: 2px 4px; font-size: 15px; margin-top: 15px; background: #358c08; color: #fff; border-radius: 3px;">Chờ đánh giá</button>
 
	
	<?}else{?>
	<?}?>
	
	<?}else{?>
	<?}?>

	<?}else{?>
	
	
		<?if($products_iii_1['hoantat_khieunai']=='1'){?>
 <?if($row['active_shop']=='2'){?>
		
	<button type="button"  class="btn btn-block btn-danger btn-lg" style="border-color: #358c08; padding: 2px 4px; font-size: 15px; margin-top: 15px; background: #358c08; color: #fff; border-radius: 3px;">Đã giao hàng</button>

 
		 
			<?if($row['danhgia']=='0'){?>
		
	 
<input type="hidden" name="yeucaudanhgia_id" value="<? echo $row['orders_id'];?>">
	<button type="submit"   class="btn btn-block btn-danger btn-lg" style="border-color: #358c08; padding: 2px 4px; font-size: 15px; margin-top: 15px; background: #358c08; color: #fff; border-radius: 3px;">Chờ đánh giá</button>
 
	
	<?}else{?>
	<?}?>
	
	<?}else{?>
	<?}?>
	<?}else{?>
		<a href="/index1.php?home=khieunaishop&p=<?php echo $row['orders_id'];?>" id="xemnhanhsp"   class="btn btn-block btn-danger btn-lg" style="border-color: #F44336;padding: 2px 4px;font-size: 15px;margin-top: 15px;background: #08748c;color: #fff;border-radius: 3px;">Bị khiếu nại</a>

	<?}?>	
	
	
	


	<?}?>
	
			<?if($row['active_shop']=='3'){?>
		
	<button type="button"  class="btn btn-block btn-danger btn-lg" style="border-color: #d020a2; padding: 2px 4px; font-size: 15px; margin-top: 15px; background: #d020a2; color: #fff; border-radius: 3px;">Khách không nhận</button>
		 
	
	
	
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
<a href="java:"  data-tooltip-text="<? echo $row['orders_address']; ?>" class="tooltip9999">	    <? echo $products_check_tinhthanh['FirstName']; ?>  </a>
	 	 <br>
	(<? echo number_format($products_check_tinhthanh['phivanchuyen'],0); ?>đ) 
	</td>
	
	 <td style=" font-size: 11px; font-weight: bold;text-align: center; "  >  

	 
	 
	<?
	
				$products222=mysql_query("SELECT * FROM products where id='".$detai_check_detai['ordersdetail_product_id']."' ");
$products_check_tinhthanh222=mysql_fetch_assoc($products222);
	?> 
	 
		<?
		// Đang còn hàng..click hết hàng
if (isset($_POST['checkadd'])) {
	
	



	date_default_timezone_set("Asia/Ho_Chi_Minh");
$dateposted1 = date("d-m-Y H:i:s");
$conhangnhac = $_POST['conhangnhac11'];
$checkadd = $_POST['checkadd'];
$user_mem1= $row['user_mem'];
$user_shop= $products_check_tinhthanh222['user'];
$products_check_name= $products_check['name'];


 






if($row['orders_id']== $conhangnhac && $checkadd == '1' ){	

$sql = "update orders set active='".$checkadd."',active_shop='".$checkadd."' where orders_id='".$conhangnhac."'   ";
 
		if (mysql_query($sql)  ) 
	
 $sql_conhang_2 = "INSERT INTO thongbao (thongbao, date, user) VALUES ('Đơn hàng số ($conhangnhac) đang trên đường giao cho quý khách' ,'$dateposted1','$user_mem1')";
 $sql_conhang_4 = "INSERT INTO thongbao_shop (thongbao, date, user) VALUES ('Đơn hàng số ($conhangnhac) đang trên đường giao cho khách hàng' ,'$dateposted1','$user_shop')";
 if (mysql_query($sql_conhang_2) && mysql_query($sql_conhang_4) ) 
 
 
 {
			
			
				echo "<SCRIPT LANGUAGE='JavaScript'>
  
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
		



if($row['orders_id']== $conhangnhac && $checkadd == '2' ){	

$sql = "update orders set active='".$checkadd."',active_shop='".$checkadd."' where orders_id='".$conhangnhac."'   ";
 
		if (mysql_query($sql)  ) 
	
 $sql_conhang_2 = "INSERT INTO thongbao (thongbao, date, user) VALUES ('Đơn hàng số ($conhangnhac) đã được giao thành công cho quý khách' ,'$dateposted1','$user_mem1')";
 $sql_conhang_4 = "INSERT INTO thongbao_shop (thongbao, date, user) VALUES ('Đơn hàng số ($conhangnhac) đã được giao thành công cho khách hàng' ,'$dateposted1','$user_shop')";
 if (mysql_query($sql_conhang_2) && mysql_query($sql_conhang_4) ) 
 
 
 {
			
			
				echo "<SCRIPT LANGUAGE='JavaScript'>
  
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


					 
		

		if($row['orders_id']== $conhangnhac && $checkadd == '3' ){	
		
		$sql = "update orders set active='".$checkadd."',active_shop='".$checkadd."' where orders_id='".$conhangnhac."'   ";
 
		if (mysql_query($sql)  ) 
	
 $sql_conhang_2 = "INSERT INTO thongbao (thongbao, date, user) VALUES ('Đơn hàng số ($conhangnhac) đã bị quý khách từ chối nhận hàng' ,'$dateposted1','$user_mem1')";
 $sql_conhang_4 = "INSERT INTO thongbao_shop (thongbao, date, user) VALUES ('Đơn hàng số ($conhangnhac) đã bị khách hàng từ chối nhận.Shop tiến hành cho phép chuyển hoàn để chúng tôi tiến hành chuyển hoàn về cho Shop' ,'$dateposted1','$user_shop')";
 if (mysql_query($sql_conhang_2) && mysql_query($sql_conhang_4) ) 
 
 
 {
			
			
				echo "<SCRIPT LANGUAGE='JavaScript'>
  
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
  	
if($row['orders_id']== $conhangnhac && $checkadd == '5' ){	

$sql = "update orders set active='".$checkadd."',active_shop='".$checkadd."' where orders_id='".$conhangnhac."'   ";
 
		if (mysql_query($sql)  ) 
	
 $sql_conhang_2 = "INSERT INTO thongbao (thongbao, date, user) VALUES ('Đơn hàng số ($conhangnhac) đã bị Hủy' ,'$dateposted1','$user_mem1')";
 $sql_conhang_4 = "INSERT INTO thongbao_shop (thongbao, date, user) VALUES ('Đơn hàng số ($conhangnhac) đã bị Hủy' ,'$dateposted1','$user_shop')";
 if (mysql_query($sql_conhang_2) && mysql_query($sql_conhang_4) ) 
 
 
 {
			
			
				echo "<SCRIPT LANGUAGE='JavaScript'>
  
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

					 
					 
					 
 if($row['orders_id']== $conhangnhac && $row['chuyentien']=='0' && $checkadd == '9999' ){	
 $addtien = $detai_check_detai['ordersdetail_price']*$detai_check_detai['ordersdetail_quantity'] - ($row['diemlua']);
 $addtienthongbao =  number_format($addtien);
 $sql = "update user_shop set tien = tien + '".$addtien."',tongbanhang = tongbanhang + '".$addtien."'  where user='".$user_shop."'   ";
  $sql222 = "update orders set chuyentien = '9999'  where orders_id = '".$conhangnhac."' and orders_user='".$user_shop."'   ";
 
		if (mysql_query($sql)  && mysql_query($sql222)  ) 
	
 $sql_conhang_2 = "INSERT INTO lichsugiaodich (noidung, date, user) VALUES ('Cộng thêm vào Ngân Sách <b>$addtienthongbao</b> VNĐ tiền thanh toán của đơn hàng số ($conhangnhac)' ,'$dateposted1','$user_shop')";
 $sql_conhang_4 = "INSERT INTO thongbao_shop (thongbao, date, user) VALUES ('Đã chuyển tiền thành công đơn hàng số ($conhangnhac) cho Shop với số tiền <b>$addtienthongbao</b> VNĐ' ,'$dateposted1','$user_shop')";
 if (mysql_query($sql_conhang_2) && mysql_query($sql_conhang_4) ) 
 
 
 {
			
			
				echo "<SCRIPT LANGUAGE='JavaScript'>
  
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

 <form method="POST" > 
 
		
  <input type="hidden" name="conhangnhac11" value="<? echo $row['orders_id'];?>">
 
<?php if(  $row['chuyentien']=='0' )
{?>
<select name="checkadd" onchange="this.form.submit()">

<?php if($products_iii_1['id_donhang']=="" )
{?>

  				    <option></option>
                    <option  value="1" >Đang giao hàng</option>
                    <option  value="2" >Đã giao hàng(Chưa đánh giá)</option>
					<option  value="3" >Khách không nhận </option>				 
					<option  value="5" >Hủy</option>
<?}
else{?>

<?php if($products_iii_1['hoantat_khieunai']=="1" )
{?>

  				    <option></option>
                    <option  value="1" >Đang giao hàng</option>
                    <option  value="2" >Đã giao hàng(Chưa đánh giá)</option>
					<option  value="3" >Khách không nhận </option>				 
					<option  value="5" >Hủy</option>
<?}
else{?>

<?}?> 
<?}?> 


					
				


<?php if($products_iii_1['id_donhang']=="" )
{?>
<?php if($row['active_shop']=='2' && $row['chuyentien']=='0' )
{?>
<option  value="9999" >Chuyển tiền cho Shop</option>
<?}
else{?>
<?}?>  



<?php if(  $row['active_shop']=='20' && $row['chuyentien']=='0' )
{?>
<option  value="9999" >Chuyển tiền cho Shop</option>
<?}
else{?>
<?}?>  
<?}
else{?>

<?php if($products_iii_1['hoantat_khieunai']=="1" )
{?>
<?php if($row['active_shop']=='2' && $row['chuyentien']=='0' )
{?>
<option  value="9999" >Chuyển tiền cho Shop</option>
<?}
else{?>
<?}?>  



<?php if(  $row['active_shop']=='20' && $row['chuyentien']=='0' )
{?>
<option  value="9999" >Chuyển tiền cho Shop</option>
<?}
else{?>
<?}?>  
<?}
else{?>



<?}?>

<?}?> 
				
					







 
				 
   </select>
<?}
else{?>
<?}?>  
 
	
	</form>

<?php if(  $row['chuyentien']=='9999' )
{?>
 <button type="button"  class="btn btn-block btn-danger btn-lg" style="border-color: #d020a2; padding: 2px 4px; font-size: 15px; margin-top: 15px; background: #d020a2; color: #fff; border-radius: 3px;">Đã Chuyển Tiền</button>
<?}
else{?>
<?}?>  	
	 
	    
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

