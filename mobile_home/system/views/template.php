<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="mobile_home/template/js/load_tem.js"></script>
<div id="wrapper">
            <script type="text/javascript">
    $(function () {
        $($(".skins-by-category")[0]).removeClass("hidden1").addClass("show");

        addSwiperWidget();
    });

    function addSwiperWidget() {
        var mySwiper = new Swiper('.swiper-container', {
            loop: true,
            grabCursor: true,
            onSlideChangeEnd: (function (swiper, direction) {
                var currentIconChoosePos = $(".icon-container").find(".swiper-slide-active").attr("pos");

                showSkinByPosition(currentIconChoosePos);
            })
        })

        $('.arrow-left').on('click', function (e) {
            e.preventDefault()
            mySwiper.swipePrev()
        });

        $('.arrow-right').on('click', function (e) {
            e.preventDefault()
            mySwiper.swipeNext()
        });
    }

    function showSkinByPosition(position) {
        hideCurrentTitle();

        shownTitleByPosition(position);

        hideCurrentSkinCategory();

        shownSkinCategoryByPosition(position);

        return false;
    }

    function hideCurrentTitle() {
        var currentDesc = $("#title-container div.show");
        $(currentDesc).fadeOut(150);
        $(currentDesc).removeClass("show").addClass("hidden1");
    }

    function hideCurrentSkinCategory() {
        var currentCategory = $("#category-container div.show");
        $(currentCategory).fadeOut(150);
        $(currentCategory).removeClass("show").addClass("hidden1");
    }

    function shownTitleByPosition(position) {
        var nextDesc = $("#title_" + position);
        $(nextDesc).fadeIn(300);
        $(nextDesc).removeClass("hidden1").addClass("show");
    }

    function shownSkinCategoryByPosition(position) {
        var nextCategory = $("#skincategory_" + position);
        $(nextCategory).fadeIn(300);
        $(nextCategory).removeClass("hidden1").addClass("show");
    } 
</script>
<?
$uri=$_SERVER['REQUEST_URI'];
$url = explode("&", $uri);
$row=24;
$MAXPAGE=10;
$name=$_GET['name'];
$p=0;
if ($_REQUEST['p']!='') $p=$_REQUEST['p'];
$sql = "select * from template order by id desc limit ".$row*$p.",".$row;
$result = @mysql_query($sql,$con);
$total=CountRecord("template");
?>
<div id="index-skins">
    <div class="div-title">
        <h1 class="h3-tittle-uppercase"><?php echo $total;?> mẫu giao diện website bán hàng cực đẹp và miễn phí Thay đổi dễ dàng để thiết kế theo phong cách riêng của bạn</h1>
    </div>
    <div class="skins-home-items">
        <div class="icon-container">
            <a class="arrow-left">
                <img src="mobile_home/template/images/left_arrow_dark.png" alt="">
            </a>
            <a class="arrow-right">
                <img src="mobile_home/template/images/right_arrow_dark.png" alt="">
            </a>
            <div class="swiper-container" style="cursor: -webkit-grab;">
                <div class="swiper-wrapper" style="width: 13170px; height: 55px; transform: translate3d(-2634px, 0px, 0px); -webkit-transform: translate3d(-2634px, 0px, 0px); transition-duration: 0.3s; -webkit-transition-duration: 0.3s;">
<?php
$sql_t1=mysql_query("SELECT * FROM template order by id DESC");
$toalt1=mysql_num_rows($sql_t1);
$tong1=$toalt1/6;
for($i=0;$i<=$tong1&&$row_t1=mysql_fetch_array($sql_t1);$i++)
{?>
                    <div class="swiper-slide" pos="<?php echo $i;?>" style="width: 1317px; height: 55px;">
                        <div class="group-content">
                            <div class="group-icon">
                                <img src="mobile_home/template/images/next_tem.png" alt="">
                            </div>
                        </div>
                    </div>
<?}?> 
                    </div>
            </div>
        </div>
        <div id="title-container" class="group">
            <div class="group-content">
                <div class="group-desc">
<?php
$sql_t2=mysql_query("SELECT * FROM template order by id DESC");
$toalt2=mysql_num_rows($sql_t2);
$tong2=$toalt2/6;
for($j=0;$j<=$tong2&&$row_t2=mysql_fetch_array($sql_t2);$j++)
{?>
                    <div id="title_<?php echo $j;?>" class="desc-item hidden" style="display: none;">
                        <div class="tittle">
                            Trang <?php echo $j;?>
                        </div>
                    </div>
<?}?>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <div id="category-container">
<?php
$sql_t3=mysql_query("SELECT * FROM template order by id DESC");
$toalt3=mysql_num_rows($sql_t3);
$tong3=$toalt3/6;
for($k=0;$k<=$tong3;$k++)
{?>
                <div id="skincategory_<?php echo $k;?>" class="skins-by-category hidden1">
<?php
for($l=0;$l<=5&&$row_t3=mysql_fetch_array($sql_t3);$l++)
{?>
                        <div class="skins-item">
                            <div class="skins-item-thumbnail">
                                <a href="<?php echo $row_t3['demo'];?>">
                                    <img class="autoresize-image" src="<?php echo $row_t3['image'];?>" alt="<?php echo $row_t3['name'];?>">
                                </a>
                            </div>
                            <div class="skins-item-title">
                                <h3><?php echo $row_t3['name'];?></h3>
                                <br>
                                <div class="registration-button">
                                    <a class="orange-registration-button" href="./?home=regestry&confim=confim&id=<?php echo $row_t3['id'];?>" title="Đăng ký dùng thử website miễn phí">
                                        Dùng ngay
                                    </a>
                                </div>
                            </div>
                        </div>
<?}?>
               </div>
<?}?> 
        </div>
        <div class="clear"></div>
    </div>
</div>

        </div>