 


<!---------------------------------MUA LƯỢT UP ----------------------------->
 
 <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6" style=" /* width: 100%; */ padding-right: 0px; padding-left: 0px; ">
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <center><h3 class="box-title"><b>ĐĂNG KÝ ĐIỂM THƯỞNG LỬA ĐỎ</b></h3></center>
            </div>
            <!-- /.box-header -->
<?
if (isset($_POST['add_data'])) {
	date_default_timezone_set("Asia/Ho_Chi_Minh");
$date = date("d-m-Y H:i:s");


	

		
//bắt đầu	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
 

 
 
$diemlua = $_POST['diemlua'];
 


 
 
	
if($_POST['diemlua']>= '2' && $_POST['diemlua'] <= '10' ){	

$chayend = "update user_shop set diemlua = '".$diemlua."'   where user='".$_SESSION['log']."' ";
$thongbao_1thang = "insert into thongbao_shop (thongbao,user,date) values ('Shop đã đăng ký chương trình tặng điểm Lửa cho khách hàng với tỷ lệ <b>$diemlua %</b>/đơn hàng hoàn tất. ','".$_SESSION['log']."','".$date."')";
		if (mysql_query($chayend) && mysql_query($thongbao_1thang)        ){
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Đăng ký thành công. ')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";}	
		else {
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không thành công vui lòng liên hệ trợ giúp')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";} 
		

		}
		else {
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Chỉ cho phép tỷ lệ từ 2% đến 10%  ')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";} 

 	
//kết thúc ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

				
}
			$sql_cat_sub11=mysql_query("SELECT * FROM user_shop where user='".$_SESSION['log']."' ");
$row_cat_sub11=mysql_fetch_assoc($sql_cat_sub11);

?>

<?
if (isset($_POST['add_data_huy'])) {
	date_default_timezone_set("Asia/Ho_Chi_Minh");
$date = date("d-m-Y H:i:s");


	

		
//bắt đầu	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
 

 
 
$diemlua = $_POST['diemlua'];
 


 
 
	


$chayend = "update user_shop set diemlua = ''   where user='".$_SESSION['log']."' ";
$thongbao_1thang = "insert into thongbao_shop (thongbao,user,date) values ('Shop đã hủy chương trình tặng điểm Lửa. ','".$_SESSION['log']."','".$date."')";
		if (mysql_query($chayend) && mysql_query($thongbao_1thang)        ){
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Hủy thành công. ')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";}	
		else {
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không thành công vui lòng liên hệ trợ giúp')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";} 
		

		

 	
//kết thúc ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

				
}
			$sql_cat_sub11=mysql_query("SELECT * FROM user_shop where user='".$_SESSION['log']."' ");
$row_cat_sub11=mysql_fetch_assoc($sql_cat_sub11);

?>
<? echo $err;?>			
			
				  <form  method="POST"    >
              <div class="box-body">
			  
			  
			<?php
if($row_cat_sub11['diemlua']=="")
{?>
Shop chưa đăng ký chương trình tặng điểm Lửa
<?}else{?>
 <b style=" font-size: 12px; ">Shop đang tặng <? echo $row_cat_sub11['diemlua']?>% điểm Lửa Đỏ cho khách hàng với mỗi đơn hàng hoàn tất</b>
<?}?>    
			  
			  

			  
			  
			  
			 <br>
                  <div class="input-group">
				  
                <div class="input-group-btn">
                  <button type="button" class="btn btn-danger">Tỷ lệ điểm thưởng</button>
                </div>
                <!-- /btn-group -->
				
                <input type="number" value="<? echo $row_cat_sub11['diemlua']?>" name="diemlua" class="form-control" placeholder="Nhập tỷ lệ điểm thưởng ...">
              </div>
               
  
			  
 
              </div>
			  
			 <center> <button type="submit" name="add_data" class="btn btn-primary">Đăng ký</button>
			<?php
if($row_cat_sub11['diemlua']=="")
{?>
<?}else{?>
<button type="submit" name="add_data_huy" class="btn btn-primary" onclick="return confirm('Bạn có chắc chắn muốn hủy chương trình ?');" style=" background: #a1b3ad; ">Hủy chương trình</button>					
<?}?>    			

			
			</center>
			    </form>
                 <p class="vat" style=" color: red; ">  <b> Lưu ý: </b></p>
          <p class="vat" style=" color: blue; ">Không bắt buộc Shop phải tham gia chương trình </p>
		  <p class="vat" style=" color: blue; "> Giá trị đơn hàng từ<b> 2% </b> đến <b> 10% </b></p> 
 
          </div>
		
          <!-- /.box -->

          <!-- Form Element sizes -->
          
          <!-- /.box -->

          
          <!-- /.box -->

          <!-- Input addon -->
          
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
 
<!---------------------------------Đăng ký gói 1 - Khởi Nghiệp - END ----------------------------->

<!---------------------------------Đăng ký gói 2  - Phát triển - Start --------------------------/////////////////////////////////////////////////--->
<!---------------------------------Đăng ký gói 2  - Phát triển - Start --------------------------/////////////////////////////////////////////////--->
<!---------------------------------Đăng ký gói 2  - Phát triển - Start --------------------------/////////////////////////////////////////////////--->
<!---------------------------------Đăng ký gói 2  - Phát triển - Start --------------------------/////////////////////////////////////////////////--->
<!---------------------------------Đăng ký gói 2  - Phát triển - Start --------------------------/////////////////////////////////////////////////--->
<!---------------------------------Đăng ký gói 2  - Phát triển - Start --------------------------/////////////////////////////////////////////////--->
<!---------------------------------Đăng ký gói 2  - Phát triển - Start --------------------------/////////////////////////////////////////////////--->
<!---------------------------------Đăng ký gói 2  - Phát triển - Start --------------------------/////////////////////////////////////////////////--->
<!---------------------------------Đăng ký gói 2  - Phát triển - Start --------------------------/////////////////////////////////////////////////--->
<!---------------------------------Đăng ký gói 2  - Phát triển - Start --------------------------/////////////////////////////////////////////////--->
<!---------------------------------Đăng ký gói 2  - Phát triển - Start --------------------------/////////////////////////////////////////////////--->
<!---------------------------------Đăng ký gói 2  - Phát triển - Start --------------------------/////////////////////////////////////////////////--->
<!---------------------------------Đăng ký gói 2  - Phát triển - Start --------------------------/////////////////////////////////////////////////--->
<!---------------------------------Đăng ký gói 2  - Phát triển - Start --------------------------/////////////////////////////////////////////////--->
<!---------------------------------Đăng ký gói 2  - Phát triển - Start --------------------------/////////////////////////////////////////////////--->
<!---------------------------------Đăng ký gói 2  - Phát triển - Start --------------------------/////////////////////////////////////////////////--->
<!---------------------------------Đăng ký gói 2  - Phát triển - Start --------------------------/////////////////////////////////////////////////--->
<!---------------------------------Đăng ký gói 2  - Phát triển - Start --------------------------/////////////////////////////////////////////////--->
<!---------------------------------Đăng ký gói 2  - Phát triển - Start --------------------------/////////////////////////////////////////////////--->
<!---------------------------------Đăng ký gói 2  - Phát triển - Start --------------------------/////////////////////////////////////////////////--->
<!---------------------------------Đăng ký gói 2  - Phát triển - Start --------------------------/////////////////////////////////////////////////--->
<!---------------------------------Đăng ký gói 2  - Phát triển - Start --------------------------/////////////////////////////////////////////////--->
<!---------------------------------Đăng ký gói 2  - Phát triển - Start --------------------------/////////////////////////////////////////////////--->
<!---------------------------------Đăng ký gói 2  - Phát triển - Start --------------------------/////////////////////////////////////////////////--->
<!---------------------------------Đăng ký gói 2  - Phát triển - Start --------------------------/////////////////////////////////////////////////--->
<!---------------------------------Đăng ký gói 2  - Phát triển - Start --------------------------/////////////////////////////////////////////////--->





				

          
 


