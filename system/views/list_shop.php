<script type="text/javascript">

	// <![CDATA[	

	$(document).ready(function(){	
		/// like 
		
		$('.LikeThis').click(function(e){
			
			var getID   =  $(this).attr('id').replace('post_id','');
			
			$("#like-loader-"+getID).html('<img src="loader.gif" alt="" />');
			
			$.post("/system/pro_tick/like.php?postId="+getID, {
			 
	
			}, function(response){
				
				$('#like-stats-'+getID).html(response);
				
				$('#like-panel-'+getID).html('<a href="javascript: void(0)" class="LikeThis"><i style=" color: red; " class="fa fa-fw fa-heart"></i>Đã thêm vào yêu thích</a>');
				
				$("#like-loader-"+getID).html('');
			});
		});	
		
		/// unlike 
		
		$('.Unlike').click(function(e){
			
			var getID   =  $(this).attr('id').replace('post_id','');
			
			$("#like-loader-"+getID).html('<img src="loader.gif" alt="" />');
			
			$.post("/system/pro_tick/unlike.php?postId="+getID, {
	
			}, function(response){
				
				$('#like-stats-'+getID).html(response);
				
				$('#like-panel-'+getID).html('<a href="javascript: void(0)" id="post_id'+getID+'" class="LikeThis"><i style=" color: red; " class="fa fa-fw fa-heart"></i>Yêu thích sản phẩm</a>');
				
				$("#like-loader-"+getID).html('');
			});
		});	
		
		
	});	

	// ]]>

