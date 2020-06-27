<?
function GetCatAllID($cat)
{
    global $con;
    $ret=$cat.",";
	$result = mysql_query("select * from cat where parent=$cat",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret.=GetCatAllID($row['id']);
	}
	return $ret;
}
function GetCatHang($cat)
{
    global $con;
    $ret=$cat.",";
	$result = mysql_query("select * from hangsx where cat=$cat",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret.=GetCatHang($row['id']);
	}
	return $ret;
}
function GetCategoryAllID($cat)
{
    global $con;
    $ret=$cat.",";
	$result = mysql_query("select * from cat_mem where parent=$cat order by thutu  ",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret.=GetCategoryAllID($row['id']);
	}
	return $ret;
}
function GetCatAdv($cat)
{
    global $con;
    $ret=$cat.",";
	$result = mysql_query("select * from adv_cat where parent=$cat",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret.=GetCatAdv($row['id']);
	}
	return $ret;
}
function GetCatJob($cat)
{
    global $con;
    $ret=$cat.",";
	$result = mysql_query("select * from job_cat where parent=$cat",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret.=GetCatJob($row['id']);
	}
	return $ret;
}
function GetCatCompany($cat)
{
    global $con;
    $ret=$cat.",";
	$result = mysql_query("select * from company_cat where parent=$cat",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret.=GetCatCompany($row['id']);
	}
	return $ret;
}
function GetCatUsershop($cat)
{
    global $con;
    $ret=$cat.",";
	$result = mysql_query("select * from user_shop where parent=$cat",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret.=GetCatUsershop($row['id']);
	}
	return $ret;
}
function GetCatNews($cat)
{
    global $con;
    $ret=$cat.",";
	$result = mysql_query("select * from news_cat where parent=$cat",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret.=GetCatNews($row['id']);
	}
	return $ret;
}
function GetCatHelp($cat)
{
    global $con;
    $ret=$cat.",";
	$result = mysql_query("select * from help_cat where parent=$cat",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret.=GetCatHelp($row['id']);
	}
	return $ret;
}



function GetCatService($cat)
{
    global $con;
    $ret=$cat.",";
	$result = mysql_query("select * from service_cat where parent=$cat",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret.=GetCatService($row['id']);
	}
	return $ret;
}
function GetListCatHelp($catid="",$split="=")
{
    global $con;
    //$hide="categories_status=0";
    //if (isset($_SESSION['log'])) $hide="1=1";
    $ret=array();
    if ($catid=="") $catid=0;
	$result = mysql_query("select * from help_cat where parent=$catid order by thutu",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret[]=array($row['id'],($catid==0?"":$split).$row['name']);
		$getsub=GetListCatHelp($row['id'],$split.$split);
		foreach ($getsub as $sub)
			$ret[]=array($sub[0],$sub[1]);
	}
	return $ret;
}
function ListPaging($nitem,$maxpage,$curpage,$link,$name="s&#7843;n ph&#7849;m")
{
?>
          
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0 id="table35" style="line-height: 120%; text-align: justify">
<tr>
	<td height="10"></td>
</tr>
<?
$pages=$maxpage;
echo '<tr><td class="smallfont" align="left">Trình bày '.($curpage+1).' &#273;&#7871;n '.$maxpage.' (trong <b>'.$nitem.'</b> '.$name.')</td>';
echo '<td class="smallfont" align="right">K&#7871;t qu&#7843;: ';
$param="";
if ($curpage>1) echo '<a title="&#272;&#7847;u tiên" href="'.$link.'0">[&lt;]</a> ';
if ($curpage>0) echo '<a title="V&#7873; tr&#432;&#7899;c" href="'.$link.($p-1).'">[&lt;&lt;]</a> ';
$from=($curpage-10>0?$curpage-10:0);
$to=($curpage+10<$pages?$curpage+10:$pages);
for ($i=$from;$i<$to;$i++)
{
	if ($i!=$p) echo '<a href="'.$link.$i.'">'.($i+1).' </a>';
	else echo '<b>'.($i+1).'</b> ';
}
if ($curpage<$i-1) echo '<a title="Ti&#7871;p theo" href="'.$link.($p+1).'">[&gt;&gt;]</a> ';
if ($curpage<$pages-1) echo '<a title="Cu&#7889;i cùng" href="'.$link.($pages-1).'">[&gt;]</a>'; 
?>
</td></tr></table>
<?
}
function getTableInformation($tenbang,$vungdulieu,$dieukien){
	# getTableInformation tra ve mang gia tri la thong tin bang	

	if ($dieukien==''){
		$sql = "select ".$vungdulieu." from ".$tenbang;
	}else{
		$sql = "select ".$vungdulieu." from ".$tenbang." where ".$dieukien;	
	}
	$result = mysql_query($sql);
	return $result;
}


