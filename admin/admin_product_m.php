<?
//Check user's Browser
if(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE"))
	echo "<script language=JavaScript src='../inv/scripts/editor.js'></script>";
else
	echo "<script language=JavaScript src='../inv/scripts/moz/editor.js'></script>";
?>
<script type="text/javascript" src="/quantri/js/jquery-upload.js"></script>
<script type="text/javascript">

	
$(document).ready(function(){

var id = 1;

$('.thumb').each(
   function() { 
     $(this).attr('id', 'thumb' + id); 
	id++;

	new AjaxUpload($(this).attr('id'), {
		action: '/quantri/upload-admin.php?fieldname=image'+$(this).attr('id'),
		name: 'image'+$(this).attr('id'), // name: 'image'+$(this).attr('id'),
		onSubmit: function(file, extension) {
		
			var targetid = this._settings.name.replace("imagethumb", "");
		
			if (!(extension && /^(jpg|png|jpeg|gif)$/i.test(extension))){
                        // extension is not allowed
                        alert('Error: invalid file extension');
                        // cancel upload
                        return false;
                }
			else {
				
				$('img#thumb'+targetid).closest('div.preview').addClass('loading');
			}
		},
		onComplete: function(file, response) {

			var targetid = this._settings.name.replace("imagethumb", "");
			
			$('img#thumb'+targetid).load(function(){
				$('img#thumb'+targetid).closest('div.preview').removeClass('loading');
				$('img#thumb'+targetid).unbind();
			});
			$('img#thumb'+targetid).attr('src', response);
			$('input#imagefield'+targetid).remove();
			$('img#thumb'+targetid).after('<input class="thumbfield" type="hidden" name="imagefield'+targetid+'" id="imagefield'+targetid+'" value="'+response+'" />');

		}
	});
});	

});



</script>
<script>
function submitForm()
	{
	document.forms.FormLoaiSP.elements.txtDesc.value = oEdit1.getHTMLBody();
        document.forms.FormLoaiSP.elements.txtDescen.value = oEdit2.getHTMLBody();
	document.forms.FormLoaiSP.submit();
	}
</script>

<?
$path = "../images/products";
$pathdb = "images/products";
if (isset($_POST['butSaveLoai'])) {
	$code=$_POST['code'];
	$name=$_POST['name'];	
	$nguoimua=$_POST['nguoimua'];	
	$view=$_POST['view'];
	
	$baohanh=$_POST['baohanh'];
	$status=$_POST['status'];
	$noibat=$_POST['noibat'];
	$tinhtrang=$_POST['tinhtrang'];
	$khoiluong=$_POST['khoiluong'];
	$uptop=$_POST['uptop'];
	$upxuhuong=$_POST['upxuhuong'];
	$topxuhuong=$_POST['topxuhuong'];	
	$topkhuyenmai=$_POST['topkhuyenmai'];
	
	 $mausac_nau = ($_POST['mausac_nau']!=''?"804000":"");
	 $mausac_vang = ($_POST['mausac_vang']!=''?"ffff00":"");
	 $mausac_trang = ($_POST['mausac_trang']!=''?"ffffff":"");
	 $mausac_den = ($_POST['mausac_den']!=''?"000002":"");
	 $mausac_hong = ($_POST['mausac_hong']!=''?"ff00ff":"");
	 $mausac_xanhla = ($_POST['mausac_xanhla']!=''?"20ff00":"");
	 $mausac_xanhnuocbien = ($_POST['mausac_xanhnuocbien']!=''?"2080ff":"");
	 $mausac_xanhngoc = ($_POST['mausac_xanhngoc']!=''?"20ffff":"");
	 $mausac_xanhden = ($_POST['mausac_xanhden']!=''?"112c4e":"");
 $mausac_xam = ($_POST['mausac_xam']!=''?"999999":"");
  $mausac_tim = ($_POST['mausac_tim']!=''?"800080":"");
   $mausac_do = ($_POST['mausac_do']!=''?"ff2000":"");
    $mausac_cam = ($_POST['mausac_cam']!=''?"ff8040":"");
	 $mausac_kem = ($_POST['mausac_kem']!=''?"fef2ce":"");
	 $mausac_xanhduong = ($_POST['mausac_xanhduong']!=''?"2522c5":"");
	  $mausac_soc = ($_POST['mausac_soc']!=''?"mul-color.gif":"");
	   $mausac_xanhladam = ($_POST['mausac_xanhladam']!=''?"007000":"");
	   $mausac_hoatiet = ($_POST['mausac_hoatiet']!=''?"floral.jpg":"");
	   $mausac_bac = ($_POST['mausac_bac']!=''?"cccccc":"");
	   $mausac_hongphan = ($_POST['mausac_hongphan']!=''?"ffc2cb":"");
	   
$kichthuoc_freesize = ($_POST['kichthuoc_freesize']!=''?"freesize":"");
$kichthuoc_1 = ($_POST['kichthuoc_1']!=''?"1":"");
$kichthuoc_2 = ($_POST['kichthuoc_2']!=''?"2":"");
$kichthuoc_3 = ($_POST['kichthuoc_3']!=''?"3":"");
$kichthuoc_4 = ($_POST['kichthuoc_4']!=''?"4":"");
$kichthuoc_5 = ($_POST['kichthuoc_5']!=''?"5":"");
$kichthuoc_6 = ($_POST['kichthuoc_6']!=''?"6":"");
$kichthuoc_7 = ($_POST['kichthuoc_7']!=''?"7":"");
$kichthuoc_8 = ($_POST['kichthuoc_8']!=''?"8":"");
$kichthuoc_9 = ($_POST['kichthuoc_9']!=''?"9":"");
$kichthuoc_10 = ($_POST['kichthuoc_10']!=''?"10":"");
$kichthuoc_11 = ($_POST['kichthuoc_11']!=''?"11":"");
$kichthuoc_12 = ($_POST['kichthuoc_12']!=''?"12":"");
$kichthuoc_S = ($_POST['kichthuoc_S']!=''?"S":"");
$kichthuoc_M = ($_POST['kichthuoc_M']!=''?"M":"");
$kichthuoc_L = ($_POST['kichthuoc_L']!=''?"L":"");
$kichthuoc_XL = ($_POST['kichthuoc_XL']!=''?"XL":"");
$kichthuoc_XXL = ($_POST['kichthuoc_XXL']!=''?"XXL":"");
$kichthuoc_XS = ($_POST['kichthuoc_XS']!=''?"XS":"");
$kichthuoc_XXS = ($_POST['kichthuoc_XXS']!=''?"XXS":"");
$kichthuoc_2XL = ($_POST['kichthuoc_2XL']!=''?"2XL":"");
$kichthuoc_3XL = ($_POST['kichthuoc_3XL']!=''?"3XL":"");
$kichthuoc_4XL = ($_POST['kichthuoc_4XL']!=''?"4XL":"");
$kichthuoc_5XL = ($_POST['kichthuoc_5XL']!=''?"5XL":"");
$kichthuoc_6XL = ($_POST['kichthuoc_6XL']!=''?"6XL":"");
$kichthuoc_25 = ($_POST['kichthuoc_25']!=''?"25":"");
$kichthuoc_26 = ($_POST['kichthuoc_26']!=''?"26":"");
$kichthuoc_27 = ($_POST['kichthuoc_27']!=''?"27":"");
$kichthuoc_28 = ($_POST['kichthuoc_28']!=''?"28":"");
$kichthuoc_29 = ($_POST['kichthuoc_29']!=''?"29":"");
$kichthuoc_30 = ($_POST['kichthuoc_30']!=''?"30":"");
$kichthuoc_31 = ($_POST['kichthuoc_31']!=''?"31":"");
$kichthuoc_32 = ($_POST['kichthuoc_32']!=''?"32":"");
$kichthuoc_33 = ($_POST['kichthuoc_33']!=''?"33":"");
$kichthuoc_34 = ($_POST['kichthuoc_34']!=''?"34":"");
$kichthuoc_35 = ($_POST['kichthuoc_35']!=''?"35":"");
$kichthuoc_36 = ($_POST['kichthuoc_36']!=''?"36":"");
$kichthuoc_37 = ($_POST['kichthuoc_37']!=''?"37":"");
$kichthuoc_38 = ($_POST['kichthuoc_38']!=''?"38":"");
$kichthuoc_39 = ($_POST['kichthuoc_39']!=''?"39":"");
$kichthuoc_40 = ($_POST['kichthuoc_40']!=''?"40":"");
$kichthuoc_41 = ($_POST['kichthuoc_41']!=''?"41":"");
$kichthuoc_42 = ($_POST['kichthuoc_42']!=''?"42":"");
$kichthuoc_43 = ($_POST['kichthuoc_43']!=''?"43":"");
$kichthuoc_44 = ($_POST['kichthuoc_44']!=''?"44":"");
$kichthuoc_45 = ($_POST['kichthuoc_45']!=''?"45":"");
$kichthuoc_46 = ($_POST['kichthuoc_46']!=''?"46":"");
$kichthuoc_47 = ($_POST['kichthuoc_47']!=''?"47":"");
	
	$user=$_POST['user'];
	$price=(int)$_POST['txtPrice'];
	$priceen=(int)$_POST['txtPriceen'];
	$shortdesc=$_POST['txtShortDesc'];
	$desc=$_POST['txtDesc'];
	$cat=$_POST['cat'];
	$trogia=$_POST['trogia'];
	$upnoibat=$_POST['upnoibat'];
	$upkhuyenmai=$_POST['upkhuyenmai'];
	$upvt6=$_POST['upvt6'];
	$tukhoaseo=$_POST['tukhoaseo'];
	$tieudeseo=$_POST['tieudeseo'];
	$motaseo=$_POST['motaseo'];
	$link=$_POST['link'];
	$imageadmin=$_POST['imagefield1'];
date_default_timezone_set("Asia/Ho_Chi_Minh");
	$date = date("d-m-Y H:i:s");	
	$sort = $_POST['txtSortOrder'];

	$catinfo=GetCategoryInfo($categories_id);
	$err="";
	if ($name=="") $err .=  "Xin nh&#7853;p tên s&#7843;n ph&#7849;m <br>";
	$err.=CheckUpload($_FILES["txtImage"],".jpg;.gif;.png;.bmp",5000*1024,$_POST['id']==''?1:0);
	$err.=CheckUpload($_FILES["txtImageLarge"],".jpg;.gif;.png;.bmp",5000*1024,0);

	if ($err=='')
	{
	if (!empty($_POST['id'])) {
			$oldid = $_POST['id'];
			$sql = "update products set date='".$date."',image='".$imageadmin."',tukhoaseo='".$tukhoaseo."',tieudeseo='".$tieudeseo."',motaseo='".$motaseo."',kichthuoc_freesize='".$kichthuoc_freesize."',kichthuoc_1='".$kichthuoc_1."',kichthuoc_2='".$kichthuoc_2."',kichthuoc_3='".$kichthuoc_3."',kichthuoc_4='".$kichthuoc_4."',kichthuoc_5='".$kichthuoc_5."',kichthuoc_6='".$kichthuoc_6."',kichthuoc_7='".$kichthuoc_7."',kichthuoc_8='".$kichthuoc_8."',kichthuoc_9='".$kichthuoc_9."',kichthuoc_10='".$kichthuoc_10."',kichthuoc_11='".$kichthuoc_11."',kichthuoc_12='".$kichthuoc_12."',kichthuoc_S='".$kichthuoc_S."',kichthuoc_M='".$kichthuoc_M."',kichthuoc_L='".$kichthuoc_L."',kichthuoc_XL='".$kichthuoc_XL."',kichthuoc_XXL='".$kichthuoc_XXL."',kichthuoc_XS='".$kichthuoc_XS."',kichthuoc_XXS='".$kichthuoc_XXS."',kichthuoc_2XL='".$kichthuoc_2XL."',kichthuoc_3XL='".$kichthuoc_3XL."',kichthuoc_4XL='".$kichthuoc_4XL."',kichthuoc_5XL='".$kichthuoc_5XL."',kichthuoc_6XL='".$kichthuoc_6XL."',kichthuoc_25='".$kichthuoc_25."',kichthuoc_26='".$kichthuoc_26."',kichthuoc_27='".$kichthuoc_27."',kichthuoc_28='".$kichthuoc_28."',kichthuoc_29='".$kichthuoc_29."',kichthuoc_30='".$kichthuoc_30."',kichthuoc_31='".$kichthuoc_31."',kichthuoc_32='".$kichthuoc_32."',kichthuoc_33='".$kichthuoc_33."',kichthuoc_34='".$kichthuoc_34."',kichthuoc_35='".$kichthuoc_35."',kichthuoc_36='".$kichthuoc_36."',kichthuoc_37='".$kichthuoc_37."',kichthuoc_38='".$kichthuoc_38."',kichthuoc_39='".$kichthuoc_39."',kichthuoc_40='".$kichthuoc_40."',kichthuoc_41='".$kichthuoc_41."',kichthuoc_42='".$kichthuoc_42."',kichthuoc_43='".$kichthuoc_43."',kichthuoc_44='".$kichthuoc_44."',kichthuoc_45='".$kichthuoc_45."',kichthuoc_46='".$kichthuoc_46."',kichthuoc_47='".$kichthuoc_47."', mausac_nau='".$mausac_nau."',mausac_vang='".$mausac_vang."',mausac_trang='".$mausac_trang."',mausac_den='".$mausac_den."',mausac_hong='".$mausac_hong."',mausac_xanhla='".$mausac_xanhla."',mausac_xanhnuocbien='".$mausac_xanhnuocbien."',mausac_xanhngoc='".$mausac_xanhngoc."',mausac_xanhden='".$mausac_xanhden."',mausac_xam='".$mausac_xam."',mausac_tim='".$mausac_tim."',mausac_do='".$mausac_do."',mausac_cam='".$mausac_cam."',mausac_kem='".$mausac_kem."',mausac_xanhduong='".$mausac_xanhduong."',mausac_soc='".$mausac_soc."',mausac_xanhladam='".$mausac_xanhladam."',mausac_hoatiet='".$mausac_hoatiet."',mausac_bac='".$mausac_bac."',mausac_hongphan='".$mausac_hongphan."', baohanh='".$baohanh."',status='".$status."',noibat='".$noibat."',tinhtrang='".$tinhtrang."',khoiluong='".$khoiluong."',uptop='".$uptop."',upxuhuong='".$upxuhuong."',topxuhuong='".$topxuhuong."',topkhuyenmai='".$topkhuyenmai."',code='".$code."', name='".$name."', nguoimua='".$nguoimua."', view='".$view."', user='".$user."', price='".$price."',price_special='".$priceen."', short='".$shortdesc."', content='".$desc."', cat='".$cat."', upnoibat='".$upnoibat."', upkhuyenmai='".$upkhuyenmai."', upvt6='".$upvt6."' where id='".$oldid."'";
		}else {
			$sql = "insert into products (city,code, name, image, price, price_special, short, content, cat, tinhtrang,khoiluong,baohanh, date, user,tukhoaseo,tieudeseo, motaseo,company,phone,address,mausac_nau,mausac_vang,mausac_trang,mausac_den,mausac_hong,mausac_xanhla,mausac_xanhnuocbien,mausac_xanhngoc  ,mausac_xanhden ,mausac_xam ,mausac_tim ,mausac_do ,mausac_cam ,mausac_kem ,mausac_xanhduong ,mausac_soc ,mausac_xanhladam ,mausac_hoatiet ,mausac_bac ,mausac_hongphan,kichthuoc_freesize,kichthuoc_1,kichthuoc_2 ,kichthuoc_3 ,kichthuoc_4 ,kichthuoc_5 ,kichthuoc_6 ,kichthuoc_7 ,kichthuoc_8 ,kichthuoc_9 ,kichthuoc_10 ,kichthuoc_11 ,kichthuoc_12 ,kichthuoc_S ,kichthuoc_M ,kichthuoc_L ,kichthuoc_XL ,kichthuoc_XXL ,kichthuoc_XS ,kichthuoc_XXS ,kichthuoc_2XL ,kichthuoc_3XL ,kichthuoc_4XL ,kichthuoc_5XL ,kichthuoc_6XL ,kichthuoc_25 ,kichthuoc_26 ,kichthuoc_27 ,kichthuoc_28 ,kichthuoc_29 ,kichthuoc_30 ,kichthuoc_31 ,kichthuoc_32 ,kichthuoc_33 ,kichthuoc_34 ,kichthuoc_35 ,kichthuoc_36 ,kichthuoc_37 ,kichthuoc_38 ,kichthuoc_39 ,kichthuoc_40 ,kichthuoc_41 ,kichthuoc_42 ,kichthuoc_43 ,kichthuoc_44 ,kichthuoc_45 ,kichthuoc_46 ,kichthuoc_47) values ('".$citymoi."','".$code."','".$name."','".$imageadmin."','".$price."','".$priceen."','".$shortdesc."','".$desc."','".$cat."','".$tinhtrang."','".$khoiluong."','".$baohanh."','".$date."','".$user."', '".$tukhoaseo."', '".$tieudeseo."', '".$motaseo."', '".$company."', '".$phone."', '".$address."','".$mausac_nau."', '".$mausac_vang."', '".$mausac_trang."', '".$mausac_den."', '".$mausac_hong."', '".$mausac_xanhla."', '".$mausac_xanhnuocbien."', '".$mausac_xanhngoc."', '".$mausac_xanhden."', '".$mausac_xam."', '".$mausac_tim."', '".$mausac_do."', '".$mausac_cam."', '".$mausac_kem."', '".$mausac_xanhduong."', '".$mausac_soc."', '".$mausac_xanhladam."', '".$mausac_hoatiet."', '".$mausac_bac."', '".$mausac_hongphan."', '".$kichthuoc_freesize."', '".$kichthuoc_1."', '".$kichthuoc_2."', '".$kichthuoc_3."', '".$kichthuoc_4."', '".$kichthuoc_5."', '".$kichthuoc_6."', '".$kichthuoc_7."', '".$kichthuoc_8."', '".$kichthuoc_9."', '".$kichthuoc_10."', '".$kichthuoc_11."', '".$kichthuoc_12."', '".$kichthuoc_S."', '".$kichthuoc_M."', '".$kichthuoc_L."', '".$kichthuoc_XL."', '".$kichthuoc_XXL."', '".$kichthuoc_XS."', '".$kichthuoc_XXS."', '".$kichthuoc_2XL."', '".$kichthuoc_3XL."', '".$kichthuoc_4XL."', '".$kichthuoc_5XL."', '".$kichthuoc_6XL."', '".$kichthuoc_25."', '".$kichthuoc_26."', '".$kichthuoc_27."', '".$kichthuoc_28."', '".$kichthuoc_29."', '".$kichthuoc_30."', '".$kichthuoc_31."', '".$kichthuoc_32."', '".$kichthuoc_33."', '".$kichthuoc_34."', '".$kichthuoc_35."', '".$kichthuoc_36."', '".$kichthuoc_37."', '".$kichthuoc_38."', '".$kichthuoc_39."', '".$kichthuoc_40."', '".$kichthuoc_41."', '".$kichthuoc_42."', '".$kichthuoc_43."', '".$kichthuoc_44."', '".$kichthuoc_45."', '".$kichthuoc_46."', '".$kichthuoc_47."')";
		}
		//echo $sql;
		//exit();
		if (mysql_query($sql,$con)) 
		{
			if(empty($_POST['id'])) {
				$oldid = mysql_insert_id();
				}
		
			$sqlUpdateField = "";
			
			$extsmall=GetFileExtention($_FILES['txtImage']['name']);
			if (MakeUpload($_FILES['txtImage'],"$path/product_s$oldid$extsmall"))
			{
				@chmod("$path/product_s$oldid$extsmall", 0777);
				$sqlUpdateField = " image='$pathdb/product_s$oldid$extsmall' ";
			}

			$extlarge=GetFileExtention($_FILES['txtImageLarge']['name']);
			if (MakeUpload($_FILES['txtImageLarge'],"$path/product_l$oldid$extlarge"))
			{
				@chmod("$path/product_l$oldid$extlarge", 0777);
				if($sqlUpdateField != "") $sqlUpdateField .= ",";
				$sqlUpdateField .= " image_large='$pathdb/product_l$oldid$extlarge' ";
			}
			if($sqlUpdateField!='')
			{
				$sqlUpdate = "update products set $sqlUpdateField where id='".$oldid."'";
				mysql_query($sqlUpdate,$con);
			}
		}	
		else {
			$err =  "Không th&#7875; c&#7853;p nh&#7853;t";
		}
  	}

  	if ($err=='') echo '<script>window.location="?act=product_m&cat=&status&id='.$_REQUEST['id'].'&page='.$_REQUEST['page'].'&code=1"</script>';
  	else echo " ";
} else {
?>
<?php
$sql_config_user9999=mysql_query("SELECT * FROM user_shop where user='".$_REQUEST['user']."'");
$row_config_user9999=mysql_fetch_assoc($sql_config_user9999);
$company = $row_config_user9999['company'];
$phone = $row_config_user9999['phone'];
$address = $row_config_user9999['address'];
$sql_config_user=mysql_query("SELECT * FROM config_user where id=1");
$row_config_user=mysql_fetch_assoc($sql_config_user);
$sql_pro_config=mysql_query("SELECT * FROM products where user='".$_REQUEST['user']."'");
$toalt_pro=mysql_num_rows($sql_pro_config);
$citymoi = $row_config_user9999['city'];
?>
<?
	if (isset($_GET['id'])) {
		$oldid=$_GET['id'];
		$page = $_GET['page'];
		$sql = "select * from products where id='".$oldid."'";
		if ($result = mysql_query($sql,$con)) {
			$row=mysql_fetch_array($result);
			$code=$row['code'];
			$name=$row['name'];
			$user=$row['user'];
			$status=$row['status'];
			$image=$row['image'];
			$categories_id = $row['cat_mem'];
			$imagelarge=$row['image_large'];
			$price=$row['price'];
			$priceen=$row['price_special'];
			$shortdesc=$row['short'];
			$desc1=$row['content'];
			$provider_id=$row['cat'];
			$sort = $row['thutu'];
			$upnoibat = $row['upnoibat'];
			$upkhuyenmai = $row['upkhuyenmai'];
			$upvt6 = $row['upvt6'];
			$link = $row['trogia_link'];
			
				$mausac_nau=$row['mausac_nau'];
			$mausac_vang=$row['mausac_vang'];
			$mausac_trang=$row['mausac_trang'];
			$mausac_den=$row['mausac_den'];
			$mausac_hong=$row['mausac_hong'];
			$mausac_xanhla=$row['mausac_xanhla'];
			$mausac_xanhnuocbien=$row['mausac_xanhnuocbien'];
			$mausac_xanhngoc=$row['mausac_xanhngoc'];
			$mausac_xanhden=$row['mausac_xanhden'];
			$mausac_xam=$row['mausac_xam'];
			$mausac_tim=$row['mausac_tim'];
			$mausac_do=$row['mausac_do'];
			$mausac_cam=$row['mausac_cam'];
			$mausac_kem=$row['mausac_kem'];
			$mausac_xanhduong=$row['mausac_xanhduong'];
			$mausac_soc=$row['mausac_soc'];
			$mausac_xanhladam=$row['mausac_xanhladam'];
			$mausac_hoatiet=$row['mausac_hoatiet'];
			$mausac_bac=$row['mausac_bac'];
			$mausac_hongphan=$row['mausac_hongphan'];
			
			$kichthuoc_freesize=$row['kichthuoc_freesize'];
			$kichthuoc_1=$row['kichthuoc_1'];
			$kichthuoc_2=$row['kichthuoc_2'];
			$kichthuoc_3=$row['kichthuoc_3'];
			$kichthuoc_4=$row['kichthuoc_4'];
			$kichthuoc_5=$row['kichthuoc_5'];
			$kichthuoc_6=$row['kichthuoc_6'];
			$kichthuoc_7=$row['kichthuoc_7'];
			$kichthuoc_8=$row['kichthuoc_8'];
			$kichthuoc_9=$row['kichthuoc_9'];
			$kichthuoc_10=$row['kichthuoc_10'];
			$kichthuoc_11=$row['kichthuoc_11'];
			$kichthuoc_12=$row['kichthuoc_12'];
			$kichthuoc_S=$row['kichthuoc_S'];
			$kichthuoc_M=$row['kichthuoc_M'];
			$kichthuoc_L=$row['kichthuoc_L'];
			$kichthuoc_XL=$row['kichthuoc_XL'];
			$kichthuoc_XXL=$row['kichthuoc_XXL'];
			$kichthuoc_XS=$row['kichthuoc_XS'];
			$kichthuoc_XXS=$row['kichthuoc_XXS'];
			$kichthuoc_2XL=$row['kichthuoc_2XL'];
			$kichthuoc_3XL=$row['kichthuoc_3XL'];
			$kichthuoc_4XL=$row['kichthuoc_4XL'];
			$kichthuoc_5XL=$row['kichthuoc_5XL'];
			$kichthuoc_6XL=$row['kichthuoc_6XL'];
			$kichthuoc_25=$row['kichthuoc_25'];
			$kichthuoc_26=$row['kichthuoc_26'];
			$kichthuoc_27=$row['kichthuoc_27'];
			$kichthuoc_28=$row['kichthuoc_28'];
			$kichthuoc_29=$row['kichthuoc_29'];
			$kichthuoc_30=$row['kichthuoc_30'];
			$kichthuoc_31=$row['kichthuoc_31'];
			$kichthuoc_32=$row['kichthuoc_32'];
			$kichthuoc_33=$row['kichthuoc_33'];
			$kichthuoc_34=$row['kichthuoc_34'];
			$kichthuoc_35=$row['kichthuoc_35'];
			$kichthuoc_36=$row['kichthuoc_36'];
			$kichthuoc_37=$row['kichthuoc_37'];
			$kichthuoc_38=$row['kichthuoc_38'];
			$kichthuoc_39=$row['kichthuoc_39'];
			$kichthuoc_40=$row['kichthuoc_40'];
			$kichthuoc_41=$row['kichthuoc_41'];
			$kichthuoc_42=$row['kichthuoc_42'];
			$kichthuoc_43=$row['kichthuoc_43'];
			$kichthuoc_44=$row['kichthuoc_44'];
			$kichthuoc_45=$row['kichthuoc_45'];
			$kichthuoc_46=$row['kichthuoc_46'];
			$kichthuoc_47=$row['kichthuoc_47'];
			  $anh = explode(",", $row['image']);
		}
	}
}

?>

<pre id="idTemporary" name="idTemporary" style="display:none">
<?
if(isset($desc)) 
	{
	$sContent=stripslashes($desc);//remove slashes (/)	
	echo $sContent;
	}
?>
</pre>



<pre id="idTemporaryen" name="idTemporaryen" style="display:none">
<?
if(isset($descen)) 
	{
	$sContent=stripslashes($descen);//remove slashes (/)	
	echo htmlentities($sContent);
	}
?>
</pre>

<script language="Javascript1.2"><!-- // load htmlarea
_editor_url = "htmlarea/";                     // URL to htmlarea files
var win_ie_ver = parseFloat(navigator.appVersion.split("MSIE")[1]);
if (navigator.userAgent.indexOf('Mac')        >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Windows CE') >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Opera')      >= 0) { win_ie_ver = 0; }
if (win_ie_ver >= 5.5) {
  document.write('<scr' + 'ipt src="' +_editor_url+ 'editor.js"');
  document.write(' language="Javascript1.2"></scr' + 'ipt>');  
} else { document.write('<scr'+'ipt>function editor_generate() { return false; }</scr'+'ipt>'); }
// --></script>

