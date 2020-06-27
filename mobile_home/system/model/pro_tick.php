<?php
session_start();
$id= $_GET['views'];
if($id != "") //  Neu co id truy cap vao

{

if(isset($_SESSION['giohang'][$id]))

{

// Tang s? lu?ng nó lên n?u dã có id s?n ph?m dó trong gi? hàng

$_SESSION['giohang'][$id];

}

else // N?u chua có thì thêm m?i vào

{
$_SESSION['giohang'][$id] = $id; // S? lu?ng m?c d?nh là 1

}
}

else

{

}

?>
<?php
$giohang = $_SESSION['giohang'];
?>