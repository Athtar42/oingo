<?php
//delete one friend
session_start();
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
$userid2=$_GET['friendid']; 
$sql1="delete from friendship where userID1='$userid' and userID2='$userid2'";
$sql2="delete from friendship where userID2='$userid' and userID1='$userid2'";
$result1=mysqli_query($con, $sql1);
$result2=mysqli_query($con, $sql2);
if($result1&&$result2)
{
	echo"<script type='text/javascript'>alert('Successfully!');location='friends.php';</script>";
}
else
{
	echo"<script type='text/javascript'>alert('Please try again.');location='friends.php';</script>";
}

?>