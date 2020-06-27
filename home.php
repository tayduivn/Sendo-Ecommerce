<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="">
<head id="ctl00_Head1">

    <meta http-equiv="content-type" content="text/html; charset=utf8" />
	<meta http-equiv="content-language" content="vi" />
	<META name= "title" content="<?php include("system/model/title.php");  echo "  ". $title_mt;?>">
	<meta name="description" content="Mua bán thời trang nam nữ, mẹ và bé, phụ kiện công nghệ, gia dụng...khuyến mãi hấp dẫn, vận chuyển toàn quốc. Sàn TMĐT chính thức của công ty KEYMOU."/>
    <meta name="keywords" content="gian hang can tho, mo shop can tho,mua bán thời trang, shop thời trang, mua sắm trực tuyến, mua sắm online, phu kien cong nghe,mua bán thời trang can tho, shop thời trang can tho, mua sắm trực tuyến can tho, mua sắm online can tho, phu kien cong nghe can tho "/>
	<META name="robots" content="noodp,index,follow">
	<META name="revisit-after content"="1 days">
	<meta name="copyright" content="Copyright (C) DANASTAR COMPANY" />
	
    <meta name="geo.placename" content="Vietnamese">
    <meta name="geo.region" content="VN">
    <meta name="msvalidate.01" content="956500EE46911FC4B5244B34305AF4D1">

	<meta property="og:title" content="<?php echo $title_fb; ?>" />
	<meta property="og:description" content="<?php echo $description_fb; ?>" />
	<meta property="og:image" content="<?php echo "http://www.".$home['domain']."/".$image_fb;?>"/>
	<meta property="og:url" content="<?php echo "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>" />
	
    <title><?php include("system/model/title.php");echo "  ". $title_mt;?></title>
 

<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<link href="style/bootstrap.css" rel="stylesheet" type="text/css">
<link href="style/font-awesome.css" rel="stylesheet" type="text/css">
<link href="style/style_new.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="style/css.css">
<link rel="stylesheet" href="style/top.css">

 
    <script type="text/javascript" async="" src="./temp/platform.js" gapi_processed="true"></script>

  <link rel="stylesheet" href="style/timkiemsanpham.css">
  <script src="/js/jquery-1.10.2.js"></script>
  <script src="/js/jquery-ui.js"></script>





	
    <script type="text/javascript" src="./temp/jquery.jcarousel.min.js"></script>  
	
	
 <!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="/quantri/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="/quantri/source/jquery.fancybox.css?v=2.1.5" media="screen" />
	
	
    <script type="text/javascript" src="./temp/jquery.jcarousel-autoscroll.min.js"></script>
	 <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="quantri/plugins/iCheck/all.css">
    <script type="text/javascript" src="./temp/jquery.jcarousel.basic.js"></script>
	<!-- Pace style -->
  <link rel="stylesheet" href="/quantri/plugins/pace/pace.min1.css">
  <!-- PACE -->
    <!-- Bootstrap 3.3.6 -->
  <!-- Font Awesome -->

  <!-- Ionicons -->

  <!-- jvectormap -->
  <link rel="stylesheet" href="/quantri/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="/quantri/plugins/colorpicker/bootstrap-colorpicker.min.css">
   <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="/quantri/plugins/iCheck/all.css">
  <!-- Theme style -->

 
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
	   
	   

	
	
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
 
  ga('create', 'UA-59479955-2', 'auto');
  ga('send', 'pageview');
 
</script>	
	
<script src="/quantri/plugins/pace/pace.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {


			$("#xemsanpham").fancybox({
				'width'				: '1100px',
				'height'			: '1100px',
				'autoScale'			: false,
				'transitionIn'		: 'fade',
				'transitionOut'		: 'fade',
				'type'				: 'iframe',
				'opacity'				: 'false',
			});
			
		
		
			

		});
	</script>
 



    <title><?php if($_REQUEST['home']==''){?><?php echo $row_config['title'];?><?}else{?><?}?> <?php include("system/model/title.php");?></title>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.fancybox-login').fancybox();

            $("#d-categories").hover(
                function () {
                    $(this).addClass("unfold-categories");
                },
                function () {
                    $(this).removeClass("unfold-categories");
                });
        });
    </script>
<style type="text/css">.fancybox-margin{margin-right:15px;}</style>

</head>
<body>
<!-- popup login -->
   <div id="login_form">

    <div id="login_all">
    <div ><a id="cancel_hide" class="fancybox-item fancybox-close" href="<?php echo "https://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>#"></a></div>
       
	  <p style="
    float: left;
    width: 100%;
    color: #0094da;
    font-size: 200%;
    font-weight: 700;
    text-align: center;
    padding: 20px 0;
    margin: 0;