function updateRecordInformation($tenbang,$chuoiupdate,$dieukien){
	# updateRecordInformation tra ve true hoac false ket qua sua doi noi dung 1 record trong co so du lieu
	if ($dieukien==''){
		$sql = "update ".$tenbang." set ".$chuoiupdate;
	}else{
		$sql = "update ".$tenbang." set ".$chuoiupdate." where ".$dieukien;
	}
#	echo $sql;
	$result = mysql_query($sql);
	return result;
}

function CountRecord($table,$where="")
{
	global $con;
    if ($table=="") return false;
    if ($where=="") $where="1=1";
	$result = mysql_query("select count(*) as cnt from $table where $where",$con);
	$row=@mysql_fetch_assoc($result);
	return $row['cnt'];
}
function demsql($table)
{
	global $con;
    if ($table=="") return false;
    if ($where=="") $where="1=1";
	$result = mysql_query("select count(*) as cnt from $table ",$con);
	$row=@mysql_fetch_assoc($result);
	return $row['cnt'];
}
//Count Page
function count_page($total, $n)
{
	if ($total%$n==0) return (int)($total/$n);
	return (int)($total/$n)+1;
}

//HAM NAY LOAI BO CAC LENH INJECTION
function killInjection($str){
	$bad = array("'","\\","=",":");
	$good = str_replace($bad,"", $str);
	return $good;
}
function GetCategory_homeInfo($catid)
{
    global $con;
    if ($catid=="") return false;
	$result = mysql_query("select * from cat where id=$catid limit 1",$con);
	return @mysql_fetch_assoc($result);
}
function GetCategoryInfo($catid)
{
    global $con;
    if ($catid=="") return false;
	$result = mysql_query("select * from cat_mem where id=$catid limit 1",$con);
	return @mysql_fetch_assoc($result);
}
function GetCatAdvInfo($catid)
{
    global $con;
    if ($catid=="") return false;
	$result = mysql_query("select * from adv_cat where id=$catid limit 1",$con);
	return @mysql_fetch_assoc($result);
}
function GetCatJobInfo($catid)
{
    global $con;
    if ($catid=="") return false;
	$result = mysql_query("select * from job_cat where id=$catid limit 1",$con);
	return @mysql_fetch_assoc($result);
}
function GetCatCompanyInfo($catid)
{
    global $con;
    if ($catid=="") return false;
	$result = mysql_query("select * from company_cat where id=$catid limit 1",$con);
	return @mysql_fetch_assoc($result);
}
function GetCityInfo($catid)
{
    global $con;
    if ($catid=="") return false;
	$result = mysql_query("select * from city where id=$catid limit 1",$con);
	return @mysql_fetch_assoc($result);
}
function GetCatInfo($catid)
{
    global $con;
    if ($catid=="") return false;
	$result = mysql_query("select * from cat where id=$catid limit 1",$con);
	return @mysql_fetch_assoc($result);
}
function GetDocCatInfo($catid)
{
    global $con;
    if ($catid=="") return false;
	$result = mysql_query("select * from doc_categories where doc_categories_id=$catid limit 1",$con);
	return @mysql_fetch_assoc($result);
}

