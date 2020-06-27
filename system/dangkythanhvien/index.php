<style type="text/css">
#wrapper{
    width: 90%;
    margin: 20px auto;
    border: 1px solid #C0C0C0;
}
h3{
    text-align: center;
    color: #0080FF;
    padding-bottom: 5px;
}
h4{
    text-align: center;
    margin: 0px;
	width:170px;
	list-style:none;
	display:none;
}
.show_hiden{
    margin: 5px 10px;
}
.show_hiden .bang{
    display: none;
}
.show_hiden .tr{
	width:170px;
	float:left;
}
.show_hiden .td{
	width:700px
}
.button
{
padding:3px;
background: #000;
color:white;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
}
#fcheck{
    width:510px; margin:auto;
    border:1px solid #ccc;
    background:#FFFCF7; padding:10px;
}
 
.error { color: red; font-size: 14px; }
 
.success { color: #006600; font-size: 13px; }
 
label{ display:block; padding:5px 0px;}
 
h2{width:430px; margin:50px 0px 20px;}
 
.thongbao{margin-top:5px;}
.thongbao1{margin-top:5px;}
.thongbao2{margin-top:5px;}
 
#btn{
    width:90px; padding:6px;
    color:#006600; font-weight:bold;
    margin:10px 0px;
    border:1px solid #999999;
    }
</style>

<script type="text/javascript">
$(function(){
    $('.show_hiden').each(function(){
        $(this).children().click(function(){
            if($(this).hasClass('show')==false){
                $(this).addClass('show').attr('value','Điền thêm thông tin')
            }else{
                $(this).removeClass('show').attr('value','Điền thêm thông tin')
            }
            $(this).next().slideToggle()
        })
    })
})
</script>



<script type="text/javascript">
$(document).ready(function() {
 
    // Sự kiện khi focus vào user_name
    $("#user_name_reg").blur(function() {
       
        if($(this).val() != ''){
            // Gán text cho class thongbao trước khi AJAX response
            $(".thongbao").html('checking username...');
        }
        // Dữ liệu sẽ gởi đi
        var form_data = {action: 'check_user',  user_name: $(this).val()};
       
        $.ajax({
            type: "POST",              // Phương thức gởi đi
            url: "system/dangkythanhvien/check_reg.php",          // File xử lý dữ liệu được gởi
            data: form_data,            // Dữ liệu gởi đến cho url
            success: function(result) { // Hàm chạy khi dữ liệu gởi thành công
                $(".thongbao").html(result);   
            }
        });
       
    });
	
	    // Sự kiện khi focus vào user_name
    $("#email").blur(function() {
       
        if($(this).val() != ''){
            // Gán text cho class thongbao trước khi AJAX response
            $(".thongbao1").html('checking username...');
        }
        // Dữ liệu sẽ gởi đi
        var form_data = {action: 'check_email',  email: $(this).val()};
       
        $.ajax({
            type: "POST",              // Phương thức gởi đi
            url: "system/dangkythanhvien/check_reg.php",          // File xử lý dữ liệu được gởi
            data: form_data,            // Dữ liệu gởi đến cho url
            success: function(result) { // Hàm chạy khi dữ liệu gởi thành công
                $(".thongbao1").html(result);   
            }
        });
       
    });
	    // Sự kiện khi focus vào user_name
    $("#user").blur(function() {
       
        if($(this).val() != ''){
            // Gán text cho class thongbao trước khi AJAX response
            $(".thongbao2").html('checking user...');
        }
        // Dữ liệu sẽ gởi đi
        var form_data = {action: 'check_domain',  user: $(this).val()};
       
        $.ajax({
            type: "POST",              // Phương thức gởi đi
            url: "system/dangkythanhvien/check_reg.php",          // File xử lý dữ liệu được gởi
            data: form_data,            // Dữ liệu gởi đến cho url
            success: function(result) { // Hàm chạy khi dữ liệu gởi thành công
                $(".thongbao2").html(result);   
            }
        });
       
    });
 
});
</script>
<?php
session_start();
$id=$_REQUEST['id'];

