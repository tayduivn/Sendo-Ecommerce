



<?
echo $_SESSION["session_message"];
$_SESSION["session_message"] = "";
$MAXPAGE=10;
?>
<section class="content-header">
      <h1>
        Quản lý rút tiền
      
      </h1>
	  
 

	  
      <ol class="breadcrumb">
       <button  id="myBtn" type="submit" value="UP" title="Up Khuyến Mãi" name="themvaokhuyenmai" style="
    float: right;
    color: #ffffff;
    font-size: 15px;
    font-weight: 600;
    text-transform: uppercase;
    text-decoration: none;
    line-height: 26px;
    margin-left: 20px;
    background: #dd4b39;
    border-radius: 4px;
    border: 1px solid #35b8fe;
    "><i class="fa fa-fw fa-bank"></i> RÚT TIỀN VỀ NGÂN HÀNG</button>
       
      </ol>
	  
    </section>
	<br>
	
<!-- bắt đầu-->
<?php
if (isset($_POST['xuly'])) {
		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			$pro=GetProductInfo($id);
			if ($pro)
			{
				@$result = mysql_query("update user_shop set trangthaihoahong=1 where id='".$id."'");
				if ($result) {
					$cnt++;

				}
			}
		}
		echo "<p align=center class='err'>Đã xử lý ".$cnt." đơn hàng</p>";
	}
	?>
<?
	$page = $_GET["page"];
	$p=0;
	if ($page!='') $p=$page;
	$where="1=1";
	//if ($_REQUEST['status']!='') $where="products_status=".$_REQUEST['status']." ";
	if ($_REQUEST['cat']!='') $where="company_cat=".$_REQUEST['cat'];
?>
<form  method="POST" name="frmList" action="index.php">
<input type=hidden name="page" value="<? echo $page; ?>">
<?
function taotrang($total,$link,$nitem,$itemcurrent,$step=5)
{	global $con;
	$ret="";
	
	$param="";
	$pages=count_page($total,$nitem);
	if ($itemcurrent>0) $ret.='<a title="&#272;&#7847;u tiên" href="'.$link.'0" class="button_link" style="
    padding: 1px 7px;
    background-color: #fff;
    text-decoration: none;
    color: #555555;
    border: 1px solid #626161;
    margin-right: 8px;
">Đầu tiên</a> ';
	if ($itemcurrent>1) $ret.='<a title="V&#7873; tr&#432;&#7899;c" href="'.$link.($itemcurrent-1).'" class="button_link" style="
    padding: 1px 7px;
    background-color: #fff;
    text-decoration: none;
    color: #555555;
    border: 1px solid #626161;
    margin-right: 8px;
">Trang trước</a> ';
	$from=($itemcurrent-$step>0?$itemcurrent-$step:0);
	$to=($itemcurrent+$step<$pages?$itemcurrent+$step:$pages);
	for ($i=$from;$i<$to;$i++)
	{
		if ($i!=$itemcurrent) $ret.='<a href="'.$link.$i.'" class="button_link" style="
    padding: 1px 7px;
    background-color: #fff;
    text-decoration: none;
    color: #555555;
    border: 1px solid #626161;
    margin-right: 8px;
">'.($i+1).'</a> ';
		else $ret.='<a class="active" style="
    padding: 1px 7px;
    background-color: #0d84e8;
    text-decoration: none;
    color: #FFFFFF;
    border: 1px solid #626161;
    margin-right: 7px;
">'.($i+1).'</a> ';
	}
	if (($itemcurrent<$pages-2) && ($pages>1)) $ret.='<a class="button_link" style="
    padding: 1px 7px;
    background-color: #fff;
    text-decoration: none;
    color: #555555;
    border: 1px solid #626161;
    margin-right: 8px;
" title="Ti&#7871;p theo" href="'.$link.($itemcurrent+1).'">Tiếp theo</a> ';
	if ($itemcurrent<$pages-1) $ret.='<a class="button_link" style="
    padding: 1px 7px;
    background-color: #fff;
    text-decoration: none;
    color: #555555;
    border: 1px solid #626161;
    margin-right: 8px;
" title="Cu&#7889;i cùng" href="'.$link.($pages-1).'">Cuối cùng</a>'; 
	return $ret;
}
?>

