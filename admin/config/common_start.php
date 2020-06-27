<?
error_reporting(0);

if(!session_id()) session_start();

include("inc/function.php");

$con=@mysql_connect($serverdb, $userdb, $passdb) or die("Khong the ket noi co so du lieu.");
mysql_select_db($namedb);
	mysql_set_charset('latin1',$con);
?>