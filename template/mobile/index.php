<? if(!session_id()) session_start(); ?>
<?include("template/mobile/module/online.php");?>
<?
$sql_ct=mysql_query("SELECT * FROM cat_mem where user='".$user."' and parent=17 ");
$sql1=mysql_query("SELECT * FROM user_shop where user='".$user."'");
$sql_visit=mysql_query("update user_shop set visit=visit+1 where user='".$user."' ");
$row1=mysql_fetch_assoc($sql1);
$sql_config_mem=mysql_query("SELECT * FROM config_mem where user='".$user."' ");
$row_config_mem=mysql_fetch_assoc($sql_config_mem);
$sql_popup=mysql_query("SELECT * FROM popup where user='".$user."' ");
$row_popup=mysql_fetch_assoc($sql_popup);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi" xml:lang="vi">
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<META name=keywords content="<? echo $row1['company'];?>">
<META name=description content="<? echo $row1['mieuta'];?>">
<META name=abstract content="qq">
<META name=robots content="index, follow">
<META name=copyright content="<? echo $row1['company'];?>">
<META name=Title content="<? echo $row1['google_seo'];?>">
   <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="quantri/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="quantri/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="quantri/css/ionicons.min.css">
  <script type="text/javascript" src="/js/jquery.min.js"></script>
  	<!-- Pace style -->
  <link rel="stylesheet" href="/quantri/plugins/pace/pace.min1.css">
  <!-- PACE -->
<script src="/quantri/plugins/pace/pace.min.js"></script>
<META content=General http-equiv=audience>
<META name=resource-type content=Document>
<META name=distribution content=Global>
<META name=revisit-after content="1 day">
<META name=reply-to content=quocnd82@gmail.com>
<base href="https://<? echo $_SERVER['SERVER_NAME'];?>"/>
<link rel="stylesheet" href="template/mobile/images/style.css" type="text/css">
<link rel="stylesheet" href="template/mobile/images/item.s-shop.css" type="text/css">
<link rel="stylesheet" type="text/css" href="js/System_Tooltip.css" />

<title><? include("template/mobile/module/tittle.php");?>&nbsp;<? echo $row1['company'];?></title>
</head>
<body background="<? echo $row1['background'];?>">
<?if($row_config_mem['popup_center']=='1')
{?>
<?include("popup/popup.php");?>
<?}else{?>
<?}?>
<?if($row_config_mem['popup_slider']=='1')
{?>
<?include("popup/ads_slider.php");?>
<?}else{?>
<?}?>



 <div id="top-head" >
 <script type="text/javascript">
		$(document).ready(function() {
			/*
			*   Examples - images
			*/

			 
			
			
			
				$("#xemnhanhsp").fancybox({

				'width'				: '1100px',
				'height'			: '1100px',
				'autoScale'			: true,
				'transitionIn'		: '11',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});
		 
		});
	</script>
	
	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="quantri/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="quantri/source/jquery.fancybox.css?v=2.1.5" media="screen" />	
	
	
	
  
 
 
 

   <div class="top-head-cont util-clearfix">
      <div class="h-left">
         <!--category-->
       
         <a class="logo" href="/" target="_blank" itemprop="url" title="SHOPCANTHO.VN - Mua sắm trực tuyến uy tín số 1 trong giao dịch, giá tốt nhất thị trường">
             <img itemprop="logo" src="/images/banner/logo_home.png" alt="SHOPCANTHO.VN - Mua sắm trực tuyến uy tín số 1 trong giao dịch, giá tốt nhất thị trường" title="SENDO.VN - Mua sắm trực tuyến uy tín số 1 trong giao dịch, giá tốt nhất thị trường"/> 
          </a>
      </div>   
      <div class="h-right">
         <!--box link-->
         <div class="box-info-shop">
          <div class="box-link login-roi" id="Notify-controller">
           
		   <div class="box-l-c cart" >
		
                <div class="box box-link-svg shopping_cart_modal btn-view-cart" title="Giỏ hàng"  >
