<script>
function kiemtra()
{
var name=document.getElementById("name");
var mota=document.getElementById("mota");
var thongtin=document.getElementById("thongtin");
if(name.value=="")
{
alert("Nhap ten");
name.focus();
return false;
}
if(mota.value=="")
{
alert("Nhap mo ta");
mota.focus();
return false;
}
if(thongtin.value=="")
{
alert("nhap thong tin");
thongtin.focus();
return false;
}
}
</script>
<?
$rand = rand(111111,999999);
if(isset($_POST['Save']))
{
$name=$_POST['name'];
$diachi=$_POST['diachi'];
$congty=$_POST['congty'];
$dienthoai=$_POST['dienthoai'];
$email=$_POST['email'];
$goiweb=$_POST['goiweb'];
$hinhthuc=$_POST['hinhthuc'];
$noidung=$_POST['noidung'];
$date=date("d-m-Y");
if($_POST['name']=='')
	{
    $err="Chua nhap ten";
    }
elseif($_POST['diachi']=='')
	{
	$err="Chua nhap dia chi";
    }
elseif($_POST['congty']=='')
	{
	$err="Chua nhap cong ty";
    }
elseif($_POST['dienthoai']=='')
	{
	$err="Chua nhap dien thoai";
    }
elseif($_POST['input_code']!==$_POST['secucode'])
	{
	$err="Kh&#244;ng &#273;&#250;ng m&#227; b&#7843;o m&#7853;t";
    }
else
{
$sql="INSERT INTO ykien(name, diachi, congty, dienthoai, email, goiweb, hinhthuc, noidung, date) values('$name','$diachi','$congty','$dienthoai','$email','$goiweb',
'$hinhthuc','$noidung','$date')";
$result=mysql_query($sql);
if($result)
	{
	$err="B&#7841;n &#273;&#227; g&#7917;i th&#244;ng tin &#273;&#259;ng k&#253; Website th&#224;nh c&#244;ng, Ch&#250;ng t&#244;i s&#7869; li&#234;n h&#7879; v&#7899;i b&#7841;n trong v&#242;ng 12 Gi&#7901;. C&#7843;m &#417;n b&#7841;n &#273;&#227; quan t&#226;m!";
	}
}
}
?>
<form action="?menu=ykien" method="POST" onsubmit="return kiemtra();">
<table cellspacing="0" cellpadding="2" width="660" align="left" style="padding:20px;background-color: #FFFFFF;FONT-SIZE: 12px;">
<tr><td colspan="2" align="center"><b>Form g&#7917;i &#253; ki&#7871;n tr&#7921;c tuy&#7871;n</b></td></tr>
<tr><td colspan="2" align="center" height="30"></td></tr>
<tr><td colspan="2" align="center">
<? $query=mysql_query("SELECT * FROM contents where contents_id=3");
$bang=mysql_fetch_assoc($query);
?>
<? echo $bang['contents_content'];?>
</td></tr>
<tr><td colspan="2"><font color="red"><b><?echo $err;?></b></font></td></tr>
<tr><td colspan="2" height="10">
</td></tr>
<tr><td>
T&#234;n c&#7911;a b&#7841;n:<font color="red"><b>*</b></font></td><td> 
<input type="text" style="width:340px" name="name">
</td></tr>
<tr><td>
&#272;&#7883;a ch&#7881;:<font color="red"><b>*</b></font>  </td><td>                
<input type="text" style="width:340px" name="diachi">
</td></tr>
<tr><td>
&#272;&#7883;a tho&#7841;i:<font color="red"><b>*</b></font> </td><td>               
<input type="text" style="width:340px" name="dienthoai">
</td></tr>
<tr><td>
Email:<font color="red"><b>*</b></font>   </td><td>                                   
<input type="text" style="width:340px" name="email">
</td></tr>
<tr><td>
T&#234;n c&#244;ng ty:<font color="red"><b>*</b></font></td><td>    <input type="text" style="width:340px" name="congty">
</td></tr>
<tr><td>
Li&#234;n h&#7879; v&#7899;i b&#7897; ph&#7853;n:<font color="red"><b>*</b></font>  </td><td>            
<select style="color:red;font-weight:bold" name="goiweb">
    <option value="B&#7897; ph&#7853;n k&#7929; thu&#7853;t">B&#7897; ph&#7853;n k&#7929; thu&#7853;t</option>
	<option value="B&#7897; ph&#7853;n k&#7871; to&#225;n & h&#224;nh ch&#237;nh">B&#7897; ph&#7853;n k&#7871; to&#225;n & h&#224;nh ch&#237;nh</option>
	<option value="Ban l&#227;nh &#273;&#7841;o">Ban l&#227;nh &#273;&#7841;o</option>
						   </select>
		</td></tr>
						   <tr><td>
T&#236;nh tr&#7841;ng:<font color="red"><b>*</b></font> </td><td>   
<select style="color:red;font-weight:bold" name="hinhthuc">
                           <option value="C&#7847;n c&#243; c&#226;u tr&#7843; l&#7901;i g&#7845;p">C&#7847;n c&#243; c&#226;u tr&#7843; l&#7901;i g&#7845;p</option>
						   <option value="Ch&#432;a c&#7847;n thi&#7871;t">Ch&#432;a c&#7847;n thi&#7871;t</option>
						   </select>
                            
							</td></tr>
<tr>
<td width="177">N&#7897;i dung y&#234;u c&#7847;u th&#234;m c&#7911;a kh&#225;ch h&#224;ng:<font color="red"><b>*</b></font></td>
<td><textarea name="noidung" rows=10 cols=25 style="position: relative; width: 100%; border: 1px solid #C3C3C3"  onkeyup="checkmobis(this);" onclick="this.value='';">
M&#7901;i b&#7841;n nh&#7853;p th&#244;ng tin th&#234;m v&#224;o &#273;&#226;y !
</textarea></td>
</tr>
							<tr><td align="center" colspan="2">
							<table>
                     <tr><td><input type="text" id="codepost" name="input_code" onfocus="this.value='';" onblur="if (this.value=='') {this.value='Nh&#7853;p m&#227; b&#7843;o m&#7853;t';}" value="Nh&#7853;p m&#227; b&#7843;o m&#7853;t" />
					 </td><td>
					 <input type=hidden name="secucode" value="<?php echo $rand; ?>">
                    <font color="blue" size="5pt"><b><?php echo $rand; ?></b></font>
					</td></tr></table>
</td></tr>


							<tr><td align="center" colspan="2">
<input style="position: relative; width: 80px; border: 1px solid #C3C3C3" type="submit" name="Save" value="G&#7917;i &#253; ki&#7871;n">
</td></tr>
</table>
</form>