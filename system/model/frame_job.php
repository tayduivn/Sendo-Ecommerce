 <?php switch($_REQUEST['act'])
{
    case "adv" :
        include("system/job/job_news.php");
         break;
    case "cat" :
        include("system/job/job_list.php");
         break;
    case "views" :
        include("system/job/job_views.php");
         break;
	case "search" :
        include("system/job/search.php");
         break;
default :
include("system/job/index.php");
break;
}
?>
