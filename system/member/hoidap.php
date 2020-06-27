<?
echo $_SESSION["session_message"];
$_SESSION["session_message"] = "";
?>



<?php
$row=10;
$col=1;
$MAXPAGE=5;
$p=0;
$name=$_GET['name'];
$cat=0;
if ($_REQUEST['cat']!='') $cat=killInjection($_REQUEST['cat']);
$catallsub=$cat;
if ($_REQUEST['p']!='') $p=$_REQUEST['p'];
$sql_pro = "select * from thongbao where user='".$_SESSION['mem']."' in (".$catallsub."0) order by id DESC limit ".$row*$col*$p.",".$row*$col;
$result = @mysql_query($sql_pro,$con);
$total=CountRecord("thongbao","user in (".$catallsub."0)");
$sql_cat=@mysql_query("SELECT user FROM thanhvien where user='".$cat."' ");
$row_cat=mysql_fetch_assoc($sql_cat);
?>
<div id="content_center">
<div id="list_cat">
<?php if(($_REQUEST['cat']=='')&&($_REQUEST['views']==''))
{?>
<h3 style="
    color: #e5101d;
    font-size: 16px;
    font-weight: bold;
    height: 32px;
    line-height: 30px;
    border-bottom: 1px solid #ededed;
    text-transform: uppercase;
    margin-top: 0px;
">HỎI ĐÁP</h3>

<?}else{?>
<h3><?php echo $row_cat['name'];?></h3>
<?}?>
</div>
<div id="list_cat_content_help">
<?php if(($_REQUEST['cat']==''))
{?>

<div style="padding-top:0px;padding-left:0px;">
<div style="padding: 11px;background: #0c0c69;color: #fff;"><b>Tổng số Hỏi Đáp: </b><? echo mysql_num_rows(mysql_query("SELECT * FROM comment_hoidap where username='".$_SESSION['mem']."' "));?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 
      <span><b>Shop chưa trả lời:</b> <? echo mysql_num_rows(mysql_query("SELECT * FROM comment_hoidap where username='".$_SESSION['mem']."' and comment_traloi='' "));?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
	  <span><b>Shop đã trả lời:</b>  <? echo mysql_num_rows(mysql_query("SELECT * FROM comment_hoidap where username='".$_SESSION['mem']."' and comment_traloi > '' "));?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
      
 </span>
 </div>
<!--begin all help-->



<?php
$sql_help = "select * from comment_hoidap  orders where username='".$_SESSION['mem']."' order by date_time DESC limit ".$row*$col*$p.",".$row*$col;
$result1 = @mysql_query($sql_help,$con);
$total1=@mysql_num_rows($result1);
for($i=1;$i<=$row&&$row_pro=@mysql_fetch_array($result1);$i++)
{
    $sql_user=@mysql_query("SELECT * FROM thanhvien where user='".$row_pro['orders_user']."' ");
    $row_user=@mysql_fetch_assoc($sql_user);
	$sql_user_detai=@mysql_query("SELECT * FROM orderdetail where ordersdetail_ordersid='".$row_pro['orders_id']."' ");
    $row_user_detai=@mysql_fetch_assoc($sql_user_detai);
    $sql_city=@mysql_query("SELECT id,name FROM city where id='".$row_pro['city']."' ");
    $row_city=@mysql_fetch_assoc($row_sp);
    $sql_sp=@mysql_query("SELECT * FROM products where id='".$row_pro['id']."' ");
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
 


<form method="POST"   >


<div  style="border: 1px solid #ddd;">
<div  style="height: 40px;background-color: #f1f1f1;">
<div style="padding: 11px;" ><b>Ngày: </b><?php echo $row_pro['date_time'];?>&nbsp;&nbsp;&nbsp;&nbsp;
		<?if($row_pro['comment_traloi']==""){?>	
		     <input name="active" type="hidden" value="<?php echo $row_pro['id'];?>">
    <b style="background: blue; padding: 2px 9px; color: #fff; display: inline-block;  ">	Shop chưa trả lời</b>	
					<?}else{?>

     <b style="background: #F44336; padding: 2px 9px; color: #fff; display: inline-block;  ">	Shop đã trả lời </b>
 <?}?>
 <span style="float: right;">Số: <b style="color: #161ae2;">#<?php echo $row_pro['comment_id'];?></b>
 </span>
 </div>

 </div>
                <div >
<div class="order-inf2-lf ">

                        



               <div style="margin-left: 10px;padding: 3px;">
			   <b>Đã hỏi tại sản phẩm:</b> <a id="xemsanpham" href="./<?php echo doidau(mb_strtolower($row_sp['name'],"UTF8"));?>-pro-<?php echo $row_sp['id'];?>.html">	<?php echo $row_sp['name'];?> </a>
			   <br>
			   
			   
				<b>Câu hỏi:</b> 	<?php echo $row_pro['comment'];?>
				<br>
				<?if($row_pro['comment_traloi']==""){?>	
					<?}else{?>

		<b style=" color: red; "> Shop trả lời:</b>	<?php echo $row_pro['comment_traloi'];?>	
 <?}?>

		
				
				
					
					
					
			 
					
					
					
					
					
					
					
					
					
					
 
				
					
 
				
					
				
				
				
					
		
					
</div>
	         
					
					  

                                    </div>
									
				
            </div>
			
			
		
			
</div>
<br>

</form>













 










<?}?>
<?}?>





<? if ($total1>0) { ?>
<div style="clear:both;height:10px;padding-top:5px">
<hr color="#E9E9E9" width="100%" SIZE=1 align="center">
</div>
<div class="pagination">
<TABLE bgcolor="#FFFFFF" cellSpacing=10 cellPadding=0 width="100%" border=0 id="table35" style="line-height: 120%; text-align: justify" align="center">
<?
$pages=count_page($total1,($row*$col)/9);
echo '<tr><td class="smallfont" align="left" ></td>';
echo '<td class="smallfont" align="right">';
$param="";
if ($p>1) echo '<a class="buton_timkiem" title="&#272;&#7847;u tiên" href="/?home=member&act=hoidap&p=0">Đầu tiên</a>  ';
if ($p>0) echo '<a class="buton_timkiem" title="&#272;&#7847;u tiên" href="/?home=member&act=hoidap&p='.($p-1).'">Trang trước</a>';
$from=($p-2>0?$p-1:0);
$to=($p+2<$pages?$p+2:$pages);
for ($i=$from;$i<$to;$i++)
{
	if ($i!=$p) echo '<a href="/?home=member&act=hoidap&p='.$i.'">'.($i+1).'</a> ';
	else echo '<a class="active1">'.($i+1).'</a> ';
}
if ($p<$i-1) echo '<a class="buton_timkiem" title="Ti&#7871;p theo" href="/?home=member&act=hoidap&p='.($p+1).'">Trang tiếp</a>';

echo '</td></tr></table>';
?>

</div>
<!-- end all help-->
</div>
<?}else{?>

<?}?>
</div>
</div>
