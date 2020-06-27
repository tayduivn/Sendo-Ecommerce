<div id="menu">
<ul id="category">
<?php
$sql_cat_h=mysql_query("SELECT * FROM cat where parent=17 order by thutu ASC");
while($row_cat_h=mysql_fetch_array($sql_cat_h))
{?>
<li  id="mainCat_<?php echo $row_cat_h['id'];?>" idata="<?php echo $row_cat_h['id'];?>" class="level_0"> 
<a href="./<?php echo doidau(mb_strtolower($row_cat_h['name'],"UTF8"));?>-ct-<?php echo $row_cat_h['id'];?>.html" data-ptsp-kpi-action-name="Trang chủ" data-ptsp-kpi-action-label="Navigation/Danh mục cấp 1"> <span class="cat_text"><?php echo $row_cat_h['name'];?></span> </a> 
 
<ul class="sub_cat" id="sub_cat_<?php echo $row_cat_h['id'];?>"></ul> 
</li>
<?}?>
</ul>
 
<ul class="beacon_sprite">
</ul>
</div>