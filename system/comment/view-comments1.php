<?php

include("settings.php"); //FILE WITH IMPORTANT SETTINGS

$id1 = $_GET["views"]; //ID OF THE CONTENT

//PAGINATION PROPERTIES
$page1 = 1;
if($_GET["page"]){
    $page1 = $_GET["page"];
}

$rrp1 = 200; //NUMBER OF COMMENTS PER PAGE
$o1 = ($page1-1)*$rrp1; //FIRST COMMENT TO BE SHOWN

//QUERY FOR THE PAGE OF COMMENTS
$q1 = mysql_query("SELECT * FROM comment_hoidap WHERE id='$id1' ORDER BY comment_id DESC LIMIT $o1, $rrp1");

//THE PAGE OF COMMENTS
while($r1=mysql_fetch_array($q1)){
    $c1 = eregi_replace('\r1\n1', '<br>', $r1["comment"]);
	$n1 = substr($r1["name"],-1);
	$n2 = substr($r1["name"],-5);
    $u1 = $r1["username"];
    $date1 = $r1["date_time"];
    if($rate=='1')
    {
        $star="images/stars1.gif";
    }
    elseif($rate=='2')
    {
        $star="images/stars2.gif";
    }
    elseif($rate=='3')
    {
        $star="images/stars3.gif";
    }
    elseif($rate=='4')
    {
        $star="images/stars4.gif";
    }
    else
    {
        $star="images/stars5.gif";
    }
    
    if($r1["ip"]==$ip1){
        $delete1 = '<div class="trash" id="d1'.$r1["comment_id"].'">
        <div class="p" id="top"></div>
        <div class="p" id="tip"></div>
        <div class="p" id="p1"></div>
        <div class="p" id="p2"></div>
        <div class="p" id="p3"></div>
        <div class="p" id="bottom"></div>
        </div>';
    }
    
    $comments1 .= '<table  class="comments" id="t1'.$r1["comment_id"].'"><tr><td>
	<div style="overflow:hidden"><div style="float:left;color:#006BD0; font-size:12px;font-weight:bold">'.$u1.'</div>
	<div style="float:left;padding-left:20px;padding-right:20px;color:#9E9E9E; font-size:12px">('.$date1.')</div><div style="float:left;color:#32baed; font-size:12px"><img src="'.$star.'"></div></div>
	<div>'.$c.'</div>
	</td></tr></table>';
    $comment1 .='<table style=" margin-top: 25px; " width="100%" id="t1'.$r1["comment_id"].'"><tbody><tr>
		<td width="62px" valign="top"><img border="0" src="images/avatar.jpg"></td>	
		<td style="padding-left: 0px">	
		<table cellspacing="0" cellpadding="0" style="width:680px;">
		<tbody><tr><td height="39px" background="images/cm_top1.jpg" style="padding-left:40px">

        <span style="float:left;padding-left:10px;line-height:20px;font-size:15px"><font color="#B02F0F">'.$n1.'***'.$n2.'</font></span>
        <span style="float:left;padding-left:30px;"><img src="'.$star1.'"></span><span style="float:right;padding-right:30px;"><font color="#767676">Gửi vào lúc</font> <font color="#4D97E3">['.$date1.']</font></span>
		</td></tr>
		<tr><td background="images/cm_center1.jpg" style="padding-left:40px; padding-right:20px;">
		<font size="2pt" color="#767676">'.$c1.'</font>
		</td></tr>
		<tr><td height="8px" background="images/cm_bottom1.jpg">
		</td></tr>
		</tbody></table>	
		</td>		
		</tr>
        </tbody></table><div class="space"></div>';
}


//THE PAGE OF COMMENTS IN HTML
echo $comment1;

//PAGINATION PROCESS
$q1 = mysql_query("SELECT * FROM comment_hoidap WHERE id='$id1'"); //FOR COMMENTS FOR THE SPECIFIC CONTENT
$n1 = mysql_num_rows($q1); //NUMBER OF COMMENTS
$pages1 = ceil($n1/$rrp1); //NUMBER OF PAGES
$range1 = 2; //NUMBER OF PAGES TO BE LINKED BEFORE & AFTER THE CURRENTE PAGE NUMBER Ex: If page number is 5 (3, 4, 5, 6, 7)

//IF THERE IS MORE THAN 1 PAGE OF COMMENTS
if($pages1>1){
    //FIRST, PREVIOUS, NEXT, & LAST PAGE LINKS
    if($page1>1){
        $first1 = '<a class="page" id="1">Trang đầu</a> ';
        $prev1 = '<a class="page" id="'.($page1-1).'">Trở lại</a> ';
    }
    if($page1<$pages1){
        $next1 = '<a class="page" id="'.($page1+1).'">Tiếp theo</a> ';
        $last1 = '<a class="page" id="'.$pages1.'">Cuối cùng</a> ';
    }
    //NUMBERIC PAGINATION (1, 2, 3, 4, 5, etc.)
    for($p1=($page1-$range1); $p1<=($page1+$range1); $p1++){
        if($p1>=1&&$p1<=$pages1){
            if($p1==$page1){
                $nav1 .= '<span style="padding:2px 7px;background-color:#DADEDD;color: #B02F0F">'.$p1.'</span> '; //DOES NOT LINK THE CURRENT PAGE NUMBER
            } else {
                $nav1 .= '<a class="page" id="'.$p1.'">'.$p1.'</a> ';
            }
        }
    }
}

//DISPLAYS THE PAGINATION IN HTML


?>