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
$sql99991=mysql_query("SELECT * FROM orders where orders_id='".$_SESSION['tim_id']."'");
$row99991=mysql_fetch_assoc($sql99991);
$sql999911=mysql_query("SELECT * FROM orderdetail where ordersdetail_ordersid='".$_SESSION['tim_id']."'");
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
	



	

			
	
	 
  	


}	
// xóa ảnh 1 baner
if (isset($_POST['thanhtoan'])) {
	$tongcong_gia = $_POST['tongcong_gia'];


	

			
	
	$sql1111 = "update orderdetail set trudiemlua = trudiemlua + '".$tongcong_gia."'  where ordersdetail_ordersid='".$row99991['orders_id']."' ";
		if (mysql_query($sql1111)) 
			$sql1111 = "update thanhvien set diemlua_mem = diemlua_mem - '".$tongcong_gia."'  where user='".$_SESSION['mem']."' ";
		if (mysql_query($sql1111)) {
			
			
				echo "<SCRIPT LANGUAGE='JavaScript'>
   
  window.alert('Bạn đã sử dụng điểm Lửa thanh toán thành công')
      window.location.href='./index1.php?home=quanlydonhang_order';
    </SCRIPT>";
		}	
		else {
				echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Thao tác không thành công')
	  window.location.href='./index1.php?home=quanlydonhang_order';

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
   

      window.location.href='./index1.php?home=quanlydonhang_order';
    </SCRIPT>";
		}	
		else {
				echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Thao tác không thành công')
	  window.location.href='./index1.php?home=quanlydonhang_order';

    </SCRIPT>";
		}
  	


}	

?>

<div id="content_center">
 <div class="d-step" style=" float: left; width: 100%; height: 52px; border-bottom: 1px solid #ddd; margin-bottom: 18px; margin-top: 4px; ">
           <center> <b style=" font-size: 16px; color: red; ">CHÚC MỪNG BẠN ĐÃ MUA HÀNG THÀNH CÔNG</b></center>
		    <center> <b style=" font-size: 14px; color: #673AB7; ">THÔNG TIN CHI TIẾT ĐƠN HÀNG SỐ: <?php echo $_SESSION['tim_id'];?></b></center>
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






	  
	 

					
</div>
	         
					
					  

                                    </div>

								
				
            </div>
<div style="padding:10px">			 
<b style=" display: inline-block;    margin-top: 4px;">Ngày: <span style="color: #000;padding-right: 5px;"><b style=" color: #bb104e; "><?php echo $row99991['orders_date'];?></b></span></b>	
<br>
<b style=" display: inline-block;    margin-top: 4px;">Giá: <span style="color: #000;padding-right: 5px;"><b style=" color: #bb104e; "><?php echo str_replace(",",",",number_format($row999911['ordersdetail_price']));?>đ</b></span></b>	
<br>
<b style=" display: inline-block;    margin-top: 4px;">Số lượng: <span style="color: #000;padding-right: 5px;"><b  ><?php echo $row999911['ordersdetail_quantity'];?></b></span></b>	
<br>
<b style=" display: inline-block;    margin-top: 4px;">Tổng tiền: <span style="color: #000;padding-right: 5px;"><b style=" color: #2196F3; "><?php echo str_replace(",",",",number_format($row999911['ordersdetail_price']*$row999911['ordersdetail_quantity']));?>đ</b></span></b>	
<br>
<b style=" display: inline-block;    margin-top: 4px;">Phí vận chuyển: <span style="color: #000;padding-right: 5px;"><b style=" color: #2196F3; "><?php echo str_replace(",",",",number_format($row999911['phivanchuyen']));?>đ</b></span></b>	
<br>

<?php if($row999911['trudiemlua']=='0')
{?>
<?}else{?>
<b style=" display: inline-block;    margin-top: 4px;">Trừ điểm Lửa: <span style="color: #000;padding-right: 5px;"><b style=" color: #2196F3; "><?php echo str_replace(",",",",number_format($row999911['trudiemlua']));?></b></span></b>	
<br>
<?}?>

<b style=" display: inline-block;    margin-top: 4px;">Tổng thành tiền: <span style="color: #000;padding-right: 5px;"><b style="color: #f13326;"><?php echo str_replace(",",",",number_format(($row999911['ordersdetail_price']*$row999911['ordersdetail_quantity']+$row999911['phivanchuyen'])-$row999911['trudiemlua'],0));?>đ</b></span></b>	


<br>	
<br>
</div>		

</div>
</div>
 <div class="stepReg-form">
                    <table class="tableSimple" cellpadding="1" cellspacing="0">
                        <tbody>
						
						<tr style="">
                            <td class="tdTextBox" colspan="2">
                                <input  name="name" type="text" value="<? echo $row99991['orders_name']; ?>" maxlength="100" id="txtCompany" placeholder="Họ và Tên người nhận" disabled>
								 
                            </td>
                        </tr>
                             <tr style="">
                            <td class="tdTextBox" colspan="2">
                                <input  name="phone" type="text" value="<? echo $row99991['orders_phone']; ?>" maxlength="100" id="txtCompany" placeholder="Số điện thoại" disabled>
								 
                            </td>
                        </tr><!--tr style="">
                            <td class="tdTextBox" colspan="2">
                                <input  name="email" type="text" value="<? echo $row99991['orders_email']; ?>" maxlength="100" id="txtCompany" placeholder="Địa chỉ Email" disabled>
								 
                            </td>
                        </tr-->
						<tr style="">
                            <td class="tdTextBox" colspan="2">
                                <textarea  style="width: 100%;"  name="address" type="text" value="<? echo $row99991['orders_address']; ?>" maxlength="100" disabled id="txtCompany" placeholder="Địa chỉ nhận hàng"><? echo $row99991['orders_address']; ?></textarea>
								 
                            </td>
                        </tr><tr style="">
                            <td class="tdTextBox" colspan="2">
                                <input   name="ghichu" type="text" value="<? echo $row99991['ghichu']; ?>" maxlength="100" id="txtCompany" placeholder="Ghi chú thêm" disabled>
								 
                            </td>
                        </tr>
						
																		 
						 	
						 
                       
                       
                         
                         
                             
                      
                        
                         
                        <tr>
                            <td class="td-register-button" colspan="2">
                          
                            </td>
                        </tr>
                    </tbody></table>
                </div>

				
</form>	

