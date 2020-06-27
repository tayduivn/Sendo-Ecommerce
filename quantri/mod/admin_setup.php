<?
include_once("fckeditor/fckeditor.php") ;
?>
<?php
$loc1=array('\"');
$loc2=array('"');
?>
<?
$path = "../thanhvien/".$_SESSION['log']."/banner";
$pathdb = "thanhvien/".$_SESSION['log']."/banner";
$user=$_SESSION['log'];

if (isset($_POST['butSub'])) {
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$diachi = $_POST['diachi'];
	$company = $_POST['company'];
	$mieuta = $_POST['mieuta'];
	$cat_mem = $_POST['cat_mem'];
	$about = $_POST['about'];
	$request = $_POST['request'];
	$contact = $_POST['contact'];
	$slogan = $_POST['slogan'];
	$w = $_POST['w'];
	$h = $_POST['h'];
			
	$err="";
	
	$err.=CheckUpload($_FILES["txtImage"],".jpg;.gif;.bmp;.swf;.png",500*1024,0);
	$err.=CheckUpload($_FILES["txtImageLarge"],".jpg;.gif;.bmp;.swf;.png",500*1024,0);
        $err.=CheckUpload($_FILES["txtImageBg"],".jpg;.gif;.bmp;.png",500*1024,0);

	if ($err=='')
	{
	$sql = "update user_shop set fullname='".$name."', phone='".$phone."', slogan='".$slogan."', email='".$email."', address='".$diachi."',request='".$request."',contact='".$contact."',w='".$w."',h='".$h."' where user='".$user."' ";
		if (mysql_query($sql,$con)) {
			$file1 = "../counter/".$_SESSION['log']."/lienhe.var"; 
            $ghi = fopen($file1, "r");
			$Data = str_replace($loc1,$loc2,$contact);
            $Handle = fopen($file1, 'w');
             fwrite($Handle, $Data); 
             fclose($Handle);

			 $file2 = "../counter/".$_SESSION['log']."/gioithieu.var"; 
            $ghi2 = fopen($file2, "r");
			$Data2 = str_replace($loc1,$loc2,$about);
            $Handle2 = fopen($file2, 'w');
             fwrite($Handle2, $Data2); 
             fclose($Handle2);

			 $file3 = "../counter/".$_SESSION['log']."/hoidap.var"; 
            $ghi3 = fopen($file3, "r");
			$Data3 = str_replace($loc1,$loc2,$request);
            $Handle3 = fopen($file3, 'w');
             fwrite($Handle3, $Data3); 
             fclose($Handle3);

			 $file4 = "../counter/".$_SESSION['log']."/bando.var"; 
            $ghi4 = fopen($file4, "r");
			$Data4 = str_replace($loc1,$loc2,$bando);
            $Handle4 = fopen($file4, 'w');
             fwrite($Handle4, $Data4); 
             fclose($Handle4);
			if(empty($_POST['id'])) $oldid = mysql_insert_id();
		
			$sqlUpdateField = "";
			
			$extsmall=GetFileExtention($_FILES['txtImage']['name']);
			if (MakeUpload($_FILES['txtImage'],"$path/banner$user$extsmall"))
			{
				@chmod("$path/banner$user$extsmall", 0777);
				$sqlUpdateField = " logo='$pathdb/banner$user$extsmall' ";
			}

		 
			 
			if($sqlUpdateField!='')
			{
				$sqlUpdate = "update user_shop set $sqlUpdateField where user='".$user."' ";
				mysql_query($sqlUpdate,$con);
			}
			$err="<SCRIPT LANGUAGE='JavaScript'>
    window.alert('LƯU thành công')
    window.location.href='web_config';
    </SCRIPT>";
		}	

		else {
			$err =  "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không thể cập nhật')
    window.location.href='web_config';
    </SCRIPT>";
		}
  	}

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
			$about=$row['about'];
			$request=$row['request'];
		}

?>

