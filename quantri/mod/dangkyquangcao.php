<?
$path = "../thanhvien/".$_SESSION['log']."/banner";
$pathdb = "thanhvien/".$_SESSION['log']."/banner";
$user=$_SESSION['log'];
if (isset($_POST['butSaveLoai'])) {
	$parent = $_POST['txtParent'];
	$order = $_POST['txtSortOrder'];
	if($order=='') $order=0;
	else $order = $_POST['txtSortOrder'];

	$status=$_POST['status'];
	$notsub=($_POST['chknotsub']!=''?1:0);

	$CategoryNameen= trim($_POST['txtNameen']);				
	$CategoryName= trim($_POST['txtName']);
	$categories_description = $_POST['txtMieuta'];
	$thoigian = $_POST['thoigian'];
	$link = $_POST['link'];
	$user=$_SESSION['log'];
	$banner = $_POST['banner'];
	$sanpham = $_POST['sanpham'];

	$err="";
	if ($CategoryName=="") $err .=  "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Chưa chọn Vị trí quảng cáo')
    window.location.href='dangkyquangcao';
    </SCRIPT>";
	$err.=CheckUpload($_FILES["txtImage"],".jpg;.gif;.png;.bmp",500*1024,0);
	
	if ($err=='')
	{
		if (!empty($_POST['id'])) {
			$oldid = $_POST['id'];
			$sql = "update cat_mem set name='".$CategoryName."', description='".$categories_description."', parent='".$parent."', thutu='".$order."', status=".$status." where id='".$oldid."'";
		}else {
			$sql = "insert into quangcao (name,user,thoigian,banner,status,sanpham) values ('".$CategoryName."','".$user."','".$thoigian."','".$banner."','".$status."','".$sanpham."')";
		}
		if (mysql_query($sql,$con)) {
			if(empty($_POST['id'])) $oldid = mysql_insert_id();

			$sqlUpdateField = "";
			
			$extsmall=GetFileExtention($_FILES['txtImage']['name']);
			if (MakeUpload($_FILES['txtImage'],"$path/banner_s$oldid$extsmall"))
			{
				@chmod("$path/banner_s$oldid$extsmall", 0777);
				$sqlUpdateField = " banner='$pathdb/banner_s$oldid$extsmall' ";
			}
			if($sqlUpdateField)
			{
				$sqlUpdate = "update quangcao set $sqlUpdateField where id='".$oldid."' ";
				mysql_query($sqlUpdate,$con);
			}
		}	
		else {
			$err =  "<p align=center class='err'>Không th&#7875; c&#7853;p nh&#7853;t</p>";
		}
  	}
  	if ($err=='') echo '<SCRIPT LANGUAGE="JavaScript">
    window.alert("Khách hàng đã đăng ký thành công quảng cáo, vui lòng chờ Gian Hàng Số duyệt thông tin trong thời gian sớm nhất.Xin cảm ơn quý khách")
    window.location.href="dangkyquangcao";
    </SCRIPT>';
  	else echo '<p align=center class="err" style="line-height: 150%">'.$err.'</p>';
} 
?>

<?
	if (isset($_GET['id'])) {
		$oldid=$_GET['id'];
		$sql = "select * from quangcao where id='".$oldid."'";
		if ($result = mysql_query($sql,$con)) {
			$row=mysql_fetch_array($result);
			$CategoryName=$row['name'];
			$categories_description=$row['description'];
			$image=$row['image'];
			$parent=$row['parent'];
			$order=$row['thutu'];
			$status=$row['status'];
			$date=$row['date'];
			$sanpham=$row['sanpham'];
		}
	}
?>







<form method="post" name="FormLoaiSP" enctype="multipart/form-data" action="">
<input type="hidden" name="act" value="dangkyquangcao">
<input type="hidden" name="status" value="Chờ duyệt">
<input type="hidden" name="page" value="<? echo $_REQUEST['page']; ?>">
<input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>">
<? 
if ($image!='')
{
?>
<table cellspacing="0" cellpadding="0" width="100%">
<tr>
	<td align="center">
	<img border="0" src="../<? echo $image; ?>">
	</td>
</tr>
</table>
<?
}
?>
    <section class="content-header">
      <h1>
        Đăng ký quảng cáo
      
      </h1>

    </section>      
	<br>

<?if($_REQUEST['edit']=='1')
	{?>

	<?}else{?>

	<?}?>	
	
