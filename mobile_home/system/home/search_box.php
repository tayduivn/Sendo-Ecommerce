<?php
if(($_REQUEST['home']=='adv')||($_REQUEST['type']=='2'))
{?>
<?php include("mobile_home/system/home/search_adv.php");?>
<?}elseif(($_REQUEST['home']=='job')||($_REQUEST['type']=='3')){?>
<?php include("mobile_home/system/home/search_job.php");?>
<?}else{?>
<div class="header_search" id="header_search">


<form name="header_search" action="index.html" method="get" onsubmit="trackEvent( &#39;Keyword&#39;, &#39;Search Sản phẩm&#39;, $(&#39;input[name=keyword].input_search_header&#39;).val()); checkForm(this.name, arrCtrlHeaderSearch); return false;" data-ptsp-kpi-action-name="Trang chủ" data-ptsp-kpi-action-label="Navigation/Tìm kiếm">
<input type="hidden" name="home" value="search">
<input type="hidden" name="act" value="search">
<input type="hidden" name="type" value="1">
<table cellpadding="0" cellspacing="0" border="0" width="100%"><tbody>
<tr>
<td class="left_search" width="30" align="center"><a href="./index.html" data-ptsp-kpi-action-name="Navigation" data-ptsp-kpi-action-label="lak.la"><img style="-webkit-user-select: none" src="/mobile_home/images/home.png"></a></td>
<td style="padding: 0 10px;">
<div class="input_search">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tbody><tr>
<td width="30">
<i class="vcon-rv_search">
<input class="submit" type="submit" value=""/>
</i>
</td>
<td>
<ul class="as-selections" id="as-selections-034">
<li class="as-original" id="as-original-034">
<input type="search" name="keywords" class="input_search_header as-input"  placeholder="Nhập từ khóa tìm kiếm" id="as-input-034" value="" autocomplete="off">
<span class="icon_clear" id="clear_input_search" onclick="clearInput(1)">
</span>
<input type="hidden" class="as-values" id="as-values-034">
</li>
</ul>
<div class="as-results" id="as-results-034" style="display: none;"></div>
</tr>
</tbody>
</table>
</div>
</td>
<td class="close_search" onclick="searchFullV3(false);" width="50"><a href="java:">Thoát</a></td>
 
</tr></tbody></table>
</form>
</div>
<script type="text/javascript">var defaultSuggest = {"status":"status"};$("#keyword_search").autoSuggest('/ajax/autocomplete.php', {minChars : 1,selectionLimit : 1,selectedItemProp : 'p_text',searchObjProps : 'p_text',selectedItemiCat: 'iCat',startText: '',retrieveLimit : 15,defaultData:defaultSuggest,formatList : function(data, el) {var html = formatResults(data);el.html(html);$('.as-list').append(el);},retrieveComplete: function(data) {return data.result;}});</script>
<div id="statusdiv"></div>
<?}?>