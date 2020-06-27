 


<!---------------------------------Đăng ký gói 1 - Khởi Nghiệp - Start ----------------------------->
<?php
if($_REQUEST['active']=='1')
{?>
 <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6" style=" /* width: 100%; */ padding-right: 0px; padding-left: 0px; ">
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Đăng ký gói dịch vụ <b style=" color: #4CAF50; "><i class="fa fa-fw fa-hourglass"></i>Khởi Nghiệp</b></h3>
            </div>
            <!-- /.box-header -->
			 <?php
if($_REQUEST['soluonggoi']>='2')
{?>

<?
if (isset($_POST['add_data'])) {
	date_default_timezone_set("Asia/Ho_Chi_Minh");
$thangcongend = 0;
$ngayend = date('d');
$thangend = date('m');
$namend = date('Y');
$thangend += $thangcongend;
while($thangend>12){
if($thangend > 12)
{
$thangend -= 12;
$namend ++;
}}
$date = $ngayend.'-'.$thangend.'-'.$namend; 


	

		
//bắt đầu gói 2 tháng	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if($_REQUEST['soluonggoi']== '2'){	
$thangcong = 2;
$ngay = date('d');
$thang = date('m');
$nam = date('Y');
$thang += $thangcong;
while($thang>12){
if($thang > 12)
{
$thang -= 12;
$nam ++;
}}
$langaygi = $ngay.'-'.$thang.'-'.$nam; 

$tongsoluong = (300000 * $_REQUEST['soluonggoi']);
 
$trutien = $tongsoluong;
$trutien_thongbao = number_format(($tongsoluong),0);


$kiemtratien=mysql_query("SELECT * FROM user_shop where user='".$_SESSION['log']."'");
$kiemtratien_in=mysql_fetch_assoc($kiemtratien);	
 
	
if($kiemtratien_in['tien']>= '600000'){	

$add_goidichvu1 = "insert into dangkydichvu (id_goidichvu,user_shop,date,thoigian) values ('1','".$_SESSION['log']."','".$date."','".$_REQUEST['soluonggoi']."')";
$chayend = "update user_shop set goidichvu = '1',goidichvu_batdau='".$date."', goidichvu_ketthuc = '".$langaygi."',luotup = luotup + '500',tien = tien - '".$trutien."' ,tongtrudichvu = tongtrudichvu + '".$trutien."'  where user='".$_SESSION['log']."' ";
$chay_uptop = "update products set uptop = uptop + '100'  where user='".$_SESSION['log']."' ";
$chay_quangcaoxuhuongtop = "update dangkydichvu set gia='300000',tongthanhtoan='".$trutien."', qc_xuhuongtop = '1',qc_khuyenmaitop = '1'  where user_shop='".$_SESSION['log']."' and id_goidichvu ='1' and thoigian ='2' ";
$thongbao_1thang = "insert into thongbao_shop (thongbao,user,date) values ('Shop đã đăng ký thành công gói dịch vụ Khởi Nghiệp với thời gian 2 tháng từ ngày <b>$date</b> đến <b>$langaygi</b>. ','".$_SESSION['log']."','".$date."')";
$lichsugiaodich = "insert into lichsugiaodich (noidung,user,date) values ('Shop bị trừ <b>$trutien_thongbao VNĐ</b> tiền thanh toán cho đăng ký gói dịch vụ Khởi Nghiệp thời gian 2 tháng. ','".$_SESSION['log']."','".$date."')";
		if (mysql_query($add_goidichvu1) && mysql_query($chayend) && mysql_query($chay_uptop) && mysql_query($chay_quangcaoxuhuongtop)  && mysql_query($thongbao_1thang)   && mysql_query($lichsugiaodich)              ){
		echo "<SCRIPT LANGUAGE='JavaScript'>
 
    window.location.href='index1.php?act=dangkydichvu_reg&thongbao=1_2';
    </SCRIPT>";}	
		else {
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không thành công vui lòng liên hệ trợ giúp')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";} 
		 }
		else {
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không đủ Ngân Sách để thanh toán cho gói Dịch Vụ Khởi Nghiệp thời gian 2 tháng.Shop vui lòng nạp thêm Ngân sách để tiếp tục đăng ký dịch vụ.Xin cảm ơn quý khách  ')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";} 

}else{
}	
//kết thúc gói 2 tháng	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//gói 3 tháng

if($_REQUEST['soluonggoi']== '3'){	
$thangcong = 3;
$ngay = date('d');
$thang = date('m');
$nam = date('Y');
$thang += $thangcong;
while($thang>12){
if($thang > 12)
{
$thang -= 12;
$nam ++;
}}
$langaygi = $ngay.'-'.$thang.'-'.$nam; 

$tongsoluong = (300000 * $_REQUEST['soluonggoi']);

$sotiengiam = ($tongsoluong)/20;
$trutien = ($tongsoluong) - ($sotiengiam);

$trutien_thongbao = number_format(($tongsoluong +$vat) - ($sotiengiam));


$kiemtratien=mysql_query("SELECT * FROM user_shop where user='".$_SESSION['log']."'");
$kiemtratien_in=mysql_fetch_assoc($kiemtratien);	
 
	
if($kiemtratien_in['tien']>= '850500'){	

$add_goidichvu1 = "insert into dangkydichvu (id_goidichvu,user_shop,date,thoigian) values ('1','".$_SESSION['log']."','".$date."','".$_REQUEST['soluonggoi']."')";
$chayend = "update user_shop set goidichvu = '1',goidichvu_batdau='".$date."', goidichvu_ketthuc = '".$langaygi."',luotup = luotup + '800',tien = tien - '".$trutien."',tongtrudichvu = tongtrudichvu + '".$trutien."'   where user='".$_SESSION['log']."' ";
$chay_uptop = "update products set uptop = uptop + '200'  where user='".$_SESSION['log']."' ";
$chay_quangcaoxuhuongtop = "update dangkydichvu set gia='300000',giam='".$sotiengiam."',tongthanhtoan='".$trutien."', qc_xuhuongtop = '1',qc_khuyenmaitop = '1'  where user_shop='".$_SESSION['log']."' and id_goidichvu ='1' and thoigian ='3' ";
 
$thongbao_1thang = "insert into thongbao_shop (thongbao,user,date) values ('Shop đã đăng ký thành công gói dịch vụ Khởi Nghiệp với thời gian 3 tháng từ ngày <b>$date</b> đến <b>$langaygi</b>. ','".$_SESSION['log']."','".$date."')";
$lichsugiaodich = "insert into lichsugiaodich (noidung,user,date) values ('Shop bị trừ <b>$trutien_thongbao VNĐ</b> tiền thanh toán cho đăng ký gói dịch vụ Khởi Nghiệp thời gian 3 tháng. ','".$_SESSION['log']."','".$date."')";
		if (mysql_query($add_goidichvu1) && mysql_query($chayend) && mysql_query($chay_uptop) && mysql_query($chay_quangcaoxuhuongtop)  && mysql_query($thongbao_1thang)   && mysql_query($lichsugiaodich)              ){
		echo "<SCRIPT LANGUAGE='JavaScript'>
 
    window.location.href='index1.php?act=dangkydichvu_reg&thongbao=1_3';
    </SCRIPT>";}	
		else {
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không thành công vui lòng liên hệ trợ giúp')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";} 
		 }	
		else {
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không đủ Ngân Sách để thanh toán cho gói Dịch Vụ Khởi Nghiệp thời gian 3 tháng.Shop vui lòng nạp thêm Ngân sách để tiếp tục đăng ký dịch vụ.Xin cảm ơn quý khách  ')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";}	
 
}else{
}	
//kết thúc gói 3 tháng	


//gói 6 tháng/////////////////////////////////////////////////////////////////////

if($_REQUEST['soluonggoi']== '6'){	
$thangcong = 6;
$ngay = date('d');
$thang = date('m');
$nam = date('Y');
$thang += $thangcong;
while($thang>12){
if($thang > 12)
{
$thang -= 12;
$nam ++;
}}
$langaygi = $ngay.'-'.$thang.'-'.$nam; 

$tongsoluong = (300000 * $_REQUEST['soluonggoi']);

$sotiengiam = ($tongsoluong)/10;
$trutien = ($tongsoluong) - ($sotiengiam);

$trutien_thongbao = number_format(($tongsoluong) - ($sotiengiam));

 


$kiemtratien=mysql_query("SELECT * FROM user_shop where user='".$_SESSION['log']."'");
$kiemtratien_in=mysql_fetch_assoc($kiemtratien);	
 
	
if($kiemtratien_in['tien']>= '1602000'){	

$add_goidichvu1 = "insert into dangkydichvu (id_goidichvu,user_shop,date,thoigian) values ('1','".$_SESSION['log']."','".$date."','".$_REQUEST['soluonggoi']."')";
$chayend = "update user_shop set goidichvu = '1',goidichvu_batdau='".$date."', goidichvu_ketthuc = '".$langaygi."',luotup = luotup + '1500',tien = tien - '".$trutien."',tongtrudichvu = tongtrudichvu + '".$trutien."'   where user='".$_SESSION['log']."' ";
$chay_uptop = "update products set uptop = uptop + '300'  where user='".$_SESSION['log']."' ";
$chay_quangcaoxuhuongtop = "update dangkydichvu set gia='300000',giam='".$sotiengiam."',tongthanhtoan='".$trutien."', qc_xuhuongtop = '1',qc_khuyenmaitop = '1'  where user_shop='".$_SESSION['log']."' and id_goidichvu ='1' and thoigian ='6' ";
 
$thongbao_1thang = "insert into thongbao_shop (thongbao,user,date) values ('Shop đã đăng ký thành công gói dịch vụ Khởi Nghiệp với thời gian 6 tháng từ ngày <b>$date</b> đến <b>$langaygi</b>. ','".$_SESSION['log']."','".$date."')";
$lichsugiaodich = "insert into lichsugiaodich (noidung,user,date) values ('Shop bị trừ <b>$trutien_thongbao VNĐ</b> tiền thanh toán cho đăng ký gói dịch vụ Khởi Nghiệp thời gian 6 tháng. ','".$_SESSION['log']."','".$date."')";
		if (mysql_query($add_goidichvu1) && mysql_query($chayend) && mysql_query($chay_uptop) && mysql_query($chay_quangcaoxuhuongtop)  && mysql_query($thongbao_1thang)   && mysql_query($lichsugiaodich)              ){
		echo "<SCRIPT LANGUAGE='JavaScript'>
 
    window.location.href='index1.php?act=dangkydichvu_reg&thongbao=1_6';
    </SCRIPT>";}	
		else {
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không thành công vui lòng liên hệ trợ giúp')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";} 
		 }	
		else {
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không đủ Ngân Sách để thanh toán cho gói Dịch Vụ Khởi Nghiệp thời gian 6 tháng.Shop vui lòng nạp thêm Ngân sách để tiếp tục đăng ký dịch vụ.Xin cảm ơn quý khách  ')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";}	
 
}else{
}	
//kết thúc gói 6 tháng	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//gói 12 tháng/////////////////////////////////////////////////////////////////////

if($_REQUEST['soluonggoi']== '12'){	
$thangcong = 12;
$ngay = date('d');
$thang = date('m');
$nam = date('Y');
$thang += $thangcong;
while($thang>12){
if($thang > 12)
{
$thang -= 12;
$nam ++;
}}
$langaygi = $ngay.'-'.$thang.'-'.$nam; 

$tongsoluong = (300000 * $_REQUEST['soluonggoi']);
$vat = ($tongsoluong/10);
$sotiengiam = ($tongsoluong)/5;
$trutien = ($tongsoluong) - ($sotiengiam);

$trutien_thongbao = number_format(($tongsoluong) - ($sotiengiam));


$kiemtratien=mysql_query("SELECT * FROM user_shop where user='".$_SESSION['log']."'");
$kiemtratien_in=mysql_fetch_assoc($kiemtratien);	
 
	
if($kiemtratien_in['tien']>= '2880000'){	

$add_goidichvu1 = "insert into dangkydichvu (id_goidichvu,user_shop,date,thoigian) values ('1','".$_SESSION['log']."','".$date."','".$_REQUEST['soluonggoi']."')";
$chayend = "update user_shop set goidichvu = '1',goidichvu_batdau='".$date."', goidichvu_ketthuc = '".$langaygi."',luotup = luotup + '3000',tien = tien - '".$trutien."',tongtrudichvu = tongtrudichvu + '".$trutien."'   where user='".$_SESSION['log']."' ";
$chay_uptop = "update products set uptop = uptop + '500'  where user='".$_SESSION['log']."' ";
$chay_quangcaoxuhuongtop = "update dangkydichvu set gia='300000',giam='".$sotiengiam."',tongthanhtoan='".$trutien."', qc_xuhuongtop = '1',qc_khuyenmaitop = '1'  where user_shop='".$_SESSION['log']."' and id_goidichvu ='1' and thoigian ='12' ";
 
$thongbao_1thang = "insert into thongbao_shop (thongbao,user,date) values ('Shop đã đăng ký thành công gói dịch vụ Khởi Nghiệp với thời gian 12 tháng từ ngày <b>$date</b> đến <b>$langaygi</b>. ','".$_SESSION['log']."','".$date."')";
$lichsugiaodich = "insert into lichsugiaodich (noidung,user,date) values ('Shop bị trừ <b>$trutien_thongbao VNĐ</b> tiền thanh toán cho đăng ký gói dịch vụ Khởi Nghiệp thời gian 12 tháng. ','".$_SESSION['log']."','".$date."')";
		if (mysql_query($add_goidichvu1) && mysql_query($chayend) && mysql_query($chay_uptop) && mysql_query($chay_quangcaoxuhuongtop)  && mysql_query($thongbao_1thang)   && mysql_query($lichsugiaodich)              ){
		echo "<SCRIPT LANGUAGE='JavaScript'>
 
    window.location.href='index1.php?act=dangkydichvu_reg&thongbao=1_12';
    </SCRIPT>";}	
		else {
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không thành công vui lòng liên hệ trợ giúp')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";} 
		 }	
		else {
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không đủ Ngân Sách để thanh toán cho gói Dịch Vụ Khởi Nghiệp thời gian 12 tháng.Shop vui lòng nạp thêm Ngân sách để tiếp tục đăng ký dịch vụ.Xin cảm ơn quý khách  ')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";}	
 
}else{
}	
//kết thúc gói 12 tháng	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



				
}


?>
            <!-- form start -->
			<? echo $err;?>
            <form  method="POST"    >
              <div class="box-body">
                <div class="input-group">
                <span class="input-group-addon"><b>Số lượng (Tháng)</b></span>
 
				
				<select class="form-control" name="soluonggoi" onchange="this.form.submit()">
				
				
<?php
if($_REQUEST['soluonggoi']=='2')
{?>
<option value="2" selected>2 Tháng</option>
<option value="3" >3 Tháng</option>
<option value="6" >6 Tháng</option>
<option value="12" >12 Tháng</option>
<?}else{?>
<?}?>

<?php
if($_REQUEST['soluonggoi']=='3')
{?>
<option value="2" >2 Tháng</option>
 <option value="3" selected>3 Tháng</option>
 <option value="6" >6 Tháng</option>
<option value="12" >12 Tháng</option>
<?}else{?>
<?}?>

<?php
if($_REQUEST['soluonggoi']=='6')
{?>
<option value="2" >2 Tháng</option>
 <option value="3" >3 Tháng</option>
<option value="6" selected>6 Tháng</option>
<option value="12" >12 Tháng</option>
<?}else{?>
<?}?>

<?php
if($_REQUEST['soluonggoi']=='12')
{?>
<option value="2" >2 Tháng</option>
 <option value="3" >3 Tháng</option>
 <option value="6" >6 Tháng</option>
<option value="12" selected>12 Tháng</option>
<?}else{?>
<?}?>

                   
					
					
					
					
					
					
                  </select>
              </div>
               <div class="input-group">
                <span class="input-group-addon" style=" width: 295px; "><b>Giá (Tháng)</b></span>
                <input   class="form-control"   style=" width: 344px; " value="<? echo number_format(300000,0);?>đ" disabled>
              </div>
                <div class="input-group">
                <span class="input-group-addon" style=" width: 295px; "><b>Thành tiền</b></span>
                <input   class="form-control"   style=" width: 344px; " value="<? echo number_format(300000 * $_REQUEST['soluonggoi'],0);?>đ" disabled>
              </div>
			    
			  
			  
			  <?php
			 
if($_REQUEST['soluonggoi']=='3')

{?>
<?  $giam =   (300000 * $_REQUEST['soluonggoi'])/20; ?>

              <div class="input-group">
                <span class="input-group-addon" style=" width: 295px; "><b>Giảm(5%)</b></span>
                <input   class="form-control"   style=" width: 344px; "  value="<? echo number_format($giam,0);?>đ" disabled>
              </div>
<?}else{?>
<?}?>
			  <?php
if($_REQUEST['soluonggoi']=='6')
{?>
<?  $giam =   (300000 * $_REQUEST['soluonggoi'])/10; ?>
			  <div class="input-group">
                <span class="input-group-addon" style=" width: 295px; "><b>Giảm(10%)</b></span>
                <input   class="form-control"   style=" width: 344px; "  value="<? echo number_format($giam,0);?>đ" disabled>
              </div>
<?}else{?>
<?}?>  

			  <?php
if($_REQUEST['soluonggoi']=='12')

{?>
<?  $giam =   (300000 * $_REQUEST['soluonggoi'])/5; ?>
			  <div class="input-group">
                <span class="input-group-addon" style=" width: 295px; "><b>Giảm(20%)</b></span>
                <input   class="form-control"   style=" width: 344px; "  value="<? echo number_format($giam,0);?>đ" disabled>
              </div>
<?}else{?>
<?}?>  
			  

			  
			  
			   <div class="input-group">
                <span class="input-group-addon" style=" width: 295px; "><b>Tổng thanh toán</b></span>
                <input  class="form-control"   style="width: 344px;color: red;font-weight: bold;"  value="<? echo number_format(300000 * $_REQUEST['soluonggoi'] - $giam,0);?>đ" disabled>
              </div>
 
              </div>
			  
			 <center> <button type="submit" name="add_data" class="btn btn-primary">Đăng ký</button></center>
			    </form>
              <!-- /.box-body -->

              
			 
 		   

 
<?}else{?>
<meta http-equiv="refresh" content="0;">
<?}?>
			
				
               
          
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

<!---------------------------------Đăng ký gói 2  - Phát triển - Start ----------------------------->
<?php
if($_REQUEST['active']=='2')
{?>
 <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6" style=" /* width: 100%; */ padding-right: 0px; padding-left: 0px; ">
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Đăng ký gói dịch vụ <b style=" color: #673AB7; "><i class="fa fa-fw fa-puzzle-piece"></i>Phát Triển</b></h3>
            </div>
            <!-- /.box-header -->
			 <?php
if($_REQUEST['soluonggoi']>='2')
{?>

<?
if (isset($_POST['add_data'])) {
	date_default_timezone_set("Asia/Ho_Chi_Minh");
$thangcongend = 0;
$ngayend = date('d');
$thangend = date('m');
$namend = date('Y');
$thangend += $thangcongend;
while($thangend>12){
if($thangend > 12)
{
$thangend -= 12;
$namend ++;
}}
$date = $ngayend.'-'.$thangend.'-'.$namend; 


 

		
//bắt đầu gói 2 tháng	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if($_REQUEST['soluonggoi']== '2'){	
$thangcong = 2;
$ngay = date('d');
$thang = date('m');
$nam = date('Y');
$thang += $thangcong;
while($thang>12){
if($thang > 12)
{
$thang -= 12;
$nam ++;
}}
$langaygi = $ngay.'-'.$thang.'-'.$nam; 

$tongsoluong = (600000 * $_REQUEST['soluonggoi']);

$trutien = (($tongsoluong));
$trutien_thongbao = number_format(($tongsoluong),0);


$kiemtratien=mysql_query("SELECT * FROM user_shop where user='".$_SESSION['log']."'");
$kiemtratien_in=mysql_fetch_assoc($kiemtratien);	
 
	
if($kiemtratien_in['tien']>= '1200000'){	

$add_goidichvu1 = "insert into dangkydichvu (id_goidichvu,user_shop,date,thoigian) values ('2','".$_SESSION['log']."','".$date."','".$_REQUEST['soluonggoi']."')";
$chayend = "update user_shop set goidichvu = '2',goidichvu_batdau='".$date."', goidichvu_ketthuc = '".$langaygi."',luotup = luotup + '1000',tien = tien - '".$trutien."',tongtrudichvu = tongtrudichvu + '".$trutien."'   where user='".$_SESSION['log']."' ";
$chay_uptop = "update products set uptop = uptop + '500'  where user='".$_SESSION['log']."' ";
$chay_quangcaoxuhuongtop = "update dangkydichvu set gia='600000', tongthanhtoan='".$trutien."', qc_xuhuongtop = '4',qc_khuyenmaitop = '4'  where user_shop='".$_SESSION['log']."' and id_goidichvu ='2' and thoigian ='2' ";
$thongbao_1thang = "insert into thongbao_shop (thongbao,user,date) values ('Shop đã đăng ký thành công gói dịch vụ Phát Triển với thời gian 2 tháng từ ngày <b>$date</b> đến <b>$langaygi</b>. ','".$_SESSION['log']."','".$date."')";
$lichsugiaodich = "insert into lichsugiaodich (noidung,user,date) values ('Shop bị trừ <b>$trutien_thongbao VNĐ</b> tiền thanh toán cho đăng ký gói dịch vụ Phát Triển thời gian 2 tháng. ','".$_SESSION['log']."','".$date."')";
		if (mysql_query($add_goidichvu1) && mysql_query($chayend) && mysql_query($chay_uptop) && mysql_query($chay_quangcaoxuhuongtop)  && mysql_query($thongbao_1thang)   && mysql_query($lichsugiaodich)              ){
		echo "<SCRIPT LANGUAGE='JavaScript'>
 
    window.location.href='index1.php?act=dangkydichvu_reg&thongbao=2_2';
    </SCRIPT>";}	
		else {
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không thành công vui lòng liên hệ trợ giúp')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";} 
		 }
		else {
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không đủ Ngân Sách để thanh toán cho gói Dịch Vụ Phát Triển thời gian 2 tháng.Shop vui lòng nạp thêm Ngân sách để tiếp tục đăng ký dịch vụ.Xin cảm ơn quý khách  ')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";} 

}else{
}	
//kết thúc gói 2 tháng	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//gói 3 tháng

if($_REQUEST['soluonggoi']== '3'){	
$thangcong = 3;
$ngay = date('d');
$thang = date('m');
$nam = date('Y');
$thang += $thangcong;
while($thang>12){
if($thang > 12)
{
$thang -= 12;
$nam ++;
}}
$langaygi = $ngay.'-'.$thang.'-'.$nam; 

$tongsoluong = (600000 * $_REQUEST['soluonggoi']);
 
$sotiengiam = ($tongsoluong )/20;
$trutien = ($tongsoluong ) - ($sotiengiam);

$trutien_thongbao = number_format(($tongsoluong ) - ($sotiengiam));


$kiemtratien=mysql_query("SELECT * FROM user_shop where user='".$_SESSION['log']."'");
$kiemtratien_in=mysql_fetch_assoc($kiemtratien);	
 
	
if($kiemtratien_in['tien']>= '1710000'){	

$add_goidichvu1 = "insert into dangkydichvu (id_goidichvu,user_shop,date,thoigian) values ('2','".$_SESSION['log']."','".$date."','".$_REQUEST['soluonggoi']."')";
$chayend = "update user_shop set goidichvu = '2',goidichvu_batdau='".$date."', goidichvu_ketthuc = '".$langaygi."',luotup = luotup + '1700',tien = tien - '".$trutien."',tongtrudichvu = tongtrudichvu + '".$trutien."'   where user='".$_SESSION['log']."' ";
$chay_uptop = "update products set uptop = uptop + '600'  where user='".$_SESSION['log']."' ";
$chay_quangcaoxuhuongtop = "update dangkydichvu set gia='600000' ,giam='".$sotiengiam."',tongthanhtoan='".$trutien."', qc_xuhuongtop = '4',qc_khuyenmaitop = '4'  where user_shop='".$_SESSION['log']."' and id_goidichvu ='2' and thoigian ='3' ";
 
$thongbao_1thang = "insert into thongbao_shop (thongbao,user,date) values ('Shop đã đăng ký thành công gói dịch vụ Phát Triển với thời gian 3 tháng từ ngày <b>$date</b> đến <b>$langaygi</b>. ','".$_SESSION['log']."','".$date."')";
$lichsugiaodich = "insert into lichsugiaodich (noidung,user,date) values ('Shop bị trừ <b>$trutien_thongbao VNĐ</b> tiền thanh toán cho đăng ký gói dịch vụ Phát Triển thời gian 3 tháng. ','".$_SESSION['log']."','".$date."')";
		if (mysql_query($add_goidichvu1) && mysql_query($chayend) && mysql_query($chay_uptop) && mysql_query($chay_quangcaoxuhuongtop)  && mysql_query($thongbao_1thang)   && mysql_query($lichsugiaodich)              ){
		echo "<SCRIPT LANGUAGE='JavaScript'>
 
    window.location.href='index1.php?act=dangkydichvu_reg&thongbao=2_3';
    </SCRIPT>";}	
		else {
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không thành công vui lòng liên hệ trợ giúp')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";} 
		 }	
		else {
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không đủ Ngân Sách để thanh toán cho gói Dịch Vụ Phát Triển thời gian 3 tháng.Shop vui lòng nạp thêm Ngân sách để tiếp tục đăng ký dịch vụ.Xin cảm ơn quý khách  ')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";}	
 
}else{
}	
//kết thúc gói 3 tháng	


//gói 6 tháng/////////////////////////////////////////////////////////////////////

if($_REQUEST['soluonggoi']== '6'){	
$thangcong = 6;
$ngay = date('d');
$thang = date('m');
$nam = date('Y');
$thang += $thangcong;
while($thang>12){
if($thang > 12)
{
$thang -= 12;
$nam ++;
}}
$langaygi = $ngay.'-'.$thang.'-'.$nam; 

$tongsoluong = (600000 * $_REQUEST['soluonggoi']);
 
$sotiengiam = ($tongsoluong )/10;
$trutien = ($tongsoluong ) - ($sotiengiam);

$trutien_thongbao = number_format(($tongsoluong  ) - ($sotiengiam));

 


$kiemtratien=mysql_query("SELECT * FROM user_shop where user='".$_SESSION['log']."'");
$kiemtratien_in=mysql_fetch_assoc($kiemtratien);	
 
	
if($kiemtratien_in['tien']>= '3240000'){	

$add_goidichvu1 = "insert into dangkydichvu (id_goidichvu,user_shop,date,thoigian) values ('2','".$_SESSION['log']."','".$date."','".$_REQUEST['soluonggoi']."')";
$chayend = "update user_shop set goidichvu = '2',goidichvu_batdau='".$date."', goidichvu_ketthuc = '".$langaygi."',luotup = luotup + '3000',tien = tien - '".$trutien."',tongtrudichvu = tongtrudichvu + '".$trutien."'   where user='".$_SESSION['log']."' ";
$chay_uptop = "update products set uptop = uptop + '700'  where user='".$_SESSION['log']."' ";
$chay_quangcaoxuhuongtop = "update dangkydichvu set gia='600000' ,giam='".$sotiengiam."',tongthanhtoan='".$trutien."', qc_xuhuongtop = '4',qc_khuyenmaitop = '4'  where user_shop='".$_SESSION['log']."' and id_goidichvu ='2' and thoigian ='6' ";
 
$thongbao_1thang = "insert into thongbao_shop (thongbao,user,date) values ('Shop đã đăng ký thành công gói dịch vụ Phát Triển với thời gian 6 tháng từ ngày <b>$date</b> đến <b>$langaygi</b>. ','".$_SESSION['log']."','".$date."')";
$lichsugiaodich = "insert into lichsugiaodich (noidung,user,date) values ('Shop bị trừ <b>$trutien_thongbao VNĐ</b> tiền thanh toán cho đăng ký gói dịch vụ Phát Triển thời gian 6 tháng. ','".$_SESSION['log']."','".$date."')";
		if (mysql_query($add_goidichvu1) && mysql_query($chayend) && mysql_query($chay_uptop) && mysql_query($chay_quangcaoxuhuongtop)  && mysql_query($thongbao_1thang)   && mysql_query($lichsugiaodich)              ){
		echo "<SCRIPT LANGUAGE='JavaScript'>
 
    window.location.href='index1.php?act=dangkydichvu_reg&thongbao=2_6';
    </SCRIPT>";}	
		else {
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không thành công vui lòng liên hệ trợ giúp')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";} 
		 }	
		else {
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không đủ Ngân Sách để thanh toán cho gói Dịch Vụ Phát Triển thời gian 6 tháng.Shop vui lòng nạp thêm Ngân sách để tiếp tục đăng ký dịch vụ.Xin cảm ơn quý khách  ')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";}	
 
}else{
}	
//kết thúc gói 6 tháng	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//gói 12 tháng/////////////////////////////////////////////////////////////////////

if($_REQUEST['soluonggoi']== '12'){	
$thangcong = 12;
$ngay = date('d');
$thang = date('m');
$nam = date('Y');
$thang += $thangcong;
while($thang>12){
if($thang > 12)
{
$thang -= 12;
$nam ++;
}}
$langaygi = $ngay.'-'.$thang.'-'.$nam; 

$tongsoluong = (600000 * $_REQUEST['soluonggoi']);
 
$sotiengiam = ($tongsoluong )/10*3;
$trutien = ($tongsoluong  ) - ($sotiengiam);

$trutien_thongbao = number_format(($tongsoluong ) - ($sotiengiam));


$kiemtratien=mysql_query("SELECT * FROM user_shop where user='".$_SESSION['log']."'");
$kiemtratien_in=mysql_fetch_assoc($kiemtratien);	
 
	
if($kiemtratien_in['tien']>= '5040000'){	

$add_goidichvu1 = "insert into dangkydichvu (id_goidichvu,user_shop,date,thoigian) values ('2','".$_SESSION['log']."','".$date."','".$_REQUEST['soluonggoi']."')";
$chayend = "update user_shop set goidichvu = '2',goidichvu_batdau='".$date."', goidichvu_ketthuc = '".$langaygi."',luotup = luotup + '5500',tien = tien - '".$trutien."',tongtrudichvu = tongtrudichvu + '".$trutien."'   where user='".$_SESSION['log']."' ";
$chay_uptop = "update products set uptop = uptop + '1000'  where user='".$_SESSION['log']."' ";
$chay_quangcaoxuhuongtop = "update dangkydichvu set gia='600000',giam='".$sotiengiam."',tongthanhtoan='".$trutien."', qc_xuhuongtop = '4',qc_khuyenmaitop = '4'  where user_shop='".$_SESSION['log']."' and id_goidichvu ='2' and thoigian ='12' ";
 
$thongbao_1thang = "insert into thongbao_shop (thongbao,user,date) values ('Shop đã đăng ký thành công gói dịch vụ Phát Triển với thời gian 12 tháng từ ngày <b>$date</b> đến <b>$langaygi</b>. ','".$_SESSION['log']."','".$date."')";
$lichsugiaodich = "insert into lichsugiaodich (noidung,user,date) values ('Shop bị trừ <b>$trutien_thongbao VNĐ</b> tiền thanh toán cho đăng ký gói dịch vụ Phát Triển thời gian 12 tháng. ','".$_SESSION['log']."','".$date."')";
		if (mysql_query($add_goidichvu1) && mysql_query($chayend) && mysql_query($chay_uptop) && mysql_query($chay_quangcaoxuhuongtop)  && mysql_query($thongbao_1thang)   && mysql_query($lichsugiaodich)              ){
		echo "<SCRIPT LANGUAGE='JavaScript'>
 
    window.location.href='index1.php?act=dangkydichvu_reg&thongbao=2_12';
    </SCRIPT>";}	
		else {
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không thành công vui lòng liên hệ trợ giúp')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";} 
		 }	
		else {
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không đủ Ngân Sách để thanh toán cho gói Dịch Vụ Phát Triển thời gian 12 tháng.Shop vui lòng nạp thêm Ngân sách để tiếp tục đăng ký dịch vụ.Xin cảm ơn quý khách  ')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";}	
 
}else{
}	
//kết thúc gói 12 tháng	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



				
}


?>
            <!-- form start -->
			<? echo $err;?>
            <form  method="POST"    >
              <div class="box-body">
                <div class="input-group">
                <span class="input-group-addon"><b>Số lượng (Tháng)</b></span>
 
				
				<select class="form-control" name="soluonggoi" onchange="this.form.submit()">
				
				
<?php
if($_REQUEST['soluonggoi']=='2')
{?>
<option value="2" selected>2 Tháng</option>
<option value="3" >3 Tháng</option>
<option value="6" >6 Tháng</option>
<option value="12" >12 Tháng</option>
<?}else{?>
<?}?>

<?php
if($_REQUEST['soluonggoi']=='3')
{?>
<option value="2" >2 Tháng</option>
 <option value="3" selected>3 Tháng</option>
 <option value="6" >6 Tháng</option>
<option value="12" >12 Tháng</option>
<?}else{?>
<?}?>

<?php
if($_REQUEST['soluonggoi']=='6')
{?>
<option value="2" >2 Tháng</option>
 <option value="3" >3 Tháng</option>
<option value="6" selected>6 Tháng</option>
<option value="12" >12 Tháng</option>
<?}else{?>
<?}?>

<?php
if($_REQUEST['soluonggoi']=='12')
{?>
<option value="2" >2 Tháng</option>
 <option value="3" >3 Tháng</option>
 <option value="6" >6 Tháng</option>
<option value="12" selected>12 Tháng</option>
<?}else{?>
<?}?>

                   
					
					
					
					
					
					
                  </select>
              </div>
               <div class="input-group">
                <span class="input-group-addon" style=" width: 295px; "><b>Giá (Tháng)</b></span>
                <input   class="form-control"   style=" width: 344px; " value="<? echo number_format(600000,0);?>đ" disabled>
              </div>
                <div class="input-group">
                <span class="input-group-addon" style=" width: 295px; "><b>Thành tiền</b></span>
                <input   class="form-control"   style=" width: 344px; " value="<? echo number_format(600000 * $_REQUEST['soluonggoi'],0);?>đ" disabled>
              </div>
			   
			  
			  
			  <?php
			 
if($_REQUEST['soluonggoi']=='3')

{?>
<?  $giam =   (600000 * $_REQUEST['soluonggoi'] )/20; ?>

              <div class="input-group">
                <span class="input-group-addon" style=" width: 295px; "><b>Giảm(5%)</b></span>
                <input   class="form-control"   style=" width: 344px; "  value="<? echo number_format($giam,0);?>đ" disabled>
              </div>
<?}else{?>
<?}?>
			  <?php
if($_REQUEST['soluonggoi']=='6')
{?>
<?  $giam =   (600000 * $_REQUEST['soluonggoi'] )/10; ?>
			  <div class="input-group">
                <span class="input-group-addon" style=" width: 295px; "><b>Giảm(10%)</b></span>
                <input   class="form-control"   style=" width: 344px; "  value="<? echo number_format($giam,0);?>đ" disabled>
              </div>
<?}else{?>
<?}?>  

			  <?php
if($_REQUEST['soluonggoi']=='12')

{?>
<?  $giam =   (600000 * $_REQUEST['soluonggoi'] )/10*3; ?>
			  <div class="input-group">
                <span class="input-group-addon" style=" width: 295px; "><b>Giảm(30%)</b></span>
                <input   class="form-control"   style=" width: 344px; "  value="<? echo number_format($giam,0);?>đ" disabled>
              </div>
<?}else{?>
<?}?>  
			  

			  
			  
			   <div class="input-group">
                <span class="input-group-addon" style=" width: 295px; "><b>Tổng thanh toán</b></span>
                <input  class="form-control"   style="width: 344px;color: red;font-weight: bold;"  value="<? echo number_format(600000 * $_REQUEST['soluonggoi']  - $giam,0);?>đ" disabled>
              </div>
 
              </div>
			  
			 <center> <button type="submit" name="add_data" class="btn btn-primary">Đăng ký</button></center>
			    </form>
              <!-- /.box-body -->

              
			 
 		   

 
<?}else{?>
<meta http-equiv="refresh" content="0;">
<?}?>
			
				
               
          
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
<?}?>
<!---------------------------------Đăng ký gói 2  - Phát triển - END ----------------------------->


<!---------------------------------Đăng ký gói 3 - Thành Công - END ----------------------------->

<!---------------------------------Đăng ký gói 3 - Thành Công - END ----------------------------->

<!---------------------------------Đăng ký gói 3 - Thành Công - END ----------------------------->
<?php
if($_REQUEST['active']=='3')
{?>
 <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6" style=" /* width: 100%; */ padding-right: 0px; padding-left: 0px; ">
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Đăng ký gói dịch vụ <b style=" color: red; "><i class="fa fa-fw fa-paw"></i>Thành Công</b></h3>
            </div>
            <!-- /.box-header -->
			 <?php
if($_REQUEST['soluonggoi']>='1')
{?>

<?
if (isset($_POST['add_data'])) {
	date_default_timezone_set("Asia/Ho_Chi_Minh");
$thangcongend = 0;
$ngayend = date('d');
$thangend = date('m');
$namend = date('Y');
$thangend += $thangcongend;
while($thangend>12){
if($thangend > 12)
{
$thangend -= 12;
$namend ++;
}}
$date = $ngayend.'-'.$thangend.'-'.$namend; 


 

		
//bắt đầu gói 1 tháng	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if($_REQUEST['soluonggoi']== '1'){	
$thangcong = 1;
$ngay = date('d');
$thang = date('m');
$nam = date('Y');
$thang += $thangcong;
while($thang>12){
if($thang > 12)
{
$thang -= 12;
$nam ++;
}}
$langaygi = $ngay.'-'.$thang.'-'.$nam; 

$tongsoluong = (1000000 * $_REQUEST['soluonggoi']);
 
$trutien = $tongsoluong;
$trutien_thongbao = number_format(($tongsoluong)   ,0);


$kiemtratien=mysql_query("SELECT * FROM user_shop where user='".$_SESSION['log']."'");
$kiemtratien_in=mysql_fetch_assoc($kiemtratien);	
 
	
if($kiemtratien_in['tien']>= '1000000'){	

$add_goidichvu1 = "insert into dangkydichvu (id_goidichvu,user_shop,date,thoigian) values ('3','".$_SESSION['log']."','".$date."','".$_REQUEST['soluonggoi']."')";
$chayend = "update user_shop set goidichvu = '3',goidichvu_batdau='".$date."', goidichvu_ketthuc = '".$langaygi."',luotup = luotup + '2500',tien = tien - '".$trutien."',tongtrudichvu = tongtrudichvu + '".$trutien."'   where user='".$_SESSION['log']."' ";
$chay_uptop = "update products set uptop = uptop + '1200'  where user='".$_SESSION['log']."' ";
$chay_quangcaoxuhuongtop = "update dangkydichvu set gia='1000000' ,tongthanhtoan='".$trutien."', qc_xuhuongtop = '9',qc_khuyenmaitop = '9'  where user_shop='".$_SESSION['log']."' and id_goidichvu ='3' and thoigian ='1' ";
$thongbao_1thang = "insert into thongbao_shop (thongbao,user,date) values ('Shop đã đăng ký thành công gói dịch vụ Thành Công với thời gian 1 tháng từ ngày <b>$date</b> đến <b>$langaygi</b>. ','".$_SESSION['log']."','".$date."')";
$lichsugiaodich = "insert into lichsugiaodich (noidung,user,date) values ('Shop bị trừ <b>$trutien_thongbao VNĐ</b> tiền thanh toán cho đăng ký gói dịch vụ Thành Công thời gian 1 tháng. ','".$_SESSION['log']."','".$date."')";
		if (mysql_query($add_goidichvu1) && mysql_query($chayend) && mysql_query($chay_uptop) && mysql_query($chay_quangcaoxuhuongtop)  && mysql_query($thongbao_1thang)   && mysql_query($lichsugiaodich)              ){
		echo "<SCRIPT LANGUAGE='JavaScript'>
 
    window.location.href='index1.php?act=dangkydichvu_reg&thongbao=3_1';
    </SCRIPT>";}	
		else {
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không thành công vui lòng liên hệ trợ giúp')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";} 
		 }
		else {
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không đủ Ngân Sách để thanh toán cho gói Dịch Vụ Thành Công thời gian 1 tháng.Shop vui lòng nạp thêm Ngân sách để tiếp tục đăng ký dịch vụ.Xin cảm ơn quý khách  ')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";} 

}else{
}	
//kết thúc gói 1 tháng	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//gói 3 tháng

if($_REQUEST['soluonggoi']== '3'){	
$thangcong = 3;
$ngay = date('d');
$thang = date('m');
$nam = date('Y');
$thang += $thangcong;
while($thang>12){
if($thang > 12)
{
$thang -= 12;
$nam ++;
}}
$langaygi = $ngay.'-'.$thang.'-'.$nam; 

$tongsoluong = (1000000 * $_REQUEST['soluonggoi']);
 
$sotiengiam = ($tongsoluong )/20;
$trutien = ($tongsoluong  ) - ($sotiengiam);

$trutien_thongbao = number_format(($tongsoluong  ) - ($sotiengiam));


$kiemtratien=mysql_query("SELECT * FROM user_shop where user='".$_SESSION['log']."'");
$kiemtratien_in=mysql_fetch_assoc($kiemtratien);	
 
	
if($kiemtratien_in['tien']>= '2850000'){	

$add_goidichvu1 = "insert into dangkydichvu (id_goidichvu,user_shop,date,thoigian) values ('3','".$_SESSION['log']."','".$date."','".$_REQUEST['soluonggoi']."')";
$chayend = "update user_shop set goidichvu = '3',goidichvu_batdau='".$date."', goidichvu_ketthuc = '".$langaygi."',luotup = luotup + '4000',tien = tien - '".$trutien."',tongtrudichvu = tongtrudichvu + '".$trutien."'   where user='".$_SESSION['log']."' ";
$chay_uptop = "update products set uptop = uptop + '1500'  where user='".$_SESSION['log']."' ";
$chay_quangcaoxuhuongtop = "update dangkydichvu set gia='1000000' ,giam='".$sotiengiam."',tongthanhtoan='".$trutien."', qc_xuhuongtop = '9',qc_khuyenmaitop = '9'  where user_shop='".$_SESSION['log']."' and id_goidichvu ='3' and thoigian ='3' ";
 
$thongbao_1thang = "insert into thongbao_shop (thongbao,user,date) values ('Shop đã đăng ký thành công gói dịch vụ Thành Công với thời gian 3 tháng từ ngày <b>$date</b> đến <b>$langaygi</b>. ','".$_SESSION['log']."','".$date."')";
$lichsugiaodich = "insert into lichsugiaodich (noidung,user,date) values ('Shop bị trừ <b>$trutien_thongbao VNĐ</b> tiền thanh toán cho đăng ký gói dịch vụ Phát Triển thời gian 3 tháng. ','".$_SESSION['log']."','".$date."')";
		if (mysql_query($add_goidichvu1) && mysql_query($chayend) && mysql_query($chay_uptop) && mysql_query($chay_quangcaoxuhuongtop)  && mysql_query($thongbao_1thang)   && mysql_query($lichsugiaodich)              ){
		echo "<SCRIPT LANGUAGE='JavaScript'>
 
    window.location.href='index1.php?act=dangkydichvu_reg&thongbao=3_3';
    </SCRIPT>";}	
		else {
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không thành công vui lòng liên hệ trợ giúp')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";} 
		 }	
		else {
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không đủ Ngân Sách để thanh toán cho gói Dịch Vụ Thành Công thời gian 3 tháng.Shop vui lòng nạp thêm Ngân sách để tiếp tục đăng ký dịch vụ.Xin cảm ơn quý khách  ')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";}	
 
}else{
}	
//kết thúc gói 3 tháng	


//gói 6 tháng/////////////////////////////////////////////////////////////////////

if($_REQUEST['soluonggoi']== '6'){	
$thangcong = 6;
$ngay = date('d');
$thang = date('m');
$nam = date('Y');
$thang += $thangcong;
while($thang>12){
if($thang > 12)
{
$thang -= 12;
$nam ++;
}}
$langaygi = $ngay.'-'.$thang.'-'.$nam; 

$tongsoluong = (1000000 * $_REQUEST['soluonggoi']);
 
$sotiengiam = ($tongsoluong )/10*1.5;
$trutien = ($tongsoluong  ) - ($sotiengiam);

$trutien_thongbao = number_format(($tongsoluong ) - ($sotiengiam));

 


$kiemtratien=mysql_query("SELECT * FROM user_shop where user='".$_SESSION['log']."'");
$kiemtratien_in=mysql_fetch_assoc($kiemtratien);	
 
	
if($kiemtratien_in['tien']>= '5100000'){	

$add_goidichvu1 = "insert into dangkydichvu (id_goidichvu,user_shop,date,thoigian) values ('3','".$_SESSION['log']."','".$date."','".$_REQUEST['soluonggoi']."')";
$chayend = "update user_shop set goidichvu = '3',goidichvu_batdau='".$date."', goidichvu_ketthuc = '".$langaygi."',luotup = luotup + '6000',tien = tien - '".$trutien."',tongtrudichvu = tongtrudichvu + '".$trutien."'   where user='".$_SESSION['log']."' ";
$chay_uptop = "update products set uptop = uptop + '2000'  where user='".$_SESSION['log']."' ";
$chay_quangcaoxuhuongtop = "update dangkydichvu set gia='1000000' ,giam='".$sotiengiam."',tongthanhtoan='".$trutien."', qc_xuhuongtop = '9',qc_khuyenmaitop = '9'  where user_shop='".$_SESSION['log']."' and id_goidichvu ='3' and thoigian ='6' ";
 
$thongbao_1thang = "insert into thongbao_shop (thongbao,user,date) values ('Shop đã đăng ký thành công gói dịch vụ Thành Công với thời gian 6 tháng từ ngày <b>$date</b> đến <b>$langaygi</b>. ','".$_SESSION['log']."','".$date."')";
$lichsugiaodich = "insert into lichsugiaodich (noidung,user,date) values ('Shop bị trừ <b>$trutien_thongbao VNĐ</b> tiền thanh toán cho đăng ký gói dịch vụ Thành Công thời gian 6 tháng. ','".$_SESSION['log']."','".$date."')";
		if (mysql_query($add_goidichvu1) && mysql_query($chayend) && mysql_query($chay_uptop) && mysql_query($chay_quangcaoxuhuongtop)  && mysql_query($thongbao_1thang)   && mysql_query($lichsugiaodich)              ){
		echo "<SCRIPT LANGUAGE='JavaScript'>
 
    window.location.href='index1.php?act=dangkydichvu_reg&thongbao=3_6';
    </SCRIPT>";}	
		else {
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không thành công vui lòng liên hệ trợ giúp')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";} 
		 }	
		else {
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không đủ Ngân Sách để thanh toán cho gói Dịch Vụ Thành Công thời gian 6 tháng.Shop vui lòng nạp thêm Ngân sách để tiếp tục đăng ký dịch vụ.Xin cảm ơn quý khách  ')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";}	
 
}else{
}	
//kết thúc gói 6 tháng	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//gói 12 tháng/////////////////////////////////////////////////////////////////////

if($_REQUEST['soluonggoi']== '12'){	
$thangcong = 12;
$ngay = date('d');
$thang = date('m');
$nam = date('Y');
$thang += $thangcong;
while($thang>12){
if($thang > 12)
{
$thang -= 12;
$nam ++;
}}
$langaygi = $ngay.'-'.$thang.'-'.$nam; 

$tongsoluong = (1000000 * $_REQUEST['soluonggoi']);
 
$sotiengiam = ($tongsoluong )/10*4;
$trutien = ($tongsoluong  ) - ($sotiengiam);

$trutien_thongbao = number_format(($tongsoluong  ) - ($sotiengiam));


$kiemtratien=mysql_query("SELECT * FROM user_shop where user='".$_SESSION['log']."'");
$kiemtratien_in=mysql_fetch_assoc($kiemtratien);	
 
	
if($kiemtratien_in['tien']>= '7200000'){	

$add_goidichvu1 = "insert into dangkydichvu (id_goidichvu,user_shop,date,thoigian) values ('3','".$_SESSION['log']."','".$date."','".$_REQUEST['soluonggoi']."')";
$chayend = "update user_shop set goidichvu = '3',goidichvu_batdau='".$date."', goidichvu_ketthuc = '".$langaygi."',luotup = luotup + '10500',tien = tien - '".$trutien."',tongtrudichvu = tongtrudichvu + '".$trutien."'   where user='".$_SESSION['log']."' ";
$chay_uptop = "update products set uptop = uptop + '2900'  where user='".$_SESSION['log']."' ";
$chay_quangcaoxuhuongtop = "update dangkydichvu set gia='1000000',giam='".$sotiengiam."',tongthanhtoan='".$trutien."', qc_xuhuongtop = '9',qc_khuyenmaitop = '9'  where user_shop='".$_SESSION['log']."' and id_goidichvu ='3' and thoigian ='12' ";
 
$thongbao_1thang = "insert into thongbao_shop (thongbao,user,date) values ('Shop đã đăng ký thành công gói dịch vụ Thành Công với thời gian 12 tháng từ ngày <b>$date</b> đến <b>$langaygi</b>. ','".$_SESSION['log']."','".$date."')";
$lichsugiaodich = "insert into lichsugiaodich (noidung,user,date) values ('Shop bị trừ <b>$trutien_thongbao VNĐ</b> tiền thanh toán cho đăng ký gói dịch vụ Thành Công thời gian 12 tháng. ','".$_SESSION['log']."','".$date."')";
		if (mysql_query($add_goidichvu1) && mysql_query($chayend) && mysql_query($chay_uptop) && mysql_query($chay_quangcaoxuhuongtop)  && mysql_query($thongbao_1thang)   && mysql_query($lichsugiaodich)              ){
		echo "<SCRIPT LANGUAGE='JavaScript'>
  
    window.location.href='index1.php?act=dangkydichvu_reg&thongbao=3_12';
    </SCRIPT>";}	
		else {
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không thành công vui lòng liên hệ trợ giúp')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";} 
		 }	
		else {
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không đủ Ngân Sách để thanh toán cho gói Dịch Vụ Thành Công thời gian 12 tháng.Shop vui lòng nạp thêm Ngân sách để tiếp tục đăng ký dịch vụ.Xin cảm ơn quý khách  ')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";}	
 
}else{
}	
//kết thúc gói 12 tháng	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



				
}


?>
            <!-- form start -->
			<? echo $err;?>
            <form  method="POST"    >
              <div class="box-body">
                <div class="input-group">
                <span class="input-group-addon"><b>Số lượng (Tháng)</b></span>
 
				
				<select class="form-control" name="soluonggoi" onchange="this.form.submit()">
				
				
<?php
if($_REQUEST['soluonggoi']=='1')
{?>
<option value="1" selected>1 Tháng</option>
<option value="3" >3 Tháng</option>
<option value="6" >6 Tháng</option>
<option value="12" >12 Tháng</option>
<?}else{?>
<?}?>

<?php
if($_REQUEST['soluonggoi']=='3')
{?>
<option value="1" >1 Tháng</option>
 <option value="3" selected>3 Tháng</option>
 <option value="6" >6 Tháng</option>
<option value="12" >12 Tháng</option>
<?}else{?>
<?}?>

<?php
if($_REQUEST['soluonggoi']=='6')
{?>
<option value="1" >1 Tháng</option>
 <option value="3" >3 Tháng</option>
<option value="6" selected>6 Tháng</option>
<option value="12" >12 Tháng</option>
<?}else{?>
<?}?>

<?php
if($_REQUEST['soluonggoi']=='12')
{?>
<option value="1" >1 Tháng</option>
 <option value="3" >3 Tháng</option>
 <option value="6" >6 Tháng</option>
<option value="12" selected>12 Tháng</option>
<?}else{?>
<?}?>

                   
					
					
					
					
					
					
                  </select>
              </div>
               <div class="input-group">
                <span class="input-group-addon" style=" width: 295px; "><b>Giá (Tháng)</b></span>
                <input   class="form-control"   style=" width: 344px; " value="<? echo number_format(1000000,0);?>đ" disabled>
              </div>
                <div class="input-group">
                <span class="input-group-addon" style=" width: 295px; "><b>Thành tiền</b></span>
                <input   class="form-control"   style=" width: 344px; " value="<? echo number_format(1000000 * $_REQUEST['soluonggoi'],0);?>đ" disabled>
              </div>
			    
			  
			  
			  <?php
			 
if($_REQUEST['soluonggoi']=='3')

{?>
<?  $giam =   (1000000 * $_REQUEST['soluonggoi'])/20; ?>

              <div class="input-group">
                <span class="input-group-addon" style=" width: 295px; "><b>Giảm(5%)</b></span>
                <input   class="form-control"   style=" width: 344px; "  value="<? echo number_format($giam,0);?>đ" disabled>
              </div>
<?}else{?>
<?}?>


			  <?php
if($_REQUEST['soluonggoi']=='6')
{?>
<?  $giam =   (1000000 * $_REQUEST['soluonggoi'] )/10*1.5; ?>
			  <div class="input-group">
                <span class="input-group-addon" style=" width: 295px; "><b>Giảm(15%)</b></span>
                <input   class="form-control"   style=" width: 344px; "  value="<? echo number_format($giam,0);?>đ" disabled>
              </div>
<?}else{?>
<?}?>  

			  <?php
if($_REQUEST['soluonggoi']=='12')

{?>
<?  $giam =   (1000000 * $_REQUEST['soluonggoi'] )/10*4; ?>
			  <div class="input-group">
                <span class="input-group-addon" style=" width: 295px; "><b>Giảm(30%)</b></span>
                <input   class="form-control"   style=" width: 344px; "  value="<? echo number_format($giam,0);?>đ" disabled>
              </div>
<?}else{?>
<?}?>  
			  

			  
			  
			   <div class="input-group">
                <span class="input-group-addon" style=" width: 295px; "><b>Tổng thanh toán</b></span>
                <input  class="form-control"   style="width: 344px;color: red;font-weight: bold;"  value="<? echo number_format(1000000 * $_REQUEST['soluonggoi'] - $giam,0);?>đ" disabled>
              </div>
 
              </div>
			  
			 <center> <button type="submit" name="add_data" class="btn btn-primary">Đăng ký</button></center>
			    </form>
              <!-- /.box-body -->

              
			 
 		   

 
<?}else{?>
<meta http-equiv="refresh" content="0;">
<?}?>
			
				
               
          
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
<?}?>
<!---------------------------------Đăng ký gói 3  - Thành Công - END ----------------------------->





<?php if($_REQUEST['thongbao'] =='1_2' )
{?>

<?
$date = date('d-m-Y');

$thangcong = 2;
$ngay = date('d');
$thang = date('m');
$nam = date('Y');
$thang += $thangcong;
while($thang>12){
if($thang > 12)
{
$thang -= 12;
$nam ++;
}}
$langaygi = $ngay.'-'.$thang.'-'.$nam;
?>
<center><b style=" color: red; FONT-SIZE: 24px; font-weight: bold; ">ĐĂNG KÝ THÀNH CÔNG</b></center>
<br>
<b style=" font-size: 22px; ">Gói dịch vụ  <B style=" color: #4CAF50; "><i class="fa fa-fw fa-hourglass"></i> Khởi Nghiệp</b></b>
<br>
<b style=" font-size: 22px; ">Giá dịch vụ <B style=" color: red; ">300,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Thời gian <B style=" color: red; ">2 Tháng</b></b>
<br>
<b style=" font-size: 22px; ">Tổng thanh toán <B style=" color: red; ">600,000đ</b></b>
<br>
<b style=" font-size: 20px; ">Bắt đầu từ ngày <B style=" color: red; "><? echo $date;?></b> đến ngày <b style=" color: red; "><? echo $langaygi;?></b></b>

<?}else{?>
<?}?>	


<?php if($_REQUEST['thongbao'] =='1_3' )
{?>

<?
$date = date('d-m-Y');

$thangcong = 3;
$ngay = date('d');
$thang = date('m');
$nam = date('Y');
$thang += $thangcong;
while($thang>12){
if($thang > 12)
{
$thang -= 12;
$nam ++;
}}
$langaygi = $ngay.'-'.$thang.'-'.$nam;
?>
<center><b style=" color: red; FONT-SIZE: 24px; font-weight: bold; ">ĐĂNG KÝ THÀNH CÔNG</b></center>
<br>
<b style=" font-size: 22px; ">Gói dịch vụ  <B style=" color: #4CAF50; "><i class="fa fa-fw fa-hourglass"></i> Khởi Nghiệp</b></b>
<br>
<b style=" font-size: 22px; ">Giá dịch vụ <B style=" color: red; ">300,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Thời gian <B style=" color: red; ">3 Tháng</b></b>
<br>
<b style=" font-size: 22px; ">Tổng tiền <B style=" color: red; ">900,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Giảm(5%) <B style=" color: red; ">45,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Tổng thanh toán <B style=" color: red; ">855,000đ</b></b>
<br>
<b style=" font-size: 20px; ">Bắt đầu từ ngày <B style=" color: red; "><? echo $date;?></b> đến ngày <b style=" color: red; "><? echo $langaygi;?></b></b>
<?}else{?>
<?}?>	

<?php if($_REQUEST['thongbao'] =='1_6' )
{?>
<?
$date = date('d-m-Y');

$thangcong = 6;
$ngay = date('d');
$thang = date('m');
$nam = date('Y');
$thang += $thangcong;
while($thang>12){
if($thang > 12)
{
$thang -= 12;
$nam ++;
}}
$langaygi = $ngay.'-'.$thang.'-'.$nam;
?>
<center><b style=" color: red; FONT-SIZE: 24px; font-weight: bold; ">ĐĂNG KÝ THÀNH CÔNG</b></center>
<br>
<b style=" font-size: 22px; ">Gói dịch vụ  <B style=" color: #4CAF50; "><i class="fa fa-fw fa-hourglass"></i> Khởi Nghiệp</b></b>
<br>
<b style=" font-size: 22px; ">Giá dịch vụ <B style=" color: red; ">300,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Thời gian <B style=" color: red; ">6 Tháng</b></b>
<br>
<b style=" font-size: 22px; ">Tổng tiền <B style=" color: red; ">1,800,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Giảm(10%) <B style=" color: red; ">180,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Tổng thanh toán <B style=" color: red; ">1,620,000đ</b></b>
<br>
<b style=" font-size: 20px; ">Bắt đầu từ ngày <B style=" color: red; "><? echo $date;?></b> đến ngày <b style=" color: red; "><? echo $langaygi;?></b></b>
<?}else{?>
<?}?>	
<?php if($_REQUEST['thongbao'] =='1_12' )
{?>
<?
$date = date('d-m-Y');

$thangcong = 12;
$ngay = date('d');
$thang = date('m');
$nam = date('Y');
$thang += $thangcong;
while($thang>12){
if($thang > 12)
{
$thang -= 12;
$nam ++;
}}
$langaygi = $ngay.'-'.$thang.'-'.$nam;
?>
<center><b style=" color: red; FONT-SIZE: 24px; font-weight: bold; ">ĐĂNG KÝ THÀNH CÔNG</b></center>
<br>
<b style=" font-size: 22px; ">Gói dịch vụ  <B style=" color: #4CAF50; "><i class="fa fa-fw fa-hourglass"></i> Khởi Nghiệp</b></b>
<br>
<b style=" font-size: 22px; ">Giá dịch vụ <B style=" color: red; ">300,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Thời gian <B style=" color: red; ">12 Tháng</b></b>
<br>
<b style=" font-size: 22px; ">Tổng tiền <B style=" color: red; ">3,600,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Giảm(10%) <B style=" color: red; ">720,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Tổng thanh toán <B style=" color: red; ">2,880,000đ</b></b>
<br>
<b style=" font-size: 20px; ">Bắt đầu từ ngày <B style=" color: red; "><? echo $date;?></b> đến ngày <b style=" color: red; "><? echo $langaygi;?></b></b>
<?}else{?>
<?}?>	



<?php if($_REQUEST['thongbao'] =='2_2' )
{?>
<?
$date = date('d-m-Y');

$thangcong = 2;
$ngay = date('d');
$thang = date('m');
$nam = date('Y');
$thang += $thangcong;
while($thang>12){
if($thang > 12)
{
$thang -= 12;
$nam ++;
}}
$langaygi = $ngay.'-'.$thang.'-'.$nam;
?>
<center><b style=" color: red; FONT-SIZE: 24px; font-weight: bold; ">ĐĂNG KÝ THÀNH CÔNG</b></center>
<br>
<b style=" font-size: 22px; ">Gói dịch vụ  <B style=" color: #673AB7; "><i class="fa fa-fw fa-puzzle-piece"></i> Phát Triển</b></b>
<br>
<b style=" font-size: 22px; ">Giá dịch vụ <B style=" color: red; ">600,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Thời gian <B style=" color: red; ">2 Tháng</b></b>
<br>
<b style=" font-size: 22px; ">Tổng tiền <B style=" color: red; ">1,200,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Tổng thanh toán <B style=" color: red; ">1,200,000đ</b></b>
<br>
<b style=" font-size: 20px; ">Bắt đầu từ ngày <B style=" color: red; "><? echo $date;?></b> đến ngày <b style=" color: red; "><? echo $langaygi;?></b></b>
<?}else{?>
<?}?>	
<?php if($_REQUEST['thongbao'] =='2_3' )
{?>
<?
$date = date('d-m-Y');

$thangcong = 3;
$ngay = date('d');
$thang = date('m');
$nam = date('Y');
$thang += $thangcong;
while($thang>12){
if($thang > 12)
{
$thang -= 12;
$nam ++;
}}
$langaygi = $ngay.'-'.$thang.'-'.$nam;
?>
<center><b style=" color: red; FONT-SIZE: 24px; font-weight: bold; ">ĐĂNG KÝ THÀNH CÔNG</b></center>
<br>
<b style=" font-size: 22px; ">Gói dịch vụ  <B style=" color: #673AB7; "><i class="fa fa-fw fa-puzzle-piece"></i> Phát Triển</b></b>
<br>
<b style=" font-size: 22px; ">Giá dịch vụ <B style=" color: red; ">600,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Thời gian <B style=" color: red; ">3 Tháng</b></b>
<br>
<b style=" font-size: 22px; ">Tổng tiền <B style=" color: red; ">1,800,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Giảm(5%) <B style=" color: red; ">90,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Tổng thanh toán <B style=" color: red; ">1,710,000đ</b></b>
<br>
<b style=" font-size: 20px; ">Bắt đầu từ ngày <B style=" color: red; "><? echo $date;?></b> đến ngày <b style=" color: red; "><? echo $langaygi;?></b></b>
<?}else{?>
<?}?>
<?php if($_REQUEST['thongbao'] =='2_6' )
{?>
<?
$date = date('d-m-Y');

$thangcong = 6;
$ngay = date('d');
$thang = date('m');
$nam = date('Y');
$thang += $thangcong;
while($thang>12){
if($thang > 12)
{
$thang -= 12;
$nam ++;
}}
$langaygi = $ngay.'-'.$thang.'-'.$nam;
?>
<center><b style=" color: red; FONT-SIZE: 24px; font-weight: bold; ">ĐĂNG KÝ THÀNH CÔNG</b></center>
<br>
<b style=" font-size: 22px; ">Gói dịch vụ  <B style=" color: #673AB7; "><i class="fa fa-fw fa-puzzle-piece"></i> Phát Triển</b></b>
<br>
<b style=" font-size: 22px; ">Giá dịch vụ <B style=" color: red; ">600,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Thời gian <B style=" color: red; ">6 Tháng</b></b>
<br>
<b style=" font-size: 22px; ">Tổng tiền <B style=" color: red; ">3,600,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Giảm(10%) <B style=" color: red; ">360,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Tổng thanh toán <B style=" color: red; ">3,240,000đ</b></b>
<br>
<b style=" font-size: 20px; ">Bắt đầu từ ngày <B style=" color: red; "><? echo $date;?></b> đến ngày <b style=" color: red; "><? echo $langaygi;?></b></b>
<?}else{?>
<?}?>	
<?php if($_REQUEST['thongbao'] =='2_12' )
{?>
<?
$date = date('d-m-Y');

$thangcong = 12;
$ngay = date('d');
$thang = date('m');
$nam = date('Y');
$thang += $thangcong;
while($thang>12){
if($thang > 12)
{
$thang -= 12;
$nam ++;
}}
$langaygi = $ngay.'-'.$thang.'-'.$nam;
?>
<center><b style=" color: red; FONT-SIZE: 24px; font-weight: bold; ">ĐĂNG KÝ THÀNH CÔNG</b></center>
<br>
<b style=" font-size: 22px; ">Gói dịch vụ  <B style=" color: #673AB7; "><i class="fa fa-fw fa-puzzle-piece"></i> Phát Triển</b></b>
<br>
<b style=" font-size: 22px; ">Giá dịch vụ <B style=" color: red; ">600,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Thời gian <B style=" color: red; ">12 Tháng</b></b>
<br>
<b style=" font-size: 22px; ">Tổng tiền <B style=" color: red; ">7,200,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Giảm(10%) <B style=" color: red; ">2,160,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Tổng thanh toán <B style=" color: red; ">5,040,000đ</b></b>
<br>
<b style=" font-size: 20px; ">Bắt đầu từ ngày <B style=" color: red; "><? echo $date;?></b> đến ngày <b style=" color: red; "><? echo $langaygi;?></b></b>
<?}else{?>
<?}?>	



<?php if($_REQUEST['thongbao'] =='3_1' )
{?>
<?
$date = date('d-m-Y');

$thangcong = 1;
$ngay = date('d');
$thang = date('m');
$nam = date('Y');
$thang += $thangcong;
while($thang>12){
if($thang > 12)
{
$thang -= 12;
$nam ++;
}}
$langaygi = $ngay.'-'.$thang.'-'.$nam;
?>
<center><b style=" color: red; FONT-SIZE: 24px; font-weight: bold; ">ĐĂNG KÝ THÀNH CÔNG</b></center>
<br>
<b style=" font-size: 22px; ">Gói dịch vụ  <B style=" color: red; "><i class="fa fa-fw fa-paw"></i> Thành Công</b></b>
<br>
<b style=" font-size: 22px; ">Giá dịch vụ <B style=" color: red; ">1,000,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Thời gian <B style=" color: red; ">1 Tháng</b></b>
<br>
<b style=" font-size: 22px; ">Tổng tiền <B style=" color: red; ">1,000,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Tổng thanh toán <B style=" color: red; ">1,000,000đ</b></b>
<br>
<b style=" font-size: 20px; ">Bắt đầu từ ngày <B style=" color: red; "><? echo $date;?></b> đến ngày <b style=" color: red; "><? echo $langaygi;?></b></b>
<?}else{?>
<?}?>	<?php if($_REQUEST['thongbao'] =='3_3' )
{?>
<?
$date = date('d-m-Y');

$thangcong = 3;
$ngay = date('d');
$thang = date('m');
$nam = date('Y');
$thang += $thangcong;
while($thang>12){
if($thang > 12)
{
$thang -= 12;
$nam ++;
}}
$langaygi = $ngay.'-'.$thang.'-'.$nam;
?>
<center><b style=" color: red; FONT-SIZE: 24px; font-weight: bold; ">ĐĂNG KÝ THÀNH CÔNG</b></center>
<br>
<b style=" font-size: 22px; ">Gói dịch vụ  <B style=" color: red; "><i class="fa fa-fw fa-paw"></i> Thành Công</b></b>
<br>
<b style=" font-size: 22px; ">Giá dịch vụ <B style=" color: red; ">1,000,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Thời gian <B style=" color: red; ">3 Tháng</b></b>
<br>
<b style=" font-size: 22px; ">Tổng tiền <B style=" color: red; ">3,000,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Giảm(5%) <B style=" color: red; ">150,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Tổng thanh toán <B style=" color: red; ">2,850,000đ</b></b>
<br>
<b style=" font-size: 20px; ">Bắt đầu từ ngày <B style=" color: red; "><? echo $date;?></b> đến ngày <b style=" color: red; "><? echo $langaygi;?></b></b>
<?}else{?>
<?}?>	<?php if($_REQUEST['thongbao'] =='3_6' )
{?>
<?
$date = date('d-m-Y');

$thangcong = 6;
$ngay = date('d');
$thang = date('m');
$nam = date('Y');
$thang += $thangcong;
while($thang>12){
if($thang > 12)
{
$thang -= 12;
$nam ++;
}}
$langaygi = $ngay.'-'.$thang.'-'.$nam;
?>
<center><b style=" color: red; FONT-SIZE: 24px; font-weight: bold; ">ĐĂNG KÝ THÀNH CÔNG</b></center>
<br>
<b style=" font-size: 22px; ">Gói dịch vụ  <B style=" color: red; "><i class="fa fa-fw fa-paw"></i> Thành Công</b></b>
<br>
<b style=" font-size: 22px; ">Giá dịch vụ <B style=" color: red; ">1,000,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Thời gian <B style=" color: red; ">6 Tháng</b></b>
<br>
<b style=" font-size: 22px; ">Tổng tiền <B style=" color: red; ">6,000,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Giảm(15%) <B style=" color: red; ">900,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Tổng thanh toán <B style=" color: red; ">5,100,000đ</b></b>
<br>
<b style=" font-size: 20px; ">Bắt đầu từ ngày <B style=" color: red; "><? echo $date;?></b> đến ngày <b style=" color: red; "><? echo $langaygi;?></b></b>
<?}else{?>
<?}?>	
<?php if($_REQUEST['thongbao'] =='3_12' )
{?>
<?
$date = date('d-m-Y');

$thangcong = 12;
$ngay = date('d');
$thang = date('m');
$nam = date('Y');
$thang += $thangcong;
while($thang>12){
if($thang > 12)
{
$thang -= 12;
$nam ++;
}}
$langaygi = $ngay.'-'.$thang.'-'.$nam;
?>
<center><b style=" color: red; FONT-SIZE: 24px; font-weight: bold; ">ĐĂNG KÝ THÀNH CÔNG</b></center>
<br>
<b style=" font-size: 22px; ">Gói dịch vụ  <B style=" color: red; "><i class="fa fa-fw fa-paw"></i> Thành Công</b></b>
<br>
<b style=" font-size: 22px; ">Giá dịch vụ <B style=" color: red; ">1,000,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Thời gian <B style=" color: red; ">12 Tháng</b></b>
<br>
<b style=" font-size: 22px; ">Tổng tiền <B style=" color: red; ">12,000,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Giảm(30%) <B style=" color: red; ">4,800,000đ</b></b>
<br>
<b style=" font-size: 22px; ">Tổng thanh toán <B style=" color: red; ">7,200,000đ</b></b>
<br>
<b style=" font-size: 20px; ">Bắt đầu từ ngày <B style=" color: red; "><? echo $date;?></b> đến ngày <b style=" color: red; "><? echo $langaygi;?></b></b>
<?}else{?>
<?}?>	
