 
<?
function check_user($user) {
if (strlen($user)<6||strlen($user)>=18) return false;
if (eregi("^[A-Z0-9]+$", $user)) return true;
return false;
}
if (isset($_POST['butSub'])) {
	$user=$_POST['txtUser'];
	$pass=$_POST['txtPwd'];
	$pass2=$_POST['txtPwd2'];
	$sql = "select * from thanhvien where user='".$user."'   limit 1";
	$bang=mysql_query($sql);
	$xuat=mysql_fetch_array($bang);
	$level=$xuat['level_shop'];
	$_REQUEST['username']=$user;
		if($user==$xuat['user']  )
	{
		$err="Tên tài khoản đã có người sử dụng";	
		}
		elseif(!check_user($user))
	    {
			$err="Tên đăng nhập chỉ gồm các ký tự số 0-9 và A-Z không dấu viết liền và lớn hơn 6 ký tự";
		}

		elseif($pass!==$pass2)
	    {
			$err2="Mật khẩu không trùng nhau";
		}
 


	 
else
	{
		$date=date("d-m-Y");
	 $sql2="INSERT INTO thanhvien(user, pass, re_time)values('$user','$pass','$date')";
   $result=mysql_query($sql2);
		$quyen=$level;
		$log=$user;
		$_SESSION['mem']=$user;
		
		$_SESSION['level']=$level;
		echo "<script>
        window.alert('Đăng ký thành viên thành công')
		window.location='/'</script>";
}
	 
		
} 
?>

<form class="form" method="post" action="" id="form1">
 
 
        
        <div class="wrapper" id="wrapper-content">
            <div id="step1" class="stepReg">
                <div class="stepReg-title">
                    
                    <h1>Đăng ký tài khoản</h1>
             
                                
                </div>
                <div class="stepReg-form">
                    <table class="tableSimple" cellpadding="1" cellspacing="0">
                        <tbody><tr style="">
                            <td class="tdTextBox" colspan="2">
                                <input name="txtUser" type="text" value="<? echo $_REQUEST['username'];?>" maxlength="100" id="txtCompany" placeholder="Tên tài khoản">
								 
                            </td>
                        </tr>
                                              
																		<span style=" color: #fff;    background: red; ">	<?
if ($err!='')
{
	echo $err;
}
?></span>
						 	
						<tr>
                            <td class="tdTextBox" colspan="2">
                                <input name="txtPwd" type="password" value="<?php echo $password;?>" maxlength="100" id="txtName" placeholder="Mật khẩu">
                            </td>
                        </tr> 
 																		<span style=" color: #fff;    background: red; ">	<?
if ($err2!='')
{
	echo $err2;
}
?></span>                        
                        <tr>
                            <td class="tdTextBox" colspan="2">
                                <input name="txtPwd2" type="password" value="<?php echo $password;?>" maxlength="255" id="txtRegEmail" placeholder="Nhập lại mật khẩu">
                            </td>
                        </tr>
                       
                       
                         
                         
                             
                      
                        
                         
                        <tr>
                            <td class="td-register-button" colspan="2">
                                <input name="butSub" type="submit" id="reg-button" href="javascript:" onclick="return CheckRegFormSimple();" value="Đăng ký"/>
                            </td>
                        </tr>
                    </tbody></table>
                </div>
            </div>
        </div>
        
       
        

 
 
</form>