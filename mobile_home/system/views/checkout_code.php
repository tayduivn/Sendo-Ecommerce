<script language="javascript" type="text/javascript">
function check()
{
if(document.cartform.name.value=="")
{
alert("Tên không được bỏ trống");
document.cartform.name.focus();
return false;
}
if(document.cartform.phone.value=="")
{
alert("Bạn chưa điền số điện thoại");
document.cartform.phone.focus();
return false;
}
if(document.cartform.email.value=="")
{
alert("Bạn chưa nhập email");
document.cartform.email.focus();
return false;
}
if(document.cartform.address.value=="")
{
alert("Bạn chưa điền địa chỉ");
document.cartform.address.focus();
return false;
}
return true;
}
</script>
<?if (!isset($_SESSION['log']) || $_SESSION['log']==''){	unset($_SESSION['log']);}
if (count($_SESSION['cart'])<=0){
?>
<script>window.location='./<? echo $user;?>/cart.html'</script>
<?}?>
<?	function send_mail_order()
{		
global $con;	
global $adminemail;		
$sql_pay = "select * from user_shop where user='".$_SESSION['log']."' ";	
$result = mysql_query($sql_pay,$con);
$cust=mysql_fetch_assoc($result);		
$name=$cust['fullname'];	
$address=$cust['address'];	
$phone=$cust['phone'];	
$email=$cust['email'];	
$dathang="";	
$cart=$_SESSION['cart'];	
$tongcong=0;	
$cnt=0;	
foreach ($cart as $product){		
	$sql = "select * from products where id='".$product[0]."'";		
	$result = mysql_query($sql,$con);		
	$pro=mysql_fetch_assoc($result);				
	$dathang.="Ma san pham : ".$pro['code']."<br>"; 		
	$dathang.="Ten san pham : ".$pro['name']."<br>"; 		
	$dathang.="So luong : ".$product[1]."<br>"; 			
	$dathang.="Don gia : ".$pro['price']."<br>";		
	$dathang.="Thanh tien : ".$pro['price']*$product[1]."<br><br>";				
	$tongcong=$tongcong+$pro['price']*$product[1];		
	$cnt=$cnt+1;		} 		
	$dathang.="<hr>Tong cong : ".$tongcong."<br>";	
	$m2=sendmail($email,$adminemail, "Thong tin dat hang cua : ".$name, "Ho ten : ".$name."<br>Dia chi : ".$address."<br>Dien thoai : ".$phone."<br>Email : ".$email."<BR><hr><b>Don hang :</b><br>".$dathang);		if (m2)	
	{			return "";		}		else			
		return "Không th&#7875; g&#7903;i thông tin.";	}?>
		<?	if (count($_SESSION['cart'])<=0) 
		echo "<script>window.location='./?home=cart'</script>";	
	$cart=$_SESSION['cart'];	
	$sql = "select * from user_shop where user='".$_SESSION['log']."'";	
	$result = mysql_query($sql,$con);	
	$cust=mysql_fetch_assoc($result);?>  
