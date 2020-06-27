<?php
$sql_footer=mysql_query("SELECT * FROM config");
$row_footer=mysql_fetch_assoc($sql_footer);?>
<?php
$sql_config_home=mysql_query("SELECT * FROM config_home");
$row_config_home=mysql_fetch_assoc($sql_config_home);?>
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
	if(file_exists($row_rv['img1'])){$image_fb = $row_rv['img1'];}else{$image_fb = "upload/default/fb_product.png";}
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
	if(file_exists($row_ng['image'])){$image_fb = $row_ng['image'];}else{$image_fb = "upload/default/fb_adv.png";}
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
	if(file_exists($row_jb['image'])){$image_fb = $row_jb['image'];}else{$image_fb = "upload/default/fb_job.png";}
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
	if(file_exists($row_nw['image'])){$image_fb = $row_nw['image'];}else{$image_fb = "upload/default/fb_news.png";}
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
	if(file_exists($row_hl['image'])){$image_fb = $row_hl['image'];}else{$image_fb = "upload/default/fb_help.png";}
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
	$image_fb="upload/default/fb_product.png";
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
	$image_fb="upload/default/fb_adv.png";
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
	$image_fb="upload/default/fb_job.png";
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
	$image_fb="upload/default/fb_news.png";
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
	$image_fb="upload/default/fb_help.png";
}
else
{
	$title_fb = $home['fb_title'];
	$description_fb = $home['fb_description'];
	$image_fb="upload/default/fb_default.png";
	
	$title_mt = $row_config['title'];
	$description_mt = $row_config['description'];
	$keyword_mt=$row_config['keyword'];
}
?>
<!DOCTYPE html>
<html manifest="">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="canonical" href=""/>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1, maximum-scale=1.0, minimum-scale=1.0">
<meta name="format-detection" content="telephone=yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<base href="https://sendo.vn"/>
<link rel="stylesheet" type="text/css" href="/mobile_home/template/css/style_all_v3.css">
<script type="text/javascript" src="/mobile_home/template/js/js_v3.js"></script>
 
    <script src="/mobile_home/template/js/select2.js"></script>
	<link rel="stylesheet" href="/style/css.css">
    <script>
        $(document).ready(function() {
            $("#states").select2();   
        });
    </script>
<script src="mobile_home/template/js/jquery.lazyload.js" type="text/javascript"></script>
 	<!-- Add fancyBox main JS and CSS files -->
	 
     <!-- Add fancyBox main JS and CSS files -->
	 
 
  <link rel="stylesheet" href="/quantri/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/quantri/css/ionicons.min.css">   
	 
    
     <meta http-equiv="content-language" content="la" />
    <META name= "title" content="<?php include("system/model/title.php");  echo " | ". $title_mt;?>">
	<meta name="description" content="<?php echo $description_mt;?> "/>
    <meta name="keywords" content="<?php echo $keyword_mt;?> "/>
	<META name="robots" content="noodp,index,follow">
	<META name="revisit-after content"="1 days">
	<meta name="copyright" content="Copyright (C) DNS Co.,Ltd" />	
    <meta name="geo.placename" content="vietnam" />
    <meta name="geo.position" content="19.85627;102.495496" />
    <meta name="geo.region" content="VI" />
	<meta name="google-translate-customization" content="782891b9d90b25e1-87a62fc0d680bc2a-g1c26503bbd28e54c-e"></meta>
    <meta name="google-site-verification" content="cAvIF8_ffkn3qz5E38vNiYNw3xytW3a2973zErL27sw" />
	<meta property="og:title" content="<?php echo $title_fb; ?>" />
	<meta property="og:description" content="<?php echo $description_fb; ?>" />
	<meta property="og:image" content="<?php echo "http://www.".$home['domain']."/".$image_fb;?>"/>
	<meta property="og:url" content="<?php echo "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>" />
<meta name="revisit-after" content="1 days">
<title><?php include("mobile_home/system/model/title.php");echo " | ". $title_mt;?></title>
</head>
 
<div id="fb-root"></div>

<body cz-shortcut-listen="true">
<!-- popup login -->

    <!--end popup login--> 
<div id="home">
<div id="home_content">
<?php include("mobile_home/system/home/menu_left.php");?>
<?php include("mobile_home/system/home/menu_right.php");?>
<div id="main_container" class="index">
<div id="header_bar">
 



