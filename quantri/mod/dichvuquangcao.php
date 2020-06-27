<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dịch vụ quảng cáo trên ShopCanTho.Vn
      
      </h1>
      <ol class="breadcrumb">
      <h3 class="box-title" style="background: #F44336;color: #fff;padding: 6px;margin-top: -11px;" ><a id="dangkyquangcao" href="dangkyquangcao" style="color: #fff;" >ĐĂNG KÝ QUẢNG CÁO </a></h3>
      </ol>
    </section>
	<br>
	<!-- hàm điều kiện  -->

<!-- kết thúc hàm điều kiện -->
	




<!-- bắt đầu nội dung Nội dung  -->

<?

$MAXPAGE=10;

	switch ($_GET['action'])
	{
		case 'del' :
			$id = $_GET['id'];
			$result = mysql_query("select quangcao from products where quangcao='".$id."'",$con);
			if (mysql_num_rows($result)<=0) {
				$sql = "delete from quangcao where id='".$id."' and user='".$_SESSION['log']."' ";
				@$result = mysql_query($sql,$con);
				if ($result) echo "<p align=center class='err'><SCRIPT LANGUAGE='JavaScript'>
    window.alert('Đã xóa thành công')
    window.location.href='dichvuquangcao';
    </SCRIPT>";
				else echo "<p align=center class='err'><SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không thành công vui lòng liên hệ trợ giúp')
    window.location.href='dichvuquangcao';
    </SCRIPT>";
			} else {
				echo "<p align=center class='err'>&#272;ang có s&#7843;n ph&#7849;m s&#7917; d&#7909;ng. nên b&#7841;n không th&#7875; xóa</p>";	
			}
			
			break;
	}
?>

<?
	if (isset($_POST['ButDel'])) {
		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			@$result = mysql_query("delete from quangcao where id='".$id."' and user='".$_SESSION['log']."' ",$con);
			if ($result) $cnt++;
		}
		echo "<p align=center class='err'>&#272;ã xóa ".$cnt." ph&#7847;n t&#7917;</p>";
	}
?>
<?
	$page = $_GET["page"];
	$p=0;
	if ($page!='') $p=$page;
	$where="1=1";
	if ($_REQUEST['cat']!='') $where="parent=".$_REQUEST['cat'];
?>
<form method="POST" action="<? echo $_SERVER[PHP_SELF]; ?>" name="frmList">
<input type=hidden name="page" value="<? echo $page; ?>">
<?
function taotrang($sql,$link,$nitem,$itemcurrent)
{	global $con;
	$ret="";
	$result = mysql_query($sql, $con) or die('Error' . mysql_error());
	$value = mysql_fetch_array($result);
	$plus = (($value['cnt'] % $nitem)>0);
	for ($i=0;$i<($value[0] / $nitem) + plus;$i++)
	{
		if ($i<>$itemcurrent) $ret .= "<a href=\"".$link.$i."\" style=\"padding: 2px;\" class=\"lslink\">".($i+1)."</a> ";
		else $ret .= ($i+1)." ";
	}
	return $ret;
}
	$pageindex=taotrang("select count(*) from quangcao where user='".$_SESSION['log']."' and $where","./?act=dichvuquangcao&cat=".$_REQUEST['cat']."&page=",$MAXPAGE,$page);
?>
<? echo $err;?>


<section class="content">
 



		 <div class="row">
        <div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">
              <i class="fa fa-star-half-empty"></i>

              <h3 class="box-title">Đặt banner quảng cáo và sản phẩm ở trang chủ</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <img alt="" src="http://driver.gianhangvn.com/image/quang-cao-gianhangvn-252158j1.jpg" style="width: 510px; height:575px">
          
           
              
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

              <h3 class="box-title">Chi tiết đặt banner quảng cáo</h3>
            </div>
            <!-- /.box-header -->
             <div class="box">
        
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tr>
                  <th style="width: 10px">TT</th>
                  <th>Vị trí</th>
                  <th><center> Kích thước(px)</th>
                  <th ><center> Đơn giá</th>
				  <th ><center> Thời gian</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>Banner vị trí 1 (chia sẻ 3 banner)</td>
                 <td><center> <span class="badge bg-red">580 x 300</span></td>
                  <td><center> <span class="badge bg-blue">300.000đ</span></td>
				   <td><center> <span class="badge bg-green">1 tháng</span></td>
                </tr>
<tr>
                  <td>2.</td>
                  <td>Banner vị trí 2 (1 banner)</td>
                 <td><center> <span class="badge bg-red">940 x 150</span></td>
                  <td><center> <span class="badge bg-blue">100.000đ</span></td>
				   <td><center> <span class="badge bg-green">1 tháng</span></td>
                </tr>
 


   
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
		 <div class="box box-default">
            <div class="box-header with-border">
              <i class="fa fa-bullhorn"></i>

              <h3 class="box-title">Chi tiết bảng giá đặt sản phẩm</h3>
            </div>
            <!-- /.box-header -->
             <div class="box">
        
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tr>
                  <th style="width: 10px">TT</th>
                  <th>Vị trí</th>
                  <th><center> Đơn giá/ 1 SP</th>
				  <th ><center> Thời gian</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>Sản phẩm vị trí 3 (chia sẻ 16 sản phẩm)</td>
                 <td><center> <span class="badge bg-blue">2.000đ</span></td>
                  <td><center> <span class="badge bg-green">1 ngày</span></td>

                </tr>
				       <tr>
                  <td>2.</td>
                  <td>Sản phẩm vị trí 5 (chia sẻ 5 sản phẩm)</td>
                 <td><center> <span class="badge bg-blue">5.000đ</span></td>
                  <td><center> <span class="badge bg-green">1 ngày</span></td>

                </tr>
				 <tr>
                  <td>3.</td>
                  <td>Sản phẩm vị trí 6 (chia sẻ 6 sản phẩm)</td>
                 <td><center> <span class="badge bg-blue">3.000đ</span></td>
                  <td><center> <span class="badge bg-green">1 ngày</span></td>

                </tr>




   
              </table>
            </div>

            <!-- /.box-body -->
          </div>
		  
          <!-- /.box -->
        </div>
		
		 <div class="box box-default">
            <div class="box-header with-border">
              <i class="fa fa-bullhorn"></i>

              <h3 class="box-title">Bảng giá đặt sản phẩm nguyên box (gồm 6 sản phẩm)</h3>
            </div>
            <!-- /.box-header -->
             <div class="box">
        
            <!-- /.box-header -->
            <div class="box-body no-padding" style="
    margin-left: 20px;
