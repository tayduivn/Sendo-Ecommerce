<?php
$row=10;
$col=1;
$MAXPAGE=5;
$p=0;
$name=$_GET['name'];
$cat=0;
if ($_REQUEST['cat']!='') $cat=killInjection($_REQUEST['cat']);
$catallsub=GetCatHelp($cat);
if ($_REQUEST['p']!='') $p=$_REQUEST['p'];
$sql_pro = "select * from help where cat_id in (".$catallsub."0) order by id DESC limit ".$row*$col*$p.",".$row*$col;
$result = @mysql_query($sql_pro,$con);
$total=CountRecord("help","cat_id in (".$catallsub."0)");
$sql_cat=@mysql_query("SELECT name,id FROM help_cat where id='".$cat."' ");
$row_cat=mysql_fetch_assoc($sql_cat);
?>
<div id="content_center">
<div id="list_cat">
<?php if(($_REQUEST['cat']=='')&&($_REQUEST['views']==''))
{?>
<h3>Trung tâm trợ giúp</h3>
<?}else{?>
<h3><?php echo $row_cat['name'];?></h3>
<?}?>
</div>
<div id="list_cat_content_help">
<?php if(($_REQUEST['cat']==''))
{?>
<div style="padding-top:30px;padding-left:0px;">
<!--begin all help-->
<?php
$sql_help = "select * from help order by id DESC limit ".$row*$col*$p.",".$row*$col;
$result1 = @mysql_query($sql_help,$con);
$total1=@mysql_num_rows($result1);
for($i=1;$i<=$row&&$row_pro=@mysql_fetch_array($result1);$i++)
{
    $sql_user=@mysql_query("SELECT user,company,level_shop FROM user_shop where user='".$row_pro['user']."' ");
    $row_user=@mysql_fetch_assoc($sql_user);
    $sql_city=@mysql_query("SELECT id,name FROM city where id='".$row_pro['city']."' ");
    $row_city=@mysql_fetch_assoc($sql_city);
    if($i%2)
    {
        $color="#EAEAEA";
    }
    else
    {
        $color="#FFFFFF";
    }
?>
<div class="row_pro_cat_help">
<div style="height:20px;color:#094FC8;">
<a href="./?home=help&act=views&views=<?php echo $row_pro['id'];?>&cat=<?php echo $row_pro['cat_id'];?>">
<?php echo $row_pro['name'];?>
</a>
</div>
<div style="padding-top:5px">
<div style="float: left;padding-top:0px">
<a href="./?home=help&act=views&views=<?php echo $row_pro['id'];?>&cat=<?php echo $row_pro['cat_id'];?>">
<img src="<?php echo $row_pro['image'];?>" width="110" height="80" style="border:1px solid #C0C0C0">
</a>
</div>

<div style="float: left;width:900px;padding-top:0px;padding-left:10px;">
<div style="color:#a0a0a0;font-size:11px;padding-bottom:5px">
<?php echo $row_pro['date'];?>
</div>
<div><?php echo $row_pro['short'];?></div>
</div>

</div>
</div>
<?}?>
<?}?>
<? if ($total1>0) { ?>
<div style="clear:both;height:10px;padding-top:5px">
<hr color="#E9E9E9" width="100%" SIZE=1 align="center">
</div>
<div class="pagination">
<TABLE bgcolor="#FFFFFF" cellSpacing=10 cellPadding=0 width="100%" border=0 id="table35" style="line-height: 120%; text-align: justify" align="center">
<?
$pages=count_page($total1,($row*$col)/9);
echo '<tr><td class="smallfont" align="left" ></td>';
echo '<td class="smallfont" align="right">';
$param="";
if ($p>1) echo '<a class="buton_timkiem" title="&#272;&#7847;u tiên" href="/?home=help&p=0">Đầu tiên</a>  ';
if ($p>0) echo '<a class="buton_timkiem" title="&#272;&#7847;u tiên" href="/?home=help&p='.($p-1).'">Trang trước</a>';
$from=($p-2>0?$p-1:0);
$to=($p+2<$pages?$p+2:$pages);
for ($i=$from;$i<$to;$i++)
{
	if ($i!=$p) echo '<a href="/?home=help&p='.$i.'">'.($i+1).'</a> ';
	else echo '<a class="active1">'.($i+1).'</a> ';
}
if ($p<$i-1) echo '<a class="buton_timkiem" title="Ti&#7871;p theo" href="/?home=help&p='.($p+1).'">Trang tiếp</a>';

echo '</td></tr></table>';
?>

</div>
<!-- end all help-->
</div>
<?}else{?>
<?php
for($i=1;$i<=$row&&$row_pro=@mysql_fetch_array($result);$i++)
{
    $sql_user=@mysql_query("SELECT user,company,level_shop FROM user_shop where user='".$row_pro['user']."' ");
    $row_user=@mysql_fetch_assoc($sql_user);
    $sql_city=@mysql_query("SELECT id,name FROM city where id='".$row_pro['city']."' ");
    $row_city=@mysql_fetch_assoc($sql_city);
    if($i%2)
    {
        $color="#EAEAEA";
    }
    else
    {
        $color="#FFFFFF";
    }
?>
<div class="row_pro_cat_help">
<div style="height:20px;color:#094FC8;">
<a href="./?home=help&act=views&views=<?php echo $row_pro['id'];?>&cat=<?php echo $row_pro['cat_id'];?>">
<?php echo $row_pro['name'];?>
</a>
</div>
<div style="padding-top:5px">
<div style="float: left;padding-top:0px">
<a href="./?home=help&act=views&views=<?php echo $row_pro['id'];?>&cat=<?php echo $row_pro['cat_id'];?>">
<img src="<?php echo $row_pro['image'];?>" width="110" height="80" style="border:1px solid #C0C0C0">
</a>
</div>

<div style="float: left;width:900px;padding-top:0px;padding-left:10px;">
<div style="color:#a0a0a0;font-size:11px;padding-bottom:5px">
<?php echo $row_pro['date'];?>
</div>
<div><?php echo $row_pro['short'];?></div>
</div>

</div>
</div>
<?}?>
<? if ($total>0) { ?>
<div style="clear:both;height:10px;padding-top:5px">
<hr color="#E9E9E9" width="100%" SIZE=1 align="center">
</div>
<div class="pagination">
<TABLE bgcolor="#FFFFFF" cellSpacing=10 cellPadding=0 width="100%" border=0 id="table35" style="line-height: 120%; text-align: justify" align="center">
<?
$pages=count_page($total,($row*$col));
echo '<tr><td class="smallfont" align="left" ></td>';
echo '<td class="smallfont" align="right">';
$param="";

$from=($p-10>0?$p-1:0);
$to=($p+10<$pages?$p+10:$pages);
for ($i=$from;$i<$to;$i++)
{
	if ($i!=$p) echo '<a href="'.$_SERVER['REQUEST_URI'].'&p='.$i.'">'.($i+1).'</a> ';
	else echo '<a class="active1">'.($i+1).'</a> ';
}

echo '</td></tr></table>';
?>

</div>
<?
}
?>
<?}?>
</div>
</div>