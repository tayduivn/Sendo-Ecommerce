



<?
echo $_SESSION["session_message"];
$_SESSION["session_message"] = "";
$MAXPAGE=10;
?>
<section class="content-header">
      <h1>
        Quản lý nạp tiền
      
      </h1>
	  
 

 
	  
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
	$pageindex=taotrang(CountRecord("user_shop",$where),"./?act=naptien&page=",$MAXPAGE,$page);
?>
<?}else{?>
<?
	$pageindex=taotrang(CountRecord("user_shop",$where),"./?act=naptien&page=".$_REQUEST['cat']."/",$MAXPAGE,$page);
?>
<?}?>
  <?php
  			$sql_user=mysql_query("SELECT * FROM user_shop where user='".$_SESSION['log']."' ");
			$row_user=mysql_fetch_assoc($sql_user);
			?>
	<section class="content">
		 


					
			
		<div class="row">
		
		<div class="col-md-6" style="
    width: 100%;
">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Hướng dẫn nạp tiền vào Ngân Sách</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
               <div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		
<article id="post-215" class="post-215 post type-post status-publish format-standard hentry category-huong-dan-chung">
	
	<header class="entry-header">
	 	</header><!-- .entry-header -->

	<div class="entry-content">
		<p><strong><span style="text-decoration: underline;"><span style="color: #ff6600; text-decoration: underline;">Chuyển khoản ngân hàng:</span></span></strong></p>
 
<p>Để nạp tiền vào tài khoản ShopCanTho.Vn, trong nội dung chuyển khoản Shop chỉ cần điền duy nhất <b>Tên Tài Khoản</b> của Shop vào phần nội dung, ngoài ra không cần điền gì thêm.Nếu Shop dùng tài khoản đang đăng nhập này thì Tên Tài Khoản của quý là <code><? echo $_SESSION['log']?></code></p>
<p>Xin cám ơn!</p>
<table style="border: none;">
<tbody>
<tr>
<td style="border: none; width: 120px;"><img class="alignnone wp-image-231 size-full" src="https://trogiup.tadu.vn/wp-content/uploads/2016/07/vietcombank.jpg" alt="" width="100" height="100"></td>
<td style="border: none; vertical-align: top;"><strong>Ngân hàng Vietcombank – Chi nhánh Cần Thơ</strong><br>
Chủ tài khoản: Phạm Hữu Lợi<br>
Số tài khoản: 0111.000.17.6109</td>
</tr>
 
<tr>
<td style="border: none; width: 120px;"><img class="alignnone wp-image-233 size-full" src="https://trogiup.tadu.vn/wp-content/uploads/2016/07/sacombank2.jpg" alt="" width="100" height="100"></td>
<td style="border: none; vertical-align: top;"><strong>Ngân hàng Sacombank – Chi nhánh Cần Thơ</strong><br>
Chủ tài khoản: Phạm Hữu Lợi<br>
Số tài khoản: 0700.118.20.581</td>
</tr>
 
 
 
<!--tr>
<td style="border: none; width: 120px;"><img class="alignnone wp-image-237 size-full" src="https://trogiup.tadu.vn/wp-content/uploads/2016/07/viettinbank.jpg" alt="" width="100" height="100"></td>
<td style="border: none; vertical-align: top;"><strong>Ngân hàng Vietin Bank – Chi nhánh 9 – TP.HCM</strong><br>
Chủ tài khoản: Phạm Hữu Lợi<br>
Số tài khoản:&nbsp;711.AC1.326.568</td>
</tr-->
 
 
 
 
 
</tbody>
</table>
<p><strong><span style="text-decoration: underline;"><span style="color: #ff6600; text-decoration: underline;">Nạp tiền trực tiếp tại Shop:</span></span></strong></p>
<p>Địa chỉ áp dụng: <strong>Tại Quận Ninh Kiều, Cái Răng, Bình Thủy không xa trung tâm quá 10KM</strong></p>
 <p>Hướng dẫn: <strong>Shop liên hệ Số Điện Thoại <b style=" color: red; ">0939 822 433</b> hoặc <b style=" color: red; ">0931 052 062</b> và yêu cầu nạp tiền tại Shop, chúng tôi sẽ có nhân viên đến tận Shop quý khách thu tiền trong vòng 24h</strong><b style="
    color: blue;