function GetDonviInfo($id)
{
    global $con;
    if ($id=="") return false;
	$result = mysql_query("select * from donvi where dv_id=$id limit 1",$con);
	return @mysql_fetch_assoc($result);
}
function GetPriceInfo($id)
{
    global $con;
    if ($id=="") return false;
	$result = mysql_query("select * from price where dv_id=$id limit 1",$con);
	return @mysql_fetch_assoc($result);
}

function GetDocInfo($proid)
{
    global $con;
    if ($proid=="") return false;
	$result = mysql_query("select * from doc_files where doc_files_id=$proid limit 1",$con);
	return @mysql_fetch_assoc($result);
}
function GetTailieuInfo($proid)
{
    global $con;
    if ($proid=="") return false;
	$result = mysql_query("select * from tailieu where doc_files_id=$proid limit 1",$con);
	return @mysql_fetch_assoc($result);
}

function GetTownInfo($id)
{
    global $con;
    if ($id=="") return false;
	$result = mysql_query("select * from town where town_id=$id limit 1",$con);
	return mysql_fetch_assoc($result);
}
function GetListDonvi_id()
{
    global $con;
    $ret=array();
	$result = mysql_query("select * from donvi order by dv_name",$con);
	while (($row=mysql_fetch_assoc($result)))
		$ret[]=array($row['dv_id'],$row['dv_name']);
	return $ret;
}
function GetDonviInfo_id($id)
{
    global $con;
    if ($id=="") return false;
	$result = mysql_query("select * from donvi where dv_id=$id limit 1",$con);
	return @mysql_fetch_assoc($result);
}

function GetListTown()
{
    global $con;
    $ret=array();
	$result = mysql_query("select * from town order by town_name",$con);
	while (($row=mysql_fetch_assoc($result)))
		$ret[]=array($row['town_id'],$row['town_name']);
	return $ret;
}
function GetTownName($id)
{
    global $con;
    if ($id=='') return false;
	$result = mysql_query("select * from town where town_id='".$id."' limit 1",$con);
	$row=mysql_fetch_assoc($result);
	return $row['town_name'];
}

function GetAlbumInfo($proid)
{
    global $con;
    if ($proid=="") return false;
	$result = mysql_query("select * from album_images where album_images_id=$proid limit 1",$con);
	return @mysql_fetch_assoc($result);
}

function GetProviderInfo($id)
{
    global $con;
    if ($id=="") return false;
	$result = mysql_query("select * from providers where providers_id=$id limit 1",$con);
	return @mysql_fetch_assoc($result);
}

function GetProductInfo($proid)
{
    global $con;
    if ($proid=="") return false;
	$result = mysql_query("select * from products where id=$proid limit 1",$con);
	return @mysql_fetch_assoc($result);
}
function GetUserInfo($proid)
{
    global $con;
    if ($proid=="") return false;
	$result = mysql_query("select * from user_shop where id=$proid limit 1",$con);
	return @mysql_fetch_assoc($result);
}
function GetAdvInfo($proid)
{
    global $con;
    if ($proid=="") return false;
	$result = mysql_query("select * from avd where id=$proid limit 1",$con);
	return @mysql_fetch_assoc($result);
}
function GetJobInfo($proid)
{
    global $con;
    if ($proid=="") return false;
	$result = mysql_query("select * from job where id=$proid limit 1",$con);
	return @mysql_fetch_assoc($result);
}
function GetCompanyInfo($proid)
{
    global $con;
    if ($proid=="") return false;
	$result = mysql_query("select * from company where id=$proid limit 1",$con);
	return @mysql_fetch_assoc($result);
}
function GetNewsInfo($proid)
{
    global $con;
    if ($proid=="") return false;
	$result = mysql_query("select * from news where id=$proid limit 1",$con);
	return @mysql_fetch_assoc($result);
}
function GetHelpInfo($proid)
{
    global $con;
    if ($proid=="") return false;
	$result = mysql_query("select * from help where id=$proid limit 1",$con);
	return @mysql_fetch_assoc($result);
}
function GetServiceInfo($proid)
{
    global $con;
    if ($proid=="") return false;
	$result = mysql_query("select * from service where id=$proid limit 1",$con);
	return @mysql_fetch_assoc($result);
}
function GetCommentInfo($proid)
{
    global $con;
    if ($proid=="") return false;
	$result = mysql_query("select * from comment where id=$proid limit 1",$con);
	return @mysql_fetch_assoc($result);
}
function GetToaltCat($proid)
{
	$result = mysql_query("select * from cat_mem where parent='".$proid."' ");
	return $result;
}
function GetToaltShop($proid)
{
	$result = mysql_query("select * from template where cat_id='".$proid."' ");
	return $result;
}

