
<?
echo $_SESSION["session_message"];
$_SESSION["session_message"] = "";
$MAXPAGE=10;
?>
<?
	$page = $_GET["page"];
	$p=0;
	if ($page!='') $p=$page;
	$where="1=1";
	//if ($_REQUEST['status']!='') $where="products_status=".$_REQUEST['status']." ";
	if ($_REQUEST['cat']!='') $where="company_cat=".$_REQUEST['cat'];
?>
<?
function taotrang($total,$link,$nitem,$itemcurrent,$step=5)
{	global $con;
	$ret="";
	
	$param="";
	$pages=count_page($total,$nitem);
	if ($itemcurrent>0) $ret.='<a title="&#272;&#7847;u tiên" href="'.$link.'0" class="button_link" style="
    padding: 1px 7px;
    background-color: #fff;
    text-decoration: none;
    color: #555555;
    border: 1px solid #626161;
    margin-right: 8px;
">Đầu tiên</a> ';
	if ($itemcurrent>1) $ret.='<a title="V&#7873; tr&#432;&#7899;c" href="'.$link.($itemcurrent-1).'" class="button_link" style="
    padding: 1px 7px;
    background-color: #fff;
    text-decoration: none;
    color: #555555;
    border: 1px solid #626161;
    margin-right: 8px;
">Trang trước</a> ';
	$from=($itemcurrent-$step>0?$itemcurrent-$step:0);
	$to=($itemcurrent+$step<$pages?$itemcurrent+$step:$pages);
	for ($i=$from;$i<$to;$i++)
	{
		if ($i!=$itemcurrent) $ret.='<a href="'.$link.$i.'" class="button_link" style="
    padding: 1px 7px;
    background-color: #fff;
    text-decoration: none;
    color: #555555;
    border: 1px solid #626161;
    margin-right: 8px;
">'.($i+1).'</a> ';
		else $ret.='<a class="active" style="
    padding: 1px 7px;
    background-color: #0d84e8;
    text-decoration: none;
    color: #FFFFFF;
    border: 1px solid #626161;
    margin-right: 7px;
">'.($i+1).'</a> ';
	}
	if (($itemcurrent<$pages-2) && ($pages>1)) $ret.='<a class="button_link" style="
    padding: 1px 7px;
    background-color: #fff;
    text-decoration: none;
    color: #555555;
    border: 1px solid #626161;
    margin-right: 8px;
" title="Ti&#7871;p theo" href="'.$link.($itemcurrent+1).'">Tiếp theo</a> ';
	if ($itemcurrent<$pages-1) $ret.='<a class="button_link" style="
    padding: 1px 7px;
    background-color: #fff;
    text-decoration: none;
    color: #555555;
    border: 1px solid #626161;
    margin-right: 8px;
" title="Cu&#7889;i cùng" href="'.$link.($pages-1).'">Cuối cùng</a>'; 
	return $ret;
}
?>

<?if($_REQUEST['cat']=='')
{?>
<?
	$pageindex=taotrang(CountRecord("thongbao_shop",$where),"index.php?act=ykien&page=",$MAXPAGE,$page);
?>
<?}else{?>
<?
	$pageindex=taotrang(CountRecord("thongbao_shop",$where),"index.php?act=ykien&page=".$_REQUEST['cat']."/",$MAXPAGE,$page);
?>
<?}?>
<section class="content-header" style="margin-bottom: 10px;">
      <h1>
        Thông báo
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a>Thông báo</a></li>
      </ol>
    </section>
<section class="content">

      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Thông báo</h3>
<tr>
<td class="smallfont" > <? echo $pageindex; ?></td>

	
</tr>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
						  <?
if (isset($_POST['danhdau_sub_all'])) {
	$danhdau_daxem = $_POST['danhdau_daxem'];
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	$date = date("d-m-Y H:i:s");

	{
	$sql = "update thongbao_shop set active='1'  where   user='".$_SESSION['log']."' ";
		if (mysql_query($sql) ) {
			
			$err=" <SCRIPT LANGUAGE='JavaScript'>

	window.location.href='lienhe';
 
    </SCRIPT>";
		}	
		else {
			$err =  "<p align=center class='err'><SCRIPT LANGUAGE='JavaScript'>
window.alert('Không thành công vui lòng liên hệ trợ giúp')
 window.location.href='lienhe';
    </SCRIPT></p>";
		}
  	}


}


 
?>
<? echo $err;?>
				  <form  method="POST">
				  <input name="danhdau_daxem" type="hidden" value="<?php echo $row['id'];?>" >
 
 <button type="submit" name="danhdau_sub_all" class="btn btn-block btn-danger">Đánh dấu đã xem tất cả</button>
 </b>		
				
             
			  
			  
                </div>
              </div>
			  
			  
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th width="110px">Thời gian</th>
                  <th width="100px">Tình trạng</th>
                  <th>Nội dung</th>
                </tr>
				  <?php
				  
           	$sql="select * from thongbao_shop where user='".$_SESSION['log']."' order by id desc limit ".($p*$MAXPAGE).",".$MAXPAGE;
        	$result=mysql_query($sql);
        	$i=0;
           	while(($row=mysql_fetch_array($result)))
			{
			$i++;
			if ($i%2) $color="#d5d5d5"; else $color="#e5e5e5";
		

  ?>
                <tr>
                  <td><?php echo $row['id'];?></td>
                  <td><?php echo $row['date'];?></td>
                  <td>
				  <?
if (isset($_POST['danhdau_sub'])) {
	$danhdau_daxem = $_POST['danhdau_daxem'];
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	$date = date("d-m-Y H:i:s");

	{
	$sql = "update thongbao_shop set active='1'  where id='".$danhdau_daxem."' and   user='".$_SESSION['log']."' ";
		if (mysql_query($sql) ) {
			
			$err=" <SCRIPT LANGUAGE='JavaScript'>

	window.location.href='lienhe';
 
    </SCRIPT>";
		}	
		else {
			$err =  "<p align=center class='err'><SCRIPT LANGUAGE='JavaScript'>
window.alert('Không thành công vui lòng liên hệ trợ giúp')
 window.location.href='lienhe';
    </SCRIPT></p>";
		}
  	}


}


if (isset($_POST['danhdau_sub_all'])) {
	$danhdau_daxem = $_POST['danhdau_daxem'];
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	$date = date("d-m-Y H:i:s");

	{
	$sql = "update thongbao_shop set active='1'  where id='".$danhdau_daxem."' and user='".$_SESSION['log']."' ";
		if (mysql_query($sql) ) {
			
			$err=" <SCRIPT LANGUAGE='JavaScript'>

	window.location.href='lienhe';
 
    </SCRIPT>";
		}	
		else {
			$err =  "<p align=center class='err'><SCRIPT LANGUAGE='JavaScript'>
window.alert('Không thành công vui lòng liên hệ trợ giúp')
 window.location.href='lienhe';
    </SCRIPT></p>";
		}
  	}


}
?>
<? echo $err;?>
				  <form  method="POST">
				  <input name="danhdau_daxem" type="hidden" value="<?php echo $row['id'];?>" >
				  <?php if($row['active']=='0')
{?>
<button type="submit" name="danhdau_sub" class="btn btn-block btn-danger">Đánh dấu đã xem</button>
<?}else{?>
	 <button type="button" class="btn btn-block btn-success">Đã xem</button>
<?}?></b>
				 
				 
			
				 </form>
				  
				  </td>
                  <td><?php echo $row['thongbao'];?></td>
                </tr>
      <?
              	}
  ?>          
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>