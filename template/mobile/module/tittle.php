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
	case "viewdoc" :
		$title="Nghe th&#7917;";
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
		if ($_REQUEST['p']!='') $id=killInjection($_REQUEST['p']);
		$catinfo=GetNewsInfo($id);	
		$title=$catinfo['name'];
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
	case "adv" :
		$title="QU&#7842;NG CÁO";
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
	case "category_dc" :
		$cat_xd=0;
		if ($_REQUEST['cat_xd']!='') $cat_xd=killInjection($_REQUEST['cat_xd']);
		$catinfo=GetCategoryInfo_dc($cat_xd);	
		$title=$catinfo['categories_name'];
		break;
	case "category" :
		$cat=0;
		if ($_REQUEST['cat']!='') $cat=killInjection($_REQUEST['cat']);
		$catinfo=GetCategoryInfo($cat);	
		$title=$catinfo['name'];
		break;

	case "provider":
		$manufacturers_id=0;
		if ($_REQUEST['manufacturers_id']!='') $manufacturers_id=$_REQUEST['manufacturers_id'];
		$provider=GetpProviderInfo($manufacturers_id);	
		$title="S&#7842;N PH&#7848;M C&#7910;A : ".$provider['providers_name'];
		break;
	case "product_view" :
                $p=0;
		if ($_REQUEST['p']!='') $p=killInjection($_REQUEST['p']);
		$catinfo=GetProductInfo($p);	
		$title=$catinfo['name'].("-").str_replace($marTViet,$marKoDau,$catinfo['name']);
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

	case "dangky" :
		$title="&#272;&#259;ng tin";
		break;

	case "register" :
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

 