<?php

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
							<a class="dropdown-item" href="requestsent.php">Requests Sent</a>
							<a class="dropdown-item" href="requestreceved.php">Requests Received</a>
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
			<div class="container-fluid"><h2>Requests Received</h2>
			<div class="row">
			<div class="col-sm-6 col-md-4 col-12">
						<div class="card border-dark mb-3">
							<div class="card-body">
								<h5 class="card-title">Username</h5>
								<p class="card-text">Gender</p>
								<p class="card-text">Birthdate</p>
								<p class="card-text">Region</p>
								<p class="card-text">State</p>
								<a href="#" class="btn btn-primary">Cancel</a>
							</div>
						</div>
			</div>
			<div class="col-sm-6 col-md-4 col-12">
						<div class="card border-dark mb-3">
							<div class="card-body">
								<h5 class="card-title">Username</h5>
								<p class="card-text">Gender</p>
								<p class="card-text">Birthdate</p>
								<p class="card-text">Region</p>
								<p class="card-text">State</p>
								<a href="#" class="btn btn-primary">Cancel</a>
							</div>
						</div>
			</div>
						<div class="col-sm-6 col-md-4 col-12">
						<div class="card border-dark mb-3">
							<div class="card-body">
								<h5 class="card-title">Username</h5>
								<p class="card-text">Gender</p>
								<p class="card-text">Birthdate</p>
								<p class="card-text">Region</p>
								<p class="card-text">State</p>
								<a href="#" class="btn btn-primary">Cancel</a>
							</div>
						</div>
			</div>
						<div class="col-sm-6 col-md-4 col-12">
						<div class="card border-dark mb-3">
							<div class="card-body">
								<h5 class="card-title">Username</h5>
								<p class="card-text">Gender</p>
								<p class="card-text">Birthdate</p>
								<p class="card-text">Region</p>
								<p class="card-text">State</p>
								<a href="#" class="btn btn-primary">Cancel</a>
							</div>
						</div>
			</div>
						<div class="col-sm-6 col-md-4 col-12">
						<div class="card border-dark mb-3">
							<div class="card-body">
								<h5 class="card-title">Username</h5>
								<p class="card-text">Gender</p>
								<p class="card-text">Birthdate</p>
								<p class="card-text">Region</p>
								<p class="card-text">State</p>
								<a href="#" class="btn btn-primary">Cancel</a>
							</div>
						</div>
			</div>
			</div>
		</div>
		<script src="js/jquery-3.3.1.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>

</html>