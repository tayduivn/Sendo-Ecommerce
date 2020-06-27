<html>
<head>
<title>PHPMailer - Sendmail basic test</title>
</head>
<body>

<?php

require_once('class.phpmailer.php');

$mail             = new PHPMailer(); // defaults to using php "mail()"

$mail->IsSendmail(); // telling the class to use SendMail transport

$body             = "http://shopcantho.vn - Chợ của mọi nhà !";

$mail->SetFrom('shopcantho.vn@gmail.com', 'First Last');

$mail->AddReplyTo("shopcantho.vn@gmail.com","First Last");

$address = "shopcantho.vn@gmail.com";
$mail->AddAddress($address, "John Doe");

$mail->Subject    = "tieu de";

$mail->AltBody    = "xem ngan"; // optional, comment out and test

$mail->MsgHTML($body);

if(!$mail->Send()) {
  echo "";
} else {
  echo "";
}

?>

</body>
</html>
