<?
$row=9;
$col=1;
$MAXPAGE=10;
$name=$_GET['name'];
$cat=0;
if ($_REQUEST['cat']!='') $cat=killInjection($_REQUEST['cat']);

$p=0;
if ($_REQUEST['p']!='') $p=$_REQUEST['p'];
$sql = "select * from news where cat_id=".$cat." and user='".$user."' order by thutu desc limit ".$row*$col*$p.",".$row*$col;
$result = @mysql_query($sql,$con);
$total=CountRecord("news","cat_mem=".$cat);
?>
<table bgcolor="#FFFFFF" border="0" style="border-collapse: collapse" width="100%" id="table86" cellpadding="0" align="center">

<tr>
<td align="left" colspan="4">
<table border="0" width="100%" id="table1090" cellspacing="0" cellpadding="0">
<tr>
<td width="54"><img src="template/maucam/images/home.jpg"></td>
<td>
<? $sql_cat=mysql_query("SELECT * FROM news_cat where id='".$cat."'");
$row_cat=mysql_fetch_assoc($sql_cat);?>
<b><font face="Tahoma" style="font-size: 9pt; color:#5A635C">
TIN TỨC | <? echo $row_cat['name'];?></font></b>
</td>
</tr>
</table>
</td>
</tr>

<tr>
<?
for ($i=0;$i<$row;$i++)
{
?>
	<tr>
<?
	for($j=0;$j<$col&&$news=mysql_fetch_assoc($result);$j++)
	{
		$pro=GetNewsInfo($news['id']);
?>
		<td align="left" valign="top">
					<table border="0" width="100%" id="table606" cellpadding="2" align="left">
								<tr>
<?if($domain=='')
		{?>
		                            <td width="100" align="left" valign="top" height="25">
									<a href="./<? echo $user;?>/news-views/<? echo $pro['id']; ?>/<? echo $pro['cat_id']; ?>/<? echo str_replace($marTViet,$marKoDau,$pro['name']); ?>.html">
									<img border="0" src="<? echo $pro['image'];?>" width="100" style="border: 1px solid #EEEEEE"></a></td>

									<td align="left" valign="top" height="25"><b>
									<? echo $pro['name'];?></b>&nbsp;&nbsp;[<? echo $pro['date'];?>]
									<br><? echo $pro['short'];?><br>
									<div align="right"><INPUT onclick="window.location='./<? echo $user;?>/news-views/<? echo $pro['id']; ?>/<? echo $pro['cat_id']; ?>/<? echo str_replace($marTViet,$marKoDau,$pro['name']); ?>.html'" class=yeucau onmouseover="this.className='yeucau1'" onmouseout="this.className='yeucau'" type=button value="Xem chi ti&#7871;t" name=cart></div>
									</td>
									</tr>


									
						          <?}else{?>
								  <td width="100" align="left" valign="top" height="25">
									<a href="./news-views/<? echo $pro['id']; ?>/<? echo $row_cat['id']; ?>/<? echo str_replace($marTViet,$marKoDau,$pro['name']); ?>.html">
									<img border="0" src="<? echo $pro['image'];?>" width="100" style="border: 1px solid #EEEEEE"></a></td>

									<td align="left" valign="top" height="25"><b>
									<? echo $pro['name'];?></b>&nbsp;&nbsp;[<? echo $pro['date'];?>]
									<br><? echo $pro['short'];?><br>
									<div align="right"><INPUT onclick="window.location='./news-views/<? echo $pro['id']; ?>/<? echo $row_cat['id']; ?>/<? echo str_replace($marTViet,$marKoDau,$pro['name']); ?>.html'" class=yeucau onmouseover="this.className='yeucau1'" onmouseout="this.className='yeucau'" type=button value="Xem chi ti&#7871;t" name=cart></div>
									</td>
									</tr>
								  
								  <?}?>
								</table>
		</td>



<?
}
while($j<$col) {
	echo "<td></td>";
	$j=$j+1;
}
?>

                    </tr>
<?
}
?>

                  </table>

<? if ($total>0) { ?>
<hr color="#E9E9E9" width="100%" SIZE=1 align="center">
<TABLE cellSpacing=10 cellPadding=0 width="100%" border=0 id="table35" style="line-height: 120%; text-align: justify" align="center">
<?
$pages=count_page($total,($row*$col));
echo '<tr><td class="smallfont" align="left" >
Trang <b>'.($p+1).'</b> &#273;&#7871;n <b>'.$pages.'</b> (trong <b>'.$total.'</b> Sản phẩm)</td>';
echo '<td class="smallfont" align="right">
Trang: ';
$param="";
if ($p>1) echo '<a class="buton_timkiem" title="&#272;&#7847;u tiên" href="./?menu='.$_REQUEST['menu'].'&cat='.$_REQUEST['cat'].'&'.$param.'&p=0">[&lt;]</a> ';
if ($p>0) echo '<a class="buton_timkiem" title="V&#7873; tr&#432;&#7899;c" href="./?menu='.$_REQUEST['menu'].'&cat='.$_REQUEST['cat'].'&'.$param.'&p='.($p-1).'">[&lt;&lt;]</a> ';
$from=($p-10>0?$p-10:0);
$to=($p+10<$pages?$p+10:$pages);
for ($i=$from;$i<$to;$i++)
{
	if ($i!=$p) echo '<a href="./?menu='.$_REQUEST['menu'].'&cat='.$_REQUEST['cat'].'&'.$param.'&p='.$i.'">'.($i+1).' </a>';
	else echo '<b>'.($i+1).'</b> ';
}
if ($p<$i-1) echo '<a class="buton_timkiem" title="Ti&#7871;p theo" href="./?menu='.$_REQUEST['menu'].'&cat='.$_REQUEST['cat'].'&'.$param.'&p='.($p+1).'">[&gt;&gt;]</a> ';
if ($p<$pages-1) echo '<a class="buton_timkiem" title="Cu&#7889;i cùng" href="./?menu='.$_REQUEST['menu'].'&cat='.$_REQUEST['cat'].'&'.$param.'&p='.($pages-1).'">[&gt;]</a>'; 
echo '</td></tr></table>';
?><?
}
?>