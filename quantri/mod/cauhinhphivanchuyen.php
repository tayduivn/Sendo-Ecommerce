 


<!---------------------------------MUA LƯỢT UP ----------------------------->
 
 <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6" style=" /* width: 100%; */ padding-right: 0px; padding-left: 0px; ">
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <center><h3 class="box-title"><b>HỖ TRỢ PHÍ VẬN CHUYỂN</b></h3></center>
            </div>
            <!-- /.box-header -->
<?
if (isset($_POST['add_data'])) {
	date_default_timezone_set("Asia/Ho_Chi_Minh");
$date = date("d-m-Y H:i:s");


	

		
//bắt đầu	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
 

 
 
 
	$hotrovanchuyen_tu=preg_replace('/[^0-9]/','',$_POST['hotrovanchuyen_tu']);	
 


 $hotrovanchuyen_tu_tb = number_format($hotrovanchuyen_tu);
 
	


$chayend = "update user_shop set hotrovanchuyen_tu = '".$hotrovanchuyen_tu."'   where user='".$_SESSION['log']."' ";
$thongbao_1thang = "insert into thongbao_shop (thongbao,user,date) values ('Shop đã đăng ký thành công chương trình hỗ trợ phí vận chuyển cho đơn hàng từ  <b>$hotrovanchuyen_tu_tb</b>đ trở lên . ','".$_SESSION['log']."','".$date."')";
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
		



 	
//kết thúc ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

				
}
			$sql_cat_sub11=mysql_query("SELECT * FROM user_shop where user='".$_SESSION['log']."' ");
$row_cat_sub11=mysql_fetch_assoc($sql_cat_sub11);

?>


<? echo $err;?>			
			
				  <form  method="POST"    >
              <div class="box-body">
			  
			  
			<?php
if($row_cat_sub11['hotrovanchuyen_tu'] <= '0')
{?>
Shop chưa hỗ trợ phí vận chuyển cho khách hàng
<?}else{?>
 <b style=" font-size: 12px; ">Shop đang hỗ trợ Phí Vận Chuyển cho khách hàng có đơn hàng từ    <? echo number_format($row_cat_sub11['hotrovanchuyen_tu'])?>đ trở lên</b>
<?}?>    
			  
			  

			  
			  
			  
			 <br>
                  <div class="input-group">
				  
                <div class="input-group-btn">
                  <button type="button" class="btn btn-danger">Giá</button>
                </div>
                <!-- /btn-group -->
				
                <input type="text" onkeyup="this.value=FormatNumber(this.value);" value="<? echo number_format($row_cat_sub11['hotrovanchuyen_tu']);?>" name="hotrovanchuyen_tu" class="form-control" placeholder="Nhập tỷ lệ điểm thưởng ...">
              </div>
               
  
			  
 
              </div>
			  
			 <center> <button type="submit" name="add_data" class="btn btn-primary">Đăng ký</button>
			 			

			
			</center>
			    </form>
                
 
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





				

          
<script>
var inputnumber = 'Giá trị nhập vào không phải là số';
	function FormatNumber(str) {
		var strTemp = GetNumber(str);
		if (strTemp.length <= 3)
			return strTemp;
		strResult = "";
		for (var i = 0; i < strTemp.length; i++)
			strTemp = strTemp.replace(",", "");
		var m = strTemp.lastIndexOf(".");
		if (m == -1) {
			for (var i = strTemp.length; i >= 0; i--) {
				if (strResult.length > 0 && (strTemp.length - i - 1) % 3 == 0)
					strResult = "," + strResult;
				strResult = strTemp.substring(i, i + 1) + strResult;
			}
		} else {
			var strphannguyen = strTemp.substring(0, strTemp.lastIndexOf("."));
			var strphanthapphan = strTemp.substring(strTemp.lastIndexOf("."),
					strTemp.length);
			var tam = 0;
			for (var i = strphannguyen.length; i >= 0; i--) {

				if (strResult.length > 0 && tam == 4) {
					strResult = "," + strResult;
					tam = 1;
				}

				strResult = strphannguyen.substring(i, i + 1) + strResult;
				tam = tam + 1;
			}
			strResult = strResult + strphanthapphan;
		}
		return strResult;
	}

	function GetNumber(str) {
		var count = 0;
		for (var i = 0; i < str.length; i++) {
			var temp = str.substring(i, i + 1);
			if (!(temp == "," || temp == "." || (temp >= 0 && temp <= 9))) {
				alert(inputnumber);
				return str.substring(0, i);
			}
			if (temp == " ")
				return str.substring(0, i);
			if (temp == ".") {
				if (count > 0)
					return str.substring(0, ipubl_date);
				count++;
			}
		}
		return str;
	}

	function IsNumberInt(str) {
		for (var i = 0; i < str.length; i++) {
			var temp = str.substring(i, i + 1);
			if (!(temp == "." || (temp >= 0 && temp <= 9))) {
				alert(inputnumber);
				return str.substring(0, i);
			}
			if (temp == ",") {
				return str.substring(0, i);
			}
		}
		return str;
	}
</script>

