<?php

include("settings.php"); //FILE WITH IMPORTANT SETTINGS

$comment_id = $_POST["comment_id"];

//CHECKS IF THE COMMENT STILL EXISTS IN THE DATABASE
$q =  mysql_query("SELECT * FROM $comment_table WHERE comment_id='$comment_id' AND ip='$ip'");
$n = mysql_num_rows($q);

//IF SO, THE COMMENT WILL BE DELETED
if($n){
    mysql_query("DELETE FROM $comment_table WHERE comment_id='$comment_id' AND ip='$ip'");
} else {
    echo 'Error deleting comment';
}

?>