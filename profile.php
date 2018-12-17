<?php
//edit user's profile

session_start();
require_once("functions.php");
$server="localhost";
$db_username="root";
$db_password="";
$db_name="proj1"; 
$con=mysqli_connect($server, $db_username, $db_password, $db_name);
if(!$con)
{
	die("can't connect".mysqli_error());
}
$userid=$_SESSION['userid'];
$state=$_POST['state'];

$gender=$_POST['gender'];
$birthdate=$_POST['birthdate'];
$region=$_POST['region'];

if((isset($_POST["password"]))&&(isset($_POST["confirm"])))
{
	$password=$_POST['password'];
	$confirm=$_POST['confirm'];

	if($password==$confirm) 
	{
		//update state
		//$sql1="update state set state='$state' where userID='$userid'";
		$sql1 = $con->prepare('update state set state=? where userID=?');
		$sql1->bind_param('ss', $state, $userid);
		$sql1->execute();
		$result1 = $sql1->get_result();
		//$result1=mysqli_query($con, $sql1);
		//update profile
		//$sql2="update user set password='$password', gender='$gender', birthdate='$birthdate', region='$region' where userID='$userid'";
		//$result2=mysqli_query($con, $sql2);
		$sql2 = $con->prepare('update user set password=?, gender=?, birthdate=?, region=? where userID=?');
		$sql2->bind_param('sssss', $password, $gender, $birthdate, $region, $userid);
		$sql2->execute();
		$result2 = $sql2->get_result();
		
		//if($result1&&$result2)
		//{
			echo "<script type='text/javascript'>alert('You have changed profile successfully!');location='setting.php';</script>";
		//}
	}
	else
	{
		echo "<script type='text/javascript'>alert('The passwords you typed do not match. Please enter again.');location='setting.php';</script>";
	}

}
else
{
	$sql1 = $con->prepare('update state set state=? where userID=?');
	$sql1->bind_param('ss', $state, $userid);
	$sql1->execute();
	$result1 = $sql1->get_result();
	//$result1=mysqli_query($con, $sql1);
	//update profile
	//$sql2="update user set password='$password', gender='$gender', birthdate='$birthdate', region='$region' where userID='$userid'";
	//$result2=mysqli_query($con, $sql2);
	$sql2 = $con->prepare('update user set gender=?, birthdate=?, region=? where userID=?');
	$sql2->bind_param('ssss', $gender, $birthdate, $region, $userid);
	$sql2->execute();
	$result2 = $sql2->get_result();
	
	//if($result1&&$result2)
	//{
		echo "<script type='text/javascript'>alert('You have changed profile successfully!');location='setting.php';</script>";
	//}
}

?>
