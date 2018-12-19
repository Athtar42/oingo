<?php
//add a friend, send a request

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
$usersid=$_GET['usersid'];
$sql="insert into request (userID1, userID2) values ('$userid', '$usersid')";
$result=mysqli_query($con, $sql);
if($result)
{
	echo"<script type='text/javascript'>alert('Successfully!');location='search.php';</script>";
}
else
{
	echo"<script type='text/javascript'>alert('Please try again.');location='search.php';</script>";
}

?>