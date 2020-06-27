<?
echo $_SESSION["session_message"];
$_SESSION["session_message"] = "";
$MAXPAGE=50;
?>
<table height="28" cellSpacing="0" cellPadding="0" width="100%" border="0">
      <tr align=center>
        <td class="title" width="100%">Danh sách sản phẩm
      </tr>
    </table>
<?
	switch ($_GET['action'])
	{
		case 'del' :
			$id = $_GET['id'];
			$pro=GetProductInfo($id);
			if ($pro)
			{
				$sql = "delete from products where id='".$id."'";
				$result = mysql_query($sql,$con);
				if ($result) 
				{
					if (file_exists("../".$pro['image'])) unlink("../".$pro['image']);
					if (file_exists("../".$pro['image_large'])) unlink("../".$pro['image_large']);

					echo "<p align=center class='err'>&#272;ã xóa thành công</p>";
				}
					else echo "<p align=center class='err'>Không th&#7875; xóa d&#7919; li&#7879;u</p>";
			}
			break;
	}
?>

<?
	if (isset($_POST['ButDel'])) {
		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			$pro=GetProductInfo($id);
			if ($pro)
			{
				@$result = mysql_query("delete from products where id='".$id."'",$con);
				if ($result) {
					$cnt++;
					if (file_exists("../".$pro['image'])) unlink("../".$pro['image']);
					if (file_exists("../".$pro['image_large'])) unlink("../".$pro['image_large']);

				}
			}
		}
		echo "<p align=center class='err'>&#272;ã xóa ".$cnt." ph&#7847;n t&#7917;</p>";
	}
	if (isset($_POST['ButGood'])) {
		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			$pro=GetProductInfo($id);
			if ($pro)
			{
				if (CountRecord("pro_good","products_id=".$pro['products_id'])<=0)
				{
					$result = mysql_query("insert into pro_good (products_id,language,pro_dateadded) values ('".$pro['products_id']."','".$pro['language']."',SYSDATE())",$con);
					if ($result) {
						$cnt++;
					}
				}
			}
		}
		echo "<p align=center class='err'>&#272;ã c&#7853;p nh&#7853;t ".$cnt." ph&#7847;n t&#7917;</p>";
	}
	if (isset($_POST['ButNew'])) {
		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			$pro=GetProductInfo($id);
			if ($pro)
			{
				if (CountRecord("pro_new","products_id=".$pro['products_id'])<=0)
				{
					$result = mysql_query("insert into pro_new (products_id,language,pro_dateadded) values ('".$pro['products_id']."','".$pro['language']."',SYSDATE())",$con);
					if ($result) {
						$cnt++;
					}
				}
			}
		}
		echo "<p align=center class='err'>&#272;ã c&#7853;p nh&#7853;t ".$cnt." ph&#7847;n t&#7917;</p>";
	}
	if (isset($_POST['ButSaleoff'])) {
		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			$pro=GetProductInfo($id);
			if ($pro)
			{
				if (CountRecord("pro_saleoff","products_id=".$pro['products_id'])<=0)
				{
					$result = mysql_query("insert into pro_saleoff (products_id,language,pro_dateadded) values ('".$pro['products_id']."','".$pro['language']."',SYSDATE())",$con);
					if ($result) {
						$cnt++;
					}
				}
			}
		}
		echo "<p align=center class='err'>&#272;ã c&#7853;p nh&#7853;t ".$cnt." ph&#7847;n t&#7917;</p>";
	}
	
	if (isset($_POST['trogia'])) {
		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			$pro=GetProductInfo($id);
			if ($pro)
			{
				@$result = mysql_query("update products set trogia=1 where id='".$id."'",$con);
				if ($result) {
					$cnt++;

				}
			}
		}
		echo "<p align=center class='err'>Đã thêm ".$cnt." sản phẩm trợ giá</p>";
	}
	
		if (isset($_POST['huytrogia'])) {
		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			$pro=GetProductInfo($id);
			if ($pro)
			{
				@$result = mysql_query("update products set trogia=0 where id='".$id."'",$con);
				if ($result) {
					$cnt++;

				}
			}
		}
		echo "<p align=center class='err'>Đã hủy ".$cnt." sản phẩm trợ giá</p>";
	}
	
	
	if (isset($_POST['sale'])) {
		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			$pro=GetProductInfo($id);
			if ($pro)
			{
				@$result = mysql_query("update products set sale=1 where id='".$id."'",$con);
				if ($result) {
					$cnt++;

				}
			}
		}
		echo "<p align=center class='err'>Đã thêm ".$cnt." sản phẩm Sale</p>";
	}
	
		if (isset($_POST['huysale'])) {
		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			$pro=GetProductInfo($id);
			if ($pro)
			{
				@$result = mysql_query("update products set sale=0 where id='".$id."'",$con);
				if ($result) {
					$cnt++;

				}
			}
		}
		echo "<p align=center class='err'>Đã hủy ".$cnt." sản phẩm Sale</p>";
	}