<form method="POST" name="FormLoaiSP" enctype="multipart/form-data" action="">
<? echo $err;?>
<input type=hidden name="oldid" value="<? echo $oldid; ?>">
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
   <section class="content-header">
      <h1>
        Thông tin Shop
      
      </h1>
      
    </section>
	<tr>
	<td align="center" style="padding-left:400px; color:blue; font-weight:bold"><? echo $err;?></td>
	</tr>
	<br>
	  <div class="col-md-6" style="width: 100%;">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Thông tin gian hàng</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                 <div class="form-group">
                  <label>Tên Shop</label>
                  <INPUT TYPE="text"   class="form-control"  maxlength="50" disabled value="<? echo $row['company'];?>">
                </div>
				<div class="form-group">
                  <label>Website trên ShopCanTho.Vn</label>
				  <br>
                  <a target="_blank" href="http://shopcantho.vn/<? echo $row['user'];?>">http://shopcantho.vn/<? echo $row['user'];?></a>
                </div>
				<div class="form-group">
                  <label>Tỉnh/Thành Shop kinh doanh</label>
				  <?
				  $tinhthanh=mysql_query("SELECT * FROM city where id='".$row['city']."'");
                  $tinhthanh_in=mysql_fetch_assoc($tinhthanh);
				  ?>
                  <INPUT TYPE="text"   class="form-control"  maxlength="50" disabled value="<? echo $tinhthanh_in['name'];?>">
                </div>
				 <div class="form-group">
                  <label>Địa chỉ Shop (Chúng tôi lấy hàng theo địa chỉ này vui lòng điền chính xác)</label>
                 <INPUT TYPE="text" NAME="diachi" class="form-control"  value="<? echo $row['address'];?>">
                </div>
				 <div class="form-group">
                  <label>Số điện thoại</label>
                  <INPUT TYPE="text" NAME="phone" class="form-control"  value="<? echo $row['phone'];?>">
                </div>
				 <div class="form-group">
                  <label>Email</label>
                  <INPUT TYPE="text" NAME="email" class="form-control" value="<? echo $row['email'];?>">
                </div>
				<div class="form-group">
                  <label>Slogan</label>
                 <INPUT TYPE="text" NAME="slogan" class="form-control" value="<? echo $row['slogan'];?>">
                </div>
				 
				 <div class="form-group">
                  <label>Người quản lý</label>
                 <INPUT TYPE="text" NAME="name" class="form-control" value="<? echo $row['fullname'];?>">
                </div>
				
				 <div class="form-group">
                  <label>Logo Shop</label>
				  <br>
 
<INPUT TYPE="file" NAME="txtImage" CLASS=textbox size="34">
 
 
  <? if($row['logo']=='')
{?>
<img src="/images/shop.jpg"  width="200">
<?} else{?>

<img src="/<? echo $row['logo'];?>" width="200">
<?}?>

 

                </div>
				 
         <INPUT  TYPE="submit" NAME="butSub" VALUE="LƯU THÔNG TIN" CLASS=button_dungthu style="background: #f85303;font-size: 25px;color: #fff;">
       
              </div>
              <!-- /.box-body -->
            
			  
              <!-- /.box-footer -->
            </form>
			
          </div>
          <!-- /.box -->
          
		  
		  
          <!-- /.box -->
        </div>
	
	
	
	
	
	
	
  								
  <!--tr>
    <td width="45%">
    <table border="0" cellpadding="4" bordercolor="#111111" width="90%" id="AutoNumber2" cellspacing="0">
	        <tr>
        <td width="33%" class="smallfont">
        <p align="right">H&#7885; v&#224; t&#234;n</td>
        <td width="63%" class="smallfont">
		<INPUT TYPE="text" NAME="name" CLASS=textbox size="34" value="<? echo $row['fullname'];?>"></td>
      </tr>
	        <tr>
        <td width="33%" class="smallfont">
        <p align="right">&#272;i&#7879;n tho&#7841;i</td>
        <td width="63%" class="smallfont">
		<INPUT TYPE="text" NAME="phone" CLASS=textbox size="34" value="<? echo $row['phone'];?>"></td>
      </tr>
	        <tr>
        <td width="33%" class="smallfont">
        <p align="right">Email</td>
        <td width="63%" class="smallfont">
		<INPUT TYPE="text" NAME="email" CLASS=textbox size="34" value="<? echo $row['email'];?>"></td>
      </tr>
	        <tr>
        <td width="33%" class="smallfont">
        <p align="right">&#272;&#7883;a ch&#7881;</td>
        <td width="63%" class="smallfont">
		<INPUT TYPE="text" NAME="diachi" CLASS=textbox size="34" value="<? echo $row['address'];?>"></td>
      </tr>
	        <tr>
        <td width="33%" class="smallfont">
        <p align="right">Company</td>
        <td width="63%" class="smallfont">
		<INPUT TYPE="text" NAME="company" CLASS=textbox size="34" maxlength="50" value="<? echo $row['company'];?>"></td>
      </tr>
	  	        <tr>
        <td width="33%" class="smallfont">
        <p align="right">Lĩnh vực hoạt động</td>
        <td width="63%" class="smallfont">
		        <select size="1" name="cat_mem">
