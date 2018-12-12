<?php

?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>Oingo | Filters</title>
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
							Friends
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="friends.php">Friends List</a>
							<a class="dropdown-item" href="#">Requests Sent</a>
							<a class="dropdown-item" href="#">Requests Received</a>
						</div>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="filter.php">Filter<span class="sr-only">(current)</span></a>
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
		<div class="container">
			<div class="row myCenter">
				<div class="col-12 col-md-6 col-center-block">
					<h2>Filters</h2>
					<div class="card mb-3">
						<div class="card-header">
							New Filter
						</div>
						<div class="card-body">
								<form name="newfilter" action="" method="post">
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
											<span class="input-group-text" id="basic-addon">Tag</span>
										</div>
										<input type="text" class="form-control" id="tag" aria-describedby="basic-addon">
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text" for="restrict">Who can see this note</label>
										</div>
										<select class="custom-select" id="restrict">
											<option selected value="all">Everyone</option>
											<option value="friends">Only Friends</option>
											<option value="self">Only Myself</option>
										</select>
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text" for="radius">Viewable Radius</label>
										</div>
										<select class="custom-select" id="radius">
											<option selected value="100">100</option>
											<option value="500">500</option>
											<option value="800">800</option>
											<option value="1000">1000</option>
										</select>
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text" for="ifcomment">If allow comment？</label>
										</div>
										<select class="custom-select" id="ifcomment">
											<option selected value="1">Allowed</option>
											<option value="0">Not Allow</option>
										</select>
									</div>
									<button type="submit" name="submit" value="submit" class="btn btn-primary mb-2">Post</button>
								</form>
							
						</div>	
					</div>
					<div class="card mb-3 border-primary">
		
		
					</div>
			</div>
		</div>
		<script src="js/jquery-3.3.1.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>

</html>