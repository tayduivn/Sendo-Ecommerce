<?
if (isset($_POST['butSub'])) {
	$user=$_POST['txtUser'];
	$pass=$_POST['txtPwd'];
	$sql = "select * from thanhvien where user='".$user."' and pass='".$pass."' limit 1";
	$bang=mysql_query($sql);
	$xuat=mysql_fetch_array($bang);
	$level=$xuat['level_shop'];
		if($user!==$xuat['user'] or $pass!==$xuat['pass'])
	{
		$_REQUEST['username']=$user;
		$err="Tên đăng nhập hoặc mật khẩu không chính xác";	
 
		
		
		
		
}
		
elseif (mysql_num_rows(mysql_query($sql,$con))>0)
	{
		$quyen=$level;
		$log=$user;
		$_SESSION['mem']=$user;
		$_SESSION['level']=$level;
		echo "<script>window.location='/'</script>";

	}
else
	{
}
} 
?>

<form class="form" method="post" action="" id="form1">
 
 
        
        <div class="wrapper" id="wrapper-content">
            <div id="step1" class="stepReg">
                <div class="stepReg-title">
                    
                    <h1>Đăng nhập</h1>
             
                                
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
 																		 
                         
                         
                             
                      
                        
                         
                        <tr>
                            <td class="td-register-button" colspan="2">
                                <input name="butSub" type="submit" id="reg-button" href="javascript:" onclick="return CheckRegFormSimple();" value="Đăng Nhập"/>

                            </td>
							
                        </tr>
						
                    </tbody></table>
			<a href="">  <span style=" float: left; padding-top: 16px; font-size: 12px; color: blue; ">Quên mật khẩu </span></a>
             <a href="?home=dangkym">  <span style=" float: right; padding-top: 16px; font-size: 14px; color: red; ">Đăng ký tài khoản? </span></a>
			 </div>
            </div>
        </div>
        
       
        

 
 
</form>