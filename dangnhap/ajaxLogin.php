<?php
include("db.php");
session_start();
if(isSet($_POST['username']) && isSet($_POST['password']))
{
// username and password sent from Form
$username=mysqli_real_escape_string($db,$_POST['username']); 
$password=(mysqli_real_escape_string($db,$_POST['password'])); 
$passadd =   ( md5(md5(md5( md5(md5(md5( addslashes($password))))))));

$result=mysqli_query($db,"SELECT * FROM thanhvien WHERE user='$username' and pass='$passadd'");
$count=mysqli_num_rows($result);

$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1)
{
$_SESSION['mem']=$row['user'];
echo $row['user'];
}

}
?>