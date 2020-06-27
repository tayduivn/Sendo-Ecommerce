<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Đăng ký dịch vụ
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a >Đăng ký dịch vụ</a></li>
      </ol>
    </section>
	<br>
	<!-- hàm điều kiện  -->
 
<!-- kết thúc hàm điều kiện -->
	




<!-- bắt đầu nội dung Nội dung  -->
<?
$sql3111 = "select * from user_shop where user='".$_SESSION['log']."'";
		if ($result = mysql_query($sql3111,$con)) {
			$row=mysql_fetch_array($result);
			$reg_user=$row['reg_user'];
		}
$user=$_SESSION['log'];


if (isset($_POST['butSub'])) {
	$name = $_POST['name'];
	$noidung = $_POST['noidung'];
	$noidung1 = $_POST['noidung1'];
	$level_shop = $_POST['level_shop'];
	$tien = $_POST['tien'];
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	$date = date("d-m-Y H:i:s");
	$date2=date("d/m/Y");
	$date3=date("d/m/Y", strtotime( '+365 days' ));

	

			
	$err="";
	

	if ($tien=='')
	{
	$sql = "update user_shop set dungluong= dungluong + '104900000',tien = tien - 200000,tongtrudichvu = tongtrudichvu + 200000 where user='".$user."' ";
		if (mysql_query($sql,$con)) {
			
			{
				
				$sqlUpdate = "insert into lichsugiaodich (user,noidung,date) values ('".$user."','".$noidung."','".$date."')";
				mysql_query($sqlUpdate,$con);
				
			}
			$err=" <SCRIPT LANGUAGE='JavaScript'>
    window.alert('Đã thêm thành công 100 MB')
    window.location.href='home';
    </SCRIPT>";
		}	
		else {
			$err =  "<p align=center class='err'><SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không thành công vui lòng liên hệ trợ giúp')
    window.location.href='muadungluong';
    </SCRIPT></p>";
		}
  	}


}
$sql1=mysql_query("SELECT * FROM user_shop where user='".$_SESSION['log']."'");
$row=mysql_fetch_assoc($sql1);
?>
<?
		$sql3 = "select * from user_shop where user='".$_SESSION['log']."'";
		if ($result = mysql_query($sql3,$con)) {
			$row=mysql_fetch_array($result);
			$cat_mem=$row['cat_mem'];
			$tem_mem=$row['template'];
		}

?>

<form method="POST" name="FormLoaiSP" enctype="multipart/form-data"  >
<input type=hidden name="oldid" value="<? echo $oldid; ?>">
<input type=hidden name="noidung" value="Tài khoản <b><? echo $user;?></b> bị trừ <b>200.000đ</b> chi phí mua thêm dung lượng <b>100 MB</b>">

