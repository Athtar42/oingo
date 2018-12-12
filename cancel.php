<?php
//cancel the request for friend

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
$sql="delete from request where userID1='$userid' and userID2='$userid2'";
$result=mysqli_query($con, $sql1);
if($result)
{
	echo"<script type='text/javascript'>alert('Successfully!');location='requestsent.php';</script>";
}
else
{
	echo"<script type='text/javascript'>alert('Please try again.');location='requestsent.php';</script>";
}

?>
