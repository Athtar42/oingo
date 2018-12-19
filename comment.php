<?php
//make a comment

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
$noteid=$_POST['noteid'];
$text=$_POST['text'];
//add a comment
$sql="insert into comment (userID, noteID, cText) values ('$userid', '$noteid', '$text')";
$result=mysqli_query($con, $sql);
echo"<script type='text/javascript'>alert('Successfully comment!');location='index.php';</script>";
?>