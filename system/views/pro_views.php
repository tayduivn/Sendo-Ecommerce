


<?php

$id=$_REQUEST['views'];
$name=$_REQUEST['name'];
?>
<?php 
$sql = "select * from products where id='".$id."' ";
$result = @mysql_query($sql,$con);
$row=mysql_fetch_assoc($result);
$sql_user=mysql_query("SELECT * FROM user_shop where user='".$row['user']."' ");
$row_user=mysql_fetch_assoc($sql_user);
$sql_city=mysql_query("SELECT * FROM city where id='".$row['city']."' ");
$row_city=mysql_fetch_assoc($sql_city);
$sqlup = "update products set view=view+1 where id=$id";
$resultup = mysql_query($sqlup,$con);
$option=explode(",",$row['option_home']);
$img=explode(",",$row['img9']);
?>

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

 <div id="top5555" >
	
	 <script>


var $stickyHeight = 55; // chiều cao của banner quảng cáo


var $padding = 0; // khoảng cách top của banner khi dính


var $topOffset = 0; // khoảng cách từ top của banner khi bắt đầu dính (tức là khoảng cách tính từ trên xuống đến vị trí đặt banner )


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
	
	
	
	
	    <div class="d-top" style="
  width: 100%;
    background: #ebf3fb;
    color: #666;
    position: relative;
    /* padding: 1px; */
    border-radius: 5px 5px 0 0;
    height: 67px;
    border-bottom: 1px solid #c9dff5;
">
<a target="_blank" href="/<?php echo $row_user['user'];?>">
 <?php if($row_user['logo']=="")
{?>
   <img src="/images/shop_blank-logo-2.jpg" width="80" height="40" style="padding: 14px;">
<?}else{?>
  <img src="<? echo $row_user['logo'];?>" width="80" height="40" style="padding: 14px;">
<?}?>
</a>
 <?php if($row_user['goidichvu']>'0')
{?>
<img src="/images/shopvipdv.png"  style="    height: 76px;position: absolute;left: 592px;top: -3px;padding: -28px;" title="Chứng nhận Shop uy tín bảo vệ người mua hàng">
<?}else{?>

<?}?>


                    <?php if($row_user['level_shop']=='0')
{?>

<img src="/images/shopluado.png"  style="    height: 76px;position: absolute;left: 809px;top: -3px;padding: -28px;" title="Chứng nhận Shop uy tín bảo vệ người mua hàng">

<?}else{?>

<?}?>
                    <?php if($row_user['level_shop']=='0')
{?>
<img src="/images/baovenguoimuahang.png"  style="height: 62px; position: absolute;left: 900px; top: 0;padding: 5px;" title="Chứng nhận Shop uy tín bảo vệ người mua hàng">
<?}else{?>

<?}?>



<b style="
    margin-left: 10px;
    font-size: 12px;
    color: #666;
    position: relative;
    line-height: 24px;
    display: inline-block;
    vertical-align: top;
    margin-top: 6px;
">Sản phẩm bán từ shop: <a style="
    color: #0066cc;
    font-weight: bold;
    display: inline-block;
    font-size: 13px;
    margin-left: 10px;
" target="_blank" href="/<?php echo $row_user['user'];?>"><?php echo $row_user['company'];?></a>
&nbsp;

<p style="

   
    font-size: 9px;
	width: 60px;
	padding:4px

" data-tooltip-text="Ngày Shop hoạt động  <?php echo $row_user['re_time'];?>" class="tooltip7">
<i class="fa   fa-clock-o"  style="=color: #6c7777;font-size: 14px;">
</i>
</p>
</b>





<br>



   <?php if($tongcong1 > '0')
{?>
 <li style="

font-size: 12px;
    color: #666;
    position: relative;
    line-height: 24px;
    display: inline-block;
    vertical-align: top;
    margin-top: -30px;
    margin-left: 122px;


"><b>Điểm uy tín shop:</b> <b style="
    color: green;
    font-weight: bold;
   
    font-size: 13px;
    margin-left: 10px;
" target="_blank" href="/<?php echo $row_user['user'];?>"><?echo $tongcong1;?></b>
&nbsp;


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

&nbsp;
<p data-tooltip-text="Là điểm shop đạt được của người mua đánh giá sau khi đã nhận hàng." class="tooltip5">
<i class="fa  fa-question-circle"  style="=color: #6c7777;font-size: 14px;">
</i>
</p>
&nbsp;&nbsp;
<b><?echo round($trungbinh1*20,2);?>% </b> &nbsp;&nbsp;đơn hàng tốt
&nbsp;
<p data-tooltip-text="Là tỷ lệ % đánh giá tốt của người mua." class="tooltip6">
<i class="fa  fa-question-circle"  style="=color: #6c7777;font-size: 14px;">
</i>
</p>

</li>
<?}else{?>
 <li style="

font-size: 12px;
    color: #666;
    position: relative;
    line-height: 24px;
    display: inline-block;
    vertical-align: top;
    margin-top: -30px;
    margin-left: 122px;


"><i>Shop chưa được đánh giá</i>
 


 
</p>

</li>
<?}?>







           
			
<!--begin search-->

<!--end search-->
        </div>
    
    </div>
<div class="space_title"></div>


