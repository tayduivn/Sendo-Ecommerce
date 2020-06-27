 <?php switch($_REQUEST['home'])
{
    case "account" :
        include("class/include/member.php");
         break;
		  case "khieunai" :
        include("system/views/khieunai.php");
         break;
		  case "khieunaishop" :
        include("system/views/khieunaishop.php");
         break;
    case "adv" :
        include("system/raovat/index.php");
         break;
    case "job" :
        include("system/job/index.php");
         break;
    case "store" :
        include("class/store/index.php");
        break;
    case "company" :
        include("class/company/index.php");
        break;
    case "category" :
        include("system/views/list_cat.php");
        break;
		  case "xuhuong" :
        include("system/views/xuhuong.php");
        break;
		  case "khuyenmai" :
        include("system/views/khuyenmai.php");
        break;
		  case "banchay" :
        include("system/views/banchay.php");
        break;
		  case "spm" :
        include("system/views/spm.php");
        break;
    case "list_shop" :
        include("system/views/list_shop.php");
        break;
    case "products" :
        include("system/views/pro_views.php");
        break;	
		 case "quanlydonhang_order" :
        include("system/views/quanlydonhang_order.php");
        break;	
		 case "quanlydonhang_order_giohang" :
        include("system/views/quanlydonhang_order_giohang.php");
        break;	
		 case "quanlydonhang_order_chitiet" :
        include("system/views/quanlydonhang_order_chitiet.php");
        break;			
		case "quanlydonhang_order_chitiet_giohang" :
        include("system/views/quanlydonhang_order_chitiet_giohang.php");
        break;	
    case "products_tick" :
        include("class/views/pro_tick.php");
        break;
    case "hangsx" :
        include("system/views/hangsx.php");
        break;
	case "news" :
	    include("system/news/index.php");
		break;
    case "member" :
	    include("system/member/index.php");
		break;
	case "help" :
	    include("system/help/index.php");
		break;
    case "search" :
		include("system/views/search_code.php"); 
		break;
	case "cart" :
		include("system/views/cart_code.php"); 
		break;
	case "cart1" :
		include("system/views/cart_code1.php"); 
		break;
		case "cart2" :
		include("system/views/cart_code2.php"); 
		break;
				
	case "checkout" :
		include("system/views/checkout_code.php"); 
		break;
		case "checkout1" :
		include("system/views/checkout_code1.php"); 
		break;
    case "procat" :
		include("box/procat.php"); 
		break;
	case "regestry" :
        include("system/regestry/index.php");
         break;
		 case "dangkythanhvien" :
        include("system/dangkythanhvien/index.php");
         break;
		 		 case "dangkythanhvien_popup" :
        include("system/dangkythanhvien_popup/index.php");
         break;
	case "login" :
	    include("box/login_susscces.php");
	    break;
	case "forgotpass" :
		include("system/views/forgotpassword.php"); 
		break;	
		case "forgotpass_shop" :
		include("system/views/forgotpassword_shop.php"); 
		break;
	case "regestryweb" :
        include("box/regestry_web.php");
         break;
	case "goiweb" :
        include("system/views/goiweb.php");
         break;
		 	case "kiemtradonhang" :
        include("system/views/kiemtradonhang.php");
         break;
    case "thanhtoan" :
        include("system/views/thanhtoan.php");
         break;
    case "baogiadomain" :
        include("system/views/baogiadomain.php");
         break;
    case "baogiadichvu" :
        include("system/views/baogiadichvu.php");
         break;
	case "template" :
        include("system/views/template.php");
         break;
default :
include("box/home_code.php");
break;
}
?>
