<?php
session_start();
$lang= isset($_REQUEST['lang']) ? $_REQUEST['lang'] : 'vn';
$_SESSION['lang']=$lang;
?>
<?

 if(isset($_SESSION['kiemtra']) && $_SESSION['kiemtra']=='ON')
	{
	setcookie("user", $_SESSION['log'], time()+180); 
	setcookie("pass", $_SESSION['pass'], time()+180); 
	}
?>
<?require("system/model/config.php") ?>
<? require("system/model/common_start.php") ?>
<? require("system/model/function.php") ?>
<? require("system/model/tiengviet.php") ?>
<?php 
//META and FACEBOOK
	$sql_config=mysql_query("SELECT * FROM config ");
	$row_config=mysql_fetch_assoc($sql_config);
if($_REQUEST['home']=='products' && $_REQUEST['views'] != "")
{
	$sql_rv=mysql_query("SELECT a.*,b.code as currency_code,c.name as cat_name FROM products a left join currency b on a.currency = b.id left join cat c on c.id=a.cat where a.id='".$_REQUEST['views']."'");
	$row_rv=mysql_fetch_assoc($sql_rv);
	
	$title_fb = preg_replace('/\s\s+/', ' ', trim(dwebvn(strip_tags($row_rv['name']),30)));
	if($title_fb == "") {$title_fb = $home['fb_title'];}
	if($row_rv['price'] > 0) {$title_fb = $title_fb ." - ".$home['giaban']." ". number_format($row_rv['price']).$row_rv['currency_code'];} 
	$description_fb = preg_replace('/\s\s+/', ' ', trim(dwebvn(strip_tags($row_rv['content']),30)));
	if($description_fb == "") {$description_fb = $home['fb_description'];}
	if(file_exists($row_rv['img1'])){$image_fb = $row_rv['img1'];}else{$image_fb = "images/banner/logo_home.png";}
	list($width, $height) = getimagesize($image_fb);
	//if($width < 100 || $height < 100) {$image_fb = "upload/default/fb_product.png"; }
	
	$title_mt = $row_rv['cat_name']." | ".$row_config['title_pro'];
	$description_mt = $row_rv['cat_name'].", ".preg_replace('/\s\s+/', ' ', trim(dwebvn(strip_tags($row_rv['name']),30))).", ".preg_replace('/\s\s+/', ' ', trim(dwebvn(strip_tags($row_rv['short']),30))).", ".$row_config['description_pro'];
	$keyword_mt =  $row_rv['name'].", ".str_replace(" ",", ",preg_replace('/\s\s+/', ' ', trim(str_replace(array('.', ',', '(', ')', '{','}','[',']')," ",$row_rv['name']." ".$row_rv['cat_name'])))).", ".$row_config['keyword_pro'];
	
}elseif($_REQUEST['home']=='adv'&& $_REQUEST['id'] != "")
{
	$sql_ng=mysql_query("SELECT a.*,b.code as currency_code,c.name as cat_name FROM avd a left join currency b on a.currency = b.id left join adv_cat c on c.id = a.adv_cat where a.id='".$_REQUEST['id']."'");
	$row_ng=mysql_fetch_assoc($sql_ng);
	
	$title_fb = preg_replace('/\s\s+/', ' ', trim(dwebvn(strip_tags($row_ng['name']),30)));
	if($title_fb == "") {$title_fb = $home['fb_title'];}
	if($row_ng['price'] != "") {$title_fb = $title_fb ." - ".$home['giaban']." ". number_format($row_ng['price']).$row_ng['currency_code'];} 
	$description_fb = preg_replace('/\s\s+/', ' ', trim(dwebvn(strip_tags($row_ng['content']),30)));
	if($description_fb == "") {$description_fb = $home['fb_description'];}
	if(file_exists($row_ng['image'])){$image_fb = $row_ng['image'];}else{$image_fb = "images/banner/logo_home.png";}
	list($width, $height) = getimagesize($image_fb);
	//if($width < 100 || $height < 100) {$image_fb = "upload/default/fb_adv.png"; }
	
	$title_mt = $row_ng['cat_name']." | ".$row_config['title_adv'];
	$description_mt = $row_ng['cat_name'].", ".preg_replace('/\s\s+/', ' ', trim(dwebvn(strip_tags($row_ng['name']),30))).", ".preg_replace('/\s\s+/', ' ', trim(dwebvn(strip_tags($row_ng['content']),30))).", ".$row_config['description_adv'];
	$keyword_mt =  $row_ng['name'].", ".str_replace(" ",", ",preg_replace('/\s\s+/', ' ', trim(str_replace(array('.', ',', '(', ')', '{','}','[',']')," ",$row_ng['name']." ".$row_ng['cat_name'])))).", ".$row_config['keyword_adv'];
	
}elseif($_REQUEST['home']=='job'&& $_REQUEST['id'] != "")
{
	$sql_jb=mysql_query("SELECT a.*,b.name as cat_name FROM job a left join job_cat b on b.id = a.job_cat where a.id='".$_REQUEST['id']."'");
	$row_jb=mysql_fetch_assoc($sql_jb);
	
	$title_fb = preg_replace('/\s\s+/', ' ', trim(dwebvn(strip_tags($row_jb['name']),30)));
	$title_fb = $title_fb." - ".preg_replace('/\s\s+/', ' ', trim(dwebvn(strip_tags($row_jb['congty']),30)));
	if($title_fb == "") {$title_fb = $home['fb_title'];}
	$description_fb = preg_replace('/\s\s+/', ' ', trim(dwebvn(strip_tags($row_jb['content']),30)));
	if($description_fb == "") {$description_fb = $home['fb_description'];}
	if(file_exists($row_jb['image'])){$image_fb = $row_jb['image'];}else{$image_fb = "images/banner/logo_home.png";}
	list($width, $height) = getimagesize($image_fb);
	//if($width < 100 || $height < 100) {$image_fb = "upload/default/fb_job.png"; }
	
	$title_mt = $row_jb['cat_name']." | ".$row_config['title_job'];
	$description_mt = $row_jb['cat_name'].", ".preg_replace('/\s\s+/', ' ', trim(dwebvn(strip_tags($row_jb['name']),30))).", ".preg_replace('/\s\s+/', ' ', trim(dwebvn(strip_tags($row_jb['congty']),30))).", ".$row_config['description_job'];
	$keyword_mt =  $row_jb['name'].", ".str_replace(" ",", ",preg_replace('/\s\s+/', ' ', trim(str_replace(array('.', ',', '(', ')', '{','}','[',']')," ",$row_jb['name']." ".$row_jb['cat_name']. " ".$row_jb['congty'])))).", ".$row_config['keyword_job'];
	
}elseif($_REQUEST['home']=='company'&& $_REQUEST['id'] != "")
{
	$sql_cp=mysql_query("SELECT a.*,b.name as cat_name FROM company a left join company_cat b on a.company_cat = b.id where a.id='".$_REQUEST['id']."'");
	$row_cp=mysql_fetch_assoc($sql_cp);
	
	$title_fb = preg_replace('/\s\s+/', ' ', trim(dwebvn(strip_tags($row_cp['name']),30)));
	$title_fb = $title_fb." - ".preg_replace('/\s\s+/', ' ', trim(dwebvn(strip_tags($row_cp['cat_name']),30)));
	if($title_fb == "") {$title_fb = $home['fb_title'];}
	$description_fb = preg_replace('/\s\s+/', ' ', trim(dwebvn(strip_tags($row_cp['content']),30)));
	if($description_fb == "") {$description_fb = $home['fb_description'];}
	if(file_exists($row_cp['image'])){$image_fb = $row_cp['image'];}else{$image_fb = "upload/default/fb_company.png";}
	list($width, $height) = getimagesize($image_fb);
	//if($width < 100 || $height < 100) {$image_fb = "upload/default/fb_company.png"; }
	
	$title_mt = $row_cp['cat_name']." | ".$row_config['title_com'];
	$description_mt = $row_cp['cat_name'].", ".preg_replace('/\s\s+/', ' ', trim(dwebvn(strip_tags($row_cp['name']),30))).", ".preg_replace('/\s\s+/', ' ', trim(dwebvn(strip_tags($row_cp['content']),30))).", ".$row_config['description_com'];
	$keyword_mt =  $row_cp['name'].", ".str_replace(" ",", ",preg_replace('/\s\s+/', ' ', trim(str_replace(array('.', ',', '(', ')', '{','}','[',']')," ",$row_cp['name']." ".$row_cp['cat_name'])))).", ".$row_config['keyword_com'];
	
}elseif($_REQUEST['home']=='news' && $_REQUEST['id'] != "")
{
	$sql_nw=mysql_query("SELECT a.*,b.name as cat_name FROM news a left join news_cat b on a.cat_id = b.id where a.id='".$_REQUEST['id']."'");
	$row_nw=mysql_fetch_assoc($sql_nw);
	
	$title_fb = preg_replace('/\s\s+/', ' ', trim(dwebvn(strip_tags($row_nw['name']),30)));
	if($title_fb == "") {$title_fb = $home['fb_title'];}
	$description_fb = preg_replace('/\s\s+/', ' ', trim(dwebvn(strip_tags($row_nw['short']),30)));
	if($description_fb == "") {$description_fb = preg_replace('/\s\s+/', ' ', trim(dwebvn(strip_tags($row_nw['content']),30)));}
	if($description_fb == "") {$description_fb = $home['fb_description'];}
	if(file_exists($row_nw['image'])){$image_fb = $row_nw['image'];}else{$image_fb = "images/banner/logo_home.png";}
	list($width, $height) = getimagesize($image_fb);
	//if($width < 100 || $height < 100) {$image_fb = "upload/default/fb_news.png"; }
	
	$title_mt = $row_nw['cat_name']." | ".$row_config['title_news'];
	$description_mt = $row_nw['cat_name'].", ".preg_replace('/\s\s+/', ' ', trim(dwebvn(strip_tags($row_nw['name']),30))).", ".preg_replace('/\s\s+/', ' ', trim(dwebvn(strip_tags($row_nw['short']),30))).", ".$row_config['description_news'];
	$keyword_mt =  str_replace(" ",", ",preg_replace('/\s\s+/', ' ', trim(str_replace(array('.', ',', '(', ')', '{','}','[',']')," ",$row_nw['name']." ".$row_nw['cat_name'])))).", ".$row_config['keyword_news'];
	
}elseif($_REQUEST['home']=='help'&& $_REQUEST['views'] != "")
{

	$sql_hl=mysql_query("SELECT a.*,b.name as cat_name FROM help a left join help_cat b on b.id = a.cat_id where a.id='".$_REQUEST['views']."'");
	$row_hl=mysql_fetch_assoc($sql_hl);
	
	$title_fb = preg_replace('/\s\s+/', ' ', trim(dwebvn(strip_tags($row_hl['name']),30)));
	if($title_fb == "") {$title_fb = $home['fb_title'];}
	$description_fb = preg_replace('/\s\s+/', ' ', trim(dwebvn(strip_tags($row_hl['short']),30)));
	if($description_fb == "") {$description_fb = preg_replace('/\s\s+/', ' ', trim(dwebvn(strip_tags($row_hl['content']),30)));}
	if($description_fb == "") {$description_fb = $home['fb_description'];}
	if(file_exists($row_hl['image'])){$image_fb = $row_hl['image'];}else{$image_fb = "images/banner/logo_home.png";}
	list($width, $height) = getimagesize($image_fb);
	//if($width < 100 || $height < 100) {$image_fb = "upload/default/fb_help.png"; }
	
	$title_mt = $row_hl['cat_name']." | ".$row_config['title_help'];
	$description_mt = $row_hl['cat_name'].", ".preg_replace('/\s\s+/', ' ', trim(dwebvn(strip_tags($row_hl['name']),30))).", ".preg_replace('/\s\s+/', ' ', trim(dwebvn(strip_tags($row_hl['short']),30))).", ".$row_config['description_help'];
	$keyword_mt =  str_replace(" ",", ",preg_replace('/\s\s+/', ' ', trim(str_replace(array('.', ',', '(', ')', '{','}','[',']')," ",$row_hl['name']." ".$row_hl['cat_name'])))).", ".$row_config['keyword_help'];
	
}elseif($_REQUEST['home']=='category' && $_REQUEST['cat'] != "")
{
	$sql_cat_pro=mysql_query("SELECT a.*,b.name as cat_name from cat a left join cat b on a.parent = b.id where a.id='".$_REQUEST['cat']."'");
	$row_cat_pro=mysql_fetch_assoc($sql_cat_pro);
	
	if($row_cat_pro['cat_name']!="") {$title_mt = $row_cat_pro['cat_name'];}
	if($title_mt !="") {$title_mt=$title_mt."| ".$row_config['title_pro'];} else{$title_mt = $row_config['title_pro'];}
	
	if($row_cat_pro['cat_name']!="") {$description_mt = $row_cat_pro['cat_name'].", ".$row_cat_pro['name'];}else {$description_mt = $row_cat_pro['name'];}
	if($description_mt !=""){$description_mt=$description_mt.", ".$row_config['description_pro'];} else {$description_mt=$row_config['description_pro'];}
	
	if($row_cat_pro['cat_name']!="") {$keyword_mt = $row_cat_pro['cat_name'].", ".$row_cat_pro['name'];}else {$keyword_mt = $row_cat_pro['name'];}
	$keyword_mt =  $row_cat_pro['name'].", ".str_replace(" ",", ",preg_replace('/\s\s+/', ' ', trim(str_replace(array('.', ',', '(', ')', '{','}','[',']')," ",$keyword_mt)))).", ".$row_config['keyword_pro'];
	
	$title_fb= $row_cat_pro['name']."| ".$title_mt;
	$description_fb=$description_mt;
	$image_fb="images/banner/logo_home.png";
}elseif($_REQUEST['home']=='adv' && $_REQUEST['cat'] != "" && $_REQUEST['act']=='cat' )
{
	$sql_cat_pro=mysql_query("SELECT a.*,b.name as cat_name from adv_cat a left join adv_cat b on a.parent = b.id where a.id='".$_REQUEST['cat']."'");
	$row_cat_pro=mysql_fetch_assoc($sql_cat_pro);
	
	if($row_cat_pro['cat_name']!="") {$title_mt = $row_cat_pro['cat_name'];}
	if($title_mt !="") {$title_mt=$title_mt."| ".$row_config['title_adv'];} else{$title_mt = $row_config['title_adv'];}
	
	if($row_cat_pro['cat_name']!="") {$description_mt = $row_cat_pro['cat_name'].", ".$row_cat_pro['name'];}else {$description_mt = $row_cat_pro['name'];}
	if($description_mt !=""){$description_mt=$description_mt.", ".$row_config['description_adv'];} else {$description_mt=$row_config['description_adv'];}
	
	if($row_cat_pro['cat_name']!="") {$keyword_mt = $row_cat_pro['cat_name'].", ".$row_cat_pro['name'];}else {$keyword_mt = $row_cat_pro['name'];}
	$keyword_mt =  $row_cat_pro['name'].", ".str_replace(" ",", ",preg_replace('/\s\s+/', ' ', trim(str_replace(array('.', ',', '(', ')', '{','}','[',']')," ",$keyword_mt)))).", ".$row_config['keyword_adv'];
	
	$title_fb= $row_cat_pro['name']."| ".$title_mt;
	$description_fb=$description_mt;
	$image_fb="images/banner/logo_home.png";
}elseif($_REQUEST['home']=='job' && $_REQUEST['cat'] != "" && $_REQUEST['act']=='cat' )
{
	$sql_cat_pro=mysql_query("SELECT a.*,b.name as cat_name from job_cat a left join job_cat b on a.parent = b.id where a.id='".$_REQUEST['cat']."'");
	$row_cat_pro=mysql_fetch_assoc($sql_cat_pro);
	
	if($row_cat_pro['cat_name']!="") {$title_mt = $row_cat_pro['cat_name'];}
	if($title_mt !="") {$title_mt=$title_mt."| ".$row_config['title_job'];} else{$title_mt = $row_config['title_job'];}
	
	if($row_cat_pro['cat_name']!="") {$description_mt = $row_cat_pro['cat_name'].", ".$row_cat_pro['name'];}else {$description_mt = $row_cat_pro['name'];}
	if($description_mt !=""){$description_mt=$description_mt.", ".$row_config['description_job'];} else {$description_mt=$row_config['description_job'];}
	
	if($row_cat_pro['cat_name']!="") {$keyword_mt = $row_cat_pro['cat_name'].", ".$row_cat_pro['name'];}else {$keyword_mt = $row_cat_pro['name'];}
	$keyword_mt =  $row_cat_pro['name'].", ".str_replace(" ",", ",preg_replace('/\s\s+/', ' ', trim(str_replace(array('.', ',', '(', ')', '{','}','[',']')," ",$keyword_mt)))).", ".$row_config['keyword_job'];
	
	$title_fb= $row_cat_pro['name']."| ".$title_mt;
	$description_fb=$description_mt;
	$image_fb="images/banner/logo_home.png";
}elseif($_REQUEST['home']=='company' && $_REQUEST['cat'] != "" && $_REQUEST['act']=='cat' )
{
	$sql_cat_pro=mysql_query("SELECT a.*,b.name as cat_name from company_cat a left join company_cat b on a.parent = b.id where a.id='".$_REQUEST['cat']."'");
	$row_cat_pro=mysql_fetch_assoc($sql_cat_pro);
	
	if($row_cat_pro['cat_name']!="") {$title_mt = $row_cat_pro['cat_name'];}
	if($title_mt !="") {$title_mt=$title_mt."| ".$row_config['title_com'];} else{$title_mt = $row_config['title_com'];}
	
	if($row_cat_pro['cat_name']!="") {$description_mt = $row_cat_pro['cat_name'].", ".$row_cat_pro['name'];}else {$description_mt = $row_cat_pro['name'];}
	if($description_mt !=""){$description_mt=$description_mt.", ".$row_config['description_com'];} else {$description_mt=$row_config['description_com'];}
	
	if($row_cat_pro['cat_name']!="") {$keyword_mt = $row_cat_pro['cat_name'].", ".$row_cat_pro['name'];}else {$keyword_mt = $row_cat_pro['name'];}
	$keyword_mt =  $row_cat_pro['name'].", ".str_replace(" ",", ",preg_replace('/\s\s+/', ' ', trim(str_replace(array('.', ',', '(', ')', '{','}','[',']')," ",$keyword_mt)))).", ".$row_config['keyword_com'];
	
	$title_fb= $row_cat_pro['name']."| ".$title_mt;
	$description_fb=$description_mt;
	$image_fb="upload/default/fb_company.png";
}elseif($_REQUEST['home']=='news' && $_REQUEST['cat'] != "" && $_REQUEST['act']=='cat' )
{
	$sql_cat_pro=mysql_query("SELECT a.*,b.name as cat_name from news_cat a left join news_cat b on a.parent = b.id where a.id='".$_REQUEST['cat']."'");
	$row_cat_pro=mysql_fetch_assoc($sql_cat_pro);
	
	if($row_cat_pro['cat_name']!="") {$title_mt = $row_cat_pro['cat_name'];}
	if($title_mt !="") {$title_mt=$title_mt."| ".$row_config['title_news'];} else{$title_mt = $row_config['title_news'];}
	
	if($row_cat_pro['cat_name']!="") {$description_mt = $row_cat_pro['cat_name'].", ".$row_cat_pro['name'];}else {$description_mt = $row_cat_pro['name'];}
	if($description_mt !=""){$description_mt=$description_mt.", ".$row_config['description_news'];} else {$description_mt=$row_config['description_news'];}
	
	if($row_cat_pro['cat_name']!="") {$keyword_mt = $row_cat_pro['cat_name'].", ".$row_cat_pro['name'];}else {$keyword_mt = $row_cat_pro['name'];}
	$keyword_mt =  $row_cat_pro['name'].", ".str_replace(" ",", ",preg_replace('/\s\s+/', ' ', trim(str_replace(array('.', ',', '(', ')', '{','}','[',']')," ",$keyword_mt)))).", ".$row_config['keyword_news'];
	
	$title_fb= $row_cat_pro['name']."| ".$title_mt;
	$description_fb=$description_mt;
	$image_fb="images/banner/logo_home.png";
}elseif($_REQUEST['home']=='help' && $_REQUEST['cat'] != "" && $_REQUEST['act']=='cat' )
{
	$sql_cat_pro=mysql_query("SELECT a.*,b.name as cat_name from help_cat a left join help_cat b on a.parent = b.id where a.id='".$_REQUEST['cat']."'");
	$row_cat_pro=mysql_fetch_assoc($sql_cat_pro);
	
	if($row_cat_pro['cat_name']!="") {$title_mt = $row_cat_pro['cat_name'];}
	if($title_mt !="") {$title_mt=$title_mt."| ".$row_config['title_help'];} else{$title_mt = $row_config['title_help'];}
	
	if($row_cat_pro['cat_name']!="") {$description_mt = $row_cat_pro['cat_name'].", ".$row_cat_pro['name'];}else {$description_mt = $row_cat_pro['name'];}
	if($description_mt !=""){$description_mt=$description_mt.", ".$row_config['description_help'];} else {$description_mt=$row_config['description_help'];}
	
	if($row_cat_pro['cat_name']!="") {$keyword_mt = $row_cat_pro['cat_name'].", ".$row_cat_pro['name'];}else {$keyword_mt = $row_cat_pro['name'];}
	$keyword_mt =  $row_cat_pro['name'].", ".str_replace(" ",", ",preg_replace('/\s\s+/', ' ', trim(str_replace(array('.', ',', '(', ')', '{','}','[',']')," ",$keyword_mt)))).", ".$row_config['keyword_help'];
	
	$title_fb= $row_cat_pro['name']."| ".$title_mt;
	$description_fb=$description_mt;
	$image_fb="images/banner/logo_home.png";
}
else
{
	$title_fb = $home['fb_title'];
	$description_fb = $home['fb_description'];
	$image_fb="images/banner/logo_home.png";
	
	$title_mt = $row_config['title'];
	$description_mt = $row_config['description'];
	$keyword_mt=$row_config['keyword'];
}
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
<?
$sql=mysql_query("SELECT * FROM user_shop where domain='".str_replace($ok1,$ok2,$_SERVER["SERVER_NAME"])."' ");
$row=mysql_fetch_assoc($sql);
$sql7=mysql_query("SELECT * FROM template where id='".$row['template']."'");
$row7=mysql_fetch_assoc($sql7);
$tem=$row7['folder'];
$user=$row['user'];
$domain=$row['domain'];
$sql_mobile=mysql_query("SELECT mobile FROM config_mem where user='".$user."' ");
$row_mobile=mysql_fetch_assoc($sql_mobile);
?>
<?}else{?>
<?
$sql=mysql_query("SELECT * FROM user_shop where user='".$subdomain_value."' or domain='".str_replace($ok1,$ok2,$_SERVER["SERVER_NAME"])."'");
$row=mysql_fetch_assoc($sql);
$sql7=mysql_query("SELECT * FROM template where id='".$row['template']."'");
$row7=mysql_fetch_assoc($sql7);
$tem=$row7['folder'];
$user=$row['user'];
$domain=$row['domain'];
$sql_mobile=mysql_query("SELECT mobile FROM config_mem where user='".$user."' ");
$row_mobile=mysql_fetch_assoc($sql_mobile);
?>
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
<?php include("system/model/mobile_home.php");?>
<?}?>
<?require("system/model/common_end.php") ?>