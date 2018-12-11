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
$gender=$_POST['gender'];
$month=$_POST['month'];
$day=$_POST['day'];
$year=$_POST['year'];
$region=$_POST['region'];


if(($email=="")||($password=="")||($username=="")||($confirm=="")||($gender=="")||($month=="")||($day=="")||($year=="")||($region=="")) //任意为空
{
	echo "Please fill in all the blanks.";
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
		$birthdate=$year."-".$month."-".$day;
		//echo $birthdate;
		$sql="insert into user values('99', '$email', '$username', '$password', '$gender', '$birthdate', '$region')";
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