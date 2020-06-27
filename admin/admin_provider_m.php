<?
$path = "../products";
$pathdb = "../products";
if (isset($_POST['butSaveLoai'])) {
	$name=trim($_POST['txtName']);
	$address=$_POST['txtAddress'];
	$phone=$_POST['txtPhone'];
	$email=$_POST['txtEmail'];
	$status=($_POST['chkShow']!=''?1:0);
    $page = $_POST['page'];

	$err=""; 
	if ($name=="") $err.=  "Xin nh&#7853;p tên nhà cung c&#7845;p <br>";
	$err.=CheckUpload($_FILES["txtImage"],".jpg;.gif;.bmp",5000*1024,$_POST['id']==''?1:0);
	
	if ($err=='')
	{
		if (!empty($_POST['id'])) {
			$oldid = $_POST['id'];
			$sql = "update providers set providers_name='".$name."', providers_address='".$address."', providers_phone='".$phone."', providers_email='".$email."', providers_status=".$status.", language='vn' where providers_id='".$oldid."'";
		}else {
			$sql = "insert into providers (providers_name,providers_address,providers_phone,providers_email,providers_status, providers_dateadded,language) values ('".$name."','".$address."','".$phone."','".$email."','".$status."',SYSDATE(),'vn')";
		}			
           	if (mysql_query($sql,$con)) {
			if(empty($_POST['id'])) $oldid = mysql_insert_id();
		
			$sqlUpdateField = "";
			
			$extsmall=GetFileExtention($_FILES['txtImage']['name']);
			
			
			if (MakeUpload($_FILES['txtImage'],"$path/providers_s$oldid$extsmall"))
			{
				@chmod("$path/providers_s$oldid$extsmall", 0777);
				$sqlUpdateField = " providers_image='$pathdb/providers_s$oldid$extsmall' ";
			}

			if($sqlUpdateField!='')
			{
				$sqlUpdate = "update providers set $sqlUpdateField where providers_id='".$oldid."'";
				mysql_query($sqlUpdate,$con);
			}
		}	

		else {
			$err =  "Không th&#7875; c&#7853;p nh&#7853;t";
		}
  	}
  	if ($err=='') echo "<script>window.location='index.php?act=provider&page=".$_REQUEST['page']."'</script>";
  	else echo "<p align=center class='err'>".$err."</p>";
}
?>
<?
	if (isset($_GET['id'])) {
		$oldid=$_GET['id'];
		$page = $_GET['page'];
		$sql = "select * from providers where providers_id='".$oldid."'";
		if ($result = mysql_query($sql,$con)) {
			$row=mysql_fetch_array($result);
			$name=$row['providers_name'];
			$image=$row['providers_image'];
			$address=$row['providers_address'];
			$phone=$row['providers_phone'];
			$email=$row['providers_email'];
			$status=$row['providers_status'];
			$date=$row['providers_dateadded'];
		}
	}
?>

<form method="POST" name="FormLoaiSP" enctype="multipart/form-data" action="index.php">
<input type=hidden name="act" value="provider_m">
<input type=hidden name="id" value="<? echo $_REQUEST['id']; ?>">
<input type=hidden name="page" value="<? echo $_REQUEST['page']; ?>">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" height="20" align="center" class="title">
	Thêm m&#7899;i / C&#7853;p nh&#7853;t : Nhà cung c&#7845;p</td>
  </tr>
  <tr>
    <td width="45%">
    <table border="0" cellpadding="4" bordercolor="#111111" width="124%" id="AutoNumber2" cellspacing="0">
      <?    
if ($image!='')
{
	echo '<tr><td colspan="3" align="center"><img border="0" src="'.$image.'"></td></tr>';
}
?>		

      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Tên nhà cung c&#7845;p</td>
        <td width="1%" class="smallfont">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $name; ?>" TYPE="text" NAME="txtName" CLASS=textbox size="34"></td>
      </tr>
	<tr>
        <td width="15%" class="smallfont">
        <p align="right">Hình &#7843;nh</td>
        <td width="1%" class="smallfont" align="center">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT TYPE="file" NAME="txtImage" CLASS=textbox size="34"></td>
      </tr>

      <tr>
        <td width="15%" class="smallfont">
        <p align="right">&#272;&#7883;a ch&#7881;</td>
        <td width="1%" class="smallfont">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $address; ?>" TYPE="text" NAME="txtAddress" CLASS=textbox size="34"></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">&#272;i&#7879;n tho&#7841;i</td>
        <td width="1%" class="smallfont">
        &nbsp;</td>
        <td width="83%" class="smallfont">
        <INPUT value="<? echo $phone; ?>" TYPE="text" NAME="txtPhone" CLASS=textbox size="34"></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont" align="right">
        Không hi&#7875;n th&#7883;</td>
        <td width="1%" class="smallfont" align="right">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<input type="checkbox" name="chkShow" value="ON" <? if ($status>0) echo 'checked' ?>></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont" align="right">
        Email</td>
        <td width="1%" class="smallfont" align="right">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $email; ?>" TYPE="text" NAME="txtEmail" CLASS=textbox size="34"></td>
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
  </table>
</form>