<?php
switch ($_REQUEST['act'])
{
	case "views" :
        $p=0;
		if ($_REQUEST['id']!='') $p=killInjection($_REQUEST['id']);
		$catinfo=GetNewsInfo($p);	
		$title_adv=$catinfo['name'];
		break;
    case "cat" :
        $p=0;
		if ($_REQUEST['cat']!='') $p=killInjection($_REQUEST['cat']);
		$catinfo=GetNewsCategoryInfo($p);	
		$title_adv=$catinfo['name'];
		break;
    default:
        $title_adv=$titles['news'];
        break;
}
echo $title_adv;
?>