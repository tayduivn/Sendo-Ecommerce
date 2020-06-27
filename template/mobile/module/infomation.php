<table border="0" style="border-collapse: collapse" width="100%" id="table86" cellpadding="0" align="center">

<tr>
<td align="left" colspan="4">
<table border="0" width="100%" id="table1090" cellspacing="0" cellpadding="0">
<tr>
<td width="54"><img src="template/base/images/home.jpg"></td>
<td><b><font face="Tahoma" style="font-size: 9pt; color:#5A635C">Trang chủ> 
<? 
if($_REQUEST['home']=='about')
{?>
Giới thiệu
<?} elseif($_REQUEST['home']=='map')
{?>
Bản đồ
<?} elseif($_REQUEST['home']=='request')
{?>
Hỏi đáp
<?} elseif($_REQUEST['home']=='contact')
{?>
Liên hệ
<?}?>
</font></b>
</td>
</tr>
</table>
</td>
</tr>
<tr><td>
<? 
if($_REQUEST['home']=='about')
{?>

<?php
 $File = "counter/".$user."/gioithieu.var"; 
 $ghi = fopen($File, "r");
 while (!feof($ghi))
  {
  echo fgetc($ghi);
  }
fclose($ghi);
?>
<?} elseif($_REQUEST['home']=='map')
{?>

<script type="text/javascript" src="http://code.google.com/apis/gears/gears_init.js" >
</script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&language=vi&region=hn"></script>
<script type="text/javascript">
var map;
function initialize() {
      var myLatlng = new google.maps.LatLng(<? echo $row1['map'];?>);
      var myOptions = {
    zoom: 15,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
}
map = new google.maps.Map(document.getElementById("div_id"), myOptions); 
var text;
text= "<b style='color:#00F' " + 
         "style='text-align:center'><? echo $row1['company'];?><br /><? echo $row1['address'];?><br />" + 
     "<img src='<? echo $row1['logo'];?>'  /></b>";
   var infowindow = new google.maps.InfoWindow(
    { content: text,
        size: new google.maps.Size(100,50),
        position: myLatlng
    });
       infowindow.open(map);    
    var marker = new google.maps.Marker({
      position: myLatlng, 
      map: map,
      title:"<? echo $row1['name'];?>"
  });
}
</script>
<body onLoad="initialize()">
    <div id="div_id" style="height:700px; width:780px"></div>
</body>

<?} elseif($_REQUEST['home']=='request')
{?>
<?php
 $File1 = "counter/".$user."/hoidap.var"; 
 $ghi1 = fopen($File1, "r");
 while (!feof($ghi1))
  {
  echo fgetc($ghi1);
  }
fclose($ghi1);
?>
<?} elseif($_REQUEST['home']=='contact')
{?>
<br>

<script>
function kiemtra()
{
var name=document.getElementById("name");
var mota=document.getElementById("address");
var thongtin=document.getElementById("content");
if(name.value=="")
{
alert("Nhap ten");
name.focus();
return false;
}
if(address.value=="")
{
alert("Nhap mo ta");
address.focus();
return false;
}
if(content.value=="")
{
alert("nhap thong tin");
content.focus();
return false;
}
}
</script>
<?
$rand = rand(111111,999999);
if(isset($_POST['Save']))
{
$name=$_POST['name'];
$address=$_POST['address'];
$company=$_POST['company'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$sex=$_POST['sex'];
$city=$_POST['city'];
$component=$_POST['component'];
$website=$_POST['website'];
$content=$_POST['content'];
$date=date("d-m-Y");
if($_POST['name']=='')
	{
    $err="Bạn chưa nhập tên";
    }
elseif($_POST['address']=='')
	{
	$err="Bạn chưa nhập địa chỉ";
    }
elseif($_POST['company']=='')
	{
	$err="Bạn chưa nhập địa chỉ";
    }
elseif($_POST['phone']=='')
	{
	$err="Bạn chưa nhập số điện thoại";
    }
elseif($_POST['content']=='')
	{
	$err="Nội dung không được để trống";
    }
elseif($_POST['input_code']!==$_POST['secucode'])
	{
	$err="Kh&#244;ng &#273;&#250;ng m&#227; b&#7843;o m&#7853;t";
    }
else
{
$sql="INSERT INTO contact(name, address, company, phone, email, sex, city, component, website, content,user, date) values('$name','$address','$company','$phone','$email','$sex','$city','$component','$website','$content','$user','$date')";
$result=mysql_query($sql);
if($result)
	{
	$err="B&#7841;n &#273;&#227; g&#7917;i th&#244;ng tin &#273;&#259;ng k&#253; Website th&#224;nh c&#244;ng, Ch&#250;ng t&#244;i s&#7869; li&#234;n h&#7879; v&#7899;i b&#7841;n trong v&#242;ng 12 Gi&#7901;. C&#7843;m &#417;n b&#7841;n &#273;&#227; quan t&#226;m!";
	}
}
}
?>
<form action="" method="POST" onsubmit="return kiemtra();">
<table cellspacing="0" cellpadding="2" width="660" align="left" style="padding:20px;background-color: #FFFFFF;FONT-SIZE: 12px;">
<tr><td colspan="2" align="center"><b>Form g&#7917;i &#253; ki&#7871;n tr&#7921;c tuy&#7871;n</b></td></tr>
<tr><td colspan="2" align="center">
<?php
 $File2 = "counter/".$user."/lienhe.var"; 
 $ghi2 = fopen($File2, "r");
 while (!feof($ghi2))
  {
  echo fgetc($ghi2);
  }
fclose($ghi2);
?>
</td></tr>
<tr><td colspan="2"><font color="red"><b><?echo $err;?></b></font></td></tr>
<tr><td>
T&#234;n c&#7911;a b&#7841;n:<font color="red"><b>*</b></font></td><td> 
<input type="text" style="width:340px" name="name">
</td></tr>
<tr><td>
&#272;&#7883;a ch&#7881;:<font color="red"><b>*</b></font>  </td><td>                
<input type="text" style="width:340px" name="address">
</td></tr>
<tr><td>
&#272;&#7883;a tho&#7841;i:<font color="red"><b>*</b></font> </td><td>               
<input type="text" style="width:340px" name="phone">
</td></tr>
<tr><td>
Email:<font color="red"><b>*</b></font>   </td><td>                                   
<input type="text" style="width:340px" name="email">
</td></tr>
<tr><td>
Website:<font color="red"><b>*</b></font>   </td><td>                                   
<input type="text" style="width:340px" name="website">
</td></tr>
<tr><td>
T&#234;n c&#244;ng ty:<font color="red"><b>*</b></font></td><td>
<input type="text" style="width:340px" name="company">
</td></tr>
<tr><td>
Giới tính:<font color="red"><b>*</b></font>  </td><td>            
<select style="color:red;font-weight:bold" name="sex">
    <option value="0">Nam</option>
	<option value="1">Nữ</option>
						   </select>
		</td></tr>
<tr><td>
Thành phố:<font color="red"><b>*</b></font>  </td><td>            
<select style="color:red;font-weight:bold" name="city">
<? $sql_city=mysql_query("SELECT * FROM city order by id");
while($row_city=mysql_fetch_array($sql_city))
	{?>
    <option value="<? echo $row_city['id'];?>"><? echo $row_city['name'];?></option>
	<?}?>
						   </select>
		</td></tr>
<tr><td>
Li&#234;n h&#7879; v&#7899;i b&#7897; ph&#7853;n:<font color="red"><b>*</b></font>  </td><td>            
<select style="color:red;font-weight:bold" name="component">
    <option value="0">B&#7897; ph&#7853;n k&#7929; thu&#7853;t</option>
	<option value="1">B&#7897; ph&#7853;n k&#7871; to&#225;n & h&#224;nh ch&#237;nh</option>
						   </select>
		</td></tr>
<tr>
<td width="177">N&#7897;i dung y&#234;u c&#7847;u th&#234;m c&#7911;a kh&#225;ch h&#224;ng:<font color="red"><b>*</b></font></td>
<td><textarea name="content" rows=10 cols=25 style="position: relative; width: 100%; border: 1px solid #C3C3C3"  onkeyup="checkmobis(this);" onclick="this.value='';">
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


<?} else
{?>
<? echo "Khong ton tai trang";?>
<?}?>
</td></tr>
</table>