function check_email($email) {
if (strlen($email) == 0) return false;
if (eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)) return true;
return false;
}
function check_user($user) {
if (strlen($user)<6||strlen($user)>=18) return false;
if (eregi("^[A-Z0-9]+$", $user)) return true;
return false;
}
function check_phone($phone) {
if (strlen($phone)<10||strlen($phone)>=18) return false;
if (eregi("^[0-9]+$", $phone)) return true;
return false;
}
if(isset($_POST['Save']))
{
$id=$_REQUEST['id'];
$user=addslashes($_POST['user']);
$pass =   ( md5(md5(md5( md5(md5(md5( addslashes($_POST['pass']))))))));
$pass1 =  ( md5(md5(md5( md5(md5(md5( addslashes($_POST['pass1']))))))));
$fullname=addslashes($_POST['fullname']);
$email=addslashes($_POST['email']);
$phone=addslashes($_POST['phone']);
$address=addslashes($_POST['address']);
$company=addslashes($_POST['company']);
$sex=$_POST['sex'];
$noidung=$_POST['noidung'];
$city=$_POST['city'];
if($reg_user=$_POST['reg_user']){$tien = '100000';} else if(($reg_user=(($_POST['reg_user'])))==""){ $tien ='0';}
//$reg_user=$_POST['reg_user'] && (($_POST['reg_user']) =="");
$mieuta=addslashes($_POST['mieuta']);
$day=$_POST['day'];
$month=$_POST['month'];
$year=$_POST['year'];
$brithday=addslashes($day."/".$month."/".$year);
$website=addslashes($_POST['website']);
$level_shop=($_POST['level_shop']!=''?1:3);
$nganhhang=$_POST['nganhhang'];

$template=$_POST['template'];
 if($_POST['domain']=='')
	 {	
		$tenmien==""; 
	 }
		else 
	{
			$tenmien=$_POST['domain'];
	}
//$capcha = $_POST['txtCaptcha'];


if (($_FILES["img"]["type"] != "image/gif") && ($_FILES["img"]["type"] != "") && ($_FILES["img"]["type"] != "image/jpeg")&& ($_FILES["img"]["type"] != "image/pjpeg"))
		{
			$err = 'File không dúng định dạng.';
		}

		else if($_FILES['img']['size'] > 1000000)
		{
			$err = 'Kích cỡ file phải nhỏ hơn hon 1Mb.';
		}
		elseif(!check_user($user))
	    {
			$err="Tên đăng nhập chỉ gồm các ký tự số 0-9 và tiếng việt A-Z không dấu viết liền và lớn hơn 6 ký tự";
		}
		elseif(mysql_num_rows(mysql_query("SELECT user FROM thanhvien WHERE user='$user'"))>0)
	    {
			$err="Username này đã có người dùng, Bạn vui lòng chọn username khác";
		}


		
		


		
	 

		elseif($pass!==$pass1)
	    {
			$err="Mật khẩu không trùng nhau";
		}
		elseif(!check_email($email))
	    {
			$err="Email này ko hợp lệ";
		}
		elseif(mysql_num_rows(mysql_query("SELECT email FROM thanhvien WHERE email='$email'"))>0)
	    {
			$err="Email này đã có người dùng, Bạn vui lòng chọn Email khác";
		}
		
	//	elseif($capcha==NULL)
	  //  {
		//	$err="Chưa nhập mã bảo mật";
		//}
	//	elseif($capcha!==$_SESSION['security_code'])
	  //  {
		//	$err="Không đúng mã bảo mật";
		//}
		else{
		$img=$_FILES['img']['name'];
		$link_img='upload/logo/'.$img;
		$date=date("d/m/Y");
		$date1=date("d/m/Y");
$sql="INSERT INTO thanhvien(user, pass, email)
 values('$user','$pass','$email')";
   $result=mysql_query($sql);


   $_SESSION['dangnhap'] = $dangnhap;
   $_SESSION['matkhau'] = $matkhau;
   $_SESSION['tenmien'] = $tenmien;
   $_SESSION['email'] = $email;
   $_SESSION['dangnhap']=$user;
   $_SESSION['matkhau']=$pass;
   $_SESSION['tenmien']=$domain;
   $_SESSION['email']=$email;
   move_uploaded_file($_FILES['img']['tmp_name'],"upload/logo/".$img);
   if($result)
   {
if (sendmail($adminemail,$email,"Thông tin đăng nhập tại http://15giay.vn/ của bạn","Đăng nhập tại địa chỉ: http://15giay.vn/quantri<br>Tên đăng nhập : ".$user."<br>Mật khẩu : ".$pass."<br>Hỗ trợ kỹ thuật YAHOO CHAT: danastar_vn - Email: hotro@15giay.vn - Điện thoại hỗ trợ: <br>- Tại DN : 0983 055 588 - <br>- Tại HN : 0913 550 669 - <br> - Tại HCM: 0987 428 428 <br>Cảm ơn bạn đã đăng ký và sử dụng dich vụ của http://15giay.vn/ Mọi vướng kỹ thuật trong quá trình sử dụng bạn vui lòng liên hệ với chúng tôi hỗ trợ 24/7"));
$folder="counter/".$user."";
$folder1="thanhvien/".$user;
if(!file_exists($folder))
{
mkdir($folder);
chmod($folder,0777);
}
if(!file_exists($folder1))
{
mkdir($folder1);
chmod($folder1,0777);
}
$path = './thanhvien/';
if(!is_dir($path.$user."/products"))
{
mkdir($path.$user."/products");
chmod($path.$user."/products",0777);
}
if(!is_dir($path.$user."/banner"))
{
mkdir($path.$user."/banner");
chmod($path.$user."/banner",0777);
}
if(!is_dir($path.$user."/link"))
{
mkdir($path.$user."/link");
chmod($path.$user."/link",0777);
}
if(!is_dir($path.$user."/news"))
{
mkdir($path.$user."/news");
chmod($path.$user."/news",0777);
}
if(!is_dir($path.$user."/slider"))
{
mkdir($path.$user."/slider");
chmod($path.$user."/slider",0777);
}
if(!is_dir($path.$user."/adv"))
{
mkdir($path.$user."/adv");
chmod($path.$user."/adv",0777);
}



$file1="ip.txt";
$file2="count.txt";
$file3="online.log";
$gioithieu="gioithieu.var";
$lienhe="lienhe.var";
$bando="bando.var";
$bando="hoidap.var";
if(file_exists($file1))
{
copy($file1,$folder."/".$file1);
chmod($folder."/".$file1,0777);
}
if(file_exists($file2))
{
copy($file2,$folder."/".$file2);
chmod($folder."/".$file2,0777);
}
if(file_exists($file3))
{
copy($file3,$folder."/".$file3);
chmod($folder."/".$file3,0777);
}
if(file_exists($gioithieu))
{
copy($gioithieu,$folder."/".$gioithieu);
chmod($folder."/".$gioithieu,0777);
}
if(file_exists($lienhe))
{
copy($lienhe,$folder."/".$lienhe);
chmod($folder."/".$lienhe,0777);
}
if(file_exists($bando))
{
copy($bando,$folder."/".$bando);
chmod($folder."/".$bando,0777);
}
if(file_exists($hoidap))
{
copy($hoidap,$folder."/".$hoidap);
chmod($folder."/".$hoidap,0777);
}
$newid=mysql_insert_id();
$sql1=mysql_query("INSERT INTO shop_info(user_id) values('".$newid."')");
for($i=1;$i<=5;$i++)
	   {
       $sql2=mysql_query("INSERT INTO menu_left(id_name,user,user_id) values('".$i."','".$user."','".$newid."')");
	   $sql3=mysql_query("INSERT INTO menu_center(id_name,user,user_id) values('".$i."','".$user."','".$newid."')");
	   $sql4=mysql_query("INSERT INTO menu_right(id_name,user,user_id) values('".$i."','".$user."','".$newid."')");
	   }
	 $_SESSION['mem']=$user;
	echo "<script>window.location.href='./index.php?home=dangkythanhvien&alert=1'</script>";

   }else{
	   $err="KO THANH CONG";
   }

   }
  }
