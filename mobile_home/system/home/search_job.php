<div class="header_search">
<form name="header_search" action="index.html" method="get" onsubmit="trackEvent( 'Keyword', 'Search Rao vặt', $('input[name=keyword].input_search_header').val()); checkForm(this.name, arrCtrlHeaderSearch); return false;" data-ptsp-kpi-action-name="Navigation" data-ptsp-kpi-action-label="Tìm kiếm">
<input type="hidden" name="home" value="search">
<input type="hidden" name="act" value="search">
<input type="hidden" name="type" value="3">
		<table cellpadding="0" cellspacing="0" border="0" width="100%">
			<tbody><tr>
		<td class="left_search" width="100">
					<div class="h_rv_city">
<select name="city" style="width:150px" id="states">
<option value="">Toàn quốc</option>
<?php
$sql_cty=mysql_query("SELECT * FROM city order by thutu ASC");
while($row_cty=mysql_fetch_array($sql_cty))
{?>
<option value="<?php echo $row_cty['id'];?>" <?php if($row_cty['id']==$_REQUEST['city']){?>selected<?}else{?><?}?>><?php echo $row_cty['name'];?></option>
<?}?>
</select>
					</div>
				</td>
								<td style="padding: 0 10px;">
					<div class="input_search">
						<table cellpadding="0" cellspacing="0" border="0" width="100%">
							<tbody><tr>
								<td width="30"><i class="vcon-rv_search"><input class="submit" type="submit" value=""/></i></td>
								<td>
									<input type="search" name="keywords" class="input_search_header" onfocus="searchFullV3(true);trackEvent('Header Search', 'Click', 'Trang Rao vặt');" placeholder="Please input keyworld..." id="keyword_search" value="">
									<input type="hidden" class="iCat" id="iCat" name="iCat" value="0">
								</td>
							</tr>
						</tbody></table>
					</div>
				</td>
				<td class="close_search" onclick="searchFullV3(false);" width="50">
					Close
				</td>
				<td width="40" class="hd_cart">
					<a href="./?home=cart" title="Giỏ hàng" data-ptsp-kpi-action-name="Navigation" data-ptsp-kpi-action-label="Logo giỏ hàng">
						<i class="vcon-cart r_cart">
							<span class="cart_not"><? echo count($_SESSION['cart']); ?></span>
							</i>
					</a>
				</td>
							</tr>
		</tbody></table>
	</form>
</div>