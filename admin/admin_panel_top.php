<table border="0" style="border-collapse: collapse" width="100%" id="table1" cellpadding="10">
                <tr>
                  <td width="50%" height="20" bgcolor="#0069A8" class="midtitle" align="left">
                  <a href="./">
					<font color="#FFFFFF"><span style="font-weight: 700">Hệ thống quản trị </span></font></a></td>
                  <td width="42%" height="20" bgcolor="#0069A8" class="midtitle" align="right">
                  </td>
                  <td width="4%" height="20" bgcolor="#0069A8" class="midtitle" align="right">
</td>
                </tr>
                <tr>
                	<td bgcolor="#ffffff" width="100%" height="1" colspan="3">
                	</td>
                </tr>
                </table>
<table cellspacing="0" cellpadding="0">
<tr>
<td class="smallfont">Tìm kiếm sản phẩm: </td>
<td class="smallfont">
<!-- begin tim kiem-->
<form name="form_select" method="GET" action="./" style="height:15px">
<table id="timkiem_home" border="0" id="table21" cellspacing="0" cellpadding="0">
					<tr>
						<td style="padding-left:4px;">
						<select name="cat_id">
						<option value="" selected>Chọn danh mục</option>
						<? $timkiem=mysql_query("SELECT * FROM cat order by thutu desc");
						while($row_timkiem=mysql_fetch_array($timkiem))
						{?>
						<option value="<? echo $row_timkiem['id'];?>"><? echo $row_timkiem['name'];?></option>
						<?}?>
						</select>
  </td>
<td style="padding-left:0px">
<input name="keywords" type="text" id="input_timkiem" value="">
</td>
<td>
<input type="hidden" name="act" value="search_pro">
<input type="hidden" name="index" value="search_pro">
<input id="button_search" type="submit" name="search" value="Tìm">
</td>
</tr>
</table>
</form>
<!-- end tim kiem -->
</td>
</tr>
</table>