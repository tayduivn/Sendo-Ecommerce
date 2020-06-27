


<?php
$truy_xuat=mysql_query("SELECT * FROM orders where orders_id='".$_REQUEST['p']."'");
$truy_xuat_in=mysql_fetch_assoc($truy_xuat);



if($_SESSION['log']==$truy_xuat_in['user_shop'] && $_REQUEST['p'] == $truy_xuat_in['orders_id'] &&  $truy_xuat_in['active']=='2' &&  $truy_xuat_in['chuyentien']=='0' ){?>


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


?>

<div id="content_center">
<div style="padding: 11px;background: #e60f0f;color: #fff;"><b>SẢN PHẨM TRONG ĐƠN HÀNG SỐ - <? echo $p;?></b>
 
 
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
	 
 






	  
	 

					
</div>
	         
					
					  

                                    </div>

					
				
            </div>
			

</div>

</div>
	<div style="padding: 11px;background: #e60f0f;color: #fff;"><b>THÔN TIN KHÁCH HÀNG KHIẾU NẠI</b>	  </div>	
 <div class="d-box-cart-content">
 






 <?
 // xóa ảnh 1 baner
 

	    $tinhtrang_hang=$_POST['tinhtrang_hang'];
			date_default_timezone_set("Asia/Ho_Chi_Minh");
	$date = date("d-m-Y H:i:s");
		$type=$_POST['type'];
		$chitiet=$_POST['chitiet'];
		$sqlUpdateField=$_POST['hinhanh1'];
		$hinhanh2=$_POST['hinhanh2'];
		$hinhanh3=$_POST['hinhanh3'];
		$hinhanh4=$_POST['hinhanh4'];

		
		
// Ấn định  dung lượng file ảnh upload
define ("MAX_SIZE","100111");
// hàm này đọc phần mở rộng của file. Nó được dùng để kiểm tra nếu
// file này có phải là file hình hay không .
function getExtension($str) {
$i = strrpos($str,".");
if (!$i) { return ""; }
$l = strlen($str) - $i;
$ext = substr($str,$i+1,$l);
return $ext;
}
//This variable is used as a flag. The value is initialized with 0 (meaning no
// error  found)
//and it will be changed to 1 if an errro occures.
//If the error occures the file will not be uploaded.
$errors=0;		
		
if (isset($_POST['guikhieunai'])) 
{

// lấy tên file upload
$image=$_FILES['hinhanh1']['name'];
// Nếu nó không rỗng
if ($image)
{
// Lấy tên gốc của file
$filename = stripslashes($_FILES['hinhanh1']['name']);
//Lấy phần mở rộng của file
$extension = getExtension($filename);
$extension = strtolower($extension);
// Nếu nó không phải là file hình thì sẽ thông báo lỗi
if (($extension != "jpg") && ($extension != "jpeg") && ($extension !=
"png") && ($extension != "gif"))
{
// xuất lỗi ra màn hình
echo '<h1>Đây không phải là file hình!</h1>';
$errors=1;
}
else
{
//Lấy dung lượng của file upload
$size=filesize($_FILES['hinhanh1']['tmp_name']);
if ($size > MAX_SIZE*10024)
{
echo '<h1>Vượt quá dung lượng cho phép!</h1>';
$errors=1;
}
 
// đặt tên mới cho file hình up lên
$image_name=time().'.'.$extension;
// gán thêm cho file này đường dẫn
$newname="images/khieunai/".$image_name;
// kiểm tra xem file hình này đã upload lên trước đó chưa
$copied = copy($_FILES['hinhanh1']['tmp_name'], $newname);
if (!$copied)
{
echo '<h1> <SCRIPT LANGUAGE="JavaScript">
   
 window.alert("Không phải File hình")
 
    </SCRIPT>';
$errors=1;
}}}
	
 

  

			
	
	
	$sqlsub1 = "insert into khieunai (tinhtrang_hang,id_sanpham,id_donhang,user_mem,user_shop,type,chitiet,date,hinhanh1,tinhtrang_khieunai) values ('".$tinhtrang_hang."','".$row9999111['id']."','".$p."','".$row99991['user_mem']."','".$row99991['orders_user']."','".$type."','".$chitiet."','".$date."','".$newname."','Đang chờ xem xét' )";
	$sqlsub1_2 = "insert into thongbao (thongbao,date,user,type) values ('Bạn đã gửi khiếu nại  cho đơn hàng số <b>$p</b> với yêu cầu <b>$type</b> và nội dung </b>$chitiet</b>','".$date."','".$row99991['user_mem']."','2' )";
	$sqlsub1_3 = "insert into thongbao_shop (thongbao,date,user,type) values ('Người mua hàng đã gửi khiếu nại cho đơn hàng số <b>$p</b> với yêu cầu <b>$type</b> và nội dung <b>$chitiet</b>','".$date."','".$row99991['orders_user']."','2' )";
		if (mysql_query($sqlsub1) && mysql_query($sqlsub1_2) &&  mysql_query($sqlsub1_3)) 
			 {
 
			
				echo "<SCRIPT LANGUAGE='JavaScript'>
   
 window.alert('Gửi khiếu nại thành công.Bạn có thể theo dõi khiếu nại của mình tại đây')
       window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";
		}	
		else {
				echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Thao tác không thành công')
	    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";
		}
  	
 
}	

if (isset($_POST['huykhieunai'])) 
{	

	$sqlsub9 = "delete from khieunai where id_donhang='".$p."' and user_mem='".$_SESSION['mem']."'  ";
	$sqlsub1_2_huy = "insert into thongbao (thongbao,date,user,type) values ('Bạn đã hủy và chấm dứt khiếu nại đơn hàng số <b>$p</b>  ','".$date."','".$row99991['user_mem']."','2' )";
	$sqlsub1_3_huy = "insert into thongbao_shop (thongbao,date,user,type) values ('Người mua hàng đã hủy và chấm dứt khiếu nại đơn hàng số <b>$p</b>  ','".$date."','".$row99991['orders_user']."','2' )";
		if (mysql_query($sqlsub9)  && mysql_query($sqlsub1_2_huy) && mysql_query($sqlsub1_3_huy)  ) 
			 {
 
			
				echo "<SCRIPT LANGUAGE='JavaScript'>
   
 window.alert('Đã hủy và chấm dứt khiếu nại thành công')
       window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";
		}	
		else {
				echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Thao tác không thành công')
	    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";
		}
  	
 
}	

$xemlaikhieunai=mysql_query("SELECT * FROM khieunai where id_donhang='".$p."'");
$xemlaikhieunai_in=mysql_fetch_assoc($xemlaikhieunai);

 

 ?>
 <form method="POST"  name="cartform1" onsubmit="return check()" enctype="multipart/form-data"  >	
                    <table cellspacing="0" cellpadding="3" border="0" style="width:100%;">
						
						<tr>
						
	
						
							<td><b>Tình trạng<span class="s-batbuoc">*</span></b></td>
							<td >
											<?php if($xemlaikhieunai_in['id_donhang']==$p)
{?>
											<?php if($xemlaikhieunai_in['tinhtrang_hang']=='1')
{?>

<Input type = "Radio" Name ="tinhtrang_hang" value= "1" checked> Đã nhận hàng &nbsp;
 
<?}
else{?>
 
<Input type = "Radio" Name ="tinhtrang_hang" value= "2" checked > Chưa nhận hàng
<?}?>

 


<?}
else{?>
<Input type = "Radio" Name ="tinhtrang_hang" value= "1"> Đã nhận hàng &nbsp;
<Input type = "Radio" Name ="tinhtrang_hang" value= "2" > Chưa nhận hàng
<?}?>	

							</td>
						</tr>
						
						
						
						<tr>
							<td><b>Yêu cầu<span class="s-batbuoc">*</span></b></td>
							<td>
							<select name="type">
<?php if($xemlaikhieunai_in['id_donhang']==$p)
{?>
<option  selected><? echo $xemlaikhieunai_in['type']; ?></option>
<?}
else{?>
 <option value="Gửi thêm hàng đã thiếu">Gửi thêm hàng đã thiếu</option>
<option value="Đổi hàng">Đổi lại hàng</option>
<option  value="Trả hàng - Mua hàng khác" >Trả hàng - Mua hàng khác</option>
<option  value="Trả hàng - Nhận lại tiền">Trả hàng - Nhận lại tiền</option>
<option value="Yêu cầu khác">Yêu cầu khác</option>
<?}?>		

					



							</select>
							</td>
						</tr>
						
	<tr>
							<td style="width:100px;"><b>Chi tiết lý do<span class="s-batbuoc">*</span></b></td>
							<td >
							<?php if($xemlaikhieunai_in['id_donhang']==$p)
{?>
<textarea  type="text"  maxlength="100" style="    background: #d8d8d8;width:100%;height: 65px;padding: 0 10px;border: 1px solid #cecece; border-radius: 3px;"  disabled    /><? echo $xemlaikhieunai_in['chitiet']; ?></textarea>
<?}
else{?>
<textarea  type="text"  maxlength="100" style="width:100%;height: 65px;padding: 0 10px;border: 1px solid #cecece; border-radius: 3px;"    name="chitiet"  /><? echo $xemlaikhieunai_in['chitiet']; ?></textarea>
<?}?>	
								
							</td>
						</tr>					
						
						
						
						
						<tr>
							<td><b>Hình ảnh<span class="s-batbuoc">*</span></b></td>
							<td >
														<?php if($xemlaikhieunai_in['id_donhang']==$p)
{?>

 <a id="xemanh" href="<? echo $xemlaikhieunai_in['hinhanh1']; ?>" ><image   width="100px" src="<? echo $xemlaikhieunai_in['hinhanh1']; ?>"></a>
 <br>
 
Hình ảnh là tài liệu, bảng kê, các bằng chứng về thanh toán, Ảnh chụp lên phải là định dạng sau: jpg,jpeg,png,bmp
<br>
<?}
else{?>
<Input type = "file" Name ="hinhanh1"  > 
 <image width="100px" src="<? echo $xemlaikhieunai_in['hinhanh1']; ?>">
 <br>
 
Hình ảnh là tài liệu, bảng kê, các bằng chứng về thanh toán, Ảnh chụp lên phải là định dạng sau: jpg,jpeg,png,bmp
<?}?>


							</td>
							
						</tr>	
						
						
						<tr>
							<td></td>
							<td >
							<?php if($xemlaikhieunai_in['id_donhang']==$p)
{?>
Tình trạng khiếu nại <span style="background: #0e04a8; padding: 4px 12px; color: #fff; display: inline-block;    margin-top: 8px;"><? echo $xemlaikhieunai_in['tinhtrang_khieunai']; ?></span>
	

<?}
else{?>

<?}?>	
							
		<?php if($xemlaikhieunai_in['id_donhang']==$p)
{?>


<?}
else{?>

<?}?>						
							</td>
						</tr>
						
						
						
						
						
						
						
					
					</table>
					
					<center style=" margin-bottom: 60px; ">
                </div>

				
</form>	

<script language="javascript" type="text/javascript">
function check()
{


if(document.cartform1.chitiet.value =="")
{
alert("Chưa điền chi tiết");
document.cartform1.chitiet.focus();
return false;
}
if(document.cartform1.hinhanh1.value =="")
{
alert("Phải có ít nhất 1 hình ảnh tự chụp");
document.cartform1.hinhanh1.focus();
return false;
}




for(i=0;i<document.cartform1.tinhtrang_hang.length;i++)
if(document.cartform1.tinhtrang_hang[i].checked==true)
{
check="yes"
}
if(check=="yes")
{
return true;
}
else
{
alert("Vui lòng chọn tình trạng");
return false;
}



return true;
}
</script>


<?}
else{?>
<meta http-equiv="refresh" content="0;/">
<?}?>













