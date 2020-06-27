<?php

if(!$_GET["p"]){
    header("Location: ?home=products&p=1");
}

$id = $_GET["p"]; //ID OF THE CONTENT

?>
<script>
$(function(){
    $("#submit").click(function(){
        var n = unescape($('#n').val());
        var u = unescape($('#u').val());
        var c = unescape($('#c').val());
		var r = unescape($('#r').val());
        var user = unescape($('#user').val());
        var data = 'n='+n+'&u='+u+'&c='+c+'&r='+r+'&user='+user+'&p=<?php echo $id; ?>';

        $.ajax({
            type: 'POST',
            url: 'class/comment/post-comment.php',
            data: data,
            success: function(e){
                if(e){
                    if(!$('#error').is(':visible')){
                        $("#error").html(e).fadeIn(500).delay(2000).fadeOut(500);
                    }
                } else {
                    if(!$('#posted').is(':visible')){
                        $("#posted").html("Gửi nhận xét thành công").fadeIn(500).delay(2000).fadeOut(500);
                    }
                    $.get('class/comment/view-comments.php?p=<?php echo $id; ?>', function(d){
                        $("#comment_posts").html(d);
                    });
                    $('#n, #u, #c, #r, #user').val('');
                }
            }
        });
    });

    $(".page").live("click", function(){
        var id = $(this).attr("id");
        $.get('class/comment/view-comments.php?p=<?php echo $id; ?>&page='+id, function(d){
            $("#comment_posts").html(d);
        });
    });
    $('.comments').live("mouseover", function(){
        var id = $(this).attr("id").substr(1);
            $("#d"+id).show();
    }).live("mouseout", function(){
        var id = $(this).attr("id").substr(1);
        $("#d"+id).hide();
    });
    $('.trash').live("click", function(){
        var id = $(this).attr("id").substr(1);
        var data = 'comment_id='+id;

        $.ajax({
            type: 'POST',
            url: 'delete-comment.php',
            data: data,
            success: function(e){
                if(e){
                    $("#error").html(e).fadeIn(500).delay(2000).fadeOut(500);
                } else {
                    if(!$('#posted').is(':visible')){
                        $("#posted").html("Comment deleted").fadeIn(500).delay(2000).fadeOut(500);
                    }
                }
                $.get('view-comments.php?p=<?php echo $id; ?>', function(d){
                    $("#comment_posts").html(d);
                });
            }
        });
    });
});
</script>
<style>
#error {
color: #ed3232; display: none; font-size: 14px;
} #posted {
color: #32baed; display: none; font-size: 14px;
} table.comments {
border-bottom: 1px #ef89ff dotted; position: relative; width: 100%;
} table.comments:first-child {
border-top: 0px #ef89ff solid;
} .page:hover {
cursor: pointer; text-decoration: underline;
} .trash {
display: none; position: absolute; right: 3px; bottom: 15px; width: 15px;
} .p {
background: #32baed;
} #tip {
height: 1px; left: 6px; position: absolute; top: -1px; width: 3px;
} #top {
height: 2px; width: 15px;
} #p1 {
height: 8px; left: 3px; position: absolute; -webkit-transform: rotate(355deg); top: 2px; width: 1px;
} #p2 {
height: 8px; left: 7px; position: absolute; top: 2px; width: 1px;
} #p3 {
height: 8px; right: 3px; position: absolute; -webkit-transform: rotate(5deg); top: 2px; width: 1px;
} #bottom {
top: 10px; height: 2px; left: 3px; position: absolute; width: 9px;
}
#comment_content
{
margin: 0 auto;
width:100%;
}
#comment_posts
{
margin: 0 auto;
width:780px;
}
#khoangtrang
{
height:20px;
}
#u,#n
{
width:294px; 
border:1px solid #C0C0C0; 
color:#B7B4B1"
}
#c
{
width:600px;
height:100px;
border:1px solid #C0C0C0; 
color:#B7B4B1
}
.send_comment
{
    width: 90px;
    height:25px;
    cursor: pointer;
}
.button_eva {
    background-color: #C10E0A;
    border: 1px solid #C10E0A;
    border-radius: 5px 5px 5px 5px;
    color: #FFFFFF;
    cursor: pointer;
    font-family: Tahoma,Verdana,Serif;
    font-size: 12px;
    font-weight: bold;
    padding: 3px;
}
</style>
<div style="margin: 0 auto; width:100%;">
<div>
<form action="">
<table cellspacing="4" cellpadding="0" style="padding:10px;height:100%; width:100%;">
						<tbody><tr>
			<td colspan="2"></td>
			</tr>
            <tr>
			<td style="width: 30%;"><img border="0" src="images/comment.jpg">Gửi bình luận của bạn</td>
			<td></td>
			</tr>
            <tr>
			<td>
            <input id="user" type="hidden" value="<?echo $row_user['user'];?>">
            <input id="n" placeholder="Tên.." value="<?php echo $_SESSION['log'];?>">
            </td>
			<td>
            <input id="u" placeholder="Email.." value="<?php echo $_SESSION['email'];?>">
            </td>
			</tr>
            <tr><td height="30"><input type="hidden" value="691823" name="secucode">
            <b>Đánh giá sản phẩm</b></td>
			<td>
            <select name="r" id="r">
<option value="1">1 sao</option>
<option value="2">2 sao</option>
<option value="3">3 sao</option>
<option value="4">4 sao</option>
<option value="5">5 sao</option>
</select>
            </td>
			</tr>
            <tr>
            <td colspan="2">
            <textarea id="c" placeholder="Nội dung..."></textarea>
			</td></tr>
            <tr><td height="30" colspan="2">
            <input id="submit" class="button_eva" type="button" value="Gửi nhận xét">
			<input type="reset" value="Nhập lại" name="reset" class="button_eva">
			</td></tr>
<tr>
<td colspan="2">
<div style="padding:5px">
<span id="error"></span>
<span id="posted"></span>
</div>
</td>
</tr>
</tbody></table>
</form>
</div>
<div id="comment_content">
<div id="khoangtrang"></div>
<div>
<?php
$sql_con=@mysql_query("SELECT * FROM comment where id='".$id."' ");
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
<div style="margin: 0 auto;width:90%">
<div style="float: left;font-size:16px;font-weight:bold;color:#B02F0F;line-height: 27px;">Bình luận</div>
<div style="float: left;padding-left:10px;font-size:18px;font-weight:bold;color:#6D6D6D;">
(<?php echo $tong_con;?>) </div>
</div>
<div style="float: left;padding-left:10px;font-size:13px;font-weight:bold;color:#C0C0C0;line-height: 27px;">
Điểm: <?echo $tongcong;?> / Trung bình: <?echo round($trungbinh,2);?>
</div>
<div style="margin: 0 auto;width: 95%;height:2px;background-color: #C0C0C0;clear:both"></div>
</div>
<div id="khoangtrang"></div>
<div id="comment_posts">
<?php
include "view-comments.php";
?>
</div>
<div id="khoangtrang"></div>
</div>
</div>