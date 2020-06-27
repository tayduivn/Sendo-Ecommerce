<?php
$sql_h=mysql_query("SELECT * FROM hangsx order by thutu ASC limit 10");
while($row_h=mysql_fetch_array($sql_h))
{
?>
<div style="float: left;"><a href="./<?php echo doidau(mb_strtolower($row_h['name'],"UTF8"));?>-hangsx-<?php echo $row_h['id'];?>.html"><img src="<?php echo $row_h['logo'];?>" style="width: 150px;height:100px;border-radius: 10px;"/></a></div>
<?}?>