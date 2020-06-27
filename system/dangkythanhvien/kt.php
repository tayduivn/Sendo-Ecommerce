 <?php
 mysql_connect("localhost","shopct16_data","S@2V5Ey@MjzW@1");
 mysql_select_db("shopct16_data");
$username=$_POST['username'];
$sql=mysql_query("SELECT user FROM thanhvien where user='".$username."' limit 1");
$row=mysql_fetch_assoc($sql);
if($username==$row['user']){  // check trong database nếu cần, demo đơn giản chỉ check 1 giá trị 'admin'
    echo 'false';
}
else{
    echo 'true';
} 