 		<?
		$laygiatri_xuhuong=mysql_query("SELECT * FROM products WHERE upxuhuong = (SELECT MAX(upxuhuong) FROM products) ");
$xuhuong_giatri=mysql_fetch_assoc($laygiatri_xuhuong);	
$upxuhuong_lay= $xuhuong_giatri['upxuhuong'];	
		?>
		 		<?
		$laygiatri_xuhuong=mysql_query("SELECT * FROM products WHERE topxuhuong = (SELECT MAX(topxuhuong) FROM products) ");
$xuhuong_giatri=mysql_fetch_assoc($laygiatri_xuhuong);	
$topxuhuong_lay= $xuhuong_giatri['topxuhuong'];	
		?>
  		 		<?
		$laygiatri_topkhuyenmai=mysql_query("SELECT * FROM products WHERE topkhuyenmai = (SELECT MAX(topkhuyenmai) FROM products) ");
$topkhuyenmai_giatri=mysql_fetch_assoc($laygiatri_topkhuyenmai);	
$topkhuyenmai_lay= $topkhuyenmai_giatri['topkhuyenmai'];	
		?>      

<?
$MAXPAGE=80;


	switch ($_GET['action'])
	{
		case 'del' :
			$id = $_GET['id'];
			$sql = "delete from products where id='".$id."' and user='".$_SESSION['log']."'";
			@$result = mysql_query($sql,$con);
			if ($result) echo "";
			else echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không thể xóa')
    ;
    </SCRIPT>";
			break;
	}
?>

<?php
	if (isset($_POST['ButDel'])) {

		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			$sql_pro=@mysql_query("SELECT * FROM products where id='".$id."'  ");
			$pro=@mysql_fetch_array($sql_pro);
			$link="../";
			if ($pro)
			{
				@$result = @mysql_query("delete from products where id='".$id."' and user='".$_SESSION['log']."' ");
				if ($result) {
					$cnt++;
					if (file_exists($link.$pro['image'])) unlink($link.$pro['image']);
					if (file_exists($link.$pro['image_large'])) unlink($link.$pro['image_large']);

				}
			}
		}
		echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Xóa thành công ".$cnt."  sản phẩm')
    ;
    </SCRIPT>";

	}
	?>
<?
	if (isset($_POST['upsanpham_sll'])) {
$sql11=mysql_query("SELECT * FROM user_shop where user='".$_SESSION['log']."'");
$row22=mysql_fetch_assoc($sql11);
$kiemtraluotup = $row22['luotup'];
$checked_arr = $_POST['chk'];
$count = count($checked_arr);
$date_upsanpham=date("d-m-Y H:i:s");


		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			
	$upsanpham_name=mysql_query("SELECT * FROM products where id='".$id."'");
$upsanpham_name_in=mysql_fetch_assoc($upsanpham_name);
$upsanpham_name_in_ra= $upsanpham_name_in['name'];		 

if($kiemtraluotup >= $count)
{
	 @$result1 = mysql_query("update products set uptop = uptop + '1',upxuhuong = '".$upxuhuong_lay."' + 1 where id='".$id."' and user='".$_SESSION['log']."' ",$con);
	 @$result121 = mysql_query("INSERT INTO thongbao_shop (thongbao, date, user,type) VALUES ('Shop đã UP thành công sản phẩm <b>$upsanpham_name_in_ra</b> shop bị trừ đi <b>1</b> Lượt UP ' ,'$date_upsanpham','".$_SESSION['log']."','1')");
				if ($result1 && $result121){
					$cnt++;
				}	
}else{
echo  "<p align=center class='err'><SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không đủ lượt UP bạn cần có  $count Lượt UP để UP cho $count sản phẩm')
    window.location.href='sanpham';
    </SCRIPT></p>";	
}				 
}	 
	@$result12 = mysql_query("update user_shop set luotup = luotup - '".$cnt."' where user='".$_SESSION['log']."' ",$con);
	
	if ( $result12  ){
}	 
    $err =  "<p align=center class='err'><SCRIPT LANGUAGE='JavaScript'>
    window.alert('Đã UP thành công $cnt  sản phẩm')
    window.location.href='sanpham';
    </SCRIPT></p>";	
	
}

?>

<?
	if (isset($_POST['themvaoxuhuong'])) {
$sql11=mysql_query("SELECT * FROM user_shop where user='".$_SESSION['log']."'");
$row22=mysql_fetch_assoc($sql11);
$kiemtraluotup = $row22['luotup'];
$checked_arr = $_POST['chk'];
$count = count($checked_arr);
$date_upsanpham=date("d-m-Y H:i:s");


		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			
	$upsanpham_name=mysql_query("SELECT * FROM products where id='".$id."'");
$upsanpham_name_in=mysql_fetch_assoc($upsanpham_name);
$upsanpham_name_in_ra= $upsanpham_name_in['name'];		 

if($kiemtraluotup >= $count)
{
	 @$result1 = mysql_query("update products set uptop = uptop + '1',topxuhuong = '".$topxuhuong_lay."' + 1 where id='".$id."' and user='".$_SESSION['log']."' ",$con);
	 @$result121 = mysql_query("INSERT INTO thongbao_shop (thongbao, date, user,type) VALUES ('Shop đã UP thành công sản phẩm <b>$upsanpham_name_in_ra</b> vào chuyên mục Xu Hướng shop bị trừ đi <b>1</b> Lượt UP ' ,'$date_upsanpham','".$_SESSION['log']."','1')");
				if ($result1 && $result121){
					$cnt++;
				}	
}else{
echo  "<p align=center class='err'><SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không đủ lượt UP bạn cần có  $count Lượt UP để UP cho $count sản phẩm vào mục Xu Hướng')
    window.location.href='sanpham';
    </SCRIPT></p>";	
}				 
}	 
	@$result12 = mysql_query("update user_shop set luotup = luotup - '".$cnt."' where user='".$_SESSION['log']."' ",$con);
	
	if ( $result12  ){
}	 
    $err =  "<p align=center class='err'><SCRIPT LANGUAGE='JavaScript'>
    window.alert('Đã UP thành công $cnt  sản phẩm vào mục Xu Hướng')
    window.location.href='sanpham';
    </SCRIPT></p>";	
	
}

?>