if (isset($_POST['noibat'])) {
		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			$pro=GetProductInfo($id);
			if ($pro)
			{
				@$result = mysql_query("update products set noibat=1 where id='".$id."'",$con);
				if ($result) {
					$cnt++;

				}
			}
		}
		echo "<p align=center class='err'>Đã thêm ".$cnt." sản phẩm nổi bật</p>";
	}
	
		if (isset($_POST['huynoibat'])) {
		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			$pro=GetProductInfo($id);
			if ($pro)
			{
				@$result = mysql_query("update products set noibat=0 where id='".$id."'",$con);
				if ($result) {
					$cnt++;

				}
			}
		}
		echo "<p align=center class='err'>Đã hủy ".$cnt." sản phẩm Nổi bật</p>";
	}

?>

<?
	$page = $_GET["page"];
	$p=0;
	if ($page!='') $p=$page;
	$where="1=1";
	//if ($_REQUEST['status']!='') $where="products_status=".$_REQUEST['status']." ";
	if ($_REQUEST['cat']!='') $where="cat=".$_REQUEST['cat'];
?>
<?
function taotrang($total,$link,$nitem,$itemcurrent,$step=10)
{	global $con;
	$ret="";
	
	$param="";
	$pages=count_page($total,$nitem);
	if ($itemcurrent>0) $ret.='<a title="&#272;&#7847;u tiên" href="'.$link.'0" class="lslink">[&lt;]</a> ';
	if ($itemcurrent>1) $ret.='<a title="V&#7873; tr&#432;&#7899;c" href="'.$link.($itemcurrent-1).'" class="lslink">[&lt;&lt;]</a> ';
	$from=($itemcurrent-$step>0?$itemcurrent-$step:0);
	$to=($itemcurrent+$step<$pages?$itemcurrent+$step:$pages);
	for ($i=$from;$i<$to;$i++)
	{
		if ($i!=$itemcurrent) $ret.='<a href="'.$link.$i.'" class="lslink">'.($i+1).'</a> ';
		else $ret.='<b>'.($i+1).'</b> ';
	}
	if (($itemcurrent<$pages-2) && ($pages>1)) $ret.='<a title="Ti&#7871;p theo" href="'.$link.($itemcurrent+1).'">[&gt;&gt;]</a> ';
	if ($itemcurrent<$pages-1) $ret.='<a title="Cu&#7889;i cùng" href="'.$link.($pages-1).'">[&gt;]</a>'; 
	return $ret;
}

	$pageindex=taotrang(CountRecord("products",$where),"./?act=product&cat=".$_REQUEST['cat']."&page=",$MAXPAGE,$page);
?>

<table cellspacing="0" cellpadding="0" width="100%">
<? if ($_REQUEST['code']==1) echo '<tr><td colspan="2" align="center" class="err">&#272;ã c&#7853;p nh&#7853;t thành công</td></tr>'; ?>
<tr>
<td style=" padding-bottom: 7px; padding-top: 7px; " class="smallfont">Trang : <? echo $pageindex; ?></td>
 
</tr>
</table>
<table cellspacing="0" cellpadding="0">
<tr>
<td class="smallfont">Tìm kiếm: </td>
<td class="smallfont">
<!-- begin tim kiem-->
<form name="form_select" method="GET" action="./?act=product">
<table id="timkiem_home" border="0" id="table21" cellspacing="0" cellpadding="0">
					<tr>
						<td style="padding-left:4px;">
