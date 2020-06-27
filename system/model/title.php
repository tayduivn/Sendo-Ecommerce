<? 
switch ($_REQUEST['home'])
{
	case "content":
		switch ($_REQUEST['name'])		
		{
			case "muahang":
				$title="H&#432;&#7899;ng d&#7851;n mua hàng";
				break;
			case "dichvu":
				$title="D&#7883;ch v&#7909;";
				break;
			case "banhang":
				$title="Ph&#432;&#417;ng th&#7913;c bán hàng";
				break;
			case "thanhtoan":
				$title="Ph&#432;&#417;ng th&#7913;c thanh toán";
				break;
			case "giaohang":
				$title="Ph&#432;&#417;ng th&#7913;c giao hàng";
				break;
			case "tuyendung":
				$title="Thông tin tuy&#7875;n d&#7909;ng";
				break;
			default :
				$cont=GetContentNameInfo($_REQUEST['name']);
				$title=$cont['contents_note'];
				break;					
		}
		break;
	case "thanhtoan" :
		$title="Hình thức thanh toán";
		break;
    case "baogiadomain" :
		$title="Báo giá tên miền";
		break;
    case "baogiadichvu" :
		$title="Báo giá dịch vụ";
		break;
    case "goiweb" :
		$title="Các gói gian hàng";
		break;
    case "adv" :
		include("system/model/title_adv.php");
		break;
	case "store" :
		$title=$titles['website'];
		break;
	case "job" :
		include("system/model/title_job.php");
		break;
	case "company" :
		include("class/include/title_company.php");
		break;
	case "news" :
		include("system/model/title_new.php");
		break;
	case "help" :
		include("system/model/title_help.php");
		break;
	case "edoc" :
		$cat=0;
		if ($_REQUEST['id']!='') $cat=killInjection($_REQUEST['id']);
		$catinfo=GetDocCatInfo($cat);	
		$title=$catinfo['doc_categories_name'];
		break;
	case "newscat" :
		$cat=0;
		if ($_REQUEST['id']!='') $cat=killInjection($_REQUEST['id']);
		$catinfo=GetNewsCategoryInfo($cat);	
		$title=$catinfo['categories_name'];
		break;
	case "newsview" :
		$id=0;
		if ($_REQUEST['id']!='') $id=killInjection($_REQUEST['id']);
		$catinfo=GetNewsInfo($id);	
		$title=$catinfo['news_subject'];
		break;
	case "news_view" :
		$id=0;
		if ($_REQUEST['id']!='') $id=killInjection($_REQUEST['id']);
		$catinfo=GetNewsInfo($id);	
		$title=$catinfo['news_subject'];
		break;

	case "faq" :
		$title="Câu h&#7887;i th&#432;&#7901;ng g&#7863;p";
		break;
	case "faq_post" :
		$title="&#272;&#7863;t câu h&#7887;i";
		break;
	case "faq_detail" :
		$title="Chi ti&#7871;t câu h&#7887;i th&#432;&#7901;ng g&#7863;p";
		break;
	case "intro" :
		$title="Gi&#7899;i thi&#7879;u";
		break;
	case "thongbao" :
		$title="Th&ocirc;ng b&aacute;o";
		break;
	case "pro_good" :
		$title="Tin rao bán";
		break;
	case "pro_new" :
		$title="S&#7843;n ph&#7849;m m&#7899;i <img border=0 src=../images/new.gif width=28 height=11>";
		break;
	case "pro_saleoff" :
		$title="Tin c&#7847;n mua - thuê";
		break;
	case "category" :
		$cat=0;
		if ($_REQUEST['cat']!='') $cat=killInjection($_REQUEST['cat']);
		$catinfo=GetCategory_homeInfo($cat);
		$title=$catinfo['name'];
		break;
	case "adv" :
		$cat=0;
		if ($_REQUEST['cat']!='') $cat=killInjection($_REQUEST['cat']);
		$catinfo=GetCatAdvInfo($cat);	
		$title=$catinfo['name'];
		break;

	case "provider":
		$manufacturers_id=0;
		if ($_REQUEST['manufacturers_id']!='') $manufacturers_id=$_REQUEST['manufacturers_id'];
		$provider=GetpProviderInfo($manufacturers_id);	
		$title="S&#7842;N PH&#7848;M C&#7910;A : ".$provider['providers_name'];
		break;
	case "products" :
        $p=0;
		if ($_REQUEST['views']!='') $p=killInjection($_REQUEST['views']);
		$catinfo=GetProductInfo($p);	
		$title=$catinfo['name'];
		$tukhoaseo=$catinfo['tukhoaseo'];
		$tieudeseo=$catinfo['tieudeseo'];
		$motaseo=$catinfo['motaseo'];
		break;
	case "login" :
		$title="Thành viên"; 
		break;
	case "cart" :
		$title="Gi&#7887; hàng";
		break;
	case "checkout" :
		$title="Thanh toán"; 
		break;
	case "search" :
		$title="Tìm ki&#7871;m"; 
		break;
	case "search_dc" :
		$title="Tìm ki&#7871;m"; 
		break;		
	case "contact" :
		$title="Liên h&#7879;";
		break;
	case "send" :
		$title="Liên h&#7879; nhanh";
		break;

	case "template" :
		$title="Mẫu giao diện";
		break;

	case "regestry" :
		$title="&#272;&#259;ng ký thành viên";
		break;
	case "forgotpassword" :
		$title="Quên m&#7853;t kh&#7849;u";
		break;
	case "changepass" :
		$title="Thay &#273;&#7893;i m&#7853;t kh&#7849;u";
		break;
}
echo $title;
?>