<table height="28" cellSpacing="0" cellPadding="0" width="100%" border="0">
      <tr align=center>
        <td class="title" width="100%">Chi ti&#7871;t &#273;&#417;n hàng : &nbsp;|&nbsp
	</td>
      </tr>
    </table>
<?
	switch ($_GET['action'])
	{
		case 'del' :
			$id = $_GET['id'];
			$sql = "delete from orderdetail where ordersdetail_id='".$id."'";
			$result = mysql_query($sql,$con);
			echo mysql_error();
			if ($result) echo "<p align=center class='err'>&#272;ã xóa thành công</p>";
				else echo "<p align=center class='err'>Không th&#7875; xóa d&#7919; li&#7879;u</p>";
			break;
	}
?>

<?
	if (isset($_POST['ButDel'])) {
		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			@$result = mysql_query("delete from orderdetail where ordersdetail_id='".$id."'",$con);
			if ($result) $cnt++;
		}
		echo "<p align=center class='err'>&#272;ã xóa ".$cnt." ph&#7847;n t&#7917;</p>";
	}
?>
<form method="POST" name="frmList" action="index.php">
<input type="hidden" name="act" value="orderdetail">
<input type="hidden" name="orderid" value="<? echo $_REQUEST['orderid']; ?>">
<?
$orderid=$_REQUEST['orderid'];
if ($orderid=='') return;
$orderinfo=GetOrderInfo($orderid);
$cust=GetCustomerInfo($orderinfo['orders_customer_id']);
$sql_order=mysql_query("SELECT * FROM orders where orders_id='".$orderid."' ");
$row_order=mysql_fetch_assoc($sql_order);
?>

<TABLE border="0" cellspacing="1" cellpadding="2" width="100%" id="table8">

<TR>
<TD align="right" width="100"><font color="#000000" style="font-size: 8.5pt">H&#7885; và tên :</font></TD>
<TD width="6">
                                &nbsp;</TD>
<TD nowrap>
                                <font face="Tahoma">
                                <span style="font-size: 8.5pt">
                                <b>
                                <? echo $row_order['orders_name']; ?></b></span></font><b><font color="#000000" style="font-size: 8.5pt">
</font>
								</b>
</TD>
</TR>
<TR>
<TD align="right" width="100"><font color="#000000" style="font-size: 8.5pt">Công ty :</font></TD>
<TD width="6">&nbsp;</TD>
<TD nowrap>
                                <font face="Tahoma">
                                <span style="font-size: 8.5pt">
                                <b>
                                <? echo $row_order['orders_company']; ?></b></span></font><b><font color="#000000" style="font-size: 8.5pt">
</font>
								</b>
</TD>
</TR>


<TR>
<TD align="right" width="100"><font color="#000000" style="font-size: 8.5pt">&#272;&#7883;a ch&#7881; :</font></TD>
<TD width="6">
                                &nbsp;</TD>
<TD nowrap>
                                <font face="Tahoma">
                                <span style="font-size: 8.5pt">
                                <b>
                                <? echo $row_order['orders_address']; ?></b></span></font><b><font color="#000000" style="font-size: 8.5pt">
</font>
								</b>
</TD>
</TR>




<TR>
<TD align="right" width="100"><font color="#000000" style="font-size: 8.5pt">&#272;i&#7879;n th&#7885;ai 
:</font></TD>
<TD width="6">
                                &nbsp;</TD>
<TD nowrap>
                                <font face="Tahoma">
                                <span style="font-size: 8.5pt">
                                <b>
                                <? echo $row_order['orders_phone']; ?></b></span></font><b><font color="#000000" style="font-size: 8.5pt">
</font>
								</b>
</TD>
</TR>
<TR>
<TD align="right" width="100"><font color="#000000" style="font-size: 8.5pt">E-mail :</font></TD>
<TD width="6">
                                &nbsp;</TD>
<TD nowrap>
                                <font face="Tahoma">
                                <span style="font-size: 8.5pt">
                                <b>
                                <? echo $row_order['orders_email']; ?></b></span></font><b><font color="#000000" style="font-size: 8.5pt">
</font>
								</b>
</TD>
</TR>

</TABLE>

<table border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#C9C9C9" width="100%" id="AutoNumber1">
  <tr>
    <td align=center nowrap class="title"><input type="checkbox" name="chkall" onclick="chkallClick(this);"></td>
    <td colspan="2" nowrap class="title">&nbsp;</td>
    <td align="center" nowrap class="title"><b>Mã hàng</b></td>
    <td align="center" nowrap class="title"><b>Tên hàng</b></td>
    <td align="center" nowrap class="title"><b>S&#7889; l&#432;&#7907;ng</b></td>
    <td align="center" nowrap class="title"><b>&#272;&#417;n giá</b></td>
    <td align="center" nowrap class="title"><b>Thành ti&#7873;n</b></td>    
	 <td align="center" nowrap class="title"><b>Ghi chú</b></td>  
  </tr>
  
  <?php
			$page = $_GET["page"];
        	$sql="select * from orderdetail where ordersdetail_ordersid=$orderid order by ordersdetail_id";
        	$result=mysql_query($sql,$con);
        	$i=0;
           	while(($row=mysql_fetch_array($result)))
			{
			$i++;
			if ($i%2) $color="#d5d5d5"; else $color="#e5e5e5";
			$pro=GetProductInfo($row['ordersdetail_product_id']);
  ?>
  
  <tr>
    <td bgcolor="<? echo $color; ?>" class="smallfont">
    <p align="center"><input type="checkbox" name="chk[]" value="<? echo $row['ordersdetail_id']; ?>"></td>
    <td bgcolor="<? echo $color; ?>" class="smallfont">
    <p align="center">
    <!--<a href="./?act=product_m&id=<? echo $row['products_id']; ?>&page=<? echo $page?>">Edit</a></td>-->
    <td bgcolor="<? echo $color; ?>" class="smallfont">
    <p align="center">
    <a onclick="return confirm('B&#7841;n có ch&#7855;c ch&#7855;n mu&#7889;n xoá ?');" href="./?act=orderdetail&action=del&orderid=<? echo $orderid; ?>&id=<? echo $row['ordersdetail_id']; ?>">Delete</a></td>
    <td bgcolor="<? echo $color; ?>" align="center" class="smallfont"><? echo $pro['id']; ?>&nbsp;</td>
    <td bgcolor="<? echo $color; ?>" class="smallfont"><? echo $pro['name']; ?>&nbsp;</td>
    <td bgcolor="<? echo $color; ?>" class="smallfont"><? echo $row['ordersdetail_quantity']; ?>&nbsp;</td>
    <td bgcolor="<? echo $color; ?>" class="smallfont"><? echo number_format($row['ordersdetail_price']); ?>&nbsp;</td>
    <td bgcolor="<? echo $color; ?>" class="smallfont"><? echo number_format($row['ordersdetail_quantity']*$row['ordersdetail_price']); ?>&nbsp;</td>
	<td bgcolor="<? echo $color; ?>" class="smallfont"><? echo $row_order['ghichu']; ?>&nbsp;</td>
  </tr>
  <?
              	}
  ?>
</table>
<input type="submit" value="Xóa Ch&#7885;n" name="ButDel" onclick="return confirm('B&#7841;n có ch&#7855;c ch&#7855;n mu&#7889;n xoá ?');" class="button">
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