<?php
mysql_connect("localhost","","");
mysql_select_db("");?>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<?php
function check_user($user) {
if (strlen($user)<6||strlen($user)>=18) return false;
if (eregi("^[A-Z0-9]+$", $user)) return true;
return false;
}
$action = $_POST['action']; // Lấy giá trị action
if(!empty($_POST['user_name']) && $action == 'check_user')
{
    // Lấy giá trị user_name
    $user = $_POST['user_name'];
   
    // Chuyển giá trị user_name thành chữ thường & gọi hàm kiểm tra
    username_exist(strtolower($user));
}
 
function username_exist($user)
{
	$sql=mysql_query("SELECT * FROM user_shop where user='".$user."' ");
    // Mảng giá trị user_name đã tồn tại
	$row=mysql_fetch_assoc($sql);
	$user_arr = array($row['user']);

    // Kiểm tra user_name mình nhập vào có nằm trong mảng đó hay không?
    // User_name thuộc 1 giá trị trong mảng => user_name tồn tại
    if(in_array($user, $user_arr))
    {
        echo "<span class=\"error\"><strong>{$user}</strong> đã tồn tại, Vui lòng chọn tên khác</span>";
    }
    elseif(!check_user($user))
	    {
		   	$err="Tên đăng nhập chỉ gồm các ký tự số 0-9 và tiếng việt A-Z không dấu viết liền và lớn hơn 6 ký tự";
      echo "<span class=\"error\"> Tên đăng nhập chỉ gồm các ký tự số 0-9 và tiếng việt A-Z không dấu viết liền và lớn hơn 6 ký tự</span>";
		  } 
    else // Ngược lại user_name Ko tồn tại
    {
        echo "<span class=\"success\"><strong>{$user}</strong> có thể đăng ký</span>".$row['user'];   
    }
}


if(!empty($_POST['email']) && $action == 'check_email')
{
    // Lấy giá trị user_name
    $email = $_POST['email'];
   
    // Chuyển giá trị user_name thành chữ thường & gọi hàm kiểm tra
    email_exist(strtolower($email));
}
 
function check_email1($email) {
if (strlen($email) == 0) return false;
if (eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)) return true;
return false;
}
function email_exist($email)
{
	$sql=mysql_query("SELECT * FROM user_shop where email='".$email."' ");
    // Mảng giá trị user_name đã tồn tại
	$row=mysql_fetch_assoc($sql);
	$email_arr = array($row['email']);

    // Kiểm tra user_name mình nhập vào có nằm trong mảng đó hay không?
    // User_name thuộc 1 giá trị trong mảng => user_name tồn tại
    if(in_array($email, $email_arr))
    {
        echo "<span class=\"error\"><strong>{$email}</strong> đã tồn tại, Vui lòng chọn Email khác</span>";
    }
    elseif(!check_email1($email))
	    {
			$err="Email này ko hợp lệ";
            echo "<span class=\"error\">Email này ko hợp lệ</span>";
		}
    else // Ngược lại user_name Ko tồn tại
    {
        echo "<span class=\"success\"><strong>{$email}</strong> có thể đăng ký</span>";   
    }
}
// bat dau'






if(!empty($_POST['user']) && $action == 'check_domain')
{
    // Lấy giá trị user_name
    $tenmien = $_POST['user'];
   
    // Chuyển giá trị user_name thành chữ thường & gọi hàm kiểm tra
    domain_exist(strtolower($tenmien));
}
 
function domain_exist($tenmien)
{
	$sql=mysql_query("SELECT * FROM user_shop where user='".$tenmien."' ");
    // Mảng giá trị user_name đã tồn tại
	$row=mysql_fetch_assoc($sql);
	$domain_arr = array($row['user']);

    // Kiểm tra user_name mình nhập vào có nằm trong mảng đó hay không?
    // User_name thuộc 1 giá trị trong mảng => user_name tồn tại
    if(in_array($tenmien, $domain_arr))
    {
        echo "<span class=\"success\" >Mã khuyến mãi: <strong>{$tenmien}</strong> chính xác.Chúc mừng bạn đã nhận được 100.000 VNĐ</span>";
    }
    else // Ngược lại user_name Ko tồn tại sau
    {
        echo "<span class=\"error\">Mã khuyến mãi: <strong>{$tenmien}</strong> không tồn tại trên hệ thống, bạn vui lòng kiểm tra lại (Chú ý: Mã Khuyến Mãi viết liền không dấu)</span>";   
    }
}
?>