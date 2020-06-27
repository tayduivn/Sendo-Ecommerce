<?
if (isset($_POST['butSaveLoai'])) {
	$name=$_POST['txtName'];
	$status=($_POST['chkShow']!=''?1:0);
	$parent=$_POST['txtParent'];
	$content=$_POST['txtContent'];
			
	$name = trim($_POST['txtName']);
	if ($name=="")
	{
		echo "<p align=center class='err'>B&#7841;n ch&#432;a nh&#7853;p tên danh m&#7909;c</p>";
	}
	else
	{
		if (!empty($_POST['oldid'])) {
			$oldid = $_POST['oldid'];
			$sql = "update album_categories set album_categories_name='".$name."', album_categories_status='".$status."', album_categories_parentid='".$parent."', album_categories_desc='".$content."' where album_categories_id='".$oldid."'";
		}
		else 
			$sql = "insert into album_categories (album_categories_name,album_categories_parentid,album_categories_status,album_categories_desc,date_added) values ('".$name."',".$parent.",".$status.",'".$content."',SYSDATE())";
		if (mysql_query($sql,$con)) {
			echo "<p align=center class='err'>&#272;ã c&#7853;p nh&#7853;t thành công</p><br>";
			echo "<script>window.location='index.php?act=album_category&page=".$_REQUEST['page']."&code=1'</script>";
		}
		else echo "<p align=center class='err'>Không th&#7875; c&#7853;p nh&#7853;t</p>";
		
	}
} 
?>

<?
	if (isset($_GET['id'])) {
		$oldid=$_GET['id'];
		$sql = "select * from album_categories where album_categories_id='".$oldid."'";
		if ($result = mysql_query($sql,$con)) {
			$row=mysql_fetch_array($result);
			$name=$row['album_categories_name'];
			$status=$row['album_categories_status'];
			$parent=$row['album_categories_parentid'];
			$content=$row['album_categories_desc'];
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

<form method="POST" action="index.php?">
<input type=hidden name="act" value="album_category_m">
<input type=hidden name="oldid" value="<? echo $oldid; ?>">
<input type=hidden name="page" value="<? echo $_REQUEST['page']; ?>">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" height="20" class="title" align="center">Thêm m&#7899;i / C&#7853;p nh&#7853;t : Danh m&#7909;c hình &#7843;nh</td>
  </tr>
  <tr>
    <td width="45%">
    <table border="0" cellpadding="4" bordercolor="#111111" width="124%" id="AutoNumber2" cellspacing="0">
      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Tên danh m&#7909;c</td>
        <td width="1%" class="smallfont">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $name; ?>" TYPE="text" NAME="txtName" CLASS=textbox size="34"></td>
      </tr>
     <tr>
        <td width="15%" class="smallfont" align="right">
		Không cho hi&#7875;n th&#7883;</td>
        <td width="1%" class="smallfont">
		&nbsp;</td>
        <td width="83%" class="smallfont">
		<input type="checkbox" name="chkShow" value="ON" <? if ($status>0) echo 'checked' ?>></td>
      </tr>
	 <tr>
        <td width="15%" class="smallfont">
        <p align="right">Thu&#7897;c danh m&#7909;c</td>
        <td width="1%" class="smallfont">
        &nbsp;</td>
        <td width="83%" class="smallfont">
        <select size="1" name="txtParent">
<?
		echo "<option value='0'>[Danh m&#7909;c g&#7889;c]</option>";
		$cats=GetListAlbumCategory("","&nbsp;&nbsp;");
		foreach ($cats as $cat)
		{
			if ($cat[0]==$parent)
				echo "<option value=".$cat[0]." selected>".$cat[1]."</option>";
			else
				echo "<option value=".$cat[0].">".$cat[1]."</option>";
		}
?>		
		</select>
		
</td>
      </tr>
	 <tr>
        <td width="15%" class="smallfont" align="right" valign="top">
        N&#7897;i dung</td>
        <td width="1%" class="smallfont">
        &nbsp;</td>
        <td width="83%" class="smallfont">
<textarea rows="6" name="txtContent" cols="28"><? echo $content; ?></textarea>
<script language="javascript1.2" defer>
		var config = new Object();    // create new config object

		config.width = "640";
		config.height = "350px";
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
		
		editor_generate('txtContent', config);
     </script>

</td>
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
