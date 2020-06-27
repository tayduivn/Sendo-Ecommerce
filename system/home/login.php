<?php
session_start();
$mysql = mysql_connect('localhost', 'shopct16_data', 'S@2V5Ey@MjzW@1') or exit('Couldn\'t connect');
mysql_select_db('shopct16_data', $mysql) or exit('Invalid database');
$_POST['name'] = isset($_POST['name']) && is_string($_POST['name']) ? mysql_real_escape_string($_POST['name'], $mysql) : null;
$passcheck = isset($_POST['pwd']) && is_string($_POST['pwd']) && is_string($_POST['pwd']) ? mysql_real_escape_string($_POST['pwd'], $mysql) : null;
$pass =   ( md5(md5(md5( md5(md5(md5( mysql_real_escape_string($passcheck))))))));
$result = mysql_query(sprintf("SELECT * FROM `thanhvien` WHERE (( `user` = '%s')  AND (`pass` = '%s'))", $_POST['name'], $pass), $mysql) or exit(mysql_error());
if(!mysql_num_rows($result))
echo "Incorrect login details entered";
else {
echo "true";
$row = mysql_fetch_assoc($result);
$_SESSION['mem'] = $row['user'];
$_SESSION['level']=$row['level_shop'];
$_SESSION['email']=$row['email'];
 
}
?>