<?if($_REQUEST['cat']=='')
{?>
<?
	$pageindex=taotrang(CountRecord("user_shop",$where),"./?act=ruttien&page=",$MAXPAGE,$page);
?>
<?}else{?>
<?
	$pageindex=taotrang(CountRecord("user_shop",$where),"./?act=ruttien&page=".$_REQUEST['cat']."/",$MAXPAGE,$page);
?>
<?}?>
  <?php
  			$sql_user=mysql_query("SELECT * FROM user_shop where user='".$_SESSION['log']."' ");
			$row_user=mysql_fetch_assoc($sql_user);
			?>
	<section class="content">
		 <div class="row">
        <div class="col-md-6" style=" width: 100%; ">
          <div class="box">
            <div class="box-header">
			<i class="fa fa-money"></i>
              <h3 class="box-title">Quản lý Tổng ngân sách trên ShopCanTho.Vn</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th style="width: 10px">TT</th>
                  <th>Ngân sách</th>
                  
                  <th style="width: 40px">Tổng cộng</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td><b>Tổng số dư khả dụng</b></td>
               
                  <td><span class="badge bg-green"><? echo number_format($row_user_mem['tien'],0);?>đ</span></td>
                </tr>
				<tr>
                  <td>2</td>
                  <td>Số dư đóng băng</td>
               
                  <td><span class="badge bg-red"><? echo number_format($row_user_mem['tiendongbang'],0);?>đ</span></td>
                </tr>
 
				 
				<tr>
                  <td>3.</td>
                  <td>Tổng ngân sách rút ra</td>
               
                  <td><span class="badge bg-blue" style=" background: #9C27B0 !important; "><? echo number_format($row_user_mem['tongtienrut'],0);?>đ</span></td>
                </tr>
				
 
 
  

 
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

      
        <!-- /.col -->
      </div>


					
			
		<div class="row">
		
		<div class="col-xs-12">
		
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lịch sử giao dịch</h3>

              <div class="box-tools">

             
<tr>
<td class="smallfont" >Trang : <? echo $pageindex; ?></td>

	
</tr>
	
              </div>
            </div>
			
	
			
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
			
              <table class="table table-hover">
                <tr>
                 
				  <th  >Mã giao dịch</th>
              
                  <th  >Ngày giao dịch</th>
                  <th>Chủ tài khoản</th>
				   <th>Số tài khoản</th>
				    <th>Tên ngân hàng</th>
					 <th>Chi nhánh</th>
					  <th>Tỉnh / Thành phố</th>
					  <th>Số tiền cần rút</th> 
					  <th>Phí chuyển khoản</th> 
					  <th>Tổng tiền</th>
					   <th>Tình trạng</th>
                  
                </tr>
  <?php
           	$sql="select * from ruttien where $where and user='".$_SESSION['log']."' order by id desc limit ".($p*$MAXPAGE).",".$MAXPAGE;
        	$result=mysql_query($sql,$con);
			
        	$i=0;
           	while(($row=mysql_fetch_array($result)))
			{
			$i++;
			if ($i%2) $color="#d5d5d5"; else $color="#e5e5e5";
            $tongtien = $row['sotienrut_bank'] + $row['phichuyenkhoan'];
  ?>
  
  

                <tr>
               
				  <td><? echo $row['id']; ?></td>
				 
                  <td><? echo $row['date']; ?></td>
                  <td><? echo $row['user_bank']; ?></td>
				   <td><? echo $row['stk_bank']; ?></td>
				   <td><? echo $row['ten_bank']; ?></td>
				   <td><? echo $row['chinhannh_bank']; ?></td>
				   <td><? echo $row['tinh_bank']; ?></td>
				   <td><? echo number_format($row['sotienrut_bank']); ?>đ</td>
				   <td><? echo number_format($row['phichuyenkhoan']); ?>đ</td>
				   <td><? echo number_format($tongtien); ?>đ</td>
				   <td><? echo $row['tinhtrang']; ?></td>
				   
                 
  </td>
  </tr>
  <?
              	}
  ?>

</table>
</form>
<script language="JavaScript">
function chkallClick(o) {
  	var form = document.frmList;
	for (var i = 0; i < form.elements.length; i++) {
		if (form.elements[i].type == "checkbox" && form.elements[i].name!="chkall") {
			form.elements[i].checked = document.frmList.chkall.checked;
		}
	}
}
</script>	
	

                </tr>
               
		
              </table>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
		</div>


 </section>		

		
	</form>		
			
