<table border="0" style="border-collapse: collapse" width="100%" id="table86" cellpadding="0" align="center">

<tr>
<td align="left" colspan="4">
<table border="0" width="100%" id="table1090" cellspacing="0" cellpadding="0">
<tr>
<td width="54"><img src="template/base/images/home.jpg"></td>
<td><b><font face="Tahoma" style="font-size: 9pt; color:#5A635C">Trang chủ> 
<?
$id=$_REQUEST['id'];
$name=$_REQUEST['name'];
$sql_menu=mysql_query("SELECT * FROM menu_mem where id='".$id."' order by thutu asc ");
$row_menu=mysql_fetch_array($sql_menu);?>
<? echo $row_menu['name'];?>
</font></b>
</td>
</tr>
</table>
</td>
</tr>
<tr><td style="padding:10px">
<? echo $row_menu['content'];?>
</td></tr>
</table>