<div class="space_title"></div>
<div style="background-color: #FFFFFF;">
<div style="float: left;width:100%;">
<?if($row['id']!==$id)
{?>
<div style="padding-top:20px;padding-bottom:20px;text-align:center;color:red;font-weight:bold">
<img src="images/alert.jpg">
<br><br>
Dữ liệu không tồn tại
</div>
<?}else{?>
<?php 
$sql_pro=mysql_query("SELECT * FROM products where id='".$id."' ");
$row_pro=mysql_fetch_assoc($sql_pro);
$sql_city=@mysql_query("SELECT * FROM city where id='".$row_pro['city']."' ");
$row_city=@mysql_fetch_assoc($sql_city);
?>
<div id="pro_views_right">
<!--pro views info-->
<div id="pro_views_right_info">
<div id="pro_views_right_info_img">
<div>
<script type="text/javascript" src="./js/jquery.livequery.js"></script>
<script src="./js/jquery.jqzoom-core.js" type="text/javascript"></script>
<script type="text/javascript">

	// <![CDATA[	

	$(document).ready(function(){	
		/// like 
		
		$('.LikeThis').click(function(e){
			
			var getID   =  $(this).attr('id').replace('post_id','');
			
			$("#like-loader-"+getID).html('<img src="loader.gif" alt="" />');
			
			$.post("system/pro_tick/like.php?postId="+getID, {
			 
	
			}, function(response){
				
				$('#like-stats-'+getID).html(response);
				
				$('#like-panel-'+getID).html('Đã thêm vào yêu thích');
				
				$("#like-loader-"+getID).html('');
			});
		});	
		
		/// unlike 
		
		$('.Unlike').click(function(e){
			
			var getID   =  $(this).attr('id').replace('post_id','');
			
			$("#like-loader-"+getID).html('<img src="loader.gif" alt="" />');
			
			$.post("system/pro_tick/unlike.php?postId="+getID, {
	
			}, function(response){
				
				$('#like-stats-'+getID).html(response);
				
				$('#like-panel-'+getID).html('<a href="javascript: void(0)" id="post_id'+getID+'" class="LikeThis"><i style=" color: red; " class="fa fa-fw fa-heart"></i>Yêu thích sản phẩm</a>');
				
				$("#like-loader-"+getID).html('');
			});
		});	
		
		
	});	

	// ]]>

</script>
<style type"text/css">
*
{
	margin:0;
	padding:0;
}
:focus { outline: none; }
p{margin:0 0 8px 0;line-height:1.5em;}
fieldset {padding:0px;padding-left:7px;padding-right:7px;padding-bottom:7px;}
fieldset legend{margin-left:15px;padding-left:3px;padding-right:3px;color:#333;}
dl dd{margin:0px;}
dl dt{}

.clearfix:after{clear:both;content:".";display:block;font-size:0;height:0;line-height:0;visibility:hidden;}
.clearfix{display:block;zoom:1}


ul#thumblist{display:block;}
ul#thumblist li{float:left;margin-right:0px;list-style:none;}
ul#thumblist li a{display:block;border:0px solid #CCC;}
ul#thumblist li a.zoomThumbActive{
    border:0px solid red;
}

.jqzoom{

	text-decoration:none;
	*float:left;
}


.zoomPad{
	position:relative;
	*float:left;
	z-index:99;
	cursor:crosshair;
}

.zoomPreload{
   -moz-opacity:0.8;
   opacity: 0.8;
   filter: alpha(opacity = 80);
   color: #333;
   font-size: 12px;
   font-family: Tahoma;
   text-decoration: none;
   border: 1px solid #CCC;
   background-color: white;
   padding: 8px;
   text-align:center;
 
   background-repeat: no-repeat;
   background-position: 43px 30px;
   z-index:110;
   width:90px;
   height:43px;
   position:absolute;
   top:0px;
   left:0px;
    * width:100px;
    * height:49px;
}


.zoomPup{
	overflow:hidden;
	background-color: #FFF;
	-moz-opacity:0.6;
	opacity: 0.6;
	filter: alpha(opacity = 60);
	z-index:120;
	position:absolute;
	border:1px solid #CCC;
  z-index:101;
  cursor:crosshair;
}

.zoomOverlay{
	position:absolute;
	left:0px;
	top:0px;
	background:#FFF;
	/*opacity:0.5;*/
	z-index:5000;
	width:100%;
	height:100%;
	display:none;
  z-index:101;
}

.zoomWindow{
	position:absolute;
	left:110%;
	top:40px;
	background:#FFF;
	z-index:6000;
	height:auto;
  z-index:10000;
  z-index:110;
}
.zoomWrapper{
	position:relative;
	border:1px solid #999;
  z-index:110;
}
.zoomWrapperTitle{
	display:block;
	background:#999;
	color:#FFF;
	height:18px;
	line-height:18px;
	width:100%;
  overflow:hidden;
	text-align:center;
	font-size:10px;
  position:absolute;
  top:0px;
  left:0px;
  z-index:120;
  -moz-opacity:0.6;
  opacity: 0.6;
  filter: alpha(opacity = 60);
}
.zoomWrapperImage{
	display:block;
  position:relative;
  overflow:hidden;
  z-index:110;

}
.zoomWrapperImage img{
  border:0px;
  display:block;
  position:absolute;
  z-index:101;
}

.zoomIframe{
  z-index: -1;
  filter:alpha(opacity=0);
  -moz-opacity: 0.80;
  opacity: 0.80;
  position:absolute;
  display:block;
}

/*********************************************************
/ When clicking on thumbs jqzoom will add the class
/ "zoomThumbActive" on the anchor selected
/*********************************************************/
.f-nav{  /* To fix main menu container */
    z-index: 39999;
    position: fixed;
	top:33px;
    width: 250px;
	background-color:#F7F6C0
}
#main-menu-container {
}
#main-menu {
    display: inline-block;
    width: 250px; /* Your menu's width */
}

</style>
<script type="text/javascript">

$(document).ready(function() {
	$('.jqzoom').jqzoom({
            zoomType: 'standard',
            lens:true,
            preloadImages: false,
            alwaysOn:false
        });
	
});


</script>
<!--script type="text/javascript">
$("document").ready(function($){
    var nav = $('#main-menu-container');

    $(window).scroll(function () {
        if ($(this).scrollTop() > 500) {
            nav.addClass("f-nav");
        } else {
            nav.removeClass("f-nav");
        }
    });
});
    </script>
<script>
$(document).ready(function() {
    $(".popup").hide();
 
    $("#button1").click(function(e) {
        openPopup();
    });
 
    $(".close").click(function (e) {
        closePopup();
        e.preventDefault();
    });
 
    $("#background").click(function () {
        closePopup();
    });
 
});
 
function openPopup(){
    var dheight = document.body.clientHeight;
    var dwidth = document.body.clientWidth;
 
    $("#background").width(dwidth).height(dheight);
 
    $("#background").fadeTo("slow",0.8);
 
    var $popup1=$("#popup1");
    $popup1.css("top", ($popup1.height())/2);
    $popup1.css("left",(dwidth-$popup1.width())/2);
 
    $popup1.fadeIn();
}
function closePopup(){
    $("#background").fadeOut();
    $(".popup").hide();
}
</script-->
<div class="clearfix" id="content" style="width:300px;" >
    <div class="clearfix" style="border: 1px solid #E9E9E9;">
        <a href="<?echo str_replace("_thumbnail","",$row_pro['image']);?>" class="jqzoom" rel='gal1'  title="<?php echo $row_pro['name'];?>" >
           <Center> <img src="<?echo str_replace("_thumbnail","",$row_pro['image']);?>"  style="max-width: 300px;max-height: 300px;" title="<?php echo $row_pro['name'];?>"  style="border: 1px solid #C0C0C0;"></Center> 
        </a>
    </div>
	<br/>
 <div class="clearfix" >
	<ul id="thumblist" class="clearfix" >
<div id="detail_product_picture_thumbnail"><a class="left" href="javascript:;" onclick="slidePictureThumbnail('left', $(this))"></a><div class="center">
<table cellpadding="0" cellspacing="6">
<tr>
<td zoom="0">
<li><a class="zoomThumbActive" href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: './<?echo str_replace("_thumbnail","",$row_pro['image']);?>',largeimage: './<?echo str_replace("_thumbnail","",$row_pro['image']);?>'}"><img src='<?echo str_replace("_thumbnail","",$row_pro['image']);?>' width="48" height="50"></a></li>
</td>

