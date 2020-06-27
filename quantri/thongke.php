<?include("online.php");?>
<?$sql_tong=mysql_query("SELECT * FROM user_shop where user='".$_SESSION['log']."' ");
$row_tong=mysql_fetch_assoc($sql_tong);
$user=$_SESSION['log'];
?> 
 <!-- Content Wrapper. Contains page content1 -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
			  
<?php
$kiemtraodnhan =   mysql_num_rows(mysql_query("SELECT * FROM orders where orders_user='".$_SESSION['log']."' and active=0 "));
 if($kiemtraodnhan > '0'){?>
<? echo mysql_num_rows(mysql_query("SELECT * FROM orders where orders_user='".$_SESSION['log']."' and active=0 "));?><img src="/images/hoatdong.gif" width="51px">
<?}else{?>
<? echo mysql_num_rows(mysql_query("SELECT * FROM orders where orders_user='".$_SESSION['log']."' and active=0 "));?>
<?}?>			  
			  
			  
			  
			  
			  </h3>

              <p>Đơn đặt hàng mới</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="donhang" class="small-box-footer">Xem đơn hàng <i class="fa fa-arrow-circle-right"></i></a>
          </div> 
        </div>
		
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua" style="background: #00a7d0 !important;">
            <div class="inner">
              <h3><? echo mysql_num_rows(mysql_query("SELECT * FROM products where user='".$_SESSION['log']."' and tinhtrang='1' "));?></h3>

              <p>Sản phẩm còn hàng</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="sanpham" class="small-box-footer">Xem tất cả sản phẩm <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><? echo mysql_num_rows(mysql_query("SELECT * FROM comment_hoidap where user='".$_SESSION['log']."' and comment_traloi='' "));?></h3>

              <p>Hỏi/Đáp mới</p>
            </div>
            <div class="icon">
               <i class="ion ion-person-add"></i>
            </div>
            <a href="sanpham" class="small-box-footer">Xem tất cả Hỏi/Đáp <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><? echo number_format($row_user_mem['tien'],0);?>đ</h3>

              <p>Tổng ngân sách</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="ngansach" class="small-box-footer">Quản lý ngân sách <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Thông tin Shop</h3>

		
			  
<?php if(strtotime($ngayhomnay) == strtotime($ngaysosanh)){?>
<?php if($row_user_mem['goidichvu']=='1'){?>
<button type="button" class="btn btn-block btn-warning btn-lg"> Hôm nay là ngày hạn cuối cùng của <i class="fa fa-fw fa-hourglass"></i>Gói Khởi Nghiệp <? echo ($row_user_mem['goidichvu_ketthuc']);?></button>
<?}else{?>
<?}?>
<?php if($row_user_mem['goidichvu']=='2'){?>
<button type="button" class="btn btn-block btn-primary btn-lg" style=" background: #673AB7; ">Hôm nay là ngày hạn cuối cùng của<i class="fa fa-fw fa-puzzle-piece"></i>Gói Phát Triển<? echo ($row_user_mem['goidichvu_ketthuc']);?></button>
<?}else{?>
<?}?>
<?php if($row_user_mem['goidichvu']=='3'){?>
<button type="button" class="btn btn-block btn-danger btn-lg">Hôm nay là ngày hạn cuối cùng của<i class="fa fa-fw fa-paw"></i>Gói Thành Công<? echo ($row_user_mem['goidichvu_ketthuc']);?></button>
<?}else{?>
<?}?>
<?}else{?>
<?}?>




			  
			  
			  
			  
			  
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Địa chỉ Shop:
			  
	 <a href="/<?php echo $row_user_mem['user'];?>" target="_blank" ><font color="#FF661A"><b style="
    color: blue;
">http://shopcantho.vn<span style=" color: black; ">/</span><span style=" color: red; "><?php echo $row_user_mem['user'];?></span></b></font></a>

 </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tr>
                  <th style="width: 10px">TT</th>
                  <th><?php echo $row_user_mem['company'];?></th>
                  <th>Thông tin</th>
                 
                </tr>
                <tr>
                  <td>1.</td>
                  <td>Ngày đăng ký</td>
                  <td>
                    <? echo $row_user_mem['re_time'];?>
                  </td>
                 
                </tr>
                <tr>
                  <td>2.</td>
                 <td>Chứng nhận Shop Lửa Đỏ <span style="color: red;" class="glyphicon glyphicon-fire"></span></td>
                  <td>
				  <?php
