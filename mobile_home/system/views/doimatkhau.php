<?
if (isset($_POST['Save'])) {
	$pass=$_POST['pass'];
	$passmoi1=$_POST['passmoi1'];
	$passmoi2=$_POST['passmoi2'];
	$sql = "select * from thanhvien where pass='".$pass."' and  user='".$_SESSION['mem']."'   limit 1";
	$bang=mysql_query($sql);
	$xuat=mysql_fetch_array($bang);
	$_REQUEST['pass']=$pass;
		if($pass!==$xuat['pass']  )
	{
		$err="Mật khẩu cũ không đúng";	
		}

		elseif($passmoi1!==$passmoi2)
	    {
			$err="Nhập lại mật khẩu không đúng";
		}
 


	 
else
	{
		$date = date("d-m-Y H:i:s");
$sql1111 = "update thanhvien set pass='".$passmoi1."'  where user='".$_SESSION['mem']."' ";
$sql_huy = "insert into thongbao (thongbao,date,user) values ('Bạn đã đổi mật khẩu thành công' ,'".$date."','".$_SESSION['mem']."'  ) ";
	
     if (mysql_query($sql1111) && mysql_query($sql_huy) ) {
			
			
				echo "<SCRIPT LANGUAGE='JavaScript'>
       window.alert('Đổi mật khẩu thành công')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";
		}	
		else {
				echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Thao tác không thành công')
    window.location.href='http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]."';
    </SCRIPT>";
		}
}
	 
		
} 
?>
 
<form class="form" method="post" action="" id="form1">
 
 
        
        <div class="wrapper" id="wrapper-content">
            <div id="step1" class="stepReg">
                <div class="stepReg-title">
                    
                    <h1>Đổi mật khẩu</h1>
             
                                
                </div>
                <div class="stepReg-form">
                    <table class="tableSimple" cellpadding="1" cellspacing="0">
                        <tbody><tr style="">
                            <td class="tdTextBox" colspan="2">
                                <input name="pass" type="password"   maxlength="100" id="txtCompany" placeholder="Mật khẩu cũ">
                            </td>
                        </tr>
                                              
					  	  <p style="color: red;"><?php echo $err;?></p>   
						 	
						<tr>
                            <td class="tdTextBox" colspan="2">
                                <input name="passmoi1" type="password"   maxlength="100" id="txtName" placeholder="Mật khẩu mới">
                            </td>
                        </tr> 
                         
                        <tr>
                            <td class="tdTextBox" colspan="2">
                                <input name="passmoi2" type="password"   maxlength="255" id="txtRegEmail" placeholder="Nhập lại mật khẩu mới">
                            </td>
                        </tr>
                       
                       
                         
                         
                             
                      
                        
                         
                        <tr>
                            <td class="td-register-button" colspan="2">
                                <input name="Save" type="submit" id="reg-button" href="javascript:" onclick="return CheckRegFormSimple();" value="Đổi mật khẩu"/>
                            </td>
                        </tr>
                    </tbody></table>
                </div>
            </div>
        </div>
        
       
        

 
 
</form>