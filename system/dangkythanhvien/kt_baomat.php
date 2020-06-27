<?php
session_start();
$baomat=$_POST['baomat'];
if($baomat==$_SESSION["security_code"]){
    echo 'true';
}
else{
    echo 'false';
} 
?>