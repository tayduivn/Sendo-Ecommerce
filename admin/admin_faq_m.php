<?
if (isset($_POST['butSaveLoai'])) {
	$question=$_POST['txtQuestion'];
	$answer=$_POST['txtAnswer'];
	$name=($_POST['txtName']);
	$ten=($_POST['txtTen']);
	$phone=($_POST['txtPhone']);
	$email=($_POST['txtEmail']);
	$order=(int)$_POST['txtSortOrder'];
	$status=($_POST['chkShow']!=''?1:0);
	$categories_id=$_POST['txtParent'];
	$gioitinh=$_POST['ddGt'];

	$page = $_POST['page'];

	$err="";
	if (strlen($ten)<=0) $err="B&#7841;n ch&#432;a nh&#7853;p tên câu h&#7887;i<br>";

	if (strlen($question)<=0) $err="B&#7841;n ch&#432;a nh&#7853;p câu h&#7887;i<br>";

	if ($err=='')
	{
		if (!empty($_POST['id'])) {
			$oldid = $_POST['id'];
			$sql = "update faq set faq_nameqa='".$ten."',faq_question='".$question."',faq_answer='".$answer."',faq_name='".$name."',faq_phone='".$phone."',faq_email='".$email."',faq_sortorder='".$order."',faq_status='".$status."',faq_gioitinh='".$gioitinh."',faq_categoriesid='".$categories_id."' where faq_id='".$oldid."'";
		}else {
			$sql = "insert into faq (faq_nameqa,faq_question,faq_answer,faq_name,faq_phone,faq_email,faq_sortorder,faq_status,faq_dateadded,faq_categoriesid,faq_gioitinh) values ('".$ten."','".$question."','".$answer."','".$name."','".$phone."','".$email."','".$order."','".$status."',SYSDATE(),'".$categories_id."','".gioitinh."')";
		}
		if (mysql_query($sql,$con)) {
			//echo $sqlUpdate;exit(0);
		}	
		else {
			$err =  "<p align=center class='err'>Không th&#7875; c&#7853;p nh&#7853;t</p>";
		}
  	}
  	if ($err=='') echo '<script>window.location="index.php?act=faq&status='.$_REQUEST['status'].'&cat='.$_REQUEST['cat'].'&page='.$_REQUEST['page'].'&code=1"</script>';
  	else echo "<p align=center class='err'>".$err."</p>";
} 
?>

<?
	if (isset($_GET['id'])) {
		$oldid=$_GET['id'];
		$page = $_GET['page'];
		$sql = "select * from faq where faq_id='".$oldid."' limit 1";
		$result=mysql_query($sql,$con);
		if ($row=mysql_fetch_array($result)) {
			$question=$row['faq_question'];
			$answer=$row['faq_answer'];
			$name=$row['faq_name'];
			$ten=$row['faq_nameqa'];

			$phone=$row['faq_phone'];
			$email=$row['faq_email'];

			$order=(int)$row['faq_sortorder'];
			$status=$row['faq_status'];
			$categories_id=$row['faq_categoriesid'];
			$gioitinh=$row['faq_gioitinh'];

		}
	}
?>
 
<script language="Javascript1.2"><!-- // load htmlarea
_editor_url = "htmlarea/";                     // URL to htmlarea files
var win_ie_ver = parseFloat(navigator.appVersion.split("MSIE")[1]);
if (navigator.userAgent.indexOf('Mac')        >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Windows CE') >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Opera')      >= 0) { win_ie_ver = 0; }
if (win_ie_ver >= 5.5) {
  document.write('<scr' + 'ipt src="' +_editor_url+ 'editor.js"');
  document.write(' language="Javascript1.2"></scr' + 'ipt>');  
} else { document.write('<scr'+'ipt>function editor_generate() { return false; }</scr'+'ipt>'); }
// --></script>

<form method="post" action="index.php">
<input type="hidden" name="act" value="faq_m">
<input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>">
<input type="hidden" name="status" value="<? echo $_REQUEST['status']; ?>">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" class="title" align="center" height="20">S&#7917;a / C&#7853;p nh&#7853;t : T&#432; 
	v&#7845;n</td>
  </tr>
  <tr>
    <td width="45%">
    <table border="0" cellpadding="2" bordercolor="#111111" width="100%" id="AutoNumber2" cellspacing="0">
        <tr>
        <td width="17%" class="smallfont" align="right">
        Tên câu h&#7887;i</td>
        <td width="1%" class="smallfont" align="center">
        <font color="#FF0000">*</font></td>
        <td width="80%" class="smallfont">
		<INPUT value="<? echo $ten; ?>" TYPE="text" NAME="txtTen" CLASS=textbox size="98"></td>
      </tr>

      <tr>
        <td width="17%" class="smallfont">
        <p align="right">Câu h&#7887;i</td>
        <td width="1%" class="smallfont" align="center">
        <font color="#FF0000">*</font></td>
        <td width="80%" class="smallfont">
		<textarea rows="6" name="txtQuestion" cols="28" style="width: 100%"><? echo $question; ?></textarea></td>
      </tr>
      <tr>
        <td width="17%" class="smallfont" align="right">
        Tr&#7843; l&#7901;i</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="80%" class="smallfont">
		<textarea rows="6" name="txtAnswer" cols="28"><? echo $answer; ?></textarea>

