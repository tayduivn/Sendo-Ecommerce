<?
if (isset($_POST['butSub'])) {
	$pro_home = $_POST['pro_home'];
	$adv_home = $_POST['adv_home'];
	$store_home = $_POST['store_home'];
	$list_pro = $_POST['list_pro'];
	$pro_relate = $_POST['pro_relate'];
	$pro_relate_user = $_POST['pro_relate_user'];
	$pro_vip = $_POST['pro_vip'];
	$adv_new = $_POST['adv_new'];
	$adv_relate = $_POST['adv_relate'];
	$adv_list = $_POST['adv_list'];
	$store_new = $_POST['store_new'];
	$store_list = $_POST['store_list'];
	$job_new = $_POST['job_new'];
	$job_list = $_POST['job_list'];
	$adv_job_vip = $_POST['adv_job_vip'];
	$company_new = $_POST['company_new'];
	$company_cat = $_POST['company_cat'];

	$sql = "update config_home set pro_home='".$pro_home."', adv_home='".$adv_home."', store_home='".$store_home."', list_pro='".$list_pro."', pro_relate='".$pro_relate."', pro_relate_user='".$pro_relate_user."', pro_vip='".$pro_vip."', adv_new='".$adv_new."', adv_relate='".$adv_relate."',adv_list='".$adv_list."',store_new='".$store_new."',store_list='".$store_list."',job_new='".$job_new."',job_list='".$job_list."',adv_job_vip='".$adv_job_vip."',company_new='".$company_new."',company_cat='".$company_cat."'";
		if (mysql_query($sql,$con)) 
			{
			$err="Cài đặt trang thành công";
		    }	

		else
			{
			$err =  "<p align=center class='err'>Không th&#7875; c&#7853;p nh&#7853;t</p>";
		    }
  	}
$sql1=mysql_query("SELECT * FROM config_home ");
$row=mysql_fetch_assoc($sql1);
?>

