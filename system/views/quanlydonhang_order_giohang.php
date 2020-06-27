
<?php
$truy_xuat=mysql_query("SELECT * FROM orders where orders_id='".$_REQUEST['p']."'");
$truy_xuat_in=mysql_fetch_assoc($truy_xuat);



if($_SESSION['mem']==$truy_xuat_in['user_mem'] && $_REQUEST['p'] == $truy_xuat_in['orders_id']  ){?>





<?
echo $_SESSION["session_message"];
$_SESSION["session_message"] = "";

?>

<script language="javascript" type="text/javascript">
function check()
{


if(document.cartform.phivanchuyen.value =="")
{
alert("Vui lòng chọn Tỉnh/ Thành nhận hàng");
document.cartform.phivanchuyen.focus();
return false;
}











return true;
}
</script>	

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
$sql9999=mysql_query("SELECT * FROM thanhvien where user='".$_SESSION['mem']."'");
$row9999=mysql_fetch_assoc($sql9999);
$sql99991=mysql_query("SELECT * FROM orders where orders_id='".$p."'");
$row99991=mysql_fetch_assoc($sql99991);
$sql999911=mysql_query("SELECT * FROM orderdetail where ordersdetail_ordersid='".$p."'");
$row999911=mysql_fetch_assoc($sql999911);
$sql9999111=mysql_query("SELECT * FROM products where id='".$row999911['ordersdetail_product_id']."'");
$row9999111=mysql_fetch_assoc($sql9999111);
$sql99991111=mysql_query("SELECT * FROM user_shop where user='".$row99991['orders_user']."'");
$row99991111=mysql_fetch_assoc($sql99991111);
$sql999911112=mysql_query("SELECT * FROM provinces where id='".$row99991['tinhthanh']."'");
$row999911112=mysql_fetch_assoc($sql999911112);

// xóa ảnh 1 baner
if (isset($_POST['butSub'])) {
	    $name=$_POST['name'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$address=$_POST['address'];
		$ghichu=$_POST['ghichu'];
	



	

			
	
	$sqlsub = "update orders set orders_name = '".$name."',orders_phone = '".$phone."',orders_email = '".$email."',orders_address = '".$address."',ghichu = '".$ghichu."',kichhoat = '1',active_shop = '0'  where orders_id='".$row99991['orders_id']."' ";
	$nguoimua = "update products set nguoimua = + 1  where id='".$row999911['ordersdetail_product_id']."' ";
		if (mysql_query($sqlsub) && mysql_query($nguoimua) ) 
			 {
			
			
				echo "<SCRIPT LANGUAGE='JavaScript'>
   

      window.location.href='./index1.php?home=quanlydonhang_order_chitiet_giohang&p=$row99991[orders_id]';
    </SCRIPT>";
		}	
		else {
				echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Thao tác không thành công')
	  window.location.href='./index1.php?home=quanlydonhang_order_giohang&p=$row99991[orders_id]';

    </SCRIPT>";
		}
  	


}	




// xóa ảnh 2 baner
$sql2=mysql_query("SELECT * FROM provinces where id='".$_POST['phivanchuyen']."'");
$row2=mysql_fetch_assoc($sql2);
$phi = $row2['phivanchuyen'];
$phivanchuyen1 = $_POST['phivanchuyen'];
if (isset($_POST['phivanchuyen'])) {
	

	
	$sql1111 = "update orderdetail set phivanchuyen = '".$phi."'  where ordersdetail_ordersid='".$row99991['orders_id']."' ";

$sql11112 = "update orders set tinhthanh = '".$phivanchuyen1."'  where orders_id='".$row99991['orders_id']."' ";
		if (mysql_query($sql1111) && mysql_query($sql11112)) {
			
			
				echo "<SCRIPT LANGUAGE='JavaScript'>
   

      window.location.href='./index1.php?home=quanlydonhang_order_giohang&p=$row99991[orders_id]';
    </SCRIPT>";
		}	
		else {
				echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Thao tác không thành công')
	  window.location.href='./index1.php?home=quanlydonhang_order_giohang&p=$row99991[orders_id]';

    </SCRIPT>";
		}
  	


}	

?>
<?if($row9999['diemlua_mem'] >= $row999911['ordersdetail_price']*$row999911['ordersdetail_quantity']+$row999911['phivanchuyen']){?>	
<?if($row999911['trudiemlua'] < $row999911['ordersdetail_price']*$row999911['ordersdetail_quantity']+$row999911['phivanchuyen']){?>	
 <?
// xóa ảnh 1 baner
if (isset($_POST['thanhtoan'])) {
	$tongcong_gia = $row999911['ordersdetail_price']*$row999911['ordersdetail_quantity']+$row999911['phivanchuyen'];


	

			
	
	$sql1111 = "update orderdetail set trudiemlua = trudiemlua + '".$tongcong_gia."'  where ordersdetail_ordersid='".$row99991['orders_id']."' ";
		if (mysql_query($sql1111)) 
			$sql1111 = "update thanhvien set diemlua_mem = diemlua_mem - '".$tongcong_gia."'  where user='".$_SESSION['mem']."' ";
		if (mysql_query($sql1111)) {
			
			
				echo "<SCRIPT LANGUAGE='JavaScript'>
   
  window.alert('Bạn đã sử dụng điểm Lửa thanh toán thành công')
      window.location.href='./index1.php?home=quanlydonhang_order_giohang&p=$row99991[orders_id]';
    </SCRIPT>";
		}	
		else {
				echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Thao tác không thành công')
	  window.location.href='./index1.php?home=quanlydonhang_order_giohang&p=$row99991[orders_id]';

    </SCRIPT>";
		}
  	


}	
?>	
	
	<?}else{?>			
	<?}?>
   <?}else{?>			
	<?}?>		


<?if($row9999['diemlua_mem'] < $row999911['ordersdetail_price']*$row999911['ordersdetail_quantity']+$row999911['phivanchuyen']){?>	
<?if($row999911['trudiemlua'] < $row999911['ordersdetail_price']*$row999911['ordersdetail_quantity']+$row999911['phivanchuyen']){?>	
<?
// xóa ảnh 1 baner
if (isset($_POST['thanhtoan'])) {
	$tongcong_gia = $row9999['diemlua_mem'];


	

			
	
	$sql1111 = "update orderdetail set trudiemlua = trudiemlua + '".$tongcong_gia."'  where ordersdetail_ordersid='".$row99991['orders_id']."' ";
		if (mysql_query($sql1111)) 
			$sql1111 = "update thanhvien set diemlua_mem = diemlua_mem - '".$tongcong_gia."'  where user='".$_SESSION['mem']."' ";
		if (mysql_query($sql1111)) {
			
			
				echo "<SCRIPT LANGUAGE='JavaScript'>
   
  window.alert('Bạn đã sử dụng điểm Lửa thanh toán thành công')
      window.location.href='./index1.php?home=quanlydonhang_order_giohang&p=$row99991[orders_id]';
    </SCRIPT>";
		}	
		else {
				echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Thao tác không thành công')
	  window.location.href='./index1.php?home=quanlydonhang_order_giohang&p=$row99991[orders_id]';

    </SCRIPT>";
		}
  	


}	
?>
 	
	<?}else{?>			
	<?}?>	
	<?}else{?>			
	<?}?>	
<div id="content_center">
 <div class="d-step" style="
       height: 70px;
    margin-top: 15px;
">
            <span class="s-title-step icon-shopping">Thông tin đơn hàng</span>
            <div class="d-item-step first">
                <p class="p-step">Bước 3</p>
                <p class="p-text-step">Thông tin người nhận</p>
            </div>
            <div class="d-item-step">
                <p class="p-step">Bước 2</p>
                <p class="p-text-step">Thanh toán điểm Lửa (nếu có)</p>
            </div>
            <div class="d-item-step">
                <p class="p-step">Bước 1</p>
                <p class="p-text-step ">Chọn Tỉnh/Thành vận chuyển</p>
            </div>
        </div>

<div id="list_cat">
<?php if(($_REQUEST['cat']=='')&&($_REQUEST['views']==''))
{?>


<?}else{?>
<h3><?php echo $row_cat['name'];?></h3>
<?}?>
</div>
<div id="list_cat_content_help">
<?php if(($_REQUEST['cat']==''))
{?>

<div style="padding-top:0px;padding-left:0px;">

<!--begin all help-->




<?}?>

<form method="POST"  name="cartform" onsubmit="return check()" >	
<div  style="border: 1px solid #ddd;">
<div  style="height: 40px;background-color: #f1f1f1;">
<div style="padding: 11px;" >
  <span ><b>Ngày:</b>  <span style="color: #000;padding-right: 5px;"><?php echo $row99991['orders_date'];?></span></span> 
     &nbsp;&nbsp;&nbsp;
	 <span ><b>Giá:</b>  <span style="color: #000;padding-right: 5px;"><b style=" color: #bb104e; "><?php echo str_replace(",",",",number_format($row999911['ordersdetail_price']));?>đ</b></span></span> 


&nbsp;&nbsp;&nbsp;
	  
	  
	 <span ><b>Số lượng:</b>  <span style="color: #000;padding-right: 5px;"><b style=" color: #bb104e; "><?php echo $row999911['ordersdetail_quantity'];?></b></span></span> 

&nbsp;&nbsp;&nbsp;


	
	
	
	</span></span> 
	   <span ><b>Tổng tiền: </b> <span style="color: #000;padding-right: 5px;"><b style=" color: #2196F3; "><?php echo str_replace(",",",",number_format($row999911['ordersdetail_price']*$row999911['ordersdetail_quantity']));?>đ</b></span></span> 

	
	&nbsp;&nbsp;&nbsp;
	</span></span> 
	
 <span ><b>Phí vận chuyển: </b> 
 <span style="color: #000;padding-right: 5px;"><?php echo str_replace(",",",",number_format($row999911['phivanchuyen']));?>đ</span>
&nbsp;&nbsp;&nbsp;

	</span></span> 
	   
	<span ><b>Trừ điểm Lửa: </b> <span style="color: #000;padding-right: 5px;"><?php echo str_replace(",",",",number_format($row999911['trudiemlua']));?></span></span> 
 &nbsp;&nbsp;&nbsp;
 <span ><b>Tổng thành tiền:</b>  <b style="color: #f13326;"><?php echo str_replace(",",",",number_format(($row999911['ordersdetail_price']*$row999911['ordersdetail_quantity']+$row999911['phivanchuyen'])-$row999911['trudiemlua'],0));?>đ</b></span> 
 

 </span>
 </div>

 </div>
                <div style="
    height: 130px;
">
<div class="order-inf2-lf ">

                        
                    
               <div>
					<a target="_blank"  href="./<?php echo doidau(mb_strtolower($row9999111['name'],"UTF8"));?>-pro-<?php echo $row9999111['id'];?>.html"  >  <img style="width: 100px;height: 100px;border: 1px solid #ddd;margin: 14px;" src="<?php echo $row9999111['image'];?>"></a>

					</div>


               <div style="
    margin-top: -119px;
    margin-left: 124px;
">
					<a target="_blank" style="color: black;" href="./<?php echo doidau(mb_strtolower($row9999111['name'],"UTF8"));?>-pro-<?php echo $row9999111['id'];?>.html"  ><b><?php echo $row9999111['name'];?></b></a>
				<br>
					<span style="  color: #000; display: inline-block;    margin-top: 9px;">Shop: <a style="color: #0066ff;" target="_blank"  href="/<?php echo $row99991111['user'];?>"> <?php echo $row99991111['company'];?></a></span>

				

				
					
					
					<br>
					<?if($row99991['mausac']==""){?>	
					
					<?}else{?>
					  <b style="   display: inline-block;    margin-top: 5px;">Màu sắc: <span style="background-color: #<?php echo $row99991['mausac'];?>; outline: 1px solid #ccc;" ><a href="java:">&nbsp;&nbsp;&nbsp;&nbsp;</a> </b>
					<?}?>
                     
				
					
					<br>
					<?if($row99991['kichthuoc']==""){?>	
					
					<?}else{?>
					<b style=" display: inline-block;    margin-top: 4px;">Kích thước: <span style="color: #000;padding-right: 5px;"><?php echo $row99991['kichthuoc'];?></span></b>
					<?}?>
				
				
					
				
					
				
		<br>		
				
	<span >
	 
<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","/system/views/xuly_cart.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<?php if($row99991111['hotrovanchuyen_tu'] =='0' ){
$ship = $row99991111['hotrovanchuyen_tu'] < '1';
}else{
$ship = $row99991111['hotrovanchuyen_tu']  >= $row9999111['price_special']*$row999911['ordersdetail_quantity'] ;
}
?>


<label > Vận chuyển đến <b ><select   style="border: 1px solid #ddd;    width: 191px;" name="phivanchuyen"  onchange="this.form.submit()" >    
	
 
	
	
	
	
	<?php if($ship)
{?>


<?php if($row9999111['khoiluong']*$row999911['ordersdetail_quantity']>'0'  & $row9999111['khoiluong']*$row999911['ordersdetail_quantity']<='1000')
{?>	                                      
	                 
<option value="<?php echo $row999911112['id'] ;?>" >
	<?php if($row99991['tinhthanh'] =='0' )
{?>
Tỉnh/Thành
<?}else{?>
 <?php echo ($row999911112['FirstName'] );?>
<?}?>	</option>   
                                                
  	<?php if($row99991111['city'] =='69' )
{?>
 <option value="2" title="Nội ô TP.Cần Thơ" >Nội ô TP.Cần Thơ</option>  
                                                            <option value="3" title="An Giang">An Giang</option>
                                                            <option value="4" title="Bà Rịa–Vũng Tàu">Bà Rịa–Vũng Tàu</option>
                                                            <option value="5" title="Bắc Giang">Bắc Giang</option>
                                                            <option value="6" title="Bắc Kạn">Bắc Kạn</option>
                                                            <option value="7" title="Bạc Liêu">Bạc Liêu</option>
                                                            <option value="8" title="Bắc Ninh">Bắc Ninh</option>
                                                            <option value="9" title="Bến Tre">Bến Tre</option>
                                                            <option value="10" title="Bình Định">Bình Định</option>
                                                            <option value="11" title="Bình Dương">Bình Dương</option>
                                                            <option value="12" title="Bình Phước">Bình Phước</option>
                                                            <option value="13" title="Bình Thuận">Bình Thuận</option>
                                                            <option value="14" title="Cà Mau">Cà Mau</option>
                                                            <option value="15" title="Cần Thơ">Cần Thơ</option>
                                                            <option value="16" title="Cao Bằng">Cao Bằng</option>
                                                            <option value="17" title="Đà Nẵng">Đà Nẵng</option>
                                                            <option value="18" title="Đắk Lắk">Đắk Lắk</option>
                                                            <option value="19" title="Đắk Nông">Đắk Nông</option>
                                                            <option value="20" title="Điện Biên">Điện Biên</option>
                                                            <option value="21" title="Đồng Nai">Đồng Nai</option>
                                                            <option value="22" title="Đồng Tháp">Đồng Tháp</option>
                                                            <option value="23" title="Gia Lai">Gia Lai</option>
                                                            <option value="24" title="Hà Giang">Hà Giang</option>
                                                            <option value="25" title="Hà Nam">Hà Nam</option> 
															<option value="26" title="Hà Nam">Hà Nội</option>
															<option value="27" title="Hà Nam">Hà Tây</option>
                                                            <option value="28" title="Hà Tĩnh">Hà Tĩnh</option>
                                                            <option value="29" title="Hải Dương">Hải Dương</option>
                                                            <option value="30" title="Hải Phòng">Hải Phòng</option>
                                                            <option value="31" title="Hậu Giang">Hậu Giang</option>
                                                            <option value="32" title="Hòa Bình">Hòa Bình</option>
                                                            <option value="33" title="Hưng Yên">Hưng Yên</option>
															<option value="34" title="Hưng Yên">Hồ Chí Minh</option>
                                                            <option value="35" title="Khánh Hòa">Khánh Hòa</option>
                                                            <option value="36" title="Kiên Giang">Kiên Giang</option>
                                                            <option value="37" title="Kon Tum">Kon Tum</option>
                                                            <option value="38" title="Lai Châu">Lai Châu</option>
                                                            <option value="39" title="Lâm Đồng">Lâm Đồng</option>
                                                            <option value="40" title="Lạng Sơn">Lạng Sơn</option>
                                                            <option value="41" title="Lào Cai">Lào Cai</option>
                                                            <option value="42" title="Long An">Long An</option>
                                                            <option value="43" title="Nam Định">Nam Định</option>
                                                            <option value="44" title="Nghệ An">Nghệ An</option>
                                                            <option value="45" title="Ninh Bình">Ninh Bình</option>
                                                            <option value="46" title="Ninh Thuận">Ninh Thuận</option>
                                                            <option value="47" title="Phú Thọ">Phú Thọ</option>
                                                            <option value="48" title="Phú Yên">Phú Yên</option>
                                                            <option value="49" title="Quảng Bình">Quảng Bình</option>
                                                            <option value="50" title="Quảng Nam">Quảng Nam</option>
                                                            <option value="51" title="Quảng Ngãi">Quảng Ngãi</option>
                                                            <option value="52" title="Quảng Ninh">Quảng Ninh</option>
                                                            <option value="53" title="Quảng Trị">Quảng Trị</option>
                                                            <option value="54" title="Sóc Trăng">Sóc Trăng</option>
                                                            <option value="55" title="Sơn La">Sơn La</option>
                                                            <option value="56" title="Tây Ninh">Tây Ninh</option>
                                                            <option value="57" title="Thái Bình">Thái Bình</option>
                                                            <option value="58" title="Thái Nguyên">Thái Nguyên</option>
                                                            <option value="59" title="Thanh Hóa">Thanh Hóa</option>
															<option value="60" title="Thừa Thiên Huế">Thừa Thiên Huế</option>
                                                            <option value="61" title="Tiền Giang">Tiền Giang</option>
                                                            <option value="62" title="Trà Vinh">Trà Vinh</option>
                                                            <option value="63" title="Tuyên Quang">Tuyên Quang</option>
                                                            <option value="64" title="Vĩnh Long">Vĩnh Long</option>
                                                            <option value="65" title="Vĩnh Phúc">Vĩnh Phúc</option>
                                                            <option value="66" title="Yên Bái">Yên Bái</option>
<?}else{?>

                                                            <option value="401" title="An Giang">An Giang</option>
                                                            <option value="402" title="Bà Rịa–Vũng Tàu">Bà Rịa–Vũng Tàu</option>
                                                            <option value="403" title="Bắc Giang">Bắc Giang</option>
                                                            <option value="404" title="Bắc Kạn">Bắc Kạn</option>
                                                            <option value="405" title="Bạc Liêu">Bạc Liêu</option>
                                                            <option value="406" title="Bắc Ninh">Bắc Ninh</option>
                                                            <option value="407" title="Bến Tre">Bến Tre</option>
                                                            <option value="408" title="Bình Định">Bình Định</option>
                                                            <option value="409" title="Bình Dương">Bình Dương</option>
                                                            <option value="410" title="Bình Phước">Bình Phước</option>
                                                            <option value="411" title="Bình Thuận">Bình Thuận</option>
                                                            <option value="412" title="Cà Mau">Cà Mau</option>
                                                            <option value="413" title="Cần Thơ">Cần Thơ</option>
                                                            <option value="414" title="Cao Bằng">Cao Bằng</option>
                                                            <option value="415" title="Đà Nẵng">Đà Nẵng</option>
                                                            <option value="416" title="Đắk Lắk">Đắk Lắk</option>
                                                            <option value="417" title="Đắk Nông">Đắk Nông</option>
                                                            <option value="418" title="Điện Biên">Điện Biên</option>
                                                            <option value="419" title="Đồng Nai">Đồng Nai</option>
                                                            <option value="420" title="Đồng Tháp">Đồng Tháp</option>
                                                            <option value="421" title="Gia Lai">Gia Lai</option>
                                                            <option value="422" title="Hà Giang">Hà Giang</option>
                                                            <option value="423" title="Hà Nam">Hà Nam</option> 
															<option value="424" title="Hà Nam">Hà Nội</option>
															<option value="425" title="Hà Nam">Hà Tây</option>
                                                            <option value="426" title="Hà Tĩnh">Hà Tĩnh</option>
                                                            <option value="427" title="Hải Dương">Hải Dương</option>
                                                            <option value="428" title="Hải Phòng">Hải Phòng</option>
                                                            <option value="429" title="Hậu Giang">Hậu Giang</option>
                                                            <option value="430" title="Hòa Bình">Hòa Bình</option>
                                                            <option value="431" title="Hưng Yên">Hưng Yên</option>
															<option value="432" title="Hưng Yên">Hồ Chí Minh</option>
                                                            <option value="433" title="Khánh Hòa">Khánh Hòa</option>
                                                            <option value="434" title="Kiên Giang">Kiên Giang</option>
                                                            <option value="435" title="Kon Tum">Kon Tum</option>
                                                            <option value="436" title="Lai Châu">Lai Châu</option>
                                                            <option value="437" title="Lâm Đồng">Lâm Đồng</option>
                                                            <option value="438" title="Lạng Sơn">Lạng Sơn</option>
                                                            <option value="439" title="Lào Cai">Lào Cai</option>
                                                            <option value="440" title="Long An">Long An</option>
                                                            <option value="441" title="Nam Định">Nam Định</option>
                                                            <option value="442" title="Nghệ An">Nghệ An</option>
                                                            <option value="443" title="Ninh Bình">Ninh Bình</option>
                                                            <option value="444" title="Ninh Thuận">Ninh Thuận</option>
                                                            <option value="445" title="Phú Thọ">Phú Thọ</option>
                                                            <option value="446" title="Phú Yên">Phú Yên</option>
                                                            <option value="447" title="Quảng Bình">Quảng Bình</option>
                                                            <option value="448" title="Quảng Nam">Quảng Nam</option>
                                                            <option value="449" title="Quảng Ngãi">Quảng Ngãi</option>
                                                            <option value="450" title="Quảng Ninh">Quảng Ninh</option>
                                                            <option value="451" title="Quảng Trị">Quảng Trị</option>
                                                            <option value="452" title="Sóc Trăng">Sóc Trăng</option>
                                                            <option value="453" title="Sơn La">Sơn La</option>
                                                            <option value="454" title="Tây Ninh">Tây Ninh</option>
                                                            <option value="455" title="Thái Bình">Thái Bình</option>
                                                            <option value="456" title="Thái Nguyên">Thái Nguyên</option>
                                                            <option value="457" title="Thanh Hóa">Thanh Hóa</option>
															<option value="458" title="Thừa Thiên Huế">Thừa Thiên Huế</option>
                                                            <option value="459" title="Tiền Giang">Tiền Giang</option>
                                                            <option value="460" title="Trà Vinh">Trà Vinh</option>
                                                            <option value="461" title="Tuyên Quang">Tuyên Quang</option>
                                                            <option value="462" title="Vĩnh Long">Vĩnh Long</option>
                                                            <option value="463" title="Vĩnh Phúc">Vĩnh Phúc</option>
                                                            <option value="464" title="Yên Bái">Yên Bái</option>
<?}?>   
	                                                        
<?}else{?>
	<?}?>	
	
<?php if($row9999111['khoiluong']*$row999911['ordersdetail_quantity']>'1000'  & $row9999111['khoiluong']*$row999911['ordersdetail_quantity']<='1500')
{?>	                      
<option value="<?php echo $row999911112['id'] ;?>" >
	<?php if($row99991['tinhthanh'] =='0' )
{?>
Tỉnh/Thành
<?}else{?>
 <?php echo ($row999911112['FirstName'] );?>
<?}?>	</option>         
                            
  	<?php if($row99991111['city'] =='69' )
{?>   
  <option value="68" title="Nội ô TP.Cần Thơ" >Nội ô TP.Cần Thơ</option> 
                                                            <option value="69" title="An Giang">An Giang</option>
                                                            <option value="70" title="Bà Rịa–Vũng Tàu">Bà Rịa–Vũng Tàu</option>
                                                            <option value="71" title="Bắc Giang">Bắc Giang</option>
                                                            <option value="72" title="Bắc Kạn">Bắc Kạn</option>
                                                            <option value="73" title="Bạc Liêu">Bạc Liêu</option>
                                                            <option value="74" title="Bắc Ninh">Bắc Ninh</option>
                                                            <option value="75" title="Bến Tre">Bến Tre</option>
                                                            <option value="76" title="Bình Định">Bình Định</option>
                                                            <option value="77" title="Bình Dương">Bình Dương</option>
                                                            <option value="78" title="Bình Phước">Bình Phước</option>
                                                            <option value="79" title="Bình Thuận">Bình Thuận</option>
                                                            <option value="80" title="Cà Mau">Cà Mau</option>
                                                            <option value="81" title="Cần Thơ">Cần Thơ</option>
                                                            <option value="82" title="Cao Bằng">Cao Bằng</option>
                                                            <option value="83" title="Đà Nẵng">Đà Nẵng</option>
                                                            <option value="84" title="Đắk Lắk">Đắk Lắk</option>
                                                            <option value="85" title="Đắk Nông">Đắk Nông</option>
                                                            <option value="86" title="Điện Biên">Điện Biên</option>
                                                            <option value="87" title="Đồng Nai">Đồng Nai</option>
                                                            <option value="88" title="Đồng Tháp">Đồng Tháp</option>
                                                            <option value="89" title="Gia Lai">Gia Lai</option>
                                                            <option value="90" title="Hà Giang">Hà Giang</option>
                                                            <option value="91" title="Hà Nam">Hà Nam</option> 
															<option value="92" title="Hà Nam">Hà Nội</option>
															<option value="93" title="Hà Nam">Hà Tây</option>
                                                            <option value="94" title="Hà Tĩnh">Hà Tĩnh</option>
                                                            <option value="95" title="Hải Dương">Hải Dương</option>
                                                            <option value="96" title="Hải Phòng">Hải Phòng</option>
                                                            <option value="97" title="Hậu Giang">Hậu Giang</option>
                                                            <option value="98" title="Hòa Bình">Hòa Bình</option>
                                                            <option value="99" title="Hưng Yên">Hưng Yên</option>
															<option value="100" title="Hưng Yên">Hồ Chí Minh</option>
                                                            <option value="101" title="Khánh Hòa">Khánh Hòa</option>
                                                            <option value="102" title="Kiên Giang">Kiên Giang</option>
                                                            <option value="103" title="Kon Tum">Kon Tum</option>
                                                            <option value="104" title="Lai Châu">Lai Châu</option>
                                                            <option value="105" title="Lâm Đồng">Lâm Đồng</option>
                                                            <option value="106" title="Lạng Sơn">Lạng Sơn</option>
                                                            <option value="107" title="Lào Cai">Lào Cai</option>
                                                            <option value="108" title="Long An">Long An</option>
                                                            <option value="109" title="Nam Định">Nam Định</option>
                                                            <option value="110" title="Nghệ An">Nghệ An</option>
                                                            <option value="111" title="Ninh Bình">Ninh Bình</option>
                                                            <option value="112" title="Ninh Thuận">Ninh Thuận</option>
                                                            <option value="113" title="Phú Thọ">Phú Thọ</option>
                                                            <option value="114" title="Phú Yên">Phú Yên</option>
                                                            <option value="115" title="Quảng Bình">Quảng Bình</option>
                                                            <option value="116" title="Quảng Nam">Quảng Nam</option>
                                                            <option value="117" title="Quảng Ngãi">Quảng Ngãi</option>
                                                            <option value="118" title="Quảng Ninh">Quảng Ninh</option>
                                                            <option value="119" title="Quảng Trị">Quảng Trị</option>
                                                            <option value="120" title="Sóc Trăng">Sóc Trăng</option>
                                                            <option value="121" title="Sơn La">Sơn La</option>
                                                            <option value="122" title="Tây Ninh">Tây Ninh</option>
                                                            <option value="123" title="Thái Bình">Thái Bình</option>
                                                            <option value="124" title="Thái Nguyên">Thái Nguyên</option>
                                                            <option value="125" title="Thanh Hóa">Thanh Hóa</option>
															<option value="126" title="Thừa Thiên Huế">Thừa Thiên Huế</option>
                                                            <option value="127" title="Tiền Giang">Tiền Giang</option>
                                                            <option value="128" title="Trà Vinh">Trà Vinh</option>
                                                            <option value="129" title="Tuyên Quang">Tuyên Quang</option>
                                                            <option value="130" title="Vĩnh Long">Vĩnh Long</option>
                                                            <option value="131" title="Vĩnh Phúc">Vĩnh Phúc</option>
                                                            <option value="132" title="Yên Bái">Yên Bái</option>                                             														 
<?}else{?>	  

															
															<option value="467" title="An Giang">An Giang</option>
                                                            <option value="468" title="Bà Rịa–Vũng Tàu">Bà Rịa–Vũng Tàu</option>
                                                            <option value="469" title="Bắc Giang">Bắc Giang</option>
                                                            <option value="470" title="Bắc Kạn">Bắc Kạn</option>
                                                            <option value="471" title="Bạc Liêu">Bạc Liêu</option>
                                                            <option value="472" title="Bắc Ninh">Bắc Ninh</option>
                                                            <option value="473" title="Bến Tre">Bến Tre</option>
                                                            <option value="474" title="Bình Định">Bình Định</option>
                                                            <option value="475" title="Bình Dương">Bình Dương</option>
                                                            <option value="476" title="Bình Phước">Bình Phước</option>
                                                            <option value="477" title="Bình Thuận">Bình Thuận</option>
                                                            <option value="478" title="Cà Mau">Cà Mau</option>
                                                            <option value="479" title="Cần Thơ">Cần Thơ</option>
                                                            <option value="480" title="Cao Bằng">Cao Bằng</option>
                                                            <option value="481" title="Đà Nẵng">Đà Nẵng</option>
                                                            <option value="482" title="Đắk Lắk">Đắk Lắk</option>
                                                            <option value="483" title="Đắk Nông">Đắk Nông</option>
                                                            <option value="484" title="Điện Biên">Điện Biên</option>
                                                            <option value="485" title="Đồng Nai">Đồng Nai</option>
                                                            <option value="486" title="Đồng Tháp">Đồng Tháp</option>
                                                            <option value="487" title="Gia Lai">Gia Lai</option>
                                                            <option value="488" title="Hà Giang">Hà Giang</option>
                                                            <option value="489" title="Hà Nam">Hà Nam</option> 
															<option value="490" title="Hà Nam">Hà Nội</option>
															<option value="491" title="Hà Nam">Hà Tây</option>
                                                            <option value="492" title="Hà Tĩnh">Hà Tĩnh</option>
                                                            <option value="493" title="Hải Dương">Hải Dương</option>
                                                            <option value="494" title="Hải Phòng">Hải Phòng</option>
                                                            <option value="495" title="Hậu Giang">Hậu Giang</option>
                                                            <option value="496" title="Hòa Bình">Hòa Bình</option>
                                                            <option value="497" title="Hưng Yên">Hưng Yên</option>
															<option value="498" title="Hưng Yên">Hồ Chí Minh</option>
                                                            <option value="499" title="Khánh Hòa">Khánh Hòa</option>
                                                            <option value="500" title="Kiên Giang">Kiên Giang</option>
                                                            <option value="501" title="Kon Tum">Kon Tum</option>
                                                            <option value="502" title="Lai Châu">Lai Châu</option>
                                                            <option value="503" title="Lâm Đồng">Lâm Đồng</option>
                                                            <option value="504" title="Lạng Sơn">Lạng Sơn</option>
                                                            <option value="505" title="Lào Cai">Lào Cai</option>
                                                            <option value="506" title="Long An">Long An</option>
                                                            <option value="507" title="Nam Định">Nam Định</option>
                                                            <option value="508" title="Nghệ An">Nghệ An</option>
                                                            <option value="509" title="Ninh Bình">Ninh Bình</option>
                                                            <option value="510" title="Ninh Thuận">Ninh Thuận</option>
                                                            <option value="511" title="Phú Thọ">Phú Thọ</option>
                                                            <option value="512" title="Phú Yên">Phú Yên</option>
                                                            <option value="513" title="Quảng Bình">Quảng Bình</option>
                                                            <option value="514" title="Quảng Nam">Quảng Nam</option>
                                                            <option value="515" title="Quảng Ngãi">Quảng Ngãi</option>
                                                            <option value="516" title="Quảng Ninh">Quảng Ninh</option>
                                                            <option value="517" title="Quảng Trị">Quảng Trị</option>
                                                            <option value="518" title="Sóc Trăng">Sóc Trăng</option>
                                                            <option value="519" title="Sơn La">Sơn La</option>
                                                            <option value="520" title="Tây Ninh">Tây Ninh</option>
                                                            <option value="521" title="Thái Bình">Thái Bình</option>
                                                            <option value="522" title="Thái Nguyên">Thái Nguyên</option>
                                                            <option value="523" title="Thanh Hóa">Thanh Hóa</option>
															<option value="524" title="Thừa Thiên Huế">Thừa Thiên Huế</option>
                                                            <option value="525" title="Tiền Giang">Tiền Giang</option>
                                                            <option value="526" title="Trà Vinh">Trà Vinh</option>
                                                            <option value="527" title="Tuyên Quang">Tuyên Quang</option>
                                                            <option value="528" title="Vĩnh Long">Vĩnh Long</option>
                                                            <option value="529" title="Vĩnh Phúc">Vĩnh Phúc</option>
                                                            <option value="530" title="Yên Bái">Yên Bái</option>      
<?}?>                                                      
<?}else{?>
	<?}?>	
	
<?php if($row9999111['khoiluong']*$row999911['ordersdetail_quantity']>'1500'  & $row9999111['khoiluong']*$row999911['ordersdetail_quantity']<='2000')
{?>	          
<option value="<?php echo $row999911112['id'] ;?>" >
	<?php if($row99991['tinhthanh'] =='0' )
{?>
Tỉnh/Thành
<?}else{?>
 <?php echo ($row999911112['FirstName'] );?>
<?}?>	</option> 	

  	<?php if($row99991111['city'] =='69' )
{?>
  <option value="134" title="Nội ô TP.Cần Thơ" >Nội ô TP.Cần Thơ</option>       
                                                            <option value="135" title="An Giang">An Giang</option>
                                                            <option value="136" title="Bà Rịa–Vũng Tàu">Bà Rịa–Vũng Tàu</option>
                                                            <option value="137" title="Bắc Giang">Bắc Giang</option>
                                                            <option value="138" title="Bắc Kạn">Bắc Kạn</option>
                                                            <option value="139" title="Bạc Liêu">Bạc Liêu</option>
                                                            <option value="140" title="Bắc Ninh">Bắc Ninh</option>
                                                            <option value="141" title="Bến Tre">Bến Tre</option>
                                                            <option value="142" title="Bình Định">Bình Định</option>
                                                            <option value="143" title="Bình Dương">Bình Dương</option>
                                                            <option value="144" title="Bình Phước">Bình Phước</option>
                                                            <option value="145" title="Bình Thuận">Bình Thuận</option>
                                                            <option value="146" title="Cà Mau">Cà Mau</option>
                                                            <option value="147" title="Cần Thơ">Cần Thơ</option>
                                                            <option value="148" title="Cao Bằng">Cao Bằng</option>
                                                            <option value="149" title="Đà Nẵng">Đà Nẵng</option>
                                                            <option value="150" title="Đắk Lắk">Đắk Lắk</option>
                                                            <option value="151" title="Đắk Nông">Đắk Nông</option>
                                                            <option value="152" title="Điện Biên">Điện Biên</option>
                                                            <option value="153" title="Đồng Nai">Đồng Nai</option>
                                                            <option value="154" title="Đồng Tháp">Đồng Tháp</option>
                                                            <option value="155" title="Gia Lai">Gia Lai</option>
                                                            <option value="156" title="Hà Giang">Hà Giang</option>
                                                            <option value="157" title="Hà Nam">Hà Nam</option> 
															<option value="158" title="Hà Nam">Hà Nội</option>
															<option value="159" title="Hà Nam">Hà Tây</option>
                                                            <option value="160" title="Hà Tĩnh">Hà Tĩnh</option>
                                                            <option value="161" title="Hải Dương">Hải Dương</option>
                                                            <option value="162" title="Hải Phòng">Hải Phòng</option>
                                                            <option value="163" title="Hậu Giang">Hậu Giang</option>
                                                            <option value="164" title="Hòa Bình">Hòa Bình</option>
                                                            <option value="165" title="Hưng Yên">Hưng Yên</option>
															<option value="166" title="Hưng Yên">Hồ Chí Minh</option>
                                                            <option value="167" title="Khánh Hòa">Khánh Hòa</option>
                                                            <option value="168" title="Kiên Giang">Kiên Giang</option>
                                                            <option value="169" title="Kon Tum">Kon Tum</option>
                                                            <option value="170" title="Lai Châu">Lai Châu</option>
                                                            <option value="171" title="Lâm Đồng">Lâm Đồng</option>
                                                            <option value="172" title="Lạng Sơn">Lạng Sơn</option>
                                                            <option value="173" title="Lào Cai">Lào Cai</option>
                                                            <option value="174" title="Long An">Long An</option>
                                                            <option value="175" title="Nam Định">Nam Định</option>
                                                            <option value="176" title="Nghệ An">Nghệ An</option>
                                                            <option value="177" title="Ninh Bình">Ninh Bình</option>
                                                            <option value="178" title="Ninh Thuận">Ninh Thuận</option>
                                                            <option value="179" title="Phú Thọ">Phú Thọ</option>
                                                            <option value="180" title="Phú Yên">Phú Yên</option>
                                                            <option value="181" title="Quảng Bình">Quảng Bình</option>
                                                            <option value="182" title="Quảng Nam">Quảng Nam</option>
                                                            <option value="183" title="Quảng Ngãi">Quảng Ngãi</option>
                                                            <option value="184" title="Quảng Ninh">Quảng Ninh</option>
                                                            <option value="185" title="Quảng Trị">Quảng Trị</option>
                                                            <option value="186" title="Sóc Trăng">Sóc Trăng</option>
                                                            <option value="187" title="Sơn La">Sơn La</option>
                                                            <option value="188" title="Tây Ninh">Tây Ninh</option>
                                                            <option value="189" title="Thái Bình">Thái Bình</option>
                                                            <option value="190" title="Thái Nguyên">Thái Nguyên</option>
                                                            <option value="191" title="Thanh Hóa">Thanh Hóa</option>
															<option value="192" title="Thừa Thiên Huế">Thừa Thiên Huế</option>
                                                            <option value="193" title="Tiền Giang">Tiền Giang</option>
                                                            <option value="194" title="Trà Vinh">Trà Vinh</option>
                                                            <option value="195" title="Tuyên Quang">Tuyên Quang</option>
                                                            <option value="196" title="Vĩnh Long">Vĩnh Long</option>
                                                            <option value="197" title="Vĩnh Phúc">Vĩnh Phúc</option>
                                                            <option value="198" title="Yên Bái">Yên Bái</option>
<?}else{?>
 
											 
	                                                           
                                                            <option value="533" title="An Giang">An Giang</option>
                                                            <option value="534" title="Bà Rịa–Vũng Tàu">Bà Rịa–Vũng Tàu</option>
                                                            <option value="535" title="Bắc Giang">Bắc Giang</option>
                                                            <option value="536" title="Bắc Kạn">Bắc Kạn</option>
                                                            <option value="537" title="Bạc Liêu">Bạc Liêu</option>
                                                            <option value="538" title="Bắc Ninh">Bắc Ninh</option>
                                                            <option value="539" title="Bến Tre">Bến Tre</option>
                                                            <option value="540" title="Bình Định">Bình Định</option>
                                                            <option value="541" title="Bình Dương">Bình Dương</option>
                                                            <option value="542" title="Bình Phước">Bình Phước</option>
                                                            <option value="543" title="Bình Thuận">Bình Thuận</option>
                                                            <option value="544" title="Cà Mau">Cà Mau</option>
                                                            <option value="545" title="Cần Thơ">Cần Thơ</option>
                                                            <option value="546" title="Cao Bằng">Cao Bằng</option>
                                                            <option value="547" title="Đà Nẵng">Đà Nẵng</option>
                                                            <option value="548" title="Đắk Lắk">Đắk Lắk</option>
                                                            <option value="549" title="Đắk Nông">Đắk Nông</option>
                                                            <option value="550" title="Điện Biên">Điện Biên</option>
                                                            <option value="551" title="Đồng Nai">Đồng Nai</option>
                                                            <option value="552" title="Đồng Tháp">Đồng Tháp</option>
                                                            <option value="553" title="Gia Lai">Gia Lai</option>
                                                            <option value="554" title="Hà Giang">Hà Giang</option>
                                                            <option value="555" title="Hà Nam">Hà Nam</option> 
															<option value="556" title="Hà Nam">Hà Nội</option>
															<option value="557" title="Hà Nam">Hà Tây</option>
                                                            <option value="558" title="Hà Tĩnh">Hà Tĩnh</option>
                                                            <option value="559" title="Hải Dương">Hải Dương</option>
                                                            <option value="560" title="Hải Phòng">Hải Phòng</option>
                                                            <option value="561" title="Hậu Giang">Hậu Giang</option>
                                                            <option value="562" title="Hòa Bình">Hòa Bình</option>
                                                            <option value="563" title="Hưng Yên">Hưng Yên</option>
															<option value="564" title="Hưng Yên">Hồ Chí Minh</option>
                                                            <option value="565" title="Khánh Hòa">Khánh Hòa</option>
                                                            <option value="566" title="Kiên Giang">Kiên Giang</option>
                                                            <option value="567" title="Kon Tum">Kon Tum</option>
                                                            <option value="568" title="Lai Châu">Lai Châu</option>
                                                            <option value="569" title="Lâm Đồng">Lâm Đồng</option>
                                                            <option value="570" title="Lạng Sơn">Lạng Sơn</option>
                                                            <option value="571" title="Lào Cai">Lào Cai</option>
                                                            <option value="572" title="Long An">Long An</option>
                                                            <option value="573" title="Nam Định">Nam Định</option>
                                                            <option value="574" title="Nghệ An">Nghệ An</option>
                                                            <option value="575" title="Ninh Bình">Ninh Bình</option>
                                                            <option value="576" title="Ninh Thuận">Ninh Thuận</option>
                                                            <option value="577" title="Phú Thọ">Phú Thọ</option>
                                                            <option value="578" title="Phú Yên">Phú Yên</option>
                                                            <option value="579" title="Quảng Bình">Quảng Bình</option>
                                                            <option value="580" title="Quảng Nam">Quảng Nam</option>
                                                            <option value="581" title="Quảng Ngãi">Quảng Ngãi</option>
                                                            <option value="582" title="Quảng Ninh">Quảng Ninh</option>
                                                            <option value="583" title="Quảng Trị">Quảng Trị</option>
                                                            <option value="584" title="Sóc Trăng">Sóc Trăng</option>
                                                            <option value="585" title="Sơn La">Sơn La</option>
                                                            <option value="586" title="Tây Ninh">Tây Ninh</option>
                                                            <option value="587" title="Thái Bình">Thái Bình</option>
                                                            <option value="588" title="Thái Nguyên">Thái Nguyên</option>
                                                            <option value="589" title="Thanh Hóa">Thanh Hóa</option>
															<option value="590" title="Thừa Thiên Huế">Thừa Thiên Huế</option>
                                                            <option value="591" title="Tiền Giang">Tiền Giang</option>
                                                            <option value="592" title="Trà Vinh">Trà Vinh</option>
                                                            <option value="593" title="Tuyên Quang">Tuyên Quang</option>
                                                            <option value="594" title="Vĩnh Long">Vĩnh Long</option>
                                                            <option value="595" title="Vĩnh Phúc">Vĩnh Phúc</option>
                                                            <option value="596" title="Yên Bái">Yên Bái</option>
<?}?>		
<?}else{?>
	<?}?>	
	
<?php if($row9999111['khoiluong']*$row999911['ordersdetail_quantity']>'2000'  & $row9999111['khoiluong']*$row999911['ordersdetail_quantity']<='4000')
	
{?>	              
<option value="<?php echo $row999911112['id'] ;?>" >
	<?php if($row99991['tinhthanh'] =='0' )
{?>
Tỉnh/Thành
<?}else{?>
 <?php echo ($row999911112['FirstName'] );?>
<?}?>	</option> 	

  	<?php if($row99991111['city'] =='69' )
{?>
 <option value="200" title="Nội ô TP.Cần Thơ" >Nội ô TP.Cần Thơ</option>       
                                                            <option value="201" title="An Giang">An Giang</option>
                                                            <option value="202" title="Bà Rịa–Vũng Tàu">Bà Rịa–Vũng Tàu</option>
                                                            <option value="203" title="Bắc Giang">Bắc Giang</option>
                                                            <option value="204" title="Bắc Kạn">Bắc Kạn</option>
                                                            <option value="205" title="Bạc Liêu">Bạc Liêu</option>
                                                            <option value="206" title="Bắc Ninh">Bắc Ninh</option>
                                                            <option value="207" title="Bến Tre">Bến Tre</option>
                                                            <option value="208" title="Bình Định">Bình Định</option>
                                                            <option value="209" title="Bình Dương">Bình Dương</option>
                                                            <option value="210" title="Bình Phước">Bình Phước</option>
                                                            <option value="211" title="Bình Thuận">Bình Thuận</option>
                                                            <option value="212" title="Cà Mau">Cà Mau</option>
                                                            <option value="213" title="Cần Thơ">Cần Thơ</option>
                                                            <option value="214" title="Cao Bằng">Cao Bằng</option>
                                                            <option value="215" title="Đà Nẵng">Đà Nẵng</option>
                                                            <option value="216" title="Đắk Lắk">Đắk Lắk</option>
                                                            <option value="217" title="Đắk Nông">Đắk Nông</option>
                                                            <option value="218" title="Điện Biên">Điện Biên</option>
                                                            <option value="219" title="Đồng Nai">Đồng Nai</option>
                                                            <option value="220" title="Đồng Tháp">Đồng Tháp</option>
                                                            <option value="221" title="Gia Lai">Gia Lai</option>
                                                            <option value="222" title="Hà Giang">Hà Giang</option>
                                                            <option value="223" title="Hà Nam">Hà Nam</option> 
															<option value="224" title="Hà Nam">Hà Nội</option>
															<option value="225" title="Hà Nam">Hà Tây</option>
                                                            <option value="226" title="Hà Tĩnh">Hà Tĩnh</option>
                                                            <option value="227" title="Hải Dương">Hải Dương</option>
                                                            <option value="228" title="Hải Phòng">Hải Phòng</option>
                                                            <option value="229" title="Hậu Giang">Hậu Giang</option>
                                                            <option value="230" title="Hòa Bình">Hòa Bình</option>
                                                            <option value="231" title="Hưng Yên">Hưng Yên</option>
															<option value="232" title="Hưng Yên">Hồ Chí Minh</option>
                                                            <option value="233" title="Khánh Hòa">Khánh Hòa</option>
                                                            <option value="234" title="Kiên Giang">Kiên Giang</option>
                                                            <option value="235" title="Kon Tum">Kon Tum</option>
                                                            <option value="236" title="Lai Châu">Lai Châu</option>
                                                            <option value="237" title="Lâm Đồng">Lâm Đồng</option>
                                                            <option value="238" title="Lạng Sơn">Lạng Sơn</option>
                                                            <option value="239" title="Lào Cai">Lào Cai</option>
                                                            <option value="240" title="Long An">Long An</option>
                                                            <option value="241" title="Nam Định">Nam Định</option>
                                                            <option value="242" title="Nghệ An">Nghệ An</option>
                                                            <option value="243" title="Ninh Bình">Ninh Bình</option>
                                                            <option value="244" title="Ninh Thuận">Ninh Thuận</option>
                                                            <option value="245" title="Phú Thọ">Phú Thọ</option>
                                                            <option value="246" title="Phú Yên">Phú Yên</option>
                                                            <option value="247" title="Quảng Bình">Quảng Bình</option>
                                                            <option value="248" title="Quảng Nam">Quảng Nam</option>
                                                            <option value="249" title="Quảng Ngãi">Quảng Ngãi</option>
                                                            <option value="250" title="Quảng Ninh">Quảng Ninh</option>
                                                            <option value="351" title="Quảng Trị">Quảng Trị</option>
                                                            <option value="252" title="Sóc Trăng">Sóc Trăng</option>
                                                            <option value="253" title="Sơn La">Sơn La</option>
                                                            <option value="254" title="Tây Ninh">Tây Ninh</option>
                                                            <option value="255" title="Thái Bình">Thái Bình</option>
                                                            <option value="256" title="Thái Nguyên">Thái Nguyên</option>
                                                            <option value="257" title="Thanh Hóa">Thanh Hóa</option>
															<option value="258" title="Thừa Thiên Huế">Thừa Thiên Huế</option>
                                                            <option value="259" title="Tiền Giang">Tiền Giang</option>
                                                            <option value="360" title="Trà Vinh">Trà Vinh</option>
                                                            <option value="361" title="Tuyên Quang">Tuyên Quang</option>
                                                            <option value="262" title="Vĩnh Long">Vĩnh Long</option>
                                                            <option value="263" title="Vĩnh Phúc">Vĩnh Phúc</option>
                                                            <option value="264" title="Yên Bái">Yên Bái</option>
<?}else{?>
      
                                                            <option value="599" title="An Giang">An Giang</option>
                                                            <option value="600" title="Bà Rịa–Vũng Tàu">Bà Rịa–Vũng Tàu</option>
                                                            <option value="601" title="Bắc Giang">Bắc Giang</option>
                                                            <option value="602" title="Bắc Kạn">Bắc Kạn</option>
                                                            <option value="603" title="Bạc Liêu">Bạc Liêu</option>
                                                            <option value="604" title="Bắc Ninh">Bắc Ninh</option>
                                                            <option value="605" title="Bến Tre">Bến Tre</option>
                                                            <option value="606" title="Bình Định">Bình Định</option>
                                                            <option value="607" title="Bình Dương">Bình Dương</option>
                                                            <option value="608" title="Bình Phước">Bình Phước</option>
                                                            <option value="609" title="Bình Thuận">Bình Thuận</option>
                                                            <option value="610" title="Cà Mau">Cà Mau</option>
                                                            <option value="611" title="Cần Thơ">Cần Thơ</option>
                                                            <option value="612" title="Cao Bằng">Cao Bằng</option>
                                                            <option value="613" title="Đà Nẵng">Đà Nẵng</option>
                                                            <option value="614" title="Đắk Lắk">Đắk Lắk</option>
                                                            <option value="615" title="Đắk Nông">Đắk Nông</option>
                                                            <option value="616" title="Điện Biên">Điện Biên</option>
                                                            <option value="617" title="Đồng Nai">Đồng Nai</option>
                                                            <option value="618" title="Đồng Tháp">Đồng Tháp</option>
                                                            <option value="619" title="Gia Lai">Gia Lai</option>
                                                            <option value="620" title="Hà Giang">Hà Giang</option>
                                                            <option value="621" title="Hà Nam">Hà Nam</option> 
															<option value="622" title="Hà Nam">Hà Nội</option>
															<option value="623" title="Hà Nam">Hà Tây</option>
                                                            <option value="624" title="Hà Tĩnh">Hà Tĩnh</option>
                                                            <option value="625" title="Hải Dương">Hải Dương</option>
                                                            <option value="626" title="Hải Phòng">Hải Phòng</option>
                                                            <option value="627" title="Hậu Giang">Hậu Giang</option>
                                                            <option value="628" title="Hòa Bình">Hòa Bình</option>
                                                            <option value="629" title="Hưng Yên">Hưng Yên</option>
															<option value="630" title="Hưng Yên">Hồ Chí Minh</option>
                                                            <option value="631" title="Khánh Hòa">Khánh Hòa</option>
                                                            <option value="632" title="Kiên Giang">Kiên Giang</option>
                                                            <option value="633" title="Kon Tum">Kon Tum</option>
                                                            <option value="634" title="Lai Châu">Lai Châu</option>
                                                            <option value="635" title="Lâm Đồng">Lâm Đồng</option>
                                                            <option value="636" title="Lạng Sơn">Lạng Sơn</option>
                                                            <option value="637" title="Lào Cai">Lào Cai</option>
                                                            <option value="638" title="Long An">Long An</option>
                                                            <option value="639" title="Nam Định">Nam Định</option>
                                                            <option value="640" title="Nghệ An">Nghệ An</option>
                                                            <option value="641" title="Ninh Bình">Ninh Bình</option>
                                                            <option value="642" title="Ninh Thuận">Ninh Thuận</option>
                                                            <option value="643" title="Phú Thọ">Phú Thọ</option>
                                                            <option value="644" title="Phú Yên">Phú Yên</option>
                                                            <option value="645" title="Quảng Bình">Quảng Bình</option>
                                                            <option value="646" title="Quảng Nam">Quảng Nam</option>
                                                            <option value="647" title="Quảng Ngãi">Quảng Ngãi</option>
                                                            <option value="648" title="Quảng Ninh">Quảng Ninh</option>
                                                            <option value="649" title="Quảng Trị">Quảng Trị</option>
                                                            <option value="650" title="Sóc Trăng">Sóc Trăng</option>
                                                            <option value="651" title="Sơn La">Sơn La</option>
                                                            <option value="652" title="Tây Ninh">Tây Ninh</option>
                                                            <option value="653" title="Thái Bình">Thái Bình</option>
                                                            <option value="654" title="Thái Nguyên">Thái Nguyên</option>
                                                            <option value="655" title="Thanh Hóa">Thanh Hóa</option>
															<option value="656" title="Thừa Thiên Huế">Thừa Thiên Huế</option>
                                                            <option value="657" title="Tiền Giang">Tiền Giang</option>
                                                            <option value="658" title="Trà Vinh">Trà Vinh</option>
                                                            <option value="659" title="Tuyên Quang">Tuyên Quang</option>
                                                            <option value="660" title="Vĩnh Long">Vĩnh Long</option>
                                                            <option value="661" title="Vĩnh Phúc">Vĩnh Phúc</option>
                                                            <option value="662" title="Yên Bái">Yên Bái</option>
<?}?>
														 
	                                                       
<?}else{?>
	<?}?>	
	
<?php if($row9999111['khoiluong']*$row999911['ordersdetail_quantity']>'4000'  & $row9999111['khoiluong']*$row999911['ordersdetail_quantity']<='5000')
{?>	               
<option value="<?php echo $row999911112['id'] ;?>" >
	<?php if($row99991['tinhthanh'] =='0' )
{?>
Tỉnh/Thành
<?}else{?>
 <?php echo ($row999911112['FirstName'] );?>
<?}?>	</option> 		

  	<?php if($row99991111['city'] =='69' )
{?>
<option value="266" title="Nội ô TP.Cần Thơ" >Nội ô TP.Cần Thơ</option>       
                                                            <option value="267" title="An Giang">An Giang</option>
                                                            <option value="268" title="Bà Rịa–Vũng Tàu">Bà Rịa–Vũng Tàu</option>
                                                            <option value="269" title="Bắc Giang">Bắc Giang</option>
                                                            <option value="270" title="Bắc Kạn">Bắc Kạn</option>
                                                            <option value="271" title="Bạc Liêu">Bạc Liêu</option>
                                                            <option value="272" title="Bắc Ninh">Bắc Ninh</option>
                                                            <option value="273" title="Bến Tre">Bến Tre</option>
                                                            <option value="274" title="Bình Định">Bình Định</option>
                                                            <option value="275" title="Bình Dương">Bình Dương</option>
                                                            <option value="276" title="Bình Phước">Bình Phước</option>
                                                            <option value="277" title="Bình Thuận">Bình Thuận</option>
                                                            <option value="278" title="Cà Mau">Cà Mau</option>
                                                            <option value="279" title="Cần Thơ">Cần Thơ</option>
                                                            <option value="280" title="Cao Bằng">Cao Bằng</option>
                                                            <option value="281" title="Đà Nẵng">Đà Nẵng</option>
                                                            <option value="282" title="Đắk Lắk">Đắk Lắk</option>
                                                            <option value="283" title="Đắk Nông">Đắk Nông</option>
                                                            <option value="284" title="Điện Biên">Điện Biên</option>
                                                            <option value="285" title="Đồng Nai">Đồng Nai</option>
                                                            <option value="286" title="Đồng Tháp">Đồng Tháp</option>
                                                            <option value="287" title="Gia Lai">Gia Lai</option>
                                                            <option value="288" title="Hà Giang">Hà Giang</option>
                                                            <option value="289" title="Hà Nam">Hà Nam</option> 
															<option value="290" title="Hà Nam">Hà Nội</option>
															<option value="291" title="Hà Nam">Hà Tây</option>
                                                            <option value="292" title="Hà Tĩnh">Hà Tĩnh</option>
                                                            <option value="293" title="Hải Dương">Hải Dương</option>
                                                            <option value="294" title="Hải Phòng">Hải Phòng</option>
                                                            <option value="295" title="Hậu Giang">Hậu Giang</option>
                                                            <option value="296" title="Hòa Bình">Hòa Bình</option>
                                                            <option value="297" title="Hưng Yên">Hưng Yên</option>
															<option value="298" title="Hưng Yên">Hồ Chí Minh</option>
                                                            <option value="299" title="Khánh Hòa">Khánh Hòa</option>
                                                            <option value="300" title="Kiên Giang">Kiên Giang</option>
                                                            <option value="301" title="Kon Tum">Kon Tum</option>
                                                            <option value="302" title="Lai Châu">Lai Châu</option>
                                                            <option value="303" title="Lâm Đồng">Lâm Đồng</option>
                                                            <option value="304" title="Lạng Sơn">Lạng Sơn</option>
                                                            <option value="305" title="Lào Cai">Lào Cai</option>
                                                            <option value="306" title="Long An">Long An</option>
                                                            <option value="307" title="Nam Định">Nam Định</option>
                                                            <option value="308" title="Nghệ An">Nghệ An</option>
                                                            <option value="309" title="Ninh Bình">Ninh Bình</option>
                                                            <option value="310" title="Ninh Thuận">Ninh Thuận</option>
                                                            <option value="311" title="Phú Thọ">Phú Thọ</option>
                                                            <option value="312" title="Phú Yên">Phú Yên</option>
                                                            <option value="313" title="Quảng Bình">Quảng Bình</option>
                                                            <option value="314" title="Quảng Nam">Quảng Nam</option>
                                                            <option value="315" title="Quảng Ngãi">Quảng Ngãi</option>
                                                            <option value="316" title="Quảng Ninh">Quảng Ninh</option>
                                                            <option value="317" title="Quảng Trị">Quảng Trị</option>
                                                            <option value="318" title="Sóc Trăng">Sóc Trăng</option>
                                                            <option value="319" title="Sơn La">Sơn La</option>
                                                            <option value="320" title="Tây Ninh">Tây Ninh</option>
                                                            <option value="321" title="Thái Bình">Thái Bình</option>
                                                            <option value="322" title="Thái Nguyên">Thái Nguyên</option>
                                                            <option value="323" title="Thanh Hóa">Thanh Hóa</option>
															<option value="324" title="Thừa Thiên Huế">Thừa Thiên Huế</option>
                                                            <option value="325" title="Tiền Giang">Tiền Giang</option>
                                                            <option value="326" title="Trà Vinh">Trà Vinh</option>
                                                            <option value="327" title="Tuyên Quang">Tuyên Quang</option>
                                                            <option value="328" title="Vĩnh Long">Vĩnh Long</option>
                                                            <option value="329" title="Vĩnh Phúc">Vĩnh Phúc</option>
                                                            <option value="330" title="Yên Bái">Yên Bái</option>
<?}else{?>
    
                                                            <option value="665" title="An Giang">An Giang</option>
                                                            <option value="666" title="Bà Rịa–Vũng Tàu">Bà Rịa–Vũng Tàu</option>
                                                            <option value="667" title="Bắc Giang">Bắc Giang</option>
                                                            <option value="668" title="Bắc Kạn">Bắc Kạn</option>
                                                            <option value="669" title="Bạc Liêu">Bạc Liêu</option>
                                                            <option value="670" title="Bắc Ninh">Bắc Ninh</option>
                                                            <option value="671" title="Bến Tre">Bến Tre</option>
                                                            <option value="672" title="Bình Định">Bình Định</option>
                                                            <option value="673" title="Bình Dương">Bình Dương</option>
                                                            <option value="674" title="Bình Phước">Bình Phước</option>
                                                            <option value="675" title="Bình Thuận">Bình Thuận</option>
                                                            <option value="676" title="Cà Mau">Cà Mau</option>
                                                            <option value="677" title="Cần Thơ">Cần Thơ</option>
                                                            <option value="678" title="Cao Bằng">Cao Bằng</option>
                                                            <option value="679" title="Đà Nẵng">Đà Nẵng</option>
                                                            <option value="680" title="Đắk Lắk">Đắk Lắk</option>
                                                            <option value="681" title="Đắk Nông">Đắk Nông</option>
                                                            <option value="682" title="Điện Biên">Điện Biên</option>
                                                            <option value="683" title="Đồng Nai">Đồng Nai</option>
                                                            <option value="684" title="Đồng Tháp">Đồng Tháp</option>
                                                            <option value="685" title="Gia Lai">Gia Lai</option>
                                                            <option value="686" title="Hà Giang">Hà Giang</option>
                                                            <option value="687" title="Hà Nam">Hà Nam</option> 
															<option value="688" title="Hà Nam">Hà Nội</option>
															<option value="689" title="Hà Nam">Hà Tây</option>
                                                            <option value="690" title="Hà Tĩnh">Hà Tĩnh</option>
                                                            <option value="691" title="Hải Dương">Hải Dương</option>
                                                            <option value="692" title="Hải Phòng">Hải Phòng</option>
                                                            <option value="693" title="Hậu Giang">Hậu Giang</option>
                                                            <option value="694" title="Hòa Bình">Hòa Bình</option>
                                                            <option value="695" title="Hưng Yên">Hưng Yên</option>
															<option value="696" title="Hưng Yên">Hồ Chí Minh</option>
                                                            <option value="697" title="Khánh Hòa">Khánh Hòa</option>
                                                            <option value="698" title="Kiên Giang">Kiên Giang</option>
                                                            <option value="699" title="Kon Tum">Kon Tum</option>
                                                            <option value="700" title="Lai Châu">Lai Châu</option>
                                                            <option value="701" title="Lâm Đồng">Lâm Đồng</option>
                                                            <option value="702" title="Lạng Sơn">Lạng Sơn</option>
                                                            <option value="703" title="Lào Cai">Lào Cai</option>
                                                            <option value="704" title="Long An">Long An</option>
                                                            <option value="705" title="Nam Định">Nam Định</option>
                                                            <option value="706" title="Nghệ An">Nghệ An</option>
                                                            <option value="707" title="Ninh Bình">Ninh Bình</option>
                                                            <option value="708" title="Ninh Thuận">Ninh Thuận</option>
                                                            <option value="709" title="Phú Thọ">Phú Thọ</option>
                                                            <option value="710" title="Phú Yên">Phú Yên</option>
                                                            <option value="711" title="Quảng Bình">Quảng Bình</option>
                                                            <option value="712" title="Quảng Nam">Quảng Nam</option>
                                                            <option value="713" title="Quảng Ngãi">Quảng Ngãi</option>
                                                            <option value="714" title="Quảng Ninh">Quảng Ninh</option>
                                                            <option value="715" title="Quảng Trị">Quảng Trị</option>
                                                            <option value="716" title="Sóc Trăng">Sóc Trăng</option>
                                                            <option value="717" title="Sơn La">Sơn La</option>
                                                            <option value="718" title="Tây Ninh">Tây Ninh</option>
                                                            <option value="719" title="Thái Bình">Thái Bình</option>
                                                            <option value="720" title="Thái Nguyên">Thái Nguyên</option>
                                                            <option value="721" title="Thanh Hóa">Thanh Hóa</option>
															<option value="722" title="Thừa Thiên Huế">Thừa Thiên Huế</option>
                                                            <option value="723" title="Tiền Giang">Tiền Giang</option>
                                                            <option value="724" title="Trà Vinh">Trà Vinh</option>
                                                            <option value="725" title="Tuyên Quang">Tuyên Quang</option>
                                                            <option value="726" title="Vĩnh Long">Vĩnh Long</option>
                                                            <option value="727" title="Vĩnh Phúc">Vĩnh Phúc</option>
                                                            <option value="728" title="Yên Bái">Yên Bái</option>
<?}?>												 
	                                                       
<?}else{?>
	<?}?>	
	
<?php if($row9999111['khoiluong']*$row999911['ordersdetail_quantity']>'5000'  & $row9999111['khoiluong']*$row999911['ordersdetail_quantity']<='30000')
{?>	  
<option value="<?php echo $row999911112['id'] ;?>" >
	<?php if($row99991['tinhthanh'] =='0' )
{?>
Tỉnh/Thành
<?}else{?>
 <?php echo ($row999911112['FirstName'] );?>
<?}?>	</option> 	

  	<?php if($row99991111['city'] =='69' )
{?>
 <option value="266" title="Nội ô TP.Cần Thơ" >Nội ô TP.Cần Thơ</option>  	
   <?}else{?>
    <option value="331" title="Nội ô TP.Cần Thơ" >Tỉnh thành khác phí thỏa thuận sau</option>  		
<?}?>                                                        
                                                         													
	                                                       
<?}else{?>
	<?}?>	
	
<?php if($row9999111['khoiluong']*$row999911['ordersdetail_quantity']>'30000'  )
{?>	                                                       
<option value="<?php echo $row999911112['id'] ;?>" >
	<?php if($row99991['tinhthanh'] =='0' )
{?>
Tỉnh/Thành
<?}else{?>
 <?php echo ($row999911112['FirstName'] );?>
<?}?>	</option> 	
  	<?php if($row99991111['city'] =='69' )
{?>
 <option value="332" title="Nội ô TP.Cần Thơ" >Nội ô TP.Cần Thơ</option>  	
   <?}else{?>
    <option value="331" title="Nội ô TP.Cần Thơ" >Tỉnh thành khác phí thỏa thuận sau</option>  		
<?}?>   															
	                                                       
<?}else{?>
	<?}?>		
	
	
	
	
<?}else{?>
<option value="<?php echo $row999911112['id'] ;?>" >
	<?php if($row99991['tinhthanh'] =='0' )
{?>
Tỉnh/Thành
<?}else{?>
 <?php echo ($row999911112['FirstName'] );?>
<?}?>	</option> 															 
	                                                         <option value="334" title="Nội ô TP.Cần Thơ" >Nội ô TP.Cần Thơ</option>       
                                                            <option value="335" title="An Giang">An Giang</option>
                                                            <option value="336" title="Bà Rịa–Vũng Tàu">Bà Rịa–Vũng Tàu</option>
                                                            <option value="337" title="Bắc Giang">Bắc Giang</option>
                                                            <option value="338" title="Bắc Kạn">Bắc Kạn</option>
                                                            <option value="339" title="Bạc Liêu">Bạc Liêu</option>
                                                            <option value="340" title="Bắc Ninh">Bắc Ninh</option>
                                                            <option value="341" title="Bến Tre">Bến Tre</option>
                                                            <option value="342" title="Bình Định">Bình Định</option>
                                                            <option value="343" title="Bình Dương">Bình Dương</option>
                                                            <option value="344" title="Bình Phước">Bình Phước</option>
                                                            <option value="345" title="Bình Thuận">Bình Thuận</option>
                                                            <option value="346" title="Cà Mau">Cà Mau</option>
                                                            <option value="347" title="Cần Thơ">Cần Thơ</option>
                                                            <option value="348" title="Cao Bằng">Cao Bằng</option>
                                                            <option value="349" title="Đà Nẵng">Đà Nẵng</option>
                                                            <option value="350" title="Đắk Lắk">Đắk Lắk</option>
                                                            <option value="351" title="Đắk Nông">Đắk Nông</option>
                                                            <option value="352" title="Điện Biên">Điện Biên</option>
                                                            <option value="353" title="Đồng Nai">Đồng Nai</option>
                                                            <option value="354" title="Đồng Tháp">Đồng Tháp</option>
                                                            <option value="355" title="Gia Lai">Gia Lai</option>
                                                            <option value="356" title="Hà Giang">Hà Giang</option>
                                                            <option value="357" title="Hà Nam">Hà Nam</option> 
															<option value="358" title="Hà Nam">Hà Nội</option>
															<option value="359" title="Hà Nam">Hà Tây</option>
                                                            <option value="360" title="Hà Tĩnh">Hà Tĩnh</option>
                                                            <option value="361" title="Hải Dương">Hải Dương</option>
                                                            <option value="362" title="Hải Phòng">Hải Phòng</option>
                                                            <option value="363" title="Hậu Giang">Hậu Giang</option>
                                                            <option value="364" title="Hòa Bình">Hòa Bình</option>
                                                            <option value="365" title="Hưng Yên">Hưng Yên</option>
															<option value="366" title="Hưng Yên">Hồ Chí Minh</option>
                                                            <option value="367" title="Khánh Hòa">Khánh Hòa</option>
                                                            <option value="368" title="Kiên Giang">Kiên Giang</option>
                                                            <option value="369" title="Kon Tum">Kon Tum</option>
                                                            <option value="370" title="Lai Châu">Lai Châu</option>
                                                            <option value="371" title="Lâm Đồng">Lâm Đồng</option>
                                                            <option value="372" title="Lạng Sơn">Lạng Sơn</option>
                                                            <option value="273" title="Lào Cai">Lào Cai</option>
                                                            <option value="374" title="Long An">Long An</option>
                                                            <option value="375" title="Nam Định">Nam Định</option>
                                                            <option value="376" title="Nghệ An">Nghệ An</option>
                                                            <option value="377" title="Ninh Bình">Ninh Bình</option>
                                                            <option value="378" title="Ninh Thuận">Ninh Thuận</option>
                                                            <option value="379" title="Phú Thọ">Phú Thọ</option>
                                                            <option value="380" title="Phú Yên">Phú Yên</option>
                                                            <option value="381" title="Quảng Bình">Quảng Bình</option>
                                                            <option value="382" title="Quảng Nam">Quảng Nam</option>
                                                            <option value="383" title="Quảng Ngãi">Quảng Ngãi</option>
                                                            <option value="384" title="Quảng Ninh">Quảng Ninh</option>
                                                            <option value="385" title="Quảng Trị">Quảng Trị</option>
                                                            <option value="386" title="Sóc Trăng">Sóc Trăng</option>
                                                            <option value="387" title="Sơn La">Sơn La</option>
                                                            <option value="388" title="Tây Ninh">Tây Ninh</option>
                                                            <option value="389" title="Thái Bình">Thái Bình</option>
                                                            <option value="390" title="Thái Nguyên">Thái Nguyên</option>
                                                            <option value="391" title="Thanh Hóa">Thanh Hóa</option>
															<option value="392" title="Thừa Thiên Huế">Thừa Thiên Huế</option>
                                                            <option value="393" title="Tiền Giang">Tiền Giang</option>
                                                            <option value="394" title="Trà Vinh">Trà Vinh</option>
                                                            <option value="395" title="Tuyên Quang">Tuyên Quang</option>
                                                            <option value="396" title="Vĩnh Long">Vĩnh Long</option>
                                                            <option value="397" title="Vĩnh Phúc">Vĩnh Phúc</option>
                                                            <option value="398" title="Yên Bái">Yên Bái</option>

	<?}?>	
</select>	</b>với chi phí<b style="color: #10ab16;">


<?php echo number_format($row999911['phivanchuyen'] );?>đ
</b>



</label>

	  
	 

					
</div>
	         
					
					  

                                    </div>

								
				
            </div>
			
<?if($row9999['diemlua_mem']>="1000"){?>	









<?if($row9999['diemlua_mem'] >= $row999911['ordersdetail_price']*$row999911['ordersdetail_quantity']+$row999911['phivanchuyen']){?>	
<?if($row999911['trudiemlua'] < $row999911['ordersdetail_price']*$row999911['ordersdetail_quantity']+$row999911['phivanchuyen']){?>	

<div style=" float: right; margin-top: -120px;    width: 292px; ">
			<span><b><span style="color: red;" class="glyphicon glyphicon-fire"></span>  SỬ DỤNG ĐIỂM LỬA THANH TOÁN <span style="color: red;" class="glyphicon glyphicon-fire"></span></b><b style=" color: #FF9800; "> <?php echo $row_pro['orders_name'];?></b></span>
			<br>
<b>&nbsp;&nbsp;&nbsp; Tổng điểm Lửa đang có: </b><b style=" color: red; "><?php echo str_replace(",",",",number_format($row9999['diemlua_mem']));?> điểm</b>
	<br><b>&nbsp;&nbsp;&nbsp; Sử dụng:   </b> thanh toán cho <b style=" color: blue; ">  <?php echo str_replace(",",",",number_format($row999911['ordersdetail_price']*$row999911['ordersdetail_quantity']+$row999911['phivanchuyen']
	));?>đ</b>
			<br>
			<span>    
		

		<center>	<button type="submit" name="thanhtoan" onclick="return confirm('Đồng ý thanh toán');" style=" height: 31px; background: #3fa2fa; border-color: #00acd6; color: #fff; " >Thanh toán</button>
	
			</span>
						<br>
						
</div>		
	
	<?}else{?>			
	<?}?>	
	<?}else{?>			
	<?}?>	

<?if($row9999['diemlua_mem'] < $row999911['ordersdetail_price']*$row999911['ordersdetail_quantity']+$row999911['phivanchuyen']){?>	
<?if($row999911['trudiemlua'] < $row999911['ordersdetail_price']*$row999911['ordersdetail_quantity']+$row999911['phivanchuyen']){?>	

<div style=" float: right; margin-top: -120px;    width: 292px; ">
			<span><b><span style="color: red;" class="glyphicon glyphicon-fire"></span>  SỬ DỤNG ĐIỂM LỬA THANH TOÁN  <span style="color: red;" class="glyphicon glyphicon-fire"></span></b><b style=" color: #FF9800; "> <?php echo $row_pro['orders_name'];?></b></span>
			<br>
<b>&nbsp;&nbsp;&nbsp; Tổng điểm Lửa đang có: </b><b style=" color: red; "><?php echo str_replace(",",",",number_format($row9999['diemlua_mem']));?> điểm</b>
	<br><b>&nbsp;&nbsp;&nbsp; Sử dụng:   </b> thanh toán cho <b style=" color: blue; ">  <?php echo str_replace(",",",",number_format($row999911['ordersdetail_price']*$row999911['ordersdetail_quantity']+$row999911['phivanchuyen']));?>đ</b>
			<br>
			<span>    
	
			
		<center>	<button type="submit" name="thanhtoan" onclick="return confirm('Đồng ý thanh toán');" style=" height: 31px; background: #3fa2fa; border-color: #00acd6; color: #fff; " >Thanh toán</button>
			</span>
						<br>
						
</div>		
	<?}else{?>			
	<?}?>	
	<?}else{?>			
	<?}?>	













	<?}else{?>	

		
	<?}?>		
		
			
</div>




<? if ($total1>0) { ?>

<!-- end all help-->
</div>
<?}else{?>

<?}?>
</div>
</div>
 <div class="d-box-cart-content">
                    <table cellspacing="0" cellpadding="3" border="0" style="width:100%;padding: 15px;">
						
						<tr>
							<td><b>Họ tên<span class="s-batbuoc">*</span></b></td>
							<td style="
    padding-bottom: 14px;
"  >
								<input type="text" maxlength="100" style="width:100%;    height: 35px;
    padding: 0 10px;
    border: 1px solid #cecece;
    background-color: #fff;
    border-radius: 3px;" value="<? echo $row99991['orders_name']; ?>" placeholder="Nhâp Họ và Tên quý khách hàng" name="name" />
							</td style="
    padding-bottom: 14px;
" >
						</tr>
						<tr>
							<td ><b>Điện thoại<span class="s-batbuoc">*</span></b></td>
							<td style="
    padding-bottom: 14px;
" >
								<input type="text" maxlength="50" style="width:100%;    height: 35px;
    padding: 0 10px;
    border: 1px solid #cecece;
    background-color: #fff;
    border-radius: 3px;" value="<? echo $row99991['orders_phone']; ?>" placeholder="Nhập số điện thoại liên lạc của quý khách" name="phone" />
							</td>
						</tr>
						<!--tr>
							<td><b>Email</b></td>
							<td style="
    padding-bottom: 14px;
">
								<input type="text" maxlength="50" style="width:100%;    height: 35px;
    padding: 0 10px;
    border: 1px solid #cecece;
    background-color: #fff;
    border-radius: 3px;" value="<? echo $row99991['orders_email']; ?>" placeholder="Nhập đia chỉ Email của quý khách" name="email" />
							</td>
						</tr-->
						<tr>
							<td><b>Địa chỉ<span class="s-batbuoc">*</span></b></td>
							<td style="
    padding-bottom: 14px;
">
					<input type="text"  maxlength="100" style="width:100%;    height: 35px;
    padding: 0 10px;
    border: 1px solid #cecece;
    background-color: #fff;
    border-radius: 3px;" value="<? echo $row99991['orders_address']; ?>" placeholder="Nhập địa chỉ cụ thể bao gồm Số nhà, Hẻm, Đường" name="address" />

	<br>
						

							</td>
						</tr>
						 <!--script type="text/javascript" src="system/views/js1/jquery.js"></script>
        <script>
			$(document).ready(function(){
				$("#province").change(function(){
					id=$("#province").val();
					$.ajax({
						url:"system/views/js1/xuly_province.php",
						type:"post",
						data:"province_id="+id,
						async:true,
						success:function(kq){
							$("#district").html(kq);
						}
					});
					return false;	
				});	
			});
		</script>
						<tr>
							<td></td>
							<td style="
    padding-bottom: 14px;
">
							<select style="width:170px;    height: 31px;
    padding: 0 10px;
    border: 1px solid #cecece;
    background-color: #fff;
    border-radius: 3px;" id="province" name="province">
                	<option value="none">--Tỉnh/thành--</option>
<?php
						require("system/views/library/config.php");
						mysql_set_charset('utf8');
						$result=mysql_query("select province_id,province_name from provinces");
						while($data=mysql_fetch_array($result)){
                    		echo"<option value='$data[province_id]'>$data[province_name]</option>";
						}
						mysql_close($conn);
					?>
                </select>	
 <select style="width:140px;    height: 31px;
    padding: 0 10px;
    border: 1px solid #cecece;
    background-color: #fff;
    border-radius: 3px;"  id="district" name="district">
                	<option value="none">--Quận/huyện--</option>
					
					
                </select>
				
				
	<input type="text"  maxlength="100" style="width:153px;    height: 31px;
    padding: 0 10px;
    border: 1px solid #cecece;
    background-color: #fff;
    border-radius: 3px;" value="<? echo $cust['address']; ?>" placeholder="Phường/Xã" name="address" /-->
	<br>
										

							</td>
				
							
							
						</tr>
						
						<tr>
							<td style="width:100px;"><b>Ghi chú thêm</b></td>
							<td >
								<input type="text"  maxlength="100" style="width:100%;    height: 65px;
    padding: 0 10px;
    border: 1px solid #cecece;
    background-color: #fff;
    border-radius: 3px;" value="<? echo $row99991['ghichu']; ?>"  name="ghichu" />
							</td>
						</tr>
					
					</table>
					
					<center style=" margin-bottom: 9px; "><input style="padding: 10px; background: #ea0707; color: #ffffff; border: 0px; /* padding-left: 13px; */ font-weight: bold; /* width: 414px; */ border-radius: 5px; font-size: 19px;" type=submit name=butSub value="GỬI ĐƠN HÀNG">

                </div>

				
</form>	

 <?}
else{?>
<meta http-equiv="refresh" content="0;/">
<?}?>