<form method="post" name="FormLoaiSP" enctype="multipart/form-data"  >
<input type="hidden" name="txtDesc" id="txtDesc">
<input type="hidden" name="txtDescen" id="txtDescen">
<input type="hidden" name="act" value="product_m">
<input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>">
<input type="hidden" name="page" value="<? echo $_REQUEST['page']; ?>">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" class="title" align="center">Cập nhật : 
	Sản phẩm</td>
  </tr>
  <tr>
    <td width="45%">
    <table border="0" cellpadding="2" bordercolor="#111111" width="100%" id="AutoNumber2" cellspacing="0">
 	
 

		
              <?php if(file_exists($anh[0]))
{?>
<img class="thumb" width="300" height="300" src="<?php echo $anh['0'];?>" />
<input id="imagefield1" class="thumbfield"  type="hidden"  value="<?php echo $anh['0'];?>" name="imagefield1">
<?}else{?>
<img class="thumb" width="300" height="300" src="/quantri/images/add-images.png" />

<?}?>


              <!-- /.box-body -->

             
            
      <tr>
        <td width="1%" class="smallfont">
        <p align="right">Mã s&#7843;n ph&#7849;m</td>
        <td width="1%" class="smallfont" align="center">
        <font color="#FF0000"></font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $code; ?>" TYPE="text" NAME="code" CLASS=textbox size="89"></td>
      </tr>
	   <tr>
        <td width="1%" class="smallfont" align="right">
        Thuộc danh mục</td>
        <td width="1%" class="smallfont" align="center">&nbsp;
        </td>        
        <td width="83%" class="smallfont">
 
		<select name="cat"    >
