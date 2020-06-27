<div>
<div class="cat_adv">
<h3>Trung tâm trợ giúp</h3>
</div>
<div id="sub_cat_content">
<style type="text/css">

.sidebarmenu ul{
margin: 0;
padding: 0;
list-style-type: none;
font: bold 13px Verdana;
width: 198px; /* Main Menu Item widths */
border:1px solid #ddd;
border-top:0px;
background: url('images/bg_ul_cat_adv.png');
}
 
.sidebarmenu ul li{
padding-top:2px;
padding-bottom:2px;
position: relative;
background-image:url('images/icon_sub.png');
background-repeat:no-repeat;
}

/* Top level menu links style */
.sidebarmenu ul li a{
display: block;
overflow: auto; /*force hasLayout in IE7 */
color: #565656;
text-decoration: none;
padding-top: 4px;
padding-bottom: 4px;
padding-left: 20px;
}

.sidebarmenu ul li a:link, .sidebarmenu ul li a:visited, .sidebarmenu ul li a:active{
background: url(images/arrow_on.png) no-repeat 97% 50%; /*background of tabs (default state)*/
}

.sidebarmenu ul li a:visited{
color: #565656;
}

.sidebarmenu ul li a:hover{
color:#ED3237
}

/*Sub level menu items */
.sidebarmenu ul li ul{
position: absolute;
width: 170px; /*Sub Menu Items width */
top: 0;
visibility: hidden;
border:0px;
background-color: #F5F5F5;
}

.sidebarmenu a.subfolderstyle{
background: url(images/arrow_on.png) no-repeat 97% 50%;
}

 
/* Holly Hack for IE \*/
* html .sidebarmenu ul li { float: left; height: 1%; }
* html .sidebarmenu ul li a { height: 1%; }
/* End */

</style>

<script type="text/javascript">

//Nested Side Bar Menu (Mar 20th, 09)
//By Dynamic Drive: http://www.dynamicdrive.com/style/

var menuids=["sidebarmenu1"] //Enter id(s) of each Side Bar Menu's main UL, separated by commas

function initsidebarmenu(){
for (var i=0; i<menuids.length; i++){
  var ultags=document.getElementById(menuids[i]).getElementsByTagName("ul")
    for (var t=0; t<ultags.length; t++){
    ultags[t].parentNode.getElementsByTagName("a")[0].className+=" subfolderstyle"
  if (ultags[t].parentNode.parentNode.id==menuids[i]) //if this is a first level submenu
   ultags[t].style.left=ultags[t].parentNode.offsetWidth+"px" //dynamically position first level submenus to be width of main menu item
  else //else if this is a sub level submenu (ul)
    ultags[t].style.left=ultags[t-1].getElementsByTagName("a")[0].offsetWidth+"px" //position menu to the right of menu item that activated it
    ultags[t].parentNode.onmouseover=function(){
    this.getElementsByTagName("ul")[0].style.display="block"
    }
    ultags[t].parentNode.onmouseout=function(){
    this.getElementsByTagName("ul")[0].style.display="none"
    }
    }
  for (var t=ultags.length-1; t>-1; t--){ //loop through all sub menus again, and use "display:none" to hide menus (to prevent possible page scrollbars
  ultags[t].style.visibility="visible"
  ultags[t].style.display="none"
  }
  }
}

if (window.addEventListener)
window.addEventListener("load", initsidebarmenu, false)
else if (window.attachEvent)
window.attachEvent("onload", initsidebarmenu)

</script>
<div class="sidebarmenu">
<ul id="sidebarmenu1">
<?php
$sql_cat1=@mysql_query("SELECT * FROM help_cat where parent=0 order by thutu ASC");
while($row_cat1=@mysql_fetch_array($sql_cat1))
{?>
<li><a href="./?home=help&act=cat&cat=<?php echo $row_cat1['id'];?>"><?php echo $row_cat1['name'];?></a>
<?php $sql_cat2=@mysql_query("SELECT * FROM help_cat where parent='".$row_cat1['id']."' order by thutu ASC");
$toalt_sub2=mysql_num_rows($sql_cat2);
?>
<?php if($toalt_sub2=='0')
{?>
<?}else{?>
  <ul>
<?php
while($row_cat2=@mysql_fetch_array($sql_cat2))
{?>
  <li><a href="./?home=help&act=cat&cat=<?php echo $row_cat2['id'];?>"><?php echo $row_cat2['name'];?></a></li>
<?}?>
  </ul>
  <?}?>
</li>
<?}?>
</ul>
</div>
</div>
</div>