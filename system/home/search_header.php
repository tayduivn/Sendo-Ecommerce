
		<script type="text/javascript" src="/system/home/ajax.js"></script>

  
  

  
  
  
  
		  <div class="d-search">
<form name="cartform" method="GET" action="./" onsubmit="return check()">
        	    <div class="d-bg">
            	    <div class="d-left">
                	
                        <div class="d-text-search" >

                    	    <input  type="text" class="txtsearch" name="keywords" id="key" placeholder="Nhập từ khóa tìm kiếm" onkeyup="livesearch(this.value);"/>

					   </div>
                          <div  id="result" style="position: relative; z-index: 99;background: #f4f4f4; border-bottom: 0px solid #d7d7d7; color: red; font-weight: bold; margin-top: 4px; margin-left: -2px; width: 556px; overflow-y: auto; max-height: 570px;   ">
		</a>
		
		</div>              
                    </div>
					 
                    <div class="d-right">
                    <input type="hidden" name="type" value="1">
                    <input type="hidden" name="act" value="search">
                    <input type="hidden" name="home" value="search">
                    <button name="search" type="submit" class="a-btn-search" title="Tìm kiếm"  /><i style=" font-size: 24px;margin-top: 5px; " class="fa fa-fw fa-search"></i></button>
                    </div>
                </div>
</form>
            </div>
			
			
<script language="javascript" type="text/javascript">
function check()
{

if(document.cartform.keywords.value =="")
{
$("#errortim").html("<span style='color: #fff;background: red; padding: 6px;border: blue;border: 1px dashed #FFEB3B;'; >Chưa nhập ");
document.cartform.keywords.focus();
return false;
}

 
 

 





return true;
}
</script>	