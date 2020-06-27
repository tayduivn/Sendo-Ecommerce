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
    $n = substr($r["name"],-1);
	$n1 = substr($r["name"],-5);
    $u = $r["username"];
	$rate = $r["rate"];
    $date = $r["date_time"];
    if($rate=='1')
    {
        $star="<i class='fa fa-star' style='color: red;font-size: 17px;'></i>&nbsp;<i class='fa fa-star' style='color: #535353;font-size: 17px;'></i>&nbsp;<i class='fa fa-star' style='color: #535353;font-size: 17px;'></i>&nbsp;<i class='fa fa-star' style='color: #535353;font-size: 17px;'></i>&nbsp;<i class='fa fa-star' style='color: #535353;font-size: 17px;'></i>&nbsp;";
    }
    elseif($rate=='2')
    {
        $star="<i class='fa fa-star' style='color: red;font-size: 17px;'></i>&nbsp;<i class='fa fa-star' style='color: red;font-size: 17px;'></i>&nbsp;<i class='fa fa-star' style='color: #535353;font-size: 17px;'></i>&nbsp;<i class='fa fa-star' style='color: #535353;font-size: 17px;'></i>&nbsp;<i class='fa fa-star' style='color: #535353;font-size: 17px;'></i>&nbsp;";
    }
    elseif($rate=='3')
    {
        $star="<i class='fa fa-star' style='color: red;font-size: 17px;'></i>&nbsp;<i class='fa fa-star' style='color: red;font-size: 17px;'></i>&nbsp;<i class='fa fa-star' style='color: red;font-size: 17px;'></i>&nbsp;<i class='fa fa-star' style='color: #535353;font-size: 17px;'></i>&nbsp;<i class='fa fa-star' style='color: #535353;font-size: 17px;'></i>&nbsp;";
    }
    elseif($rate=='4')
    {
        $star="<i class='fa fa-star' style='color: red;font-size: 17px;'></i>&nbsp;<i class='fa fa-star' style='color: red;font-size: 17px;'></i>&nbsp;<i class='fa fa-star' style='color: red;font-size: 17px;'></i>&nbsp;<i class='fa fa-star' style='color: red;font-size: 17px;'></i>&nbsp;<i class='fa fa-star' style='color: #535353;font-size: 17px;'></i>&nbsp;";
    }
    else
    {
        $star="<i class='fa fa-star' style='color: red;font-size: 17px;'></i>&nbsp;<i class='fa fa-star' style='color: red;font-size: 17px;'></i>&nbsp;<i class='fa fa-star' style='color: red;font-size: 17px;'></i>&nbsp;<i class='fa fa-star' style='color: red;font-size: 17px;'></i>&nbsp;<i class='fa fa-star' style='color: red;font-size: 17px;'></i>&nbsp;";
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
	
    $comment .='
	
	<div class="row" style=" margin-right: -6px; margin-left: -35px; ">
        <div class="col-xs-12">
          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="t'.$r["comment_id"].'">
                <tbody style=" border-bottom: 1px solid #ddd; ">
				
				
				<tr style=" background: #f5f5f5; ">
                  <th>Người mua</th>
                  <th>Điểm Sao</th>
                  <th>Đánh giá sản phẩm</th>

                </tr>
				
				
				
				
				
				
                <tr>
                  <td style=" border-left: 1px solid #DFDFDF; "><b style=" color: #001ec7; ">'.$n.'***'.$n1.'</b><br>'.$date.'</td>
                  <td style=" border-left: 1px solid #DFDFDF; ">'.$star.'</td>

                  <td style=" border-left: 1px solid #DFDFDF; width: 830px; ">"'.$c.'"</td>

                </tr>


              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
	
	
<div class="space">
		</div>

		
		';
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
        $prev = '<a class="page" id="'.($page-1).'"><i style=" padding: 7px 5px; background: #fff; color: #000; border: 1px solid #ddd; padding-bottom: 5px; " class="fa fa-fw fa-chevron-left"></i></a> ';
    }
    if($page<$pages){
        $next = '<a class="page" id="'.($page+1).'"><i style=" padding: 7px 5px; background: #fff; color: #000; border: 1px solid #ddd; padding-bottom: 5px; " class="fa fa-fw fa-chevron-right"></i></a> ';
        $last = '<a class="page" id="'.$pages.'">Cuối cùng</a> ';
    }
    //NUMBERIC PAGINATION (1, 2, 3, 4, 5, etc.)
    for($p=($page-$range); $p<=($page+$range); $p++){
        if($p>=1&&$p<=$pages){
            if($p==$page){
                $nav .= '<span style="padding:5px 10px;background-color:#F44336;color: #ffffff;border: 1px solid #cb230e;">'.$p.'</span> '; //DOES NOT LINK THE CURRENT PAGE NUMBER
            } else {
                $nav .= '<a class="page" style=" padding: 5px 10px; background: #fff; color: #000; border: 1px solid #ddd;" id="'.$p.'">'.$p.'</a> ';
            }
        }
    }
}

//DISPLAYS THE PAGINATION IN HTML
echo "<div style=' float: right; '>".$first . $prev . $nav . $next . $last."</div>";

?>