"> Chú ý: Hình thức này áp dụng cho Shop nạp từ 500,000đ trở lên</b></p>
<p>&nbsp;</p>

 
	</div><!-- .entry-content -->
    <!--
	
	<footer class="entry-footer">
				        
	</footer><!-- .entry-footer -->
    

</article><!-- #post-## -->

		</main><!-- .site-main -->
	</div>  
                 
                
                 
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a  class="btn btn-primary">Mọi thắc mắc ý kiến cần trợ giúp Shop vui lòng liên hệ số điện thoại 0939 822 433</a>
              </div>
            </form>
          </div>
          <!-- /.box -->

          <!-- Form Element sizes -->
          
          <!-- /.box -->

          
          <!-- /.box -->

          <!-- Input addon -->
         
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
      <h2>NẠP TIỀN</h2>
    </div>
    <div class="modal-body">
<div class="box box-info">
       
			 
            <!-- /.box-header -->
            <!-- form start -->
			<?
		// Đang còn hàng..click hết hàng
if (isset($_POST['save_bank'])) {
	date_default_timezone_set("Asia/Ho_Chi_Minh");
$dateposted1 = date("d-m-Y H:i:s");
$hinhthuc = $_POST['hinhthuc'];
 
$sotiennap= $_POST['sotiennap'];
$hinhthuc= $_POST['hinhthuc'];
 
 
 
$sotiennap1 = number_format($sotiennap);
 
 
$user_shop= $_SESSION['log'];
 









if($hinhthuc == '1' ){	

 

 
  
 $sql_conhang_1 = "INSERT INTO naptien (noidung, sotiennap, hinhthuc,tinhtrang,date) VALUES ('Shop đã gửi lệnh nạp tiền thành công, shop vui lòng' ,$sotiennap,'$hinhthuc',Chờ khách hàng Nạp,'$dateposted1')";
  
 if (mysql_query($sql_conhang_1) ) {
			
			
				echo "<SCRIPT LANGUAGE='JavaScript'>
   window.alert('Gửi lệnh yêu cầu nạp tiền thành công')
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
					}	
		
	
  	


}
		?>
		<? echo $err;?>
            <form class="form-horizontal" name="checka" method="POST" onsubmit="return check2222()" >
              <div class="box-body">
                
                
				
				 <div class="form-group">
                  <label for="inputPassword3" style=" width: 35%; " class="col-sm-2 control-label">Hình thức nạp tiền</label>

                  <div class="col-sm-10" style=" width: 50%; ">
                    <select name="hinhthuc" id="MainContent_drbankname" class="form-control">
						<option value="" >Chọn hình thức nạp tiền</option>
		<option value="1">Nạp qua Ngân Hàng</option>
		<option value="2">Nạp Tại Công Ty</option>
		<option value="3">Nạp Tại Shop (Áp dụng tại Ninh Kiều,TP.Cần Thơ)</option>
	 

	</select>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputPassword3" style=" width: 35%; " class="col-sm-2 control-label"> Số tiền Nạp</label>

                  <div class="col-sm-10" style=" width: 50%; ">
                    <input name="sotiennap" type="number" class="form-control" id="inputPassword3" placeholder="Nhập số tiền cần Nạp">
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





if(document.checka.hinhthuc.value =="")
{
alert("Vui lòng chọn hình thức nạp tiền");
document.checka.hinhthuc.focus();
return false;
}

if(document.checka.sotiennap.value =="")
{
alert("Vui lòng nhập Số tiền cần nạp");
document.checka.sotiennap.focus();
return false;
}

if(document.checka.sotiennap.value <"100000")
{
alert("Số tiền cần nạp từ 100,000d trở lên");
document.checka.sotiennap.focus();
return false;
}


return true;
}
</script>