<?
	if (isset($_POST['themvaokhuyenmai'])) {
$sql11=mysql_query("SELECT * FROM user_shop where user='".$_SESSION['log']."'");
$row22=mysql_fetch_assoc($sql11);
$kiemtraluotup = $row22['luotup'];
$checked_arr = $_POST['chk'];
$count = count($checked_arr);
$date_upsanpham=date("d-m-Y H:i:s");


		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			
	$upsanpham_name=mysql_query("SELECT * FROM products where id='".$id."'");
$upsanpham_name_in=mysql_fetch_assoc($upsanpham_name);
$upsanpham_name_in_ra= $upsanpham_name_in['name'];		 

if($kiemtraluotup >= $count)
{
	 @$result1 = mysql_query("update products set uptop = uptop + '1',topkhuyenmai = '".$topkhuyenmai_lay."' + 1 where id='".$id."' and user='".$_SESSION['log']."' ",$con);
	 @$result121 = mysql_query("INSERT INTO thongbao_shop (thongbao, date, user,type) VALUES ('Shop đã UP thành công sản phẩm <b>$upsanpham_name_in_ra</b> vào chuyên mục Khuyến Mãi shop bị trừ đi <b>1</b> Lượt UP ' ,'$date_upsanpham','".$_SESSION['log']."','1')");
				if ($result1 && $result121){
					$cnt++;
				}	
}else{
echo  "<p align=center class='err'><SCRIPT LANGUAGE='JavaScript'>
    window.alert('Không đủ lượt UP bạn cần có  $count Lượt UP để UP cho $count sản phẩm vào mục Khuyến Mãi')
    window.location.href='sanpham';
    </SCRIPT></p>";	
}				 
}	 
	@$result12 = mysql_query("update user_shop set luotup = luotup - '".$cnt."' where user='".$_SESSION['log']."' ",$con);
	
	if ( $result12  ){
}	 
    $err =  "<p align=center class='err'><SCRIPT LANGUAGE='JavaScript'>
    window.alert('Đã UP thành công $cnt  sản phẩm vào mục Khuyến Mãi')
    window.location.href='sanpham';
    </SCRIPT></p>";	
	
}

?>
 
<?
	if (isset($_POST['newstop'])) {
		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			
			$sql_news=mysql_query("SELECT * FROM products where id='".$id."' ");
			$news=mysql_fetch_assoc($sql_news);

			if ($news)
			{
				@$result = mysql_query("update products set top=1 where id='".$id."' ",$con);
				if ($result) {
					$cnt++;

				}
			}
		}
		echo "<p align=center class='err'>Đã thêm ".$cnt." vào tin top</p>";
	}
?>

<?
	$page = $_GET["page"];
	$p=0;
	if ($page!='') $p=$page;
	$where="1=1";
	if ($_REQUEST['cat']!='') $where="id=".$_REQUEST['cat'];
?>
<form method="POST" name="frmList" action="">
<? echo $err;?>
<input type=hidden name="page" value="<? echo $_REQUEST['page']; ?>">


	  <section class="content-header" style="margin-bottom: 10px;">
      <h1>
        Quản lý sản phẩm
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a >Quản lý sản phẩm</a></li>
      </ol>
    </section>
<section class="content">
     


	 <div class="row">
	  
	  
	  
	  
	  
	  
        <div class="col-md-6" style="width:100%;" >
		
          <div class="box" style="
    border-top: 3px solid #d40000;
">
<div  >
            
			 
			 
<!----------------------------------->
<!-- begin tim kiem-->
<form name="form_select" method="GET" action="./">
<input type="hidden" name="act" value="sanpham" />
<input type="hidden" name="search"  value="search" />
 
	<div class="box-body">
               <div class="row">
                <div class="col-lg-6">
                  <div class="input-group">
                        <span class="input-group-addon">
                         <i class="fa fa-barcode"></i>
                        </span>
                    <input type="text" class="form-control" name="keywords" value="<? echo $_REQUEST['keywords'];?>" placeholder="Mã sản phẩm, tên sản phẩm">
                  </div>
                  <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                  <div class="input-group">
                        <span class="input-group-addon">
                             <i class="fa fa-tag"></i>
                        </span>
                  <select class="form-control" name="tinhtrang">
	
		<?php if($_REQUEST['tinhtrang']=='' )
{?>
                     <option value=""></option>
                    <option value="0">Hết hàng</option>
                    <option  value="1">Còn hàng</option>
      
<?}
else{?>
<?}?>  		
		<?php if($_REQUEST['tinhtrang']=='0' )
{?>
                     <option value=""></option>
                    <option value="0" selected>Hết hàng</option>
                    <option  value="1">Còn hàng</option>
      
<?}
else{?>
<?}?>  	
		<?php if($_REQUEST['tinhtrang']=='1' )
{?>
                     <option value=""></option>
                    <option value="0" >Hết hàng</option>
                    <option  value="1" selected>Còn hàng</option>
      
<?}
else{?>
<?}?>  	  
                   

                  </select>
                  </div>
                  <!-- /input-group -->
                </div>
				
				
				
				 
				
				<div class="col-lg-6">
                  <div class="input-group" style=" margin-top: 11px; ">
                        <span class="input-group-addon">
                          <i class="fa fa-fw fa-edit"></i>
                        </span>
						 <select class="form-control" name="status">
	
		<?php if($_REQUEST['status']=='' )
{?>
                     <option value=""></option>
                    <option value="0">Đã duyệt</option>
                    <option  value="1">Hủy</option>
      
<?}
else{?>
<?}?>  		
		<?php if($_REQUEST['status']=='0' )
{?>
                     <option value=""></option>
                       <option value="0" selected>Đã duyệt</option>
                    <option  value="1">Hủy</option>
      
<?}
else{?>
<?}?>  	
		<?php if($_REQUEST['status']=='1' )
{?>
                     <option value=""></option>
                     <option value="0">Đã duyệt</option>
                    <option  value="1" selected>Hủy</option>
      
<?}
else{?>
<?}?>  	  
                   

                  </select>
                  </div>
                  <!-- /input-group -->
                </div>
				
				<div class="col-lg-6">
                  <div class="input-group" style=" margin-top: 11px; ">
                        <span class="input-group-addon">
                         <i class="fa fa-fw fa-database"></i>
                        </span>
						 
	<?
		$caaaa=mysql_query("SELECT * FROM cat where id='".$_REQUEST['cat_id']."' ");
	$caaaa1=mysql_fetch_assoc($caaaa);
	?>
		<select name="cat_id" class="form-control select2"  >
						<option value="<? echo $_REQUEST['cat_id'];?>" selected><? echo $caaaa1['name'];?></option>
						<? $timkiem=mysql_query("SELECT * FROM cat order by name desc");
						while($row_timkiem=mysql_fetch_array($timkiem))
						{?>
						<option value="<? echo $row_timkiem['id'];?>"><? echo $row_timkiem['name'];?></option>
						<?}?>
						</select>
	
                  </div>
				 
                
            
                  <!-- /input-group -->
                </div>
				
				
				 <div class="col-lg-6">
                  <div class="input-group" style=" margin-top: 11px; ">
                        <span class="input-group-addon">$</span>
                    <input type="number" style=" width: 225px; " class="form-control" name="giatu" value="<? echo $_REQUEST['keywords'];?>" placeholder="Giá từ">
				<span class="input-group-addon">$</span>
                    <input type="number" style=" width: 225px; " class="form-control" name="giaden" value="<? echo $_REQUEST['keywords'];?>" placeholder="Đến">
					
                  </div>
				  
                  <!-- /input-group -->
                </div>
				
				
				
			<div class="col-lg-6">
                  <div   style=" margin-top: 11px; ">
                        <button type="submit"   name="timkiem"  class="btn btn-block btn-danger">&nbsp;<i class="fa fa-fw fa-search"></i> TÌM KIẾM &nbsp;</button>
	</div>
                  <!-- /input-group -->
                </div>
				
				
				
				
                <!-- /.col-lg-6 -->
              </div>
              <!-- /.row -->

              
              
              <!-- /input-group -->
             
            <!-- /.box-body -->
          </div>	 </div>				 



 
 
 
 
 
 
 
 
 
 
