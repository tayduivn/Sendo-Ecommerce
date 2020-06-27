<?
if (isset($_POST['butSub'])) {
	$pro_vip = $_POST['pro_vip'];
	$adv_vip = $_POST['adv_vip'];
	$job_vip = $_POST['job_vip'];
	$news_vip = $_POST['news_vip'];
	$service_vip = $_POST['service_vip'];
	$company_vip = $_POST['company_vip'];
	$slider_vip = $_POST['slider_vip'];
	$link_vip = $_POST['link_vip'];
	$support_vip = $_POST['support_vip'];
	$pro_free = $_POST['pro_free'];
	$adv_free = $_POST['adv_free'];
	$job_free = $_POST['job_free'];
	$news_free = $_POST['news_free'];
	$service_free = $_POST['service_free'];
	$company_free = $_POST['company_free'];
	$slider_free = $_POST['slider_free'];
	$link_free = $_POST['link_free'];
	$support_free = $_POST['support_free'];

	$sql = "update config_user set pro_vip='".$pro_vip."', adv_vip='".$adv_vip."', job_vip='".$job_vip."', news_vip='".$news_vip."', service_vip='".$service_vip."', company_vip='".$company_vip."', slider_vip='".$slider_vip."', link_vip='".$link_vip."', support_vip='".$support_vip."',pro_free='".$pro_free."',adv_free='".$adv_free."',job_free='".$job_free."',news_free='".$news_free."',service_free='".$service_free."',company_free='".$company_free."',slider_free='".$slider_free."',link_free='".$link_free."',support_free='".$support_free."' where id=1";
		if (mysql_query($sql,$con)) 
			{
			$err="Cài đặt trang thành công";
		    }	

		else
			{
			$err =  "<p align=center class='err'>Không th&#7875; c&#7853;p nh&#7853;t</p>";
		    }
  	}
