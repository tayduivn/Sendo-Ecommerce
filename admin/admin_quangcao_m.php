<?
$path = "../images/slider";
$pathdb = "images/slider";
if (isset($_POST['butSaveLoai'])) {
	$status=$_POST['status'];
	$thoigian=$_POST['thoigian'];
	$name=$_POST['name'];
	$date=$_POST['date'];
	$dateend=$_POST['dateend'];
	$thanhtoan=$_POST['thanhtoan'];
	$banner=$_POST['banner'];
	$thutu=$_POST['thutu'];
	$ghichu=$_POST['ghichu'];
	$sanpham=$_POST['sanpham'];

	$err="";
	if ($name=="") $err .=  "Xin nh&#7853;p tên<br>";
	$err.=CheckUpload($_FILES["txtImage"],".jpg;.gif;.bmp;.png;.swf",500*1024,$_POST['id']==''?1:0);
	
	if ($err=='')
	{
		if (!empty($_POST['id'])) {
			$oldid = $_POST['id'];
			$sql = "update quangcao set sanpham='".$sanpham."',status='".$status."',thoigian='".$thoigian."',name='".$name."', date='".$date."', dateend='".$dateend."', ghichu='".$ghichu."', thanhtoan='".$thanhtoan."', thutu='".$thutu."' where id='".$oldid."'";
		}else {
			$sql = "insert into slider_show_home (name, link, mieuta, thutu) values ('".$name."','".$address."','".$mieuta."','".$sortorder."')";
		}
		if (mysql_query($sql,$con)) {
			if(empty($_POST['id'])) $oldid = mysql_insert_id();

			$sqlUpdateField = "";
			
			$extsmall=GetFileExtention($_FILES['txtImage']['name']);
			if (MakeUpload($_FILES['txtImage'],"$path/slider_home_s$oldid$extsmall"))
			{
				@chmod("$path/slider_home_s$oldid$extsmall", 0777);
				$sqlUpdateField = " image='$pathdb/slider_home_s$oldid$extsmall' ";
			}
			if($sqlUpdateField)
			{
				$sqlUpdate = "update quangcao set $sqlUpdateField where id='".$oldid."'";
				mysql_query($sqlUpdate,$con);
			}
		}	
		else {
			$err =  "<p align=center class='err'>Không th&#7875; c&#7853;p nh&#7853;t</p>";
		}
  	}
  	if ($err=='') echo '<script>window.location="index.php?act=quangcao"</script>';
  	else echo '<p align=center class="err" style="line-height: 150%">'.$err.'</p>';
} 
?>

<?
	if (isset($_GET['id'])) {
		$oldid=$_GET['id'];
		$page = $_GET['page'];
		$sql = "select * from quangcao where id='".$oldid."' limit 1";
		if ($result = mysql_query($sql,$con)) {
			$row=mysql_fetch_array($result);
			$status=$row['status'];
			$thoigian=$row['thoigian'];
			$name=$row['name'];
			$date=$row['date'];
			$dateend=$row['dateend'];
			$thanhtoan=$row['thanhtoan'];
			$banner=$row['banner'];
			$thutu=$row['thutu'];
			$ghichu=$row['ghichu'];
			$sanpham=$row['sanpham'];


		}
	}
?>

<form method="post" name="FormLoaiSP" enctype="multipart/form-data" action="">
<input type="hidden" name="act" value="suaquangcao">
<input type="hidden" name="page" value="<? echo $_REQUEST['page']; ?>">
<input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>">
<? 
if ($image!='')
{
?>
<table cellspacing="0" cellpadding="0" width="100%">
<tr>
	<td align="center">
	<img border="0" src="<? echo $image; ?>">
	</td>
</tr>
</table>
<?
}
?>

<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" class="title" align="center" height="20">Sửa quảng cáo</td>
  </tr>
  <tr>
    <td width="45%">
    <table border="0" cellpadding="2" bordercolor="#111111" width="100%" id="AutoNumber2" cellspacing="0">
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Trạng thái</td>
        <td width="1%" class="smallfont" align="center">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		                     <select value="<? echo $status; ?>" name="status"  class="form-control" >
				    <option value="<? echo $status; ?>"  ><? echo $status; ?></option>
                    <option value="Kích hoạt"  >Kích hoạt</option>
					<option value="Hủy"  >Hủy</option>
					<option value="Chờ thanh toán"  >Chờ thanh toán</option>
	
                  </select>

      </tr>
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Thời gian</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $thoigian; ?>" TYPE="text" NAME="thoigian" CLASS=textbox size="34"></td>
      </tr>
	        <tr>
        <td width="15%" class="smallfont">
        <p align="right">Loại quảng cáo</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $name; ?>" TYPE="text" NAME="name" CLASS=textbox size="34"></td>
      </tr>
	        <tr>
        <td width="15%" class="smallfont">
        <p align="right">Ngày kích hoạt	</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $date; ?>" TYPE="text" NAME="date" CLASS=textbox size="34"></td>
      </tr>
	        <tr>
        <td width="15%" class="smallfont">
        <p align="right">Ngày hết hạn</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $dateend; ?>" TYPE="text" NAME="dateend" CLASS=textbox size="34"></td>
      </tr>
	        <tr>
        <td width="15%" class="smallfont">
        <p align="right">Thanh toán</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $thanhtoan; ?>" TYPE="text" NAME="thanhtoan" CLASS=textbox size="34"></td>
      </tr>
	        
	        <tr>
        <td width="15%" class="smallfont">
        <p align="right">Thứ tự</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $thutu; ?>" TYPE="text" NAME="thutu" CLASS=textbox size="34"></td>
      </tr>
	        <tr>
        <td width="15%" class="smallfont">
        <p align="right">Ghi chú</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td  width="83%" class="smallfont" >
		<textarea value="<? echo $ghichu; ?>" TYPE="text" NAME="ghichu" CLASS=textbox size="34"  ><? echo $ghichu; ?></textarea> </td>
      </tr>
	  <tr>
        <td width="15%" class="smallfont">
        <p align="right">ID SP</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td  width="83%" class="smallfont" >
		<INPUT value="<? echo $sanpham; ?>" TYPE="text" NAME="sanpham" CLASS=textbox size="34"  > </td>
      </tr>
	  
	       
	

      <tr>
        <td width="15%" class="smallfont">
		<p align="right">
		<INPUT TYPE="submit" NAME="butSaveLoai" VALUE="C&#7853;p nh&#7853;t" CLASS=button>&nbsp;</td>
        <td width="1%" class="smallfont" align="center">
		&nbsp;</td>
        <td width="83%" class="smallfont"><p align="left">&nbsp;<INPUT TYPE="reset" CLASS=button value="Nh&#7853;p l&#7841;i"></td>
      </tr>
    </table>
    </td>
  </tr>
  
  </table>
  
</form>
<a  target="bank_" href="/<? echo $row['banner'];?>" ><img src="/<? echo $row['banner'];?>" width="100" height="50"></a>