</form>
<!-- end tim kiem -->
<!----------------------------------->		
            <div class="box-header with-border">
			
			
			
			
			<div>
			
              <span style="
    font-size: 14px;
"><i class="fa fa-cubes"></i> Số lượt UP còn lại:&nbsp;&nbsp;&nbsp;<b style=" color: blue; "> <?php echo $row_user_mem['luotup'];?> </b> &nbsp;&nbsp;&nbsp;  <i style="
    color: red;
" class="fa fa-long-arrow-up"></i> </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              
              <span style="
    font-size: 14px;
"><b><a href="dichvukhac"> Mua thêm lượt UP </a> </b></span>

			  </div>
			  <div style="float:right; ">
		


	<button type="submit" value="Xóa" title="Xóa sản phẩm"  name="ButDel"   style="
    style=;
    float: right;
    color: #ffffff;
    font-size: 15px;
    font-weight: 600;
    text-transform: uppercase;
    text-decoration: none;
    line-height: 26px;
    margin-left: 20px;
    background: #dd4b39;
    border-radius: 4px;
    border: 1px solid #dd4b39;
    "><i class="glyphicon glyphicon-trash"></i> Xóa</button>
	
<a href="./add_products" title="Thêm mới"  name="themmoi"   style="
    float: right;
    color: #ffffff;
    font-size: 15px;
    font-weight: 600;
    text-transform: uppercase;
    text-decoration: none;
    line-height: 26px;
    margin-left: 20px;
    background: #56820f;
    border-radius: 4px;
    border: 1px solid #35b8fe;
    ">&nbsp;<i class="fa fa-fw fa-plus-circle"></i> Thêm mới &nbsp;</a>
	
		<button type="submit" value="UP" title="UP sản phẩm"  name="upsanpham_sll"   style="
    float: right;
    color: #ffffff;
    font-size: 15px;
    font-weight: 600;
    text-transform: uppercase;
    text-decoration: none;
    line-height: 26px;
    margin-left: 20px;
    background: #228fca;
    border-radius: 4px;
    border: 1px solid #35b8fe;
    "><i class="fa fa-arrow-circle-up"></i> UP Đề Cử</button>
	
	
	

<button type="submit" value="UP" title="UP Xu Hướng"  name="themvaoxuhuong"   style="
    float: right;
    color: #ffffff;
    font-size: 15px;
    font-weight: 600;
    text-transform: uppercase;
    text-decoration: none;
    line-height: 26px;
    margin-left: 20px;
    background: #3F51B5;
    border-radius: 4px;
    border: 1px solid #35b8fe;
    "><i class="fa fa-star-o"></i> UP Xu Hướng</button>
	
	<button type="submit" value="UP" title="Up Khuyến Mãi"  name="themvaokhuyenmai"   style="
    float: right;
    color: #ffffff;
    font-size: 15px;
    font-weight: 600;
    text-transform: uppercase;
    text-decoration: none;
    line-height: 26px;
    margin-left: 20px;
    background: #dd4b39;
    border-radius: 4px;
    border: 1px solid #35b8fe;
    "><i class="fa fa-check-square"></i> UP Khuyến Mãi</button>

</div>	
            </div>
			

<?
function taotrang($sql,$link,$nitem,$itemcurrent)
{	global $con;
	$ret="";
	$result = mysql_query($sql, $con) or die('Error' . mysql_error());
	$value = mysql_fetch_array($result);
	$plus = (($value['cnt'] % $nitem)>0);
	for ($i=0;$i<($value[0] / $nitem) + plus;$i++)
	{
		if ($i<>$itemcurrent) $ret .= "<a  href=\"".$link.$i."\"  class=\"lslink\"  style='    padding-left: 8px;
    border: 1px solid #d0cbcb;
    background: #d42525;
    padding-right: 8px;
    color: #fff;
    /* padding: 4px; */
    padding-top: 4px;
    padding-bottom: 5px;    '  
	>".($i+1)."</a> ";
		else $ret .= "<a  href=\"".$link.$i."\"  class=\"lslink\"  style='    padding-left: 8px;
    border: 1px solid #d0cbcb;
    background: #177b3f;
    padding-right: 8px;
    color: #fff;
    /* padding: 4px; */
    padding-top: 4px;
    padding-bottom: 5px;    '  
	>".($i+1)."</a> ";
	}
	return $ret;
}
	$pageindex=taotrang("select count(*) from products where user='".$_SESSION['log']."' and $where","./?act=".$_REQUEST['act']."&cat=".$_REQUEST['cat']."&sortby=".$_REQUEST['sortby']."&direction=".$_REQUEST['direction']."&page=",$MAXPAGE,$page);
