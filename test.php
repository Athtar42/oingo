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
$userid=$_SESSION['userid'];
$sql="select * from current where userID='$userid'";
$result=mysqli_query($con, $sql);
$current=mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>Oingo | Test</title>
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
					<li class="nav-item">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Friends<span class="sr-only">(current)</span>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="friends.php">Friends List</a>
							<a class="dropdown-item" href="#">Request Sent</a>
							<a class="dropdown-item" href="#">Request Received</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="filter.php">Filter</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="test.php">Test<span class="sr-only">(current)</span></a>
					</li>
				</ul>
			</div>

		</nav>
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<span class="text-light"><h1 class="display-4">OINGO</h1></span>
			</div>
		</div>
		<?php

if ((isset($_POST["currentlocation"]))&&(isset($_POST["gapi"]))){
	$location=$_POST['currentlocation'];
	$gapi=$_POST['gapi'];	
	$url = "https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($location)."&key=".urlencode($gapi);
	$data = file_get_contents($url);
	$response = json_decode($data, true);
	
	//$context = stream_context_create(array(
	//'http' => array(
    //'ignore_errors'=>true,
    //'method'=>'GET'
    // for more options check http://www.php.net/manual/en/context.http.php
    //)
	//));
	//$response = json_decode(file_get_contents($url, false, $context),true);
	 
	$lat= $response['results'][0]['geometry']['location']['lat'];
	$lng= $response['results'][0]['geometry']['location']['lng'];
}
else{
	//echo "<script type='text/javascript'>alert('Location or API can not be empty!')</script>";
}

;
?>
		<div class="container">
			<div class="row myCenter">
				<div class="col-center-block">
					<div class="card">						
					</div>	
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Test</h5>
							
								<form>
									<div class="form-group row">
    									<label for="staticTime" class="col-sm-4 col-form-label">Setted Time</label> 
    									<div class="col-sm-8">
     										<input type="datetime-local" readonly class="form-control-plaintext" id="staticTime" value="<?php $t=strtotime($current['cTime']); echo date('Y-m-d\TH:i:s', $t); ?>">
    									</div>
  									</div>
									<div class="form-group row">
    									<label for="staticLocation" class="col-sm-4 col-form-label">Current location</label>
    									<div class="col-sm-8">
    										<input type="text" readonly class="form-control" id="staticLocation" value="<?php echo $current['cLocation']; ?>">
    									</div>
									</div>
								</form>
								
							
							<form name="test" action="test.php" method="post" class="">
								<div class="form-group row">
									<label for="currentlocation" class="col-sm-4 col-form-label">Location</label> 
									<div class="col-sm-8"><input type="text" name="currentlocation" class="form-control"></div>
								</div>
								<div class="form-group row">
									<label for="gapi" class="col-sm-4 col-form-label">API</label> 
									<div class="col-sm-8"><input type="text" name="gapi" class="form-control"></div>
								</div>
								<button type="submit" name="submit" class="btn btn-primary">Search</button>
							</form>
							<form name="test" action="current.php" method="post" class="">
								<div class="form-group row">
									<label for="currenttime" class="col-sm-4 col-form-label">Setting Time</label> 
									<div class="col-sm-8"><input type="datetime-local" name="currenttime" class="form-control"></div>
								</div>
								<div class="form-group row">
									<label for="currenttime" class="col-sm-4 col-form-label">Location</label> 
									<div class="col-sm-8"><input readonly type="bLocation" name="bLocation" class="form-control"
										<?php 
											if (isset($location)){
											echo "value='".$location."'";
											};
										?>																				
										></div>
								</div>								
								<div class="form-group row">
									<label for="lat" class="col-sm-4 col-form-label">Latitude</label> 
									<div class="col-sm-8"><input type="text" name="lat" class="form-control"
										<?php 
											if (isset($lat)){
											echo "value='".$lat."'";
											};
										?>
										></div>
								</div>
								<div class="form-group row">
									<label for="lng" class="col-sm-4 col-form-label">Longitude</label> 
									<div class="col-sm-8"><input type="text" name="lng" class="form-control"
										<?php 
											if (isset($lng)){
											echo "value='".$lng."'";
											};											
										?>										
										></div>
								</div>
								<button type="submit" name="submit" class="btn btn-primary">Save</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		<script src="js/jquery-3.3.1.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>

</html>