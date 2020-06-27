<?
 $ffffff=mysql_query("SELECT * FROM thanhvien where user='".$_SESSION['mem']."' ");
$check=mysql_fetch_assoc($ffffff);	 

$diemluahienco = $check['diemlua_mem']
?>
 
<form class="form" method="post" action="" id="form1">
 
 
        
        <div class="wrapper" id="wrapper-content">
            <div id="step1" class="stepReg">
                <div class="stepReg-title">
                    
                    <h1>Ví Điểm Lửa</h1>
             
                                
                </div>
                <div class="stepReg-form">
                    <table class="tableSimple" cellpadding="1" cellspacing="0">
                        <tbody>
						 
                       
                       
                         Điểm Lửa hiện có: <b style=" color: red; font-size: 18px; "><? echo number_format($diemluahienco);?></b> điểm
                         <br>
                             <a onclick="return confirm('Không hỗ trợ xem chi tiết trên điện thoại.Khách hàng vui lòng truy cập bằng Máy vi tính hoặc Laptop để  xem chi tiết điểm Lửa');" style="background: #F44336; padding: 1px; color: #fff; display: inline-block;    ">Xem Chi Tiết</a>
                      
                        
                         
                         
                    </tbody></table>
                </div>
            </div>
        </div>
        
       
        

 
 
</form>