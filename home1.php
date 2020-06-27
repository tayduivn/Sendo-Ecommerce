

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="">
<head id="ctl00_Head1">
    <meta http-equiv="content-type" content="text/html; charset=utf8" />
	<meta http-equiv="content-language" content="vi" />
	<META name= "title" content="<?php include("system/model/title.php");  echo "  ". $title_mt;?>">
	<meta name="description" content="<?php echo $motaseo;?> "/>
    <meta name="keywords" content="<?php echo $tukhoaseo;?> "/>
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

    <script type="text/javascript" src="/js/jquery.min.js"></script>

  <!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="/quantri/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="/quantri/source/jquery.fancybox.css?v=2.1.5" media="screen" />
	
    <script type="text/javascript" src="./temp/CommonFunction.js"></script>
    
    <script type="text/javascript" src="./temp/jquery.jcarousel.min.js"></script>
    <script type="text/javascript" src="./temp/jquery.jcarousel-autoscroll.min.js"></script>
    <script type="text/javascript" src="./temp/jquery.jcarousel.basic.js"></script>
		 <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="quantri/plugins/iCheck/all.css">
	
	 
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			*   Examples - images
			*/

		 
			$("#xemsanpham").fancybox({
				'width'				: '1100px',
				'height'			: '1100px',
				'autoScale'			: true,
				'transitionIn'		: '11',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});

				$("#xemanh").fancybox({
				'width'				: '500px',
				'height'			: '500px',
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
"  href="./quen-mat-khau.html" target="_blank">Quên mật khẩu?</a>
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
   
 

   

    <div  id="page">
          
		  
		  
		  
		  
		  
		  
	    <div class="d-content" style="
    width: 100%;
">
		 
	
     
                      
<?php if($_REQUEST['home']=='')
{?>
     

    

</div>
<?}else{?>
<?php include("system/model/frame.php");?>
<?}?>
        
        </div>
    
    </div>
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
right: 0px;
display: none;
}
</style>


 
