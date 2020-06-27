
<?require("system/model/config.php") ?>
<? require("system/model/common_start.php") ?>
<? require("system/model/function.php") ?>
<? require("system/model/tiengviet.php") ?>
<?php 
//META and FACEBOOK
	
?>
<?php
$url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . $_SERVER['QUERYSTRING'];
$urlParts = explode('.', $_SERVER['HTTP_HOST']);
  if(strpos($url, 'www'))
    {
        $subdomain_value = $urlParts[1];  // có “www”
    } 
    else 
    {
        $subdomain_value = $urlParts[0];  // không có “www”
    }
    if($subdomain_value == 'dev' || $subdomain_value == 'DEV')
    {
                // viết hàm thực thi riêng cho subdomain gianhang.shopcantho.vn
    }
   else
   {
                // viết hàm thực thi riêng cho domain chính shopcantho.vn
   } ?>
<?php
$ok1=array("www.");
$ok2=array("");
?>
<?php 
if($_SERVER['SERVER_NAME']=='localhost')
{?>

<?}else{?>

<?}?>
<?
if($row['domain']==str_replace($ok1,$ok2,$_SERVER["SERVER_NAME"]))
{?>
<!--kiem tra khi co ten mien-->
<?if($tem=='')
	{?>
<?include("template/mobile/index.php");?>
	<?}else{?>
<?php if($row_mobile['mobile']=='0')
	{?>
	<?include($tem);?>
	<?}else{?>
<?include("system/model/mobile.php");?>
<?}?>
<?}?>
<!--end kiem tra khi co ten mien-->
<?}elseif($subdomain_value==$user){?>
<!--kiem tra khi co subdomain-->
<?if($tem=='')
	{?>
<?include("template/mobile/index.php");?>
	<?}else{?>
<?php if($row_mobile['mobile']=='0')
	{?>
	<?include($tem);?>
	<?}else{?>
<?include("system/model/mobile.php");?>
<?}?>
<?}?>
<!--end kiem tra subdomain-->

<?}else{?>
<?php include("system/model/mobile_home1.php");?>
<?}?>
<?require("system/model/common_end.php") ?>