</script>
<div id="delTable">
<?php
$o=10;
$col=1;
$MAXPAGE=5;
$p=0;
$user=$_SESSION['mem'];
$sql_t=mysql_query("SELECT * FROM po_tick where user='".$user."'");
while($row_t=mysql_fetch_array($sql_t))
{
    $ok.=$row_t['pro_id'].",";
}
if ($_REQUEST['p']!='') $p=$_REQUEST['p'];
$sql = "select * from products where id in (".$ok."0) order by id desc limit ".$o*$col*$p.",".$o*$col;
$result = @mysql_query($sql,$con);
$total=CountRecord("products","id in (".$ok."0)");?>
<?php if($total>'0')
{?>
<div style="padding-top:20px;padding-bottom:20px;text-align:center;color:red;font-weight:bold">
<img src="images/alert.jpg">
<br><br>
Chưa có sản phẩm nào được yêu thích
</div>
<?}else{?>
<?php 
while($row_pro=mysql_fetch_array($result))
{
    $sql_user=@mysql_query("SELECT user,company,level_shop FROM user_shop where user='".$row_pro['user']."' ");
    $row_user=@mysql_fetch_assoc($sql_user);
    ?>
<div class="row_pro_cat">
<div style="position: absolute; margin-left: 201px; margin-top: -4px;">
<a href="http://<?php echo $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>" onclick="return confirm('Bạn có đồng ý bỏ yêu thích sản phẩm');" class="Unlike" id="post_id<?php  echo $row_pro['id']?>"  style="color:#FF0000;"><img src="images/delete.png">
</a>

</div>
<?php if($row_pro['trogia']=='0')

{?><?}else{?>
<div style="position: absolute;color:#FFFFFF;margin-left:-5px;font-size:12px;width:80px;height:25px;text-align:center;line-height:20px;background-image: url('images/giamgia.png');"><i class="fa fa-check-square-o" style="color: #fffff;"></i> Bán chạy</div>
<?}?>
<div style="padding-top:0px">
<a onmouseover='showtip("<div><table><tr><td style=\"padding-left:20px;padding-top:10px;height:10px\"><? echo $row_pro['name'];?><br>Giá bán: <? if ($row_pro['price']<=0) echo 'Liên hệ'; else echo number_format($row_pro['price']); ?></td></tr><tr><td valign=\"top\"><img src=\"<? echo str_replace("_thumbnail","",$row_pro['image']);?>\" width=\"350px\" border=\"0px\"></td></td></tr></table></div>");' onmouseout="hidetip();" id="xemsanpham"  href="./<?php echo doidau(mb_strtolower($row_pro['name'],"UTF8"));?>-pro-<?php echo $row_pro['id'];?>.html">
<img  src="<?php echo $row_pro['image'];?>" width="228" height="228">

</a>

</div>

<div style="padding-top:5px">
 <div style="    padding-top: 5px;
    color: #ff3200;
    font-size: 11px;
    font-weight: bold;
    padding: 10px 13px;
    padding-top: 8px;
    color: #F00;
    font-weight: bold;
    font-size: 18px;"><?php echo number_format($row_pro['price_special'],0);?><span style="
    vertical-align: super;
        font-size: 11px;
">đ</span>
<span style="padding-top: 6px;text-decoration: line-through;
    /* color: #ff3200; */
    /* font-size: 11px; */
    /* font-weight: bold; */
    /* padding: 4px 42px; */
    /* padding-top: 8px; */
    color: #4c4444;
    /* font-weight: bold; */
    font-size: 12px;
    /* padding-bottom: 15px; */
    float: right;"><?php echo number_format($row_pro['price'],0);?><span style="
    vertical-align: super;
        font-size: 11px;
">đ</span>

</div>

<a id="xemsanpham" style="padding: 0 13px;font-size: 13px;color: #666;
    display: block;
    overflow: hidden;
    line-height: 16px;
    height: 16px;
    padding: 0 5px;
    font-weight: normal;
    font-size: 13px;
    text-overflow: ellipsis;
    white-space: nowrap;
" href="./<?php echo doidau(mb_strtolower($row_pro['name'],"UTF8"));?>-pro-<?php echo $row_pro['id'];?>.html">
<?php echo dwebvn($row_pro['name'],10);?>





</a>
</div>
<?php if($row_pro['price_special']=='0')
                {?>
				<!--div style="padding-top:5px;color:#ff3200;font-size:11px;font-weight:bold">Giá: <?php if($row_pro['price']=='0'){?>Liên hệ<?}else{?><?php echo number_format($row_pro['price'],0);?> Đ <?}?></div-->
                <?}else{?>
               
				<!--div style="padding-top:5px;color:#333333;font-size:11px;font-weight:bold">Giá cũ: <s><?php echo number_format($row_pro['price'],0);?> VNĐ</s></div-->
                <?}?>
<div class="row_pro_cat_store">

<span style="    float: left;
    width: 218px;
    padding: 5px;
    background: #f4f4f4;
    margin-top: 18px;">
	<?php if($row_user['level_shop']=='0'){?>
<span >
<a href="http://<?php echo $domain_config;?>/<?php echo $row_user['user'];?>" target="_blank">
<img src="images/vip-icon.png" width="25">
</a>

</span>

<?}else{?><?}?><a href="http://<?php echo $domain_config;?>/<?php echo $row_user['user'];?>" style="
    color: #125207;
    font-weight: bold;
" target="_blank">

</a>
<?php if($row_user['level_shop']=='3'){?>
<span >
<a href="http://<?php echo $domain_config;?>/<?php echo $row_user['user'];?>" target="_blank">
<img src="images/icon_content_adv.png" width="26">
</a>

</span>

<?}else{?><?}?><a href="http://<?php echo $domain_config;?>/<?php echo $row_user['user'];?>" style="
    color: #125207;
    font-weight: bold;
" target="_blank">
<?php echo dwebvn($row_user['company'],5);?>
</a>
</span>
</div>
</div>
<?}
?>
</div>
<?}?>
<? if ($total>0) { ?>
<div style="clear:both;height:10px;padding-top:5px">
<hr color="#E9E9E9" width="100%" SIZE=1 align="center">
</div>
<div class="pagination">
<TABLE bgcolor="#FFFFFF" cellSpacing=10 cellPadding=0 width="100%" border=0 id="table35" style="line-height: 120%; text-align: justify" align="center">
<?
$pages=count_page($total,($o*$col));
echo '<tr><td class="smallfont" align="left" >
'.$total.'</b> Sản phẩm yêu thích</td>';
echo '<td class="smallfont" align="right">';
$param="";
if ($p>1) echo '<a class="buton_timkiem" title="&#272;&#7847;u tiên" href="?home=member&act=pro_tick&p=0">Đầu tiên</a> ';
if ($p>0) echo '<a class="buton_timkiem" title="V&#7873; tr&#432;&#7899;c" href="?home=member&act=pro_tick&p='.($p-1).'.html">Trang trước</a> ';
$from=($p-2>0?$p-1:0);
$to=($p+2<$pages?$p+2:$pages);
for ($i=$from;$i<$to;$i++)
{
	if ($i!=$p) echo '<a href="'.$_SERVER['REQUEST_URI'].'&p='.$i.'">'.($i+1).'</a> ';
	else echo '<a class="active1">'.($i+1).'</a> ';
}
if ($p<$i-1) echo '<a class="buton_timkiem" title="Ti&#7871;p theo" href="?home=member&act=pro_tick&p='.($p+1).'.html">Tiếp theo</a> ';
if ($p<$pages-1) echo '<a class="buton_timkiem" title="Cu&#7889;i cùng" href="?home=member&act=pro_tick&p='.($pages-1).'">Cuối cùng</a>'; 
echo '</td></tr></table>';
?>

</div>
<?
}
?>
</div>