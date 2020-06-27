
<?
if(!session_id()) session_start();
mysql_connect("localhost","shopct16_data","S@2V5Ey@MjzW@1") or die(mysql_error());
mysql_select_db("shopct16_data");
$user=$_SESSION['mem'];
$path = "upload/banner/";
$pathdb = "upload/banner";
$user=$_SESSION['mem'];

if (isset($_POST['butSub'])) 
{
	$name=addslashes($_POST['name']);
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$company = $_POST['company'];
	$brithday = $_POST['brithday'];
	$sex = $_POST['sex'];
	$city = $_POST['city'];
    $logo=$_POST['actual_image_name1'];
			
	$sql = "update thanhvien set fullname='".$name."',address='".$address."', brithday='".$brithday."', sex='".$sex."', phone='".$phone."' where user='".$user."' ";
		if (mysql_query($sql)) 
            {
			echo '<script>alert("Cập nhật thành công");location="../../?home=member&act=change_account";</script>';
		    }	

		else {
			$err =  "<p align=center class='err'>Không th&#7875; c&#7853;p nh&#7853;t</p>";
		     }
  }
?>

<h3 style="
    color: #e5101d;
    font-size: 16px;
    font-weight: bold;
    height: 32px;
    line-height: 30px;
    border-bottom: 1px solid #ededed;
    text-transform: uppercase;
    margin-top: 0px;
">THÔNG TIN TÀI KHOẢN</h3>

<div id="member_right_content">
<?php
$sql1=mysql_query("SELECT * FROM thanhvien where user='".$_SESSION['mem']."'");
$row=mysql_fetch_assoc($sql1);
?>
<?
		$sql3 = "select * from thanhvien where user='".$_SESSION['mem']."'";
		if ($result = mysql_query($sql3,$con)) {
			$row=mysql_fetch_array($result);
			$cat_mem=$row['cat_mem'];
			$tem_mem=$row['template'];

		}
     
?>

<form method="post" name="frmAdd" >
  <table border="0" cellpadding="4" cellspacing="0" style="border-collapse: collapse" bordercolor="#C0C0C0" width="80%" id="AutoNumber1">
  	<tr>
	<td align="center" style="padding-left:400px; color:blue; font-weight:bold">
    <form id="imageform21" method="post" enctype="multipart/form-data" action='#'></form>
    </td>
	</tr>
  	<tr>
	<td align="center" style="padding-left:400px; color:blue; font-weight:bold"><? echo $err;?></td>
	</tr>
  <tr>
    <td width="45%">
    <table border="0" cellpadding="4" cellspacing="0" style="border-collapse: collapse" bordercolor="#C0C0C0" width="100%" id="AutoNumber1">
	        <tr>
        <td width="33%" class="smallfont">
        <p align="right">Họ và tên</p></td>
        <td width="63%" class="smallfont" style="padding:15x;">
		<INPUT style="   padding-left: 5px; height: 34px; line-height: 30px; width: 511px; border: 1px solid #ddd; border-radius: 2px; " CLASS=textbox TYPE="text" NAME="name"  size="34" value="<? echo $row['fullname'];?>"></td>
      </tr>
	        <tr>
        <td width="33%" class="smallfont">
        <p align="right">Ngày sinh</p></td>
        <td width="63%" class="smallfont" style="padding-left: 15x;">
		<INPUT style="    padding-left: 5px; height: 34px; line-height: 30px; width: 511px; border: 1px solid #ddd; border-radius: 2px; " TYPE="text" NAME="brithday" CLASS=textbox size="34" value="<? echo $row['brithday'];?>"> 

		</td>
      </tr>
	        <tr>
        <td width="33%" class="smallfont">
        <p align="right">Giới tính</p></td>
        <td width="63%" class="smallfont" style="padding-left: 15x;">
       <select name="sex">
	   <? if($row['sex']=='0')
	   {?>
	   <option value="0" selected>Nam</option>
	   <option value="1">Nữ</option>
	   <?}else{?>
	   <option value="1" selected>Nữ</option>
	   <option value="0">Nam</option>
	   <?}?>
	   </select>
		</td>
      </tr>
	        <tr>
        <td width="33%" class="smallfont">
        <p align="right">&#272;i&#7879;n tho&#7841;i</p></td>
        <td width="63%" class="smallfont" style="padding-left: 15x;">
		<INPUT style="    padding-left: 5px; height: 34px; line-height: 30px; width: 511px; border: 1px solid #ddd; border-radius: 2px; " TYPE="text" NAME="phone" CLASS=textbox size="34" value="<? echo $row['phone'];?>">
		
		</td>
      </tr>
	   <tr>
        <td width="33%" class="smallfont">
        <p align="right">Địa chỉ</p></td>
        <td width="63%" class="smallfont" style="padding-left: 15x;">
		<INPUT style="    padding-left: 5px; height: 34px; line-height: 30px; width: 511px; border: 1px solid #ddd; border-radius: 2px; " TYPE="text" NAME="address" CLASS=textbox size="64" value="<? echo $row['address'];?>" >

		</td>
      </tr>
	        <tr>
        <td width="33%" class="smallfont">
        <p align="right">Email</p></td>
        <td width="63%" class="smallfont" style="padding-left: 15x;">
		<INPUT style="
    background: #f8f8f8;
" TYPE="text" style="     padding-left: 5px; height: 34px; line-height: 30px; width: 511px; border: 1px solid #ddd; border-radius: 2px; " NAME="email" CLASS=textbox size="34" value="<? echo $row['email'];?>" disabled="disabled"></td>
      </tr>
	        
	        

      <tr>
        <td width="96%" class="smallfont" colspan="2">
		<p align="center">
		<INPUT style="
    background: #e5101d;
    padding: 0 15px;
    border-radius: 2px;
    color: #fff;
    font-weight: bold;
    line-height: 32px;
    font-size: 13px;
" TYPE="submit" NAME="butSub" VALUE="Thay đổi" CLASS=button>&nbsp;</td>
      </tr>
    </table>
    </td>
  </tr>


   </table> 
</form>



</div>
</div>