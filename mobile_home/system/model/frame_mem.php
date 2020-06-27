 <?php switch($_REQUEST['home'])
{
    case "account" :
        include("class/include/member.php");
         break;
    case "post_ad" :
        include("mobile_home/system/views/post_ad.php");
         break;
    case "adv" :
        include("mobile_home/system/raovat/index.php");
         break;
    case "job" :
        include("mobile_home/system/job/index.php");
         break;
    case "store" :
        include("class/store/index.php");
        break;
    case "company" :
        include("class/company/index.php");
        break;
    case "category" :
        include("mobile_home/system/views/list_cat.php");
        break;  
		case "dangkym" :
        include("mobile_home/system/views/dangkym.php");
        break;
				case "dangnhap" :
        include("mobile_home/system/views/dangnhap.php");
        break;
    case "products" :
        include("mobile_home/system/views/pro_views.php");
        break;	
    case "views_img" :
        include("mobile_home/system/views/views_img.php");
		   break;	
    case "quanlydonhang_mua" :
        include("mobile_home/system/views/quanlydonhang_mua.php");
        break;
		case "quanlydonhang_muachitiet" :
        include("mobile_home/system/views/quanlydonhang_muachitiet.php");
        break;
    case "products_tick" :
        include("class/views/pro_tick.php");
        break;
	case "news" :
	    include("mobile_home/system/news/index.php");
		break;
	case "help" :
	    include("class/help/index.php");
		break;
    case "search" :
		include("mobile_home/system/views/search_code.php"); 
		break;
	case "cart" :
		include("mobile_home/system/views/cart_code.php"); 
		break;
	case "checkout" :
		include("mobile_home/system/views/checkout_code.php"); 
		break;
    case "procat" :
		include("box/procat.php"); 
		break;
	case "regestry" :
        include("mobile_home/system/views/regestry.php");
         break;
		 case "quanlydonhang" :
        include("mobile_home/system/views/quanlydonhang.php");
         break;
		 case "thongtintaikhoan" :
        include("mobile_home/system/views/thongtintaikhoan.php");
         break;
		 		 case "doimatkhau" :
        include("mobile_home/system/views/doimatkhau.php");
		         break;
		 		 case "vidiemlua" :
        include("mobile_home/system/views/vidiemlua.php");
         break;
 	case "cart" :
		include("box/cart_code.php"); 
		break;
	case "logout" :
	    include("box/shop_vip.php");
		break;
	case "login" :
	    include("box/login_susscces.php");
	    break;
	case "checkout" :
		include("box/checkout_code.php"); 
		break;
	case "forgotpass" :
		include("class/views/forgotpassword.php"); 
		break;
	case "regestryweb" :
        include("box/regestry_web.php");
         break;
	case "contact" :
        include("box/contact.php");
         break;
	case "template" :
        include("mobile_home/system/views/template.php");
         break;
default :
include("box/home_code.php");
break;
}
?>