">ĐĂNG NHẬP HỆ THỐNG</p>

    	<form action="system/home/login.php">
		 <div style="
    text-align: center;
    color: #F44336;
" id="add_err"></div>
        <div >
            <div >
            <div style="
    float: left;
    width: 100%;
    text-align: left;
    line-height: 18px;
    padding: 5px 0;
    margin: 8px 0 0;
">Tên đăng nhập:</div>
			<div ><input type="text" class="login_form_input" id="user_name"  name="user_name" style="width: 100%;"/></div>
            </div>
        </div>
        <div >
            <div >
            <div style="
    float: left;
    width: 100%;
    text-align: left;
    line-height: 18px;
    padding: 5px 0;
    margin: 8px 0 0;
">Mật khẩu:</div>
			<div ><input type="password" class="login_form_input" id="password_login"  name="password_login" style="width: 100%;" /></div>
            </div>
        </div>
        <div >
           <div>
            <a style="
    float: right;
    padding-top: 8px;
"  href="./quen-mat-khau.html">Quên mật khẩu?</a>
           </div>
        </div>
        <div >
           <div >
			<input class="login" type="submit" id="login" value="ĐĂNG NHẬP" />
		
           </div>
<div style="
    padding: 0px 0;
    line-height: 42px;
	margin-left: 34px;
    font-size: 12px;
"> <span>Bạn chưa có tài khoản?</span> <a  target="_blank" href="dang-ky-thanh-vien.html"  class="dkn" title="Đăng ký" style="
    color: #e5101d;
    font-weight: bold;
    margin-left: 86px;
    cursor: pointer;
">Đăng ký ngay</a> </div>
        </div>
		
		</form>
        </div>
    </div>
	<div id="shadow" class="popup_login"></div>
    <!--end popup login--> 
	
    <div id="bar">
	    <div class="d-bar">
    	    
           
			<ul style="float:right;">
<?php if(isset($_SESSION['mem'])){
			?>
   <li><a href="./thong-tin-tai-khoan.html" class="atop">Xin Chào : 
   
   
 
   
 <?php
		$products=mysql_query("SELECT Fullname,user FROM thanhvien where user='".$_SESSION['mem']."' ");
$products_check_tinhthanh=mysql_fetch_assoc($products);

 if($products_check_tinhthanh['Fullname'] =="" )
{?>
 <?php echo $_SESSION['mem'];?>		   
<?}else{?>
 <?php echo $products_check_tinhthanh['Fullname'];?>		
 <?}?>  
 
  

   </a>
   
    <ul>
                <li><a class="menuxo" href="./thong-tin-tai-khoan.html" ><i class="fa  fa-user" ></i> Thông tin tài khoản</a></li>
                <li><a class="menuxo" href="./quan-ly-don-hang.html"><i class="fa fa-tags" ></i> Theo dõi đơn hàng</a></li> 
				<li><a class="menuxo" href="./vi-diem-lua.html"><i class="fa fa-money" ></i> Ví điểm Lửa <span style="color: red;" class="glyphicon glyphicon-fire"></span></a></li>
				<li><a class="menuxo" href="./shop-yeu-thich.html"><i class="fa  fa-heart" ></i> Shop yêu thích</a></li>
				<!--li><a class="menuxo" href="./quantri"><i class="fa fa-envelope-o" ></i> Hộp thư</a></li-->
				<li><a class="menuxo" href="logout.php"><i class="fa fa-sign-out"></i> Thoát</a></li>

            </ul>
   
   </li>

<?php if($_SESSION['log'] =="" )
{?>
		   
		   <li><a class="atop" target="_blank" href="./moshop" style=" background: red; color: #fff; "><i style=" color: #fff; " class="fa fa-fw fa-plus-square"></i> Mở Shop miễn phí</a></li>
		   <?}else{?>
		   <li><a class="atop" target="_blank" href="./quantri" style=" background: red; color: #fff; "><i style=" color: #fff; " class="fa fa-fw fa-plus-square"></i> Quản Trị Shop</a></li>
		   <?}?>

		<?php }else {?>
		<li><a class="atop" id="login_a" href="<?php echo "https://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>#"><i class="fa fa fa-user"></i> 	Đăng nhập</a></li>
 
        	<?php if($_SESSION['log'] =="" )
{?>
		   
		   <li><a class="atop" target="_blank" href="./moshop" style=" background: red; color: #fff; "><i style=" color: #fff; " class="fa fa-fw fa-plus-square"></i> Mở Shop miễn phí</a></li>
		   <?}else{?>
		   <li><a class="atop" target="_blank" href="./quantri" style=" background: red; color: #fff; "><i style=" color: #fff; " class="fa fa-fw fa-plus-square"></i> Quản Trị Shop</a></li>
		   <?}?>
        <?php } ?>

                <!--li><a class="atop" href="./cart.html"><span class="s-icon-cart"></span>Giỏ hàng (<span class="s-number" id="spanGioHang"><? echo count($_SESSION['cart']); ?></span>)</a></li-->
            </ul>
			 <ul style="float:right;">
                <!--li><a class="atop" href="./rao-vat.html">Rao Vặt</a></li-->
                <li><a class="atop" href="help">Trung tâm trợ giúp</a></li>
                <li><a class="atop" href="?home=help&act=views&views=30&cat=4">Tích lũy điểm LỬA <span style="color: red;" class="glyphicon glyphicon-fire"></span></a></li>
 
            </ul>
			
        </div>
    
    </div>
 

    <div id="top5555" >
	
	 <script>