<?
	if (isset($_POST['butSub']))
	{
foreach ($cart as $product)
{       $sql = "select * from products where id='".$product[0]."'";
        $result = mysql_query($sql,$con);
        $pro=mysql_fetch_array($result);
		$name=$_POST['name'];
        if($pro['price_special']=='0')
        {
            $price_p=$pro['price'];
        }
        else
        {
            $price_p=$pro['price_special'];
        }
		$company=$_POST['company'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];
		$order_user=$pro['user'];
		$cart=$_SESSION['cart'];
		$tongcong=0;
		$cnt=0;
		$new_id=mysql_insert_id();
		$sqlorder="insert into orders (orders_customer_id, orders_name, orders_company, orders_email, orders_phone, orders_address, orders_user, new_id, orders_date) values ('".$cust['id']."','".$name."','".$company."','".$email."','".$phone."','".$address."','".$order_user."','".$new_id."',SYSDATE())";		
		mysql_query($sqlorder,$con);
		$newid=mysql_insert_id();


			$sqlorder="insert into orderdetail (ordersdetail_product_id,ordersdetail_quantity,ordersdetail_price,ordersdetail_ordersid,user_shop) values (".$product[0].",".$product[1].",'".$price_p."',".$newid.",'".$pro['user']."')";
			mysql_query($sqlorder,$con);
			$tongcong=$tongcong+$price_p*$product[1];
			$cnt=$cnt+1;

}
		?>
		<?
		if (send_mail_order()=="")
		{?>
			<script>window.location='./index.php?home=checkout&code=1'</script>
           <?}else
			{
				echo "<p align='center' class='err'><font color=red>Không th&#7875; g&#7903;i thông tin</font></p>";
			}?>
<?}
?>
<div class="payment_form">
<p align="center" style="line-height: 150%" class="err"><font face="Tahoma" style="font-size: 8.5pt">
<? 	if ($_REQUEST['code']=='1') {   	
	echo "Bạn đã gửi đơn hàng thành công<br>";  
	echo "<a href='./index.php'>Về trang chủ</a>";   		
unset($_SESSION['cart']);
unset($_SESSION['tongcong']);
}	
else{?>
</font></p>
<FORM action="" method="POST" name="cartform" onsubmit="return check()">
<TABLE border="0" cellspacing="1" cellpadding="2" width="100%" id="table8">
<TR>
<TD nowrap>
<div class="form_box">
<input type="text" class="form_input" name="name" id="ord_name" placeholder="Họ và tên" value="<? echo $cust['fullname']; ?>">
</div>
</TD>
</TR>
<TR>
<TD nowrap>                                      	
<div class="form_box">
<input type="text" class="form_input" name="company" id="ord_name" placeholder="Công ty" value="<? echo $cust['company']; ?>">
</div>	
</TD>
</TR>
<TR>
<TD nowrap>                            
<div class="form_box">
<input type="text" class="form_input" name="address" id="ord_name" placeholder="Địa chỉ" value="<? echo $cust['address']; ?>">
</div>	
</TD>
</TR>
<TR>
<TD nowrap>                 
<div class="form_box">
<input type="text" class="form_input" name="phone" id="ord_name" placeholder="Điện thoại" value="<? echo $cust['phone']; ?>">
</div>				
</TD>
</TR>
<TR>
<TD nowrap>
<div class="form_box">
<input type="text" class="form_input" name="phone" id="ord_name" placeholder="Email" value="<? echo $cust['email']; ?>">
</div>
</TD>
</TR>
</TABLE>
<TABLE border="0" cellpadding="10" cellspacing="1" width="100%" id="table1">
<TR><TD class="DialogBox">
<table border="1" width="100%" cellspacing="0" cellpadding="4" id="table7" style="border-collapse: collapse" bordercolor="#c6c6c6">	
<tr>	
<td align="center" nowrap width="100">&nbsp;</td>		
<td align="center" nowrap><font face="Tahoma" style="font-size: 8.5pt">Tên sản phẩm</font></td>		
<td align="center" nowrap width="60"><font face="Tahoma" style="font-size: 8.5pt">Số lượng</font></td>		
<td align="center" nowrap width="60"><font face="Tahoma" style="font-size: 8.5pt">Đơn giá</font></td>		
<td align="center" nowrap width="60"><font face="Tahoma" style="font-size: 8.5pt">Thành tiền</font></td>	</tr>

<?$cart=$_SESSION['cart'];$cnt=0;$tongcong=0;
foreach ($cart as $product)
{$sql = "select * from products where id='".$product[0]."'";
$result = mysql_query($sql,$con);
if (mysql_num_rows($result)>0)
	{
	$pro=mysql_fetch_assoc($result);
	if($pro['price_special']=='0')
        {
            $price_p=$pro['price'];
        }
    else
        {
            $price_p=$pro['price_special'];
        }
	?>	
	
<tr>		
<td align="center" width="100">		
<font face="Tahoma" style="font-size: 8.5pt">
<A href="./<?php echo doidau(mb_strtolower($pro['name'],"UTF8"));?>-pro-<?php echo $pro['id'];?>.html">
<IMG id="" src="<? echo $pro['image']; ?>" alt="<? echo $pro['name']; ?>" border="0" width="100"></A></font></td>		
<td align="left"><span style="font-size: 8.5pt"><? echo $pro['name']; ?></span></td>	
<td align="center" width="60"><span style="font-size: 8.5pt"><? echo $product[1]; ?></span></td>	
<td align="center" width="60"><span style="font-size: 8.5pt"><? echo number_format($price_p); ?>VNĐ</span></td>		
<td align="center" width="60"><span style="font-size: 8.5pt"><? echo number_format(($price_p*$product[1])); ?>VNĐ</span></td></tr>

<?}$tongcong=$tongcong+$price_p*$product[1];$cnt=$cnt+1;} ?>
</table>
<TABLE border="0" width="100%" id="table2">
<TR><TD>
<p align="right"><font face="Tahoma" style="font-size: 8.5pt"><b>Tổng cộng : <? echo number_format($tongcong); ?>	</b></font></TD></TR></TABLE><HR align="left" noshade size="1">
<TABLE border="0" cellpadding="0" cellspacing="0" width="100%" id="table5">
<TR><TD><p align="center"><font face="Verdana" size="1">
<input class="cart_submit" type=submit name=butSub value="Gửi đơn hàng"></font></TD></TR></TABLE>
<input type="hidden" name="menu" value="checkout"></FORM>
<font face="Tahoma" style="font-size: 8.5pt">&nbsp; </font></TD></TR>
</TABLE><?}?>
</div>