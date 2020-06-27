<script language="javascript" type="text/javascript">
function check()
{
if(document.myform.cat.value=="")
{
alert("Bạn chưa chọn danh mục");
document.myform.cat.focus();
return false;
}
if(document.myform.city.value=="")
{
alert("Ban chua chon noi dang");
document.myform.city.focus();
return false;
}
if(document.myform.nhucau.value=="")
{
alert("Bạn chưa nhu cầu");
document.myform.nhucau.focus();
return false;
}
if(document.myform.name.value=="")
{
alert("Tên tiêu đề không được bỏ trống");
document.myform.name.focus();
return false;
}
if(document.myform.fullname.value=="")
{
alert("Chưa nhập họ tên");
document.myform.fullname.focus();
return false;
}
if(document.myform.mobile.value=="")
{
alert("Chưa nhập SĐT");
document.myform.mobile.focus();
return false;
}
if(document.myform.address.value=="")
{
alert("Chưa nhập địa chỉ");
document.myform.address.focus();
return false;
}
if(document.myform.email.value=="")
{
alert("Chưa nhập email");
document.myform.email.focus();
return false;
}
return true;
}
</script>
<script type="text/javascript" src="mobile_home/template/js/jquery-1.9.0.min.js"></script>
  <script type="text/javascript" src="mobile_home/template/js/pekeUpload.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){ 
      $("#file1").pekeUpload({theme:'bootstrap', allowedExtensions:"jpeg|jpg|png|gif", onFileError:function(file,error){alert("error on file: "+file.name+" error: "+error+"")}});
	  $("#file2").pekeUpload({theme:'bootstrap', allowedExtensions:"jpeg|jpg|png|gif", onFileError:function(file,error){alert("error on file: "+file.name+" error: "+error+"")}});
	  $("#file3").pekeUpload({theme:'bootstrap', allowedExtensions:"jpeg|jpg|png|gif", onFileError:function(file,error){alert("error on file: "+file.name+" error: "+error+"")}});
	  $("#file4").pekeUpload({theme:'bootstrap', allowedExtensions:"jpeg|jpg|png|gif", onFileError:function(file,error){alert("error on file: "+file.name+" error: "+error+"")}});
	  $("#file5").pekeUpload({theme:'bootstrap', allowedExtensions:"jpeg|jpg|png|gif", onFileError:function(file,error){alert("error on file: "+file.name+" error: "+error+"")}});
	  $("#file6").pekeUpload({theme:'bootstrap', allowedExtensions:"jpeg|jpg|png|gif", onFileError:function(file,error){alert("error on file: "+file.name+" error: "+error+"")}});
	  $("#file7").pekeUpload({theme:'bootstrap', allowedExtensions:"jpeg|jpg|png|gif", onFileError:function(file,error){alert("error on file: "+file.name+" error: "+error+"")}});
	  $("#file8").pekeUpload({theme:'bootstrap', allowedExtensions:"jpeg|jpg|png|gif", onFileError:function(file,error){alert("error on file: "+file.name+" error: "+error+"")}});

    });
	function delFunc(obj)
	{
		
		obj.click(function(){
			var url=$(this).prev('div').children('input');
			//var block=$(this).prev('div');
			$.post('delete.php',{'id':'-1','url':url.val()},function(data){
				if(data==1)
				{
					obj.prev('div').html('');
					obj.addClass('hidden');
					obj.prev('div').prev('div').css('z-index',100);
				}
			});
		});
	}
  </script> 
<script language="JavaScript" type="text/javascript" src="mobile_home/template/js/jquery.chainedSelects.js"></script>
<script language="JavaScript" type="text/javascript">
$(function()
{
	$('#country').chainSelect('#state','system/model/combobox.php',
	{ 
		before:function (target) //before request hide the target combobox and display the loading message
		{ 
			$("#loading").css("display","block");
			$(target).css("display","none");
		},
		after:function (target) //after request show the target combobox and hide the loading message
		{ 
			$("#loading").css("display","none");
			$(target).css("display","inline");
		}
	});
	$('#state').chainSelect('#city','system/model/combobox.php',
	{ 
		before:function (target) 
		{ 
			$("#loading").css("display","block");
			$(target).css("display","none");
		},
		after:function (target) 
		{ 
			$("#loading").css("display","none");
			$(target).css("display","inline");
		}
	});
});
</script>
<style>
#loading
{
	position:absolute;
	top:0px;
	right:0px;
	background:#ff0000;
	color:#fff;
	font-size:14px;
	font-familly:Arial;
	padding:2px;
	display:none;
}
</style>
 <script language="javascript">
 $(document).ready(function() {
  $('#country').change(function() {
   giatri = this.value;
   $('#shuyen').load('ajax.php?id_tinh=' + giatri);
   $('#snhucau').load('ajax_nhucau.php?id_nhucau=' + giatri);
  });
 });
