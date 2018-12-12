<?php
//check the email and password
session_start();
require_once("functions.php");

$email=$_POST['email'];
$password=$_POST['password'];
if(($email=='')||($password=='')) //email or psw empty
{
	//echo "Email or password can not be empty!<br>";
	echo "<script type='text/javascript'>alert('Email or password can not be empty!');location='login.html';
			</script>";
	//back to login
}
else
{
	$user=userdata($email); //get a tuple of user
	if(($user['email']==$email)&&($user['password']==$password))
	{
		$_SESSION['userid']=$user['userID'];
		$_SESSION['email']=$user['email'];
		echo"<script type='text/javascript'>alert('Success');location='index.php';</script>";
		//successfully login, turn to homepage
	}
	else 
	{
		echo"<script type='text/javascript'>alert('Wrong password！Please enter again！');location='login.html';</script>";
		//wrong psw, back to login
	}
}

?>
