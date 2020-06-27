<?

function checkexist()

{

	$cart=$_SESSION['cart'];
	$tongcong=$_SESSION['tongcong'];

	foreach ($cart as $product)

		if ($product[0]==$_REQUEST['p']) return true;

	return false;

}



	if ($_REQUEST['act']=='del')

	{

		if (count($_SESSION['cart'])==1)

			unset($_SESSION['cart']);

		else

		{

			$cart=$_SESSION['cart'];

			unset($cart[$_REQUEST['pos']]);

			$_SESSION['cart']=$cart;

		}

	}



	if (isset($_POST['butUpdate'])||isset($_POST['butCheckout']))

	{

		$cart=$_SESSION['cart'];

		$t=0;

		foreach ($_POST['txtQuantity'] as $quantity)

		{

			if (is_numeric($quantity) && $quantity>0 && strlen($quantity)<5)

				$cart[$t][1]=(int)$quantity;

			if ($quantity<=0)

			{

				unset($cart[$t]);

				$t=$t-1;

			}

			$t=$t+1;

		}

		if (count($cart)<=0) unset($cart);

		$_SESSION['cart']=$cart;

		

		if (isset($_POST['butCheckout'])) 
		{?>
		<script>window.location='./index.php?home=checkout'</script>
		<?}?>

	<?}

	

	if (isset($_POST['butClear']))

		unset($_SESSION['cart']);

	if (isset($_POST['butClear']))

		unset($_SESSION['tongcong']);



	if (isset($_REQUEST['p']))

	{

		{

			if (!isset($_SESSION['cart']))

			{

				$pro=$_REQUEST['p'];

				$cart=array();

				$cart[] = array($pro,1);

				$_SESSION['cart']=$cart;

			}

			else

			{

				$pro=$_REQUEST['p'];

				$cart=$_SESSION['cart'];

				if (count_record("products","id='".$_REQUEST['p']."'")>0 && checkexist()==false)

				{

					$cart[]=array($pro,1);

					$_SESSION['cart']=$cart;

				}

			}

		}

	}

	else

	{

		$cart=$_SESSION['cart'];

	}

?>
<? 

   if (!isset($_SESSION['cart'])) {


?>
<table border="1" width="100%" cellspacing="0" cellpadding="4" id="table7" style="border-collapse: collapse">
<tr><td>
<br>

<p align="center">

<font face="Tahoma" style="font-size: 8.5pt" color="#FF0000">

Bạn chưa chọn sản phẩm nào

</font>

</p>
</td></tr></table>
<?
}
   else

{

?>
<div class="payment_form">
<div style="height: 10px;clear:both"></div>
<FORM action="" method="POST" name="cartform">

<table border="1" width="97%" cellspacing="0" cellpadding="4" id="table7" bordercolor="#c6c6c6" style="border-collapse: collapse;margin:0 auto">


	<tr>

		<td align="center" nowrap width="100">&nbsp;</td>

		<td align="center" nowrap><font face="Tahoma" style="font-size: 8.5pt">Tên sản phẩm</font></td>

		<td align="center" nowrap width="60"><font face="Tahoma" style="font-size: 8.5pt">Số lượng</font></td>

		<td align="center" nowrap width="60"><font face="Tahoma" style="font-size: 8.5pt">Đơn giá</font></td>

		<td align="center" nowrap width="60"><font face="Tahoma" style="font-size: 8.5pt">Thành tiền</font></td>

		<td align="center" nowrap width="60">

		</td>

	</tr>

<?

$cnt=0;

$tongcong=0;

foreach ($cart as $product){

$sql = "select * from products where id='".$product[0]."'";

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

		<A href="./<?php echo doidau(mb_strtolower($pro['name'],"UTF8"));?>-pro-<?php echo $pro['id'];?>.html"><IMG id="" src="<? echo $pro['image']; ?>" alt="<? echo $pro['name']; ?>" border="0" width="100"></A></font></td>

		<td align="left"><span style="font-size: 8.5pt"><? echo $pro['name']; ?></span></td>

		<td align="center" width="60"><span style="font-size: 8.5pt">
        <input type="text" name="txtQuantity[]" size="5" value="<? echo $product[1]; ?>"></span></td>

		<td align="center" width="60"><span style="font-size: 8.5pt"><? echo number_format($price_p,1); ?> VNĐ</span></td>

		<td align="center" width="60"><span style="font-size: 8.5pt"><? echo number_format(($price_p*$product[1]),1); ?> VNĐ</span></td>

		<td align="center" width="60"><font face="Verdana" size="1">

        <span style="font-size: 8.5pt">

        <input type=submit class="cart_submit"  name=butXoa value="Xóa" onclick="window.location='./index.php?home=cart&act=del&pos=<? echo ($cnt) ?>';return false;" height="5"></span></font></td>

	</tr>

<?

}
$tongcong=$tongcong+$price_p*$product[1];

$cnt=$cnt+1;
$_SESSION['tongcong']=$tongcong;
} 

?>

</table>

<TABLE border="0" width="97%" id="table2">

<TR><TD>

	<p align="right"><font face="Tahoma" style="font-size: 8.5pt"><b>Tổng cộng : <? echo number_format($_SESSION['tongcong'],1); ?> VNĐ

	</b></font></TD></TR>

</TABLE>

<HR align="left" noshade size="1">

<TABLE border="0" cellpadding="0" cellspacing="0" style="margin: 0 auto" width="97%" id="table5">

<TR>

<TD>

<font face="Verdana" size="1">

                <input type=submit class="total_price_number" name=butUpdate value="Cập nhật"></font><a href="javascript: document.cartform.submit()"><font face="Tahoma" style="font-size: 8.5pt"> </font>

</a><font face="Verdana" size="1">

                <input type=submit class="total_price_number" name=butClear value="Xóa hết"></font></TD>

<TD align="right">

<font face="Verdana" size="1">

                <input type=submit class="total_price_number" name=butCheckout value="Thanh toán"></font></TD>

</TR>

</TABLE>

<input type="hidden" name="home" value="cart">

</FORM>
<div style="height: 10px;clear:both"></div>
</div>
<?

}

?>