</script>
<style media="all" type="text/css">
	div.preview { float: left; width: 100px; height: 100px; border: 2px dotted #CCCCCC; }
	div.preview.loading { background: url(http://www.unchi.co.uk/demos/jquery/image_upload/loading.gif) no-repeat 39px 40px; }
	div.preview.loading img {display: none; }
	div.preview.loading input
	{
	height:25px;
	}
</style>
<?
if (isset($_POST['Save'])) {
	$name=addslashes($_POST['name']);
	$price=$_POST['price'];
	$currency=$_POST['currency'];
	$content=addslashes($_POST['noidung']);
	$cat=$_POST['cat'];
	$catinfo=GetCategoryInfo($id);
	$user=$_SESSION['log'];
	$city=$_POST['city'];
	$date = date("d-m-Y");
	$nhucau=$_POST['nhucau'];
    $fullname=$_POST['fullname'];
    $mobile=$_POST['mobile'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $img=$_POST['img_thum'];
    $capcha=$_POST['capcha'];
    $img_xuly=str_replace("thumb","img",$img);
	$sql_up=mysql_query("SELECT upvip FROM avd order by upvip DESC limit 1");
	$row_up=mysql_fetch_assoc($sql_up);
	$upvip=$row_up['upvip']+1;
	
	$err="";
	if($name=="") $err .=  "Ban chua nhap tieu de <br>";
	if($cat=='') $err .=  "Ban chua chon danh muc <br>";
	if($content=='') $err .=  "Ban chua nhap noi dung<br>";
    if($city=='') $err .=  "Ban chua chon noi dang<br>";
    if($nhucau=='') $err .=  "Ban chua chon nhu cau<br>";
    if(!$capcha==$_SESSION["security_code"]) $err .="Mã bảo mật không đúng";
	if ($err=='')
	{
	    $sql = "insert into avd ( name,fullname,mobile,address,email, price, currency, content, adv_cat, nhucau,image, date,upvip, user,city) values ('".$name."','".$fullname."','".$mobile."','".$address."','".$email."','".$price."','".$currency."','".$content."','".$cat."','".$nhucau."','".$img."', '".$date."','".$upvip."', '".$user."', '".$city."')";
		if (mysql_query($sql,$con)) 
		{
		   $newid=mysql_insert_id();
           echo "<script>alert('Đăng tin thành công');window.location='./rao-vat/".doidau(mb_strtolower($name,"UTF-8"))."-vn-".$newid.".html'</script>";
		}	
		else {
			$err =  "Không the dang duoc tin co loi xay ra";
		}
  	}

  	if ($err=='') echo "<script>alert('Đăng tin thành công');window.location='./rao-vat/".doidau(mb_strtolower($name,"UTF-8"))."-vn-".$newid.".html'</script>";
  	else echo "<p align=center class='err'><font color = 'red' size = '3'>".$err."</font></p>";
}
?>
<div class="post_ad">
<h1 class="news_title">Đăng tin rao vặt</h1>
<form name="myform" method="POST" action="" onsubmit="return check()">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
      <tr>
		<td class="td_input">
        <div style="float:left">
		<select name="cat">
        <option value="" selected>== Chọn danh mục ==</option>
	    <?
		$cats=GetListAdv(0);
		foreach ($cats as $cat)
		{
			if ($cat[0]==$cate)
				echo "<option value=".$cat[0]." selected>".$cat[1]."</option>";
			else
				echo "<option value=".$cat[0].">".$cat[1]."</option>";
		}
       ?>		
	</select>
	</div>
        </td>
		</td>
      </tr>
      <tr>
		<td class="td_input">
<select name="city">
        <option value="">== Chọn nơi đăng ==</option>
<option value="0">== Toàn quốc ==</option>
<?php $sql_aj=mysql_query("SELECT * FROM city where parent=0");
while($row_aj=mysql_fetch_array($sql_aj))
{?>
<option value="<?php echo $row_aj['id'];?>"><?php echo $row_aj['name'];?></option>
<?}?>
</select>
<font color="red">*</font>
        </td>
		</td>
      </tr>
       <tr>
		<td class="td_input">
        <select size="1" name="nhucau" >
        <option value="" selected>== Chọn nhu cầu ==</option>
		<option value="0">Cần bán</option>
		<option value="1">Cần mua</option>
		</select>
         <font color="red">*</font>
        </td>
		</td>
      </tr>
      <tr>
		<td class="td_input"><input placeholder="Nhập tiêu đề tin đăng" class="input_name" type="text" name="name" value=""/> <font color="red">*</font></td>
		</td>
      </tr>
      <tr>
		<td class="td_input">
        <input placeholder="Nhập giá bán" style="width: 190px" class="input" type="text" name="price" value=""/>
        </td>
		</td>
      </tr>
      <tr>
      <tr>
		<td class="td_input">
        <div class="box-upload">
          <input class="input" type="file" id="file1" name="file[]" />
       </div>
        </td>
      </tr>
      <tr>
		<td class="td_input"><input placeholder="Họ và tên" class="input_name" type="text" name="fullname" value=""/> <font color="red">*</font></td>
		</td>
      </tr>
      <tr>
		<td class="td_input"><input placeholder="Số điện thoại" class="input_name" type="text" name="mobile" value=""/> <font color="red">*</font></td>
		</td>
      </tr>
      <tr>
		<td class="td_input"><input placeholder="Địa chỉ" class="input_name" type="text" name="address" value=""/> <font color="red">*</font></td>
		</td>
      </tr>
      <tr>
		<td class="td_input"><input placeholder="Email" class="input_name" type="text" name="email" value=""/> <font color="red">*</font></td>
		</td>
      </tr>
      <tr>
		<td class="td_input">
           <textarea cols="40" rows="10" id="noidung" name="noidung" placeholder="Nhập nội dung, email,địa chỉ, điện thoại..."><? echo $row['content']; ?></textarea>
        </td>
		</td>
      </tr>
      <tr>
		<td class="td_input">
        <div style="overflow: hidden;">
        <div style="float: left;">
        <img src="mobile_home/system/views/random_image.php" />
        </div>
        <div style="float: left;padding-left:10px">
        <input placeholder="Nhap ma bao mat ben trai" type="text" value="" name="capcha" id="baomat" autocomplete="off"/>
        <font color="red">*</font>
        </div>
        </div>
        </td>
		</td>
      </tr>
      <tr>
		<td class="td_input">
        <input class="dangtin" type="submit" name="Save" value="Đăng tin"/>
        </td>
		</td>
      </tr>
</table>
</form>
</div>