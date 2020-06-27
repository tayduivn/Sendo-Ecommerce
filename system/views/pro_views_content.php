<style type="text/css">

	ul.tabs {
		margin: 0;
		padding: 0;
        *padding-left: 10px;
		float: left;
		list-style: none;
		height: 38px;
		width: 100%;
        background-color: #f7f7f7;
		    border-bottom: 1px solid #d3d3d3;
	}
	ul.tabs li {
float: left;
    /* margin-top: 0px; */
    /* cursor: pointer; */
    padding: 0px 21px;
    height: 35px;
    line-height: 31px;
    font-weight: bold;
    font-size: 13px;
    color: #333333;
    overflow: hidden;
    position: relative;
	}
	ul.tabs li:hover {
		color: red;

	}	
	ul.tabs li.active{
background: #f51212;
    border-top: 2px solid #4CAF50;
    border-left: 1px solid #ddd;
    border-right: 1px solid #ddd;
    border-bottom: 1px solid #FFFFFF;
    color: #fff;
	}
	.tab_container {
		border: 1px solid #E9E9E9;
		border-top: none;
		clear: both;
		float: left; 
		width: 100%;
		background: #FFFFFF;
	}
	.tab_content {
		padding: 20px;
		display: none;
	}
 
</style>
<ul  class="tabs"> 

        <a href="java:"><li  class="active" rel="tab1"> Thông tin chi tiết</li></a>
	


	
    </ul>

<div class="tab_container"> 

     <div id="tab1" class="tab_content">  
     <?php echo $row_pro['content'];?>
	    <?include("system/comment/view.php");?>
		<?include("system/comment/view1.php");?>
     </div><!-- #tab2 -->
	 <div id="tab2" class="tab_content">  
<table id="AutoNumber1" width="100%" cellpadding="2" bordercolor="#EDEDED" border="1" style="border-collapse: collapse">
<?
$sql_op=mysql_query("SELECT * FROM option_home where cat_id='".$row['cat']."'");
foreach($option as $a)
{
$row_op=mysql_fetch_assoc($sql_op);
?>
<tr>
<td align="right" style="width:140px;padding-right:20px"><?php echo $row_op['name'];?></td>
<td><?echo $a;?> <?php echo $row_op['doituong'];?></td>
</tr>
<?}?>
</table>
     </div>
	 <!-- #tab3 -->
	 <div id="tab3" class="tab_content">  
     <?include("system/views/pro_compase.php");?>
    
	</div>
	<!--div id="pro_views_right_comment">
<div class="fb-comments" data-href="http://<?php echo $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];?>" data-width="100%" data-num-posts="10"></div>
</div--> 
	 <!--pro views pro comment-->

	 <!-- #tab4 -->
     <div id="tab4" class="tab_content"> 
     <?include("system/comment/view.php");?>
     </div>
     
 </div> <!-- .tab_container --> 
<script type="text/javascript">

$(document).ready(function() {

	$(".tab_content").hide();
	$(".tab_content:first").show(); 

	$("ul.tabs li").click(function() {
		$("ul.tabs li").removeClass("active");
		$(this).addClass("active");
		$(".tab_content").hide();
		var activeTab = $(this).attr("rel"); 
		$("#"+activeTab).fadeIn(); 
	});
});

</script> 

