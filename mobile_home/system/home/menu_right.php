<div id="right_menu">
<ul id="right_content">
<?php if($_SESSION['mem']=='')
{?>
<li class="r_user menu_parent">
<a   onclick="document.getElementById('myModal_reg').style.display='block'" title="Đăng ký" data-ptsp-kpi-action-name="Navigation" data-ptsp-kpi-action-label="Menu phải/Đăng ký"><span class="icon"><i class="vcon-user"></i></span> Đăng ký</a>
</li>
<li class="r_user menu_parent">
<a   onclick="document.getElementById('myModal').style.display='block'" title="Đăng nhập" data-ptsp-kpi-action-name="Navigation" data-ptsp-kpi-action-label="Menu phải/Đăng nhập"><span class="icon"><i class="vcon-user"></i></span> Đăng nhập</a>

</li>
<?}else{?>




<li class="r_user menu_parent">
<a   title="Đăng ky" ><i style="font-size: 22px;" class="fa fa-fw fa-user"></i>Xin chào <b style=" color: red; "><? echo $_SESSION['mem'];?></b></a>
</li>
<li class="r_user menu_parent">
<a href="./?home=quanlydonhang"  ><i style="font-size: 22px;" class="fa fa-fw fa fa-tags"></i>Quản lý đơn hàng</b></a>
</li>
<li class="r_user menu_parent">
<a href="./?home=thongtintaikhoan"  ><i style="font-size: 22px;" class="fa fa-fw fa fa-edit"></i>Thông tin tài khoản</b></a>
</li>
<li class="r_user menu_parent">
<a href="./?home=doimatkhau"  ><i style="font-size: 22px;" class="fa fa-fw fa  fa-eyedropper"></i>Đổi mật khẩu</b></a>
</li>
<li class="r_user menu_parent">
<a onclick="document.getElementById('myModal_vidiemlua').style.display='block'"  ><i style="font-size: 22px;" class="fa fa-fw fa fa-money"></i> Ví điểm Lửa</b></a>
</li>
 

<li class="r_user menu_parent">
<a href="logout.php" title="Đăng ky"><i style="font-size: 22px;" class="fa fa-fw fa fa-sign-out"></i>Thoát</b></a>
</li>
<?}?>






 
</ul>
</div>