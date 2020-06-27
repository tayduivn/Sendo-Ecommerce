


<?php
    include("../ckeditor/ckeditor.php");
?>
<?
$user=$_SESSION['log'];
$sql_user_home=mysql_query("SELECT * FROM user_shop where user='".$user."' ");
$row_user_home=mysql_fetch_array($sql_user_home);
date_default_timezone_set("Asia/Ho_Chi_Minh");
	$date = date("d-m-Y H:i:s");
if (isset($_POST['butSub'])) {
	$old =   ( md5(md5(md5( md5(md5(md5( addslashes($_POST['txtOld']))))))));
	$new1 =   ( md5(md5(md5( md5(md5(md5( addslashes($_POST['txtNew']))))))));
	$new2 =   ( md5(md5(md5( md5(md5(md5( addslashes($_POST['txtNew2']))))))));
	
	if ($new1!=$new2 || $new1=="" || $new2=='')
	{
		$err="<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Mật khẩu mới không trùng nhau hoặc chưa nhập')
    window.location.href='thaydoimatkhau';
    </SCRIPT>";
	}
	elseif($row_user_home['pass']!==$old)
	{
		$err="<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không đúng mật khẩu cũ')
    window.location.href='thaydoimatkhau';
    </SCRIPT>";
	}
	elseif($old=='')
	{
		$err="<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Bạn chưa nhập mật khẩu cũ')
    window.location.href='thaydoimatkhau';
    </SCRIPT>";
	}
	else
	
	$sql = "update user_shop set pass='".$new1."' where user='".$user."' and pass='".$old."' ";
	$thaydoimatkhau = "insert into thongbao_shop (thongbao,user,date) values ('Shop đã thay đổi mật khẩu thành công. ','".$_SESSION['log']."','".$date."')";
		if (mysql_query($sql,$con) && mysql_query($thaydoimatkhau,$con)    ) 
			{
			unset($_SESSION['log']);
			$err="<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Thay đổi mật khẩu thành công bây giờ Shop đăng nhập bằng mật khẩu mới')
    window.location.href='thaydoimatkhau';
    </SCRIPT>";
		    }	

		else 
          if ($err=='') echo '<script>window.location="index.php?act=changepass"</script>';
  	           else echo "<p align=center class='err'></p>";
}
$sql1=mysql_query("SELECT * FROM user_shop where user='".$_SESSION['log']."'");
$row=mysql_fetch_assoc($sql1);
?>
<?
		$sql3 = "select * from user_shop where user='".$_SESSION['log']."'";
		if ($result = mysql_query($sql3,$con)) {
			$row=mysql_fetch_array($result);
			$cat_mem=$row['cat_mem'];
			$tem_mem=$row['template'];
		}

?>

 










<section class="content-header">
      <h1>
        Thay đổi mật khẩu
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a>Thay đổi mật khẩu</a></li>
 
      </ol>
    </section>
	<br>
<section class="content">


<div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Thay đổi mật khẩu</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST">
			<input type=hidden name="oldid" value="<? echo $oldid; ?>">
			
  								<tr>
	<td align="center" style="padding-left:400px; color:blue; font-weight:bold"><? echo $err;?></td>
	</tr>
  

              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Mật khẩu cũ</label>
                  <input type="password" name="txtOld" class="form-control" id="exampleInputEmail1" >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Mật khẩu mới</label>
                  <input type="password" NAME="txtNew" class="form-control" id="exampleInputPassword1"  >
                </div>
                 <div class="form-group">
                  <label for="exampleInputPassword1">Nhập lại mật khẩu mới </label>
                  <input type="password" NAME="txtNew2" class="form-control" id="exampleInputPassword1"  >
                </div>
               
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" NAME="butSub"class="btn btn-primary">Thay đổi</button>
              </div>
            </form>
          </div>

        </div>
		</section>