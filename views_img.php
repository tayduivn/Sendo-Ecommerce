<?require("system/model/config.php") ?>
<? require("system/model/common_start.php") ?>
<? require("system/model/module_func.php") ?>
<? require("system/model/tiengviet.php") ?>
<? include("system/model/curency.php") ?>
<? include("system/model/pro_tick.php") ?>
<?php
$id=$_REQUEST['views'];
$name=$_REQUEST['name'];
?>
<?php 
$sql_1 = "select * from products where id='".$id."' ";
$result_1 = @mysql_query($sql_1,$con);
$row=mysql_fetch_assoc($result_1);
$sql_user=mysql_query("SELECT * FROM user_shop where user='".$row['user']."' ");
$row_user=mysql_fetch_assoc($sql_user);
$sql_city=mysql_query("SELECT * FROM city where id='".$row['city']."' ");
$row_city=mysql_fetch_assoc($sql_city);
$sqlup = "update products set view=view+1 where id=$id";
$resultup = mysql_query($sqlup,$con);
?>
<?php 
$sql_pro=mysql_query("SELECT * FROM products where id='".$id."' ");
$row_pro=mysql_fetch_assoc($sql_pro);
$sql_city=@mysql_query("SELECT * FROM city where id='".$row_pro['city']."' ");
$row_city=@mysql_fetch_assoc($sql_city);
$sql_cr1=mysql_query("SELECT * FROM currency where id='".$row_pro['currency']."'");
$row_cr1=mysql_fetch_assoc($sql_cr1);
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
								<img id="sl_0" alt="<?echo $row_pro['name'];?>" title="<?echo $row_pro['name'];?>" src="/themes/v1/css/loading.gif" data-src="<?echo str_replace("_thumbnail","",$row_pro['image']);?>" />
							</div>
						</li>
											<li class="slide_item">
							<div class="img_box">
								<img id="sl_1" alt="<?echo $row_pro['name'];?>" title="<?echo $row_pro['name'];?>" src="/themes/v1/css/loading.gif" data-src="<?echo $row_pro['image_large'];?>" />
							</div>
						</li>
						<li class="slide_item">
							<div class="img_box">
								<img id="sl_3" alt="<?echo $row_pro['name'];?>" title="<?echo $row_pro['name'];?>" src="/themes/v1/css/loading.gif" data-src="<?echo $row_pro['img2'];?>" />
							</div>
						</li>
                        <li class="slide_item">
							<div class="img_box">
								<img id="sl_4" alt="<?echo $row_pro['name'];?>" title="<?echo $row_pro['name'];?>" src="/themes/v1/css/loading.gif" data-src="<?echo $row_pro['img3'];?>" />
							</div>
						</li>
                        <li class="slide_item">
							<div class="img_box">
								<img id="sl_5" alt="<?echo $row_pro['name'];?>" title="<?echo $row_pro['name'];?>" src="/themes/v1/css/loading.gif" data-src="<?echo $row_pro['img4'];?>" />
							</div>
						</li>
                        <li class="slide_item">
							<div class="img_box">
								<img id="sl_6" alt="<?echo $row_pro['name'];?>" title="<?echo $row_pro['name'];?>" src="/themes/v1/css/loading.gif" data-src="<?echo $row_pro['img5'];?>" />
							</div>
						</li>
                        <li class="slide_item">
							<div class="img_box">
								<img id="sl_7" alt="<?echo $row_pro['name'];?>" title="<?echo $row_pro['name'];?>" src="/themes/v1/css/loading.gif" data-src="<?echo $row_pro['img6'];?>" />
							</div>
						</li>
                        <li class="slide_item">
							<div class="img_box">
								<img id="sl_8" alt="<?echo $row_pro['name'];?>" title="<?echo $row_pro['name'];?>" src="/themes/v1/css/loading.gif" data-src="<?echo $row_pro['img7'];?>" />
							</div>
						</li>
								</ul>
		</div>
		<div class="slide_control">
			<span class="sl_back"></span>
			<span class="sl_next"></span>
		</div>
		<div class="slide_bottom">
			<span id="sl_current">1</span> / <span id="total_img"> 8 ảnh</span>
			<a href="./<?php echo doidau(mb_strtolower($row_pro['name'],"UTF8"));?>-pro-<?php echo $row_pro['id'];?>.html" class="close_slide"  title="close"></a>
		</div>
	</div>
	<div class="break_module"></div>
		<script>
		$(document).ready(function(){
			$('.slide_item').removeClass('hide');
			detail_slide('#galleryTouch','#imgs','#sl_',8,1,0);
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