<a id="xemnhanhsp" href="./cart_popup.html"> <i class="fa fa-shopping-cart"   style="color: #fffff;font-size: 29px;color: #197d08;"></i>
                 <!--  <span class="tl">Giỏ hàng </span>  -->
                  <b class="cart_qty">
				   
  <? if($_SESSION['mem']=='')
{?>
0
<?} else{?>
 <? echo mysql_num_rows(mysql_query("SELECT * FROM orders where user_mem='".$_SESSION['mem']."' and kichhoat='0	' "));?>
<?}?>

				  
				  </b></a>
				
				
				
                 
                </div>

            </div>
             <div class="box-l-c cart" >
		
                <div class="box box-link-svg shopping_cart_modal btn-view-cart" title="Giỏ hàng"  >
				<a  target="_blank" href="/thongbao.html"> <i class="fa fa-bell-o"   style="color: #fffff;font-size: 29px;color: #197d08;"></i>
                 <!--  <span class="tl">Giỏ hàng </span>  -->
                 <b class="cart_qty">
  <? if($_SESSION['mem']=='')
{?>
0
<?} else{?>
 <? echo mysql_num_rows(mysql_query("SELECT * FROM thongbao where user='".$_SESSION['mem']."' and active='0	' "));?>
<?}?>				 

				 
				 </b></a></a>
                 
                </div>

            </div>
           
          </div>
        </div>
        <!--box login-->
         <div class="login_box"  >
           
            
    <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=835438139859194";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>       
             
            	    <div  class="fb-like"style="
    margin-top: 10px;
    margin-left: 20px;
" data-href="https://facebook.com/shopcantho.vn" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
          
              
         
            
             
			
        </div>
      </div>
       <!--search bar -->
      <div class="h-middle">
       
<div class="search-bar">
<form name="form_select" method="GET" action="./store.aspx?user=<? echo $user;?>">
        <div class="searchbar-operate-box">
            <div id="search-cate" class="search-category hidden-sm notranslate">
			<input type="hidden" name="user" value="<? echo $user;?>">
                <div class="selectBox" id="selectbox">
                     
                   
                   
                </div>                
            </div>
		<input type="hidden" name="act" value="search">
<input type="hidden" name="home" value="search">
            <button id="search-btn" name="search"  type="submit" class="search-btn" title="Tìm Kiếm">
			<i class="fa fa-search" "="" style="font-size: 22px;color: #ffffff;"></i>
			
			</button>
			
        </div>
        <div class="search-key-box">
            <input id="search_keyword" name="keywords" value="" placeholder = "Nhập từ khoá tìm kiếm" type="text" class="search-txt" />
           <input type="hidden" name="user" value="<? echo $user;?>">
        </div>
        <div class="search-autocomplete" id="search_autocomplete" ></div>
    </form>
</div>



      </div> 
   </div>
  </div>
</div>
<div id="page">
<div >

