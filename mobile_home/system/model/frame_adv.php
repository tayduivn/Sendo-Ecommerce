 <?php switch($_REQUEST['act'])
{
    case "adv" :
        include("mobile_home/system/raovat/adv_news.php");
         break;
    case "cat" :
        include("mobile_home/system/raovat/adv_news.php");
         break;
    case "views" :
        include("mobile_home/system/raovat/adv_views.php");
         break;
    case "search" :
        include("mobile_home/system/raovat/search.php");
         break;
default :
include("mobile_home/system/raovat/index.php");
break;
}
?>
