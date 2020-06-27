 var div_bannerVG = [];var arrImg	=	[];var myadBannerDiv = [];
					 var bannerVG_div_0 = document.getElementById('banner_top_360x110');
						 if(bannerVG_div_0 !== null ) { myadBannerDiv[0] = bannerVG_div_0;
						arrImg[0]	=	[]; var ban_div_15845 = '<div onmouseover="" onmouseout="" class="first " style="width:100%;height:110px;display:inline-block;background: none;position: relative;font-size: 0;text-align: center;overflow:hidden;" id="myadBan_15845"><a title="" style="" target="_blank" href="http://ad.vatgia.com/a/b_click.php?data=eyJiYW5faWQiOiIxNTg0NSIsInBvc19pZCI6IjEzMSIsIndlYl9pZCI6MywiYmFuX2xpbmsiOiJodHRwOlwvXC90b3VjaC52YXRnaWEuY29tXC80MzgsN1wvbW9iaWxlLmh0bWwiLCJjYXRfaWQiOjB9"><img style="width : 100%;" src="http://media.myad.vn/photo/users_b_upload/2014/12/dwd1419825739.jpg" /></a></div>';
					
			                       div_bannerVG[0]    =   [];
			                       div_bannerVG[0]['list'] = [];
			                       div_bannerVG[0]['current'] = 0;
			                       div_bannerVG[0]['show'] = 'banner_top_360x110';
			                       div_bannerVG[0]['list'].push(ban_div_15845); bannerVG_div_0.innerHTML = div_bannerVG[0]['list'][0];
						 }
						
        						if(myAd_interval){
        							clearInterval(myAd_interval);
 								}
                        var myAd_interval = setInterval(function(){
                            for(id in div_bannerVG){
                     			  if(div_bannerVG[id]['list'].length > 1){
               			  			  div_bannerVG[id]['current']++;
	                                if(div_bannerVG[id]['current'] == div_bannerVG[id]['list'].length)
	                                   div_bannerVG[id]['current']   =   0;
	                                document.getElementById(div_bannerVG[id]['show']).innerHTML = div_bannerVG[id]['list'][div_bannerVG[id]['current']];
											}
                            }
                        },16000);
                        function myAd_check_impression(pos_id){
    					if(arrImg[pos_id].length > 0){
    						for(i in arrImg[pos_id]){
    							if(document.getElementById("myadIMG_" + i) == null)
    								document.getElementById("myadBan_" + i).innerHTML += arrImg[pos_id][i];
    						}
    					}
					}
						function show_statistic(id){
							var obj	=	document.getElementById(id);
							if(obj != null){
								obj.style.display = "block";
							}
						}
						function hide_statistic(id){
							var obj	=	document.getElementById(id);
							if(obj != null){
								obj.style.display = "none";
							}
						}
						function show_buy_button(id){
							var obj	=	document.getElementById(id);
							if(obj != null){
								obj.style.display = "block";
							}
						}
						function hide_buy_button(id){
							var obj	=	document.getElementById(id);
							if(obj != null){
								obj.style.display = "none";
							}
						}
                  var timeout;
						function showBuyBannerMyad(obj){
						   clearTimeout(timeout);
                     obj.style.right =  "0px";
						}
						function hideBuyBannerMyad(obj){
			            timeout = setTimeout(function(){
						      obj.style.right   =  "-118px";
						   },2000);
						}