<!--table cellspacing="0" cellpadding="0" width="100%">
<? if ($_REQUEST['code']==1) echo '<tr><td colspan="2" align="center" class="err">&#272;ã c&#7853;p nh&#7853;t thành công</td></tr>'; ?>
<tr>
<td class="smallfont">
<div class="page">
Trang : <? echo $pageindex; ?>
</div>
</td>
<td height="30" align="right" class="smallfont">
	</td>
</tr>
</table>

<table border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#EDEDED" width="100%" id="AutoNumber1">
  <tr class="dash-sub-menu">

  <td align="center" nowrap class="title"><b>ID</b></td>
	<td align="center" nowrap class="title"><b>Trạng thái</b></td>
	 <td align="center" nowrap class="title"><b>Tài khoản </b></td>
	 <td align="center" width="200" nowrap class="title"><b>Công ty/Cửa hàng</b></td>
    <td align="center" nowrap class="title"><b>Tỉnh thành</b></td>
    <td align="center" nowrap class="title"><b>Lĩnh vực</b></td>
	<td align="center" nowrap class="title">Điện thoại</td>
	<td align="center" nowrap class="title">Hoa hồng</td>
	<td align="center" nowrap class="title">Ngày đăng ký</td>
	<td align="center" nowrap class="title">Ngày kích hoạt</td>

  </tr>
  
  <?php
           	$sql="select * from user_shop where $where and reg_user='".$_SESSION['log']."' order by id desc limit ".($p*$MAXPAGE).",".$MAXPAGE;
        	$result=mysql_query($sql,$con);
        	$i=0;
           	while(($row=mysql_fetch_array($result)))
			{
			$i++;
			if ($i%2) $color="#d5d5d5"; else $color="#e5e5e5";
			$catinfo=GetCatInfo($row['cat_mem']);
			$cityinfo=GetCityInfo($row['city']);
  ?>
  
  <tr class="table_a" onmouseout="this.className='table_a'" onmouseover="this.className='table_a1'">

     <td align="center" class="smallfont"><? echo $row['id']; ?>&nbsp;</td>
	 <td align="center" class="smallfont"><?if($row['active']=='0'){?><img src="/quantri/css/un_active.png"><?}else{?><img src="/quantri/css/active.png"><?}?>&nbsp;</td>
	 
	<td align="center" class="smallfont"><a href="http://<? echo $row['user']; ?>.<? echo $domain_config; ?>" target="_blank"><? echo $row['user']; ?>&nbsp;</td>
	<td class="td_sanpham">
	<? echo $row['company']; ?>
	</td>
    <td  class="td_sanpham"><?if($row['city']=='0'){?>Toàn quốc<?}else{?><? echo $cityinfo['name']; ?><?}?>&nbsp;</td>
    <td align="center" class="smallfont"><? echo $catinfo['name']; ?>&nbsp;</td>
    <td align="center"  class="quickaction">
	<font color="red"><b><? echo $row['phone']; ?></b></font>
    </td>
	    <td align="center"  class="quickaction">
	<font color="blue"><b><?php if($row['active']=='0')
{?><?}else{?><font color=blue>100.000 VNĐ</font><?}?>
<?php if($row['active']=='1')
{?><?}else{?><font color=red>Chưa kích hoạt VIP</font><?}?></b></font>
    </td>
	<td align="center"  class="smallfont">
    <? echo $row['re_time']; ?></td>
	<td align="center"  class="smallfont">
    <? echo $row['pay_time']; ?></td>
  </tr>
  <?
   }
  ?>

</table>

	<tr>
		<td>
</td>



		<td align="right">
       </td>


	</tr>
</table-->





<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 50px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width:50%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}

.modal-body {padding: 0px 0px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}
</style>
</head>
<body>

 

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">×</span>
      <h2>RÚT TIỀN</h2>
    </div>
    <div class="modal-body">
<div class="box box-info">
       
			<div class="box-body">
              <table class="table table-bordered">
                <tbody><tr style=" background: #2196F3; color: #fff; ">
 
                  <th>  <center>Thông tin số dư</th>
                  <th>  <center>Số dư đóng băng</th>
                  <th >  <center>Số dư khả dụng</th>
                </tr>
                <tr style="background: #E3EEF9;color: #2196f3;">
                
                  <td>  <center><? echo number_format($row_user_mem['tien'],0);?><span style="
    vertical-align: super;
        font-size: 11px;
">đ</span></td>
                   <td>  <center><? echo number_format($row_user_mem['tiendongbang'],0);?><span style="
    vertical-align: super;
        font-size: 11px;