<script language="javascript1.2" defer>
		var config = new Object();    // create new config object

		config.width = "100%";
		config.height = "150px";
		config.bodyStyle = 'background-color: white; font-family: "Verdana"; font-size: x-small;';
		config.debug = 0;

		// NOTE:  You can remove any of these blocks and use the default config!

		config.toolbar = [
    			['fontname'],
		     ['fontsize'],
    			['fontstyle'],
    			['linebreak'],
		     ['bold','italic','underline','separator'],
			['strikethrough','subscript','superscript','separator'],
 			['justifyleft','justifycenter','justifyright','separator'],
		     ['OrderedList','UnOrderedList','Outdent','Indent','separator'],
		     ['forecolor','backcolor','separator'],
		     ['HorizontalRule','Createlink','InsertImage','htmlmode','separator'],
		     ['popupeditor'],
		];

		config.fontnames = {
		    "Arial":           "arial, helvetica, sans-serif",
    		    "Courier New":     "courier new, courier, mono",
		    "Georgia":         "Georgia, Times New Roman, Times, Serif",
		    "Tahoma":          "Tahoma, Arial, Helvetica, sans-serif",
		    "Times New Roman": "times new roman, times, serif",
		    "Verdana":         "Verdana, Arial, Helvetica, sans-serif",
		    "impact":          "impact",
		    "WingDings":       "WingDings"
		};
		
		config.fontsizes = {
		    "1 (8 pt)":  "1",
		    "2 (10 pt)": "2",
		    "3 (12 pt)": "3",
		    "4 (14 pt)": "4",
		    "5 (18 pt)": "5",
		    "6 (24 pt)": "6",
		    "7 (36 pt)": "7"
		};

		//config.stylesheet = "http://www.domain.com/sample.css";
  
		config.fontstyles = [   // make sure classNames are defined in the page the content is being display as well in or they won't work!
		  	{ name: "headline",     className: "headline",  classStyle: "font-family: arial black, arial; font-size: 28px; letter-spacing: -2px;" },
  			{ name: "arial red",    className: "headline2", classStyle: "font-family: arial black, arial; font-size: 12px; letter-spacing: -2px; color:red" },
  			{ name: "verdana blue", className: "headline4", classStyle: "font-family: verdana; font-size: 18px; letter-spacing: -2px; color:blue" }

			// leave classStyle blank if it's defined in config.stylesheet (above), like this:
			// { name: "verdana blue", className: "headline4", classStyle: "" }  
		];
		
		editor_generate('txtAnswer', config);
     </script>
		
		</td>
      </tr>
      <tr>
        <td width="17%" class="smallfont" align="right">
        H&#7885; tên</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="80%" class="smallfont">
		<INPUT value="<? echo $name; ?>" TYPE="text" NAME="txtName" CLASS=textbox size="50"></td>
      </tr>
		<tr>
        <td width="17%" class="smallfont" align="right">
        Email</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="80%" class="smallfont">
		<INPUT value="<? echo $email; ?>" TYPE="text" NAME="txtEmail" CLASS=textbox size="34"></td>
      </tr>

      <tr>
        <td width="17%" class="smallfont" align="right">
        Th&#7913; t&#7921; s&#7855;p x&#7871;p</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="80%" class="smallfont">
		<INPUT value="<? echo $order; ?>" TYPE="text" NAME="txtSortOrder" CLASS=textbox size="20"></td>
      </tr>

      <tr>
        <td width="17%" class="smallfont" align="right">
        Không hi&#7875;n th&#7883;</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="80%" class="smallfont">
		<input type="checkbox" name="chkShow" value="ON" <? if ($status>0) echo 'checked' ?>></td>
      </tr>

      <tr>
        <td width="17%" class="smallfont" align="right">
        Thu&#7897;c ch&#432;&#417;ng trinh</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="80%" class="smallfont">
		        <select size="1" name="txtParent">
<?
		//echo "<option value='17'>[Danh m&#7909;c g&#7889;c]</option>";
		$cats=GetListFaqCategory();
		foreach ($cats as $cat)
		{
			if ($cat[0]==$categories_id)
				echo "<option value=".$cat[0]." selected>".$cat[1]."</option>";
			else
				echo "<option value=".$cat[0].">".$cat[1]."</option>";
		}
?>		
		</select>
		
</td>
      </tr>

      <tr>
        <td width="17%" class="smallfont">
		<p align="right">
		<INPUT TYPE="submit" NAME="butSaveLoai" VALUE="C&#7853;p nh&#7853;t" CLASS=button>&nbsp;</td>
        <td width="1%" class="smallfont" align="center">
		&nbsp;</td>
        <td width="80%" class="smallfont"><p align="left">&nbsp;<INPUT TYPE="reset" CLASS=button value="Nh&#7853;p l&#7841;i"></td>
      </tr>
    </table>
    </td>
  </tr>
  </table>
</form>