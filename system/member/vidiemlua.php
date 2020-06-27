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
$sql_pro = "select * from orderdetail where user_mem='".$_SESSION['mem']."' in (".$catallsub."0) order by ordersdetail_id DESC limit ".$row*$col*$p.",".$row*$col;
$result = @mysql_query($sql_pro,$con);
$total=CountRecord("orderdetail","user_mem in (".$catallsub."0)");
$sql_cat=@mysql_query("SELECT user FROM thanhvien where user='".$cat."' ");
$row_cat=mysql_fetch_assoc($sql_cat);

$sql9999=mysql_query("SELECT * FROM thanhvien where user='".$_SESSION['mem']."'");
$row9999=mysql_fetch_assoc($sql9999);
$sql99991=mysql_query("SELECT * FROM orders where orders_id='".$_SESSION['tim_id']."'");
$row99991=mysql_fetch_assoc($sql99991);
$sql999911=mysql_query("SELECT * FROM orderdetail where ordersdetail_ordersid='".$_SESSION['tim_id']."'");
$row999911=mysql_fetch_assoc($sql999911);
$sql9999111=mysql_query("SELECT * FROM products where id='".$row999911['ordersdetail_product_id']."'");
$row9999111=mysql_fetch_assoc($sql9999111);
$sql99991111=mysql_query("SELECT * FROM user_shop where user='".$row99991['orders_user']."'");
$row99991111=mysql_fetch_assoc($sql99991111);


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
">VÍ ĐIỂM LỬA</h3>