var $stickyHeight = 55; // chiều cao của banner quảng cáo


var $padding = 0; // khoảng cách top của banner khi dính


var $topOffset = 590; // khoảng cách từ top của banner khi bắt đầu dính (tức là khoảng cách tính từ trên xuống đến vị trí đặt banner )


var $footerHeight = 180; // Định vị điểm dừng của banner, tính từ chân lên


/* <![CDATA[ */


function scrollSticky(){


 if($(window).height() >= $stickyHeight) {


     var aOffset = $('#top5555').offset();


if($(document).height() - $footerHeight - $padding < $(window).scrollTop() + $stickyHeight) {


         var $top = $(document).height() - $stickyHeight - $footerHeight - $padding - 185;       $('#nav_on_top').addClass('selected');


         $('#top5555').attr('style', 'position:absolute; top:'+$top+'px;');








     }else if($(window).scrollTop() + $padding > $topOffset) {         $('#nav-top').removeClass('selected');


         $('#top5555').attr('style', 'position:fixed; top:'+$padding+'px;');


}else{$('#nav_on_top').addClass('selected');


         $('#top5555').attr('style', 'position:relative;');


     }


 }


}


$(window).scroll(function(){


 scrollSticky();


});


/* ]]> */


</script>
	
	
	
	
	    <div class="d-top">
    	    <div class="d-logo">

                <h1 itemscope="itemscope" itemtype="http://schema.org/Organization">
        	        <a href="/" itemprop="url" title="<?php echo $row_config['title'];?>">
                        <img itemprop="logo" alt="<?php echo $row_config['title'];?>" src="<?php echo $row_config['logo'];?>" width="189px" >
						
        	        </a>
                </h1>

            </div>
               <div class="d-adv-top">
        	    <!--a href="/" title="Liên hệ đặt quảng cáo"><img alt="Liên hệ đặt quảng cáo" src="<?php echo $row_config['logo_footer'];?>"></a-->
	<script type="text/javascript">
