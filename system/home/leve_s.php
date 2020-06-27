<?php
//neu tồn tại biến term từ gửi sang
if(isset($_GET['term']))
{
    //lay từ khóa cần tìm kiếm
    $key = $_GET['term'];
    
    //cau hinh thong tin ket noi CSDL
   //Kết nối tới csdl
    $conn = mysql_connect("localhost", "root", "pass") or die("can't connect database");
    //Lựa chọn csdl và cho phép hiển thị mã utf8
    mysql_select_db("data",$conn);
    mysql_query("SET NAMES 'latin1'");
    
    //cau lenh truy van tim kiem voi tu khoa
    $req = "SELECT * "."FROM products "."WHERE name LIKE '%" . $key . "%' or code LIKE '%" . $key . "%' or tukhoaseo LIKE '%" . $key . "%'  or tieudeseo LIKE '%" . $key . "%' or motaseo LIKE '%" . $key . "%' or price_special LIKE '%" . $key . "%' or short LIKE '%" . $key . "%' or user LIKE '%" . $key . "%' or date LIKE '%" . $key . "%' or company LIKE '%" . $key . "%' or phone LIKE '%" . $key . "%' or address LIKE '%" . $key . "%'    order by uptop DESC limit 10    ";
    
    $query = mysql_query($req);
    
    while ($row = mysql_fetch_array($query)) {
        $results[] = array('label' => $row['name']);

    }
    //trả về dữ liệu dạng json
    echo json_encode($results);
	

	

}
