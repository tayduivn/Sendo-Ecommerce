<?
include_once("fckeditor/fckeditor.php") ;
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<!-- phong to anh-->
<script type="text/javascript" src="web_files/tooltip.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript">
$(function() {
    $('.tonus').tooltip({
    	delay: 0,
    	showURL: false,
    	bodyHandler: function() {
    		return $("<img/>").attr("src", this.src);
    	}
    });
});
</script>
<style type="text/css">	
	div.thumb {
		float:left;
	}
	div.caption {
		padding-left:5px;
		font-size:10px;
	}
    .kich{
        border: 1px solid #cacaca;
        padding:2px;
        width:100px;
        text-align:center;
        background-color: #9C9AF9;
        color:#fff;
        cursor: pointer;
        
    }
    .rev{
        border: 1px solid #cacaca;
        padding:2px;
        width:100px;
        text-align:center;
        background-color: #FF0224;
        color:#fff;
        cursor: pointer;
        
    }
	.inner ul
	{
	margin:0px;
	padding:0px;
	}
    
	</style>
<!-- script add them hinh anh-->	

<script>
var ii=1;
$(document).ready(function(){
   $('.kich').click(function(){    
    var insert = '<ul><form id="imageform'+ii+'" method="post" enctype="multipart/form-data" action="ajaxupload.php"><span id="pimg'+ii+'"><input id="xFilePath'+ii+'" type="file" id="photoimg'+ii+'" name="photoimg'+ii+'"  /></span></form><div style="float:right" id="preview'+ii+'"></div><span class="rev">Xóa</span></ul>';
    $(insert).appendTo('.inner');
    ii++;
   })
    $('.rev').live('click', function() { 
    $(this).parents('ul').remove();
   })
})

</script>
<script type="text/javascript" >
 $(document).ready(function() { 
            $('#photoimg1').change(function(){ 
				$("#preview1").html('');
				$("#preview1").html('<img src="images/loader.gif" alt="Uploading...."/>');
			$("#imageform1").ajaxForm({
						target: '#preview1'
		}).submit();
	});
}); 
</script>
<?
$path = "../images/news";
$pathdb = "images/news";
if (isset($_POST['butSaveLoai'])) {
	$name=$_POST['name'];
	$short=$_POST['short'];
	$desc=$_POST['desc'];
	$cat=$_POST['cat'];	
	$thutu = $_POST['thutu'];
	$date=date("d-m-Y");

	$catinfo=GetCategoryInfo($categories_id);
	$err="";
	if ($name=="") $err .=  "Xin nh&#7853;p tên s&#7843;n ph&#7849;m <br>";
	$err.=CheckUpload($_FILES["txtImage"],".jpg;.gif;.png;.bmp",5000*1024,0);
	$err.=CheckUpload($_FILES["txtImageLarge"],".jpg;.gif;.png;.bmp",5000*1024,0);

	if ($err=='')
	{
	if (!empty($_POST['id'])) {
			$oldid = $_POST['id'];
			$sql = "update help set name='".$name."', short='".$short."', content='".$desc."', cat_id='".$cat."', thutu='".$thutu."' where id='".$oldid."'";
		}else {
			$sql = "insert into help (name, short, content , cat_id, thutu,date) values ('".$name."','".$short."','".$desc."','".$cat."','".$thutu."','".$date."')";
		}
		//echo $sql;
		//exit();
		if (mysql_query($sql,$con)) 
		{
			if(empty($_POST['id'])) {
				$oldid = mysql_insert_id();
				}
		
			$sqlUpdateField = "";
			
			$extsmall=GetFileExtention($_FILES['txtImage']['name']);
			if (MakeUpload($_FILES['txtImage'],"$path/help$oldid$extsmall"))
			{
				@chmod("$path/help$oldid$extsmall", 0777);
				$sqlUpdateField = " image='$pathdb/help$oldid$extsmall' ";
			}

			$extlarge=GetFileExtention($_FILES['txtImageLarge']['name']);
			if (MakeUpload($_FILES['txtImageLarge'],"$path/news_l$oldid$extlarge"))
			{
				@chmod("$path/news_l$oldid$extlarge", 0777);
				if($sqlUpdateField != "") $sqlUpdateField .= ",";
				$sqlUpdateField .= " image_large='$pathdb/news_l$oldid$extlarge' ";
			}
			if($sqlUpdateField!='')
			{
				$sqlUpdate = "update help set $sqlUpdateField where id='".$oldid."'";
				mysql_query($sqlUpdate,$con);
			}
		}	
		else {
			$err =  "Không th&#7875; c&#7853;p nh&#7853;t";
		}
  	}

  	if ($err=='') echo '<script>window.location="index.php?act=help&status='.$_REQUEST['status'].'&cat='.$_REQUEST['cat'].'&page='.$_REQUEST['page'].'&code=1"</script>';
  	else echo "<p align=center class='err'>".$err."</p>";
} else {
?>

<?
	if (isset($_GET['id'])) {
		$oldid=$_GET['id'];
		$page = $_GET['page'];
		$sql = "select * from help where id='".$oldid."'";
		if ($result = mysql_query($sql,$con)) {
			$row=mysql_fetch_array($result);
			$name=$row['name'];
			$image=$row['image'];
			$categories_id = $row['cat_id'];
			$imagelarge=$row['image_large'];
			$short=$row['short'];
			$desc=$row['content'];
			$thutu=$row['thutu'];
		}
	}
}