<?			$caaaa3=mysql_query("SELECT * FROM cat where id='".$row['cat']."' ");
	$cataddd3=mysql_fetch_assoc($caaaa3);?>

<option value="<? echo $cataddd3['id'];?>" selected><? echo $cataddd3['name'];?></option>

  


						
						<? $timkiem=mysql_query("SELECT * FROM cat order by name desc");
						while($row_timkiem=mysql_fetch_array($timkiem))
						{?>
						<option value="<? echo $row_timkiem['id'];?>"><? echo $row_timkiem['name'];?></option>
						<?}?>
						
						</select>
		</td>
      </tr>
     <tr>
        <td width="1%" class="smallfont">
        <p align="right">Tên sản phẩm</td>
        <td width="1%" class="smallfont" align="center">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $name; ?>" TYPE="text" NAME="name" CLASS=textbox size="89"></td>
      </tr>
     <tr>
        <td width="1%" class="smallfont" align="right">
      Lượt mua</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $row['nguoimua']; ?>" TYPE="text" NAME="nguoimua" CLASS=textbox size="34"></td>
      </tr>
	   <tr>
        <td width="1%" class="smallfont" align="right">
        Lượt xem</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $row['view']; ?>" TYPE="text" NAME="view" CLASS=textbox size="34"></td>
      </tr>
     
            <tr>
        <td width="1%" class="smallfont" align="right">
        Giá cũ</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $price; ?>" TYPE="text" NAME="txtPrice" CLASS=textbox size="34"></td>
      </tr>
            <tr>
        <td width="1%" class="smallfont" align="right">
        Giá bán</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $priceen; ?>" TYPE="text" NAME="txtPriceen" CLASS=textbox size="34"></td>
      </tr>
 
  <tr>
        <td width="1%" class="smallfont" align="right">
        Shop bán</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $user; ?>" TYPE="text" NAME="user" CLASS=textbox size="34"> Chú ý: Thay đổi nhập đúng username Shop (Phân biệt chữ HOA và chữ Thường)</td>
      </tr>
	  
	  <tr>
        <td width="1%" class="smallfont" align="right">
        Bảo hành</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $row['baohanh']; ?>" TYPE="text" NAME="baohanh" CLASS=textbox size="34">  </td>
      </tr>
	  <tr>
        <td width="1%" class="smallfont" align="right">
        Status</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $row['status']; ?>" TYPE="text" NAME="status" CLASS=textbox size="34"> Nhập số 0 để sản phẩm được duyệt,Nhập số 1 để Hủy sản phẩm </td>
      </tr>
	  <tr>
        <td width="1%" class="smallfont" align="right">
        Nỗi bật</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $row['noibat']; ?>" TYPE="text" NAME="noibat" CLASS=textbox size="34"> Nhập số 1 để Được Nổi Bật, Nhập số 0 để Hủy nổi bật</td>
      </tr>
	  <tr>
        <td width="1%" class="smallfont" align="right">
        Tình trạng</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $row['tinhtrang']; ?>" TYPE="text" NAME="tinhtrang" CLASS=textbox size="34"> Nhập số 1 để còn hàng, Nhập số 0 để hết hàng</td>
      </tr>
	  <tr>
        <td width="1%" class="smallfont" align="right">
        Khối lượng</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $row['khoiluong']; ?>" TYPE="text" NAME="khoiluong" CLASS=textbox size="34"> Khối lượng sản phẩm tính bằng Gam</td>
      </tr>
	  <tr>
        <td width="1%" class="smallfont" align="right">
        Up Top</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $row['uptop']; ?>" TYPE="text" NAME="uptop" CLASS=textbox size="34"> Số lần UP TOP toàn hệ thống ưu tiên tìm kiếm,danh sách sản phẩm...</td>
      </tr>
	  <tr>
        <td width="1%" class="smallfont" align="right">
       Up Đề Cử</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $row['upxuhuong']; ?>" TYPE="text" NAME="upxuhuong" CLASS=textbox size="34"> Số lần UP TOP đề cử tại trang chủ</td>
      </tr>
	  <tr>
        <td width="1%" class="smallfont" align="right">
        Top Xu hướng</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $row['topxuhuong']; ?>" TYPE="text" NAME="topxuhuong" CLASS=textbox size="34"> Số lần UP TOP xu hướng tại trang chủ</td>
      </tr>
	  <tr>
        <td width="1%" class="smallfont" align="right">
        Top khuyến mãi</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $row['topkhuyenmai']; ?>" TYPE="text" NAME="topkhuyenmai" CLASS=textbox size="34"> Số lần UP TOP khuyến mãi tại trang chủ</td>
      </tr>	

	  <tr>
        <td width="1%" class="smallfont" align="right">
        Màu sắc</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		 <div class="checkbox">
                    <label style="background: #804000;padding-left: 3px;padding-top: 5px;outline: 1px solid #ccc;" title="Màu nâu">
					 <input class="minimal" type="checkbox" name="mausac_nau" value="ON" <? if ($mausac_nau>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <label style="background: #ffff00;padding-left: 3px;padding-top: 5px;outline: 1px solid #ccc;" title="Màu Vàng">
                        <input class="minimal" type="checkbox" name="mausac_vang" value="ON" <? if ($mausac_vang>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;
					   <label style="background: #ffffff;padding-left: 3px;padding-top: 5px;outline: 1px solid #ccc;" title="Màu trắng">
                        <input class="minimal" type="checkbox" name="mausac_trang" value="ON" <? if ($mausac_trang>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;
					<label style="background: #000000;padding-left: 3px;padding-top: 5px;outline: 1px solid #ccc;" title="Màu đen">
                       <input class="minimal" type="checkbox" name="mausac_den" value="ON" <? if ($mausac_den>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;
					<label style="background: #ff00ff;padding-left: 3px;padding-top: 5px;outline: 1px solid #ccc;" title="Màu hồng">
                        <input class="minimal" type="checkbox" name="mausac_hong" value="ON" <? if ($mausac_hong>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;
					<label style="background: #00ff00;padding-left: 3px;padding-top: 5px;outline: 1px solid #ccc;" title="Màu xanh lá">
                         <input class="minimal" type="checkbox" name="mausac_xanhla" value="ON" <? if ($mausac_xanhla>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;
					<label style="background: #0080ff;padding-left: 3px;padding-top: 5px;outline: 1px solid #ccc;" title="Màu nước biển">
                         <input class="minimal" type="checkbox" name="mausac_xanhnuocbien" value="ON" <? if ($mausac_xanhnuocbien>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;
					<label style="background: #00ffff;padding-left: 3px;padding-top: 5px;outline: 1px solid #ccc;" title="Màu xanh ngọc">
                        <input class="minimal" type="checkbox" name="mausac_xanhngoc" value="ON" <? if ($mausac_xanhngoc>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;			
					<label style="background: #112c4e;padding-left: 3px;padding-top: 5px;outline: 1px solid #ccc;" title="Màu xanh đen">
                           <input class="minimal" type="checkbox" name="mausac_xanhden" value="ON" <? if ($mausac_xanhden>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;
					<label style="background: #999999;padding-left: 3px;padding-top: 5px;outline: 1px solid #ccc;" title="Màu xám">
                        <input class="minimal" type="checkbox" name="mausac_xam" value="ON" <? if ($mausac_xam>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;
					<label style="background: #800080;padding-left: 3px;padding-top: 5px;outline: 1px solid #ccc;" title="Màu tím">
                        <input class="minimal" type="checkbox" name="mausac_tim" value="ON" <? if ($mausac_tim>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;	
					<label style="background: #ff0000;padding-left: 3px;padding-top: 5px;outline: 1px solid #ccc;" title="Màu đỏ">
                         <input class="minimal" type="checkbox" name="mausac_do" value="ON" <? if ($mausac_do>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;
					<label style="background: #ff8040;padding-left: 3px;padding-top: 5px;outline: 1px solid #ccc;" title="Màu cam">
                       <input class="minimal" type="checkbox" name="mausac_cam" value="ON" <? if ($mausac_cam>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;	
					<label style="background: #fef1ce;padding-left: 3px;padding-top: 5px;outline: 1px solid #ccc;" title="Màu kem">
                        <input class="minimal" type="checkbox" name="mausac_kem" value="ON" <? if ($mausac_kem>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;
					<label style="background: #0522c5;padding-left: 3px;padding-top: 5px;outline: 1px solid #ccc;" title="Màu xanh dương">
                        <input class="minimal" type="checkbox" name="mausac_xanhduong" value="ON" <? if ($mausac_xanhduong>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;
					<label style="background: url(/images/mul-color.gif) center center no-repeat;padding-left: 3px;padding-top: 5px;outline: 1px solid #ccc;" title="Màu sọc">
                        <input class="minimal" type="checkbox" name="mausac_soc" value="ON" <? if ($mausac_soc>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;	
					<label style="background: #007000;padding-left: 3px;padding-top: 5px;outline: 1px solid #ccc;" title="Màu xanh lá đậm">
                        <input class="minimal" type="checkbox" name="mausac_xanhladam" value="ON" <? if ($mausac_xanhladam>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;	
					<label style="background: url(/images/floral.jpg) center center no-repeat;padding-left: 3px;padding-top: 5px;outline: 1px solid #ccc;" title="Màu họa tiết">
                         <input class="minimal" type="checkbox" name="mausac_hoatiet" value="ON" <? if ($mausac_hoatiet>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;		
					<label style="background: #cccccc; center center no-repeat;padding-left: 3px;padding-top: 5px;outline: 1px solid #ccc;" title="Màu bạc">
                        <input class="minimal" type="checkbox" name="mausac_bac" value="ON" <? if ($mausac_bac>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;	
					<label style="background: #ffc0cb; center center no-repeat;padding-left: 3px;padding-top: 5px;outline: 1px solid #ccc;" title="Màu hồng phấn">
                         <input class="minimal" type="checkbox" name="mausac_hongphan" value="ON" <? if ($mausac_hongphan>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;
					
					
					
					
					
                  </div></td>
      </tr>


	  <tr>
        <td width="1%" class="smallfont" align="right">
        Kích thước</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		 <div class="checkbox">
		   <div class="checkbox">
                    <label>
                       <input type="checkbox" class="minimal-red" name="kichthuoc_freesize" value="ON" <? if ($kichthuoc_freesize>"0") echo 'checked' ?>>
                   Free Size
                    </label>

                  </div>
				  <div class="checkbox">
                    <label>
                       <input type="checkbox" class="minimal-red" name="kichthuoc_1" value="ON" <? if ($kichthuoc_1>"0") echo 'checked' ?>>
                   1
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                      <input type="checkbox" class="minimal-red" name="kichthuoc_2" value="ON" <? if ($kichthuoc_2>"0") echo 'checked' ?>>
                  2
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                       <input type="checkbox" class="minimal-red" name="kichthuoc_3" value="ON" <? if ($kichthuoc_3>"0") echo 'checked' ?>>
                   3
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                       <input type="checkbox" class="minimal-red" name="kichthuoc_4" value="ON" <? if ($kichthuoc_4>"0") echo 'checked' ?>>
                  4
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                       <input type="checkbox" class="minimal-red" name="kichthuoc_5" value="ON" <? if ($kichthuoc_5>"0") echo 'checked' ?>>
                   5
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                       <input type="checkbox" class="minimal-red" name="kichthuoc_6" value="ON" <? if ($kichthuoc_6>"0") echo 'checked' ?>>
                  6
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                     <input type="checkbox" class="minimal-red" name="kichthuoc_7" value="ON" <? if ($kichthuoc_7>"0") echo 'checked' ?>>
                  7
                    </label>
                  </div>
                    
					<div class="col-sm-10"style="margin-left: 8px;margin-top: -152px;margin-left: 105px;">
                    <div class="checkbox">
                    <label>
                      <input type="checkbox" class="minimal-red" name="kichthuoc_8" value="ON" <? if ($kichthuoc_8>"0") echo 'checked' ?>>
                  8
                    </label>

                  </div>
				  <div class="checkbox">
                    <label>
                       <input type="checkbox" class="minimal-red" name="kichthuoc_9" value="ON" <? if ($kichthuoc_9>"0") echo 'checked' ?>>
                  9
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                       <input type="checkbox" class="minimal-red" name="kichthuoc_10" value="ON" <? if ($kichthuoc_10>"0") echo 'checked' ?>>
                   10
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                      <input type="checkbox" class="minimal-red" name="kichthuoc_11" value="ON" <? if ($kichthuoc_11>"0") echo 'checked' ?>>
                   11
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                      <input type="checkbox" class="minimal-red" name="kichthuoc_12" value="ON" <? if ($kichthuoc_12>"0") echo 'checked' ?>>
                 12
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                      <input type="checkbox" class="minimal-red" name="kichthuoc_S" value="ON" <? if ($kichthuoc_S>"0") echo 'checked' ?>>
                   S
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                      <input type="checkbox" class="minimal-red" name="kichthuoc_M" value="ON" <? if ($kichthuoc_M>"0") echo 'checked' ?>>
                   M
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                      <input type="checkbox" class="minimal-red" name="kichthuoc_L" value="ON" <? if ($kichthuoc_L>"0") echo 'checked' ?>>
                  L
                    </label>
                  </div>
                  </div>
					
					 <div class="col-sm-10"style="margin-left: 8px;margin-top: -152px;margin-left: 205px;">
                    <div class="checkbox">
                    <label>
                      <input type="checkbox" class="minimal-red" name="kichthuoc_XL" value="ON" <? if ($kichthuoc_XL>"0") echo 'checked' ?>>
                   XL
                    </label>

                  </div>
				  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="minimal-red" name="kichthuoc_XXL" value="ON" <? if ($kichthuoc_XXL>"0") echo 'checked' ?>>
                    XXL
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                      <input type="checkbox" class="minimal-red" name="kichthuoc_XS" value="ON" <? if ($kichthuoc_XS>"0") echo 'checked' ?>>
                   XS
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                      <input type="checkbox" class="minimal-red" name="kichthuoc_XXS" value="ON" <? if ($kichthuoc_XXS>"0") echo 'checked' ?>>
                   XXS
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                      <input type="checkbox" class="minimal-red" name="kichthuoc_2XL" value="ON" <? if ($kichthuoc_2XL>"0") echo 'checked' ?>>
                 2XL
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                      <input type="checkbox" class="minimal-red" name="kichthuoc_3XL" value="ON" <? if ($kichthuoc_3XL>"0") echo 'checked' ?>>
                   3XL
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                     <input type="checkbox" class="minimal-red" name="kichthuoc_4XL" value="ON" <? if ($kichthuoc_4XL>"0") echo 'checked' ?>>
                    4XL
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                     <input type="checkbox" class="minimal-red" name="kichthuoc_5XL" value="ON" <? if ($kichthuoc_5XL>"0") echo 'checked' ?>>
                 5XL
                    </label>
                  </div>
                  </div>
				  <div class="col-sm-10"style="margin-left: 8px;margin-top: -152px;margin-left: 305px;">
                    <div class="checkbox">
                    <label>
                     <input type="checkbox" class="minimal-red" name="kichthuoc_6XL" value="ON" <? if ($kichthuoc_6XL>"0") echo 'checked' ?>>
                  6XL
                    </label>

                  </div>
				  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="minimal-red" name="kichthuoc_25" value="ON" <? if ($kichthuoc_25>"0") echo 'checked' ?>>
                   25
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                     <input type="checkbox" class="minimal-red" name="kichthuoc_26" value="ON" <? if ($kichthuoc_26>"0") echo 'checked' ?>>
                   26
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                     <input type="checkbox" class="minimal-red" name="kichthuoc_27" value="ON" <? if ($kichthuoc_27>"0") echo 'checked' ?>>
                   27
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                   <input type="checkbox" class="minimal-red" name="kichthuoc_28" value="ON" <? if ($kichthuoc_28>"0") echo 'checked' ?>>
                  28
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                     <input type="checkbox" class="minimal-red" name="kichthuoc_29" value="ON" <? if ($kichthuoc_29>"0") echo 'checked' ?>>
                   29
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                     <input type="checkbox" class="minimal-red" name="kichthuoc_30" value="ON" <? if ($kichthuoc_30>"0") echo 'checked' ?>>
                   30
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                     <input type="checkbox" class="minimal-red" name="kichthuoc_31" value="ON" <? if ($kichthuoc_31>"0") echo 'checked' ?>>
                   31
                    </label>
                  </div>
                  </div>
				   <div class="col-sm-10"style="margin-left: 8px;margin-top: -152px;margin-left: 405px;">
                    <div class="checkbox">
                    <label>
                      <input type="checkbox" class="minimal-red" name="kichthuoc_32" value="ON" <? if ($kichthuoc_32>"0") echo 'checked' ?>>
                  32
                    </label>

                  </div>
				  <div class="checkbox">
                    <label>
                    <input type="checkbox" class="minimal-red" name="kichthuoc_33" value="ON" <? if ($kichthuoc_33>"0") echo 'checked' ?>>
                   33
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                      <input type="checkbox" class="minimal-red" name="kichthuoc_34" value="ON" <? if ($kichthuoc_34>"0") echo 'checked' ?>>
                   34
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                     <input type="checkbox" class="minimal-red" name="kichthuoc_35" value="ON" <? if ($kichthuoc_35>"0") echo 'checked' ?>>
                  35
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                     <input type="checkbox" class="minimal-red" name="kichthuoc_36" value="ON" <? if ($kichthuoc_36>"0") echo 'checked' ?>>
                   36
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                    <input type="checkbox" class="minimal-red" name="kichthuoc_37" value="ON" <? if ($kichthuoc_37>"0") echo 'checked' ?>>
                   37
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                    <input type="checkbox" class="minimal-red" name="kichthuoc_38" value="ON" <? if ($kichthuoc_38>"0") echo 'checked' ?>>
                   38
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                     <input type="checkbox" class="minimal-red" name="kichthuoc_39" value="ON" <? if ($kichthuoc_39>"0") echo 'checked' ?>>
                   39
                    </label>
                  </div>
                  </div>
				  <div class="col-sm-10"style="margin-left: 8px;margin-top: -152px;margin-left: 505px;">
                    <div class="checkbox">
                    <label>
                   <input type="checkbox" class="minimal-red" name="kichthuoc_40" value="ON" <? if ($kichthuoc_40>"0") echo 'checked' ?>>
                   40
                    </label>

                  </div>
				  <div class="checkbox">
                    <label>
                    <input type="checkbox" class="minimal-red" name="kichthuoc_41" value="ON" <? if ($kichthuoc_41>"0") echo 'checked' ?>>
                  41
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                     <input type="checkbox" class="minimal-red" name="kichthuoc_42" value="ON" <? if ($kichthuoc_42>"0") echo 'checked' ?>>
                   42
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                   <input type="checkbox" class="minimal-red" name="kichthuoc_43" value="ON" <? if ($kichthuoc_43>"0") echo 'checked' ?>>
                   43
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                    <input type="checkbox" class="minimal-red" name="kichthuoc_44" value="ON" <? if ($kichthuoc_44>"0") echo 'checked' ?>>
                   44
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                    <input type="checkbox" class="minimal-red" name="kichthuoc_45" value="ON" <? if ($kichthuoc_45>"0") echo 'checked' ?>>
                   45
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                  <input type="checkbox" class="minimal-red" name="kichthuoc_46" value="ON" <? if ($kichthuoc_46>"0") echo 'checked' ?>>
                   46
                    </label>
                  </div>
				   <div class="checkbox">
                    <label>
                   <input type="checkbox" class="minimal-red" name="kichthuoc_47" value="ON" <? if ($kichthuoc_47>"0") echo 'checked' ?>>
                   47
                    </label>
                  </div>
                  </div>
					
					
                 </td>
      </tr>
	  
	  
	  
	  

      </tr>














		<tr>
        <td width="1%" class="smallfont" align="right">
        Mô t&#7843; s&#7843;n ph&#7849;m</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
      <textarea id="desc"  name="txtDesc" cols="80" rows="10"  ><? echo $desc1; ?></textarea>
	        		<script>
 
           CKEDITOR.replace( 'desc' );
 
       </script>  		  
	        
		</td>
      </tr>





 <tr>
        <td width="1%" class="smallfont" align="right">
        Từ khóa SEO</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $row['tukhoaseo']; ?>" TYPE="text" NAME="tukhoaseo" CLASS=textbox size="144">  </td>
      </tr>


 <tr>
        <td width="1%" class="smallfont" align="right">
        Tiêu đề SEO</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $row['tieudeseo']; ?>" TYPE="text" NAME="tieudeseo" CLASS=textbox size="144">  </td>
      </tr>



 <tr>
        <td width="1%" class="smallfont" align="right">
        Mô tả SEO</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		   <textarea   name="motaseo" cols="124" rows="5"  ><? echo $row['motaseo']; ?></textarea>  </td>
      </tr>



     
	   
     
	   
	   
      <tr>
        <td width="1%" class="smallfont">
		<p align="right">
		<INPUT TYPE="submit" NAME="butSaveLoai" VALUE="C&#7853;p nh&#7853;t" CLASS=button onclick="submitForm()">&nbsp;</td>
        <td width="1%" class="smallfont" align="center">
		&nbsp;</td>
 
      </tr>
    </table>
    </td>
  </tr>
  </table>
</form>