$(document).ready(function(){
	$("#login_a_menutop").click(function(){
        $("#shadow").fadeIn("normal");
         $("#login_form").fadeIn("normal");
         $("#user_name").focus();
    });
	$("#cancel_hide").click(function(){
        $("#login_form").fadeOut("normal");
        $("#shadow").fadeOut();
   });
   $("#login").click(function(){
    
        username=$("#user_name").val();
        password_login=$("#password_login").val();
         $.ajax({
            type: "POST",
            url: "system/home/login.php",
            data: "name="+username+"&pwd="+password_login,
            success: function(html){
              if(html=='true')
              {
                $("#login_form").fadeOut("normal");
				$("#shadow").fadeOut();
				$("#profile").html("<div style='float: left;'>Xin chào: <?php echo $_SESSION['mem'];?> | </div><div class='style_mem'><ul><li><a href='./?home=member'><font color='#00a2e8'>Quản trị</font></a><ul><li><a href='./?home=member'>+ Trang thành viên</a></li><li><a href='./quantri'>+ Quản trị gian hàng</a></li><li><a href='<?php echo $domain_home;?>/<?php echo $_SESSION['mem'];?>' target='_blank'>+ Xem gian hàng</a></li></ul></li></ul></div><div style='float: left;'> | <a href='logout.php' id='logout'><font color='#ddd'>Thoát</font></a></div>");location="<?php echo "https://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>";
				
              }
              else
              {
                    $("#add_err").html("Tên đăng nhập hoặc mật khẩu không đúng");
              }
            },
            beforeSend:function()
			{
                 $("#add_err").html("Đang tải...")
            }
        });
         return false;
    });
});
</script>
 
    <?if($_SESSION['mem']==''){?>
  <div> <a class="box-info-link box-info transit box-cart shopping_cart_modal btn-view-cart" id="login_a_menutop"  rel="nofollow"   style="
border: 1px solid #ac080f;
    float: left;
    position: relative;
    margin-left: -117px;
    border: 1px solid #ddd;
    border-radius: 3px;
    height: 36px;
    line-height: 34px;
    padding: 0 25px 0 13px;
    cursor: pointer;
    background-color: #fff;
    margin-top: 15px;
    background-color: #c9141b;
    border: 1px solid #ac080f;
    color: #fff !important;
"> 
  <!-- <a class="box-info transit box-cart shopping_cart_modal btn-view-cart" rel="nofollow" title="Giỏ hàng" data-toggle="modal" data-target="#shoppingcartmodal">  -->
   
    <i  class="fa fa-shopping-cart"></i>  Giỏ hàng
    <span class="num cart_qty" style="
background-color: #fff;
    color: #e5101d;
    border-radius: 100%;
    width: 18px;
    height: 20px;
    font-size: 11px;
    position: absolute;
    right: 4px;
    top: 8px;
    line-height: 20px;
    text-align: center;
"><span class="s-number" id="spanGioHang">0</span></a></span>   
   
  </div>
  	<script type="text/javascript">
$(document).ready(function(){
	$("#login_a_menutop1").click(function(){
        $("#shadow").fadeIn("normal");
         $("#login_form").fadeIn("normal");
         $("#user_name").focus();
    });
	$("#cancel_hide").click(function(){
        $("#login_form").fadeOut("normal");
        $("#shadow").fadeOut();
   });
   $("#login").click(function(){
    
        username=$("#user_name").val();
        password_login=$("#password_login").val();
         $.ajax({
            type: "POST",
            url: "system/home/login.php",
            data: "name="+username+"&pwd="+password_login,
            success: function(html){
              if(html=='true')
              {
                $("#login_form").fadeOut("normal");
				$("#shadow").fadeOut();
				$("#profile").html("<div style='float: left;'>Xin chào: <?php echo $_SESSION['log'];?> | </div><div class='style_mem'><ul><li><a href='./?home=member'><font color='#00a2e8'>Quản trị</font></a><ul><li><a href='./?home=member'>+ Trang thành viên</a></li><li><a href='./quantri'>+ Quản trị gian hàng</a></li><li><a href='<?php echo $domain_home;?>/<?php echo $_SESSION['log'];?>' target='_blank'>+ Xem gian hàng</a></li></ul></li></ul></div><div style='float: left;'> | <a href='logout.php' id='logout'><font color='#ddd'>Thoát</font></a></div>");location="<?php echo "https://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>";
				
              }
              else
              {
                    $("#add_err").html("Tên đăng nhập hoặc mật khẩu không đúng");
              }
            },
            beforeSend:function()
			{
                 $("#add_err").html("Đang tải...")
            }
        });
         return false;
    });
});
</script>
   <div> <a class="box-info-link box-info transit box-cart shopping_cart_modal btn-view-cart" id="login_a_menutop1" rel="nofollow" title="Thông báo"  style="
border: 1px solid #ac080f;
    float: left;
    position: relative;
    margin-left: 0px;
    border: 1px solid #ddd;
    border-radius: 3px;
    height: 36px;
    line-height: 34px;
    padding: 0 27px 0 8px;
    cursor: pointer;
    background-color: #fff;
    margin-top: 15px;

    border: 1px solid #ac080f;
    color: #000 !important;
"> 
  <!-- <a class="box-info transit box-cart shopping_cart_modal btn-view-cart" rel="nofollow" title="Giỏ hàng" data-toggle="modal" data-target="#shoppingcartmodal">  -->
   
    <i class="fa fa-globe" "="" style="color: #fffff;"></i>  Thông báo
    <span class="num cart_qty" style="
background-color: #c9141b;
    color: #ffffff;
    border-radius: 100%;
    width: 18px;
    height: 20px;
    font-size: 11px;
    position: absolute;
    right: 4px;
    top: 8px;
    line-height: 20px;
    text-align: center;
"><span class="s-number" id="spanGioHang">0</span></a></span>   
   
  </div>
  
  	<script type="text/javascript">
$(document).ready(function(){
	$("#login_a_menutop2").click(function(){
        $("#shadow").fadeIn("normal");
         $("#login_form").fadeIn("normal");
         $("#user_name").focus();
    });
	$("#cancel_hide").click(function(){
        $("#login_form").fadeOut("normal");
        $("#shadow").fadeOut();
   });
   $("#login").click(function(){
    
        username=$("#user_name").val();
        password_login=$("#password_login").val();
         $.ajax({
            type: "POST",
            url: "system/home/login.php",
            data: "name="+username+"&pwd="+password_login,
            success: function(html){
              if(html=='true')
              {
                $("#login_form").fadeOut("normal");
				$("#shadow").fadeOut();
				$("#profile").html("<div style='float: left;'>Xin chào: <?php echo $_SESSION['log'];?> | </div><div class='style_mem'><ul><li><a href='./?home=member'><font color='#00a2e8'>Quản trị</font></a><ul><li><a href='./?home=member'>+ Trang thành viên</a></li><li><a href='./quantri'>+ Quản trị gian hàng</a></li><li><a href='<?php echo $domain_home;?>/<?php echo $_SESSION['log'];?>' target='_blank'>+ Xem gian hàng</a></li></ul></li></ul></div><div style='float: left;'> | <a href='logout.php' id='logout'><font color='#ddd'>Thoát</font></a></div>");location="<?php echo "https://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>";
				
              }
              else
              {
                    $("#add_err").html("Tên đăng nhập hoặc mật khẩu không đúng");
              }
            },
            beforeSend:function()
			{
                 $("#add_err").html("Đang tải...")
            }
        });
         return false;
    });
});
</script>
  <div> <a class="box-info-link box-info transit box-cart shopping_cart_modal btn-view-cart" id="login_a_menutop2" rel="nofollow" title="Sản phẩm yêu thích"  style="
border: 1px solid #ac080f;
    float: left;
    position: relative;
    margin-left: 12px;
    border: 1px solid #ddd;
    border-radius: 3px;
    height: 36px;
    line-height: 34px;
  padding: 0 28px 0 8px;
    cursor: pointer;
    background-color: #fff;
    margin-top: 15px;

    border: 1px solid #ac080f;
    color: #000 !important;
"> 
  <!-- <a class="box-info transit box-cart shopping_cart_modal btn-view-cart" rel="nofollow" title="Giỏ hàng" data-toggle="modal" data-target="#shoppingcartmodal">  -->
   
    <i class="fa fa-heart-o"></i> Yêu thích
    <span class="num cart_qty" style="
background-color: #c9141b;
    color: #fff;
    border-radius: 100%;
    width: 18px;
    height: 20px;
    font-size: 11px;
    position: absolute;
    right: 4px;
    top: 8px;
    line-height: 20px;
    text-align: center;
"><span class="s-number" id="spanGioHang">0</span></a></span>   
   
  </div>

<?}else{?>


<div> <a class="box-info-link box-info transit box-cart shopping_cart_modal btn-view-cart" id="xemsanpham" href="./cart_popup.html" rel="nofollow" style="
border: 1px solid #ac080f;
    float: left;
    position: relative;
    margin-left: -117px;
    border: 1px solid #ddd;
    border-radius: 3px;
    height: 36px;
    line-height: 34px;
    padding: 0 25px 0 13px;
    cursor: pointer;
    background-color: #fff;
    margin-top: 15px;
    background-color: #c9141b;
    border: 1px solid #ac080f;
    color: #fff !important;
"> 
  <!-- <a class="box-info transit box-cart shopping_cart_modal btn-view-cart" rel="nofollow" title="Giỏ hàng" data-toggle="modal" data-target="#shoppingcartmodal">  -->
   
    <i  class="fa fa-shopping-cart" ></i>  Giỏ hàng
    <span class="num cart_qty" style="
background-color: #fff;
    color: #e5101d;
    border-radius: 100%;
    width: 18px;
    height: 20px;
    font-size: 11px;
    position: absolute;
    right: 4px;
    top: 8px;
    line-height: 20px;
    text-align: center;
"><span class="s-number" id="spanGioHang"><? echo mysql_num_rows(mysql_query("SELECT * FROM orders where user_mem='".$_SESSION['mem']."' and kichhoat=0 "));?></span></a></span>   
   
  </div>
  
   <div> <a class="box-info-link box-info transit box-cart shopping_cart_modal btn-view-cart" href="./thongbao.html" rel="nofollow" title="Thông báo"  style="
border: 1px solid #ac080f;
    float: left;
    position: relative;
    margin-left: 0px;
    border: 1px solid #ddd;
    border-radius: 3px;
    height: 36px;
    line-height: 34px;
    padding: 0 27px 0 8px;
    cursor: pointer;
    background-color: #fff;
    margin-top: 15px;

    border: 1px solid #ac080f;
    color: #000 !important;
"> 
  <!-- <a class="box-info transit box-cart shopping_cart_modal btn-view-cart" rel="nofollow" title="Giỏ hàng" data-toggle="modal" data-target="#shoppingcartmodal">  -->
   
    <i class="fa fa-globe" "="" style="color: #fffff;"></i>  Thông báo
    <span class="num cart_qty" style="
background-color: #c9141b;
    color: #ffffff;
    border-radius: 100%;
    width: 18px;
    height: 20px;
    font-size: 11px;
    position: absolute;
    right: 4px;
    top: 8px;
    line-height: 20px;
    text-align: center;
"><span class="s-number" id="spanGioHang"><? echo mysql_num_rows(mysql_query("SELECT * FROM thongbao where user='".$_SESSION['mem']."' and active=0 "));?></span></a></span>   
   
  </div>
  
  
  <div> <a class="box-info-link box-info transit box-cart shopping_cart_modal btn-view-cart" href="./yeuthich.html" rel="nofollow" title="Yêu thích"  style="
border: 1px solid #ac080f;
    float: left;
    position: relative;
    margin-left: 12px;
    border: 1px solid #ddd;
    border-radius: 3px;
    height: 36px;
    line-height: 34px;
  padding: 0 28px 0 8px;
    cursor: pointer;
    background-color: #fff;
    margin-top: 15px;

    border: 1px solid #ac080f;
    color: #000 !important;
"> 
  <!-- <a class="box-info transit box-cart shopping_cart_modal btn-view-cart" rel="nofollow" title="Giỏ hàng" data-toggle="modal" data-target="#shoppingcartmodal">  -->
   
    <i class="fa fa-heart-o"></i> Yêu thích
    <span class="num cart_qty" style="
background-color: #c9141b;
    color: #fff;
    border-radius: 100%;
    width: 18px;
    height: 20px;
    font-size: 11px;
    position: absolute;
    right: 4px;
    top: 8px;
    line-height: 20px;
    text-align: center;
"><span class="s-number" id="spanGioHang"><? echo mysql_num_rows(mysql_query("SELECT * FROM po_tick where user='".$_SESSION['mem']."' "));?></span></a></span>   
   
  </div>
<?}?>


            </div>
			
