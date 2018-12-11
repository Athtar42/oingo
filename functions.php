<?php
//connect to database

    $server="localhost";
    $db_username="root";
    $db_password="";
    $db_name="proj1"; //数据库名字
		$con=mysqli_connect($server, $db_username, $db_password, $db_name);
    if(!$con)
    {
    	die("can't connect".mysqli_error());
    }
    
//read users'data from database
function userdata($getemail)
{
	global $con;
	$sql="select * from user where email='$getemail'";
	$result=mysqli_query($con, $sql);
	$user=mysqli_fetch_array($result);

	return $user;
}

//list the user's friends
function friendlist($userid)
{
	require_once("connect.php");
	$userid=$_POST['userid']; //获取当前用户的ID
	$sql="select friendship.userID2, user.fbsql_username
	      from friendship join user on friendship.userID2=user.userID
	      where friendship.userID2='$userid'";
	$result=mysqli_query($sql);
	$friend=mysqli_fetch_array($result);
	
	return $friend;
}

function add_note($userid, $notetext, $notetime, $radius, $nrestrict, $nsID, $ifcomment)
{
	require_once("connect.php");
	$sql="insert into 'note' values ('', '$userid', '$notetext', 'notetime', '$radius', '$nrestrict', '$nsID', '$ifcomment')";
	$result=mysql_query($sql);
}

function add_tag($noteid, $tag)
{
	require_once("connect.php");
	$sql="insert into 'tag' values ('$noteid', '$tag')";
	$result=mysql_query($sql);
}

?>