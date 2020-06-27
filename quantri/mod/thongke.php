
<? if($_SESSION['level']=='0')
{?>
<?
$sql1=mysql_query("SELECT * FROM products where user='".$_SESSION['log']."' ");
$toalt1=mysql_num_rows($sql1);
?>
<?
$sql2=mysql_query("SELECT * FROM news where user='".$_SESSION['log']."' ");
?>
<?
$sql3=mysql_query("SELECT * FROM contact where user='".$_SESSION['log']."' ");
?>
<table border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#C9C9C9" width="100%" id="AutoNumber1" align="center">
<tr>
<td width="250" style="padding-left:30px">T&#7893;ng s&#7889; sản phẩm:</td>
<td><? echo mysql_num_rows($sql1);?></td>
</tr>
<tr>
<td width="250" style="padding-left:30px">T&#244;ng s&#7889; tin tức:</td>
<td><? echo mysql_num_rows($sql2);?></td>
</tr>
<tr>
<td width="250" style="padding-left:30px">T&#7893;ng s&#7889; &#253; liên lạc:</td>
<td><? echo mysql_num_rows($sql3);?></td>
</tr>
<tr>
<td width="250" style="padding-left:30px">T&#7893;ng s&#7889; l&#432;&#7907;t truy c&#7853;p:</td>
<td>
<?
$sql="SELECT * FROM user_shop where user='".$_SESSION['log']."' ";
$xuat=mysql_query($sql);
$row=mysql_fetch_array($xuat)
?>
<? echo $row['visit'];?>
</td>
</tr>
</table>
		<?} else{?>
<? echo "<font color=\"red\"><b>B&#7841;n kh&#244;ng c&#243; quy&#7873;n h&#7841;n trong ch&#7913;c n&#259;ng n&#224;y</b></font>";?>
<?}?>