<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dịch vụ Up sản phẩm trên Gian  Hàng Số
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a >Dịch vụ Up sản phẩm</a></li>
      </ol>
    </section>
	<br>
	<!-- hàm điều kiện  -->
<?php
$sql1=mysql_query("SELECT * FROM user_shop where user='".$_SESSION['log']."'");
$row=mysql_fetch_assoc($sql1);
if($row['tien']>='600000')
{?>
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
	$upkhuyenmai = $_POST['upkhuyenmai'];
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
	$sql = "update user_shop set sale='1',upkhuyenmai = '".$upkhuyenmai."' + 1,dungluong = '104900000',tongtrugiahanvip = tongtrugiahanvip + 600000,active=1,pay_time='".$date2."',end_time='".$date3."'  where user='".$user."' ";
		if (mysql_query($sql,$con)) {
			
			{
				
			}
			$err=" <SCRIPT LANGUAGE='JavaScript'>
    window.alert('Thao tác thành công')
    window.location.href='home';
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
		  <div class="col-md-6" style="width: 100%;">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Up Sản phẩm nổi bật</a></li>
              <li><a href="#tab_2" data-toggle="tab">UP sản phẩm TOP</a></li>
              <li><a href="#tab_3" data-toggle="tab">UP Sản phẩm TOP</a></li>
			    <li><a href="#tab_3" data-toggle="tab">UP sản phẩm đề cử</a></li>
				  <li><a href="#tab_3" data-toggle="tab">UP Top danh mục</a></li>
	
             
             
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
      

                 <div class="box">
            <div class="box-header">
			<i class="fa fa-diamond"></i>
              <h3 class="box-title">Gia Hạn VIP</h3>
            </div>
            <!-- /.box-header -->
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
                - <?php
$a=$row_user_mem['pay_time'];
$target = mktime(0, 0, 0, substr($a,3,2), substr($a,0,2), substr($a,6,4)+1) ;
$today = time () ;
$difference =($target-$today) ;
$days =(int) ($difference/86400) ;
?>
<?if($days>=20)
	{?>
Bạn còn:
<?}elseif($days<=19&&$days>=-100){?>
Bạn còn <blink><font color="red"><b><?echo $days;?></b></font></blink> ngày sử dụng - Hãy tiến hành gia hạn để gian hàng được hoạt động bình thường
<?}else{?>
<?}?>

                

                  <font color="blue"><b><?echo $days;?></b></font> ngày sử dụng
              </p>
                    <button type="button" class="btn btn-block btn-primary">Tiến hành gia hạn VIP</button>
                  </td>
  

 
              </table>
			  
            </div>
            <!-- /.box-body -->
          </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <div class="box">
            <div class="box-header">
			<i class="fa fa-diamond"></i>
              <h3 class="box-title">Up sản phẩm TOP trên Gian Hàng Số</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <td>
<p>
                 <b><center>Vị trí sản phẩm</b><br>
				 <img src="images/upsanphamtop.jpg" width="900">
              </p>
			  
                  </td>
  

 
              </table>
			  <table class="table table-striped">
                <td>
<p>
                - Chi phí gia hạn VIP sử dụng cho 1 năm là <b>600.000đ</b>
              </p>
			   <p>
                - Thời gian sử dụng sẽ được tính từ lúc gian hàng gia hạn thành công </b>
              </p>
			   <p>
                - <?php
$a=$row_user_mem['pay_time'];
$target = mktime(0, 0, 0, substr($a,3,2), substr($a,0,2), substr($a,6,4)+1) ;
$today = time () ;
$difference =($target-$today) ;
$days =(int) ($difference/86400) ;
?>
<?if($days>=20)
	{?>
Bạn còn:
<?}elseif($days<=19&&$days>=-100){?>
Bạn còn <blink><font color="red"><b><?echo $days;?></b></font></blink> ngày sử dụng - Hãy tiến hành gia hạn để gian hàng được hoạt động bình thường
<?}else{?>
<?}?>

                

                  <font color="blue"><b><?echo $days;?></b></font> ngày sử dụng
              </p>
                    <button type="button" class="btn btn-block btn-primary">Tiến hành gia hạn VIP</button>
                  </td>
  

 
              </table>
            </div>
            <!-- /.box-body -->
          </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                like Aldus PageMaker including versions of Lorem Ipsum.
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>   
		  </div>
        <!-- /.col -->


        <!-- /.col -->
      </div>

 </section>		
    </td>
  </tr>
  </table>
</form>

<!-- kết thúc nội dung  -->

<!-- Nếu không thuộc điều kiện thì trả về không đủ tiền -->
<?}else{?>
Chưa đủ tiền
<?}?>






