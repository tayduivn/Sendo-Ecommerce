 <?php switch($_REQUEST['act'])
{
    case "news" :
        include("system/news/news_news.php");
         break;
    case "cat" :
        include("system/news/cat_list.php");
         break;
    case "views" :
        include("system/news/news_views.php");
         break;
	case "search" :
        include("system/news/search.php");
         break;
default :
include("system/news/index.php");
break;
}
?>