">đ</span></td>
                  <td>   <center><? echo number_format($row_user_mem['tien'],0);?><span style="
    vertical-align: super;
        font-size: 11px;
">đ</span> </td>
                </tr>
 
 
              </tbody></table>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<?
		// Đang còn hàng..click hết hàng
if (isset($_POST['save_bank'])) {
	date_default_timezone_set("Asia/Ho_Chi_Minh");
$dateposted1 = date("d-m-Y H:i:s");
$user_bank = $_POST['user_bank'];
$stk_bank= $_POST['stk_bank'];
$ten_bank= $_POST['ten_bank'];
$chinhannh_bank= $_POST['chinhannh_bank'];
$tinh_bank= $_POST['tinh_bank'];
$sotienrut_bank= $_POST['sotienrut_bank'];
 
 $sotienrut_bank1 = number_format($sotienrut_bank);
$sotienrut_bankaddin = ($sotienrut_bank + 11000);

$sotienrut_bankadd = number_format($sotienrut_bank + 11000);
$user_shop= $_SESSION['log'];
 









if($row_user_mem['tien'] >= $sotienrut_bankaddin ){	

 

 $sql_conhang_1 = "update user_shop set tien =  tien - '".$sotienrut_bankaddin."' , tiendongbang =  tiendongbang+'".$sotienrut_bankaddin."' where   user='".$_SESSION['log']."' ";	
 $sql_conhang_2 = "INSERT INTO lichsugiaodich (noidung, date, user) VALUES ('Shop bị trừ <b>$sotienrut_bankadd VNĐ</b> yêu cầu lệnh rút tiền về Ngân Hàng','$dateposted1','$user_shop')";
 $sql_conhang_3 = "INSERT INTO thongbao_shop (thongbao, date, user) VALUES ('Shop đã yêu cầu lệnh Rút tiền về Ngân Hàng <b> $ten_bank - $stk_bank </b>' ,'$dateposted1','$user_shop')";
  $sql_conhang_4 = "INSERT INTO ruttien (date, user,user_bank,stk_bank,ten_bank,chinhannh_bank,tinh_bank,sotienrut_bank,phichuyenkhoan,tinhtrang) VALUES ('$dateposted1','$user_shop','$user_bank','$stk_bank','$ten_bank','$chinhannh_bank','$tinh_bank','$sotienrut_bank','11000','Chờ duyệt')";
 if (mysql_query($sql_conhang_1) && mysql_query($sql_conhang_2) && mysql_query($sql_conhang_3) && mysql_query($sql_conhang_4) ) {
			
			
				echo "<SCRIPT LANGUAGE='JavaScript'>
   window.alert('Gửi lệnh yêu cầu rút tiền thành công')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";
		}	
		else {
				echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Thao tác không thành công')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";
		}
					}else{
 echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không đủ Ngân Sách Số tiền rút $sotienrut_bank1 VNĐ + Phí Chuyển Khoản 11,000đ = ($sotienrut_bankadd)')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";
		
					}	
		
	
  	


}
		?>
		<? echo $err;?>
            <form class="form-horizontal" name="checka" method="POST" onsubmit="return check2222()" >
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" style=" width: 35%; " class="col-sm-2 control-label"> Tên chủ tài khoản ngân hàng</label>

                  <div class="col-sm-10" style=" width: 50%; ">
                    <input name="user_bank"  type="text" class="form-control"   placeholder="Chủ tài khoản">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" style=" width: 35%; " class="col-sm-2 control-label">Số tài khoản ngân hàng</label>

                  <div class="col-sm-10" style=" width: 50%; ">
                    <input name="stk_bank" type="text" class="form-control"   placeholder="Số tài khoản">
                  </div>
                </div>
				
				 <div class="form-group">
                  <label for="inputPassword3" style=" width: 35%; " class="col-sm-2 control-label"> Tên ngân hàng</label>

                  <div class="col-sm-10" style=" width: 50%; ">
                    <select name="ten_bank" id="MainContent_drbankname" class="form-control">
						<option value="" >Chọn Ngân Hàng</option>
		<option value="Vietcombank">Vietcombank</option>
		<option value="EximBank">EximBank</option>
		<option value="DongA">DongA Bank</option>
		<option value="Techcombank">Techcombank</option>
		<option value="VIB">VIB</option>
		<option value="SaiGonBank">SaiGonBank</option>
		<option value="Agribank">Agribank</option>
		<option value="TienPhongBank">TienPhongBank</option>
		<option value="VietinBank">VietinBank</option>
		<option value="Maritime">Maritime Bank</option>
		<option value="SacomBank">SacomBank</option>
		<option value="ACBBank">ACBBank</option>
		<option value="MBBank">MBBank</option>
		<option value="HDBank">HDBank</option>
		<option value="VPBank">VPBank</option>
		<option value="NamABank">NamABank</option>
		<option value="Visa">Visa</option>
		<option value="MasterCard">MasterCard</option>
		<option value="JCB">JCB</option>
		<option value="BIDV">BIDV</option>
		<option value="Bac A Bank">Bac A Bank</option>
		<option value="First Bank">First Bank</option>
		<option value="Gia Dinh Bank">Gia Dinh Bank</option>
		<option value="GPBank">GPBank</option>
		<option value="Great Asia">Great Asia</option>
		<option value="Great Trust">Great Trust</option>
		<option value="HaBuBank">HaBuBank</option>
		<option value="KienLongBank">KienLongBank</option>
		<option value="Lien Viet Bank">Lien Viet Bank</option>
		<option value="My Xuyen Bank">My Xuyen Bank</option>
		<option value="NamViet Bank">NamViet Bank</option>
		<option value="Ocean Bank">Ocean Bank</option>
		<option value="Pacific Bank">Pacific Bank</option>
		<option value="Petrolimex">Petrolimex</option>
		<option value="Phuong Dong">Phuong Dong</option>
		<option value="Phuong Nam">Phuong Nam</option>
		<option value="SCB">SCB</option>
		<option value="SeaBank">SeaBank</option>
		<option value="SHB">SHB</option>
		<option value="VDB">VDB</option>
		<option value="Viet A Bank">Viet A Bank</option>
		<option value="Western Bank">Western Bank</option>
		<option value="ANZ">ANZ</option>
		<option value="Standard Chartered">Standard Chartered</option>
		<option value="CitiBank">CitiBank</option>
		<option value="HSBC">HSBC</option>
		<option value="PGBank">PGBank</option>
		<option value="AnBinhBank">AnBinhBank</option>
		<option value="DaiA Bank">DaiA Bank</option>
		<option value="LienViet PostBank">LienViet PostBank</option>
		<option value="VNCB Bank">VNCB Bank</option>
		<option value="VisaInstallment">VisaInstallment</option>
		<option value="MasterInstallment">MasterInstallment</option>
		<option value="JCBInstallment">JCBInstallment</option>

	</select>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputPassword3" style=" width: 35%; " class="col-sm-2 control-label"> Chi nhánh ngân hàng</label>

                  <div class="col-sm-10" style=" width: 50%; ">
                    <input name="chinhannh_bank" type="text" class="form-control" id="inputPassword3" placeholder="Chi nhánh">
                  </div>
                </div>		
				<div class="form-group">
                  <label for="inputPassword3" style=" width: 35%; " class="col-sm-2 control-label">Tỉnh / Thành phố</label>

                  <div class="col-sm-10" style=" width: 50%; ">
                   <select name="tinh_bank" id="MainContent_drprovince"  class="form-control">
	     <option value="Cần Thơ">Cần Thơ</option>
		<option value="Hồ Chí Minh">Hồ Chí Minh</option>
		<option value="Hà Nội">Hà Nội</option>
		<option value="An Giang">An Giang</option>
		<option value="Bắc Cạn">Bắc Cạn</option>
		<option value="Bắc Giang">Bắc Giang</option>
		<option value="Bạc Liêu">Bạc Liêu</option>
		<option value="Bắc Ninh">Bắc Ninh</option>
		<option value="Bến Tre">Bến Tre</option>
		<option value="Bình Định">Bình Định</option>
		<option value="Bình Phước">Bình Phước</option>
		<option value="Bình Thuận">Bình Thuận</option>
		<option value="Cà Mau">Cà Mau</option>
		<option value="Cao Bằng">Cao Bằng</option>
		<option value="Đà Nẵng">Đà Nẵng</option>
		<option value="DakLak">DakLak</option>
		<option value="Điện Biên">Điện Biên</option>
		<option value="Đồng Nai">Đồng Nai</option>
		<option value="Gia Lai">Gia Lai</option>
		<option value="Hà Giang">Hà Giang</option>
		<option value="Hà Nam">Hà Nam</option>
		<option value="Hà Tây">Hà Tây</option>
		<option value="Hà Tĩnh">Hà Tĩnh</option>
		<option value="Hải Dương">Hải Dương</option>
		<option value="Hải Phòng">Hải Phòng</option>
		<option value="Hòa Bình">Hòa Bình</option>
		<option value="Khánh Hòa">Khánh Hòa</option>
		<option value="Lai Châu">Lai Châu</option>
		<option value="Lâm Đồng">Lâm Đồng</option>
		<option value="Lạng Sơn">Lạng Sơn</option>
		<option value="Lào Cai">Lào Cai</option>
		<option value="Long An">Long An</option>
		<option value="Nam Định">Nam Định</option>
		<option value="Nghệ An">Nghệ An</option>
		<option value="inh Thuận">Ninh Thuận</option>
		<option value="Phú Thọ">Phú Thọ</option>
		<option value="Phú Yên">Phú Yên</option>
		<option value="Quảng Bình">Quảng Bình</option>
		<option value="Quảng Nam">Quảng Nam</option>
		<option value="Quảng Ngãi">Quảng Ngãi</option>
		<option value="Quảng Ninh">Quảng Ninh</option>
		<option value="Quảng Trị">Quảng Trị</option>
		<option value="Sóc Trăng">Sóc Trăng</option>
		<option value="Tây Ninh">Tây Ninh</option>
		<option value="Thái Bình">Thái Bình</option>
		<option value="Thái Nguyê">Thái Nguyên</option>
		<option value="Thanh Hóa">Thanh Hóa</option>
		<option value="Huế">Huế</option>
		<option value="Tiền Giang">Tiền Giang</option>
		<option value="Trà Vinh">Trà Vinh</option>
		<option value="Tuyên Quang">Tuyên Quang</option>
		<option value="Kiên Giang">Kiên Giang</option>
		<option value="Vĩnh Phúc">Vĩnh Phúc</option>
		<option value="Vũng Tàu">Vũng Tàu</option>
		<option value="Yên Bái">Yên Bái</option>
		<option value="Vĩnh Long">Vĩnh Long</option>
		<option value="Bình Dương">Bình Dương</option>
		<option value="DakNong">DakNong</option>
		<option value="Đồng Tháp">Đồng Tháp</option>
		<option value="Hưng Yên">Hưng Yên</option>
		<option value="Kon Tum">Kon Tum</option>
		<option value="Ninh Bình">Ninh Bình</option>
		<option value="Sơn La">Sơn La</option>
		<option value="Hậu Giang">Hậu Giang</option>

	</select>
                  </div>
                </div>
               <div class="form-group">
                  <label for="inputPassword3" style=" width: 35%; " class="col-sm-2 control-label"><b >Số tiền cần rút</b></label>

                  <div class="col-sm-10" style=" width: 50%; ">
                    <input name="sotienrut_bank" type="number" class="form-control" id="inputPassword3" placeholder="Nhập số tiền cần rút"  >
                  </div>
                </div>
				 <div class="form-group">
                  <label for="inputPassword3" style=" width: 35%; " class="col-sm-2 control-label">Phí chuyển khoản</label>

                  <div class="col-sm-10" style=" width: 50%; ">
                    <input  value="11,000đ" type="text" class="form-control"    disabled>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
 
              <button name="save_bank"   type="submit" class="btn btn-info pull-right" style="
    margin-right: 224px;
">Đồng ý</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
    </div>
 
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


<script language="javascript" type="text/javascript">
function check2222()
{


if(document.checka.user_bank.value =="")
{
alert("Vui lòng nhập Tên chủ tài khoản ngân hàng");
document.checka.user_bank.focus();
return false;
}


if(document.checka.stk_bank.value =="")
{
alert("Vui lòng nhập Số tài khoản ngân hàng");
document.checka.stk_bank.focus();
return false;
}

if(document.checka.ten_bank.value =="")
{
alert("Vui lòng chọn Ngân hàng");
document.checka.ten_bank.focus();
return false;
}


if(document.checka.chinhannh_bank.value =="")
{
alert("Vui lòng nhập Chi nhánh ngân hàng");
document.checka.chinhannh_bank.focus();
return false;
}

if(document.checka.sotienrut_bank.value =="")
{
alert("Vui lòng nhập Số tiền cần rút");
document.checka.sotienrut_bank.focus();
return false;
}

if(document.checka.sotienrut_bank.value <"100000")
{
alert("Số tiền cần rút phải từ 100,000d trở lên");
document.checka.sotienrut_bank.focus();
return false;
}


return true;
}
</script>