<?php foreach($img as $img)
	{?>

<?}?>
</tr>
</table>
</div><a class="right" href="javascript:;" onclick="slidePictureThumbnail('right', $(this))"></a>
<div class="clear"></div>
</div>

	</ul>
	</div>
</div>
</div>
<div class="space"></div>
</div>
<!--begin info pro-->
<div id="pro_views_info">
<div>
<div style="float: left;padding-left:20px;font-size:13px;    margin-top: -21px;">
<div >
<div >



</div>

<div style="width:98%;padding-bottom:10px;padding: 8px 0;
    border-bottom: 1px solid #ddd;">
	<a> <?php include("system/views/frame_title.php");?></a>
	<h3><?php echo $row_pro['name'];?></h3>
	
	<?php
$sql_con=@mysql_query("SELECT * FROM comment where id='".$id."' ");
$tong_con=@mysql_num_rows($sql_con);
$cnt=0;
$tongcong=0;
while($row_con=mysql_fetch_assoc($sql_con))
{
?>
<?
$tongcong=$tongcong+$row_con['rate'];
$trungbinh=$tongcong/$tong_con;
$cnt=$cnt+1;
}?>
<?php if($tongcong=='' )
{?>
<?}
else{?>
<?php if($trungbinh>='1' & $trungbinh<'1.5')
{?>
<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($trungbinh>='1.5' & $trungbinh<'2')
{?>
<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star-half-empty" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>



<?php if($trungbinh>='2' & $trungbinh<'2.5')
{?>
<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($trungbinh>='2.5' & $trungbinh<'3')
{?>
<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star-half-empty" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>


<?php if($trungbinh>='3' & $trungbinh<'3.5')
{?>
<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($trungbinh>='3.5' & $trungbinh<'4')
{?>
<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star-half-empty" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>


<?php if($trungbinh>='4' & $trungbinh<'4.5')
{?>
<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($trungbinh>='4.5' & $trungbinh<'5')
{?>
<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star-half-empty" style="color: red;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($trungbinh>='5' )
{?>
<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>
<b><?echo round($trungbinh*20,2);?>%</b>&nbsp;&nbsp;<b style="
    font-size: 11px;
    color: #f32c6b;
">Đánh giá tích cực</b> <b><b  style="
    color: #4e0cc3;
"> &nbsp;&nbsp;&nbsp;(<?php echo $tong_con;?> đánh giá)</b>
</b>&nbsp;&nbsp;&nbsp;&nbsp;<?}?>



<p data-tooltip-text="Đã có <?php echo $row_pro['nguoimua'];?> lượt mua" class="tooltip3">
<i class="fa  fa-tag"  >
</i>
<?php echo $row_pro['nguoimua'];?>&nbsp;&nbsp;&nbsp;
</p>
<p data-tooltip-text="Đã có <?php echo $row_pro['view'];?> lượt xem" class="tooltip3">
<i class="fa  fa-fw fa-eye"  >
</i>
<?php echo $row_pro['view'];?>
</p>

</div>




			
				<div style="padding-top:2px;padding-bottom:10px;font-size: 15px;">
				
                
                </div>
				

 <?if($row_user['diemlua']==''){?>
<?}else{?>

                <div data-tooltip-text="Bạn được thưởng <?php echo str_replace(",",",",number_format($row_pro['price_special']*$row_user['diemlua']/100,0));?> điểm LỬA khi mua sản phẩm này.
Tích điểm để dùng thay cho tiền khi mua hàng trên ShopCanTho.Vn" class="tooltip8" style="
    background-color: #fff;
    border: 1px dashed #ffc2c7;
    border-left: 3px solid #ffc2c7;
    display: inline-block;
    line-height: 26px;
    padding: 0 10px;
    cursor: pointer;
    font-size: 12px;
">

                          
                           <b> Tặng ngay</b> <img src="/images/shopluado-icon.png" > + <?php echo str_replace(",",",",number_format($row_pro['price_special']*$row_user['diemlua']/100,0));?>
 </div>
<?}?> 

 
                 <div class="d-row">
                          
                            <meta itemprop="priceCurrency" content="VND" />
                           <font>  <span style="
    /* color: #D60808; */
    /* font-size: 14px; */
    /* font-weight: bold; */
    color: #ec2800;
    font-size: 19px;
    font-weight: bold;
    margin-right: 10px;
    display: inline-block;
    " class="s-price" itemprop="price"><b> <?php if($row_pro['price_special']=='0'){?><font color="red"><b>Liên hệ: <?php echo $row_user['phone'];?></b></font><?}else{?><?php echo str_replace(",",".",number_format($row_pro['price_special'],0));?><span style="vertical-align: super; font-size: 80%;" >đ</span></b></font>
	
<?php if($row_pro['price'] <='0')
                {?>
                <?}else{?>
	<s><?php echo str_replace(",",".",number_format($row_pro['price'],0));?>đ </s>
                <?}?>	

	
	
	<?}?>  </span> 
	
 </div>

<?if($row_pro['code']==''){?>
<?}else{?>

  <div class="d-row" >
                        <label class="khungsanpham" >Mã SP :</label>
                        <span class="s-text" itemprop="identifier" content="mpn:Sloggi ZERO"><?php echo str_replace(",",".",($row_pro['code']));?></span>
                    </div>
<?}?> 
   <?if($row_city['name']==''){?>
	    <div class="d-row" >
                        <label class="khungsanpham" >Kho hàng :</label>
                            <span class="s-text">Nội ô TP.Cần Thơ</span>
                        </div>
	   
<?}else{?>

 <div class="d-row" >
                        <label class="khungsanpham" >Kho hàng :</label>
                            <span class="s-text"><?php if($row_pro['city']=='0'){?>Toàn quốc<?}else{?><?php echo $row_city['name'];?><?}?></span>
                        </div>
<?}?>                  
<?if($row_pro['baohanh']==''){?>

<?}else{?>

	
					<div class="d-row">
                            <label class="khungsanpham">Bảo hành :</label>
                            <span class="s-text"><?php echo $row_pro['baohanh'];?></span>
                        </div>
<?}?> 		
<!-------------------------------------------uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu------------------------------------>




<?php
	$ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
?>
<?

	$sql = "select * from thanhvien where user='".$_SESSION['mem']."'";	
	$result = mysql_query($sql,$con);	
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	$date = date("d-m-Y H:i:s");
	$cust=mysql_fetch_assoc($result);

$sql2=mysql_query("SELECT * FROM provinces where id='".$_POST['phivanchuyen']."'");
$row2=mysql_fetch_assoc($sql2);
$phi = $row2['phivanchuyen'];
	
if (isset($_POST['butsub'])) {
	$name = $_POST['name'];
	$mausac = $_POST['mausac'];
	$kichthuoc = $_POST['kichthuoc'];
	$update_soluong = $_POST['update_soluong'];
	$phivanchuyen1 = $_POST['phivanchuyen'];
	$congdiemlua = $row_pro['price_special'] * $update_soluong * $row_user['diemlua']/100;






 

	$sql = "insert into orders (ip,orders_customer_id,orders_name,orders_phone,orders_email,orders_address,orders_user,orders_date,mausac,kichthuoc,user_mem,diemlua,tinhthanh,active_shop) values ('".$ip."','".$cust['id']."','".$cust['fullname']."','".$cust['phone']."','".$cust['email']."','".$cust['address']."' ,'".$row_user['user']."','".$date."' ,'".$mausac."','".$kichthuoc."' ,'".$_SESSION['mem']."','".$congdiemlua."','0' ,'100'  )";
		if (mysql_query($sql,$con)) {

	
			{
				$newid=mysql_insert_id();
				$sqlUpdate = "insert into orderdetail (ordersdetail_product_id,ordersdetail_quantity,ordersdetail_price,ordersdetail_ordersid,user,user_mem,phivanchuyen) values (".$row_pro["id"].",".$update_soluong.",'".$row_pro['price_special']."',".$newid.",'".$row_user['user']."','".$_SESSION['mem']."' ,'0')";
				mysql_query($sqlUpdate,$con);
				$_SESSION['tim_id']=$newid;
			}
			$err=" <SCRIPT LANGUAGE='JavaScript'>
    window.location.href='./index1.php?home=quanlydonhang_order';
    </SCRIPT>";
		}	
		
		else {
			$err =  "<p align=center class='err'><SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không thành công vui lòng liên hệ trợ giúp')
    </SCRIPT></p>";
		}
 


}
?>

<FORM  method="POST" name="cartform" onsubmit="return check()"   >	

<input type="hidden" name="log" value="<?php echo ($_SESSION['mem'] );?>" >

<? echo $err;?>




























<?php if($row['mausac_nau']=='' &  $row['mausac_vang']=='' &  $row['mausac_trang']==''&  $row['mausac_den']==''&  $row['mausac_hong']==''&  $row['mausac_xanhla']==''&  $row['mausac_xanhnuocbien']==''&  $row['mausac_xanhngoc']==''&  $row['mausac_xanhden']==''&  $row['mausac_xam']==''&  $row['mausac_tim']==''&  $row['mausac_do']==''&  $row['mausac_cam']==''&  $row['mausac_kem']==''&  $row['mausac_xanhduong']==''&  $row['mausac_soc']==''&  $row['mausac_xanhladam']==''&  $row['mausac_hoatiet']==''&  $row['mausac_bac']==''&  $row['mausac_hongphan']=='')
{?>
<?}
else{?>
 <div class="d-row" >
                        <label class="khungsanpham" style=" color: red; " >Màu sắc :</label>
 <span class="s-text" itemprop="brand">
 
  <label   title="Ngẫu nhiên"> 
 <input   type="radio"  name="mausac" value=""  >
                    </label>
 
 
 <?php if($row['mausac_nau']=='' )
{?>
<?}
else{?>
 <label style="background: #804000;padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu nâu"> 
 <input style="padding-right: 3px;width: 17px;margin-left: -5px;color: #00f5f5;" type="radio"  name="mausac" value="804000" >
                    </label>
<?}?>
<?php if($row['mausac_vang']=='' )
{?>
<?}
else{?>
 <label style="background: #ffff00;padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu vàng">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="ffff00" >
                    </label>
<?}?>
<?php if($row['mausac_trang']=='' )
{?>
<?}
else{?>
 <label style="background: #ffffff;padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu trắng">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="ffffff" >
                    </label>
<?}?>
<?php if($row['mausac_den']=='' )
{?>
<?}
else{?>
 <label style="background: #000000;padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu đen">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="000000" >
                    </label>
<?}?>
<?php if($row['mausac_hong']=='' )
{?>
<?}
else{?>
 <label style="background: #ff00ff;padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu hồng">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="ff00ff" >
                    </label>
<?}?>
<?php if($row['mausac_xanhla']=='' )
{?>
<?}
else{?>
 <label style="background: #00ff00;padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu xanh lá">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="00ff00" >
                    </label>
<?}?>
<?php if($row['mausac_xanhnuocbien']=='' )
{?>
<?}
else{?>
 <label style="background: #0080ff;padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu xanh nước biển">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="0080ff" >
                    </label>
<?}?>
<?php if($row['mausac_xanhngoc']=='' )
{?>
<?}
else{?>
 <label style="background: #00ffff;padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu xanh ngọc">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="00ffff" >
                    </label>
<?}?>
<?php if($row['mausac_xanhden']=='' )
{?>
<?}
else{?>

 <label style="background: #112c4e;padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu xanh đen">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="112c4e" >
                    </label>
<?}?>
<?php if($row['mausac_xam']=='' )
{?>
<?}
else{?>

 <label style="background: #999999;padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu xám">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="999999" >
                    </label>
<?}?>
<?php if($row['mausac_tim']=='' )
{?>
<?}
else{?>
 <label style="background: #800080;padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu tím">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="800080" >
                    </label>
<?}?>
<?php if($row['mausac_do']=='' )
{?>
<?}
else{?>
 <label style="background: #ff0000;padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu đỏ">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="ff0000" >
                    </label>
<?}?>
<?php if($row['mausac_cam']=='' )
{?>
<?}
else{?>
 <label style="background: #ff8040;padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu cam">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="ff8040" >
                    </label>
<?}?>
<?php if($row['mausac_kem']=='' )
{?>
<?}
else{?>
 <label style="background: #fef1ce;padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu kem">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="fef1ce" >
                    </label>
<?}?>

<?php if($row['mausac_xanhduong']=='' )
{?>
<?}
else{?>
 <label style="background: #0522c5;padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu xanh dương">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="0522c5" >
                    </label>
<?}?>
<?php if($row['mausac_soc']=='' )
{?>
<?}
else{?>
 <label style="background: url(/images/mul-color.gif) center center no-repeat;padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu sọc">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="mul-color.gif" >
                    </label>
<?}?>
<?php if($row['mausac_xanhladam']=='' )
{?>
<?}
else{?>
 <label style="background: #007000;padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu xanh lá đậm">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="007000" >
                    </label>
<?}?>
<?php if($row['mausac_hoatiet']=='' )
{?>
<?}
else{?>
 <label style="background: url(/images/floral.jpg) center center no-repeat;padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu họa tiết">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="floral.jpg" >
                    </label>
<?}?>
<?php if($row['mausac_bac']=='' )
{?>
<?}
else{?>
 <label style="background: #cccccc;padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu bạc">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="cccccc" >
                    </label>
<?}?>
<?php if($row['mausac_hongphan']=='' )
{?>
<?}
else{?>
 <label style="background: #ffc0cb;padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;" title="Màu hồng phấn">
					 <input style="
    padding-right: 3px;
    width: 17px;
    margin-left: -5px;
    color: #00f5f5;
" type="radio" name="mausac" value="ffc0cb" >
                    </label>
<?}?></span>
 
 
 
 
 </div>	

		<?}?>	

<?php if($row['kichthuoc_freesize']=='' & $row['kichthuoc_1']=='' & $row['kichthuoc_2']=='' & $row['kichthuoc_3']=='' & $row['kichthuoc_4']=='' & $row['kichthuoc_5']=='' & $row['kichthuoc_6']=='' & $row['kichthuoc_7']=='' & $row['kichthuoc_8']=='' & $row['kichthuoc_9']=='' & $row['kichthuoc_10']=='' & $row['kichthuoc_11']=='' & $row['kichthuoc_12']=='' & $row['kichthuoc_S']=='' & $row['kichthuoc_M']=='' & $row['kichthuoc_L']=='' & $row['kichthuoc_XL']=='' & $row['kichthuoc_XXL']=='' & $row['kichthuoc_XS']=='' & $row['kichthuoc_XXS']=='' & $row['kichthuoc_2XL']=='' & $row['kichthuoc_3XL']=='' & $row['kichthuoc_4XL']=='' & $row['kichthuoc_5XL']=='' & $row['kichthuoc_6XL']=='' & $row['kichthuoc_25']=='' & $row['kichthuoc_26']=='' & $row['kichthuoc_27']=='' & $row['kichthuoc_28']=='' & $row['kichthuoc_29']=='' & $row['kichthuoc_30']=='' & $row['kichthuoc_31']=='' & $row['kichthuoc_32']=='' & $row['kichthuoc_33']=='' & $row['kichthuoc_34']=='' & $row['kichthuoc_35']=='' & $row['kichthuoc_36']=='' & $row['kichthuoc_37']=='' & $row['kichthuoc_38']=='' & $row['kichthuoc_39']=='' & $row['kichthuoc_40']=='' & $row['kichthuoc_41']=='' & $row['kichthuoc_42']=='' & $row['kichthuoc_43']=='' & $row['kichthuoc_44']=='' & $row['kichthuoc_45']=='' & $row['kichthuoc_46']=='' & $row['kichthuoc_47']=='')
{?>
<?}
else{?>
 <div class="d-row" >
                        <label class="khungsanpham" style=" color: red; " >Kích thước :</label>
                           <span class="s-text">
<?php if($row['kichthuoc_freesize']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="FreeSize" >
<span style="color: #000;padding-right: 5px;">Free Size</span>
                    </label>
					
<?}?>
<?php if($row['kichthuoc_1']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="1" >
<span style="color: #000;padding-right: 5px;">1</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_2']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="2" >
<span style="color: #000;padding-right: 5px;">2</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_3']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="3" >
<span style="color: #000;padding-right: 5px;">3</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_4']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="4" >
<span style="color: #000;padding-right: 5px;">4</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_5']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="5" >
<span style="color: #000;padding-right: 5px;">5</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_6']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="6" >
<span style="color: #000;padding-right: 5px;">6</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_7']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="7" >
<span style="color: #000;padding-right: 5px;">7</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_8']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="8" >
<span style="color: #000;padding-right: 5px;">8</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_9']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="9" >
<span style="color: #000;padding-right: 5px;">9</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_10']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="10" >
<span style="color: #000;padding-right: 5px;">10</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_11']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="11" >
<span style="color: #000;padding-right: 5px;">11</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_12']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="12" >
<span style="color: #000;padding-right: 5px;">12</span>
                    </label>
<?}?>
				<?php if($row['kichthuoc_S']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="S" >
<span style="color: #000;padding-right: 5px;">S</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_M']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="M" >
<span style="color: #000;padding-right: 5px;">M</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_L']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="L" >
<span style="color: #000;padding-right: 5px;">L</span>
                    </label>
<?}?>		
<?php if($row['kichthuoc_XL']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="XL" >
<span style="color: #000;padding-right: 5px;">XL</span>
                    </label>
<?}?>	
<?php if($row['kichthuoc_XXL']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="XXL" >
<span style="color: #000;padding-right: 5px;">XXL</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_XS']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="XS" >
<span style="color: #000;padding-right: 5px;">XS</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_XXS']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="XXS" >
<span style="color: #000;padding-right: 5px;">XXS</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_2XL']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="2XL" >
<span style="color: #000;padding-right: 5px;">2XL</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_3XL']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="3XL" >
<span style="color: #000;padding-right: 5px;">3XL</span>
                    </label>
<?}?><?php if($row['kichthuoc_4XL']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="4XL" >
<span style="color: #000;padding-right: 5px;">4XL</span>
                    </label>
<?}?><?php if($row['kichthuoc_5XL']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="5XL" >
<span style="color: #000;padding-right: 5px;">5XL</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_6XL']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="6XL" >
<span style="color: #000;padding-right: 5px;">6XL</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_25']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="25" >
<span style="color: #000;padding-right: 5px;">25</span>
                    </label>
<?}?><?php if($row['kichthuoc_26']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="26" >
<span style="color: #000;padding-right: 5px;">26</span>
                    </label>
<?}?><?php if($row['kichthuoc_27']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="27" >
<span style="color: #000;padding-right: 5px;">27</span>
                    </label>
<?}?><?php if($row['kichthuoc_28']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="28" >
<span style="color: #000;padding-right: 5px;">28</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_29']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="29" >
<span style="color: #000;padding-right: 5px;">29</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_30']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="30" >
<span style="color: #000;padding-right: 5px;">30</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_31']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="31" >
<span style="color: #000;padding-right: 5px;">31</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_32']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="32" >
<span style="color: #000;padding-right: 5px;">32</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_33']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="33" >
<span style="color: #000;padding-right: 5px;">33</span>
                    </label>
<?}?><?php if($row['kichthuoc_34']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="34" >
<span style="color: #000;padding-right: 5px;">34</span>
                    </label>
<?}?><?php if($row['kichthuoc_35']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="35" >
<span style="color: #000;padding-right: 5px;">35</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_36']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="36" >
<span style="color: #000;padding-right: 5px;">36</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_37']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="37" >
<span style="color: #000;padding-right: 5px;">37</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_38']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="38" >
<span style="color: #000;padding-right: 5px;">38</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_39']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="39" >
<span style="color: #000;padding-right: 5px;">39</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_40']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="40" >
<span style="color: #000;padding-right: 5px;">40</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_41']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="41" >
<span style="color: #000;padding-right: 5px;">41</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_42']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="42" >
<span style="color: #000;padding-right: 5px;">42</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_43']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="43" >
<span style="color: #000;padding-right: 5px;">43</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_44']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="44" >
<span style="color: #000;padding-right: 5px;">44</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_45']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="45" >
<span style="color: #000;padding-right: 5px;">45</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_46']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="46" >
<span style="color: #000;padding-right: 5px;">46</span>
                    </label>
<?}?>
<?php if($row['kichthuoc_47']=='' )
{?>
<?}
else{?>
 <label style="padding-left: 7px;outline: 1px solid #ccc;    margin-right: 9px;background: #e8e6e6;" >
 <input style="padding-right: 3px;width: 17px;margin-left: -5px; color: #000;" type="radio" name="kichthuoc" value="47" >
<span style="color: #000;padding-right: 5px;">47</span>
                    </label>
<?}?>
</span>
                        </div>
						<?}?>

		
 
	<?php if($row_user['hotrovanchuyen_tu'] =='0' )
{?>

<?}else{?>

	
					<div class="d-row">
                            <label style=" font-size: 12px; " ><i class="fa fa-fw fa-truck"></i> Shop <b style="color: red;">MIỄN PHÍ VẬN CHUYỂN</b> cho đơn hàng từ <b style="color: #10ab16;"><?php echo str_replace(",",",",number_format($row_user['hotrovanchuyen_tu'],0));?>đ</b> trở lên</label>
							 
							 
							 
							






					
					
					
                        </div>
						
<?}?> 		
 <label ><i class="fa fa-fw fa-plus-square"></i> Số lượng <b ><select   style="border: 1px solid #ddd;    " name="update_soluong"   >    
	
                                                             <option value="1" title="Chọn số lượng 1" >1</option>															 
                                                             <option value="2" title="Chọn số lượng 2" >2</option>	
                                                             <option value="3" title="Chọn số lượng 3" >3</option>															 
                                                             <option value="4" title="Chọn số lượng 4" >4</option>
                                                             <option value="5" title="Chọn số lượng 5" >5</option>															 
                                                             <option value="6" title="Chọn số lượng 6" >6</option>
                                                             <option value="7" title="Chọn số lượng 7" >7</option>															 
                                                             <option value="8" title="Chọn số lượng 8" >8</option>
                                                             <option value="9" title="Chọn số lượng 9" >9</option>															 
                                                             <option value="10" title="Chọn số lượng 10" >10</option>
                                                             <option value="11" title="Chọn số lượng 11" >11</option>															 
                                                             <option value="12" title="Chọn số lượng 12" >12</option>	
                                                             <option value="13" title="Chọn số lượng 13" >13</option>															 
                                                             <option value="14" title="Chọn số lượng 14" >14</option>	
                                                             <option value="15" title="Chọn số lượng 15" >15</option>															 
                                                             <option value="16" title="Chọn số lượng 16" >16</option>
                                                             <option value="17" title="Chọn số lượng 17" >17</option>															 
                                                             <option value="18" title="Chọn số lượng 18" >18</option>
                                                             <option value="19" title="Chọn số lượng 19" >19</option>															 
                                                             <option value="20" title="Chọn số lượng 20" >20</option>															 
</select>	



</b>

<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","/system/views/xuly_cart.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

</label>
	<span id="errormaussac"  ></span>
                    <div class="d-row d-total">
                        
                        
                    </div>

						
						
						
						
						
                    <div class="d-row" style="margin-top:8px;">
				
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
				$("#profile").html("<div style='float: left;'>Xin chào: <?php echo $_SESSION['log'];?> | </div><div class='style_mem'><ul><li><a href='./?home=member'><font color='#00a2e8'>Quản trị</font></a><ul><li><a href='./?home=member'>+ Trang thành viên</a></li><li><a href='./quantri'>+ Quản trị gian hàng</a></li><li><a href='<?php echo $domain_home;?>/<?php echo $_SESSION['log'];?>' target='_blank'>+ Xem gian hàng</a></li></ul></li></ul></div><div style='float: left;'> | <a href='logout.php' id='logout'><font color='#ddd'>Thoát</font></a></div>");location="index1.php?home=products&<?php echo doidau(mb_strtolower($row_pro['name'],"UTF8"));?>&views=<?php echo $row_pro['id'];?>&mem=1";
				
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
<script type="text/javascript">
$(document).ready(function(){
	$("#login_a_thich").click(function(){
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
				$("#profile").html("<div style='float: left;'>Xin chào: <?php echo $_SESSION['log'];?> | </div><div class='style_mem'><ul><li><a href='./?home=member'><font color='#00a2e8'>Quản trị</font></a><ul><li><a href='./?home=member'>+ Trang thành viên</a></li><li><a href='./quantri'>+ Quản trị gian hàng</a></li><li><a href='<?php echo $domain_home;?>/<?php echo $_SESSION['log'];?>' target='_blank'>+ Xem gian hàng</a></li></ul></li></ul></div><div style='float: left;'> | <a href='logout.php' id='logout'><font color='#ddd'>Thoát</font></a></div>");location="index1.php?home=products&<?php echo doidau(mb_strtolower($row_pro['name'],"UTF8"));?>&views=<?php echo $row_pro['id'];?>&mem=1";
				
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






<script type="text/javascript">
$(document).ready(function(){
	$("#login_a1").click(function(){
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
				$("#profile").html("<div style='float: left;'>Xin chào: <?php echo $_SESSION['log'];?> | </div><div class='style_mem'><ul><li><a href='./?home=member'><font color='#00a2e8'>Quản trị</font></a><ul><li><a href='./?home=member'>+ Trang thành viên</a></li><li><a href='./quantri'>+ Quản trị gian hàng</a></li><li><a href='<?php echo $domain_home;?>/<?php echo $_SESSION['log'];?>' target='_blank'>+ Xem gian hàng</a></li></ul></li></ul></div><div style='float: left;'> | <a href='logout.php' id='logout'><font color='#ddd'>Thoát</font></a></div>");location="<?php echo "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>";
				
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
	<?php 
    $sql_user12=@mysql_query("SELECT * FROM po_tick where pro_id='".$row_pro['id']."'  ");
    $row_tick2=@mysql_fetch_assoc($sql_user12);
    ?>	
	<?php 
    $sql_user1=@mysql_query("SELECT * FROM po_tick where id='".$row_tick2['id']."'  ");
    $row_tick=@mysql_fetch_assoc($sql_user1);
    ?>	 
	
 
 
 <!--end tick-->  














 <?if($_SESSION['mem']==''){?>
 
  <?if($_REQUEST['mem']==''){?>
 
<a style="
    float: left;
    background-color: #F44336;
    cursor: pointer !important;
    color: #FFF;
    padding: 6px 20px 8px 20px;
    line-height: 16px;
    font-weight: bold;
    font-size: 100%;
    text-decoration: none;
    text-align: center;
    white-space: nowrap;
    font-size: 125%;
    padding: 12px 22px;
    margin-left: 8px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
" title="Mua ngay"  id="myBtn" ><i  class="fa fa-check"></i> MUA NGAY</a>
  <a style="
    float: left;
    background-color: #0094da;
    cursor: pointer !important;
    color: #FFF;
    padding: 6px 20px 8px 20px;
    line-height: 16px;
    font-weight: bold;
    font-size: 100%;
    text-decoration: none;
    text-align: center;
    white-space: nowrap;
    font-size: 125%;
    padding: 12px 22px;
    margin-left: 8px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
" title="Thêm vào giỏ hàng" id="login_a_thich"   ><i style=" color: red; " class="fa fa-fw fa-heart"></i> THÊM VÀO YÊU THÍCH</a>

<?}else{?>



<?if($row_pro['tinhtrang']=='1' &&  $row_pro['status']=='0'  ){?>	
<button name="butsub" type="submit"
 style="
    float: left;
    background-color: #F44336;
    cursor: pointer !important;
    color: #FFF;
    padding: 6px 20px 8px 20px;
    line-height: 16px;
    font-weight: bold;
    font-size: 100%;
    text-decoration: none;
    text-align: center;
    white-space: nowrap;
    font-size: 125%;
    padding: 12px 22px;
    margin-left: 8px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
" title="Mua ngay"  ><i  class="fa fa-check"></i> MUA NGAY</button>
					<?}else{?>
					<span   
 style="
    float: left;
    background-color: #585352;
    cursor: pointer !important;
    color: #FFF;
    padding: 6px 20px 8px 20px;
    line-height: 16px;
    font-weight: bold;
    font-size: 100%;
    text-decoration: none;
    text-align: center;
    white-space: nowrap;
    font-size: 125%;
    padding: 12px 22px;
    margin-left: 8px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
" title="Mua ngay"  ><i  class="fa fa-fw fa fa-fw fa-warning"></i> HẾT HÀNG</span>
					<?}?>



<?}?>



<?}else{?>



<?if($row_pro['tinhtrang']=='1' &&  $row_pro['status']=='0'  ){?>	
<button name="butsub" type="submit"
 style="
    float: left;
    background-color: #F44336;
    cursor: pointer !important;
    color: #FFF;
    padding: 6px 20px 8px 20px;
    line-height: 16px;
    font-weight: bold;
    font-size: 100%;
    text-decoration: none;
    text-align: center;
    white-space: nowrap;
    font-size: 125%;
    padding: 12px 22px;
    margin-left: 8px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
" title="Mua ngay"  ><i  class="fa fa-check"></i> MUA NGAY</button>
					<?}else{?>
					<span   
 style="
    float: left;
    background-color: #585352;
    cursor: pointer !important;
    color: #FFF;
    padding: 6px 20px 8px 20px;
    line-height: 16px;
    font-weight: bold;
    font-size: 100%;
    text-decoration: none;
    text-align: center;
    white-space: nowrap;
    font-size: 125%;
    padding: 12px 22px;
    margin-left: 8px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
" title="Mua ngay"  ><i  class="fa fa-fw fa fa-fw fa-warning"></i> HẾT HÀNG</span>
					<?}?>



 <?php if($row_pro['id']==$row_tick['pro_id'] && $row_tick2['user'] == $_SESSION['mem'])
 {?>


 
 <a style="
    float: left;
    background-color: #0094da;
    cursor: pointer !important;
    color: #FFF;
    padding: 6px 20px 8px 20px;
    line-height: 16px;
    font-weight: bold;
    font-size: 100%;
    text-decoration: none;
    text-align: center;
    white-space: nowrap;
    font-size: 125%;
    padding: 12px 22px;
    margin-left: 8px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
" title="Thêm vào giỏ hàng" href="<?php echo "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>" id="post_id<?php  echo $row_pro['id']?>" class="Unlike"  ><i style=" color: red; " class="fa fa-fw fa-heart"></i>HỦY BỎ YÊU THÍCH</a>


			<?php }else{?>
        
	 <a style="
    float: left;
    background-color: #0094da;
    cursor: pointer !important;
    color: #FFF;
    padding: 6px 20px 8px 20px;
    line-height: 16px;
    font-weight: bold;
    font-size: 100%;
    text-decoration: none;
    text-align: center;
    white-space: nowrap;
    font-size: 125%;
    padding: 12px 22px;
    margin-left: 8px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
" title="Thêm vào giỏ hàng" href="<?php echo "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>" id="post_id<?php  echo $row_pro['id']?>" class="LikeThis"  ><i style=" color: red; " class="fa fa-fw fa-heart"></i>THÊM VÀO YÊU THÍCH</a>


			<?php }?>

 

 

  <?}?> 	

  
						
                    </div>

<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">×</span>
					  <td>
                    <button type="button"  id="login_a" class="btn btn-block btn-danger btn-lg">Đăng nhập để mua hàng</button>
                  </td>
                     <td>
<?php if($row['mausac_nau']=='' &  $row['mausac_vang']=='' &  $row['mausac_trang']==''&  $row['mausac_den']==''&  $row['mausac_hong']==''&  $row['mausac_xanhla']==''&  $row['mausac_xanhnuocbien']==''&  $row['mausac_xanhngoc']==''&  $row['mausac_xanhden']==''&  $row['mausac_xam']==''&  $row['mausac_tim']==''&  $row['mausac_do']==''&  $row['mausac_cam']==''&  $row['mausac_kem']==''&  $row['mausac_xanhduong']==''&  $row['mausac_soc']==''&  $row['mausac_xanhladam']==''&  $row['mausac_hoatiet']==''&  $row['mausac_bac']==''&  $row['mausac_hongphan']=='')
{?>
 <button type="submit"   name="butsub" class="btn btn-block btn-success btn-lg">Mua hàng không cần đăng nhập</button>
<?}
else{?>	
 <a  style=" width: 90%; "  href="index1.php?home=products&<?php echo doidau(mb_strtolower($row_pro['name'],"UTF8"));?>&views=<?php echo $row_pro['id'];?>&mem=1" class="btn btn-block btn-success btn-lg">Mua hàng không cần đăng nhập</a>				 
<?}?> 					 
   



				</td>
	 

  </div>

</div>

					
</FORM>					
<script language="javascript" type="text/javascript">
function check()
{



for(i=0;i<document.cartform.mausac.length;i++)
if(document.cartform.mausac[i].checked==true)
	
{
check="yes"
}
if(check=="yes")
{
return true;
}
else
{
$("#errormaussac").html("<span style='color: #fff;background: red; padding: 6px;border: blue;border: 1px dashed #FFEB3B;'; >Vui lòng chọn <b>Màu Sắc</b> ");
return false;
}





return true;
}
</script>		
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
         <!--tick-->

               
	
	<!--vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv-->
	
	
	
	
				<!--div style="padding-top:2px;font-size: 15px;"><b>Giá gốc:</b> <s><?php echo str_replace(",",".",number_format($row_pro['price'],0));?> VNĐ </s></div-->
                

<br />
<!--button id="button1" onclick="window.location='./?home=cart&p=<?php echo $row_pro['id'];?>'"></button-->

 <!--end tick-->
<br />
<div>
<!--begin chia se--
<div style="width:280px;">
<strong style="float: left;margin-top:-3px;font-weight: bold;color: #646464;">Chia sẻ: </strong>
<div class="share_pro">
<a href="javascript:;" onclick="window.print()" title="print"><img border="0" alt="print" src="images/shareicon/print.png" title="print"></a>
<a onclick="share_facebook();" href="javascript:;" title="Share on Facebook"><img border="0" alt="Share on Facebook" src="images/shareicon/facebook.png" title="Share on Facebook"></a>
<a onclick="share_twitter();" href="javascript:;" title="Share on Twitter"><img border="0" alt="Share on Twitter" src="images/shareicon/twitter.png" title="Share on Twitter"></a>
<a onclick="share_google();" href="javascript:;" title="Share on Google"><img border="0" alt="Share on Google" src="images/shareicon/google.png" title="Share on Google"></a>
<a onclick="share_zing();" href="javascript:;" title="Share on Zing"><img border="0" alt="Share on Zing" src="images/shareicon/zing.png" title="Share on Zing"></a>
<a onclick="share_linkhay();" href="javascript:;" title="Share on Link Hay"><img border="0" alt="Share on Link Hay" src="images/shareicon/linkhay.png" title="Share on Link Hay"></a>
<a onclick="share_govn();" href="javascript:;" title="Share on Go.VN"><img border="0" alt="Share on Go.VN" src="images/shareicon/govn.png" title="Share on Go.VN"></a>
<a onclick="u=location.href;t=document.title;window.open('ymsgr:im?+&amp;msg=Xem trang này đi, hay lắm đó: '+encodeURIComponent(t)+' ~~&gt; '+encodeURIComponent(u))" href="javascript: ;" title="Buzz to Yahoo"><img border="0" alt="Buzz to Yahoo" src="images/shareicon/buzz.png" title="Buzz to Yahoo"></a>
</div>
</div>
<!-- end chia se-->
</div>
</div>
</div>
 
 
</div>
<!--end info pro-->
</div>


<div class="d-dp-shop">
            	    <div class="d-shop">
                	  <b style="
    padding: 9px;
">Bạn muốn hỏi về sản phẩm?</b>
                        <p class="p-text-shop hotline">Vui lòng gọi: <?php echo $row_user['phone'];?></p>
		
						 <p
						style="
						margin: 0 0 -4px 0;
    padding: 5px;
    font-size: 14px;
    color: #447308;
    "><i class="fa  fa-money">
</i>   <b style="
    font-size: 12px;
    color: black;
">Thanh toán khi nhận hàng</b></p>

<p
						style="
						margin: 0 0 -4px 0;
    padding: 5px;
    font-size: 14px;
    color: #447308;
    "><i class="fa   fa-truck">
</i>   <b style="
    font-size: 12px;
    color: black;
">Giao hàng toàn quốc</b></p>
<p
						style="
						margin: 0 0 -4px 0;
    padding: 5px;
    font-size: 14px;
    color: #447308;
    "><i class="fa   fa-shield">
</i>   <b style="
    font-size: 12px;
    color: black;
">Đổi trả sản phẩm bị lỗi</b></p>
<p
						style="
						margin: 0 0 -4px 0;
						
    padding: 5px;
    font-size: 14px;
    color: #447308;
    "><i class="fa    fa-star">
</i>   <b style="
    font-size: 12px;
    color: black;
">Cam kết giá rẻ nhất thị trường</b></p>

<img src="/images/baovemuahang.PNG">
<br>
<img src="/images/GiSz3E.png">
<br>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=835438139859194";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>    
<div style="padding: 4px;padding-left: 40px;padding-top: 17px; ">   

<div class='fb-like' data-action='like' data-href='' data-layout='button_count' data-share='true' data-show-faces='false' data-width='520'/>
</div>
                    </div>
					
				
					
                </div>


 



            </div>

<div class="space"></div>
<!--pro views info content-->
<div id="pro_views_right_info_content">
<?php include("system/views/pro_views_content.php");?>
</div>
<div class="space"></div>
<!--pro views pro comment-->
<!--div id="pro_views_right_comment">
<div class="fb-comments" data-href="http://<?php echo $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>" data-width="700" data-num-posts="10"></div>
</div-->
</div>
<?}?>
<link rel="stylesheet" href="js/style_pro.css" type="text/css">

<script type="text/javascript">
var picMainDomEle= $(document.getElementById("detail_product_picture_main"));
var picThumbDomEle= $(document.getElementById("detail_product_picture_thumbnail"));
var picThumbCurrentPage= 1;
var picThumbMaxPage= 3;
function slidePictureThumbnail(type, domEle){
if(type == "left"){
if(picThumbCurrentPage == 1) return;
picThumbCurrentPage--;
picThumbDomEle.find("table").animate({ marginLeft: "+=248" }, 400);
}
else if(type == "right"){
if(picThumbCurrentPage == picThumbMaxPage) return;
picThumbCurrentPage++;
picThumbDomEle.find("table").animate({ marginLeft: "-=248" }, 400);
}
domEle.blur();
}

var arrPicLoaded= Array();
arrPicLoaded[0]= 1;function changePictureProduct(domEle){
id= domEle.index();
if(arrPicLoaded[id] != 1) picMainDomEle.find(".loading").removeClass("hidden");
picThumbDomEle.find("td").removeClass("current");
domEle.addClass("current");
mainpath= domEle.find("a").attr("mainPicture");
zoom= parseInt(domEle.attr("zoom"));
picHtml= '<img src="' + mainpath + '" onclick="productPictureFancybox(' + id + ')" />';
if(zoom == 1) picHtml= '<img src="' + mainpath + '" data-zoom-image="' + domEle.find("a").attr("href") + '" />';
else $(".zoomContainer").remove();
if(arrPicLoaded[id] != 1){
$(picHtml).load(function(){
arrPicLoaded[id]= 1;
picMainDomEle.find(".loading").addClass("hidden").end().find("h1").html(picHtml);
if(zoom == 1) productPictureElevateZoom();
});
}
else{
picMainDomEle.find("h1").html(picHtml);
if(zoom == 1) productPictureElevateZoom();
}
}

picThumbDomEle.find("td").mouseenter(function(){
if($(this).is(".current")) return;
changePictureProduct($(this));
});
</script>
</div>
<!--begin right proviews-->

<div class="space">
</div>
<!--begin pro relate-->
<div>
<?php include("class/home/pro_relate.php");?>
</div>
</div>
<div class="space"></div>
<?php include("class/views/pro_relate.php");?>
<div class="space"></div>
</div>
 




			
			<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 999; /* Sit on top */
    padding-top: 100px; /* Location of the box */
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
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 30%;
}

/* The Close Button */
.close {
color: #222222;
    float: right;
    font-size: 28px;
    font-weight: bold;
    margin-top: -24px;
    margin-right: -18px;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
</head>
<body>

 

<!-- The Modal -->

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