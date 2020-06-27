<? mysql_connect("localhost","root","vertrigo");
mysql_select_db("gianhang");?>
<?php $sql=mysql_query("SELECT * FROM user_shop where user='".$_GET['user']."'");
$row=mysql_fetch_array($sql);?>
body
{
padding: 0px;
margin: 0 auto;
FONT-FAMILY:tahoma;
background-color: #9E092F;
}
a:link
{
color:#E7E93A;
font-size:11pt;
text-decoration: none;
FONT-FAMILY:tahoma;
}
a:visited {
	COLOR: #E7E93A; font-size:10pt;FONT-FAMILY:tahoma; TEXT-DECORATION: none
}
a:active {
	COLOR: #E7E93A; FONT-FAMILY:tahoma; TEXT-DECORATION: none
}
a:hover {
	COLOR: #E7E93A; FONT-FAMILY:tahoma; TEXT-DECORATION: underline
}
#page
{
width:1007px;
height:1700px;
margin: 0 auto;
background-color: #FFFFFF;
}
#page_in
{
width:994px;
margin: 0 auto;
}
#banner
{
width:994px;
background-image: url('banner.jpg');
}
#menu_top
{
width:994px;
height:34px;
background-image: url('cat.jpg');
}
.menu_top_li
{
line-height:200%;
padding-left:20px;
background-image: url('line_menu.jpg') right center no-repeat;
display: inline;
height:34px;
color:#FFFFFF;
}
.menu_top_li a:link
{
background-image: url('line_menu.jpg') right center no-repeat;
display: inline;
height:34px;
color:#FFFFFF;
}
.menu_top_li_line
{
width:3px;
height:29px;
display: inline;
background-image: url('line_menu.jpg');
}
.space
{
height:10px;
}
#content
{
width:994px;
background-color: #FFFFFF;
}
#left
{
float:left;
width:209px;
}
#cart_home
{
width:209px;
height:100px;
color:#5E5E5E;
font-size:10pt;
line-height:22px;
background-color: #FFFFFF;
}
#category_home
{
width:209px;
background-color: #2D9001;
}
.category_title
{
padding-left:20px;
width:189px;
height:33px;
color: #FFFFFF;
line-height:200%;
background-image: url('cate.jpg');
}
#category
{
padding:0px;
margin:0px;
width:209px;
background-color: #2D9001;
}
#category ul
{
margin:0px;
padding: 0px;
width:201px;
list-style:none;
color:#E7E93A;
}
#category ul li
{
padding-left:35px;
width:173px;
height:37px;
list-style:none;
display: block;
color:#E7E93A;
background-image: url('bg_tieude.jpg');
line-height:200%;
}
#category ul li a:link
{
width:161px;
height:31px;
list-style:none;
display: block;
color:#E7E93A;
text-decoration: none;
}
#category_hotro
{
width:209px;
background-color: #2D9001;
}
.category_title
{
padding-left:20px;
width:189px;
height:33px;
color: #FFFFFF;
line-height:200%;
background-image: url('cate.jpg');
}
#div_hotro
{
padding:0px;
margin:0px;
width:207px;
border:1px solid #C0C0C0;
border-top:0px;
background-color: #FFFFFF;
color:#383838;
font-size:10pt;
}
#category_thongke
{
width:209px;
background-color: #2D9001;
}
#div_thongke
{
padding:0px;
margin:0px;
width:207px;
border:1px solid #C0C0C0;
border-top:0px;
background-color: #FFFFFF;
color:#383838;
font-size:10pt;
}
#category_quangcao
{
width:209px;
background-color: #2D9001;
}
#div_quangcao
{
padding:0px;
margin:0px;
width:207px;
border:1px solid #C0C0C0;
background-color: #FFFFFF;
color:#383838;
font-size:10pt;
}
#timkiem
{
padding:10px;
width:189px;
height:50px;
background-color: #599D0A;
line-height:10px;
}
#input_timkiem
{
width:190px;
height:20px;
border:0px;
}
#button_search
{
cursor: pointer;
background-color: transparent;
border:0px;
color:#FFFFFF;
}
#left_du
{
width:209px;
}
#right
{
float:right;
width:781px;
}
#slider_show
{
width:781px;
height:289px;
}
#pro_home
{
width:781px;
}
.space_home_pro
{
height:15px;
}
.space_home_pro1
{
height:10px;
}
.space_home_pro2
{
height:10px;
}
#footer
{
padding-top:30px;
text-align: center;
width:994px;
height:117px;
background-image: url('footer.jpg');
clear:both;
}