?>

<style>
.table
{
	margin-top:0px;
	background-color: #F6F317;
	border:1px solid #c0c0c0;
}
.yeucau
{
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
background-image: url('yeucau.png');
background-color:transparent;
width:200px;
height: 50px;
border-width:0px;
text-align:center;
color:#FFFFFF;
font-size: 25px;
}
/** inputs and textarea**/
#box_reg input:not([type="submit"]), textarea{
border:1px solid #DBDBDB;

-webkit-border-radius:4px;
-moz-border-radius:4px;
border-radius:4px;

-webkit-transition:box-shadow 0.6s linear;
-moz-transition:box-shadow 0.6s linear;
-o-transition:box-shadow 0.6s linear;
transition:box-shadow 0.6s linear;}

#box_reg input:not([type="submit"]):active, textarea:active,
#box_reg input:not([type="submit"]):focus, textarea:focus{
background:#fff;
-webkit-box-shadow:2px 2px 7px #E8E8E8 inset;
-moz-box-shadow:2px 2px 7px #E8E8E8 inset;
box-shadow:2px 2px 7px #E8E8E8 inset;}

#box_reg input:not([type]), input[type="submit"]{cursor:pointer}
#box_reg input:not([type]), input[type="button"]{cursor:pointer}
#box_reg textarea{
min-height:150px;
resize:vertical}

