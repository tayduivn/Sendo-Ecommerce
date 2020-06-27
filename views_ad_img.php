<?require("system/model/config.php") ?>
<? require("system/model/common_start.php") ?>
<? require("system/model/module_func.php") ?>
<? require("system/model/tiengviet.php") ?>
<? include("system/model/curency.php") ?>
<? include("system/model/pro_tick.php") ?>
<?
$id=$_GET['id'];
$name=$_GET['name'];
$sql = "select * from avd where id='".$id."' ";
$result = @mysql_query($sql,$con);
$row=mysql_fetch_assoc($result);
$sql_user=mysql_query("SELECT * FROM user_shop where user='".$row['user']."' ");
$row_user=mysql_fetch_assoc($sql_user);
$sql_city=mysql_query("SELECT * FROM city where id='".$row['city']."' ");
$row_city=mysql_fetch_assoc($sql_city);
$sqlup = "update avd set views=views+1 where id=$id";
$resultup = mysql_query($sqlup,$con);
$sql_cr=mysql_query("SELECT * FROM currency where id='".$row['currency']."'");
$row_cr=mysql_fetch_assoc($sql_cr);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?echo $row_pro['name'];?></title>
<meta name="viewport" content="initial-scale=1, maximum-scale=1.0, minimum-scale=1.0">
<meta name="format-detection" content="telephone=yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="stylesheet" type="text/css" href="template/css/style_all_v3.css">
<script type="text/javascript" src="template/js/js_all_v3.js"></script>
<script>
									$(function(){
										try{
												$(document).pjax("a[data-pjax]","#home");
										}catch(err)
										{

										}
									})
</script>
</head>
<body>
<div id="home"> 
<div id="home_content" class="fixed">
	<div id="main_container">
    
	<div id="detail_product_ss">
</div>
<div id="detail_overlay" class="filter_ov">				
	<div class="product_picture_slide">
		<div id="galleryTouch">
			<ul id="imgs" class="list_image">
										<li class="slide_item">
							<div class="img_box">
								<img id="sl_0" alt="<?echo $row['name'];?>" title="<?echo $row['name'];?>" src="/themes/v1/css/loading.gif" data-src="<?echo $row['image'];?>" />
							</div>
						</li>
								</ul>
		</div>
		<div class="slide_control">
			<span class="sl_back"></span>
			<span class="sl_next"></span>
		</div>
		<div class="slide_bottom">
			<span id="sl_current">1</span> / <span id="total_img"> 1 ảnh</span>
			<a href="./ad/<?php echo doidau(mb_strtolower($row['name'],"UTF8"));?>-va-<?php echo $row['id'];?>-<?php echo $row['adv_cat'];?>.html" class="close_slide"  title="close"></a>
		</div>
	</div>
	<div class="break_module"></div>
		<script>
		$(document).ready(function(){
			$('.slide_item').removeClass('hide');
			detail_slide('#galleryTouch','#imgs','#sl_',1,1,0);
		})
	</script>
	
</div>

	<div style="text-align: center; padding-top: 10px;"></div>
		
	</div>
</div>
</div>
				<script>
			var i=0;
				setTimeout(function(){
					$(function(){ 
						$('ins[class=adsbygoogle]').each(function() {
							if(this.style.display=="block"){
								$('.price_exclusive_btn').css({bottom:65});	
							}
						});
					});
				}, 2500);
				
			</script>
			</body>
</html>
<?require("system/model/common_end.php") ?>