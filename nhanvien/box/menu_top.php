 

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
      <span class="logo-lg"><b>SENDO.Vn</b></span>
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
	
		  
   
 
 
 
 
 
				 
	 


		  
		  
	 
		  
		  

		  
		  <!--li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="label label-warning"><? echo mysql_num_rows(mysql_query("SELECT * FROM thongbao_shop where user='".$_SESSION['log']."' and active=0 "));?></span>
              <i class="fa fa-bell-o"></i>
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
          
		  
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a title="Thoát" href="/nhanvien/index.php?act=logout_nhanvien" onclick="return confirm('Bạn đồng ý thoát ( Chúc bạn một có một ngày vui vẻ)');" ><i class="fa fa-power-off"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  
  
  
     
 </form>
