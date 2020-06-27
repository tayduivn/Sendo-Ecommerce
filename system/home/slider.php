        	<div id="ctl00_MainContent_advertmiddle" class="d-mid-banner">

            
<div class="jcarousel" id="wrapper1" data-jcarousel="true" data-jcarouselautoscroll="flash">
    <ul >
    <?php $sql_slider=@mysql_query("SELECT * FROM slider_show_home order by thutu DESC");
        while($row_slider=@mysql_fetch_array($sql_slider))
        {?>   
    <li><a href="<?php echo $row_slider['link'];?>" title="<?php echo $row_slider['name'];?>"><img src="<?php echo $row_slider['image'];?>" width="580" height="300" alt="<?php echo $row_slider['name'];?>"></a></li>
    <?}?>
    </ul>
</div>    
<a href="#" class="jcarousel-control-prev" data-jcarouselcontrol="true">‹</a>
<a href="#" class="jcarousel-control-next" data-jcarouselcontrol="true">›</a>
<p class="jcarousel-pagination" data-jcarouselpagination="true"><a href="#1">1</a><a href="#2" class="active">2</a></p>
<script type="text/javascript">
    $(document).ready(function () {
        // Init heartbanner
        $('#wrapper1').jcarousel({
            wrap: 'circular'
        });

        $('#wrapper1').jcarouselAutoscroll({
            target: '+=1',
            interval: '5000',
            create: $('#wrapper1').hover(function () {
                $(this).jcarouselAutoscroll('stop');
            },
            function () {
                $(this).jcarouselAutoscroll('start');
            })
        });
    });
</script></div>