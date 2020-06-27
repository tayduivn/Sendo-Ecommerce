<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        MUA LƯỢT UP SẢN PHẨM
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a >Mua lượt UP</a></li>
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
	$sql = "update user_shop set level_shop='0',tien = tien - 600000,dungluong = '104900000',tongtrugiahanvip = tongtrugiahanvip + 600000,active=1,pay_time='".$date2."',end_time='".$date3."'  where user='".$user."' ";
		if (mysql_query($sql,$con)) {
			
			{
				$sqlUpdate = "update user_shop set tien = tien + 100000,tonggioithieu = tonggioithieu + 100000 where user='".$reg_user."' ";
				mysql_query($sqlUpdate,$con);
				$sqlUpdate = "insert into lichsugiaodich (user,noidung,date) values ('".$user."','".$noidung."','".$date."')";
				mysql_query($sqlUpdate,$con);
				$sqlUpdate = "insert into lichsugiaodich (user,noidung,date) values ('".$reg_user."','".$noidung1."','".$date."')";
				mysql_query($sqlUpdate,$con);
			}
			$err=" <SCRIPT LANGUAGE='JavaScript'>
    window.alert('Thao tác thành công')
    window.location.href='quanlydonhang_order.html';
    </SCRIPT>";
		}	
		else {
			$err =  "<p align=center class='err'><SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không thành công vui lòng liên hệ trợ giúp')
    window.location.href='active_vip';
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

<form method="POST" name="FormLoaiSP" enctype="multipart/form-data" action="">
<input type=hidden name="oldid" value="<? echo $oldid; ?>">
<input type=hidden name="noidung" value="Tài khoản <b><? echo $user;?></b> bị trừ <b>600.000đ</b> tiền nâng cấp, gia hạn VIP">
<input type=hidden name="noidung1" value="Tài khoản <b><? echo $reg_user;?></b> nhận được <b>100.000đ</b> từ thành viên <b><? echo $user;?></b> đã nâng cấp VIP">
<? echo $err;?>
<section class="content">
		 <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
			<i class="fa fa-fw fa-rocket"></i>
              <h3 class="box-title">Mua lượt UP</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
			
              <table class="table table-striped">
			  
                 <td>
				 <p>
                - Sản phẩm được UP sẽ được ưu tiên hiển thị hàng đầu ở toàn hệ thống Website ShopCanTho.Vn của tất cả ngành hàng.
              </p>
			   <p>
                - Sản phẩm được UP ở các mục Shop đề cử, Xu hướng, Khuyến Mãi sẽ được hiển thị đầu tiên sau khi UP
              </p>
			   <p>
                
              </p>
                    
					<a id="dangkydichvu" href="index1.php?act=mualuotup_reg&soluong=500"  class="btn btn-block btn-primary"><i class="fa fa-fw fa-cart-plus"></i> Mua lượt UP</a></span>
				     
				  
					</td>
                  </td>
				

 
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <!--div class="col-md-6">
        <div class="box">
            <div class="box-header">
			<i class="fa fa-diamond"></i>
              <h3 class="box-title">Diễn giải</h3>
            </div>
            <!-- /.box-header -
            <div class="box-body no-padding">
              <table class="table table-striped">
                <td>
<p>
                - Chi phí gia hạn VIP sử dụng cho 1 năm là <b>600.000đ</b>
              </p>
			   <p>
                - Thời gian sử dụng sẽ được tính từ lúc gian hàng gia hạn thành công </b>
              </p>
			   <p>
 

                

                  <font color="blue"><b><?echo $days;?></b></font> ngày sử dụng
              </p>
                    <button type="button" class="btn btn-block btn-primary">Tiến hành gia hạn VIP</button>
                  </td>
  

 
              </table>
            </div>
            <!-- /.box-body -
          </div>
          <!-- /.box -
        </div-->
        <!-- /.col -->
      </div>

 </section>		
    </td>
  </tr>
  </table>
</form>

<!-- kết thúc nội dung  -->

<!-- Nếu không thuộc điều kiện thì trả về không đủ tiền -->
 






 