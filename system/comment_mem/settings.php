<?php

//MODIFY TO YOUR OWN SETTINGS

//CONNECTS TO YOUR DATABASE
mysql_connect("localhost", "", "");
mysql_select_db("=");

//TABLES FOR THE CONTENT AND THE COMMENTS (MODIFY IF TABLE NAMES ARE DIFFERENT)
$comment_table = 'comment';

$ip = $_SERVER["REMOTE_ADDR"]; //IP ADDRESS

?>