 <?php switch($_REQUEST['act'])
{
    case "pro_tick" :
        include("system/pro_tick/index.php");
         break;
    case "infomation" :
        include("system/member/infomation.php");
         break;
    case "change_pass" :
        include("system/member/change_pass.php");
         break;
    case "change_account" :
        include("system/member/change_account.php");
         break;
		  case "quanlydonhang" :
        include("system/member/quanlydonhang.php");
         break;
		  
		  case "thongbao" :
        include("system/member/thongbao.php");
         break;	 
		 case "shopyeuthich" :
        include("system/member/shopyeuthich.php");
         break;		
		 case "hoidap" :
        include("system/member/hoidap.php");
         break;
		   case "quanlydonhang_chitiet" :
        include("system/member/quanlydonhang_chitiet.php");
         break;
    case "dkshop" :
        include("system/member/dkshop.php");
         break;
		     case "vidiemlua" :
        include("system/member/vidiemlua.php");
         break;
default :
include("system/member/index.php");
break;
}
?>
