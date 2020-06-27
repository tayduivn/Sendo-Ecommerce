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