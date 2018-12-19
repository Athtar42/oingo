<?php
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
$filterID=$_GET['filterID']
$sql="delete from filter where filterID='".$filterID."'";
$result=mysqli_query($con, $sql);
if($result)
{
	echo"<script type='text/javascript'>alert('Filter deleted!');location='filter.php';</script>";
}
else
{
	echo"<script type='text/javascript'>alert('Please try again.');location='filter.php';</script>";
}

?>