<form method="POST" name="FormLoaiSP" enctype="multipart/form-data" action="index.php?act=config_views">
<input type=hidden name="oldid" value="<? echo $oldid; ?>">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" align="center" class="title" height="20">
    Cài đặt trang</td>
  </tr>
  								<tr>
	<td align="center" style="padding-left:400px; color:blue; font-weight:bold"><? echo $err;?></td>
	</tr>
  <tr>
    <td width="100%">
    <table border="0" cellpadding="4" bordercolor="#111111" width="90%" id="AutoNumber2" cellspacing="0">
	  <tr>
        <td width="25%" class="smallfont">
        <p align="right">Sản phẩm trang chủ</td>
        <td width="25%" class="smallfont">
		<INPUT TYPE="text" NAME="pro_home" CLASS=textbox style="width:100px" value="<? echo $row['pro_home'];?>">
		</td>
		<td width="25%" class="smallfont">
        <p align="right">Rao vặt trang chủ</td>
        <td width="25%" class="smallfont">
		<INPUT TYPE="text" NAME="adv_home" CLASS=textbox style="width:100px" value="<? echo $row['adv_home'];?>">
		</td>
      </tr>
	  <tr>
        <td width="10%" class="smallfont">
        <p align="right">Gian hàng trang chủ</td>
        <td width="40%" class="smallfont">
		<INPUT TYPE="text" NAME="store_home" CLASS=textbox style="width:100px" value="<? echo $row['store_home'];?>">
		</td>
		<td width="10%" class="smallfont">
        <p align="right">Danh sách sản phẩm trang chủ</td>
        <td width="40%" class="smallfont">
		<INPUT TYPE="text" NAME="list_pro" CLASS=textbox style="width:100px" value="<? echo $row['list_pro'];?>">
		</td>
      </tr>
	  <tr>
        <td width="10%" class="smallfont">
        <p align="right">Sản phẩm cùng thể loại</td>
        <td width="40%" class="smallfont">
		<INPUT TYPE="text" NAME="pro_relate" CLASS=textbox style="width:100px" value="<? echo $row['pro_relate'];?>">
		</td>
		<td width="10%" class="smallfont">
        <p align="right">Sản phẩm cùng thành viên</td>
        <td width="40%" class="smallfont">
		<INPUT TYPE="text" NAME="pro_relate_user" CLASS=textbox style="width:100px" value="<? echo $row['pro_relate_user'];?>">
		</td>
      </tr>
	  <tr>
        <td width="10%" class="smallfont">
        <p align="right">Sản phẩm Vip/Mới</td>
        <td width="40%" class="smallfont">
		<INPUT TYPE="text" NAME="pro_vip" CLASS=textbox style="width:100px" value="<? echo $row['pro_vip'];?>">
		</td>
		<td width="10%" class="smallfont">
        <p align="right">Rao vặt mới trên trang rao vặt</td>
        <td width="40%" class="smallfont">
		<INPUT TYPE="text" NAME="adv_new" CLASS=textbox style="width:100px" value="<? echo $row['adv_new'];?>">
		</td>
      </tr>
	  <tr>
        <td width="10%" class="smallfont">
        <p align="right">Rao vặt cùng thể loại trang rao vặt</td>
        <td width="40%" class="smallfont">
		<INPUT TYPE="text" NAME="adv_relate" CLASS=textbox style="width:100px" value="<? echo $row['adv_relate'];?>">
		</td>
		<td width="10%" class="smallfont">
        <p align="right">Rao vặt theo danh mục Trang rao vặt</td>
        <td width="40%" class="smallfont">
		<INPUT TYPE="text" NAME="adv_list" CLASS=textbox style="width:100px" value="<? echo $row['adv_list'];?>">
		</td>
      </tr>
	  <tr>
        <td width="10%" class="smallfont">
        <p align="right">Gian hàng mới Trang gian hàng</td>
        <td width="40%" class="smallfont">
		<INPUT TYPE="text" NAME="store_new" CLASS=textbox style="width:100px" value="<? echo $row['store_new'];?>">
		</td>
		<td width="10%" class="smallfont">
        <p align="right">Gian hàng theo danh mục Trang gian hàng</td>
        <td width="40%" class="smallfont">
		<INPUT TYPE="text" NAME="store_list" CLASS=textbox style="width:100px" value="<? echo $row['store_list'];?>">
		</td>
      </tr>
	  <tr>
        <td width="10%" class="smallfont">
        <p align="right">Tuyển dụng mới trang tuyển dụng</td>
        <td width="40%" class="smallfont">
		<INPUT TYPE="text" NAME="job_new" CLASS=textbox style="width:100px" value="<? echo $row['job_new'];?>">
		</td>
		<td width="10%" class="smallfont">
        <p align="right">Tuyển dung theo danh mục Trang tuyển dụng</td>
        <td width="40%" class="smallfont">
		<INPUT TYPE="text" NAME="job_list" CLASS=textbox style="width:100px" value="<? echo $row['job_list'];?>">
		</td>
      </tr>
	  <tr>
        <td width="10%" class="smallfont">
        <p align="right">Rao vặt/Tuyển dụng Vip</td>
        <td width="40%" class="smallfont">
		<INPUT TYPE="text" NAME="adv_job_vip" CLASS=textbox style="width:100px" value="<? echo $row['adv_job_vip'];?>">
		</td>
		<td width="10%" class="smallfont">
		<p align="right">Danh bạ doanh nghiệp mới</td>
        <td width="40%" class="smallfont">
		<INPUT TYPE="text" NAME="company_new" CLASS=textbox style="width:100px" value="<? echo $row['company_new'];?>">
		</td>
      </tr>
	  <tr>
        <td width="10%" class="smallfont">
        <p align="right">Danh ba doanh nghiệp theo danh mục</td>
        <td width="40%" class="smallfont">
		<INPUT TYPE="text" NAME="company_cat" CLASS=textbox style="width:100px" value="<? echo $row['company_cat'];?>">
		</td>
		<td width="10%" class="smallfont">
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