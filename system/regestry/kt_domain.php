 <?php
 mysql_connect("localhost","shopct16_data","S@2V5Ey@MjzW@1");
 mysql_select_db("shopct16_data");
$domain=$_POST['domain'];

$sql=mysql_query("SELECT domain FROM user_shop where domain='".$domain."' limit 1");
$row=mysql_fetch_assoc($sql);
if($domain==$row['domain']){  // check trong database nếu cần, demo đơn giản chỉ check 1 giá trị 'admin'
    echo 'false';
}
else{
    echo 'true';
} 