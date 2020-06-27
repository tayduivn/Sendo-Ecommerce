<style>
.khungtimkiem
{
	
	background: #fafafa; 
  height: 50px;   
  overflow: hidden; 
  border-bottom: 1px solid #d7d7d7;
  transition: all 0.25s ease 0s;
   border-top:1px solid #e7e7e7 ;
}
.khungtimkiem:hover
{
	            background: white none repeat scroll 0 0 !important;
            border-color: transparent;
            box-shadow: 0 0 5px 1px #bcbcbc;

}

</style>

<?php
session_start();
	if(isset($_GET['data'])){
		$data = $_GET['data'];
		$con = mysqli_connect("localhost","root","pass","data");
		@mysqli_query($con,'set character set "latin1"'); 
		// Kiểm tra kết nối
		if (mysqli_connect_errno()){
			echo "Lỗi kết nối: " . mysqli_connect_error();
			
		}
		
		$sql = "SELECT * FROM products WHERE  status ='0' and name LIKE '%$data%' or code LIKE '%$data%' or tukhoaseo LIKE '%$data%' or tieudeseo LIKE '%$data%' or motaseo LIKE '%$data%' or price_special LIKE '%$data%' or user LIKE '%$data%' or date LIKE '%$data%' or company LIKE '%$data%' or phone LIKE '%$data%' or address LIKE '%$data%'   order by uptop DESC limit 100 ";
		$result = @mysqli_query($con, $sql);
		while($row = @mysqli_fetch_array($result,MYSQLI_ASSOC)){
	
			
			echo  "<a id='xemsanpham' href='./$row[name]-pro-$row[id].html' ><div class='khungtimkiem'>
			<img style='padding: 5px; padding-left: 7px;' src='$row[image]' width='40' height='40' '>
			<a style='padding: 13px; '  id='xemsanpham' href='./$row[name]-pro-$row[id].html'>$row[name]</a>" ;
            echo number_format($row['price_special'])."đ</br></div></a>";
		}
		//Đóng kết nối
		mysqli_close($con);
		
	}
?>