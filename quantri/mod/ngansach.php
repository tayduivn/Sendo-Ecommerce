



<?
echo $_SESSION["session_message"];
$_SESSION["session_message"] = "";
$MAXPAGE=10;
?>
<section class="content-header">
      <h1>
        Quản lý ngân sách
      
      </h1>
	  
 

	  
      <ol class="breadcrumb">
       <a  href="ruttien"    type="submit" value="UP" title="Up Khuyến Mãi" name="themvaokhuyenmai" style="
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
    border: 1px solid #35b8fe;padding: 4px;
    "><i class="fa fa-fw fa-bank"></i> RÚT TIỀN</a>
	
	<a href="naptien"  type="submit" value="UP" title="Up Khuyến Mãi" name="themvaokhuyenmai" style="
    float: right;
    color: #ffffff;
    font-size: 15px;
    font-weight: 600;
    text-transform: uppercase;
    text-decoration: none;
    line-height: 26px;
    margin-left: 20px;
    background: #00a65a;
    border-radius: 4px;
    border: 1px solid #35b8fe;padding: 4px;
    "><i class="fa fa-fw fa-money"></i> NẠP TIỀN</a>
       
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
	$pageindex=taotrang(CountRecord("user_shop",$where),"./?act=ngansach&page=",$MAXPAGE,$page);
?>
<?}else{?>
<?
	$pageindex=taotrang(CountRecord("user_shop",$where),"./?act=ngansach&page=".$_REQUEST['cat']."/",$MAXPAGE,$page);
?>
<?}?>
  <?php
  			$sql_user=mysql_query("SELECT * FROM user_shop where user='".$_SESSION['log']."' ");
			$row_user=mysql_fetch_assoc($sql_user);
			?>
	<section class="content">
		 <div class="row">
        <div class="col-md-6">
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
                  <td>3</td>
                  <td>Tổng ngân sách bán hàng</td>
               
                  <td><span class="badge bg-red"><? echo number_format($row_user_mem['tongbanhang'],0);?>đ</span></td>
                </tr>
				<tr>
                  <td>4.</td>
                  <td>Tổng ngân sách nạp vào</td>
               
                  <td><span class="badge bg-blue" style=" background: #9C27B0 !important; "><? echo number_format($row_user_mem['tongnapvao'],0);?>đ</span></td>
                </tr>
				<tr>
                  <td>5.</td>
                  <td>Tổng ngân sách rút ra</td>
               
                  <td><span class="badge bg-blue" style=" background: #9C27B0 !important; "><? echo number_format($row_user_mem['tongtienrut'],0);?>đ</span></td>
                </tr>
				
				<tr>
                  <td>6.</td>
                  <td>Tổng ngân sách tặng/khuyến mãi/tri ân,tích lũy</td>
               
                  <td><span class="badge bg-blue"><? echo number_format($row_user_mem['tongkhuyenmai'],0);?>đ</span></td>
                </tr>
				<tr>
                  <td>7.</td>
                  <td>Tổng ngân sách Truy Thu</td>
               
                  <td><span class="badge bg-blue"><? echo number_format($row_user_mem['tongtruythu'],0);?>đ</span></td>
                </tr>
				<tr>
                  <td>8.</td>
                  <td>Tổng ngân sách bị trừ đăng ký Gói Dịch Vụ</td>
               
                  <td><span class="badge bg-red"><? echo number_format($row_user_mem['tongtrudichvu'],0);?>đ</span></td>
                </tr>
				<tr>
                  <td>9.</td>
                  <td>Tổng ngân sách bị trừ mua Lượt UP</td>
               
                  <td><span class="badge bg-red"><? echo number_format($row_user_mem['tongtrumualuotup'],0);?>đ</span></td>
                </tr>
  

 
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">
              <i class="fa fa-bullhorn"></i>

              <h3 class="box-title">Note</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             
             
             
              <div class="callout callout-success">
                

                <p>- <b>Tổng số dư khả dụng</b> là số tiền dư dùng để sử dụng các dịch vụ...</p>
				<p>- <b>Số dư đóng băng</b> là khoản Ngân Sách đang trong quá trình chuyển vào Ngân Hàng cho Nhà Bán Hàng</p>
				<p>- <b>Tổng ngân sách bán hàng</b> là doanh thu từ việc bán hàng</p>
				<p>- <b>Tổng ngân sách nạp vào</b> là tiền được nạp vào tài khoản</p>
				<p>- <b>Tổng ngân sách rút ra</b> là tiền được rút về Ngân hàng</p>
				<p>- <b>Tổng ngân sách tặng/khuyến mãi/tri ân</b> là tiền thưởng từ các chương trình của ShopCanTho.Vn</p>
				<p>- <b>Tổng ngân sách tích lũy</b> là số tiền được tích lũy </p>
				<p>- <b>Ngân sách bị trừ Gói Dịch Vụ</b> là số tiền bị trừ đăng ký Gói Dịch Vụ </p>
				<p>- <b>Tổng ngân sách bị trừ mua Lượt UP</b> là số tiền bị trừ mua Lượt UP</p>
				
				
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
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
                 
				  <th style="width: 10%;">Mã giao dịch</th>
              
                  <th style="width: 14%;">Ngày giao dịch</th>
                  <th>Nội dung giao dịch</th>
                  
                </tr>
  <?php
           	$sql="select * from lichsugiaodich where $where and user='".$_SESSION['log']."' order by id desc limit ".($p*$MAXPAGE).",".$MAXPAGE;
        	$result=mysql_query($sql,$con);
        	$i=0;
           	while(($row=mysql_fetch_array($result)))
			{
			$i++;
			if ($i%2) $color="#d5d5d5"; else $color="#e5e5e5";

  ?>
  
  

                <tr>
               
				  <td><? echo $row['id']; ?></td>
				 
                  <td><? echo $row['date']; ?></td>
                  <td><? echo $row['noidung']; ?></td>
                 
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




 

<!-- The Modal -->








