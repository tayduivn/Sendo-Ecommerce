<div id="ctl00_MainContent_supportonline" class="d-box-s blue large">           
<!--div class="d-box-s-title">
    <h3>HỖ TRỢ TRỰC TUYẾN</h3>
</div>
<div class="d-box-s-content" style="height:291px;position:relative;">
<?php
$sql_support=mysql_query("SELECT * FROM support order by thutu");
while($row_support=mysql_fetch_array($sql_support))
{?>
    <div class="d-support-online">
        <a href="ymsgr:sendim?<?php echo $row_support['yahoo'];?>"><img src="http://opi.yahoo.com/online?u=<?php echo $row_support['yahoo'];?>&amp;m=g&amp;t=5"></a>
        &nbsp;&nbsp;<a href="skype:<?php echo $row_support['skype'];?>?chat" title="<?php echo $row_support['name'];?>"><img src="http://mystatus.skype.com/mediumicon/<?php echo $row_support['skype'];?>"></a>
        <span class="s-name"><?php echo $row_support['name'];?> - <?php echo $row_support['phone'];?></span>
    </div>
<?}?>
    <div class="d-note">GIANHANGSO.COM KHÔNG TRỰC TIẾP BÁN SẢN PHẨM</div>
</div></div-->

<div class="d-box-s-title">
    <h3>HOTLINE HỖ TRỢ 24/7</h3>
</div>
<div class="d-box-s-content" style="height:261px;position:relative;">
    <p class="p-online">Tư vấn dịch vụ</p>
    <div class="d-support-online">
        
       
        <span class="s-name">Mr.Lợi - 0939 822 433</span>
    </div>
	<div class="d-support-online">
        
       
        <span class="s-name">Mr.Quang - 0931 052 062</span>
    </div>
    <div class="d-support-online">

       
        <span class="s-name">Mr.An - 01689 416 881</span> 
    </div>
	 <p class="p-online">Kế toán</p>
    <div class="d-support-online">
        
        <span class="s-name">Ms.Ngọc - 0907 168 664</span>
    </div>
    <p class="p-online">Kỹ thuật</p>
    <div class="d-support-online">
        <a href="ymsgr:sendim?huuloi_1993">
        <img alt="" title="Hỗ trợ 1" src="http://opi.yahoo.com/online?u=huuloi_1993&amp;t=5">
        <span class="s-name">Hỗ trợ 1 - 0931 052 062</span> </a>
    </div>
    <div class="d-note">GIANHANGSO.COM KHÔNG TRỰC TIẾP BÁN SẢN PHẨM</div>
</div></div>
