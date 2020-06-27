<script src="js/tabcontent.js" type="text/javascript"></script>
<link href="js/tabcontent.css" rel="stylesheet" type="text/css" />
<div class="space"></div>
<div style="float: left;width:200px">
<?php include("system/help/sub_cat_help.php");?>
<div class="space"></div>
<!--end email sale-->
<!--begin store vip-->

<!--end store vip-->
</div>
<div style="float: right;width:990px">
<!--contener_1_right_top-->
<div class="space"></div>
<!-- raovat content-->
<div style="float: right;width:980px;border-bottom:1px solid #0094da">
<div id="cat_left_help">
<div style="float: left;padding-left:10px;"><img src="images/home.jpg"></div>
<div style="float: left;padding-left:10px;line-height:230%"><a href="./index.html">Trang chủ</a> »</div>
<div style="float: left;padding-left:10px;line-height:230%"><a href="./?home=help">Trung tâm trợ giúp</a></div>
<?php if(!$_REQUEST['cat']=='')
{?>
<div style="float: left;padding-left:10px;line-height:230%"> » 
<?php $sql_cat_adv=@mysql_query("SELECT id,name FROM help_cat where id='".$_REQUEST['cat']."' ");
$row_cat_adv=@mysql_fetch_assoc($sql_cat_adv);?>
<a href="./?home=help&cat=<?php echo $row_cat_adv['id'];?>"><?php echo $row_cat_adv['name'];?></a>
</div>
<?}else{?>
<?}?>
<?php if(!$_REQUEST['id']=='')
{?>
 <div style="float: left;padding-left:10px;line-height:230%"> » 
<?php $sql_adv_adv=@mysql_query("SELECT id,name FROM news where id='".$_REQUEST['id']."' ");
$row_adv_adv=@mysql_fetch_assoc($sql_adv_adv);?>
<a href="./?home=help&cat=<?php echo $row_adv_adv['id'];?>"><?php echo $row_adv_adv['name'];?></a>
</div>
<?}else{?>
<?}?>
</div>

<?php if($_REQUEST['act']=='')
{?>
<?php include("system/help/news_news.php");?>
<?}else{?>
<?php include("system/model/frame_help.php");?>
<?}?>
</div>
</div>