<!--begin search-->
<?php include("system/home/search_header.php");?>
<!--end search-->
        </div>
    
    </div>
	
	
	
	
	<div id="top5555" style="
    float: left;
    width: 100%;
    height: 34px;
    border-bottom: 2px solid #df1f26;
    background-color: #e60f1e;
">
	
	 <script>


var $stickyHeight = 55; // chiều cao của banner quảng cáo


var $padding = 0; // khoảng cách top của banner khi dính


var $topOffset = 590; // khoảng cách từ top của banner khi bắt đầu dính (tức là khoảng cách tính từ trên xuống đến vị trí đặt banner )


var $footerHeight = 180; // Định vị điểm dừng của banner, tính từ chân lên


/* <![CDATA[ */


function scrollSticky(){


 if($(window).height() >= $stickyHeight) {


     var aOffset = $('#top5555').offset();


if($(document).height() - $footerHeight - $padding < $(window).scrollTop() + $stickyHeight) {


         var $top = $(document).height() - $stickyHeight - $footerHeight - $padding - 185;       $('#nav_on_top').addClass('selected');


         $('#top5555').attr('style', 'position:absolute; top:'+$top+'px;');








     }else if($(window).scrollTop() + $padding > $topOffset) {         $('#nav-top').removeClass('selected');


         $('#top5555').attr('style', 'position:fixed; top:'+$padding+'px;');


}else{$('#nav_on_top').addClass('selected');


         $('#top5555').attr('style', 'position:relative;');


     }


 }


}


