<?php
switch ($_REQUEST['act'])
{
	case "views" :
        $p=0;
		if ($_REQUEST['id']!='') $p=killInjection($_REQUEST['id']);
		$catinfo=GetJobInfo($p);	
		$title_adv=$catinfo['name'];
		break;
    case "cat" :
        $p=0;
		if ($_REQUEST['cat']!='') $p=killInjection($_REQUEST['cat']);
		$catinfo=GetCatJobInfo($p);	
		$title_adv=$catinfo['name'];
		break;
    default:
        $title_adv=$titles['job'];
        break;
}
echo $title_adv;
?>