?>
<form method="post" name="FormLoaiSP" enctype="multipart/form-data" action="index.php">
<input type="hidden" name="act" value="help_m">
<input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>">
<input type="hidden" name="page" value="<? echo $_REQUEST['page']; ?>">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" class="title" align="center">Thêm m&#7899;i / C&#7853;p nh&#7853;t : 
	Trợ giúp</td>
  </tr>
  <tr>
    <td width="45%">
    <table border="0" cellpadding="2" bordercolor="#111111" width="100%" id="AutoNumber2" cellspacing="0">
<?    
if ($image!='')
{
	echo '<tr><td colspan="3" align="center"><img border="0" src="../'.$image.'"></td></tr>';
}
?>		
     <tr>
        <td width="15%" class="smallfont">
        <p align="right">Tên</td>
        <td width="1%" class="smallfont" align="center">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $name; ?>" TYPE="text" NAME="name" CLASS=textbox size="89">
		</td>
      </tr>

      <tr>
        <td width="15%" class="smallfont">
        <p align="right">Hình nh&#7887;</td>
        <td width="1%" class="smallfont" align="center">
        <font color="#FF0000">*</font></td>
        <td width="83%" class="smallfont">
		<INPUT TYPE="file" NAME="txtImage" CLASS=textbox size="34"></td>
      </tr>

      <tr>
        <td width="15%" class="smallfont" align="right">
        Mô tả ngắn</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
<textarea style="width:462; height:99" name="short" cols="4" cols="28"><? echo $short; ?></textarea>
		</td>
      </tr>


		<tr>
        <td width="15%" class="smallfont" align="right">
        Mô t&#7843; s&#7843;n ph&#7849;m</td>
        <td width="1%" class="smallfont" align="center">
        &nbsp;</td>
        <td width="83%" class="smallfont">
 	<?php
$oFCKeditor = new FCKeditor('desc') ;
$oFCKeditor->BasePath = 'fckeditor/' ;
$oFCKeditor->Value = $desc ;
$oFCKeditor->Create() ;
?>
	        
		</td>
      </tr>














      <tr>
        <td width="15%" class="smallfont" align="right">
        Thu&#7897;c danh m&#7909;c</td>
        <td width="1%" class="smallfont" align="center">&nbsp;
        </td>        
        <td width="83%" class="smallfont">
		<select size="1" name="cat" >
<?
		$cats=GetListCatHelp(0);
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
        <td width="15%" class="smallfont" align="right">
        Th&#7913; t&#7921; s&#7855;p x&#7871;p</td>
        <td width="1%" class="smallfont" align="right">&nbsp;
        </td>
        <td width="83%" class="smallfont">
		<INPUT value="<? echo $thutu; ?>" TYPE="text" NAME="thutu" CLASS=textbox size="20"></td>
      </tr>
      <tr>
        <td width="15%" class="smallfont">
		<p align="right">
		<INPUT TYPE="submit" NAME="butSaveLoai" VALUE="C&#7853;p nh&#7853;t" CLASS=button onclick="submitForm()">&nbsp;</td>
        <td width="1%" class="smallfont" align="center">
		&nbsp;</td>
        <td width="83%" class="smallfont"><p align="left">&nbsp;<INPUT TYPE="reset" CLASS=button value="Nh&#7853;p l&#7841;i"></td>
      </tr>
    </table>
    </td>
  </tr>
  </table>
</form>