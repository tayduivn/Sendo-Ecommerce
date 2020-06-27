<?if($_REQUEST['quantri']=='')
{?>
<?require("system/model/config.php")?>
<?require("system/model/common_start.php")?>
<?require("system/model/function.php")?>
<?include("system/model/tiengviet.php");?>
<?
$user=$_GET['user'];
$sql=mysql_query("SELECT * FROM user_shop where user='".$user."'");
$row=mysql_fetch_assoc($sql);
$sql7=mysql_query("SELECT * FROM template where id='".$row['template']."'");
$row7=mysql_fetch_assoc($sql7);
$tem=$row7['folder'];
?>
<?if($row['template']=='0')
{?>
<?require("template/mobile/index.php")?>
<?} else{?>
<?include($tem);?>
<?}?>
<?require("system/model/common_end.php")?>

<?}else{?>
<?require("quantri/dangnhap.php")?>
<?}?>