<table cellpadding="0" cellspacing="0" border="0" border-spacing="0" width="100%"><tbody>
<tr>
<td width="50" class="menu_nav"><span class="left_nav" onclick="toggleMenu();trackEvent(&#39;Menu trÃ¡i&#39;, &#39;Click&#39;, &#39;&#39;);" data-ptsp-kpi-action-name="Navigation" data-ptsp-kpi-action-label="Menu trÃ¡i"><i class="vcon-menu"> </i>
<span class="nav_text">Danh mục</span></span>
</td>
<td class="center_nav">
<table class="table_tab_web" cellpadding="0" cellspacing="0" border="0" border-spacing="0" width="100%"><tbody>
<tr>
<td ><a  href="./index.html"><span>Trang chủ</span></a></td>


<?php if($_SESSION['mem']=='')
{?>
<td > <a class="login-window"   id="myBtn"   ><span>Đăng nhập</span></a></td>
<td ><a   onclick="document.getElementById('myModal_reg').style.display='block'"   ><span>Đăng ký</span></a></td>
<?}else{?>
<?}?>


 



</tr></tbody></table>
</td>
<td align="right" width="50" class="menu_nav"><span class="right_nav" onclick="toggleRightMenu()" data-ptsp-kpi-action-name="Navigation" data-ptsp-kpi-action-label="Menu pháº£i"><i class="vcon-setting"> </i><span class="nav_text">Thông tin</span>
</span></td>
</tr></tbody></table>
</div>
<?php include("mobile_home/system/home/search_box.php");?>
<?php if($_REQUEST['home']=='')
{?>
<script type="text/javascript">var module= "product";var catParentId= 0;var catHasChild= 0;var user_logged= 0;var con_root_path= "/home/";var con_ajax_path= "/ajax/";var fs_imagepath= "http://static.vatgia.com/cjs/mobile20150203/v1/images/";var fs_redirect= "L2hvbWUv";</script>
 
<script>$(document).ready(function(){var intCheck=setInterval(function(){if($('#banner_top_360x110').html() != ""){$('#banner_top_360x110 a').removeAttr('target');clearInterval(intCheck);}},100);});</script>
<!--div class="home_category">
<?php 
$sql=mysql_query("SELECT id,name FROM cat where status=0 and parent=17");
while($row=mysql_fetch_array($sql))
{  
    ?> 
<div class="home_cat_item">
<a href="./<?php echo doidau(mb_strtolower($row['name'],"UTF8"));?>-ct-<?php echo $row['id'];?>.html" title="<?php echo $row['name'];?>" class="hom_cat_img" data-ptsp-kpi-action-name="Trang chá»§" data-ptsp-kpi-action-label="Danh má»¥c gá»£i Ã½">
<div class="home_img_bg">
<div class="home_img_inner"><img alt="<?php echo $row['name'];?>" src="<?php echo $row['image'];?>"  class="load_img"/></div>
<span class="home_cat_name"><?php echo $row['name'];?></span>
</div>
</a>
</div>
<?}?>
<div style="clear: both;"></div>
</div-->
<div style="clear: both;"></div>
<div style="clear: both;"></div>
<?php include("mobile_home/system/home/tab_pro_home.php");?>
 
<?}else{?>
<?php include("mobile_home/system/model/frame_mem.php");?>
<?}?>
<div class="v_div"></div>
<?php include("mobile_home/system/home/footer.php");?>
<div class="overlay" onclick="closeAllMenu()"></div>
 
<script type="text/javascript">
$(window).load(function() {
  $('img').each(function() {
    if (!this.complete || typeof this.naturalWidth == "undefined" || this.naturalWidth == 0) {
      // image was broken, replace with your new image
      this.src = '/images/no_logo.jpg';
    }
  });
});
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-59479955-2', 'auto');
  ga('send', 'pageview');

</script>

</body>

</html>




























<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 9999; /* Sit on top */
    padding-top: 30px; /* Location of the box */
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
    width: 17%;
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
    float: right;
    font-size: 28px;
    font-weight: bold;
    margin-top: -29px;
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

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}
</style>

<script src="/dangnhap/js/jquery.min.js"></script>
<script src="/dangnhap/js/jquery.ui.shake.js"></script>
<script>
			$(document).ready(function() {
			
			$('#login').click(function()
			{
			var username=$("#username").val();
			var password=$("#password").val();
		    var dataString = 'username='+username+'&password='+password;
			if($.trim(username).length>0 && $.trim(password).length>0)
			{
			
 
			$.ajax({
            type: "POST",
            url: "/dangnhap/ajaxLogin.php",
            data: dataString,
            cache: false,
            beforeSend: function(){ $("#login").val('...');},
            success: function(data){
            if(data)
            {
            location.reload();
            }
            else
            {
             $('#box').shake();
			 $("#login").val('Đăng nhập')
			 $("#error1").html("<span >Tên đăng nhập hoặc mật khẩu không chính xác! ");
            }
            }
            });
			
			}
			return false;
			});
			
				
			});
		</script>
