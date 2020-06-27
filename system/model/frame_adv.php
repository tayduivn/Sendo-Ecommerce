 <?php switch($_REQUEST['act'])
{
    case "adv" :
        include("system/raovat/adv_news.php");
         break;
    case "cat" :
        include("system/raovat/cat_list.php");
         break;
    case "views" :
        include("system/raovat/adv_views.php");
         break;
	case "search" :
        include("system/raovat/search.php");
         break;
default :
include("system/raovat/index.php");
break;
}
?>
