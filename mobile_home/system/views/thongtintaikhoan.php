<?php
if(isset($_POST['Save'])){
$fullname = $_POST['fullname'];
$brithday = $_POST['brithday'];
$sex = $_POST['sex'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$email = $_POST['email'];
	
 
$sql1111 = "update thanhvien set fullname='".$fullname."',brithday='".$brithday."',sex='".$sex."',phone='".$phone."',address='".$address."',email='".$email."'  where user='".$_SESSION['mem']."' ";
	
     if (mysql_query($sql1111)) {
			
			
				echo "<SCRIPT LANGUAGE='JavaScript'>
       window.alert('Cập nhật thành công')
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
?>
 <?
 $ffffff=mysql_query("SELECT * FROM thanhvien where user='".$_SESSION['mem']."' ");
$check=mysql_fetch_assoc($ffffff);	

$fullname = $check['fullname'];
$brithday = $check['brithday'];
$sex = $check['sex'];
$phone = $check['phone'];
$address = $check['address'];
$email = $check['email'];
 ?>
<form class="form" method="post" action="" id="form1">
 
 
        
        <div class="wrapper" id="wrapper-content">
            <div id="step1" class="stepReg">
                <div class="stepReg-title">
                    
                    <h1>Thông tin tài khoản</h1>
             
                    <p style="color: red;"><?php echo $err;?></p>                   
                </div>
                <div class="stepReg-form">
                    <table class="tableSimple" cellpadding="1" cellspacing="0">
                        <tbody><tr style="">
                            <td class="tdTextBox" colspan="2">
                                <input name="fullname" type="text" value="<?php echo $fullname;?>" maxlength="100" id="txtCompany" placeholder="Họ và tên ">
                            </td>
                        </tr>
                        <tr>
                            <td class="tdTextBox" colspan="2">
                                <input name="brithday" type="text" value="<?php echo $brithday;?>" maxlength="100" id="txtName" placeholder="Ngày sinh">
                            </td>
                        </tr>                       
						<tr>
                            <td class="tdTextBox" colspan="2">
                               

<?if($sex=='0'){?>	
<input type="radio" value="0" name="sex" checked>Nam</option>
<input type="radio" value="1" name="sex"  >Nữ</option>					
<?}else{?>
<?}?>
<?if($sex=='1'){?>	
<input type="radio" value="0" name="sex"  >Nam</option>
<input type="radio" value="1" name="sex"  checked>Nữ</option>					
<?}else{?>
<?}?>






							   
                           


						   </td>
                        </tr>
						<tr>
                            <td class="tdTextBox" colspan="2">
                                <input name="phone" type="text" value="<?php echo $phone;?>" maxlength="100" id="txtName" placeholder="Điện thoại">
                            </td>
                        </tr>	
						<tr>
                            <td class="tdTextBox" colspan="2">
                                <input name="address" type="text" value="<?php echo $address;?>" maxlength="100" id="txtName" placeholder="Địa chỉ">
                            </td>
                        </tr>
 
                         
                        <tr>
                            <td class="tdTextBox" colspan="2">
                                <input name="email" type="text" value="<?php echo $email;?>" maxlength="255" id="txtRegEmail" placeholder="Email">
                            </td>
                        </tr>
                       
                       
                         
                         
                             
                      
                        
                         
                        <tr>
                            <td class="td-register-button" colspan="2">
                                <input name="Save" type="submit" id="reg-button" href="javascript:;" onclick="return CheckRegFormSimple();" value="Cập nhật"/>
                            </td>
                        </tr>
                    </tbody></table>
                </div>
            </div>
        </div>
        
       
        

 
 
</form>