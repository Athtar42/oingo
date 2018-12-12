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
$userid=$_SESSION['userid'];
$text=$_POST['text'];
$restirct=$_POST['restirct'];
$radius=$_POST['radius'];
$ifcomment=$_POST['ifcomment'];
$tag=$_POST['tag'];
$time=date("Y-m-d H:i:s");
if(($text=='')||($restrict=='')||($radius=='')||($ifcomment=='')||($tag=='')) //not fill all blanks
{
	echo "<script type='text/javascript'>alert('Please fill in all the blanks.');location='index.php';
			</script>";
}
else
{
	//$sid
	$sql1="insert into note (userID, noteText, noteTime, radius, nRestrict, nsID, ifComment) 
	      values ('$userid', '$text', $time, '$radius', '$restirct', '$sid', '$ifcomment')";
    $result1=mysqli_query($con, $sql1);
	$sql2="select noteID from note where userID='$userid' and noteTime='$time'";
	$result2=mysqli_query($con, $sql2);
	$note=mysqli_fetch_array($result2);
	$noteid=$note['noteID'];
	//add tag
	$tags=dividetag($tag);
	$num=count($tags);
	for($i=0;$i<$num;i++)
	{
		$sql="insert into tag values ('$noteid', '$tags[$i]')";
		$result=mysqli_query($con, $sql);
	}
	
	echo"<script type='text/javascript'>alert('Wrong password！Please enter again！');location='index.php';</script>";

}

?>