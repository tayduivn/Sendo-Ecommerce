<?
$path = "../images/link";
$pathdb = "images/link";
if (isset($_POST['butSaveLoai'])) {
	$name=$_POST['txtName'];
	$address=$_POST['txtAddress'];
	$sortorder=(int)$_POST['txtSortorder'];
	$categories_id=$_POST['ddCat'];
	$w=$_POST['w'];
	$h=$_POST['h'];
	$date=date("d-m-Y");

	$err="";
	if ($name=="") $err .=  "Xin nh&#7853;p tên website<br>";
	$err.=CheckUpload($_FILES["txtImage"],".jpg;.gif;.bmp;.png;.swf",500*1024,$_POST['id']==''?1:0);
	
	if ($err=='')
	{
		if (!empty($_POST['id'])) {
			$oldid = $_POST['id'];
			$sql = "update ads set name='".$name."',link='".$address."',cat_id='".$categories_id."',w='".$w."',h='".$h."', thutu='".$sortorder."' where id='".$oldid."'";
		}else {
			$sql = "insert into ads (name, link, date, cat_id, w, h, thutu) values ('".$name."','".$address."','".$date."','".$categories_id."','".$w."','".$h."','".$sortorder."')";
		}
		if (mysql_query($sql,$con)) {
			if(empty($_POST['id'])) $oldid = mysql_insert_id();

			$sqlUpdateField = "";
			
			$extsmall=GetFileExtention($_FILES['txtImage']['name']);
			if (MakeUpload($_FILES['txtImage'],"$path/link_home_s$oldid$extsmall"))
			{
				@chmod("$path/link_home_s$oldid$extsmall", 0777);
				$sqlUpdateField = " image='$pathdb/link_home_s$oldid$extsmall' ";
			}
			if($sqlUpdateField)
			{
				$sqlUpdate = "update ads set $sqlUpdateField where id='".$oldid."'";
				mysql_query($sqlUpdate,$con);
			}
		}	
		else {
			$err =  "<p align=center class='err'>Không th&#7875; c&#7853;p nh&#7853;t</p>";
		}
  	}
  	if ($err=='') echo '<script>window.location="index.php?act=link_website&page='.$_REQUEST['page'].'&code=1"</script>';
  	else echo '<p align=center class="err" style="line-height: 150%">'.$err.'</p>';
} 
?>

<?
	if (isset($_GET['id'])) {
		$oldid=$_GET['id'];
		$page = $_GET['page'];
		$sql = "select * from ads where id='".$oldid."' limit 1";
		if ($result = mysql_query($sql,$con)) {
			$row=mysql_fetch_array($result);
			$name=$row['name'];
			$address=$row['link'];
			$image=$row['image'];
			//$imagelarge=$row['link_websites_imglarge'];
			$sortorder=$row['thutu'];
			$categories_id = $row['cat_id'];
		}
	}
?>

<form method="post" name="FormLoaiSP" enctype="multipart/form-data" action="index.php">
<input type="hidden" name="act" value="link_website_m">
<input type="hidden" name="page" value="<? echo $_REQUEST['page']; ?>">
<input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>">
<? 
if ($image!='')
{
?>
<table cellspacing="0" cellpadding="0" width="100%">
<tr>
	<td align="center">
	<img border="0" src="<? echo $image; ?>">
	</td>
</tr>
</table>
<?
}
?>