function GetListCategory($catid="",$split="..")
{
    global $con;
    //$hide="categories_status=0";
    //if (isset($_SESSION['log'])) $hide="1=1";
    $ret=array();
    if ($catid=="") $catid=17;
	$result = mysql_query("select * from cat_mem where user='".$_SESSION['log']."' and parent=$catid order by thutu",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret[]=array($row['id'],($catid==17?"":$split).$row['name']);
		$getsub=GetListCategory($row['id'],$split.$split);
		foreach ($getsub as $sub)
			$ret[]=array($sub[0],$sub[1]);
	}
	return $ret;
}
function GetListCatemem($catid="",$user,$split="=")
{
    global $con;
    //$hide="categories_status=0";
    //if (isset($_SESSION['log'])) $hide="1=1";
    $ret=array();
    if ($catid=="") $catid=0;
	$result = mysql_query("select * from cat_mem where parent=$catid and user='".$user."'  order by thutu",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret[]=array($row['id'],($catid==0?"":$split).$row['name']);
		$getsub=GetListCatemem($row['id'],$user,$split.$split);
		foreach ($getsub as $sub)
			$ret[]=array($sub[0],$sub[1]);
	}
	return $ret;
}
function GetListCat($catid="",$split="..")
{
    global $con;
    //$hide="categories_status=0";
    //if (isset($_SESSION['log'])) $hide="1=1";
    $ret=array();
    if ($catid=="") $catid=17;
	$result = mysql_query("select * from cat where parent=$catid order by thutu",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret[]=array($row['id'],($catid==17?"":$split).$row['name'],$row['image'],$row['status'],$row['thutu'],$row['parent']);
		$getsub=GetListCat($row['id'],$split.$split);
		foreach ($getsub as $sub)
			$ret[]=array($sub[0],$sub[1],$sub[2],$sub[3],$sub[4],$sub[5]);
	}
	return $ret;
}
function GetListCat_admin($catid="",$split="",$tick="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;")
{
    global $con;
    //$hide="categories_status=0";
    //if (isset($_SESSION['log'])) $hide="1=1";
    $ret=array();
    if ($catid=="") $catid=0;
	$result = mysql_query("select * from cat where parent=$catid order by thutu ASC",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret[]=array($row['id'],($catid==0?"":$split).$row['name'],$row['image'],$row['status'],$row['thutu'],$row['parent']);
		$getsub=GetListCat_admin($row['id'],$split.$tick);
		foreach ($getsub as $sub)
			$ret[]=array($sub[0],$sub[1],$sub[2],$sub[3],$sub[4],$sub[5]);
	}
	return $ret;
}
function GetListCatshow($catid="")
{
    global $con;
    $ret=array();
    if ($catid=="") $catid=0;
	$result = mysql_query("select * from cat where parent=$catid  order by thutu",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret[]=array($row['id'],$row['name']);
		$getsub=GetListCatshow($row['id']);
		foreach ($getsub as $sub)
			$ret[]=array($sub[0],$sub[1]);
	}
	return $ret;
}
function GetListCity($catid="",$split="=")
{
    global $con;
    //$hide="categories_status=0";
    //if (isset($_SESSION['log'])) $hide="1=1";
    $ret=array();
    if ($catid=="") $catid=0;
	$result = mysql_query("select * from city where parent=$catid order by thutu",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret[]=array($row['id'],($catid==0?"":$split).$row['name']);
		$getsub=GetListCity($row['id'],$split.$split);
		foreach ($getsub as $sub)
			$ret[]=array($sub[0],$sub[1]);
	}
	return $ret;
}
function GetListAdv($catid="",$split="=")
{
    global $con;
    //$hide="categories_status=0";
    //if (isset($_SESSION['log'])) $hide="1=1";
    $ret=array();
    if ($catid=="") $catid=0;
	$result = mysql_query("select * from adv_cat where parent=$catid  order by thutu",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret[]=array($row['id'],($catid==0?"":$split).$row['name']);
		$getsub=GetListAdv($row['id'],$split.$split);
		foreach ($getsub as $sub)
			$ret[]=array($sub[0],$sub[1]);
	}
	return $ret;
}
function GetListJob($catid="",$split="=")
{
    global $con;
    //$hide="categories_status=0";
    //if (isset($_SESSION['log'])) $hide="1=1";
    $ret=array();
    if ($catid=="") $catid=0;
	$result = mysql_query("select * from job_cat where parent=$catid  order by thutu",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret[]=array($row['id'],($catid==0?"":$split).$row['name']);
		$getsub=GetListJob($row['id'],$split.$split);
		foreach ($getsub as $sub)
			$ret[]=array($sub[0],$sub[1]);
	}
	return $ret;
}
function GetListCompany($catid="",$split="=")
{
    global $con;
    //$hide="categories_status=0";
    //if (isset($_SESSION['log'])) $hide="1=1";
    $ret=array();
    if ($catid=="") $catid=0;
	$result = mysql_query("select * from company_cat where parent=$catid  order by thutu",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret[]=array($row['id'],($catid==0?"":$split).$row['name']);
		$getsub=GetListCompany($row['id'],$split.$split);
		foreach ($getsub as $sub)
			$ret[]=array($sub[0],$sub[1]);
	}
	return $ret;
}
function GetListCatNews_admin($catid="",$split="=")
{
    global $con;
    //$hide="categories_status=0";
    //if (isset($_SESSION['log'])) $hide="1=1";
    $ret=array();
    if ($catid=="") $catid=0;
	$result = mysql_query("select * from news_cat where user='' and parent=$catid  order by thutu",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret[]=array($row['id'],($catid==0?"":$split).$row['name']);
		$getsub=GetListCatNews_admin($row['id'],$split.$split);
		foreach ($getsub as $sub)
			$ret[]=array($sub[0],$sub[1]);
	}
	return $ret;
}
function GetListCatNews($catid="",$split="=")
{
    global $con;
    //$hide="categories_status=0";
    //if (isset($_SESSION['log'])) $hide="1=1";
    $ret=array();
    if ($catid=="") $catid=0;
	$result = mysql_query("select * from news_cat where user='".$_SESSION['log']."' and parent=$catid  order by thutu",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret[]=array($row['id'],($catid==0?"":$split).$row['name']);
		$getsub=GetListCatNews($row['id'],$split.$split);
		foreach ($getsub as $sub)
			$ret[]=array($sub[0],$sub[1]);
	}
	return $ret;
}
function GetListCatService($catid="",$split="=")
{
    global $con;
    //$hide="categories_status=0";
    //if (isset($_SESSION['log'])) $hide="1=1";
    $ret=array();
    if ($catid=="") $catid=0;
	$result = mysql_query("select * from service_cat where user='".$_SESSION['log']."' and parent=$catid  order by thutu",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret[]=array($row['id'],($catid==0?"":$split).$row['name']);
		$getsub=GetListCatService($row['id'],$split.$split);
		foreach ($getsub as $sub)
			$ret[]=array($sub[0],$sub[1]);
	}
	return $ret;
}
function GetListWebCategory($catid="",$split="==")
{
    global $con;
    $hide="link_websites_categories_status=0";
    if (isset($_SESSION['log'])) $hide="1=1";
    $ret=array();
    if ($catid=="") $catid=0;
	$result = mysql_query("select * from link_websites_categories where $hide and link_websites_categories_parentid=$catid",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret[]=array($row['link_websites_categories_id'],($catid==0?"":$split).$row['link_websites_categories_name']);
		$getsub=GetListWebCategory($row['link_websites_categories_id'],$split.$split);
		foreach ($getsub as $sub)
			$ret[]=array($sub[0],$sub[1]);
	}
	return $ret;
}
function GetListFaqCategory($catid="",$split="==")
{
    global $con;
    $hide="categories_status=0";
    if (isset($_SESSION['log'])) $hide="1=1";
    $ret=array();
    if ($catid=="") $catid=0;
	$result = mysql_query("select * from faq_categories where $hide and parent_id=$catid",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret[]=array($row['categories_id'],($catid==0?"":$split).$row['categories_name']);
		$getsub=GetListFaqCategory($row['categories_id'],$split.$split);
		foreach ($getsub as $sub)
			$ret[]=array($sub[0],$sub[1]);
	}
	return $ret;
}
function GetListDoc($catid="",$split="==")
{
    global $con;
    $hide="doc_categories_status=0";
    if (isset($_SESSION['log'])) $hide="1=1";
    $ret=array();
    if ($catid=="") $catid=0;
	$result = mysql_query("select * from doc_categories where $hide and doc_categories_parentid=$catid",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret[]=array($row['doc_categories_id'],($catid==0?"":$split).$row['doc_categories_name']);
		$getsub=GetListDoc($row['doc_categories_id'],$split.$split);
		foreach ($getsub as $sub)
			$ret[]=array($sub[0],$sub[1]);
	}
	return $ret;
}