$sql_con1=@mysql_query("SELECT * FROM comment where user='".$row_user_mem['user']."' ");
$tong_con1=@mysql_num_rows($sql_con1);
$cnt1=0;
$tongcong1=0;
while($row_con1=mysql_fetch_assoc($sql_con1))
{
?>
<?
$tongcong1=$tongcong1+$row_con1['rate'];
$trungbinh1=$tongcong1/$tong_con1;
$cnt1=$cnt1+1;
}?>

 <?
  $laydonhang =  mysql_num_rows(mysql_query("SELECT * FROM orders where orders_user='".$_SESSION['log']."' and active_shop='20' "));
  
  $laykhieunai =  mysql_num_rows(mysql_query("SELECT * FROM khieunai where user_shop='".$_SESSION['log']."' "));
   $soluongsp =  mysql_num_rows(mysql_query("SELECT * FROM products where user='".$_SESSION['log']."' "));
  
 ?>
 <?
				 date_default_timezone_set("Asia/Ho_Chi_Minh");
                 $date = date("d-m-Y");
  $first_date = strtotime($date);
  $second_date = strtotime($row_user_mem['re_time']);
  $datediff = abs($first_date - $second_date);
  $layngay = floor($datediff / (60*60*24));
				 ?>

                    <?php if($row_user_mem['level_shop']=='0')
{?><?}else{?><font style="color:blue;font-weight:bold" color=blue>


 <?php



 if($laydonhang>='60' && $tongcong1>='200'   && $laykhieunai <='2' && $soluongsp >='100' && $layngay >= '90'){?>
 
 <?
if (isset($_POST['kichhoat_luado'])) {
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	$date = date("d-m-Y H:i:s");

	{
	$sql = "update user_shop set level_shop='0' where user='".$row_user_mem['user']."' ";
	$sql1 = "insert into thongbao_shop (user,thongbao,date) values ('".$user."','Tài khoản ".$row_user_mem['user']."  đã kích hoạt Shop Lửa Đỏ thành công.','".$date."')";
		if (mysql_query($sql) && mysql_query($sql1) ) {
			
			$err=" <SCRIPT LANGUAGE='JavaScript'>

	window.location.href='home';
 
    </SCRIPT>";
		}	
		else {
			$err =  "<p align=center class='err'><SCRIPT LANGUAGE='JavaScript'>

 window.location.href='home';
    </SCRIPT></p>";
		}
  	}


}

?>
<? echo $err;?>
 <form  method="POST">
 <button style=" color: red; " type="submit" name="kichhoat_luado">Kích hoạt Shop Lửa Đỏ</button>
 </form>
<?}else{?>
<a      target="_blank" href="/?home=help&act=views&views=31&cat=4">Chưa đủ điều kiện kích hoạt Shop Lửa Đỏ</a>
<?}?>



</font><?}?>
<?php if($row_user_mem['level_shop']=='3')
{?><?}else{?><font style="color:red;font-weight:bold" color=red>Đã chứng nhận Shop Lửa Đỏ <span style="color: red;" class="glyphicon glyphicon-fire"></span></font><?}?>
                  </td>

                </tr>
                
                <tr>
                 <td>3.</td>
                  <td>Tổng sản phẩm
</td>
                  <td  >
				  Tổng sản phẩm <b><? echo mysql_num_rows(mysql_query("SELECT * FROM products where user='".$_SESSION['log']."'  "));?></b> -
				 Còn hàng <b> <? echo mysql_num_rows(mysql_query("SELECT * FROM products where user='".$_SESSION['log']."' and tinhtrang='1'  "));?></b>
                
				
                  </td>

                </tr>
                
				 <tr>
                 <td>4.</td>
                  <td>Tổng đơn hàng
