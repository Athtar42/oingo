<?php
//add a filter

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
$restirct=$_POST['restirct'];
$tag=$_POST['tag'];
$starttime=$_POST['starttime'];
$endtime=$_POST['endtime'];
$startdate=$_POST['startdate'];
$enddate=$_POST['enddate'];
$repetition=$_POST['repetition'];
$apply=$_POST['apply'];
//add a filter schedule
$weekday=getweekday($startdate);
$sql1="insert into schedule (startTime, endTime, Weekday, startDate, endDate, repetition) 
	   values ('$startTime', '$endTime', '$Weekday', '$startDate', '$endDate', '$repetition')";
$result1=mysqli_query($con, $sql1);
$sql2="select max(sID) as sID from schedule";
$result2=mysqli_query($con, $sql2);
$schedule=mysqli_fetch_array($result2);
$sid=$schedule['sID'];
//add a filter
$sql="insert into filter (userID, fTag, fsID, fRestrict, apply) 
	   values ('$userid', '$tag', '$sid', '$restirct', '$apply')";
$result=mysqli_query($con, $sql);

?>