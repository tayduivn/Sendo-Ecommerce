<?php
//  Include file kết nối Database
include_once ('dbcon.php');            

// Kiểm tra dữ liệu đầu vào có tồn tại hay không
if(isset($_GET['keyword'])){        
    $keyword =     trim($_GET['keyword']) ;        // Cắt bỏ khoảng trắng
    $keyword = mysqli_real_escape_string($dbc, $keyword);    // Lọc các ký tự đặc biệt

    // Câu query lấy dữ liệu
    $query = "select title, description, link from news_search where title like '%$keyword%' or description like '%$keyword%'";

    // Kết nối Database, thực hiện câu truy vấn
    $result = mysqli_query($dbc,$query);

    // Kiểm tra kết quả trả về có hay không ?
    if($result){
        // Kiểm tra có dòng record nào hay không?
        if(mysqli_affected_rows($dbc)!=0){  
            // Hiển thị dữ liệu
            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            echo '<p class="title"><a href="'.%24row%5B'link'%5D.'" target="_blank"><b>'.$row['title'].'</b></a><br>'.$row['description'] .'</p>'   ;
        }
        }else {
            echo 'Không có kết quả nào cho từ khóa :"'.$_GET['keyword'].'"';
        }
    }
}else {
    echo 'Không có từ khóa nào được gởi đến.';
}
?>