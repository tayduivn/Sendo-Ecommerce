<br>



<?
echo $_SESSION["session_message"];
$_SESSION["session_message"] = "";
?>



<?php
$row=5;
$col=1;
$MAXPAGE=5;
$p=0;
$name=$_GET['name'];
$cat=0;
if ($_REQUEST['cat']!='') $cat=killInjection($_REQUEST['cat']);
$catallsub=$cat;
if ($_REQUEST['p']!='') $p=$_REQUEST['p'];
$sql_pro = "select * from orders where user_mem='".$_SESSION['mem']."' in (".$catallsub."0) order by id DESC limit ".$row*$col*$p.",".$row*$col;
$result = @mysql_query($sql_pro,$con);
$total=CountRecord("orders","user_mem in (".$catallsub."0)");
$sql_cat=@mysql_query("SELECT user FROM user_shop where user='".$cat."' ");
$row_cat=mysql_fetch_assoc($sql_cat);
$sql_pay = "select * from thanhvien where user='".$_SESSION['mem']."' ";	
$result = mysql_query($sql_pay,$con);
$cust=mysql_fetch_assoc($result);			
?>

	<!---đặt câu hỏi-->
<?
					
// xóa ảnh 1 baner
if (isset($_POST['guihoidap'])) {
$id = $_POST["id"]; //ID OF THE CONTENT
$name = $_POST["name"];
$ip = $_SERVER['REMOTE_ADDR'];;

$comment = $_POST["comment"];

$user = $_POST["user"];
date_default_timezone_set("Asia/Ho_Chi_Minh");
$dateposted = date("d-m-Y H:i:s");

$username = $_POST['username'];


			
	
 if(($comment==''))
	    {
			echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Bạn chưa nhập đánh giá')
    </SCRIPT>";
		}
 
     else
     {
     mysql_query("INSERT INTO comment_hoidap (ip,id, name, comment,username, user, date_time) VALUES ('$ip','$id','$name','$comment','$username','$user','$dateposted')");
     }
  	

		
}	
?>
<form method="POST">
<?if($_SESSION['mem']==''){?>	


<h3 class="ttl" style=" font-size: 13px; color: #505050; line-height: 30px; ">Đăng nhập để đặt câu hỏi?</h3>		
<?}else{?>

	<div class="question" style=" overflow: hidden; background: #f5f5f5; padding: 10px; width: 1039px; ">	
	 <input  type="hidden" name="id" value="<?php echo $row_pro['id'];?>">
					 <input  type="hidden" name="name" value="<?php echo $cust['fullname'];?>">
					 <input  type="hidden" name="user" value="<?php echo $row_pro['user'];?>">
					  <input  type="hidden" name="username" value="<?php echo $_SESSION['mem'];?>">
				
				
					  <input type="hidden" name="user_mem" value="<?php echo $row_pro['user_mem'];?>">
	<h3 class="ttl" style=" font-size: 13px; color: #505050; line-height: 30px; ">Bạn có câu hỏi với sản phẩm này? Đặt câu hỏi với shop.</h3>		
	<div class="text">			
	<textarea style=" width: 100%; padding: 5px; height: 52px; resize: none; background-color: #fff; -moz-border-radius: 2px; -webkit-border-radius: 2px; border-radius: 2px; transition: all 0.2s liner; " name="comment" placeholder="Đặt câu hỏi..." id="main_comment_data"></textarea>	
	<button style=" width: 70px; height: 30px; margin-top: 5px; background: #fff; border: 1px solid #e1e1e1; border-radius: 2px; line-height: 30px; " type="submit" name="guihoidap">Gửi</button>			</div>		</form>	</div>

<?}?>

</form>


	
	
	
	
		

	
	<!---show câu hoi-->
	

            <!-- /.box-header -->
       
          
                

				
	
				
				<?php
$sql_help = "select * from comment_hoidap  orders where id='".$row_pro['id']."' order by date_time DESC limit ".$row*$col*$p.",".$row*$col;
$result1 = @mysql_query($sql_help,$con);
$total1=@mysql_num_rows($result1);
for($i=1;$i<=$row&&$row_pro=@mysql_fetch_array($result1);$i++)
{
    $sql_user=@mysql_query("SELECT * FROM user_shop where user='".$row_pro['orders_user']."' ");
    $row_user=@mysql_fetch_assoc($sql_user);
	$sql_user_detai=@mysql_query("SELECT * FROM orderdetail where ordersdetail_ordersid='".$row_pro['orders_id']."' ");
    $row_user_detai=@mysql_fetch_assoc($sql_user_detai);
    $sql_city=@mysql_query("SELECT id,name FROM city where id='".$row_pro['city']."' ");
    $row_city=@mysql_fetch_assoc($row_sp);
    $sql_sp=@mysql_query("SELECT * FROM comment_hoidap where id='".$row_pro['id']."' ");
    $row_sp=@mysql_fetch_assoc($sql_sp);
    if($i%2)
    {
        $color="#EAEAEA";
    }
    else
    {
        $color="#FFFFFF";
    }
	
	
	

?>					
				

				
		<?}?>
		















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
while($r1=mysql_fetch_array($q1))

{
    $c1 = eregi_replace('\r1\n1', '<br>', $r1["comment"]);
	$c2 = eregi_replace('\r1\n1', '<br>', $r1["comment_traloi"]);
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
    $comment1 .='<table style=" margin-top: 0px; " width="100%" id="t1'.$r1["comment_id"].'">
	<tbody>
	<tr>
<div style=" margin-top: 20px; background-color: #f5f5f5; ">
	<div class="answer topic fis" style=" overflow: hidden; padding: 10px 10px 10px 30px; border-bottom: 1px solid #e0e0e0; ">
	<div style=" float: left; margin-right: 10px; "><img src="https://static.scdn.vn/images/ecom/icon-user35.jpg" width="35" height="35" title="" alt="">
	</div>
	<div style=" margin-left: 50px; ">
	<p style=" color: #999; line-height: 18px; float: left; overflow: hidden; width: 100%; margin-bottom: 5px; ">
	
	<span style=" margin-right: 10px; float: left; ">
'.$n1.'***'.$n2.'
	</span>
	<span>
	'.$date1.'
	</span>
	</p>
     <p style=" line-height: 16px; "><b>Câu hỏi:</b> "'.$c1.'"</p>

	   <p style=" line-height: 16px; "><b style=" color: red; ">Shop trả lời:</b> "'.$c2.'"</p>
            </div></div>
			</div>
		
		</tr>
		</tbody>
		
		</table>	
		</td>		
		</tr>
        </tbody></table>';
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
                
              
			



			
	
			



