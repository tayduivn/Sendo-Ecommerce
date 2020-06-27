<?php
require_once('class.phpmailer.php');
$mail             = new PHPMailer();
$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.hangcty.com"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)                                          // 1 = errors and messages                                         // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "mail.hangcty.com"; // sets the SMTP server
$mail->Port       = 25;                    // set the SMTP port for the GMAIL server
$mail->Username   = "support@hangcty.com"; // SMTP account username
$mail->Password   = "quang789";        // SMTP account password

$mail->SetFrom('support@hangcty.com', 'Talat247.com');

$mail->AddReplyTo("support@hangcty.com","Talat247.com");
?>
<div style="display: none;">
<?
function checkdata($checkall=0)
{
	$err="";

	if (strlen(trim($_POST['txtEmail']))<1) $err=$err.'<SCRIPT LANGUAGE="JavaScript">window.alert("Chưa nhập Email")</SCRIPT>';
	if ($checkall==0 && $err) return $err;
	
	if (checkemail(trim($_POST['txtEmail']))==false) $err=$err.'<SCRIPT LANGUAGE="JavaScript">window.alert("Địa chỉ Email không hợp lệ")</SCRIPT>';
	if ($checkall==0 && $err) return $err;
	
	return $err;
}

$err="";
if (isset($_POST['butSub'])) {
	$err=checkdata(0);
	$email=trim($_POST['txtEmail']);
	$capcha = $_POST['txtCaptcha'];
	if($capcha==NULL)
	{
		$err='<SCRIPT LANGUAGE="JavaScript">window.alert("Chưa nhập mã bảo mật")</SCRIPT>';
	}
		if($capcha!==$_SESSION['security_code'])
	{
		$err='<SCRIPT LANGUAGE="JavaScript">window.alert("Mã bảo mật không chính xác")</SCRIPT>';
	}
	if ($err=='')
	{
		$sql = "select * from user_shop where email='".$email."' limit 1";
		$result = mysql_query($sql);
		if (mysql_num_rows($result)>0)
		{
			$cust=mysql_fetch_assoc($result);
$body= "<b>Thông tin đăng nhập tại TALAT247.COM</b><br>Tên đăng nhập:".$cust['user']."<br>Mật khẩu:".$cust['pass']."<br><b>Cảm ơn bạn đã dùng dịch vụ của TALAT247.COM</b>";
$mail->Subject    = "Thông tin đăng nhập talatat247.com";
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
$mail->MsgHTML($body);
$address = $email;
$mail->AddAddress($address, $cust['user']);
if(!$mail->Send()) 
{
  echo "";
} else 
{
  echo "";
}	
echo "<script>window.location='./?home=forgotpass&code=1'</script>";

		}
		else
			$err="&#272;&#7883;a ch&#7881; email không t&#7891;n t&#7841;i";
	}
}

?>
</div>
<!--contener_1_right_top-->
<div>
<div style="float: left;padding-left:10px;"><img src="images/home.jpg"></div>
<div style="float: left;padding-left:10px;line-height:230%"><a href="./index.html">Trang chủ</a> »</div>
<div style="float: left;padding-left:10px;line-height:230%"><a href="./?home=forgotpass">Khôi phục mật khẩu</a></div>
</div>
<div class="space"></div>
<p align="center">
<? echo $err; 
   if ($_REQUEST['code']=='1') echo "&#272;ã g&#7903;i thông tin v&#7873; cho b&#7841;n";
?>
</p>
            <div align="center" style="border:1px solid #C0C0C0">
            <form action="" method="post">
                  <table border="0" style="border-collapse: collapse; line-height: 150%" width="98%" id="table34" cellpadding="0" cellspacing="10">
                    <tr>
                      <td>
                      <div align="center">
                  <table border="0" style="border-collapse: collapse; line-height: 150%" width="600" id="table35" cellpadding="2">
                    <tr>
                                <TD width="106"  align="left">
                               
                                &nbsp;Email c&#7911;a b&#7841;n: 
                                </TD>
                                <TD  width="440">
                                <span>
                                <INPUT class=fieldKey size=39 
                                name=txtEmail value="<? echo $email; ?>"></span></TD>
                    </tr>



                    <tr>
                                <TD width="106"  align="left">
                              
                                &nbsp;Mã xác nhận: 
                                </TD>
                                <TD  width="440">
<span style="float:left"><input type="text" name="txtCaptcha"   style="widht:69px;height:25px" /></span>
<span style="float:left; padding-left:10px"><img src="system/regestry/random_image.php" /></span></TD>
                    </tr>






                    <tr>
                                <TD vAlign=top colSpan=2 height=5 ></TD>
                    </tr>
                    <tr>
                                <TD vAlign=top colSpan=2 height=21 >
                                <HR class=fieldKey SIZE=1>
                                </TD>
                    </tr>
                    <tr>
                                <TD colspan="2">
                                <table border="0" style="border-collapse: collapse" width="100%" id="table36" cellpadding="0">
                                  <tr>
                                    <td>
                                    <p align="center">
                <input type=submit class="buttonorange" name=butSub value="Lấy mật khẩu"></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                  </tr>
                                </table>
              </TD>
                                </tr>
                  </table>
                  </form>
                </div>
                      </td>
                    </tr>
                  </table>
                </div>