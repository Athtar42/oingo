<?php
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
if(!isset($_SESSION['userid']))
{
	echo"<script type='text/javascript'>;location='login.html';</script>";
}
else
{
	$userid=$_SESSION['userid'];
	$email=$_SESSION['email'];
	$user=userdata($email);
	$state=statedata($userid);
	
	$sql="select * from note";
	$result=mysqli_query($con, $sql);
	$row=mysqli_num_rows($result);
}
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>Oingo | Homepage</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<style>
			.col-center-block {
				float: none;
				display: block;
				margin-left: auto;
				margin-right: auto;
			}
			
			.jumbotron {
				background-image: url("img/primary-search-bg.jpg");
				background-size: cover;
			}
		</style>
	</head>

	<body>

		<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">

			<a class="navbar-brand" href="index.php">OINGO</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    				<span class="navbar-toggler-icon"></span>
  				</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">OINGO<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Friends
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="friends.php">Friends List</a>
							<a class="dropdown-item" href="search.php">Search users</a>
							<a class="dropdown-item" href="requestsent.php">Request Sent</a>
							<a class="dropdown-item" href="requestreceived.php">Request Received</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="filter.php">Filter</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="test.php">Test</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="setting.php">Settings</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="logout.php">Sign Out</a>
					</li>
				</ul>
			</div>

		</nav>
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<span class="text-light"><h1 class="display-4">OINGO</h1></span>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-md-3 col-12">
					<div class="container">
						<div class="card border-dark">
							<div class="card-body">
								<?php
								echo "<h5 class='card-title'>".$user['userName']."</h5>";
								echo "<p class='card-text'>".$user['gender']."</p>";
								echo "<p class='card-text'>".$user['birthDate']."</p>";
								echo "<p class='card-text'>".$user['region']."</p>";
								echo "<p class='card-text'>".$state['state']."</p>";
								?>
							</div>
						</div>
					</div>
					<!--Sidebar content-->
				</div>
				<div class="col-sm-12 col-md-9 col-12">
					<div class="container">
						<div class="card mb-3 border-primary">
							<div class="card-header">
								New Note
							</div>
							<div class="card-body">
								<form name="note" action="post.php" method="post">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text">Text</span>
										</div>
										<textarea class="form-control" name="text" aria-label="With textarea" id="notetext"></textarea>
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon">Tags (use space seperate)</span>
										</div>
										<input type="text" class="form-control" name="tag" id="tag" aria-describedby="basic-addon3">
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text" for="restrict">Who can see this note</label>
										</div>
										<select name="restrict" class="custom-select" id="restrict">
											<option selected value="all">Everyone</option>
											<option value="friends">Only Friends</option>
											<option value="self">Only Myself</option>
										</select>
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text" for="radius">Viewable Radius</label>
										</div>
										<select name="radius" class="custom-select" id="radius">
											<option selected value="100">100</option>
											<option value="500">500</option>
											<option value="800">800</option>
											<option value="1000">1000</option>
										</select>
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text" for="ifcomment">If allow comment?</label>
										</div>
										<select name="ifcomment" class="custom-select" id="ifcomment">
											<option selected value="1">Allowed</option>
											<option value="0">Not Allow</option>
										</select>
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text" for="startdate">Start Date</label>
										</div>
										<input type="date" class="form-control" id="startdate" name="startdate" aria-describedby="basic-addon">
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text" for="enddate">End Date</label>
										</div>
										<input type="date" class="form-control" id="enddate" name="enddate" aria-describedby="basic-addon">
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text" for="starttime">Start Time</label>
										</div>
										<input type="time" class="form-control" id="starttime" name="starttime" aria-describedby="basic-addon">
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text" for="starttime">End Time</label>
										</div>
										<input type="time" class="form-control" id="endtime" name="endtime" aria-describedby="basic-addon">
									</div>				
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text" for="repetition">Repetition</label>
										</div>
										<select name="repetition" class="custom-select" id="repetiton">
											<option selected value="no">No Repitition</option>
											<option value="daily">Daily</option>
											<option value="weekly">Weekly</option>
											<option value="monthly">Monthly</option>
										</select>
									</div>		
										
										
										
										
										
									
									<button type="submit" name="submit" value="submit" class="btn btn-primary mb-2">Post</button>
								</form>
							</div>
						</div>
						<?php
						for($i=0;$i<$row;$i++)
						{
							$note=mysqli_fetch_array($result);
							$sql1="select userName from user where userID=".$note['userID'];
							$result1=mysqli_query($con, $sql1);
							$sql2="select tag from tag where noteID=".$note['noteID'];
							$result2=mysqli_query($con, $sql2);
							$username=mysqli_fetch_array($result1);
							$tagrow=mysqli_num_rows($result2);
						    echo "<div class='card mb-3 border-primary'>";
							echo "<div class='card-header'>";
								echo $username['userName'];
							echo "</div>";
							echo "<div class='card-body'>";
								echo "<h6 class='card-subtitle mb-2 text-muted'>".$note['nAddress']."</h6>";
								echo "<p class='card-text text-primary'>".$note['noteText']."</p>";
								for($j=0;$j<$tagrow;$j++)
								{
									$tag=mysqli_fetch_array($result2);
									echo "<a href='#' class='card-link'>".$tag['tag']."</a>";
								}
							echo "</div>";
							$sql3="select * from comment where noteID=".$note['noteID'];//传送值
						    $result3=mysqli_query($con, $sql3);
							$commentrow=mysqli_num_rows($result3);
							echo "<div>";
								echo "<ul class='list-group list-group-flush'>";	
								echo "<li class='list-group-item'>";
									echo "<form name='comment' action='comment.php' method='post'>";
										echo "<div class='row'>";
											echo "<div class='col-10'>";
												echo "<input type='hidden' name='noteid' value='".$note['noteID']."'>";
												echo "<input type='text' name='text' class='form-control' placeholder='Input Comment'>";
											echo "</div>";
											echo "<div class='col-2'>";
												echo "<button type='submit' name='submit' value='submit' class='btn btn-primary mb-2'>Comment</button>";
											echo "</div>";
										echo "</div>";
									echo "</form>";
								echo "</li>";
								for($n=0;$n<$commentrow;$n++)
								{
									$comment=mysqli_fetch_array($result3);
									$sql4="select userName from user where userID=".$comment['userID'];
									$result4=mysqli_query($con, $sql4);
									$name=mysqli_fetch_array($result4);
									echo "<li class='list-group-item'>".$name['userName']." : ".$comment['cText']."</li>";
								}
									echo "</ul>";
								echo "</div>";
							echo "</div>";
							
							
						}
						?>
						
					</div>
					<!--Body content-->
				</div>

			</div>
		</div>
		<script src="js/jquery-3.3.1.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>

</html>