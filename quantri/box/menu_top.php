<?
if (isset($_POST['nhangoi1'])) {
	$date = date("d-m-Y");

	$nhangoi1 = "update user_shop set luotup = luotup + 40   where user='".$_SESSION['log']."' ";
	$addcheck = "insert into checknhanup (user,date) values ('".$_SESSION['log']."','".$date."')";
	$thongbao = "insert into thongbao_shop (thongbao,user,date,type) values ('Shop đã nhận thành công 40 Lượt UP ngày hôm nay $date ','".$_SESSION['log']."','".$date."','3')";
		if (mysql_query($nhangoi1) && mysql_query($addcheck) &&  mysql_query($thongbao)  )  {
 
			$err=" <SCRIPT LANGUAGE='JavaScript'>
    window.alert('Nhận 40 Lượt UP thành công')
    window.location.href='home';
    </SCRIPT>";
		}	
		else {
			$err =  "<p align=center class='err'><SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không thành công vui lòng liên hệ trợ giúp')
    window.location.href='home';
    </SCRIPT></p>";
		}
}

///////////////////////////////////////////////////////////2222222////////////////
if (isset($_POST['nhangoi2'])) {
	$date = date("d-m-Y");

	$nhangoi1 = "update user_shop set luotup = luotup + 60   where user='".$_SESSION['log']."' ";
	$addcheck = "insert into checknhanup (user,date) values ('".$_SESSION['log']."','".$date."')";
	$thongbao = "insert into thongbao_shop (thongbao,user,date,type) values ('Shop đã nhận thành công 60 Lượt UP ngày hôm nay $date ','".$_SESSION['log']."','".$date."','3')";
		if (mysql_query($nhangoi1) && mysql_query($addcheck) &&  mysql_query($thongbao)  )  {
 
			$err=" <SCRIPT LANGUAGE='JavaScript'>
    window.alert('Nhận 60 Lượt UP thành công')
    window.location.href='home';
    </SCRIPT>";
		}	
		else {
			$err =  "<p align=center class='err'><SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không thành công vui lòng liên hệ trợ giúp')
    window.location.href='home';
    </SCRIPT></p>";
		}
}

///////////////////////////////////////////////////////////333333333333////////////////
if (isset($_POST['nhangoi3'])) {
	$date = date("d-m-Y");

	$nhangoi1 = "update user_shop set luotup = luotup + 90   where user='".$_SESSION['log']."' ";
	$addcheck = "insert into checknhanup (user,date) values ('".$_SESSION['log']."','".$date."')";
	$thongbao = "insert into thongbao_shop (thongbao,user,date,type) values ('Shop đã nhận thành công 90 Lượt UP ngày hôm nay $date ','".$_SESSION['log']."','".$date."','3')";
		if (mysql_query($nhangoi1) && mysql_query($addcheck) &&  mysql_query($thongbao)  )  {
 
			$err=" <SCRIPT LANGUAGE='JavaScript'>
    window.alert('Nhận 90 Lượt UP thành công')
    window.location.href='home';
    </SCRIPT>";
		}	
		else {
			$err =  "<p align=center class='err'><SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không thành công vui lòng liên hệ trợ giúp')
    window.location.href='home';
    </SCRIPT></p>";
		}
}
?>

<? echo $err;?>
<form method="POST">


  <header class="main-header">

    <!-- Logo -->
    <a href="/" target="_blank"  class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SCT</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Sendo.Vn</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
	
		  
   
<?php
$ngayhomnay = date("d-m-Y"); //Lấy thời gian hiện tại 
$ngaysosanh = $row_user_mem['goidichvu_ketthuc']; // Năm/Tháng/Ngày
$check_chay=mysql_query("SELECT * FROM checknhanup where user='".$_SESSION['log']."' and date = '".$ngayhomnay."'");
$check_in=mysql_fetch_assoc($check_chay);
$checkngay = $check_in['date'];
?>
		  
		  


	<!------------------------tặng gói 1 40------------------->	  
		  
 <?php if (strtotime($ngayhomnay) <= strtotime($ngaysosanh) && $row_user_mem['goidichvu'] == '1' )
{?>

 <?php if (strtotime($checkngay) == strtotime($ngayhomnay) )
{?>
<?}else{?>

<li class="tophome"    ><button type="submit" name="nhangoi1" class="btn btn-block btn-danger" style=" margin-top: 9px; background: red; ">Nhận 40 Lượt UP ngày hôm nay</button></li>

<?}?>	
 
<?}else{?>
<?}?>	
 

