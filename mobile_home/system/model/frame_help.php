 <?php switch($_REQUEST['act'])
{
    case "help" :
        include("class/help/help_news.php");
         break;
    case "cat" :
        include("class/help/news_news.php");
         break;
    case "views" :
        include("class/help/news_views.php");
         break;
default :
include("class/help/index.php");
break;
}
?>
