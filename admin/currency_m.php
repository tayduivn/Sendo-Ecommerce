<?
if (isset($_POST['butSaveLoai'])) {
	$code=$_POST['code'];
	$name=trim($_POST['name']);
	$conver=$_POST['conver'];
	$thutu=$_POST['thutu'];
			
	if ($code=="")
	{
		echo "<p align=center class='err'>B&#7841;n ch&#432;a nh&#7853;p Mã</p>";
	}
	else
	{
		if (!empty($_POST['oldid'])) {
			$oldid = $_POST['oldid'];
			$sql = "update currency set code='".$code."', name='".$name."', conver='".$conver."', thutu=".$thutu." where id='".$oldid."'";
		}
		else 
			$sql = "insert into currency (code, name, conver, thutu) values ('".$code."','".$name."','".$conver."','".$thutu."')";
		if (mysql_query($sql,$con)) {
			echo "<p align=center class='err'>&#272;ã c&#7853;p nh&#7853;t thành công</p><br>";
			echo "<script>window.location='index.php?act=currency&page=".$_REQUEST['page']."'</script>";
		}
		else echo "<p align=center class='err'>Không th&#7875; c&#7853;p nh&#7853;t</p>";
	}
} 
?>

<?
	if (isset($_GET['id'])) {
		$oldid=$_GET['id'];
		$sql = "select * from currency where id='".$oldid."'";
		if ($result = mysql_query($sql,$con)) {
			$row=mysql_fetch_array($result);
			$code=$row['code'];
			$name=$row['name'];
			$conver=$row['conver'];
			$thutu=$row['thutu'];
		}
	}
?>

<form method="POST" name="FormLoaiSP" action="index.php">
<input type=hidden name="act" value="currency_m">
<input type=hidden name="oldid" value="<? echo $oldid; ?>">
<input type=hidden name="page" value="<? echo $_REQUEST['page']; ?>">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" height="20" align="center" class="title">
	Thêm m&#7899;i / C&#7853;p nh&#7853;t : Currency</td>
  </tr>
  <tr>
    <td width="45%">
    <table border="0" cellpadding="4" bordercolor="#111111" width="124%" id="AutoNumber2" cellspacing="0">
	<tr>
        <td width="15%" class="smallfont">
        <p align="right">Code</td>
        <td width="1%" class="smallfont">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $code; ?>" TYPE="text" NAME="code" CLASS=textbox size="34"></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Tên</td>
        <td width="1%" class="smallfont">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $name; ?>" TYPE="text" NAME="name" CLASS=textbox size="34"></td>
      </tr>      
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Convert</td>
        <td width="1%" class="smallfont">
        &nbsp;</td>
        <td width="83%" class="smallfont">
        <INPUT value="<? echo $conver; ?>" TYPE="text" NAME="conver" CLASS=textbox size="34"></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont" align="right">
        Thu tu</td>
        <td width="1%" class="smallfont" align="right">
        &nbsp;</td>
        <td width="83%" class="smallfont">
		<input type="text" value="<? echo $thutu; ?>" name="thutu"></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont">
		<p align="right"><INPUT TYPE="submit" NAME="butSaveLoai" VALUE=" L&#432;u " CLASS=button>&nbsp;</td>
        <td width="1%" class="smallfont">
		&nbsp;</td>
        <td width="83%" class="smallfont"><p align="left">&nbsp;<INPUT TYPE="reset" CLASS=button></td>
      </tr>
    </table>
    </td>
  </tr>
  </table>
</form>