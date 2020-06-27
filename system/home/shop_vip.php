<div class="d-box-s_shopvip">
    <div class="d-box-s-title">
         <h3><i class="fa fa-bank"  ></i>&nbsp;&nbsp;GIAN HÀNG CHUYÊN NGHIỆP</h3>
    </div>
    <div class="d-box-s-content">
        <ul class="ul-pro4_shopvip">
<?php 
$sql_store=mysql_query("SELECT * FROM user_shop where level_shop=0 order by upshopvip DESC limit 33");
$i=0;
while($row_store=mysql_fetch_array($sql_store))
{
$size = getimagesize($row_store['logo']);
if($i=='1')
{
    $class="first";
}
else
{
    $class="";
}
    ?> 
        <li class="<?php echo $class;?>">
            <a href="http://<?php echo $row_store['user'];?>.<?php echo $domain_config;?>" target="_blank" title="<?php echo $row_store['company'];?>">

                <div class="img-pro4_shopvip">
<?php if($row_store['logo']=='upload/logo/')
{?>
<img class="img-pro" alt="<?php echo $row_store['company'];?>" title="<?php echo $row_store['company'];?>" src="images/no_logo.jpg" width="90"/>
<?}else{?>
<?php if(file_exists($row_store['logo']))
                 {?>
                <?php if($size[0]>=$size[1])
                {?>
                <img src="<? echo $row_store['logo'];?>" width="90"/>
                <?}else{?>
                <img src="<? echo $row_store['logo'];?>" height="90"/>
                <?}?>
                <?}else{?>
                <img class="thumb" width="90" height="90" src="images/no_logo.jpg" />
                <?}?>
<?}?>
                </div>
                <div class="company"><span style="color: blue;font-weight: bold;"><?php echo $row_store['company'];?></span> </div>
            </a>
        </li>
<?}?>
        </ul>                        
    </div>
</div>