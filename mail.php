<html>
<head>
<title>PHPMailer - Mail() advanced test</title>
</head>
<body>

<?php
require_once('class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();

$body             = "shopcantho.vn day ne";

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "smtp.gmail.com"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "smtp.gmail.com"; // sets the SMTP server
$mail->Port       = 465;                    // set the SMTP port for the GMAIL server
$mail->Username   = "shopcantho.vn@gmail.com"; // SMTP account username
$mail->Password   = "";        // SMTP account password

$mail->SetFrom('shopcantho.vn@gmail.com', 'First Last');

$mail->AddReplyTo("shopcantho.vn@gmail.com","First Last");

$mail->Subject    = "PHPMailer Test Subject via smtp, basic with authentication";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$address = "shopcantho.vn@gmail.com";
$mail->AddAddress($address, "John Doe");

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}
    
?>
</body>
</html>
