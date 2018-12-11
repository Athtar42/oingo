<?php
//check the email and password

require_once("functions.php");
$email=$_POST['email'];
$password=$_POST['password'];

if(($email=='')||($password=='')) //邮箱或密码为空
{
	echo "Email or password can not be empty!<br>";
	echo "<script type='text/javascript'>alert('Email or password can not be empty!');location='login.html';
			</script>";
	//返回login.php
}
else
{
	$user=userdata($email);
	
	if(($user['email']==$email)&&($user['password']==$password))
	{
		echo"<script type='text/javascript'>alert('Success');location='index.html';</script>";
		//登陆成功，跳转到主页
	}
	else 
	{
		echo"<script type='text/javascript'>alert('Wrong password！Please enter again！');</script>";
		//密码错误，返回login.php
	}
}

?>