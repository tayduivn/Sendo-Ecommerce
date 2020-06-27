<?
if (isset($_POST['butSub'])) {
	$name = $_POST['name'];
    $title_footer = $_POST['title_footer'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$diachi = $_POST['diachi'];
	$google_seo = $_POST['google_seo'];
	$meta = $_POST['meta'];
	$map = $_POST['map'];
    $anytic = $_POST['anytic'];
	$footer = $_POST['footer'];
	$hotro = $_POST['hotro'];
	$yahoo = $_POST['yahoo'];
	$skype = $_POST['skype'];
			

	
	$sql = "update config set title='".$name."',title_footer='".$title_footer."', phone='".$phone."', email='".$email."',anytic='".$anytic."', address='".$diachi."', google_seo='".$google_seo."', meta='".$meta."', map='".$map."', hotro='".$hotro."',yahoo='".$yahoo."',skype='".$skype."'";
		if (mysql_query($sql,$con)) 
		{
			$err="Thành công";
		}	

		else {
			$err =  "<p align=center class='err'>Không th&#7875; c&#7853;p nh&#7853;t</p>";
		}
  	}



$sql1=mysql_query("SELECT * FROM config ");
$row=mysql_fetch_assoc($sql1);
?>

<form method="POST" name="FormLoaiSP" enctype="multipart/form-data" action="index.php?act=admin_config">
<input type=hidden name="oldid" value="<? echo $oldid; ?>">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" align="center" class="title" height="20">
    Cấu hình</td>
  </tr>
  								<tr>
	<td align="center" style="padding-left:400px; color:blue; font-weight:bold"><? echo $err;?></td>
	</tr>
  <tr>
    <td width="45%">
    <table border="0" cellpadding="4" bordercolor="#111111" width="90%" id="AutoNumber2" cellspacing="0">
      <tr>
        <td width="33%" class="smallfont">
        <p align="right">Tiêu đề</td>
        <td width="63%" class="smallfont">
		<INPUT TYPE="text" NAME="name" CLASS=textbox style="width:400px" value="<? echo $row['title'];?>"></td>
      </tr>
      <tr>
        <td width="33%" class="smallfont">
        <p align="right">Tiêu đề Footer</td>
        <td width="63%" class="smallfont">
		<INPUT TYPE="text" NAME="title_footer" CLASS=textbox style="width:400px" value="<? echo $row['title_footer'];?>"></td>
      </tr>
	        <tr>
        <td width="33%" class="smallfont">
        <p align="right">Điện thoại</td>
        <td width="63%" class="smallfont">
		<INPUT TYPE="text" NAME="phone" CLASS=textbox style="width:400px" value="<? echo $row['phone'];?>"></td>
      </tr>
	        <tr>
        <td width="33%" class="smallfont">
        <p align="right">Email</td>
        <td width="63%" class="smallfont">
		<INPUT TYPE="text" NAME="email" CLASS=textbox style="width:400px" value="<? echo $row['email'];?>"></td>
      </tr>
	        <tr>
        <td width="33%" class="smallfont">
        <p align="right">Địa chỉ</td>
        <td width="63%" class="smallfont">
		<INPUT TYPE="text" NAME="diachi" CLASS=textbox style="width:400px" value="<? echo $row['address'];?>"></td>
      </tr>
	   <tr>
        <td width="33%" class="smallfont">
        <p align="right">Hỗ trợ</td>
        <td width="63%" class="smallfont">
		<INPUT TYPE="text" NAME="hotro" CLASS=textbox style="width:400px" value="<? echo $row['hotro'];?>"></td>
      </tr>
	   <tr>
        <td width="33%" class="smallfont">
        <p align="right">Yahoo</td>
        <td width="63%" class="smallfont">
		<INPUT TYPE="text" NAME="yahoo" CLASS=textbox style="width:400px" value="<? echo $row['yahoo'];?>"></td>
      </tr>
	   <tr>
        <td width="33%" class="smallfont">
        <p align="right">Skype</td>
        <td width="63%" class="smallfont">
		<INPUT TYPE="text" NAME="skype" CLASS=textbox style="width:400px" value="<? echo $row['skype'];?>"></td>
      </tr>
	        <tr>
        <td width="33%" class="smallfont">
        <p align="right"> Thẻ Meta</td>
        <td width="63%" class="smallfont">
		<INPUT TYPE="text" NAME="meta" CLASS=textbox style="width:400px" value="<? echo $row['meta'];?>"></td>
      </tr>
	        <tr>
        <td width="33%" class="smallfont">
        <p align="right">Google Seo</td>
        <td width="63%" class="smallfont">
		<INPUT TYPE="text" NAME="google_seo" CLASS=textbox style="width:400px" value="<? echo $row['google_seo'];?>"></td>
      </tr>
	  	  	  	        <tr>
        <td width="33%" class="smallfont">
        <p align="right">Logo</td>
        <td width="63%" class="smallfont">
		<INPUT TYPE="file" NAME="txtImage" CLASS=textbox style="width:400px"></td>
      </tr>
	  	  	        <tr>
        <td width="33%" class="smallfont">
        <p align="right">Logo quảng cáo header</td>
        <td width="63%" class="smallfont">
		<INPUT TYPE="file" NAME="txtImageLogo" CLASS=textbox style="width:400px"></td>
      </tr>
	  	  	  	        <tr>
        <td width="33%" class="smallfont">
        <p align="right">Background</td>
        <td width="63%" class="smallfont">
		<INPUT TYPE="file" NAME="txtImageBg" CLASS=textbox style="width:400px"></td>
      </tr>
	  	        <tr>
        <td width="33%" class="smallfont">
        <p align="right">Bản đồ</td>
        <td width="63%" class="smallfont">
		<textarea style="width:700px; height:70px" name="map"><? echo $row['map']; ?></textarea></td>
      </tr>
      	        <tr>
        <td width="33%" class="smallfont">
        <p align="right">Google Anytic</td>
        <td width="63%" class="smallfont">
		<textarea style="width:700px; height:70px" name="anytic"><? echo $row['anytic']; ?></textarea></td>
      </tr>
      		
      <tr>
        <td width="96%" class="smallfont" colspan="2">
		<p align="center">
		<INPUT TYPE="submit" NAME="butSub" VALUE="Cập nhật" CLASS=button>&nbsp;</td>
      </tr>
    </table>
    </td>
  </tr>
  </table>
</form>