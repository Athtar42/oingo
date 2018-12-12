<?php
//check the signup info
session_start();

$server="localhost";
$db_username="root";
$db_password="";
$db_name="proj1"; //数据库名字
$con=mysqli_connect($server, $db_username, $db_password, $db_name);

if(!$con)
{
    die("can't connect".mysqli_error());
}

$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
$confirm=$_POST['confirm'];
$gender=$_POST['gender'];
$month=$_POST['birthdate'];
$region=$_POST['region'];


if(($email=="")||($password=="")||($username=="")||($confirm=="")||($gender=="")||($birthdate=="")||($region=="")) //任意为空
{
	//echo "Please fill in all the blanks.";
	echo"<script type='text/javascript'>alert('Please fill in all the blanks.');location='signup.html';</script>";
}
else
{
	if($password!=$confirm) //验证两次密码
	{
		//echo "The passwords you typed do not match. Please enter again.";
		//echo "<a href='signup.html'>Back</a>";
		echo"<script type='text/javascript'>alert('The passwords you typed do not match. Please enter again.');location='signup.html';</script>";
	}
	else //注册成功录入数据库
	{
		add_user($email, $username, $password, $gender, $birthdate, $region);
		$user=userdata($email);
		$_SESSION['userid']=$user['userID'];
		//echo "Successfully register!";
		echo"<script type='text/javascript'>alert('Successfully register!');location='index.php';</script>";
		
	}
}
?>