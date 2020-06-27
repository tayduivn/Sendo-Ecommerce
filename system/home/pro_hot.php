	<script>
setInterval("chatonline();", 600000);
function chatonline() {
$('#ctl00_MainContent_hotproduct').load(location.href + ' #d-box-s-hot-content');
}</script>

    

      <div id="ctl00_MainContent_hotproduct" class="d-box-s-hot">
                
            


    <div class="d-box-s-hot-content" id="d-box-s-hot-content">
	    <div class="d-box-s-hot-title">
        <h3>VIP</h3>
    </div>
	
	
	
 <ul class="ul-pro4_shopvip">
<?php 


$sql_store=mysql_query("SELECT * FROM orderdetail where ordersdetail_id > 0  order by ordersdetail_id DESC limit 4");
$i=0;

while($row_store=mysql_fetch_array($sql_store))
	
{
$size = getimagesize($row_store['logo']);
if($i=='1')
{
    $class="first";
}
else
{
    $class="";
}
$sql_1=mysql_query("SELECT * FROM products where id='".$row_store['ordersdetail_product_id']."' ");
$row_1=mysql_fetch_assoc($sql_1);
$sql_2=mysql_query("SELECT * FROM orders where orders_id='".$row_store['ordersdetail_ordersid']."' ");
$row_2=mysql_fetch_assoc($sql_2);
    ?> 

	
        <li style="height: 46px;">
            <a id="xemsanpham" href="./<?php echo doidau(mb_strtolower($row_1['name'],"UTF8"));?>-pro-<?php echo $row_1['id'];?>.html" target="_blank"  style="padding: 0 0 0;">

                <div> <img width="30" height="30"  src="/<?php echo $row_1['image'];?>"></div>
                <div    class="company1" style=" margin-left: 35px; line-height: 16px; margin-bottom: 3px; /* font-family: tahoma, verdana, arial, sans-serif; */ font-size: 11px; margin-top: -32px; "> 
				 <div style="height: 33px; overflow: hidden; ">
				<span style="color: blue;font-weight: bold;"><?php echo dwebvn($row_1['name'],3);?></span> vừa có đơn hàng thứ <b style=" color: red; "><? echo mysql_num_rows(mysql_query("SELECT * FROM orderdetail where ordersdetail_product_id='".$row_1['id']."' "));?> </b> trên tổng đơn hàng  
				 </div>
				<br>
				<span style=" color: #666; font-size: 10px; display: block; margin-top: -14px; "><? 
$time= $row_2['orders_date']; 
$time_ago =strtotime($time); 
echo time_stamp($time_ago); 
?></span>
				
		
           	
		   </a>
        </li>

<?}?>
        </ul>   
	
         </div>
  



</div> 
<?php 
function time_stamp($time_ago) 
{ 
$cur_time=time(); 
$time_elapsed = $cur_time - $time_ago; 
$seconds = $time_elapsed ; 
$minutes = round($time_elapsed / 60 ); 
$hours = round($time_elapsed / 3600); 
$days = round($time_elapsed / 86400 ); 
$weeks = round($time_elapsed / 604800); 
$months = round($time_elapsed / 2600640 ); 
$years = round($time_elapsed / 31207680 ); 
// Seconds 
if($seconds <= 60) 
{ 
echo " Vài giây trước "; 
} 
//Minutes 
else if($minutes <=60) 
{ 
if($minutes==1) 
{ 
echo " Cách đây 1 phút "; 
} 
else 
{ 
echo " Cách đây $minutes phút"; 
} 
} 
//Hours 
else if($hours <=24) 
{ 
if($hours==1) 
{ 
echo "Cách đây 1 tiếng "; 
} 
else 
{ 
echo " Cách đây  $hours tiếng "; 
} 
} 
//Days 
else if($days <= 7) 
{ 
if($days==1) 
{ 
echo " Ngày hôm qua "; 
} 
else 
{ 
echo " Cách đây  $days ngày "; 
} 
} 
//Weeks 
else if($weeks <= 4.3) 
{ 
if($weeks==1) 
{ 
echo " Cách đây 1 tuần "; 
} 
else 
{ 
echo " Cách đây  $weeks tuần"; 
} 
} 
//Months 
else if($months <=12) 
{ 
if($months==1) 
{ 
echo " Cách đây 1 tháng "; 
} 
else 
{ 
echo " Cách đây $months tháng"; 
} 
} 
//Years 
else 
{ 
if($years==1) 
{ 
echo " Cách đây 1 năm "; 
} 
else 
{ 
echo " Cách đây $years năm "; 
} 
} 
} 
?>