<select size="1" name="cat_id">
<?
	$ms=GetListCat(17);
	echo '<option value="">[T&#7845;t c&#7843;]</option>';
	foreach ($ms as $m)
		if ($m[0]!=$_REQUEST['cat'])
			echo '<option value="'.$m[0].'">'.$m[1].'</option>';
		else
			echo '<option selected value="'.$m[0].'">'.$m[1].'</option>';
?>
	</select> 
  </td>
<td style="padding-left:0px">
<input name="keywords" type="text" id="input_timkiem" value="">
</td>
<td>
<input type="hidden" name="act" value="search">
<input type="hidden" name="index" value="search">
<input id="button_search" type="submit" name="search" value="Tìm">
</td>
</tr>
</table>
</form>
<!-- end tim kiem -->
</td>
</tr>
</table>
<form method="POST" name="frmList" action="index.php">
<input type=hidden name="page" value="<? echo $page; ?>">
<table border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#C9C9C9" width="100%" id="AutoNumber1">
  <tr >
   <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <td align=center nowrap class="title"><input type="checkbox" name="chkall" onclick="chkallClick(this);"></td>
	 <td align="center" nowrap class="title"><b>Hình</b></td>
        <td align="center" nowrap class="title"><b>Sửa</b></td>
 
 
	   <td align="center" nowrap class="title"><b>ID </b></td>
	    <td align="center" nowrap class="title"><b>Mã </b></td>
	 <td align="center" nowrap class="title"><b>Tên </b></td>

  <td align="center" nowrap class="title"><b>Giá bán </b></td>
  <td align="center" nowrap class="title"><b>Giá cũ </b></td>
  	  <td align="center" nowrap class="title"><b>BH </b></td>
	   <td align="center" nowrap class="title"><b>Event </b></td>  
  
	   <td align="center" nowrap class="title"><b>Up đề cử </b></td>
	   <td align="center" nowrap class="title"><b>Up TOP</b></td>
    <td align="center" nowrap class="title"><b>Shop</b></td>

 
 