<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" class="title" align="center" height="20">Thêm m&#7899;i / C&#7853;p nh&#7853;t 
	: Liên k&#7871; website</td>
  </tr>
  <tr>
    <td width="45%">
    <table border="0" cellpadding="2" bordercolor="#111111" width="100%" id="AutoNumber2" cellspacing="0">
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Tên website</td>
        <td width="1%" class="smallfont" align="center">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $name; ?>" TYPE="text" NAME="txtName" CLASS=textbox size="34"></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">&#272;&#7883;a ch&#7881; website</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $address; ?>" TYPE="text" NAME="txtAddress" CLASS=textbox size="34"></td>
      </tr>
	        <tr>
        <td width="15%" class="smallfont">
        <p align="right">WIDTH</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $row['w']; ?>" TYPE="text" NAME="w" CLASS=textbox size="34"></td>
      </tr>
	        <tr>
        <td width="15%" class="smallfont">
        <p align="right">HEIGHT</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $row['h']; ?>" TYPE="text" NAME="h" CLASS=textbox size="34"></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Hình (logo)</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT TYPE="file" NAME="txtImage" CLASS=textbox size="34"></td>
      </tr>
	        <tr>
        <td width="15%" class="smallfont" align="right">
        Thu&#7897;c m&#7909;c</td>
        <td width="1%" class="smallfont" align="center">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<select size="1" name="ddCat">
		<?php if($categories_id=='0')
		{?>
       <option value="0" selected>Trang chủ header</option>
       <option value="1000000009">Trang chủ bottom</option>
	   <option value="1000000000">Trang chủ right 1</option>
	   <option value="1000000001">Trang chủ right 2</option>
	   <option value="1000000002">Rao vặt</option>
	   <option value="1000000003">Gian hàng</option>
	   <option value="1000000004">Tuyển dụng</option>
	   <option value="1000000005">Danh bạ doanh nghiệp</option>
	   <option value="1000000006">Chi tiết sản phẩm</option>
	   <option value="1000000007">Products relate</option>
	   <option value="1000000008">Products Vip/New</option>
	   <?}elseif($categories_id=='1000000000'){?>
	   <option value="0" >Trang chủ header</option>
       <option value="1000000009">Trang chủ bottom</option>
	   <option value="1000000000" selected>Trang chủ right 1</option>
	   <option value="1000000001">Trang chủ right 2</option>
	   <option value="1000000002">Rao vặt</option>
	   <option value="1000000003">Gian hàng</option>
	   <option value="1000000004">Tuyển dụng</option>
	   <option value="1000000005">Danh bạ doanh nghiệp</option>
	   <option value="1000000006">Chi tiết sản phẩm</option>
	   <option value="1000000007">Products relate</option>
	   <option value="1000000008">Products Vip/New</option>
	   <?}elseif($categories_id=='1000000001'){?>
	   <option value="0" >Trang chủ header</option>
       <option value="1000000009">Trang chủ bottom</option>
	   <option value="1000000000" >Trang chủ right 1</option>
	   <option value="1000000001" selected>Trang chủ right 2</option>
	   <option value="1000000002">Rao vặt</option>
	   <option value="1000000003">Gian hàng</option>
	   <option value="1000000004">Tuyển dụng</option>
	   <option value="1000000005">Danh bạ doanh nghiệp</option>
	   <option value="1000000006">Chi tiết sản phẩm</option>
	   <option value="1000000007">Products relate</option>
	   <option value="1000000008">Products Vip/New</option>
	   <?}elseif($categories_id=='1000000002'){?>
	   <option value="0" >Trang chủ header</option>
       <option value="1000000009">Trang chủ bottom</option>
	   <option value="1000000000" >Trang chủ right 1</option>
	   <option value="1000000001" >Trang chủ right 2</option>
	   <option value="1000000002" selected>Rao vặt</option>
	   <option value="1000000003">Gian hàng</option>
	   <option value="1000000004">Tuyển dụng</option>
	   <option value="1000000005">Danh bạ doanh nghiệp</option>
	   <option value="1000000006">Chi tiết sản phẩm</option>
	   <option value="1000000007">Products relate</option>
	   <option value="1000000008">Products Vip/New</option>
	   <?}elseif($categories_id=='1000000003'){?>
       <option value="1000000009">Trang chủ bottom</option>
	   <option value="0" >Trang chủ header</option>
	   <option value="1000000000" >Trang chủ right 1</option>
	   <option value="1000000001" >Trang chủ right 2</option>
	   <option value="1000000002" >Rao vặt</option>
	   <option value="1000000003" selected>Gian hàng</option>
	   <option value="1000000004">Tuyển dụng</option>
	   <option value="1000000005">Danh bạ doanh nghiệp</option>
	   <option value="1000000006">Chi tiết sản phẩm</option>
	   <option value="1000000007">Products relate</option>
	   <option value="1000000008">Products Vip/New</option>
	   <?}elseif($categories_id=='1000000004'){?>
	   <option value="0" >Trang chủ header</option>
       <option value="1000000009">Trang chủ bottom</option>
	   <option value="1000000000" >Trang chủ right 1</option>
	   <option value="1000000001" >Trang chủ right 2</option>
	   <option value="1000000002" >Rao vặt</option>
	   <option value="1000000003" >Gian hàng</option>
	   <option value="1000000004" selected>Tuyển dụng</option>
	   <option value="1000000005">Danh bạ doanh nghiệp</option>
	   <option value="1000000006">Chi tiết sản phẩm</option>
	   <option value="1000000007">Products relate</option>
	   <option value="1000000008">Products Vip/New</option>
	   <?}elseif($categories_id=='1000000005'){?>
       <option value="1000000009">Trang chủ bottom</option>
	   <option value="0" >Trang chủ header</option>
	   <option value="1000000000" >Trang chủ right 1</option>
	   <option value="1000000001" >Trang chủ right 2</option>
	   <option value="1000000002" >Rao vặt</option>
	   <option value="1000000003" >Gian hàng</option>
	   <option value="1000000004" >Tuyển dụng</option>
	   <option value="1000000005" selected>Danh bạ doanh nghiệp</option>
	   <option value="1000000006">Chi tiết sản phẩm</option>
	   <option value="1000000007">Products relate</option>
	   <option value="1000000008">Products Vip/New</option>
	   <?}elseif($categories_id=='1000000006'){?>
	   <option value="0" >Trang chủ header</option>
       <option value="1000000009">Trang chủ bottom</option>
	   <option value="1000000000" >Trang chủ right 1</option>
	   <option value="1000000001" >Trang chủ right 2</option>
	   <option value="1000000002" >Rao vặt</option>
	   <option value="1000000003" >Gian hàng</option>
	   <option value="1000000004" >Tuyển dụng</option>
	   <option value="1000000005" >Danh bạ doanh nghiệp</option>
	   <option value="1000000006" selected>Chi tiết sản phẩm</option>
	   <option value="1000000007">Products relate</option>
	   <option value="1000000008">Products Vip/New</option>
	   <?}elseif($categories_id=='1000000007'){?>
	   <option value="0" >Trang chủ header</option>
       <option value="1000000009">Trang chủ bottom</option>
	   <option value="1000000000" >Trang chủ right 1</option>
	   <option value="1000000001" >Trang chủ right 2</option>
	   <option value="1000000002" >Rao vặt</option>
	   <option value="1000000003" >Gian hàng</option>
	   <option value="1000000004" >Tuyển dụng</option>
	   <option value="1000000005" >Danh bạ doanh nghiệp</option>
	   <option value="1000000006" >Chi tiết sản phẩm</option>
	   <option value="1000000007" selected>Products relate</option>
	   <option value="1000000008">Products Vip/New</option>
	   <?}elseif($categories_id=='1000000008'){?>
	   <option value="0" >Trang chủ header</option>
       <option value="1000000009">Trang chủ bottom</option>
	   <option value="1000000000" >Trang chủ right 1</option>
	   <option value="1000000001" >Trang chủ right 2</option>
	   <option value="1000000002" >Rao vặt</option>
	   <option value="1000000003" >Gian hàng</option>
	   <option value="1000000004" >Tuyển dụng</option>
	   <option value="1000000005" >Danh bạ doanh nghiệp</option>
	   <option value="1000000006" >Chi tiết sản phẩm</option>
	   <option value="1000000007">Products relate</option>
	   <option value="1000000008" selected>Products Vip/New</option>
       <?}elseif($categories_id=='1000000009'){?>
	   <option value="0" >Trang chủ header</option>
       <option value="1000000009" selected>Trang chủ bottom</option>
	   <option value="1000000000" >Trang chủ right 1</option>
	   <option value="1000000001" >Trang chủ right 2</option>
	   <option value="1000000002" >Rao vặt</option>
	   <option value="1000000003" >Gian hàng</option>
	   <option value="1000000004" >Tuyển dụng</option>
	   <option value="1000000005" >Danh bạ doanh nghiệp</option>
	   <option value="1000000006" >Chi tiết sản phẩm</option>
	   <option value="1000000007">Products relate</option>
	   <option value="1000000008">Products Vip/New</option>
	   <?}else{?>
	   <option value="0" >Trang chủ header</option>
       <option value="1000000009">Trang chủ bottom</option>
	   <option value="1000000000" >Trang chủ right 1</option>
	   <option value="1000000001" >Trang chủ right 2</option>
	   <option value="1000000002" >Rao vặt</option>
	   <option value="1000000003" >Gian hàng</option>
	   <option value="1000000004" >Tuyển dụng</option>
	   <option value="1000000005" >Danh bạ doanh nghiệp</option>
	   <option value="1000000006" >Chi tiết sản phẩm</option>
	   <option value="1000000007">Products relate</option>
	   <option value="1000000008">Products Vip/New</option>
	   <?}?>
	   <?
		$cats=GetListCat(17);
		foreach ($cats as $cat)
		{
			if ($cat[0]==$categories_id)
				echo "<option value=".$cat[0]." selected>".$cat[1]."</option>";
			else
				echo "<option value=".$cat[0].">".$cat[1]."</option>";
		}
?>		
		</select></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont" align="right">
        Th&#7913; t&#7921; s&#7855;p x&#7871;p</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $sortorder; ?>" TYPE="text" NAME="txtSortorder" CLASS=textbox size="8"> 
		</td>
      </tr>

      <tr>
        <td width="15%" class="smallfont">
		<p align="right">
		<INPUT TYPE="submit" NAME="butSaveLoai" VALUE="C&#7853;p nh&#7853;t" CLASS=button>&nbsp;</td>
        <td width="1%" class="smallfont" align="center">
		&nbsp;</td>
        <td width="83%" class="smallfont"><p align="left">&nbsp;<INPUT TYPE="reset" CLASS=button value="Nh&#7853;p l&#7841;i"></td>
      </tr>
    </table>
    </td>
  </tr>
  </table>
</form>