   

   <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
		<? if($row_user_mem['logo']=='')
{?>
<img src="/upload/logo/gianhangso.png"  class="img-circle" alt="User Image">
<?} else{?>

<img src="/<? echo $row_user_mem['logo'];?>" class="img-circle" alt="User Image">
<?}?>


          <!--img src="/<? echo $row_user_mem['logo'];?>" class="img-circle" alt="User Image"-->
        </div>
        <div class="pull-left info">
          <p><a style=" color: red; " target="_blank" href="/<? echo $row_user_mem['user'];?>"> <? echo $row_user_mem['company'];?> </a></p>

        </div>
      </div>
      <!-- search form -->
      
	      <!-- /.search form -->
	 <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">

        <li class="active treeview">
          <a href="home">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
     
            </span>
          </a>

        </li>
        <li class="treeview">
          <a href="add_products">
            <i class="fa fa-paper-plane"></i>
            <span> Đăng sản phẩm</span>
 
          </a>

        </li>
		<li class="treeview">
          <a href="sanpham">
           <i  class="fa fa-database"></i>
            <span>Quản lý sản phẩm</span>

          </a>

        </li>
         <!--li class="treeview">
          <a href="#">
            <i class="fa fa-desktop"></i>
            <span>Giao diện & Module</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="thaydoitem"><i class="fa fa-magic"></i> Mẫu cài đặt nhanh</a></li>
			 <li><a href="web_style"><i class="fa fa-image"></i> Logo,Banner</a></li>
			  <li><a href="nenweb"><i class="fa fa-image"></i> Nền website</a></li>
			            <li><a href="slider"><i class="fa fa-image"></i> Slider Show</a></li>
						 <li><a href="module"><i class="fa fa-gears"></i> Cài đặt Module</a></li>
            <li><a href="module_menu"><i class="fa fa-plus"></i> Menu Top</a></li>
			 <li><a href="chanweb"><i class="fa fa-bars"></i> Chân website</a></li>
			  <li><a href="caidatlienhe"><i class="fa fa-bars"></i> Sửa trang liên hệ</a></li>
			  <li><a href="tunhapcss"><i class="fa fa-code"></i> Tự nhập CSS</a></li>
          </ul>
        </li>
       
						 <li class="treeview">
          <a href="news">
            <i class="fa  fa-retweet"></i>
            <span>Quản lý tin tức</span>
            <span class="pull-right-container">
			 <i class="fa fa-angle-left pull-right"></i>
         <ul class="treeview-menu">
            <li><a href="news"><i class="fa fa fa-book"></i> Danh sách tin tức</a></li>
            <li><a href="news_cat"><i class="fa fa fa-folder"></i> Danh mục tin tức</a></li>
          </ul>
            </span>
          </a>
          
        </li-->
		
		 <li class="treeview">
          <a href="donhang">
            <i class="fa fa-shopping-cart"></i>
            <span>Quản lý đơn hàng</span>
            <span class="pull-right-container">
           
            </span>
          </a>
         
        </li>
        <!--li class="treeview">
          <a href="linkweb">
            <i class="fa  fa-retweet"></i>
            <span>Quản lý liên kết</span>
            <span class="pull-right-container">
        
            </span>
          </a>
          
        </li>
		 <li class="treeview">
          <a href="popup">
            <i class="fa   fa-empire"></i>
            <span>Quản lý quảng cáo</span>
            <span class="pull-right-container">
        
            </span>
          </a>
          
        </li>

        <!--li class="treeview">
          <a href="change_domain">
            <i class="fa fa-firefox"></i> <span>Quản lý tên miền</span>
            <span class="pull-right-container">
   
            </span>
          </a>
        
        </li-->
        <li class="treeview">
          <a href="web_config">
            <i class="fa fa-table"></i> <span>Thông tin Shop</span>
            <span class="pull-right-container">
         
            </span>
          </a>
          
        </li>
        <!--li>
          <a href="hotro">
            <i class="fa fa-support"></i> <span>Hỗ trợ trực tuyến</span>
          </a>
        </li>
		 <li>
          <a href="google_seo">
            <i class="fa fa-external-link-square"></i> <span>Cấu hình Google SEO</span>
          </a>
        </li>
        <li>
          <a href="google_analytics">
            <i class="fa fa-external-link-square"></i> <span>Cấu hình Google Analytics</span>
          </a>
        </li-->
		
        <li class="treeview">
          <a   href="thaydoimatkhau">
            <i class="fa fa-edit"></i> <span>Thay đổi mật khẩu</span>
            <span class="pull-right-container">
  
            </span>
          </a>
        
        </li>
		
		
		
		<li>
          <a href="dichvuquangcao">
            <i class="fa  fa fa-bullhorn"></i>
            <span>Dịch vụ sendo.Vn</span>
            <span class="pull-right-container">
			 <i class="fa fa-angle-down pull-right"></i>
         <ul class="treeview-menu">
            <li><a href="dangkydichvu"><i class="fa fa-database"></i> Đăng ký dịch vụ</a></li>
            <!--li><a href="dichvuquangcao"><i class="fa fa fa-star-half-empty"></i> Dịch vụ quảng cáo</a></li-->
		
			<li><a href="dichvukhac"><i class="fa fa-fw fa-rocket"></i> Mua lượt UP</a></li>
          </ul>
            </span>
          </a>
          
        </li>
		<li>
          <a href="dichvuquangcao">
            <i class="fa  fa fa-cog"></i>
            <span>Cấu hình dịch vụ</span>
            <span class="pull-right-container">
			 <i class="fa fa-angle-down pull-right"></i>
         <ul class="treeview-menu">
            <li><a id="dangkydichvu" href="cauhinhdiemlua"><i class="glyphicon glyphicon-fire" style=" color: red; "></i> Điểm Lửa Đỏ</a></li>
            <li><a  id="dangkydichvu" href="cauhinhphivanchuyen"><i class="fa fa-fw fa-truck"></i> Hỗ trợ phí vận chuyển</a></li>
          </ul>
            </span>
          </a>
          
        </li>
         <!--li><a href="active_vip"><i class="fa fa-diamond"></i> <span>Quản lý Shop Lửa Đỏ</span>
				  
		</a></li-->
        <!--li><a href="thanhvien"><i class="fa fa fa-user"></i> <span>Quản lý thành viên</span>
				  <span class="pull-right-container">
              <small class="label pull-right bg-yellow"><? echo mysql_num_rows(mysql_query("SELECT * FROM user_shop where reg_user='".$_SESSION['log']."' "));?></small>
            </span>
		</a></li-->
		 <li><a href="ngansach"><i class="fa fa-money"></i> <span>Ngân sách</span>
		  <span class="pull-right-container">
              <small class="label pull-right bg-red"><? echo number_format($row_user_mem['tien'],0);?>đ</small>
            </span>			
		 </a>		 
		 </li>
		 
		   <!--li><a id="quanlyfile" href="/filemanage/ckfinder/ckfinder.html?langCode=vi"><i class="fa fa-file"></i> <span>Quản lý Hình Ảnh</span>
		   </a></li-->
       
      </ul>
	  
    </section>
    <!-- /.sidebar -->
  </aside>