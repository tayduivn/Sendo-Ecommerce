<?
 switch($_REQUEST['home'])
 {
    case "about" :
        include("template/mobile/module/infomation.php");
        break;
	case "thongtinshop" :
        include("template/mobile/module/thongtinshop.php");
        break;
    case "map" :
        include("template/mobile/module/infomation.php");
        break;
    case "request" :
        include("template/mobile/module/infomation.php");
        break;
    case "contact" :
        include("template/mobile/module/infomation.php");
        break;
	case "category" :
	    include("template/mobile/module/category.php");
		break;
	case "catnews" :
	    include("template/mobile/module/tintuc.php");
	    break;
	case "product_view" :
		include("template/mobile/module/products_view.php");
	    break;
	case "news_view" :
		include("template/mobile/module/news_view.php");
	    break;
	case "cart" :
		include("template/mobile/module/cart_code.php"); 
		break;
	case "checkout" :
		include("template/mobile/module/checkout_code.php"); 
		break;
	case "search" :
		include("template/mobile/module/search_code.php"); 
		break;
	case "module_menu" :
		include("template/mobile/module/module_menu.php"); 
		break;
 }
 ?>