">
              <table class="table table-condensed" >
                <tr>
                <b> Giảm 25%</b>  khi đặt nguyên box sản phẩm. Chỉ áp dụng ở vị trí 6 
				 <br>
VD: Đặt 6 sản phẩm ở box vị trí số 6
<br>
<b>Số tiền chưa giảm = 3.000đ x 6 sản phẩm = 18.000đ</b>
<Br>
<b>Số tiền giảm 25% = 3.000đ x 6 sản phẩm x 75% = 13.500đ (tiết kiệm 4.500đ)<b>

                </tr>
               




   
              </table>
            </div>

            <!-- /.box-body -->
          </div>
		  
          <!-- /.box -->
        </div>
		 <div class="box box-default">
            <div class="box-header with-border">
              <i class="fa fa-bullhorn"></i>

              <h3 class="box-title">Bảng giá đặt Gian Hàng Chuyên Nghiệp</h3>
            </div>
            <!-- /.box-header -->
             <div class="box">
        
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tr>
                  <th style="width: 10px">TT</th>
                  <th>Vị trí</th>
                  <th><center> Đơn giá</th>
				  <th ><center> Thời gian</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>Vị trí 7 (chia sẻ 33 gian hàng)</td>
                 <td><center> <span class="badge bg-blue">50.000đ</span></td>
                  <td><center> <span class="badge bg-green">1 tháng</span></td>

                </tr>
				   




   
              </table>
            </div>

            <!-- /.box-body -->
          </div>
		  
          <!-- /.box -->
        </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      

 </section>		
    <div class="col-xs-12">
		
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Quản lý quảng cáo trên Gian Hàng Số</h3>

              <div class="box-tools">

             
<tr>
<td class="smallfont" >Trang : <? echo $pageindex; ?><td>

	
</tr>
	
              </div>
            </div>
			
	
			
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                 
				  <th><center>ID</th>
                  <th><center>Trạng thái</th>
				  <th><center>Thời gian</th>
                  <th>Loại quảng cáo</th>
                  <th>Ngày kích hoạt</th>
                  <th>Ngày hết hạn</th>
				  <th>Thanh toán</th>	 
				  <th>Banner</th>	
                   <th>ID SP</th>					  
				  <th width="180px" >Ghi chú</th>
				  <th><center>Xóa</th>

                </tr>
  <?
            	$sql="select * from quangcao  where user='".$_SESSION['log']."' order by id limit ".($p*$MAXPAGE).",".$MAXPAGE;
            	$result=mysql_query($sql,$con);
            	$i=0;
            	while(($row=mysql_fetch_array($result)))
				{
					$i++;
					if ($i%2) $color="#d5d5d5"; else $color="#e5e5e5";
  ?>
  
 <tr>
                 
				  <td><center><? echo $row['id']; ?></td>
				  <td><center style="color: #F44336;"><? echo $row['status']; ?></td>
		  <td><center><? echo $row['thoigian']; ?> ngày</td>
                  <td style="
    color: blue;
"><? echo $row['name']; ?></td>
                 
                 
                  <td><? echo $row['date']; ?></td> 
				  <td><? echo $row['dateend']; ?></td> 
				  <td><?php echo str_replace(",",".",number_format($row['thanhtoan'],0));?>đ</td>
				    <td> <a id="xembanner" target="bank_" href="/<? echo $row['banner'];?>" ><img src="/<? echo $row['banner'];?>" width="100" height="50"></a></td>
					 <td><? echo $row['sanpham']; ?></td> 
					   <td style=" font-size: 11px; color: red;"><? echo $row['ghichu']; ?></td>

	<td>
	<?if($_REQUEST['page']=='')
{?>



 <center> <a onclick="return confirm('B&#7841;n có ch&#7855;c ch&#7855;n mu&#7889;n xoá ?');" href="./dichvuquangcao/<? echo $row['id']; ?>"  class="delete"><img src="css/xoa.png"></a>
  <?}else{?>

 <a href="./dichvuquangcao/<? echo $_REQUEST['page']; ?>/<? echo $row['id']; ?>"  class="edit"><img src="css/sua.png"></a>
  <a onclick="return confirm('B&#7841;n có ch&#7855;c ch&#7855;n mu&#7889;n xoá ?');" href="./dichvuquangcao/<? echo $row['id']; ?>"  class="delete"><img src="css/xoa.png"></a>
  <?}?>
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
	
	
	
	
	

<!-- kết thúc nội dung  -->

<!-- Nếu không thuộc điều kiện thì trả về không đủ tiền -->












