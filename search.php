<?php
//search users

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
//if(isset($_GET["search"]))
//{
	$search=$_GET['search'];
	$sql="select user.userID, user.userName, user.gender, user.birthDate, user.region, state.state
	from user join state on user.userID=state.userID where email='$search' 
	and user.userID not in (select userID2 from friendship where userID1=$userid)";
	$result=mysqli_query($con, $sql);
	$row=mysqli_num_rows($result);
//}
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>Oingo | Friends</title>
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

			<a class="navbar-brand" href="index.html">OINGO</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    				<span class="navbar-toggler-icon"></span>
  				</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="index.html">OINGO</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Friends<span class="sr-only">(current)</span>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="friends.php">Friends List</a>
							<a class="dropdown-item" href="requestsent.php">Add New Friends</a>
							<a class="dropdown-item" href="requestsent.php">Requests Sent</a>
							<a class="dropdown-item" href="requestreceived.php">Requests Received</a>
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
						<a class="nav-link" href="#">Sign Out</a>
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
				<h2>Add New Friends</h2>
			
					<div class="row">
					<div class='col-sm-12 col-md-12 col-12'>
					<div class="card border-success mb-3">
					<div class="card-body">
						  <form class="form-inline" name="search" action="search.php" method="get">
    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
					</div>
					</div>
					</div>
				</div>
				<div class="row">
			<?php 
			for($i=0;$i<$row;$i++)
			{
				$users=mysqli_fetch_array($result);
				//echo $friend['userName'];
			echo "<div class='col-sm-6 col-md-4 col-12'>";
						echo "<div class='card border-dark mb-3'>";
							echo "<div class='card-body'>";
								echo "<h5 class='card-title'>".$users['userName']."</h5>";
								echo "<p class='card-text'>".$users['gender']."</p>";
								echo "<p class='card-text'>".$users['birthDate']."</p>";
								echo "<p class='card-text'>".$users['region']."</p>";
								echo "<p class='card-text'>".$users['state']."</p>";
								echo "<a href='add.php?usersid=".$users['userID']."class='btn btn-primary'>Add</a>";
							echo "</div>";
						echo "</div>";
			echo "</div>";
			}
			?>
			
			</div>
			
			
		</div>
		<script src="js/jquery-3.3.1.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>

</html>