</head>
<body>



<!-- The Modal -->
<div id="myModal" class="modal">

 

<form action="" method="post"> 
        <div class="wrapper" id="wrapper-content">
            <div id="step1" class="stepReg">
                <div class="stepReg-title">
                    
                    <h1>Đăng nhập</h1>
              <a class="close" onclick="document.getElementById('myModal').style.display='none'" >X</a>
                                
                </div>
                <div class="stepReg-form">
                    <table class="tableSimple" cellpadding="1" cellspacing="0">
                        <tbody><tr style="">
                            <td class="tdTextBox" colspan="2">
                                <input name="username" type="text" value="<? echo $_REQUEST['username'];?>" maxlength="100" id="username" placeholder="Tên tài khoản">
                            </td>
                        </tr>
                                              
																		<span id="error1" style=" color: #fff;    background: red; "></span>
						 	
						<tr>
                            <td class="tdTextBox" colspan="2">
                                <input name="password" type="password" value="<?php echo $password;?>" maxlength="100" id="password" placeholder="Mật khẩu">
                            </td>
                        </tr> 
 																		 
                         
                         
                             
                      
                        
                         
                        <tr>
                            <td class="td-register-button" colspan="2">
                                <input   type="submit" id="login"    value="Đăng Nhập"/>							 
<span class="msg"></span> 

                            </td>
							
                        </tr>
                    </tbody></table>
			<a href="">  <span style=" float: left; padding-top: 16px; font-size: 12px; color: blue; ">Quên mật khẩu </span></a>
             <a    onclick="document.getElementById('myModal_reg').style.display='block'" >  <span style=" float: right; padding-top: 16px; font-size: 14px; color: red; ">Đăng ký tài khoản? </span></a>
			 </div>
            </div>
        </div>
</form>
</div>


<div id="myModal_reg" class="modal">
 
<script type="text/javascript">
$(document).ready(function() {
	$("#username1").keyup(function (e) {
	
		//removes spaces from username
		$(this).val($(this).val().replace(/\s/g, ''));
		
		var username = $(this).val();
		if(username.length < 4){$("#user-result").html('');return;}
		
		if(username.length >= 4){
			$("#user-result").html('<img src="/dangky/imgs/ajax-loader.gif" />');
			$.post('/dangky/check_username.php', {'username':username}, function(data) {
			  $("#user-result").html(data);
			});
		}
	});	
});
</script>

 <script language="javascript" type="text/javascript">
function check()
{

if(document.cartform.txtUser.value =="")
{
alert("Bạn chưa nhập tên tài khoản");
document.cartform.txtUser.focus();
return false;
}

if(document.cartform.txtPwd.value =="")
{
alert("Bạn chưa nhập mật khẩu");
document.cartform.txtPwd.focus();
return false;
}

if(document.cartform.txtPwd2.value =="")
{
alert("Bạn chưa nhập lại mật khẩu");
document.cartform.txtPwd2.focus();
return false;
}

if(document.cartform.txtPwd2.value != document.cartform.txtPwd.value)
{
alert("Nhập lại mật khẩu không trùng nhau");
document.cartform.txtPwd2.focus();
return false;
}







 location.reload();
return true;

}
</script>
 
  
<?
function check_user($user) {
if (strlen($user)<6||strlen($user)>=18) return false;
if (eregi("^[A-Z0-9]+$", $user)) return true;
return false;
}
if (isset($_POST['butSubreg'])) {
	$user=$_POST['txtUser'];
	$pass =   ( md5(md5(md5( md5(md5(md5( addslashes($_POST['txtPwd']))))))));
    $pass2 =  ( md5(md5(md5( md5(md5(md5( addslashes($_POST['txtPwd2']))))))));
	$sql = "select * from thanhvien where user='".$user."'   limit 1";
	$bang=mysql_query($sql);
	$xuat=mysql_fetch_array($bang);
	$level=$xuat['level_shop'];
	$_REQUEST['username']=$user;
		if($user==$xuat['user']  )
	{
		$err="Tên tài khoản đã có người sử dụng";	
		}
		elseif(!check_user($user))
	    {
			$err="Tên đăng nhập chỉ gồm các ký tự số 0-9 và A-Z không dấu viết liền và lớn hơn 6 ký tự";
		}

		elseif($pass!==$pass2)
	    {
			$err2="Mật khẩu không trùng nhau";
		}
 


	 
else
	{
		$date=date("d-m-Y");
	 $sql2="INSERT INTO thanhvien(user, pass, re_time)values('$user','$pass','$date')";
   $result=mysql_query($sql2);
		$quyen=$level;
		$log=$user;
		$_SESSION['mem']=$user;
		
		$_SESSION['level']=$level;
		echo "<script>
        window.alert('Đăng ký thành viên thành công,hệ thống tự động đăng nhập')
		window.location='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."'</script>";
}
	 
		
} 
?>

