<? if(!session_id()) session_start(); ?>
<? require("../system/model/config.php") ?>
<? require("../system/model/common_start.php") ?>
<?
if (isset($_POST['butSub'])) {
	 
	$user = isset($_POST['txtUser']) && is_string($_POST['txtUser']) ? mysql_real_escape_string($_POST['txtUser']) : null;
    $pass = isset($_POST['txtPwd']) && is_string($_POST['txtPwd']) && is_string($_POST['txtPwd']) ? mysql_real_escape_string($_POST['txtPwd']) : null;
	$passadd =   ( md5(md5(md5( md5(md5(md5( addslashes($pass))))))));
	$sql = "select * from user_shop where user='".$user."' and pass='".$passadd."' limit 1";
	$bang=mysql_query($sql);
	$xuat=mysql_fetch_array($bang);
	$level=$xuat['level_shop'];
		if($user!==$xuat['user'] or $passadd!==$xuat['pass'])
	{
		$err="<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Tên đăng nhập hoặc mật khẩu không đúng')
    </SCRIPT>";	
		}
elseif (mysql_num_rows(mysql_query($sql,$con))>0)
	{
		$quyen=$level;
		$log=$user;
		$_SESSION['log']=$user;
		$_SESSION['level']=$level;
		echo "<script>window.location='/quantri'</script>";

	}
else
	{
}
} 
?>



<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mở Gian Hàng Trên sendo.Vn</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Mở Shop</strong> bán hàng trên sendo.Vn</h1>
                            <div class="description">
                            	<p>
	                               <strong>Miễn Phí Vĩnh Viễn Hoàn Toàn</strong> không tốn bất kỳ 1 chi phí nào cho việc Mở Shop
	                            	
	  
                            	</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Đăng nhập vào Shop</h3>
	                            		<p>Nhập tài khoản và mật khẩu để vào quản trị</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-lock"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" action="" method="post" class="login-form">
								<span>	<?
if ($err!='')
{
	echo $err;
}
?></span>
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-username">Tên tài khoản</label>
				                        	<input type="text" name="txtUser" placeholder="Tên tài khoản..." class="form-username form-control" id="form-username">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-">Mật khẩu</label>
				                        	<input type="password" name="txtPwd" placeholder="Mật khẩu..." class="form-password form-control" id="form-password">
				                        </div>
				                        <button type="submit" name="butSub" class="btn">Đăng nhập</button>
				                    </form>
			                    </div>
		                    </div>
		                
		                	<div class="social-login">
	                        	<h3>...Tôi quên mật khẩu...</h3>
	                        	<div class="social-login-buttons">
		                        	
		                        	<a  class="btn btn-link-2" href="/quen-mat-khau-shop.html" >
		                        		<i  class="fa fa-paste"></i> Lấy lại mật khẩu
		                        	</a>
	                        	</div>
	                        </div>
	                        
                        </div>
                        
                        <div class="col-sm-1 middle-border"></div>
                        <div class="col-sm-1"></div>
                        	
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
                        		
	                    
				 
				 <a  href="/dang-ky-gian-hang.html">    <div>
				               <img  src="/images/moshop.png">         <button type="submit" style=" background: #f57420; height: 50px; line-height: 50px; border: none; display: inline-block; text-transform: uppercase; font-weight: bold; color: #fff; position: relative; width: 474px; font-size: 24px; cursor: pointer; ">MỞ SHOP NGAY</button>
				                 
								   
			                 </div>
							 
							 </a>
							 
                        	</div>
							<br>
           <span style=" float: left;color: #eef5f5; "><i class="fa fa-fw fa-plus-square"></i> Miễn phí Mở và duy trì Shop trọn đời</span>
		   							<br>
           <span style=" float: left;color: #eef5f5; "><i class="fa fa-fw fa-user-plus"></i> Tiếp cận cộng đồng khách hàng lớn nhất Việt Nam</span>
		   					<br>
           <span style=" float: left;color: #eef5f5; "><i class="fa fa-fw fa-truck"></i> Cung cấp dịch vụ hỗ trợ vận chuyển và thanh toán toàn quốc</span>
		   		   					<br>
           <span style=" float: left;color: #eef5f5; "><i class="fa fa-fw fa-send"></i> Công cụ quản lý bán hàng đầy đủ tính năng dể sử dụng </span>
		   		   		   					<br>
           <span style=" float: left;color: #eef5f5; "><i class="fa fa-fw fa-money"></i> Shop chỉ việc đăng bán sản phẩm và nhận tiền </span>	
		   <br>
           <span style=" float: left;color: #eef5f5; "><i class="fa fa-fw fa-magnet"></i> Hoàn toàn chủ động quản lí sản phẩm </span>		\
		   <br>
           <span style=" float: left;color: #eef5f5; "><i class="fa fa-fw fa-shield"></i> Bảo vệ hàng hóa & tiền của bạn </span>	
		   <br>
           <span style=" float: left;color: #eef5f5; "><i class="fa fa-fw fa-support"></i> Trung tâm Chăm sóc Khách hàng luôn sẵn sàng khi bạn cần </span>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>

        <!-- Footer -->
        <footer>
        	<div class="container">
        		<div class="row">
        			
        			<div class="col-sm-8 col-sm-offset-2">
        				<div class="footer-border"></div>
        				<p> Được bảo trợ bởi <strong>SENDO</strong>
        					 <i class="fa fa-smile-o"></i></p>
        			</div>
        			
        		</div>
        	</div>
        </footer>

        <!-- Javascript -->

        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>