function GetListProduct()
{
    global $con;
    $ret=array();
	$result = mysql_query("select * from products",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret[]=array($row['id'],$row['name']);
	}
	return $ret;
}

function GetListProvider()
{
    global $con;
    $hide="providers_status=0";
    if (isset($_SESSION['log'])) $hide="1=1";
    $ret=array();
	$result = mysql_query("select * from providers where $hide order by providers_name",$con);
	while (($row=mysql_fetch_assoc($result)))
		$ret[]=array($row['providers_id'],$row['providers_name']);
	return $ret;
}
function GetListlinkweb($catid="",$split="=")
{
    global $con;
    $hide="link_websites_categories_status=0";
    if (isset($_SESSION['log'])) $hide="1=1";
    $ret=array();
    if ($catid=="") $catid=0;
	$result = mysql_query("select * from link_websites_categories where $hide and link_websites_categories_parentid=$catid",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret[]=array($row['link_websites_categories_id'],($catid==0?"":$split).$row['link_websites_categories_name']);
		$getsub=GetListlinkweb($row['link_websites_categories_id'],$split.$split);
		foreach ($getsub as $sub)
			$ret[]=array($sub[0],$sub[1]);
	}
	return $ret;
}
function GetListDonvi($catid="",$split="&nbsp;")
{
    global $con;
    $ret=array();
    if ($catid=="") $catid=0;
	$result = mysql_query("select * from donvi where parent_id=$catid",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret[]=array($row['dv_id'],($catid==0?"":$split).$row['dv_name']);
		$getsub=GetListDonvi($row['dv_id'],$split.$split);
		foreach ($getsub as $sub)
			$ret[]=array($sub[0],$sub[1]);
	}
	return $ret;
}

