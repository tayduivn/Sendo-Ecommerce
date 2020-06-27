 <?php switch($_REQUEST['act'])
{
    case "help" :
        include("system/help/help_news.php");
         break;
    case "cat" :
        include("system/help/news_news.php");
         break;
    case "views" :
        include("system/help/news_views.php");
         break;
default :
include("system/help/index.php");
break;
}
?>