::-webkit-input-placeholder  { 
color:#BABABA; 
font-style:normal;}

#box_reg input:-moz-placeholder,
#box_reg textarea:-moz-placeholder{ 
color:#BABABA;
font-style:normal;} 
#box_reg input:focus
{
background-color:yellow;
}
</style>

<? 	if ($_REQUEST['alert']=='1') { 
	?>


    <div class="d-shoppingcart"  id="divStepSkins">


 <div class="d-shoppingcart-content">
            <p class="p-cart-text bold">ĐĂNG KÝ THÀNH VIÊN THÀNH CÔNG <br>Cám ơn Quý khách đã đăng ký thành viên của ShopCanTho.Vn</p>
            <p  class="p-cart-text bold"><b>Ngay bây giờ Quý khách có thể đăng nhập tài khoản của mình</b></p>
            
        </div>

    </div>

        
        </div>
    
    </div>


	<!--p align="center">Bạn đã đăng ký thành công</p>
	<p>Tên đăng nhập: <? echo $_SESSION['dangnhap'];?></p>
	<p>Mật khẩu: <? echo $_SESSION['matkhau'];?></p>
	<p>Quản trị Website: http://15giay.vn/quantri Hoặc <? echo $_SESSION['tenmien'];?>/quantri</p>
	<p>Website của bạn: http://15giay.vn/<?echo $_SESSION['dangnhap']?> Hoặc <? echo $_SESSION['temien'];?></p>
    <p>1 Email đã được gửi đến Email: <font color="red"><b><? echo $_SESSION['email'];?></b></font> bạn vui lòng kiểm tra mail nếu không thấy bạn vào Mục SPAM xem thư</p>
	<p align="center"><a href='http://15giay.vn/'>Nh&#7845;n &#273;ây &#273;&#7875; tr&#7903; v&#7873; trang chính</a></p-->
<?}	
else{?>
<div id="box_reg">
<form name="mydk" id="form" method="POST" action="" onsubmit="return check_dk()" enctype="multipart/form-data">
<input type=hidden name="home" value="dangkythanhvien">
<input type=hidden name="noidung" value="Chào mừng bạn đã gia nhập <b>Gian Hàng Số</b> bạn được tặng <b>100.000đ</b> vào tài khoản.Chúc bạn thành công và buôn may bán đắt">
<table width="100%" align="left" style="padding-left:20px; font-size:12px;background-color:#FFFFFF">

         


    <div class="d-shoppingcart"  id="divStepSkins">

        <div class="d-step">
            <span class="s-title-step "><img itemprop="logo" alt="TẠO GIAN HÀNG MIỄN PHÍ | Gian hàng trực tuyến, Tạo gian hàng miễn phí, website bán hàng hiệu quả | Web miễn phí " src="/images/dangkythanhvien.png" width="50px"> Đăng ký thành viên</span>
            <div class="d-item-step first">
                <p class="p-step">Bước 2</p>
                <p class="p-text-step">HOÀN TẤT</p>
            </div>
            <div class="d-item-step">
                <p class="p-step">Bước 1</p>
                <p class="p-text-step  selected">NHẬP THÔNG TIN</p>
            </div>
           
        </div>
		
		

<tr><td colspan="2"><font color="red"><b><?echo $err;?></b></font></td></tr>

<tr><td>	
		
		
   <!-- bắt đầu -->

    <div class="d-contain-content">

                <fieldset class="fs-content">
                <legend>&nbsp;&nbsp;&nbsp;Nhập thông tin thành viên</legend>
                <table cellspacing="0" cellpadding="6" border="0" style="width:100%;">
				 <tr>
                        <td style="width:160px;text-align:right;"><b><span class="s-batbuoc">*</span>Tên đăng nhập :</b></td>
						
                        <td>
                            <input type="text" maxlength="30" style="width:350px;" id="user_name_reg" name="user" placeholder="Nhập tên đăng nhập"/>
                          
                            <span class="s-note">Tên đăng nhập có ít nhất có 3 ký tự và chỉ bao gồm các ký tự từ <b>A-z, 0-9</b></span>
                        <div class="thongbao"></div>
						</td>
						
                    </tr>
				
				
                    <tr>
                        <td style="width:160px;text-align:right;"><b><span class="s-batbuoc">*</span>Mật khẩu :</b></td>
                        <td>
                            <input type="password" maxlength="100" style="width:350px;" name="pass" placeholder="Nhập mật khẩu"/>
                            <span class="s_note">Mật khẩu nên có ít nhất 6 ký tự, bao gồm cả ký tự chữ, số, ký tự đặc biệt (@,!,*,^,...)</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:160px;text-align:right;"><b><span class="s-batbuoc">*</span>Nhập lại mật khẩu :</b></td>
                        <td>
                            <input type="password" maxlength="100" style="width:350px;"  name="pass1" placeholder="Nhập lại mật khẩu"/>
							 <span class="s-note">Nhập lại mật khẩu</b></span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:160px;text-align:right;"><b><span class="s-batbuoc">*</span>Email :</b></td>
                        <td>
                            <input type="text" maxlength="100" style="width:350px;" id="email" name="email" placeholder="Nhập địa chỉ Email"/>
							 <span class="s-note">Nhập địa chỉ Email của quý khách</b></span>
							  <div class="thongbao1"></div>
                        </td>
                    </tr>
					 
					</table>
				
				
            <fieldset class="fs-content">
                
                <table cellspacing="0" cellpadding="6" border="0" style="width:100%;">
                    <!--tr>
                        <td style="width:160px;text-align:right;"><b><span class="s-batbuoc">*</span>Họ tên :</b></td>
                        <td>
                            <input type="text" maxlength="70" style="width:350px;"  name="fullname"/>
							 <span class="s-note">Nhập Họ và Tên của quý khách</b></span>
                        </td>
                    </tr-->
                   
                   
                  
                   
                   
                   
					
                        
					
                   
					
                    
                        <td style="width: 160px; text-align: right;">
                            
                        </td>
                   
                   
                    <!--tr>
                        <td style="width:160px;text-align:right;">&nbsp;</td>
                        <td>
                            <a href="javascript:DangKyGianHang();" title="Đăng ký gian hàng" class="btn large" style="width:100px;">ĐĂNG KÝ</a>
                        </td>
                    </tr-->
					<tr><td align="center" colspan="2">
<input type="submit" name="Save" class="btndk"  value="Đăng ký">
</td></tr>
                </table>
            </fieldset>
        </div>                       
                
    </div>

   

<!--
<tr><td colspan="2" align="center" height="10"></td></tr>
<tr><td colspan="2"><font color="red"><b><?echo $err;?></b></font></td></tr>
<tr><td colspan="2" height="10"></td></tr>
<tr><td>
Tên đăng nhập:<font color="red"><b>*</b></font></td><td> 
 <input type="text" style="width:240px" name="user" id="user_name_reg" autocomplete="off" value="<? echo $user;?>"><b>.shopcantho.vn</b>
    <div class="thongbao"></div>
</td></tr>
<tr><td>
Mật khẩu:<font color="red"><b>*</b></font>  </td><td>                 
<input type="password" style="width:340px" name="pass">
</td></tr>
<tr><td>
Nhập lại mật khẩu:<font color="red"><b>*</b></font>  </td><td>                 
<input type="password" style="width:340px" name="pass1">
</td></tr>
<tr><td>
Họ tên:<font color="red"><b>*</b></font> </td><td>              
 <input type="text" style="width:340px" name="fullname" value="<? echo $fullname;?>">
</td></tr>
<tr><td>
Email:<font color="red"><b>*</b></font>   </td><td>
 <input type="text" style="width:340px" name="email" id="email" autocomplete="off" value="<? echo $email;?>">
 <div class="thongbao1"></div>
</td></tr>
<tr><td>
Điện thoại:<font color="red"><b>*</b></font></td><td> 
  <input type="text" style="width:340px" name="phone" value="<? echo $phone;?>">
</td></tr>
<tr><td>
Địa chỉ:<font color="red"><b>*</b></font></td><td> 
  <input type="text" style="width:340px" name="address" value="<? echo $address;?>">
</td></tr>
 <tr><td>
Giới tính: </td><td>
  <select name="sex">
  <option value="0">Nam</option>
  <option value="1">Nữ</option>
						   </select>

                            
							</td></tr>
<tr><td>
Ngày sinh: </td><td>
    <select name="day">
  <option value="26">Chọn ngày</option>
  <?for($i=1;$i<=31;$i++)
	{?>
	<option value="<? if(strlen($i)<2){?>0<? echo $i;?><?}else{?><? echo $i;?><?}?>"><? if(strlen($i)<2){?>0<? echo $i;?><?}else{?><? echo $i;?><?}?></option>
	<?}?>
  </select>
    <select name="month">
  <option value="03">Chọn Tháng</option>
  <?for($i=1;$i<=12;$i++)
	{?>
	<option value="<? if(strlen($i)<2){?>0<? echo $i;?><?}else{?><? echo $i;?><?}?>"><? if(strlen($i)<2){?>0<? echo $i;?><?}else{?><? echo $i;?><?}?></option>
	<?}?>
  </select>
  <select name="year">
  <option value="1986">Chọn năm</option>
  <?for($i=1940;$i<=2012;$i++)
	{?>
	<option value="<? echo $i;?>"><? echo $i;?></option>
	<?}?>
  </select>
</td></tr>


<tr><td>
</td><td>
<a href="./?home=goiweb" target="_blank"><font color="red"><b>Lợi ích khi là thành viên VIP</b></font></a>
							</td></tr>
<tr>
<td colspan="2">
<div id="wrapper">
    <div class="show_hiden">
        <span class="tr">Đăng ký Shop VIP</span>
		<span class="td"> 
		<input name="level_shop" class="button" type="checkbox" value="1" />
		</span>
        <div class="bang"><br>
     <span class="tr">Tên gian hàng: <font color="red"><b>*</b></font></span> <span class="td">
	 <input type="text" style="width:340px" name="mieuta" value="<? echo $mieuta;?>"></span><br><br>
		 <span class="tr">Ngành hàng: <font color="red"><b>*</b></font></span> <span class="td"> 
        <select size="1" name="nganhhang">
<?
		$cats=GetListCat(17);
		foreach ($cats as $cat)
		{
			if ($cat[0]==$parent)
				echo "<option value=".$cat[0]." selected>".$cat[1]."</option>";
			else
				echo "<option value=".$cat[0].">".$cat[1]."</option>";
		}
?>		
		</select>
	</span><br><br>

	<span class="tr">
        Mẫu Template số:</span> 
  <span class="td"> 
  <input type="text" style="width:196px" name="template" value="<? echo $id;?>">
  <input type="button" name="opener" value="Chọn mẫu từ thư viện" onClick="popUp();">
<?php $sqlf=mysql_query("SELECT * FROM template order by id DESC");
while($rowf=mysql_fetch_array($sqlf))
{?>
 <input type="hidden" value="<?php echo $rowf['id'];?>" name="myselect" onChange="selectItem();" id="id<?php echo $rowf['id'];?>">
 <?}?>
</span><br><br>

	 <span class="tr">Quốc gia/TP: <font color="red"><b>*</b></font></span> 
	 <span class="td">  <select name="city">
  <? $sql1=mysql_query("SELECT * FROM city");
  while($row1=mysql_fetch_array($sql1))
  {?>
                           <option value="<? echo $row1['id'];?>"><? echo $row1['name'];?></option>
<?}?>
						   </select>
						   
	</span><br><br>

	 <span class="tr">Tên công ty: <font color="red"><b>*</b></font></span> <span class="td">
	 <input type="text" style="width:340px" name="company" value="<? echo $company;?>"></span><br><br>
	 <span class="tr">Website:</span> <span class="td">
	 <input type="text" style="width:340px" name="website" value="<? echo $website;?>">
	 </span><br><br>
	<span class="tr">Logo:</span> <span class="td"><input type="file" name="img" size="45" /></span><br><br>
        </div>
    </div>
</div>
</td>
</tr>
<tr>
<td width="177">Mã xác nhận:<font color="red"><b>*</b></font></td>
<td>
<span style="float:left"><input type="text" name="txtCaptcha" style="widht:60px;height:20px" /></span>
<span style="float:left; padding-left:10px"><img src="random_image.php" /></span>
</td>
</tr>
<tr><td align="center" colspan="2" style="padding:20px;">
<input type="checkbox" value="1" name="dongy"> Tôi đồng ý với thỏa thuận sử dụng
</td></tr>
<tr><td align="center" colspan="2">
<input type="submit" name="Save" class="dangky" onMouseOver="this.className='dangkyover'" onMouseOut="this.className='dangky'" value="Đăng ký">
</td></tr-->
</table>
</form>
</div>
<script language="JavaScript">

function selectItem(){
	var select_options=document.mydk.myselect;
	var len=select_options.length;
	var selindex=0;
	for (var i=0;i<len;i++){
		if (select_options[i].checked) {selindex=select_options[i].value;}
	}
	if (selindex!=0) {document.mydk.template.value=selindex;}
}

var wi=null;
function popUp(){
   if (wi) wi.close();
   wi=window.open("system/dangkythanhvien/popup.php","","width=890,height=500,location=yes,scrollbars=yes,status=yes");
}

</script>
<?}?>