<td align="center" nowrap class="title"><b>Danh m&#7909;c hệ thống</b></td>
<td align="center" nowrap class="title"><b>TT</b></td>
<td align="center" nowrap class="title"><b>Trạng thái</b></td>
<td align="center" nowrap class="title"><b>Ngày đăng</b></td>

  </tr>
  
  <?php
           	$sql="select * from products where $where  order by id DESC limit ".($p*$MAXPAGE).",".$MAXPAGE;
        	$result=mysql_query($sql,$con);
        	$i=0;
           	while(($row=mysql_fetch_array($result)))
			{
		   $i++;
		    if ($i%2) $color="#d5d5d5"; else $color="#e5e5e5";
 
			$cat_system=GetCatInfo($row['cat']);
	 
 	$sql_reg1=mysql_query("SELECT * FROM user_shop where user='".$row['user']."' ");
	$row_reg1=mysql_fetch_assoc($sql_reg1);
	$sql_city=mysql_query("SELECT * FROM city where id='".$row['city']."' ");
$row_city=mysql_fetch_assoc($sql_city);
  ?>
  
  <tr bgcolor="<? echo $color;?>"   class="table_a">
    <td align="center"  class="smallfont">
    <input type="checkbox" name="chk[]" value="<? echo $row['id']; ?>"></td>
		<td   class="smallfont"><a id="xemnhanhsp" href="/index1.php?home=products&views=<? echo $row['id']; ?>"> <image src="<? echo $row['image']; ?>" width="25" height="25" > </a></td>
    <td align="center"   class="smallfont">
    <a href="./?act=product_m&cat=<? echo $_REQUEST['cat']; ?>&status=<? echo $_REQUEST['status']; ?>&id=<? echo $row['id']; ?>&page=<? echo $page?>">S&#7917;a</a></td>
    
 

    <td   align="left" align="left" class="smallfont"><? echo $row['id']; ?>&nbsp;</td>
	 <td   class="smallfont"><? echo $row['code']; ?>&nbsp;</td>
	<td   class="smallfont">
	<a id="xemnhanhsp" href="/index1.php?home=products&views=<? echo $row['id']; ?>"  ><? echo $row['name']; ?></a> <?php if($row['mausac_nau']=='' &  $row['mausac_vang']=='' &  $row['mausac_trang']==''&  $row['mausac_den']==''&  $row['mausac_hong']==''&  $row['mausac_xanhla']==''&  $row['mausac_xanhnuocbien']==''&  $row['mausac_xanhngoc']==''&  $row['mausac_xanhden']==''&  $row['mausac_xam']==''&  $row['mausac_tim']==''&  $row['mausac_do']==''&  $row['mausac_cam']==''&  $row['mausac_kem']==''&  $row['mausac_xanhduong']==''&  $row['mausac_soc']==''&  $row['mausac_xanhladam']==''&  $row['mausac_hoatiet']==''&  $row['mausac_bac']==''&  $row['mausac_hongphan']=='')
{?>
<?}
else{?>
 
<?php if($row['mausac_nau']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_nau']; ?>; outline: 1px solid #ccc;" title="Nâu"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_vang']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_vang']; ?>; outline: 1px solid #ccc;" title="Vàng"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_trang']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_trang']; ?>; outline: 1px solid #ccc;" title="Trắng"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_den']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_den']; ?>; outline: 1px solid #ccc;" title="Đen"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_hong']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_hong']; ?>; outline: 1px solid #ccc;" title="Hồng"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_xanhla']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_xanhla']; ?>; outline: 1px solid #ccc;" title="Xanh lá"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_xanhnuocbien']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_xanhnuocbien']; ?>; outline: 1px solid #ccc;" title="Xanh nước biển"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_xanhngoc']=='' )
{?>
<?}
else{?>

<span style="background-color: #<? echo $row['mausac_xanhngoc']; ?>; outline: 1px solid #ccc;" title="Xanh ngọc"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_xanhden']=='' )
{?>
<?}
else{?>

<span style="background-color: #<? echo $row['mausac_xanhden']; ?>; outline: 1px solid #ccc;" title="Xanh đen"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_xam']=='' )
{?>
<?}
else{?>

<span style="background-color: #<? echo $row['mausac_xam']; ?>; outline: 1px solid #ccc;" title="Xám"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_tim']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_tim']; ?>; outline: 1px solid #ccc;" title="Tím"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_do']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_do']; ?>;outline: 1px solid #ccc;" title="Đỏ"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_cam']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_cam']; ?>;outline: 1px solid #ccc;" title="Cam"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_kem']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_kem']; ?>;outline: 1px solid #ccc;" title="Kem"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>

<?php if($row['mausac_xanhduong']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_xanhduong']; ?>;outline: 1px solid #ccc;" title="Xanh dương"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_soc']=='' )
{?>
<?}
else{?>
<span style="background: url(/images/<? echo $row['mausac_soc']; ?>) center center no-repeat; ?>;outline: 1px solid #ccc;" title="Sọc"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_xanhreu']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_xanhreu']; ?>;outline: 1px solid #ccc;" title="Xanh rêu"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_xanhladam']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_xanhladam']; ?>;outline: 1px solid #ccc;" title="Xanh lá đậm"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_hoatiet']=='' )
{?>
<?}
else{?>
<span style="background: url(/images/<? echo $row['mausac_hoatiet']; ?>) center center no-repeat;outline: 1px solid #ccc;" title="Họa tiết"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_bac']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_bac']; ?>;outline: 1px solid #ccc;" title="Bạc"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_hongphan']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_hongphan']; ?>;outline: 1px solid #ccc;" title="Hồng phấn"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>

<?}?>
<?php if($row['kichthuoc_freesize']=='' & $row['kichthuoc_1']=='' & $row['kichthuoc_2']=='' & $row['kichthuoc_3']=='' & $row['kichthuoc_4']=='' & $row['kichthuoc_5']=='' & $row['kichthuoc_6']=='' & $row['kichthuoc_7']=='' & $row['kichthuoc_8']=='' & $row['kichthuoc_9']=='' & $row['kichthuoc_10']=='' & $row['kichthuoc_11']=='' & $row['kichthuoc_12']=='' & $row['kichthuoc_S']=='' & $row['kichthuoc_M']=='' & $row['kichthuoc_L']=='' & $row['kichthuoc_XL']=='' & $row['kichthuoc_XXL']=='' & $row['kichthuoc_XS']=='' & $row['kichthuoc_XXS']=='' & $row['kichthuoc_2XL']=='' & $row['kichthuoc_3XL']=='' & $row['kichthuoc_4XL']=='' & $row['kichthuoc_5XL']=='' & $row['kichthuoc_6XL']=='' & $row['kichthuoc_25']=='' & $row['kichthuoc_26']=='' & $row['kichthuoc_27']=='' & $row['kichthuoc_28']=='' & $row['kichthuoc_29']=='' & $row['kichthuoc_30']=='' & $row['kichthuoc_31']=='' & $row['kichthuoc_32']=='' & $row['kichthuoc_33']=='' & $row['kichthuoc_34']=='' & $row['kichthuoc_35']=='' & $row['kichthuoc_36']=='' & $row['kichthuoc_37']=='' & $row['kichthuoc_38']=='' & $row['kichthuoc_39']=='' & $row['kichthuoc_40']=='' & $row['kichthuoc_41']=='' & $row['kichthuoc_42']=='' & $row['kichthuoc_43']=='' & $row['kichthuoc_44']=='' & $row['kichthuoc_45']=='' & $row['kichthuoc_46']=='' & $row['kichthuoc_47']=='')
{?>
<?}
else{?>



 
<?php if($row['kichthuoc_freesize']=='' )
{?>
<?}
else{?>
<span style="/* outline: 1px solid #ccc; */width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;/* display: block; *//* float: left; */cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="FreeSize"><? echo $row['kichthuoc_freesize']; ?></span>

<?}?>

<?php if($row['kichthuoc_1']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-1"><? echo $row['kichthuoc_1']; ?></span>
<?}?>

<?php if($row['kichthuoc_2']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-2"><? echo $row['kichthuoc_2']; ?></span>
<?}?>
<?php if($row['kichthuoc_3']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-3"><? echo $row['kichthuoc_3']; ?></span>
<?}?>
<?php if($row['kichthuoc_4']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-4"><? echo $row['kichthuoc_4']; ?></span>
<?}?>
<?php if($row['kichthuoc_5']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-5"><? echo $row['kichthuoc_5']; ?></span>
<?}?>
<?php if($row['kichthuoc_6']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding-left: 4px;padding-right: 4px;" title="Size-6"><? echo $row['kichthuoc_6']; ?></span>
<?}?>
<?php if($row['kichthuoc_7']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-7"><? echo $row['kichthuoc_7']; ?></span>
<?}?>
<?php if($row['kichthuoc_8']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-8"><? echo $row['kichthuoc_8']; ?></span>
<?}?>
<?php if($row['kichthuoc_9']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-9"><? echo $row['kichthuoc_9']; ?></span>
<?}?>
<?php if($row['kichthuoc_10']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-10"><? echo $row['kichthuoc_10']; ?></span>
<?}?>
<?php if($row['kichthuoc_11']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-11"><? echo $row['kichthuoc_11']; ?></span>
<?}?>
<?php if($row['kichthuoc_12']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-12"><? echo $row['kichthuoc_12']; ?></span>
<?}?>
<?php if($row['kichthuoc_S']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-S"><? echo $row['kichthuoc_S']; ?></span>
<?}?>
<?php if($row['kichthuoc_M']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-M"><? echo $row['kichthuoc_M']; ?></span>
<?}?>
<?php if($row['kichthuoc_L']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-L"><? echo $row['kichthuoc_L']; ?></span>
<?}?>
<?php if($row['kichthuoc_XL']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-XL"><? echo $row['kichthuoc_XL']; ?></span>
<?}?>
<?php if($row['kichthuoc_XXL']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-XXL"><? echo $row['kichthuoc_XXL']; ?></span>
<?}?>
<?php if($row['kichthuoc_XS']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-XS"><? echo $row['kichthuoc_XS']; ?></span>
<?}?>
<?php if($row['kichthuoc_XXS']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-XXS"><? echo $row['kichthuoc_XXS']; ?></span>
<?}?>
<?php if($row['kichthuoc_2XL']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-2XL"><? echo $row['kichthuoc_2XL']; ?></span>
<?}?>
<?php if($row['kichthuoc_3XL']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-3XL"><? echo $row['kichthuoc_3XL']; ?></span>
<?}?>
<?php if($row['kichthuoc_4XL']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-4XL"><? echo $row['kichthuoc_4XL']; ?></span>
<?}?>
<?php if($row['kichthuoc_5XL']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-5XL"><? echo $row['kichthuoc_5XL']; ?></span>
<?}?>
<?php if($row['kichthuoc_6XL']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-6XL"><? echo $row['kichthuoc_6XL']; ?></span>
<?}?>
<?php if($row['kichthuoc_25']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-25"><? echo $row['kichthuoc_25']; ?></span>
<?}?>
<?php if($row['kichthuoc_26']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-26"><? echo $row['kichthuoc_26']; ?></span>
<?}?>
<?php if($row['kichthuoc_27']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-27"><? echo $row['kichthuoc_27']; ?></span>
<?}?>
<?php if($row['kichthuoc_28']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-28"><? echo $row['kichthuoc_28']; ?></span>
<?}?>
<?php if($row['kichthuoc_29']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-29"><? echo $row['kichthuoc_29']; ?></span>
<?}?>
<?php if($row['kichthuoc_30']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-30"><? echo $row['kichthuoc_30']; ?></span>
<?}?>
<?php if($row['kichthuoc_31']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-31"><? echo $row['kichthuoc_31']; ?></span>
<?}?>
<?php if($row['kichthuoc_32']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-32"><? echo $row['kichthuoc_32']; ?></span>
<?}?>
<?php if($row['kichthuoc_33']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-33"><? echo $row['kichthuoc_33']; ?></span>
<?}?>
<?php if($row['kichthuoc_34']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-34"><? echo $row['kichthuoc_34']; ?></span>
<?}?>
<?php if($row['kichthuoc_35']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-35"><? echo $row['kichthuoc_35']; ?></span>
<?}?>
<?php if($row['kichthuoc_36']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-36"><? echo $row['kichthuoc_36']; ?></span>
<?}?>
<?php if($row['kichthuoc_37']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-37"><? echo $row['kichthuoc_37']; ?></span>
<?}?>
<?php if($row['kichthuoc_38']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-38"><? echo $row['kichthuoc_38']; ?></span>
<?}?>
<?php if($row['kichthuoc_39']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-39"><? echo $row['kichthuoc_39']; ?></span>
<?}?>
<?php if($row['kichthuoc_40']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-40"><? echo $row['kichthuoc_40']; ?></span>
<?}?>
<?php if($row['kichthuoc_41']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-41"><? echo $row['kichthuoc_41']; ?></span>
<?}?><?php if($row['kichthuoc_42']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-42"><? echo $row['kichthuoc_42']; ?></span>
<?}?>
<?php if($row['kichthuoc_43']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-43"><? echo $row['kichthuoc_43']; ?></span>
<?}?>
<?php if($row['kichthuoc_44']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-44"><? echo $row['kichthuoc_44']; ?></span>
<?}?>
<?php if($row['kichthuoc_45']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-45"><? echo $row['kichthuoc_45']; ?></span>
<?}?>
<?php if($row['kichthuoc_46']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-46"><? echo $row['kichthuoc_46']; ?></span>
<?}?>
<?php if($row['kichthuoc_47']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-47"><? echo $row['kichthuoc_47']; ?></span>
<?}?>


<?}?>