$(window).scroll(function(){


 scrollSticky();


});


/* ]]> */


</script>
	
	
	
	
	    <div class="d-top">
    	    
           <!--begin menu hover-->               
<?php include("system/home/menu_hover.php");?>
<!--end menu hover-->  

   <div class="d-menu-vertical">
                    
            	        <ul class="ul-menu-vertical">
                    
                	            <li><a title="" href="./xuhuong.html"><i class="fa fa-star-o"  ></i> XU HƯỚNG</a></li>
								
								  <li><a title="" href="./spm.html"><i class="fa fa-fw fa-asterisk"></i> SẢN PHẨM MỚI</a></li>
                    
                	            <li><a title="Các gói gian hàng" href="./khuyenmai.html"><i class="fa fa-check-square"  ></i> KHUYẾN MÃI</a></li>
                    
                	            <li><a title="Báo giá tên miền" href="./banchay.html"><i class="fa fa-globe"  ></i> BÁN CHẠY</a></li>
                    
                	       
                              
  							  <!--li><a title="Báo giá dịch vụ" href="./?home=baogiadichvu"><i class="fa fa-credit-card"  ></i> SỰ KIỆN SĂN HÀNG GIÁ RẺ</a></li-->
						</ul>
                    
                </div>
     <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=835438139859194";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>       
                <div class="d-like">
            	    <div style="float: left;" class="fb-like" data-href="https://facebook.com/scodeweb" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
                	<div style="float:left;margin-left:12px;">
                   
                   
                    </div>
                </div>
				
        </div>
    
    </div>

    <div  id="page">
          
 
		  
		  
		  
		  
		  
	    <div class="d-content">
		
	
     		
                      