<? echo $err;?>
<section class="content">
		 <div class="row">
        <div class="col-xs-12">
          <div class="box">
             
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr  style=" background: linear-gradient(#fefefe,#e7e7e7); ">
                  <th width="50%" ><i class="fa fa-fw fa-arrows"></i>Quyền lợi</th>
                  <th style=" color: #00a65a; "><i class="fa fa-fw fa-hourglass"></i>Khởi nghiệp</th>
                  <th style=" color: #673AB7; "><i class="fa fa-fw fa-puzzle-piece"></i>Phát triển</th>
                  <th style=" color: #FF5722; "><i class="fa fa-fw fa-paw"></i>Thành công</th>
                 
                </tr>
                <tr>
                  <td> <i class="fa fa-fw fa-industry" style=" color: #673AB7; "></i> Ưu tiên lượt hiển thị sản phẩm trong toàn hệ thống</td>
                  <td><span class="badge bg-green">Tăng 20%</span></td>
                  <td><span class="badge bg-light-blue">Tăng 50%</span></td>
                  <td><span class="badge bg-red">Tăng 90%</span></td>
 
                </tr>
				
				<tr>
                  <td> <i class="fa fa-fw fa-bar-chart" style=" color: #dd4b39; "></i> Hỗ trợ đăng bài PR trên Facebook ShopCanTho.Vn và các nhóm bán hàng...</td>
                  <td><span class="badge bg-green">2 bài/Tháng</span></td>
                  <td><span class="badge bg-light-blue">5 bài/Tháng</span></td>
                  <td><span class="badge bg-red">15 bài/Tháng</span></td>
 
                </tr>
				
				<tr>
                  <td> <i style=" color: blue; " class="fa fa-fw fa-cube"></i> Chạy quảng cáo trên Google và Facebook</td>
                  <td><span class="badge bg-green">Không</span></td>
                  <td><span class="badge bg-light-blue">Có</span></td>
                  <td><span class="badge bg-red">Có</span></td>
 
                </tr>
				
				<tr>
                  <td> <i style=" color: #048c4e; " class="fa fa-fw fa-toggle-up"></i> Tặng lượt UP sản phẩm</td>
                  <td><span class="badge bg-green">500 Lượt</span>+<span class="badge bg-green">40 lượt/24h</span></td>
                  <td><span class="badge bg-light-blue">1000 Lượt</span>+<span class="badge bg-light-blue">60 lượt/24h</span></td>
                  <td><span class="badge bg-red">2500 Lượt</span>+<span class="badge bg-red">90 lượt /24h</span></td>
 
                </tr>
				
				 
				
				<!--tr>
                  <td> <i style=" color: #018c4e; " class="fa fa-fw fa-check-square-o"></i> Chạy quảng cáo trên trang chủ ShopCanTho.Vn</td>
                  <td><span class="badge bg-green">1 Vị trí(Sản Phẩm Nổi Bật)</span></td>
                  <td><span class="badge bg-light-blue">2 Vị trí(Nổi Bật & TOP)</span></td>
                  <td><span class="badge bg-red">1 Vị trí Slide Show chính</span></td>
 
                </tr-->
				<tr>
                  <td> <i style=" color: #018c4e; " class="fa fa-fw fa-check-square-o"></i>Hỗ trợ 50% phí vận chuyển khi sản phẩm bị chuyển hoàn</td>
                  <td><span class="badge bg-green">Không</span></td>
                  <td><span class="badge bg-light-blue">Không</span></td>
                  <td><span class="badge bg-red">Có</span></td>
 
                </tr>
				<!--tr>
                  <td> <i style=" color: #018c4e; " class="fa fa-fw fa-check-square-o"></i>Quảng cáo sản phẩm mục Khuyến Mãi TOP</td>
                  <td><span class="badge bg-green">1 Sản phẩm/30 ngày</span></td>
                  <td><span class="badge bg-light-blue">4 Sản Phẩm/60 ngày</span></td>
                  <td><span class="badge bg-red">9 Sản Phẩm/90 ngày</span></td>
 
                </tr-->
				 
                
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
		  
		  
		  
		  
		  <div class="box">
             
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr  style=" background: linear-gradient(#fefefe,#e7e7e7); ">
                  <th width="50%" ><i class="fa fa-fw fa-money"></i> Bảng giá phí dịch vụ</th>
                  <th style=" color: #00a65a; "><i class="fa fa-fw fa-hourglass"></i>Khởi nghiệp</th>
                  <th style=" color: #673AB7; "><i class="fa fa-fw fa-puzzle-piece"></i>Phát triển</th>
                  <th style=" color: #FF5722; "><i class="fa fa-fw fa-paw"></i>Thành công</th>
                 
                </tr>
				<tr>
                  <td><b> Phí Dịch Vụ 01 Tháng</b></td>
                  <td><span class="badge bg-red">300.000đ</span></td>
                  <td><span class="badge bg-red">600.000đ</span></td>
                  <td><span class="badge bg-red">1.000.000đ</span></td>
 
                </tr>
                <tr>
                  <td><b> Đăng ký 3 tháng</b></td>
                  <td><span class="badge bg-green">Tặng thêm 300 Lượt UP</span>
				    <br>
				  <br>

				  <span class="badge bg-green">Giảm 5% phí dịch vụ</span>
				  <br>
				  <br>

				  <span class="badge bg-green">Tăng thêm 10% hiển thị </span>
				  </td>
				  
                  <td><span class="badge bg-green">Tặng thêm 700 UP</span>
				    <br>
				  <br>

				  <span class="badge bg-green">Giảm 5% phí dịch vụ</span>
				   <br>
				  <br>

				  <span class="badge bg-green">Tăng thêm 10% hiển thị </span>
				  </td>
                  <td><span class="badge bg-green">Tặng thêm 1500 Lượt UP</span>
				    <br>
				  <br>

				  <span class="badge bg-green">Giảm 5% phí dịch vụ</span>
				  <br>
				  <br>

				  <span class="badge bg-green">Tăng thêm 40% hiển thị </span>
				  </td>
 
                </tr>
				
				<tr>
                  <td> <b>Đăng ký 6 tháng</b></td>
                  <td><span class="badge bg-yellow">Tặng thêm 1000 Lượt UP</span>
				  				  <br>
				  <br>

				  <span class="badge bg-yellow">Giảm 10% phí dịch vụ</span>
				   <br>
				  <br>

				  <span class="badge bg-yellow">Tăng thêm 20% hiển thị </span>
				  </td>
                  <td><span class="badge bg-yellow">Tặng thêm 2000 Lượt UP</span>
				  				  <br>
				  <br>

				  <span class="badge bg-yellow">Giảm 10% phí dịch vụ</span>
				   <br>
				  <br>

				  <span class="badge bg-yellow">Tăng thêm 30% hiển thị </span>
				  </td>
                  <td><span class="badge bg-yellow">Tặng thêm 3500 Lượt UP</span>
				  				  <br>
				  <br>

				  <span class="badge bg-yellow">Giảm 15% phí dịch vụ</span>
				  <br>
				  <br>

				  <span class="badge bg-yellow">Tăng thêm 80% hiển thị </span>
				  </td>
 
                </tr>
				
				<tr>
                  <td> <b> Đăng ký 12 tháng</b></td>
                  <td><span class="badge bg-red">Tặng thêm 2500 Lượt UP</span>
				    <br>
				  <br>

				  <span class="badge bg-red">Giảm 20% phí dịch vụ</span>
				   <br>
				  <br>

				  <span class="badge bg-red">Tăng thêm 50% hiển thị </span>
				  </td>
                  <td><span class="badge bg-red">Tặng thêm 4500 Lượt UP</span>
				    <br>
				  <br>

				  <span class="badge bg-red">Giảm 30% phí dịch vụ</span>
				   <br>
				  <br>

				  <span class="badge bg-red">Tăng thêm 60% hiển thị </span>
				  </td>
                  <td><span class="badge bg-red">Tặng thêm 8000 Lượt UP</span>
				    <br>
				  <br>

				  <span class="badge bg-red">Giảm 40% phí dịch vụ</span>
				   <br>
				  <br>

				  <span class="badge bg-red">Tăng thêm 140% hiển thị </span>
				  
				  </td>
 
                </tr>
				
				<tr>
                  <td> </td>
                  <td><a id="dangkydichvu" href="index1.php?act=dangkydichvu_reg&active=1&soluonggoi=2"  class="btn btn-block btn-primary"><i class="fa fa-fw fa-cart-plus"></i> Đăng ký</a></span>
				     
				  </td>
                  <td><a id="dangkydichvu"  href="index1.php?act=dangkydichvu_reg&active=2&soluonggoi=2"  class="btn btn-block btn-primary"><i class="fa fa-fw fa-cart-plus"></i> Đăng ký</a></span>
				     
				  </td>
                  <td><a id="dangkydichvu"  href="index1.php?act=dangkydichvu_reg&active=3&soluonggoi=1"  class="btn btn-block btn-primary"><i class="fa fa-fw fa-cart-plus"></i> Đăng ký</a></span>
				     
				  </td>
 
                </tr>
				
				
                
              </tbody></table>
            </div>
			
            <!-- /.box-body -->
          </div>
		  <div class="note">
                        <span class="note-red">Ghi chú:</span>
                        <div class="sub-note">
                            <label> - Thời gian tham gia tối thiểu các gói : <b style=" color: #00a65a; ">Khởi nghiệp</b>, <b style=" color: #673ab7; ">Phát triển</b>  là 02 tháng</label>
                        </div>
                        <div class="sub-note">
                            <label> - Thời gian tham gia tối thiểu gói :  <b style=" color: red; ">Thành công</b> là 01 tháng  </label>
                        </div>
                        
                        
                        <div class="note-2">
                            <span>
                                * Trên đây là chính sách bán hàng chung về quảng cáo của ShopCanTho.Vn<br>
                                Khách hàng vui lòng liên hệ trực tiếp bộ phận kinh doanh để có được chính sách phù hợp và giá tốt nhất tại thời điểm giao dịch
                            </span>
                        </div>
                    </div>
					<br>
          <!-- /.box -->
        </div>
      </div>

 </section>		
    </td>
  </tr>
  </table>
</form>

<!-- kết thúc nội dung  -->

<!-- Nếu không thuộc điều kiện thì trả về không đủ tiền -->
 