?>
<?php
$sql1=mysql_query("SELECT * FROM config_user where id=1");
$row=mysql_fetch_assoc($sql1);
?>
<form method="POST" name="FormLoaiSP" enctype="multipart/form-data" action="index.php?act=config_user">
<input type=hidden name="oldid" value="<? echo $oldid; ?>">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" align="center" class="title" height="20">
    Cài đặt hiển thị đăng tải thành viên</td>
  </tr>
  								<tr>
	<td align="center" style="padding-left:400px; color:blue; font-weight:bold"><? echo $err;?></td>
	</tr>
  <tr>
    <td width="100%">
    <table border="0" cellpadding="4" bordercolor="#111111" width="90%" id="AutoNumber2" cellspacing="0">
	 <tr>
        <td width="96%" class="smallfont" colspan="4">
		<div style="text-align:center;border-bottom:1px solid #C0C0C0">THÀNH VIÊN VIP</div>
		</td>
      </tr>
	  <tr>
        <td width="25%" class="smallfont">
        <p align="right">Sản phẩm</td>
        <td width="25%" class="smallfont">
		<INPUT TYPE="text" NAME="pro_vip" CLASS=textbox style="width:100px" value="<? echo $row['pro_vip'];?>">
		</td>
		<td width="25%" class="smallfont">
        <p align="right">Rao vặt</td>
        <td width="25%" class="smallfont">
		<INPUT TYPE="text" NAME="adv_vip" CLASS=textbox style="width:100px" value="<? echo $row['adv_vip'];?>">
		</td>
      </tr>
	  <tr>
        <td width="10%" class="smallfont">
        <p align="right">Việc làm</td>
        <td width="40%" class="smallfont">
		<INPUT TYPE="text" NAME="job_vip" CLASS=textbox style="width:100px" value="<? echo $row['job_vip'];?>">
		</td>
		<td width="10%" class="smallfont">
        <p align="right">Tin tức</td>
        <td width="40%" class="smallfont">
		<INPUT TYPE="text" NAME="news_vip" CLASS=textbox style="width:100px" value="<? echo $row['news_vip'];?>">
		</td>
      </tr>
	  <tr>
        <td width="10%" class="smallfont">
        <p align="right">Dịch vụ</td>
        <td width="40%" class="smallfont">
		<INPUT TYPE="text" NAME="service_vip" CLASS=textbox style="width:100px" value="<? echo $row['service_vip'];?>">
		</td>
		<td width="10%" class="smallfont">
        <p align="right">Công ty</td>
        <td width="40%" class="smallfont">
		<INPUT TYPE="text" NAME="company_vip" CLASS=textbox style="width:100px" value="<? echo $row['company_vip'];?>">
		</td>
      </tr>
	  <tr>
        <td width="10%" class="smallfont">
        <p align="right">Slider</td>
        <td width="40%" class="smallfont">
		<INPUT TYPE="text" NAME="slider_vip" CLASS=textbox style="width:100px" value="<? echo $row['slider_vip'];?>">
		</td>
		<td width="10%" class="smallfont">
        <p align="right">Liên kết</td>
        <td width="40%" class="smallfont">
		<INPUT TYPE="text" NAME="link_vip" CLASS=textbox style="width:100px" value="<? echo $row['link_vip'];?>">
		</td>
      </tr>
	  <tr>
        <td width="10%" class="smallfont">
        <p align="right">Hỗ trợ trực tuyến</td>
        <td width="40%" class="smallfont">
		<INPUT TYPE="text" NAME="support_vip" CLASS=textbox style="width:100px" value="<? echo $row['support_vip'];?>">
		</td>
		<td width="10%" class="smallfont">
        <p align="right"></td>
        <td width="40%" class="smallfont">
		</td>
      </tr>

	  <tr>
        <td width="96%" class="smallfont" colspan="4">
		<div style="text-align:center;border-bottom:1px solid #C0C0C0">THÀNH VIÊN FREE</div>
		</td>
      </tr>
	  <tr>
        <td width="25%" class="smallfont">
        <p align="right">Sản phẩm</td>
        <td width="25%" class="smallfont">
		<INPUT TYPE="text" NAME="pro_free" CLASS=textbox style="width:100px" value="<? echo $row['pro_free'];?>">
		</td>
		<td width="25%" class="smallfont">
        <p align="right">Rao vặt</td>
        <td width="25%" class="smallfont">
		<INPUT TYPE="text" NAME="adv_free" CLASS=textbox style="width:100px" value="<? echo $row['adv_free'];?>">
		</td>
      </tr>
	  <tr>
        <td width="10%" class="smallfont">
        <p align="right">Việc làm</td>
        <td width="40%" class="smallfont">
		<INPUT TYPE="text" NAME="job_free" CLASS=textbox style="width:100px" value="<? echo $row['job_free'];?>">
		</td>
		<td width="10%" class="smallfont">
        <p align="right">Tin tức</td>
        <td width="40%" class="smallfont">
		<INPUT TYPE="text" NAME="news_free" CLASS=textbox style="width:100px" value="<? echo $row['news_free'];?>">
		</td>
      </tr>
	  <tr>
        <td width="10%" class="smallfont">
        <p align="right">Dịch vụ</td>
        <td width="40%" class="smallfont">
		<INPUT TYPE="text" NAME="service_free" CLASS=textbox style="width:100px" value="<? echo $row['service_free'];?>">
		</td>
		<td width="10%" class="smallfont">
        <p align="right">Công ty</td>
        <td width="40%" class="smallfont">
		<INPUT TYPE="text" NAME="company_free" CLASS=textbox style="width:100px" value="<? echo $row['company_free'];?>">
		</td>
      </tr>
	  <tr>
        <td width="10%" class="smallfont">
        <p align="right">Slider</td>
        <td width="40%" class="smallfont">
		<INPUT TYPE="text" NAME="slider_free" CLASS=textbox style="width:100px" value="<? echo $row['slider_free'];?>">
		</td>
		<td width="10%" class="smallfont">
        <p align="right">Liên kết</td>
        <td width="40%" class="smallfont">
		<INPUT TYPE="text" NAME="link_free" CLASS=textbox style="width:100px" value="<? echo $row['link_free'];?>">
		</td>
      </tr>
	  <tr>
        <td width="10%" class="smallfont">
        <p align="right">Hỗ trợ trực tuyến</td>
        <td width="40%" class="smallfont">
		<INPUT TYPE="text" NAME="support_free" CLASS=textbox style="width:100px" value="<? echo $row['support_free'];?>">
		</td>
		<td width="10%" class="smallfont">
        <p align="right"></td>
        <td width="40%" class="smallfont">
		</td>
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