<? if (GetConfig('multilanguage')==1)
{
?>
	  <tr>
        <td width="15%" class="smallfont">
        <p align="right">Ch&#7885;n ngôn ng&#7919;</td>
        <td width="1%" class="smallfont">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<select size="1" name="ddlLanguage">
<?
if ($language=='')
	echo '<option value="" selected>[Dùng cho t&#7845;t c&#7843; ngôn ng&#7919;]</option>';
else
	echo '<option value="">[Dùng cho t&#7845;t c&#7843; ngôn ng&#7919;]</option>';
$langs=GetListLanguage();
foreach ($langs as $lang)
{
	if ($lang[0]==$language)
		echo '<option value="'.$lang[0].'" selected>'.$lang[1].'</option>';
	else
		echo '<option value="'.$lang[0].'">'.$lang[1].'</option>';
}
?>
					</select>
		</td>
      </tr>
<?
}
?>	
	
	
	
	
	<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Chọn loại quảng cáo</h3>	  
          
                <button TYPE="submit" NAME="butSaveLoai" style="float: right;"  class="btn btn-primary">Đăng ký</button>
        
            </div>
			
            <!-- /.box-header -->
            <!-- form start -->
           
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Vị trí quảng cáo</label>
<div class="form-group">
              
                  <select name="txtName" multiple class="form-control" style="height: 154px;">
                    <option value="Banner vị trí 1"  >- Banner vị trí 1 = Kích thước - 580 x 300 - Đơn giá - 400.000đ - Thời gian - 1 Tháng </option>
                    <option value="Banner vị trí 2" >- Banner vị trí 2 = Kích thước - 940 x 150 - Đơn giá - 200.000đ - Thời gian - 1 Tháng </option>
                    <option value="Banner vị trí 3" >- Banner vị trí 3 = Kích thước - 200 x 240 - Đơn giá - 100.000đ - Thời gian - 1 Tháng </option>
                    <option value="Sản phẩm vị trí 4" >- Sản phẩm vị trí 4 = Đơn giá/ 1 SP - 2.000đ - Thời gian - 1 Ngày </option>
                    <option value="Sản phẩm vị trí 5" >- Sản phẩm vị trí 5 = Đơn giá/ 1 SP - 5.000đ - Thời gian - 1 Ngày </option>
					<option value="Sản phẩm vị trí 6" >- Sản phẩm vị trí 6 = Đơn giá/ 1 SP - 3.000đ - Thời gian - 1 Ngày </option>
					<option value="Đặt sản phẩm nguyên box" >- Đặt sản phẩm nguyên box (giảm 25%) vị trí 6 = Đơn giá/ 1 SP - 13.500đ - Thời gian - 1 Ngày </option>
					<option value="Đặt Gian Hàng Chuyên Nghiệp" >- Đặt Gian Hàng Chuyên Nghiệp vị trí 7 = Đơn giá - 50.000đ - Thời gian - 1 Tháng </option>
                  </select>
                </div>
                
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Thời gian đăng ký</label>
                     <select name="thoigian"  class="form-control" >
                    <option value="1"  >1 Ngày </option>
					<option value="10"  >10 Ngày </option>
					<option value="30"  >30 Ngày </option>
					<option value="60"  >60 Ngày </option>
					<option value="120"  >120 Ngày </option>
					<option value="365"  >365 Ngày </option>
                  </select>
                </div>
				<i style="color: red;">Lưu ý: Đối với quảng cáo ở các vị trí 1,2,3,7 khách hàng phải đăng ký ít nhất là 30 ngày</i>
				

               
               
              </div>
              <!-- /.box-body -->

            
          </div>
          <!-- /.box -->

          <!-- Form Element sizes -->
         
          <!-- /.box -->

          
          <!-- /.box -->

          <!-- Input addon -->
          
          <!-- /.box -->
        </div>
		
		
		
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Chọn Banner </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">


						<div class="form-group">
                  <label for="exampleInputEmail1">(Sử dụng cho Vị trí 1,2,3 các vị trí còn lại để trống phần này)</label>
                  <input value="<? echo $order; ?>" TYPE="file" NAME="txtImage" class="form-control"  >
                </div>
											<i style="color: red;">Lưu ý: Nên chọn đúng kích thước vị trí để cho ra hình ảnh đẹp nhất sai số không quá 10px</i>	


              <!-- /.box-body -->
             
              <!-- /.box-footer -->
           
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
          
          <!-- /.box -->
        </div>
		
		<div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Chọn sản phẩm</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">


						<div class="form-group">
                  <label for="exampleInputEmail1">(Sử dụng cho Vị trí 4,5,6 các vị trí còn lại để trống phần này)</label>
                  

		
              </div>
 <div class="form-group">
                  <label for="exampleInputPassword1">ID Sản Phẩm</label>
                <input type="text" name="sanpham" style="width: 469px;" placeholder="Nhập ID sản phẩm cách nhau dấu phẩy nếu từ 2 sản phẩm trở lên">
                </div>
				<i style="color: red;">ID sản phẩm xem trong phần quảng lý sản phẩm</i>
              <!-- /.box-body -->
             
              <!-- /.box-footer -->
           
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
          
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
	   
      <!-- /.row -->
    </section>	 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 