<?php if($_REQUEST['home']=='')
{?>
    <div class="d-top-content">
	<!--begin menu-->
<?php include("system/home/menu_left.php");?>
<!--end menu-->
        <div class="d-top-content-center">
<?php include("system/home/slider.php");?>
            <div id="ctl00_MainContent_advertcategory" class="d-sub-nav">

            
        <a href="./phu-kien-cong-nghe-ct-20.html" title="Phụ kiện đang HOT">
            <center><img width="110" height="80" src="./images/icon_destop.png" alt="Máy tính linh kiện"></center>
            <span style="top:74px;">Phụ kiện đang HOT</span>
        </a>

        <a href="./thoi-trang-nu-ct-367.html" title="Xu hướng thời trang">
             <center> <img width="110" height="80" src="./images/icon_mobile_internet.png" alt="Điện thoại viễn thông"></center>
            <span style="top:174px;">Xu hướng thời trang</span>
        </a>

        <a href="./giay-dep---tui-xach-ct-31.html" title="Giày theo cách">
             <center> <img width="110" height="80" src="./images/icon_bds.png" alt="Đồ gia dụng nhà cửa"></center>
            <span style="top:274px;">Giày theo cách</span>
        </a>
</div>
<!--bengin box pro top-->
<?php include("system/home/pro_top.php");?>
<!--end box pro top-->
        </div>

        <div class="d-top-content-right">
<!--begin box pro hot-               
<a title="Đăng ký gian hàng" href="/dang-ky-gian-hang.html">

<img  alt="Đăng ký gian hàng" src="Images/dang-ky-gian-hang.jpg"> </a>
<!--end box pro hot-->   
<!--begin pro sale-->


<?php include("system/home/pro_hot.php");?>



<!--begin pro sale-->          




  <!--begin shop vip-->
<?php include("system/home/pro_new.php");?>
 
 
<!--end shop vip-->
<!--?php include("system/home/box_support.php");?-->             
        </div>

    </div>

    <div id="ctl00_MainContent_advertfullpage"></div>

    <div id="ctl00_MainContent_left_module" class="d-content-left">
        <div class="d-adv">
<?php
    $sql_ads=@mysql_query("SELECT * FROM ads where cat_id=0 order by thutu ");
    while($row_ads=@mysql_fetch_array($sql_ads))
    {
    ?>
<?}?>
        </div>
		
<!--begin pro sale-->
<?php include("system/home/pro_sale.php");?>
<!--begin pro sale-->

<!--begin pro sale-->
<?php include("system/home/pro_home.php");?>
<!--end pro home-->
 
 
<!-- Shopcantho.vn -->
 
</div>
        
<div id="ctl00_MainContent_right_module" class="d-content-right">
<!-- ?php include("system/home/adv_vip.php");? 
<div class="d-adv">
<a target="_blank" href="" title="Liên hệ quảng cáo">
<img alt="Liên hệ quảng cáo" width="100%" src="./images/quang-cao.gif">
</a>
</div--> 

<!--begin pro new-->
<!--?php include("system/home/pro_new.php");?-->
<!--end pro new-->  

</div>
<?}else{?>
<?php include("system/model/frame.php");?>
<?}?>
        
        </div>
    
    </div>
 