<?}else{?>
<h3><?php echo $row_cat['name'];?></h3>
<?}?>
</div>
<div id="list_cat_content_help">
<?php if(($_REQUEST['cat']==''))
{?>
 <div style="
    height: 130px;
">
<div class="order-inf2-lf ">

                        
                    
               <div>
					  <span style="color: red;     margin-top: 10px;   font-size: 115px;" class="glyphicon glyphicon-fire"></span>

					</div>


               <div style="
    margin-top: -119px;
    margin-left: 124px;
">
					
				<br>
			
					<br>

				
<b style=" color: #2196F3;    font-size: 36px; "><?php echo str_replace(",",",",number_format($row9999['diemlua_mem']));?> <b style=" color: red; ">điểm</b></b>
				
				
					
				
					
				
				
				
					
		
					
</div>
<? 

$sqlv=mysql_query("SELECT * FROM orderdetail orders where user_mem='".$_SESSION['mem']."' and trudiemlua > 0   order by ordersdetail_id DESC limit ".$row*$col*$p.",".$row*$col);
$i=0;
while($row1=mysql_fetch_array($sqlv))
{
	$i++;
	if ($i%2) $color="#d5d5d5"; else $color="#e5e5e5";

	$tien=$tien+$row1['trudiemlua'];

}
?>	  

                                    </div>
	
	<div style=" float: right; margin-top: -82px;    width: 292px;    font-size: 14px; ">
			<span><b>Tổng số điểm Lửa: </b><b style=" color: #e60f1e; "> <?php echo number_format ($row9999['diemlua_mem'] + $tien,0) ;?></b> <b>điểm</b></span>
			<br>
<span><b> Đã sử dụng: </b><b style=" color: #009688; "> <? echo number_format($tien,0);?> </b> <b>điểm</b></span>
			<br>
			<span><b> Hiện còn khả dụng: </b><b style=" color: #FF9800; "> <? echo number_format($row9999['diemlua_mem'],0);?> </b> <b>điểm</b></b></span>
						<br>
						
</div>								
				
            </div>
<div style="padding-top:0px;padding-left:0px;">
<div style="padding: 11px;background: #0c0c69;color: #fff;"><b>Lịch sử thanh toán Điểm Lửa</b>


 </div>
<!--begin all help-->



<?php
$sql_help = "select * from orderdetail  orders where user_mem='".$_SESSION['mem']."' and trudiemlua > 0  order by ordersdetail_id DESC limit ".$row*$col*$p.",".$row*$col;
$result1 = @mysql_query($sql_help,$con);
$total1=@mysql_num_rows($result1);

for($i=1;$i<=$row&&$row_pro=@mysql_fetch_array($result1);$i++)
	
{
    $sql_user=@mysql_query("SELECT * FROM thanhvien where user='".$row_pro['orders_user']."' ");
    $row_user=@mysql_fetch_assoc($sql_user);
	$sql_user_detai=@mysql_query("SELECT * FROM orders where orders_id='".$row_pro['ordersdetail_ordersid']."' ");
    $row_user_detai=@mysql_fetch_assoc($sql_user_detai);
    $sql_city=@mysql_query("SELECT id,name FROM city where id='".$row_pro['city']."' ");
    $row_city=@mysql_fetch_assoc($row_sp);
    $sql_sp=@mysql_query("SELECT * FROM products where id='".$row_pro['ordersdetail_product_id']."' ");
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



 


<div  style="border: 1px solid #ddd;">

<div  style="height: 40px;background-color: #f1f1f1;">
<div style="padding: 11px;" >Ngày <b><?php echo $row_user_detai['orders_date'];?></b> Bạn đã sử dụng <b style=" color: red; "><?php echo number_format($row_pro['trudiemlua'],0);?></b> điểm Lửa để thanh toán cho đơn hàng <b style="color: #161ae2;">#<?php echo $row_pro['ordersdetail_ordersid'];?></b>
		
 <span style="float: right;">ID: <b style="color: #000;"><?php echo $row_pro['ordersdetail_id'];?></b>
 </span>
 </div>

 </div>
                <div >
<div class="order-inf2-lf ">

                        



               <div style="margin-left: 10px;padding: 3px;">
					<b>Sản phẩm:</b> <b><span style=" color: #161ae2; " ><a id="xemsanpham" href="./<?php echo doidau(mb_strtolower($row_sp['name'],"UTF8"));?>-pro-<?php echo $row_sp['id'];?>.html"><?php echo $row_sp['name'];?></a></span >
					<br>
					<b>Giá:</b> <span style=" color: #F44336; " ><?php echo number_format($row_pro['ordersdetail_price'] * $row_pro['ordersdetail_quantity'] + $row_pro['phivanchuyen'],0);?>đ</span >
					<br>
					<b>Sử dụng điểm Lửa thanh toán:</b> <span style=" color: #161ae2; " ><?php echo number_format($row_pro['trudiemlua'],0);?></span > điểm
				    <br>
					<b>Tổng tiền phải thanh toán còn lại:</b> <span style=" color: #099a0f; " ><?php echo number_format($row_pro['ordersdetail_price'] * $row_pro['ordersdetail_quantity'] + $row_pro['phivanchuyen'] - $row_pro['trudiemlua'],0);?>đ</span >
				
					
					
					
					
					
					
			
					
						
				
					
		
					
</div>
	         
					
					  

                                    </div>
									
				
            </div>
			
			
		
			
</div>
<br>
	 			
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
if ($p>1) echo '<a class="buton_timkiem" title="&#272;&#7847;u tiên" href="/?home=member&act=vidiemlua&p=0">Đầu tiên</a>  ';
if ($p>0) echo '<a class="buton_timkiem" title="&#272;&#7847;u tiên" href="/?home=member&act=vidiemlua&p='.($p-1).'">Trang trước</a>';
$from=($p-2>0?$p-1:0);
$to=($p+2<$pages?$p+2:$pages);
for ($i=$from;$i<$to;$i++)
{
	if ($i!=$p) echo '<a href="/?home=member&act=vidiemlua&p='.$i.'">'.($i+1).'</a> ';
	else echo '<a class="active1">'.($i+1).'</a> ';
}
if ($p<$i-1) echo '<a class="buton_timkiem" title="Ti&#7871;p theo" href="/?home=member&act=vidiemlua&p='.($p+1).'">Trang tiếp</a>';

echo '</td></tr></table>';
?>

</div>
<!-- end all help-->
</div>
<?}else{?>

<?}?>
</div>
</div>
