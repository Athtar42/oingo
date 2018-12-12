
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
	$url = "http://maps.googleapis.com/maps/api/geocode/json?address=".$location."&key=".$gapi;
	echo $url;
	//$data = file_get_contents($url);
	//$map = json_decode($data, true);
	
	$context = stream_context_create(array(
	'http' => array(
    'ignore_errors'=>true,
    'method'=>'GET'
     // for more options check http://www.php.net/manual/en/context.http.php
    )
	));
	$response = json_decode(file_get_contents($url, false, $context));
	echo $response;
	echo $response['result'][0]['geometry']['location']['lat'];
	echo $response['result'][0]['geometry']['location']['lng'];
}
else{
	//echo "<script type='text/javascript'>alert('Location or API can not be empty!')</script>";
}

;
?>
		<div class="container">
			<div class="row myCenter">
				<div class="col-8 col-md-6 col-lg-4 col-center-block">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Test</h5>
							<form name="test" action="test.php" method="post" class="">
								<div class="form-group">
									<label for="currenttime">Setting Current Time</label> 
									<input type="datetime-local" name="currenttime" class="form-control">
								</div>
								<div class="form-group">
									<label for="currentlocation">Location</label> 
									<input type="text" name="currentlocation" class="form-control">
								</div>
								<div class="form-group">
									<label for="gapi">API</label> 
									<input type="text" name="gapi" class="form-control">
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