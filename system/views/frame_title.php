<link href="style/style_proview.css" media="screen" rel="stylesheet" />
<?php 
$sql_mul=@mysql_query("SELECT * FROM cat where id='".$row['cat']."' ");
$row_mul=mysql_fetch_assoc($sql_mul);
?>
<?php 
$sql_mul1=@mysql_query("SELECT * FROM cat where id='".$row_mul['parent']."' ");
$row_mul1=mysql_fetch_assoc($sql_mul1);
?>
<?php 
$sql_mul2=@mysql_query("SELECT * FROM cat where id='".$row_mul1['parent']."' ");
$row_mul2=mysql_fetch_assoc($sql_mul2);
?>
<?php 
$sql_mul3=@mysql_query("SELECT * FROM products where id='".$_REQUEST['views']."' ");
$row_mul3=mysql_fetch_assoc($sql_mul3);
?>
<div style="float: left;
    width: 100%;
    list-style-type: none;
    margin: 19px 0;
    padding: 0;    float: left;
    width: 100%;
    border-bottom: 1px solid #ddd;    height: 24;">
<div style="float: left;">Trang chủ<i style=" font-size: 11px;    padding: 5px; " class="fa fa-fw fa-chevron-right"></i></font></div>
<div class="style_proview">
    <ul>
    <?php if($row_mul2['id']=='')
    {?><?}else{?>
        <li><div style="text-align:center;"><?php echo $row_mul2['name'];?><i style=" font-size: 11px;    padding: 5px; " class="fa fa-fw fa-chevron-right"></i></div>

        </li>
        <?}?>
        <?php if($row_mul1['id']=='')
        {?><?}else{?>
        <li><div style="text-align:center;"><?php echo $row_mul1['name'];?><i style=" font-size: 11px;    padding: 5px; " class="fa fa-fw fa-chevron-right"></i></div>
           
        </li>
        <?}?>
		<?php $sql_sub3=@mysql_query("SELECT id,name,parent FROM cat where parent='".$row_mul['id']."' ");
		$toal_sub3=mysql_num_rows($sql_sub3);
		?>
		<?php if($toal_sub3>0)
		{?>
		<li>
		<div style="text-align:center;"><?php echo $row_mul['name'];?><i style=" font-size: 11px;    padding: 5px; " class="fa fa-fw fa-chevron-right"></i></div>
		
		</li>
		<?}else{?>
		<div class="pro_views_icon_cat_no"><?php echo $row_mul['name'];?></div>
		<?}?>
    </ul>
</div>

</div>