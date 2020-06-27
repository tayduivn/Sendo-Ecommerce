<link href="css/style_proview.css" media="screen" rel="stylesheet" />
<div style="padding: 3px;padding-left:10px;height: 20px;background-color: #f3f1f2;">
<div style="float: left;margin-top: -3px;"><a href="./index.html"><img src="images/home.jpg" height="25"></a></div>
<div class="pro_views_icon_cat_pro">Trang chủ &nbsp;  ></div>
<div class="pro_views_icon_cat_pro">Trang thành viên &nbsp;  ></div>
<div class="pro_views_icon_cat_pro">
<?php if($_REQUEST['act']=='pro_tick'){?>
Sản phẩm đánh dấu
<?}elseif($_REQUEST['act']=='change_account'){?>
Thay đổi thông tin tài khoản
<?}elseif($_REQUEST['act']=='quanlydonhang'){?>
Quản lý đơn hàng
<?}elseif($_REQUEST['act']=='change_pass'){?>
Thay đổi mật khẩu
<?}else{?>
Thông tin tài khoản
<?}?>
</div>
</div>