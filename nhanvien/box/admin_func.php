<?
$MAXPAGE=GetConfig('maxpage');

function GetListLanguage()
{
    global $con;
    $ret=array();
	$result = mysql_query("select * from languages order by languages_order",$con);
	while (($row=mysql_fetch_assoc($result)))
		$ret[]=array($row['languages_id'],$row['languages_name']);
	return $ret;
}

function GetCustomerInfo($id)
{
	global $con;
    if ($id=="") return false;
	$result = mysql_query("select * from customers where customers_id=$id limit 1",$con);
	return mysql_fetch_assoc($result);
}

function GetOrderInfo($id)
{
	global $con;
    if ($id=="") return false;
	$result = mysql_query("select * from orders where orders_id=$id limit 1",$con);
	return mysql_fetch_assoc($result);
}

function GetListAlbumCategory($catid="",$split="==")
{
    global $con;
    $ret=array();
    if ($catid=="") $catid=0;
	$result = mysql_query("select * from album_categories where album_categories_parentid=$catid",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret[]=array($row['album_categories_id'],($catid==0?"":$split).$row['album_categories_name']);
		$getsub=GetListAlbumCategory($row['album_categories_id'],$split.$split);
		foreach ($getsub as $sub)
			$ret[]=array($sub[0],$sub[1]);
	}
	return $ret;
}
?>

<?
$marTViet=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
"ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề"
,"ế","ệ","ể","ễ",
"ì","í","ị","ỉ","ĩ",
"ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ"
,"ờ","ớ","ợ","ở","ỡ",
"ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
"ỳ","ý","ỵ","ỷ","ỹ",
"đ",
"À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă"
,"Ằ","Ắ","Ặ","Ẳ","Ẵ",
"È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
"Ì","Í","Ị","Ỉ","Ĩ",
"Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ"
,"Ờ","Ớ","Ợ","Ở","Ỡ",
"Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
"Ỳ","Ý","Ỵ","Ỷ","Ỹ",
"Đ"," ","&","$","%","́","̣","̀",".","#","+","/","^","(",")",";",">",",","?");
$marKoDau=array("a","a","a","a","a","a","a","a","a","a","a"
,"a","a","a","a","a","a",
"e","e","e","e","e","e","e","e","e","e","e",
"i","i","i","i","i",
"o","o","o","o","o","o","o","o","o","o","o","o"
,"o","o","o","o","o",
"u","u","u","u","u","u","u","u","u","u","u",
"y","y","y","y","y",
"d",
"A","A","A","A","A","A","A","A","A","A","A","A"
,"A","A","A","A","A",
"E","E","E","E","E","E","E","E","E","E","E",
"I","I","I","I","I",
"O","O","O","O","O","O","O","O","O","O","O","O"
,"O","O","O","O","O",
"U","U","U","U","U","U","U","U","U","U","U",
"Y","Y","Y","Y","Y",
"D","-","-","-","-","","","","","","","","","","","","","","");
?>
<?
function doidau($str)
{
$codau=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
"ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề"
,"ế","ệ","ể","ễ",
"ì","í","ị","ỉ","ĩ",
"ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ"
,"ờ","ớ","ợ","ở","ỡ",
"ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
"ỳ","ý","ỵ","ỷ","ỹ",
"đ",
"À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă"
,"Ằ","Ắ","Ặ","Ẳ","Ẵ",
"È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
"Ì","Í","Ị","Ỉ","Ĩ",
"Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ"
,"Ờ","Ớ","Ợ","Ở","Ỡ",
"Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
"Ỳ","Ý","Ỵ","Ỷ","Ỹ",
"Đ"," ","&","$","%","'",",",".","<div","</div>","/",")","(","́","̣","̀","̃","!","–","+",'"',":","#",";","?");
$khongdau=array("a","a","a","a","a","a","a","a","a","a","a"
,"a","a","a","a","a","a",
"e","e","e","e","e","e","e","e","e","e","e",
"i","i","i","i","i",
"o","o","o","o","o","o","o","o","o","o","o","o"
,"o","o","o","o","o",
"u","u","u","u","u","u","u","u","u","u","u",
"y","y","y","y","y",
"d",
"A","A","A","A","A","A","A","A","A","A","A","A"
,"A","A","A","A","A",
"E","E","E","E","E","E","E","E","E","E","E",
"I","I","I","I","I",
"O","O","O","O","O","O","O","O","O","O","O","O"
,"O","O","O","O","O",
"U","U","U","U","U","U","U","U","U","U","U",
"Y","Y","Y","Y","Y",
"D","-","-","-","-","-","-","","<span","</span>","","","","","","","","","","",'',"","","","");
return str_replace($codau,$khongdau,$str);
}
?>
<?
function dwebvn($noidung,$num){
$limit = $num - 1 ;
$str_tmp = '';
$arrstr = explode(" ", $noidung);
if ( count($arrstr) <= $num ) { return $noidung; }
if (!empty($arrstr)) {
for ( $j=0; $j< count($arrstr) ; $j++) {
$str_tmp .= " " . $arrstr[$j];
if ($j == $limit)
{ break; }
}
}
return $str_tmp.'...';
} 
?>
<?
function ham_loc_dau($st){ $codau=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă", "ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề" ,"ế","ệ","ể","ễ", "ì","í","ị","ỉ","ĩ", "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ" ,"ờ","ớ","ợ","ở","ỡ", "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ", "ỳ","ý","ỵ","ỷ","ỹ", "đ", "À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă" ,"Ằ","Ắ","Ặ","Ẳ","Ẵ", "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ", "Ì","Í","Ị","Ỉ","Ĩ", "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ" ,"Ờ","Ớ","Ợ","Ở","Ỡ", "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ", "Ỳ","Ý","Ỵ","Ỷ","Ỹ", "Đ"," "); $khongdau=array("a","a","a","a","a","a","a","a","a","a","a" ,"a","a","a","a","a","a", "e","e","e","e","e","e","e","e","e","e","e", "i","i","i","i","i", "o","o","o","o","o","o","o","o","o","o","o","o" ,"o","o","o","o","o", "u","u","u","u","u","u","u","u","u","u","u", "y","y","y","y","y", "d", "A","A","A","A","A","A","A","A","A","A","A","A" ,"A","A","A","A","A", "E","E","E","E","E","E","E","E","E","E","E", "I","I","I","I","I", "O","O","O","O","O","O","O","O","O","O","O","O" ,"O","O","O","O","O", "U","U","U","U","U","U","U","U","U","U","U", "Y","Y","Y","Y","Y", "D","+"); return str_replace($khongdau,$codau,$st); }
?>