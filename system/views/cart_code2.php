<?
echo $_SESSION["session_message"];
$_SESSION["session_message"] = "";
?>



<?php
$row=10;
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
">&nbsp;<i class="fa fa-fw fa-shopping-cart"></i> Quản lý Giỏ hàng</h3>

<?}else{?>
<h3><?php echo $row_cat['name'];?></h3>
<?}?>
</div>
<div id="list_cat_content_help">
<?php if(($_REQUEST['cat']==''))
{?>

<div style="padding-top:0px;padding-left:0px;">
<div style="padding: 11px;background: #e60f0f;color: #fff;">

      <span>Có <b> <? echo mysql_num_rows(mysql_query("SELECT * FROM orders where user_mem='".$_SESSION['mem']."' and kichhoat=0 "));?></b> sản phẩm trong giỏ hàng</span> 
	  
 </span>
 
 </div>
<!--begin all help-->



<?php
$sql_help = "select * from orders  orders where user_mem='".$_SESSION['mem']."' order by orders_date DESC limit ".$row*$col*$p.",".$row*$col;
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
    if($i%2)
    {
        $color="#EAEAEA";
    }
    else
    {
        $color="#FFFFFF";
    }
	
	
	
// xóa ảnh gio hang 
if (isset($_POST['xoa_order'])) {
$xoa_order_value = $_POST['xoa_order_value'];


	$sql1111 = "delete from orders where orders_id='".$xoa_order_value."' and user_mem='".$_SESSION['mem']."' ";
	
			$sql11112 = "delete from orderdetail where ordersdetail_ordersid='".$xoa_order_value."' and user_mem='".$_SESSION['mem']."'  ";
		if (mysql_query($sql1111) && mysql_query($sql11112)) {
			
			
				echo "<SCRIPT LANGUAGE='JavaScript'>
   

      window.location.href='./index1.php?home=cart2';
    </SCRIPT>";
		}	
		else {
				echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Thao tác không thành công')
	  window.location.href='./index1.php?home=cart2';

    </SCRIPT>";
		}
  	


}	

?>

	<?php if($row_pro['kichhoat'] =='0' )
{?>

<form method="POST" >


<div  style="border: 1px solid #ddd;">
<div  style="height: 40px;background-color: #f1f1f1;">
<div style="padding: 11px;" ><b>Ngày: </b><?php echo $row_pro['orders_date'];?>&nbsp;&nbsp;&nbsp;&nbsp;
 
      <span ><b>Giá:</b>  <span style="color: #000;padding-right: 5px;"><?php echo str_replace(",",",",number_format($row_user_detai['ordersdetail_price']));?>đ</span>&nbsp;&nbsp;</span> 
	  <span ><b>SL:</b>  <span style="color: #000;padding-right: 5px;"><?php echo $row_user_detai['ordersdetail_quantity'];?></span>&nbsp;&nbsp;</span> 
	   <span ><b>Tổng: </b> <span style="color: #000;padding-right: 5px;"><b style=" color: #2196F3; "><?php echo str_replace(",",",",number_format($row_user_detai['ordersdetail_price']*$row_user_detai['ordersdetail_quantity']));?>đ</b></span>&nbsp;&nbsp;</span> 
    <span ><b>Ship: </b> <span style="color: #000;padding-right: 5px;"><?php echo str_replace(",",",",number_format($row_user_detai['phivanchuyen']));?>đ</span>&nbsp;&nbsp;&nbsp;&nbsp;</span> 
	<span ><b>Trừ điểm Lửa: </b> <span style="color: #000;padding-right: 5px;"><?php echo str_replace(",",",",number_format($row_user_detai['trudiemlua']));?>đ</span>&nbsp;&nbsp;&nbsp;&nbsp;</span> 
	
 <span ><b>Thành tiền:</b>  <b style="color: #f13326;"><?php echo str_replace(",",",",number_format(($row_user_detai['ordersdetail_price']*$row_user_detai['ordersdetail_quantity']+$row_user_detai['phivanchuyen']) - $row_user_detai['trudiemlua'],0));?> đ</b></span> 
 

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


					
					
					
					
					
					
						<?if($row_pro['danhgia']=="0"){?>	
					<?
					
// xóa ảnh 1 baner
if (isset($_POST['danhgia'])) {
	$danhgia = $_POST['danhgia'];
    $user_mem = $_POST['user_mem'];

	
$sql11111 = "update orders set danhgia='0' where user_mem='".$user_mem."' ";
		if (mysql_query($sql11111)) {
			
			
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
			
	
	$sql1111 = "update orders set danhgia='1' where orders_id='".$danhgia."' ";
		if (mysql_query($sql1111)) {
			
			
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
				
				
										<br>
					<?if($row_pro['diemlua']==""){?>	
					
					<?}else{?>
					<b style=" display: inline-block;    margin-top: 4px;">Điểm lửa:: <span style="color: #000;padding-right: 5px;"><b style=" color: red; "> <?php echo $row_pro['diemlua'];?></b> được cộng sau khi mua hàng thành công và đánh giá</span></b>
					<?}?>
				
				
					

				
				
					
		
					
</div>
	         
					
					  

                                    </div>
									
				
            </div>
			
			
			<div style=" float: right; margin-top: -120px;    width: 292px; ">
			 <button onclick="window.location='./index1.php?home=quanlydonhang_order_giohang&p=<?php echo $row_pro['orders_id'];?>'"  style=" color: #fff; font-size: 14px; line-height: 32px; height: 32px; padding: 0 82px; background-color: #e5101d; border: none; text-transform: uppercase; border-radius: 2px; font-weight: bold; white-space: nowrap;  " title="Mua hàng" type="button">Mua hàng</button>
			 
			 <input type="hidden" name="xoa_order_value" value="<?php echo $row_pro['orders_id'];?>">
			 <button style=" color: #fff; font-size: 14px; line-height: 32px; height: 32px; padding: 0 6px; background-color: #908a8a; border: none; text-transform: uppercase; border-radius: 2px; font-weight: bold; white-space: nowrap;  " title="Xóa"   style="color: red;" type="submit" name="xoa_order">Xóa</button>
			</div>
			
</div>
<br>

</form>


<?}else{?>
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
if ($p>1) echo '<a class="buton_timkiem" title="&#272;&#7847;u tiên" href="/index1.php?home=cart2&p=0">Đầu tiên</a>  ';
if ($p>0) echo '<a class="buton_timkiem" title="&#272;&#7847;u tiên" href="/index1.php?home=cart2&p='.($p-1).'">Trang trước</a>';
$from=($p-2>0?$p-1:0);
$to=($p+2<$pages?$p+2:$pages);
for ($i=$from;$i<$to;$i++)
{
	if ($i!=$p) echo '<a href="/index1.php?home=cart2&p='.$i.'">'.($i+1).'</a> ';
	else echo '<a class="active1">'.($i+1).'</a> ';
}
if ($p<$i-1) echo '<a class="buton_timkiem" title="Ti&#7871;p theo" href="/index1.php?home=cart2&p='.($p+1).'">Trang tiếp</a>';

echo '</td></tr></table>';
?>

</div>
<!-- end all help-->
</div>
<?}else{?>

<?}?>
</div>
</div>
