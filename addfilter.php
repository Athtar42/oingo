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

//if ((isset($_POST["userid"]))&&(isset($_POST["tag"]))&&(isset($_POST["starttime"]))&&(isset($_POST["endtime"]))&&(isset($_POST["startdate"]))&&(isset($_POST["enddate"]))&&(isset($_POST["repetition"]))&&(isset($_POST["Location"]))&&(isset($_POST["apply"]))){
$userid=$_SESSION['userid'];
$restirct=$_POST['restirct'];
$tag=$_POST['tag'];
$starttime=$_POST['starttime'];
$endtime=$_POST['endtime'];
$startdate=$_POST['startdate'];
$enddate=$_POST['enddate'];
$repetition=$_POST['repetition'];

if (isset($_POST["location"])){
$location=$_POST['location'];
$gapi="AIzaSyCX-9YeQQrChMn1SiwTuMJ8hD2dLT-fIwE";
$url = "https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($location)."&key=".urlencode($gapi);
$data = file_get_contents($url);
$response = json_decode($data, true);
$lat= $response['results'][0]['geometry']['location']['lat'];
$lng= $response['results'][0]['geometry']['location']['lng'];
}
else{
}


$apply=$_POST['apply'];
//add a filter schedule
$weekday=getweekday($startdate);
//$sql1="insert into schedule (startTime, endTime, Weekday, startDate, endDate, repetition) 
//	   values ('$startTime', '$endTime', '$Weekday', '$startDate', '$endDate', '$repetition')";
//$result1=mysqli_query($con, $sql1);
$sql1 = $con->prepare('insert into schedule (startTime, endTime, Weekday, startDate, endDate, repetition) 
	   values (?, ?, ?, ?, ?, ?');
$sql1->bind_param('sssssss', $startTime, $endTime, $Weekday, $startDate, $endDate, $repetition);
$sql1->execute();
$result1 = $sql1->get_result();
$sql2="select max(sID) as sID from schedule";
$result2=mysqli_query($con, $sql2);
$schedule=mysqli_fetch_array($result2);
$sid=$schedule['sID'];
//add a filter
//$sql="insert into filter (userID, fTag, fsID, fRestrict, apply) 
//	   values ('$userid', '$tag', '$sid', '$restirct', '$apply')";
//$result=mysqli_query($con, $sql);
$sql = $con->prepare('insert into filter (userID, fTag, fsID, fRestrict, apply, fLatitude, fLongitude) 
   values (?, ?, ?, ?, ?, ?, ?)');
$sql->bind_param('sssss', $userid, $tag, $sid, $restirct, $apply, $lat, $lng);
$sql->execute();
$result = $sql->get_result();
//}
//else{
//	echo "<script type='text/javascript'>alert('Please fill in the empty part.')</script>";
//}
?>