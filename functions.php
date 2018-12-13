<?php
//connect to database

    $server="localhost";
    $db_username="root";
    $db_password="";
    $db_name="proj1"; 
		$con=mysqli_connect($server, $db_username, $db_password, $db_name);
    if(!$con)
    {
    	die("can't connect".mysqli_error());
    }
    
//read users'data from database
function userdata($getemail)
{
	global $con;
	//$sql="select * from user where email='$getemail'";
	//$result=mysqli_query($con, $sql);
	//$user=mysqli_fetch_array($result);
	
	$stmt = $con->prepare('select * from user where email= ?');
	$stmt->bind_param('s', $getemail);
	$stmt->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
    $user=$row;
	};

	return $user;
}
/*
function add_user($email, $username, $password, $gender, $birthdate, $region)
{
	global $con;
	$sql1="insert into user(email, username, password, gender, birthdate, region) values ('$email', '$username', '$password', '$gender', '$birthdate', '$region')";
	//userID改成自动增加的
	$result1=mysqli_query($con, $sql1);
	$user=userdata($email);
	//add state
	//$sql2="insert into state values ('$user['userID']', 'default')";
	//$result2=mysqli_query($con, $sql2);
	//add current
	//$sql="insert into current values ('$user['userID']', 'default')";
	//$result=mysqli_query($con, $sql);
	
	//return $user;
}
*/
//list the user's friends
function friendlist($userid)
{
	global $con;
	$userid=$_POST['userid']; //获取当前用户的ID
	$sql="select friendship.userID2, user.userName
	      from friendship join user on friendship.userID2=user.userID
	      where friendship.userID2='$userid'";
	$result=mysqli_query($con, $sql);
	$friend=mysqli_fetch_array($result);
	
	return $friend;
}
/*
function add_note($userid, $notetext, $radius, $nrestrict, $nsID, $ifcomment)
{
	global $con;
	$sql="insert into 'note' values ('', '$userid', '$notetext', now(), '$radius', '$nrestrict', '$nsID', '$ifcomment')";
	$result=mysql_query($con, $sql);
}

function add_tag($noteid, $tag)
{
	global $con;
	$sql="insert into 'tag' values ('$noteid', '$tag')";
	$result=mysql_query($con, $sql);
}

function add_schedule()
{
	global $con;
	$sql="insert into 'schedule' values ('', '$startTime', '$endTime', '$startDate', '$Weekday', '$endDate', '$Repetition')";
	$result=mysql_query($con, $sql);
}
*/
function check_username($username)
{
  global $con;
	$sql="select count(*) as num from user where userName='$username'";
	$result=mysqli_query($con, $sql);
	$count=mysqli_fetch_array($result);
	if($count['num']!=0)
	{
		//echo "The userName has been occupied.";
		echo"<script type='text/javascript'>alert('The userName has been occupied.');location='signup.html';</script>";
	} 
}

function statedata($userid)
{
	global $con;
	$sql="select * from state where userID='$userid'";
	$result=mysqli_query($con, $sql);
	$state=mysqli_fetch_array($result);
	
	return $state;
}

function dividetag($tag)
{
	$tags=explode('#', $tag);
	return $tags;
}

?>