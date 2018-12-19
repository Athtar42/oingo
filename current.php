<?php
//update current time

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

//if ((isset($_POST["userid"]))&&(isset($_POST["tag"]))&&(isset($_POST["starttime"]))&&(isset($_POST["endtime"]))&&(isset($_POST["startdate"]))&&(isset($_POST["enddate"]))&&(isset($_POST["repetition"]))&&(isset($_POST["Location"]))&&(isset($_POST["apply"])))
//{
$userid=$_SESSION['userid'];
$ctime=$_POST['currenttime'];
$lat=$_POST['lat'];
$lng=$_POST['lng'];
$clocation=$_POST['bLocation'];
$weekday=getweekday($ctime);
$sql="update current set cTime='$ctime', cWeekday='$weekday', cLongitude='$lng', cLatitude='$lat', cLocation='$clocation' where userID='$userid'";
$result=mysqli_query($con, $sql);
if($result)
{
	echo "<script type='text/javascript'>alert('Update the current condition.');location='test.php';</script>";
}

?>