</td>
                  <td  >
                   Tổng đơn hàng <b><? echo mysql_num_rows(mysql_query("SELECT * FROM orders where orders_user='".$_SESSION['log']."'  "));?></b> -
				 Đơn hàng chưa duyệt <b> <? echo mysql_num_rows(mysql_query("SELECT * FROM orders where orders_user='".$_SESSION['log']."' and active='0'  "));?></b>
                  </td>

                </tr>
                <tr>
				
              </table>
            </div>
            <!-- /.box-body -->
          </div>
                </div>
                <!-- /.col -->
				<div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"><? echo $row_user_mem['company'];?></h3>
              
            </div>
            <div>
<?php
$ngayhomnay = date("d-m-Y"); //Lấy thời gian hiện tại 
$ngaysosanh = $row_user_mem['goidichvu_ketthuc']; // Năm/Tháng/Ngày
?>			
			
 <?php if (strtotime($ngayhomnay) <= strtotime($ngaysosanh) )
{?>	
 
 			
			<?php if($row_user_mem['goidichvu']=='0'){?>
<a href="dangkydichvu" class="btn btn-block btn-success btn-lg"><i class="fa fa-fw fa-plus-circle"></i>Đăng Ký Gói Dịch Vụ</a>
<?}else{?>
<?php if($row_user_mem['goidichvu']=='1'){?>
<button type="button" class="btn btn-block btn-warning btn-lg"><i class="fa fa-fw fa-hourglass"></i>Gói Khởi Nghiệp</button>
<?}else{?>
<?}?>
<?php if($row_user_mem['goidichvu']=='2'){?>
<button type="button" class="btn btn-block btn-primary btn-lg" style=" background: #673AB7; "><i class="fa fa-fw fa-puzzle-piece"></i>Gói Phát Triển</button>
<?}else{?>
<?}?>
<?php if($row_user_mem['goidichvu']=='3'){?>
<button type="button" class="btn btn-block btn-danger btn-lg"><i class="fa fa-fw fa-paw"></i>Gói Thành Công</button>
<?}else{?>
<?}?>

<?}?>
 
 
<?}else{?>
<a href="dangkydichvu" class="btn btn-block btn-success btn-lg"><i class="fa fa-fw fa-plus-circle"></i>Đăng Ký Gói Dịch Vụ</a>
<?}?>	
 			
			
			
			


			  
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right" style="width: 51.333333%;">
                  <div class="description-block">
                    <h5 class="description-header"> <?php if(strtotime($ngayhomnay) <= strtotime($ngaysosanh))
{?>
<? echo $row_user_mem['goidichvu_batdau'];?>
<?}else{?>
<a  href="dangkydichvu"><b>Đăng ký</b></b> </a>
<?}?>
</h5>
                    <span class="description-text">Ngày kích họạt</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                
                <!-- /.col -->
                <div class="col-sm-4" style="width: 44.333333%;">
                  <div class="description-block">
                    <h5 class="description-header"> <?php if(strtotime($ngayhomnay) <= strtotime($ngaysosanh))
{?>
<? echo $row_user_mem['goidichvu_ketthuc'];?>
<?}else{?>
<a  href="dangkydichvu"><b>Đăng ký</b></b> </a>
<?}?>
</h5>
                    <span class="description-text">Ngày hết hạn</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
				
				
                <!--div class="col-md-4">
                  <p class="text-center">
                    <strong><? echo $row_user_mem['company'];?></strong>
                  </p>

                  <span class="s-icon-shop <?if($row_user_mem['level_shop']=='0'){?>
