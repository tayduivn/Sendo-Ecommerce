<?php
switch ($_REQUEST['act'])
{
	case "views" :
        $p=0;
		if ($_REQUEST['views']!='') $p=killInjection($_REQUEST['views']);
		$catinfo=GetHelpInfo($p);	
		$title_adv=$catinfo['name'];
		break;
    case "cat" :
        $p=0;
		if ($_REQUEST['cat']!='') $p=killInjection($_REQUEST['cat']);
		$catinfo=GetHelpCatInfo($p);	
		$title_adv=$catinfo['name'];
		break;
    default:
        $title_adv=$titles['help'];
        break;
}
echo $title_adv;
?>