<div class="header-shop util-clearfix">
        <div class="header-left" style=" margin-top: -20px; ">
			            <h1 class="logo-shop"><a title="<?php echo $row1['commany'];?>" href="<?echo $user;?>">
						
						 <? if($row1['logo']=='')
{?>
<img style=" max-height: 94px; max-width: 104px; "  src="/images/shop.jpg"  class="user-image" alt="User Image">
<?} else{?>

<img style=" max-height: 94px; max-width: 104px; "   src="/<? echo $row1['logo'];?>" class="user-image" alt="User Image">
<?}?>
						
						
						
						
						</a> </h1>
            <div class="shop-info">
                <h1><a title="<?php echo $row1['commany'];?>" class="name-shop shop_color" href="<?echo $user;?>"><? echo $row1['company'];?></a></h1>
                <span class="desc-shop">
				"<?php echo dwebvn($row1['slogan'],20);?>"
				</span>
				
               
				                <div class="box-ship " >
                	                <i class="fa fa-fw fa-clock-o" style="font-size: 14px;"></i><b>Ngày hoạt động:</b> <?php echo $row1['re_time'];?>
                   
                    <div class="info-box-ship" style="background: green;color: #fff;border-radius: 13px;">
						<span>Ngày <?php echo $row1['company'];?> chính thức được kích hoạt và bán hàng trên ShopCanTho.Vn</span>                    </div>
                                    </div>
									
									
				                <div class="box-ship " >
                	                <i class="fa  fa-cubes" style="font-size: 14px;"></i><b> Lượt xem: </b>
									<?if($row_config_mem['static']=='0')
{?>
<?php total(); ?>
<?}else{?>
<?}?>
									
									
                   
                    <div class="info-box-ship" style="background: green;color: #fff;border-radius: 13px;">
						<span>Tổng lượt xem gian hàng của <?php echo $row1['company'];?></span>                    </div>
                                    </div>
									
				                <div class="box-ship " >
                	                <i class="fa  fa-database" style="font-size: 14px;"></i><b> Sản phẩm:</b> <? echo mysql_num_rows(mysql_query("SELECT * FROM products where user='".$user."' "));?>
                   
                    <div class="info-box-ship" style="background: green;color: #fff;border-radius: 13px;">
						<span>Tổng sản phẩm của  <?php echo $row1['company'];?></span>                    </div>
                                    </div>
						 

								            </div>
        </div>
        <div class="header-right">
			<div class="box-share">
			
<?php if($row1['level_shop']=='0'){?>
<img src="/images/shopluado.png" style="/* height: 76px; */position: absolute;left: 809px;top: 1px;" title="Chứng nhận Shop uy tín bảo vệ người mua hàng">
<?}else{?>
<?}?>
                
				
				
				
                <div class="box-g">
                    <!-- Place this tag where you want the +1 button to render. -->
              

                </div>
            </div>
            <div class="btn_for_shop">
                   
                
                    <!--<button id="various1" class="gtn msgToShop shop_color_hover" type="button" href="localhost" >
                    	<span >
                    		  <i class="fa  fa-send" style="font-size: 14px;"></i>
                    		Gửi tin nhắn
                    	</span>
                    </button-->
				
                    <div class="ajax-load-qa">&nbsp;</div>
                </div>
				
				
				<?