<?php
if(isset($_POST['Save_sendmail']))
{
    $email_footer=$_POST['email'];
    $date = date("d-m-Y");
    $sql_bx=mysql_query("SELECT * FROM email where email='".$email_footer."' ");
    $toalt_bx=mysql_num_rows($sql_bx);
    if($toalt_bx<=0)
    {
      $sql_baoxau=@mysql_query("INSERT INTO email(email,date) VALUES('".$email_footer."','".$date."')");
        if($sql_baoxau)
        {
            echo "<script>alert('Cảm ơn bạn đã đăng ký nhận Email khuyến mại của chúng tôi!')</script>";
        }
        else
        {
            $err="Không thể đăng tin được !";
        }  
    }
    else
    {
        echo "<script>alert('Email này của bạn đã tồn tại trên hệ thống!')</script>";
    }
    
}
?>
<script>
function validateForm()
{
var x=document.forms["nhan_email"]["email"].value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  alert("Địa chỉ email không hợp lệ");
  return false;
  }
}
</script>
<div id="mail-register">
			<div class="container">
				<div class="row">
					<div class="mail-register-cont">
						<strong>Đăng ký nhận thông tin sản phẩm khuyến mãi</strong>
						<div class="ques">&nbsp;</div>
                        <form style="display: inline;" name="nhan_email" action="" onsubmit="return validateForm();" method="POST">
						<input type="email" id="email_newsletter" name="email" placeholder="Nhập mail của bạn">
						<button name="Save_sendmail" id="register_newsletter">Đăng ký</button>
                        </form>
					</div>
				</div>
			</div>
		</div>
    <div id="footer">
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
<li><a title="<?php echo $row_info['name'];?>" href="./help/<?php echo doidau(mb_strtolower($row_info['name'],"UTF8"));?>-vh-<?php echo $row_info['id'];?>-<?php echo $row_info['cat_id'];?>.html"><?php echo $row_info['name'];?></a></li>
<?}?>
                    </ul>
                </li>
<?}?>
            </ul>
        
            <div class="d-copyright">
        	    <div class="d-copyright-left">
            	    <p><b><?php echo $row_config['title_footer'];?></b></p>
                    <p><b>Địa chỉ:</b> <?php echo $row_config['address'];?></p>
                    <p><b>Điện thoại:</b> <?php echo $row_config['phone'];?></p>
                    <p><b>Email:</b> <?php echo $row_config['email'];?></p>  
					<p><b>GPKD số:</b> 1801406109</p> 
                </div>
                <div class="d-copyright-right">
            	    <a target="_blank" href="http://www.online.gov.vn/CustomWebsiteDisplay.aspx?DocId=21399"><img alt="Gianghangso.com đã đăng ký với Bộ Công Thương"  src="./temp/icon_bocongthuong.png"></a>
                </div>
        	
            </div>
        </div>
    
    </div>

 


</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
	$("#login_a").click(function(){
        $("#shadow").fadeIn("normal");
         $("#login_form").fadeIn("normal");
         $("#user_name").focus();
    });
	$("#cancel_hide").click(function(){
        $("#login_form").fadeOut("normal");
        $("#shadow").fadeOut();
   });
   $("#login").click(function(){
    
        username=$("#user_name").val();
        password_login=$("#password_login").val();
         $.ajax({
            type: "POST",
            url: "system/home/login.php",
            data: "name="+username+"&pwd="+password_login,
            success: function(html){
              if(html=='true')
              {
                $("#login_form").fadeOut("normal");
				$("#shadow").fadeOut();
				$("#profile").html("<div style='float: left;'>Xin chào: <?php echo $_SESSION['mem'];?> | </div><div class='style_mem'><ul><li><a href='./?home=member'><font color='#00a2e8'>Quản trị</font></a><ul><li><a href='./?home=member'>+ Trang thành viên</a></li><li><a href='./quantri'>+ Quản trị gian hàng</a></li><li><a href='<?php echo $domain_home;?>/<?php echo $_SESSION['mem'];?>' target='_blank'>+ Xem gian hàng</a></li></ul></li></ul></div><div style='float: left;'> | <a href='logout.php' id='logout'><font color='#ddd'>Thoát</font></a></div>");location="<?php echo "https://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>";
				
              }
              else
              {
                    $("#add_err").html("Tên đăng nhập hoặc mật khẩu không đúng");
              }
            },
            beforeSend:function()
			{
                 $("#add_err").html("Đang tải...")
            }
        });
         return false;
    });
});
</script>


<script>
// kéo xuống khoảng cách 600px thì xuất hiện nút Top-up
var offset = 300;

// thời gian di trượt 0.95s ( 1000 = 1s )
var duration = 950;
$(function(){
$(window).scroll(function () {
if ($(this).scrollTop() > offset) $('#top-up').fadeIn(duration);
else $('#top-up').fadeOut(duration);
});
$('#top-up').click(function () {
$('body,html').animate({scrollTop: 0}, duration);
});
});
</script>
<div id="top-up"><i class="fa fa-arrow-circle-o-up"></i></div>
<style>
#top-up {
background:none;
font-size: 3em;
cursor: pointer;
position: fixed;
z-index: 99999;// đè lên tất cả nôị dung đi qua nó
color: green;
bottom: 0px;
right: 5px;
display: none;
}
</style>