function GetlinkInfo($catid)
{
    global $con;
    if ($catid=="") return false;
	$result = mysql_query("select * from link_websites_categories where link_websites_categories_id=$catid limit 1",$con);
	return @mysql_fetch_assoc($result);
}

function GetConfig($name)
{
    global $con;
	$result = mysql_query("select * from config where config_name='$name'",$con);
	$row=mysql_fetch_assoc($result);
	return $row['config_value'];
}

function SetConfig($name,$value)
{
    global $con;
    $result = mysql_query("update config set config_value='".$value."' where config_name='$name'",$con);
    return $value;
}

function islogin()
{
if (isset($_SESSION['user']) && $_SESSION['user']!='') return $_SESSION['user'];
return false;
}

function price_in_cart()
{
if (!isset($_SESSION['cart'])) return 0;
global $con;
$cart=$_SESSION['cart'];
$_SESSION['tongcong']=$tongcong;
$tongcong=0;
foreach ($cart as $product){
	$sql = "select * from products where id='".$product[0]."'";
	$result = mysql_query($sql,$con);
	if (mysql_num_rows($result)>0)
	{
	$pro=mysql_fetch_assoc($result);
	$tongcong=$tongcong+$pro['price']*$product[1];
	$cnt=$cnt+1;
	} 
}
return $tongcong;
}

