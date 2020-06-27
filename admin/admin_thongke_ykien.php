<?
	$id=1;
	$ykien=GetYkienNameInfo($id);
	$tong=$ykien['ykien_1']+$ykien['ykien_2']+$ykien['ykien_3']+$ykien['ykien_4'];
	$ykien1=($ykien['ykien_1']/$tong)*100;
	$ykien2=($ykien['ykien_2']/$tong)*100;
	$ykien3=($ykien['ykien_3']/$tong)*100;
	$ykien4=($ykien['ykien_4']/$tong)*100;
	$tong=100;

?>
	
	<table border="1" width="100%" id="table1" cellpadding="0" style="border-collapse: collapse" bordercolor="#0000FF">
	<tr>
		<td align="center" colspan="3"><b><font face="Tahoma" size="2">Th&#7889;ng k&ecirc; &yacute; ki&#7871;n</font></b></td>
	</tr>

	<tr>
		<td width="211" align="center" ><b><font size="2" face="Tahoma">C&acirc;u tr&#7843; l&#7901;i</font></b></td>
		<td align="center"><b><font size="2" face="Tahoma">Th&#7889;ng k&ecirc; %</font></b></td>
		<td width="90" align="center"><b><font size="2" face="Tahoma">L&#432;&#7907;t b&igrave;nh ch&#7885;n</font></b></td>
	</tr>
	<tr>
		<td width="211"><font size="2" face="Tahoma">&nbsp;B&#7841;n bè</font></td>
		<td nowrap height="10"><div style="background-color: #FF0000; width: <? echo $ykien1; ?>%;" align="center" nowrap></div>
		</td>
		<td width="90" align="center"><font size="2" face="Tahoma"><? echo $ykien['ykien_1']; ?></font></td>
	</tr>
	<tr>
		<td width="211" nowrap><font size="2" face="Tahoma">&nbsp;Tình c&#7901;</font></td>
		<td nowrap><div style="background-color: #00FF00; width: <? echo $ykien2; ?>%">&nbsp;</div>
		</td>
		<td nowrap width="90" align="center"><font size="2" face="Tahoma"><? echo $ykien['ykien_2']; ?></font></td>
	</tr>
	<tr>
		<td width="211"><font size="2" face="Tahoma">&nbsp;Qu&#7843;ng cáo</font></td>
		<td><div style="background-color: #0000FF; width: <? echo $ykien3; ?>%">&nbsp;</div></td>
		<td width="90" align="center"><font size="2" face="Tahoma"><? echo $ykien['ykien_3']; ?></font></td>                                                                                        
	</tr>
	<tr>
		<td width="211"><font size="2" face="Tahoma">&nbsp;Khác</font></td>
		<td><div style="background-color: #FF00FF; width: <? echo $ykien4; ?>%">&nbsp;</div></td>
		<td width="90" align="center"><font size="2" face="Tahoma"><? echo $ykien['ykien_4']; ?></font></td>
	</tr>

	<tr>
		<td><font size="2" face="Tahoma">&nbsp;T&#7893;ng c&#7897;ng:</font></td>
		<td><div style="background-color: #990000; width: 100% ">&nbsp;</div></td>
		<td width="90" align="center"> <font size="2" face="Tahoma"> <? echo $tong; ?></font></td>
	</tr>
</table>