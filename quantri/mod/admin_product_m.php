<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 50px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width:50%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}

.modal-body {padding: 0px 0px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}
</style>




<?php
$truy_xuat=mysql_query("SELECT * FROM products where id='".$_REQUEST['id']."'");
$truy_xuat_in=mysql_fetch_assoc($truy_xuat);



if($_SESSION['log']==$truy_xuat_in['user'] && $_REQUEST['id'] == $truy_xuat_in['id']  ){?>



<script type="text/javascript" src="js/jquery-upload.js"></script>
<script language="javascript">
 $(document).ready(function() {
  $('#bds_loai').change(function() {
   giatri = this.value;
   $('#shuyen').load('mod/ajax.php?id_tinh=' + giatri);
   $('#shang').load('mod/ajax_hang.php?id_tinh=' + giatri);
  });
 });
</script>
<script type="text/javascript">

	
$(document).ready(function(){

var id = 1;

$('.thumb').each(
   function() { 
     $(this).attr('id', 'thumb' + id); 
	id++;

	new AjaxUpload($(this).attr('id'), {
		action: 'upload.php?fieldname=image'+$(this).attr('id'),
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
<script type="text/javascript">

	$(document).ready(function()
	{
		$('div#delTable div a.delete').click(function()
		{
			if (confirm("Bạn muốn xóa ảnh này không?"))
			{
				var id = $(this).parent().parent().attr('id');
				var data = 'id=' + id ;
				var parent = $(this).parent().parent();

				$.ajax(
				{
					   type: "POST",
					   url: "delete_row.php?id="+id,
					   data: data,
					   cache: false,
					
					   success: function()
					   {
							parent.fadeOut('slow', function() {$(this).remove();});
					   }
				 });				
			}
		});
		
		// style the table with alternate colors
		// sets specified color for every odd row
		$('div#delTable div:odd').css('background',' #FFFFFF');
	});
	
</script>
<script language="javascript" type="text/javascript">
function check()
{





if(document.myform.name.value =="")
{
alert("Chưa nhập tên sản phẩm");
document.myform.name.focus();
return false;
}

if(document.myform.price_special.value =="")
{
alert("Chưa nhập giá sản phẩm");
document.myform.price_special.focus();
return false;
}

if(document.myform.khoiluong.value =="")
{
alert("Chưa nhập khối lượng");
document.myform.khoiluong.focus();
return false;
}
if(document.myform.noidung.value =="")
{
alert("Thông tin chi tiết phải từ 40 ký tự trở lên");
document.myform.noidung.focus();
return false;
}


return true;
}
</script>	
<style media="all" type="text/css">
	div.preview { float: left; width: 100px; height: 100px; border: 2px dotted #CCCCCC; }
	div.preview.loading { background: url(http://www.unchi.co.uk/demos/jquery/image_upload/loading.gif) no-repeat 39px 40px; }
	div.preview.loading img {display: none; }
	div.preview.loading input
	{
	height:25px;
	}
</style>

<?
include_once("fckeditor/fckeditor.php") ;
?>
<?php
$sql_config_user9999=mysql_query("SELECT * FROM user_shop where user='".$_SESSION['log']."'");
$row_config_user9999=mysql_fetch_assoc($sql_config_user9999);
$company = $row_config_user9999['company'];
$phone = $row_config_user9999['phone'];
$address = $row_config_user9999['address'];
$sql_config_user=mysql_query("SELECT * FROM config_user where id=1");
$row_config_user=mysql_fetch_assoc($sql_config_user);
$sql_pro_config=mysql_query("SELECT * FROM products where user='".$_SESSION['log']."'");
$toalt_pro=mysql_num_rows($sql_pro_config);
?>
<?
$path = "../thanhvien/".$_SESSION['log']."/products";
$pathdb = "thanhvien/".$_SESSION['log']."/products";
if (isset($_POST['butSaveLoai'])) {
	$code=$_POST['code'];
 	$name=$_POST['name'];
	$price=preg_replace('/[^0-9]/','',$_POST['price']);			
	$option_name=implode(",",str_replace(",",".",$_POST['option_name']));
	$option=implode(",",str_replace(",",".",$_POST['option']));
	$price_special=preg_replace('/[^0-9]/','',$_POST['price_special']);	
	$provider=$_POST['provider'];
	$short=$_POST['short'];
	$content=$_POST['noidung'];
	$cat_mem=$_POST['ddCat'];
	$hangsx=$_POST['hangsx'];
	$tukhoaseo=$_POST['tukhoaseo'];
	$tieudeseo=$_POST['tieudeseo'];
	$motaseo=$_POST['motaseo'];
	$company=$_POST['company'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$xuatxu=$_POST['xuatxu'];
	$tinhtrang =       ($_POST['tinhtrang']!=''?1:0);
	$khoiluong=preg_replace('/[^0-9]/','',$_POST['khoiluong']);	
	$mausac=$_POST['mausac'];
	$kichthuoc=$_POST['kichthuoc'];
	$baohanh=$_POST['baohanh'];
	$pro="";
	foreach ($_POST['ddPro'] as $t) $pro.=$t.",";
	$cat=$_POST['cat'];
	$catinfo=GetCategoryInfo($id);
	$user=$_SESSION['log'];
	$thutu=$_POST['thutu'];
     $new =       ($_POST['new']!=''?1:0);
	 $featured = ($_POST['featured']!=''?1:0);
	 $selling = ($_POST['selling']!=''?1:0);	
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



	$city=$_POST['city'];
	$sql_up=mysql_query("SELECT upvip FROM products order by upvip DESC limit 1");
	$row_up=mysql_fetch_assoc($sql_up);
	$upvip=$row_up['upvip']+1;
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	$date = date("d-m-Y H:i:s");
$img1=$_POST['imagefield1'];
$img2=$_POST['imagefield2'];
$img3=$_POST['imagefield3'];
$img4=$_POST['imagefield4'];
$img5=$_POST['imagefield5'];
$img6=$_POST['imagefield6'];
$img7=$_POST['imagefield7'];
$img8=$_POST['imagefield8'];
$info=$img1.",".$img2.",".$img3.",".$img4.",".$img5.",".$img6.",".$img7.",".$img8;
	$err="";
 
 
	
 
//	$err.=CheckUpload($_FILES["txtImage"],".jpg;.gif;.bmp;.png",300*1024,$_POST['id']==''?1:0);

	if ($err=='')
	{
	if (!empty($_POST['id'])) {
			$oldid = $_POST['id'];
			$id = $_POST['id'];
			$sql = "update products set  phone='".$phone."', address='".$address."',  company='".$company."' , tukhoaseo='".$tukhoaseo."',tieudeseo='".$tieudeseo."',motaseo='".$motaseo."',  kichthuoc_freesize='".$kichthuoc_freesize."',kichthuoc_1='".$kichthuoc_1."',kichthuoc_2='".$kichthuoc_2."',kichthuoc_3='".$kichthuoc_3."',kichthuoc_4='".$kichthuoc_4."',kichthuoc_5='".$kichthuoc_5."',kichthuoc_6='".$kichthuoc_6."',kichthuoc_7='".$kichthuoc_7."',kichthuoc_8='".$kichthuoc_8."',kichthuoc_9='".$kichthuoc_9."',kichthuoc_10='".$kichthuoc_10."',kichthuoc_11='".$kichthuoc_11."',kichthuoc_12='".$kichthuoc_12."',kichthuoc_S='".$kichthuoc_S."',kichthuoc_M='".$kichthuoc_M."',kichthuoc_L='".$kichthuoc_L."',kichthuoc_XL='".$kichthuoc_XL."',kichthuoc_XXL='".$kichthuoc_XXL."',kichthuoc_XS='".$kichthuoc_XS."',kichthuoc_XXS='".$kichthuoc_XXS."',kichthuoc_2XL='".$kichthuoc_2XL."',kichthuoc_3XL='".$kichthuoc_3XL."',kichthuoc_4XL='".$kichthuoc_4XL."',kichthuoc_5XL='".$kichthuoc_5XL."',kichthuoc_6XL='".$kichthuoc_6XL."',kichthuoc_25='".$kichthuoc_25."',kichthuoc_26='".$kichthuoc_26."',kichthuoc_27='".$kichthuoc_27."',kichthuoc_28='".$kichthuoc_28."',kichthuoc_29='".$kichthuoc_29."',kichthuoc_30='".$kichthuoc_30."',kichthuoc_31='".$kichthuoc_31."',kichthuoc_32='".$kichthuoc_32."',kichthuoc_33='".$kichthuoc_33."',kichthuoc_34='".$kichthuoc_34."',kichthuoc_35='".$kichthuoc_35."',kichthuoc_36='".$kichthuoc_36."',kichthuoc_37='".$kichthuoc_37."',kichthuoc_38='".$kichthuoc_38."',kichthuoc_39='".$kichthuoc_39."',kichthuoc_40='".$kichthuoc_40."',kichthuoc_41='".$kichthuoc_41."',kichthuoc_42='".$kichthuoc_42."',kichthuoc_43='".$kichthuoc_43."',kichthuoc_44='".$kichthuoc_44."',kichthuoc_45='".$kichthuoc_45."',kichthuoc_46='".$kichthuoc_46."',kichthuoc_47='".$kichthuoc_47."',mausac_nau='".$mausac_nau."',mausac_vang='".$mausac_vang."',mausac_trang='".$mausac_trang."',mausac_den='".$mausac_den."',mausac_hong='".$mausac_hong."',mausac_xanhla='".$mausac_xanhla."',mausac_xanhnuocbien='".$mausac_xanhnuocbien."',mausac_xanhngoc='".$mausac_xanhngoc."',mausac_xanhden='".$mausac_xanhden."',mausac_xam='".$mausac_xam."',mausac_tim='".$mausac_tim."',mausac_do='".$mausac_do."',mausac_cam='".$mausac_cam."',mausac_kem='".$mausac_kem."',mausac_xanhduong='".$mausac_xanhduong."',mausac_soc='".$mausac_soc."',mausac_xanhladam='".$mausac_xanhladam."',mausac_hoatiet='".$mausac_hoatiet."',mausac_bac='".$mausac_bac."',mausac_hongphan='".$mausac_hongphan."',khoiluong='".$khoiluong."',mausac='".$mausac."',kichthuoc='".$kichthuoc."',baohanh='".$baohanh."',code='".$code."', name='".$name."',  image='".$img1."', price='".$price."',price_special='".$price_special."', short='".$short."', content='".$content."',  cat='".$cat."',  tinhtrang='".$tinhtrang."', date='".$date."' where id='".$oldid."'";
		}else {
	 }
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
				include('image.php');
                $image = new SimpleImage();
                $image->load($path."/product_s".$oldid.$extsmall);
                $image->resizeToWidth(127);
                $image->save($path."/product_s_thumbnail".$oldid.$extsmall);
				$sqlUpdateField = "image='$pathdb/product_s_thumbnail$oldid$extsmall' ";
			}
			if($sqlUpdateField!='')
			{
				$sqlUpdate = "update products set $sqlUpdateField where id='".$oldid."'";
				mysql_query($sqlUpdate,$con);
			}
		}	
		else {
			$err =  "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không thể cập nhật vui lòng kiểm tra lại chú ý: Không nhập ký tự đặc biệt')
	 window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";
		}
  	}

  	if ($err=='') echo '<script>window.location="./sanpham"</script>';
  	else echo "<p align=center class='err'>".$err."</p>";
} else {
?>

<?
	if (isset($_GET['id'])) {
		$oldid=$_GET['id'];
		$id=$_GET['id'];
		$page = $_GET['page'];
		$sql = "select * from products where id='".$oldid."'";
		if ($result = mysql_query($sql,$con)) {
			$row=mysql_fetch_array($result);
			$code=$row['code'];
			$name=$row['name'];
			$xuatxu=$row['xuatxu'];
			$tukhoaseo=$row['tukhoaseo'];
			$tieudeseo=$row['tieudeseo'];
			$motaseo=$row['motaseo'];
			
			$tinhtrang=$row['tinhtrang'];
			$khoiluong=$row['khoiluong'];
			$mausac=$row['mausac'];
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
			
			$kichthuoc=$row['kichthuoc'];
			$baohanh=$row['baohanh'];
			$image=$row['image'];
			$categories_id = $row['cat_mem'];
			$cat_hethong = $row['cat'];
			$imagelarge=$row['image_large'];
			$price=$row['price'];
			$priceen=$row['price_special'];
			$shortdesc=$row['short'];
			$desc=$row['content'];
			$provider_id=$row['provider'];
			$thutu = $row['thutu'];
			$city = $row['city'];
			$new=$row['new'];
			$featured=$row['featured'];
			$selling=$row['selling'];
            $anh = explode(",", $row['image']);
			$option = explode(",", $row['option_home']);
		}
	}
}
?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thêm sản phẩm
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a >Quản lý sản phẩm</a></li>
        <li><a href="add_products">Thêm sản phẩm</a></li>
      </ol>
    </section>



 

 
 
<form method="post" name="myform" enctype="multipart/form-data" onsubmit="return check()" action="">

<input type="hidden" name="short" id="short">
<input type="hidden" name="act" value="product_m">
<input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>">
<input type="hidden" name="page" value="<? echo $_REQUEST['page']; ?>">
<input type="hidden" name="cat" value="<? echo $_REQUEST['cat']; ?>">

<input type="hidden" name="company" value="<? echo $company; ?>">
<input type="hidden" name="phone" value="<? echo $phone; ?>">
<input type="hidden" name="address" value="<? echo $address; ?>">
<table cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" class="title" align="center">
	<?if($_REQUEST['edit']=='1')
	{?>
	
	<?}else{?>

	<?}?>
	</td>
  </tr>
  <!--============== COMMAND =================-->


  <tr class="GridView_Padding" >
    <br>
	
	<!-- báº¯t Ä‘áº§u content -->
	<section class="content">
	
      <div class="row">
	  
        <!-- left column -->
        <div class="col-md-6" style="width: 330px	;">
		
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border" style="
    padding-bottom: 30px;
">
			
              <center><h3 class="box-title">Hình ảnh đại diện</h3></center>
			     <center><small >Kích thước chuẩn 300px x 300px</small></center>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			
            <form role="form">

		
              <?php if(file_exists($anh[0]))
{?>
<img class="thumb" width="300" height="300" src="<?php echo $anh['0'];?>" />
<input id="imagefield1" class="thumbfield"  type="hidden"  value="<?php echo $anh['0'];?>" name="imagefield1">
<?}else{?>
<img class="thumb" width="300" height="300" src="images/add-images.png" />

<?}?>


              <!-- /.box-body -->

             
            </form>
          </div>
          <!-- /.box -->

          <!-- Form Element sizes -->
          <!--div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Loáº¡i sáº£n pháº©m</h3>
            </div>
			
            <div class="box-body">
             <select name="new" multiple="multiple" style="width: 280px;height:60px;">
		<? if($point=='1')
		{
		echo "<option value=\"1\" selected>Sáº£n pháº©m ná»•i báº­t</option>
              <option value=\"0\">Sáº£n pháº©m má»›i</option>
			  <option value=\"2\">Sáº£n pháº©m bĂ¡n cháº¡y</option>";
		}
		elseif($point=='0')
		{
		echo "<option value=\"0\" selected>Sáº£n pháº©m má»›i</option>
		      <option value=\"1\">Sáº£n pháº©m ná»•i báº­t</option>
			  <option value=\"2\">Sáº£n pháº©m bĂ¡n cháº¡y</option>";
		}
		elseif($point=='2')
		{
		echo "<option value=\"2\" selected>Sáº£n pháº©m ná»•i báº­t</option>
		      <option value=\"0\">Sáº£n pháº©m má»›i</option>
			  <option value=\"2\">Sáº£n pháº©m bĂ¡n cháº¡y</option>";
		}
		else
		{
		echo "<option value=\"0\" selected>Sáº£n pháº©m má»›i</option>
		      <option value=\"1\">Sáº£n pháº©m ná»•i báº­t</option>
			  <option value=\"2\">Sáº£n pháº©m bĂ¡n cháº¡y</option>";
		}
		?>
		</select>
            </div>
            <!-- /.box-body -->
          
	

             
          <!-- /.box -->

          <!--div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">NÆ¡i rao bĂ¡n</h3>
            </div>
            <div class="box-body">
                          <select size="1" name="city"  class="form-control" >
		<option value="0" style="color: red;">ToĂ n quá»‘c</option>
<?
		$cats=GetListCity(0);
		foreach ($cats as $cat)
		{
			if ($cat[0]==$city)
				echo "<option value=".$cat[0]." selected>".$cat[1]."</option>";
			else
				echo "<option value=".$cat[0].">".$cat[1]."</option>";
		}
?>		
		</select>
            </div>
            <!-- /.box-body
          </div-->
		  
          <!-- /.box -->

          <!-- Input addon -->
          
          <!-- /.box -->
		  

			  
			  
			  
        </div>
		
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
		
          <!-- Horizontal Form -->
          <div class="box box-info" style="width: 143%;">
            <div class="box-header with-border">
<?
		$caaaa=mysql_query("SELECT * FROM cat where id='".$_REQUEST['cat']."' ");
	$cat_mem=mysql_fetch_assoc($caaaa);
	
	$sql_cat_sub2=mysql_query("SELECT * FROM cat where id='".$cat_mem['parent']."' ");
$row_cat_sub2=mysql_fetch_assoc($sql_cat_sub2);
$cat_mem_sub2=$row_cat_sub2['name'];
			$sql_cat_sub1=mysql_query("SELECT * FROM cat where id='".$row_cat_sub2['parent']."' ");
$row_cat_sub1=mysql_fetch_assoc($sql_cat_sub1);
$cat_mem_sub1=$row_cat_sub1['name'];	
?>					
			
			
		<?
$caaaa12222=mysql_query("SELECT * FROM products where id='".$_REQUEST['id']."' ");
	$cat_mem12222=mysql_fetch_assoc($caaaa12222);
	
		$caaaa1=mysql_query("SELECT * FROM cat where id='".$cat_mem12222['cat']."' ");
	$cat_mem1=mysql_fetch_assoc($caaaa1);
	
	$sql_cat_sub21=mysql_query("SELECT * FROM cat where id='".$cat_mem1['parent']."' ");
$row_cat_sub21=mysql_fetch_assoc($sql_cat_sub21);
$cat_mem_sub21=$row_cat_sub21['name'];
			$sql_cat_sub11=mysql_query("SELECT * FROM cat where id='".$row_cat_sub21['parent']."' ");
$row_cat_sub11=mysql_fetch_assoc($sql_cat_sub11);
$cat_mem_sub11=$row_cat_sub11['name'];	
?>		
			
			
			
			
			
			
			
			
			
			
              <h3 class="box-title">Chọn ngành hàng   <a  href="java:"  id="myBtn"   title="Chọn ngành hàng"  style="
    float: right;
    color: #ffffff;
    font-size: 15px;
    font-weight: 600;
    text-transform: uppercase;
    text-decoration: none;
    line-height: 26px;
    margin-left: 20px;
    background: #dd4b39;
    border-radius: 4px;
    border: 1px solid #35b8fe;padding: 4px;
    "> CHỌN</a>           </h3>
		 
			   <div style="
    display: inline-block;
    margin-left: 20px;
    font-size: 15px;
    color: #666;
    font-weight: bold;
">
                                                <!-- ko if:ArrBreakcrums().length >0-->
                                                <span  >
<?php
if($cat_mem_sub1=="")
{?>
<?}else{?>
<b style=" color: red; font-size: 16px; "><? echo $cat_mem_sub1;?> &gt; </b>
<?}?>  

<?php
if($cat_mem_sub2=="")
{?>
<?}else{?>
<b style=" color: blue; font-size: 15px; "><? echo $cat_mem_sub2;?> &gt; </b>
<?}?>											
												
<b style=" color: black; font-size: 14px; "><? echo $cat_mem['name'];?></b>


</span>


<?php
if($_REQUEST['cat']=="")
{?>
<span  >
<input type="hidden" name="cat" value="<? echo $cat_mem1['id'];?>">
<?php
if($cat_mem_sub11=="")
{?>
<?}else{?>
<b style=" color: red; font-size: 16px; "><? echo $cat_mem_sub11;?> &gt; </b>
<?}?>  

<?php
if($cat_mem_sub21=="")
{?>
<?}else{?>
<b style=" color: blue; font-size: 15px; "><? echo $cat_mem_sub21;?> &gt; </b>
<?}?>											
												
<b style=" color: black; font-size: 14px; "><? echo $cat_mem1['name'];?></b>


</span>
<?}else{?>
 
<?}?>	
 






                                                <!--/ko-->
                                            </div> 
            </div>
			   
            <!-- form start -->
			
           

              <div class="box-body">
			  
                <div class="form-group" style="margin-bottom: 59px;">
				
                  <label class="col-sm-2 control-label" style="margin-top: 10px;">Tên sản phẩm</label>

                  <div class="col-sm-10">
                    <input  class="form-control" value="<? echo $name; ?>" TYPE="text" NAME="name" maxlength="70"  placeholder="Nhập tên sản phẩm"  >
                  </div>
                </div>
				
                <div class="form-group" style="margin-bottom: 59px;">
                  <label class="col-sm-2 control-label" style="margin-top: 10px;">Mã sản phẩm</label>

                  <div class="col-sm-10">
                    <input  class="form-control"  value="<? echo $code; ?>" name="code" maxlength="9"  placeholder="Nhập mã sản phẩm">
                  </div>
                </div>
				

              </div>
			   <div class="box-body">
                           <div class="box-body">
              <div class="row">
                  <label class="col-sm-2 control-label" style="margin-top: 10px;    margin-left: 3px;">Giá bán</label>
                <div class="col-xs-4">
				
                  <input type="text" onkeyup="this.value=FormatNumber(this.value);"    class="form-control" style=" color: red; font-weight: bold; "  value="<? echo number_format($priceen); ?>" NAME="price_special" maxlength="12"   placeholder="Nhập giá bán" > 
                </div>
				   <label class="col-sm-2 control-label"  style="margin-top: 10px;    width: 11.666667%;">Giá gốc</label>
                <div class="col-xs-5">
                  <input type="text" onkeyup="this.value=FormatNumber(this.value);"   class="form-control"  value="<? echo number_format($price); ?>"  NAME="price" maxlength="12" placeholder="Giá gốc sản phẩm">
                </div>
              </div>
            </div>
			
			 <div class="box-body">
              <div class="row">
                  <label class="col-sm-2 control-label" style="margin-top: 10px;    margin-left: 3px;">Tình trạng</label>
                <div class="col-xs-4">
				
                 <div class="checkbox">
                    <label>
                       <input class="minimal-red" type="checkbox" name="tinhtrang" value="ON" <? if ($tinhtrang>0) echo 'checked' ?>>
                   Còn hàng
                    </label>
                  </div>
                </div>
				   <label class="col-sm-2 control-label"  style="margin-top: 10px;      width: 13.666667%;">Bảo hành</label>
                <div  >
                  <input style=" width: 33%; " type="text"     class="form-control"  value="<? echo $baohanh; ?>" name="baohanh" maxlength="20"  placeholder="Thời gian bảo hành">
                </div>
              </div>
            </div>
				

			  
              </div>
			  <div class="box-body">
			  
                <div class="form-group" style="margin-bottom: 33px;">
				
                  <label class="col-sm-2 control-label" style="margin-top: 10px;">Khối lượng (Đơn vị: Gram)</label>

                  <div class="col-sm-10">
                    <input  type="text" onkeyup="this.value=FormatNumber(this.value);"  class="form-control" value="<? echo number_format($khoiluong); ?>" TYPE="text" NAME="khoiluong" maxlength="6"  placeholder="Nhập khối lượng sản phẩm đơn vị là Gram"  >
					<b style="font-size: 12px;color: #cc1515;">Nhập chính xác Gram VD: Vật phẩm nặng 500 Gram nhập 500, vật phẩm nặng 1 Kg nhập 1000.</b>
                  </div>
                </div>
				
               
				

              </div>
              <!-- /.box-body -->
              
              <!-- /.box-footer -->
          
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
		  
		  
         
		  
          <!-- /.box -->
        </div>
		
        <!--/.col (right) -->
      </div>
	  
	  
	   <div class="box box-warning" >
            <div class="box-header with-border">
              <h3 class="box-title">Chọn màu sắc, kích thước</h3>
            </div>
            <!-- /.box-header -->
			<div class="box-body">
                <div class="form-group" style="margin-bottom: 12px;">
                  <label class="col-sm-2 control-label" style="margin-top: 10px;margin-left: -14px;">Màu sắc (Nếu có)</label>

                  <div class="col-sm-10"style="margin-left: 24px;">
                    <div class="checkbox">
                    <label style="background: #804000;padding-left: 3px;outline: 1px solid #ccc;" title="Màu nâu">
					 <input class="minimal" type="checkbox" name="mausac_nau" value="ON" <? if ($mausac_nau>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <label style="background: #ffff00;padding-left: 3px;outline: 1px solid #ccc;" title="Màu Vàng">
                        <input class="minimal" type="checkbox" name="mausac_vang" value="ON" <? if ($mausac_vang>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;
					   <label style="background: #ffffff;padding-left: 3px;outline: 1px solid #ccc;" title="Màu trắng">
                        <input class="minimal" type="checkbox" name="mausac_trang" value="ON" <? if ($mausac_trang>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;
					<label style="background: #000000;padding-left: 3px;outline: 1px solid #ccc;" title="Màu đen">
                       <input class="minimal" type="checkbox" name="mausac_den" value="ON" <? if ($mausac_den>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;
					<label style="background: #ff00ff;padding-left: 3px;outline: 1px solid #ccc;" title="Màu hồng">
                        <input class="minimal" type="checkbox" name="mausac_hong" value="ON" <? if ($mausac_hong>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;
					<label style="background: #00ff00;padding-left: 3px;outline: 1px solid #ccc;" title="Màu xanh lá">
                         <input class="minimal" type="checkbox" name="mausac_xanhla" value="ON" <? if ($mausac_xanhla>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;
					<label style="background: #0080ff;padding-left: 3px;outline: 1px solid #ccc;" title="Màu nước biển">
                         <input class="minimal" type="checkbox" name="mausac_xanhnuocbien" value="ON" <? if ($mausac_xanhnuocbien>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;
					<label style="background: #00ffff;padding-left: 3px;outline: 1px solid #ccc;" title="Màu xanh ngọc">
                        <input class="minimal" type="checkbox" name="mausac_xanhngoc" value="ON" <? if ($mausac_xanhngoc>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;			
					<label style="background: #112c4e;padding-left: 3px;outline: 1px solid #ccc;" title="Màu xanh đen">
                           <input class="minimal" type="checkbox" name="mausac_xanhden" value="ON" <? if ($mausac_xanhden>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;
					<label style="background: #999999;padding-left: 3px;outline: 1px solid #ccc;" title="Màu xám">
                        <input class="minimal" type="checkbox" name="mausac_xam" value="ON" <? if ($mausac_xam>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;
					<label style="background: #800080;padding-left: 3px;outline: 1px solid #ccc;" title="Màu tím">
                        <input class="minimal" type="checkbox" name="mausac_tim" value="ON" <? if ($mausac_tim>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;	
					<label style="background: #ff0000;padding-left: 3px;outline: 1px solid #ccc;" title="Màu đỏ">
                         <input class="minimal" type="checkbox" name="mausac_do" value="ON" <? if ($mausac_do>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;
					<label style="background: #ff8040;padding-left: 3px;outline: 1px solid #ccc;" title="Màu cam">
                       <input class="minimal" type="checkbox" name="mausac_cam" value="ON" <? if ($mausac_cam>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;	
					<label style="background: #fef1ce;padding-left: 3px;outline: 1px solid #ccc;" title="Màu kem">
                        <input class="minimal" type="checkbox" name="mausac_kem" value="ON" <? if ($mausac_kem>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;
					<label style="background: #0522c5;padding-left: 3px;outline: 1px solid #ccc;" title="Màu xanh dương">
                        <input class="minimal" type="checkbox" name="mausac_xanhduong" value="ON" <? if ($mausac_xanhduong>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;
					<label style="background: url(/images/mul-color.gif) center center no-repeat;padding-left: 3px;outline: 1px solid #ccc;" title="Màu sọc">
                        <input class="minimal" type="checkbox" name="mausac_soc" value="ON" <? if ($mausac_soc>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;	
					<label style="background: #007000;padding-left: 3px;outline: 1px solid #ccc;" title="Màu xanh lá đậm">
                        <input class="minimal" type="checkbox" name="mausac_xanhladam" value="ON" <? if ($mausac_xanhladam>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;	
					<label style="background: url(/images/floral.jpg) center center no-repeat;padding-left: 3px;outline: 1px solid #ccc;" title="Màu họa tiết">
                         <input class="minimal" type="checkbox" name="mausac_hoatiet" value="ON" <? if ($mausac_hoatiet>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;		
					<label style="background: #cccccc; center center no-repeat;padding-left: 3px;outline: 1px solid #ccc;" title="Màu bạc">
                        <input class="minimal" type="checkbox" name="mausac_bac" value="ON" <? if ($mausac_bac>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;	
					<label style="background: #ffc0cb; center center no-repeat;padding-left: 3px;outline: 1px solid #ccc;" title="Màu hồng phấn">
                         <input class="minimal" type="checkbox" name="mausac_hongphan" value="ON" <? if ($mausac_hongphan>"1") echo 'checked' ?>>
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;
					
					
					
					
					
                  </div>

                 

  <div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">×</span>
      <h2>CHỌN NGÀNH HÀNG</h2>
    </div>
    <div class="modal-body">
<div class="box box-info">
       
			 
            <!-- /.box-header -->
            <!-- form start -->
			 
	 
            <form class="form-horizontal"   method="POST"   >
              <div class="box-body">
                 
                
				
				 <div class="form-group" style="
    margin-right: 0px;
    margin-left: 0px;
">
                <label>Nhập tên ngành hàng</label>
 
<?
		$caaaa=mysql_query("SELECT * FROM cat where id='".$_REQUEST['cat']."' ");
	$cataddd=mysql_fetch_assoc($caaaa);
	
		$caaaa2=mysql_query("SELECT * FROM products where id='".$_REQUEST['id']."' ");
	$cataddd2=mysql_fetch_assoc($caaaa2);	
	
			$caaaa3=mysql_query("SELECT * FROM cat where id='".$cataddd2['cat']."' ");
	$cataddd3=mysql_fetch_assoc($caaaa3);
	?>
 
<select name="cat" class="form-control select2" style="width: 100%;" onchange="this.form.submit()" >

<?php
if($_REQUEST['cat']=="")
{?>
<option value="<? echo $cataddd3['id'];?>" selected><? echo $cataddd3['name'];?></option>
<?}else{?>
 						<option value="<? echo $_REQUEST['cat'];?>" selected><? echo $cataddd['name'];?></option>
<?}?>	

						<? $timkiem=mysql_query("SELECT * FROM cat order by name desc");
						while($row_timkiem=mysql_fetch_array($timkiem))
						{?>
						<option value="<? echo $row_timkiem['id'];?>"><? echo $row_timkiem['name'];?></option>
						<?}?>
						</select>
             
              </div>
				 
              
				 
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
 
              
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
    </div>
 
  </div>

</div>               





	
                  </div>
				  
				   
				  
                </div>

				

              </div>
<div class="box-body">
                <div class="form-group" style="margin-bottom: 12px;">
                  <label class="col-sm-2 control-label" style="margin-top: 10px;margin-left: -14px;">Kích thước (Nếu có)</label>

                  <div class="col-sm-10"style="margin-left: 8px;">
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
                  </div>
				  <div class="col-sm-10"style="margin-left: 8px;margin-top: -216px;margin-left: 305px;">
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
				   <div class="col-sm-10"style="margin-left: 8px;margin-top: -216px;margin-left: 405px;">
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
				   <div class="col-sm-10"style="margin-left: 8px;margin-top: -216px;margin-left: 505px;">
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
				   <div class="col-sm-10"style="margin-left: 8px;margin-top: -216px;margin-left: 605px;">
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
				   <div class="col-sm-10"style="margin-left: 8px;margin-top: -216px;margin-left: 705px;">
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
				  
                </div>

				

              </div>
            <!-- /.box-body -->
          </div>
	  <div class="box box-warning" >
            <div class="box-header with-border">
              <h3 class="box-title">Mô tả chi tiết sản phẩm</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
           <textarea id="desc" name="noidung" cols="80" rows="10">
                          <? echo $desc; ?></textarea>
	        				 <script>
 
           CKEDITOR.replace( 'noidung' );
 
       </script>  
            </div>
            <!-- /.box-body -->
          </div>
		  
		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">TỐI ƯU SEO TÌM KIẾM</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Từ khóa SEO</label>

                  <div class="col-sm-10">
                    <input name="tukhoaseo" type="text" class="form-control"  value="<? echo $tukhoaseo; ?>" maxlength="160" placeholder="Từ khóa SEO tối ưu tìm kiếm cách nhau dấu , nhập từ khóa có dấu và không dấu để tối ưu hiệu quả tiềm kiếm">
                  </div>
                </div>
				<br>
				<br>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tiêu đề SEO</label>

                  <div class="col-sm-10">
                    <input name="tieudeseo" type="text" class="form-control"  value="<? echo $tieudeseo; ?>" maxlength="130" placeholder="Tiêu đề SEO hiển thị ở Google">
                  </div>
                </div>
					<br>
				<br>
				 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Mô tả SEO</label>

                  <div class="col-sm-10">
                    <textarea name="motaseo" type="text" class="form-control"  maxlength="260" placeholder="Mô tả SEO ở Google"><? echo $motaseo; ?></textarea>
                  </div>
                </div>
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                 
                      </label>
                    </div>
                  </div>
              </div>
              <!-- /.box-body -->
              
              <!-- /.box-footer -->

          </div>    
		
      <!-- /.row -->
    </section>
	
	
	<!-- káº¿t thĂºc concetn-->
	
	
	
	
	
  </tr>
  
   <tr>
        <td colspan="2" class="smallfont">
		<div style="padding-left:36%;    margin-bottom: 18px;">
		<INPUT TYPE="submit" NAME="butSaveLoai" VALUE="Đăng sản phẩm" class="btn btn-block btn-danger btn-lg" style="width: 38%;" onclick="submitForm()">
		
		<!--INPUT TYPE="reset" class="btn btn-block btn-warning btn-lg" value="Nh&#7853;p l&#7841;i"-->
		</div>
		
		</td>
		
      </tr>
  </table>
  
</form>
 



 <?}
else{?>
<meta http-equiv="refresh" content="0;/">
<?}?>






<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<script>
var inputnumber = 'Giá trị nhập vào không phải là số';
	function FormatNumber(str) {
		var strTemp = GetNumber(str);
		if (strTemp.length <= 3)
			return strTemp;
		strResult = "";
		for (var i = 0; i < strTemp.length; i++)
			strTemp = strTemp.replace(",", "");
		var m = strTemp.lastIndexOf(".");
		if (m == -1) {
			for (var i = strTemp.length; i >= 0; i--) {
				if (strResult.length > 0 && (strTemp.length - i - 1) % 3 == 0)
					strResult = "," + strResult;
				strResult = strTemp.substring(i, i + 1) + strResult;
			}
		} else {
			var strphannguyen = strTemp.substring(0, strTemp.lastIndexOf("."));
			var strphanthapphan = strTemp.substring(strTemp.lastIndexOf("."),
					strTemp.length);
			var tam = 0;
			for (var i = strphannguyen.length; i >= 0; i--) {

				if (strResult.length > 0 && tam == 4) {
					strResult = "," + strResult;
					tam = 1;
				}

				strResult = strphannguyen.substring(i, i + 1) + strResult;
				tam = tam + 1;
			}
			strResult = strResult + strphanthapphan;
		}
		return strResult;
	}

	function GetNumber(str) {
		var count = 0;
		for (var i = 0; i < str.length; i++) {
			var temp = str.substring(i, i + 1);
			if (!(temp == "," || temp == "." || (temp >= 0 && temp <= 9))) {
				alert(inputnumber);
				return str.substring(0, i);
			}
			if (temp == " ")
				return str.substring(0, i);
			if (temp == ".") {
				if (count > 0)
					return str.substring(0, ipubl_date);
				count++;
			}
		}
		return str;
	}

	function IsNumberInt(str) {
		for (var i = 0; i < str.length; i++) {
			var temp = str.substring(i, i + 1);
			if (!(temp == "." || (temp >= 0 && temp <= 9))) {
				alert(inputnumber);
				return str.substring(0, i);
			}
			if (temp == ",") {
				return str.substring(0, i);
			}
		}
		return str;
	}
</script>