<?php
if(isSet($_GET['currency']))
{
$currency = $_GET['currency'];
 
// register the session and set the cookie
$_SESSION['currency'] = $currency;
 
setcookie('currency', $currency, time() + (3600 * 24 * 30));
}
else if(isSet($_SESSION['currency']))
{
$currency= $_SESSION['currency'];
}
else if(isSet($_COOKIE['currency']))
{
$currency = $_COOKIE['currency'];
}
else
{
$currency = '1';
}
$sql_currency=@mysql_query("SELECT * FROM currency where id='".$currency."' ");
$row_currency=@mysql_fetch_assoc($sql_currency); 
switch ($currency) {
  case $row_currency['id']:
    $tien=$row_currency['conver'];
	$ma_tien=$row_currency['code'];
  break;
 
  default:
    $tien=1;
	$ma_tien="VNĐ";
 
}
?>