<?php
//check the signup info

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

if(($email=="")||($password=="")||($username=="")||($confirm=="")) //任意为空
{
	echo "Please fill in all required blanks.";
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
		$sql="insert into user (userID, email, userName, password) values('100', '$email', '$username', '$password')";
	    //userID改成自动增加的
		$result=mysqli_query($con, $sql);
		if($result)
		{
			echo "Successfully register!";
			//echo"<script type='text/javascript'>alert('Successfully register!');location='index.html';</script>";
		}
		else
		{
			//echo "Fail to register. Please try again.";
			//echo "<a href='signup.html'>Back</a>";
			echo"<script type='text/javascript'>alert('Fail to register. Please try again.');location='signup.html';</script>";
		}
	}
}
?>