?>

<table cellspacing="0" cellpadding="0" width="100%">
<? if ($_REQUEST['code']==1) echo '<tr><td colspan=2 align="center" class="err">&#272;ã c&#7853;p nh&#7853;t thành công</td></tr>'; ?>

</table>

<?
function GetLinkSort($order)
{
	$direction="";
	if ($_REQUEST['direction']==''||$_REQUEST['direction']!='0')
		$direction="0";
	else
		$direction="1";
	
	return "./?act=".$_REQUEST['act']."&cat=".$_REQUEST['cat']."&page=".$_REQUEST['page']."&sortby=".$order."&direction=".$direction;
}
?>

 <div class="box-body no-padding">

 <tr>
<td class="smallfont"><div style="
    padding: 12px;
">Tổng sản phẩm <b><? echo mysql_num_rows(mysql_query("SELECT * FROM products where user='".$_SESSION['log']."' "));?></b>
&nbsp;&nbsp;&nbsp;&nbsp;
<? echo $pageindex; ?>
 
</div>
</td>





</tr>
              <table class="table table-hover">
			  
  <tr >
    <td align=center nowrap class="title "><a><b></b></a></td>
	<td align="center" nowrap class="title"><a class="title" href="<? echo GetLinkSort(1); ?>"><b>Mã SP</b></a></td>
	<td align="center" nowrap class="title"><a class="title" href="<? echo GetLinkSort(3); ?>"><b>Hình ảnh</b></a></td>
    <td align="center" nowrap class="title" width="460"><a class="title" href="<? echo GetLinkSort(2); ?>"><b>Thông tin sản phẩm</b></a></td>
	<td align="center" nowrap class="title"><a class="title" href="<? echo GetLinkSort(9); ?>"><b>Giá (VNĐ)</b></a></td>
    <td align="center" nowrap class="title"><a class="title" href="<? echo GetLinkSort(4); ?>"><b>Trạng thái</b></a></td>
    <td align="center" nowrap class="title"><a class="title" href="<? echo GetLinkSort(4); ?>"><b>Tình trạng</b></a></td>
    <td align="center" nowrap class="title"><a class="title" href="<? echo GetLinkSort(7); ?>"><b>Ngày cập nhật</b></a></td>

	
  </tr>
  
  <?
  	$where="1=1";
	$keywords=killInjection($_REQUEST['keywords']);
	if ($keywords!='')
	{
		$where.=" and (code like '%".$keywords."%' or name like '%".$keywords."%'";
		if ($_REQUEST['search_in_description']=='') 
			$where.="or id like '%".$keywords."%'   "; 
		$where.=") ";
	}

    if ($_REQUEST['cat_id']!='')	$where.=" and cat=".$_REQUEST['cat_id'];
	if ($_REQUEST['status']!='')	$where.=" and status=".$_REQUEST['status'];
    if ($_REQUEST['tinhtrang']!='')	$where.=" and tinhtrang=".$_REQUEST['tinhtrang'];
	if ($_REQUEST['giatu']!='')	$where.=" and price_special>=".$_REQUEST['giatu'];
	if ($_REQUEST['giaden']!='') $where.=" and price_special<=".$_REQUEST['giaden'];
	
	
  			$sortby="order by id";
  			if ($_REQUEST['sortby']!='') $sortby="order by ".(int)$_REQUEST['sortby'];
  			$direction=($_REQUEST['direction']==''||$_REQUEST['direction']=='0'?"desc":"");
           	$sql="select * from products where $where and user='".$_SESSION['log']."'  $sortby $direction limit ".($p*$MAXPAGE).",".$MAXPAGE;
        	$result=mysql_query($sql,$con);
        	$i=0;
           	while(($row=mysql_fetch_array($result)))
			{
			$i++;
			if ($i%2) $color="#d5d5d5"; else $color="#e5e5e5";
			$catinfo=GetNewsCategoryInfo($row['cat_id']);
			$tinhtrang=$row['tinhtrang'];
			$sql_cat=mysql_query("SELECT * FROM cat where id='".$row['cat']."' ");
$row_cat=mysql_fetch_assoc($sql_cat);
$cat_mem=$row_cat['name'];
			$sql_cat_sub2=mysql_query("SELECT * FROM cat where id='".$row_cat['parent']."' ");
$row_cat_sub2=mysql_fetch_assoc($sql_cat_sub2);
$cat_mem_sub2=$row_cat_sub2['name'];
			$sql_cat_sub1=mysql_query("SELECT * FROM cat where id='".$row_cat_sub2['parent']."' ");
$row_cat_sub1=mysql_fetch_assoc($sql_cat_sub1);
$cat_mem_sub1=$row_cat_sub1['name'];

			$sql_cat_sub1_shop=mysql_query("SELECT * FROM user_shop where user='".$_SESSION['log']."' ");
$row_cat_sub1_shop=mysql_fetch_assoc($sql_cat_sub1_shop);
 
  ?>
  
  <tr class="table_a" onmouseout="this.className='table_a'" onmouseover="this.className='table_a1'" >
    <td align="center" class="smallfont" style="
    /* margin-top: 35px; */
    padding-top: 47px;
">
    <input style="
    margin-top: 36px;
" type="checkbox" class="minimal-red" name="chk[]" value="<? echo $row['id']; ?>"> </td>
	<td class="td_sanpham" width="20px"><Center style="
    margin-top: 32px;
"><a href="./edit/<? echo $row['id']; ?>/<? echo $row['cat']; ?>"><? echo $row['code']; ?></a>
	<br>
	
<?php if($row_cat_sub1_shop['luotup']>='1' )
{?>

 		<?
		$laygiatri_xuhuong=mysql_query("SELECT * FROM products WHERE upxuhuong = (SELECT MAX(upxuhuong) FROM products) ");
$xuhuong_giatri=mysql_fetch_assoc($laygiatri_xuhuong);	
$upxuhuong_lay= $xuhuong_giatri['upxuhuong'];	
		?>
		
		
<?
		// Đang còn hàng..click hết hàng
if (isset($_POST['upsanpham'])) {
	date_default_timezone_set("Asia/Ho_Chi_Minh");
$date_upsanpham = date("d-m-Y H:i:s");
$upsanpham_id = $_POST['upsanpham_id'];
$user_shop_upsanpham= $_SESSION['log'];
$upsanpham_name= $row['name'];
 
 


 






if($row['id']== $upsanpham_id){	

$sql = "update products set uptop =  uptop + 1, upxuhuong = '".$upxuhuong_lay."' + '1'   where id='".$upsanpham_id."' and user='".$_SESSION['log']."' ";
$sql_tru = "update user_shop set luotup =  luotup - 1,lichsuup = lichsuup + 1  where   user='".$_SESSION['log']."' ";
 
		if (mysql_query($sql) && mysql_query($sql_tru)  ) 
	
 
 $sql_conhang_4 = "INSERT INTO thongbao_shop (thongbao, date, user,type) VALUES ('Shop đã UP thành công sản phẩm <b>$upsanpham_name</b> shop bị trừ đi 1 Lượt UP ' ,'$date_upsanpham','$user_shop_upsanpham','1')";
 if (mysql_query($sql_conhang_4) ) {
			
			
				echo "<SCRIPT LANGUAGE='JavaScript'>
				    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
   window.alert('Đã Up thành công sản phẩm $upsanpham_name')

    </SCRIPT>";
		}	
		else {
				echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Thao tác không thành công')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";
		}
					}else{
					}	
		
	
  	


}
		?>
		<? echo $err;?>
		



<form method="POST">
<input type="hidden" name="upsanpham_id" value="<? echo $row['id']; ?>">
<button  type="submit" name="upsanpham" class="btn btn-block btn-danger btn-lg" style="
    width: 52px;
    height: 28px;
    padding: 0px 0px;
    margin-top: 19px;
	    font-size: 15px;
"><i class="fa fa-fw fa-arrow-circle-o-up"></i> Up</button>
</form>
<?}
else{?>
<a onclick="return confirm('Shop đã hết lượt UP.Shop vui lòng mua thêm Lượt Up tại Dịch Vụ ShopCanTho.Vn');"  type="button" class="btn btn-block btn-danger btn-lg" style="
    width: 52px;
    height: 28px;
    padding: 0px 0px;
    margin-top: 19px;
	    font-size: 15px;
"><i class="fa fa-fw fa-arrow-circle-o-up" ></i> Up</a>
<?}?>	
	

	
	
	</center>
	</td>
	<td  class="smallfont" width="69"><a  href="./edit/<? echo $row['id']; ?>/<? echo $row['cat']; ?>"class="img_small">
	<img src="../<? echo $row['image']; ?>" width="100px" height="100px"  alt="<? $row['name'];?>" /></a></td>
    <td  class="smallfont"><a  href="./edit/<? echo $row['id']; ?>/<? echo $row['cat']; ?>" style="
color: #2991e4;
    font-size: 16px;
"><? echo $row['name']; ?>
</a>
<br>
<b
style="
    font-size: 11px;
"><b style="
    font-size: 13px;
"><? echo $cat_mem_sub1; ?></b> <i class="fa fa-fw fa-arrow-right"></i> <b style="
    font-size: 12px;
"><? echo $cat_mem_sub2; ?></b> <i class="fa fa-fw fa-arrow-right"></i> <b style="
    font-size: 11px;
"><? echo $cat_mem; ?></b></b>
<br>
<?php
$sql_con=@mysql_query("SELECT * FROM comment where id='".$row['id']."' ");
$tong_con=@mysql_num_rows($sql_con);
$cnt=0;
$tongcong=0;
while($row_con=mysql_fetch_assoc($sql_con))
{
?>
<?
$tongcong=$tongcong+$row_con['rate'];
$trungbinh=$tongcong/$tong_con;
$cnt=$cnt+1;
}?>
<?php if($trungbinh>='1' & $trungbinh<'1.5')
{?>
<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($trungbinh>='1.5' & $trungbinh<'2')
{?>
<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star-half-empty" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>



<?php if($trungbinh>='2' & $trungbinh<'2.5')
{?>
<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($trungbinh>='2.5' & $trungbinh<'3')
{?>
<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star-half-empty" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>


<?php if($trungbinh>='3' & $trungbinh<'3.5')
{?>
<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($trungbinh>='3.5' & $trungbinh<'4')
{?>
<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star-half-empty" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>


<?php if($trungbinh>='4' & $trungbinh<'4.5')
{?>
<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: #535353;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($trungbinh>='4.5' & $trungbinh<'5')
{?>
<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star-half-empty" style="color: red;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>

<?php if($trungbinh>='5' )
{?>
<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;<i class="fa fa-star" style="color: red;font-size: 17px;"></i>&nbsp;
<?}
else{?><?}?>
<b><?echo round($trungbinh*20,2);?>%</b>&nbsp;&nbsp;<b style="
    font-size: 11px;
    color: #f32c6b;
">Đánh giá tích cực</b>

</div>
<br>



<?php if($row['mausac_nau']=='' &  $row['mausac_vang']=='' &  $row['mausac_trang']==''&  $row['mausac_den']==''&  $row['mausac_hong']==''&  $row['mausac_xanhla']==''&  $row['mausac_xanhnuocbien']==''&  $row['mausac_xanhngoc']==''&  $row['mausac_xanhden']==''&  $row['mausac_xam']==''&  $row['mausac_tim']==''&  $row['mausac_do']==''&  $row['mausac_cam']==''&  $row['mausac_kem']==''&  $row['mausac_xanhduong']==''&  $row['mausac_soc']==''&  $row['mausac_xanhladam']==''&  $row['mausac_hoatiet']==''&  $row['mausac_bac']==''&  $row['mausac_hongphan']=='')
{?>
<?}
else{?>
<b style="
    font-size: 12px;
">Màu sắc: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> 
<?php if($row['mausac_nau']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_nau']; ?>; outline: 1px solid #ccc;" title="Nâu"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_vang']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_vang']; ?>; outline: 1px solid #ccc;" title="Vàng"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_trang']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_trang']; ?>; outline: 1px solid #ccc;" title="Trắng"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_den']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_den']; ?>; outline: 1px solid #ccc;" title="Đen"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_hong']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_hong']; ?>; outline: 1px solid #ccc;" title="Hồng"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_xanhla']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_xanhla']; ?>; outline: 1px solid #ccc;" title="Xanh lá"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_xanhnuocbien']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_xanhnuocbien']; ?>; outline: 1px solid #ccc;" title="Xanh nước biển"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_xanhngoc']=='' )
{?>
<?}
else{?>

<span style="background-color: #<? echo $row['mausac_xanhngoc']; ?>; outline: 1px solid #ccc;" title="Xanh ngọc"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_xanhden']=='' )
{?>
<?}
else{?>

<span style="background-color: #<? echo $row['mausac_xanhden']; ?>; outline: 1px solid #ccc;" title="Xanh đen"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_xam']=='' )
{?>
<?}
else{?>

<span style="background-color: #<? echo $row['mausac_xam']; ?>; outline: 1px solid #ccc;" title="Xám"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_tim']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_tim']; ?>; outline: 1px solid #ccc;" title="Tím"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_do']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_do']; ?>;outline: 1px solid #ccc;" title="Đỏ"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_cam']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_cam']; ?>;outline: 1px solid #ccc;" title="Cam"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_kem']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_kem']; ?>;outline: 1px solid #ccc;" title="Kem"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>

<?php if($row['mausac_xanhduong']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_xanhduong']; ?>;outline: 1px solid #ccc;" title="Xanh dương"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_soc']=='' )
{?>
<?}
else{?>
<span style="background: url(/images/<? echo $row['mausac_soc']; ?>) center center no-repeat; ?>;outline: 1px solid #ccc;" title="Sọc"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_xanhreu']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_xanhreu']; ?>;outline: 1px solid #ccc;" title="Xanh rêu"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_xanhladam']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_xanhladam']; ?>;outline: 1px solid #ccc;" title="Xanh lá đậm"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_hoatiet']=='' )
{?>
<?}
else{?>
<span style="background: url(/images/<? echo $row['mausac_hoatiet']; ?>) center center no-repeat;outline: 1px solid #ccc;" title="Họa tiết"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_bac']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_bac']; ?>;outline: 1px solid #ccc;" title="Bạc"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
&nbsp;&nbsp;
<?}?>
<?php if($row['mausac_hongphan']=='' )
{?>
<?}
else{?>
<span style="background-color: #<? echo $row['mausac_hongphan']; ?>;outline: 1px solid #ccc;" title="Hồng phấn"><a href="java:"  >&nbsp;&nbsp;&nbsp;&nbsp;</a></span>

<?}?>



<?}?>





<br>
<?php if($row['kichthuoc_freesize']=='' & $row['kichthuoc_1']=='' & $row['kichthuoc_2']=='' & $row['kichthuoc_3']=='' & $row['kichthuoc_4']=='' & $row['kichthuoc_5']=='' & $row['kichthuoc_6']=='' & $row['kichthuoc_7']=='' & $row['kichthuoc_8']=='' & $row['kichthuoc_9']=='' & $row['kichthuoc_10']=='' & $row['kichthuoc_11']=='' & $row['kichthuoc_12']=='' & $row['kichthuoc_S']=='' & $row['kichthuoc_M']=='' & $row['kichthuoc_L']=='' & $row['kichthuoc_XL']=='' & $row['kichthuoc_XXL']=='' & $row['kichthuoc_XS']=='' & $row['kichthuoc_XXS']=='' & $row['kichthuoc_2XL']=='' & $row['kichthuoc_3XL']=='' & $row['kichthuoc_4XL']=='' & $row['kichthuoc_5XL']=='' & $row['kichthuoc_6XL']=='' & $row['kichthuoc_25']=='' & $row['kichthuoc_26']=='' & $row['kichthuoc_27']=='' & $row['kichthuoc_28']=='' & $row['kichthuoc_29']=='' & $row['kichthuoc_30']=='' & $row['kichthuoc_31']=='' & $row['kichthuoc_32']=='' & $row['kichthuoc_33']=='' & $row['kichthuoc_34']=='' & $row['kichthuoc_35']=='' & $row['kichthuoc_36']=='' & $row['kichthuoc_37']=='' & $row['kichthuoc_38']=='' & $row['kichthuoc_39']=='' & $row['kichthuoc_40']=='' & $row['kichthuoc_41']=='' & $row['kichthuoc_42']=='' & $row['kichthuoc_43']=='' & $row['kichthuoc_44']=='' & $row['kichthuoc_45']=='' & $row['kichthuoc_46']=='' & $row['kichthuoc_47']=='')
{?>
<?}
else{?>



 
<b style="
    font-size: 12px;
">Kích thước:   &nbsp;&nbsp;</b> 
<?php if($row['kichthuoc_freesize']=='' )
{?>
<?}
else{?>
<span style="/* outline: 1px solid #ccc; */width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;/* display: block; *//* float: left; */cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="FreeSize"><? echo $row['kichthuoc_freesize']; ?></span>

<?}?>

<?php if($row['kichthuoc_1']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-1"><? echo $row['kichthuoc_1']; ?></span>
<?}?>

<?php if($row['kichthuoc_2']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-2"><? echo $row['kichthuoc_2']; ?></span>
<?}?>
<?php if($row['kichthuoc_3']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-3"><? echo $row['kichthuoc_3']; ?></span>
<?}?>
<?php if($row['kichthuoc_4']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-4"><? echo $row['kichthuoc_4']; ?></span>
<?}?>
<?php if($row['kichthuoc_5']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-5"><? echo $row['kichthuoc_5']; ?></span>
<?}?>
<?php if($row['kichthuoc_6']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding-left: 4px;padding-right: 4px;" title="Size-6"><? echo $row['kichthuoc_6']; ?></span>
<?}?>
<?php if($row['kichthuoc_7']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-7"><? echo $row['kichthuoc_7']; ?></span>
<?}?>
<?php if($row['kichthuoc_8']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-8"><? echo $row['kichthuoc_8']; ?></span>
<?}?>
<?php if($row['kichthuoc_9']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-9"><? echo $row['kichthuoc_9']; ?></span>
<?}?>
<?php if($row['kichthuoc_10']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-10"><? echo $row['kichthuoc_10']; ?></span>
<?}?>
<?php if($row['kichthuoc_11']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-11"><? echo $row['kichthuoc_11']; ?></span>
<?}?>
<?php if($row['kichthuoc_12']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-12"><? echo $row['kichthuoc_12']; ?></span>
<?}?>
<?php if($row['kichthuoc_S']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-S"><? echo $row['kichthuoc_S']; ?></span>
<?}?>
<?php if($row['kichthuoc_M']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-M"><? echo $row['kichthuoc_M']; ?></span>
<?}?>
<?php if($row['kichthuoc_L']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-L"><? echo $row['kichthuoc_L']; ?></span>
<?}?>
<?php if($row['kichthuoc_XL']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-XL"><? echo $row['kichthuoc_XL']; ?></span>
<?}?>
<?php if($row['kichthuoc_XXL']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-XXL"><? echo $row['kichthuoc_XXL']; ?></span>
<?}?>
<?php if($row['kichthuoc_XS']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-XS"><? echo $row['kichthuoc_XS']; ?></span>
<?}?>
<?php if($row['kichthuoc_XXS']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-XXS"><? echo $row['kichthuoc_XXS']; ?></span>
<?}?>
<?php if($row['kichthuoc_2XL']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-2XL"><? echo $row['kichthuoc_2XL']; ?></span>
<?}?>
<?php if($row['kichthuoc_3XL']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-3XL"><? echo $row['kichthuoc_3XL']; ?></span>
<?}?>
<?php if($row['kichthuoc_4XL']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-4XL"><? echo $row['kichthuoc_4XL']; ?></span>
<?}?>
<?php if($row['kichthuoc_5XL']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-5XL"><? echo $row['kichthuoc_5XL']; ?></span>
<?}?>
<?php if($row['kichthuoc_6XL']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-6XL"><? echo $row['kichthuoc_6XL']; ?></span>
<?}?>
<?php if($row['kichthuoc_25']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-25"><? echo $row['kichthuoc_25']; ?></span>
<?}?>
<?php if($row['kichthuoc_26']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-26"><? echo $row['kichthuoc_26']; ?></span>
<?}?>
<?php if($row['kichthuoc_27']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-27"><? echo $row['kichthuoc_27']; ?></span>
<?}?>
<?php if($row['kichthuoc_28']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-28"><? echo $row['kichthuoc_28']; ?></span>
<?}?>
<?php if($row['kichthuoc_29']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-29"><? echo $row['kichthuoc_29']; ?></span>
<?}?>
<?php if($row['kichthuoc_30']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-30"><? echo $row['kichthuoc_30']; ?></span>
<?}?>
<?php if($row['kichthuoc_31']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-31"><? echo $row['kichthuoc_31']; ?></span>
<?}?>
<?php if($row['kichthuoc_32']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-32"><? echo $row['kichthuoc_32']; ?></span>
<?}?>
<?php if($row['kichthuoc_33']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-33"><? echo $row['kichthuoc_33']; ?></span>
<?}?>
<?php if($row['kichthuoc_34']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-34"><? echo $row['kichthuoc_34']; ?></span>
<?}?>
<?php if($row['kichthuoc_35']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-35"><? echo $row['kichthuoc_35']; ?></span>
<?}?>
<?php if($row['kichthuoc_36']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-36"><? echo $row['kichthuoc_36']; ?></span>
<?}?>
<?php if($row['kichthuoc_37']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-37"><? echo $row['kichthuoc_37']; ?></span>
<?}?>
<?php if($row['kichthuoc_38']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-38"><? echo $row['kichthuoc_38']; ?></span>
<?}?>
<?php if($row['kichthuoc_39']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-39"><? echo $row['kichthuoc_39']; ?></span>
<?}?>
<?php if($row['kichthuoc_40']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-40"><? echo $row['kichthuoc_40']; ?></span>
<?}?>
<?php if($row['kichthuoc_41']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-41"><? echo $row['kichthuoc_41']; ?></span>
<?}?><?php if($row['kichthuoc_42']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-42"><? echo $row['kichthuoc_42']; ?></span>
<?}?>
<?php if($row['kichthuoc_43']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-43"><? echo $row['kichthuoc_43']; ?></span>
<?}?>
<?php if($row['kichthuoc_44']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-44"><? echo $row['kichthuoc_44']; ?></span>
<?}?>
<?php if($row['kichthuoc_45']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-45"><? echo $row['kichthuoc_45']; ?></span>
<?}?>
<?php if($row['kichthuoc_46']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-46"><? echo $row['kichthuoc_46']; ?></span>
<?}?>
<?php if($row['kichthuoc_47']=='' )
{?>
<?}
else{?>
<span style="width: auto;border: 1px solid #ccc;background: #F2F2F2;text-align: center;cursor: pointer;position: relative;font-size: 13px;margin-right: 10px;margin-bottom: 5px;padding: 0px;padding-left: 4px;padding-right: 4px;" title="Size-47"><? echo $row['kichthuoc_47']; ?></span>
<?}?>


<?}?>


  <div  class="box-btns">
		


	<a     id="xemnhanhsp" target="_blank"  href="/<?php echo doidau(mb_strtolower($row['name'],"UTF8"));?>-pro-<?php echo $row['id'];?>.html"    style="
float: right;
    color: #ffffff;
    font-size: 12px;
    /* font-weight: 600; */
    /* text-transform: uppercase; */
    text-decoration: none;
    line-height: 21px;
    margin-left: 165px;
    background: #dd4b39;
    border-radius: 4px;
    border: 1px solid #dd4b39;
    width: 64px;
    position: absolute;
    /* margin-top: -5px; */
	padding-left: 7px;
    "><i class="fa  fa-fw fa-eye"></i> Xem</a>
	
	<a href="./edit/<? echo $row['id']; ?>/<? echo $row['cat']; ?>"     style="
float: right;
    color: #ffffff;
    font-size: 12px;
    /* font-weight: 600; */
    /* text-transform: uppercase; */
    text-decoration: none;
    line-height: 21px;
    margin-left: 254px;
    background: #dd4b39;
    border-radius: 4px;
    border: 1px solid #dd4b39;
    width: 64px;
    position: absolute;
    /* margin-top: -5px;
	
    "> <i class="fa fa-fw fa-eyedropper"></i> Sửa</a>
	
	<a  onclick="return confirm('B&#7841;n có ch&#7855;c ch&#7855;n mu&#7889;n xoá ?');"  title="Xóa sản phẩm" href="./?act=sanpham&action=del&page=<? echo $_REQUEST['page']; ?>&id=<? echo $row['id']; ?>"   style="
    float: right;
    color: #ffffff;
    font-size: 12px;
    /* font-weight: 600; */
    /* text-transform: uppercase; */
    text-decoration: none;
    line-height: 21px;
    margin-left: 340px;
    background: #dd4b39;
    border-radius: 4px;
    border: 1px solid #dd4b39;
    width: 64px;
    position: absolute;
    margin-top: 0px;
    "><i class="glyphicon glyphicon-trash"></i> Xóa</a>
	
	

	



</div> 
</td>


	<td   style="
    color: red;
    font-size: 15px;
    font-weight: 600;
 
    padding-right: 20px;
    white-space: nowrap;
	padding-top: 50px;
"><?php echo str_replace(",",",",number_format($row['price_special'],0));?> đ
	
	</td>

    <td  class="td_sanpham">
		<?if($row['status']=='0'){?>
	<center style="margin-top: 39px;background: #009933;color: #fff;border-radius: 3px;">Đã duyệt</center>
	<?}else{?>
	<center style="margin-top: 39px;background: #000000;color: #fff;border-radius: 3px;">Hủy</center>
	<?}?>
	</td>
	    <td  class="td_sanpham">

		<?if($row['tinhtrang']=='1'){?>
		<?
		// Đang còn hàng..click hết hàng
if (isset($_POST['conhang'])) {
$hethangroi = $_POST['hethangroi'];
date_default_timezone_set("Asia/Ho_Chi_Minh");
	$date = date("d-m-Y H:i:s");

	{
	$sql = "update products set tinhtrang='0', date='".$date."' where id='".$hethangroi."' and user='".$_SESSION['log']."' ";
		if (mysql_query($sql)) {
			
			
			$err=" <SCRIPT LANGUAGE='JavaScript'>
 
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";
		}	
		else {
			$err =  "<SCRIPT LANGUAGE='JavaScript'>
 window.alert('Thao tác không thành công')
    window.location.href='sanpham';
    </SCRIPT>";
		}
  	}


}
		?>
		<? echo $err;?>
		<form method="POST">
		<input type="hidden" name="hethangroi" value="<? echo $row['id'];?>">
	<button type="submit" name="conhang" class="btn btn-block btn-danger btn-lg" style="border-color: #1f2680;padding: 0px 0px;font-size: 15px;margin-top: 39px;background: #1f2680;color: #fff;border-radius: 3px;">Còn hàng</button>
	</form>
	
	
	<?}else{?>
	<?
		// Đang còn hàng..click hết hàng
if (isset($_POST['conhang1'])) {
$hethangroi1 = $_POST['hethangroi1'];
date_default_timezone_set("Asia/Ho_Chi_Minh");
	$date = date("d-m-Y H:i:s");

	{
	$sql = "update products set tinhtrang='1',  date='".$date."'  where id='".$hethangroi1."' and user='".$_SESSION['log']."' ";
		if (mysql_query($sql)) {
			
			
			$err=" <SCRIPT LANGUAGE='JavaScript'>
 
     window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";
		}	
		else {
			$err =  "<SCRIPT LANGUAGE='JavaScript'>
 window.alert('Thao tác không thành công')
    window.location.href='sanpham';
    </SCRIPT>";
		}
  	}


}
		?>
		<? echo $err;?>
		<form method="POST">
		<input type="hidden" name="hethangroi1" value="<? echo $row['id'];?>">
	<button name="conhang1" type="submit" class="btn btn-block btn-danger btn-lg" style="border-color: #c5bfbf; padding: 0px 0px; font-size: 15px; margin-top: 39px; background: #c5bfbf; color: #fff; border-radius: 3px;">Hết hàng</button>
	</form>
	
	
	<?}?>
	</td>
	
    <td  class="td_sanpham" style="
    padding-top: 50px;
    font-size: 11px;
    text-align: center;
">Cập nhật cuối<br><? echo date('d/m/Y G:i:s',strtotime($row['date'])); ?></td>
   
  </tr>
  <?
              	}
  ?>
  </div>

</table>

<div style="
    padding: 12px;
    border-top: 1px solid #dfdfdf;
">Tổng sản phẩm <b><? echo mysql_num_rows(mysql_query("SELECT * FROM products where user='".$_SESSION['log']."' "));?></b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Trang :  <? echo $pageindex; ?>

</div>
<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table1">
	<tr>
		<td>
<div style="float:right; ">
		


	<button type="submit" value="Xóa" title="Xóa sản phẩm"  name="ButDel"   style="
    style=;
    float: right;
    color: #ffffff;
    font-size: 15px;
    font-weight: 600;
    text-transform: uppercase;
    text-decoration: none;
    line-height: 26px;
    margin-left: 20px;
    background: #dd4b39;
    border-radius: 4px;
    border: 1px solid #dd4b39;
    "><i class="glyphicon glyphicon-trash"></i> Xóa</button>
	
<!--button type="submit" value="UP" title="UP sản phẩm"  name="upsanpham"   style="
    float: right;
    color: #ffffff;
    font-size: 15px;
    font-weight: 600;
    text-transform: uppercase;
    text-decoration: none;
    line-height: 26px;
    margin-left: 20px;
    background: #228fca;
    border-radius: 4px;
    border: 1px solid #35b8fe;
    "><i class="fa fa-arrow-circle-up"></i> UP</button-->
	
	<a href="./add_products" title="Thêm mới"  name="themmoi"   style="
    float: right;
    color: #ffffff;
    font-size: 15px;
    font-weight: 600;
    text-transform: uppercase;
    text-decoration: none;
    line-height: 26px;
    margin-left: 20px;
    background: #56820f;
    border-radius: 4px;
    border: 1px solid #35b8fe;
    ">&nbsp;<i class="fa fa-fw fa-plus-circle"></i> Thêm mới &nbsp;</a>
	



</div>	
	</tr>
</table>
</form>
<script language="JavaScript">
function chkallClick(o) {
  	var form = document.frmList;
	for (var i = 0; i < form.elements.length; i++) {
		if (form.elements[i].type == "checkbox" && form.elements[i].name!="chkall") {
			form.elements[i].checked = document.frmList.chkall.checked;
		}
	}
}
</script>
</div></div></div>
</section>
</body>

