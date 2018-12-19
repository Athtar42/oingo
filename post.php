<?php
//post a note

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
//if ((isset($_POST["userid"]))&&(isset($_POST["text"]))&&(isset($_POST["restrict"]))&&(isset($_POST["radius"]))&&(isset($_POST["ifcomment"]))
//&&(isset($_POST["tag"]))&&(isset($_POST["starttime"]))&&(isset($_POST["endtime"]))&&(isset($_POST["startdate"]))&&(isset($_POST["enddate"]))
//&&(isset($_POST["repetition"])))
//{
	$userid=$_SESSION['userid'];
	$text=$_POST['text'];
	$restrict=$_POST['restrict'];
	$radius=$_POST['radius'];
	$ifcomment=$_POST['ifcomment'];
	$tag=$_POST['tag'];
	$starttime=$_POST['starttime'];
	$endtime=$_POST['endtime'];
	$startdate=$_POST['startdate'];
	$enddate=$_POST['enddate'];
	$repetition=$_POST['repetition'];
	
	
	$sql="select * from current where userID='$userid'";
	$result=mysqli_query($con, $sql);
	$current=mysqli_fetch_array($result);
	$time=$current['cTime'];
	$lng=$current['cLongitude'];
	$lat=$current['cLatitude'];
	$location=$current['cLocation'];
	//add schedule
	$weekday=getweekday($startdate);
	//$sql3="insert into schedule (startTime, endTime, Weekday, startDate, endDate, repetition) 
	//			values ('$starttime', '$endtime', '$weekday', '$startdate', '$enddate', '$repetition')";
	//$result3=mysqli_query($con, $sql3);
	$sql3 = $con->prepare('insert into schedule (startTime, endTime, Weekday, startDate, endDate, repetition) 
				values (?, ?, ?, ?, ?, ?)');
	$sql3->bind_param('ssssss', $starttime, $endtime, $weekday, $startdate, $enddate, $repetition);
	$sql3->execute();
	$result3 = $sql3->get_result();
	
	$sql4="select max(sID) as sID from schedule";
	$result4=mysqli_query($con, $sql4);
	
	$schedule=mysqli_fetch_array($result4);
	$sid=$schedule['sID'];
	//add note
	//$sql1="insert into note (userID, noteText, noteTime, radius, nRestrict, nsID, nLatitude, nLongitude, nAddress, ifComment) 
	//			values ('$userid', '$text', '$time', '$radius', '$restrict', '$sid', '$lat', '$lng',' $location', '$ifcomment')";
	//$result1=mysqli_query($con, $sql1);
	$sql1 = $con->prepare('insert into note (userID, noteText, noteTime, radius, nRestrict, nsID, nLatitude, nLongitude, nAddress, ifComment) 
				values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
	$sql1->bind_param('ssssssssss', $userid, $text, $time, $radius, $restrict, $sid, $lat, $lng, $location, $ifcomment);
	$sql1->execute();
	$result1 = $sql1->get_result();
	
	$sql2="select max(noteID) as noteid from note where userID='".$userid."'";
	$result2=mysqli_query($con, $sql2);
	$note=mysqli_fetch_array($result2);
	$noteid=$note['noteid'];
	//add tag
	$tags=dividetag($tag);
	$num=count($tags);
	for($i=1;$i<$num;$i++)
	{
		$sql="insert into tag values ('$noteid', '#".$tags[$i]."')";
		$result=mysqli_query($con, $sql);
	}
	
	echo"<script type='text/javascript'>alert('Successfully post!');location='index.php';</script>";
//}
//else
//{
	//echo "<script type='text/javascript'>alert('Please fill in all the blanks.');</script>";
	//location='index.php';
//}

?>