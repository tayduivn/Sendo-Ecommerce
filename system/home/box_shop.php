<div class="box-shop w220  clearfix">
						<div class = "box-title clearfix">
							<ul class="tabs1" persist="true">
                            <li class="selected"><a href="#" rel="view_store1">Shop nổi bật</a></li>
                            <li><a href="#" rel="view_store2">Shop mới</a></li>
                            </ul>
						</div>
                        <div class="tabcontents">
                        <div id="view_store1" class="tabcontent">  
						<div  class="hot-pro-item hot-shop w220 clearfix">
                        <?php
                        $sql_store=mysql_query("SELECT * FROM user_shop where level_shop=0 order by id DESC limit 14");
                        for($i=1;$i<=7;$i++)
                        {?>
								<ul>
                                <?php for($j=1;$j<=2&&$row_store=mysql_fetch_array($sql_store);$j++)
                                {
                                    if($j=='2')
                                    {
                                        $class="bor";
                                    }
                                    else
                                    {
                                        $class="bor no-bor-r";
                                    }
                                    ?>
									<li class="<?php echo $class;?>">
										<a href="<?php echo $domain_home;?><?php echo $row_store['user'];?>" target="_blank" title="<?php echo $row_store['company'];?>">
                                            <?php if($row_store['logo']=='upload/logo/')
                                           {?>
                                           <img class="img-pro" alt="<?php echo $row_store['company'];?>" title="<?php echo $row_store['company'];?>" src="images/no_logo.jpg">
                                           <?}else{?>
                                            <img class="img-pro" alt="<?php echo $row_store['company'];?>" title="<?php echo $row_store['company'];?>" src="<?php echo $row_store['logo'];?>">
                                            <?}?>
										</a>
									</li>
                                   <?}?>	
								</ul>
                         <?}?>
								
						</div>
                        </div>
                        <div id="view_store2" class="tabcontent">  
						<div  class="hot-pro-item hot-shop w220 clearfix">
						<?php
                        $sql_store1=mysql_query("SELECT * FROM user_shop order by id DESC limit 14");
                        for($i=1;$i<=7;$i++)
                        {?>
								<ul>
                                <?php for($j=1;$j<=2&&$row_store1=mysql_fetch_array($sql_store1);$j++)
                                {
                                    if($j=='2')
                                    {
                                        $class="bor";
                                    }
                                    else
                                    {
                                        $class="bor no-bor-r";
                                    }
                                    ?>
									<li class="<?php echo $class;?>">
										<a href="<?php echo $domain_home;?><?php echo $row_store1['user'];?>" target="_blank" title="<?php echo $row_store1['company'];?>">
                                            <?php if($row_store1['logo']=='upload/logo/')
                                           {?>
                                           <img class="img-pro" alt="<?php echo $row_store1['company'];?>" title="<?php echo $row_store1['company'];?>" src="images/no_logo.jpg">
                                           <?}else{?>
                                            <img class="img-pro" alt="<?php echo $row_store1['company'];?>" title="<?php echo $row_store1['company'];?>" src="<?php echo $row_store1['logo'];?>">
                                            <?}?>
										</a>
									</li>
                                   <?}?>	
								</ul>
                         <?}?>
								
						</div>
                        </div>
                        </div>
                        <!-- end .hot-pro-item -->
					</div>