// xóa ảnh 1 baner
if (isset($_POST['yeuthichshop'])) {
	$id_shop = $_POST['id_shop'];


	

			
	
	$sql1111 = "INSERT INTO po_tick_shop (user,id_shop) VALUES ('".$_SESSION['mem']."','".$id_shop."')";
		if (mysql_query($sql1111)) {
			
			
				echo "<SCRIPT LANGUAGE='JavaScript'>
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

// xóa ảnh 1 baner
if (isset($_POST['huyyeuthich'])) {
	$id_shop_huy = $_POST['id_shop_huy'];


	

			
	
	$sql1111 = "delete from po_tick_shop where id='".$id_shop_huy."'";
		if (mysql_query($sql1111)) {
			
			
				echo "<SCRIPT LANGUAGE='JavaScript'>
   
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
?>
<form method="POST" >		
<div class="btn_for_shop">
                  
       		
         <!--tick-->
						
							
							
	<?php 
    $sql_user12=@mysql_query("SELECT * FROM po_tick_shop where id_shop='".$row1['id']."'  ");
    $row_tick2=@mysql_fetch_assoc($sql_user12);
    ?>	
	<?php 
    $sql_user1=@mysql_query("SELECT * FROM po_tick_shop where id='".$row_tick2['id']."'  ");
    $row_tick=@mysql_fetch_assoc($sql_user1);
    ?>	 
	
 
 <?php if($_SESSION['mem']=='')
 {?>
   <button class="shop_color_hover" type="button"  id="btn_fav_shop">
                    	<span class="fav shop_color_hover" title="Shop được yêu thích" id="text-fav-shop" style=" padding: 4px; ">
                    		<i class="fa fa-fw fa-heart-o"></i>
				Chưa đăng nhập
				 </span>
                    	</button>
 
 <?}else{?>
 <span  >		

 <?php if($row1['id']==$row_tick['id_shop'] && $row_tick2['user'] == $_SESSION['mem'] )
 {?>

         <input  type="hidden" name="id_shop_huy" value="<? echo $row_tick['id'];?>" >
		   <button class="shop_color_hover" type="submit" name="huyyeuthich"   >
                    	<span class="fav shop_color_hover" title="Yêu thích shop"  style=" padding: 4px; ">
                    		<i class="fa fa-fw fa-heart-o"></i>
			Hủy yêu thích
				 </span>
                    	</button>
 <?}else{?>

         <input  type="hidden" name="id_shop" value="<? echo $row1['id'];?>" >
		   <button class="shop_color_hover" type="submit" name="yeuthichshop"   >
                    	<span class="fav shop_color_hover" title="Yêu thích shop"  style=" padding: 4px; ">
                    		<i class="fa fa-fw fa-heart-o"></i>
			Yêu thích
				 </span>
                    	</button>
 <?}?>
   <!--button class="shop_color_hover" type="button" href="<?php echo "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>" id="btn_fav_shop">
                    	<span class="fav shop_color_hover" title="Shop được yêu thích" id="text-fav-shop" style=" padding: 4px; ">
                    		<i class="fa fa-fw fa-heart-o"></i>
				 Hủy yêu thích
				 </span>
                    	</button-->

		



			
			
	
 </span>
 <?}?>
                    	</span>
                    	</button>
						
                    <span class="fav-c" style=" padding: 4px; ">
<? echo mysql_num_rows(mysql_query("SELECT * FROM po_tick_shop where id_shop='".$row1['id']."' "));?></span>
                     
					<button class="gtn msgToShop shop_color_hover" type="button" data-toggle="modal" data-target="#modalMessage">
                    	<span class="fav shop_color_hover" title="Shop được yêu thích" id="text-fav-shop" style=" padding: 4px; ">
                    		<i class="fa fa-fw fa-phone"></i>
				 <? echo $row1['phone'];?>
				 </span>
                    </button>
                    <div class="ajax-load-qa">&nbsp; </div>
					
                </div>
				
				</form>
				
            <div class="cls">&nbsp;</div>
			
            <div class="box-div-cylce">
                <div class="rate">
				
<?php
$sql_con1=@mysql_query("SELECT * FROM comment where user='".$row['user']."' ");
$tong_con1=@mysql_num_rows($sql_con1);
$cnt1=0;
$tongcong1=0;
while($row_con1=mysql_fetch_assoc($sql_con1))
{
?>
<?
$tongcong1=$tongcong1+$row_con1['rate'];
$trungbinh1=$tongcong1/$tong_con1;
$cnt1=$cnt1+1;
}?>				
				
					<b>Điểm uy tín shop: <?echo $tongcong1;?></b>              

<?php if($tongcong1>='1' & $tongcong1<'20')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="glyphicon glyphicon-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($tongcong1>='20' & $tongcong1<'30')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="glyphicon glyphicon-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>



<?php if($tongcong1>='30' & $tongcong1<'40')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="glyphicon glyphicon-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($tongcong1>='40' & $tongcong1<'60')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="glyphicon glyphicon-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($tongcong1>='60' & $tongcong1<'80')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="glyphicon glyphicon-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;

<?}
else{?><?}?>

<?php if($tongcong1>='80' & $tongcong1<'200')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="glyphicon glyphicon-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($tongcong1>='200' & $tongcong1<'500')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="glyphicon glyphicon-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($tongcong1>='500' & $tongcong1<'1000')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="glyphicon glyphicon-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: #FFA303;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($tongcong1>='1000' & $tongcong1<'2000')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($tongcong1>='2000' & $tongcong1<'5000')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($tongcong1>='5000' & $tongcong1<'10000')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($tongcong1>='10000' & $tongcong1<'30000')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($tongcong1>='30000' & $tongcong1<'100000')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($tongcong1>='100000' & $tongcong1<'500000')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($tongcong1>='500000' & $tongcong1<'1200000')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($tongcong1>='1200000' & $tongcong1<'6000000')
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;
<?}
else{?><?}?>


<?php if($tongcong1>='6000000' )
{?>
<i title="Biểu tượng cho điểm số uy tín của shop" class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;<i class="glyphicon glyphicon-fire" style="color: red;font-size: 19px;"></i>&nbsp;
<?}
else{?><?}?>

<b><?echo round($trungbinh1*20,2);?>% </b>



					</div>
            </div>
        </div>
    </div>


</div>

<div id="banner">


<!-- end cart ---->
<? if($row1['banner']=='')
{?>


<?} else{?>
<? if(substr($row1['banner'],-4,4)=='.swf')
	{?>
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0"
width="994" id="banner" align="">
<param name=movie value="<? echo $row1['banner'];?>"><param name=quality value=high>
<embed src="<? echo $row1['banner'];?>" quality=high  width="<?echo $row1['w'];?>" height="<?echo $row1['h'];?>" name="banner" align="center"
type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer">
</embed></object>
<?} else{?>
<img src="<? echo $row1['banner'];?>"  style="max-width: 1212px;"> 
<?}?>

<?}?>
</div>


<div id="menu_top">
<!--begin menu top-->

<li class="menu_top_active">
<a <? if($_REQUEST['user']=='.$user.')
{
	echo "class=menu_top_li_active";
} 
else
{
	echo "class=menu_top_li_link";
}?> href="./<?echo $user;?>">Trang chủ Shop</a>
</li>

<?
	$sql_menu=mysql_query("SELECT * FROM menu_mem where user='".$user."' order by thutu asc ");
while($row_menu=mysql_fetch_array($sql_menu))
	{?>
<li class="menu_top_li_bd">
<a <? if($_REQUEST['id']==$row_menu['id'])
{
	echo "class=menu_top_li_active";
} 
else
{
	echo "class=menu_top_li_link";
}?> href="./<?echo $user;?>/<?if($row_menu['link']==''){?>./<? echo $row_menu['id'];?>/<? echo str_replace($marTViet,$marKoDau,$row_menu['name']);?>.html<?}else{?>./<?echo $user;?>/<? echo $row_menu['link'];?><?}?>"><? echo $row_menu['name'];?></a>
</li>
<?}?>

<li class="menu_top_li_bd">
<a <? if($_REQUEST['home']=='map')
{
	echo "class=menu_top_li_active";
} 
else
{
	echo "class=menu_top_li_link";
}?> href="./store.aspx?user=<?echo $user;?>&cat_id=&act=search&home=search&search=&keywords=&user=<?echo $user;?>">Sản phẩm</a>
</li>
<!--li class="menu_top_li_bd">
<a <? if($_REQUEST['home']=='request')
{
	echo "class=menu_top_li_active";
} 
else
{
	echo "class=menu_top_li_link";
}?> href="./<?echo $user;?>/hoi-dap.html">Hỏi đáp</a>
</li>
<li class="menu_top_li_bd">
<a <? if($_REQUEST['home']=='contact')
{
	echo "class=menu_top_li_active";
} 
else
{
	echo "class=menu_top_li_link";
}?> href="./<?echo $user;?>/lien-he.html">Đánh giá/phản hồi</a>
</li>

<li class="menu_top_li_gt">
<a <? if($_REQUEST['home']=='about')
{
	echo "class=menu_top_li_active";
} 
else
{
	echo "class=menu_top_li_link";
}?> href="./<?echo $user;?>/lien-he.html">Thông tin Shop</a>
</li-->






<!-- end menu top-->
</div>




<div id="content">








<? if($_REQUEST['home']=='')
{?>
<div id="pro_home">
<!-- begin san pham home-->

<div class="pro_home_cat">
<? include("template/mobile/module/pro_noibat.php");?>
</div>





<div class="pro_home_cat">
<? include("template/mobile/module/pro_moinhat.php");?>
</div>






<div class="space_home_pro">
</div>
<!-- end san pham home -->
</div>


<?} else{?>
<div id="pro_home">
<? include("template/mobile/module/frame.php");?>
</div>
<?}?>



<br>
<br>
</div>
<br>
<center style=" color: red; font-size: 30px; "><?php echo $row1['company'];?> </center>
<br>
 <center style=" color: blue; font-size: 22px; ">Điện thoại: <?php echo $row1['phone'];?> </center>
 <br>
 <center style=" color: blue; font-size: 22px; ">Địa chỉ: <?php echo $row1['address'];?> </center>
  <br>
 <center style=" color: blue; font-size: 22px; ">Email: <?php echo $row1['email'];?> </center>
<br>
<br>



<!-- begin popup login-->

<style type="text/css">
#wrapper{
    width: 100%;
    margin: 0px auto;
    border: 1px solid #C0C0C0;
	background-color:#FFFFFF;
}
.show_hiden{
    margin: 0px;
	padding-bottom:0px;
}
.show_hiden .bang{
    display: none;
}
.show_hiden .tr{
	padding-top:2px;
	width:120px;
	float:left;
	font-size:11px;
}
.show_hiden .td{
	width:130px
}
.button
{
width:50px;
padding-left:20px;
height:31px;
background-image: url('./images/up.jpg');
background-repeat: no-repeat;
color:#0054CB;
cursor:pointer;
background-color: transparent;
border:0px;
}
.aquenmatkhau
	{
	font-size:7px;
	color:#0055CC;
	text-decoration:none;
    }
.dangnhap
{
	width:86px;
	height:25px;
	background-image: url('./images/login.jpg');
	background-color: transparent;
	border:0px;
	cursor: pointer;
}
</style>

    <!-- Popup Footer -->
	<?php
if(isset($_POST['ok']))
{
$u=$p="";
 if($_POST['username'] == NULL)
 {
  echo "Chưa nhập tên đăng nhập<br />";
 }
 else
 {
  $u=$_POST['username'];
 }
 if($_POST['password'] == NULL)
 {
  echo "Chưa nhập mật khẩu<br />";
 }
 else
 {
  $p=$_POST['password'];
 }
 if($u && $p)
 {
  $sql="select * from user_shop where user='".$u."' and pass='".$p."'";
  $query=mysql_query($sql);
  if(mysql_num_rows($query) == 0)
  {
   echo "Tên đăng nhập hoặc mật khẩu chưa đúng";
  }
  else
  {
   $row=mysql_fetch_array($query);
   $_SESSION['log'] = $row['user'];
   $_SESSION['level'] = $row['level_shop'];
 
  }
 }
}
?>
   


<!-- end popup login-->





</div>


    <div id="footer">
	<link rel="stylesheet" href="/style/css1.css">
	    <div class="d-footer">
    	    <ul class="ul-footer">
<?php
$sql_info_cat=mysql_query("SELECT * FROM help_cat where status=1 order by thutu limit 4");
for($i=1;$i<=4&&$row_info_cat=mysql_fetch_array($sql_info_cat);$i++)
{
if($i=='1')
{
$div="first";
}
else
{
$div="";
}
?>
        	    <li class="<?php echo $div;?>">
            	    <h4><?php echo $row_info_cat['name'];?></h4>
            	    <ul class="ul-group-footer <?php echo $div;?>">
<?php
$sql_info=mysql_query("SELECT * FROM help where cat_id='".$row_info_cat['id']."' order by thutu limit 4 ");
while($row_info=mysql_fetch_array($sql_info))
{?>
<li><a title="<?php echo $row_info['name'];?>" href="http://localhost/help/<?php echo doidau(mb_strtolower($row_info['name'],"UTF8"));?>-vh-<?php echo $row_info['id'];?>-<?php echo $row_info['cat_id'];?>.html"><?php echo $row_info['name'];?></a></li>
<?}?>
                    </ul>
                </li>
<?}?>
            </ul>
        
                
    </div>




</div>


</body>
</html>