<!--table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" align="center" class="title" height="20">
	<?if($_REQUEST['edit']=='1')
	{?>
	Sửa
	<?}else{?>
	Thêm m&#7899;i
	<?}?>
	danh mục sản phẩm1
	</td>
  </tr>
  <tr>
    <td width="45%">
    <table border="0" cellpadding="4" bordercolor="#111111" width="100%" id="AutoNumber2" cellspacing="0">
<? if (GetConfig('multilanguage')==1)
{
?>
	  <tr>
        <td width="15%" class="smallfont">
        <p align="right">Ch&#7885;n ngôn ng&#7919;</td>
        <td width="1%" class="smallfont">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<select size="1" name="ddlLanguage">
<?
if ($language=='')
	echo '<option value="" selected>[Dùng cho t&#7845;t c&#7843; ngôn ng&#7919;]</option>';
else
	echo '<option value="">[Dùng cho t&#7845;t c&#7843; ngôn ng&#7919;]</option>';
$langs=GetListLanguage();
foreach ($langs as $lang)
{
	if ($lang[0]==$language)
		echo '<option value="'.$lang[0].'" selected>'.$lang[1].'</option>';
	else
		echo '<option value="'.$lang[0].'">'.$lang[1].'</option>';
}
?>
					</select>
		</td>
      </tr>
<?
}
?>
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Tên danh m&#7909;c</td>
        <td width="1%" class="smallfont">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $CategoryName; ?>" TYPE="text" NAME="txtName" CLASS=textbox size="34"></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Hình (logo)</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT TYPE="file" NAME="txtImage" CLASS=textbox size="34"></td>
      </tr>
	        <tr>
        <td width="15%" class="smallfont">
        <p align="right">Miêu tả</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<textarea style="width:462; height:99" name="txtMieuta" cols="90" cols="100"><? echo $categories_description; ?></textarea></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Thu&#7897;c danh m&#7909;c</td>
        <td width="1%" class="smallfont">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
        <select size="1" name="txtParent">
<?
		echo "<option value='17'>[Danh m&#7909;c g&#7889;c]</option>";
		$cats=GetListCategory(17);
		foreach ($cats as $cat)
		{
			if ($cat[0]==$parent)
				echo "<option value=".$cat[0]." selected>".$cat[1]."</option>";
			else
				echo "<option value=".$cat[0].">".$cat[1]."</option>";
		}
?>		
		</select>
		
</td>
      </tr>
      <tr>
        <td width="15%" class="smallfont" align="right">
        Hiển thị sản phẩm Trang chủ</td>
        <td width="1%" class="smallfont" align="right">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<input type="checkbox" name="chkShow" value="ON" ></td>
      </tr>
    
      <tr>
        <td width="15%" class="smallfont" align="right">
        Th&#7913; t&#7921; s&#7855;p x&#7871;p</td>
        <td width="1%" class="smallfont" align="right">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $order; ?>" TYPE="text" NAME="txtSortOrder" CLASS=textbox size="34"></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont">
		<p align="right">
		<INPUT TYPE="submit" NAME="butSaveLoai" VALUE="C&#7853;p nh&#7853;t" CLASS=button>&nbsp;</td>
        <td width="1%" class="smallfont">
		&nbsp;</td>
        <td width="83%" class="smallfont"><p align="left">&nbsp;<INPUT TYPE="reset" CLASS=button value="Nh&#7853;p l&#7841;i"></td>
      </tr>
    </table>
    </td>
  </tr>
  </table-->
</form>