<form class="form" method="post" action="" id="form1" name="cartform" onsubmit="return check()">
 
 
        
        <div class="wrapper" id="wrapper-content">
            <div id="step1" class="stepReg">
                <div class="stepReg-title">
                    
                    <h1 style=" color: red; ">Đăng ký tài khoản</h1>
             <a class="close" onclick="document.getElementById('myModal_reg').style.display='none'" >X</a>
                                
                </div>
                <div class="stepReg-form">
                    <table class="tableSimple" cellpadding="1" cellspacing="0">
                        <tbody><tr style="">
                            <td class="tdTextBox" colspan="2">
                                <input name="txtUser" type="text" value="<? echo $_REQUEST['username'];?>" maxlength="100" id="username1" placeholder="Tên tài khoản">
								    <span id="user-result"></span>
                            </td>
                        </tr>
						 
 

                                              
																		<span style=" color: #fff;    background: red; ">	<?
if ($err!='')
{
	echo $err;
}
?></span>
						 	
						<tr>
                            <td class="tdTextBox" colspan="2">
                                <input name="txtPwd" type="password" value="<?php echo $password;?>" maxlength="100" id="txtName" placeholder="Mật khẩu">
                            </td>
                        </tr> 
 																		<span style=" color: #fff;    background: red; ">	<?
if ($err2!='')
{
	echo $err2;
}
?></span>                        
                        <tr>
                            <td class="tdTextBox" colspan="2">
                                <input name="txtPwd2" type="password" value="<?php echo $password;?>" maxlength="255" id="txtRegEmail" placeholder="Nhập lại mật khẩu">
                            </td>
                        </tr>
                       
                       
                         
                         
                             
                      
                        
                         
                        <tr>
                            <td class="td-register-button" colspan="2">
                                <input style=" background: red; " name="butSubreg" type="submit" id="reg-button" href="javascript:" onclick="return CheckRegFormSimple();" value="Đăng ký"/>
                            </td>
                        </tr>
                    </tbody></table>
                </div>
            </div>
        </div>
        
       
        

 
 
</form>
 
</div>



<div id="myModal_vidiemlua" class="modal">
<?
 $ffffff=mysql_query("SELECT * FROM thanhvien where user='".$_SESSION['mem']."' ");
$check=mysql_fetch_assoc($ffffff);	 

$diemluahienco = $check['diemlua_mem']
?>
 
<form class="form" method="post" action="" id="form1">
 
 
        
        <div class="wrapper" id="wrapper-content" style="
    float: right;
	    width: 244px;
">
            <div id="step1" class="stepReg">
                <div class="stepReg-title">
                    
                    <h1>Ví Điểm Lửa</h1>
              <a class="close" onclick="document.getElementById('myModal_vidiemlua').style.display='none'" >X</a>
                                
                </div>
                <div class="stepReg-form">
                    <table class="tableSimple" cellpadding="1" cellspacing="0">
                        <tbody>
						 
                       
                       
                         Điểm Lửa hiện có: <b style=" color: red; font-size: 18px; "><? echo number_format($diemluahienco);?></b> điểm
                         <br>
                             <a onclick="return confirm('Không hỗ trợ xem chi tiết trên điện thoại.Khách hàng vui lòng truy cập bằng Máy vi tính hoặc Laptop để  xem chi tiết điểm Lửa');" style="background: #F44336; padding: 1px; color: #fff; display: inline-block;    ">Xem Chi Tiết</a>
                      
                        
                         
                         
                    </tbody></table>
                </div>
            </div>
        </div>
        
       
        

 
 
</form>
</div>
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

  
 
 