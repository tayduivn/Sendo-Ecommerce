 <?php
 mysql_connect("localhost","shopct16_data","S@2V5Ey@MjzW@1");
 mysql_select_db("shopct16_data");
$email=$_POST['email'];
$sql=mysql_query("SELECT email FROM user_shop where email='".$email."' limit 1");
$row=mysql_fetch_assoc($sql);
if($email==$row['email']){  // check trong database nếu cần, demo đơn giản chỉ check 1 giá trị 'admin'
    echo 'false';
}
else{
    echo 'true';
} 