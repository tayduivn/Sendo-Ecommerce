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
		<script>window.location='<?if($domain=='')
{?>./<?echo $user;?>/payment.html<?}else{?>./payment.html<?}?>'</script>
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

<table bgcolor="#FFFFFF" border="1" width="100%" cellspacing="0" cellpadding="4" id="table7" style="border-collapse: collapse">





<tr><td>
<br>

<p align="center">

<font face="Tahoma" style="font-size: 8.5pt" color="#FF0000">

<? 
   		echo "B&#7841;n ch&#432;a ch&#7885;n b&#7845;t k&#7923; s&#7843;n ph&#7849;m nào";

?>

</font>

</p>
</td></tr></table>
<?
}
   else

{

?>
<table bgcolor="#FFFFFF" border="0" width="100%" id="table1090" cellspacing="0" cellpadding="0">
<tr>
<td width="54">
	<?if($domain=='')
	{?>
	<a href="./<? echo $user;?>"><img src="template/base/images/home.jpg"></a>
	<?}else{?>
	<a href=""><img src="template/base/images/home.jpg"></a>
	<?}?>
	</td>
<td>
<b><font face="Tahoma" style="font-size: 9pt; color:#5A635C">
Trang chủ> Giỏ hàng</b>
</td>
</tr>
<tr>
<td height="20"></td>
<td>
</td>
</tr>
</table>
<FORM action="<?if($domain=='')
{?>./<? echo $user;?><?}else{?>./index.php<?}?>" method="POST" name="cartform">

<table bgcolor="#FFFFFF" border="1" width="100%" cellspacing="0" cellpadding="4" id="table7" style="border-collapse: collapse">


	<tr>

		<td align="center" nowrap width="100">&nbsp;</td>

		<td align="center" nowrap><font face="Tahoma" style="font-size: 8.5pt">S&#7843;n ph&#7849;m</font></td>

		<td align="center" nowrap width="60"><font face="Tahoma" style="font-size: 8.5pt">S&#7889; l&#432;&#7907;ng</font></td>

		<td align="center" nowrap width="60"><font face="Tahoma" style="font-size: 8.5pt">&#272;&#417;n giá</font></td>

		<td align="center" nowrap width="60"><font face="Tahoma" style="font-size: 8.5pt">Thành 

		ti&#7873;n</font></td>

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

?>	

	<tr>

		<td align="center" width="100">

		<font face="Tahoma" style="font-size: 8.5pt">

		<A href="chi-tiet-san-pham-<? echo $pro['id']; ?>-<? echo $pro['cat_mem']; ?>.html"><IMG id="" src="<? echo $pro['image']; ?>" alt="<? echo $pro['name']; ?>" border="0" width="100"></A></font></td>

		<td align="left"><span style="font-size: 8.5pt"><? echo $pro['name']; ?></span></td>

		<td align="center" width="60"><span style="font-size: 8.5pt"><input type="text" name="txtQuantity[]" size="5" value="<? echo $product[1]; ?>"></span></td>

		<td align="center" width="60"><span style="font-size: 8.5pt"><? echo number_format($pro['price'],1); ?>VN&#272;</span></td>

		<td align="center" width="60"><span style="font-size: 8.5pt"><? echo number_format(($pro['price']*$product[1]),1); ?>VN&#272;</span></td>

		<td align="center" width="60"><font face="Verdana" size="1">

        <span style="font-size: 8.5pt">
<?if($domain=='')
	{?>
        <input type=submit class="buttonorange"  name=butXoa value="Xóa" onclick="window.location='<? echo $user;?>/xoa-san-pham/<? echo ($cnt) ?>.html';return false;" height="5">
<?}else{?>
			<input type=submit class="buttonorange"  name=butXoa value="Xóa" onclick="window.location='./xoa-san-pham/<? echo ($cnt) ?>.html';return false;" height="5">
<?}?>
			</span></font></td>

	</tr>

<?

}
$tongcong=$tongcong+$pro['price']*$product[1];

$cnt=$cnt+1;
$_SESSION['tongcong']=$tongcong;
} 

?>

</table>

<TABLE bgcolor="#FFFFFF" border="0" width="100%" id="table2">

<TR><TD>

	<p align="right"><font face="Tahoma" style="font-size: 8.5pt"><b>T&#7893;ng c&#7897;ng : <? echo number_format($_SESSION['tongcong'],1); ?>VN&#272;

	</b></font></TD></TR>

</TABLE>

<HR align="left" noshade size="1">

<TABLE bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0" width="100%" id="table5">

<TR>

<TD>

<font face="Verdana" size="1">

                <input type=submit class="buttonorange" onmouseover="this.className='buttonblue'" onmouseout="this.className='buttonorange'" name=butUpdate value="C&#7853;p nh&#7853;t"></font><a href="javascript: document.cartform.submit()"><font face="Tahoma" style="font-size: 8.5pt"> </font>

</a><font face="Verdana" size="1">

                <input type=submit class="buttonorange" onmouseover="this.className='buttonblue'" onmouseout="this.className='buttonorange'" name=butClear value="Xóa h&#7871;t"></font></TD>

<TD align="right">

<font face="Verdana" size="1">

                <input type=submit class="buttonorange" onmouseover="this.className='buttonblue'" onmouseout="this.className='buttonorange'" name=butCheckout value="Thanh toán"></font></TD>

</TR>

</TABLE>

<input type="hidden" name="home" value="cart">

</FORM>

<br>

<?

}

?>