<? $sql_mem=mysql_query("SELECT * FROM thanhvien where user='".$_SESSION['mem']."' ");
$row_mem=mysql_fetch_assoc($sql_mem);?>
<div class="cat_member">
Quản lý giao dịch
</div>
<div class="box_member">
<ul>
<li>
<a href="./quan-ly-don-hang.html"><i class="fa fa-tags"  ></i> Quản lý đơn hàng</a>
</li>
<!--li>
<a href="./?home=member&act=change_account"><i class="fa  fa-bank" ></i> Tài khoản ngân hàng</a>
</li-->
<li>
<a href="./thongbao.html"><i class="fa fa-bell-o"></i> Thông báo <span style=" color: red; ">(<? echo mysql_num_rows(mysql_query("SELECT * FROM thongbao where user='".$_SESSION['mem']."' and active=0 "));?>)</span></a>
</li>
<li style="
    border-bottom: 0px solid #C0C0C0;

">
<a href="./yeuthich.html"><i class="fa fa-heart"></i> Sản phẩm yêu thích <span style=" color: red; ">(<? echo mysql_num_rows(mysql_query("SELECT * FROM po_tick where user='".$_SESSION['mem']."' "));?>)</span></a>
</li>

</ul>
</div>

<div class="cat_member">
Quản lý tài khoản
</div>
<div class="box_member">
<ul>

<li>
<a href="./thong-tin-tai-khoan.html"><i class="fa fa-edit" ></i> Thông tin tài khoản</a>
</li>
<li>
<a href="./change_pass.html"><i class="fa  fa-eyedropper" ></i> Đổi mật khẩu</a>
</li>
<li>
<a href="./vi-diem-lua.html"><i class="fa fa-money"></i> Ví điểm Lửa <span style="color: red;" class="glyphicon glyphicon-fire"></span></a>
</li>
<!--li>
<a href="./?home=member&act=change_account"><i class="fa fa-envelope-o"></i> Hộp thư</a>
</li-->
<li>
<a href="./shop-yeu-thich.html"><i class="fa fa-check-circle"></i> Shop yêu thích <span style=" color: red; ">(<? echo mysql_num_rows(mysql_query("SELECT * FROM po_tick_shop where user='".$_SESSION['mem']."' "));?>)</span></a>
</li>
<li style="border-bottom: 0px solid #ddd;">
<a   href="./?home=member&act=hoidap"><i class="fa fa-fw fa-recycle"></i></i> Hỏi đáp <span style=" color: red; ">(<? echo mysql_num_rows(mysql_query("SELECT * FROM comment_hoidap where username='".$_SESSION['mem']."' and comment_traloi='' "));?>)</span></a>
</li>





</div>