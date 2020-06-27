 


<!---------------------------------MUA LƯỢT UP ----------------------------->
<?php
if($_REQUEST['soluong']>='500')
{?>
 <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6" style=" /* width: 100%; */ padding-right: 0px; padding-left: 0px; ">
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <center><h3 class="box-title"><b>MUA LƯỢT UP SẢN PHẨM</b></h3></center>
            </div>
            <!-- /.box-header -->
<?
if (isset($_POST['add_data'])) {
	date_default_timezone_set("Asia/Ho_Chi_Minh");
$date = date("d-m-Y H:i:s");


	

		
//bắt đầu	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if($_REQUEST['soluong']>= '500'){	
 

$soluong= $_REQUEST['soluong'];

$tongsoluong = (300 * $_REQUEST['soluong']);
 
$trutien = $tongsoluong;
$trutien_thongbao = number_format(($tongsoluong),0);


$kiemtratien=mysql_query("SELECT * FROM user_shop where user='".$_SESSION['log']."'");
$kiemtratien_in=mysql_fetch_assoc($kiemtratien);	
 
	
if($kiemtratien_in['tien']>= $trutien){	

$chayend = "update user_shop set luotup = luotup + '".$soluong."',tien = tien - '".$trutien."',tongtrumualuotup = tongtrumualuotup + '".$trutien."'   where user='".$_SESSION['log']."' ";
$thongbao_1thang = "insert into thongbao_shop (thongbao,user,date,type) values ('Shop đã mua thành công <b>$soluong</b> lượt UP. ','".$_SESSION['log']."','".$date."','4')";
$lichsugiaodich = "insert into lichsugiaodich (noidung,user,date) values ('Shop bị trừ <b>$trutien_thongbao VNĐ</b> tiền thanh toán cho phí mua <b>$soluong</b> lượt UP. ','".$_SESSION['log']."','".$date."')";
		if (mysql_query($chayend) && mysql_query($thongbao_1thang)  && mysql_query($lichsugiaodich)     ){
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Shop đã mua thành công $soluong lượt UP.Shop bị trừ $trutien_thongbao VNĐ phí thanh toán. ')
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
    window.alert('Không đủ Ngân Sách để thanh toán cho $trutien_thongbao VNĐ mua $soluong lượt UP .Shop vui lòng nạp thêm Ngân sách để tiếp tục mua Lượt UP.Xin cảm ơn quý khách  ')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";} 

}else{
}	
//kết thúc ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

				
}


?>
<? echo $err;?>			
			
				  <form  method="POST"    >
              <div class="box-body">
                  <div class="input-group">
                <span class="input-group-addon" style=" width: 295px; "><b>Số lượng</b></span>
                <input type="number" min="500" name="soluong"  class="form-control"   style=" width: 344px; " value="<? echo $_REQUEST['soluong'];?>"  onchange="this.form.submit()">
              </div>
               <div class="input-group">
                <span class="input-group-addon" style=" width: 295px; "><b>Giá</b></span>
                <input   class="form-control"   style=" width: 344px; " value="<? echo number_format(300,0);?>đ" disabled>
              </div>
  
			   <div class="input-group">
                <span class="input-group-addon" style=" width: 295px; "><b>Tổng thanh toán</b></span>
                <input  class="form-control"   style="width: 344px;color: red;font-weight: bold;"  value="<? echo number_format(300 * $_REQUEST['soluong'],0);?>đ" disabled>
              </div>
 
              </div>
			  
			 <center> <button type="submit" name="add_data" class="btn btn-primary">Mua</button></center>
			    </form>
                 <p class="vat" style=" color: red; ">* Số lượng mua tối thiểu là <b>500 Lượt UP</b></p>
          
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
<?}else{?>
<meta http-equiv="refresh" content="0;">
<?}?>
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





				

          
 