<!------------------------tặng gói 2 60------------------->	  
 <?php if (strtotime($ngayhomnay) <= strtotime($ngaysosanh) && $row_user_mem['goidichvu'] == '2' )
{?>

 <?php if (strtotime($checkngay) == strtotime($ngayhomnay) )
{?>
<?}else{?>

<li class="tophome"    ><button type="submit" name="nhangoi2" class="btn btn-block btn-danger" style=" margin-top: 9px; background: red; ">Nhận 60 Lượt UP ngày hôm nay</button></li>

<?}?>	
 
<?}else{?>
<?}?>
   
		  
		  <!------------------------tặng gói 3 90------------------->	  
 <?php if (strtotime($ngayhomnay) <= strtotime($ngaysosanh) && $row_user_mem['goidichvu'] == '3' )
{?>

 <?php if (strtotime($checkngay) == strtotime($ngayhomnay) )
{?>
<?}else{?>

<li class="tophome"    ><button type="submit" name="nhangoi3" class="btn btn-block btn-danger" style=" margin-top: 9px; background: red; ">Nhận 90 Lượt UP ngày hôm nay</button></li>

<?}?>	
 
<?}else{?>
<?}?>

 
 
 
 
 
 
 
 <li class="tophome"><a href="add_products"><i class="fa fa fa-cloud-upload"></i>Đăng sản phẩm</a></li>
                <!--li class="tophome"><a href="/admin/danhsachsp.jsp"><i class="fa fa-list"></i>
Tùy chọn sản phẩm</a>
<ul>

 	<li><a href="/admin/danhmuc.jsp"><i class="fa fa-list-alt"></i> Trang chủ sản phẩm</a></li>
	 	<li><a href="/admin/danhsachsp.jsp"><i class="fa fa-list-alt"></i> Trang chi tiết</a></li>
    <li><a href="/admin/chukysp.jsp"><i class="fa fa-list-alt"></i> Các thuộc tính sản phẩm</a></li>
    <li><a href="/admin/addlogo.jsp"><i class="fa fa-list-alt"></i> Đóng dấu lên ảnh</a></li>
	<li><a href="/admin/addlogo.jsp"><i class="fa fa-list-alt"></i> Tùy chọn nâng cao</a></li>
 </ul>
</li-->
				<li class="tophome"><a href="sanpham"><i class="fa fa-archive"></i> Quản lý sản phẩm </a>
             
                </li> 
				
  <li class="tophome"><a href="java:"><i class="fa fa-support"></i> Hotline hỗ trợ: 0931.052.062</a>

 </li>


		  
		  
	<li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"><? echo mysql_num_rows(mysql_query("SELECT * FROM thongbao_shop where user='".$_SESSION['log']."' and active=0 "));?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Bạn có <? echo mysql_num_rows(mysql_query("SELECT * FROM thongbao_shop where user='".$_SESSION['log']."' and active=0 "));?> thông báo mới</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
				<?php 


$sql_store=mysql_query("SELECT * FROM thongbao_shop where user='".$_SESSION['log']."'  order by id DESC limit 20");
$i=0;

while($row_store=mysql_fetch_array($sql_store))
	
{
$size = getimagesize($row_store['logo']);
if($i=='1')
{
    $class="first";
}
else
{
    $class="";
}
    ?>
                  <li>
                    <a  href="lienhe" >
                     <i class="fa fa-bell-o"></i> <?php echo $row_store['thongbao']; ?>
                    </a>
                  </li>

<?}?>
                </ul>
              </li>
              <li class="footer"><a href="lienhe">Xem tất cả</a></li>
            </ul>
          </li>	  
		  
		  

		  
		  <!--li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"><? echo mysql_num_rows(mysql_query("SELECT * FROM thongbao_shop where user='".$_SESSION['log']."' and active=0 "));?></span>
            </a>
            <ul class="dropdown-menu">


              <li class="header">Bạn có <? echo mysql_num_rows(mysql_query("SELECT * FROM thongbao_shop where user='".$_SESSION['log']."' and active=0 "));?> thông báo mới</li>
              <li>
                <!-- inner menu: contains the actual data 
                <ul class="menu">

				        <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 
                    </a>
                  </li>
				
      
			
                 
                 
                </ul>
				 </li>
				 
              </li>
              <li class="footer"><a href="contact">View all</a></li>
            </ul>
          </li-->
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->

          <!-- User Account: style can be found in dropdown.less -->
          
		  <li class="dropdown user user-menu">

         
            
	 <a href="/<?php echo $row_user_mem['user'];?>" target="_blank" >
	 		  <? if($row_user_mem['logo']=='')
{?>
<img src="/upload/logo/gianhangso.png"  class="user-image" alt="User Image">
<?} else{?>

<img src="/<? echo $row_user_mem['logo'];?>" class="user-image" alt="User Image">
<?}?>

              <span class="hidden-xs">Xem Shop</span></a>




            

          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a title="Thoát" href="thoat" onclick="return confirm('Bạn đồng ý thoát ( Chúc bạn một có một ngày vui vẻ)');" ><i class="fa fa-power-off"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  
  
  
     
 </form>
