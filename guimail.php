<?php
mysql_connect("localhost","root","") or die("Khong the ket noi co so du lieu.");
mysql_select_db("gianhang");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="rao vat bac ninh, mua ban bac ninh, rao vat bat dong san bac ninh, laptop bac ninh, may tinh bac ninh, oto xe may bac ninh, dien thoai bac ninh"/>
    <meta name="keywords" content="rao vat bac ninh, mua ban bac ninh, rao vat bat dong san bac ninh,dien thoai bac ninh "/>
    <meta name="copyright" content="Copyright (C)  www.15giay.vn" />
    <meta name="geo.placename" content="VIET NAM" />
    <meta name="geo.position" content="15;107" />
    <meta name="geo.region" content="VIET NAM" />
    <meta name="googlebot" content="rao vat bac ninh, mua ban bac ninh, rao vat bat dong san bac ninh, laptop bac ninh, may tinh bac ninh, oto xe may bac ninh, dien thoai bac ninh" />
    <meta name="google-site-verification" content="cAvIF8_ffkn3qz5E38vNiYNw3xytW3a2973zErL27sw" />
    <meta name="msvalidate.01" content="6809E834503111E0DE41656FE9C7C147" />
<meta name="eclick_verify" content="56b46133-92e5441c-ff72f0b9-6ecaf4b6" />
<meta property="og:title" content="Cho quoc te, mang thuong mai dien tu " />
<meta property="og:description" content="rao vat bac ninh, mua ban bac ninh, rao vat bat dong san bac ninh, laptop bac ninh, may tinh bac ninh, oto xe may bac ninh, dien thoai bac ninh" />
<meta property="og:image" content="http://15giay.vn/images/qc2.jpg"/>
<meta property="og:url" content="http://localhost/" />
    <title>...</title>
</head>
<body>
<?php
require_once('class.phpmailer.php');
$mail             = new PHPMailer();
$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "smtp.gmail.com"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)                                          // 1 = errors and messages                                         // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "smtp.gmail.com"; // sets the SMTP server
$mail->Port       = 465;                    // set the SMTP port for the GMAIL server
$mail->Username   = "shopcantho.vn@gmail.com"; // SMTP account username
$mail->Password   = "";        // SMTP account password

$mail->SetFrom('shopcantho.vn@gmail.com', 'shopcantho.vn');

$mail->AddReplyTo("shopcantho.vn@gmail.com","shopcantho.vn");
?>
<?php
$sql=mysql_query("SELECT * FROM user_shop order by id ASC");
while($row=mysql_fetch_array($sql))
{?>
<?php
$body= "<b>Thông tin khuyến mại</b><br>Chào:".$row['user']."<br>Sàn thương mại điện tử 15giay.vn gửi đến các thành viên chương trình khuyến mại giảm giá đăng banner và sản phẩm<br><b></b><br><b></b><br><b>Mọi chi tiết xin liên hệ:</b><br><b>Phone: 0983 055 588</b><br><b>Email: hotro@15giay.vn</b><br><b>Yhaoo: danastar_vn</b>";
$mail->Subject    = "Khuyen mai phi tao gian hang cho thanh vien 15giay.vn";
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
$mail->MsgHTML($body);
$address = $row['email'];
$mail->AddAddress($address, $row['user']);
if(!$mail->Send()) 
{
  echo "";
} else 
{
  echo "Da gui den email:".$row['email'];
}
?>
<?}?>
</body>
</html>
