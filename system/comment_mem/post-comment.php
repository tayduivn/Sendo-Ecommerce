<?php

include("settings.php"); //FILE WITH IMPORTANT SETTINGS

$id = $_POST["views"]; //ID OF THE CONTENT
$name = $_POST["n"];
$username = $_POST["u"];
$comment = $_POST["c"];
$rate = $_POST["r"];
$user = $_POST["user"];
$dateposted = date("d-m-Y / H:I:s A");
function check($username) {
if (strlen($username) == 0) return false;
if (eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $username)) return true;
return false;
}
function check_comment($comment) {
if (strlen($comment)<10) return false;
return true;
}
function check_comment2($comment) {
if (strlen($comment)>350) return false;
return true;
}

//COUNTS THE NUMBER OF SPACE IN BOTH THE USERNAME AND THE COMMENT
$sc = substr_count($comment, " ");
$su = substr_count($username, " ");
//ONLY POSTS COMMENTS IF BOTH THE USERNAME AND THE COMMENT ARE NOT EMPTY
   if(!check($username))
	    {
			echo "Email này ko hợp lệ";
		}
     elseif($name=='')
     {
      echo 'Bạn chưa nhập tên';
     }
     elseif(!check_comment($comment))
     {
      echo 'Phải lớn hơn 10 ký tự';
     }
     elseif(!check_comment2($comment))
     {
      echo 'Phải Nhỏ hơn 350 ký tự';
     }
     else
     {
     mysql_query("INSERT INTO $comment_table VALUES('','$id','$ip','$name','$username','$comment','$rate','$user','$dateposted')");
     }


?>