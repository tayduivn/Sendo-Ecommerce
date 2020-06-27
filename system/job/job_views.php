<?
$id=$_GET['id'];
$name=$_GET['name'];
$sql = "select * from job where id='".$id."' ";
$result = @mysql_query($sql,$con);
$row=mysql_fetch_assoc($result);
$sql_user=mysql_query("SELECT * FROM user_shop where user='".$row['user']."' ");
$row_user=mysql_fetch_assoc($sql_user);
$sql_city=mysql_query("SELECT * FROM city where id='".$row['city']."' ");
$row_city=mysql_fetch_assoc($sql_city);
$sqlup = "update job set views=views+1 where id=$id";
$resultup = mysql_query($sqlup,$con);
?>
<?if($row['id']!==$id)
{?>
<div style="padding-top:20px;padding-bottom:20px;text-align:center;color:red;font-weight:bold">
<img src="images/alert.jpg">
<br><br>
Dữ liệu không tồn tại
</div>
<?}else{?>
<!--begin row information-->
<div style="float: left;">
<div>
<!-- begin box search-->
<div id="raovat_search_srore">
<form name="myform" method="GET" action="./">
<div>
<input type="hidden" name="home" value="job">
<input type="hidden" name="act" value="search">
<input type="text" id="raovat_search_input" name="keywords" placeholder="Nhập tiêu đề rao vặt !">
<input id="raovat_search_submit" type="submit" name="search" value="Tìm kiếm" />
</div>
<div style="padding-top: 10px;">
<div style="float: left;">
		<select name="city" style="width:100px;height:25px;color:#ABABAB;">
		<option value="0" selected>Toàn quốc</option>
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
		$cats=GetListAdv(0);
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
  		<select name="nhucau"  style="width:100px;height:25px;color:#ABABAB;">
        <option value="" selected>Chọn nhu cầu</option>	
		<option value="0">Cần bán</option>	
		<option value="1">Cần mua</option>	
		</select>
  </div>
</div>
</form>
</div>
<!-- end box search-->
</div>
<div>
<div style="width: 460px;">
<h3><? echo $row['name'];?></h3>
</div>
<div style="line-height: 25px;">
<span style="color: red; font-size:13px;font-weight:bold">Giá bán: <?php if($row['price']=='0'){?>Liên hệ<?}else{?><?php echo number_format($row['price'],0);?> VNĐ<?}?></span>
<br />
Ngày đăng: <?php echo $row['date'];?> 
<br />
Nơi đăng: <?php if($row['city']=='0'){?>Toàn quốc<?}else{?><?php echo $row_city['name'];?> <?}?>
<br />
Lượt xem: <?php echo $row['views'];?> 
</div>
<!--bengin chia se-->
<div class="fb-like" data-href="<?php echo $domain_home;?>/?home=job&act=views&id=<?php echo $id;?>" data-send="true" data-width="450" data-show-faces="true"></div>
<!--end chia se-->
</div>
</div>
<!--end row information-->
<div style="float: right;">
<!-- rows member-->
<div style="width: 250px;">
<div id="pro_views_left_cat">
Thành viên đăng tin
</div>
<?php
if($row['user']=='')
{?>
<div id="pro_views_left_content">
<div id="pro_views_left_member">
<div style="float: left;"><img src="images/user.jpg"></div>
<div style="float: left;color:red;font-weight:bold">
<a href="http://<?php echo $row_user['user'];?>.<?php echo $domain_config;?>">
<font color="red"><b><?php echo $row['fullname'];?></b></font></a>
</div>
</div>
<div id="pro_views_left_member"><font color="#5B7BAF">Mobile:</font> <?php echo $row['mobile'];?></div>
<div id="pro_views_left_member"><font color="#5B7BAF">Email:</font> <?php echo $row['email'];?></div>
<div id="pro_views_left_member"><font color="#5B7BAF">Địa chỉ:</font> <?php echo $row['address'];?></div>
<div style="margin-left: 20%">
<?php if($row_user['level_shop']=='0')
{?><img src="images/shopvip.png"><?}else{?><img src="images/shopfree.png"><?}?>
</div>
</div>
<?}else{?>
<div id="pro_views_left_content">
<div id="pro_views_left_member">
<div style="float: left;"><img src="images/user.jpg"></div>
<div style="float: left;color:red;font-weight:bold">
<a href="http://<?php echo $row_user['user'];?>.<?php echo $domain_config;?>">
<font color="red"><b><?php echo $row_user['user'];?></b></font></a>
</div>
</div>
<div id="pro_views_left_member"><font color="#5B7BAF">Ngày đăng ký:</font> <?php echo $row_user['re_time'];?></div>
<div id="pro_views_left_member"><font color="#5B7BAF">Mobile:</font> <?php echo $row_user['phone'];?></div>
<div id="pro_views_left_member"><font color="#5B7BAF">Email:</font> <?php echo $row_user['email'];?></div>
<div id="pro_views_left_member"><font color="#5B7BAF">Địa chỉ:</font> <?php echo $row_user['address'];?></div>
<div style="margin-left: 20%">
<?php if($row_user['level_shop']=='0')
{?><img src="images/shopvip.png"><?}else{?><img src="images/shopfree.png"><?}?>
</div>
</div>
<?}?>
</div>
</div>
<hr />
<div id="tin_rao_moi_content">
<div class="space_center"></div>

<div id="news_views">
<div class="views">
<img src="<?echo $row['image'];?>">
<?echo $row['content'];?>
</div>
<div class="space">
</div>
<div class="fb-comments" data-href="http://<?php echo $domain_config;?>/?home=job&act=views&id=<?php echo $row['id'];?>" data-width="700" data-num-posts="10"></div>
</div>
<!-- begin tin moi rao -->
<div class="space"></div>
<div style="font-size: 16px;font-weight:bold;color:red;">Các tuyển dụng khác liên quan</div>
<div class="space"></div>
<div style="width: 100%;height:35px;;background-color:#0094da;font-size:14px;font-weight:bold;color:#FFFFFF">
<div style="float:left;width:36px;height:35px;">
</div>
<div style="float:left;width:580px;padding-top:8px">
Nội dung tuyển dụng
</div>
<div style="float:left;width:125px;padding-top:8px">
Danh mục
</div>
<div style="float:left;width:120px;padding-top:8px">
Tỉnh
</div>
<div style="float:left;width:80px;padding-top:8px">
Ngày đăng
</div>
</div>
<div id="tin_rao_moi_content">
<div class="space"></div>
<?php
$row11=10;
$col=1;
$MAXPAGE=5;
$p=0;
if ($_REQUEST['p']!='') $p=$_REQUEST['p'];
$sql_pro = "select * from job where adv_cat='".$row['job_cat']."' order by upvip desc limit ".$row11*$col*$p.",".$row11*$col;
$result = @mysql_query($sql_pro,$con);
$total=demsql("job");
for($j=1;$j<=$row&&$row_pro=@mysql_fetch_array($result);$j++)
{
    $sql_cat_adv=@mysql_query("SELECT name FROM job_cat where id='".$row_pro['job_cat']."' ");
    $row_cat_adv=@mysql_fetch_assoc($sql_cat_adv);
    $sql_city=@mysql_query("SELECT id,name FROM city where id='".$row_pro['city']."' ");
    $row_city=@mysql_fetch_assoc($sql_city);
    if($j%2)
    {
        $color="#EAEAEA";
    }
    else
    {
        $color="#FFFFFF";
    }
    if($row_pro['vip']=='1')
    {
        $bg="images/vip-icon.png";
    }
    else
    {
        $bg="images/icon_content_adv.png";
    }
?>
<div style="width: 100%;height:35px;padding-top:5px;background-color:<?php echo $color;?>">
<div style="float:left;width:36px;height:35px;background-image: url('<?php echo $bg;?>');">
</div>
<div style="float:left;width:580px;padding-top:8px">
<a href="./tuyen-dung/<?php echo doidau(mb_strtolower($row_pro['name'],"UTF8"));?>-vn-<?php echo $row_pro['id'];?>.html"><?php echo dwebvn($row_pro['name'],12);?></a>
</div>
<div style="float:left;width:125px;padding-top:8px">
<?php echo $row_cat_adv['name'];?>
</div>
<div style="float:left;width:120px;padding-top:8px">
<?php if($row_pro['city']=='0'){?>Toàn quốc<?}else{?><?php echo $row_city['name'];?><?}?>
</div>
<div style="float:left;width:80px;padding-top:8px">
<?php echo $row_pro['date'];?>
</div>
</div>
<?}?>
</div>
<?}?>
</div>