<?php

include("settings.php"); //FILE WITH IMPORTANT SETTINGS

$id = $_GET["views"]; //ID OF THE CONTENT

//PAGINATION PROPERTIES
$page = 1;
if($_GET["page"]){
    $page = $_GET["page"];
}

$rrp = 10; //NUMBER OF COMMENTS PER PAGE
$o = ($page-1)*$rrp; //FIRST COMMENT TO BE SHOWN

//QUERY FOR THE PAGE OF COMMENTS
$q = mysql_query("SELECT * FROM $comment_table WHERE id='$id' ORDER BY comment_id DESC LIMIT $o, $rrp");

//THE PAGE OF COMMENTS
while($r=mysql_fetch_array($q)){
    $c = eregi_replace('\r\n', '<br>', $r["comment"]);
    $n = $r["name"];
    $u = $r["username"];
	$rate = $r["rate"];
    $date = $r["date_time"];
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
    
    if($r["ip"]==$ip){
        $delete = '<div class="trash" id="d'.$r["comment_id"].'">
        <div class="p" id="top"></div>
        <div class="p" id="tip"></div>
        <div class="p" id="p1"></div>
        <div class="p" id="p2"></div>
        <div class="p" id="p3"></div>
        <div class="p" id="bottom"></div>
        </div>';
    }
    
    $comments .= '<table class="comments" id="t'.$r["comment_id"].'"><tr><td>
	<div style="overflow:hidden"><div style="float:left;color:#006BD0; font-size:12px;font-weight:bold">'.$u.'</div>
	<div style="float:left;padding-left:20px;padding-right:20px;color:#9E9E9E; font-size:12px">('.$date.')</div><div style="float:left;color:#32baed; font-size:12px"><img src="'.$star.'"></div></div>
	<div>'.$c.'</div>
	</td></tr></table>';
    $comment .='<table width="100%" id="t'.$r["comment_id"].'"><tbody><tr>
		<td width="62px" valign="top"><img border="0" src="images/avatar.jpg"></td>	
		<td style="padding-left: 0px">	
		<table cellspacing="0" cellpadding="0" style="width:680px;">
		<tbody><tr><td height="39px" background="images/cm_top1.jpg" style="padding-left:40px">
		<span style="float:left;line-height:20px;font-size:15px"><font color="#B02F0F">'.$u.'</font></span>
        <span style="float:left;padding-left:10px;line-height:20px;font-size:15px"><font color="#B02F0F">('.$n.')</font></span>
        <span style="float:left;padding-left:30px;"><img src="'.$star.'"></span><span style="float:right;padding-right:30px;"><font color="#767676">Gửi vào lúc</font> <font color="#4D97E3">['.$date.']</font></span>
		</td></tr>
		<tr><td background="images/cm_center1.jpg" style="padding-left:40px; padding-right:20px;">
		<font size="2pt" color="#767676">'.$c.'</font>
		</td></tr>
		<tr><td height="8px" background="images/cm_bottom1.jpg">
		</td></tr>
		</tbody></table>	
		</td>		
		</tr>
        </tbody></table><div class="space"></div>';
}


//THE PAGE OF COMMENTS IN HTML
echo $comment;

//PAGINATION PROCESS
$q = mysql_query("SELECT * FROM $comment_table WHERE id='$id'"); //FOR COMMENTS FOR THE SPECIFIC CONTENT
$n = mysql_num_rows($q); //NUMBER OF COMMENTS
$pages = ceil($n/$rrp); //NUMBER OF PAGES
$range = 2; //NUMBER OF PAGES TO BE LINKED BEFORE & AFTER THE CURRENTE PAGE NUMBER Ex: If page number is 5 (3, 4, 5, 6, 7)

//IF THERE IS MORE THAN 1 PAGE OF COMMENTS
if($pages>1){
    //FIRST, PREVIOUS, NEXT, & LAST PAGE LINKS
    if($page>1){
        $first = '<a class="page" id="1">Trang đầu</a> ';
        $prev = '<a class="page" id="'.($page-1).'">Trở lại</a> ';
    }
    if($page<$pages){
        $next = '<a class="page" id="'.($page+1).'">Tiếp theo</a> ';
        $last = '<a class="page" id="'.$pages.'">Cuối cùng</a> ';
    }
    //NUMBERIC PAGINATION (1, 2, 3, 4, 5, etc.)
    for($p=($page-$range); $p<=($page+$range); $p++){
        if($p>=1&&$p<=$pages){
            if($p==$page){
                $nav .= '<span style="padding:2px 7px;background-color:#DADEDD;color: #B02F0F">'.$p.'</span> '; //DOES NOT LINK THE CURRENT PAGE NUMBER
            } else {
                $nav .= '<a class="page" id="'.$p.'">'.$p.'</a> ';
            }
        }
    }
}

//DISPLAYS THE PAGINATION IN HTML
echo "<div>".$first . $prev . $nav . $next . $last."</div>";

?>