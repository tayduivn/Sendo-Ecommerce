<?php
if($_REQUEST['home']=='adv')
{?>
<?php include("mobile_home/system/home/cat_adv.php");?>
<?}elseif($_REQUEST['home']=='job')
{?>
<?php include("mobile_home/system/home/cat_job.php");?>
<?}elseif($_REQUEST['home']=='news')
{?>
<?php include("mobile_home/system/home/cat_news.php");?>
<?}elseif($_REQUEST['home']=='help')
{?>
<?php include("mobile_home/system/home/cat_help.php");?>
<?}else{?>
<?php include("mobile_home/system/home/cat_pro.php");?>
<?}?>