vip
<?}else{?>
free
<?}?>"></span>

                </div-->
				
				
				
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <!--div class="box-footer">
              <div class="row">
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                  
                    <h5 class="description-header"><?php echo online(); ?></h5>
                    <span class="description-text">Đang truy cập</span>
                  </div>
                  <!-- /.description-block 
                </div>
                <!-- /.col -
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                 
                    <h5 class="description-header"><?php echo today(); ?></h5>
                    <span class="description-text">Hôm nay </span>
                  </div>
                  <!-- /.description-block 
                </div>
                <!-- /.col -
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                  
                    <h5 class="description-header"><?php echo yesterday(); ?></h5>
                    <span class="description-text">Hôm qua</span>
                  </div>
                  <!-- /.description-block -
                </div>
                <!-- /.col --
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block">
                
                   <h5 class="description-header"><?php total(); ?></h5>
                    <span class="description-text">Tổng truy cập</span>
                  </div>
                  <!-- /.description-block --
                </div>
              </div>
              <!-- /.row --
            </div-->
            <!-- /.box-footer -->
          </div>
		  
		 
          <!-- /.box -->
        </div>
        <!-- /.col -->
		       
		<!-- o day-->
      </div>
      <!-- /.row -->
	  
	  <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Thông báo mới nhất <image src="/images/new.gif" ></h3>
 <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                 <a href="lienhe"> Xem tất cả thông báo</a>
                </div>
              </div>
            </div>
			
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th width="85%">Nội dung thông báo</th>
                  <th>Thời gian</th>
                </tr>
				
 
			  <?php
				  
           	$sql="select * from thongbao_shop where user='".$_SESSION['log']."'   order by id desc limit 5";
        	$result=mysql_query($sql);
        	$i=0;
           	while(($row=mysql_fetch_array($result)))
			{
			$i++;
			if ($i%2) $color="#d5d5d5"; else $color="#e5e5e5";
		

  ?>	
                <tr>
				
                 <td><i class="fa fa-fw fa-bell-o" style=" color: red; "></i> <?php echo $row['thongbao'];?> <image src="/images/new.gif" ></td>
                  <td><?php echo $row['date'];?></td>
				 
                </tr>
		      <?
              	}
				
  ?> 		
  
  
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div> 
	  <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Thống kê</h3>
 
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th width="600px">Nội dung thống kê</th>
                  <th>Chỉ số hiện tại</th>
                  <th>Chỉ số Shop Lửa Đỏ <span style="color: red;" class="glyphicon glyphicon-fire"></span></th>
 
                </tr>
                <tr>
                  <td><i class="fa fa-fw fa-lightbulb-o" style=" color: #00a65a; "></i>Số đơn hàng hoàn tất</td>
                  <td><? echo mysql_num_rows(mysql_query("SELECT * FROM orders where orders_user='".$_SESSION['log']."' and active_shop=20 "));?></td>
                  <td>>= 60</td>
 
                </tr>
				<tr>
				<?php
$sql_con1=@mysql_query("SELECT * FROM comment where user='".$_SESSION['log']."' ");
$tong_con1=@mysql_num_rows($sql_con1);
$cnt1=0;
$tongcong1=0;
while($row_con1=mysql_fetch_assoc($sql_con1))
{
?>
<?
$tongcong1=$tongcong1+$row_con1['rate'];
$trungbinh1=$tongcong1/$tong_con1;
$cnt1=$cnt1+1;
}?>
                  <td><i class="fa fa-fw fa-lightbulb-o" style=" color: #00a65a; "></i>Điểm uy tín Shop</td>
                  <td><? echo $tongcong1;?></td>
                  <td>>= 200</td>
 
                </tr>
             <tr>
                  <td><i class="fa fa-fw fa-lightbulb-o" style=" color: #00a65a; "></i>Số lượng khiếu nại</td>
                  <td><? echo mysql_num_rows(mysql_query("SELECT * FROM khieunai where user_shop='".$_SESSION['log']."'"));?></td>
                  <td><=2</td>
 
                </tr>
				 <tr>
                  <td><i class="fa fa-fw fa-lightbulb-o" style=" color: #00a65a; "></i>Số lượng sản phẩm</td>
                  <td><? echo mysql_num_rows(mysql_query("SELECT * FROM products where user='".$_SESSION['log']."'  "));?></td>
                  <td>>=100</td>
 
                </tr>
				
				
	                  
				  				 
				
				
				
				
				
				
				
				
				
 



				 <tr>
				
                  <td><i class="fa fa-fw fa-lightbulb-o" style=" color: red; "></i>Ngày Shop hoạt động (Từ ngày <? echo $row_user_mem['re_time'];?> đến hôm nay là <? echo $date;?>)</td>
                  <td><? echo $layngay;?></td>
                  <td>>=90</td>
 
                </tr>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

      <!-- Main row -->
      
      <!-- /.row -->
    </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->	