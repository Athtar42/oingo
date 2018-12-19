<?php
// alter filter
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
$filterID=$_POST['filterID'];
$restrict=$_POST['restrict'];
$tag=$_POST['tag'];
$starttime=$_POST['starttime'];
$endtime=$_POST['endtime'];
$startdate=$_POST['startdate'];
$enddate=$_POST['enddate'];
$repetition=$_POST['repetition'];
$state=$_POST['state'];
$apply=$_POST['apply'];

if (isset($_POST["location"]))
{
	$location=$_POST['location'];
	$gapi="AIzaSyCX-9YeQQrChMn1SiwTuMJ8hD2dLT-fIwE";
	$url = "https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($location)."&key=".urlencode($gapi);
	$data = file_get_contents($url);
	$response = json_decode($data, true);
	$lat= $response['results'][0]['geometry']['location']['lat'];
	$lng= $response['results'][0]['geometry']['location']['lng'];
}
//else
//{
//}


//add a filter schedule
$weekday=getweekday($startdate);
//$sql1="insert into schedule (startTime, endTime, Weekday, startDate, endDate, repetition) 
//	   values ('$starttime', '$endtime', '$weekday', '$startdate', '$enddate', '$repetition')";
//$result1=mysqli_query($con, $sql1);
$sql1 = $con->prepare('insert into schedule (startTime, endTime, Weekday, startDate, endDate, repetition) 
	   values (?, ?, ?, ?, ?, ?)');
$sql1->bind_param('ssssss', $starttime, $endtime, $weekday, $startdate, $enddate, $repetition);
$sql1->execute();
$result1 = $sql1->get_result();
$sql2="select max(sID) as sID from schedule";
$result2=mysqli_query($con, $sql2);
$schedule=mysqli_fetch_array($result2);
$sid=$schedule['sID'];
//add a filter
//$sql="insert into filter (userID, fTag, fsID, fRestrict, apply, fLatitude, fLongitude) 
//	   values ('$userid', '$tag', '$sid', '$restrict', '$apply', '$lat', '$lng')";
//$result=mysqli_query($con, $sql);
$sql = $con->prepare('Update filter set userID = ?, fTag = ?, fsID = ?, fRestrict = ?, apply = ?, fLatitude = ?, fLongitude = ?, fState = ? where filterID ='.$filterID);
$sql->bind_param('sssssss', $userid, $tag, $sid, $restrict, $apply, $lat, $lng, $state);
$sql->execute();
$result = $sql->get_result();
echo "<script type='text/javascript'>alert('Filter Updated!');location='filter.php';</script>";


?>