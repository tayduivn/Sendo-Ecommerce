       	    <div class="d-categories" id="d-categories">
            	    <div class="d-cate-list">
                     
<div id="ctl00_MainContent_leftcategory" class="d-top-content-left">   
<div class="products-side-bar">
<h3><a href="java:" style="color: #fff;">Danh mục sản phẩm</a></h3>
					<ul id="nav-top9999" class="nav-main for-home" style=" ">
					 
<?php
$sql_cat_home=mysql_query("SELECT * FROM cat where parent=17 order by thutu ASC");
while($row_cat_home=mysql_fetch_array($sql_cat_home))
{?>
						<li id="" class="menuItem sale-off <?php echo $row_cat_home['style'];?>"><a class="navlink" href="./<?php echo doidau(mb_strtolower($row_cat_home['name'],"UTF8"));?>-ct-<?php echo $row_cat_home['id'];?>.html"><span><?php echo $row_cat_home['name'];?></span></a>
										<!--<ul class="sub" style="display:none;">
										</ul>-->
				<div class="sub-cate box-nav-hover" style="background:url('<?php echo $row_cat_home['image_menu'];?>') #fff no-repeat right bottom;">
<?php
$sql_cat_home1=mysql_query("SELECT * FROM cat where parent='".$row_cat_home['id']."' order by thutu ASC");
while($row_cat_home1=mysql_fetch_array($sql_cat_home1))
{?>
											<ul class="drop-list-item">
											<li>
												<a class="lstitle" href="./<?php echo doidau(mb_strtolower($row_cat_home1['name'],"UTF8"));?>-ct-<?php echo $row_cat_home1['id'];?>.html"><?php echo $row_cat_home1['name'];?></a>
											</li>
<?php
$sql_cat_home2=mysql_query("SELECT * FROM cat where parent='".$row_cat_home1['id']."' order by thutu ASC");
while($row_cat_home2=mysql_fetch_array($sql_cat_home2))
{?>
													<li>
														<a href="./<?php echo doidau(mb_strtolower($row_cat_home2['name'],"UTF8"));?>-ct-<?php echo $row_cat_home2['id'];?>.html"><?php echo $row_cat_home2['name'];?></a>
													</li>
<?}?>
											</ul>
<?}?>
														
				</div>
									</li>
<?}?>
				</ul>
		</div>
</div>
<div id="shadow" class="popup_login" ></div>
                    </div>   


					
                </div>
				