<?}?></td>
	<td   class="smallfont"><? echo number_format($row['price_special']); ?>&nbsp;</td>
	<td   class="smallfont"><? echo number_format($row['price']); ?>&nbsp;</td>
	<td   class="smallfont"><? echo number_format($row['baohanh']); ?>&nbsp;</td>
    <td   class="smallfont"> 
	  <a onmouseover='showtip("<div><table style=\"padding:10px;background-color:black;color:white\"><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Nổi bật: </td><td style=\"width:400px\"><?php if($row['noibat'] == '1'){?> <img src=\"/images/icon-check.png\"  /><?}else{?><img src=\"/images/icon-uncheck.png\"  /><?}?></td></tr><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Top xu hướng: </td><td style=\"width:400px\"><?php if($row['topxuhuong'] > '0'){?> <img src=\"/images/icon-check.png\"  /><?}else{?><img src=\"/images/icon-uncheck.png\"  /><?}?></td></tr><tr><td style=\"padding-right:10px;width:120px;height:20px;text-align:right\">Top khuyến mãi: </td><td style=\"width:400px\"><?php if($row['topkhuyenmai'] > '0'){?> <img src=\"/images/icon-check.png\"  /><?}else{?><img src=\"/images/icon-uncheck.png\"  /><?}?></td></tr></table></div>");' onmouseout="hidetip();"  >
