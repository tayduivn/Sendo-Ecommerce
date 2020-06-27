<div id="raovatRelate">		<div style="padding:0 10px 10px;">
			<div class="home_box_product" style="border: none;">
				<div class="home_box_header">
					<span>Rao vặt vip</span>
				</div>
				<div class="home_box_show">
<?php 
 $sql=@mysql_query("SELECT * FROM avd order by upvip DESC limit ".$row_config_home['adv_home']." ");
 while($row=@mysql_fetch_array($sql))
 {
$sql_cr=mysql_query("SELECT * FROM currency where id='".$row['currency']."'");
$row_cr=mysql_fetch_assoc($sql_cr);
    ?>
<div class="raovat_item">
	<a href="./rao-vat/<?php echo doidau(mb_strtolower($row['name'],"UTF8"));?>-vn-<?php echo $row['id'];?>.html" title="<?php echo $row['name'];?>">
		• <?php echo $row['name'];?>
<?php if($row['price']=='0'){?><span class="price no_bold">-Liên hệ</span><?}else{?><span class="price no_bold">-<?php echo number_format($row['price'],0);?> VNĐ</span><?}?>
	</a>
</div>
<?}?>
				</div>
				<div class="raovat_link_all">
					<a href="./rao-vat.html">Rao vặt »</a>
				</div>
			</div>
		</div>
		 </div>
<script>
		addLoadAfter('raovatRelate','raovat_relate',{iCat : 0},true);
	</script>