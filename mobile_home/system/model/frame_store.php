 <?php switch($_REQUEST['act'])
{
    case "store" :
        include("class/store/store_news.php");
         break;
    case "cat" :
        include("class/store/cat_list.php");
         break;
    case "views" :
        include("class/store/store_views.php");
         break;
	case "search" :
        include("class/store/search.php");
         break;
default :
include("class/store/index.php");
break;
}
?>