<?
		echo "<option value='17'>[Danh m&#7909;c g&#7889;c]</option>";
		$cats=GetListCat(17);
		foreach ($cats as $cat)
		{
			if ($cat[0]==$cat_mem)
				echo "<option value=".$cat[0]." selected>".$cat[1]."</option>";
			else
				echo "<option value=".$cat[0].">".$cat[1]."</option>";
		}
?>		
		</select></td>
      </tr>
	  	  	  	        <tr>
        <td width="33%" class="smallfont">
        <p align="right">Logo</td>
        <td width="63%" class="smallfont">
		<INPUT TYPE="file" NAME="txtImage" CLASS=textbox size="34"></td>
      </tr>
	  	  	        <tr>
        <td width="33%" class="smallfont">
        <p align="right">Banner</td>
        <td width="63%" class="smallfont">
		<INPUT TYPE="file" NAME="txtImageLarge" CLASS=textbox size="34"> Nếu là File Flash Width: <INPUT TYPE="text" NAME="w" CLASS=textbox size="14" value="<? echo $row['w'];?>"> Height: <INPUT TYPE="text" NAME="h" CLASS=textbox size="14" value="<? echo $row['h'];?>"></td>
      </tr>
	  	  	  	        <tr>
        <td width="33%" class="smallfont">
        <p align="right">Background</td>
        <td width="63%" class="smallfont">
		<INPUT TYPE="file" NAME="txtImageBg" CLASS=textbox size="34"></td>
      </tr>
	        <tr>
        <td width="33%" class="smallfont">
        <p align="right">Miêu tả</td>
        <td width="63%" class="smallfont">
		<textarea style="width:700px; height:250px" name="mieuta"><? echo $row['mieuta']; ?></textarea></td>
      </tr>
	  	        <tr>
        <td width="33%" class="smallfont">
        <p align="right">Giới thiệu</td>
        <td width="63%" class="smallfont">

<textarea id="about" name="about" cols="80" rows="10">
       </textarea>
	        				 <script>
 
           CKEDITOR.replace( 'about' );
 
       </script>  
	
		</td>
      </tr>
	  	        <tr>
        <td width="33%" class="smallfont">
        <p align="right">Hỏi đáp</td>
        <td width="63%" class="smallfont">


<textarea id="request" name="request" cols="80" rows="10">
       </textarea>
	        				 <script>
 
           CKEDITOR.replace( 'request' );
 
       </script>  
		</td>
      </tr>
	  	        <tr>
        <td width="33%" class="smallfont">
        <p align="right">Liên hệ</td>
        <td width="63%" class="smallfont">

<textarea id="contact" name="contact" cols="80" rows="10">
       </textarea>
	        				 <script>
 
           CKEDITOR.replace( 'request' );
 
       </script> 
		</td>
      </tr>
      <tr>
        <td width="96%" class="smallfont" colspan="2">
		<p align="center">
		<INPUT TYPE="submit" NAME="butSub" VALUE="Thay đổi" CLASS=button>&nbsp;</td>
      </tr>
    </table>
    </td>
  </tr-->
  </table>
</form>