function GetContent($id)
{
    global $con;
    if ($id=='') return false;
	$result = mysql_query("select * from contents where contents_id=$id limit 1",$con);
	$row=mysql_fetch_assoc($result);
	return $row['contents_content'];
}

function GetContentInfo($id)
{
    global $con;
    if ($id=='') return false;
	$result = mysql_query("select * from contents where contents_id=$id limit 1",$con);
	$row=mysql_fetch_assoc($result);
	return $row;
}

function GetContentName($name)
{
    global $con;
    if ($name=='') return false;
	$result = mysql_query("select * from contents where contents_name='".$name."' limit 1",$con);
	$row=mysql_fetch_assoc($result);
	return $row['contents_content'];
}

function GetContentNameInfo($name)
{
    global $con;
    if ($name=='') return false;
	$result = mysql_query("select * from contents where contents_name='".$name."' limit 1",$con);
	$row=mysql_fetch_assoc($result);
	return $row;
}

function GetListContent()
{
    global $con;
    $ret=array();
	$result = mysql_query("select * from contents order by contents_note",$con);
	while (($row=mysql_fetch_assoc($result)))
	{
		$ret[]=array($row['contents_id'],$row['contents_note']);
	}
	return $ret;
}
function GetListFaq($where="1=1",$limit="1000",$status="0")
{
    global $con;
    $ret=array();
	$result = mysql_query("select * from faq where faq_status=$status and $where order by faq_dateadded desc limit $limit",$con);
	while (($row=mysql_fetch_assoc($result)))
		$ret[]=$row;
	return $ret;
}
function GetFaqInfo($id,$status=0)
{
    global $con;
    $id=killInjection($id);
    if ($id=="") return false;
	$result = mysql_query("select * from faq where faq_status=$status and faq_id=$id limit 1",$con);
	return mysql_fetch_assoc($result);
}
function GetNewsCategoryInfo($id)
{
    global $con;
    $id=killInjection($id);
    if ($id=="") return false;
	$result = mysql_query("select * from news_cat where id=$id limit 1",$con);
	return mysql_fetch_assoc($result);
}
function GetHelpCatInfo($id)
{
    global $con;
    $id=killInjection($id);
    if ($id=="") return false;
	$result = mysql_query("select * from help_cat where id=$id limit 1",$con);
	return mysql_fetch_assoc($result);
}
function GetServiceCategoryInfo($id)
{
    global $con;
    $id=killInjection($id);
    if ($id=="") return false;
	$result = mysql_query("select * from service_cat where id=$id limit 1",$con);
	return mysql_fetch_assoc($result);
}

?>