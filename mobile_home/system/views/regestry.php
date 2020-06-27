<?php
session_start();
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
function check_pass($pass) {
if (strlen($pass)<6) return false;
return true;
}
function check_phone($phone) {
if (strlen($phone)<8||strlen($phone)>=18) return false;
if (eregi("^[0-9]+$", $phone)) return true;
return false;
}
function check_fullname($fullname) {
if (strlen(trim($fullname))<3) return false;
return true;
}
function check_company($company) {
if (strlen(trim($company))<3) return false;
return true;
}
function check_nganhhang($nganhhang) {
if (strlen(trim($nganhhang))==0) return false;
return true;
}
if(isset($_POST['Save']))
{
$user= strtolower(addslashes($_POST['user']));
$pass=addslashes($_POST['pass']);
$pass1=addslashes($_POST['pass1']);
$fullname=addslashes($_POST['fullname']);
$email=addslashes($_POST['email']);
$phone=addslashes($_POST['phone']);
$address=addslashes($_POST['address']);
$company=addslashes($_POST['company']);
$sex=$_POST['sex'];
$city=$_POST['city'];
$mieuta=addslashes($_POST['mieuta']);
$day=$_POST['day'];
$month=$_POST['month'];
$year=$_POST['year'];
$brithday=strtotime(str_replace("/","-",addslashes($day."/".$month."/".$year)));
$website=addslashes($_POST['website']);
$level_shop=1;

$random_template=mysql_fetch_assoc(mysql_query("SELECT id FROM template ORDER BY RAND() LIMIT 1"));
if($_REQUEST['id']=='')
{
$template=$random_template['id'];
}
else
{
	$template=$_REQUEST['id'];
}
if($_REQUEST['ref']=='')
{
$reg_user="";
}
else
{
	$reg_user=$_REQUEST['ref'];
}
$nganhhang=$_POST['nganhhang'];
$sql_reg=@mysql_query("SELECT * FROM user_shop where user='".$reg_user."' ");
$row_reg=@mysql_fetch_assoc($sql_reg);
$congtien=$row_reg['currency']+300000;
 if($_POST['domain']=='')
	 {	
		$tenmien==""; 
	 }
		else 
	{
			$tenmien=$_POST['domain'];
	}
$capcha = $_POST['txtCaptcha'];
if (($_FILES["img"]["type"] != "image/gif") && ($_FILES["img"]["type"] != "") && ($_FILES["img"]["type"] != "image/jpeg")&& ($_FILES["img"]["type"] != "image/pjpeg") && ($_FILES["img"]["type"] != "image/png"))
		{
			$err .= "Không đúng định dạng file";
		}
		else if($_FILES['img']['size'] > 100000)
		{
			$err .= "Kích thước nhỏ hơn 1mb";
		}
		elseif(!check_user($user))
	    {
			$err.="Tên đăng nhập gồm các ký từ a-z,0-9 và lớn hơn 6 ký tự";
		}
		elseif(mysql_num_rows(mysql_query("SELECT user FROM user_shop WHERE user='$user'"))>0)
	    {
			$err .="Tên này đã có người dùng";
		}
		elseif(!check_pass($pass))
	    {
			$err .="Mật khẩu lớn hơn 6 ký tự";
		}

		elseif($pass!==$pass1)
	    {
			$err .="Mật khẩu không trùng nhau";
		}
		elseif(!check_fullname($fullname))
	    {
			$err .="Họ tên lớn hơn 3 ký tự";
		}
		elseif(!check_email($email))
	    {
			$err .="Email không hợp lệ";
		}
		elseif(mysql_num_rows(mysql_query("SELECT email FROM user_shop WHERE email='$email'"))>0)
	    {
			$err.="Email đã được đăng ký";
		}
		elseif(!check_phone($phone))
	    {
			$err.="Số điện thoại là các số lớn hơn 8 số và nhỏ hơn 18 số";
		}
		elseif(!check_company($company))
	    {
			$err.="Tên công ty lớn hơn 3 ký tự";
		}
		elseif(!check_nganhhang($nganhhang))
	    {
			$err.="Bạn chưa chọn ngành nghề";
		}
		elseif($capcha==NULL)
	    {
			$err.="Bạn chưa nhập mã bảo mật";
		}
		elseif($capcha!==$_SESSION['security_code'])
	    {
			$err.="Mã bảo mật không đúng";
		}
		else{
		
		if ($_FILES["img"]["type"] == "")
		{
		$link_img = "upload/default/logo_member.jpg";
		}
		else
		{
		$img=$_FILES['img']['name'];
		$link_img="upload/logo/".$user.$img;
		}
		
		$date=date("d-m-Y");
		
		 //Cộng thêm 12 tháng        
    $end_time = strtotime(date("d-m-Y", $date) . " +12 month");
    
  
		
$sql="INSERT INTO user_shop(user, pass, fullname, email, phone, address, company, sex, city, mieuta, logo, template, re_time,pay_time,end_time,level_shop,brithday,website,currency,reg_user,cat_mem,domain,title,description,keywords)
 values('$user','$pass','$fullname','$email','$phone','$address','$company',
'$sex','$city','$mieuta','$link_img','$template','$date','$date','$end_time','$level_shop','$brithday','$website','100000','".$row_reg['user']."','$nganhhang','$tenmien','$company','$company','$company')";
   $result=mysql_query($sql);
   mysql_query("UPDATE user_shop SET currency='".$congtien."' where user='".$row_reg['user']."' ");
   $_SESSION['dangnhap']=$user;
   $_SESSION['matkhau']=$pass;
   $_SESSION['tenmien']=$domain;
   $_SESSION['email']=$email;
   move_uploaded_file($_FILES['img']['tmp_name'],"upload/logo/".$user.$img);
   if($result)
   {   
   
if (sendmail($adminemail,$email,$regestry['send_alert'],$regestry['send_alert1']."<br>".$regestry['send_alert2']." : ".$user."<br>".$regestry['send_alert3']." : ".$pass."<br>".$regestry['send_alert4']."<br>".$regestry['send_alert5'].""));
   //begin gui mail
require("class.phpmailer.php"); // nạp thư viện
$mailer = new PHPMailer(); // khởi tạo đối tượng
$mailer->IsSMTP(); // gọi class smtp để đăng nhập
$mailer->CharSet="utf-8"; // bảng mã unicode
$mailer->Host ='localhost'; // địa chỉ server smtp

// Đăng nhập SMTP
$mailer->SMTPAuth = true; // gửi thông tin đăng nhập
$mailer->Username = 'support@hangcty.com'; // tên đăng nhập
$mailer->Password = 'quang789'; // mật khẩu

// Chuẩn bị gửi thư nào
$mailer->FromName = 'Admin 15giay.vn'; // tên người gửi
$mailer->From = 'support@hangcty.com'; // mail người gửi
$mailer->AddAddress($email,$user); //thêm mail người nhận
$mailer->Subject = "Thong tin dang ky thanh vien";
$mailer->IsHTML(true); //Bật HTML không thích thì false
// Nội dung lá thư
$mailer->Body = "Thông tin đăng ký thành viên<br>Tên đăng nhập: ".$user."<br>Mật khẩu: ".$pass."<br>Đăng nhập: http://15giay.vn/quantri<br>Cảm ơn bạn đã sử dụng dịch vụ";

// Gửi email

$mailer->Send();
   //end gui mail
  
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
if(!is_dir($path.$user."/company"))
{
mkdir($path.$user."/company");
chmod($path.$user."/company",0777);
}
if(!is_dir($path.$user."/job"))
{
mkdir($path.$user."/job");
chmod($path.$user."/job",0777);
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
	 
	 
	echo "<script>window.location='./Default.aspx?home=regestry&confim=confim&alert=1'</script>";
   }else{
	   $err="DO NOT SUCCESSFULL";
   }

   }
  }
?>
<?echo $row_reg['user'];?>
<form class="form" method="post" action="" id="form1">
<? 	if ($_REQUEST['alert']=='1') { 
	?>
<div style="background:#FFFFFF;padding:20px;border:1px solid #C0C0C0;overflow:hidden">
	<p align="center" style="color:red"><b><u>Bạn đã đăng ký thành công</u></b></p>
	<p>Tên đăng nhập: <? echo $_SESSION['dangnhap'];?></p>
	<p>Mật khẩu: <? echo $_SESSION['matkhau'];?></p>
	<p>Trang web: <a target = "_blank" href="http://www.<?echo $_SESSION['dangnhap'];?>.15giay.vn"><font size = "3" color="blue"><b> http://www.<?echo $_SESSION['dangnhap'];?>.15giay.vn</b></font></a></p>
    <p>Quản trị: <a target="_blank" href="http://15giay.vn/quantri"> <font size = "3" color="blue"><b>http://15giay.vn/quantri</b></font></a></p>
	<p>1 email đã gửi vào mail <font color="black"><b><i><? echo $_SESSION['email'];?></i></b></font></p>
	<p align="center"><a href='./index.html'>Về trang chủ</a></p>
</div>
<?}	
else
{?>
<script type="text/javascript">
//<![CDATA[
var theForm = document.forms['form1'];
if (!theForm) {
    theForm = document.form1;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.__EVENTTARGET.value = eventTarget;
        theForm.__EVENTARGUMENT.value = eventArgument;
        theForm.submit();
    }
}
//]]>
</script>
<input type=hidden name="home" value="regestry">
<input type=hidden name="confim" value="confim">
        
        <div class="wrapper" id="wrapper-content">
            <div id="step1" class="stepReg">
                <div class="stepReg-title">
                    
                    <h1>Đăng ký thành viên/Shop</h1>
                    <h2>Bạn cần điền đủ thông tin</h2>
                    <p style="color: red;"><?php echo $err;?></p>                   
                </div>
                <div class="stepReg-form">
                    <table class="tableSimple" cellpadding="1" cellspacing="0">
                        <tbody><tr style="">
                            <td class="tdTextBox" colspan="2">
                                <input name="company" type="text" value="<?php echo $company;?>" maxlength="100" id="txtCompany" placeholder="Tên công ty">
                            </td>
                        </tr>
                        <tr>
                            <td class="tdTextBox" colspan="2">
                                <input name="fullname" type="text" value="<?php echo $fullname;?>" maxlength="100" id="txtName" placeholder="Họ và tên">
                            </td>
                        </tr>
                        <tr>
                            <td class="value" colspan="2">
                                <select name="nganhhang" id="ddlSkinCat">
	<option value="-1">- Chọn ngành nghề -</option>
       <?php $sql_nganh=@mysql_query("SELECT * FROM cat where parent=17  order by thutu");
		while($row_nganh=@mysql_fetch_array($sql_nganh))
		{?>
		   <?php if ($row_nganh['id']==$nganhhang)
			{?>
            <option value="<?php echo $row_nganh['id'];?>" selected><?php echo $row_nganh['name'];?></option>
			<?}else{?>
			<option value="<?php echo $row_nganh['id'];?>"><?php echo $row_nganh['name'];?></option>
			<?}?>
			<?php $sql_nganh_con=@mysql_query("SELECT * FROM cat where parent='".$row_nganh['id']."'  order by thutu");
			
			?>
		<?}?>	

</select>
                                <div class="text-tips">
                                    Hãy chọn đúng ngành nghề để bán hàng hiệu quả
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="tdTextBox" colspan="2">
                                <input name="email" type="text" <?php echo $email;?> maxlength="255" id="txtRegEmail" placeholder="Email">
                            </td>
                        </tr>
                        <tr>
                            <td class="tdTextBox" colspan="2">
                                <input name="phone" type="text" <?php echo $phone;?> maxlength="15" id="txtPhone" placeholder="Điện thoại" pattern="\d*" onkeypress="javascript:return keypress(event);">
                            </td>
                        </tr>
                        <tr>
                            <td class="tdTextBox" colspan="2">
                                <input name="address" type="text" maxlength="100" id="txtAddress" placeholder="Địa chỉ">
                            </td>
                        </tr>
                        <tr>
                            <td class="tdTextBox">
                                <input name="user" type="text" maxlength="30" id="txtWebsite" placeholder="Tên đăng nhập">
                            </td>
                            <td style="width: 150px; text-align: left;">
                                <div class="text-tips">.15giay.vn</div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="text-tips">
                                    Bạn có thể sử dụng tên miền riêng sau khi tạo website
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="tdTextBox" colspan="2">
                                <input name="pass" type="password" maxlength="255" id="txtPassword" placeholder="Mật khẩu">
                            </td>
                        </tr>
                        <tr>
                            <td class="tdTextBox" colspan="2">
                                <input name="pass1" type="password" maxlength="255" id="txtComfPassword" placeholder="Nhập lại mật khẩu">
                            </td>
                        </tr>
                        <tr>
                            <td id="khungcapcha" class="tdTextBox" colspan="2">
                                <input name="txtCaptcha" type="text" maxlength="10" id="txtMangaunhien" placeholder="Mã xác nhận">
                            </td>
                        </tr>
                        <tr>
                            <td class="tdCapcha" colspan="2">
                                <table cellpadding="0" cellspacing="0">
                                    <tbody><tr>
                                        <td>
                                            <img src="system/regestry/random_image.php" />
                                        </td>
                                        <td style="padding: 2px 0 0 10px;">
                                        </td>
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                        <tr>
                            <td class="td-register-button" colspan="2">
                                <input name="Save" type="submit" id="reg-button" href="javascript:;" onclick="return CheckRegFormSimple();" value="Đăng ký"/>
                            </td>
                        </tr>
                    </tbody></table>
                </div>
            </div>
        </div>
        
        <script type="text/javascript">
            var PROGRESS_BAR = "#progressBar";
            var MINIMUM_WAITING_SECONDS = 12;
            var WaitingSeconds = 0;
            var IsCreateSiteCompleted = false;          

            function progressBar(percent) {
                if (!IsCreateSiteCompleted) {
                    if (percent == 5) {
                        $j('#progress-1').fadeIn(1000);
                    }

                    if (percent == 35) {
                        $j('#progress-1').fadeOut(1000);
                        $j('#progress-2').fadeIn(1000);
                    }

                    if (percent == 65) {
                        $j('#progress-2').fadeOut(1000);
                        $j('#progress-3').fadeIn(1000);
                    }

                    var progressBarWidth = percent * $j(PROGRESS_BAR).width() / 100;
                    $j(PROGRESS_BAR).find('div').animate({ width: progressBarWidth }, 500).html(percent + "%&nbsp;");
                }
            }

            function progressBarCompleted() {
                IsCreateSiteCompleted = true;
                $j('#progress-1').fadeOut(500);
                $j('#progress-2').fadeOut(500);
                $j('#progress-3').fadeOut(500);
                $j('#progress-4').fadeIn(500);

                var progressBarWidth = 100 * $j(PROGRESS_BAR).width() / 100;
                $j(PROGRESS_BAR).find('div').animate({ width: progressBarWidth }, 100).html("100%&nbsp;");
            }

            function shownRegButton() {
                $j('#reg-button').css("background", "");
                $j('#reg-button').css("color", "#FFF");
                $j('#reg-button').css("text-align", "center");
                $j('#reg-button').text("Tạo website của tôi");
                $j('#reg-button').attr("onclick", "return CheckRegFormSimple();");
            }
            function shownLoadingButton() {
                $j('#reg-button').css("background", "url('/Images/v4/ajax-loader.gif') no-repeat scroll center #2194D2");
                $j('#reg-button').css("color", "#2194D2");
                $j('#reg-button').css("text-align", "left");
                $j('#reg-button').text("B");
                $j('#reg-button').attr("onclick", "");
            }

            function startWaitingTimer() {
                setInterval(function () { waitingTimer() }, 1000);
            }

            function waitingTimer() {
                WaitingSeconds++;
            }

            function getWaitingTimeLeft() {
                var waitingTimeLeft = 0

                if (WaitingSeconds < MINIMUM_WAITING_SECONDS) {
                    waitingTimeLeft = (MINIMUM_WAITING_SECONDS - WaitingSeconds) * 1000
                }

                return waitingTimeLeft;
            }

            function getUserName() {
                var username = '', gclid = '', utm_source = '';
                var query = window.location.search.substring(1);
                var vars = query.split("&");
                for (var i = 0; i < vars.length; i++) {
                    var pair = vars[i].split("=");
                    if (pair[0] == "kd") { username = pair[1]; }
                    if (pair[0] == "gclid") { gclid = pair[1]; }
                    if (pair[0] == "utm_source") { utm_source = pair[1]; }
                }
                if (username != '') setCookie("kd", username, 1);
                else
                    if (getCookie("kd") != null) { username = getCookie('kd'); }
                if (gclid == '' && utm_source == '') {
                    if (username != '') return username;
                }
                return '-1';
            }
            function getRefer() {
                var ref = '';
                var query = window.location.search.substring(1);
                var vars = query.split("&");
                for (var i = 0; i < vars.length; i++) {
                    var pair = vars[i].split("=");
                    if (pair[0] == "ref") { ref = pair[1]; }
                }
                if (ref != '') setCookie("ref", ref, 1);
                else
                    if (getCookie("ref") != null) { ref = getCookie('ref'); }
                if (ref != '') return ref;
                return '';
            }
            function getSaleId() {
                var query = parent.location.search.substring(1);
                var vars = query.split("&");
                for (var i = 0; i < vars.length; i++) {
                    var pair = vars[i].split("=");
                    if (pair[0] == "sid") { return pair[1]; }
                }
                return -1;
            }
            function resetCapcha() {
                $j.post("/Handlers/CreateCaptcha.ashx", { type: '' },
                    function (result) {
                        $j('#imgMaNgaunhien').attr("src", result);
                        console.log('');
                    }
        );
            }
            $j(function () {
                resetCapcha();
                $j('a#resetCapcha').click(function () {
                    resetCapcha();
                });
            });
            function g(x) {
                return document.getElementById(x);
            }
            function validText(input) {
                var chars = "!#$%^&*()+=-[]\\\;'/{}|\":<>?";
                for (var i = 0; i < $j(input).length; i++) {
                    if (chars.indexOf($j(input).val().charAt(i)) != -1) {
                        alert("Ký tự nhập vào không hợp lệ.");
                        $j(input).focus();
                        return false;
                    }
                }
                return true;
            }
            function CloseFormSimple() {
                parent.location = "http://www.bizweb.vn";
            }
            function checkValidName(input) {
                var re = /^[0-9a-zA-Z\-]+$/g;
                if (!re.test(input)) {
                    alert("Tên miền chỉ bao gồm các ký tự A-Z, 0-9 và dấu trừ (-)");
                    return false;
                }
                if (input.indexOf('www') != -1) {
                    alert("Tên miền không bao gồm cụm ký tự www");
                    return false;
                }
                var begin = input.substring(0, 1);
                if (begin == '-') {
                    alert("Tên miền chỉ bắt đầu bằng các ký tự a-z, 0-9");
                    return false;
                }
                return true;
            }

            function CheckRegFormSimple() {
                var fullname = g("txtName");
                var regEmail = g("txtRegEmail");
                var phone = g("txtPhone");
                var company = g("txtCompany");
                var address = g("txtAddress");
                var website = g("txtWebsite");
                var capcha = g("txtMangaunhien");
                var password = g("txtPassword");
                var comfpassword = g("txtComfPassword");
                var industry = g("ddlSkinCat");
                var skinId = g("hdfSkinId");
                var confirm = g("cbConfirm");
                emailRegExp = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

                if (!company.value.trim()) {
                    alert("Mời nhập tên doanh nghiệp/cửa hàng !");
                    company.value = "";
                    company.focus();
                    return false;
                }
                else {
                    if (validText(company) == false) { return false; }
                }
                if (!fullname.value.trim()) {
                    alert("Mời nhập tên của bạn.");
                    fullname.value = "";
                    fullname.focus();
                    return false;
                }
                else {
                    if (validText(fullname) == false) { return false; }
                }
                if (industry.value == -1) {
                    alert("Bạn phải chọn lĩnh vực kinh doanh !");
                    industry.focus();
                    return false;
                }
                if (!regEmail.value) {
                    alert("Mời nhập email !");
                    regEmail.focus();
                    return false;
                }
                else {
                    if (!emailRegExp.test(regEmail.value)) {
                        alert("Bạn hãy nhập đúng định dạng email !");
                        regEmail.focus();
                        return false;
                    }
                }
                if (!phone.value) {
                    alert("Mời nhập số điện thoại.");
                    phone.focus();
                    return false;
                }
                else if (phone.value.length < 8) {
                    alert("Số điện thoại cần nhập ít nhất 8 ký tự.");
                    phone.focus();
                    return false;
                }
                if (!address.value.trim()) {
                    alert("Mời nhập địa chỉ !");
                    address.value = "";
                    address.focus();
                    return false;
                }
                else {
                    if (validText(address) == false) { return false; }
                }
                if (!website.value) {
                    alert("Mời nhập địa chỉ website !");
                    website.focus();
                    return false;
                }
                else {
                    if (website.value.length < 3 || website.value.length > 50) {
                        alert("Địa chỉ website không đúng định dạng !");
                        website.focus();
                        return false;
                    }
                    /*var re = /^[0-9a-z\-]+$/g;
                    if (!re.test(website.value)) {
                        alert("Tên miền chỉ bao gồm các ký tự A-Z, 0-9 và dấu trừ (-)");
                        website.focus();
                        return false;
                    }*/
                    if (checkValidName(website.value) == false) {
                        website.focus();
                        return false;
                    }
                }
                if (!password.value) {
                    alert("Mời bạn nhập password !");
                    password.focus();
                    return false;
                }
                else {
                    if (password.value.length < 6) {
                        alert("Password phải lớn hơn hoặc bằng 6 ký tự");
                        password.focus();
                        return false;
                    }
                }
                if (!comfpassword.value) {
                    alert("Mời bạn nhập lại password !");
                    comfpassword.focus();
                    return false;
                }
                if (password.value != comfpassword.value) {
                    alert("Password phải trùng nhau.");
                    password.focus();
                    return false;
                }
                if (!confirm.checked) {
                    alert("Bạn chưa đồng ý với quy định sử dụng của Bizweb !");
                    website.focus();
                    return false;
                }
                if (!capcha.value) {
                    alert("Bạn hãy nhập mã an toàn !");
                    capcha.focus();
                    return false;
                }
                $j('span.reEmail').html(regEmail.value);

                shownLoadingButton();

                $j.post("/WebPages/RegWebsite.aspx", {
                    type: 'reg',
                    fullname: fullname.value,
                    email: regEmail.value,
                    phone: phone.value,
                    company: company.value,
                    address: address.value,
                    website: website.value.toLowerCase(),
                    capcha: capcha.value,
                    password: password.value,
                    Industry: industry.options[industry.selectedIndex].text,
                    skinId: skinId.value,
                    saleId: getUserName(),
                    ref: getRefer()
                },
                function (result) {
                    if (result == "ERROR_CAPCHA") {
                        alert("Mã xác nhận không hợp lệ.");
                        resetCapcha();

                        shownRegButton();
                    } else if (result == "ERROR_EXISTS") {
                        alert("Tên miền này đã được sử dụng. Xin mời chọn tên miền khác.");
                        resetCapcha();

                        shownRegButton();
                    }
                    else {
                        console.log(result);
                        $j("#fancy_overlay").unbind("click", $j.fn.fancybox.close);
                        $j("#step2").show();
                        $j('#fancy_close').remove();
                        $j.post("/WebPages/RegWebsite.aspx", {
                            type: 'active',
                            pass: password.value,
                            code: result
                        },
                        function (resultActive) {
                            if (resultActive == "ERROR_NONE") {
                                alert("Hiện hệ thống đang gặp trục trặc mong bạn tạo site vào một thời điểm khác !");

                                shownRegButton();
                            }
                            else if (resultActive == "ERROR_ACTIVE") {
                                var waitingTimeLeft = getWaitingTimeLeft();
                                window.setTimeout(function () {
                                    progressBarCompleted();

                                    window.setTimeout(function () {
                                        $j('#linkWebsite').attr("href", "http://" + website.value + ".bizwebvietnam.com/index.aspx?token=" + resultActive);
                                        $j('#linkAdmin').attr("href", "http://" + website.value + ".bizwebvietnam.com/admin.aspx?module=dashboard&token=" + resultActive);
                                        $j("#step2").delay(500).hide(400);
                                        //window.location = "http://www.bizweb.vn/completed.html?siteId=0&siteName=" + website.value + "&token=" + resultActive;
                                        window.location = "/SiteRegistration_Mobile.aspx?step=completed&website=" + website.value + "&token=" + resultActive;
                                    }, 1500);
                                }, waitingTimeLeft);
                            }
                            else {                 
                                var waitingTimeLeft = getWaitingTimeLeft();
                                window.setTimeout(function () {
                                    progressBarCompleted();

                                    window.setTimeout(function () {
                                        $j('#linkWebsite').attr("href", "http://" + website.value + ".bizwebvietnam.com/index.aspx?token=" + resultActive);
                                        $j('#linkAdmin').attr("href", "http://" + website.value + ".bizwebvietnam.com/admin.aspx?module=dashboard&token=" + resultActive);
                                        $j("#step2").delay(500).hide(400);
                                        //window.location = "http://www.bizweb.vn/completed.html?siteId=0&siteName=" + website.value + "&token=" + resultActive;
                                        window.location = "/SiteRegistration_Mobile.aspx?step=completed&website=" + website.value + "&token=" + resultActive;
                                    }, 1500);
                                }, waitingTimeLeft);
                            }
                        });

                        startWaitingTimer();
                        progressBar(5);

                        window.setTimeout(function () { progressBar(15); }, 2000);
                        window.setTimeout(function () { progressBar(28); }, 4000);
                        window.setTimeout(function () { progressBar(35); }, 5000);

                        window.setTimeout(function () { progressBar(45); }, 6500);
                        window.setTimeout(function () { progressBar(55); }, 8500);
                        window.setTimeout(function () { progressBar(65); }, 10000);

                        window.setTimeout(function () { progressBar(80); }, 12000);
                        window.setTimeout(function () { progressBar(90); }, 15000);
                    }
                });

                return true;
            }
        </script>
        

<script type="text/javascript">
//<![CDATA[
WebForm_AutoFocus('txtCompany');//]]>
</script>
<?}?>
</form>