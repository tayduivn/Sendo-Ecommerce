<div id="job">
<!-- rao vat cat left-->
<div id="raovat_cat">
<?php include("system/job/menu_job.php");?>
<div>

</div>
<?php include("system/views/tab_pro_vip_new.php");?>
</div>
<!-- raovat content-->
<div id="cat_left_title">
<div style="float: left;padding-left:10px;"><img src="images/home.jpg"></div>
<div style="float: left;padding-left:10px;line-height:230%"><a href="./index.html">Trang chủ</a> »</div>
<div style="float: left;padding-left:10px;line-height:230%"><a href="./?home=job">Tuyển dụng</a></div>
<?php if(!$_REQUEST['cat']=='')
{?>
<div style="float: left;padding-left:10px;line-height:230%"> » 
<?php $sql_cat_adv=@mysql_query("SELECT id,name FROM job_cat where id='".$_REQUEST['cat']."' ");
$row_cat_adv=@mysql_fetch_assoc($sql_cat_adv);?>
<a href="?home=job&act=cat&cat=<?php echo $row_cat_adv['id'];?>"><?php echo $row_cat_adv['name'];?></a>
</div>
<?}else{?>
<?}?>
<?php if(!$_REQUEST['id']=='')
{?>
 <div style="float: left;padding-left:10px;line-height:230%"> » 
<?php $sql_adv_adv=@mysql_query("SELECT id,name,job_cat FROM job where id='".$_REQUEST['id']."' ");
$row_adv_adv=@mysql_fetch_assoc($sql_adv_adv);?>
<a href="./?home=job&act=views&id=<?php echo $row_adv_adv['id'];?>&cat=<?php echo $row_adv_adv['job_cat'];?>"><?php echo dwebvn($row_adv_adv['name'],18);?></a>
</div>
<?}else{?>
<?}?>
</div>
<!--box seach-->
<div id="raovat_content">
<?php if($_REQUEST['id']=='')
{?>
<div id="raovat_search">
<div style="float: left;">
<form name="myform" method="GET" action="./">
<div>
<input type="hidden" name="home" value="job">
<input type="hidden" name="act" value="search">
<input type="text" id="raovat_search_input" name="keywords" placeholder="Nhập tiêu đề tuyển dụng !">
<input id="raovat_search_submit" type="submit" name="search" value="Tìm kiếm" />
</div>
<div style="padding-top: 10px;">
<div style="float: left;">
		<select name="city" style="width:100px;height:25px;color:#ABABAB;">
		<option value="" selected>--Tất cả--</option>
<?
		$cats=GetListCity(0);
		foreach ($cats as $cat)
		{
			if ($cat[0]==$city)
				echo "<option value=".$cat[0]." selected>".$cat[1]."</option>";
			else
				echo "<option value=".$cat[0].">".$cat[1]."</option>";
		}
?>		
		</select>
  </div>
  <div style="float:left;padding-left: 10px;">
  		<select name="cat"  style="width:196px;height:25px;color:#ABABAB;">
        <option value="" selected>Tất cả Danh mục</option>
<?
		$cats=GetListJob(0);
		foreach ($cats as $cat)
		{
			if ($cat[0]==$cat)
				echo "<option value=".$cat[0]." selected>".$cat[1]."</option>";
			else
				echo "<option value=".$cat[0].">".$cat[1]."</option>";
		}
?>		
		</select>
  </div>
  <div style="float:left;padding-left: 10px;">
  		<select name="nhucau"  style="width:120px;height:25px;color:#ABABAB;">
        <option value="" selected>Chọn nhu cầu</option>	
		<option value="0">Tuyển nhân viên</option>	
		<option value="1">Cần tìm việc làm</option>	
		</select>
  </div>
</div>
</form>
</div>
<style>
.post_rv
{
    background-color: #0094da;
    padding: 10px;
    margin-top: 20px;
    color:#FFFFFF;
    font-weight:bold
}
</style>
<div style="float: right;margin-top:20px">
 <!--tick-->
 <?php if($_SESSION['log']=='')
 {?>			
<a onclick="return confirm('Bạn cần đăng nhập để sử dụng chức năng này');return false;"  href="#" class="post_rv">Đăng tin tuyển dụng</a>
 <?}else{?>
 <a  href="./quantri/?act=job_m" class="post_rv">Đăng tin tuyển dụng</a>
 <?}?>
 <!--end tick-->
</div>
</div>
<?}else{?><?}?>
<div class="space"></div>
<div>
<?php 
$sql_ads=@mysql_query("SELECT * FROM ads where cat_id=1000000005");
while($row_ads=@mysql_fetch_array($sql_ads))
{?>
<a href="<?php echo $row_ads['link'];?>" target="_blank"><img src="<?php echo $row_ads['image'];?>" height="100"></a>
<?}?>
</div>
<div class="space"></div>
<?php if($_REQUEST['act']=='')
{?>
<?php include("system/job/job_news.php");?>
<?}else{?>
<?php include("system/model/frame_job.php");?>
<?}?>
</div>
</div>
</div>