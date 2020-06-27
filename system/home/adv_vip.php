<div id="ctl00_MainContent_supportonline" class="d-box-s blue large">           
<div class="d-box-s-title">
    <a href="./rao-vat.html"><h3>TIN RAO VẶT VIP</h3></a>
</div>
<div class="d-box-s-content" style="height:261px;position:relative;">
<?php 
 $sql=@mysql_query("SELECT * FROM avd order by upvip DESC limit 7 ");
 while($row=@mysql_fetch_array($sql))
 {?>
    <div class="d-support-online">
    <a href="./rao-vat/<?php echo doidau(mb_strtolower($row['name'],"UTF8"));?>-vn-<?php echo $row['id'];?>.html">
        <img alt="<?php echo $row['name'];?>" src="./images/icon_news.png"/>
        <span class="s-name"><?php echo dwebvn($row['name'],7);?></span>
    </a>
    </div>
<?}?>
</div></div>