<font color="red">Xem</b></font>
</a>
	
	</td>
 
	<td   class="smallfont"><? echo number_format($row['upxuhuong']); ?>&nbsp;</td>
	<td   class="smallfont"><? echo number_format($row['uptop']); ?>&nbsp;</td>
	
    <td   class="smallfont">

<a onmouseover='showtip("<div><table style=\"padding:10px;background-color:black;color:white\"><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">ID Shop: </td><td style=\"width:400px\"><? echo $row_reg1['id'];?></td></tr><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Tên Shop: </td><td style=\"width:400px\"><? echo $row_reg1['company'];?></td></tr><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Loại Shop: </td><td style=\"width:400px\"><?php if($row_reg1['level_shop'] == '0'){?><b style=\"color:red\">Shop Lửa Đỏ </b><?}else{?>Shop Thường<?}?></td></tr><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Tỉnh/TP: </td><td style=\"width:400px\"><? echo $row_city['name'];?></td></tr><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Tình trạng: </td><td style=\"width:400px\"><?php if($row_reg1['active'] == '0'){?><b style=\"color:blue\">Kích hoạt </b><?}else{?>Bị Khóa<?}?></td></tr><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Email: </td><td><? echo $row_reg1['email'];?></td></tr><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Điện thoại: </td><td><? echo $row_reg1['phone'];?></td></tr><tr><td style=\"padding-right:10px;width:110px;height:20px;text-align:right\">Ngày đăng ký: </td><td><? echo $row_reg1['re_time'];?></td></tr><tr><td style=\"padding-right:10px;width:100px;height:20px;text-align:right\">Địa chỉ: </td><td><? echo $row['address'];?></td></tr></table></div>");' onmouseout="hidetip();" href="../<? echo $row['user']; ?>" target="_blank">
<font color="blue"><? echo $row['user']; ?></b></font>
</a>
	 
	
	
	</td>
 
    <td   class="smallfont"><? echo $cat_system['name']; ?>&nbsp;</td>
		<td  class="smallfont">
		
 
		 <?php if($row['tinhtrang'] == '1'){?>
                Còn
                <?}else{?>
                Hết
                <?}?>
		
		 </td>
		 <td  class="smallfont">
		
 
		 <?php if($row['status'] == '0'){?>
                Đã duyệt
                <?}else{?>
                Hủy
                <?}?>
		
		 </td>
	<td  class="smallfont"><? echo $row['date']; ?>&nbsp;</td>

  </tr>
  <?
              	}
  ?>
</table>



<input type="hidden" name="act" value="product"><table border="0" width="100%" cellspacing="0" cellpadding="0" id="table1">
	<tr>
		<td>
<input type="submit" value="Xóa Ch&#7885;n" name="ButDel" onclick="return confirm('B&#7841;n có ch&#7855;c ch&#7855;n mu&#7889;n xoá ?');" class="button"></td>
<td align="right">
 
</td>
<td align="right">
&nbsp;&nbsp;&nbsp;
</td>


	</tr>
</table>
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