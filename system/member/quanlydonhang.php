<?
echo $_SESSION["session_message"];
$_SESSION["session_message"] = "";
?>



<?php
$row=5;
$col=1;
$MAXPAGE=5;
$p=0;
$name=$_GET['name'];
$cat=0;
if ($_REQUEST['cat']!='') $cat=killInjection($_REQUEST['cat']);
$catallsub=$cat;
if ($_REQUEST['p']!='') $p=$_REQUEST['p'];
$sql_pro = "select * from orders where user_mem='".$_SESSION['mem']."' in (".$catallsub."0) order by id DESC limit ".$row*$col*$p.",".$row*$col;
$result = @mysql_query($sql_pro,$con);
$total=CountRecord("orders","user_mem in (".$catallsub."0)");
$sql_cat=@mysql_query("SELECT user FROM thanhvien where user='".$cat."' ");
$row_cat=mysql_fetch_assoc($sql_cat);
?>
<div id="content_center">
<div id="list_cat">
<?php if(($_REQUEST['cat']=='')&&($_REQUEST['views']==''))
{?>
<h3 style="
    color: #e5101d;
    font-size: 16px;
    font-weight: bold;
    height: 32px;
    line-height: 30px;
    border-bottom: 1px solid #ededed;
    text-transform: uppercase;
    margin-top: 0px;
">Quản lý đơn hàng</h3>

<?}else{?>
<h3><?php echo $row_cat['name'];?></h3>
<?}?>
</div>
<div id="list_cat_content_help">
<?php if(($_REQUEST['cat']==''))
{?>

<div style="padding-top:0px;padding-left:0px;">
<div style="padding: 11px;background: #e60f0f;color: #fff;"><b>Tổng đơn hàng: </b><? echo mysql_num_rows(mysql_query("SELECT * FROM orders where user_mem='".$_SESSION['mem']."' "));?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 
      <span><b>Đơn hàng chưa duyệt:</b> <? echo mysql_num_rows(mysql_query("SELECT * FROM orders where user_mem='".$_SESSION['mem']."' and active=0 "));?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
	  <span><b>Đơn hàng đang giao:</b>  <? echo mysql_num_rows(mysql_query("SELECT * FROM orders where user_mem='".$_SESSION['mem']."' and active=1 "));?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
      <span><b>Đơn hàng đã giao:</b>  <? echo mysql_num_rows(mysql_query("SELECT * FROM orders where user_mem='".$_SESSION['mem']."' and active=2 "));?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
<span><b>Đơn hàng đã hủy:</b>  <? echo mysql_num_rows(mysql_query("SELECT * FROM orders where user_mem='".$_SESSION['mem']."' and active=5 "));?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>  	  
 </span>
 </div>
<!--begin all help-->



<?php
$sql_help = "select * from orders  orders where  kichhoat = '1' and user_mem='".$_SESSION['mem']."' order by orders_date DESC limit ".$row*$col*$p.",".$row*$col;
$result1 = @mysql_query($sql_help,$con);
$total1=@mysql_num_rows($result1);
for($i=1;$i<=$row&&$row_pro=@mysql_fetch_array($result1);$i++)
{
    $sql_user=@mysql_query("SELECT * FROM user_shop where user='".$row_pro['orders_user']."' ");
    $row_user=@mysql_fetch_assoc($sql_user);
	$sql_user_detai=@mysql_query("SELECT * FROM orderdetail where ordersdetail_ordersid='".$row_pro['orders_id']."' ");
    $row_user_detai=@mysql_fetch_assoc($sql_user_detai);
    $sql_city=@mysql_query("SELECT id,name FROM city where id='".$row_pro['city']."' ");
    $row_city=@mysql_fetch_assoc($row_sp);
    $sql_sp=@mysql_query("SELECT * FROM products where id='".$row_user_detai['ordersdetail_product_id']."' ");
    $row_sp=@mysql_fetch_assoc($sql_sp);
	 $kiemtra_khieunai=@mysql_query("SELECT * FROM khieunai where id_donhang='".$row_pro['orders_id']."' ");
    $kiemtra_khieunai_in=@mysql_fetch_assoc($kiemtra_khieunai);
    if($i%2)
    {
        $color="#EAEAEA";
    }
    else
    {
        $color="#FFFFFF";
    }
	
	
	

?>



				

			 


 

 <form method="POST"   >	


<div  style="border: 1px solid #ddd;">
<div  style="height: 40px;background-color: #f1f1f1;">
<div style="padding: 11px;" ><b>Ngày: </b><?php echo $row_pro['orders_date'];?>&nbsp;&nbsp;&nbsp;&nbsp;
 
      <span ><b>Giá:</b>  <span style="color: #000;padding-right: 5px;"><?php echo str_replace(",",",",number_format($row_user_detai['ordersdetail_price']));?>đ</span>&nbsp;&nbsp;</span> 
	  <span ><b>SL:</b>  <span style="color: #000;padding-right: 5px;"><?php echo $row_user_detai['ordersdetail_quantity'];?></span>&nbsp;&nbsp;</span> 
	   <span ><b>Tổng: </b> <span style="color: #000;padding-right: 5px;"><b style=" color: #2196F3; "><?php echo str_replace(",",",",number_format($row_user_detai['ordersdetail_price']*$row_user_detai['ordersdetail_quantity']));?>đ</b></span>&nbsp;&nbsp;</span> 
    <span ><b>Ship: </b> <span style="color: #000;padding-right: 5px;"><?php echo str_replace(",",",",number_format($row_user_detai['phivanchuyen']));?>đ</span>&nbsp;&nbsp;&nbsp;&nbsp;</span> 
	<span ><b>Trừ điểm Lửa: </b> <span style="color: #000;padding-right: 5px;"><?php echo str_replace(",",",",number_format($row_user_detai['trudiemlua']));?>đ</span>&nbsp;&nbsp;&nbsp;&nbsp;</span> 
	
 <span ><b>Thành tiền:</b>  <b style="color: #f13326;"><?php echo str_replace(",",",",number_format(($row_user_detai['ordersdetail_price']*$row_user_detai['ordersdetail_quantity']+$row_user_detai['phivanchuyen']) - $row_user_detai['trudiemlua'],0));?> đ</b></span> 
 
 <span style="float: right;">Mã ĐH: <b style="color: #161ae2;">#<?php echo $row_pro['orders_id'];?></b>
 </span>
 </div>

 </div>
                <div style="
    height: 130px;
">
<div class="order-inf2-lf ">

                        
                    
               <div>
					<a id="xemsanpham" href="./<?php echo doidau(mb_strtolower($row_sp['name'],"UTF8"));?>-pro-<?php echo $row_sp['id'];?>.html"  >  <img style="width: 100px;height: 100px;border: 1px solid #ddd;margin: 14px;" src="<?php echo $row_sp['image'];?>"></a>

					</div>


               <div style="
    margin-top: -119px;
    margin-left: 124px;
">
					<a style="color: black;" id="xemsanpham" href="./<?php echo doidau(mb_strtolower($row_sp['name'],"UTF8"));?>-pro-<?php echo $row_sp['id'];?>.html"  ><b><?php echo $row_sp['name'];?></b></a>
				<br>
					<span style="  color: #000; display: inline-block;    margin-top: 9px;">Shop: <a style="color: #0066ff;" target="_blank"  href="/<?php echo $row_user['user'];?>"> <?php echo $row_user['company'];?></a></span>

					<br>

				
					<?if($row_pro['active']=='0' ){?>	
				  	<?
// xóa ảnh 1 baner
if (isset($_POST['huydonhang'])) {
	$active = $_POST['active'];
    $thongbao= 'Đơn hàng số '.$row_pro['orders_id'].' đã bị Hủy bởi người mua';
date_default_timezone_set("Asia/Ho_Chi_Minh");
$date = date("d-m-Y H:i:s");
	

			
	
	$sql1111 = "update orders set active='5', active_shop='5' where orders_id='".$active."' and  user_mem='".$_SESSION['mem']."' ";
	
     if (mysql_query($sql1111)) {
			
			//$active = $_SESSION['active_id'];
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
	
	if($row_pro['orders_id']== $active){	
	
				$sql_huy = "insert into thongbao (thongbao,date,user) values ('".$thongbao."' ,'".$date."','".$_SESSION['mem']."'  ) ";
				$sql_huy_shop = "insert into thongbao_shop (thongbao,date,user) values ('".$thongbao."' ,'".$date."','".$row_pro['orders_user']."'  ) ";
						if (mysql_query($sql_huy) && mysql_query($sql_huy_shop)) {
			
			//$active = $_SESSION['active_id'];
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
				  <span style="background: #04a89f; padding: 4px 12px; color: #fff; display: inline-block;    margin-top: 8px;">Chờ duyệt</span>
			
				   <input type="hidden" name="active" value="<?php echo $row_pro['orders_id'];?>">
				    <button  type="submit" name="huydonhang" onclick="return confirm('Bạn chắc chắn hủy bỏ đơn hàng này');" style="background: #999999; padding: 2px 9px; color: #fff; display: inline-block;    margin-top: 8px;">Hủy</button>
					
					<?}else{?>
					
					<?}?>
					
					<?if($row_pro['active']=='1'){?>	
					<span style="background: #0e04a8; padding: 4px 12px; color: #fff; display: inline-block;    margin-top: 8px;">Đang giao hàng</span>
					<?}else{?>
					<?}?>
					
					<?if( ($row_pro['active']=='2') ) {?>	

					<span style="background: #0f8800; padding: 4px 12px; color: #fff; display: inline-block;    margin-top: 8px;">Đã giao</span>
					
					<?}else{?>
					<?}?>
					
					<?if($row_pro['active']=='20'){?>	
					<span style="background: #0f8800; padding: 4px 12px; color: #fff; display: inline-block;    margin-top: 8px;">Khách đã nhận hàng và đánh giá</span>
					<?}else{?>
					<?}?>
					
					<?if($row_pro['active']=='3'){?>	
					<span style="background: #d020a2; padding: 4px 12px; color: #fff; display: inline-block;    margin-top: 8px;">Khách không nhận hàng</span>
					<?}else{?>
					<?}?>
														
					<?if($row_pro['active']=='4'){?>	
					<span style="background: #000000; padding: 4px 12px; color: #fff; display: inline-block;    margin-top: 8px;">Chuyển về cho Shop</span>
					<?}else{?>
					<?}?>
					
					<?if($row_pro['active']=='5'){?>	
					<span style="background: #999999; padding: 4px 12px; color: #fff; display: inline-block;    margin-top: 8px;">Đã hủy đơn hàng</span>
					<?}else{?>
					<?}?>
					
					<?if($row_pro['active']=='6'){?>	
					<span style="background: #F44336; padding: 4px 12px; color: #fff; display: inline-block;    margin-top: 8px;">Hết hàng</span>
					<?}else{?>
					<?}?>
					
					
					
					
					</form>
	 
					
					

					
					
<?if($row_pro['active']=='2'){?>	
<?if($kiemtra_khieunai_in['id_donhang']==""){?>	
<span style=" display: inline-block;      ">
					
					
<?
					
// xóa ảnh 1 baner
if (isset($_POST['guibaidanhgia'])) {
$id = $_POST["id"]; //ID OF THE CONTENT
$name = $row_pro['orders_name'];

$comment = $_POST["comment"];
$rate = $_POST["rate"];
$user_mem = $_SESSION['mem'];
date_default_timezone_set("Asia/Ho_Chi_Minh");
$dateposted = date("d-m-Y H:i:s");
$active = $_POST['active'];

$diemlua= $row_pro['diemlua'];
$user_shop= $row_pro['orders_user'];
$nguoimua= $row_pro['orders_name'];

$tensanpham= $row_sp['name'];
$idsanpham= $row_sp['id'];


if($row_pro['orders_id']== $active){	
	
 $sql_danhgia_2 = "INSERT INTO comment (id, name, comment, rate, user, date_time) VALUES ('$id','$name','$comment','$rate','$user_mem','$dateposted')";
 $sql_danhgia_4 = "INSERT INTO thongbao (thongbao, date, user) VALUES ('Bạn đã đánh giá thành công sản phẩm và được cộng vào $diemlua điểm Lửa' ,'$dateposted','$user_mem')";
  $sql_danhgia_5 = "INSERT INTO thongbao_shop (thongbao, date, user) VALUES ('Người mua $nguoimua đã đánh giá sản phẩm <b >$tensanpham</b> với số điểm là  $rate, nội dung ($comment) của đơn hàng số $active. ' ,'$dateposted','$user_shop')";
 if (mysql_query($sql_danhgia_2) && mysql_query($sql_danhgia_4) && mysql_query($sql_danhgia_5) ) {
			
			
				echo "<SCRIPT LANGUAGE='JavaScript'>
   
    window.location.href='?home=member&act=quanlydonhang&p=$p';
    </SCRIPT>";
		}	
		else {
				echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Thao tác không thành công')
    window.location.href='?home=member&act=quanlydonhang&p=$p';
    </SCRIPT>";
		}
					}else{
					}

  	
$sql_danhgia_1 = "update orders set active='20',active_shop='20',danhgia='0' where orders_id='".$active."' and user_mem='".$_SESSION['mem']."' ";

$sql_danhgia_3 = "update thanhvien set diemlua_mem = diemlua_mem + '".$diemlua."' where user='".$_SESSION['mem']."' ";

		if (mysql_query($sql_danhgia_1) && mysql_query($sql_danhgia_3) ) {
			
			
				echo "<SCRIPT LANGUAGE='JavaScript'>
   
    window.location.href='?home=member&act=quanlydonhang&p=$p';
    </SCRIPT>";
		}	
		else {
				echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Thao tác không thành công')
    window.location.href='?home=member&act=quanlydonhang&p=$p';
    </SCRIPT>";
		}

		
}	
?>



			<form method="POST" name="cartform" onsubmit="return check()">		
					
					 <select style=" height: 25px; " name="rate">
					 
					   <option value="" >Điểm</option>
  <option value="1">1 Sao</option>
  <option value="2">2 Sao</option>
  <option value="3">3 Sao</option>
  <option value="4">4 Sao</option> 
  <option value="5">5 Sao</option>  
</select>
					 <input style="height: 20px;width: 350px;" name="comment" placeholder=" Viết đánh giá của bạn về sản phẩm" >
					 <input type="hidden" name="active" value="<?php echo $row_pro['orders_id'];?>">
					 
					 <input  type="hidden" name="id" value="<?php echo $row_sp['id'];?>">
					  
 
					<input type="submit" name="guibaidanhgia" style="background: #080088; padding: 2px 12px; color: #fff; display: inline-block;    margin-top: 8px;" value="Gửi">
					
					
</form>						
	<script language="javascript" type="text/javascript">
function check()
{


if(document.cartform.rate.value =="")
{
alert("Quý khách chưa cho Điểm sản phẩm");
document.cartform.rate.focus();
return false;
}

if(document.cartform.comment.value =="")
{
alert("Quý khách chưa đánh giá cho sản phẩm");
document.cartform.comment.focus();
return false;
}


if(document.cartform.rate.value > "5")
{
alert("Lỗi điểm số, quý khách vui lòng cho điểm lại!");
document.cartform.rate.focus();
return false;
}






return true;
}
</script>				
					</span>
<?}else{?>

<?if($kiemtra_khieunai_in['hoantat_khieunai']=="1"){?>	
<span style=" display: inline-block;      ">
					
					
<?
					
// xóa ảnh 1 baner
if (isset($_POST['guibaidanhgia'])) {
$id = $_POST["id"]; //ID OF THE CONTENT
$name = $row_pro['orders_name'];

$comment = $_POST["comment"];
$rate = $_POST["rate"];
$user_mem = $_SESSION['mem'];
date_default_timezone_set("Asia/Ho_Chi_Minh");
$dateposted = date("d-m-Y H:i:s");
$active = $_POST['active'];

$diemlua= $row_pro['diemlua'];
$user_shop= $row_pro['orders_user'];
$nguoimua= $row_pro['orders_name'];

$tensanpham= $row_sp['name'];
$idsanpham= $row_sp['id'];


if($row_pro['orders_id']== $active){	
	
 $sql_danhgia_2 = "INSERT INTO comment (id, name, comment, rate, user, date_time) VALUES ('$id','$name','$comment','$rate','$user_mem','$dateposted')";
 $sql_danhgia_4 = "INSERT INTO thongbao (thongbao, date, user) VALUES ('Bạn đã đánh giá thành công sản phẩm và được cộng vào $diemlua điểm Lửa' ,'$dateposted','$user_mem')";
  $sql_danhgia_5 = "INSERT INTO thongbao_shop (thongbao, date, user) VALUES ('Người mua $nguoimua đã đánh giá sản phẩm <b >$tensanpham</b> với số điểm là  $rate, nội dung ($comment) của đơn hàng số $active. ' ,'$dateposted','$user_shop')";
 if (mysql_query($sql_danhgia_2) && mysql_query($sql_danhgia_4) && mysql_query($sql_danhgia_5) ) {
			
			
				echo "<SCRIPT LANGUAGE='JavaScript'>
   
    window.location.href='?home=member&act=quanlydonhang&p=$p';
    </SCRIPT>";
		}	
		else {
				echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Thao tác không thành công')
    window.location.href='?home=member&act=quanlydonhang&p=$p';
    </SCRIPT>";
		}
					}else{
					}

  	
$sql_danhgia_1 = "update orders set active='20',active_shop='20',danhgia='0' where orders_id='".$active."' and user_mem='".$_SESSION['mem']."' ";

$sql_danhgia_3 = "update thanhvien set diemlua_mem = diemlua_mem + '".$diemlua."' where user='".$_SESSION['mem']."' ";

		if (mysql_query($sql_danhgia_1) && mysql_query($sql_danhgia_3) ) {
			
			
				echo "<SCRIPT LANGUAGE='JavaScript'>
   
    window.location.href='?home=member&act=quanlydonhang&p=$p';
    </SCRIPT>";
		}	
		else {
				echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Thao tác không thành công')
    window.location.href='?home=member&act=quanlydonhang&p=$p';
    </SCRIPT>";
		}

		
}	
?>



			<form method="POST" name="cartform" onsubmit="return check()">		
					
					 <select style=" height: 25px; " name="rate">
					 
					   <option value="" >Điểm</option>
  <option value="1">1 Sao</option>
  <option value="2">2 Sao</option>
  <option value="3">3 Sao</option>
  <option value="4">4 Sao</option> 
  <option value="5">5 Sao</option>  
</select>
					 <input style="height: 20px;width: 350px;" name="comment" placeholder=" Viết đánh giá của bạn về sản phẩm" >
					 <input type="hidden" name="active" value="<?php echo $row_pro['orders_id'];?>">
					 
					 <input  type="hidden" name="id" value="<?php echo $row_sp['id'];?>">
					  
 
					<input type="submit" name="guibaidanhgia" style="background: #080088; padding: 2px 12px; color: #fff; display: inline-block;    margin-top: 8px;" value="Gửi">
					
					
</form>						
	<script language="javascript" type="text/javascript">
function check()
{


if(document.cartform.rate.value =="")
{
alert("Quý khách chưa cho Điểm sản phẩm");
document.cartform.rate.focus();
return false;
}

if(document.cartform.comment.value =="")
{
alert("Quý khách chưa đánh giá cho sản phẩm");
document.cartform.comment.focus();
return false;
}


if(document.cartform.rate.value > "5")
{
alert("Lỗi điểm số, quý khách vui lòng cho điểm lại!");
document.cartform.rate.focus();
return false;
}






return true;
}
</script>				
					</span>
<?}else{?>
					<?}?>

					<?}?>
					
					
					
					
					<?}else{?>
						<?}?>
					
					
					
					
					
					
					
					
					
					
					<br>
					<?if($row_pro['mausac']==""){?>	
					
					<?}else{?>
					  <b style="   display: inline-block;    margin-top: 5px;">Màu sắc: <span style="background-color: #<?php echo $row_pro['mausac'];?>; outline: 1px solid #ccc;" ><a href="java:">&nbsp;&nbsp;&nbsp;&nbsp;</a> </b>
					<?}?>
                     
				
					
					<br>
					<?if($row_pro['kichthuoc']==""){?>	
					
					<?}else{?>
					<b style=" display: inline-block;    margin-top: 4px;">Kích thước: <span style="color: #000;padding-right: 5px;"><?php echo $row_pro['kichthuoc'];?></span></b>
					<?}?>
				
				
					
				
					
				
				
				
					
		
					
</div>
	         
					
					  

                                    </div>
									
				
            </div>
			
			
			<div style=" float: right; margin-top: -120px;    width: 292px; ">
			<span><b>Người nhận:</b><b style=" color: #FF9800; "> <?php echo $row_pro['orders_name'];?></b></span>
			<br>
			<span><b>Địa chỉ:</b> <?php echo $row_pro['orders_address'];?></span>
						<br>
			<span><b>Điện thoại:</b> <?php echo $row_pro['orders_phone'];?></span>
						<br>
						<?if($row_pro['ghichu']==""){?>	
					
					<?}else{?>
								<span>	<b>Ghi chú:</b><b style=" color: red; "> <?php echo $row_pro['ghichu'];?></b></span>
								<br>
					<?}?>
					
<?if($row_pro['diemlua']==""){?>	
					
					<?}else{?>
								<span>	<b>Điểm lửa:</b><b style=" color: red; "> <?php echo $row_pro['diemlua'];?></b> được cộng sau khi đánh giá</span>
					<?}?>
					
 

                         <?if($row_pro['active']=='2' ){?>	
				  
 
 
				  
					
 
   <?if($kiemtra_khieunai_in['id_donhang']==""){?>	 	
					<br>
				
					 <?if($row_pro['chuyentien']=="0"){?>	 	
			    <a id="xemsanpham" href="./index1.php?home=khieunai&p=<?php echo $row_pro['orders_id'];?>"   style="background: #F44336; padding: 2px 9px; color: #fff; display: inline-block; margin-top: 4px;">Khiếu nại</a>
		
				<?}else{?>
				<?}?>
	
				<?}else{?>
				
				<?if($kiemtra_khieunai_in['hoantat_khieunai']=="1"){?>	 	
 				<a id="xemsanpham" href="./index1.php?home=khieunai&p=<?php echo $row_pro['orders_id'];?>"   style="background: #F44336; padding: 2px 9px; color: #fff; display: inline-block; margin-top: 4px;">Hoàn tất khiếu nại</a>
			
				<?}else{?>
								<a id="xemsanpham" href="./index1.php?home=khieunai&p=<?php echo $row_pro['orders_id'];?>"   style="background: #F44336; padding: 2px 9px; color: #fff; display: inline-block; margin-top: 4px;">Theo dõi khiếu nại</a>
			
				<?}?>
				
		
					<?}?>
					<?}?>

					
				
					
					
					
 
	 
					
      				
					
					
			</div>
			
</div>
<br>




 
	<?}?>











<!--div class="row_pro_cat_help">
<div style="height:20px;color:#094FC8;">
<a href="./?home=help&act=views&views=<?php echo $row_pro['user'];?>&cat=<?php echo $row_pro['user_mem'];?>">
<?php echo $row_pro['orders_id'];?>
</a>
</div>
<div style="padding-top:5px">
<div style="float: left;padding-top:0px">
<a href="./?home=help&act=views&views=<?php echo $row_pro['id'];?>&cat=<?php echo $row_pro['cat_id'];?>">
<img src="<?php echo $row_pro['image'];?>" width="110" height="80" style="border:1px solid #C0C0C0">
</a>
</div>

<div style="float: left;width:900px;padding-top:0px;padding-left:10px;">
<div style="color:#a0a0a0;font-size:11px;padding-bottom:5px">
<?php echo $row_pro['date'];?>
</div>
<div><?php echo $row_pro['short'];?></div>
</div>

</div>
</div-->












 
<?}?>





<? if ($total1>0) { ?>
<div style="clear:both;height:10px;padding-top:5px">
<hr color="#E9E9E9" width="100%" SIZE=1 align="center">
</div>
<div class="pagination">
<TABLE bgcolor="#FFFFFF" cellSpacing=10 cellPadding=0 width="100%" border=0 id="table35" style="line-height: 120%; text-align: justify" align="center">
<?
$pages=count_page($total1,($row*$col)/9);
echo '<tr><td class="smallfont" align="left" ></td>';
echo '<td class="smallfont" align="right">';
$param="";
if ($p>1) echo '<a class="buton_timkiem" title="&#272;&#7847;u tiên" href="/?home=member&act=quanlydonhang&p=0">Đầu tiên</a>  ';
if ($p>0) echo '<a class="buton_timkiem" title="&#272;&#7847;u tiên" href="/?home=member&act=quanlydonhang&p='.($p-1).'">Trang trước</a>';
$from=($p-2>0?$p-1:0);
$to=($p+2<$pages?$p+2:$pages);
for ($i=$from;$i<$to;$i++)
{
	if ($i!=$p) echo '<a href="/?home=member&act=quanlydonhang&p='.$i.'">'.($i+1).'</a> ';
	else echo '<a class="active1">'.($i+1).'</a> ';
}
if ($p<$i-1) echo '<a class="buton_timkiem" title="Ti&#7871;p theo" href="/?home=member&act=quanlydonhang&p='.($p+1).'">Trang tiếp</a>';

echo '</td></tr></table>';
?>

</div>
<!-- end all help-->
</div>
<?}else{?>

<?}?>
</div>
</div>
